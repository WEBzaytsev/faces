<?php
$category = $args['cat'] == 'all' ? '' : $args['cat'];
$page = $args['page'] ?? 1;

$options = array(
    'post_type' => 'bloggers',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'paged' => $page,
    'bloggers_cat' => $category,
);

$posts = query_posts($options); ?>

<?php if (have_posts()) :
    $i = 1; ?>
    <?php while (have_posts()) : the_post();

    $post_id = $post->ID;
    $nickname = get_field('nickname');
    $img_url = get_field('photo')['url'];
    $blogger_name = $post->post_title;
    $description = get_field('description');
    $socials = get_field('socials');
    $bg_color = '';
    ?>

    <div class="transition blogger">
        <div class="pos-r transition blogger__inner">
            <div class="pos-r z-2 blogger__inner_top">
                <span class="pos-a z-2 ws-nowrap text-18 line-height-21 absolute-center-x opacity-0 z--100 blogger__inner_btn"
                      data-modal="work-offer"><?php esc_html_e('хочу этого блогера', 'faces'); ?></span>
                <div class="<?php esc_attr_e(sprintf('pos-a full-width bottom-0 z-0 blogger__inner_bg %s', $bg_color), 'faces'); ?>"></div>
                <figure class="pos-r z-1 blogger__inner_img">
                    <?php if ($img_url) : ?>
                        <img src="<?php esc_attr_e($img_url, 'faces'); ?>"
                             loading="lazy"
                             class="block"
                             alt="img">
                    <?php endif; ?>
                </figure>
                <?php if (isset($nickname)) : ?>
                    <span class="pos-a full-width blogger__inner_nickname">
                            <?php esc_html_e($nickname, 'faces'); ?>
                        </span>
                <?php endif; ?>
            </div>
            <div class="pos-r z-1 transition blogger__inner_bottom">
                <?php if (isset($blogger_name)) : ?>
                    <p class="text-center color-primary blogger__inner_name text-40 line-height-48 large-text-24 sm-text-20 large-line-height-28 sm-line-height-23">
                        <?php esc_html_e($blogger_name, 'faces'); ?>
                    </p>
                <?php endif;
                if (isset($description)) : ?>
                    <p class="text-center text-18 sm-text-14 line-height-21 sm-line-height-16 blogger__inner_desc">
                        <?php esc_html_e($description, 'faces'); ?>
                    </p>
                <?php endif;
                if ($socials) : ?>
                    <div class="flex-center pos-a blogger__inner_socials">
                        <?php foreach ($socials as $social) : ?>
                            <a href="<?php echo esc_url($social['link'], 'faces'); ?>"
                               class="blogger__inner_social"><?php get_template_part('/vector-images/' . $social['kind'] . '-icon'); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $i++;
endwhile; ?>

    <?php if (count($posts) == 6) : ?>
    <div class="full-width">
        <a href="#"
           class="font-tenor width-fit-content mx-auto ws-nowrap transition block pos-r line-height-1 text-45 md-text-25 more-btn"><?php esc_html_e('Больше блогеров', 'faves'); ?></a>
    </div>
<?php endif; ?>
<?php else : ?>
    <p class="empty">Ничего не найдено</p>
<?php endif; ?>
