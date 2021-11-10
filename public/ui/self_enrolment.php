<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>All-In-One LMS</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap-icons.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
            <a class="nav-link" href="./index.html"><span>Home</span></a>
          </li>
        </ul>
        <ul class="navbar-nav mt-4 mt-lg-0 ms-auto align-items-center">
          <li class="nav-item">
            <a class="primary-text-color" href="#"><strong>Welcome, Ben Tan</strong></a>
          </li>
        </ul>
      </div>
    </nav>

    <h2 class="h2 text-color text-center" style="margin-top: 10px; padding-bottom: 30px;">
      Enrolment: Installation of Components
    </h2>
    <div class="container position-relative z-index-1">
      <div class="product-item light-background-color">
        <div class="product-media position-relative" style="height: 300px">
          <img class="zoom cover" src="img/courses/electrical.jpg" alt="">

          <div class="tag position-absolute rounded danger-color text-center"
            style="padding: 5px 10px; left: 20px; top: 20px">
            <h6 class="h6 light-text-color">
              Eligible
            </h6>
          </div>
        </div>
        <div style="padding: 25px 25px 35px 25px">
          <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-row justify-content-start align-items-center">
              <a class="link primary-text-color" href="#">Maintenance Courses</a>
            </div>
          </div>
          <h5 class="h5 text-color" style="margin-top: 10px">
            Installation of Components
          </h5>
          <p class="paragraph second-text-color" style="margin-top: 10px">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit minus quas, eos unde culpa autem suscipit
            optio alias veniam deleniti magnam aliquid laborum voluptatem accusantium enim nam. Sit, nemo
            exercitationem!
          </p>
          <div class="d-flex" style="margin-top: 10px; padding: 5px 0px">
            <h5 class="h5 muted-text-color">
              Pre-requisites: None
            </h5>
          </div>
        </div>
      </div>
    </div>

    <!--Classes Table-->
    <h5 class="h5 text-color" style="margin-top: 20px; margin-left: 70px;">
      Classes
    </h5>
    <div class="container position-relative z-index-1">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Class</th>
            <th>Trainer Name</th>
            <th>Start/End Class Date</th>
            <th>Start/End Class Time</th>
            <th>Class Size</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-title="Class">G1</td>
            <td data-title="Trainer Name">Tan Hock Seng</td>
            <td data-title="Start/End Date">01/10/2021 - 1/12/2021</td>
            <td data-title="Start/End Time">0800 - 1000</td>
            <td data-title="Class Size">40</td>
          </tr>
          <tr>
            <td data-title="Class">G2</td>
            <td data-title="Trainer Name">Lim Wei Ming</td>
            <td data-title="Start/End Date">01/10/2021 - 1/12/2021</td>
            <td data-title="Start/End Time">0800 - 1000</td>
            <td data-title="Class Size">40</td>
          </tr>
          <tr>
            <td data-title="Class">G3</td>
            <td data-title="Trainer Name">Jack Lee</td>
            <td data-title="Start/End Date">01/10/2021 - 1/12/2021</td>
            <td data-title="Start/End Time">1200 - 1400</td>
            <td data-title="Class Size">40</td>
          </tr>
          <tr>
        </tbody>
      </table>
    </div>

  </header>



  <div class="container py-7 py-lg-10" style="margin-top: -90px;">
    <div class="row">
      <div class="col-lg-6">
        <h5 class="h5 text-color ">
          Select Class Enrolment
        </h5>


        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">Select Available Class<i class="material-icons">&#xe5cf;</i>
          </button>

          <div id="myDropdown" class="dropdown-content">
            <a href="#g1">G1 | Slots Left: 24</a>
            <a href="#g2">G2 | Slots Left: 2</a>
            <a href="#g2">G4 | Slots Left: 30</a>
          </div>
        </div>

        <div>
          <button class="btn primary-color btn-round btn-outline btn-sm" type="submit"
            style="margin-top: 200px; margin-bottom: -100px;"><span class="btn-text">Confirm</span><i
              class="bi bi-chevron-right icn-xs primary-text-color"></i></a>
        </div>
      </div>
    </div>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tools.js"></script>

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

</body>

</html>