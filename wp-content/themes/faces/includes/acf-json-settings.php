<?php

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path) {

    return get_stylesheet_directory() . '/acf-json';

}