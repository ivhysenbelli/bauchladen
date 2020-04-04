<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-9 posts-col">
			<?php 
			$category = get_queried_object();
			$args = array(
			  'post_type'   => 'post',
			  'posts_per_page' => -1,
			  'tax_query' => array( 
					        array(
					            'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
					            'field'    => 'slug',
					            'terms'    => $category->category_nicename, // Your category slug (I have a category 'interior')
					        ),
					    )
			);
			$posts = get_posts( $args );
			?>
			<div class="title">
				<h2><?php echo $category->name ?></h2>
			</div>
			<div class="grid-view">
				<div class="row">
					<?php foreach ($posts as $post): ?>
						<?php if (has_post_thumbnail( $post->ID )): ?>
							<?php $fullHeight = get_field_object('show_full_height'); ?>
						<div class="grid-item col-lg-8 <?php if($fullHeight['value'] == ture) { echo "full-height";}?>">
							<a href="/<?php echo $category->category_nicename ?>/<?php echo $post->post_name ?>">
								<div class="single-item image-item">
									<div class="image" style="background-image: url('<?php the_post_thumbnail_url($post->ID); ?>');">
									</div>
									<div class="data">
																		<div class="title">
									<?php echo $post->post_title; ?>
								</div>
								<div class="content">
									<?php echo wp_trim_words($post->post_content, 30, "..."); ?>
								</div>
									</div>
								</div>
							</a>
						</div>
						<?php else: ?>
						<div class="grid-item col-lg-4">
							<a href="/<?php echo $category->category_nicename ?>/<?php echo $post->post_name ?>">
								<div class="single-item no-image-item">
									<div class="title">
										<?php echo $post->post_title; ?>
									</div>
									<div class="content">
										<?php echo wp_trim_words($post->post_content, 30, "..."); ?>
									</div>
								</div>
							</a>
						</div>
						<?php endif; ?>	

				<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>

		<?php 
		$today = current_time('d M, y');

		$args = array(
				'post_type' 		=> 'event',
				'posts_per_page' 	=>  -1,
				'meta_query'     => array (
					array (
                    	'key'        => 'course_date',
                        'compare'    => '>=',
                        'value'      => $today,
                        )
                    ),
				'orderby'			=> 'meta_value',
				'order'				=> 'ASC'
			);

		$termine = get_posts($args);
		?>
		<div class="col-lg-3 sidebar-col">
			<div class="sidebar-navigation">
				<h3>Kategorien </h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'categories_sidebar_menu',
					)
				); ?>
			</div>
			
			<div class="events-dates">
				<?php foreach ($termine as $termin):?>
				<?php echo $termin->post_title; 
									echo "</br>"; 

					 while(have_rows('kurs',$termin->ID)): the_row(); 
							setlocale(LC_TIME, "de_DE");
							$time = strtotime(str_replace('/', '-', get_sub_field('course_date')));
							$date = date('d.m.Y', strtotime(str_replace('/', '-', get_sub_field('course_date'))));
							$newformat = strftime('%a, ',$time);
							echo $newformat.$date;
					echo "</br>"; 
					 endwhile;
				endforeach; ?>
			</div>
			
			<div class="social-links">
				<h3><?php the_field("section_title",'options'); ?></h3>
				<div class="links">
					<?php while(have_rows("social_links",'options')) : the_row(); ?>
						<a href="<?php the_sub_field('link','options') ?>"><i class="fa fa-<?php the_sub_field('class','options') ?>"></i></a>
					<?php endwhile; ?>
				</div>
				
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>