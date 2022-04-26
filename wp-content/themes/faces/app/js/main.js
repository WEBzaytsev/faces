jQuery(document).ready(() => {

    (function ($) {
        const langs = [...document.querySelectorAll('.header__langs_item')];

        langs.forEach(l => l.addEventListener('click', switchLangs));

        function switchLangs(e) {
            e.preventDefault();
            langs.forEach(l => {
                l.classList.toggle('active');
            })
        }
    })(jQuery);
});