<?php
  /**
   * The template for displaying 404 pages (not found)
   *
   * @link https://codex.wordpress.org/Creating_an_Error_404_Page
   *
   * @package mytheme
   */

  get_header();
?>
  <section class="error-404 not-found">
    <div class="container">
      <h1 class="page-title">
        404 <br>
        <?php esc_html_e( 'Эта страница не найдена.', 'baursak' ); ?></h1>

      <div class="page-content">
        <a href="<?php echo home_url('/'); ?>" class="btn">На главную</a>

      </div>
    </div><!-- .page-content -->
  </section><!-- .error-404 -->
<?php
  get_footer();
