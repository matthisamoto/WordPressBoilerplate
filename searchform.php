
<article class="search-module">
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<fieldset class="search-fieldset">
			<label class="screen-reader-text offscreen" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
			<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search" />
			<input type="submit" class="search-submit" id="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
		</fieldset>
	</form>
</article>
<?php
