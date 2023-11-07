<?php
/*
* Template Name: List Your Space
*/

get_header();

$container   = get_theme_mod( 'understrap_container_type' );



$args = array(
    // Whether the title should be displayed or not (true/false)
    'display_title' => false,
    
    // Whether the description should be displayed or not (true/false)
    'display_description' => false,
    
    // Text used for the submit button
    'submit_text' => 'Submit',
    
    // The URL to which the form points. Defaults to the current URL which will automatically display a success message after submission
    // If this is overriden you may use af_has_submission to check for a form submission
    // 'target' => CURRENT_URL,
    
    // Whether the form output should be echoed or returned	
    'echo' => true,
    
    // Field values to pre-fill. Should be an array with format: $field_name_or_key => $field_prefill_value
    'values' => array(),
    
    // Array of field keys or names to exclude from form rendering
    'exclude_fields' => array(),
    
    // Either 'wp' or 'basic'. Whether to use the Wordpress media uploader or a regular file input for file/image fields.
    'uploader' => 'wp',
    
    // The URL to redirect to after a successful submission. Defaults to false for no redirection.
    'redirect' => false,
);

?>

<?php get_template_part( 'main-nav', 'none' ); ?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>
					<?php advanced_form( 'form_5c16e5b2a53a6', $args ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>


