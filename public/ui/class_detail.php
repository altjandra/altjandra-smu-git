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

  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-5">
              <h2><b>Class G1</b></h2>
            </div>
            <div class="col-2">
              <div class="search">
                <input type="text" class="searchTerm" placeholder="Search">
                <button type="submit" class="searchButton">
                  <i class="material-icons">&#xe8b6;</i>
                </button>
              </div>
            </div>
            <div class="col-5">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#popup">
                <i class="material-icons">&#xE147;</i> <span>Assign New Learners</span>
              </button>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th><input type="checkbox" id="select-all" style="width: 17px; height: 17px"></th>
              <th>Learner Name</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox" id="specific-course" style="width: 17px; height: 17px"></td>
              <td><a href="learner_detail.php">Heather Hoe</a></td>
              <td></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="specific-course" style="width: 17px; height: 17px"></td>
              <td><a href="#">Glennis Ng</a></td>
              <td></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="specific-course" style="width: 17px; height: 17px"></td>
              <td><a href="#">Shaziera</a></td>
              <td></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="specific-course" style="width: 17px; height: 17px"></td>
              <td><a href="#">Angela</a></td>
              <td></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="specific-course" style="width: 17px; height: 17px"></td>
              <td><a href="#">Person 5</a></td>
              <td></td>
            </tr>
          </tbody>
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
        <div class="modal-body">
          <!-- From Here -->
          <form action="#" class="form-container">

            <label style="margin-top: 10px;" for="newcourse-enroldate"><b>Select Learners To Assign</b></label>
            <div>
              <select class="selectpicker" id="assignlearner" multiple data-live-search="true">
                <option>Jun Jie</option>
                <option>Josh</option>
                <option>Kelly</option>
              </select>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn" style="background-color: #fff; border: 2px solid #999;"
            data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"
            style="background-color: #96BB7C; border-color: #96BB7C;">Confirm Assign</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</body>

<script>
  $('select').selectpicker();
</script>



</html>