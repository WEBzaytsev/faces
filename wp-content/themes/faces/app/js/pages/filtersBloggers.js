'use strict';

import {checkWidth} from "../commonFunctions";

export const FiltersBloggersClass = function ($, settings, parent, action) {
    const self = this;
    this.mainSettings = settings;
    this.filtersWrap = $('.bloggers__filters');
    this.advancedFiltersWrap = $('.bloggers__filters_bottom');
    this.categoriesWrap = this.filtersWrap.find('.filters');
    this.categories = this.categoriesWrap.children();
    this.selectCategorieField = this.filtersWrap.find('.filters-select');
    this.activeFilter = this.filtersWrap.find('.filters__item.active');
    this.selectFilters = this.filtersWrap.find('.select');
    this.blockFilters = false;
    this.contentWrap = $('.posts-content__inner');
    this.currentWidth = checkWidth();
    this.filtersShowBtn = $('.filter-icon');
    this.loadMoreBtn = this.contentWrap.find('.more-btn');

    this.categoriesSlider = () => {
        if (self.currentWidth === 'mobile' || self.categories.length < 4) {
            return;
        }

        if (self.categoriesWrap.hasClass('flex')) {
            self.categoriesWrap.removeClass('flex');
        }

        this.categoriesWrap.slick({
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
        self.getBloggers(currentCat);
        self.setCatUrl(currentCat);
        self.setPageUrl(1);
    }

    this.setCatUrl = (cat) => {
        const url = new URL(window.location);
        url.searchParams.set('cat', cat);
        window.history.pushState(null, document.title, url);
    }

    this.setPageUrl = (page) => {
        const url = new URL(window.location);
        url.searchParams.set('page', page);
        window.history.pushState(null, document.title, url);
    }

    this.switchActiveFilter = (elem) => {
        self.activeFilter.removeClass('active');
        self.activeFilter = elem;
        self.activeFilter.addClass('active');
    }

    this.getBloggers = (cat) => {
        $.ajax({
            url: self.mainSettings.ajax_url,
            data: {
                action: action,
                cat: cat || 'all',
            },
            type: 'POST',
            beforeSend: function() {
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
                    self.setLoadMoreBtn();
                }
                self.blockFilters = false;
            }
        });
    }

    this.showFilters = (elem) => {
        if (elem.hasClass('none')) {
            elem.removeClass('none');
        }

        setTimeout(() => {
            if (elem.hasClass('opacity-0')) {
                elem.removeClass('opacity-0');
            }
            if (elem.hasClass('z--100')) {
                elem.removeClass('z--100');
            }
        }, 100)
    }

    this.hideFilters = (elem) => {
        elem.addClass('opacity-0');
        elem.addClass('z--100');

        setTimeout(() => {
            elem.addClass('none');
        }, 350);
    }

    this.toggleFilters = () => {

        if (self.filtersShowBtn.hasClass('active')) {
            self.hideFilters($(self.advancedFiltersWrap));
            if (self.currentWidth === 'mobile') {
                self.hideFilters($(self.categoriesWrap));
            }
        } else {
            self.showFilters($(self.advancedFiltersWrap));
            if (self.currentWidth === 'mobile') {
                self.showFilters($(self.categoriesWrap));
            }
        }

        self.filtersShowBtn.toggleClass('active');
    }

    this.select2Filters = () => {
        self.selectFilters.each(function () {
            $(this).select2({
                minimumResultsForSearch: Infinity,
                dropdownParent: $(this).parent(),
            }).on('select2:select', function () {
                // self.filterHandler($(this).val());
            });
        })
    }

    this.select2Categories = () => {
        if (self.currentWidth !== 'mobile') {
            return;
        }

        $(self.selectCategorieField).select2({
            minimumResultsForSearch: Infinity,
            dropdownParent: $(self.filtersWrap),
        }).on('select2:select', function () {
            self.filterHandler($(this).val());
        });
    }

    this.setLoadMoreBtn = () => {
        self.loadMoreBtn = self.contentWrap.find('.more-btn');

        if (!self.loadMoreBtn.length) {
            return;
        }

        self.loadMoreBtn.on('click', self.loadMore);
    }

    this.loadMore = (e) => {
        e.preventDefault();
        const url = new URL(window.location);
        const page = parseInt(url.searchParams.get('page')) || 1;
        const cat = url.searchParams.get('cat') || 'all';

        $.ajax({
            url: self.mainSettings.ajax_url,
            data: {
                action: action,
                cat: cat || 'all',
                page: page + 1,
            },
            type: 'POST',
            beforeSend: function(){

            },
            success: function( data ) {
                if (data) {
                    self.loadMoreBtn.remove();
                    self.loadMoreBtn = null;
                    self.contentWrap.append(data);
                    if (typeof parent.modals === 'function') {
                        parent.modals();
                    }

                    self.setPageUrl(page + 1);
                }
                self.loadMoreBtn = self.filtersWrap.find('.more-btn');
                self.setLoadMoreBtn();
            }
        });
    }

    this.init = () => {
        this.categoriesSlider();
        this.select2Filters();
        this.filtersShowBtn.on('click', self.toggleFilters);
        this.select2Categories();
        this.setLoadMoreBtn();

        if (this.currentWidth !== 'mobile') {
            this.categories.each(function () {
                $(this).on('click', function () {
                    const currentCat = $(this).data('cat');
                    self.filterHandler(currentCat, $(this));
                });
            });
        }

        this.showFilters($(this.filtersWrap));
        this.showFilters($(this.categoriesWrap));
    }
}