<?php
/**
 * Template Name: Контакты
 */

get_header(); ?>

    <div class="container pos-r contacts-page">
        <h1 class="uppercase text-center sm-text-left font-tenor page-title"><?php esc_html_e(get_the_title(), 'faces'); ?></h1>

        <div class="contacts-page__info">
            <div class="flex align-center contacts-page__info_item">
                <figure class="flex-center contacts-page__info_icon">
                    <?php get_template_part('/vector-images/location-icon'); ?>
                </figure>
                <p class="text-22 line-height-25">
                    <?php esc_html_e(get_field('address', 'option'), 'faces'); ?>
                </p>
            </div>
            <div class="flex align-center contacts-page__info_item">
                <figure class="flex-center contacts-page__info_icon">
                    <?php get_template_part('/vector-images/phone-icon'); ?>
                </figure>
                <a href="tel:<?php esc_attr_e(sprintf('+%s', get_field('phone', 'option')), 'faces'); ?>"
                   class="text-22 pos-r line-height-25">
                    <?php esc_html_e(sprintf('+%s', get_field('phone', 'option')), 'faces'); ?>
                </a>
            </div>
            <div class="flex align-center contacts-page__info_item">
                <figure class="flex-center contacts-page__info_icon">
                    <?php get_template_part('/vector-images/location-icon'); ?>
                </figure>
                <p class="text-22 line-height-25">
                    <?php esc_html_e(sprintf('Режим работы: %s', get_field('schedule', 'option')), 'faces'); ?>
                </p>
            </div>

        </div>

        <div class="contacts-page__map full-width pos-r">
            <iframe src="<?php esc_attr_e(get_field('map', 'option'), 'faces'); ?>"
                    style="border:0;"
                    class="block full-width"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php get_template_part('/template-parts/work-offer-btn', null, array(
                'classes' => 'text-26',
                'text' => 'Хочу <br>в вашу <br>команду',
            )); ?>
        </div>

        <?php
        $socials = get_field('social', 'option');

        if (isset($socials)) : ?>
            <div class="flex align-center contacts-page__socials">
                <?php foreach ($socials as $social) : ?>
                    <a href="<?php echo esc_url($social['link'], 'faces'); ?>"
                       class="color-primary pos-r text-18 line-height-25 contacts-page__socials_item">
                        <?php esc_html_e($social['title'], 'faces'); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

<?php get_footer();
