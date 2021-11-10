from app import app
from db import *
from flask import request, jsonify

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
        if (data["class_id"] == "") or (data["class_start_date"] == "") or (data["class_end_date"] == "") or (data["class_start_time"] == "") or (data["class_end_time"] == "") or (data["enrolment_start_date"] == "") or (data["enrolment_end_date"] == "") or (data["enrolment_start_date"] == "") or (data["enrolment_end_time"] == "") or (data["total_class_size"] == ""):
            return jsonify(
                {
                    "code": 400,
                    "message": "Please fill in all the blanks."
                }
            ), 400

        # If Class ID already present in the system
        elif (Class.query.filter_by(course_id=data["course_id"], class_id = data["class_id"]).first()):
            return jsonify(
                {
                    "code": 400,
                    "message": "A class with class id '{}' already exists.".format(data["class_id"])
                }
            ), 400

        # Invalid Input: class starts after it ends
        elif (data["class_start_datetime"] >= data["class_end_datetime"]):
            return jsonify(
                {
                    "code": 400,
                    "message": "Class must have valid start-end period."
                }
            ), 400

        # Invalid Input: enrolment starts after it ends
        elif (data["enrolment_start_datetime"] >= data["enrolment_end_datetime"]):
            return jsonify(
                {
                    "code": 400,
                    "message": "Class must have valid enrolment start-end period."
                }
            ), 400

        # Invalid Input: class starts before enrolment ends
        elif (data["enrolment_start_datetime"] >= data["class_start_datetime"]) and (data["enrolment_end_datetime"] >= data["class_start_datetime"]):
            return jsonify(
                {
                    "code": 400,
                    "message": "Class must only start after enrolment."
                }
            ), 400

        # Invalid Input: class starts before enrolment ends
        elif (data["total_class_size"] == "0"):
            return jsonify(
                {
                    "code": 400,
                    "message": "Class size cannot be 0."
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
'''Admin: View enrolment requests '''

@app.route("/view_enrolment_requests/<string:course_id>/<string:class_id>")
def view_enrolment_requests(course_id, class_id):
    try:
        enrolment_list = Enrolment_Request.query.filter_by(course_id=course_id, class_id=class_id).all()

        # If enrolments are found
        if len(enrolment_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "enrolment": [enrolment.json() for enrolment in enrolment_list]
                    }
                }
            ), 200
        
        # If enrolments are not found
        return jsonify(
            {
                "code": 404,
                "message": "There are no enrolment requests."
            }
        ), 404

    # Error while retrieving enrolments
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the enrolments: " + str(e)
            }
        ), 500
        
# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: View confirmed learners '''

@app.route("/view_confirmed_learners/<string:course_id>/<string:class_id>")
def view_confirmed_learners(course_id, class_id):
    try:
        learner_course_list = Overall_Course_Progress.query.filter_by(course_id=course_id, class_id=class_id).all()

        # If learners are found
        if len(learner_course_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learner": [learner.json() for learner in learner_course_list]
                    }
                }
            ), 200
        
        # If learners are not found
        return jsonify(
            {
                "code": 404,
                "message": "There are no confirmed learners."
            }
        ), 404

    # Error while retrieving learners
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the learners: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Get all learners'''

@app.route("/admin_get_all_learners")
def admin_get_all_learners():
    try:
        learner_list = Employee.query.filter_by(current_designation="LEARNER").all()

        # Learners are available
        if len(learner_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learners": [learner.json() for learner in learner_list]
                    }
                }
            ), 200

        # Learners not available
        return jsonify(
            {
                "code": 404,
                "message": "There are no learners available."
            }
        ), 404

    # Error while retrieving learners
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the learners: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Search for learners'''

