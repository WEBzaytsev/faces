<?php get_header(); ?>

<main class="home-page">
    <div class="container pos-r first-section">
        <h1 class="uppercase page-title"><?php the_field('page-caption'); ?></h1>

        <div class="pos-r full-width">
            <div class="mx-auto pos-r first-section__circle">
                <div class="hidden border50 pos-a first-section__circle_wrap">
                    <div class="first-section__circle_image"></div>
                </div>
                <?php get_template_part('/vector-images/round-text'); ?>
            </div>

            <p class="pos-a first-section__left-top-text"><?php the_field('text-top-right'); ?></p>

            <div class="pos-a border50 flex-center round-animate-btn">
                <span class="border50 pointer text-center flex-center uppercase">обсудить проект</span>
            </div>
            <a href="#" class="pos-a uppercase text-center flex-center transition border50 first-section__cases">наши
                <br>кейсы
                <span class="pos-a first-section__cases_arr">
                    <?php get_template_part('/vector-images/cases-arr'); ?>
                </span>
            </a>
        </div>

        <p class="first-section__bottom-text"><?php the_field('text-bottom-left'); ?></p>

    </div>

    <div class="second-section"></div>

    <?php $theses = get_field('theses');

    if (isset($theses)) : ?>
        <div class="container flex flex-col theses">
            <?php foreach ($theses as $theses_item) : ?>
                <div class="pos-r theses__item">
                    <p class="font-tenor theses__item_caption"><?php esc_html_e($theses_item['caption'], 'faces'); ?></p>
                    <p class="theses__item_text"><?php esc_html_e($theses_item['text'], 'faces'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
