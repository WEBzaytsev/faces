<?php
/**
 * Template Name: Наши блогеры
 */

$cat = $_GET['cat'] ?? 'all';

get_header(); ?>

    <div class="container bloggers-page pos-r z-3">
        <h1 class="uppercase text-center pos-r sm-text-left font-tenor page-title">
            <?php esc_html_e(get_the_title(), 'faces'); ?>
            <!--            --><?php //get_template_part('/vector-images/filters-icon'); ?>
        </h1>

        <div class="bloggers__wrap">
            <?php get_template_part('/template-parts/bloggers-filter', null, array('slug' => 'bloggers')); ?>
            <div class="full-width posts-content pos-r">
                <div class="posts-content__inner">
                    <?php get_template_part('/template-parts/bloggers-content', null, array('cat' => $cat)); ?>
                </div>
            </div>
        </div>

        <?php get_template_part('/template-parts/work-offer-btn', null, array(
            'classes' => '',
            'text' => __('Хочу <br>в вашу <br>команду', 'faces'),
        )); ?>
    </div>

<?php get_footer();
