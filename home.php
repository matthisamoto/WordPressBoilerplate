<?php
	/**
	 *	This is the blog template! 
	 *	WordPress won't let me name it something that makes sense!
	 */

	get_template_part( 'templates/page', 'header' );
?>
<div class="content-wrapper">
	<div class="fs-row">

		<!-- Main Content -->
		<div class="content-main content-main-blog fs-cell fs-xl-10 fs-xl-push-1">
			<?php
				// If no posts, apologize!
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
			?>
		</div>

	</div>
</div>
<?php
