<?php

function ajax_modal() {
    $current_modal = $_POST['modal'] ?? null;
    $case_id = $_POST['case_'] ?? null;

    if ($current_modal == 'work-offer') {
        get_template_part('/template-parts/work-offer-modal');
    } elseif ($current_modal == 'case' && $case_id) {
        get_template_part('/template-parts/case-modal', null, array(
            'id' => $case_id,
        ));
    } else {
        echo 0;
    }
    die();
}