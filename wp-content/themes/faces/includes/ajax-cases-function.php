<?php

function ajax_cases_function() {
    $cat = $_POST['cat'];

    get_template_part('/template-parts/cases-content', null, array('cat' => $cat));

    die();
}
