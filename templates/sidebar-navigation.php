<?php
	$page_id = get_the_id();

	$sidebar_args = array(
		'child_of' => $page_id,
		'depth' => '1',
		'title_li' => ''
	);

	$children_args = array(
		'post_parent' => $page_id
	);

	if ( get_children( $children_args ) ) :
?>
<div class="content-sidebar fs-cell-right fs-lg-4 fs-xl-3 fs-xl-push-1">
	<article class="navigation-sidebar callout-sidebar content-section">
		<header class="content-section-header js-sidebar-navigation-handle">
			<h2 class="content-section-heading ">Navigation</h2>
		</header>
		<div class="content-menu-sidebar content-box content-news js-sidebar-navigation" data-navigation-options='{"labels":{"closed":"Navigation", "open":"Close"},"theme": "none"}' data-navigation-handle=".js-sidebar-navigation-handle">
			<nav class="menu-sidebar-nav">
				<ul class="menu menu-sidebar">
					<?php
						wp_list_pages( $sidebar_args );
					?>
				</ul>
			</nav>
		</div>
	</article>
</div>
<?php
	endif;
