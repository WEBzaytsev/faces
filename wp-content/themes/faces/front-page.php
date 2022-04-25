<?php get_header(); ?>

<main class="home-page">
    <div class="container pos-r first-section">
        <h1 class="uppercase page-title">
            <span class="pos-r page-title_s">Работаем
                <span class="pos-a"><?php get_template_part('/vector-images/page-title-s'); ?></span>
            </span> блогерами
            <span class="page-title_bottom">и лидерами мнений</span></h1>

        <div class="pos-r full-width">
            <div class="mx-auto pos-r first-section__circle">
                <div class="hidden border50 pos-a first-section__circle_wrap">
                    <div class="first-section__circle_image"></div>
                </div>
                <?php get_template_part('/vector-images/round-text'); ?>
            </div>

            <p class="pos-a first-section__left-top-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Porta non a, mi ut in rutrum.</p>

            <div class="pos-a border50 flex-center round-animate-btn">
                <span class="border50 pointer text-center flex-center uppercase">обсудить проект</span>
            </div>
            <a href="#" class="pos-a uppercase text-center flex-center transition border50 first-section__cases">наши <br>кейсы
                <span class="pos-a first-section__cases_arr">
                    <?php get_template_part('/vector-images/cases-arr'); ?>
                </span>
            </a>
        </div>

        <p class="first-section__bottom-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Porta non a, mi ut in rutrum. Pretium justo, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Porta non a, mi ut in rutrum. Pretium justo,</p>

    </div>
</main>

<?php get_footer(); ?>
