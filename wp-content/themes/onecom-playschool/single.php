<?php

/**
 * Single Post
 * @package Playschool
 */

get_header();
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

<?php
/* Get Post Layout */
$post_layout = ot_get_option('single_post_layout');
$single_layout = get_post_meta(get_the_ID(), 'single_post_page_layout', true);
if ($single_layout != false) {
	$post_layout = $single_layout;
}

$main_content_class = ($post_layout == 'full-width' ? 'col-md-12' : 'col-md-8');

?>
<?php if (have_posts()) the_post(); ?>

<!-- START Page Content -->
<section class="oct-main-section" role="main">
	<div class="container">
		<div class="row">

			<!-- Left Sidebar -->
			<?php if ($post_layout == 'left-sidebar') { ?>
				<aside class="col-md-4 sidebar main-sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>
			<?php } ?>

			<!-- Main Content -->
			<main class="<?php echo $main_content_class; ?>">
				<?php
				get_template_part('template-parts/content', 'single');
				?>
			</main>

			<!-- Right Sidebar -->
			<?php if ($post_layout == 'right-sidebar') { ?>
				<aside class="col-md-4 sidebar main-sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>

			<?php } ?>
		</div>
	</div>
</section>

<!-- END Page Content -->

<?php get_footer(); ?>