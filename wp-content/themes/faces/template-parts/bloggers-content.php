<?php
$category = $args['cat'] == 'all' ? '' : $args['cat'];

$options = array(
    'post_type' => 'bloggers',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'bloggers_cat' => $category,
);

$posts = query_posts($options); ?>

<?php if (have_posts()) : ?>
    <div class="flex flex-wrap justify-between">
        <?php while (have_posts()) : the_post();

            $post_id = $post->ID; ?>

            <div class="hidden blogger pos-r">
                <figure class="hidden flex-center pos-r z-1 blogger__img"
                        style="background-image: url('<?php esc_attr_e(get_field('img')['url'], 'faces'); ?>');">
                    <img src="<?php esc_attr_e(get_field('img')['url'], 'faces'); ?>"
                         class="none"
                         loading="lazy"
                         alt="img">
                </figure>
                <p class="text-center text-20 pos-r z-2 line-height-21 blogger__desc">
                    <?php esc_html_e(get_field('description')); ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p class="empty">Ничего не найдено</p>
<?php endif; ?>
