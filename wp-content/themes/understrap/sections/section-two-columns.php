<?php $background = get_sub_field_object('background_color'); ?>
<section class="section section-two-columns <?php if($background['value'] == true) { echo "has-bg"; } ?>" id="<?php strtolower(the_sub_field('section_id')); ?>">
	<?php $order = get_sub_field('order'); ?>
	<div class="row <?php if ($order == "rtl") { echo "flex-row-reverse"; } ?>">
		<div class="col-md-12 col-lg-6 image-col">
			<?php $image = get_sub_field('image') ?>
			<img src="<?php echo$image['url']; ?>" alt="">
		</div>
		<div class="col-md-12 col-lg-6 data-col">
			<div class="data">
				<div class="title">
					<h2><?php the_sub_field('title'); ?></h2>
				</div>
				<div class="description">
					<p><?php the_sub_field('editor'); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>