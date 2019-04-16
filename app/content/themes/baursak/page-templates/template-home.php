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

              <div class="col-lg-6">
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
                <div class="col-lg-4 offset-lg-2">
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
              <?php endif; ?>
            </div>

          </div>
        </section>

      <?php elseif( get_row_layout() == 'download' ):

        $file = get_sub_field('file');

      endif;

    endwhile;

  else :

    // no layouts found

  endif;

?>

<?php get_footer(); ?>
