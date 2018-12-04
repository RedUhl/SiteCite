const desktopBreakpoint = 1200;
const sideMenu = document.getElementById('side-menu');

//let debug = document.getElementById('debug');

var login = new XMLHttpRequest();
login.addEventListener("load",(evt)=>{
	//console.log(login.responseText);
	netID = login.responseText;
	if (login.responseText=="not logged in"){
		//show login button
		// hide logout button
	}
	else {
		//hide login button
		//show logout button
		//debug.innerHTML="Welcome "+login.responseText;
	}
}); 
login.open('GET', 'checkLogin.php', true);
login.send();


function onResize() {
    const winWidth = window.innerWidth;
    if (winWidth > desktopBreakpoint - 1) { // desktop
        sideMenu.classList.remove('mobile');
    } else { // mobile
        sideMenu.classList.add('mobile');
    }
}

window.addEventListener('resize', onResize);
onResize();