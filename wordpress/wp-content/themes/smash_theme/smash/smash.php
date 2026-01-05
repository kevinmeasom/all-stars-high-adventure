<?php
/*****************
*
* Insert into header
*
*****************/
add_action('wp_head', function(){

    require_once( __DIR__ . "/images/icons.svg"); 
    ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3MNDC78DZT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        // gtag('config', 'G-000000000'); //smash account
        // gtag('config', 'G-000000000'); //client account
    </script>
    <?php
});



/*****************
*
* Theme Nav Menus
*
*****************/
register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'smash_theme' ),
    'mobile' => esc_html__( 'Mobile', 'smash_theme' ),
) );


/*****************
*
* content width settings
*
*****************/
add_action( 'after_setup_theme', function(){
    $GLOBALS['content_width'] = apply_filters( 'smash_theme_content_width', 2000 );
}, 0 );


/**
* Enqueue scripts and styles.
*/
add_action( 'wp_enqueue_scripts', function(){
	// stylesheets
	wp_enqueue_style( 'fontawesome-style', 'https://use.fontawesome.com/releases/v5.15.2/css/all.css', false, false );
	wp_enqueue_style( 'slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	
	// javascript
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1', true );
    wp_enqueue_script( 'lazy-script', get_template_directory_uri().'/smash/js/lazy/jquery.lazy.min.js', array(), '1', true);
	wp_enqueue_script( 'slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1', true);
	wp_enqueue_script( 'cookie-script', get_template_directory_uri().'/smash/js/js-cookie.js', array(), '1', true);
	wp_enqueue_script( 'waypoints-script', get_template_directory_uri().'/smash/js/waypoints/jquery.waypoints.js', array(), '1', true);
	wp_enqueue_script( 'social-script', get_template_directory_uri().'/smash/js/social/social.min.js', array(), '1', true);
	wp_enqueue_script( 'clipboard-script', get_template_directory_uri().'/smash/js/clipboard.js', array(), '1', true);
	
    if(is_singular('post')){
        wp_enqueue_script( 'social-script', get_template_directory_uri().'/smash/js/social/social.min.js', array(), '1', true);
    }
	
    wp_enqueue_script( 'smash-scripts', get_template_directory_uri() . '/smash/js/smash-scripts.js', array(), '20151215', true );
    wp_enqueue_script( 'smash', get_template_directory_uri() . '/smash/js/smash.js', array(), '20151215', true );
    
    wp_enqueue_script( 'smash_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'smash_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );


/*****************
*
* IMAGE SIZES
*
*****************/
// if ( function_exists( 'add_image_size' ) ) {
//     // archive, dropdown 240x280
// 	add_image_size( 'tall', 425, 500, true );
// }	


/*****************
*
* INCLUDE MODULES
*
*****************/
// BLOCK
require_once('modules/block_loading_screen/block_loading_screen.php');
require_once('modules/block_social_icons/block_social_icons.php');

// NAV
require_once('modules/nav_mobile/nav_mobile.php');

// SLIDER
require_once('modules/slider_reviews/slider_reviews.php');

// WIDGET

// WALKER
require_once('modules/walkers/walkers.php');

// SINGLE

// LOOP

// SECTION
require_once('modules/section_about/section_about.php');
require_once('modules/section_banner_cta/section_banner_cta.php');
require_once('modules/section_cta_bar/section_cta_bar.php');
require_once('modules/section_cta_blocks/section_cta_blocks.php');
require_once('modules/section_downloadables/section_downloadables.php');
require_once('modules/section_faq_rows/section_faq_rows.php');
require_once('modules/section_faqs/section_faqs.php');
require_once('modules/section_gallery/section_gallery.php');
require_once('modules/section_grid_links/section_grid_links.php');
require_once('modules/section_hello_bar/section_hello_bar.php');
require_once('modules/section_hero/section_hero.php');
require_once('modules/section_intro/section_intro.php');
require_once('modules/section_tabs/section_tabs.php');
require_once('modules/section_team/section_team.php');



/*****************
*
* SIGNATURE SHORTCODE
*
*****************/
add_shortcode( 'signature', function( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'text' => 'xo'
    ), $atts);
    return '<div class="signature">'.$a['text'].'</div>';
} );


/*****************
*
* BTN SHORTCODE
*
*****************/
add_shortcode( 'smash_btn', function( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'text' => '',
        'link' => '#',
        'class' => 'btn-primary',
        'download' => false,
    ), $atts);
    $download = (!empty($a['download'])) ? 'download' : '';
    return '<a href="'.$a['link'].'" class="btn '.$a['class'].'" '.$download.'>'.$a['text'].'</a>';
} );

