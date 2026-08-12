/*
 * Front-end interactions for the Best Design WordPress theme.
 * Manages the responsive menu, navigation/logo state, Owl Carousel instances,
 * and the service-description preview shown when a service icon is hovered.
 */

(function ($) {
  "use strict";

  /** Toggles the responsive navigation and keeps aria-expanded synchronized. */
  function toggleNavigation() {
    const menuButton = document.getElementById("menu");
    const navigation = document.getElementById("navi");

    if (!menuButton || !navigation) {
      return;
    }

    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.classList.toggle("change", !isOpen);
    navigation.classList.toggle("change", !isOpen);
    menuButton.setAttribute("aria-expanded", String(!isOpen));
  }

  /** Applies the compact navigation style and switches to the matching theme logo. */
  function updateNavigationOnScroll() {
    const $navigation = $("nav");
    const $logo = $("nav .brand img");
    const isScrolled = $(document).scrollTop() > 0;

    $navigation.toggleClass("shrink", isScrolled);

    if ($logo.length) {
      const nextLogo = isScrolled
        ? $logo.data("logo-scrolled")
        : $logo.data("logo-default");

      if (nextLogo) {
        $logo.attr("src", nextLogo);
      }
    }
  }

  /** Adds the opaque mobile navigation background below the theme's breakpoint. */
  function updateNavigationForViewport() {
    $("nav").toggleClass("bg-opac", $(window).width() < 834);
  }

  /** Configures the full-width home-page service carousel. */
  function initializeHomeCarousel() {
    $(".carousel-home").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      navText: [
        "<i class='fa fa-chevron-left'></i>",
        "<i class='fa fa-chevron-right'></i>",
      ],
      responsive: {
        0: { items: 1 },
        600: { items: 1 },
        1000: { items: 1 },
      },
    });
  }

  /** Configures the responsive portfolio/work carousel. */
  function initializeWorkCarousel() {
    $(".carousel-work").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      responsive: {
        0: { items: 1 },
        600: { items: 2 },
        1000: { items: 3 },
        2500: { items: 5 },
      },
    });
  }

  /** Configures the single-item autoplay testimonial carousel. */
  function initializeTestimonialCarousel() {
    $(".carousel-testimonial").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 50000,
      autoplayHoverPause: false,
      responsive: {
        0: { items: 1 },
        600: { items: 1 },
        1000: { items: 1 },
      },
    });
  }

  /** Copies the hovered service excerpt into the shared service preview area. */
  function showHoveredServiceDescription() {
    const serviceContent = $(this).find("p").first().text();
    $("section.service div.content p").text(serviceContent);
  }

  /** Leaves the current service preview in place when the pointer exits an icon. */
  function keepServiceDescriptionVisible() {
    // Intentionally retains the last hovered service description.
  }

  /** Wires all interaction handlers once the WordPress page DOM is ready. */
  function initializeThemeInteractions() {
    const menuButton = document.getElementById("menu");

    if (menuButton) {
      menuButton.addEventListener("click", toggleNavigation);
    }

    updateNavigationOnScroll();
    updateNavigationForViewport();
    $(document).on("scroll", updateNavigationOnScroll);
    $(window).on("resize", updateNavigationForViewport);

    initializeHomeCarousel();
    initializeWorkCarousel();
    initializeTestimonialCarousel();

    $("section.service .icon").hover(
      showHoveredServiceDescription,
      keepServiceDescriptionVisible,
    );
  }

  $(initializeThemeInteractions);
})(jQuery);
