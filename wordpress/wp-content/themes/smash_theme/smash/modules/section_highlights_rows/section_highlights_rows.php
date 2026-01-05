<?php

function smash_section_highlights_rows($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $rows = (!empty($args['rows'])) ? $args['rows'] : null;

    if($rows){ ?>
        <div class="highlights-rows <?php echo $class; ?>">
            <div class="highlights-rows-container">
                <?php if($title){ ?>
                    <h2 class="highlights-rows-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php foreach($rows as $row) { ?>
                    <?php smash_section_shop_highlights(['class' => 'animate-el', 'title' => $row['highlights_highlights_title'], 'image' => $row['highlights_highlights_image'], 'dots' => $row['highlights_highlights_products_dots'], 'products' => $row['highlights_highlights_products'], 'cta' => $row['highlights_highlights_cta'], 'link' => $row['highlights_highlights_link']]); ?>
                <?php } ?>
            </div>
        </div>
    <?php }
}