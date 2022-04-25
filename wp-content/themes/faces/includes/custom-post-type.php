<?php
function bloggers_create_post_type() {
    $labels = array(
        'name' => __( 'bloggers' ),
        'singular_name' => __( 'Блогеры' ),
        'add_new' => __( 'Новый блогер' ),
        'add_new_item' => __( 'Добавить нового блогера' ),
        'edit_item' => __( 'Редактировать блогера' ),
        'new_item' => __( 'Новый блогер' ),
        'view_item' => __( 'Смотреть блогера' ),
        'search_items' => __( 'Искать блогера' ),
        'not_found'          => __('Не найдено'),
        'not_found_in_trash' => __( 'Не найдено в корзине' ),
        'parent_item_colon'  => __('dashicons-book-alt'),
        'menu_name'          => __('Блогеры'),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,

        'hierarchical' => true,
        'menu_position' => 5,
        'show_in_rest'       => true,
        'taxonomies' => array('bloggers_cat'),
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
        ),
    );
    register_post_type( 'bloggers', $args );
}

function cases_create_post_type() {
    $labels = array(
        'name' => __( 'cases' ),
        'singular_name' => __( 'Кейсы' ),
        'add_new' => __( 'Новый кейс' ),
        'add_new_item' => __( 'Добавить новый кейс' ),
        'edit_item' => __( 'Редактировать кейс' ),
        'new_item' => __( 'Новый кейс' ),
        'view_item' => __( 'Смотреть кейс' ),
        'search_items' => __( 'Искать кейс' ),
        'not_found'          => __('Не найдено'),
        'not_found_in_trash' => __( 'Не найдено в корзине' ),
        'parent_item_colon'  => __('dashicons-book-alt'),
        'menu_name'          => __('Кейсы'),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,

        'hierarchical' => true,
        'menu_position' => 5,
        'show_in_rest'       => true,
        'taxonomies' => array('cases_cat'),
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
        ),
    );
    register_post_type( 'cases', $args );
}