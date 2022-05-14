<?php
$category_slug = $args['slug'];
$is_mobile = wp_is_mobile();

$activities = get_terms([
    'taxonomy' => 'bloggers_act',
    'hide_empty' => false,
]);

$businesses = get_terms([
    'taxonomy' => 'bloggers_bus',
    'hide_empty' => false,
]);
?>

<div class="flex transition none opacity-0 z--100 pos-r bloggers__filters">
    <?php get_template_part('/vector-images/filters-icon', null, array(
        'is_display' => true,
        'is_absolute' => false,
    )); ?>
    <div class="full-width bloggers__filters_wrap">
        <?php get_template_part('/template-parts/filters', null, array(
            'slug' => $category_slug,
        )); ?>

        <div class="none transition opacity-0 z--100 bloggers__filters_bottom">
            <div class="flex align-start sm-block">
                <?php if (count($activities)) : ?>
                    <div class="select__wrap">
                        <select class="select">
                            <option value="all">Вид деятельности</option>
                            <?php foreach ($activities as $activity) : ?>
                                <option value="<?php esc_attr_e($activity->slug, 'faces'); ?>">
                                    <?php esc_html_e($activity->name, 'faces'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>
                <?php if (count($businesses)) : ?>
                    <div class="select__wrap">
                        <select class="select">
                            <option value="all">Сферы бизнеса</option>
                            <?php foreach ($businesses as $business) : ?>
                                <option value="<?php esc_attr_e($business->slug, 'faces'); ?>">
                                    <?php esc_html_e($business->name, 'faces'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
