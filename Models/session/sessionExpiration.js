$(document).ready(
    $(".warning").hide(),
);

//If inactive for 1 minute
$(document).on('mousemove', function () {
    clearInterval(interval);
    var countdown = 1 * 60, $timer = $('.timer'); // After 1 minute session expired  (mouse button click code)
    $timer.text(countdown);
    interval = setInterval(function () {
        $timer.text(--countdown);

        if(countdown === 59){
            $(".warning").hide();
        }

        if(countdown === 10){
            warning();
        }

        if (countdown === 0) {
            logOut();
        }

    }, 1000);
}).mousemove();

var interval;
            $(document).on('keydown', function () {
    clearInterval(interval);
    var countdown = 1 * 60, $timer = $('.timer'); // After 1 minute session expired  (mouse button click code)
    $timer.text(countdown);
    interval = setInterval(function () {
        $timer.text(--countdown);

        if(countdown === 59){
            $(".warning").hide()
        }

        if(countdown === 10){
            warning();
        }

        if (countdown === 0) {
            logOut();
        }

    }, 1000);
}).mousemove();

function warning(){
    $(".warning").show();
    window.location="#modalLogout";
}

function logOut(){
    alert('Session expired User successfully logout.');
    window.location = '../Models/session/logout.php';
}

$(window).unload(function() {
   $.get('../Models/session/logout.php');
 });

 window.onbeforeunload = function() 
{
    $.get('../Models/session/logout.php');
}