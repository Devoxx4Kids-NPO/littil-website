<?php

/**
 * Single Page
 * @package Playschool
 */

get_header();

/* Get Page Layout */
$page_layout = ot_get_option('single_page_layout');
$single_layout = get_post_meta(get_the_ID(), 'single_post_page_layout', true);
if ($single_layout != false) {
	$page_layout = $single_layout;
}

$main_content_class = ($page_layout == 'full-width' ? 'col-md-12' : 'col-md-8');

?>
<?php if (have_posts()) the_post(); ?>

<!-- START Page Content -->
<section class="oct-main-section" role="main">
	<div class="container">
		<div class="row">

			<!-- Left Sidebar -->
			<?php if ($page_layout == 'left-sidebar') { ?>
				<aside class="col-md-4 sidebar main-sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>
			<?php } ?>

			<!-- Main Content -->
			<main class="<?php echo $main_content_class; ?>">
				<?php
				get_template_part('template-parts/content', 'page');
				?>
			</main>

			<!-- Right Sidebar -->
			<?php if ($page_layout == 'right-sidebar') { ?>
				<aside class="col-md-4 sidebar main-sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>

			<?php } ?>
		</div>
	</div>
</section>

<!-- END Page Content -->

<?php get_footer(); ?>