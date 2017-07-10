$(document).ready(function () {
    $('#signup_form').css("display", "none");
    $('#login_form').css("displya", "none");
    var signup_btn = $('.form_area a')[1];
    var login_btn = $('.form_area a')[2];
    var close_pop = $('.reg_area p')[0];
    $(close_pop).css("cursor", "pointer");
    $('.login_btn').click(function () {
        $('.reg_area').fadeIn('fast').effect("bounce", {times: 100});
        $('#signup_form').css("display", "none");
        $('#login_form').css("display", "block");
    });
    $('.signup_btn').click(function () {
        $('.reg_area').fadeIn('fast').effect("bounce", {times: 100});
        $('#login_form').css("display", "none");
        $('#signup_form').css("display", "block");
        $('.form_area').css("margin-top", "10%");
    });
    $(close_pop).click(function () {
        $('.reg_area').fadeOut('fast');
    });
    $(signup_btn).click(function (e) {
        e.preventDefault();
        $('#login_form').fadeOut('fast');
        $('#signup_form').fadeIn('slow');
        $('.form_area').css("margin-top", "10%");
    });
    $(login_btn).click(function (e) {
        e.preventDefault();
        $('#signup_form').fadeOut('fast');
        $('#login_form').fadeIn('slow');
        $('.form_area').css("margin-top", "15%");
    });
});
$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (window.matchMedia("(min-width: 1000px)").matches)
    {
        if (y >= 300)
        {
            $('.r_side_bar').animate({
                top : 0
            }, .5);
            $('.l_side_bar').animate({
                top : 0
            }, .5);
        }
        else
        {
            $('.r_side_bar').animate({
                top: 287
            }, .5);
            $('.l_side_bar').animate({
                top: 287
            }, .5);
        }
    }
});
$(function () {

    setInterval ("slideImages()", 2000);

});

function slideImages () {
    var oCurImage = $("#slide div.current");
    var oNxtImage = oCurImage.next();

    if (oNxtImage.length == 0) {
        oNxtImage == $("#slide div:nth-child(1)").addClass('current');
    } else {
        oCurImage.removeClass('current').addClass('previous');
        oNxtImage.css({opacity: 0}).addClass('current').animate({opacity: 1.0}, 1000,

            function () {
                oCurImage.removeClass('previous');
            });
    }
}
function handleClick()
{
    var amountYes = 0;
    for(var i = 1; i <= 45; i++) {
        var radios = document.getElementsByName('q'+i);
        for(var j = 0; j < radios.length; j++) {
            var radio = radios[j];
            if(radio.value == "yes" && radio.checked) {
                amountYes++;
            }
        }
    }
    if (amountYes <= 2) {
       $.ajax({
           type: "POST",
           url: "results.php",
           data: $('#quiz').serialize(),
           dataType: "json",
           success: function (response) {
               console.log('feedback ' + response);
           }
       });
    } else {
        alert("Correct Responses: " + amountYes);
    }
    return false;
}