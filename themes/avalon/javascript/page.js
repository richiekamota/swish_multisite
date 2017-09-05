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

$(document).ready(function() {
    $('#roomDataTable').DataTable();
} );