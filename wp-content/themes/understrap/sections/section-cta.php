<section class="section section-cta">
	<div class="container">
		<div class="row">
  			<div class="col-12">
  				<div class="details-row main-details">
					<div class="single-col descripton-col">
						<p class="description">
							<?php wpautop(the_sub_field('section_description')); ?>
						</p>
						</div>
					<div class="single-col button-col">
						<a href="<?php the_sub_field('button_url') ?>"><?php the_sub_field('button_title') ?></a> 
					</div>
				</div>
  			</div>
  		</div>
	</div>
</section>