<?php
/*
* Template for the output of the Network Event List
* Override by placing a file called plugins/glocal-network-content/anp-event-list-template.php in your active theme
*/ 

$html .= '<li class="type-post list-item siteid-' . $post_detail['site_id'] . '">';
if($show_thumbnail && $post_detail['post_image']) {
	//Show image
	$html .= '<a href="' . esc_url( $post_detail['permalink'] ) . '" class="post-thumbnail">';
	$html .= '<img class="attachment-post-thumbnail wp-post-image item-image" src="' . $post_detail['post_image'] . '">';
	$html .= '</a>';
}
$html .= '<h4 class="post-title">';
$html .= '<a href="' . esc_url( $post_detail['permalink'] ) . '">';
$html .= $post_detail['post_title'];
$html .= '</a>';
$html .= '</h4>';

if($show_meta) {
	$html .= '<div class="meta">';
	if($show_site_name) {
		$html .= '<span class="blog-name"><a href="' . esc_url( $post_detail['site_link'] ) . '">';
		$html .= $post_detail['site_name'];
		$html .= '</a></span>';
	}

	// Replace with event time & location

	$html .= '<span class="post-date posted-on date"><time class="entry-date published updated" datetime="' . $post_detail['post_date'] . '">';
	$html .= date_i18n( get_option( 'date_format' ), strtotime( $post_detail['post_date'] ) );
	$html .= '</time></span>';
	$html .= '<span class="post-author author vcard"><a href="' . esc_url( $post_detail['site_link'] . '/author/' . $post_detail['post_author'] ) . '">';
	$html .= $post_detail['post_author'];
	$html .= '</a></span>';
	$html .= '</div>';
}
if($show_excerpt) {
	$html .= '<div class="post-excerpt" itemprop="articleBody">' . $post_detail['post_excerpt'] . '</div>';
}
if($show_meta) {
	$html .= '<div class="meta">';
	$html .= ( isset( $post_categories ) ) ? '<div class="post-categories cat-links tags">' . $post_categories . '</div>' : '';
	$html .= '</div>';
}
$html .= '</li>';

?>