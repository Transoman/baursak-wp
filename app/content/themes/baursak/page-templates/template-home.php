<?php
  /**
   * Template Name: Главная
   */
  get_header(); ?>

<?php

  if( have_rows('home_layout') ):

    while ( have_rows('home_layout') ) : the_row();

      if( get_row_layout() == 'banner' ): ?>

        <section class="hero"<?php echo get_sub_field('bg') ? ' style="background-image: url('. get_sub_field('bg') .')"' : ''; ?>>
          <div class="container">
            <div class="row">

              <div class="col-lg-7 col-xl-6">
                <div class="hero__content">
                  <h1><?php the_sub_field('title'); ?></h1>
                  <?php the_sub_field('descr'); ?>
                  <?php $btn = get_sub_field('btn');
                    if ($btn['title']): ?>
                      <a href="<?php echo esc_url($btn['url']); ?>" class="btn"><?php echo esc_html($btn['title']); ?></a>
                    <?php endif; ?>
                </div>
              </div>

              <?php if (have_rows('slider_specials')): ?>
                <div class="col-lg-5 col-xl-4 offset-xl-2">
                  <div class="hero__specials-slider-wrap">
                    <div class="specials-slider swiper-container">
                      <div class="swiper-wrapper">
                        <?php while (have_rows('slider_specials')): the_row(); ?>
                          <div class="specials-slider__item swiper-slide"<?php echo get_sub_field('img') ? ' style="background-image: url('. get_sub_field('img') .')"' : ''; ?>>
                            <div class="specials-slider__head">
                              <span class="specials-slider__head-title">Спецпредложение</span>
                            </div>
                            <div class="specials-slider__body">
                              <h2 class="specials-slider__title"><?php the_sub_field('title'); ?></h2>
                              <?php the_sub_field('descr'); ?>
                              <?php $btn = get_sub_field('btn');
                                if ($btn['title']): ?>
                                  <a href="<?php echo esc_url($btn['url']); ?>" class="btn"><?php echo esc_html($btn['title']); ?></a>
                                <?php endif; ?>
                            </div>
                          </div>
                        <?php endwhile; ?>
                      </div>
                      <div class="swiper-pagination"></div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>

          </div>
        </section>

      <?php elseif( get_row_layout() == 'recommend' ): ?>

        <section class="recommend">
          <div class="container">
            <div class="row">

              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="recommend__content">
                  <h2><?php the_sub_field('title'); ?></h2>
                  <?php the_sub_field('descr'); ?>
                  <div class="recommend__content-bottom">
                    <a href="/shop">Весь каталог</a>
                    <div class="recommend__slider-btns">
                      <div class="swiper-button-prev"><?php baursak_the_icon('left-arrow'); ?></div>
                      <div class="swiper-button-next"><?php baursak_the_icon('right-arrow'); ?></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-8 col-xl-9 woocommerce">
                <?php $feature_products = get_featured_products();
                if ($feature_products->have_posts()): ?>
                  <div class="recommend-slider products swiper-container">
                    <div class="swiper-wrapper">
                      <?php while ($feature_products->have_posts()): $feature_products->the_post();
                      $terms = get_the_terms( get_the_ID(), 'product_cat'); ?>
                        <div class="swiper-slide">
                          <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>
                      <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                  </div><!-- /.row -->
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section>

      <?php elseif( get_row_layout() == 'advantages' ): ?>

        <section class="advantages">
          <div class="container">
            <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

            <?php if (have_rows('list')): ?>
              <div class="row justify-content-center">
                <?php while (have_rows('list')): the_row(); ?>
                  <div class="advantages__item col-sm-6 col-lg-4 col-xl-3">
                    <div class="advantages__inner">
                      <div class="advantages__icon-wrap">
                        <?php echo wp_get_attachment_image(get_sub_field('icon')); ?>
                      </div>
                      <p class="advantages__title"><?php the_sub_field('title'); ?></p>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
        </section>

      <?php elseif( get_row_layout() == 'about' ): ?>

        <section class="s-about">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <?php echo wp_get_attachment_image(get_sub_field('img'), 'large'); ?>
              </div>
              <div class="col-lg-6">
                <div class="s-about__content">
                  <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
                  <?php the_sub_field('descr'); ?>
                </div>
              </div>
            </div>
          </div>
        </section>

      <?php endif;

    endwhile;

  else :

    // no layouts found

  endif;

?>

<?php get_footer(); ?>
