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

      <div class="footer__middle">
        <ul class="socials">
          <?php $socials = get_field('socials', 'option');
            if ($socials['instagram']): ?>
              <li class="socials__item">
                <a href="<?php echo esc_url($socials['instagram']); ?>" class="socials__link" target="_blank"><?php baursak_the_icon('instagram', 'socials__icon'); ?></a>
              </li>
            <?php endif; ?>
          <?php if ($socials['fb']): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url($socials['fb']); ?>" class="socials__link" target="_blank"><?php baursak_the_icon('fb', 'socials__icon'); ?></a>
            </li>
          <?php endif; ?>
          <?php if ($socials['vk']): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url($socials['vk']); ?>" class="socials__link" target="_blank"><?php baursak_the_icon('vk', 'socials__icon'); ?></a>
            </li>
          <?php endif; ?>
        </ul>

        <?php if (get_field('copyright', 'option')): ?>
          <p class="copyright footer__copyright">&copy; <?php the_field('copyright', 'option')?></p>
        <?php endif; ?>
      </div>

      <div class="phone footer__phone">
        <a href="#" class="phone__callback callback_open">Перезвоните мне!</a>
        <?php if (get_field('phone', 'option')): ?>
          <a href="tel:<?php echo preg_replace('![^0-9]+!', '', get_field('phone', 'option')); ?>" class="phone__tel"><?php the_field('phone', 'option'); ?></a>
        <?php endif; ?>

        <?php if (get_field('whatsapp', 'option')): ?>
          <span class="phone__label">Мы онлайн</span>
          <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('![^0-9]+!', '', get_field('whatsapp', 'option')); ?>" class="phone__tel" target="_blank"><?php the_field('whatsapp', 'option'); ?></a>
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
