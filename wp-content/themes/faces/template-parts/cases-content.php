<?php
$category = $args['cat'] == 'all' ? '' : $args['cat'];

$options = array(
    'post_type' => 'cases',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'cases_cat' => $category,
);

$posts = query_posts($options);

$current_category = null;

if ($category != '') {
    $current_category = get_terms([
        'taxonomy' => 'cases_cat',
        'slug' => $category,
    ]);
}
?>

<?php if (have_posts()) : ?>
    <div class="flex flex-wrap justify-between">
        <?php while (have_posts()) : the_post();

            $post_id = $post->ID;
            $category_id = null;
            if ($current_category) {
                $category_id = $current_category[0]->term_id;
            } else {
                $current_cat = get_the_terms($post, 'cases_cat');
                $category_id = $current_cat[0]->term_id;
            }

            $category_img_url = get_field('img', 'cases_cat_' . $category_id)['url']; ?>

            <div class="hidden case pos-r pointer"
                 data-modal="case" data-case="<?php esc_attr_e($post_id, 'faces'); ?>">
                <div class="pos-a z-2 case__cat">
                    <div class="pos-r z-2 full-width h-100 case__cat_img"
                         style="background-image:url('<?php esc_attr_e($category_img_url, 'faces'); ?>');"></div>
                </div>
                <figure class="hidden flex-center pos-r z-1 case__img"
                        style="background-image: url('<?php esc_attr_e(get_field('img')['url'], 'faces'); ?>');">
                    <img src="<?php esc_attr_e(get_field('img')['url'], 'faces'); ?>"
                         class="none"
                         loading="lazy"
                         alt="img">
                </figure>
                <p class="text-center text-20 pos-r z-2 line-height-21 case__desc">
                    <?php esc_html_e(get_field('description')); ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p class="empty">Ничего не найдено</p>
<?php endif; ?>
