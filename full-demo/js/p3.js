// will be database suplemented
let hint = ["Just do it like that, but better", "Firmly Grasp It", "HOW MANY TIMES DO I HAVE TO TELL YOU OLD MAN!!!"]
let hintVal = 0;
let current = 0;
let correct_array = ["Agius, N. M., & Wilkinson, A. (2014). Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today, 34, 552-559. doi:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013). Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal of Writing Assessment, 6, 13-24.", "Yancey, K. B. (1999). Looking back as we look forward: Historicizing writing assessment. College Composition and Communication, 50, 483-503. doi:10.2307/358862"];
let incorrect_array = ["Agius, N. M., & Wilkinson, A. (2014) Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today: 34, 552-559. DOI:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013), Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal Of Writing assessment. 6, 13-24.", "Yancey, K. B.(1999). Looking back as we look forward: Historicizing writing assessment, College Composition and Communication. 50, 483-503. doi:10.2307/358862"];

// Change to false to disable the console logs
let debug_mode = true;
//let num_cites = 3;

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


function setup(){
    updateCitations();
}

function create_request(constructed_request, callback){
   var request = new XMLHttpRequest();
   request.open('POST', 'processing.php', true);
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
   request.addEventListener("load",(evt)=>{
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

function updateCitations(){
    let citationRequest = "requestCitation=request";
    let returnedCite = create_request(citationRequest, (returnedCite)=>{
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