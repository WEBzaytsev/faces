'use strict';

import {mask} from "./phoneMask";

export const formClass = function ($, settings, parentClass) {
    const self = this;
    this.form = parentClass.modalWrap.find('form');
    this.lang = document.documentElement.lang.includes('en') ? 'en' : 'ru';

    this.init = () => {
        mask();

        this.form.validate({
            ignore: [],
            errorClass: 'error',
            validClass: 'success',
            rules: {
                user_name: {
                    required: true,
                },
                user_phone: {
                    required: true,
                },
                user_email: {
                    required: true,
                    user_email: true,
                },
                kind: {
                    required: true,
                },
            },
            errorElement : 'span',
            errorPlacement: function(error, element) {
                const placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertBefore(element);
                }
            },
            beforeSend: function () {

            },
            submitHandler: function () {

                const $form = self.form.get(0);

                const url = $form.action;
                const method = $form.method;

                fetch(url, {
                    method: method,
                    body: new FormData($form),
                })
                    .then((res) => {
                        if (res.ok) {
                            $form.reset();
                            parentClass.modalWrap.find('[data-close]')
                                .trigger('click');
                        }
                    })
            }
        });

        $.validator.addMethod('user_email', function (value, element) {
            return this.optional(element) || /\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/.test(value);
        });
        jQuery.extend(jQuery.validator.messages, {
            required: this.lang === 'en'
                ? 'This field is required*' : 'Это поле обязательно для заполнения*',
            user_email: this.lang === 'en'
                ? 'Invalid email' : 'Некорректный e-mail',
        });
    }
}