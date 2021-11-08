<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>Admin Homepage</title>

  <!-- Installs all relevant and common codelinks across pages -->
  <?php include '../include/codelinks.php'; ?>
</head>

<!-- Internal CSS -->
<style>
  #navbar {
    background-color: #fff;
    position: sticky;
    top: 0px;
  }

  .search {
    width: 400px;
    position: relative;
    display: flex;
    margin-left: -100px;
    padding-top: 5px;
  }

  .searchTerm {
    width: 100%;
    border: 3px solid #96BB7C;
    border-right: none;
    padding: 5px;
    height: 36px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #96BB7C;
  }

  .searchTerm:focus {
    color: #96BB7C;
  }

  .searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid #96BB7C;
    background: #96BB7C;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    padding-top: 5px;
  }

  body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
  }

  .table-responsive {
    margin: 30px 0;
  }

  .table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
  }

  .table-title {
    padding-bottom: 15px;
    background: #D8E3CF;
    color: #000;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
  }

  .table-title h2 {
    margin: 5px 0 0;
    font-size: 25px;
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

  .table-title .btn:hover,
  .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
  }

  .table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
    margin-top: 2px;
  }

  .table-title .btn span {
    float: left;
    margin-top: 2px;
    margin-left: 30px;
  }

  table.table tr th,
  table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
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

  .pagination {
    float: right;
    margin: 0 0 5px;
  }

  .pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
  }

  .pagination li a:hover {
    color: #666;
  }

  .pagination li.active a,
  .pagination li.active a.page-link {
    background: #D8E3CF;
  }

  .pagination li.active a:hover {
    background: #D8E3CF;
  }

  .pagination li.disabled i {
    color: #ccc;
  }

  .pagination li i {
    font-size: 16px;
    padding-top: 6px
  }

  .hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
  }

  /* Full-width input fields */
  .form-container input[type=text] {
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

  .prerequisites_available {
    font-size: 13px;
    padding: 10px 8px 10px 14px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 6px;
    overflow: hidden;
    position: relative;
    margin-bottom: 20px;
  }

  .prerequisites_available .select select {
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

  #create_popup {
    z-index: 9999;
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

  <!-- Main Table -->
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-5">
              <h2><b>Course Management</b></h2>
            </div>

            <!-- Search bar to find for all matching courses -->
            <div class="col-2">
              <div class="search">
                <input type="text" class="searchTerm" placeholder="Search by Course Name" id="search_query">
                <button type="submit" class="searchButton" onclick="admin_search_for_courses()">
                  <i class="material-icons">&#xe8b6;</i>
                </button>
              </div>
            </div>

            <!-- Create New Course Button -->
            <!-- On click, will lead to popup to create a new course -->
            <div class="col-5">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#create_popup">
                <i class="material-icons">&#xE147;</i> <span>Create New Course</span>
              </button>
            </div>
          </div>
        </div>

        <!-- Main Course Table Content -->
        <table id="main_table" class="table table-striped table-hover">
          <thead id="main_table_headers">
            <tr>
              <th>Course ID</th>
              <th>Course Name</th>
              <th>Course Description</th>
              <th></th>
            </tr>
          </thead>

          <!-- On load, to display all courses in table -->
          <!-- By default, displays content. Will hide if search_courses_table populate. -->
          <tbody id="courses_table"></tbody>

          <!-- On search, to display all courses that match in table -->
          <!-- By default, no content. -->
          <tbody id="search_courses_table"></tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<!--Popup for Create a Course-->
<div class="modal fade" id="create_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- To add new course details -->
      <div class="modal-body">
        <form action="#" class="form-container">

          <!-- To enter New Course ID -->
          <label style="margin-top: 10px;" for="newcourse_id"><b>Course ID</b></label>
          <input type="text" placeholder="Enter course ID" name="newcourse_id" id="newcourse_id">

          <!-- To enter New Course Name -->
          <label style="margin-top: 10px;" for="newcourse_name"><b>Course Name</b></label>
          <input type="text" placeholder="Enter course name" name="newcourse_name" id="newcourse_name">

          <!-- To enter New Course Description -->
          <label style="margin-top: 10px;" for="newcourse_desc"><b>Course Description</b></label>
          <input type="text" placeholder="Enter course description" name="newcourse_desc" id="newcourse_desc">

          <!-- To select New Course Prerequisite -->
          <label style="margin-top: 10px;" for="newcourse_prerequisite"><b>Course Prerequisite</b></label>
          <!-- On load, to display all the courses available as prerequisite options -->
          <div class="prerequisites_available">
            <div class="select">
              <select name="prerequisites_available" id="prerequisites_available">
                <option value="NIL">NIL</option>
              </select>
            </div>
          </div>

          <!-- Options to close or create the course -->
          <div class="modal-footer">
            <button type="button" class="btn" style="background-color: #fff; border: 2px solid #999;"
              data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" style="background-color: #96BB7C; border-color: #96BB7C;"
              onclick="admin_create_course()">Create Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- All Javascript functions to link app.py routes to UI functionalities -->

<!-- Function: (Admin) view all courses -->
<!-- On load, admin is able to see all the courses available in the system. -->
<!-- On load, admin is able to see all the courses as prerequisite options. -->
<script>
  window.onload = function admin_get_all_courses() {
    const main_table = document.getElementById("main_table")
    const courses_table = document.getElementById("courses_table")
    const prerequisites_available = document.getElementById("prerequisites_available")

    // Get all courses route (from Course table)
    url = `http://localhost:5000/admin_get_all_courses`;

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          main_table.innerHTML = data["message"]
        }

        // No error received - Display all courses (and as prerequisites)
        else {
          for (var i = 0; i < data["data"]["courses"].length; i++) {
            var course_id = data["data"]["courses"][i].course_id
            var course_name = data["data"]["courses"][i].course_name
            var course_desc = data["data"]["courses"][i].course_desc

            var course_str =
              `
            <tr id="${course_id}">
              <td><a href="#" onclick="admin_select_course('${course_id}')">${course_id}</a></td>
              <td>${course_name}</td>                        
              <td>${course_desc}</td>
              <td>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="admin_delete_course('${course_id}')"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            `

            var prereq_str =
              `<option value="${course_id}">${course_id}</option>`

            courses_table.innerHTML += course_str
            prerequisites_available.innerHTML += prereq_str
          }
        }
      })
  }
