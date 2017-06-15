    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/main.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/typeahead.js"></script>
 <script>
        $(document).ready(function() {

            var currentPosition = 0;
            var slideWidth = 610;
            var slides = $('.slide');
            var numberOfSlides = slides.length;
            var slideShowInterval;
            var speed = 3000;

            //Assign a timer, so it will run periodically
            slideShowInterval = setInterval(changePosition, speed);

            slides.wrapAll('<div id="slidesHolder"></div>')

            slides.css({
                'float': 'left'
            });

            //set #slidesHolder width equal to the total width of all the slides
            $('#slidesHolder').css('width', slideWidth * numberOfSlides);

            // $('#slideshow')
            //     .prepend('<span class="nav" id="leftNav">Move Left</span>')
            //     .append('<span class="nav" id="rightNav">Move Right</span>');

            // manageNav(currentPosition);

            //tell the buttons what to do when clicked
            $('.nav').bind('click', function() {

                //determine new position
                currentPosition = ($(this).attr('id') == 'rightNav') ?
                    currentPosition + 1 : currentPosition - 1;

                //hide/show controls
                manageNav(currentPosition);
                clearInterval(slideShowInterval);
                slideShowInterval = setInterval(changePosition, speed);
                moveSlide();
            });

            function manageNav(position) {
                //hide left arrow if position is first slide
                if (position == 0) {
                    $('#leftNav').hide()
                } else {
                    $('#leftNav').show()
                }
                //hide right arrow is slide position is last slide
                if (position == numberOfSlides - 1) {
                    $('#rightNav').hide()
                } else {
                    $('#rightNav').show()
                }
            }


            /*changePosition: this is called when the slide is moved by the 
        timer and NOT when the next or previous buttons are clicked*/
            function changePosition() {
                if (currentPosition == numberOfSlides - 1) {
                    currentPosition = 0;
                    manageNav(currentPosition);
                } else {
                    currentPosition++;
                    manageNav(currentPosition);
                }
                moveSlide();
            }


            //moveSlide: this function moves the slide 
            function moveSlide() {
                $('#slidesHolder')
                    .animate({
                        'marginLeft': slideWidth * (-currentPosition)
                    });
            }

        });

    </script>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '230125567478942',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   $('.sharefacebook').on('click' , function(e)
   {
        e.preventDefault();
        FB.ui({
            method: 'share_open_graph',
            action_type: 'og.shares',
            action_properties: JSON.stringify({
                object:{
                    'og:url':'http://localhost:80/gavel',
                    'og:title': 'sharing',
                    'og:discription': 'hey',
                    'og:image' : '',
                }
            })
         }, function(response){});
   });
</script>
   <?php
    
   if (isset($_SESSION['errorreg'])){
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#login').modal('show');
    });
    </script>";
  }
  ?>
  <?php 
  if (isset($_SESSION['error3'])){
    $err = $_SESSION['error3'];
    echo "<script>alert('$err')</script>";
    unset($_SESSION['error3']);
  }
  ?>
   <script>
        $(document).ready(function() {

            $('input.cause').typeahead({
                name: 'cause',
                remote: '<?php echo URL; ?>search/query/%QUERY'

            });

        })
    </script>
 
    </body>

</html>