<?php
  /**
   * Template Name: О нас
   */
  get_header(); ?>

<section class="hero-page" style="background-image: url(<?php the_field('hero_bg'); ?>)">
  <div class="container">
    <?php the_title('<h1>', '</h1>'); ?>
    <?php get_template_part('template-parts/breadcrumbs'); ?>
  </div>
</section>

<section class="about">
  <div class="container">

    <div class="row">
      <div class="col-lg-6">
        <?php the_post_thumbnail('large'); ?>
      </div>
      <div class="col-lg-6">
        <div class="about__content" data-simplebar data-simplebar-auto-hide="false">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
