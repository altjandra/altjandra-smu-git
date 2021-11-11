<!-- For the sake of the demo, heather.2021 will be the learner logged in. -->
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
          <a class="nav-link" href="./learner_index.php"><span>Home</span></a>
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
            <th></th>
            <th>Sections Completed</th>
          </tr>
        </thead>

        <!-- On load, to display all courses in table -->
        <tbody id="courses_table"></tbody>

      </table>
    </div>
  </div>
</body>


<section>
  <div class="container py-7 py-lg-7">
    <div class="row justify-content-center">
      <div class=" col-lg-10">
        <h3 class="text-color" style="margin-left: 50px;">
          Browse Other Courses
        </h3>
      </div>

      <form class="search-container position-relative z-index-1" action="#" method="post">
        <div class="search">
          <input type="text" class="searchTerm" placeholder="Not working yet" id="search_query">
          <button type="submit" class="searchButton">
            <i class="material-icons">&#xe8b6;</i>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<div class="row align-items-stretch justify-content-center mt-5 mt-md-7">
  <div class="owl-carousel owl-theme 2-items">
    <div id="all_courses">

    </div>
  </div>
</div>

<div class="row align-items-stretch justify-content-center mt-5 mt-md-7">
  <div class="owl-carousel owl-theme 2-items">
    <div id="search_courses">

    </div>
  </div>
</div>


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
    url = `http://3.139.154.29:5000/learner_get_all_current_courses/${user_name}`;

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
              <td><a href="#" onclick="select_ongoing_course('${course_id}', '${class_id}')">${course_id}</a></td>
              <td>${class_id}</td>
              <td></td>
              <td>${sections_completed}</td>
            </tr>
          `
            document.getElementById("courses_table").innerHTML += course_str

          }
        }
      })

    // Get all courses - eligible and not eligible
    url1 = `http://3.139.154.29:5000/view_eligible_courses/${user_name}`

    const response1 = fetch(url1)
      .then((response1) => response1.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          alert(data["message"])
        }

        // No error received - Display all courses
        else {
          // Display all courses
          for (var i = 0; i < data["data"]["course_list"].length; i++) {
            var course_id = data["data"]["course_list"][i]["course_id"]
            var course_name = data["data"]["course_list"][i]["course_name"]
            var course_desc = data["data"]["course_list"][i]["course_desc"]

            var course_str =
              `
              <div class="product-item light-background-color">
                <div class="product-media position-relative" style="height: 300px">
                  <img class="zoom cover" src="../img/courses/electrical.jpg" alt="">
                  <div class="product-actions position-absolute d-flex justify-content-center w-100" style="bottom: 20px">
                  </div>
                  <div class="tag position-absolute rounded danger-color text-center"
                    style="padding: 5px 10px; left: 20px; top: 20px">
                    <h6 class="h6 light-text-color" id="eligibility_status${course_id}">
                    </h6>
                  </div>
                </div>
                <div style="padding: 25px 25px 35px 25px">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row justify-content-start align-items-center">
                      <a class="link primary-text-color" href="#" id="${course_id}">${course_id}</a>
                    </div>
                  </div>
                  <h5 class="h5 text-color" style="margin-top: 10px" id="${course_name}">${course_name}
                  </h5>
                  <p class="paragraph second-text-color" style="margin-top: 10px">${course_desc}
                  </p>
                  <a class="btn primary-color btn-round btn-outline btn-sm" href="#" onclick="learner_select_course('${course_id}', '${course_name}')"
                    style="margin-top: 10px" id="enrol_now"><span class="btn-text">Enrol Now</span><i
                      class="bi bi-chevron-right icn-xs primary-text-color"></i></a>
                </div>
              </div>
            `

            document.getElementById("all_courses").innerHTML += course_str

          }

          for (var i = 0; i < data["data"]["qualified_courses"].length; i++) {
            var qualified_course_id = data["data"]["qualified_courses"][i]
            var search_string = "eligibility_status" + qualified_course_id
            document.getElementById(search_string).innerText = `Eligible`

          }

          for (var i = 0; i < data["data"]["unqualified_courses"].length; i++) {
            var unqualified_courses_id = data["data"]["unqualified_courses"][i]
            var search_string = "eligibility_status" + unqualified_courses_id
            document.getElementById(search_string).innerText = `Not Eligible`
            document.getElementById("enrol_now").innerHTML = `See Details`
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

<script>
  function select_ongoing_course(course_id, class_id){
    event.preventDefault()
    sessionStorage.setItem("course_id", course_id)
    sessionStorage.setItem("class_id", class_id)
    location.href = "course.php"
  }
</script>

</html>