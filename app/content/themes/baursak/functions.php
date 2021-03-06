<?php

/**
 * Constant
 */
define( 'THEME_URL', get_template_directory_uri() );

if ( ! function_exists( 'baursak_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function baursak_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on baursak, use a find and replace
     * to change 'baursak' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'baursak', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'top-left' => esc_html__( 'Меню верхнее с лева', 'baursak' ),
      'top-right' => esc_html__( 'Меню верхнее с права', 'baursak' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 130,
      'width'       => 130,
      'flex-width'  => true,
      'flex-height' => true,
    ) );

    /**
     * Add support formats post
     */
    add_theme_support( 'post-formats', array (
      'aside',
      'gallery',
      'quote',
      'image',
      'video'
    ) );

    /**
     * Woocommerce support
     */
    add_theme_support( 'woocommerce' );
//    add_theme_support( 'wc-product-gallery-lightbox' );
  }
endif;
add_action( 'after_setup_theme', 'baursak_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function baursak_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'baursak_content_width', 640 );
}
add_action( 'after_setup_theme', 'baursak_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function baursak_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'baursak' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'baursak' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'baursak_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function baursak_scripts() {
  wp_enqueue_style( 'baursak-style', get_stylesheet_uri() );

  wp_enqueue_script( 'baursak-main', get_template_directory_uri() . '/js/common.js', array(), '', true);

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'baursak_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

  /**
   * Helpers function
   */
  require get_template_directory() . '/inc/helpers.php';

/**
 * ACF
 */
require get_template_directory() . '/inc/acf.php';

  if ( class_exists( 'WooCommerce' ) ) {
    /**
     * Woocommerce functions
     */
    require get_template_directory() . '/inc/wc-functions.php';
  }

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';


  add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

  function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <span class="tools__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['.tools__count'] = ob_get_clean();
    return $fragments;
  }

/**
 * Remove tag p in CF7
 */
  add_filter( 'wpcf7_autop_or_not', '__return_false' );

  if (!is_admin()) {
    add_action( 'wp_enqueue_scripts', 'my_enqueue_style', 99 );
    function my_enqueue_style(){
      wp_dequeue_style( 'robokassa_payment_admin_style_menu' );
      wp_dequeue_style( 'robokassa_payment_admin_style_main' );
    }
  }