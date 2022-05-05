<?php
$category = $args['cat'] == 'all' ? '' : $args['cat'];

$options = array(
    'post_type' => 'bloggers',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'bloggers_cat' => $category,
);

$posts = query_posts($options); ?>

<?php if (have_posts()) :
    $i = 1; ?>
    <div class="flex flex-wrap justify-between">
        <?php while (have_posts()) : the_post();

            $post_id = $post->ID;
            $nickname = get_field('nickname');
            $img_url = get_field('photo')['url'];
            $blogger_name = $post->post_title;
            $description = get_field('description');
            $socials = get_field('socials');
            $bg_color = '';
            /*switch ($i) {
                case $i % 3 == 0:
                    $bg_color = 'pink';
                    break;
                case $i % 2 == 0:
                    $bg_color = 'pink';
                    break;
            }*/
            ?>

            <div class="transition blogger">
                <div class="pos-r transition blogger__inner">
                    <span class="pos-a z-2 transition text-18 line-height-21 absolute-center-x blogger__inner_btn"><?php esc_html_e('хочу этого блогера', 'faces'); ?></span>
                    <div class="pos-r z-1 blogger__inner_top">
                        <div class="<?php esc_attr_e(sprintf('pos-a full-width bottom-0 z-0 blogger__inner_bg %s', $bg_color), 'faces'); ?>"></div>
                        <figure class="pos-r z-1 blogger__inner_img">
                            <img src="<?php esc_attr_e($img_url, 'faces'); ?>"
                                 loading="lazy"
                                 class="block"
                                 alt="img">
                        </figure>
                        <?php if (isset($nickname)) : ?>
                            <span class="pos-a full-width blogger__inner_nickname">
                            <?php esc_html_e($nickname, 'faces'); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="pos-r z-1 transition blogger__inner_bottom">
                        <?php if (isset($blogger_name)) : ?>
                            <p class="text-center color-primary blogger__inner_name">
                                <?php esc_html_e($blogger_name, 'faces'); ?>
                            </p>
                        <?php endif;
                        if (isset($description)) : ?>
                            <p class="text-center text-18 line-height-21 blogger__inner_desc">
                                <?php esc_html_e($description, 'faces'); ?>
                            </p>
                        <?php endif;
                        if (isset($socials)) : ?>
                            <div class="flex-center pos-a blogger__inner_socials">
                                <?php if ($socials['tiktok'] != '') : ?>
                                    <a href="<?php echo esc_url($socials['tiktok'], 'faces'); ?>"
                                       class="blogger__inner_social"><?php get_template_part('/vector-images/tiktok-icon'); ?></a>
                                <?php endif;
                                if ($socials['telegram'] != '') : ?>
                                    <a href="<?php echo esc_url($socials['telegram'], 'faces'); ?>"
                                       class="blogger__inner_social"><?php get_template_part('/vector-images/telegram-icon'); ?></a>
                                <?php endif;
                                if ($socials['vk'] != '') : ?>
                                    <a href="<?php echo esc_url($socials['vk'], 'faces'); ?>"
                                       class="blogger__inner_social"><?php get_template_part('/vector-images/vk-icon'); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $i++;
        endwhile; ?>
    </div>
<?php else : ?>
    <p class="empty">Ничего не найдено</p>
<?php endif; ?>
