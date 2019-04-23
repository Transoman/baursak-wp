<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
  return;
}
?>

<aside id="secondary" class="widget-area">
  <button type="button" class="close-btn widget-area__close"></button>
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

<button type="button" class="filter-toggle">
  <?php baursak_the_icon('filter', 'filter-toggle__icon'); ?>
</button>