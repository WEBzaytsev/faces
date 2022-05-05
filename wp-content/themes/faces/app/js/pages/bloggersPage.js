'use strict';

import {FiltersClass} from "./filters";

export const bloggersPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.filters = new FiltersClass($, this.mainSettings, this, 'ajax_bloggers');

    this.init = () => {
        this.filters.init();
    }
}