<?php
if( have_rows('layouts') ):
	// loop through the rows of data
	while ( have_rows('layouts') ) : the_row();

		if( get_row_layout() == 'section_main_banner' ):
			get_template_part( 'sections/section', 'main-banner' );
		endif;

		if( get_row_layout() == 'section_two_columns' ):
			get_template_part( 'sections/section', 'two-columns' );
		endif;

		if( get_row_layout() == 'section_image_text' ):
			get_template_part( 'sections/section', 'image-text' );
		endif;

		if( get_row_layout() == 'section_videos' ):
			get_template_part( 'sections/section', 'videos' );
		endif;

		if( get_row_layout() == 'section_termine' ):
			get_template_part( 'sections/section', 'termine' );
		endif;

		if( get_row_layout() == 'section_text' ):
			get_template_part( 'sections/section', 'text' );
		endif;

		if( get_row_layout() == 'section_testimonials' ):
			get_template_part( 'sections/section', 'testimonials' );
		endif;

		if( get_row_layout() == 'section_links' ):
			get_template_part( 'sections/section', 'links' );
		endif;

		if( get_row_layout() == 'section_references' ):
			get_template_part( 'sections/section', 'references' );
		endif;

		if( get_row_layout() == 'section_cta' ):
			get_template_part( 'sections/section', 'cta' );
		endif;

	endwhile;
endif;
