'use strict';

import {FiltersBloggersClass} from "./filtersBloggers";

export const bloggersPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.filters = new FiltersBloggersClass($, this.mainSettings, this, 'ajax_bloggers');

    this.init = () => {
        this.filters.init();
    }
}