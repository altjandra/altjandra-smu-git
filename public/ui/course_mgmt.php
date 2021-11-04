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

    <script src="../js/jquery-3.4.1.min.js"></script> 
    <script src="../js/bootstrap.bundle.min.js"></script> 
    <script src="../js/owl.carousel.min.js"></script> 
    <script src="../js/tools.js"></script>

  </head>

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

    .searchTerm:focus{
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
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
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
  .table-title .btn:hover, .table-title .btn:focus {
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
  
    table.table tr th, table.table tr td {
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
    .pagination li.active a, .pagination li.active a.page-link {
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
    
    .search_categories{
      font-size: 13px;
      padding: 10px 8px 10px 14px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 6px;
      overflow: hidden;
      position: relative;
      margin-bottom: 20px;
    }

    .search_categories .select select{
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

    #popup {
      z-index: 9999;
    }
</style>
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
          
          <ul class="navbar-nav mt-4 mt-lg-0 ms-auto align-items-center">
            <li class="nav-item">
              <a class="primary-text-color"><strong>Welcome, Zora! [Admin] </strong></a>
            </li>
          </ul>
        </nav> 

        <!--Main Table-->  
        <script>
        $(document).ready(function(){
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
                            <div class="col-2">
                              <div class="search">
                                 <input type="text" class="searchTerm" placeholder="Search by Course Name" id="search_query">
                                 <button type="submit" class="searchButton" onclick="search()">
                                    <i class="material-icons">&#xe8b6;</i>
                                </button>
                              </div>
                           </div>
                            <div class="col-5">
                              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#popup">
                                <i class="material-icons">&#xE147;</i> <span>Create New Course</span>
                              </button>
                            </div>
                            
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Course ID</th>						
                                <th>Course Name</th>
                                <th>Course Description</th>
                                <th></th>
                            </tr>
                        </thead>

                        <!-- will replace entire division of original mock data to new database learners data -->
                        <tbody id="courses_table">
                        </tbody>

                        <tbody id="search_courses_table">
                        </tbody>

                    </table>
                </div>
            </div>        
        </div>     
        </body>
        
        <!--Popup for Create a Course-->
        <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- From Here --> 
                <form action="#" class="form-container">
              
                  <label style="margin-top: 10px;" for="newcourse-name"><b>Course Name</b></label>
                  <input type="text" placeholder="Enter a course name" name="newCourse-name" required>

                  <label style="margin-top: 10px;" for="newcourse-enroldate"><b>Course Start/End Enrolment Date</b></label>
                  <input type="text" placeholder="Enter a course start/end enrolment date" name="newCourse-enroldate" required>
                  
                  <div class="field_wrapper">
                    <div>
                      
                      <label for="class" style="margin-top: 30px;"><b>Class</b></label>
                      <a href="javascript:void(0);" class="add_button" title="Add field"><i class="material-icons">&#xe146;</i></a>
                    
                      <div class="search_categories">
                        <div class="select">
                           <select name="search_categories" id="search_categories">
                              <option value="1" selected="selected">G1</option>
                              <option value="2">G2</option>
                              <option value="3">G3</option>
                              <option value="4">G4</option>
                            </select>
      
                         </div>
                     </div>
      
                      <label for="trainer"><b>Assign Trainer</b></label>
                      <div class="search_categories">
                        <div class="select">
                           <select name="search_categories" id="search_categories">
                              <option value="1" selected="selected">Tom</option>
                              <option value="2">Dick</option>
                              <option value="3">Harry</option>
                              <option value="4">Idk</option>
                            </select>
      
                         </div>
                     </div>

                     <label for="classtime"><b>Class Start/End Time</b></label>
                      <div class="search_categories">
                        <div class="select">
                           <select name="search_categories" id="search_categories">
                              <option value="1" selected="selected">0800 - 1000</option>
                              <option value="2">1000 - 1200</option>
                              <option value="3">1200 - 1400</option>
                              <option value="4">1400 - 1600</option>
                            </select>
      
                         </div>
                     </div>

                     <label for="classsize"><b>Class Size</b></label>
                     <input type="text" placeholder="Enter class size" name="newClass-size" required>

                     <label for="classdate"><b>Class Start Date</b></label>
                     <input type="text" placeholder="Enter start date" name="newClass-startdate" required>

                     <label for="classdate"><b>Class End Date</b></label>
                     <input type="text" placeholder="Enter end date" name="newClass-enddate" required>

      
                    </div>
                

              </div>
            
              <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #fff; border: 2px solid #999;" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color: #96BB7C; border-color: #96BB7C;">Create Course</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        <!--Not sure if you need this to fetch anything for the popup-->
        <script>
          var myModal = new bootstrap.Modal(document.getElementById('myModal'), options)
        </script>
       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      var maxField = 10; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      

      var x = 2; //Initial field counter is 1
      
      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){ 
              x++; //Increment field counter
              $(wrapper).append(`<div id="extra_input">
        <label for="class" style="margin-top: 30px;"><b>Class</b></label>
        <a href="javascript:void(0);" class="remove_button"><i class="material-icons">&#xe15c;</i></a>
        <div class="search_categories">
                  <div class="select">
                     <select name="search_categories" id="search_categories">
                        <option value="1" selected="selected">G1</option>
                        <option value="2">G2</option>
                        <option value="3">G3</option>
                        <option value="4">G4</option>
                      </select>

                   </div>
               </div>

               <label for="trainer"><b>Assign Trainer</b></label>
                <div class="search_categories">
                  <div class="select">
                     <select name="search_categories" id="search_categories">
                        <option value="1" selected="selected">Tom</option>
                        <option value="2">Dick</option>
                        <option value="3">Harry</option>
                        <option value="4">Idk</option>
                      </select>

                   </div>
               </div>

               <label for="classtime"><b>Class Start/End Time</b></label>
                   <div class="search_categories">
                    <div class="select">
                      <select name="search_categories" id="search_categories">
                        <option value="1" selected="selected">0800 - 1000</option>
                        <option value="2">1000 - 1200</option>
                        <option value="3">1200 - 1400</option>
                        <option value="4">1400 - 1600</option>
                      </select>
      
                    </div>
                  </div>

                <label for="classsize"><b>Class Size</b></label>
                <input type="text" placeholder="Enter class size" name="newClass-size" required>

                <label for="classdate"><b>Class Start Date</b></label>
                     <input type="text" placeholder="Enter start date" name="newClass-startdate" required>

                <label for="classdate"><b>Class End Date</b></label>
                <input type="text" placeholder="Enter end date" name="newClass-enddate" required>


      </div>`); //Add field html
          }
      });
      
      //Once remove button is clicked
      $(wrapper).on('click', '.remove_button', function(e){
          e.preventDefault();
          $(this).parents("#extra_input").remove(); //Remove field html
          x--; //Decrement field counter
      });
  });
  </script>

  <!-- Admin: view all courses -->
  <script>
    window.onload = function display_courses(){
    const courses_table = document.getElementById("courses_table");
    url = `http://localhost:5000/view_all_courses`;
    var html_str = "";

    const response = fetch(url)
    .then((response) => response.json())
    .then((data) => {
      if (data["code"] != 200){
        alert(data["message"]);
      }

      else{
        for (var i = 0; i < data["data"]["courses"].length; i++){
          var course_id = data["data"]["courses"][i].course_id;
          var course_name = data["data"]["courses"][i].course_name;
          var course_desc = data["data"]["courses"][i].course_desc;

          html_str = 
          `
          <tr>
            <td><a href="course_detail.html">${course_id}</a></td>
            <td>${course_name}</td>                        
            <td>${course_desc}</td>
            <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
            </td>
          </tr>
          `;

          courses_table.innerHTML += html_str;
        } 
      }
    })
  }
  </script>

  <!-- Admin: search for courses -->
  <script>
    function search() {
      document.getElementById("search_courses_table").innerHTML = "";

      const search_learners_table = document.getElementById("search_courses_table");
      const search_query = document.getElementById("search_query").value
      url = `http://localhost:5000/search_for_courses/${search_query}`;
      var html_str = "";

      document.getElementById("courses_table").style.display="none";

      const response = fetch(url)
      .then((response) => response.json())
      .then((data) => {
        if (data["code"] != 200){
          alert(data["message"])
        }

        else{
          for (var i = 0; i < data["data"]["courses"].length; i++){
            console.log(data["data"]["courses"])
            var course_id = data["data"]["courses"][i].course_id;
            var course_name = data["data"]["courses"][i].course_name;
            var course_desc = data["data"]["courses"][i].course_desc;

            html_str = 
            `
            <tr>
              <td><a href="course_detail.html">${course_id}</a></td>
              <td>${course_name}</td>                        
              <td>${course_desc}</td>
              <td>
                  <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                  <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            `;

            search_courses_table.innerHTML += html_str;
          }        
        }
      })
  }
  </script>
    
  </body>
</html>
