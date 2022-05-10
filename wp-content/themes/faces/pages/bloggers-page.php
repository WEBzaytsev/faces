<?php
/**
 * Template Name: Наши блогеры
 */

$cat = $_GET['cat'] ?? 'all';

get_header(); ?>

    <div class="container bloggers-page pos-r">
        <h1 class="uppercase text-center pos-r sm-text-left font-tenor page-title">
            <?php esc_html_e(get_the_title(), 'faces'); ?>
<!--            --><?php //get_template_part('/vector-images/filters-icon'); ?>
        </h1>

        <div class="bloggers__wrap">
            <?php get_template_part('/template-parts/bloggers-filter', null, array('slug' => 'bloggers')); ?>
            <div class="full-width posts-content pos-r">
                <?php get_template_part('/template-parts/bloggers-content', null, array('cat' => $cat)); ?>
            </div>
        </div>

        <?php get_template_part('/template-parts/work-offer-btn', null, array(
            'classes' => '',
            'text' => 'Хочу <br>в вашу <br>команду',
        )); ?>
    </div>

<?php get_footer();
