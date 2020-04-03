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
				<?php foreach ($posts as $post): ?>
					<a href="/<?php echo $post->post_name ?>">
						<div class="grid-item">
							<div class="title">
								<?php echo $post->post_title; ?>
							</div>
							<div class="content">
								<?php echo wp_trim_words($post->post_content, rand(15,35), "..."); ?>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
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