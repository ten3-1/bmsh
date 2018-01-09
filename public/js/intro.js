
$(document).ready(function(){


   // var delay=0;
   // $('.row').children('img').each(function () {
   //    $(this).css("display","none");
   //    $(this).delay(delay).show(800).fadeIn(450);
   //     delay += 450;
   // });




    $('#animation').show(1000, function () {
         setTimeout(function () {
             $('#animation').html(function () {
                 setTimeout(function () {
                     $('#animation').html('<div class="logo-intro"><img src="../public/img/landing-page/logointro.png"></div>');        
                 }, 1000);
             });
           }, 2500);
    });



});



// if (window.location.pathname === '' || window.location.pathname === '/') {
    $.when( $.ready ).then(function() {
      setTimeout(function() {
        $('#animation').fadeOut(2000);
        $('#content').fadeIn(2000);
        $("footer").show();
      }, 50 /* milliseconds */)
    })
// }

