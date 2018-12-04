
let selectCourse = document.getElementById('selectCourse');
let studentT = document.getElementById('studentT');
let newAssignment = document.getElementById('newAssignment');
let courseT = document.getElementById('courseT');
let assignmentT = document.getElementById('assignmentT');
let progressT = document.getElementById('progressT');
let debug = document.getElementById('debug');
let assignmentButton = document.getElementById('assignmentButton');
let dataButton = document.getElementById('dataButton');
let createButton = document.getElementById('createButton');
let created = document.getElementById('created');
let quantity = document.getElementById('quantity');
let topLabel = document.getElementById('topLabel');
let leftLabel = document.getElementById('leftLabel');
let rightLabel = document.getElementById('rightLabel');
let activeButton = "assignment";
let tutorialButton = document.getElementById('tutorialButton');

let courses = "";

function setup(){
   let constructed_request = "enum=courses";
   let returned_data = create_request(constructed_request, (returned_data)=>{
      courses = JSON.parse(returned_data);
      //debug.innerHTML = returned_data;
      for (var i = 0; i<courses.length; i++){
          var opt = document.createElement('option');
          opt.value = courses[i].courseCode;
          opt.innerHTML = courses[i].courseCode + " - " + courses[i].courseName;
          selectCourse.appendChild(opt);
      }
      selectCourse.value = "";
   });
   update_Page();
   assignment_Table("all");
}

