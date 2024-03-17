(function ($)
  { "use strict"
  
/* 1. Proloder */
    $(window).on('load', function () {
      $('#preloader-active').delay(450).fadeOut('slow');
      $('body').delay(450).css({
        'overflow': 'visible'
      });
    });

/* 2. sticky And Scroll UP */
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 400) {
        $(".header-sticky").removeClass("sticky-bar");
        $('#back-top').fadeOut(500);
      } else {
        $(".header-sticky").addClass("sticky-bar");
        $('#back-top').fadeIn(500);
      }
    });
  // Scroll Up
    $('#back-top a').on("click", function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  

/* 3. slick Nav */
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    };

/* 4. MainSlider-1 */
    // h1-hero-active
    function mainSlider() {
      var BasicSlider = $('.slider-active');
      BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
      });
      BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
      });
      BasicSlider.slick({
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        fade: true,
        arrows: false, 
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              dots: false
            }
          }
        ]
      });

      function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
          var $this = $(this);
          var $animationDelay = $this.data('delay');
          var $animationType = 'animated ' + $this.data('animation');
          $this.css({
            'animation-delay': $animationDelay,
            '-webkit-animation-delay': $animationDelay
          });
          $this.addClass($animationType).one(animationEndEvents, function () {
            $this.removeClass($animationType);
          });
        });
      }
    }
    mainSlider();

    
/* 5. Testimonial Active*/
  var testimonial = $('.h1-testimonial-active');
    if(testimonial.length){
    testimonial.slick({
        dots: true,
        infinite: true,
        speed: 1000,
        autoplay:false,
        arrows: false,
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              arrow:true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              arrow:true
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              arrow:true
            }
          }
        ]
      });
    }


/* 6. Nice Selectorp  */
  var nice_Select = $('select');
    if(nice_Select.length){
      nice_Select.niceSelect();
    }

/* 7. data-background */
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });


/* 10. WOW active */
    new WOW().init();


    
// 11. ---- Mailchimp js --------//  
    function mailChimp() {
      $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();



// 12 Pop Up Img
    var popUp = $('.single_gallery_part, .img-pop-up');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'image',
          gallery:{
            enabled:true
          }
        });
      }
      
// 12 Pop Up Video
    var popUp = $('.popup-video');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'iframe'
        });
      }




})(jQuery);

