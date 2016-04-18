<?php

$PREFIX_root = get_template_directory();

function PREFIX_include_directory( $directory = false ) {
	global $_root;

	$filepath = $_root . '/' . $directory;

	if ( is_dir( $filepath ) ) {
		foreach ( glob( $filepath . '/*.php' ) as $file ) {
			require_once $file;
		}
	} else {
		trigger_error( sprintf( __( 'Error locating directory %s for inclusion', 'sage' ), $filepath ), E_USER_ERROR );
	}
}


/* Output Buffering
============================================================================= */

function PREFIX_output_buffering() {
	ob_clean();
	ob_start();
}

add_action( 'init', 'PREFIX_output_buffering' );


/* Sage Includes
============================================================================= */

_include_directory( "lib" );


/* Custom Post Types + Fields
============================================================================= */

_include_directory( "fields" );
_include_directory( "post_types" );


/* Add image crop sizes
============================================================================= */

function PREFIX_add_image_sizes() {
	/*
	// 16:9
	add_image_size( 'wide-xsmall', 295, 165, true );
	add_image_size( 'wide-small',  360, 202, true );
	add_image_size( 'wide-medium', 470, 264, true );
	add_image_size( 'wide-large',  770, 433, true );
	add_image_size( 'wide-xlarge', 1440, 810, true );

	// 4x3
	add_image_size( 'ratio-4-3-small',  300, 225, true );
	add_image_size( 'ratio-4-3-medium', 470, 353, true );
	add_image_size( 'ratio-4-3-large',  740, 555, true );
	add_image_size( 'ratio-4-3-xlarge', 1440, 1080, true );

	// Golden Ratio
	add_image_size( 'ratio-gold-small',  300, 300 * 0.618, true );
	add_image_size( 'ratio-gold-medium', 470, 470 * 0.618, true );
	add_image_size( 'ratio-gold-large',  740, 740 * 0.618, true );
	add_image_size( 'ratio-gold-xlarge', 1440, 1440 * 0.618, true );

	// Square
	add_image_size( 'square-xsmall', 160, 160, true );
	add_image_size( 'square-small',  300, 300, true );
	add_image_size( 'square-medium', 470, 470, true );
	add_image_size( 'square-large',  800, 800, true );
	*/
}

add_action( 'init', 'PREFIX_add_image_sizes', 0 );


/* Build responsive image with picturefill
============================================================================= */

function PREFIX_responsive_background( $images = false ) {
	if ( ! $images ) {
		return false;
	}

	return htmlentities( json_encode( array( 'source' => $images ) ) );
}

function PREFIX_responsive_image( $images = false, $class = '', $alt = '' ) {
	if ( ! $images ) {
		return false;
	}

	$images = array_reverse( $images );
	$html_all = array();
	$html_ie8 = array();

	foreach ( $images as $media => $image ) {
		if ( 'fallback' !== $media ) {
			$html_all[] = '<source media="' . $media . '" srcset="' . $image . '">';
			$html_ie8[] = '<span class="mimeo-source" media="' . $media . '" srcset="' . $image . '"></span>';
		} else {
			$fallback = $image;
			$html_all[] = '<source media="(min-width: 0px)" srcset="' . $image . '">';
			$html_ie8[] = '<span class="mimeo-source" media="(min-width: 0px)" srcset="' . $image . '"></span>';
		}
	}

	$html = '';
	$html .= '<picture class="responsive_image ' . $class . '">';
	$html .= '<!--[if IE 9]><video style="display: none;"><![endif]-->';
	$html .= implode( '', $html_all );

	$html .= '<!--[if IE 9]></video><![endif]-->';
	$html .= '<img src="' . $fallback . '" alt="' . $alt . '" draggable="false">';
	$html .= '</picture>';

	return $html;
}

// Image crop sets

/*
function PREFIX_images_page_header( $image ) {
	if ( ! $image ) {
		return false;
	}

	$wide_medium  = wp_get_attachment_image_src( $image, 'wide-medium' );
	$wide_large   = wp_get_attachment_image_src( $image, 'wide-large' );
	$wide_xlarge  = wp_get_attachment_image_src( $image, 'wide-xlarge' );
	
	return array(
		'0px'    => $wide_medium[0],
		'500px'  => $wide_large[0],
		'740px'  => $wide_medium[0],
		'980px'  => $wide_xlarge[0],
	);
}
*/

function PREFIX_json_attribute($data) {
	if (is_array($data)) {
		$data = json_encode($data);
	}
	return htmlentities($data);
}


/* Serve Search results through Search Page template
============================================================================= */

function PREFIX_search_page_template( $template ) {
	if ( is_search() ) {
		$new_template = locate_template( array( 'searchpage.php' ) );

		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}

add_filter( 'template_include', 'PREFIX_search_page_template' );


/* Load Modernizr file
============================================================================= */

function PREFIX_add_modernizr() {
	wp_enqueue_script( "fonts", get_template_directory_uri() . "/dist/scripts/modernizr.js", array(), false, false );
}

add_action( "wp_enqueue_scripts", "PREFIX_add_modernizr", 10 );


/* Load Fonts from Hoefler & Co. | Typography.com
============================================================================= */

function PREFIX_add_fonts() {
	wp_enqueue_style( "fonts", FONTS_URL, 100 );
}

add_action( "wp_enqueue_scripts", "PREFIX_add_fonts" );


/* Add Formstone grid class 'fs-grid' to, remove 'page' from <body>
============================================================================= */

function PREFIX_add_grid_class_to_body($classes) {
	$classes[] = 'fs-grid';
	$classes = array_diff( $classes, array("page") );

	return $classes;
}

add_filter( "body_class", "PREFIX_add_grid_class_to_body" );


/* Remove 'page' class from posts
============================================================================= */

function PREFIX_remove_page_class_from_post_class($classes) {
	$classes = array_diff( $classes, array("page") );

	return $classes;
}

add_filter( "post_class", "PREFIX_remove_page_class_from_post_class" );


/* Add Google Analytics script
============================================================================= */

add_theme_support( 'soil-google-analytics', 'UA-'. GOOGLE_ANALYTICS_ACCOUNT, 'wp_footer' );


/* Add Gridlock Grid Indicator - Displays a ghosted overlay of the grid
============================================================================= */

function PREFIX_gridlock() {
?>
	<script>(function(){if(typeof FSGridBookmarklet==='undefined'){document.body.appendChild(document.createElement('script')).src='//formstone.it/js/bookmarklet/grid.js';}else{FSGridBookmarklet();}})();</script>
<?php
}

// add_action( "wp_footer", "PREFIX_gridlock", 300 );
