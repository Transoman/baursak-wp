<?php
  add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

  function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    echo '<div class="product__img-wrap"><a href="' . esc_url( $link ) . '">';
  }


  add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

  function woocommerce_template_loop_product_link_close() {
    echo '</a></div>';
  }

  add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

  function woocommerce_template_loop_product_thumbnail() {
    echo woocommerce_get_product_thumbnail();
  }

  remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

  add_action( 'woocommerce_after_shop_loop_item', 'baursak_woocommerce_template_loop_product_wrap_open', 5 );

  function baursak_woocommerce_template_loop_product_wrap_open() {
    echo '<div class="product__body">';
  }

  add_action( 'woocommerce_after_shop_loop_item', 'baursak_woocommerce_template_loop_product_wrap_close', 10 );

  function baursak_woocommerce_template_loop_product_wrap_close() {
    echo '</div>';
  }

  add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_title', 5 );

  function woocommerce_template_loop_product_title() {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    echo '<h3 class="product__title"><a href="' . esc_url( $link ) . '">' . get_the_title() . '</a></h3>';
  }


  add_action( 'woocommerce_after_shop_loop_item', 'baursak_woocommerce_template_loop_product_wrap_bottom_open', 5 );

  function baursak_woocommerce_template_loop_product_wrap_bottom_open() {
    echo '<div class="product__body-bottom">';
  }

  add_action( 'woocommerce_after_shop_loop_item', 'baursak_woocommerce_template_loop_product_wrap_bottom_close', 10 );

  function baursak_woocommerce_template_loop_product_wrap_bottom_close() {
    echo '</div>';
  }

  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

  add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 5 );


  /**
   * Change symbol on letter
   */
  add_filter('woocommerce_currency_symbol', 'baursak_currency_symbol', 10, 2);

  function baursak_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
      case 'RUB': $currency_symbol = ' руб.'; break;
    }
    return $currency_symbol;
  }


  add_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

  /**
   * Output the view cart button.
   */
  function woocommerce_widget_shopping_cart_button_view_cart() {
    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="to-cart wc-forward">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
  }

  remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
  add_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 9 );
  /**
   * Output the proceed to checkout button.
   */
  function woocommerce_widget_shopping_cart_proceed_to_checkout() {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn checkout wc-forward">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
  }

  /**
   * Remove actions
   */
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

  remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
  add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 19 );

  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 5 );

  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );