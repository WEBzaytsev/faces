<?php
/**
 * Template Name: Кейсы
 */

$cat = $_GET['cat'] ?? 'all';

get_header(); ?>

    <div class="container pos-r cases-page z-3">
        <h1 class="pos-r uppercase text-center sm-text-left font-tenor page-title">
            <?php esc_html_e(get_the_title(), 'faces'); ?>
            <?php get_template_part('/vector-images/filters-icon', null, array(
                'is_display' => false,
                'is_absolute' => true,
            )); ?>
        </h1>

        <div class="cases__wrap">
            <?php get_template_part('/template-parts/filters', null, array(
                'slug' => 'cases',
            )); ?>
            <div class="full-width posts-content pos-r">
                <div class="posts-content__inner">
                    <?php get_template_part('/template-parts/cases-content', null, array(
                        'cat' => $cat
                    )); ?>
                </div>
            </div>
        </div>

        <?php get_template_part('/template-parts/work-offer-btn', null, array(
            'classes' => '',
            'text' => 'Хочу <br>в вашу <br>команду',
        )); ?>
    </div>

<?php get_footer();
