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
						<div class="grid-item col-lg-8 <?php //if($fullHeigit == 0 ){ echo "full-height"; } ?>">
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
		<div class="col-lg-3 sidebar-col">
			<div class="sidebar-navigation">
				
			</div>
			<div class="social-links">
				
			</div>
			<div class="events-dates">
				
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>