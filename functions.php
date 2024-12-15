<?php
/*  ----------------------------------------------------------------------------
    WordPress booster framework - this is our theme framework - all the content and settings are there
    It is not necessary to include it in the child theme only if you want to use the API
*/
if (!defined('TD_THEME_WP_BOOSTER')) {
	include TEMPLATEPATH . '/includes/td_config.php';
	include TEMPLATEPATH . '/includes/wp_booster/td_wp_booster_functions.php';
}

function get_social_sharing_bottom_page($postid) {

        if (td_util::get_option('tds_bottom_social_show') == 'hide' and td_util::get_option('tds_bottom_like_tweet_show') == 'hide') {
            return;
        }

        // used to style the sharing icon to be big on tablet
        $td_no_like = '';
        if (td_util::get_option('tds_bottom_like_tweet_show') != 'hide') {
            $td_no_like = 'td-with-like';
        }

        $buffy = '';
        // @todo single-post-thumbnail appears to not be in used! please check
		$title = get_the_title($post_id);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' );
        $buffy .= '<div class="td-post-sharing td-post-sharing-bottom td-pb-padding-side"><span class="td-post-share-title">' . __td('SHARE') . '</span>';


        if (td_util::get_option('tds_bottom_social_show') != 'hide') {
            $twitter_user = td_util::get_option( 'tds_tweeter_username' );

            //default share buttons
            $buffy .= '
            <div class="td-default-sharing ' . $td_no_like . '">
	            <a class="td-social-sharing-buttons td-social-facebook" href="http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( get_permalink() ) ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><div class="td-sp td-sp-facebook"></div><div class="td-social-but-text">Facebook</div></a>
	            <a class="td-social-sharing-buttons td-social-twitter" href="https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( get_permalink() ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . '"><div class="td-sp td-sp-twitter"></div><div class="td-social-but-text">Twitter</div></a>
	            <a class="td-social-sharing-buttons td-social-google" href="http://plus.google.com/share?url=' . esc_url( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><div class="td-sp td-sp-googleplus"></div></a>
	            <a class="td-social-sharing-buttons td-social-pinterest" href="http://pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><div class="td-sp td-sp-pinterest"></div></a>
            </div>';
        }


        if (td_util::get_option('tds_bottom_like_tweet_show') != 'hide') {
            //classic share buttons
            $buffy .= '<div class="td-classic-sharing">';
            $buffy .= '<ul>';

            $buffy .= '<li class="td-classic-facebook">';
            $buffy .= '<iframe frameBorder="0" src="' . td_global::$http_or_https . '://www.facebook.com/plugins/like.php?href=' . get_permalink() . '&amp;layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;colorscheme=light&amp;height=21" style="border:none; overflow:hidden; width:105px; height:21px; background-color:transparent;"></iframe>';
            $buffy .= '</li>';

            $buffy .= '<li class="td-classic-twitter">';
            $buffy .= '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . esc_attr(get_permalink()) . '" data-text="' . $title . '" data-via="' . td_util::get_option('tds_' . 'social_twitter') . '" data-lang="en">tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
            $buffy .= '</li>';

            $buffy .= '</ul>';
            $buffy .= '</div>';
        }





        $buffy .= '</div>';

        return $buffy;
    }
	
	/* Remove Scripts */
add_action( 'wp_print_scripts', 'my_deregister_javascript_remove', 100 );
function my_deregister_javascript_remove() {
wp_deregister_script( 'comment-reply' );
wp_deregister_script( 'jquery-ui-core' );
}
/* Remove style sheets */
add_action( 'wp_print_styles', 'my_deregister_styles_remove', 100 );
function my_deregister_styles_remove() {
wp_deregister_style( 'iphorm' );
wp_deregister_style( 'page-list-style' );
wp_deregister_style( 'td-theme' );
}

function _remove_script_version( $src ){
	$excludes = array(get_stylesheet_directory_uri() . '/style.css?ver=2.58');
	$result = $src;
	if ( ! in_array($src, $excludes) ) {
		$parts = explode( '?ver', $src );
		$result = $parts[0];
	}
	return $result;
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/* Add style sheets */
add_action('wp_print_styles', 'my_styles_font_awesome');
function
my_styles_font_awesome() { 
    wp_enqueue_style( 'font_awesome_style', get_stylesheet_directory_uri() . '/fonts/font-awesome.min.css', array(), '1.0' );
    wp_enqueue_style( 'style-css', get_stylesheet_directory_uri() . '/style.css?v=2.58', array(), '', 'all' );
}

if ( is_page() ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}


/**
 * Meta Boxes
 */
// require( trailingslashit( get_template_directory() ) . 'includes/meta-boxes.php' );


// Filter to hide protected posts
function exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');




function my_password_form() {
    global $post;
	$postid = ( empty( $post->ID ) ? rand() : $post->ID );
	if ( is_page('511') ) { $form = iphorm(7); } else { $form = iphorm(8); }
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<div id="password_protected" class="vc_row wpb_row td-pb-row"><div class="td-pb-span12 wpb_column vc_column_container "><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner td-pb-row td-pb-row"><div class="wpb_column vc_column_container td-pb-span4"><form class="password_form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p>To enter the Hypospadias Blog you must enter the password below.</p><label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></form></div><div class="wpb_column vc_column_container td-pb-span8 email_password"><p>Need a password? Fill out the form below and we will email it to you...</p>'. $form .'</div></div></div></div></div>';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

add_filter('protected_title_format', 'blank');
function blank($title) {
       return '%s';
}



function wp_star_ratings( $args = array() ) {
    $defaults = array(
        'rating' => 0,
        'type'   => 'rating',
        'number' => 0,
        'echo'   => true,
    );
    $r = wp_parse_args( $args, $defaults );
 
    // Non-english decimal places when the $rating is coming from a string
    $rating = str_replace( ',', '.', $r['rating'] );
 
    // Convert Percentage to star rating, 0..5 in .5 increments
    if ( 'percent' == $r['type'] ) {
        $rating = round( $rating / 10, 0 ) / 2;
    }
 
    // Calculate the number of each type of star needed
    $full_stars = floor( $rating );
    $half_stars = ceil( $rating - $full_stars );
    $empty_stars = 5 - $full_stars - $half_stars;
 
    $output = '<div class="star-rating">';
    $output .= str_repeat( '<i class="td-icon-star"></i>', $full_stars );
    $output .= str_repeat( '<i class="td-icon-star-half"></i>', $half_stars );
    $output .= str_repeat( '<i class="td-icon-star-empty"></i>', $empty_stars );
    $output .= '</div>';
 
    if ( $r['echo'] ) {
        echo $output;
    }
 
    return $output;
}

function parculogy_custom_scripts() {
    wp_enqueue_script( 'parculogy-custom-scripts', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'parculogy_custom_scripts' );