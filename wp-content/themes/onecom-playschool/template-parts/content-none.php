<article id="post-<?php the_ID(); ?>" <?php post_class('oct-main-content'); ?>>

	<!-- Page/Post Title -->
	<h1 class="oct-post-title">
		<?php the_title(); ?>
	</h1>
	<!-- Ends Page/Post title -->

	<!-- Starts Post content excerpt -->
	<div class="oct-post-content">
		<?php if (is_search()) {
			?>
		<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentynineteen'); ?></p>
		<?php
		} else {
			?>
		<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentynineteen'); ?></p>
		<?php
		} ?>

		<?php get_search_form(); ?>
	</div>

</article>