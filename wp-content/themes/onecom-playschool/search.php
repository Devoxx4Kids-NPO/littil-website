<?php

/**
 * Search Page
 * @package Playschool
 */

get_header();

/* Get Post Layout */
$post_layout = ot_get_option('blog_layout');

$main_content_class = ($post_layout == 'full-width' ? 'col-md-12' : 'col-md-8');

?>
<!-- Get header title -->
<section class="page-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title text-center">
					<h1>
						<?php printf(__('Search Results for: %s', OC_TEXT_DOMAIN), '<span>' . get_search_query() . '</span>'); ?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- START Page Content -->
<section class="oct-main-section" role="main">
	<div class="container">
		<div class="row">

			<!-- Left Sidebar -->
			<?php if ($post_layout == 'left-sidebar') { ?>
				<aside class="col-md-4 sidebar main-sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>
			<?php }  ?>

			<!-- Main Content -->
			<div class="<?php echo $main_content_class; ?>">
				<?php
				/** If have content, show content else show no content */
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/content', 'blog');
					}
					the_posts_pagination();
				} else {
					get_template_part('template-parts/content', 'none');
				}
				?>
			</div>

			<!-- Right Sidebar -->
			<?php if ($post_layout == 'right-sidebar') { ?>
				<aside class="col-md-4 sidebar main-sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>

			<?php } ?>
		</div>
	</div>
	<!-- END Single CPT -->
</section>

<!-- END Page Content -->

<?php get_footer(); ?>