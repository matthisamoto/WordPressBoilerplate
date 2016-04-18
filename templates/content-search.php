<?php
	global $query_string;

	$query_args = explode( "&", $query_string );
	$search_query = array();

	if ( strlen( $query_string ) > 0 ) :
		foreach ( $query_args as $key => $string ) :
			$query_split = explode( "=", $string );
			$search_query[ $query_split[0] ] = urldecode( $query_split[1] );
		endforeach;
	endif;

	$search = new WP_Query( $search_query );
?>
<div class="content-wrapper">
	<div class="fs-row">
	
		<!-- Main Content -->
		<div class="content-main content-search fs-cell-centered fs-lg-8">
			<header>
				<?php
					get_search_form();
				?>
			</header>
			<?php
				if ( is_search() ) :
			?>
			<div class="search-results blog">
				<?php 
					
					if ( ! $search->have_posts() ) :
				?>
				<div class="alert alert-warning wysiwyg">
					<h2><?php _e( 'Sorry, no results were found for &ldquo; ' . get_search_query() . ' &rdquo;', 'sage' ); ?></h2>
				</div>
				<?php
					else :
				?>
				<div class="wysiwyg">
					<h2>Search results for &ldquo; <?php echo get_search_query(); ?> &rdquo;</h2>
				</div>
				<?php

						while ( $search->have_posts() && is_search() ) : $search->the_post();
							get_template_part( 'templates/post', 'search' );
						endwhile;

						the_posts_navigation();
					endif; 

					wp_reset_postdata();
				?>
			</div>
			<?php
				endif;
			?>
		</div>
	</div>
</div>
<?php
