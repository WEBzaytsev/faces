'use strict';

import {FiltersBloggersClass} from "./filtersBloggers";
import {modalWindow} from "../modalWindow";

export const bloggersPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.filters = new FiltersBloggersClass($, this.mainSettings, this, 'ajax_bloggers');

    this.modals = () => {
        const modalBtns = $('[data-modal="work-offer"]');

        if (modalBtns.length) {
            modalBtns.each(function () {
                const modals = new modalWindow($, settings, $(this));
                modals.init();
            })
        }
    }

    this.init = () => {
        this.filters.init();
    }
}