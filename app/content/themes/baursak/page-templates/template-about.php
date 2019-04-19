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

<?php

  if( have_rows('about_layout') ):

    while ( have_rows('about_layout') ) : the_row();

      if( get_row_layout() == 'media' ): ?>

        <section class="s-media">
          <div class="container">

            <div class="section-head">
              <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
              <?php the_sub_field('descr'); ?>
            </div>

            <?php if (have_rows('list')): ?>
              <div class="media-list row">
                <?php while (have_rows('list')): the_row(); ?>
                  <div class="col-md-6 col-lg-4 media-list__item">
                    <div class="media-list__wrap">
                      <?php if (get_sub_field('publisher')): ?>
                        <p class="media-list__publisher"><span>Издание:</span> <?php the_sub_field('publisher'); ?></p>
                      <?php endif; ?>
                      <h3 class="media-list__title"><?php the_sub_field('title'); ?></h3>
                      <div class="media-list__img-wrap">
                        <?php echo wp_get_attachment_image(get_sub_field('img'), 'medium'); ?>
                      </div>
                    </div>
                    <div class="media-list__descr">
                      <?php the_sub_field('short_descr'); ?>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>

          </div>
        </section>

      <?php elseif( get_row_layout() == 'partners' ): ?>

        <section class="partners">
          <div class="container">
            <?php if (have_rows('list')): ?>
              <div class="partners-list swiper-container">
                <div class="swiper-wrapper">
                  <?php while (have_rows('list')): the_row(); ?>
                    <div class="partners-list__item swiper-slide">
                      <?php echo wp_get_attachment_image(get_sub_field('logo'), 'medium'); ?>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="swiper-button-prev"><?php baursak_the_icon('left-arrow'); ?></div>
                <div class="swiper-button-next"><?php baursak_the_icon('right-arrow'); ?></div>
              </div>
            <?php endif; ?>
          </div>
        </section>

      <?php endif;

    endwhile;
  endif; ?>

<?php get_footer(); ?>
