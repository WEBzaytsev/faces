'use strict';

import {modalWindow} from "../modalWindow";

export const casesPage = function ($, settings) {
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
            url : self.mainSettings.ajax_url,
            data : {
                action: 'ajax_cases',
                cat: cat || 'all',
            },
            type : 'POST',
            beforeSend : function( xhr ){
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
            success : function( data ) {
                if (data) {
                    self.contentWrap.html(data);
                    self.modals();
                }
                self.blockFilters = false;
            }
        });
    }

    this.modals = () => {
        const modalBtns = $('[data-modal="case"]');

        if (modalBtns.length) {
            modalBtns.each(function () {
                const modals = new modalWindow($, settings, $(this));
                modals.init();
            })
        }
    }

    this.init = () => {
        this.filters.each(function () {
            $(this).on('click', self.filterHandler);
        })
    }
}