<?php $p = get_post(get_the_ID());
                            if($p){
                                smash_block_promo_code(['post' => $p]); 
                            } ?>