<?php
	use Roots\Sage\Setup;
	use Roots\Sage\Wrapper;

?><!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<?php get_template_part( 'templates/head' ); ?>

	<body <?php body_class(); ?>>

		<a href="#page" id="skip-to-content" class="offscreen">Skip to Main Content</a>

		<!--[if IE]>
		<div class="alert alert-warning">
		<?php _e( 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage' ); ?>
		</div>
		<![endif]-->

		<?php
			do_action( 'get_header' );
			if ( ! is_front_page() ) :
				get_template_part( 'templates/header' );
			endif;
		?>
		<div class="page-wrapper js-mobile-navigation-push">
			<?php
				if ( is_front_page() ) :
					get_template_part( 'templates/header' );
				endif;
			?>
			<main id="page" class="page<?php if ( is_front_page() ) : echo " page-home"; endif; ?>" tabindex="-1" role="document">
				<?php 
					include Wrapper\template_path();
					get_template_part( 'templates/callout-images' );
				?>
				<div class="page-callouts fs-row">
					<?php
						get_template_part( 'templates/callout', 'email-form' );
						get_template_part( 'templates/callout', 'sponsors' );
					?>
				</div>
			</main><!-- /.main -->
			<?php
				do_action( 'get_footer' );
				get_template_part( 'templates/footer' );
			?>
		</div> <!-- /.page-wrapper -->
		<?php
			get_template_part( 'templates/mobile-navigation' );
			wp_footer();
		?>
	</body>
</html>
<?php
