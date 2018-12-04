// will be database suplemented
let hint = ["Titles of larger works (i.e. books, journals, encyclopedias) are italicized. Italicize book titles, journal titles, and volume numbers. Do NOT italicize issue numbers.", "Proper nouns are capitalized in English. Their opposite, regular or “common” nouns (which refer to general persons, places, or things), are lowercase. Most nouns when they are followed by numerals or letters are capitalized.", "Author, A. A., Author, B. B., & Author, C. C. (Year). Title of article. 	Title of Periodical, volume number(issue number), first page-last 	page.	doi:xx.1231432.abc"]
let hintVal = 0;
let current = 0;
let correct_array = ["Agius, N. M., & Wilkinson, A. (2014). Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today, 34, 552-559. doi:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013). Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal of Writing Assessment, 6, 13-24.", "Yancey, K. B. (1999). Looking back as we look forward: Historicizing writing assessment. College Composition and Communication, 50, 483-503. doi:10.2307/358862"];
let incorrect_array = ["Agius, N. M., & Wilkinson, A. (2014) Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today: 34, 552-559. DOI:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013), Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal Of Writing assessment. 6, 13-24.", "Yancey, K. B.(1999). Looking back as we look forward: Historicizing writing assessment, College Composition and Communication. 50, 483-503. doi:10.207/358862"];

// Change to false to disable the console logs
let debug_mode = true;
//let num_cites = 3;
let netID = "1";
//Report Modal 
//TODO:Make modal textbox fixed and connect submit button
// Get DOM Elements
const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// var attempt = document.getElementById("attempt");
var citation = document.getElementById("citation");
var hintOne = document.getElementById("hintOne");
var hintTwo = document.getElementById("hintTwo");
var hintThree = document.getElementById("hintThree");
var problem = document.getElementById("incorrect_array");
var resetButton = document.getElementById("resetBtn");
var hintButton = document.getElementById("hintButton");
var submitButton = document.getElementById("submitBtn");
var form = document.querySelector('.needs-validation');


function setup() {
    updateCitations();
    updateProgress(netID);
}

function create_request(constructed_request, callback) {
    var request = new XMLHttpRequest();
    request.open('POST', 'processing.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.addEventListener("load", (evt) => {
        callback(request.responseText);
        //console.log(request.responseText);
    });
    request.send(constructed_request);
}

//Progressbar increment
function progress() {
    var elem = document.getElementById("myBar");
    var width = 10;
    var id = setInterval(frame, 10);

    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++;
            elem.style.width = width + '%';
            elem.innerHTML = width * 1 + '%';
        }
    }
}


function updateProgress(netID) {
    let constructed_requestA = "updating_progress=" + netID;
    let returned_dataA = create_request(constructed_requestA, (returned_dataA) => {
        returned_dataA = JSON.parse(returned_dataA);
        //console.log(returned_dataA);
        let percentage_complete = (parseInt(returned_dataA.course[0].completedcitations) / parseInt(returned_dataA.assignment[0].assignment)) * 100;
        var elem = document.getElementById("myBar");
        var id = setInterval(frame, 10);

        function frame() {
            if (percentage_complete >= 100) {
                //clearInterval(id);
                elem.innerHTML = '100%';
            } else {
                percentage_complete++;
                elem.style.width = percentage_complete + '%';
                elem.innerHTML = percentage_complete * 1 + '%';
            }
        }
    });
}

function updateCitations() {
    let citationRequest = "requestCitation=request";
    let returnedCite = create_request(citationRequest, (returnedCite) => {
        returnedCite = JSON.parse(returnedCite);
        citation.innerHTML = returnedCite[0].citation;
        problem.innerHTML = returnedCite[0].citation;
    });
}

hintButton.addEventListener('click', () => {
    console.log("Hint", hintVal);
    if (hintVal == 0) {
        hintOne.innerText = hint[hintVal];
        hintOne.style.visibility = "visible";
    } else if (hintVal == 1) {
        hintTwo.innerText = hint[hintVal];
        hintTwo.style.visibility = "visible";

    } else if (hintVal == 2) {
        hintThree.innerText = hint[hintVal];
        hintThree.style.visibility = "visible";
    } else {
        console.log("No more hints!");
        return;
    }
    hintVal++;
});


resetButton.addEventListener('click', () => {

});


submitButton.addEventListener('click', () => {
    updateCitations();
});

problem.addEventListener("input", () => {
    submitButton.classList.add("active");
    resetButton.classList.add("active");
});

setup();