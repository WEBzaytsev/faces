!function(t){var e={};function i(s){if(e[s])return e[s].exports;var n=e[s]={i:s,l:!1,exports:{}};return t[s].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=t,i.c=e,i.d=function(t,e,s){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:s})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var s=Object.create(null);if(i.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)i.d(s,n,function(e){return t[e]}.bind(null,n));return s},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=0)}([function(t,e,i){"use strict";i.r(e);const s=function(t,e,i){const s=this;this.form=i.modalWrap.find("form"),this.lang=document.documentElement.lang.includes("en")?"en":"ru",this.thankYouModal=t(".thank-you"),this.checkboxes=this.form.find('input[type="checkbox"]'),this.checkboxHandler=function(){t(this).prop("checked")&&(s.checkboxes.each((function(){t(this).prop("checked")&&t(this).prop("checked",!1)})),t(this).prop("checked",!0))},this.init=()=>{!function(){var t=document.querySelectorAll("input[data-tel-input]"),e=function(t){return t.value.replace(/\D/g,"")},i=function(t){var i=t.target,s=e(i),n=t.clipboardData||window.clipboardData;if(n){var o=n.getData("Text");if(/\D/g.test(o))return void(i.value=s)}},s=function(t){var i=t.target,s=e(i),n=i.selectionStart,o="";if(!s)return i.value="";if(i.value.length==n){if(["7","8","9"].indexOf(s[0])>-1){"9"==s[0]&&(s="7"+s);var a="8"==s[0]?"8":"+7";o=i.value=a+" ",s.length>1&&(o+="("+s.substring(1,4)),s.length>=5&&(o+=") "+s.substring(4,7)),s.length>=8&&(o+="-"+s.substring(7,9)),s.length>=10&&(o+="-"+s.substring(9,11))}else o="+"+s.substring(0,16);i.value=o}else t.data&&/\D/g.test(t.data)&&(i.value=s)},n=function(t){var e=t.target.value.replace(/\D/g,"");8==t.keyCode&&1==e.length&&(t.target.value="")};for(var o of t)o.addEventListener("keydown",n),o.addEventListener("input",s,!1),o.addEventListener("paste",i,!1)}(),this.checkboxes.each((function(){t(this).on("change",s.checkboxHandler)})),this.thankYouModal.on("click",(function(e){const i=e.target;!0===t(i).data("close")&&t(this).removeClass("active")})),this.form.validate({ignore:[],errorClass:"error",validClass:"success",rules:{user_name:{required:!0},user_phone:{required:!0},user_email:{required:!0,user_email:!0},kind:{required:!0}},errorElement:"span",errorPlacement:function(e,i){const s=t(i).data("error");s?t(s).append(e):"checkbox"===i.attr("type")?i.parent().parent().append(e):e.insertBefore(i)},beforeSend:function(){},submitHandler:function(){const t=s.form.get(0),e=t.action,n=t.method;fetch(e,{method:n,body:new FormData(t)}).then(e=>{e.ok&&(t.reset(),i.modalWrap.find("[data-close]").trigger("click"),s.thankYouModal.addClass("active"))})}}),t.validator.addMethod("user_email",(function(t,e){return this.optional(e)||/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/.test(t)})),jQuery.extend(jQuery.validator.messages,{required:"en"===this.lang?"This field is required*":"Это поле обязательно для заполнения*",user_email:"en"===this.lang?"Invalid email":"Некорректный e-mail"})}},n=function(t,e,i){const n=this;this.element=i||null,this.mainSettings=e,this.modalType=t(this.element).data("modal"),this.postId=t(this.element).data("case")||0,this.modalWrap=t(".modal."+this.modalType),this.currentModal=null,this.form=null,this.video=document.querySelector("video")||null,this.showModal=()=>{n.currentModal||n.getModal().then(()=>{n.form||(n.form=new s(t,e,n),n.form.init())}),n.modalWrap.addClass("active"),t("body").addClass("no-scrolling"),n.video&&n.playVideo()},this.playVideo=()=>{n.video.paused&&n.video.play()},this.pauseVideo=()=>{n.video.paused||n.video.pause()},this.closeModal=e=>{const i=e.target;t(i).data("close")&&(n.modalWrap.hasClass("active")&&n.modalWrap.removeClass("active"),"case"===n.modalType&&n.removeModalContent(),n.video&&n.pauseVideo(),t("body").hasClass("no-scrolling")&&t("body").removeClass("no-scrolling"))},this.getModal=async()=>{try{await t.ajax({url:n.mainSettings.ajax_url,data:{action:"ajax_modal",modal:n.modalType,case_:n.postId},type:"POST",beforeSend:function(e){n.modalWrap.addClass("active"),t("body").addClass("no-scrolling")},success:function(e){return n.modalWrap.html(e),t("body").on("click",n.closeModal),n.currentModal=t(".modal-window."+n.modalType),!0}})}catch(t){return!1}},this.removeModalContent=()=>{n.modalWrap.html(""),n.currentModal=null},this.init=()=>{this.element&&("video"===this.modalType&&(this.modalWrap.on("click",this.closeModal),this.currentModal=t(".modal-window.video-modal")),this.element.on("click",this.showModal))}};function o(){const t=document.documentElement.clientWidth;return 767>t?"mobile":992>t?"tablet":"desktop"}const a=t=>{const e=t.getBoundingClientRect(),i=document.body,s=document.documentElement,n=window.pageYOffset||s.scrollTop||i.scrollTop,o=window.pageXOffset||s.scrollLeft||i.scrollLeft,a=s.clientTop||i.clientTop||0,l=s.clientLeft||i.clientLeft||0,r=e.top+n-a,c=e.left+o-l;return{top:Math.round(r),left:Math.round(c)}};const l=function(t,e,i,s){const n=this;this.mainSettings=e,this.filtersWrap=t(".filters"),this.filters=this.filtersWrap.find(".filters__item"),this.activeFilter=this.filtersWrap.find(".filters__item.active"),this.blockFilters=!1,this.contentWrap=t(".posts-content__inner"),this.currentWidth=o(),this.filtersShowBtn=t(".filter-icon"),this.selectField=this.filtersWrap.find(".filters-select"),this.loadMoreBtn=this.contentWrap.find(".more-btn"),this.filterSlider=()=>{"mobile"===n.currentWidth||n.filters.length<4||(n.filtersWrap.hasClass("flex")&&n.filtersWrap.removeClass("flex"),this.filtersWrap.slick({slidesToShow:4,variableWidth:!0,infinite:!1,swipeToSlide:!0,cssEase:"linear",prevArrow:"",nextArrow:"",outerEdgeLimit:!1}))},this.filterHandler=function(t="all",e=null){n.blockFilters||e&&e.hasClass("active")||("mobile"!==n.currentWidth&&n.switchActiveFilter(e),n.getCases(t),n.setCatUrl(t),n.setPageUrl(1))},this.setCatUrl=t=>{const e=new URL(window.location);e.searchParams.set("cat",t),window.history.pushState(null,document.title,e)},this.setPageUrl=t=>{const e=new URL(window.location);e.searchParams.set("page",t),window.history.pushState(null,document.title,e)},this.switchActiveFilter=t=>{n.activeFilter.removeClass("active"),n.activeFilter=t,n.activeFilter.addClass("active")},this.getCases=e=>{t.ajax({url:n.mainSettings.ajax_url,data:{action:s,cat:e||"all"},type:"POST",beforeSend:function(){n.blockFilters=!0,n.contentWrap.html('<div class="loader active">\n                            <div class="loader-inner">\n                                <div class="loader-animate">\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                </div>\n                            </div>\n                        </div>')},success:function(t){t&&(n.contentWrap.html(t),"function"==typeof i.modals&&i.modals(),n.setLoadMoreBtn()),n.blockFilters=!1}})},this.showFilters=()=>{n.filtersWrap.hasClass("none")&&n.filtersWrap.removeClass("none"),setTimeout(()=>{n.filtersWrap.hasClass("opacity-0")&&n.filtersWrap.removeClass("opacity-0"),n.filtersWrap.hasClass("z--100")&&n.filtersWrap.removeClass("z--100")},100)},this.hideFilters=()=>{n.filtersWrap.addClass("opacity-0"),n.filtersWrap.addClass("z--100"),setTimeout(()=>{n.filtersWrap.addClass("none")},350)},this.toggleFilters=()=>{n.filtersShowBtn.hasClass("active")?n.hideFilters():n.showFilters(),n.filtersShowBtn.toggleClass("active")},this.select2Filters=()=>{"mobile"===n.currentWidth&&t(n.selectField).select2({minimumResultsForSearch:1/0,dropdownParent:t(n.filtersWrap)}).on("select2:select",(function(){n.filterHandler(t(this).val())}))},this.setLoadMoreBtn=()=>{n.loadMoreBtn=n.contentWrap.find(".more-btn"),n.loadMoreBtn.length&&n.loadMoreBtn.on("click",n.loadMore)},this.loadMore=e=>{e.preventDefault();const o=new URL(window.location),a=parseInt(o.searchParams.get("page"))||1,l=o.searchParams.get("cat")||"all";t.ajax({url:n.mainSettings.ajax_url,data:{action:s,cat:l||"all",page:a+1},type:"POST",beforeSend:function(){},success:function(t){t&&(n.loadMoreBtn.remove(),n.loadMoreBtn=null,n.contentWrap.append(t),"function"==typeof i.modals&&i.modals(),n.setPageUrl(a+1)),n.loadMoreBtn=n.filtersWrap.find(".more-btn"),n.setLoadMoreBtn()}})},this.init=()=>{this.filterSlider(),this.select2Filters(),this.setLoadMoreBtn(),this.filtersShowBtn.on("click",this.toggleFilters),"mobile"!==this.currentWidth&&(this.filters.each((function(){t(this).on("click",(function(){const e=t(this).data("cat");n.filterHandler(e,t(this))}))})),this.showFilters())}},r=function(t,e){this.mainSettings=e,this.filters=new l(t,this.mainSettings,this,"ajax_cases"),this.modals=()=>{const i=t('[data-modal="case"]');i.length&&i.each((function(){new n(t,e,t(this)).init()}))},this.init=()=>{this.filters.init()}},c=function(t,e){const i=this;this.currentWidth=o(),this.lastBlock=t(".last-block"),this.lastBlockContent=t(".last-block__wrap"),this.lastBlockContentTop=null,this.lastBlockContentBottom=null,this.lastBlockAnimationOffsetTop="mobile"===i.currentWidth?0:200,this.lastBlockAnimationOffsetBottom="mobile"===i.currentWidth?90:121,this.cases=t(".cases"),this.partners=t(".partners__list"),this.bloggers=t(".our-bloggers__wrap"),this.casesTop=this.cases.offset().top,this.casesBottom=this.cases.offset().top+this.cases.outerHeight(),this.toCasesButton=t(".first-section__cases"),this.toBloggersButton=t(".our-bloggers__scroll-btn"),this.toPartnersButton=t(".partners__title"),this.videoPlayBtn=t(".first-section__circle_play"),this.videoModal=new n(t,e,this.videoPlayBtn),this.sLetter=t(".home-page .first-section .page-title_s span.s"),this.setCoords=()=>{i.lastBlockContentTop=i.lastBlockContent.offset().top,i.lastBlockContentBottom=i.lastBlockContent.offset().top+i.lastBlockContent.outerHeight(!1)},this.sLetterAnimation=()=>{if(!i.sLetter.length)return;const t=a(i.sLetter.get(0)),e=i.sLetter.clone().appendTo(".wrapper"),s="mobile"===i.currentWidth?91:121;e.css("top",t.top-s),e.css("left",t.left)},this.lastBlockAnimation=()=>{const t=window.pageYOffset;t+window.innerHeight>i.lastBlockContentTop-i.lastBlockAnimationOffsetTop&&t<i.lastBlockContentBottom-i.lastBlockAnimationOffsetBottom?i.lastBlock.addClass("active"):i.lastBlock.hasClass("active")&&i.lastBlock.removeClass("active")},this.bloggersSlider=()=>{"mobile"===i.currentWidth&&i.bloggers.length&&i.bloggers.slick({slidesToShow:1,infinite:!0,slidesToScroll:1,prevArrow:"",nextArrow:""})},this.casesSlider=()=>{if(!i.cases.length)return;let e=!1;i.cases.slick({slidesToShow:2,infinite:!1,variableWidth:!0,prevArrow:"",nextArrow:"",outerEdgeLimit:!1,responsive:[{breakpoint:1e3,settings:{slidesToShow:1}}]}),i.cases.on("afterChange",(function(t,e,i,s){})),t(window).on("scroll",(function(){window.pageYOffset>i.casesTop-500?e||(i.cases.slick("slickNext"),e=!e):e&&(i.cases.slick("slickPrev"),e=!e)}))},this.partnersSlider=()=>{i.partners.length&&(document.documentElement.clientWidth<1250||"mobile"!==i.currentWidth&&i.partners.slick({variableWidth:!0,infinite:!0,pauseOnHover:!1,pauseOnFocus:!1,cssEase:"linear",autoplay:!0,speed:4e3,autoplaySpeed:0,prevArrow:"",nextArrow:""}))},this.videoPlayModal=()=>{i.videoPlayBtn.length&&i.videoModal.init()},this.init=()=>{this.partnersSlider(),this.casesSlider(),this.bloggersSlider(),this.lastBlockAnimation(),this.videoPlayModal(),this.sLetterAnimation();const e="mobile"===this.currentWidth?1500:500;setTimeout(this.setCoords,e),this.toCasesButton.on("click",(function(){t([document.documentElement,document.body]).animate({scrollTop:i.cases.offset().top})})),"mobile"===this.currentWidth&&(this.toBloggersButton.on("click",(function(){t([document.documentElement,document.body]).animate({scrollTop:i.bloggers.offset().top-120})})),this.toPartnersButton.on("click",(function(){t([document.documentElement,document.body]).animate({scrollTop:i.partners.offset().top-120})}))),t(window).on("scroll",this.lastBlockAnimation)}},d=function(t,e,i,s){const n=this;this.mainSettings=e,this.filtersWrap=t(".bloggers__filters"),this.advancedFiltersWrap=t(".bloggers__filters_bottom"),this.categoriesWrap=this.filtersWrap.find(".filters"),this.categories=this.categoriesWrap.children(),this.selectCategorieField=this.filtersWrap.find(".filters-select"),this.activeFilter=this.filtersWrap.find(".filters__item.active"),this.selectFilters=this.filtersWrap.find(".select"),this.blockFilters=!1,this.contentWrap=t(".posts-content__inner"),this.currentWidth=o(),this.filtersShowBtn=t(".filter-icon"),this.loadMoreBtn=this.contentWrap.find(".more-btn"),this.categoriesSlider=()=>{"mobile"===n.currentWidth||n.categories.length<4||(n.categoriesWrap.hasClass("flex")&&n.categoriesWrap.removeClass("flex"),this.categoriesWrap.slick({slidesToShow:4,variableWidth:!0,infinite:!1,swipeToSlide:!0,cssEase:"linear",prevArrow:"",nextArrow:"",outerEdgeLimit:!1}))},this.filterHandler=function(t="all",e=null){n.blockFilters||e&&e.hasClass("active")||("mobile"!==n.currentWidth&&n.switchActiveFilter(e),n.getBloggers(t),n.setCatUrl(t),n.setPageUrl(1))},this.setCatUrl=t=>{const e=new URL(window.location);e.searchParams.set("cat",t),window.history.pushState(null,document.title,e)},this.setPageUrl=t=>{const e=new URL(window.location);e.searchParams.set("page",t),window.history.pushState(null,document.title,e)},this.switchActiveFilter=t=>{n.activeFilter.removeClass("active"),n.activeFilter=t,n.activeFilter.addClass("active")},this.getBloggers=e=>{t.ajax({url:n.mainSettings.ajax_url,data:{action:s,cat:e||"all"},type:"POST",beforeSend:function(){n.blockFilters=!0,n.contentWrap.html('<div class="loader active">\n                            <div class="loader-inner">\n                                <div class="loader-animate">\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                    <div></div>\n                                </div>\n                            </div>\n                        </div>')},success:function(t){t&&(n.contentWrap.html(t),"function"==typeof i.modals&&i.modals(),n.setLoadMoreBtn()),n.blockFilters=!1}})},this.showFilters=t=>{t.hasClass("none")&&t.removeClass("none"),setTimeout(()=>{t.hasClass("opacity-0")&&t.removeClass("opacity-0"),t.hasClass("z--100")&&t.removeClass("z--100")},100)},this.hideFilters=t=>{t.addClass("opacity-0"),t.addClass("z--100"),setTimeout(()=>{t.addClass("none")},350)},this.toggleFilters=()=>{n.filtersShowBtn.hasClass("active")?(n.hideFilters(t(n.advancedFiltersWrap)),"mobile"===n.currentWidth&&n.hideFilters(t(n.categoriesWrap))):(n.showFilters(t(n.advancedFiltersWrap)),"mobile"===n.currentWidth&&n.showFilters(t(n.categoriesWrap))),n.filtersShowBtn.toggleClass("active")},this.select2Filters=()=>{n.selectFilters.each((function(){t(this).select2({minimumResultsForSearch:1/0,dropdownParent:t(this).parent()}).on("select2:select",(function(){}))}))},this.select2Categories=()=>{"mobile"===n.currentWidth&&t(n.selectCategorieField).select2({minimumResultsForSearch:1/0,dropdownParent:t(n.filtersWrap)}).on("select2:select",(function(){n.filterHandler(t(this).val())}))},this.setLoadMoreBtn=()=>{n.loadMoreBtn=n.contentWrap.find(".more-btn"),n.loadMoreBtn.length&&n.loadMoreBtn.on("click",n.loadMore)},this.loadMore=e=>{e.preventDefault();const o=new URL(window.location),a=parseInt(o.searchParams.get("page"))||1,l=o.searchParams.get("cat")||"all";t.ajax({url:n.mainSettings.ajax_url,data:{action:s,cat:l||"all",page:a+1},type:"POST",beforeSend:function(){},success:function(t){t&&(n.loadMoreBtn.remove(),n.loadMoreBtn=null,n.contentWrap.append(t),"function"==typeof i.modals&&i.modals(),n.setPageUrl(a+1)),n.loadMoreBtn=n.filtersWrap.find(".more-btn"),n.setLoadMoreBtn()}})},this.init=()=>{this.categoriesSlider(),this.select2Filters(),this.filtersShowBtn.on("click",n.toggleFilters),this.select2Categories(),this.setLoadMoreBtn(),"mobile"!==this.currentWidth&&this.categories.each((function(){t(this).on("click",(function(){const e=t(this).data("cat");n.filterHandler(e,t(this))}))})),this.showFilters(t(this.filtersWrap)),this.showFilters(t(this.categoriesWrap))}},h=function(t,e){this.mainSettings=e,this.filters=new d(t,this.mainSettings,this,"ajax_bloggers"),this.init=()=>{this.filters.init()}},u=function(t,e){const i=this;this.mainSettings=e,this.runline=t(".about-page__virtual-tour"),this.answerLetter=t("span.answer"),this.answerAnimation=()=>{if(!i.answerLetter.length)return;const t=a(i.answerLetter.get(0)),e=i.answerLetter.clone().appendTo(".wrapper"),s="mobile"===i.currentWidth?91:121;e.css("top",t.top-s),e.css("left",t.left)},this.runlineSlider=()=>{i.runline.length&&i.runline.slick({variableWidth:!0,infinite:!0,pauseOnHover:!1,pauseOnFocus:!1,cssEase:"linear",autoplay:!0,speed:4e3,autoplaySpeed:0,prevArrow:"",nextArrow:""})},this.init=()=>{this.runlineSlider(),setTimeout(this.answerAnimation,1e3)}},f=js_settings,p=jQuery;p(document).ready((function(){var t;(t=p(".mob-menu-btn")).on("click",()=>{t.parent().toggleClass("active"),jQuery(".mob-menu-bg").toggleClass("active"),jQuery(".header").toggleClass("active"),jQuery("body").toggleClass("no-scrolling")});let e=null;switch(f.current_page){case"home":e=new c(p,f);break;case"cases":e=new r(p,f);break;case"bloggers":e=new h(p,f);break;case"about":e=new u(p,f)}e&&e.init();const i=p("[data-modal]");i.length&&i.each((function(){new n(p,f,p(this)).init()}))}))}]);