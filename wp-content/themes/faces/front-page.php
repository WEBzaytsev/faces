<?php get_header(); ?>

<main class="home-page">
    <div class="container pos-r first-section">
        <h1 class="uppercase page-title"><?php the_field('page-caption'); ?></h1>

        <div class="pos-r full-width">
            <?php
            $video_settings = get_field('video') ?? null;
            $video_poster = $video_settings['poster']['url'] ?? null;
            $video_source_type = $video_settings['source'] ?? null;
            $video_source = $video_source_type == 'frame' ? $video_settings['frame'] : $video_settings['link'];
            ?>
            <div class="mx-auto pos-r first-section__circle">
                <div class="hidden border50 hidden pos-a first-section__circle_wrap">
                    <div class="first-section__circle_image"
                         style="background-image:url('<?php esc_attr_e($video_poster, 'faces'); ?>');">
                        <?php if ($video_source_type == 'frame') : ?>
                            <?php echo $video_source ?? ''; ?>
                        <?php endif; ?>
                    </div>
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

    <div class="pos-r full-width container our-bloggers">
        <p class="font-tenor pos-a text-center uppercase text-60 line-height-1 width-fit-content mx-auto our-bloggers__caption">
            наши <br>блогеры</p>
        <?php $bloggers_photos = get_field('bloggers-photo');
        if (isset($bloggers_photos)) :
            foreach ($bloggers_photos as $key => $bloggers_photo) :

                if ($key >= 4) {
                    break;
                }

                $css_class = sprintf('block border-70 pos-a our-bloggers__%s', $key + 1);
                $img_src = $bloggers_photo['img']['url']; ?>
                <img src="<?php esc_attr_e($img_src, 'faces'); ?>"
                     class="<?php esc_attr_e($css_class, 'faces'); ?>"
                     alt="img">
            <?php endforeach;
        endif; ?>
    </div>
</main>

<?php get_footer(); ?>
