<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package faces
 */

get_header();
?>
<div class="err-404">
    <main class="container flex flex-col align-center justify-center">
        <p class="color-primary pos-r text-center font-tenor mx-auto width-fit-content err-404__caption">
            <?php esc_html_e('oops!', 'faces'); ?>
        </p>
        <p class="font-tenor err-404__text">
            <span class="color-primary">404. </span>
            <?php esc_html_e('Страница не найдена', 'faces'); ?>
        </p>
        <p class="text-center text-22 line-height144 sm-text-12 err-404__note">
            <?php echo __('Проверьте, правильно ли вы ввели адрес. Правильно?<br>Тогда, возможно, на сайте идут технические работы. Обновите страницу через пару минут.'); ?>
        </p>
        <a href="<?php echo esc_url(get_home_url(), 'faces'); ?>" class="pos-r font-tenor err-404__link">
            <?php esc_html_e('Перейти на главную', 'faces'); ?>
        </a>
    </main>
</div>
