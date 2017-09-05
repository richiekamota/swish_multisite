// JavaScript Document

$('.toTop').click(function(){
    $('html, body').animate({
        scrollTop: $( "#top" ).offset().top
    }, 1000);
    return false;
});

$('.bannerScroll a').click(function(){
    $('html, body').animate({
        scrollTop: $( "#bannerBottom" ).offset().top
    }, 1000);
    return false;
});

$('a.price-button').click(function(){
    scrollTop: $( "#bannerBottom" ).offset().top
    $("#property-summary").hide();
    $("#property-details").fadeIn();

    return false;
});