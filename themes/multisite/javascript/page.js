// JavaScript Document


$('.toTop').click(function () {
    $('html, body').animate({
        scrollTop: $("#top").offset().top
    }, 1000);
    return false;
});

$('.bannerScroll a').click(function () {
    $('html, body').animate({
        scrollTop: $("#bannerBottom").offset().top
    }, 1000);
    return false;
});

function priceSignUp(floorNumber) {
      swal({
  title: 'Please enter your email address to view Room Pricing',
  html:    
    '<input id="swal-input1" class="swal2-input" placeholder="Email">',
  focusConfirm: false,
  preConfirm: function () {
    return new Promise(function (resolve) {
      resolve([
        $('#swal-input1').val()        
      ])
    })
  }
}).then(email => {

       if(!isValidEmailAddress( email )) {
            swal("Oh no!", "The submission failed! Please enter a valid email address.", "error");
        }else{
            return fetch('/email/capture?e=' + email);
        }

   }).then(results => {

       return results.json();

   }).then(json => {

       window.location = "/property/floors/" + floorNumber;

   }).catch(err => {

       if (err) {
            swal("Oh no!", "The submission failed! Please try again.", "error");
        } else {
            swal.stopLoading();
            swal.close();
        }

   });
 }  

function floorReserve(floorNumber) {
      swal({
  title: 'Please enter your name and email to reserve the floor',
  html:
    '<input id="swal-input1" class="swal2-input" placeholder="Name">' +
    '<input id="swal-input2" class="swal2-input" placeholder="Email">',
  focusConfirm: false,
  preConfirm: function () {
    return new Promise(function (resolve) {
      resolve([
        $('#swal-input1').val(),
        $('#swal-input2').val()
      ])
    })
  }
}).then(email => {

       if(!isValidEmailAddress( email )) {
            swal("Oh no!", "The submission failed! Please enter a valid email address.", "error");
        }else{
            return fetch('/email/capture?e=' + email);
        }

   }).then(results => {

       return results.json();

   }).then(json => {

       window.location = "/property/floors/" + floorNumber + "/" + ID;

   }).catch(err => {

       if (err) {
            swal("Oh no!", "The submission failed! Please try again.", "error");
        } else {
            swal.stopLoading();
            swal.close();
        }

   });
 }  

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};