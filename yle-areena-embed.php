<?php

/**
 * Plugin Name: Yle Areena embed
 * Description: This plugin allows you to easily add Yle Areena videos to the site by simply copying their URL and pasting it into your content. The same way as with Youtube and Vimeo URLs.
 * Version: 2024.5.21
 * Update URI: https://github.com/kendafi/yle-areena-embed/
 * Author: Kenda
 * Author URI: https://kenda.fi
 * Text Domain: yle-areena-embed
 * Domain Path: /languages
 *
 * This can handle links like https://areena.yle.fi/1-4477136 and also in Swedish https://arenan.yle.fi/1-3751167
 *
 * If the video is not allowed to be embedded (like https://areena.yle.fi/1-1761713), then a preview image is displayed and it links to the video on Yle Areena.
 *
 * This plugin has no settings page.
 *
 */

function wp_embed_handler_yleareena( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
		'<div class="yle_areena_player" data-id="%1$s"></div><script src="https://player-v2.yle.fi/embed.js" defer></script>',
		esc_attr( $matches[1] )
	);

	return apply_filters( 'embed_forbes', $embed, $matches, $attr, $url, $rawattr );

}

add_action( 'init', function() {

	wp_embed_register_handler(
		'yle-areena',
		'#https://areena\.yle\.fi/([\d\-\d]+)/?#i',
		'wp_embed_handler_yleareena'
	);

} );

// Samma på svenska.

function wp_embed_handler_ylearenan( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
		'<div class="yle_areena_player" data-id="%1$s" data-locale="swe"></div><script src="https://player-v2.yle.fi/embed.js" defer></script>',
		esc_attr( $matches[1] )
	);

	return apply_filters( 'embed_forbes', $embed, $matches, $attr, $url, $rawattr );

}

add_action( 'init', function() {

	wp_embed_register_handler(
		'yle-arenan',
		'#https://arenan\.yle\.fi/([\d\-\d]+)/?#i',
		'wp_embed_handler_ylearenan'
	);

} );
