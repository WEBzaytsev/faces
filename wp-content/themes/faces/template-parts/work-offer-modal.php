<div class="pos-r modal-window bg-white color-black work-offer">
    <span class="block pointer pos-a close" data-close="true"></span>
    <p class="text-60 text-center font-tenor line-height-70 md-text-25 md-line-height-29 modal-window__title">
        <?php esc_html_e('Давайте поработаем', 'faces'); ?>
    </p>
    <p class="text-center text-20 md-text-14 md-line-height144 modal-window__text">
        <?php esc_html_e('Для дальнейшей совместной работы нам необходима минимальная
        информация', 'faces'); ?>
    </p>
    <?php get_template_part('/template-parts/feedback-form', null, array(
            'type' => 'work-offer',
    )); ?>
</div>