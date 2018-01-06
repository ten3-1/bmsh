// parallax sur l'image d'en-tête


// flexslider en-tête
/*$(document).ready(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5
  });
});*/




// page catalogue - action sur les images
$(document).ready(function() {
	$(".produits li").mouseenter(function() {
		$(this).css({'opacity': 1});
		// régler l'affichage des légendes au passage de la souris
		// à faire quand la liaison avec la bdd sera faite
		$(".produits figcaption").fadeIn(200);
	});
	$(".produits li").mouseleave(function() {
		$(this).css({'opacity': 0.6});
		// régler l'affichage des légendes au passage de la souris
		// à faire quand la liaison avec la bdd sera faite
		$(".produits figcaption").fadeOut(200);
	});

});



// flexslider - page d'accueil - menu Savoir-faire
$(window).load(function() {
	$('.flexslider').flexslider({
	animation: "slide",
	animationLoop: false,
	itemWidth: 210,
	itemMargin: 5,
	minItems: 2,
	maxItems: 4
	});
});




///
function CSVToArray( strData, strDelimiter ){
        // Check to see if the delimiter is defined. If not,
        // then default to comma.
        strDelimiter = (strDelimiter || ",");

        // Create a regular expression to parse the CSV values.
        var objPattern = new RegExp(
            (
                // Delimiters.
                "(\\" + strDelimiter + "|\\r?\\n|\\r|^)" +

                // Quoted fields.
                "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" +

                // Standard fields.
                "([^\"\\" + strDelimiter + "\\r\\n]*))"
            ),
            "gi"
            );


        // Create an array to hold our data. Give the array
        // a default empty first row.
        var arrData = [[]];

        // Create an array to hold our individual pattern
        // matching groups.
        var arrMatches = null;


        // Keep looping over the regular expression matches
        // until we can no longer find a match.
        while (arrMatches = objPattern.exec( strData )){

            // Get the delimiter that was found.
            var strMatchedDelimiter = arrMatches[ 1 ];

            // Check to see if the given delimiter has a length
            // (is not the start of string) and if it matches
            // field delimiter. If id does not, then we know
            // that this delimiter is a row delimiter.
            if (
                strMatchedDelimiter.length &&
                strMatchedDelimiter !== strDelimiter
                ){

                // Since we have reached a new row of data,
                // add an empty row to our data array.
                arrData.push( [] );

            }

            var strMatchedValue;

            // Now that we have our delimiter out of the way,
            // let's check to see which kind of value we
            // captured (quoted or unquoted).
            if (arrMatches[ 2 ]){

                // We found a quoted value. When we capture
                // this value, unescape any double quotes.
                strMatchedValue = arrMatches[ 2 ].replace(
                    new RegExp( "\"\"", "g" ),
                    "\""
                    );

            } else {

                // We found a non-quoted value.
                strMatchedValue = arrMatches[ 3 ];

            }


            // Now that we have our value string, let's add
            // it to the data array.
            arrData[ arrData.length - 1 ].push( strMatchedValue );
        }

        // Return the parsed data.
        return( arrData );
    }

$(document).ready(function(){
    $("p").click(function(){
        $(this).hide();
    });
    
    var coords = $("#monc").attr("coords");
    tabCoords = coords.split(",");
    x = tabCoords[0];
    y = tabCoords[1];
    
    alert("x=" + x + ",y=" + y);
});

 
