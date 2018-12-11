<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
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
            <div class="leaderboardcontainer" style="width:80%; margin-top: 2%; margin-left: 2%;">
                <table id="leaderboardT" class="hidden table table-sm">
                  <thead class="thead-dark">
                   <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Citations Completed</th>
                   </tr>
                 </thead>
                </table> 
            </div>
        </main>
        <div class="side-menu-backdrop" onclick="document.getElementById('side-menu').classList.toggle('open')"></div>
        </div>

</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" crossorigin="anonymous"></script>
    <script src="js/home.js"></script>
    <script src="js/leaderboard.js"></script>
</html>