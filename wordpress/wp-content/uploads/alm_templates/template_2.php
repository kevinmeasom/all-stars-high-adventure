<?php $p = get_post(get_the_ID());
                if($p){
                    smash_block_product(['class' => 'product-grid-item', 'product' => $p, 'description' => false]);
                } ?>