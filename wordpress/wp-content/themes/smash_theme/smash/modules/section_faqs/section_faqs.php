<?php 
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_faqs_script', get_template_directory_uri() . '/smash/modules/section_faqs/section_faqs.js', array(), '1', true );
} );

function smash_section_faqs($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $faqs = (!empty($args['faqs'])) ? $args['faqs'] : null;
    
    if($faqs) : ?>
        <section id="faq-module" class="<?php echo $class; ?>">
            <?php if($title){ ?>
                <div class="page-faq-header">
                    <div class="page-faq-header-inner container-xl">
                        <?php if($title){ ?>
                            <h2 class="page-faq-title"><?php echo $title; ?></h2>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="page-faq-wrapper container-xl">
                <?php 
                $rows = $faqs;
                $row_count = count($rows);
                if($row_count % 2 == 0) {
                    $row_half = $row_count / 2;
                } else {
                    $row_half = round($row_count / 2);
                }

                foreach ($faqs as $key => $faq) {
                    if($key == 0) {
                        echo '<div id="faq-col-1" class="faq-col toggle-wrap">';
                    } 
    
                    if($key == $row_half) {
                        echo '</div><div id="faq-col-2" class="faq-col">';
                    } ?>
    
                    <div class="faq-item toggle-block">
                        <div class="faq-title toggle-trigger flex align-center justify-between">
                            <span><?php echo $faq['question']; ?></span>
                            <svg class="icon"><use xlink:href="#down-angle" /></svg>
                        </div>
                        <div class="faq-text toggle-item">
                            <p><?php echo $faq['answer']; ?></p>
                        </div>
                    </div>
                    
                    <?php if($key >= $row_count - 1) {
                        echo '</div>';
                    } ?>
                <?php } ?>
            </div>

            <?php if($cta){ ?>
                <div class="page-faq-footer">
                    <a href="<?php echo $link; ?>" class="page-faq-cta"><?php echo $cta; ?></a>
                </div>
            <?php } ?>
        </section>
    <?php endif;
}