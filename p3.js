// will be database suplemented
let hint = ["Just do it like that, but better", "Firmly Grasp It", "HOW MANY TIMES DO I HAVE TO TELL YOU OLD MAN!!!"]
let hintVal = 0;
let current = 0;
let correct_array = ["Agius, N. M., & Wilkinson, A. (2014). Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today, 34, 552-559. doi:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013). Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal of Writing Assessment, 6, 13-24.", "Yancey, K. B. (1999). Looking back as we look forward: Historicizing writing assessment. College Composition and Communication, 50, 483-503. doi:10.2307/358862"];
let incorrect_array = ["Agius, N. M., & Wilkinson, A. (2014) Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today: 34, 552-559. DOI:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013), Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal Of Writing assessment. 6, 13-24.", "Yancey, K. B.(1999). Looking back as we look forward: Historicizing writing assessment, College Composition and Communication. 50, 483-503. doi:10.2307/358862"];

// Change to false to disable the console logs
let debug_mode = true;
let num_cites = 3;

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

// updating these here so they start w correct value
// attempt.innerText = incorrect_array[current];
problem.value = correct_array[current];
citation.innerText = incorrect_array[current];

// Logs the correct citation so it can be pasted into the input for easy testing



// Events
// if (debug_mode) {
//     console.log(correct_array[current]);
// }

// modalBtn.addEventListener('click', () => {
//     modal.style.display = 'block';
// });
// closeBtn.addEventListener('click', () => {
//     modal.style.display = 'none';
// });
// //close modal on outside click
// window.addEventListener('click', (e) => {
//     if (e.target == modal) {
//         modal.style.display = 'none';
//     }
// });

//Progressbar increment
function progress() {
    var elemBar = document.getElementById("myBar");
    var width = 10;
    var id = setInterval(frame, 10);

    function frame() {
        if (width >= 10) {
            clearInterval(id);
        } else {
            elemBar.style.width++;
            elemBar.innerHTML = width * 1 + '%';
        }
    }
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
    console.log("yes yes yes");
    problem.value = correct_array[current];
});




submitButton.addEventListener('click', () => {
    // TODO: need to add class check to make sure they are active 
    if (problem.value == correct_array[current]) {
        if (debug_mode) {
            console.log("Correct");
            hintVal = 0;
            progress();
        }
        current += 1;

        //a temporary measure to make cites loop endlessly lol
        if (current == num_cites) {
            current = 0;
        }
        problem.value = correct_array[current];
        citation.innerText = incorrect_array[current];
        if (debug_mode) {
            console.log(correct_array[current]);
        }
    } else if (problem.value == citation.innerText) {
        if (debug_mode) {
            console.log("no change");
        }
    } else if (problem.value != correct_array[current]) {
        if (debug_mode) {
            console.log("incorrect");
        }
        hintButton.classList.add("active");
    }
});

//     prevents page from reloading when validating 
//    TODO: figure out how to validate 

form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add('was-validated');
});
// disables the buttons unless the user has made a change.
problem.addEventListener("input", () => {
    submitButton.classList.add("active");
    resetButton.classList.add("active");
});