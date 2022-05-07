'use strict';

export const aboutPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.runline = $('.about-page__virtual-tour');

    this.runlineSlider = () => {
        if (!self.runline.length) {
            return;
        }

        self.runline.slick({
            variableWidth: true,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            cssEase: 'linear',
            autoplay: true,
            speed: 4000,
            autoplaySpeed: 0,
            prevArrow: '',
            nextArrow: '',
        })
    }

    this.init = () => {
        this.runlineSlider();
    }
}