//start on hover open dropdown menu
$('.dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
        }, 
        function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp();
        }
    );

    $('.dropdown-menu').hover(
        function() {
            $(this).stop(true, true);
        },
        function() {
            $(this).stop(true, true).delay(200).slideUp();
        }
    );


//start script of go to the div or id
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
//End script of go to the div or id


$('#carousel-example-generic').carousel({
  interval: 5000
})




//owl carousel of poor section
   $(document).ready(function () {

        var owl = $("#owl-demo1");

        owl.owlCarousel({
            items: 5, //10 items above 1000px browser width
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
        })

    });

   //owl carousel of projects section
   $(document).ready(function () {

        var owl = $("#owl-demo2");

        owl.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
        })

    });


   /////counter

 $('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 20000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  
});
  