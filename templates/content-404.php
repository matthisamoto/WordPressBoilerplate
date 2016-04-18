
<div class="content-wrapper">
	<div class="fs-row">
		<!-- Main Content -->
		<div class="content-main fs-cell-centered fs-lg-8 fs-xl-7 wysiwyg">
			<h2>Sorry, we couldn't find that page.</h2>
			<p>Head back to the <a href="<?= esc_url( home_url( '/' ) ); ?>">homepage</a>, or search for what you're looking for below.</p>
			<?php
				get_search_form();
			?>
		</div>
	</div>
</div>
<?php
