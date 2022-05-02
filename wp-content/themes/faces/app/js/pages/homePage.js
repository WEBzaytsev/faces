'use strict';

import {checkWidth} from "../commonFunctions";

export const homePage = function ($) {
    const self = this;
    this.isMobile = checkWidth();
    this.bloggers = $('.our-bloggers__wrap');
    this.partners = $('.partners__list');
    this.lastBlock = $('.last-block');
    this.lastBlockTop = this.lastBlock.offset().top - this.lastBlock.outerHeight(false);
    this.lastBlockBottom = this.lastBlock.offset().top;
    this.cases = $('.cases');
    this.casesTop = this.cases.offset().top;
    this.casesBottom = this.cases.offset().top + this.cases.outerHeight();
    this.toCasesButton = $('.first-section__cases');

    this.lastBlockAnimation = () => {
        console.log(this.lastBlockTop, this.lastBlockBottom, window.pageYOffset);
        if (window.pageYOffset > this.lastBlockTop - 200
            && window.pageYOffset < this.lastBlockBottom - 600) {
            this.lastBlock.addClass('active');
        } else {
            this.lastBlock.removeClass('active');
        }
    }

    this.bloggersSlider = () => {
        if (!self.isMobile || !self.bloggers.length) {
            return;
        }

        self.bloggers.slick({
            slidesToShow: 1,
            infinite: true,
            slidesToScroll: 1,
            prevArrow: '',
            nextArrow: '',
        });


    }

    this.casesSlider = () => {
        if (!self.cases.length) {
            return;
        }

        let scrolled = false;

        self.cases.slick({
            slidesToShow: 2,
            infinite: false,
            slidesToScroll: 1,
            prevArrow: '',
            nextArrow: '',
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 1,
                    }
                },
            ]
        });

        $(window).on('scroll', function () {
            if (window.pageYOffset > self.casesTop - 500) {
                if (!scrolled) {
                    self.cases.slick('slickNext');
                    scrolled = !scrolled;
                }
            } else {
                if (scrolled) {
                    self.cases.slick('slickPrev');
                    scrolled = !scrolled;
                }
            }
        })
    }

    this.partnersSlider = () => {
        if (!self.partners.length) {
            return;
        }

        if (!self.isMobile) {
            self.partners.slick({
                variableWidth: true,
                infinite: false,
                swipeToSlide: true,
                cssEase: 'linear',
                prevArrow: '',
                nextArrow: '',
            });
        }
    }

    this.init = () => {
        this.partnersSlider();
        this.casesSlider();
        this.bloggersSlider();
        this.lastBlockAnimation();

        this.toCasesButton.on('click', function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: self.cases.offset().top,
            });
        });

        $(window).on('scroll', this.lastBlockAnimation);
    }
}