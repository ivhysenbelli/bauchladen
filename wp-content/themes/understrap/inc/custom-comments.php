<?php
/**
 * Comment layout
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Comments form.
add_filter( 'comment_form_default_fields', 'understrap_bootstrap_comment_form_fields' );

/**
 * Creates the comments form.
 *
 * @param string $fields Form fields.
 *
 * @return array
 */

if ( ! function_exists( 'understrap_bootstrap_comment_form_fields' ) ) {

	function understrap_bootstrap_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );
		$html5     = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
		$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		$fields    = array(
			'author'  => '<div class="main-form-group"><div class="form-group comment-form-author">
						<input class="form-control" id="author" placeholder="Name*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '></div>',
			'email'   => '<div class="form-group comment-form-email">
			            <input class="form-control" id="email" placeholder="Mail Adress*" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '></div></div>',
		);

		return $fields;
	}
} // endif function_exists( 'understrap_bootstrap_comment_form_fields' )

add_filter( 'comment_form_defaults', 'understrap_bootstrap_comment_form' );

/**
 * Builds the form.
 *
 * @param string $args Arguments for form's fields.
 *
 * @return mixed
 */

if ( ! function_exists( 'understrap_bootstrap_comment_form' ) ) {

	function understrap_bootstrap_comment_form( $args ) {
		$args['comment_field'] = '<div class="form-group comment-form-comment">
	    <textarea class="form-control" id="comment" placeholder="Bitte schreiben Sie hier Ihren Kommentar..." name="comment" aria-required="true" cols="45" rows="8"></textarea>
	    </div>';
		$args['class_submit']  = 'btn btn-secondary'; // since WP 4.1.
		return $args;
	}
} // endif function_exists( 'understrap_bootstrap_comment_form' )
