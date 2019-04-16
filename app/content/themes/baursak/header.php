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
            <a href="tel:88003012383" class="phone__tel">8 (800) 301-23-83</a>
          </div>

          <div class="small-schedule header__small-schedule">
            <p class="small-schedule__descr">Работа интернет магазина</p>
            <p class="small-schedule__time">с 10:00 до 21:00</p>
          </div>

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

          <div class="tools header__tools">
            <div class="tools__item">
              <button type="button" class="tools__btn small-search__btn btn-search">
                <?php baursak_the_icon('search', 'tools__icon small-search__icon'); ?>
              </button>
            </div>
            <div class="tools__item tools__item--cart">
              <a href="<?php echo wc_get_cart_url(); ?>" class="tools__btn">
                <?php baursak_the_icon('cart', 'tools__icon small-cart__icon'); ?>
                <?php baursak_header_cart_count(); ?>
              </a>
              <?php //the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            </div>
            <div class="tools__item">
              <a href="#" class="tools__btn user-menu__link">
                <?php baursak_the_icon('user', 'tools__icon user-menu__icon'); ?>
              </a>
            </div>
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
          <a href="tel:88003012383" class="phone__tel">8 (800) 301-23-83</a>
        </div>

        <div class="small-schedule mobile-menu__small-schedule">
          <p class="small-schedule__descr">Работа интернет магазина</p>
          <p class="small-schedule__time">с 10:00 до 21:00</p>
        </div>
      </div>

    </div>
  </header><!-- /.header-->

  <div class="content">