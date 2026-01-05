<?php

function smash_section_faq_rows($args = null) {
    $rows = (!empty($args['rows'])) ? $args['rows'] : null;

    if($rows){ ?>
        <?php foreach($rows as $row) { ?>
            <?php smash_section_faqs(['title' => $row['row_faqs_title'], 'faqs' => $row['row_faqs']]); ?>
        <?php } ?>
    <?php }
}