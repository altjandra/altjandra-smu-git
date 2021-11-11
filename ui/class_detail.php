<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>Class Detail</title>

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
    margin-left: 10px;
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
  }

  .table-title .btn span {
    float: left;
    margin-top: 2px;
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

  #popup {
    z-index: 9999;
  }

  .modal-body {
    padding-bottom: 300px;
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

  <!--Main Table-->
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

  <!--Class Confirmed Learners-->
  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-5">
              <h2 id="class_selected"><b></b></h2>
            </div>

            <!-- Assign New Learners Button (if enrolment not started) -->
            <!-- On click, will lead to popup to assign qualified learners -->
            <div class="col-5" id="assign_learner_button">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#popup">
                <i class="material-icons">&#xE147;</i> <span>Assign New Learners</span>
              </button>
            </div>
          </div>
        </div>

        <!-- Main Confirmed Learners Content -->
        <table id="main_table" class="table table-striped table-hover">
          <thead id="main_table_headers">
            <tr>
              <th>Learner Name</th>
              <th></th>
            </tr>
          </thead>

          <tbody id="confirmed_learners_table"></tbody>
        </table>
      </div>
    </div>
  </div>

  <!--Class Enrolment Requests-->
  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-5">
              <h2 id="enrolment_requests_class"><b></b></h2>
            </div>
          </div>
        </div>

        <!-- Main Enrolment Requests Content -->
        <table id="main_enrolment_table" class="table table-striped table-hover">
          <thead id="main_table_headers">
            <tr>
              <th>Learner Name</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody id="enrolment_requests_table"></tbody>
        </table>
      </div>
    </div>
  </div>

  <!--Popup for Assign New Learners-->
  <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Assign New Learners</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- To assign new learners that are qualified and have not completed course -->
        <div class="modal-body">
          <form action="#" class="form-container">

            <!-- To select learner -->
            <label style="margin-top: 10px;" for="newlearner"><b>Select Learners To Assign</b></label>
            <div class="learners_available" id="learners_missing">
              <div class="select">
                <select name="learners_available" id="learners_available">
                </select>
              </div>
            </div>
          </form>
        </div>

        <!-- Options to close or assign the learner -->
        <div class="modal-footer">
          <button type="button" class="btn" style="background-color: #fff; border: 2px solid #999;"
            data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" style="background-color: #96BB7C; border-color: #96BB7C;"
            onclick="admin_assign_learner()">Confirm Assign</button>
        </div>
      </div>
    </div>
  </div>

</body>

<!-- All Javascript functions to link app.py routes to UI functionalities -->

<!-- Function: (Admin) view class details -->
<!-- On load, admin is able to see all the details of the class selected. -->
<script>
  window.onload = function admin_view_class() {
    var class_id = sessionStorage.getItem("class_id")
    var course_id = sessionStorage.getItem("course_id")
    var class_status = sessionStorage.getItem("class_status")

    document.getElementById("class_selected").innerHTML =
      `<h2 id="class_selected"><b>${class_id} Confirmed Learners</b></h2>`
    document.getElementById("enrolment_requests_class").innerHTML =
      `<h2 id="enrolment_requests_class"><b>${class_id} Enrolment Requests</b></h2>`

    // Only show the assigning new learners button if enrolment has not started
    if (class_status == "ENROLMENT IN PROGRESS" || class_status == "ENROLMENT ENDED" || class_status ==
      "CLASS IN PROGRESS" || class_status == "CLASS ENDED") {
      document.getElementById("assign_learner_button").style.display = "none"
    }

    // View confirmed learners route (from Overall Course Progress table)
    url = `http://3.139.154.29:5000/view_confirmed_learners/${course_id}/${class_id}`

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          document.getElementById("main_table").innerHTML = data["message"]
        }

        // No error received - Display all confirmed learners
        else {
          for (var i = 0; i < data["data"]["learner"].length; i++) {
            var name = data["data"]["learner"][i]["name"]

            var learner_str =
              `
            <tr>
              <td><a href="learner_detail.php">${name}</a></td>
              <td></td>
            </tr>
            `

            document.getElementById("confirmed_learners_table").innerHTML += learner_str
          }
        }
      })

    // View enrolment requests route (from Enrolment Request table)
    url1 = `http://3.139.154.29:5000/view_enrolment_requests/${course_id}/${class_id}`

    const response1 = fetch(url1)
      .then((response1) => response1.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          document.getElementById("main_enrolment_table").innerHTML = data["message"]
        }

        // No error received - Display all enrolment requests
        else {
          for (var i = 0; i < data["data"]["enrolment"].length; i++) {
            var name = data["data"]["enrolment"][i]["name"]
            var user_name = data["data"]["enrolment"][i]["user_name"]

            var enrolment_str =
              `
            <tr>
              <td><a href="#">${name}</a></td>
              <td></td>
              <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip" onclick="admin_approve_enrolment('${user_name}', '${name}')"><i class="material-icons">&#10003;</i></a>
                  <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="admin_reject_enrolment('${user_name}')"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            `

            document.getElementById("enrolment_requests_table").innerHTML += enrolment_str

          }
        }

        // View eligible learners route
        url2 = `http://3.139.154.29:5000/view_eligible_learners/${course_id}`

        const response2 = fetch(url2)
          .then((response2) => response2.json())
          .then((data) => {
            // Error received - Alert/Display error message
            if (data["data"]["qualified_learners"].length == 0) {
              var learner_str = `No learners to assign.`
              document.getElementById("learners_missing").innerHTML = learner_str
            }

            // No error received - Display all qualified learners
            else {
              for (var i = 0; i < data["data"]["qualified_learners"].length; i++) {
                var user_name = data["data"]["qualified_learners"][i]
                var name = user_name.charAt(0).toUpperCase() + user_name.slice(1)
                name = name.substring(0, name.length - 5)

                var learner_str = `<option value="${user_name}">${name}</option>`

                document.getElementById("learners_available").innerHTML += learner_str

              }
              console.log(document.getElementById("learners_available"))
            }
          })

      })
  }
