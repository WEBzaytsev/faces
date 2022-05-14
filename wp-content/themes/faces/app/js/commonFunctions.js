'use strict';

export function checkWidth() {
    const mobileWidth = 767;
    const tabletWidth = 992;
    const largeWidth = 1250;
    const windowWidth = document.documentElement.clientWidth

    if (mobileWidth > windowWidth ) {
        return 'mobile';
    }

    if (tabletWidth > windowWidth ) {
        return 'tablet';
    }

    if (tabletWidth > largeWidth ) {
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

export const getCoords = (elem) => {
    const box = elem.getBoundingClientRect();

    const body = document.body;
    const docEl = document.documentElement;

    const scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
    const scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

    const clientTop = docEl.clientTop || body.clientTop || 0;
    const clientLeft = docEl.clientLeft || body.clientLeft || 0;

    const top  = box.top +  scrollTop - clientTop;
    const left = box.left + scrollLeft - clientLeft;

    return {
        top: Math.round(top),
        left: Math.round(left)
    };
}

export function mobileMenu(menuBtn) {
    menuBtn.on('click', () => {
        menuBtn.parent().toggleClass('active');
        jQuery('.mob-menu-bg').toggleClass('active');
        jQuery('.header').toggleClass('active');
        jQuery('body').toggleClass('no-scrolling');
    });
}