document.addEventListener("DOMContentLoaded", function(event) {

    document.getElementById('ham-menu').onclick = function(){
        var ham = document.getElementById('ham-menu');
        var drawer = document.getElementById('drawer');
        var swipeArea = document.getElementById('swipe-area');
        if(ham.className == '') {
            drawer.className = 'open';
            ham.className = 'open';
            swipeArea.style.left = '240px';
        } else {
            drawer.className = '';
            ham.className = '';
            swipeArea.style.left = '0';
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
        drawer.className = 'open';
        ham.className = 'open';
        swipeArea.style.left = '240px';
        startMouseX = 0;
    } else if (startMouseX < -50) {
        drawer.className = '';
        ham.className = '';
        swipeArea.style.left = '0';
        startMouseX = 0;
    }
}
