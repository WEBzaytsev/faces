<?php
$type = $args['type'];
$case_id = $args['case_id'] ?? null;
$form_id = $type == 'case' ? 508 : 507;
?>

<form class="full-width mx-auto modal-window__form" method="post">
    <?php wp_nonce_field() ?>
    <input type="hidden" name="_wpcf7" value="<?php esc_attr_e($form_id); ?>">
    <div class="pos-r modal-window__form_field">
        <label for="user_name"
               class="text-20 line-height144 sm-text-14 sm-line-height-16 modal-window__form_label">
            <?php esc_html_e('Ваше имя', 'faces'); ?>
        </label>
        <input type="text"
               placeholder="<?php esc_attr_e('Имя', 'faces'); ?>"
               class="block full-width bg-white text-18 line-height-25 sm-text-14 sm-line-height-16 modal-window__form_input"
               name="user_name"
               id="user_name">
    </div>
    <div class="pos-r modal-window__form_field">
        <label for="user_phone"
               class="text-20 line-height144 sm-text-14 sm-line-height-16 modal-window__form_label">
            <?php esc_html_e('Ваш телефон', 'faces'); ?>
        </label>
        <input type="text"
               placeholder="<?php esc_attr_e('Номер телефона', 'faces'); ?>"
               class="block full-width bg-white text-18 line-height-25 sm-text-14 sm-line-height-16 modal-window__form_input"
               name="user_phone"
               data-tel-input
               maxlength="18"
               id="user_phone">
    </div>
    <div class="pos-r modal-window__form_field">
        <label for="user_email"
               class="text-20 line-height144 sm-text-14 sm-line-height-16 modal-window__form_label">
            <?php esc_html_e('Ваша почта', 'faces'); ?>
        </label>
        <input type="text"
               placeholder="E-mail"
               class="block full-width bg-white text-18 line-height-25 sm-text-14 sm-line-height-16 modal-window__form_input"
               name="user_email"
               id="user_email">
    </div>
    <?php if ($type == 'work-offer') : ?>
        <div class="modal-window__form_field">
            <label for="mess"
                   class="text-20 line-height144 sm-text-14 sm-line-height-16 modal-window__form_label">
                <?php esc_html_e('Комментарий', 'faces'); ?>
            </label>
            <textarea type="text"
                      placeholder="<?php esc_attr_e('Описательный текст', 'faces'); ?>"
                      class="block full-width bg-white text-18 sm-text-14 sm-line-height-16 line-height-25 modal-window__form_input"
                      name="mess"
                      id="mess"></textarea>
        </div>
        <div class="pos-r modal-window__form_field radio flex align-center sm-flex-wrap">
            <label class="pointer pos-r"
                   for="blogger">
                <input type="checkbox"
                       value="<?php esc_attr_e('Я блогер', 'faces'); ?>"
                       name="kind"
                       id="blogger">
                <span class="nowrap block">
                    <?php esc_html_e('Я блогер', 'faces'); ?>
                </span>
            </label>
            <label class="pointer pos-r"
                   for="brand">
                <input type="checkbox"
                       value="<?php esc_attr_e('Я бренд', 'faces'); ?>"
                       name="kind"
                       id="brand">
                <span class="nowrap block">
                    <?php esc_html_e('Я бренд', 'faces'); ?>
                </span>
            </label>
            <label class="pointer pos-r"
                   for="anyone">
                <input type="checkbox"
                       value="<?php esc_attr_e('Не блогер и не бренд', 'faces'); ?>"
                       name="kind"
                       id="anyone">
                <span class="nowrap block">
                    <?php esc_html_e('Не блогер и не бренд', 'faces'); ?>
                </span>
            </label>
        </div>
    <?php endif;
    if ($type == 'case') : ?>
        <input type="hidden" name="case_title" value="<?php esc_attr_e(get_the_title($case_id), 'faces'); ?>">
    <?php endif; ?>
    <button type="submit" class="block pos-r pointer mx-auto p-0 b-0 purple-button">
            <span class="z-1 block transition pos-r text-center purple-button_inner">
                <?php esc_html_e('Отправить запрос', 'faces'); ?>
            </span>
    </button>
    <p class="mx-auto text-center text-14 line-height-19 sm-text-12 sm-line-height-16 modal-window__form_note">
        <?php esc_html_e('Нажимая на кнопку “Отправить” вы соглашаетесь с Политикой конфиденциальности', 'faces'); ?>
    </p>
</form>
