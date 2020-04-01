<?php
/**
 * Template Name: About Me Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<div class="page-title">
					<h2><?php the_field('page_title'); ?></h2>
				</div>

				<div class="row">
					<div class="col-md-6">
						<?php $firstImage = get_field('image_a'); ?>
						<img src="<?php echo $firstImage['url']; ?>" alt="">
					</div>
					<div class="col-md-6">
						<?php $secondImage = get_field('image_b'); ?>
						<img src="<?php echo $secondImage['url']; ?>" alt="">
					</div>
				</div>

				<div class="row">
					<div class="col-12">
				<div class="custom-tab">
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					  	<?php $flag = true ?>
					  	<?php while(have_rows('tabs')): the_row(); ?>
					  	<?php $tabTitle = strtolower(str_replace(" ", "-", get_sub_field('tab_title'))) ?>
					    <a class="nav-item nav-link <?php if($flag == true) {echo "active";} ?>" id="nav-<?= $tabTitle ?>-tab" data-toggle="tab" href="#nav-<?= $tabTitle ?>" role="tab" aria-controls="nav-<?= $tabTitle ?>" aria-selected="true"><?php the_sub_field('tab_title'); ?></a>
					    <?php $flag = false; ?>
					    	<?php endwhile; ?>
					  </div>
						<div class="tab-content" id="nav-tabContent">
							<?php $flag2 = true ?>
							<?php while(have_rows('tabs')): the_row(); ?>
							<?php $tabTitle2 = strtolower(str_replace(" ", "-", get_sub_field('tab_title'))); ?>

						  <div class="tab-pane fade <?php if($flag2 == true) {echo "show active";} ?>" id="nav-<?= $tabTitle2 ?>" role="tabpanel" aria-labelledby="nav-<?= $tabTitle2 ?>-tab">
						  	<?php the_sub_field('editor'); ?>
						  </div>
						  <?php $flag2 = false ?>
						  <?php endwhile; ?>
						</div>
					
						</div>						
					</div>
				</div>

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer();
