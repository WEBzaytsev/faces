'use strict';

import {checkWidth} from "../commonFunctions";

export const FiltersClass = function ($, settings, parent, action) {
    const self = this;
    this.mainSettings = settings;
    this.filtersWrap = $('.filters');
    this.filters = this.filtersWrap.find('.filters__item');
    this.activeFilter = this.filtersWrap.find('.filters__item.active');
    this.blockFilters = false;
    this.contentWrap = $('.posts-content');
    this.currentWidth = checkWidth();
    this.filtersShowBtn = $('.filter-icon');
    this.selectField = this.filtersWrap.find('.filters-select');

    this.filterSlider = () => {
        if (self.currentWidth === 'mobile' || self.filters.length < 4) {
            return;
        }

        if (self.filtersWrap.hasClass('flex')) {
            self.filtersWrap.removeClass('flex');
        }

        this.filtersWrap.slick({
            slidesToShow: 4,
            variableWidth: true,
            infinite: false,
            swipeToSlide: true,
            cssEase: 'linear',
            prevArrow: '',
            nextArrow: '',
            outerEdgeLimit: false,
        })
    }

    this.filterHandler = function (currentCat = 'all', element = null) {

        if (self.blockFilters) {
            return;
        }

        if (element && element.hasClass('active')) {
            return;
        }

        if (self.currentWidth !== 'mobile') {
            self.switchActiveFilter(element);
        }
        self.getCases(currentCat);
        self.setCatUrl(currentCat);
    }

    this.setCatUrl = (cat) => {
        const url = new URL(window.location);
        url.searchParams.set('cat', cat);
        window.history.pushState(null, document.title, url);
    }

    this.switchActiveFilter = (elem) => {
        self.activeFilter.removeClass('active');
        self.activeFilter = elem;
        self.activeFilter.addClass('active');
    }

    this.getCases = (cat) => {
        $.ajax({
            url: self.mainSettings.ajax_url,
            data: {
                action: action,
                cat: cat || 'all',
            },
            type: 'POST',
            beforeSend: function(){
                self.blockFilters = true;
                self.contentWrap.html(`<div class="loader active">
                            <div class="loader-inner">
                                <div class="loader-animate">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>`)
            },
            success: function( data ) {
                if (data) {
                    self.contentWrap.html(data);
                    if (typeof parent.modals === 'function') {
                        parent.modals();
                    }
                }
                self.blockFilters = false;
            }
        });
    }

    this.showFilters = () => {
        if (self.filtersWrap.hasClass('none')) {
            self.filtersWrap.removeClass('none');
        }

        setTimeout(() => {
            if (self.filtersWrap.hasClass('opacity-0')) {
                self.filtersWrap.removeClass('opacity-0');
            }
            if (self.filtersWrap.hasClass('z--100')) {
                self.filtersWrap.removeClass('z--100');
            }
        }, 100)
    }

    this.hideFilters = () => {
        self.filtersWrap.addClass('opacity-0');
        self.filtersWrap.addClass('z--100');

        setTimeout(() => {
            self.filtersWrap.addClass('none');
        }, 350);
    }

    this.toggleFilters = () => {

        if (self.filtersShowBtn.hasClass('active')) {
            self.hideFilters();
        } else {
            self.showFilters();
        }

        self.filtersShowBtn.toggleClass('active');
    }

    this.select2Filters = () => {
        if (self.currentWidth !== 'mobile') {
            return;
        }

        $(self.selectField).select2({
            minimumResultsForSearch: Infinity,
            dropdownParent: $(self.filtersWrap),
        }).on('select2:select', function () {
            self.filterHandler($(this).val());
        });
    }

    this.init = () => {
        this.filterSlider();
        this.select2Filters();

        this.filtersShowBtn.on('click', this.toggleFilters);

        if (this.currentWidth !== 'mobile') {
            this.filters.each(function () {
                $(this).on('click', function () {
                    const currentCat = $(this).data('cat');
                    self.filterHandler(currentCat, $(this));
                });
            });

            this.showFilters();
        }
    }
}