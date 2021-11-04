from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from models import *

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
                                           'pool_recycle': 280}

db = SQLAlchemy(app)
CORS(app)

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: View all courses (course_mgmt.php)'''

@app.route("/view_all_courses")
def view_all_courses():
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
'''Admin:  Search for courses (course_mgmt.php)'''

@app.route("/search_for_courses/<string:search_query>")
def search_for_courses(search_query):
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
'''Function 2 - Admin assign learners/engineers to courses'''



if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)