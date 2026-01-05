<?php $p = get_post(get_the_ID());
                                if($p){
                                    smash_block_project(['class' => 'archive-item', 'post' => $p, 'hide_cat' => true, 'hide_text' => true, 'hide_link' => true]);
                                } ?>