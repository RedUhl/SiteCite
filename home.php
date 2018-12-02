<?php include "Database/studentsfunctions.php" ?>
<?php

// if(logged_in()){
//     $username=$_SESSION['username'];
// }else{
//     redirect('login_form.php');
// }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="home.css" />

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

                <img src="#" class="rounded-circle mx-2 flex-shrink-0" style="width: 32px; height: 32px;" />
            </div>
    </header>

    <div id="page" class="d-flex mt-5 pt-3">
        <aside id="side-menu" class="mobile open">
            <div class="side-menu-header d-flex align-items-center pl-3">
                <button class="hamburger-btn btn mr-3" onclick="document.getElementById('side-menu').classList.toggle('open')">
          <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style=" display: block; width: 24px; height: 24px;">
            <g class="style-scope yt-icon">
              <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" class="style-scope yt-icon" fill="#a0a0a0"></path>
            </g>
          </svg>
        </button>
            </div>
            <div class="side-menu-body">
                <div class="list-group">
                    <a href="practice.php" class="list-group-item d-flex align-items-center active">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon mr-3" style=" display: block; width: 24px; height: 24px;"><g class="style-scope yt-icon">
                                <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                            </svg>
                        <span>Home</span>
                    </a>
                    <a href="practice.php" class="list-group-item d-flex align-items-center">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon mr-3" style=" display: block; width: 24px; height: 24px;"><g class="style-scope yt-icon">
                                <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
                            </svg>
                        <span>Practice Problems</span>
                    </a>
                    <a href="#" class="list-group-item d-flex align-items-center">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon mr-3" style="pointer-events: none; display: block; width: 24px; height: 24px;"><g class="style-scope yt-icon">
                                <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
						</svg>
                        <span>Statistics</span>
                    </a>
                </div>
                </a>
            </div>



        </aside>


        <main class="content w-100">
            <div class="container">
                <div class="video-row">
                    <div class="video-row-title my-4 ml-1">
                        <h3>Today</h3>
                    </div>
                    <div class="d-flex pb-5 border-bottom">
                        <div id="container1" class="col px-1 mr-3">
                            <div class="video">
                                <div class="video-thumbnail"><h3>Tutorial</h3></div>
                            </div>
                        </div>
                        <div id="container2" class="col px-1 mx-3">
                            <div class="video">
                                <div class="video-thumbnail"><h3>Assignment</h3></div>
                            </div>
                        </div>
                        <div id="container3" class="col px-1 ml-3">
                            <div class="video">
                                <div  class="video-thumbnail"><a href ="practice.php"></a><h3>Leaderboard</h3></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-row">
                    <div class="video-row-title my-4 ml-1">
                        <h3>Graph</h3>
                    </div>
                    <div class="d-flex pb-5">
                        <div class="col px-1">

                            <div class="video">

                                <div class="graph">
                                    <img src="img/graph.png" height="100%" width="100%">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </main>
        <div class="side-menu-backdrop" onclick="document.getElementById('side-menu').classList.toggle('open')"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="home.js"></script>

</body>

</html>