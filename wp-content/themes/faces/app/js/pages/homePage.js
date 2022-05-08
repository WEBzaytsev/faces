'use strict';

import {checkWidth} from "../commonFunctions";

export const homePage = function ($) {
    const self = this;
    this.currentWidth = checkWidth();
    this.bloggers = $('.our-bloggers__wrap');
    this.partners = $('.partners__list');
    this.lastBlock = $('.last-block');
    this.lastBlockTop = this.lastBlock.offset().top - this.lastBlock.outerHeight(false);
    this.lastBlockBottom = this.lastBlock.offset().top;
    this.cases = $('.cases');
    this.casesTop = this.cases.offset().top;
    this.casesBottom = this.cases.offset().top + this.cases.outerHeight();
    this.toCasesButton = $('.first-section__cases');
    this.videoPlayBtn = $('.first-section__circle_play');
    this.video = $('.first-section__circle_image video') || $('.first-section__circle_image iframe');

    this.lastBlockAnimation = () => {
        if (window.pageYOffset > this.lastBlockTop - 200
            && window.pageYOffset < this.lastBlockBottom - 600) {
            this.lastBlock.addClass('active');
        } else {
            this.lastBlock.removeClass('active');
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

        self.cases.on('afterChange', function(event, slick, currentSlide, nextSlide){

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

        this.toCasesButton.on('click', function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: self.cases.offset().top,
            });
        });

        $(window).on('scroll', this.lastBlockAnimation);
    }
}