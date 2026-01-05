<?php
// add_filter( 'ninja_forms_render_options', function( $options, $settings ) {
//     $service = $_GET['service'];
//     if($settings['key'] == 'service'){
//         foreach($settings['options'] as $option){
//             if($option['value'] == $service){
//                 $option['selected'] = 1;
//             }
//         }
//     }
  
//     return $options;
// }, 10, 2 );

function smash_section_contact_form($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $form = (!empty($args['form'])) ? $args['form'] : null;
    
    if($form){ ?>
        <div class="contact-form <?php echo $class; ?>">
            <?php echo $form; ?>
        </div>
    <?php }
}