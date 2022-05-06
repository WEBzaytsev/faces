<?php
$category_slug = $args['slug'];
$current_cat = $_GET['cat'] ?? 'all';

$categories = get_terms($category_slug . '_cat', [
    'hide_empty' => true,
    'order' => 'DESC',
]);

$all_cats = $category_slug == 'cases' ? 'кейсы' : 'блогеры';

if (isset($categories)) : ?>

    <div class="flex align-center pos-r filters transition none opacity-0 z--100 sm-full-width">
        <?php if (wp_is_mobile()) : ?>
            <select class="none sm-block filters-select">
                <option value="all">
                    <?php esc_html_e(sprintf('Все %s', $all_cats), 'faces'); ?>
                </option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php esc_attr_e($category->slug, 'faces'); ?>">
                        <?php esc_html_e($category->name, 'faces'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php else : ?>
            <span class="pointer unselect text-center text-18 line-height-21 transition filters__item<?php esc_attr_e($current_cat == 'all' ? ' active' : ''); ?> sm-none"
                  data-cat="all"><?php esc_html_e(sprintf('Все %s', $all_cats), 'faces'); ?></span>
            <?php foreach ($categories as $category) : ?>
                <span class="pointer unselect text-center text-18 line-height-21 transition filters__item<?php esc_attr_e($category->slug == $current_cat ? ' active' : ''); ?> sm-none"
                      data-cat="<?php esc_attr_e($category->slug, 'faces'); ?>"><?php esc_html_e($category->name, 'faces'); ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?php endif;
