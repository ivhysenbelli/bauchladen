<section class="section section-videos">
  <div class="container">
    <?php $count = count(get_sub_field(videos)); ?>
      <div class="row">
        <?php while(have_rows('videos')) : the_row(); ?>
          <div class="col-lg-<?php echo 12/$count; ?>">
            <div class="title"><?php the_sub_field('video_title'); ?></div>
            <a href="#">
              <?php $img = get_sub_field('video_thumbnail'); ?>
              <img src="<?php echo $img['url']; ?>" alt="">
            </a>
          </div>
        <?php endwhile; ?>
      </div>
  </div>
</section>
