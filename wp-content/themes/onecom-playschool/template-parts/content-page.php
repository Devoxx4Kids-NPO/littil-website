<?php

/**
 * Single page main content
 */

?>

<div class="col-md-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class('oct-main-content'); ?>>

		<!-- Starts Featured image -->
		<?php
		// Check if featured video enabled or featured image exists, else set default image.
		if (has_post_thumbnail()) { ?>
			<figure class="featured-media">
				<?php
					the_post_thumbnail('oct-medium', array('class' => 'img-fluid'));
					?>
			</figure>
		<?php }
		?>
		<!-- Ends Featured image -->

		<!-- Page/Post Title -->
		<h1 class="oct-post-title">
			<?php the_title(); ?>
		</h1>
		<!-- Ends Page/Post title -->

		<!-- Starts Post content excerpt -->
		<div class="oct-post-content">
			<?php
			the_content();
			edit_post_link(' edit', '<div class="clearfix">', '</div>');
			?>
		</div>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;
		?>
	</article>
</div>