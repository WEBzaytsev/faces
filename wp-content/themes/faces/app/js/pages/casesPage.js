'use strict';

import {modalWindow} from "../modalWindow";
import {FiltersClass} from "./filters";

export const casesPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.filters = new FiltersClass($, this.mainSettings, this, 'ajax_cases');

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
        this.filters.init();
    }
}