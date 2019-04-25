<?php
  if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
  }

  /**
   * Debug function var_dump
   *
   * @param mixed $var
   * @param boolean $die
   */
  function vd( $var, $die = true ) {
    echo '<pre>';
    var_dump( $var );
    echo '</pre>';
    if ( $die ) {
      die();
    }
  }