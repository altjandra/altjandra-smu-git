<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>Course Detail</title>

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

  .background-pic {
    width: 700px;
    height: 100px;
  }

  table.table tr th:first-child {
    width: 60px;
  }

  table.table tr th:last-child {
    width: 100px;
  }

  table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
  }

  table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }

  table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
  }

  table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
  }

  table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
  }

  table.table td a:hover {
    color: #96BB7C;
  }

  table.table td a.settings {
    color: #96BB7C;
  }

  table.table td a.delete {
    color: #F44336;
  }

  table.table td i {
    font-size: 19px;
  }

  .table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 170px;
    width: 250px;
  }

  #create_popup {
    z-index: 9999;
  }

  /* Full-width input fields */
  .form-container input[type=text],
  .form-container input[type=number],
  .form-container input[type=date],
  .form-container input[type=time] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 10px 0;
    border: 2px solid #f1f1f1;
    border-radius: 10px;
    background: #fff;
  }

  /* When the inputs get focus, do something */
  .form-container input[type=text]:focus {
    background-color: #f1efef;
    outline: none;
  }

  .trainers_available {
    font-size: 13px;
    padding: 10px 8px 10px 14px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 6px;
    overflow: hidden;
    position: relative;
    margin-bottom: 20px;
  }

  .trainers_available .select select {
    background: transparent;
    line-height: 1;
    border: 0;
    padding: 0;
    border-radius: 0;
    width: 100%;
    position: relative;
    z-index: 10;
    font-size: 1em;
  }
</style>

<body>
  <!-- Admin Nav Bar -->
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

  <!--Background Image-->
  <div class="product-item light-background-color">
    <div class="product-media position-relative" style="height: 300px">
      <!-- Default BG image for all-->
      <img class="zoom cover" src="../img/printer.jpg" alt="">
    </div>

    <!-- Course details content -->
    <div style="padding: 25px 25px 35px 25px">
      <!-- To populate Course ID: Course Name -->
      <h5 id="course_selected"></h5>
      <!-- To populate Course Description-->
      <p id="course_description"></p>
      <!-- To populate Course ID: Course Prerequisite -->
      <div class="d-flex" style="margin-top: 10px; padding: 5px 0px">
        <h5 id="course_prerequisite"></h5>
      </div>


      <h5 class="h5 text-color" style="margin-top: 60px;">Classes</h5>
      <!-- To create a new class -->
      <div>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#create_popup"
          style="background-color:grey; color:black;">
          <i class="material-icons">&#xE147;</i> <span>Create New Class</span>
        </button>
      </div>

      <!-- Main Class Table Content -->
      <table id="main_table" class="table table-striped table-hover">
        <thead id="main_table_headers">
          <tr>
            <th>Class</th>
            <th>Trainer Name</th>
            <th>Class Start - Class End</th>
            <th>Enrolment Start - Enrolment End</th>
            <th>Class Enrolment Status</th>
            <th>Class Size</th>
          </tr>
        </thead>

        <!-- On load, to display all classes in table -->
        <!-- By default, displays content. Will hide if no classes. -->
        <tbody id="classes_table"></tbody>
      </table>
    </div>
  </div>
</body>

<!--Popup for Create a Class-->
<div class="modal fade" id="create_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a Class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- To add new class details -->
        <form action="#" class="form-container">

          <!-- To enter New Class ID -->
          <label style="margin-top: 10px;" for="newclass_id"><b>Class ID</b></label>
          <input type="text" placeholder="Enter class ID" name="newclass_id" id="newclass_id">

          <!-- To assign Trainer Name -->
          <label style="margin-top: 10px;" for="newclass_trainername"><b>Trainer Name</b></label>
          <!-- On load, to display all the trainers available as trainer options -->
          <div class="trainers_available">
            <div class="select">
              <select name="trainers_available" id="trainers_available">
              </select>
            </div>
          </div>

          <!-- To enter Class Start Date -->
          <label style="margin-top: 10px;" for="newclass_start_date"><b>Class Start Date</b></label>
          <input type="date" name="newclass_start_date" id="newclass_start_date">

          <!-- To enter Class Start Time -->
          <label style="margin-top: 10px;" for="newclass_start_time"><b>Class Start Time</b></label>
          <input type="time" name="newclass_start_time" id="newclass_start_time">

          <!-- To enter Class End Date -->
          <label style="margin-top: 10px;" for="newclass_end_date"><b>Class End Date</b></label>
          <input type="date" name="newclass_end_date" id="newclass_end_date">

          <!-- To enter Class End Time -->
          <label style="margin-top: 10px;" for="newclass_end_time"><b>Class End Time</b></label>
          <input type="time" name="newclass_end_time" id="newclass_end_time">

          <!-- To enter Class Size -->
          <label style="margin-top: 10px;" for="newclass_size"><b>Class Size</b></label>
          <input type="number" placeholder="Enter class size" name="newclass_size" id="newclass_size">

          <!-- To enter Enrolment Start Date -->
          <label style="margin-top: 10px;" for="newenrolment_start_date"><b>Enrolment Start Date</b></label>
          <input type="date" name="newenrolment_start_date" id="newenrolment_start_date">

          <!-- To enter Enrolment Start Time -->
          <label style="margin-top: 10px;" for="newenrolment_start_time"><b>Enrolment Start Time</b></label>
          <input type="time" name="newenrolment_start_time" id="newenrolment_start_time">

          <!-- To enter Enrolment End Date -->
          <label style="margin-top: 10px;" for="newenrolment_end_date"><b>Enrolment End Date</b></label>
          <input type="date" name="newenrolment_end_date" id="newenrolment_end_date">

          <!-- To enter Enrolment End Time -->
          <label style="margin-top: 10px;" for="newenrolment_end_time"><b>Enrolment End Time</b></label>
          <input type="time" name="newenrolment_end_time" id="newenrolment_end_time">

          <!-- Options to close or create the class -->
          <div class="modal-footer">
            <button type="button" class="btn" style="background-color: #fff; border: 2px solid #999;"
              data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" style="background-color: #96BB7C; border-color: #96BB7C;"
              onclick="admin_create_class()">Create Class</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- All Javascript functions to link app.py routes to UI functionalities -->

