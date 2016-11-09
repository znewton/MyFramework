document.addEventListener("DOMContentLoaded", function(event) {

    document.getElementById('ham-menu').onclick = function(){
        var ham = document.getElementById('ham-menu');
        var drawer = document.getElementById('drawer');
        if(ham.className == '') {
            openMenu(drawer, ham);
        } else {
            closeMenu(drawer, ham);
        }
    };
    window.addEventListener('mousemove', function(e){
        if(e.which == 1){
            swipeMenu(e.pageX);
        }
    }, true);
    window.addEventListener('touchmove', function(e){
        swipeMenu(e.touches[0].clientX);
    }, true);

});


var oldMouseX = 0;
var startMouseX = 0;
var deltaMouseX = 0;
function swipeMenu(x){
    var ham = document.getElementById('ham-menu');
    var drawer = document.getElementById('drawer');

    if(oldMouseX != 0) {
        deltaMouseX = x - oldMouseX;
    }
    oldMouseX = x;
    startMouseX += deltaMouseX;

    var swipeDist = window.outerWidth*4/7;

    if(deltaMouseX < 0 && startMouseX < -swipeDist) {
        openMenu(drawer, ham);
        startMouseX = 0;
    } else if (startMouseX > swipeDist) {
        closeMenu(drawer, ham);
        startMouseX = 0;
    }
}

function openMenu(drawer, ham){
    drawer.className = 'open';
    ham.className = 'open';
}
function closeMenu(drawer, ham){
    drawer.className = '';
    ham.className = '';
}
