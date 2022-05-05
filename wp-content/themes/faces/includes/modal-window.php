<?php

function ajax_modal() {
    $current_modal = $_POST['modal'];

    if ($current_modal == 'work-offer') {
        get_template_part('/template-parts/work-offer-modal');
    } elseif ($current_modal == 'case') {
        get_template_part('/template-parts/case-modal');
    }
    die();
}