<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>All-In-One LMS</title>

  <!-- Installs all relevant and common codelinks across pages -->
  <?php include '../include/codelinks.php'; ?>
</head>


<style>
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

  .search-container {
    width: 490px;
    display: block;
    margin: 0 auto;
  }

  input#search-bar {
    margin: 0 auto;
    width: 100%;
    height: 45px;
    padding: 0 20px;
    font-size: 1rem;
    border: 1px solid #D0CFCE;
    outline: none;
  }

  .search-icon {
    position: relative;
    float: right;
    width: 75px;
    height: 75px;
    top: -62px;
    right: -220px;
  }

  .dropbtn {
    background-color: #96BB7C;
    color: white;
    padding: 8px 16px 8px 16px;
    font-size: 16px;
    border-radius: 15px;
    border: solid #96BB7C;
    cursor: pointer;
  }

  .dropbtn:hover,
  .dropbtn:focus {
    background-color: #6a8b52;
    border: solid #6a8b52;

  }

  .dropbtn i {
    float: right;
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


<body>
  <header class="position-relative">

    <!-- Learner Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-4 px-md-5 position-relative z-index-1">
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

    <h2 class="h2 text-color text-center" style="margin-top: 10px; padding-bottom: 30px;" id="course_enrolment_title">
    </h2>
    <div class="container position-relative z-index-1">
      <div class="product-item light-background-color">
        <div class="product-media position-relative" style="height: 300px">
          <img class="zoom cover" src="../img/courses/electrical.jpg" alt="">
        </div>
        <div style="padding: 25px 25px 35px 25px">
          <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-row justify-content-start align-items-center">
              <a class="link primary-text-color" href="#" id="course_id"></a>
            </div>
          </div>
          <h5 class="h5 text-color" style="margin-top: 10px" id="course_name"></h5>
          <p class="paragraph second-text-color" style="margin-top: 10px" id="course_desc">
          </p>
          <div class="d-flex" style="margin-top: 10px; padding: 5px 0px">
            <h5 class="h5 muted-text-color" id="prerequisite">
            </h5>
          </div>
        </div>
      </div>
    </div>

    <!--Classes Table-->
    <h5 class="h5 text-color" style="margin-top: 20px; margin-left: 70px;">
      Classes
    </h5>
    <div class="container position-relative z-index-1" id="main_table">
      <table class="table table-striped table-hover">
        <thead id="main_table_headers">
          <tr>
            <th>Class</th>
            <th>Trainer Name</th>
            <th>Start/End Class Date</th>
            <th>Start/End Class Time</th>
            <th>Class Size</th>
          </tr>
        </thead>
        <tbody id="classes_table">
        </tbody>
      </table>
    </div>

  </header>



  <div class="container py-7 py-lg-10" style="margin-top: -90px;" id="dropdownbox">
    <div class="row">
      <div class="col-lg-6">
        <h5 class="h5 text-color ">
          Select Class Enrolment
        </h5>

        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">Select Available Class<i class="material-icons">&#xe5cf;</i>
          </button>

          <div id="myDropdown" class="dropdown-content">
          </div>
        </div>

      </div>
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

<script>
  window.onload = function learner_view_course_details() {
    var course_id = sessionStorage.getItem("course_id")
    var course_name = sessionStorage.getItem("course_name")
    var user_name = sessionStorage.getItem("user_name")

    document.getElementById("course_enrolment_title").innerHTML =
      `Enrolment: ${course_name}`
    document.getElementById("course_id").innerHTML = course_id
    document.getElementById("course_name").innerHTML = course_name
    var check = 0

    // Get course details
    url = `http://localhost:5000/admin_get_course_details/${course_id}`

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          alert(data["message"])
        }

        // No error received - Display course details
        else {
          var course_desc = data["data"]["course"]["course_desc"]
          document.getElementById("course_desc").innerHTML = course_desc

          var prerequisite_id = data["data"]["prerequisite"]["prerequisite_id"]
          document.getElementById("prerequisite").innerHTML = `Prerequisite: ${prerequisite_id}`

          // If there are no classes attached to the course
          if (data["data"]["classes"].length == 0) {
            var class_status_str = `No classes for this course.`
            document.getElementById("main_table").innerHTML = class_status_str
          }

          // If there are classes attached to the course
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
              } else if (current_datetime.getTime() >= enrolment_start_datetime.getTime() && current_datetime
                .getTime() <
                enrolment_end_datetime.getTime()) {
                var class_status = "ENROLMENT IN PROGRESS"
                check += 1
              } else if ((current_datetime.getTime() >= enrolment_start_datetime.getTime() && current_datetime
                  .getTime() >= enrolment_end_datetime.getTime()) || current_class_size == total_class_size) {
                var class_status = "ENROLMENT ENDED"
              }

              var class_str =
                `
                <tr>
                  <td data-title="Class">${class_id}</td>
                  <td data-title="Trainer Name">${trainer_employee_name}</td>
                  <td data-title="Start/End Date">${class_start_datetime.toLocaleDateString()} - ${class_end_datetime.toLocaleDateString()}</td>
                  <td data-title="Start/End Time">${class_start_datetime.toLocaleTimeString()} - ${class_end_datetime.toLocaleTimeString()}</td>
                  <td data-title="Class Size">${current_class_size}/${total_class_size}</td>
                </tr>
              `

              classes_table.innerHTML += class_str

              if (class_status = "ENROLMENT IN PROGRESS") {
                var option_str =
                  `<a href="#" onclick="learner_select_class('${course_id}', '${class_id}')">${class_id}</a>`

                document.getElementById("myDropdown").innerHTML += option_str
              }

              if (check == 0){
                document.getElementById("dropdownbox").innerHTML = "<h1>No classes available for enrolment because enrolment has not started/has ended. </h1>"
              }

            }
          }
        }
      })

  }
</script>

<script>
  var user_name = sessionStorage.getItem("user_name")
  var course_id = sessionStorage.getItem("course_id")
  url = `http://localhost:5000/view_enrolment_requests_learner/${course_id}/${user_name}`

  const response = fetch(url)
    .then((response) => response.json())
    .then((data) => {
      // If enrolment found, hide option to enrol
      if (data["code"] == 200) {
        document.getElementById("dropdownbox").innerHTML = "<h1>PENDING APPROVAL</h1>"
      }

    })
</script>

<script>
  function learner_select_class(course_id, class_id) {
    // Submit enrolment request
    url = `http://localhost:5000/submit_enrolment_request`
    var user_name = sessionStorage.getItem("user_name")
    var name = sessionStorage.getItem("name")

    json = {
      'user_name': user_name,
      'name': name,
      'course_id': course_id,
      'class_id': class_id,
      'status': 'PENDING'
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
        // If enrolment request fails
        if (data["code"] != 201) {
          alert(data["message"])
        }

        // If enrolment request succeeds
        else {
          alert("Your enrolment request is now pending approval.")
          window.location.reload()
        }
      })
  }
</script>



</html>