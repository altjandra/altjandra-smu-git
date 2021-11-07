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

  <!--Background Image-->
  <div class="product-item light-background-color">
    <div class="product-media position-relative" style="height: 300px">
      <img class="zoom cover" src="../img/printer.jpg" alt="">

      <div class="tag position-absolute rounded danger-color text-center"
        style="padding: 5px 10px; left: 20px; top: 20px">
      </div>
    </div>
    <div style="padding: 25px 25px 35px 25px">

      <!--Course Title, Description, PreReq-->
      <h5 id="course_selected"></h5>

      <p id="course_description"></p>

      <div class="d-flex" style="margin-top: 10px; padding: 5px 0px">
        <h5 id="prereq"></h5>
      </div>

      <!--Classes Table-->
      <h5 class="h5 text-color" style="margin-top: 60px;">
        Classes
      </h5>

      <table class="table table-striped table-hover">
        <thead id="no_classes"></thead>

        <tbody id="classes_table"></tbody>
      </table>

    </div>
  </div>
</body>

<!-- Admin: view all courses (default screen) -->
<script>
  window.onload = function display_course_details() {
    const course_selected = document.getElementById("course_selected")
    const course_description = document.getElementById("course_description")
    const prereq = document.getElementById("prereq")
    const classes_table = document.getElementById("classes_table")
    const no_classes = document.getElementById("no_classes")

    let course_id = sessionStorage.getItem("course_id")
    url = `http://localhost:5000/view_course_prerequisite_and_classes/${course_id}`;
    var html_str = "";

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        if (data["code"] != 200) {
          alert(data["message"])
        } else {
          course_selected.innerHTML = `
              <h5 class="h5 text-color" style="margin-top: 10px">
        ${data["data"]["course_data"]["course_id"]}: ${data["data"]["course_data"]["course_name"]}
      </h5>
          `;

          course_description.innerHTML = `
          <p id="course_description" class="paragraph second-text-color" style="margin-top: 10px">
          ${data["data"]["course_data"]["course_desc"]}
      </p>
          `;

          prereq.innerHTML = `
          <h5 class="h5 muted-text-color">
          Prerequisite: ${data["data"]["prerequisite"]["prerequisite_id"]}
      </h5>
          `;

          if (data["data"]["classes"].length == 0) {
            html_str =
              `
                No classes for this course.
          `;

            classes_table.innerHTML = html_str;
          } else {
            no_classes.innerHTML =
              `
            <th>Class</th>
            <th>Trainer Name</th>
            <th>Start/End Class</th>
            <th>Class Size</th>
            <th>Start/End Enrolment</th>
            `

            for (var i = 0; i < data["data"]["classes"].length; i++) {
              var class_id = data["data"]["classes"][i].class_id
              var trainer_name = data["data"]["classes"][i].trainer_name

              var class_start_datetime = data["data"]["classes"][i].class_start_datetime
              var class_end_datetime = data["data"]["classes"][i].class_start_datetime
              var current_class_size = data["data"]["classes"][i].current_class_size
              var total_class_size = data["data"]["classes"][i].total_class_size
              var enrolment_start_datetime = data["data"]["classes"][i].enrolment_start_datetime
              var enrolment_end_datetime = data["data"]["classes"][i].enrolment_end_datetime


              html_str =
                `
          <tr>
            <td><a href="class_detail.php" onclick="select_class('${class_id}')">${class_id}</a></td>
            <td>${trainer_name}</td>
            <td>${class_start_datetime} - ${class_end_datetime}</td>
            <td>${current_class_size}/${total_class_size}</td>
            <td>${enrolment_start_datetime} - ${enrolment_end_datetime}</td>
          </tr>
          `;

              classes_table.innerHTML += html_str;
            }
          }

        }
      })
  }
</script>

<script>
  function select_class(class_id) {
    event.preventDefault();
    sessionStorage.setItem("class_id", class_id);
    location.href = "class_detail.php";
  }
</script>

</html>