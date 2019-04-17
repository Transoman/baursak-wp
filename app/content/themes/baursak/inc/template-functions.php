<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package mytheme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mytheme_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  // Adds a class of no-sidebar when there is no sidebar present.
  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    $classes[] = 'no-sidebar';
  }

  return $classes;
}
add_filter( 'body_class', 'mytheme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function mytheme_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'wp_head', 'mytheme_pingback_header' );

/**
 * Custom Logo
 */
function baursak_the_custom_logo($class) {
  $custom_logo_id = get_theme_mod( 'custom_logo' );

  $image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
  if ( empty( $image_alt ) ) {
    $custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
  }
  $image = wp_get_attachment_image( $custom_logo_id , 'full', false, $custom_logo_attr );

  $html = '<a href="'. home_url('/') .'" class="logo '. $class .'">'. $image .'</a>';

  echo $html;
}

/**
 * SVG Sprite Icon
 */
function baursak_the_icon($icon_name, $icon_class = false) {
  $html = '<svg class="'. $icon_class .'"><use xlink:href="'. THEME_URL .'/images/svg/symbol/sprite.svg#'. $icon_name .'"></use></svg>';
  echo $html;
}

function baursak_get_icon($icon_name, $icon_class = false) {
  $html = '<svg class="'. $icon_class .'"><use xlink:href="'. THEME_URL .'/images/svg/symbol/sprite.svg#'. $icon_name .'"></use></svg>';
  return $html;
}

/**
 * Cart Count
 */
function baursak_header_cart_count() {
  $cart_count = WC()->cart->get_cart_contents_count();

		if($cart_count > 99){
      $cart_count = '99+';
    }
		?>
  <span class="tools__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
}

/**
 * Get Featured Products
 */
function get_featured_products($count = null) {
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => $count ? $count : get_option('posts_per_page'),
    'paged' => $paged,
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'product_visibility',
        'field' => 'name',
        'terms' => 'featured',
      )
    )
  );

  $featured_products = new WP_Query( $args );

  return $featured_products;
}