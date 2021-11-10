from app import app
from flask_cors import CORS
from routes import *

cors = CORS(app)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)