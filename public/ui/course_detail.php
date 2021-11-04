<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <title>
      Index
    </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
  <!--Nav Bar-->
  <nav class="navbar navbar-expand-lg navbar-light py-4 px-md-5 position-relative z-index-1" id="navbar">
    <a class="navbar-brand" href="#">
    <h1 class="h3 mt-0">
      All-In-One
    </h1></a><button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse ms-lg-5 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav align-items-center">
        
        <li class="nav-item">
          <a class="nav-link" href="course_mgmt.php"><span>Course Management</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="learner_mgmt.php"><span>Learners Management</span></a>
        </li>  
      </ul>
    </nav> 

   
    <!--Background Image-->
    <div class="product-item light-background-color">
      <div class="product-media position-relative" style="height: 300px">
        <img class="zoom cover" src="../img/printer.jpg" alt="">
        
        <div class="tag position-absolute rounded danger-color text-center" style="padding: 5px 10px; left: 20px; top: 20px">
          <h6 class="h6 light-text-color">
            Eligible
          </h6>
        </div>
      </div>
      <div style="padding: 25px 25px 35px 25px">
      
      <!--Course Title, Description, PreReq-->
        <h5 class="h5 text-color" style="margin-top: 10px">
          Fundamentals of Xerox Workcentre
        </h5>
        <p class="paragraph second-text-color" style="margin-top: 10px">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        </p>
      
        <div class="d-flex" style="margin-top: 10px; padding: 5px 0px">
          <h5 class="h5 muted-text-color">
            Prerequisites: None
          </h5>
        </div>

        <!--Classes Table-->
        <h5 class="h5 text-color" style="margin-top: 60px;">
          Classes
        </h5>

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
                  <td><a href="class_detail.html">G1</a></td>
                  <td>Tan Hock Seng</td>                        
                  <td>01/10/2021 - 1/12/2021</td>
                  <td>0800 - 1000</td>
                  <td>40</td>
              </tr>
              <tr>
                  <td><a href="#">G2</a></td>
                  <td>Lim Wei Ming</td>                       
                  <td>01/10/2021 - 1/12/2021</td>
                  <td>0800 - 1000</td>
                  <td>40</td>
              </tr>
              <tr>
                  <td><a href="#">G3</a></td>
                  <td>Jack Lee</td>
                  <td>01/10/2021 - 1/12/2021</td>
                  <td>1200 - 1400</td>                        
                  <td>40</td>                      
              </tr>
              <tr>
          </div>
    </div>
    </body>

<script src="../js/jquery-3.4.1.min.js"></script> 
<script src="../js/bootstrap.bundle.min.js"></script> 
<script src="../js/owl.carousel.min.js"></script> 
<script src="../js/tools.js"></script>
  
</html>