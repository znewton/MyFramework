document.addEventListener("DOMContentLoaded", function(event) {

    document.getElementById('ham-menu').onclick = function(){
        var ham = document.getElementById('ham-menu');
        var drawer = document.getElementById('drawer');
        var swipeArea = document.getElementById('swipe-area');
        if(ham.className == '') {
            openMenu(drawer, ham, swipeArea);
        } else {
            closeMenu(drawer, ham, swipeArea);
        }
    };
    document.getElementById('swipe-area').addEventListener('mousemove', function(e){
        if(e.which == 1){
            swipeMenu(e, e.pageX);
        }
    }, true);
    document.getElementById('swipe-area').addEventListener('touchmove', function(e){
        swipeMenu(e, e.touches[0].clientX);
    }, true);

});


var oldMouseX = 0;
var startMouseX = 0;
var deltaMouseX = 0;
function swipeMenu(e, x){
    e.preventDefault();
    e.stopPropagation();
    console.log('move');
    var ham = document.getElementById('ham-menu');
    var drawer = document.getElementById('drawer');
    var swipeArea = document.getElementById('swipe-area');

    if(oldMouseX != 0) {
        deltaMouseX = x - oldMouseX;
    }
    oldMouseX = x;
    startMouseX += deltaMouseX;

    if(deltaMouseX > 0 && startMouseX > 50) {
        openMenu(drawer, ham, swipeArea);
        startMouseX = 0;
    } else if (startMouseX < -50) {
        closeMenu(drawer, ham, swipeArea);
        startMouseX = 0;
    }
}

function openMenu(drawer, ham, swipeArea){
    drawer.className = 'open';
    ham.className = 'open';
    swipeArea.style.left = '240px';
}
function closeMenu(drawer, ham, swipeArea){
    drawer.className = '';
    ham.className = '';
    swipeArea.style.left = '0';
}