(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
      setTimeout(function () {
          if ($('#spinner').length > 0) {
              $('#spinner').removeClass('show');
          }
      }, 1);
  };
  spinner();
  
  
  // Back to top button
  $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
          $('.back-to-top').fadeIn('slow');
      } else {
          $('.back-to-top').fadeOut('slow');
      }
  });
  $('.back-to-top').click(function () {
      $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
      return false;
  });


  // Sidebar Toggler
  $('.sidebar-toggler').click(function () {
      $('.sidebar, .content').toggleClass("open");
      return false;
  });


  // Progress Bar
  $('.pg-bar').waypoint(function () {
      $('.progress .progress-bar').each(function () {
          $(this).css("width", $(this).attr("aria-valuenow") + '%');
      });
  }, {offset: '80%'});


  // Calender
  $('#calender').datetimepicker({
      inline: true,
      format: 'L'
  });


  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
      autoplay: true,
      smartSpeed: 1000,
      items: 1,
      dots: true,
      loop: true,
      nav : false
  });


  // Worldwide Sales Chart
  var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
  var myChart1 = new Chart(ctx1, {
      type: "bar",
      data: {
          labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
          datasets: [{
                  label: "USA",
                  data: [15, 30, 55, 65, 60, 80, 95],
                  backgroundColor: "rgba(0, 156, 255, .7)"
              },
              {
                  label: "UK",
                  data: [8, 35, 40, 60, 70, 55, 75],
                  backgroundColor: "rgba(0, 156, 255, .5)"
              },
              {
                  label: "AU",
                  data: [12, 25, 45, 55, 65, 70, 60],
                  backgroundColor: "rgba(0, 156, 255, .3)"
              }
          ]
          },
      options: {
          responsive: true
      }
  });


  // Salse & Revenue Chart
  var ctx2 = $("#salse-revenue").get(0).getContext("2d");
  var myChart2 = new Chart(ctx2, {
      type: "line",
      data: {
          labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
          datasets: [{
                  label: "Salse",
                  data: [15, 30, 55, 45, 70, 65, 85],
                  backgroundColor: "rgba(0, 156, 255, .5)",
                  fill: true
              },
              {
                  label: "Revenue",
                  data: [99, 135, 170, 130, 190, 180, 270],
                  backgroundColor: "rgba(0, 156, 255, .3)",
                  fill: true
              }
          ]
          },
      options: {
          responsive: true
      }
  });
  


  // Single Line Chart
  var ctx3 = $("#line-chart").get(0).getContext("2d");
  var myChart3 = new Chart(ctx3, {
      type: "line",
      data: {
          labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
          datasets: [{
              label: "Salse",
              fill: false,
              backgroundColor: "rgba(0, 156, 255, .3)",
              data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
          }]
      },
      options: {
          responsive: true
      }
  });


  // Single Bar Chart
  var ctx4 = $("#bar-chart").get(0).getContext("2d");
  var myChart4 = new Chart(ctx4, {
      type: "bar",
      data: {
          labels: ["Italy", "France", "Spain", "USA", "Argentina"],
          datasets: [{
              backgroundColor: [
                  "rgba(0, 156, 255, .7)",
                  "rgba(0, 156, 255, .6)",
                  "rgba(0, 156, 255, .5)",
                  "rgba(0, 156, 255, .4)",
                  "rgba(0, 156, 255, .3)"
              ],
              data: [55, 49, 44, 24, 15]
          }]
      },
      options: {
          responsive: true
      }
  });


  // Pie Chart
  var ctx5 = $("#pie-chart").get(0).getContext("2d");
  var myChart5 = new Chart(ctx5, {
      type: "pie",
      data: {
          labels: ["Italy", "France", "Spain", "USA", "Argentina"],
          datasets: [{
              backgroundColor: [
                  "rgba(0, 156, 255, .7)",
                  "rgba(0, 156, 255, .6)",
                  "rgba(0, 156, 255, .5)",
                  "rgba(0, 156, 255, .4)",
                  "rgba(0, 156, 255, .3)"
              ],
              data: [55, 49, 44, 24, 15]
          }]
      },
      options: {
          responsive: true
      }
  });


  // Doughnut Chart
  var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
  var myChart6 = new Chart(ctx6, {
      type: "doughnut",
      data: {
          labels: ["Italy", "France", "Spain", "USA", "Argentina"],
          datasets: [{
              backgroundColor: [
                  "rgba(0, 156, 255, .7)",
                  "rgba(0, 156, 255, .6)",
                  "rgba(0, 156, 255, .5)",
                  "rgba(0, 156, 255, .4)",
                  "rgba(0, 156, 255, .3)"
              ],
              data: [55, 49, 44, 24, 15]
          }]
      },
      options: {
          responsive: true
      }
  });

  
})(jQuery);


