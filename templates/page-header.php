<?php
	use Roots\Sage\Titles;

	$image = get_post_thumbnail_id();

	if ( is_home() ) :
		$image = get_post_thumbnail_id( get_option( 'page_for_posts' ) );
	endif;

	$responsive_image = bm_responsive_background(bm_images_page_header( $image ) );
?>
<div class="page-header<?php if ( $responsive_image ) : echo ' js-background" data-background-options="' . $responsive_image;  endif; ?>">
	<div class="page-title-container">
		<div class="fs-row">
			<div class="fs-cell wysiwyg">
				<h1 class="page-title"><?= Titles\title(); ?></h1>
			</div>
		</div>
	</div>
</div>
<?php
