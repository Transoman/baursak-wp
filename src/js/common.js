'use strict';

global.jQuery = require('jquery');
var svg4everybody = require('svg4everybody'),
  Swiper = require('swiper'),
  popup = require('jquery-popup-overlay'),
  simplebar = require('simplebar'),
  Imask = require('imask'),
  readmore = require('readmore-js');

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

  var productThumbSlider = new Swiper('.woo-product-thumb-slider', {
    slidesPerView: 3,
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      767: {
        slidesPerView: 5,
        spaceBetween: 10
      },
      480: {
        slidesPerView: 4,
        spaceBetween: 10
      }
    }
  });

  var productSlider = new Swiper('.woo-product-slider', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  $('.woo-product-thumb-slider__item').click(function(e) {
    var activeIndex = productThumbSlider.clickedIndex;
    productSlider.slideTo(activeIndex);
    $('.woo-product-thumb-slider__item').removeClass('active');
    $(this).addClass('active');
  });

  productSlider.on('slideChange', function() {
    var currentItem = productSlider.activeIndex;
    $('.woo-product-thumb-slider__item').removeClass('active');
    productThumbSlider.slideTo(currentItem);
    $(productThumbSlider.$wrapperEl).children().eq(currentItem).addClass('active');
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
    $('.cart-overlay').toggleClass('is-active');
  });

  $('.small-cart__close').click(function(e) {
    e.preventDefault();
    $('.small-cart').removeClass('is-active');
    $('.cart-overlay').removeClass('is-active');
  });

  $('.cart-overlay').click(function(e) {
    e.preventDefault();
    $('.small-cart').removeClass('is-active');
    $('.cart-overlay').removeClass('is-active');
  });

  $('.widget-area__close').click(function(e) {
    e.preventDefault();
    $('.widget-area').removeClass('is-active');
  });

  $('.filter-toggle').click(function(e) {
    e.preventDefault();
    $('.widget-area').toggleClass('is-active');
  });

  // Map
  /*
  *  new_map
  *
  *  This function will render a Google Map onto the selected jQuery element
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	$el (jQuery element)
  *  @return	n/a
  */

  function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
      zoom		: 16,
      center		: new google.maps.LatLng(0, 0),
      mapTypeId	: google.maps.MapTypeId.ROADMAP
    };


    // create map
    var map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function(){

      add_marker( $(this), map );

    });


    // center map
    center_map( map );


    // return
    return map;

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	$marker (jQuery element)
  *  @param	map (Google Map object)
  *  @return	n/a
  */

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position	: latlng,
      map			: map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content		: $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }

  /*
  *  center_map
  *
  *  This function will center the map, showing all markers attached to this map
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	map (Google Map object)
  *  @return	n/a
  */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
      // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  /*
  *  document ready
  *
  *  This function will render each map when the document is ready (page has loaded)
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	5.0.0
  *
  *  @param	n/a
  *  @return	n/a
  */
  // global var
  var map = null;

  $('.acf-map').each(function(){

    // create map
    map = new_map( $(this) );

  });

  // Input Mask
  var inputsPhone = $('input[type="tel"]');
  var maskOptions = {
    mask: '+{7} (000) 000-00-00'
  };

  if (inputsPhone.length) {
    inputsPhone.each(function(i, el) {
      new IMask(el, maskOptions);
    });

  }

  // Readmore
  $('.filter').readmore({
    collapsedHeight: 115,
    moreLink: '<a href="#" class="btn">Показать еще</a>',
    lessLink: '<a href="#" class="btn">Спрятать</a>'
  });

  // Qty buton
  function changeProductQuantity() {
    $(document).on( 'click', '.woo-quantity__btn', function(e) {
      e.preventDefault();

      var $button = $( this ),
        $qty = $button.siblings( '.woo-quantity__val' ),
        current = parseInt( $qty.val() && $qty.val() > 0 ? $qty.val() : 0, 10 ),
        min = parseInt( $qty.attr( 'min' ), 10 ),
        max = parseInt( $qty.attr( 'max' ), 10 );

      min = min ? min : 0;
      max = max ? max : current + 1;

      if ( $button.hasClass( 'woo-quantity__btn--minus' ) && current > min ) {
        $qty.val( current - 1 );
        $qty.trigger( 'change' );
      }

      if ( $button.hasClass( 'woo-quantity__btn--plus' ) && current < max ) {
        $qty.val( current + 1 );
        $qty.trigger( 'change' );
      }

      $( '.woocommerce-cart-form' ).find( ':input[name="update_cart"]' ).prop( 'disabled', false );
      $("[name='update_cart']").trigger("click");
    });
  }

  changeProductQuantity();

  $('.quantity__val').keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl/cmd+A
      (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: Ctrl/cmd+C
      (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: Ctrl/cmd+X
      (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });

  // SVG
  svg4everybody({});
});