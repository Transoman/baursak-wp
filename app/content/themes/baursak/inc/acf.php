<?php
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
      'page_title' 	=> 'Настройки темы',
      'menu_title'	=> 'Настройки темы',
      'menu_slug' 	=> 'theme-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));

  }

  function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyBmnk4RCDwjSucIJ2WXRnLkuCrsWR4DUM4');
  }

  add_action('acf/init', 'my_acf_init');