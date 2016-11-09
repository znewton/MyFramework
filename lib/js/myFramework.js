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
    window.addEventListener('touchend', function(e){
        document.getElementById('drawer-indicator').style.width = '0';
    }, true);

});


var oldMouseX = 0;
var startMouseX = 0;
var deltaMouseX = 0;
var swipeDist = window.outerWidth*4/7;
function swipeMenu(x){
    var ham = document.getElementById('ham-menu');
    var drawer = document.getElementById('drawer');

    if(oldMouseX != 0) {
        deltaMouseX = x - oldMouseX;
    }
    oldMouseX = x;
    startMouseX += deltaMouseX;

    var swipeRatio = (Math.abs(startMouseX/swipeDist));
    if (swipeRatio > 1){
        swipeRatio = 1;
    }

    if(deltaMouseX < 0 && startMouseX < -swipeDist) {
        openMenu(drawer, ham);
        startMouseX = 0;
    } else if (startMouseX > swipeDist) {
        closeMenu(drawer, ham);
        startMouseX = 0;
    } else if (drawer.className != 'open'){
        document.getElementById('drawer-indicator').style.width = window.outerWidth/7 * swipeRatio + 'px';

    }

}

function openMenu(drawer, ham){
    drawer.className = 'open';
    ham.className = 'open';
    // setTimeout(function(){
    //     document.getElementById('drawer-indicator').style.width = '0';
    // }, 100);
}
function closeMenu(drawer, ham){
    drawer.className = 'close';
    ham.className = '';
    // setTimeout(function(){
    //     document.getElementById('drawer-indicator').style.width = '0';
    // }, 100);
}
