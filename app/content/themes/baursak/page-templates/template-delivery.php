<?php
  /**
   * Template Name: Доставка
   */
  get_header(); ?>

<?php get_template_part('template-parts/hero', 'page'); ?>

<section class="delivery">
  <div class="container">

    <div class="row">
      <div class="col-lg-7 order-lg-last">
        <div class="delivery__content">
          <?php the_content(); ?>
        </div>
      </div>

      <div class="col-lg-5">
        <?php the_post_thumbnail('large'); ?>
      </div>
    </div>

    <?php $delivery_method = get_field('method_delivery');

    if ($delivery_method['title']): ?>
      <div class="delivery__method">
        <h3><?php echo $delivery_method['title']; ?></h3>
        <?php echo $delivery_method['text']; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
