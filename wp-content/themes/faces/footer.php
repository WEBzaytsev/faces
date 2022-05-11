<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package faces
 */

?>

<footer class="footer">
    <div class="container">
        <div class="full-width flex flex-wrap align-start justify-between footer__top">
            <div class="footer__item">
                <p class="color-primary line-height-25 text-18 footer__item_caption">Карта сайта</p>
                <?php if (has_nav_menu('footer-menu')) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_id' => 'footer-menu',
                            'container' => '',
                            'container_class' => '',
                            'menu_class' => '',
                        )
                    ); ?>
                <?php endif; ?>
            </div>
            <div class="footer__item">
                <p class="color-primary line-height-25 text-18 footer__item_caption">
                    <?php esc_html_e('Как с нами связаться', 'faces'); ?>
                </p>
                <a href="tel:<?php esc_attr_e(sprintf('+%s', get_field('phone', 'option')), 'faces'); ?>"
                   class="footer__item_link">
                    <?php esc_html_e(sprintf('+%s', get_field('phone', 'option')), 'faces'); ?>
                </a>
                <a href="<?php echo esc_url(sprintf('mailto:%s', get_field('email', 'option')), 'faces'); ?>"
                   class="footer__item_link">
                    <?php esc_html_e(get_field('email', 'option'), 'faces'); ?>
                </a>
            </div>
            <div class="footer__item">
                <p class="color-primary line-height-25 text-18 footer__item_caption">
                    <?php esc_html_e('Где нас найти', 'faces'); ?>
                </p>
                <p class="footer__item_link">
                    <?php esc_html_e(get_field('address', 'option'), 'faces'); ?>
                </p>
            </div>
            <div class="footer__item">
                <p class="color-primary line-height-25 text-18 footer__item_caption">
                    <?php esc_html_e('Мы в соцсетях', 'faces'); ?>
                </p>
                <?php
                $socials = get_field('social', 'option');

                if (isset($socials)) :
                    foreach ($socials as $social) : ?>
                        <a href="<?php echo esc_url($social['link'], 'faces'); ?>" class="footer__item_link">
                            <?php esc_html_e($social['title'], 'faces'); ?>
                        </a>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
        <div class="flex align-center justify-between full-width footer__bottom">
            <a href="#" class="line-height-25 text-18">Политика конфиденциальности</a>
            <?php $logo = get_field('logo', 'option'); ?>
            <?php if ($logo) : ?>
                <figure class="flex-center">
                    <img src="<?php esc_attr_e($logo['url'], 'faces'); ?>"
                         width="159"
                         alt="img">
                </figure>
            <?php endif; ?>
            <p class="line-height-25 text-18">
                <?php esc_html_e('@FACES2022. Все права защищены', 'faces'); ?>
            </p>
        </div>
    </div>
</footer>
</div>
<div class="pos-f flex justify-center transition top-0 bottom-0 left-0 right-0 modal case"
     data-close="true"></div>
<div class="pos-f flex justify-center transition top-0 bottom-0 left-0 right-0 modal work-offer"
     data-close="true"></div>

<div class="pos-f flex justify-center transition top-0 bottom-0 left-0 right-0 modal thank-you"
     data-close="true">
    <div class="pos-r modal-window bg-white color-black work-offer">
        <span class="block pointer pos-a close" data-close="true"></span>
        <p class="text-60 text-center font-tenor line-height-70 md-text-25 md-line-height-29 modal-window__title">
            <?php esc_html_e('Спасибо!', 'faces'); ?>
        </p>
        <p class="text-center text-20 md-text-14 md-line-height144 modal-window__text">
            <?php esc_html_e('Ваша заявка принята', 'faces'); ?>
        </p>
    </div>
</div>
<?php wp_footer(); ?>

</body>
</html>
