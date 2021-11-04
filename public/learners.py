from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from models import Employee

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/spm'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
# app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_size': 100,
#                                            'pool_recycle': 280}

db = SQLAlchemy(app)
CORS(app)

# ----------------------------------------------------------------------------------------------------------------------------- #
# Function - get all learners [GET]

@app.route("/employees/learners")
def get_all_learners():
    try:
        learner_list = Employee.query.filter_by(current_designation="LEARNER").all()

        if len(learner_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learners": [learner.json() for learner in learner_list]
                    }
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "No learners available."
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
# Function - get/search for learners by search query [GET]

@app.route("/employees/learners/<string:search_query>")
def get_learners_by_search_query(search_query):
    try:
        learner_list = Employee.query.filter(Employee.user_name.contains(search_query), 
        Employee.current_designation.contains("LEARNER")).all()

        if len(learner_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "learners": [learner.json() for learner in learner_list]
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

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)