<?php $p = get_post(get_the_ID());
                                if($p){
                                    smash_block_post(['class' => 'archive-item', 'post' => $p]);
                                } ?>