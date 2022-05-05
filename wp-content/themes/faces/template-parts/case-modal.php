<?php
$case_id = $args['id'];
$case = get_post($case_id);
$stats = get_field('stats', $case_id);
$img_url = get_field('modal-img', $case_id)['url']
    ?? get_field('modal-img', 'option')['url']; ?>

<div class="pos-r modal-window bg-white color-black case-modal">
    <span class="block pointer pos-a close" data-close="true"></span>
    <p class="text-60 text-center font-tenor line-height-70 modal-window__title">
        <?php esc_html_e($case->post_title, 'faces'); ?>
    </p>
    <p class="text-center text-20  modal-window__text">
        <?php esc_html_e(get_field('description', $case_id), 'faces'); ?>
    </p>

        Ultricies lorem id viverra euismod sit lectus. Eu blandit eget tincidunt pharetra bibendum. Pharetra, interdum ut felis dictumst praesent. Velit libero imperdiet mi id nunc, ut facilisis placerat sed. Faucibus aenean turpis nisi, euismod.</p>
</div>