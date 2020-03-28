<section class="section section-text">
<div class="container">
  	<div class="row">
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
  </div>  
</section>
