
<div class="mobile-navigation js-mobile-navigation" data-navigation-handle=".js-mobile-navigation-handle" data-navigation-content=".js-mobile-navigation-push">
	<div class="mobile-navigation-wrapper">
		<?php
			if ( has_nav_menu( 'primary_navigation' ) ) :
				wp_nav_menu( [ 'theme_location' => 'primary_navigation', 'menu_class' => 'menu menu-mobile' ] );
			endif;
			
			get_template_part( 'templates/content', 'social-media' );
		?>
	</div>
</div>
<?php
