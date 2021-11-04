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
#SPM Database - Employee Table

class Employee(db.Model):
    __tablename__ = 'employee'

    user_name = db.Column(db.String(32), primary_key=True)
    employee_name = db.Column(db.String(64))
    current_designation = db.Column(db.String(64))
    department = db.Column(db.String(64))

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "employee_name": self.employee_name, 
            "current_designation": self.current_designation, 
            "department": self.department
        }

        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Course Table

class Course(db.Model):
    __tablename__ = 'course'

    course_id = db.Column(db.String(10), primary_key=True)
    course_name = db.Column(db.String(100))
    course_desc = db.Column(db.String(1000))
    current_course_intake = db.Column(db.Integer)
    total_learners = db.Column(db.Integer)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "course_name": self.course_name,
            "course_desc": self.course_desc, 
            "current_course_intake": self.current_course_intake,
            "total_learners": self.total_learners
        }
        
        return dto

    def add_current_course_intake(self, no_learner_confirmed):
        self.current_course_intake += no_learner_confirmed
        return self.current_course_intake

    def add_total_learners(self, class_size):
        self.total_learners += class_size
        return self.total_learners

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Classes Table

class Class(db.Model):
    __tablename__ = 'class'

    course_id = db.Column(db.String(10), db.ForeignKey(Course.course_id), primary_key=True)
    class_id = db.Column(db.String(10), primary_key=True)
    trainer_name = db.Column(db.String(64))
    start_time = db.Column(db.String(64))
    end_time = db.Column(db.String(64))
    current_class_intake = db.Column(db.Integer)
    class_size = db.Column(db.Integer)
    start_date = db.Column(db.DateTime)
    end_date = db.Column(db.DateTime)
    enrolment_start = db.Column(db.DateTime)
    enrolment_end = db.Column(db.DateTime)

    def json(self):
        dto = {
            "course_id": self.course_id, 
            "class_id": self.class_id, 
            "trainer_name": self.trainer_name, 
            "start_time": self.start_time,
            "end_time": self.end_time,
            "current_class_intake": self.current_class_intake,
            "class_size": self.class_size,
            "start_date": self.start_date,
            "end_date": self.end_date,
            "enrolment_start": self.enrolment_start,
            "enrolment_end": self.enrolment_end
        }
        
        return dto

    def add_current_class_intake(self, no_learner_confirmed):
        self.current_class_intake += no_learner_confirmed
        return self.current_class_intake

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Prerequisite Table

class Prerequisite(db.Model):
    __tablename__ = 'prerequisite'

    course_id = db.Column(db.String(10), db.ForeignKey(Course.course_id), primary_key=True)
    prerequisite_id = db.Column(db.String(10), primary_key=True)
    
    def json(self):
        dto = {
            "course_id": self.course_id, 
            "prerequisite_id": self.prerequisite_id
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Completed_Course (of learner) Table

class Completed_Course(db.Model):
    __tablename__ = 'completed_course'

    user_name = db.Column(db.String(32), db.ForeignKey(Employee.user_name), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey(Course.course_id), primary_key=True)

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "course_id": self.course_id
        }
        
        return dto

# ----------------------------------------------------------------------------------------------------------------------------- #
#SPM Database - Current_Course (of learner) Table

class Current_Course(db.Model):
    __tablename__ = 'current_course'

    user_name = db.Column(db.String(32), db.ForeignKey(Employee.user_name), primary_key=True)
    course_id = db.Column(db.String(10), db.ForeignKey(Course.course_id), primary_key=True)
    class_id = db.Column(db.String(10))

    def json(self):
        dto = {
            "user_name": self.user_name, 
            "course_id": self.course_id,
            "class_id": self.class_id
        }
        
        return dto

db.create_all()


