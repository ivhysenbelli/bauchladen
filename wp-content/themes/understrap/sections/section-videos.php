<section class="section section-videos" id="<?php strtolower(the_sub_field('section_id')); ?>">
  <div class="container">
    <?php $count = count(get_sub_field('videos')); ?>
      <div class="row">
        <?php while(have_rows('videos')) : the_row(); ?>
          <div class="col-lg-<?php echo 12/$count; ?> single-col">
            <div class="title"><?php the_sub_field('video_title'); ?></div>
            <a href="<?php the_sub_field('video_url') ?>" rel="prettyPhoto" >
              <?php $img = get_sub_field('video_thumbnail'); ?>
              <img src="<?php echo $img['url']; ?>" alt="">
              <span class="video-button"></span>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
  </div>
</section>
