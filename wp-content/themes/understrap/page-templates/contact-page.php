<?php
/**
 * Template Name: Contact Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
			<div class="col-lg-4">
				<?php the_field('editor'); ?>
			</div>
			<div class="col-lg-8">
										<?php 
							$contactFormID = get_field('contact_form_id');

							$contactFormName = get_field('contact_form_name');

							echo do_shortcode( '[contact-form-7 id="'.$contactFormID.'" title="'.$contactFormName.'"]' );
						?>
			</div>

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer();
