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
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    }
  });

  // SVG
  svg4everybody({});
});