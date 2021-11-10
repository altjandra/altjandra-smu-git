<script>
  sessionStorage.setItem("user_name", "heather.2021")
  sessionStorage.setItem("name", "Heather")
</script>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>All-In-One LMS</title>

  <!-- Installs all relevant and common codelinks across pages -->
  <?php include '../include/codelinks.php'; ?>
</head>

<style>
  body {
    background-color: #f5f5f5;
  }


  #navbar {
    background-color: #fff;
    position: sticky;
    top: 0px;
  }

  #table-card {
    background-color: #fff;
    border: 5px solid
  }

  .card-header {
    background-color: #D8E3CF;
  }

  table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
  }

  table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }

  table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
  }

  .search {
    width: 600px;
    position: relative;
    display: flex;
    margin-left: 280px;
    margin-top: 30px;
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

  .search-bar:focus {
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


  .dropbtn {
    background-color: #96BB7C;
    color: white;
    padding: 5px 16px 5px 16px;
    margin-left: 30px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropbtn:hover,
  .dropbtn:focus {
    background-color: #3e8e41;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    border: 1px solid #ddd;
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1
  }

  .show {
    display: block;
  }
</style>


<header class="position-relative">

  <!-- Learner Navbar -->
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
          <a class="nav-link" href="./index.php"><span>Home</span></a>
        </li>
      </ul>
      <ul class="navbar-nav mt-4 mt-lg-0 ms-auto align-items-center">
        <li class="nav-item">
          <a class="primary-text-color"><strong>Welcome, Heather [LEARNER]</strong></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<body class="mainbody">
  <div class="card" style="width: 80%; margin: auto; margin-top: 30px;">
    <h4 class="card-header text-color text-center" style="padding-top: 20px; padding-bottom: 20px;">
      Overview of My Enrolled Courses
    </h4>
    <div class="card-body container position-relative z-index-1">

      <!-- Main course table contents -->
      <table class="table table-striped table-hover" id="main_table">
        <thead id="main_table_headers">
          <tr>
            <th>Course ID</th>
            <th>Class ID</th>
            <th>Sections Completed</th>
            <th>Final Quiz Grade</th>
          </tr>
        </thead>

        <!-- On load, to display all courses in table -->
        <tbody id="courses_table"></tbody>

      </table>
    </div>
  </div>
</body>



<script>
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
</script>

<!-- All Javascript functions to link app.py routes to UI functionalities -->

<!-- Function: (Learner) view all courses -->
<!-- On load, learner is able to view all the courses (and the courses they are enrolled in) -->
<script>
  window.onload = function learner_view_all_courses() {
    var user_name = sessionStorage.getItem("user_name")

    // Get all courses of learner route
    url = `http://localhost:5000/learner_get_all_current_courses/${user_name}`;

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          document.getElementById("main_table").innerHTML = data["message"]
        }

        // No error received - Display all current courses
        else {
          for (var i = 0; i < data["data"]["courses"].length; i++) {
            var course_id = data["data"]["courses"][i]["course_id"]
            var class_id = data["data"]["courses"][i]["class_id"]
            var sections_completed = data["data"]["courses"][i]["sections_completed"]
            var final_quiz_grade = data["data"]["courses"][i]["final_quiz_grade"]

            var course_str =
              `
            <tr>
              <td>${course_id}</td>
              <td>${class_id}</td>
              <td>${sections_completed}</td>
              <td>${final_quiz_grade}</td>
            </tr>
          `
            document.getElementById("courses_table").innerHTML += course_str

          }
        }
      })
  }

</script>

<script>
  function learner_select_course(course_id, course_name) {
    event.preventDefault()
    sessionStorage.setItem("course_id", course_id)
    sessionStorage.setItem("course_name", course_name)
    location.href = "self_enrolment.php"
  }
</script>

</html>