</script>

<!-- Function: (Admin) search for courses -->
<!-- On search, admin is able to see all the matching courses. -->
<script>
  function admin_search_for_courses() {
    // To reset the display of searched courses each time the search button is clicked
    const search_learners_table = document.getElementById("search_courses_table")
    search_learners_table.innerHTML = ""

    const search_query = document.getElementById("search_query").value
    const courses_table = document.getElementById("courses_table")

    // Get all courses route (from Course table) if there is no search query
    if (search_query.trim() == "") {
      url = `http://localhost:5000/admin_get_all_courses`
    }

    // Get searched courses route (from Course table) if there is a search query
    else {
      url = `http://localhost:5000/admin_search_for_courses/${search_query}`
    }

    // Hide original displayed courses
    courses_table.style.display = "none"

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Alert error message
        if (data["code"] != 200) {
          alert(data["message"])
          window.location.reload()
        }

        // No error received - Display all matching courses
        else {
          for (var i = 0; i < data["data"]["courses"].length; i++) {
            var course_id = data["data"]["courses"][i].course_id
            var course_name = data["data"]["courses"][i].course_name
            var course_desc = data["data"]["courses"][i].course_desc

            var searched_courses_str =
              `
            <tr id="${course_id}">
              <td><a href="#" onclick="admin_select_course('${course_id}')">${course_id}</a></td>
              <td>${course_name}</td>                        
              <td>${course_desc}</td>
              <td>
                  <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="admin_delete_course('${course_id}')"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            `

            search_courses_table.innerHTML += searched_courses_str
          }
        }
      })
  }
</script>

<!-- Function: (Admin) delete a course -->
<!-- On search, admin is able to delete a course. -->
<script>
  function admin_delete_course(course_id) {
    // Delete course route (from Course table) 
    url = `http://localhost:5000/admin_delete_course/${course_id}`;

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // If course cannot be deleted, alert error message to user 
        if (data["code"] != 200) {
          alert(data["message"])
        }

        // Course can be deleted, reload page to show changes
        else {
          window.location.reload()
        }
      })
  }
</script>

<!-- Function: (Admin) creates a course -->
<!-- On click, admin is able to create a new course. -->
<script>
  function admin_create_course() {
    event.preventDefault();
    var new_course_id = document.getElementById("newcourse_id").value
    var new_course_name = document.getElementById("newcourse_name").value
    var new_course_desc = document.getElementById("newcourse_desc").value
    var new_course_prereq = document.getElementById("prerequisites_available").value

    // Create course route (from Course table)
    url = `http://localhost:5000/admin_create_course`

    json = {
      'course_id': new_course_id,
      'course_name': new_course_name,
      'course_desc': new_course_desc,
      "prerequisite_id": new_course_prereq
    }

    json = JSON.stringify(json);

    const response = fetch(url, {
        method: 'POST',
        headers: {
          "Content-Type": "application/json"
        },
        body: json
      })
      .then((response) => response.json())
      .then((data) => {
        // If course cannot be created, alert error message to user
        if (data["code"] != 201) {
          alert(data["message"])
        }

        //  Course can be created, reload page to show changes
        else {
          window.location.reload()
        }
      })
  }
</script>

<!-- Function: (Admin) selects a course -->
<!-- On click, admin is able to select a course to view its details. -->
<script>
  function admin_select_course(course_id) {
    // Set course id session storage item as the course id selected
    event.preventDefault()
    sessionStorage.setItem("course_id", course_id)
    location.href = "course_detail.php"
  }
</script>

</html>