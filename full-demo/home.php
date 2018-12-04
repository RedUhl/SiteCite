<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

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

                <img src="<img src="https://www.elastic.co/assets/bltada7771f270d08f6/enhanced-buzz-1492-1379411828-15.jpg" class="rounded-circle mx-2 flex-shrink-0" style="width: 32px; height: 32px;" />
            </div>
    </header>

    <div id="page" class="d-flex mt-5 pt-3">
    <?php include "sidebar.php"?>
        <main class="content w-100">
            <div class="container">
                <div class="video-row">
                    <div class="video-row-title my-4 ml-1">
                        <h3>Today</h3>
                    </div>
                    <div class="d-flex pb-5 border-bottom">
                        <div id="container1" class="col px-1 mr-3 container1">
                            <div class="video">
                                <div class="video-thumbnail"><h3>Tutorial</h3></div>
                                <div id="debug"></div>
                            </div>
                        </div>
                        <div id="container2" class="col px-1 mx-3 container2">
                            <div class="video">
                                <div class="video-thumbnail"><h3>Assignment</h3></div>
                            </div>
                        </div>
                        <div id="container3" class="col px-1 ml-3 container3">
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