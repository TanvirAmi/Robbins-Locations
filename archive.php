<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'main-nav', 'none' ); ?>

<?php

	$cityTermSlug = get_query_var('city');
	$activityTermSlug = get_query_var('activity');

	$niceDescription = "";

	if ($activityTermSlug) {
		$activityTerm = get_term_by("slug", $activityTermSlug, 'activity' );
		$niceDescription = "<strong>".$activityTerm->name."</strong>";
	}

	if ($cityTermSlug) {
		$cityTerm = get_term_by("slug", $cityTermSlug, 'city' );
		if ($activityTerm) {
			$niceDescription = $niceDescription." in ";
		}

		$niceDescription =  $niceDescription."<strong>".$cityTerm->name."</strong>";
	}

	if (!$cityTermSlug && $activityTermSlug) {
		//echo '<script>var RL = RL || {}; RL.isActivityIndex = true;</script>';
	}
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row" style="display: flex;">
		    
		    <div class="column c20">
              <h1 class="entry-title"><?php echo $niceDescription ?> </h1>
              <?php 
              
              $queried_object = get_queried_object();
              $city_slug = $queried_object->slug;
              
              
                $term_id = get_queried_object()->term_id;

                $number=array(
                //'category_name'=>'things-to-do',
                'post_type'=>'post',
                'tax_query' => array(
		                        array(
                			'taxonomy' => 'city',
                			'terms' => $term_id, // term id
                            'field' => 'term_id',
                		),
                	),
                );
                
                
                
                //echo $num = count( get_posts( $number ) );
                $postTypes = new WP_Query($number);
                $numberOfPosts=$postTypes->found_posts;
                //echo $numberOfPosts;
                

                
               // wp_reset_postdata();
               
               
                
                
                 $activity_number=array(
                    'post_type'=>'post',
                    'tax_query' => array(
                        'relation' => 'AND',
		                array(
                			'taxonomy' => 'city',
                            'field' => 'term_id',
                            'terms' => $term_id,
                           // 'operator' => 'AND',
                		),
                		array(
                			'taxonomy' => 'activity',
                            'field' => 'term_id',
                            'terms' => array('8'),
                           // 'operator' => 'AND'
                		),
                	),
                );
               // echo $num = count( get_posts( $activity_number ) );
                $activity = new WP_Query($activity_number);
                $numberOfactivity=$activity->found_posts;
                
                
                
                //Query for Venues
                 $venues_number=array(
                    'post_type'=>'post',
                    'tax_query' => array(
                        'relation' => 'AND',
		                array(
                			'taxonomy' => 'city',
                            'field' => 'term_id',
                            'terms' => $term_id,
                           // 'operator' => 'AND',
                		),
                		array(
                			'taxonomy' => 'activity',
                            'field' => 'term_id',
                            'terms' => array('9'),
                           // 'operator' => 'AND'
                		),
                	),
                );
                //echo $num = count( get_posts( $venues_number ) );
                $venues = new WP_Query($venues_number);
                $numberOfvenues=$venues->found_posts;
                
                
                //Fashionable affairs & Shoots
                 $fas_number=array(
                    'post_type'=>'post',
                    'tax_query' => array(
                        'relation' => 'AND',
		                array(
                			'taxonomy' => 'city',
                            'field' => 'term_id',
                            'terms' => $term_id,
                           // 'operator' => 'AND',
                		),
                		array(
                			'taxonomy' => 'activity',
                            'field' => 'term_id',
                            'terms' => array('7'),
                           // 'operator' => 'AND'
                		),
                	),
                );
               // echo $num = count( get_posts( $fas_number ) );
                $fas = new WP_Query($fas_number);
                $numberOffas=$fas->found_posts;
                
                
                 //Exclusives
                 $ex_number=array(
                    'post_type'=>'post',
                    'tax_query' => array(
                        'relation' => 'AND',
		                array(
                			'taxonomy' => 'city',
                            'field' => 'term_id',
                            'terms' => $term_id,
                           // 'operator' => 'AND',
                		),
                		array(
                			'taxonomy' => 'activity',
                            'field' => 'term_id',
                            'terms' => array('22'),
                           // 'operator' => 'AND'
                		),
                	),
                );
               // echo $num = count( get_posts( $fas_number ) );
                $ex = new WP_Query($ex_number);
                $numberOfex=$ex->found_posts;
                
                

              ?>
              
              
              <ul>
                  <li class="active"><a href="https://robbinslocations.com/cities/<?php echo $city_slug; ?>">All Locations <?php echo "(".$numberOfPosts.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=activations-pop-up-spaces&city=<?php echo $city_slug; ?>">Pop Up Spaces <?php echo "(".$numberOfactivity.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=venues-for-days&city=<?php echo $city_slug; ?>">The Venues <?php echo "(".$numberOfvenues.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=fashionable-affairs-shoots&city=<?php echo $city_slug; ?>">Shoots & Gatherings <?php echo "(".$numberOffas.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=exclusives&city=<?php echo $city_slug; ?>">Exclusives <?php echo "(".$numberOfex.")"; ?></a></li>
              </ul>
              
              
            </div>
            
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					


					<ul class="grid">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content-grid-item' ); ?>
					<?php endwhile; ?>

					</ul><!-- .grid -->

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->
<?php get_footer(); ?>
