<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-9 posts-col">
			<?php 
			$category = get_queried_object();
			$args = array(
			  'post_type'   => 'post',
			  'posts_per_page' => -1,
			  'cat' => $category->cat_ID,
			);
			$posts = get_posts( $args );
			?>
			<div class="title">
				<h2><?php echo $category->name ?></h2>
			</div>
			<div class="grid-view">
				<div class="row">
					<?php foreach ($posts as $post): ?>
						<?php 
						$post_categories = wp_get_post_categories( $post->ID );
						$cats = array();

						foreach($post_categories as $c){
						    $cat = get_category( $c );
						    $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
						}
						?>

						<?php if (has_post_thumbnail( $post->ID )):  
							$colVariable = "";
							switch (get_field('image_size',$post->ID)) {
							case 'full-box':
								$colVariable = 'col-lg-8 full-box';
								break;
							case 'two-one':
								$colVariable = 'col-lg-8 two-one';
								break;
							case 'one-two':
								$colVariable = 'col-lg-4 one-two';
								break;
							case 'one-one':
								$colVariable = 'col-lg-4 hide-image';
								break;
							default:
								$colVariable = 'col-lg-4 hide-image';
								break;
						} ?>
							<div class="grid-item <?php echo $colVariable; ?>">
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

		
					<!-- Get the custom right sidebar -->
			<?php get_template_part( 'global-templates/custom-right-sidebar' ); ?>
	</div>
</div>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>