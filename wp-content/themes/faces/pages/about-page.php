<?php
/**
 * Template Name: О нас
 */

$page_title = get_field('page-title') ?? get_the_title();
$top_text = get_field('text-top') ?? null;
$quote = get_field('quote') ?? null;
$side_text = get_field('text-side') ?? null;
$bottom_text = get_field('text-bottom') ?? null;
$runline = get_field('run-line') ?? null;

$photos = get_field('photos') ?? null;

get_header(); ?>

    <div class="container pos-r about-page z-3">
        <h1 class="uppercase text-center sm-text-left font-tenor page-title"><?php echo __($page_title, 'faces'); ?></h1>

        <div class="mx-auto about-page__content">
            <?php if ($top_text != '') : ?>
                <p class="text-22 line-height-30 large-text-18 large-line-height144 sm-text-14"><?php echo __($top_text, 'faces'); ?></p>
            <?php endif; ?>
            <div class="flex md-block align-start justify-between about-page__content_center">
                <?php if ($quote != '') : ?>
                    <p class="pos-r text-36 line-height-49 large-text-24 large-line-height-33 sm-text-20 sm-line-height-27 about-page__content_quote"><?php echo __($quote, 'faces'); ?></p>
                <?php endif;
                if ($side_text != '') : ?>
                    <p class="pos-r text-22 line-height-30 large-text-18 large-line-height144 sm-text-14 about-page__content_side-text"><?php echo __($side_text, 'faces'); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($bottom_text != '') : ?>
                <p class="text-22 line-height-30 large-text-18 large-line-height144 sm-text-14"><?php echo __($bottom_text, 'faces'); ?></p>
            <?php endif; ?>
        </div>

        <?php if (isset($photos)) : ?>
            <div class="full-width z-1 flex-center pos-r about-page__photos">
                <?php
                $i = 0;
                foreach ($photos as $img) :
                    $img_url = $img['img']['url'];
                    if ($img_url != '') : ?>
                        <figure class="pos-<?php echo $i == 1 ? 'r z-2' : 'a z-1 absolute-center-y'; ?> about-page__photos_item">
                            <div class="soaring pos-r hidden border-70 sm-border-30 about-page__photos_img">
                                <img src="<?php echo esc_url($img_url, 'faces'); ?>"
                                     alt="img">
                            </div>
                        </figure>
                    <?php endif;
                    $i++;
                endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($runline) : ?>
            <div class="pos-r full-width about-page__virtual-tour">
                <?php for ($i = 0; $i < 6; $i++) : ?>
                    <p class="font-tenor unselect ws-nowrap text-70 line-height-82 sm-text-24 sm-line-height-29">
                        <?php echo __($runline, 'faces'); ?>
                    </p>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class="pos-r z-2 about-page__frame">

            <div class="full-width about-page__frame_window"></div>

            <?php get_template_part('/template-parts/work-offer-btn', null, array(
                'classes' => '',
                'text' => __('Хочу <br>в вашу <br>команду', 'faces'),
            )); ?>
        </div>
    </div>

<?php get_footer();
