<div class="col-lg-3 sidebar-col">
			<div class="affix">
				<div class="sidebar-search">
					<?php get_search_form(); ?>
				</div>
				<div class="sidebar-navigation">
					<h3>Kategorien</h3>
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'categories_sidebar_menu',
						)
					); ?>
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