<!-- Function: (Admin) view course details -->
<!-- On load, admin is able to see all the details of the course selected. -->
<script>
  window.onload = function admin_get_course_details() {
    const course_selected = document.getElementById("course_selected")
    const course_description = document.getElementById("course_description")
    const course_prerequisite = document.getElementById("course_prerequisite")
    const main_table = document.getElementById("main_table")
    const classes_table = document.getElementById("classes_table")
    const trainers_available = document.getElementById("trainers_available")

    var course_id = sessionStorage.getItem("course_id")

    // Get course & all trainers details route (from Course, Prerequisite, Employee, Class tables)
    url = `http://3.139.154.29:5000/admin_get_course_details/${course_id}`

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Alert error message
        if (data["code"] != 200) {
          main_table.innerHTML = data["message"]
        }

        // No error received - Display course and trainer details
        else {
          var course_name = data["data"]["course"]["course_name"]
          var course_desc = data["data"]["course"]["course_desc"]
          var prerequisite_id = data["data"]["prerequisite"]["prerequisite_id"]

          course_selected.innerHTML =
            `<h5 class="h5 text-color" style="margin-top: 10px">${course_id}: ${course_name}</h5>`
          course_description.innerHTML =
            `
          <p id="course_description" class="paragraph second-text-color" style="margin-top: 10px">
            ${course_desc}
          </p>
          `
          course_prerequisite.innerHTML = `<h5 class="h5 muted-text-color">Prerequisite: ${prerequisite_id}</h5>`

          // If there are no trainers to assign
          if (data["data"]["trainers"].length == 0) {
            var trainers_status_str = `No trainers to assign.`
            trainers_available.innerHTML = trainers_status_str
          }

          // If there are trainers to assign 
          else {
            for (var i = 0; i < data["data"]["trainers"].length; i++) {
              var trainer_user_name = data["data"]["trainers"][i]["user_name"]
              var trainer_employee_name = data["data"]["trainers"][i]["employee_name"]

              var trainer_str = `<option value="${trainer_user_name}">${trainer_employee_name}</option>`

              trainers_available.innerHTML += trainer_str
            }
          }

          // If there are no classes attached to the course
          if (data["data"]["classes"].length == 0) {
            var class_status_str = `No classes for this course.`
            main_table.innerHTML = class_status_str
          }

          //If there are classes attached to the course
          else {
            for (var i = 0; i < data["data"]["classes"].length; i++) {
              var class_id = data["data"]["classes"][i]["class_id"]
              var trainer_employee_name = data["data"]["classes"][i]["trainer_name"]
              var current_class_size = data["data"]["classes"][i]["current_class_size"]
              var total_class_size = data["data"]["classes"][i]["total_class_size"]

              var class_start_datetime = new Date(data["data"]["classes"][i]["class_start_datetime"])

              var class_end_datetime = new Date(data["data"]["classes"][i]["class_end_datetime"])

              var enrolment_start_datetime = new Date(data["data"]["classes"][i]["enrolment_start_datetime"])

              var enrolment_end_datetime = new Date(data["data"]["classes"][i]["enrolment_end_datetime"])

              var current_datetime = new Date()

              if (current_datetime.getTime() < enrolment_start_datetime.getTime()) {
                var class_status = "ENROLMENT NOT STARTED"
              } 
              
              else if (current_datetime.getTime() >= enrolment_start_datetime.getTime() && current_datetime
                .getTime() <
                enrolment_end_datetime.getTime()) {
                var class_status = "ENROLMENT IN PROGRESS"
              } 
              
              else if ((current_datetime.getTime() >= enrolment_start_datetime.getTime() && current_datetime
                .getTime() >= enrolment_end_datetime.getTime()) || current_class_size == total_class_size) {
                var class_status = "ENROLMENT ENDED"
              }

              var class_str =
                `
              <tr>
                <td><a href="#" onclick="admin_select_class('${class_id}', '${class_status}')">${class_id}</a></td>
                <td>${trainer_employee_name}</td>
                <td>${class_start_datetime.toLocaleString()} - ${class_end_datetime.toLocaleString()}</td>
                <td>${enrolment_start_datetime.toLocaleString()} - ${enrolment_end_datetime.toLocaleString()}</td>
                <td>${class_status}</td>
                <td>${current_class_size}/${total_class_size}</td>
              </tr>
              `

              classes_table.innerHTML += class_str
            }

          }

        }
      })
  }
