<?php
	while ( have_posts() ) : the_post();
?>
<div class="content-wrapper">
	<div class="fs-row">

		<!-- Main Content -->
		<div class="content-main fs-cell-centered fs-lg-8">
			<article <?php post_class(); ?>>
				<?php
					$responsive_image = bm_responsive_image( bm_images_news_feature_image( get_post_thumbnail_id() ), 'post-feature-image-thumbnail' );
						if ( $responsive_image ) :
				?>
				<figure class="post-feature-image">
					<?php
						echo $responsive_image;
					?>
				</figure>
				<?php
					endif;
				?>
				<header class="post-header">
					<h1 class="post-title"><?php the_title(); ?></h1>
					<?php get_template_part( 'templates/post-meta' ); ?>
				</header>
				<div class="post-content wysiwyg">
					<?php the_content(); ?>
				</div>
				<footer class="post-footer">
					<?php wp_link_pages( [ 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ), 'after' => '</p></nav>' ] ); ?>
				</footer>
			</article>
		</div>
	</div>
</div>
<?php
	endwhile;
