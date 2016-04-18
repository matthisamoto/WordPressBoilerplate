
<article <?php post_class( 'post-listing' ); ?>>
	<header class="post-header">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<?php
		if ( $post->post_type == "post" ) :
			get_template_part( 'templates/post-meta' );
		endif;
	?>
	<div class="post-summary wysiwyg">
		<p><?php the_excerpt_rss(); ?></p>
	</div>
</article>
<?php
