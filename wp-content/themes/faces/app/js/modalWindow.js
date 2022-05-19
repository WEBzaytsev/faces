'use strict';

import {formClass} from "./formClass";

export const modalWindow = function ($, settings, elem) {
    const self = this;
    this.element = elem || null;
    this.mainSettings = settings;
    this.modalType = $(this.element).data('modal');
    this.postId = $(this.element).data('case') || 0;
    this.modalWrap = $(`.modal.${this.modalType}`);
    this.currentModal = null;
    this.form = null;
    this.video = this.modalWrap.find('video').get(0) || null;

    this.showModal = () => {
        if (!self.currentModal) {
            self.getModal()
                .then(() => {
                    if (self.form) {
                        return;
                    }

                    self.form = new formClass($, settings, self);
                    self.form.init();
                });
        }

        self.modalWrap.addClass('active');
        $('body').addClass('no-scrolling');

        if (self.video) {
            self.playVideo();
        }
    }

    this.playVideo = () => {
        if (self.video.paused) {
            self.video.play();
        }
    }

    this.pauseVideo = () => {
        if (self.video.paused) {
            return;
        }

        self.video.pause();
    }

    this.closeModal = (e) => {
        const target = e.target;
        if (!$(target).data('close')) {
            return;
        }

        if (self.modalWrap.hasClass('active')) {
            self.modalWrap.removeClass('active');
        }
        if (self.modalType === 'case') {
            self.removeModalContent();
        }
        if (self.video) {
            self.pauseVideo();
        }
        if ($('body').hasClass('no-scrolling')) {
            $('body').removeClass('no-scrolling');
        }
    }

    this.getModal = async () => {
        try {
            await $.ajax({
                url : self.mainSettings.ajax_url,
                data : {
                    action: 'ajax_modal',
                    modal: self.modalType,
                    case_: self.postId,
                },
                type : 'POST',
                beforeSend : function( xhr ){
                    self.modalWrap.addClass('active');
                    $('body').addClass('no-scrolling');
                },
                success : function( data ) {
                    self.modalWrap.html(data);
                    $('body').on('click', self.closeModal);
                    self.currentModal = $(`.modal-window.${self.modalType}`);
                    return true;
                }
            });
        } catch (e) {
            return false;
        }
    }

    this.removeModalContent = () => {
        self.modalWrap.html('');
        self.currentModal = null
    }

    this.init = () => {
        if (!this.element) {
            return;
        }

        if (this.modalType === 'video') {
            this.modalWrap.on('click', this.closeModal);
            this.currentModal = $('.modal-window.video-modal');
        }

        this.element.on('click', this.showModal);
    }
}