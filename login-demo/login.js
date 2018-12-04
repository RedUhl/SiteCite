
let loginButton = document.getElementById('loginButton');


// function create_request(constructed_request, callback){
//    var request = new XMLHttpRequest();
//    request.open('POST', 'index.php', true);
//    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
//    request.addEventListener("load",(evt)=>{
//       //debug.innerText = (request.responseText);
//       callback(request.responseText);
//       console.log(request.responseText);
//    });      
//    request.send(constructed_request);
// }

loginButton.addEventListener("click",(evt)=>{
   window.location.href="login.php";
   console.log("clicked");
});
