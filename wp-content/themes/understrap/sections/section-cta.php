<section class="section section-cta">
	<div class="contaniner">
		<div class="row">
  			<div class="col-12">
  				<div class="details-row main-details">
					<div class="single-col descripton-col">
						<p class="description">
							<?php wpautop(the_field('description','options')); ?>
						</p>
						</div>
					<div class="single-col button-col">
						<span class="btn-toggle"> <?php the_field('button_title','options') ?> </span> 
					</div>
				</div>
  			</div>
  		</div>
	</div>
</section>