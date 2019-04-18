  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <?php if (get_field('footer_logo', 'option')): ?>
        <div class="footer__logo logo">
          <div class="logo__left">
            <?php echo wp_get_attachment_image(get_field('footer_logo', 'option')); ?>
          </div>
          <div class="logo__right">
            <span class="logo__title">Баурсак</span>
            <span class="logo__descr">Продукты питания</span>
          </div>
        </div>
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

<?php wp_footer(); ?>

</body>
</html>
