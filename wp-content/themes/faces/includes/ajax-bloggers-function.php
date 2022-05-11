<?php

function ajax_bloggers_function() {
    $cat = $_POST['cat'];
    $page = $_POST['page'];

    get_template_part('/template-parts/bloggers-content', null, array(
        'cat' => $cat,
        'page' => $page,
    ));

    die();
}
