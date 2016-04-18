
<header class="header">
	<div class="navigation-container fs-row">
		<div class="fs-cell">
			<a class="header-logo" href="<?= esc_url( home_url('/') ); ?>">
				<?php bloginfo('name'); ?>
			</a>
			<nav class="main-navigation">
				<?php
					if ( has_nav_menu( 'primary_navigation' ) ) :
						wp_nav_menu( [ 'theme_location' => 'primary_navigation', 'menu_class' => 'menu menu-main' ] );
					endif;
				?>
			</nav>
			<?php
				get_template_part( 'templates/content', 'social-media' );
			?>
			<button class="mobile-navigation-handle js-mobile-navigation-handle">Menu</button>
		</div>
	</div>
</header>
<?php
