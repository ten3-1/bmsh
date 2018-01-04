// images apparitions
$(document).ready(function() {
    // apparition d'une image
    $(".mshnb").delay( 800 ).fadeIn( 800 );
    $(".boutique").delay( 1800 ).fadeIn( 800 );
    $(".mains").delay( 2500 ).fadeIn( 1800);
    $("video").delay( 2100 ).fadeIn( 800 );

    $(".mshnb").delay( 1500 ).fadeOut( 800 );
    $(".boutique").delay( 2100 ).fadeOut( 900 );
    $(".mains").delay( 3500 ).fadeOut( 2500 );
    $("video").delay( 2800 ) .fadeOut( 800 ); 
});


// redirection
const xhr = new XMLHttpRequest();
xhr.open("GET", "./accueil", true);
xhr.onload = function() {
    setInterval(function() {
    window.location = "./accueil"
    }, 20000)
}
xhr.send()