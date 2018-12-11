<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="css/teacherint.css" type="text/css" rel="stylesheet" media="all" />
    <title>APA Cite Rite</title>
</head>

<body>
    <header class="d-flex align-items-center bg-white fixed-top px-3">
        <button class="hamburger-btn btn mr-3" onclick="document.getElementById('side-menu').classList.toggle('open')">
      <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style=" display: block; width: 24px; height: 24px;">
        <g class="style-scope yt-icon">
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" class="style-scope yt-icon" fill="#a0a0a0"></path>
        </g>
      </svg>
    </button>
        <div class="mx-sm-5 flex-grow-1">
            <div class="d-flex">
                <!-- <img src="https://www.elastic.co/assets/bltada7771f270d08f6/enhanced-buzz-1492-1379411828-15.jpg" class="rounded-circle mx-2 flex-shrink-0" style="width: 32px; height: 32px;" /> -->
            </div>
    </header>

    <div id="page" class="d-flex mt-5 pt-3">
    <?php include "sidebar.php"?>     
    
        <main class="content w-100">
            <div class="container mt-5">
              <div id="center" class=""> 

               <!-- TOP BUTTONS -->
              <div class="d-flex justify-content-start mb-3">        
                  <button  id="assignmentButton" class="button btn btn-primary btn-lg mr-3">Assignment</button>
                  <button  id="dataButton" class="active button btn btn-primary btn-lg ml-3">Data</button>
               </div>


                 <div id="top" class="top d-flex flex-row bd-highlight mb-3"><div>


                     <div class="label p-2 bd-highlight" id = "topLabel">Select a course to display data:</div>
                     <div class="p-2 bd-highlight">
                          <select class="selection" id = "selectCourse">
                             <option value="" disabled selected>Course Code</option>
                             <option value="all">All courses</option>
                          </select>
                     </div>
                          
                     <div class="p-2 bd-highlight" id="newAssignment"> How many citations?</div>

                     <div class="p-2 bd-highlight"><input type="number" class="disabled selection" id="quantity" value="9" min="1" max="500"></div> 
                  
                          <div class="p-2 bd-highlight"><button id="createButton" class="button btn btn-primary "> Create Assignment</div>
                          </div>
                    </div>
                    <div id="created" class="disabled p-2 bd-highlight alert alert-success mx-300px"> Assignment successfully created!
                          </div>
                 </div>

               
                 <div id="left" class="left mx-5 my-5">
                    <div>
                       <div class="label" id = "leftLabel">Students:</div>

                       <table id="studentT" class="hidden table table-sm">
                          <thead class="thead-dark">
                           <tr>
                              <th>NetID</th>
                              <th>Name</th>
                              <th>Citations Completed</th>
                              <th>Weakness</th>
                              <th>Strength</th>
                           </tr>
                         </thead>
                        </table> 

                       <table id="assignmentT" class="hidden table table-sm">
                         <thead class="thead-dark">
                          <tr>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Number of Citations Assigned</th>
                          </tr>
                        </thead>
                         </table> 
                    </div>
                 </div>
                 
                 <div id="right" class="right mx-5 my-5">
                    <div class="label" id = "rightLabel">Courses:</div>
                     <table id="courseT" class="hidden table table-sm">
                    <thead class="thead-dark">
                      <tr>
                       <th scrope="col">Course Code</th>
                       <th scrope="col">Course Name</th>
                       <th scrope="col">Citations Completed</th>
                       <th scrope="col">Weakness</th>
                       <th scrope="col">Strength</th>
                      </tr>
                     </thead>
                     </table> 

                    <table id="progressT" class="hidden table table-sm">
                     <thead class="thead-dark">
                      <tr>
                       <th scrope="col">Net ID</th>
                       <th scrope="col">Name</th>
                       <th scrope="col">Citations Completed</th>
                       <th scrope="col">Assignment Completed</th>
                      </tr>
                      </thead>
                    </table> 
                        </div>
                     </div>
                  </div>
          
            </div>
        </main>
        <div class="side-menu-backdrop" onclick="document.getElementById('side-menu').classList.toggle('open')"></div>
        </div>
</body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js" crossorigin="anonymous"></script>
        <script src="js/home.js"></script>
        <script src="js/data.js"></script>
</html>