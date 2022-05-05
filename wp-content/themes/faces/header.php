<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/dist/img/favicon/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="full-width page">
    <header class="pos-f full-width z-modal header-grey-bg border-bottom-white-1 header">
        <div class="container flex align-center md-justify-between full-width">
            <a href="<?php echo esc_url(get_home_url(), 'faces'); ?>"
               class="header__logo">
                <?php $logo = get_field('logo', 'option'); ?>
                <img src="<?php esc_attr_e($logo['url'], 'faces'); ?>"
                     width="159"
                     alt="img">
            </a>

            <div class="pos-r full-width md-width-fit-content md-block header__mob-wrap">

                <div class="flex md-none full-width justify-between header__mob-container">
                    <a href="<?php echo esc_url(get_home_url(), 'faces'); ?>"
                       class="none md-block header__logo">
                        <?php $logo = get_field('logo', 'option'); ?>
                        <img src="<?php esc_attr_e($logo['url'], 'faces'); ?>"
                             width="79"
                             alt="img">
                    </a>

                    <?php if (has_nav_menu('header-menu')) :
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header-menu',
                                'menu_id' => 'main-menu',
                                'container' => 'nav',
                                'container_class' => 'full-width flex justify-center header__menu',
                                'menu_class' => 'flex align-center full-width justify-between menu md-block',
                            )
                        ); ?>
                    <?php endif; ?>

                    <a href="#"
                       class="block font700 header__button md-none">
                        <span class="z-1 block transition pos-r text-center header__button_inner">
                            Давайте поработаем
                        </span>
                    </a>

                    <?php $languages_list = apply_filters('wpml_active_languages', null);

                    if ($languages_list) :

                        $active_lang = array_filter($languages_list, function ($v, $k) {
                            return $v['active'] == "1";
                        }, ARRAY_FILTER_USE_BOTH);
                        $active_lang = reset($active_lang); ?>
                        <div class="flex-center ml-auto huge-m-0 header__langs">
                            <a href="<?php echo esc_url($active_lang['url']); ?>"
                               class="text-20 large-text-16 mr-16 large-mr-8 line-height-27 huge-line-height-22 pointer transition pos-r capitalize header__langs_item active">
                                <?php esc_html_e($active_lang['code']); ?>
                            </a>
                            <?php foreach ($languages_list as $item) :
                                if (!$item['active']) : ?>
                                    <a href="<?php echo esc_url(($item['url'])); ?>"
                                       class="text-20 large-text-16 line-height-27 large-line-height-22 pointer transition pos-r capitalize header__langs_item">
                                        <?php esc_html_e($item['code']); ?>
                                    </a>
                                <?php endif;
                            endforeach; ?>

                        </div>

                    <?php endif;

                    $socials = get_field('social', 'option');

                    if (isset($socials)) : ?>
                        <div class="header__social none flex flex-wrap md-block">
                            <?php foreach ($socials as $social) : ?>
                                <a href="<?php echo esc_url($social['link'], 'faces'); ?>"
                                   class="text-18 line-height-25 header__social_item">
                                    <?php esc_html_e($social['title'], 'faces'); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <span class="pos-r none md-block mob-menu-btn">
                <span class="mob-menu-btn__inner"></span>
            </span>
            </div>
        </div>
    </header>
