<section id="<?php strtolower(the_sub_field('section_id')); ?>" class="section section-links">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="page-title">
					<h2><?php the_sub_field('section_title'); ?></h2>
				</div>
			</div>
			<?php while(have_rows('links')): the_row(); ?>
				<div class="col-lg-4 link-col">
					<?php the_sub_field('link'); ?>
				</div>
			<?php endwhile;?>
		</div>
	</div>
</section>
