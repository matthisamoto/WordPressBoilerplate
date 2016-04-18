
<article <?php post_class( 'post-listing' ); ?>>
	<?php
		$responsive_image = bm_responsive_image( bm_images_news_listing( get_post_thumbnail_id() ), 'post-listing-thumbnail' );
			if ( $responsive_image ) :
	?>
	<figure class="post-listing-image">
		<a href="<?php the_permalink(); ?>">
			<?php
				echo $responsive_image;
			?>
		</a>
	</figure>
	<?php
		endif;
	?>
	<header class="post-header">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<?php get_template_part( 'templates/post-meta' ); ?>
	<div class="post-summary wysiwyg">
		<?php the_advanced_excerpt(); ?>
	</div>
</article>
<?php
