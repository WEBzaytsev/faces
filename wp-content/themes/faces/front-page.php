<?php get_header(); ?>

<main class="home-page pos-r z-3">
    <div class="container pos-r first-section">
        <h1 class="uppercase huge-text-center sm-text-left font-tenor page-title"><?php echo __(get_field('page-caption'), 'faces'); ?></h1>

        <div class="pos-r full-width first-section__content">
            <?php
            $video_settings = get_field('video') ?? null;

            $video_poster = $video_settings['poster']['url'] ?? null; ?>
            <div class="mx-auto pos-r first-section__circle">
                <div class="hidden border50 hidden pos-a z-2 first-section__circle_wrap">
                    <div class="pos-r first-section__circle_image"
                         style="background-image: url('<?php echo esc_url($video_poster, 'faces'); ?>');">
                        <div class="pos-a absolute-center flex-center z--100 opacity-0 transition pointer first-section__circle_play"
                             data-modal="video">
                            <svg width="252"
                                 height="252"
                                 viewBox="0 0 252 252"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M184.5 113.01C194.5 118.783 194.5 133.217 184.5 138.99L94.5 190.952C84.5 196.725 72 189.509 72 177.962L72 74.0384C72 62.4914 84.5 55.2746 94.5 61.0481L184.5 113.01Z"
                                      fill="#B000DB"/>
                            </svg>

                        </div>
                    </div>
                </div>
                <?php get_template_part('/vector-images/round-text'); ?>
            </div>

            <p class="pos-a right-0 text-18 sm-text-14 sm-line-height-19 line-height-30 large-text-18 large-line-height-25 first-section__left-top-text">
                <?php the_field('text-top-right'); ?>
            </p>

            <?php get_template_part('/template-parts/work-offer-btn', null, array(
                'classes' => 'text-26 large-text-16 sm-text-12',
                'text' => esc_html__('обсудить проект', 'faces'),
            )); ?>
            <a href="#"
               class="pos-a text-34 sm-text-35 line-height115 large-text-22 right-0 uppercase text-center flex-center transition border50 sm-pos-r sm-mx-auto first-section__cases">
                <span class="pos-r z-2 font-tenor first-section__cases_text"><?php esc_html_e('наши', 'faces'); ?>
                <br><?php esc_html_e('кейсы', 'faces'); ?></span>
                <span class="pos-a first-section__cases_arr">
                    <?php get_template_part('/vector-images/cases-arr'); ?>
                </span>
            </a>
        </div>

        <p class="text-18 line-height-30 large-line-height-25 sm-unset-max-width sm-text-14 sm-line-height-19 first-section__bottom-text"><?php the_field('text-bottom-left'); ?></p>

    </div>

    <?php $cases = get_field('cases');

    if (isset($cases)) : ?>
        <div class="container cases">
            <?php
            $cases_count = count($cases);
            $i = 1;
            foreach ($cases as $case) :

                $post_object = $case['case'];
                $case_id = $post_object->ID;
                $case_title = $post_object->post_title;
                $case_description = get_field('description', $case_id);
                $img_src = get_field('img', $case_id)['url']; ?>
                <div class="cases__item">
                    <div class="flex flex-col pos-r h-100 cases__item_inner">
                        <?php if (isset($img_src)) : ?>
                            <figure class="hidden border50 cases__item_img">
                                <img src="<?php esc_attr_e($img_src, 'faces'); ?>"
                                     loading="lazy"
                                     class="block"
                                     alt="img">
                            </figure>
                        <?php endif;
                        if (isset($case_title)) : ?>
                            <p class="text-40 line-height-1 large-text-30 large-text-25 font-tenor cases__item_title">
                                <?php esc_html_e($case_title, 'faces'); ?>
                            </p>
                        <?php endif;
                        if (isset($case_description)) :?>
                            <p class="text-18 line-height-30 large-text-12 large-line-height-16 cases__item_desc">
                                <?php echo __($case_description, 'faces'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($cases_count == $i) : ?>
                            <a href="<?php echo esc_url(get_home_url() . '/kejsy/', 'faces');  ?>"
                               class="font-tenor ws-nowrap transition block pos-a line-height-1 text-40 large-text-25 cases__item_link">
                                <?php esc_html_e('Смотреть все кейсы', 'faces');  ?>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <?php $i++;
            endforeach; ?>
        </div>
    <?php endif; ?>

    <?php $theses = get_field('theses');

    if (isset($theses)) : ?>
        <div class="container flex flex-col theses">
            <?php foreach ($theses as $theses_item) : ?>
                <div class="pos-r theses__item">
                    <p class="font-tenor text-40 sm-text-20 line-height-1 theses__item_caption"><?php esc_html_e($theses_item['caption'], 'faces'); ?></p>
                    <p class="text-18 line-height-25 sm-text-12 sm-line-height-16 theses__item_text"><?php echo __($theses_item['text'], 'faces'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="pos-r full-width container our-bloggers">
        <p class="font-tenor pos-a text-center uppercase text-60 large-text-48 line-height-140 absolute-center-x width-fit-content mx-auto sm-none our-bloggers__caption">
            <?php esc_html_e('наши', 'faces'); ?> <br><?php esc_html_e('блогеры', 'faces'); ?></p>
        <a href="#"
           class="pos-r sm-text-35 line-height115 uppercase text-center none transition border50 sm-mx-auto sm-flex align-center justify-center our-bloggers__scroll-btn">
                <span class="pos-r z-2 font-tenor our-bloggers__scroll-btn_text"><?php esc_html_e('наши', 'faces'); ?>
                <br><?php esc_html_e('блогеры', 'faces'); ?></span>
            <span class="pos-a our-bloggers__scroll-btn_arr">
                    <?php get_template_part('/vector-images/cases-arr'); ?>
                </span>
        </a>
        <?php $bloggers = get_field('bloggers');
        if (isset($bloggers)) : ?>
            <div class="pos-r full-width our-bloggers__wrap">
                <?php foreach ($bloggers as $key => $blogger) :

                    if ($key >= 4) {
                        break;
                    }

                    $css_class = sprintf('block border-70 soaring soaring-%s pos-a hidden our-bloggers__item our-bloggers__%s', $key + 1, $key + 1);
                    $post_object = $blogger['blogger'];
                    $blogger_id = $post_object->ID;
                    $blogger_name = $post_object->post_title;
                    $blogger_description = get_field('description', $blogger_id);
                    $img_src = get_field('photo', $blogger_id)['url']; ?>
                    <div>
                        <div class="<?php esc_attr_e($css_class, 'faces'); ?>"
                             style="background-image: url('<?php esc_attr_e($img_src, 'faces'); ?>');">
                            <div class="flex flex-col justify-end full-width h-100 transition our-bloggers__item_info">
                                <p class="pos-r text-30 sm-text-20 line-height-1 our-bloggers__item_name">
                                    <span class="pos-r z-1 font-tenor"><?php esc_html_e($blogger_name, 'faces'); ?></span>
                                </p>
                                <p class="pos-r z-1 line-height-25 text-18 sm-text-12 sm-line-height-16 our-bloggers__item_desc">
                                    <?php esc_html_e($blogger_description, 'faces'); ?>
                                </p>
                                <?php if (wp_is_mobile()) : ?>
                                    <a class="pos-a none sm-block z-2 top-0 bottom-0 left-0 right-0"
                                       href="<?php echo esc_url(get_home_url() . '/nashi-blogery/', 'faces');  ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <a href="<?php echo esc_url(get_home_url() . '/nashi-blogery/', 'faces'); ?>"
           class="pos-a text-center line-height-1 font-tenor text-40 md-text-25 width-fit-content transition bottom-0 sm-none our-bloggers__all"><?php esc_html_e('Все блогеры', 'faces'); ?></a>
    </div>

    <?php
    $partners = get_field('partners') ?? null;
    if (isset($partners)) :
        $caption = $partners['caption'];
        $partners_list = $partners['list'];
        ?>
        <div class="pos-r large-block flex align-center container partners">
            <?php if ($caption) : ?>
                <div class="flex-center pos-r large-mx-auto border50 partners__title">
                    <p class="uppercase text-center pos-r z-1 line-height-1 text-60 large-text-22 sm-text-35 sm-line-height115 font-tenor partners__title_text">
                        <?php echo __($caption, 'faces'); ?>
                    </p>
                    <span class="pos-a partners__title_arr none sm-block">
                        <?php get_template_part('/vector-images/cases-arr'); ?>
                    </span>
                </div>
            <?php endif; ?>
            <?php if (isset($partners_list)) : ?>
                <div class="flex pos-r align-center large-justify-between large-flex large-flex-wrap partners__list">
                    <?php foreach ($partners_list as $partner) : ?>
                        <a href="<?php echo esc_url($partner['link'], 'faces'); ?>"
                           class="flex-center partners__item">
                            <img src="<?php esc_attr_e($partner['logo']['url'], 'faces'); ?>"
                                 alt="img">
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php
    $bottom_block = get_field('bottom-block') ?? null;
    if (isset($bottom_block)) :
        $bottom_block_caption = $bottom_block['caption'];
        $bottom_block_text = $bottom_block['text']; ?>
        <div class="mx-auto pos-r last-block">
            <span class="absolute-center block border50 z-0 last-block__circle"></span>
            <div class="last-block__wrap">
                <?php if ($bottom_block_caption) : ?>
                    <p class="pos-r z-1 text-center uppercase font-tenor text-60 line-height-120 sm-text-30 last-block__caption">
                        <?php echo __($bottom_block_caption, 'faces'); ?>
                    </p>
                <?php endif; ?>
                <?php if ($bottom_block_text) : ?>
                    <p class="pos-r z-1 text-center line-height-25 text-18 sm-text-12 sm-line-height-16 last-block__text">
                        <?php echo __($bottom_block_text, 'faces'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
