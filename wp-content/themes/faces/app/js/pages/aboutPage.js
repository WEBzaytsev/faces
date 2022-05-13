'use strict';

import {getCoords} from "../commonFunctions";

export const aboutPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.runline = $('.about-page__virtual-tour');
    this.answerLetter = $('span.answer');

    this.answerAnimation = () => {
        if (!self.answerLetter.length) {
            return;
        }

        const coords = getCoords((self.answerLetter).get(0));
        const mewAnswer = self.answerLetter.clone().appendTo('.wrapper');
        const offset = self.currentWidth === 'mobile' ? 91 : 121;
        mewAnswer.css('top', coords.top - offset);
        mewAnswer.css('left', coords.left);
    }

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
        setTimeout(this.answerAnimation, 1000);
    }
}