</script>

<!-- Function: Date validation when creating class -->
<!-- On load, the date options should only show from today onwards. -->
<script>
  var today = new Date()
  var dd = today.getDate()
  var mm = today.getMonth() + 1
  var yyyy = today.getFullYear()

  if (dd < 10) {
    dd = '0' + dd;
  }

  if (mm < 10) {
    mm = '0' + mm;
  }

  today = yyyy + '-' + mm + '-' + dd
  document.getElementById("newclass_start_date").setAttribute("min", today)
  document.getElementById("newclass_end_date").setAttribute("min", today)
  document.getElementById("newenrolment_start_date").setAttribute("min", today)
  document.getElementById("newenrolment_end_date").setAttribute("min", today)
</script>

<!-- Function: (Admin) creates a class -->
<!-- On click, admin is able to create a new class. -->
<script>
  function admin_create_class() {
    event.preventDefault()
    var newclass_id = document.getElementById("newclass_id").value
    var newclasstrainer_user_name = document.getElementById("trainers_available").value
    var newclass_trainer_name = $("#trainers_available option:selected").text()

    var newclass_start_datetime = document.getElementById("newclass_start_date").value + " " + document.getElementById(
      "newclass_start_time").value

    var newclass_end_datetime = document.getElementById("newclass_end_date").value + " " + document.getElementById(
      "newclass_end_time").value

    var newenrolment_start_datetime = document.getElementById("newenrolment_start_date").value + " " + document
      .getElementById("newenrolment_start_time").value


    var newenrolment_end_datetime = document.getElementById("newenrolment_end_date").value + " " + document
      .getElementById("newenrolment_end_time").value
      
    var newclass_size = document.getElementById("newclass_size").value


    // Create class route (from Class table)
    url = `http://3.139.154.29:5000/admin_create_class`

    json = {
      'course_id': sessionStorage.getItem("course_id"),
      'class_id': newclass_id,
      'trainer_name': newclass_trainer_name,
      'trainer_user_name': newclasstrainer_user_name,
      'class_start_datetime': newclass_start_datetime,
      'class_end_datetime': newclass_end_datetime,
      'enrolment_start_datetime': newenrolment_start_datetime,
      'enrolment_end_datetime': newenrolment_end_datetime,
      'current_class_size': 0,
      'total_class_size': newclass_size,
      'class_start_date': document.getElementById("newclass_start_date").value,
      'class_start_time': document.getElementById("newclass_start_time").value,
      'class_end_date': document.getElementById("newclass_end_date").value,
      'class_end_time': document.getElementById("newclass_end_time").value,
      'enrolment_start_date': document.getElementById("newenrolment_start_date").value,
      'enrolment_start_time': document.getElementById("newenrolment_start_time").value,
      'enrolment_end_date': document.getElementById("newenrolment_end_date").value,
      'enrolment_end_time': document.getElementById("newenrolment_end_time").value
    }

    json = JSON.stringify(json)

    const response = fetch(url, {
        method: 'POST',
        headers: {
          "Content-Type": "application/json"
        },
        body: json
      })
      .then((response) => response.json())
      .then((data) => {
        // If class cannot be created, alert error message to user
        if (data["code"] != 201) {
          alert(data["message"])
        }

        //  Class can be created, reload page to show changes
        else {
          window.location.reload()
        }
      })

  }
</script>

<!-- Function: (Admin) selects a class -->
<!-- On click, admin is able to select a class to view its details. -->
<script>
  function admin_select_class(class_id, class_status) {
    event.preventDefault()
    sessionStorage.setItem("class_id", class_id)
    sessionStorage.setItem("class_status", class_status)
    location.href = "class_detail.php"
  }
</script>

</html>