'use strict';

export const aboutPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.slider = $('.about-page__slider');

    this.sliderInit = () => {
        if (!self.slider.length) {
            return;
        }

        self.slider.slick({
            slidesToShow: 1,
            infinite: true,
            slidesToScroll: 1,
            prevArrow: '',
            nextArrow: '',
        })
    }


    this.init = () => {
        this.sliderInit();
    }
}