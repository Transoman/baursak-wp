'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  Swiper = require('swiper'),
  popup = require('jquery-popup-overlay');

jQuery(document).ready(function($) {
  // Toggle nav menu
  $('.nav-toggle').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('.mobile-menu').toggleClass('is-active');
  });

  // Modal
  $('.modal').popup({
    transition: 'all 0.3s',
    onclose: function() {
      $(this).find('label.error').remove();
    }
  });

  // Slider
  new Swiper('.specials-slider', {
    spaceBetween: 70,
    speed: 1000,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
    autoplay: {
      delay: 3000,
    }
  });

  new Swiper('.recommend-slider', {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 1000,
    autoplay: {
      delay: 3000,
    },
    navigation: {
      nextEl: '.recommend__slider-btns .swiper-button-next',
      prevEl: '.recommend__slider-btns .swiper-button-prev',
    },
    breakpoints: {
      1200: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      992: {
        slidesPerView: 1,
        spaceBetween: 30
      }
    }
  });

  // SVG
  svg4everybody({});
});