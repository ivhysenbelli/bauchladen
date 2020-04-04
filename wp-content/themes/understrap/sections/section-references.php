<section class="section section-references" id="<?php strtolower(the_sub_field('section_id')); ?>">
	<div class="container">
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

		  <div class="row">
		  	<div class="col-12">
		  		<div class="owl-carousel">
		  			<?php foreach(get_sub_field('gallery') as $singleImage): ?>
		  				<img src="<?php echo $singleImage['url']; ?>" alt="">
		  			<?php endforeach; ?>
		  		</div>
		  	</div>
		  </div>
	</div>
</section>
