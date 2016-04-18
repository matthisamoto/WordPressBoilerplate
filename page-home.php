<?php
	/**
	 * Template Name: Homepage Template
	 */	

	if ( have_posts() ):
		while ( have_posts() ) : the_post();
			get_template_part( 'templates/content', 'home' );
		endwhile;
	endif;
