<?php
$category = $args['cat'] == 'all' ? '' : $args['cat'];
$page = $args['page'] ?? 1;

$options = array(
    'post_type' => 'cases',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'cases_cat' => $category,
    'paged' => $page,
);

$posts = query_posts($options);

$current_category = null;

if ($category != '') {
    $current_category = get_terms([
        'taxonomy' => 'cases_cat',
        'slug' => $category,
    ]);
}

$category_id = null;
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) :
        the_post();

        $post_id = $post->ID;

        if (isset($current_category)) {
            $category_id = $current_category[0]->term_id;
        } else {
            $current_cat = get_the_terms($post_id, 'cases_cat');
            if ($current_cat) {
                $category_id = $current_cat[0]->term_id;
            }
        }

        $category_img_url = get_field('img', 'cases_cat_' . $category_id)['url']; ?>

        <div class="hidden transition case pos-r pointer"
             data-modal="case" data-case="<?php esc_attr_e($post_id, 'faces'); ?>">
            <div class="pos-a z-2 case__cat">
                <div class="pos-r z-2 full-width h-100 case__cat_img"
                     style="background-image:url('<?php echo esc_url($category_img_url, 'faces'); ?>');"></div>
            </div>
            <figure class="hidden flex-center pos-r z-1 case__img"
                    style="background-image: url('<?php esc_attr_e(get_field('img')['url'], 'faces'); ?>');">
                <img src="<?php esc_attr_e(get_field('img')['url'], 'faces'); ?>"
                     class="none"
                     loading="lazy"
                     alt="img">
            </figure>
            <p class="text-center text-16 sm-text-12 pos-r z-2 line-height-21 sm-line-height-14 case__desc">
                <?php echo __(get_field('description')); ?>
            </p>
        </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
    <?php if (count($posts) == 6) : ?>
        <div class="grid-col-full-w">
            <a href="#"
               class="font-tenor width-fit-content mx-auto ws-nowrap transition block pos-r line-height-1 text-40 md-text-25 more-btn"><?php esc_html_e('Больше кейсов', 'faves'); ?></a>
        </div>
    <?php endif; ?>
<?php else : ?>
    <p class="empty">Ничего не найдено</p>
<?php endif; ?>
