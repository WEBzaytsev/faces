<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header-grey-bg border-bottom-white-1 header">
    <div class="container flex align-center full-width">
        <a href="<?php esc_attr_e(get_home_url(), 'faces'); ?>"
           class="header__logo">
            <?php get_template_part('/vector-images/logo'); ?>
        </a>

        <nav class="full-width flex justify-center header__menu" id="top-menu">
            <ul class="flex align-center full-width justify-between menu">
                <li class="menu__item">
                    <a href="#"
                       class="text-20 line-height-27 letter-spacing-002 transition">О нас</a>
                </li>
                <li class="menu__item">
                    <a href="#"
                       class="text-20 line-height-27 letter-spacing-002 transition">Кейсы</a>
                </li>
                <li class="menu__item">
                    <a href="#"
                       class="text-20 line-height-27 letter-spacing-002 transition">Наши блогеры</a>
                </li>
                <li class="menu__item">
                    <a href="#"
                       class="text-20 line-height-27 letter-spacing-002 transition">Контакты</a>
                </li>
            </ul>
        </nav>

        <a href="#"
           class="block text-center font700 transition header__button">
            Давайте поработаем
        </a>

        <div class="flex-center ml-auto">
            <span class="text-20 line-height-27 pointer transition pos-r header__langs_item active">Ru</span>
            <span class="text-20 line-height-27 pointer transition pos-r header__langs_item">En</span>
        </div>
    </div>
</header>

