<?php

function ajax_cases_function()
{
    $cat = $_POST['cat'];
    $page = $_POST['page'];

    get_template_part('/template-parts/cases-content', null, array(
        'cat' => $cat,
        'page' => $page,
    ));

    die();
}
