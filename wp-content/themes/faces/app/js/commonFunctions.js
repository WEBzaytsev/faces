'use strict';

/*(function ($) {
    const langs = [...document.querySelectorAll('.header__langs_item')];

    langs.forEach(l => l.addEventListener('click', switchLangs));

    function switchLangs(e) {
        e.preventDefault();
        langs.forEach(l => {
            l.classList.toggle('active');
        })
    }
})(jQuery);*/

export function checkWidth() {
    const mobileWidth = 767;
    return mobileWidth > document.documentElement.clientWidth;
}

export function switchClass(element, cssClass) {

    if (!element.length) {
        return;
    }

    if (element.hasClass(cssClass)) {
        element.removeClass(cssClass);
        return;
    }

    element.addClass(cssClass);
}

export function mobileMenu(menuBtn) {
    menuBtn.on('click', () => {
        menuBtn.parent().toggleClass('active');
        jQuery('body').toggleClass('no-scrolling');
    });
}