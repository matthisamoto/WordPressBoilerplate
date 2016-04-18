
<div class="content-wrapper">
	<div class="fs-row">

		<!-- Sidebar Navigation -->
		<?php get_template_part( 'templates/sidebar', 'navigation' ); ?>

		<!-- Main Content -->
		<div class="content-main fs-cell wysiwyg">
			<?php the_content(); ?>
		</div>

		<!-- Sidebar Content -->
		<?php get_template_part( 'templates/sidebar', 'callouts' ); ?>
	</div>
</div>
<?php
