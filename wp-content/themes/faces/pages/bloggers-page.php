<?php
/**
 * Template Name: Наши блогеры
 */

$cat = $_GET['cat'] ?? 'all';

get_header(); ?>

    <div class="container bloggers-page pos-r">
        <h1 class="uppercase text-center sm-text-left font-tenor page-title"><?php esc_html_e(get_the_title(), 'faces'); ?></h1>

        <div class="cases__wrap">
            <?php get_template_part('/template-parts/filters', null, array('slug' => 'bloggers')); ?>
            <div class="full-width posts-content pos-r">
                <?php get_template_part('/template-parts/bloggers-content', null, array('cat' => $cat)); ?>
            </div>
        </div>

        <div class="pos-a z-1 border50 flex-center round-animate-btn">
            <span class="border50 pointer text-center text-55 flex-center font-tenor uppercase">мы</span>
        </div>
    </div>

<?php get_footer();
