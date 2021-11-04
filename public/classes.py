from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

from courses import Course
from learners_progress import Current_Course

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
# app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
#                                            'pool_recycle': 280}

db = SQLAlchemy(app)
CORS(app)

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
            "end_date": self.end_date
        }
        
        return dto

    def add_current_class_intake(self, amt):
        self.current_class_intake += amt
        return self.current_class_intake

db.create_all()

# ----------------------------------------------------------------------------------------------------------------------------- #
# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get all classes [GET]

@app.route("/classes")
def get_all_classes():
    try:
        class_list = Class.query.all()

        if len(class_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "classes": [classes.json() for classes in class_list]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no classes available."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the classes: " + str(e)
            }
        ), 500
# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get all learners of a class by course_id and class_id [GET]

@app.route("/classes/<string:course_id>/<string:class_id>")
def get_class_learners_by_course_id_and_class_id(course_id, class_id):
    try:
        learner_class_list = Class.query.filter_by(course_id=course_id, class_id=class_id).all()

        if len(learner_class_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learners": [learner.json() for learner in learner_class_list]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no learners available for this class."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the learners for this class: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get/search for learners by search query, course id and class id  [GET]

@app.route("/classes/<string:course_id>/<string:class_id>/<string:search_query>")
def get_learners_by_course_id_class_id_search_query(course_id, class_id, search_query):
    try:
        learner_class_list = Current_Course.query.filter(Current_Course.user_name.contains(search_query),course_id==course_id, class_id==class_id).all()

        if len(learner_class_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learners": [learner.json() for learner in learner_class_list]
                    }
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "No learners match."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the learners: " + str(e)
            }
        ), 500
# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - create a class [POST]

@app.route("/create_class", methods=['POST'])
def create_class():
    try:
        data = request.get_json()
        class_entry = Class(**data)

        db.session.add(class_entry)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "data": class_entry.json()
            }
        ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the class: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - update existing class by course id and class_id [PUT]

@app.route("/update_class/<string:course_id>/<string:class_id>", methods=['PUT'])
def update_class_by_course_id_and_class_id(course_id, class_id):
    try:
        class_entry = Class.query.filter_by(course_id=course_id, class_id=class_id).first()
        if not class_entry:
            return jsonify(
                {
                    "code": 404,
                    "message": "Class not found."
                }
            ), 404

        else:
            # update course details
            data = request.get_json()

            if data["trainer_name"]:
                class_entry.trainer_name = data["trainer_name"]

            if data["start_time"]:
                class_entry.start_time = data["start_time"]

            if data["end_time"]:
                class_entry.end_time = data["end_time"]

            if data["class_size"]:
                class_entry.class_size = data["class_size"]    

            if data["start_date"]:
                class_entry.start_date = data["start_date"]  

            if data["end_date"]:
                class_entry.end_date = data["end_date"]  

            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "data": class_entry.json()
                }
            ), 200

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while updating the class: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #



if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5200, debug=True)