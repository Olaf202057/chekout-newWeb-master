/*
Theme Name: Munch Box - MULTIPURPOSE HTML5 Template.
Author: Slidesigma
Author URL: https://www.templatemonster.com/vendors/slidesigmathemes/
Version: 1.0.0
*/
(function ($) {
  'use strict';
  $(document).ready(function () {
    $(".delivery-add").click(function () {
      $(".location-picker").toggleClass("open");
      $(".delivery-add").toggleClass("open");
    });
    $("#stepbtn1, #step1, #prev-1").click(function(){
      $("#steppanel1").addClass('active');
      $("#steppanel2, #steppanel3, #steppanel4").removeClass('active');

      $("#stepbtn1").addClass('active');
      $("#step1").addClass('active');

      $("#stepbtn1, #step1").removeClass('done');
      $("#stepbtn2, #stepbtn3, #stepbtn4").removeClass('active done');
      $("#step2, #step3, #step4").removeClass('active done');

      $("#next-2, #next-3, #prev-1, #prev-2, #prev-3, #finish-1").hide();
      $("#next-1").show();
    });
    $("#stepbtn2, #step2, #next-1, #prev-2").click(function(){
      $("#steppanel1, #steppanel3, #steppanel4").removeClass('active');
      $("#steppanel2").addClass('active');

      $("#stepbtn1").addClass('done').removeClass('active');
      $("#step1").addClass('done').removeClass('active');

      $("#stepbtn2").addClass('active');
      $("#step2").addClass('active');

      $("#stepbtn2, #step2").removeClass('done');
      $("#stepbtn3, #stepbtn4").removeClass('active done');
      $("#step3, #step4").removeClass('active done');

      $("#next-1, #next-3, #prev-2, #prev-3, #finish-1").hide();
      $("#next-2, #prev-1").show();
    });
    $("#stepbtn3, #step3, #next-2, #prev-3").click(function(){
      $("#steppanel3").addClass('active');
      $("#steppanel1, #steppanel2, #steppanel4").removeClass('active');

      $("#stepbtn1").addClass('done').removeClass('active');
      $("#step1").addClass('done').removeClass('active');

      $("#stepbtn2").addClass('done').removeClass('active');
      $("#step2").addClass('done').removeClass('active');

      $("#stepbtn3").addClass('active');
      $("#step3").addClass('active');

      $("#stepbtn3, #step3").removeClass('done');
      $("#stepbtn4").removeClass('active done');
      $("#step4").removeClass('active done');

      $("#next-1, #next-2, #prev-1, #prev-3, #finish-1").hide();
      $("#next-3, #prev-2").show();
    });
    $("#stepbtn4, #step4, #next-3").click(function(){
      $("#steppanel1, #steppanel2, #steppanel3").removeClass('active');
      $("#steppanel4").addClass('active');

      $("#stepbtn1").addClass('done').removeClass('active');
      $("#step1").addClass('done').removeClass('active');

      $("#stepbtn2").addClass('done').removeClass('active');
      $("#step2").addClass('done').removeClass('active');

      $("#stepbtn3").addClass('done').removeClass('active');
      $("#step3").addClass('done').removeClass('active');

      $("#stepbtn4").addClass('active');
      $("#step4").addClass('active');

      $("#next-1, #next-2, #prev-1, #next-3, #prev-2").hide();
      $("#prev-3, #finish-1").show();
    });
    $("#finish-1").click(function(){
      alert("Registered Successfully");
    });
    $(".header .right-side .user-details").click(function(){
      $(".user-dropdown").toggleClass("show");
    });
    $(".header .right-side .cart-btn.cart-dropdown").click(function(){
      $(".cart-dropdown .cart-detail-box").toggleClass("show");
    });
    $(".parent-megamenu").click(function(){
      $(".megamenu").toggleClass("show");
    });
    // like dislike
    $(".circle-tag img, .add-fav img, .add-wishlist img").on('click', function () {
      if ($(this).attr("src").toString().indexOf('assets/img/svg/013-heart-1.svg') != -1) {
      this.src = this.src.replace("assets/img/svg/013-heart-1.svg", "assets/img/svg/010-heart.svg");
      }
      else {
      this.src = this.src.replace("assets/img/svg/010-heart.svg", "assets/img/svg/013-heart-1.svg");
      }
      });
    });
    // Video
    $(document).on('click', '.js-videoPoster', function (e) {
      e.preventDefault();
      var poster = $(this);
      var wrapper = poster.closest('.js-videoWrapper');
      videoPlay(wrapper);
    });

    function videoPlay(wrapper) {
      var iframe = wrapper.find('.js-videoIframe');
      var src = iframe.data('src');
      wrapper.addClass('videoWrapperActive');
      iframe.attr('src', src);
    }
    $('.parent-megamenu').click(function() {
      $('.parent-megamenu>a>i').toggleClass('fa-bars');
      $('.parent-megamenu>a>i').toggleClass('fa-times');
    });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      $('.header').css("top", "0");
    } else {
      $('.header').css("top", "auto");
    }
  });
  // modal popup
  $(document).ready(function () {
    if (document.cookie.indexOf('visited=true') == -1) {
      $('#offer').modal({
        show: true
      });
      var year = 1000 * 60 * 60 * 24 * 365;
      var expires = new Date((new Date()).valueOf() + year);
      document.cookie = "visited=true;expires=" + expires.toUTCString();
    }
    if ($('#banner-adv').length > 0) {
      $('.close-banner').on('click', function () {
        $('#banner-adv').hide()
      });
    }
    if ($('#banner-adv2').length > 0) {
      $('.close-banner').on('click', function () {
        $('#banner-adv2').hide()
      });
    }
  });
  // instagram slider
  var swiper = new Swiper('.instagram-slider', {
    slidesPerView: 2,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: false,
    breakpoints: {
      480: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 6,
      },
      1500: {
        slidesPerView: 8,
      },
    }
  });

  // category-slider
  var swiper = new Swiper('.category-slider', {
    slidesPerView: 2,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 8,
        spaceBetween: 15,
      },
    }
  });
  // popular-item-slider
  var swiper = new Swiper('.popular-item-slider', {
    slidesPerView: 2,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 5,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 6,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 8,
        spaceBetween: 15,
      },
      1800: {
        slidesPerView: 10,
        spaceBetween: 15,
      },
    }
  });
  // popular-item-slider
  var swiper = new Swiper('.near-offer-slider', {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 4,
        spaceBetween: 15,
      }
    }
  });
  // featured-partners-slider
  var swiper = new Swiper('.featured-partners-slider', {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 3,
        spaceBetween: 15,
      }
    }
  });
  // trending-slider
  var swiper = new Swiper('.trending-slider', {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 4,
        spaceBetween: 15,
      }
    }
  });
  // fresh deals
  var swiper = new Swiper('.fresh-deals-slider', {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 4,
        spaceBetween: 15,
      }
    }
  });
  // kosher-delivery-slider
  var swiper = new Swiper('.kosher-delivery-slider', {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 1,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 3,
        spaceBetween: 15,
      }
    }
  });
  // food near me
  var swiper = new Swiper('.food-near-me', {
    slidesPerView: 2,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 8,
        spaceBetween: 15,
      }
    }
  });
  // advertisement slider
  var swiper = new Swiper('.advertisement-slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
  // about-us-slider slider
  var swiper = new Swiper('.about-us-slider', {
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    speed: 1000,
    grabCursor: true,
    watchSlidesProgress: true,
    mousewheelControl: true,
    keyboardControl: true,
    slidesPerView: 1,
    spaceBetween: 0,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
  // about-us-slider slider
  var swiper = new Swiper('.feedback-slider', {
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    speed: 1000,
    grabCursor: true,
    watchSlidesProgress: true,
    mousewheelControl: true,
    keyboardControl: true,
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
  // Delivery time range
  $(".delivery-range-slider").ionRangeSlider({
    min: 0,
    from: new Date().getMonth(),
    values: ["45 min", "60 min", "Any"],
    grid: true
  });
  // Distance range
  $(".distance-range-slider").ionRangeSlider({
    min: 0,
    from: new Date().getMonth(),
    values: ["1/4 mi", "1/2 mi", "1 mi", "2 mi", "3 mi", "4 mi", "5 mi", "10 mi"],
    grid: true
  });
  // password hide show
  $(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("data-name"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  // smooth scroll
  $.fn.smoothScroll = function (setting) {
    var _default = {
        duration: 1000,
        easing: 'swing',
        offset: 0,
        top: '100px'
      },
      _setting = $.extend(_default, setting),
      _handler = function () {
        var dest = 0,
          target = this.hash,
          $target = $(target);
        $(this).on('click', function (e) {
          e.preventDefault();
          if ($target.offset().top > ($(document).height() - $(window).height())) {
            dest = $(document).height() - $(window).height();
          } else {
            dest = $target.offset().top - _setting.offset;
          }
          $('html, body').animate({
            scrollTop: dest
          }, _setting.duration, _setting.easing);
        });
      };
    return this.each(_handler);
  };
  $('.scrollnav .nav-pills .nav-link').smoothScroll({
    duration: 1000, // animation speed
    easing: 'swing', // find more easing options on http://api.jqueryui.com/easings/
    offset: 0 // custom offset
  });
  // quantity plus minus
  $('.minus-btn').on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('.quantity').find('input');
    var value = parseInt($input.val());
    if (value > 1) {
      value = value - 1;
    } else {
      value = 1;
    }
    $input.val(value);
  });
  $('.plus-btn').on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('.quantity').find('input');
    var value = parseInt($input.val());
    if (value < 100) {
      value = value + 1;
    } else {
      value = 100;
    }
    $input.val(value);
  });
  // countdown timer
  function makeTimer() {
    var endTime = new Date("01 January 2020 00:00:00 GMT+05:30");
    endTime = (Date.parse(endTime) / 1000);
    var now = new Date();
    now = (Date.parse(now) / 1000);
    var timeLeft = endTime - now;
    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
    if (hours < "10") {
      hours = "0" + hours;
    }
    if (minutes < "10") {
      minutes = "0" + minutes;
    }
    if (seconds < "10") {
      seconds = "0" + seconds;
    }
    $("#mb-days").html(days + "<h6 class='mb-0'>Days</h6>");
    $("#mb-hours").html(hours + "<h6 class='mb-0'>Hours</h6>");
    $("#mb-minutes").html(minutes + "<h6 class='mb-0'>Minutes</h6>");
    $("#mb-seconds").html(seconds + "<h6 class='mb-0'>Seconds</h6>");
  }
  setInterval(function () {
    makeTimer();
  }, 1000);
  // nice selct
  $(document).ready(function () {
    $('select.custom-select-2').niceSelect();
  });
  // sticky side bar
  $(function(){
    if($('body').is('.sidefix')){
           $(document).ready(function() {
            $('.sidebar2').sticksy();
            $('.sidebar3').sticksy();
          });
      }
  });
  // gallery
  $('.image-popup').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function
      opener: function (openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });
  // custom tabs restaurent page

  // full view page
  $(function () {
    $('.fullpageview').on('click', function () {
      $('.md-modal').addClass('md-show');
    });
    $('.md-close').on('click', function () {
      $('.md-modal').removeClass('md-show');
    });
  });
  $(document).keydown(function (event) {
    if (event.keyCode == 27) {
      $('.md-modal').removeClass('md-show');
    }
  });



})(jQuery);
