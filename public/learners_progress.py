from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

from courses import Course
from learners import Employee

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
# app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
#                                            'pool_recycle': 280}

db = SQLAlchemy(app)
CORS(app)
        
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

# ----------------------------------------------------------------------------------------------------------------------------- #
# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get all current courses of a learner by user_name [GET]

@app.route("/current_courses/<string:user_name>")
def get_current_courses_by_user_name(user_name):
    try:
        current_courses = Current_Course.query.filter_by(user_name=user_name).all()

        if len(current_courses) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "current courses": [current_course.json() for current_course in current_courses]
                    }
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "No current courses available."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the current courses: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get all completed courses of a learner by user_name [GET]

@app.route("/completed_courses/<string:user_name>")
def get_completed_courses_by_user_name(user_name):
    try:
        completed_courses = Completed_Course.query.filter_by(user_name=user_name).all()

        if len(completed_courses) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "completed courses": [completed_course.json() for completed_course in completed_courses]
                    }
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "No completed courses available."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the completed courses: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - create current course of a learner [POST]

@app.route("/create_current_course", methods=['POST'])
def create_current_course():
    try:
        data = request.get_json()

        current_course = Current_Course(**data)

        db.session.add(current_course)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "data": current_course.json()
            }
        ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the current course. " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - delete current course of a learner by user name and course id [DELETE]

@app.route("/delete_current_course/<string:user_name>/<string:course_id>", methods=['DELETE'])
def delete_current_course(user_name, course_id):
    try:
        current_course = Current_Course.query.filter_by(user_name=user_name, course_id=course_id).first()

        if current_course:
            db.session.delete(current_course)
            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "message": "Current course deleted."
                }
            ), 200
        
        else:
            return jsonify(
                {
                    "code": 404,
                    "message": "Current course not found."
                }
            ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while deleting the current course: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - create completed course of a learner [POST]

@app.route("/create_completed_course", methods=['POST'])
def create_completed_course():
    try:
        data = request.get_json()

        completed_course = Completed_Course(**data)

        db.session.add(completed_course)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "data": completed_course.json()
            }
        ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the completed course. " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5300, debug=True)