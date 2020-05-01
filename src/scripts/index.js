$(document).ready(function () {

  //header nav shrink
  $(document).on("scroll", function () {
    var scrollTop = $(this).scrollTop();
    if (scrollTop > 0) {
      $("nav").addClass("shrink");
      $("nav .brand img").attr("src", "/assets/images/Bestdesign-ori-color.png");
    } else {
      $("nav").removeClass("shrink");
      $("nav .brand img").attr("src", "/assets/images/Bestdesign-ori-B&W.png");
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
    animateOut: 'fadeOut',
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
    margin: 25,
    nav: true,
    dots: false,
    // navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],]
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 3
      },
      2500: {
        items: 5
      }
    }
  })
});
