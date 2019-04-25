  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <?php if (get_field('footer_logo', 'option')): ?>
        <a href="<?php echo home_url( '/' ) ?>" class="footer__logo logo">
          <div class="logo__left">
            <?php echo wp_get_attachment_image(get_field('footer_logo', 'option')); ?>
          </div>
          <div class="logo__right">
            <span class="logo__title">Баурсак</span>
            <span class="logo__descr">Продукты питания</span>
          </div>
        </a>
      <?php endif; ?>

      <?php if (get_field('copyright', 'option')): ?>
        <p class="copyright footer__copyright">&copy; <?php the_field('copyright', 'option')?></p>
      <?php endif; ?>

      <div class="phone footer__phone">
        <a href="#" class="phone__callback callback_open">Перезвоните мне!</a>
        <?php if (get_field('phone', 'option')): ?>
          <a href="tel:<?php echo preg_replace('![^0-9]+!', '', get_field('phone', 'option')); ?>" class="phone__tel"><?php the_field('phone', 'option'); ?></a>
        <?php endif; ?>
      </div>

    </div>
  </footer><!-- /.footer -->

</div><!-- /.wrapper -->

<div class="modal" id="callback">
  <button class="modal__close callback_close"></button>

  <h3 class="modal__title">Обратный звонок</h3>
  <?php echo do_shortcode('[contact-form-7 id="171" title="Обратный звонок"]'); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
