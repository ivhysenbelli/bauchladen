<section class="section section-imge-text" id="<?php strtolower(the_sub_field('section_id')); ?>">
  <div class="container">
    <div class="row">
      <div class="title">
        <h2><?php the_sub_field('section_title') ?></h2>
      </div>
      <div class="subtitle">
          <?php if(!empty(get_sub_field('section_description'))): ?>
            <p class="header-description">
              <?php the_sub_field('section_description'); ?>
            </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php while(have_rows('informations')): the_row(); ?>
        <div class="col-sm-12 col-md-6 col-lg-4 single-col">
          <div class="data">
            <?php $image = get_sub_field('image'); ?>
            <img src="<?php echo $image['url']; ?>" alt="">
            <p class="description">
              <?php the_sub_field('editor'); ?>
            </p>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <?php $extra = get_sub_field_object('show_extra_info'); ?>
  <?php if($extra['value'] == TRUE): ?>
    <?php $hasBg = get_sub_field_object('has_background'); ?>
    <div class="extra-info section-extra-info <?php if($hasBg['value'] == TRUE ){echo "has-bg";} ?>">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 single-col">
            <p><?php the_sub_field('text'); ?></p>
          </div>
          <div class="col-lg-3 single-col">
            <a href="<?php the_sub_field('cta_link') ?>"><?php the_sub_field('cta_text') ?> <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  <?php endif;?>
</section>
