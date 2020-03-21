<?php
if( have_rows('layouts') ):
	// loop through the rows of data
	while ( have_rows('layouts') ) : the_row();
		
		if( get_row_layout() == 'section_banner' ):
			get_template_part( 'sections/section', 'banner' );
		endif;
		if( get_row_layout() == 'section_two_columns_info' ):
			get_template_part( 'sections/section', 'two-columns-info' );
		endif;
		if( get_row_layout() == 'section_single_column_info' ):
			get_template_part( 'sections/section', 'single-column-info' );
		endif;
		if( get_row_layout() == 'section_clients' ):
			get_template_part( 'sections/section', 'clients' );
		endif;
		if( get_row_layout() == 'section_counter' ):
			get_template_part( 'sections/section', 'counter' );
		endif;
		if( get_row_layout() == 'section_tiles' ):
			get_template_part( 'sections/section', 'tiles' );
		endif;
		if( get_row_layout() == 'section_tabs' ):
			get_template_part( 'sections/section', 'tabs' );
		endif;
		if( get_row_layout() == 'section_references' ):
			get_template_part( 'sections/section', 'references' );
		endif;
	endwhile;
endif;