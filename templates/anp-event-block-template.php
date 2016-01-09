<?php
/*
* Template for the output of the Network Event List as blocks
* Override by placing a file called plugins/glocal-network-content/anp-event-block-template.php in your active theme
*/ 

$venue_id = $post_detail['event_venue']['venue_id'];
$venue_name = $post_detail['event_venue']['venue_name'];
$venue_link = $post_detail['event_venue']['venue_link'];
$venue_address = $post_detail['event_venue']['venue_location'];

$post_class = ( $post_detail['post_class'] ) ? $post_detail['post_class'] : 'post event event-list hentry list-item';

// echo '<pre>$post_detail ';
// var_dump( $post_detail );
// echo '</pre>';

$html .= '<article id="post-' . $post_id . '" class="post ' . $post_class . '" role="article">';

$html .= '<header class="post-header event-header">';

$html .= '<h4 class="meta">';
$html .= '<span class="event-day">';
$html .= date_i18n( 'l', strtotime( $post_detail['event_start_date'] ) );
$html .= '</span>';
$html .= '<time class="event-date" itemprop="startDate" datetime="' . date_i18n( 'Y-m-d H:i:s', strtotime( $post_detail['event_start_date'] ) ) . '">';
$html .= date_i18n( get_option( 'date_format' ), strtotime( $post_detail['event_start_date'] ) );
$html .= '</time>';
$html .= '<span class="event-time">';
$html .= '<span class="start">';
$html .= date_i18n( get_option( 'time_format' ), strtotime( $post_detail['event_start_date'] ) );
$html .= '</span>';
$html .= '<span class="end">';
$html .= date_i18n( get_option( 'time_format' ), strtotime( $post_detail['event_end_date'] ) );
$html .= '</span>';
$html .= '</span>';

if( $show_meta ) {

	$html .= '<div class="meta event-meta">';

	// Need event categories & tags
	$html .= '<div class="post-categories cat-links tags">' . $post_categories . '</div>';

	$html .= '</div>';

}

$html .= '</h4>';
$html .= '</header>';
$html .= '<div class="post-body event-content">';

if( $show_thumbnail && $post_detail['post_image'] ) {
	$html .= '<div class="post-image event-image">';
	$html .= '<a href="' . esc_url( $post_detail['permalink'] ) . '" class="post-thumbnail">';
	$html .= '<img class="attachment-post-thumbnail wp-post-image item-image" src="' . $post_detail['post_image'] . '">';
	$html .= '</a>';
	$html .= '</div>';
}

$html .= '<h3 class="post-title event-title">';
$html .= '<a href="' . esc_url( $post_detail['permalink'] ) . '" class="post-link">';
$html .= $post_detail['post_title'];
$html .= '</a>';
$html .= '</h3>';
if( $venue_id ) {
	$html .= '<div class="event-location event-venue">';

	$html .= '<span class="location-name venue-name">';
	$html .= '<a href="' . $venue_link . '">' . $venue_name . '</a>';
	$html .= '</span>';
	$html .= '<span class="street-address">';
	$html .= $venue_address['address'];
	$html .= '</span>';
	$html .= '<span class="city-state-postalcode">';
	$html .= '<span class="city">';
	$html .= $venue_address['city'];
	$html .= '</span>';
	$html .= '<span class="state">';
	$html .= $venue_address['state'];
	$html .= '</span>';
	$html .= '<span class="postal-code">';
	$html .= $venue_address['postcode'];
	$html .= '</span>';
	$html .= '</span>';
	$html .= '<span class="country">';
	$html .= $venue_address['country'];
	$html .= '</span>';

	$html .= '</div>';
}
$html .= '<p class="post-excerpt event-description">';
$html .= '<div class="post-excerpt" itemprop="articleBody">' . $post_detail['post_excerpt'] . '</div>';
$html .= '</p>';
if( $show_meta ) {

	$html .= '<footer class="article-footer">';
	$html .= '<div class="meta event-meta">';

	if( $show_site_name ) {
		$html .= '<span class="blog-name"><a href="' . esc_url( $post_detail['site_link'] ) . '">';
		$html .= $post_detail['site_name'];
		$html .= '</a></span>';
	}

	$html .= '<span class="post-author author vcard"><a href="' . esc_url( $post_detail['site_link'] . '/author/' . $post_detail['post_author'] ) . '">';
	$html .= $post_detail['post_author'];
	$html .= '</a></span>';

	// Need event categories & tags
	$html .= '<div class="post-categories cat-links tags">' . $post_categories . '</div>';

	$html .= '</div>';
	$html .= '</footer>';

}

$html .= '</div>';

$html .= '</article>';
$html .= '';
$html .= '';
$html .= '';
$html .= '';
$html .= '';
$html .= '';
$html .= '';



?>