/*****************
*
* CUSTOMIZE SEARCH FORMS
*
*****************/
add_filter( 'get_search_form', 'custom_search_form_icon_left' );
function custom_search_form_icon_left( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-icon-left" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<input type="text" name="s" id="search" placeholder="Looking for something?" value="" />';
            $form .= '<input type="hidden" name="site_section" value="site-search" />';
            $form .= '<button type="submit"><svg class="icon"><use xlink:href="#search" /></svg></button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}

function custom_search_form_icon_right( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-icon-right" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<input type="text" name="s" id="search" placeholder="What are you looking for?" value="" />';
            $form .= '<input type="hidden" name="site_section" value="site-search" />';
            $form .= '<button type="submit"><svg class="icon"><use xlink:href="#search" /></svg></button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}

function custom_search_form_icon_top( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-icon-top" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<svg class="icon"><use xlink:href="#search" /></svg>';
            $form .= '<input type="text" name="s" id="search" placeholder="Looking for Something?" value="" />';
            $form .= '<input type="hidden" name="site_section" value="site-search" />';
            $form .= '<button type="submit">Type what you\'re looking for and click enter</button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}

function custom_search_form_button_right( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-button-right" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<input type="text" name="s" id="search" placeholder="" value="" />';
            $form .= '<input type="hidden" name="site_section" value="site-search" />';
            $form .= '<button type="submit">Search The Blog</button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}

function custom_shop_search_form_icon_left( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-icon-left" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<input type="text" name="s" id="search" placeholder="Looking for something?" value="" />';
            $form .= '<input type="hidden" name="site_section" value="product-search" />';
            $form .= '<button type="submit"><svg class="icon"><use xlink:href="#search" /></svg></button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}

function custom_shop_search_form_icon_right( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-icon-right" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<input type="text" name="s" id="search" placeholder="What are you looking for?" value="" />';
            $form .= '<input type="hidden" name="site_section" value="product-search" />';
            $form .= '<button type="submit"><svg class="icon"><use xlink:href="#search" /></svg></button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}

function custom_shop_search_form_button_right( $form ) {
    $form = '';
    $form .= '<form class="basic-search-form search-button-right" action="/" method="get">';
        $form .= '<label for="search">';
            $form .= '<span class="screen-reader-text">Search for:</span>';
        $form .= '</label>';
        $form .= '<div class="search-fields">';
            $form .= '<input type="text" name="s" id="search" placeholder="" value="" />';
            $form .= '<input type="hidden" name="site_section" value="product-search" />';
            $form .= '<button type="submit">Search The Shop</button>';
        $form .= '</div>';
    $form .= '</form>';
	return $form;
}


/*****************
*
* ACF OPTIONS
*
*****************/
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/smash/acf/';
    
    // return
    return $path;
    
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/smash/acf/';
    
    // return
    return $dir;
    
}

// add_filter('acf/settings/show_admin', '__return_false');

include_once( get_stylesheet_directory() . '/smash/acf/acf.php' );

// saving json
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/smash/acf-json';
    
    
    // return
    return $path;
    
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
        
    // append path
    $paths[] = get_stylesheet_directory() . '/smash/acf-json';

    // return
    return $paths;   
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home',
		'menu_title'	=> 'Home',
		'parent_slug'	=> 'theme-settings',
	));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-settings',
	));
	
}



/*****************
*
* SORT RELATIONSHIP FIELDS BY DATE
*
*****************/
// filter for every field
// add_filter('acf/fields/relationship/query', function($args, $field, $post_id){
//     $type = (!empty($field['post_type'])) ? $field['post_type'] : 'post';
//     $args = array(
//         'post_type' => $type,
//         'orderby' => 'date',
//         'order' => 'DESC',
//     );
//     return $args;
// }, 10, 3);


/*****************
*
* CUSTOMIZED DATETIME
*
*****************/
function smash_time_ago() {
    echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}


/*****************
*
* REMOVE JS & CSS Versioning
*
*****************/
// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}


