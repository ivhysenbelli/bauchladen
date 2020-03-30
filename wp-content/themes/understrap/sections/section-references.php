<section class="section section-references">
  <div class="row">
  	<div class="col-12">
  		<div class="owl-carousel">
  			<?php foreach(get_sub_field('gallery') as $singleImage): ?>
  				<img src="<?php echo $singleImage['url']; ?>" alt="">
  			<?php endforeach; ?>
  		</div>
  	</div>
  </div>
</section>
