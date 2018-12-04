<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />

</head>

<body>
    <header class="d-flex align-items-center bg-white fixed-top px-3">
        <button class="hamburger-btn btn mr-3" onclick="document.getElementById('side-menu').classList.toggle('open')">
      <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 24px; height: 24px;">
        <g class="style-scope yt-icon">
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" class="style-scope yt-icon" fill="#a0a0a0"></path>
        </g>
      </svg>
    </button>
        <div class="mx-sm-5 flex-grow-1">
            <div class="d-flex justify-content-end">
                <img src="https://www.elastic.co/assets/bltada7771f270d08f6/enhanced-buzz-1492-1379411828-15.jpg" class="rounded-circle mx-2 flex-shrink-0" style="width: 32px; height: 32px;" />
            </div>
    </header>

    <div id="page" class="d-flex mt-5 pt-3">
        <aside id="side-menu" class="mobile open">
            <div class="side-menu-header d-flex align-items-center pl-3">
                <button class="hamburger-btn btn mr-3" onclick="document.getElementById('side-menu').classList.toggle('open')">
          <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 24px; height: 24px;">
            <g class="style-scope yt-icon">
              <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" class="style-scope yt-icon" fill="#a0a0a0"></path>
            </g>
          </svg>
        </button>
            </div>
            <div class="side-menu-body">
                <?php include "sidebar.php"?>
<!--                  <div class="list-group">

                    <a href="home.php" class="list-group-item d-flex align-items-center active">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon mr-3" style=" display: block; width: 24px; height: 24px;"><g class="style-scope yt-icon">
                                <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                            </svg>
                         TODO: fix the home button 
                        <span>Home</span>
                    </a>
                    <a href="practice.php" class="list-group-item d-flex align-items-center">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon mr-3" style=" display: block; width: 24px; height: 24px;"><g class="style-scope yt-icon">
                                <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
                            </svg>
                        <span>Practice Problems</span>
                    </a>
                    <a href="#" class="list-group-item d-flex align-items-center">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon mr-3" style="display: block; width: 24px; height: 24px;"><g class="style-scope yt-icon">
                                <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
						</svg>
                        <span>Statistics</span>
                    </a>
                </div>

                </a>
            </div> --> 

        </aside>


        <main class="content w-100">
            <div id="container" class="container">
                <div class="progress">
                    <div id="myBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="video-row">
                    <div class="video-row-title my-4 ml-1">
                        <h3>Citation</h3>
                    </div>
                    <div class="d-flex pb-5">
                        <div class="col px-1">
                            <div class="video">
                                <div id="citation" class="graph"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TODO: make this form editable -->
                <label for="attempt">Correct the citation</label>
                <div class="toolbar">
                    <!-- TODO: get this to work again -->
                    <button class="btn" type="button" onclick="document.execCommand('italic', false, '');">I
                            </button></div>
                <form class="main-form needs-validation" novalidate>
                    <input type="text" id="incorrect_array" contenteditable="true" class="form-control" required>
                    <div class="invalid-feedback">Incorrect</div>

                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>

                </form>
                <button id="resetBtn" type="button" class="btn btn-secondary">Reset</button>
                <button id="hintButton" type="button" class="btn btn-secondary">Hint</button>

                <!-- Hints -->
                <div id="hintOne" class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Hint</h4>
                    <hr>
                    <p class="mb-0"></p>
                </div>
                <div id="hintTwo" class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Hint</h4>
                    <hr>
                    <p class="mb-0"></p>
                </div>
                <div id="hintThree" class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Hint</h4>
                    <hr>
                    <p class="mb-0"></p>
                </div>

            </div>
        </main>
        <div class="side-menu-backdrop" onclick="document.getElementById('side-menu').classList.toggle('open')"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" crossorigin="anonymous"></script>
    <script src="js/home.js"></script>
    <script src="js/p3.js"></script>


</body>

</html>