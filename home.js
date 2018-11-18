const desktopBreakpoint = 1200;
const sideMenu = document.getElementById('side-menu');

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