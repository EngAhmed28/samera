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





///slider duration

$('#carousel-example-2').carousel({
  interval: 80000
})

   
  
//owl carousel
   $(document).ready(function () {

        var owl = $("#owl-demo1");

        owl.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
        })

    });





