$(document).ready(function () {
  $(".owl-carousel").owlCarousel();

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
    //navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
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

  $('.carousel-testimonial').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 50000,
    autoplayHoverPause: false,
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
});
