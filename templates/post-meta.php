
<div class="post-meta">
	<time class="post-date" datetime="<?php echo get_post_time( 'c', true ); ?>"><?php the_date(); ?></time>
	<span class="post-author">
		<?= __( 'By', 'sage' ); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php the_author(); ?></a>
	</span>
</div>
<?php
