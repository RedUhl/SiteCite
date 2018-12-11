let leaderboardT = document.getElementById('leaderboardT');


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

function leaderboard_Table(){
   leaderboardT.classList.remove('hidden');
   let lbarray = []
   let constructed_requestA = "updatingLeaderboard=true";
   let returned_dataA = create_request(constructed_requestA, (returned_dataA)=>{
      returned_dataA = JSON.parse(returned_dataA);
      //console.log(returned_dataA);
      returned_dataA.completedcitations.sort((a,b)=> {
      	return parseInt(b.completedcitations) - parseInt(a.completedcitations);
      });
      for (var i = 0; i<returned_dataA.completedcitations.length; i++){
      	let leaderboardObj = {
      		"rank":i+1,
        	"studentName":returned_dataA.completedcitations[i].name, 
        	"completedcitations":parseInt(returned_dataA.completedcitations[i].completedcitations)
         };
         toTable([leaderboardObj], leaderboardT);
      }
      //console.log(returned_dataA);
   }); 
}

leaderboard_Table();