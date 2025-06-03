<?php
/**
 * Funciones personalizadas para el child theme de Esparta Digital.
 */

// Desacopla estilos/scripts innecesarios de WordPress
function espartadigital_optimize_assets() {
	// Elimina estilos y scripts del theme padre
	wp_dequeue_script('portion-navigation');
	wp_deregister_script('portion-navigation');
	wp_dequeue_style('portion-style');
	wp_deregister_style('portion-style');

	// Core Gutenberg / Bloques
	wp_dequeue_style('wp-block-library');
	wp_deregister_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_deregister_style('wp-block-library-theme');
	wp_dequeue_style('global-styles');
	wp_deregister_style('global-styles');

	// WooCommerce
	wp_dequeue_style('wc-block-style');
	wp_deregister_style('wc-block-style');

	// CSS principal del child
	wp_enqueue_style('espartadigital-child-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'espartadigital_optimize_assets', 100);

// Elimina emojis y SVGs inyectados por WordPress
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

// Limpia metadata innecesaria del head
remove_action('wp_generator', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Desactiva embed
function espartadigital_disable_embeds_code_init() {
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request');
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'espartadigital_disable_embeds_code_init', 999);

// Evita carga de jQuery migrate si no es necesario
function espartadigital_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, ['jquery-migrate'] );
		}
	}
}
add_filter( 'wp_default_scripts', 'espartadigital_remove_jquery_migrate' );