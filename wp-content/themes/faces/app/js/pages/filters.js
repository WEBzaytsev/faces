'use strict';

import {modalWindow} from "../modalWindow";

export const FiltersClass = function ($, settings, parent, action) {
    const self = this;
    this.mainSettings = settings;
    this.filters = $('.filters__item');
    this.activeFilter = $('.filters__item.active');
    this.blockFilters = false;
    this.contentWrap = $('.posts-content');

    this.filterHandler = function () {

        if (self.blockFilters) {
            return;
        }

        if ($(this).hasClass('active')) {
            return;
        }

        const currentCat = $(this).data('cat') || 'all';

        self.switchActiveFilter($(this));
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
            beforeSend: function( xhr ){
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

    this.init = () => {
        this.filters.each(function () {
            $(this).on('click', self.filterHandler);
        })
    }
}