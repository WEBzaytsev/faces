'use strict';

import {checkWidth, getCoords} from "../commonFunctions";

export const homePage = function ($) {
    const self = this;
    this.currentWidth = checkWidth();
    this.lastBlock = $('.last-block');
    this.lastBlockContent = $('.last-block__wrap');
    this.lastBlockContentTop = null;
    this.lastBlockContentBottom = null;
    this.lastBlockAnimationOffsetTop = self.currentWidth === 'mobile' ? 0 : 200;
    this.lastBlockAnimationOffsetBottom = self.currentWidth === 'mobile' ? 90 : 121;
    this.cases = $('.cases');
    this.partners = $('.partners__list');
    this.bloggers = $('.our-bloggers__wrap');
    this.casesTop = this.cases.offset().top;
    this.casesBottom = this.cases.offset().top + this.cases.outerHeight();
    this.toCasesButton = $('.first-section__cases');
    this.toBloggersButton = $('.our-bloggers__scroll-btn');
    this.toPartnersButton = $('.partners__title');
    this.videoPlayBtn = $('.first-section__circle_play');
    this.video = $('.first-section__circle_image video') || $('.first-section__circle_image iframe');
    this.sLetter = $('.home-page .first-section .page-title_s span.s');

    this.setCoords = () => {
        self.lastBlockContentTop = self.lastBlockContent.offset().top;
        self.lastBlockContentBottom = self.lastBlockContent.offset().top + self.lastBlockContent.outerHeight(false);
    }

    this.sLetterAnimation = () => {
        if (!self.sLetter.length) {
            return;
        }

        const coords = getCoords((self.sLetter).get(0));
        const mewSLetter = self.sLetter.clone().appendTo('.wrapper');
        const offset = self.currentWidth === 'mobile' ? 91 : 121;
        mewSLetter.css('top', coords.top - offset);
        mewSLetter.css('left', coords.left);
    }

    this.lastBlockAnimation = () => {
        const windowTop = window.pageYOffset;
        const windowBottom = windowTop + window.innerHeight;

        if (windowBottom > self.lastBlockContentTop - self.lastBlockAnimationOffsetTop
            && windowTop < self.lastBlockContentBottom - self.lastBlockAnimationOffsetBottom) {
            self.lastBlock.addClass('active');
        } else {
            if (self.lastBlock.hasClass('active')) {
                self.lastBlock.removeClass('active');
            }
        }
    }

    this.bloggersSlider = () => {
        if (self.currentWidth !== 'mobile' || !self.bloggers.length) {
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
            variableWidth: true,
            prevArrow: '',
            nextArrow: '',

            outerEdgeLimit: false,

            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 1,
                    }
                },
            ]
        });

        self.cases.on('afterChange', function (event, slick, currentSlide, nextSlide) {

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

        if (document.documentElement.clientWidth < 1250) {
            return;
        }

        if (self.currentWidth !== 'mobile') {
            self.partners.slick({
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
            });
        }
    }

    this.videoPlayTrigger = () => {
        if (!self.video.length || !self.videoPlayBtn.length) {
            return;
        }

        self.videoPlayBtn.on('click', () => {
            self.video.get(0).play();
            self.videoPlayBtn.addClass('opacity-0 z--100');
        });

        self.video.on('pause', () => {
            if (self.videoPlayBtn.hasClass('opacity-0')) {
                self.videoPlayBtn.removeClass('opacity-0');
            }

            if (self.videoPlayBtn.hasClass('z--100')) {
                self.videoPlayBtn.removeClass('z--100');
            }
        })
    }

    this.init = () => {
        this.partnersSlider();
        this.casesSlider();
        this.bloggersSlider();
        this.lastBlockAnimation();
        this.videoPlayTrigger();
        this.sLetterAnimation();

        const delay = this.currentWidth === 'mobile' ? 1500 : 500;
        setTimeout(this.setCoords, delay);

        this.toCasesButton.on('click', function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: self.cases.offset().top,
            });
        });

        if (this.currentWidth === 'mobile') {
            this.toBloggersButton.on('click', function () {
                $([document.documentElement, document.body]).animate({
                    scrollTop: self.bloggers.offset().top - 120,
                });
            });

            this.toPartnersButton.on('click', function () {
                $([document.documentElement, document.body]).animate({
                    scrollTop: self.partners.offset().top - 120,
                });
            });
        }

        $(window).on('scroll', this.lastBlockAnimation);
    }
}