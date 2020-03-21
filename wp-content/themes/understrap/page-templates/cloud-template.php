<?php
/**
 * Template Name: Cloud Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div id="fullpage" class="col-12">
			<?php
		if( have_rows('all_layouts') ):
     // loop through the rows of data
	    	while ( have_rows('all_layouts') ) : the_row();
					get_template_part( 'layouts/layout', 'cloud' );
	    	endwhile;
		else :
    	// no layouts found
		endif; ?>
		</div>
	</div>

</div>


<?php
get_footer();