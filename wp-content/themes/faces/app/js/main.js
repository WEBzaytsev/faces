'use strict';

import {casesPage} from "./pages/casesPage";

const settings = js_settings;

const $ = jQuery;

import {mobileMenu} from "./commonFunctions";
import {homePage} from "./pages/homePage";
import {bloggersPage} from "./pages/bloggersPage";
import {aboutPage} from "./pages/aboutPage";
import {modalWindow} from "./modalWindow";
import {contactsPage} from "./pages/contactsPage";

$(document).ready(function () {

    mobileMenu($('.mob-menu-btn'));

    let pageClass = null;

    switch (settings.current_page) {
        case 'home':
            pageClass = new homePage($, settings);
            break;
        case 'cases':
            pageClass = new casesPage($, settings);
            break;
        case 'bloggers':
            pageClass = new bloggersPage($, settings);
            break;
        case 'about':
            pageClass = new aboutPage($, settings);
            break;
        case 'contacts':
            pageClass = new contactsPage($, settings);
            break;
    }

    if (pageClass) {
        pageClass.init();
    }

    const modalBtns = $('[data-modal]');

    if (modalBtns.length) {
        modalBtns.each(function () {
            const modals = new modalWindow($, settings, $(this));
            modals.init();
        })
    }

});