</script>


<!-- Function: (Admin) assigns learner  -->
<!-- On click, admin is able to assign the learner. -->
<script>
  function admin_assign_learner() {
    event.preventDefault()
    var learner_assigned = document.getElementById("learners_available").value
    var name = learner_assigned.charAt(0).toUpperCase() + learner_assigned.slice(1)
    name = name.substring(0, name.length - 5)

    // Assign learner route 
    url = `http://3.139.154.29:5000/admin_assign_learner`

    json = {
      'user_name': learner_assigned,
      'name': name,
      'course_id': sessionStorage.getItem('course_id'),
      'class_id': sessionStorage.getItem('class_id'),
      'sections_completed': 0,
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
        // If learner cannot be assigned, alert error message to user
        if (data["code"] != 201) {
          alert(data["message"])
        }

        // Learner can be assigned, reload page to show changes
        else {
          window.location.reload() 
        }
      })
  }
</script>


<!-- Function: (Admin) approves learner enrolment request  -->
<!-- On click, admin is able to approve the learner enrolment request. -->
<script>
  function admin_approve_enrolment(user_name, name) {
    // Approve enrolment route 
    url = `http://3.139.154.29:5000/admin_approve_enrolment`
    var course_id = sessionStorage.getItem('course_id')
    var class_id = sessionStorage.getItem('class_id')

    json = {
      'user_name': user_name,
      'name': name,
      'course_id': course_id,
      'class_id': class_id,
      'sections_completed': 0,
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
        // If learner cannot be approved, alert error message to user
        if (data["code"] != 201) {
          alert(data["message"])
        }

        // Learner can be approved
        else {
          // Delete enrolment route 
          url1 = `http://3.139.154.29:5000/admin_delete_enrolment_request/${user_name}/${course_id}/${class_id}`

          const response1 = fetch(url1)
            .then((response1) => response1.json())
            .then((data) => {
              // If enrolment cannot be removed, alert error message to user
              if (data["code"] != 200) {
                alert(data["message"])
              }

              // Enrolment can be removed, reload page to show changes
              else {
                window.location.reload()
              }
            })

        }
      })


  }
</script>

<!-- Function: (Admin) rejects learner enrolment request  -->
<!-- On click, admin is able to reject the learner enrolment request. -->
<script>
  function admin_reject_enrolment(user_name) {
    var course_id = sessionStorage.getItem('course_id')
    var class_id = sessionStorage.getItem('class_id')

    // Delete enrolment route 
    url = `http://3.139.154.29:5000/admin_delete_enrolment_request/${user_name}/${course_id}/${class_id}`

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // If admin cannot reject enrolment, alert error message to user
        if (data["code"] != 200){
          alert(data["message"])
        }

        // Admin can reject enrolment, reload page to show changes
        else{
          window.location.reload()
        }
      })
  }
</script>

</html>