<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>Learner Details</title>

  <!-- Installs all relevant and common codelinks across pages -->
  <?php include '../include/codelinks.php'; ?>
</head>

<!-- Internal CSS -->
<style>
  body {
    background-color: #f5f5f5;
  }

  #navbar {
    background-color: #fff;
    position: sticky;
    top: 0px;
  }

  .learner-profile .card .card-header .profile_img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 10px auto;
    border: 10px solid #96BB7C;
    border-radius: 50%;
  }

  .learner-profile .card h3 {
    font-size: 20px;
    font-weight: 700;
  }
</style>

<body>
  <!--Admin Nav Bar-->
  <nav class="navbar navbar-expand-lg navbar-light py-4 px-md-5 position-relative z-index-1" id="navbar">
    <a class="navbar-brand">
      <h1 class="h3 mt-0">All-In-One</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
        class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse ms-lg-5 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="course_mgmt.php"><span>Course Management</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="learner_mgmt.php"><span>Learners Management</span></a>
        </li>
      </ul>
      <ul class="navbar-nav mt-4 mt-lg-0 ms-auto align-items-center">
        <li class="nav-item">
          <a class="primary-text-color"><strong>Welcome, Zora! [Admin] </strong></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="learner-profile py-4">
    <div class="container">
      <div class="row">

        <!--Profile Pic Card and Name -->
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="../img/Placeholder.jpg" alt="">
              <h3 id="learner_name"></h3>
            </div>
          </div>
        </div>

        <!--Profile Information-->
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <div class="row">
                <div class="col">
                  <i class="material-icons" style="padding-top: 5px;">&#xe85e;</i>
                </div>

                <div class="col" style="margin-left: -650px;">
                  <h3 style="margin-top: 4px;">
                    Learner's Information</h3>
                </div>
              </div>

              <div>
                <h6 class="h6 text-color" style="margin-top: 30px">
                  Courses In-Progress
                </h6>

                <ul class="list-group" id="courses_in_progress_table">
                </ul>

                <div id="error_courses_in_progress"></div>
              </div>

              <div>
                <h6 class="h6 text-color" style="margin-top: 30px">
                  Courses Taken
                </h6>

                <ul class="list-group" id="courses_completed_table">
                </ul>

                <div id="error_completed_courses"></div>
              </div>
            </div>
          </div>
        </div>
</body>

<!-- All Javascript functions to link app.py routes to UI functionalities -->

<!-- Function: (Admin) view learner details  -->
<!-- On load, admin is able to see the selected learner details -->
<script>
  window.onload = function admin_get_learner_details() {
    var learner_name = document.getElementById("learner_name")

    var user_name = sessionStorage.getItem("user_name")
    var name = user_name.charAt(0).toUpperCase() + user_name.slice(1)
    name = name.substring(0, name.length - 5)

    document.getElementById("learner_name").innerHTML = name

    // Get trainer details route 
    url = `http://3.139.154.29:5000/admin_get_learner_details/${user_name}`

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          document.getElementById("error_courses_in_progress").innerHTML = data["message"]
          document.getElementById("error_completed_courses").innerHTML = data["message"]
        }

        // No error received - Display respectively
        else {
          // If there are no current courses
          if (data["data"]["learner_current_courses"].length == 0) {
            document.getElementById("error_courses_in_progress").innerHTML = `User has no current courses.`
          }

          // If there are current courses
          else {
            for (var i = 0; i < data["data"]["learner_current_courses"].length; i++) {
              var course_id = data["data"]["learner_current_courses"][i]["course_id"]

              var current_course_str =
                `<li class="list-group-item">${course_id}</li>`

              document.getElementById("courses_in_progress_table").innerHTML += current_course_str
            }
          }

          // If there are no completed courses
          if (data["data"]["learner_completed_courses"].length == 0) {
            document.getElementById("error_completed_courses").innerHTML = `User has no completed courses.`
          }

          // If there are completed courses
          else {
            for (var i = 0; i < data["data"]["learner_completed_courses"].length; i++) {
              var course_id = data["data"]["learner_completed_courses"][i]["course_id"]

              var completed_course_str =
                `<li class="list-group-item">${course_id}</li>`

              document.getElementById("courses_completed_table").innerHTML += completed_course_str
            }
          }
        }
      })


  }
</script>

</html>