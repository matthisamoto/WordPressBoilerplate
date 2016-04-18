<?php
	if ( have_rows( 'sidebar_callouts' ) ) :
?>
<div class="content-sidebar fs-cell-right">
	<?php
		while ( have_rows( 'sidebar_callouts' ) ) :
			the_row();
			get_template_part( 'templates/callout', get_row_layout() );
		endwhile;
	?>
</div>
<?php
	endif;
