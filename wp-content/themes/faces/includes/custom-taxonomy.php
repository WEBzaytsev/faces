<?php

function bloggers_register_taxonomy() {
    register_taxonomy( 'bloggers_cat', 'bloggers',
        array(
            'labels'                => [
                'name'              => 'Категории',
                'singular_name'     => 'Категория',
                'search_items'      => 'Искать категорию',
                'all_items'         => 'Все категории',
                'view_item'         => 'Просмотреть категории',
                'parent_item'       => 'Parent bloggers',
                'parent_item_colon' => 'Parent bloggers:',
                'edit_item'         => 'Редактировать категорию',
                'update_item'       => 'Обновить категорию',
                'add_new_item'      => 'Добавить категорию',
                'new_item_name'     => 'Название категории',
                'menu_name'         => 'Категории',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_in_rest'       => true,
            'show_admin_column' => true
        )
    );
}

function bloggers_register_taxonomy_business() {
    register_taxonomy( 'bloggers_bus', 'bloggers',
        array(
            'labels'                => [
                'name'              => 'Сферы бизнеса',
                'singular_name'     => 'Сфера бизнеса',
                'search_items'      => 'Искать сферу бизнеса',
                'all_items'         => 'Все сферы бизнеса',
                'view_item'         => 'Просмотреть сферу бизнеса',
                'parent_item'       => 'Parent bloggers',
                'parent_item_colon' => 'Parent bloggers:',
                'edit_item'         => 'Редактировать сферу бизнеса',
                'update_item'       => 'Обновить сферу бизнеса',
                'add_new_item'      => 'Добавить сферу бизнеса',
                'new_item_name'     => 'Название сферы бизнеса',
                'menu_name'         => 'Сферы бизнеса',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_in_rest'       => true,
            'show_admin_column' => true
        )
    );
}

function bloggers_register_taxonomy_activity() {
    register_taxonomy( 'bloggers_act', 'bloggers',
        array(
            'labels'                => [
                'name'              => 'Виды деятельности',
                'singular_name'     => 'Вид деятельности',
                'search_items'      => 'Искать вид деятельности',
                'all_items'         => 'Все виды деятельности',
                'view_item'         => 'Просмотреть виды деятельности',
                'parent_item'       => 'Parent bloggers',
                'parent_item_colon' => 'Parent bloggers:',
                'edit_item'         => 'Редактировать вид деятельности',
                'update_item'       => 'Обновить вид деятельности',
                'add_new_item'      => 'Добавить вид деятельности',
                'new_item_name'     => 'Название вида деятельности',
                'menu_name'         => 'Виды деятельности',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_in_rest'       => true,
            'show_admin_column' => true
        )
    );
}

function cases_register_taxonomy() {
    register_taxonomy( 'cases_cat', 'cases',
        array(
            'labels'                => [
                'name'              => 'Категории',
                'singular_name'     => 'Категория',
                'search_items'      => 'Искать категорию',
                'all_items'         => 'Все категории',
                'view_item'         => 'Просмотреть категории',
                'parent_item'       => 'Parent cases',
                'parent_item_colon' => 'Parent cases:',
                'edit_item'         => 'Редактировать категорию',
                'update_item'       => 'Обновить категорию',
                'add_new_item'      => 'Добавить категорию',
                'new_item_name'     => 'Название категории',
                'menu_name'         => 'Категории',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_in_rest'       => true,
            'show_admin_column' => true
        )
    );
}