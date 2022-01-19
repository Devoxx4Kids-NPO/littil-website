<?php

/**
 * 404 Error page
 * @package Playschool
 */

get_header();

/* Get Post Layout */
$post_layout = ot_get_option('blog_layout');

$main_content_class = ($post_layout == 'full-width' ? 'col-md-12' : 'col-md-8');

?>
<!-- Get header title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="page-title text-center">
				</div>
			</div>
		</div>
	</div>
</section>


<!-- START Page Content -->
<section class="oct-main-section" role="main">

	<!-- START Single CPT -->
	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
		<div class="container">
			<div class="row">

				<!-- Left Sidebar -->
				<?php if ($post_layout == 'left-sidebar') { ?>
					<aside class="col-md-4 sidebar main-sidebar" role="complementary">
						<?php dynamic_sidebar('sidebar-1'); ?>
					</aside>
				<?php }

				?>

				<div class="<?php echo $main_content_class; ?>">
					<?php
					// Show custom 404 content from advance options
					echo ot_get_option('404_content');
					// If no content, include the "No posts found" template.
					get_template_part('template-parts/content', 'none');
					?>
				</div>

				<!-- Right Sidebar -->
				<?php if ($post_layout == 'right-sidebar') { ?>
					<aside class="col-md-4 sidebar main-sidebar" role="complementary">
						<?php dynamic_sidebar('sidebar-1');
						?>
					</aside>

				<?php } ?>
			</div>
	</article>
	<!-- END Single CPT -->
</section>


<!-- END Page Content -->

<?php get_footer(); ?>