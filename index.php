<?php
	get_template_part( 'templates/page', 'header' );
	
	if ( ! have_posts() ) :
?>
  <div class="alert alert-warning">
    <?php _e( 'Sorry, no results were found.', 'sage' ); ?>
  </div>
<?php
		get_search_form();
	endif;

	while ( have_posts() ) : the_post();
		get_template_part( 'templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format() );
	endwhile;

	the_posts_navigation();
