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
            </div> 

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