/*****************
*
* Query Posts Per Page
*
*****************/
function my_post_queries( $query ) {
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query()){
        
        if(is_archive() || is_home() || is_category() || is_search()){
            $query->set('posts_per_page', 12);
            // $query->set('category__not_in', get_field('exclude_categories','option'));
        }

        if(is_search()){
            $search_refer = $_GET['site_section'];
            if ($search_refer == 'product-search') { 
                $query->set('post_type', 'affiliate_product');
            } elseif ($search_refer == 'site-search') { 
                $query->set('post_type', 'post');
            } elseif ($search_refer == 'all-search') { 
                $query->set('post_type', ['post','affiliate_product']);
            }
        }

    }
}
add_action( 'pre_get_posts', 'my_post_queries' );



/*****************
*
* CUSTOMIZED COMMENTS
*
*****************/
function comments_num() {
    $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

    if ( comments_open() ) {
        if ( $num_comments == 0 ) {
            $comments = __('No Comments');
        } elseif ( $num_comments > 1 ) {
            $comments = $num_comments . __(' Comments');
        } else {
            $comments = __('1 Comment');
        }
        $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
    } else {
        $write_comments =  __('Comments are off for this post.');
    }

    echo $write_comments;
}


/*****************
*
* Move Comments Field to Bottom
*
*****************/
function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );



/*****************
*
* EXCERPT EDITS
*
*****************/
/**
* Add class to exceprt.
*
* @param string $more "Read more" excerpt string.
* @return string (Maybe) modified "read more" excerpt string.
*/
function add_excerpt_class( $excerpt )
{
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}

add_filter( "the_excerpt", "add_excerpt_class" );

/**
* Filter the excerpt "read more" string.
*
* @param string $more "Read more" excerpt string.
* @return string (Maybe) modified "read more" excerpt string.
*/
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );




/*****************
*
* Archive Title Edits
*
*****************/
/**
* Change the archive title filter.
**/
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});


/*****************
*
* Phone Number Formatting
*
*****************/
function phone_number_format($number) {
    // Allow only Digits, remove all other characters.
    $number = preg_replace("/[^\d]/","",$number);
   
    // get number length.
    $length = strlen($number);
   
    // if number = 10
    if($length == 10) {
        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1.$2.$3", $number);
    }
    
    return $number;
   
}


/*****************
*
* Numbered Pagination
*
* Usage: smash_numbered_pagination($wp_query);
*
*****************/
function smash_numbered_pagination($custom_query) {
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
        echo '<nav class="numbered-pagination">';
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => 'Back',
            'next_text' => 'Next'
        ));
        echo '</nav>';
    }
}


/*****************
 *
* Admin Columns
*
*****************/
add_filter( 'manage_post_posts_columns', 'smash_filter_posts_columns' );
function smash_filter_posts_columns( $columns ) {
  $columns['template'] = __( 'Template' );
  return $columns;
}
add_action( 'manage_post_posts_custom_column', 'smash_template_column', 10, 2);
function smash_template_column( $column, $post_id ) {
    // Template column
    if ( 'template' === $column ) {
        $templates = get_page_templates( null, 'post' );
        $selected = '';
        foreach ( array_keys( $templates ) as $template ) {
            $selected = selected( get_page_template_slug( $post_id ), $templates[ $template ], false );
            if($selected != ''){
                echo esc_html($template);
            }
        }
    }
}

add_filter( 'manage_posts_columns', 'smashing_filter_posts_columns' );
function smashing_filter_posts_columns( $columns ) {
  $columns['image'] = __( 'Image' );
  return $columns;
}

add_action( 'manage_posts_custom_column', 'smashing_column', 10, 2);
function smashing_column( $column, $post_id ) {
  // Image column
  if ( 'image' === $column ) {
    echo get_the_post_thumbnail( $post_id, array(50, 50) );
  }
}

// add_filter( 'manage_edit-post_sortable_columns', 'smashing_sortable_columns');
// function smashing_sortable_columns( $columns ) {
//   $columns['image'] = '_thumbnail_id';
//   return $columns;
// }


function smash_custom_query_vars_filter( $vars ) {
    $vars[] .= 'missing_thumb';
    return $vars;
}
add_filter( 'query_vars', 'smash_custom_query_vars_filter' );

// use ?missing_thumb=true
add_action( 'pre_get_posts', 'smashing_posts_filterby_missing_thumbs' );
function smashing_posts_filterby_missing_thumbs( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if(!empty($query->query_vars['missing_thumb']) && $query->query_vars['missing_thumb'] == true) {
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', '_thumbnail_id' );  
    $query->set( 'meta_compare', 'NOT EXISTS' );
  }

//   if ( '_thumbnail_id' === $query->get( 'orderby') ) {
//     $query->set( 'orderby', 'meta_value' );
//     $query->set( 'meta_key', '_thumbnail_id' );
//   }
}



