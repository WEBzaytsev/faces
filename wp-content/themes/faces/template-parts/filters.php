<?php
$category_slug = $args['slug'];
$current_cat = $_GET['cat'] ?? 'all';

$categories = get_terms($category_slug . '_cat', [
    'hide_empty' => true,
    'order' => 'DESC',
]);

$all_cats = $category_slug == 'cases' ? 'кейсы' : 'блогеры';

if (isset($categories)) : ?>

<div class="flex align-center filters">
    <span class="pointer unselect text-center text-18 line-height-21 transition filters__item<?php esc_attr_e($current_cat == 'all' ? ' active' : ''); ?>"
          data-cat="">
        <?php esc_html_e(sprintf('Все %s', $all_cats), 'faces'); ?>
    </span>
    <?php foreach ($categories as $category) : ?>
    <span class="pointer unselect text-center text-18 line-height-21 transition filters__item<?php esc_attr_e($category->slug == $current_cat ? ' active' : ''); ?>"
          data-cat="<?php echo $category->slug; ?>">
        <?php esc_html_e($category->name, 'faces'); ?>
    </span>
    <?php endforeach; ?>
</div>

<?php endif;
