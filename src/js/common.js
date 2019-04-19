'use strict';

global.jQuery = require('jquery');
var svg4everybody = require('svg4everybody'),
  Swiper = require('swiper'),
  popup = require('jquery-popup-overlay'),
  simplebar = require('simplebar');

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

  new Swiper('.partners-list', {
    slidesPerView: 5,
    spaceBetween: 20,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1200: {
        slidesPerView: 4,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      767: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 20
      }
    }
  });

  // Toggle search form
  $('.tools__btn--search').click(function(e) {
    e.preventDefault();

    var input = $('.small-form-search input');
    $('.tools__item--search').toggleClass('is-active');
    setTimeout(function() {
      input.focus();
    }, 200);

  });

  $('.small-form-search button[type="submit"]').click(function(e) {
    e.preventDefault();

    var input = $('.small-form-search input');

    if (input.val() == '') {
      $('.tools__item--search').toggleClass('is-active');
      setTimeout(function() {
        input.focus();
      }, 200);
    }
    else {
      $('.small-form-search').submit();
    }
  });

  $('.tools__item--cart .tools__btn').click(function(e) {
    e.preventDefault();
    $('.small-cart').toggleClass('is-active');
  });

  $('.small-cart__close').click(function(e) {
    e.preventDefault();
    $('.small-cart').removeClass('is-active');
  });

  // SVG
  svg4everybody({});
});