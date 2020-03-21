<?php
if( have_rows('layouts') ):
	// loop through the rows of data
	while ( have_rows('layouts') ) : the_row();
		
		if( get_row_layout() == 'section_main_banner' ):
			get_template_part( 'sections/section', 'main-banner' );
		endif;
		
	endwhile;
endif;