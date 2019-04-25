<?php
  /**
   * Template Name: Контакты
   */
  get_header(); ?>

<?php get_template_part('template-parts/hero', 'page'); ?>

<section class="contact">
  <div class="container">
    <h3 class="contact__title"><?php the_field('title'); ?></h3>
    <div class="row">
      <div class="col-lg-5 col-xl-4">
        <div class="contact__content">
          <?php the_field('text'); ?>
        </div>
      </div>
      <div class="col-lg-7 col-xl-8">
        <?php if( have_rows('locations') ): ?>
          <div class="contact__map acf-map">
            <?php while ( have_rows('locations') ) : the_row();

              $location = get_sub_field('location');

              ?>
              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                <h4><?php the_sub_field('title'); ?></h4>
                <p class="address"><?php echo $location['address']; ?></p>
                <p><?php the_sub_field('description'); ?></p>
              </div>
            <?php endwhile; ?>
          </div>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmnk4RCDwjSucIJ2WXRnLkuCrsWR4DUM4"></script>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="question" style="background-image: url(<?php echo THEME_URL; ?>/images/general/question-bg.jpg)">
  <div class="container">
    <h2 class="section-title">Если у вас есть вопросы</h2>
    <p>Задайте их нашему специалисту, он будет рад вам помочь</p>

    <div class="question__form">
      <?php echo do_shortcode('[contact-form-7 id="132" title="Форма вопроса"]'); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
