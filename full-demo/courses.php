<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="css/teacherint.css" type="text/css" rel="stylesheet" media="all" />

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

                <img src="https://www.elastic.co/assets/bltada7771f270d08f6/enhanced-buzz-1492-1379411828-15.jpg" class="rounded-circle mx-2 flex-shrink-0" style="width: 32px; height: 32px;" />
            </div>
    </header>

    <div id="page" class="d-flex mt-5 pt-3">
    <?php include "sidebar.php"?>
        <main class="content w-100">
            <div class="container">
              <div style="" id="center" class="center"> 
                 <div style="border: thin grey solid;" id="top" class="top">
                    <div>
                       <div class="label" id = "topLabel">Select a course to display data:</div>
                       <div style="margin-top: 3%;">
                          <select class="selection" style="float: left; width: 15%;" id = "selectCourse">
                             <option value="" disabled selected>Course Code</option>
                             <option value="all">All courses</option>
                          </select>
                          <div id="newAssignment" style="float: left; width: 20%; margin-left: 3%;"> How many citations? 
                          </div> 
                          <div><input type="number" style="float: left; width: 10%; margin-left: 0%;" class="disabled selection" id="quantity" value="9" min="1" max="500">
                          </div>
                          <div id="createButton" class="button" style="float: left;width: 25%; margin: 0%; margin-left: 8%; margin-top: -.25em;"> Create Assignment
                          </div>
                          <div id="created" class="disabled" style="float: clear; margin-top: 3%;"> Assignment successfully created!
                          </div>
                       </div>
                    </div>
                    
                 </div>
                 <div id="left" class="left">
                    <div>
                       <div class="label" id = "leftLabel">Students:</div>

                       <table id="studentT" class="hidden" style="width:90%;">
                         <tr>
                          <th>NetID</th>
                          <th>Name</th>
                          <th>Citations Completed</th>
                          <th>Weakness</th>
                          <th>Strength</th>
                         </tr>
                       </table> 

                       <table id="assignmentT" class="hidden" style="width:90%;">
                          <tr>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Number of Citations Assigned</th>
                          </tr>
                       </table> 
                    </div>
                 </div>
                 <div style="border: thin grey solid;" id="right" class="right">
                    <div class="label" id = "rightLabel">Courses:</div>
                    <table id="courseT" class="hidden" style="width:90%;">
                      <tr>
                       <th>Course Code</th>
                       <th>Course Name</th>
                       <th>Citations Completed</th>
                       <th>Weakness</th>
                       <th>Strength</th>
                      </tr>
                    </table> 

                    <table id="progressT" class="hidden" style="width:90%;">
                      <tr>
                       <th>Net ID</th>
                       <th>Name</th>
                       <th>Citations Completed</th>
                       <th>Assignment Completed</th>
                      </tr>
                    </table> 
                 </div>
              </div>
              <div style="border: thin red solid;" id="options" class="options"> opt. 
                 <div style="border: thin maroon solid;" id="homeButton" class="button">Home</div>
                 <div style="border: thin maroon solid;" id="assignmentButton" class="button">Assignment</div>
                 <div style="border: thin maroon solid;" id="dataButton" class="active button">Data</div>
              </div>
            </div>
        </main>
        <div class="side-menu-backdrop" onclick="document.getElementById('side-menu').classList.toggle('open')"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js" crossorigin="anonymous"></script>
        <script src="js/home.js"></script>
        <script type="text/javascript" src="js/data.js"></script>
</body>

</html>