'use strict';

const settings = js_settings;

const $ = jQuery;

import {mobileMenu} from "./commonFunctions";
import {homePage} from "./pages/homePage";

$(document).ready(function () {

    console.log()

    mobileMenu($('.mob-menu-btn'));

    let pageClass;

    switch (settings.current_page) {
        case 'home':
            pageClass = new homePage($);
            break;
    }

    pageClass.init();

});