/*****************
*
* Generate Featured Images
*
*****************/
function auto_featured_image($post) {
    global $post;
    $first = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
    $first = $matches[1][0];
    // Remove dimensions from url
    $cleaned = preg_replace('/-\d+[Xx]\d+\./i', '.', $first);
    $attached_image = attachment_url_to_postid($cleaned);
    $thumb = get_post_meta( $post->ID, '_thumbnail_id' ); 

    if ( empty($thumb) && $attached_image ) {
        update_post_meta( $post->ID, '_thumbnail_id', $attached_image );
    }
}

// Used for new posts
// add_action('save_post', 'auto_featured_image');
// add_action('draft_to_publish', 'auto_featured_image');
// add_action('new_to_publish', 'auto_featured_image');
// add_action('pending_to_publish', 'auto_featured_image');
// add_action('future_to_publish', 'auto_featured_image');

// Use it temporary to generate all featured images
// add_action('the_post', 'auto_featured_image');


/*****************
*
* Blobs
*
*****************/
function addBlobs(){
    ?>
        <script>
            jQuery(function($){
                function addBlob(el, blob){
                    blob.appendTo( el );
                }

                // addBlob($('.blob-bl'), $('<img class="blob leaves-bl" src="<?php echo get_template_directory_uri().'/smash/images/blob-leaves-bl.png'; ?>" />'));
                // addBlob($('.blob-tr'), $('<img class="blob leaves-tr" src="<?php echo get_template_directory_uri().'/smash/images/blob-leaves-tr.png'; ?>" />'));
            });
        </script>
    <?php 
}

/*****************
*
* Change Comment Notice
*
*****************/
add_filter( 'gettext', 'change_comment_cookie_label', 20, 3 );
function change_comment_cookie_label( $translated_text, $text, $domain ) {
    if ( is_singular() ) {
        switch ( $translated_text ) {
            case 'Save my name, email, and website in this browser for the next time I comment.' :
                $translated_text = __( 'Save my name and email in this browser for the next time I comment.', 'jo_lynne_shane' );
                break;
        }
    }
    return $translated_text;
}


/*****************
*
* Parse the video uri/url to determine the video type/source and the video id
*
*****************/
function parse_video_uri( $url ) {
		
    // Parse the url 
    $parse = parse_url( $url );
    
    // Set blank variables
    $video_type = '';
    $video_id = '';
    
    // Url is http://youtu.be/xxxx
    if ( $parse['host'] == 'youtu.be' ) {
    
        $video_type = 'youtube';
        
        $video_id = ltrim( $parse['path'],'/' );	
        
    }
    
    // Url is http://www.youtube.com/watch?v=xxxx 
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {
    
        $video_type = 'youtube';
        
        parse_str( $parse['query'], $output );
        
        $video_id = $output['v'];	
        
        if ( !empty( $feature ) )
            $video_id = end( explode( 'v=', $parse['query'] ) );
            
        if ( strpos( $parse['path'], 'embed' ) == 1 )
            $video_id = end( explode( '/', $parse['path'] ) );
        
    }
    
    // Url is http://www.vimeo.com
    if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {
    
        $video_type = 'vimeo';
        
        $video_id = ltrim( $parse['path'],'/' );	
                    
    }
    $host_names = explode(".", $parse['host'] );
    $rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
    // Url is an oembed url wistia.com
    if ( ( $rebuild == 'wistia.com' ) || ( $rebuild == 'wi.st.com' ) ) {
    
        $video_type = 'wistia';
            
        if ( strpos( $parse['path'], 'medias' ) == 1 )
                $video_id = end( explode( '/', $parse['path'] ) );
    
    }
    
    // If recognised type return video array
    if ( !empty( $video_type ) ) {
    
        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );
    
        return $video_array;
        
    } else {
    
        return false;
        
    }
    
}


/*****************
*
* Insert into footer
*
*****************/
add_action('wp_footer', function(){
    if(function_exists('addBlobs')){
        addBlobs();
    }
    if(function_exists('smash_block_search')){
        smash_block_search();
    }
    if(function_exists('smash_block_fixed_search') && is_archive()){
        smash_block_fixed_search();
    }
    if(function_exists('smash_block_popups')){
        smash_block_popups();
    }

    ?>
    <script>
        window.almComplete = function(alm){
            setTimeout(function(){
                scaleBgImages();
                animateElements();
            }, 500)
        }
    </script>
    <?php
});
