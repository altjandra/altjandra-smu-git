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
              <h2><b>All Learners</b></h2>
            </div>

            <!-- Search bar to find for all matching learners -->
            <div class="col-2">
              <div class="search">
                <input type="text" class="searchTerm" placeholder="Search by Name" id="search_query">
                <button type="submit" class="searchButton" onclick="admin_search_for_learners()">
                  <i class="material-icons">&#xe8b6;</i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Learners Table Content -->
        <table id="main_table" class="table table-striped table-hover">
          <thead id="main_table_headers">
            <tr>
              <th>User Name</th>
              <th>Name</th>
              <th></th>
              <th>Department</th>
            </tr>
          </thead>

          <!-- On load, to display all learners in table -->
          <!-- By default, displays content. Will hide if search_learners_table populate. -->
          <tbody id="learners_table"></tbody>

          <!-- On search, to display all courses that match in table -->
          <!-- By default, no content. -->
          <tbody id="search_learners_table"></tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<!-- All Javascript functions to link app.py routes to UI functionalities -->

<!-- Function: (Admin) view all learners -->
<!-- On load, admin is able to see all the learners available in the system. -->
<script>
  window.onload = function admin_get_all_learners() {
    const main_table = document.getElementById("main_table")
    const learners_table = document.getElementById("learners_table")

    // Get all learners route (from Employee table)
    url = `http://localhost:5000/admin_get_all_learners`;

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Display error message
        if (data["code"] != 200) {
          main_table.innerHTML = data["message"]
        }

        // No error received - Display all learners 
        else {
          for (var i = 0; i < data["data"]["learners"].length; i++) {
            var user_name = data["data"]["learners"][i].user_name
            var employee_name = data["data"]["learners"][i].employee_name
            var current_designation = data["data"]["learners"][i].current_designation

            var learner_str =
              `
            <tr id="${user_name}">
              <td><a href="#" onclick="admin_select_learner('${user_name}')">${user_name}</a></td>
              <td>${employee_name}</td>   
              <td></td>                     
              <td>${current_designation}</td>
            </tr>
            `

            learners_table.innerHTML += learner_str
          }
        }
      })
  }
</script>

<!-- Function: (Admin) search for learners -->
<!-- On search, admin is able to see all the matching learners. -->
<script>
  function admin_search_for_learners() {
    // To reset the display of searched courses each time the search button is clicked
    const search_learners_table = document.getElementById("search_learners_table")
    search_learners_table.innerHTML = ""

    const search_query = document.getElementById("search_query").value
    const learners_table = document.getElementById("learners_table")

    // Get all learners route (from Employee table) if there is no search query
    if (search_query.trim() == "") {
      url = `http://localhost:5000/admin_get_all_learners`
    }

    // Get searched learners route (from Employee table) if there is a search query
    else {
      url = `http://localhost:5000/admin_search_for_learners/${search_query}`
    }

    // Hide original displayed learners
    learners_table.style.display = "none"

    const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // Error received - Alert error message
        if (data["code"] != 200){
          alert(data["message"])
          window.location.reload()
        }

        // No error received - Display all matching learners
        else{
          for (var i = 0; i < data["data"]["learners"].length; i++){
            var user_name = data["data"]["learners"][i].user_name
            var name = data["data"]["learners"][i].employee_name
            var department = data["data"]["learners"][i].department

            var searched_learners_str =
              `
            <tr id="${user_name}">
              <td><a href="#" onclick="admin_select_learner('${user_name}')">${user_name}</a></td>
              <td>${name}</td>                        
              <td></td>
              <td>${department}</td>
            </tr>
            `

            search_learners_table.innerHTML += searched_learners_str
          }
        }
      })

  }
</script>

<!-- Function: (Admin) selects a learner -->
<!-- On click, admin is able to select a learner to view its details. -->
<script>
  function admin_select_learner(user_name) {
    // Set course id session storage item as the course id selected
    event.preventDefault()
    sessionStorage.setItem("user_name", user_name)
    location.href = "learner_detail.php"
  }
</script>

</html>