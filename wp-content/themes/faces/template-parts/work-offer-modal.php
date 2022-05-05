<div class="pos-r modal-window bg-white color-black work-offer">
    <span class="block pointer pos-a close" data-close="true"></span>
    <p class="text-60 text-center font-tenor line-height-70 modal-window__title">
        <?php esc_html_e('Давайте поработаем', 'faces'); ?>
    </p>
    <p class="text-center text-20  modal-window__text">
        <?php esc_html_e('Для дальнейшй совместной работы нам необходима минимальная
        информация', 'faces'); ?>
    </p>
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

        <span class="block pos-r pointer mx-auto purple-button md-none">
            <span class="z-1 block transition pos-r text-center purple-button_inner">
                <?php esc_html_e('Отправить запрос', 'faces'); ?>
            </span>
        </span>
    </form>
</div>