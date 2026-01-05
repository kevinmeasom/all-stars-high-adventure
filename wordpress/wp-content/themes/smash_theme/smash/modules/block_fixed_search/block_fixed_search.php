<?php

function smash_block_fixed_search($args = null) {
    $form = (!empty($args['form'])) ? $args['form'] : 'custom_search_form_icon_top';

    if($form){ ?>
        <div class="fixed-search">
            <div class="fixed-search-inner">
                <?php smash_block_custom_search(['form' => $form]); ?>
            </div>
        </div>
    <?php }
}