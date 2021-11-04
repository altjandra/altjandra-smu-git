from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
# app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
#                                            'pool_recycle': 280}

db = SQLAlchemy(app)
CORS(app)

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Course Table

class Course(db.Model):
    __tablename__ = 'course'

    course_id = db.Column(db.String(10), primary_key=True)
    course_name = db.Column(db.String(100))
    course_desc = db.Column(db.String(1000))
    current_course_intake = db.Column(db.Integer)
    total_learners = db.Column(db.Integer)
    enrolment_start = db.Column(db.DateTime)
    enrolment_end = db.Column(db.DateTime)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "course_name": self.course_name,
            "course_desc": self.course_desc, 
            "current_course_intake": self.current_course_intake,
            "total_learners": self.total_learners, 
            "enrolment_start": self.enrolment_start,
            "enrolment_end": self.enrolment_end
        }
        
        return dto

    def add_current_course_intake(self, amt):
        self.current_course_intake += amt
        return self.current_course_intake

    def add_total_learners(self, class_size):
        self.total_learners += class_size
        return self.total_learners

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Prerequisite Table

class Prerequisite(db.Model):
    __tablename__ = 'prerequisite'

    course_id = db.Column(db.String(10), db.ForeignKey(Course.course_id), primary_key=True)
    prerequisite_id = db.Column(db.String(10), db.ForeignKey(Course.course_id), primary_key=True)
    
    def json(self):
        dto = {
            "course_id": self.course_id, 
            "prerequisite_id": self.prerequisite_id
        }
        
        return dto

db.create_all()

# ----------------------------------------------------------------------------------------------------------------------------- #
# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get all courses [GET]

@app.route("/courses")
def get_all_courses():
    try:
        course_list = Course.query.all()

        if len(course_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "courses": [course.json() for course in course_list]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no courses available."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the courses: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get/search for courses by search query [GET]

@app.route("/courses/<string:search_query>")
def get_courses_by_search_query(search_query):
    try:
        course_list = Course.query.filter(Course.course_name.contains(search_query)).all()

        if len(course_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "courses": [course.json() for course in course_list]
                    }
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "No courses match."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the courses: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get a course prerequisite by course_id [GET]

@app.route("/prerequisite/<string:course_id>")
def get_course_prerequisite_by_course_id(course_id):
    try:
        prerequisite = Prerequisite.query.filter_by(course_id=course_id).first()

        if prerequisite:
            return jsonify(
                {
                    "code": 200,
                    "data": prerequisite.json()
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "Course has no prerequisite."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the prerequisite: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - create a course [POST]

@app.route("/create_course", methods=['POST'])
def create_course():
    try:
        data = request.get_json()

        if (Course.query.filter_by(course_id = data["course_id"]).first()):
            return jsonify(
                {
                    "code": 400,
                    "message": "A course with course id '{}' already exists.".format(data["course_id"])
                }
            ), 400

        else:
            course = Course(**data)
            db.session.add(course)

            db.session.commit()

            return jsonify(
                {
                    "code": 201,
                    "data": course.json()
                }
            ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the course: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - create a prerequisite during course creation (create new course button) [POST]

@app.route("/create_prerequisite", methods=['POST'])
def create_prerequisite():
    try:
        data = request.get_json()
        prerequisite = Prerequisite(**data)

        db.session.add(prerequisite)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "data": prerequisite.json()
            }
        ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the prerequisite. " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - update existing course by course id [PUT]

@app.route("/update_course/<string:course_id>", methods=['PUT'])
def update_course_by_course_id(course_id):
    try:
        course = Course.query.filter_by(course_id=course_id).first()
        if not course:
            return jsonify(
                {
                    "code": 404,
                    "message": "Course not found."
                }
            ), 404

        else:
            # update course details
            data = request.get_json()

            if data["course_name"]:
                course.course_name = data["course_name"]

            if data["course_desc"]:
                course.course_name = data["course_desc"]

            if data["enrolment_start"]:
                course.enrolment_start = data["enrolment_start"]

            if data["enrolment_end"]:
                course.enrolment_end = data["enrolment_end"]    

            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "data": course.json()
                }
            ), 200

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while updating the course: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - delete course by course id [DELETE]

@app.route("/delete_course/<string:course_id>", methods=['DELETE'])
def delete_course_by_course_id(course_id):
    try:
        course = Course.query.filter_by(course_id=course_id).first()

        if course:
            db.session.delete(course)
            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "message": "Course deleted."
                }
            ), 200
        
        else:
            return jsonify(
                {
                    "code": 404,
                    "message": "Course not found."
                }
            ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while deleting the course: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5100, debug=True)