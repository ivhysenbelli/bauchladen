<section class="section section-testimonials">
<div class="container">
  	<div class="row">
  		<div class="col-12">
			<div class="title">
		        <h2><?php the_sub_field('section_title') ?></h2>
		      </div>
		      <div class="subtitle">
		          <?php if(!empty(get_sub_field('editor'))): ?>
		            <p class="header-description">
		              <?php the_sub_field('editor'); ?>
		            </p>
		        <?php endif; ?>
		      </div>
		  	</div>
		  	<div class="col-12">
		  		<div class="testimonials">
			  		<?php $action = get_sub_field('testimonials_shortcode'); ?>
			  		<?php echo do_shortcode($action); ?>
		  		</div>
		  	</div>
  		</div>
  </div>  
</section>