@app.route("/admin_search_for_learners/<string:search_query>")
def admin_search_for_learners(search_query):
    try:
        learner_list = Employee.query.filter(Employee.user_name.contains(search_query), 
        Employee.current_designation.contains("LEARNER")).all()

        # Matching learners
        if len(learner_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learners": [learner.json() for learner in learner_list]
                    }
                }
            ), 200
        
        # No matching learners
        return jsonify(
            {
                "code": 404,
                "message": "No learners match."
            }
        ), 404

    # Error while retrieving learners
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the learners: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Get learner details'''

@app.route("/admin_get_learner_details/<string:user_name>")
def admin_get_learner_details(user_name):
    try:
        learner_current_courses = Overall_Course_Progress.query.filter_by(user_name=user_name).all()
        learner_completed_courses = Completed_Courses.query.filter_by(user_name=user_name).all()

        # If learner has at least completed/attempted one course
        if (len(learner_current_courses) != 0) or (len(learner_completed_courses) != 0):
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learner_current_courses": [current_course.json() for current_course in learner_current_courses],
                        "learner_completed_courses": [completed_course.json() for completed_course in learner_completed_courses]
                    }
                }
            ), 200

        # Learner has not attempted or completed anything
        return jsonify(
            {
                "code": 404,
                "message": "Learner has not completed or attempted any courses."
            }
        ), 404

    # Error while retrieving learners
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the learners: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: View eligible learners '''

@app.route("/view_eligible_learners/<string:course_id>")
def view_eligible_learners(course_id):
    try:
        learner_list = Employee.query.filter_by(current_designation="LEARNER").all()
        all_learner_current_course = Overall_Course_Progress.query.filter_by(course_id=course_id).all()
        all_learner_completed_course = Completed_Courses.query.filter_by(course_id=course_id).all()
        qualified_learners = []
        unqualified_learners = []
        learner_list_only_names = []

        # Returns only qualified learners
        for learner in all_learner_current_course:
            for system_learner in learner_list:
                if (learner.json()["user_name"] == system_learner.json()["user_name"]):
                    unqualified_learners.append(system_learner.json()["user_name"])

        for learner in all_learner_completed_course:
            for system_learner in learner_list:
                if (learner.json()["user_name"] == system_learner.json()["user_name"]):
                    unqualified_learners.append(system_learner.json()["user_name"])

        for learner in learner_list:
            learner_list_only_names.append(learner.json()["user_name"]) 

        qualified_learners = set(learner_list_only_names) ^ set(unqualified_learners)

        return jsonify({
            "code": 200,
            "data": {
                "qualified_learners": list(qualified_learners)
            }
        }), 200


    # Error while retrieving qualified learners
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the eligible learners: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Assign Learner'''

@app.route("/admin_assign_learner", methods=['POST'])
def admin_assign_learner():
    try:
        data = request.get_json()

        confirmed_learner = Overall_Course_Progress(**data)
        class_obj = Class.query.filter_by(course_id=data["course_id"], class_id=data["class_id"]).first()

        db.session.add(confirmed_learner)
        class_obj.current_class_size += 1
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "confirmed_learner": confirmed_learner.json(),
            }
        ), 201

    # Error while assigning learner
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while assigning the learner: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Approve Enrolment'''

@app.route("/admin_approve_enrolment", methods=['POST'])
def admin_approve_enrolment():
    try:
        data = request.get_json()

        approved_learner = Overall_Course_Progress(**data)
        class_obj = Class.query.filter_by(course_id=data["course_id"], class_id=data["class_id"]).first()

        db.session.add(approved_learner)
        class_obj.current_class_size += 1
        db.session.commit()


        return jsonify(
            {
                "code": 201,
                "approved_learner": approved_learner.json()
            }
        ), 201

    # Error while approving learner
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while approving the learner: " + str(e)
            }
        ), 500

# ----------------------------------------------------------------------------------------------------------------------------- #
'''Admin: Delete enrolment request'''

@app.route("/admin_delete_enrolment_request/<string:user_name>/<string:course_id>/<string:class_id>", methods=['GET', 'DELETE'])
def admin_delete_enrolment_request(user_name, course_id, class_id):
    try:
        enrolment_request = Enrolment_Request.query.filter_by(course_id=course_id, user_name=user_name, class_id=class_id).first()

        # If Enrolment Request to be deleted is found 
        if enrolment_request:
            db.session.delete(enrolment_request)
            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "message": "Enrolment Request deleted."
                }
            ), 200
        
        # If Enrolment Request to be deleted is not found
        return jsonify(
            {
                "code": 404,
                "message": "Enrolment Request not found."
            }
        ), 404

    # Error while deleting Enrolment Request
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while deleting the Enrolment Request: " + str(e)
            }
        ), 500