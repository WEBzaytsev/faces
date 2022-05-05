<?php
/**
 * Template Name: Кейсы
 */

$cat = $_GET['cat'] ?? 'all';

get_header(); ?>

    <div class="container pos-r cases-page">
        <h1 class="uppercase text-center sm-text-left font-tenor page-title"><?php esc_html_e(get_the_title(), 'faces'); ?></h1>

        <div class="cases__wrap">
            <?php get_template_part('/template-parts/filters', null, array('slug' => 'cases')); ?>
            <div class="full-width posts-content pos-r">
                <?php get_template_part('/template-parts/cases-content', null, array('cat' => $cat)); ?>
            </div>
        </div>

        <div class="pos-a z-1 border50 flex-center round-animate-btn">
            <span class="border50 pointer text-center flex-center text-26 font-tenor uppercase">Хочу <br>в вашу <br>команду</span>
        </div>
    </div>

<?php get_footer();
