from flask import Flask
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
#SPM Database - Class Table

class Class(db.Model):
    __tablename__ = 'class'

    course_id = db.Column(db.String(10), db.ForeignKey('course.course_id'), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    trainer_name = db.Column(db.String(100), nullable=False)
    class_start_datetime = db.Column(db.DateTime, nullable=False)
    class_end_datetime = db.Column(db.DateTime, nullable=False)
    enrolment_start_datetime = db.Column(db.DateTime, nullable=False)
    enrolment_end_datetime = db.Column(db.DateTime, nullable=False)
    current_class_size = db.Column(db.Integer, nullable=True)
    total_class_size = db.Column(db.Integer, nullable=False)
    final_quiz_id = db.Column(db.String(100), db.ForeignKey('quiz.quiz_id'), nullable=True)

    def __init__(self, course_id, class_id, trainer_name, class_start_datetime, class_end_datetime, enrolment_start_datetime, enrolment_end_datetime, current_class_size, total_class_size, final_quiz_id):
        self.course_id = course_id
        self.class_id = class_id
        self.trainer_name = trainer_name
        self.class_start_datetime = class_start_datetime
        self.class_end_datetime = class_end_datetime
        self.enrolment_start_datetime = enrolment_start_datetime
        self.enrolment_end_datetime = enrolment_end_datetime
        self.current_class_size = current_class_size
        self.total_class_size = total_class_size
        self.final_quiz_id = final_quiz_id

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "class_id": self.class_id, 
            "trainer_name": self.trainer_name, 
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

    def __init__(self, user_name, course_id, class_id, final_quiz_grade):
        self.user_name = user_name
        self.course_id = course_id
        self.class_id = class_id
        self.final_quiz_grade = final_quiz_grade

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

    def __init__(self, course_id, course_name, course_desc):
        self.course_id = course_id
        self.course_name = course_name
        self.course_desc = course_desc

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

    def __init__(self, course_id, class_id, section, materials, quiz_id):
        self.course_id = course_id
        self.class_id = class_id
        self.section = section
        self.materials = materials
        self.quiz_id = quiz_id

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

    def __init__(self, user_name, course_id, class_id, section, section_materials_status, section_quiz_status):
        self.user_name = user_name
        self.course_id = course_id
        self.class_id = class_id
        self.section = section
        self.section_materials_status = section_materials_status
        self.section_quiz_status = section_quiz_status

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

    def __init__(self, user_name, employee_name, current_designation, department):
        self.user_name = user_name
        self.employee_name = employee_name
        self.current_designation = current_designation
        self.department = department

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

    def __init__(self, user_name, course_id, class_id, status):
        self.user_name = user_name
        self.course_id = course_id
        self.class_id = class_id
        self.status = status


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

    def __init__(self, user_name, course_id, class_id, sections_completed, current_section, final_quiz_grade):
        self.user_name = user_name
        self.course_id = course_id
        self.class_id = class_id
        self.sections_completed = sections_completed
        self.current_section = current_section
        self.final_quiz_grade = final_quiz_grade

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

    def __init__(self, course_id, prerequisite_id):
        self.course_id = course_id
        self.prerequisite_id = prerequisite_id
    
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

    def __init__(self, quiz_id, quiz_pass):
        self.quiz_id = quiz_id
        self.quiz_pass = quiz_pass

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

    def __init__(self, quiz_id, question_no, question_type, question_desc):
        self.quiz_id = quiz_id
        self.question_no = question_no
        self.question_type = question_type
        self.question_desc = question_desc

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

    def __init__(self, quiz_id, question_no, option_id, option_desc, option_status):
        self.quiz_id = quiz_id
        self.question_no = question_no
        self.option_id = option_id
        self.option_desc = option_desc
        self.option_status = option_status

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


