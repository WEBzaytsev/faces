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
    const tabletWidth = 1023;
    const windowWidth = document.documentElement.clientWidth

    if (mobileWidth > windowWidth ) {
        return 'mobile';
    }

    if (tabletWidth > windowWidth ) {
        return 'tablet';
    }

    return 'desktop'
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