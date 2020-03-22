<?php $image = get_sub_field('banner_image') ?>
<section class="section section-main-banner" style="background-image: url('<?php echo $image['url']; ?>');">

	<?php $announcement = get_sub_field_object('show_announcement') ?>
	<?php if($announcement['value'] ==  true): ?>
		<div class="announcemet-wrapper">
			<div class="announcemet">
				<div class="text">
					<?php the_sub_field('announcement_text'); ?>
				</div>
				<div class="button">
					<a href="<?php the_sub_field('cta_link') ?>"><?php the_sub_field('cta_text'); ?></a>
				</div>
			</div>
		</div>
	<?php endif;?>
	
	<div class="data">
		<div class="logo">
			<?php $logo = get_sub_field('logo_image'); ?>
			<img src="<?php echo $logo['url']; ?>" alt="">
		</div>
		<div class="logo-text">
			<p><?php the_sub_field('logo_text'); ?></p>
		</div>
	</div>
</section>