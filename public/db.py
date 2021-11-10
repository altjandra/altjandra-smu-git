from app import app
from flask_sqlalchemy import SQLAlchemy

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
                                           'pool_recycle': 280}

db = SQLAlchemy(app)

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
    no_of_sections = db.Column(db.Integer, nullable=False)
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
            "no_of_sections": self.no_of_sections,
            "final_quiz_id": self.final_quiz_id
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Completed_Courses Table

class Completed_Courses(db.Model):
    __tablename__ = 'completed_courses'

    user_name = db.Column(db.String(32), db.ForeignKey('employee.user_name'), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey('class.course_id'), primary_key=True)
    final_quiz_grade = db.Column(db.Float, db.ForeignKey('quiz.quiz_id'), nullable=False)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "course_id": self.course_id, 
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
    name = db.Column(db.String(32), nullable=False)
    course_id = db.Column(db.String(10), db.ForeignKey('class.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    status = db.Column(db.String(100), nullable=False)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "name": self.name,
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
    name = db.Column(db.String(32), nullable=False)
    course_id = db.Column(db.String(10), db.ForeignKey('class.class_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    sections_completed = db.Column(db.Integer, nullable=False)
    final_quiz_grade = db.Column(db.Float, nullable=True)

    def json(self):
        dto = {
            "user_name": self.user_name,
            "name": self.name,
            "course_id": self.course_id,
            "class_id": self.class_id,
            "sections_completed": self.sections_completed,
            "final_quiz_grade": self.final_quiz_grade
        }
        
        return dto

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

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Eligible_Learners Table

class Eligible_Learners(db.Model):
    __tablename__ = 'eligible_learners'

    course_id = db.Column(db.String(10), db.ForeignKey('course.course_id'), primary_key=True)
    user_name = db.Column(db.String(32), primary_key=True)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "user_name": self.user_name,
        }
        
        return dto

db.create_all()
