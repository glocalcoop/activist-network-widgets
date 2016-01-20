<?php

/**
 * ANP Network Content Shortcodes
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.1
 * @package   ANP_Network_Content
 */


/************* SHORTCODE FUNCTIONS *****************/
//[anp_network_posts title="Module Title" title_image="/path/to/image.png" number_posts="20" exclude_sites="2,3" posts_per_site="5" style="block" show_meta=1 show_excerpt=1 show_site_name=1 id="unique-id" class="class-name"]

// Inputs: optional parameters
// Output: rendered HTML list of posts
function glocal_networkwide_posts_shortcode( $atts, $content = null ) {

    // Attributes
    extract( shortcode_atts(
        array(), $atts )
    );

    if(function_exists('glocal_networkwide_posts_module')) {
        return glocal_networkwide_posts_module( $atts );
    }
    
}
add_shortcode( 'anp_network_posts', 'glocal_networkwide_posts_shortcode' );


//[anp_network_sites number_sites="20" exclude_sites="1,2" sort_by="registered" default_image="/path/to/image.jpg" show_meta=1 show_image=1 id="unique-id" class="class-name"]

// Inputs: optional parameters
// Output: rendered HTML list of sites
function glocal_networkwide_sites_shortcode( $atts, $content = null ) {

    // Attributes
    extract( shortcode_atts(
        array(), $atts )
    );

    if(function_exists('glocal_networkwide_sites_module')) {
        return glocal_networkwide_sites_module( $atts );
    }
    
}
add_shortcode( 'anp_network_sites', 'glocal_networkwide_sites_shortcode' );


//[anp_network_posts title="Module Title" title_image="/path/to/image.png" number_posts="20" exclude_sites="2,3" posts_per_site="5" style="block" show_meta=1 show_excerpt=1 show_site_name=1 id="unique-id" class="class-name"]

/**
 * ANP Network Events Shortcode
 * @param array of optional parameters
 * @return rendered HTML list of events
 * Usage: //[anp_network_events title="Module Title" number_posts="20" exclude_sites="2,3" posts_per_site="5" style="block" show_meta=1 show_excerpt=1 show_site_name=1 class="class-name" event_scope="future" event_categories="cat1,cat2" event_tags="#hash1,#hash2"]
 */
function glocal_networkwide_events_shortcode( $atts, $content = null ) {

    // Attributes
    extract( shortcode_atts(
        array(), $atts )
    );

    $atts['post_type'] = 'event';
    $atts['event_categories'] = ( isset( $atts['event_categories'] ) ) ? (array) $atts['event_categories'] : null;
    $atts['event_tags'] = ( isset( $atts['event_tags'] ) ) ? (array) $atts['event_tags'] : null;

    if( function_exists( 'glocal_networkwide_posts_module' ) ) {
        return glocal_networkwide_posts_module( $atts );
    }
    
}
add_shortcode( 'anp_network_events', 'glocal_networkwide_events_shortcode' );
