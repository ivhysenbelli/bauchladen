<?php $image = get_sub_field('banner_image') ?>
				<section class="section section-main-banner" style="background-image: url('<?php echo $image['url']; ?>');">
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