(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
      setTimeout(function () {
          if ($('#spinner').length > 0) {
              $('#spinner').removeClass('show');
          }
      }, 1);
  };
  spinner();
  
  
  // Back to top button
  $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
          $('.back-to-top').fadeIn('slow');
      } else {
          $('.back-to-top').fadeOut('slow');
      }
  });
  $('.back-to-top').click(function () {
      $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
      return false;
  });


  // Sidebar Toggler
  $('.sidebar-toggler').click(function () {
      $('.sidebar, .content').toggleClass("open");
      return false;
  });


  // Progress Bar
  $('.pg-bar').waypoint(function () {
      $('.progress .progress-bar').each(function () {
          $(this).css("width", $(this).attr("aria-valuenow") + '%');
      });
  }, {offset: '80%'});


  // Calender
  $('#calender').datetimepicker({
      inline: true,
      format: 'L'
  });


  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
      autoplay: true,
      smartSpeed: 1000,
      items: 1,
      dots: true,
      loop: true,
      nav : false
  });


  // Worldwide Sales Chart
  var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
  var myChart1 = new Chart(ctx1, {
      type: "bar",
      data: {
          labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
          datasets: [{
                  label: "USA",
                  data: [15, 30, 55, 65, 60, 80, 95],
                  backgroundColor: "rgba(0, 156, 255, .7)"
              },
              {
                  label: "UK",
                  data: [8, 35, 40, 60, 70, 55, 75],
                  backgroundColor: "rgba(0, 156, 255, .5)"
              },
              {
                  label: "AU",
                  data: [12, 25, 45, 55, 65, 70, 60],
                  backgroundColor: "rgba(0, 156, 255, .3)"
              }
          ]
          },
      options: {
          responsive: true
      }
  });


  // Salse & Revenue Chart
  var ctx2 = $("#salse-revenue").get(0).getContext("2d");
  var myChart2 = new Chart(ctx2, {
      type: "line",
      data: {
          labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
          datasets: [{
                  label: "Salse",
                  data: [15, 30, 55, 45, 70, 65, 85],
                  backgroundColor: "rgba(0, 156, 255, .5)",
                  fill: true
              },
              {
                  label: "Revenue",
                  data: [99, 135, 170, 130, 190, 180, 270],
                  backgroundColor: "rgba(0, 156, 255, .3)",
                  fill: true
              }
          ]
          },
      options: {
          responsive: true
      }
  });
  


  // Single Line Chart
  var ctx3 = $("#line-chart").get(0).getContext("2d");
  var myChart3 = new Chart(ctx3, {
      type: "line",
      data: {
          labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
          datasets: [{
              label: "Salse",
              fill: false,
              backgroundColor: "rgba(0, 156, 255, .3)",
              data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
          }]
      },
      options: {
          responsive: true
      }
  });


  // Single Bar Chart
  var ctx4 = $("#bar-chart").get(0).getContext("2d");
  var myChart4 = new Chart(ctx4, {
      type: "bar",
      data: {
          labels: ["Italy", "France", "Spain", "USA", "Argentina"],
          datasets: [{
              backgroundColor: [
                  "rgba(0, 156, 255, .7)",
                  "rgba(0, 156, 255, .6)",
                  "rgba(0, 156, 255, .5)",
                  "rgba(0, 156, 255, .4)",
                  "rgba(0, 156, 255, .3)"
              ],
              data: [55, 49, 44, 24, 15]
          }]
      },
      options: {
          responsive: true
      }
  });


  // Pie Chart
  var ctx5 = $("#pie-chart").get(0).getContext("2d");
  var myChart5 = new Chart(ctx5, {
      type: "pie",
      data: {
          labels: ["Italy", "France", "Spain", "USA", "Argentina"],
          datasets: [{
              backgroundColor: [
                  "rgba(0, 156, 255, .7)",
                  "rgba(0, 156, 255, .6)",
                  "rgba(0, 156, 255, .5)",
                  "rgba(0, 156, 255, .4)",
                  "rgba(0, 156, 255, .3)"
              ],
              data: [55, 49, 44, 24, 15]
          }]
      },
      options: {
          responsive: true
      }
  });


  // Doughnut Chart
  var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
  var myChart6 = new Chart(ctx6, {
      type: "doughnut",
      data: {
          labels: ["Italy", "France", "Spain", "USA", "Argentina"],
          datasets: [{
              backgroundColor: [
                  "rgba(0, 156, 255, .7)",
                  "rgba(0, 156, 255, .6)",
                  "rgba(0, 156, 255, .5)",
                  "rgba(0, 156, 255, .4)",
                  "rgba(0, 156, 255, .3)"
              ],
              data: [55, 49, 44, 24, 15]
          }]
      },
      options: {
          responsive: true
      }
  });

  
})(jQuery);

