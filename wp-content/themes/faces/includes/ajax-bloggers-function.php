<?php

function ajax_bloggers_function() {
    $cat = $_POST['cat'];

    get_template_part('/template-parts/bloggers-content', null, array('cat' => $cat));

    die();
}
