<?php
$case_id = $args['id'];
$case = get_post($case_id);
$stats = get_field('stats', $case_id);
$img_url = get_field('modal-img', $case_id)['url']
    ?? get_field('modal-img', 'option')['url']; ?>

<div class="pos-r modal-window bg-white color-black case-modal">
    <span class="block pointer pos-a close" data-close="true"></span>
    <p class="text-40 text-center font-tenor line-height-48 md-text-25 md-line-height-29 modal-window__title">
        <?php esc_html_e($case->post_title, 'faces'); ?>
    </p>
    <p class="sm-text-center text-18 sm-text-14 line-height144 mx-auto modal-window__text">
        <?php echo __(get_field('description', $case_id), 'faces'); ?>
    </p>

    <?php if (isset($img_url)) : ?>
    <div class="full-width pos-r z-1 hidden border-70 modal-window__case-img"
         style="background-image: url('<?php esc_attr_e($img_url, 'faces'); ?>');"></div>
    <?php endif; ?>

    <?php if (isset($stats)) : ?>
        <div class="pos-r z-2 full-width flex sm-block align-start justify-between stats">
            <?php foreach ($stats as $stat) : ?>
            <div class="full-width stats__item">
                <div class="flex-center border50 bg-white mx-auto stats__item_num">
                    <span class="color-primary text-center text-66 line-height-52 font-tenor">
                        <?php esc_html_e($stat['value'], 'faces'); ?>
                    </span>
                </div>
                <p class="text-center text-20 line-height-27 md-text-18 md-line-height-25 stats__item_desc">
                    <?php echo __($stat['desc'], 'faces'); ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <p class="text-40 text-center font-tenor line-height-48 md-text-25 md-line-height-29 modal-window__title modal-window__title-form">
        <?php esc_html_e('Хочу также', 'faces'); ?>
    </p>
    <p class="text-center text-18 line-height144 modal-window__text-form">
        <?php echo __('Оставьте заявку <br class="none sm-block">и мы свяжемся с вами', 'faces'); ?>
    </p>
    <?php get_template_part('/template-parts/feedback-form', null, array(
        'type' => 'case',
        'case_id' => $case_id,
    )); ?>
</div>