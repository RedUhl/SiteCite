
// will be database suplemented
let current = 0;
let correct_array = ["Agius, N. M., & Wilkinson, A. (2014). Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today, 34, 552-559. doi:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013). Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal of Writing Assessment, 6, 13-24.", "Yancey, K. B. (1999). Looking back as we look forward: Historicizing writing assessment. College Composition and Communication, 50, 483-503. doi:10.2307/358862"];
let incorrect_array = ["Agius, N. M., & Wilkinson, A. (2014) Students' and teachers' views of written feedback at undergraduate level: A literature review. Nurse Education Today: 34, 552-559. DOI:10.1016/j.nedt.2013.07.005", "Bang, H. J. (2013), Reliability of National Writing Project’s Analytic Writing Continuum assessment system. Journal Of Writing assessment. 6, 13-24.", "Yancey, K. B.(1999). Looking back as we look forward: Historicizing writing assessment, College Composition and Communication. 50, 483-503. doi:10.2307/358862"];

// Change to false to disable the console logs
let debug_mode = true;
let num_cites = 3;

var attempt = document.getElementById("attempt");
var citation = document.getElementById("citation");

// updating these here so they start w correct value
attempt.innerText = incorrect_array[current];
citation.innerText = incorrect_array[current];

// Logs the correct citation so it can be pasted into the input for easy testing
if (debug_mode){
    console.log(citation);
    }

submitButton.addEventListener('click', () => {
    // TODO: need to add class check to make sure they are active 
    if (attempt.innerText == correct_array[current]) {
        if (debug_mode){
            console.log("Correct");
        }
        current += 1;
        //a temporary measure to make cites loop endlessly lol
        if (current == num_cites){
            current = 0;
        }
        attempt.innerText = incorrect_array[current];
        citation.innerText = incorrect_array[current];
    }
    else if (attempt.innerText == citation.innerText) {
        if (debug_mode){
            console.log("no change");
        }
    }

    else if (attempt.innerText != correct_array[current]) {
        if (debug_mode){
            console.log("incorrect");
        }
        hintButton.classList.add("active");
    }
});
// disables the buttons unless the user has made a change.
attempt.addEventListener("input", () => {
    submitButton.classList.add("active");
    resetButton.classList.add("active");
    });

//options section buttons
exampleButton.addEventListener('click', () => {
    if (debug_mode){
        console.log("example");
    }
});

reportButton.addEventListener('click', () => {
    if (debug_mode){
        console.log("report");
    }
});