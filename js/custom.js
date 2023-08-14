// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// nice select
$(document).ready(function () {
    $('select').niceSelect();
});

// date picker
$(function () {
    $("#inputDate").datepicker({
        autoclose: true,
        todayHighlight: true
    }).datepicker('update', new Date());
});

// owl carousel slider js
$('.team_carousel').owlCarousel({
    loop: true,
    margin: 15,
    dots: true,
    autoplay: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
            margin: 0
        },
        576: {
            items: 2,
        },
        992: {
            items: 3
        }
    }
})

function vanish(){
alert();
    let message = document.getElementById("error");

    message.style.display = "none";
    
}

function cancel(id){
    if (confirm("Are you sure you want to cancel this appointment?")) {
        alert(1);
    }

    alert(1);
}

function diagnose(){
    alert("diagnose active");
    for(var i = 1; i<=18; i++){
    var checkbox = "checkbox";
    var one = chechbox + i;
    one = document.getElementById("checkbox"+i);
    }
 }