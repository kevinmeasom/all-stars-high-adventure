<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_flex_row_script', get_template_directory_uri() . '/smash/modules/block_flex_row/block_flex_row.js', array(), '1', true );
} );

/*****************
*
* FLEX_ROW SHORTCODE
*
*****************/
function row_shortcode( $atts, $content = null ) {
    return '<div class="flex_row">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'flex_row', 'row_shortcode' );

/*****************
*
* block SHORTCODE
*
*****************/
function block_shortcode( $atts, $content = null ) {
    return '<div class="flex_row_block">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'block', 'block_shortcode' );