function toTable(data, tablename){
   var col = [];
   for (var i = 0; i < data.length; i++) {
      for (var key in data[i]) {
          if (col.indexOf(key) === -1) {
              col.push(key);
          }
      }
   }
   //console.log(col);
   for (var i = 0; i < data.length; i++) {
      var tr = tablename.insertRow(-1);
      for (var j = 0; j < col.length; j++) {
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = data[i][col[j]];
      }
   }
}
function clearTable(table){
   for(var i = table.rows.length - 1; i > 0; i--)
   {
       table.deleteRow(i);
   }
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

function student_Table(courseSelection){
   let returned_array = [];
   let table_array = [];
   //let constructed_request = "listCourseMembers=" + courseSelection;
   let constructed_request = "listAssignmentCompletions=" + courseSelection;
   let returned_data = create_request(constructed_request, (returned_data)=>{
      returned_data = JSON.parse(returned_data);
      for (var i = 0; i < returned_data.length; i++) {
         returned_array.push(returned_data[i][0]);
      }
      //console.log(returned_array);
      let score_array = [];
      for (var i = 0; i < returned_array.length; i++) {
         let lowest = 101;
         let highest = 1;
         let weakness = "";
         let strength = "";
         returned_array[i].capitalizationscore = parseInt(returned_array[i].capitalizationscore);
         returned_array[i].formatingscore = parseInt(returned_array[i].formatingscore);
         returned_array[i].orderingscore = parseInt(returned_array[i].orderingscore);
         returned_array[i].punctuationscore = parseInt(returned_array[i].punctuationscore);

         if (returned_array[i].capitalizationscore <= lowest && returned_array[i].capitalizationscore != 0){
            if (returned_array[i].capitalizationscore == lowest){
               strength += ", Capitalization";
            }
            else{
               strength = "Capitalization";
            }
            lowest = returned_array[i].capitalizationscore;
         } 

         if (returned_array[i].formatingscore <= lowest && returned_array[i].formatingscore != 0){
            if (returned_array[i].formatingscore == lowest){
               strength += " Formatting";
            }
            else{
               strength = "Formatting";
            }
            lowest = returned_array[i].formatingscore;
         } 

         if (returned_array[i].orderingscore <= lowest && returned_array[i].orderingscore != 0){
            if (returned_array[i].orderingscore == lowest){
               strength += ", Ordering";
            }
            else{
               strength = "Ordering";
            }
            lowest = returned_array[i].orderingscore;
         } 

         if (returned_array[i].punctuationscore <= lowest && returned_array[i].punctuationscore != 0){
            if (returned_array[i].punctuationscore == lowest){
               strength += ", Punctuation";
            }
            else{
               strength = "Punctuation";
            }
            lowest = returned_array[i].punctuationscore;
         } 

         if (returned_array[i].capitalizationscore >= highest){
            if (returned_array[i].capitalizationscore == highest){
               weakness += ", Capitalization";
            }
            else{
               weakness = "Capitalization";
            }
            highest = returned_array[i].capitalizationscore;
         } 
         if (returned_array[i].formatingscore >= highest){
            if (returned_array[i].formatingscore == highest){
               weakness += ", Formatting";
            }
            else{
               weakness = "Formatting";
            }
            highest = returned_array[i].formatingscore;
         } 
         if (returned_array[i].orderingscore >= highest){
            if (returned_array[i].orderingscore == highest){
               weakness += ", Ordering";
            }
            else{
               weakness = "Ordering";
            }
            highest = returned_array[i].orderingscore;
         } 
         if (returned_array[i].punctuationscore >= highest){
            if (returned_array[i].punctuationscore == highest){
               weakness += ", Punctuation";
            }
            else{
               weakness = "Punctuation";
            }
            highest = returned_array[i].punctuationscore;
         }

         var student = {};
         student.studentID = returned_array[i].studentID;
         student.name = returned_array[i].name;
         student.completed = returned_array[i].completedcitations;
         student.weakness = weakness;
         student.strength = strength;
         table_array.push(student);
      }

      studentT.classList.remove('hidden');
      toTable(table_array, studentT);
   });
}

function course_Table(courseSelection){
   courseT.classList.remove('hidden');
   let constructed_requestC = "listCourseInformation=" + courseSelection;
   let returned_dataC = create_request(constructed_requestC, (returned_dataC)=>{
      returned_dataC = JSON.parse(returned_dataC);
      num_courses = returned_dataC.scores.length;

      let totals = returned_dataC.scores.reduce((accumulator, current_value)=>{
         accumulator.capitalizationscore+=parseInt(current_value.capitalizationscore);
         accumulator.formatingscore+=parseInt(current_value.formatingscore);
         accumulator.orderingscore+=parseInt(current_value.orderingscore);
         accumulator.punctuationscore+=parseInt(current_value.punctuationscore);
         accumulator.completedcitations += parseInt(current_value.completedcitations);
         return accumulator;
      }, {capitalizationscore:0, formatingscore:0, orderingscore:0, punctuationscore:0, completedcitations:0});

      let cap_avg = totals.capitalizationscore/num_courses; 
      let for_avg = totals.formatingscore/num_courses;
      let ord_avg = totals.orderingscore/num_courses;
      let pun_avg = totals.punctuationscore/num_courses;
      let completed = totals.completedcitations;

      let avg_array = [cap_avg, for_avg, ord_avg, pun_avg];
      let weakest = [];
      let strongest = [];
      let coursesObj = {
         "coursecode":returned_dataC.courseInfo[0].coursecode, 
         "coursename":returned_dataC.courseInfo[0].coursename, 
         "completed": completed,
         "weakness": "", 
         "strength": ""
      };

      let highest = -1; //weak -- more chance of encounter
      let lowest = 101; //strong -- less chance of encounter 
      for (var i = 0; i < avg_array.length; i++){
         if (avg_array[i]==lowest){
            strongest.push(i);
         }
         if (avg_array[i]==highest){
            weakest.push(i);
         }
         if (avg_array[i]>highest){
            highest = avg_array[i];
            weakest = [i];
         }
         if (avg_array[i]<lowest){
            lowest = avg_array[i];
            strongest = [i];
         }
      }
      if (weakest[0] == 0){
         coursesObj.weakness = "Capitalization";
      }
      if (weakest[0] == 1){
         coursesObj.weakness = "Formatting";
      }
      if (weakest[0] == 2){
         coursesObj.weakness = "Ordering";
      }
      if (weakest[0] == 3){
         coursesObj.weakness = "Punctuation";
      }
      if (strongest[0] == 0){
         coursesObj.strength = "Capitalization";
      }
      if (strongest[0] == 1){
         coursesObj.strength = "Formatting";
      }
      if (strongest[0] == 2){
         coursesObj.strength = "Ordering";
      }
      if (strongest[0] == 3){
         coursesObj.strength = "Punctuation";
      }

      toTable([coursesObj], courseT);
   });
}

function assignment_Table(courseSelection){
   assignmentT.classList.remove('hidden');
   progressT.classList.remove('hidden');
   let constructed_requestA = "listAssignmentInformation=" + courseSelection;
   let returned_dataA = create_request(constructed_requestA, (returned_dataA)=>{
      returned_dataA = JSON.parse(returned_dataA);
      for (var i = 0; i < returned_dataA.assignment.length; i++){
         toTable([returned_dataA.assignment[i]], assignmentT);}
      for (var i = 0; i < returned_dataA.progress.length; i++){
         let progressObj = {
         "studentID":returned_dataA.progress[i].studentID, 
         "studentName":returned_dataA.progress[i].name, 
         "completedcitations":parseInt(returned_dataA.progress[i].completedcitations), 
         "assignment": ""
         };

         //TODO DEBUG
         for (var j = 0; j < returned_dataA.info.length; j++){
            if (parseInt(returned_dataA.progress[i].courseID) == parseInt(returned_dataA.info[j].courseID)){
               if(progressObj.completedcitations >= parseInt(returned_dataA.info[j].assignment)){
                  progressObj.assignment = "✓";
               }
               if(progressObj.completedcitations < parseInt(returned_dataA.info[j].assignment)){
                  progressObj.assignment = "྾";
               }
               else{
                  //progressObj.assignment = "";
               }
            }
         }
         toTable([progressObj], progressT);}
   }); 
}

function update_Page(){
   clearTable(studentT);
   clearTable(courseT);
   clearTable(assignmentT);
   clearTable(progressT);
   created.classList.add("disabled");
   selectCourse.value="";
   if (activeButton == "assignment"){
      selectCourse.classList.remove('disabled');
      newAssignment.classList.remove('disabled');
      studentT.classList.add('disabled');
      courseT.classList.add('disabled');
      assignmentT.classList.remove('disabled');
      progressT.classList.remove('disabled');
      topLabel.innerHTML="Select a course to create an assignment:";
      quantity.classList.remove('disabled');
      leftLabel.innerHTML = "Active Assignment:";
      rightLabel.innerHTML = "Assignment Progress:";
      createButton.classList.remove('disabled');
      assignmentButton.classList.add('active');
      dataButton.classList.remove('active');
   }
   if (activeButton == "data"){
      selectCourse.classList.remove('disabled');
      newAssignment.classList.add('disabled');
      studentT.classList.remove('disabled');
      courseT.classList.remove('disabled');
      assignmentT.classList.add('disabled');
      studentT.classList.add('hidden');
      courseT.classList.add('hidden');
      progressT.classList.add('disabled');
      quantity.classList.add('disabled');
      topLabel.innerHTML="Select a course to display data:";
      leftLabel.innerHTML = "Students:";
      rightLabel.innerHTML = "Courses:";
      createButton.classList.add('disabled');
      assignmentButton.classList.remove('active');
      dataButton.classList.add('active');
   }
}

createButton.addEventListener("click",(evt)=>{
   created.classList.remove('disabled');
   setTimeout(function(){ created.classList.add('disabled'); }, 3000);
});

assignmentButton.addEventListener("click",(evt)=>{
   activeButton = "assignment";
   update_Page();
   assignment_Table("all");
});

dataButton.addEventListener("click",(evt)=>{
   activeButton = "data";
   update_Page();
});


selectCourse.addEventListener("change", (evt)=>{
   if (activeButton == "data"){
      if (selectCourse.value != "all"){
         clearTable(studentT);
         clearTable(courseT);
         student_Table(selectCourse.value);
         course_Table(selectCourse.value);
      }
      if (selectCourse.value == "all"){
         clearTable(studentT);
         clearTable(courseT);
         for (var i = 0; i<courses.length; i++){
            courseCode = courses[i].courseCode;
            student_Table(courseCode);
            course_Table(courseCode);

         }
      }
   }
   if (activeButton == "assignment"){

   }
});


setup();