<?php
/**
 * Template Name: О нас
 */

$page_title = get_field('page-title') ?? get_the_title();
$top_text = get_field('text-top') ?? null;
$quote = get_field('quote') ?? null;
$side_text = get_field('text-side') ?? null;
$bottom_text = get_field('text-bottom') ?? null;

$slider = get_field('slider') ?? null;

get_header(); ?>

    <div class="container pos-r about-page">
        <h1 class="uppercase text-center sm-text-left font-tenor page-title"><?php echo __($page_title, 'faces'); ?></h1>

        <div class="mx-auto about-page__content">
            <?php if ($top_text != '') : ?>
                <p class="text-22 line-height-30"><?php echo __($top_text, 'faces'); ?></p>
            <?php endif; ?>
            <div class="flex align-start justify-between about-page__content_center">
                <?php if ($quote != '') : ?>
                    <p class="pos-r text-36 line-height-49 about-page__content_quote"><?php echo __($quote, 'faces'); ?></p>
                <?php endif;
                if ($side_text != '') : ?>
                    <p class="pos-r text-22 line-height-30 about-page__content_side-text"><?php echo __($side_text, 'faces'); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($bottom_text != '') : ?>
                <p class="text-22 line-height-30"><?php echo __($bottom_text, 'faces'); ?></p>
            <?php endif; ?>
        </div>

        <?php if (isset($slider)) : ?>
            <div class="hidden about-page__slider-wrap">
                <div class="full-width mx-auto about-page__slider">
                    <?php foreach ($slider as $img) :

                        $img_url = $img['img']['url'];
                        if ($img_url != '') : ?>
                            <div class="pos-r hidden about-page__slider_item"
                                 style="background-image: url('<?php esc_attr_e($img_url, 'faces'); ?>');"></div>

                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="pos-r full-width about-page__virtual-tour">
            <div class="absolute-center-x top-0 flex about-page__virtual-tour_wrap">
                <p class="font-tenor unselect ws-nowrap text-70 line-height-82">virtual <span class="color-primary">tour</span></p>
                <p class="font-tenor unselect ws-nowrap text-70 line-height-82">virtual <span class="color-primary">tour</span></p>
                <p class="font-tenor unselect ws-nowrap text-70 line-height-82">virtual <span class="color-primary">tour</span></p>
                <p class="font-tenor unselect ws-nowrap text-70 line-height-82">virtual <span class="color-primary">tour</span></p>
                <p class="font-tenor unselect ws-nowrap text-70 line-height-82">virtual <span class="color-primary">tour</span></p>
            </div>
        </div>

        <div class="pos-r about-page__frame">

            <div class="full-width about-page__frame_window"></div>

            <?php get_template_part('/template-parts/work-offer-btn', null, array(
                'classes' => 'text-26',
                'text' => 'Хочу <br>в вашу <br>команду',
            )); ?>
        </div>
    </div>

<?php get_footer();
