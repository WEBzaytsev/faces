<?php
$type = $args['type'];
$case_id = $args['case_id'] ?? null;
?>

<form action="" class="full-width mx-auto modal-window__form">
    <div class="modal-window__form_field">
        <label for="user_name"
               class="text-20 line-height144 modal-window__form_label">
            <?php esc_html_e('Ваше имя', 'faces'); ?>
        </label>
        <input type="text"
               placeholder="<?php esc_attr_e('Имя', 'faces'); ?>"
               class="block full-width bg-white text-18 line-height-25 modal-window__form_input"
               name="user_name"
               id="user_name">
    </div>
    <div class="modal-window__form_field">
        <label for="user_phone"
               class="text-20 line-height144 modal-window__form_label">
            <?php esc_html_e('Ваш телефон', 'faces'); ?>
        </label>
        <input type="text"
               placeholder="<?php esc_attr_e('Номер телефона', 'faces'); ?>"
               class="block full-width bg-white text-18 line-height-25 modal-window__form_input"
               name="user_phone"
               id="user_phone">
    </div>
    <div class="modal-window__form_field">
        <label for="user_email"
               class="text-20 line-height144 modal-window__form_label">
            <?php esc_html_e('Ваша почта', 'faces'); ?>
        </label>
        <input type="text"
               placeholder="E-mail"
               class="block full-width bg-white text-18 line-height-25 modal-window__form_input"
               name="user_email"
               id="user_email">
    </div>
    <?php if ($type == 'work-offer') : ?>
        <div class="modal-window__form_field">
            <label for="mess"
                   class="text-20 line-height144 modal-window__form_label">
                <?php esc_html_e('Комментарий', 'faces'); ?>
            </label>
            <textarea type="text"
                      placeholder="<?php esc_attr_e('Описательный текст', 'faces'); ?>"
                      class="block full-width bg-white text-18 line-height-25 modal-window__form_input"
                      name="mess"
                      id="mess"></textarea>
        </div>
        <div class="modal-window__form_field radio flex align-center">
            <label class="pointer pos-r"
                   for="blogger">
                <input type="radio" name="kind" id="blogger">
                <span class="nowrap block">
                    <?php esc_html_e('Я блогер', 'faces'); ?>
                </span>
            </label>
            <label class="pointer pos-r"
                   for="brand">
                <input type="radio" name="kind" id="brand">
                <span class="nowrap block">
                    <?php esc_html_e('Я бренд', 'faces'); ?>
                </span>
            </label>
            <label class="pointer pos-r"
                   for="anyone">
                <input type="radio" name="kind" id="anyone">
                <span class="nowrap block">
                    <?php esc_html_e('Не блогер и не бренд', 'faces'); ?>
                </span>
            </label>
        </div>
    <?php endif;
    if ($type == 'case') : ?>
        <input type="hidden" name="case-id" value="<?php esc_attr_e($case_id, 'faces'); ?>">
    <?php endif; ?>
    <span class="block pos-r pointer mx-auto purple-button md-none">
            <span class="z-1 block transition pos-r text-center purple-button_inner">
                <?php esc_html_e('Отправить запрос', 'faces'); ?>
            </span>
        </span>
    <p class="mx-auto text-center modal-window__form_note"><?php esc_html_e('Нажимая на кнопку “Отправить” вы соглашаетесь с Политикой конфиденциальности', 'faces'); ?></p>
</form>
