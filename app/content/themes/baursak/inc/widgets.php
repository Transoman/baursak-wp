<?php
  /**
   * Custom WC Mini Cart
   */
  class Custom_WC_Widget_Cart extends WC_Widget_Cart {
    /**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args     Arguments.
     * @param array $instance Widget instance.
     */
    public function widget( $args, $instance ) {

      $hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

      if ( empty( $instance['title'] ) ) {
        $instance['title'] = false;
      }


      $this->widget_start( $args, $instance );

      if ( $hide_if_empty ) {
        echo '<div class="hide_cart_widget_if_empty">';
      }

      // Insert cart widget placeholder - code in woocommerce.js will update this on page load.
      echo '<div class="widget_shopping_cart_content"></div>';

      if ( $hide_if_empty ) {
        echo '</div>';
      }

      $this->widget_end( $args );
    }
  }

  add_action( 'widgets_init', 'override_woocommerce_widgets', 15 );

  function override_woocommerce_widgets() {

    if ( class_exists( 'WC_Widget_Cart' ) ) {
      unregister_widget( 'WC_Widget_Cart' );


      register_widget( 'Custom_WC_Widget_Cart' );
    }

  }