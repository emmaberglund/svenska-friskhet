jQuery(function($) { // DOM is now read and ready to be manipulated

    $( document ).ready(function() {
        console.log( "ready!" );
    });
    //
    // $(window).scroll(function() {
    //     if ($(this).scrollTop() == 0) {
    //         $('#header').css({
    //                 'position': 'fixed',
    //                 'background-color': 'black',
    //                 'width': '80%',
    //                 'left': '10%',
    //                 'margin-top': '40px',
    //                 'padding': '20px 0',
    //                 'transition': 'background 1s',
    //                 'transition': 'margin-top 0.5s',
    //                 'z-index': '5'
    //
    //              });
    //              $('#header #desktop-menu ul').css({
    //                  'top':'27px'
    //              });
    //              $('#header #show-menu').css({
    //                  'top':'50px'
    //              });
    //     }
    //     else {
    //         $('#header').css({
    //                 'background-color': 'rgba(0, 0, 0, 0.66)',
    //                 'position': 'fixed',
    //                 'width': '100%',
    //                 'left': '0',
    //                 'margin-top': '0',
    //                 'padding': '0',
    //                 'transition': 'background 1s',
    //                 'z-index': '5'
    //                 //'transition': 'margin-top 0.5s'
    //                 //'box-shadow': '0px 10px 10px #888',
    //                 //'-moz-box-shadow' : '0px 10px 10px #888',
    //                 //'-webkit-box-shadow' : '0px 10px 10px #888'
    //             });
    //             $('#header #desktop-menu ul').css({
    //                 'top':'0'
    //             });
    //             $('#header #show-menu').css({
    //                 'top':'30px'
    //             });
    //     }
    // });

    $("#show-menu").click(function(){
        $("#menu-primary").toggle(500);
    });

    // $(document).ready(function () {
    //     $(document).on('mouseenter', '.news', function () {
    //         $(this).find(":button").fadeIn();
    //     }).on('mouseleave', '.news', function () {
    //         $(this).find(":button").fadeOut();
    //     });
    // });
    //

//Wrap div around all ul:s
//$( ".news-text ul" ).wrapAll( "<div class='news-ul' />");

//Remove empty p tags
$( 'p:empty' ).remove();

//Function for checking which workers div is clicked and show the correct block-over
function toggle_workers( event ) {
  var target = $( event.target );
  var workers = $('.workers').length;
  for(var i = 0; i < workers ; i++){
      if ( target.is( "#person-" + i) ) {
          $('#block-' + i).fadeToggle('slow');

      }
      else if(target.is("#block-" + i) || target.is("#block-" + i + " p") || target.is("#block-" + i + " span")){
          $("#block-" + i).fadeToggle('slow');
      }
  }
}
$( ".workers-image" ).click( toggle_workers );
$( ".worker-title" ).click( toggle_workers );
$( ".block-over" ).click( toggle_workers );



});
