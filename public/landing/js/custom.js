/*****Mobile menu********/
$(document).ready(function(){
    $('.mobile-menu').click(function(e){
      $('nav').slideToggle();
    })
    
    $('.play-video').click(function(e){
      $('body').addClass('show');
    });
});

/**********************/
jQuery(document).ready(function($) {
  $('.screenshot-slider .loop').owlCarousel({
    center: true,
    items: 2,
    loop: true,
    margin: 20,
    responsive: {
      0: {
        items: 2
      },
      550: {
        items: 3
      },
      767: {
        items: 4
      },
      991: {
        items: 5
      }
    }
  });
  
});