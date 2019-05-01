<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <div class="header__left">
        <div class="header__top">

          <div class="phone header__phone">
            <a href="#" class="phone__callback callback_open">Перезвоните мне!</a>
            <?php if (get_field('phone', 'option')): ?>
              <a href="tel:<?php echo preg_replace('![^0-9]+!', '', get_field('phone', 'option')); ?>" class="phone__tel"><?php the_field('phone', 'option'); ?></a>
            <?php endif; ?>
          </div>

          <?php if (get_field('schedule', 'option')): ?>
            <div class="small-schedule header__small-schedule">
              <p class="small-schedule__descr">Работа интернет магазина</p>
              <p class="small-schedule__time"><?php the_field('schedule', 'option'); ?></p>
            </div>
          <?php endif; ?>

        </div>

        <div class="header__bottom">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'top-left',
              'menu'            => '',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'nav-list',
              'menu_id'         => '',
            ) );
          ?>
        </div>

      </div>

      <div class="header__middle">
        <?php baursak_the_custom_logo('header__logo'); ?>

      </div>

      <div class="header__right">

        <div class="header__top">

          <div class="phone header__phone-right">
            <?php if (get_field('whatsapp', 'option')): ?>
              <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('![^0-9]+!', '', get_field('whatsapp', 'option')); ?>" class="phone__tel" target="_blank"><?php the_field('whatsapp', 'option'); ?></a>
            <?php endif; ?>

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
          </div>

          <div class="tools header__tools">
            <div class="tools__item tools__item--search">
              <button type="button" class="tools__btn tools__btn--search">
                <?php baursak_the_icon('search', 'tools__icon small-search__icon'); ?>
              </button>
              <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="small-form-search">
                <div class="small-form-search__group">
                  <input type="text" name="s" placeholder="Поиск...">
                  <button type="submit" class="tools__btn">
                    <?php baursak_the_icon('search', 'tools__icon small-search__icon'); ?>
                  </button>
                </div>
                <input type="hidden" name="post_type" value="product" />
              </form>
            </div>
            <div class="tools__item tools__item--cart">
              <a href="<?php echo wc_get_cart_url(); ?>" class="tools__btn">
                <?php baursak_the_icon('cart', 'tools__icon small-cart__icon'); ?>
                <?php baursak_header_cart_count(); ?>
              </a>
              <div class="small-cart">
                <div class="small-cart__header">
                  <h4 class="small-cart__title">Корзина</h4>
                  <button type="button" class="small-cart__close close-btn"></button>
                </div>
                <?php the_widget( 'Custom_WC_Widget_Cart', false ); ?>
              </div>
              <div class="cart-overlay"></div>
            </div>
            <!--<div class="tools__item">
              <a href="#" class="tools__btn user-menu__link">
                <?php /*baursak_the_icon('user', 'tools__icon user-menu__icon'); */?>
              </a>
            </div>-->
          </div>

          <button type="button" class="nav-toggle">
            <span class="nav-toggle__line"></span>
          </button>

        </div>

        <div class="header__bottom">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'top-right',
              'menu'            => '',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'nav-list',
              'menu_id'         => '',
            ) );
          ?>
        </div>
      </div>

      <div class="mobile-menu">
        <div class="mobile-menu__wrap">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'top-left',
              'menu'            => '',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'mobile-menu__list',
              'menu_id'         => '',
            ) );
          ?>
          <?php
            wp_nav_menu( array(
              'theme_location' => 'top-right',
              'menu'            => '',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'mobile-menu__list',
              'menu_id'         => '',
            ) );
          ?>
        </div>

        <div class="phone mobile-menu__phone">
          <a href="#" class="phone__callback callback_open">Перезвоните мне!</a>
          <?php if (get_field('phone', 'option')): ?>
            <a href="tel:<?php echo preg_replace('![^0-9]+!', '', get_field('phone', 'option')); ?>" class="phone__tel"><?php the_field('phone', 'option'); ?></a>
          <?php endif; ?>

          <?php if (get_field('whatsapp', 'option')): ?>
            <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('![^0-9]+!', '', get_field('whatsapp', 'option')); ?>" class="phone__tel" target="_blank"><?php the_field('whatsapp', 'option'); ?></a>
          <?php endif; ?>
        </div>


        <?php if (get_field('schedule', 'option')): ?>
          <div class="small-schedule mobile-menu__small-schedule">
            <p class="small-schedule__descr">Работа интернет магазина</p>
            <p class="small-schedule__time"><?php the_field('schedule', 'option'); ?></p>
          </div>
        <?php endif; ?>

        <ul class="socials mobile-menu__socials">
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
      </div>

    </div>
  </header><!-- /.header-->

  <div class="content">