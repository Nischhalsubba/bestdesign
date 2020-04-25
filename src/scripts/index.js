$(document).ready(function () {

  //header nav shrink
  $(document).on("scroll", function () {
    var scrollTop = $(this).scrollTop();
    if (scrollTop > 0) {
      $("nav").addClass("shrink");
      $("nav .brand img").attr("src", "./images/Bestdesign-ori-color.png");
    } else {
      $("nav").removeClass("shrink");
      $("nav .brand img").attr("src", "./images/Bestdesign-ori-B&W.png");
    }
  });


  //changing class of nav
  function width() {
    if ($(window).width() < 834) {
      $('nav').addClass('bg-opac');
    } else {
      $('nav').removeClass('bg-opac');
    }
  }

  $(window).resize(width);

  $('.carousel-home').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsiveClass:true,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  })

  $('.carousel-work').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    // navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],]
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      },
      2500: {
        items: 5
      }
    }
  })

  $('.carousel-service').owlCarousel({
    loop:true,
    nav: true,
    // margin: 50,
    dots: false,
    responsiveClass:true,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
  })
});
