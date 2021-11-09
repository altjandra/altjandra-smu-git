from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
                                           'pool_recycle': 280}

db = SQLAlchemy(app)
CORS(app)

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Class Table

class Class(db.Model):
    __tablename__ = 'class'

    course_id = db.Column(db.String(10), db.ForeignKey('course.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    trainer_name = db.Column(db.String(100), nullable=False)
    trainer_user_name = db.Column(db.String(100), db.ForeignKey('employee.user_name'), nullable=False)
    class_start_datetime = db.Column(db.DateTime, nullable=False)
    class_end_datetime = db.Column(db.DateTime, nullable=False)
    enrolment_start_datetime = db.Column(db.DateTime, nullable=False)
    enrolment_end_datetime = db.Column(db.DateTime, nullable=False)
    current_class_size = db.Column(db.Integer, nullable=False)
    total_class_size = db.Column(db.Integer, nullable=False)
    final_quiz_id = db.Column(db.String(100), db.ForeignKey('quiz.quiz_id'), nullable=True)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "class_id": self.class_id, 
            "trainer_name": self.trainer_name,
            "trainer_user_name": self.trainer_user_name, 
            "class_start_datetime": self.class_start_datetime,
            "class_end_datetime": self.class_end_datetime,
            "enrolment_start_datetime": self.enrolment_start_datetime,
            "enrolment_end_datetime": self.enrolment_end_datetime,
            "current_class_size": self.current_class_size,
            "total_class_size": self.total_class_size,
            "final_quiz_id": self.final_quiz_id
        }
        
        return dto

    def add_current_class_size(self, no_learner_confirmed):
        self.current_class_size += no_learner_confirmed
        return self.current_class_size

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Completed_Courses Table

class Completed_Courses(db.Model):
    __tablename__ = 'completed_courses'

    user_name = db.Column(db.String(32), db.ForeignKey('employee.user_name'), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey('class.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    final_quiz_grade = db.Column(db.Float, db.ForeignKey('quiz.quiz_id'), nullable=False)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "course_id": self.course_id, 
            "class_id": self.class_id, 
            "final_quiz_grade": self.final_quiz_grade
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Course Table

class Course(db.Model):
    __tablename__ = 'course'

    course_id = db.Column(db.String(10), primary_key=True)
    course_name = db.Column(db.String(100), nullable=False)
    course_desc = db.Column(db.String(1000), nullable=False)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "course_name": self.course_name,
            "course_desc": self.course_desc
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Course_Section_Materials Table

class Course_Section_Materials(db.Model):
    __tablename__ = 'course_section_materials'

    course_id = db.Column(db.String(10), db.ForeignKey('class.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    section = db.Column(db.Integer, primary_key=True) 
    materials = db.Column(db.String(1000), nullable=False)
    quiz_id = db.Column(db.String(100), db.ForeignKey('quiz.quiz_id'),  nullable=False)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "class_id": self.class_id,
            "section": self.section,
            "materials": self.materials,
            "quiz_id": self.quiz_id
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Course_Section_Progress Table

class Course_Section_Progress(db.Model):
    __tablename__ = 'course_section_progress'

    user_name = db.Column(db.String(32), db.ForeignKey('employee.user_name'), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey('class.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    section = db.Column(db.Integer, primary_key=True) 
    section_materials_status = db.Column(db.String(15), nullable=False)
    section_quiz_status = db.Column(db.String(15), nullable=False)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "course_id": self.course_id,
            "class_id": self.class_id,
            "section": self.section,
            "section_materials_status": self.section_materials_status,
            "section_quiz_status": self.section_quiz_status
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Employee Table

class Employee(db.Model):
    __tablename__ = 'employee'

    user_name = db.Column(db.String(32), primary_key=True)
    employee_name = db.Column(db.String(64), nullable=False)
    current_designation = db.Column(db.String(64), nullable=False)
    department = db.Column(db.String(64), nullable=False)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "employee_name": self.employee_name, 
            "current_designation": self.current_designation, 
            "department": self.department
        }

        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Enrolment_Request Table

class Enrolment_Request(db.Model):
    __tablename__ = 'enrolment_request'

    user_name = db.Column(db.String(32), db.ForeignKey('employee.user_name'), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey('class.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    status = db.Column(db.String(100), nullable=False)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "course_id": self.course_id,
            "class_id": self.class_id,
            "status": self.status
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Overall_Course_Progress Table

class Overall_Course_Progress(db.Model):
    __tablename__ = 'overall_course_progress'

    user_name = db.Column(db.String(32), db.ForeignKey('employee.user_name'), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey('class.class_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    sections_completed = db.Column(db.Integer, nullable=False)
    current_section = db.Column(db.Integer, nullable=False)
    final_quiz_grade = db.Column(db.Float, nullable=True)

    def json(self):
        dto = {
            "user_name": self.user_name,
            "course_id": self.course_id,
            "class_id": self.class_id,
            "sections_completed": self.sections_completed,
            "current_section": self.current_section,
            "final_quiz_grade": self.final_quiz_grade
        }
        
        return dto

    def add_sections_completed(self, no_section):
        self.sections_completed += no_section
        return self.sections_completed

    def add_current_section(self, no_section):
        self.current_section += no_section
        return self.current_section

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Prerequisite Table

class Prerequisite(db.Model):
    __tablename__ = 'prerequisite'

    course_id = db.Column(db.String(10), db.ForeignKey('course.course_id'), primary_key=True)
    prerequisite_id = db.Column(db.String(10), primary_key=True)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "prerequisite_id": self.prerequisite_id
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Quiz Table

class Quiz(db.Model):
    __tablename__ = 'quiz'

    quiz_id = db.Column(db.String(100), primary_key=True)
    quiz_pass = db.Column(db.Float, nullable=False)

    def json(self):
        dto = {
            "quiz_id": self.quiz_id, 
            "quiz_pass": self.quiz_pass
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Quiz_Questions Table

class Quiz_Questions(db.Model):
    __tablename__ = 'quiz_questions'

    quiz_id = db.Column(db.String(100), db.ForeignKey('quiz.quiz_id'), primary_key=True)
    question_no = db.Column(db.Integer, primary_key=True)
    question_type = db.Column(db.String(3), nullable=False)
    question_desc = db.Column(db.String(1000), nullable=False)

    def json(self):
        dto = {
            "quiz_id": self.quiz_id, 
            "question_no": self.question_no,
            "question_type": self.question_type,
            "question_desc": self.question_desc
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Quiz_Question_Options Table

class Quiz_Question_Options(db.Model):
    __tablename__ = 'quiz_question_options'

    quiz_id = db.Column(db.String(100), db.ForeignKey('quiz_questions.quiz_id'), primary_key=True)
    question_no = db.Column(db.Integer, primary_key=True)
    option_id = db.Column(db.String(5), primary_key=True)
    option_desc = db.Column(db.String(100), nullable=False)
    option_status = db.Column(db.String(10), nullable=False)

    def json(self):
        dto = {
            "quiz_id": self.quiz_id, 
            "question_no": self.question_no,
            "option_id": self.option_id,
            "option_desc": self.option_desc,
            "option_status": self.option_status
        }
        
        return dto

db.create_all()

# ----------------------------------------------------------------------------------------------------------------------------- #
# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Get all courses'''

@app.route("/admin_get_all_courses")
def admin_get_all_courses():
    try:
        course_list = Course.query.all()

        # Courses are available
        if len(course_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "courses": [course.json() for course in course_list]
                    }
                }
            ), 200

        # Courses not available
        return jsonify(
            {
                "code": 404,
                "message": "There are no courses available."
            }
        ), 404

    # Error while retrieving courses
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the courses: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Search for courses'''

@app.route("/admin_search_for_courses/<string:search_query>")
def admin_search_for_courses(search_query):
    try:
        course_list = Course.query.filter(Course.course_name.contains(search_query)).all()

        # Matching courses
        if len(course_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "courses": [course.json() for course in course_list]
                    }
                }
            ), 200
        
        # No matching courses
        return jsonify(
            {
                "code": 404,
                "message": "No courses match."
            }
        ), 404

    # Error while retrieving courses
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the courses: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Delete course'''

@app.route("/admin_delete_course/<string:course_id>", methods=['GET', 'DELETE'])
def admin_delete_course(course_id):
    try:
        course = Course.query.filter_by(course_id=course_id).first()

        # If course to be deleted is found 
        if course:
            db.session.delete(course)
            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "message": "Course deleted."
                }
            ), 200
        
        # If course to be deleted is not found
        return jsonify(
            {
                "code": 404,
                "message": "Course not found."
            }
        ), 404

    # Error while deleting course
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while deleting the course: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Create course'''

@app.route("/admin_create_course", methods=['POST'])
def admin_create_course():
    try:
        data = request.get_json()

        # If not all blanks are filled
        if (data["course_id"] == "") or (data["course_name"] == "") or (data["course_desc"] == ""):
            return jsonify(
                {
                    "code": 400,
                    "message": "Please fill in all the blanks."
                }
            ), 400

        # If Course ID already present in the system
        elif (Course.query.filter_by(course_id = data["course_id"]).first()):
            return jsonify(
                {
                    "code": 400,
                    "message": "A course with course id '{}' already exists.".format(data["course_id"])
                }
            ), 400

        # If Course ID not present in the system
        course = Course(course_id=data["course_id"], course_name=data["course_name"], course_desc=data["course_desc"])
        prerequisite = Prerequisite(course_id=data["course_id"], prerequisite_id=data["prerequisite_id"])

        db.session.add(course)
        db.session.add(prerequisite)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "course": course.json(),
                "prerequisite": prerequisite.json()
            }
        ), 201


    # Error while creating course
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the course: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Get Course Details'''

@app.route("/admin_get_course_details/<string:course_id>")
def admin_get_course_details(course_id):
    try:
        course = Course.query.filter_by(course_id=course_id).first()
        prerequisite = Prerequisite.query.filter_by(course_id=course_id).first()
        class_list = Class.query.filter_by(course_id=course_id).all()

        trainer_list = Employee.query.filter_by(current_designation="TRAINER").all()

        # If course is found, everything else should be found due to references
        if course:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "course": course.json(),
                        "prerequisite": prerequisite.json(),
                        "classes": [classes.json() for classes in class_list],
                        "trainers": [trainer.json() for trainer in trainer_list]
                    }
                }
            ), 200
        
        # If course is not found
        return jsonify(
            {
                "code": 404,
                "message": "Course does not exist."
            }
        ), 404

    # Error while retrieving course and trainer details
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the course and trainer details: " + str(e)
            }
        ), 500
        
# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Create class '''

@app.route("/admin_create_class", methods=['POST'])
def admin_create_class():
    try:
        data = request.get_json()

        # If not all blanks are filled
        if (data["class_id"] == "") or (data["class_start_datetime"] == "") or (data["class_end_datetime"] == "") or (data["total_class_size"] == "") or (data["enrolment_start_datetime"] == "") or (data["enrolment_end_datetime"] == ""):
            return jsonify(
                {
                    "code": 400,
                    "message": "Please fill in all the blanks."
                }
            ), 400

        # If Class ID already present in the system
        elif (Class.query.filter_by(class_id = data["class_id"]).first()):
            return jsonify(
                {
                    "code": 400,
                    "message": "A class with class id '{}' already exists.".format(data["class_id"])
                }
            ), 400


        # If Class ID not present in the system
        class_item = Class(course_id=data["course_id"], class_id=data["class_id"], trainer_name=data["trainer_name"], trainer_user_name=data["trainer_user_name"], class_start_datetime=data["class_start_datetime"], class_end_datetime=data["class_end_datetime"], enrolment_start_datetime=data["enrolment_start_datetime"], enrolment_end_datetime=data["enrolment_end_datetime"], current_class_size=data["current_class_size"], total_class_size=data["total_class_size"])

        db.session.add(class_item)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "class_item": class_item.json(),
            }
        ), 201

    # Error while creating course
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the class: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)