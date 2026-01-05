<?php 
                            $p = get_post(get_the_ID());
                            if($p){ 
                                smash_block_snapshot(['class' => 'archive-item', 'extras' => true, 'snapshot' => $p]); 
                            } ?>