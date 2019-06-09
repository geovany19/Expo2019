var $hands = $('#liveclock div.hand')

window.requestAnimationFrame = window.requestAnimationFrame
    || window.mozRequestAnimationFrame
    || window.webkitRequestAnimationFrame
    || window.msRequestAnimationFrame
    || function (f) { setTimeout(f, 60) }


function updateclock() {
    var curdate = new Date()
    var hour_as_degree = (curdate.getHours() + curdate.getMinutes() / 60) / 12 * 360
    var minute_as_degree = curdate.getMinutes() / 60 * 360
    var second_as_degree = (curdate.getSeconds() + curdate.getMilliseconds() / 1000) / 60 * 360
    $hands.filter('.hour').css({ transform: 'rotate(' + hour_as_degree + 'deg)' })
    $hands.filter('.minute').css({ transform: 'rotate(' + minute_as_degree + 'deg)' })
    $hands.filter('.second').css({ transform: 'rotate(' + second_as_degree + 'deg)' })
    requestAnimationFrame(updateclock)
}

requestAnimationFrame(updateclock)

function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //Agregar un cero antes de los números < 10
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;

    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}