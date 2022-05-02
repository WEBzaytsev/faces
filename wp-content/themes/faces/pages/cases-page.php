<?php
/**
 * Template Name: Кейсы
 */

$cat = $_GET['cat'] ?? 'all';

get_header(); ?>

    <div class="container cases-page">
        <h1 class="uppercase huge-text-center sm-text-left font-tenor page-title"><?php esc_html_e(get_the_title(), 'faces'); ?></h1>

        <div class="cases__wrap">
            <?php get_template_part('/template-parts/filters', null, array('slug' => 'cases')); ?>
            <div class="full-width posts-content pos-r">
                <?php get_template_part('/template-parts/cases-content', null, array('cat' => $cat)); ?>
            </div>
        </div>
    </div>

<?php get_footer();
