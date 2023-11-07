<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

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
?>


<div class="wrapper" id="wrapper-index">
    

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row" style="display: flex;">
		    
		    <div class="column c20">
		        
		        
		        <h1 class="entry-title"><?php echo $cityTerm->name; ?> </h1>
              
              <?php 
              
              
              //Get Last URL segment(City)
      			if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                 $url = "https://";   
                else  
                     $url = "http://";   
                // Append the host(domain name, ip) to the URL.   
                $url.= $_SERVER['HTTP_HOST'];   
                
                // Append the requested resource location to the URL   
                $url.= $_SERVER['REQUEST_URI'];    
                  
                //echo $url;  
                
                $url_components = parse_url($url);

                // Use parse_str() function to parse the
                // string passed via URL
                parse_str($url_components['query'], $params);
                     
                // Display result
                //echo ' Hi '.$params['activity'];
              
              $queried_object = get_queried_object();
             // $city_slug = $queried_object->slug;
              
              if ($params['city'] == 'new-york-city'){
                 $term_id = 5; 
                 $city_slug = "new-york-city";
              }
              elseif($params['city'] == 'miami'){
                 $term_id = 14; 
                 $city_slug = "miami";
                 //echo $city_slug;
              }
              elseif($params['city'] == 'los-angeles'){
                 $term_id = 13; 
                 $city_slug = "los-angeles";
                 //echo $city_slug;
              }
              elseif($params['city'] == 'harbor-island'){
                 $term_id = 17; 
                 $city_slug = "harbor-island";
                 //echo $city_slug;
              }
              
              
              //echo $term_id;
              
                

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
              <?php 
              //$params['activity']
               if ($params['activity'] == 'activations-pop-up-spaces'){?>
               <ul>
                  <li><a href="https://robbinslocations.com/cities/<?php echo $city_slug; ?>">All Locations <?php echo "(".$numberOfPosts.")"; ?></a></li>
                  <li class="active"><a href="https://robbinslocations.com/all-listings/?activity=activations-pop-up-spaces&city=<?php echo $city_slug; ?>">Pop Up Spaces <?php echo "(".$numberOfactivity.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=venues-for-days&city=<?php echo $city_slug; ?>">The Venues <?php echo "(".$numberOfvenues.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=fashionable-affairs-shoots&city=<?php echo $city_slug; ?>">Shoots & Gatherings <?php echo "(".$numberOffas.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=exclusives&city=<?php echo $city_slug; ?>">Exclusives <?php echo "(".$numberOfex.")"; ?></a></li>
              </ul>
               
              <?php  
              }
              elseif($params['activity'] == 'venues-for-days'){?>
              
               <ul>
                  <li><a href="https://robbinslocations.com/cities/<?php echo $city_slug; ?>">All Locations <?php echo "(".$numberOfPosts.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=activations-pop-up-spaces&city=<?php echo $city_slug; ?>">Pop Up Spaces <?php echo "(".$numberOfactivity.")"; ?></a></li>
                  <li class="active"> <a href="https://robbinslocations.com/all-listings/?activity=venues-for-days&city=<?php echo $city_slug; ?>">The Venues <?php echo "(".$numberOfvenues.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=fashionable-affairs-shoots&city=<?php echo $city_slug; ?>">Shoots & Gatherings <?php echo "(".$numberOffas.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=exclusives&city=<?php echo $city_slug; ?>">Exclusives <?php echo "(".$numberOfex.")"; ?></a></li>
              </ul>
              
              <?php    
              }
              
               elseif($params['activity'] == 'fashionable-affairs-shoots'){?>
              
               <ul>
                  <li><a href="https://robbinslocations.com/cities/<?php echo $city_slug; ?>">All Locations <?php echo "(".$numberOfPosts.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=activations-pop-up-spaces&city=<?php echo $city_slug; ?>">Pop Up Spaces <?php echo "(".$numberOfactivity.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=venues-for-days&city=<?php echo $city_slug; ?>">The Venues <?php echo "(".$numberOfvenues.")"; ?></a></li>
                  <li class="active"><a href="https://robbinslocations.com/all-listings/?activity=fashionable-affairs-shoots&city=<?php echo $city_slug; ?>">Shoots & Gatherings <?php echo "(".$numberOffas.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=exclusives&city=<?php echo $city_slug; ?>">Exclusives <?php echo "(".$numberOfex.")"; ?></a></li>
              </ul>
              
              <?php    
              }
              
              elseif($params['activity'] == 'exclusives'){?>
              
               <ul>
                  <li><a href="https://robbinslocations.com/cities/<?php echo $city_slug; ?>">All Locations <?php echo "(".$numberOfPosts.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=activations-pop-up-spaces&city=<?php echo $city_slug; ?>">Pop Up Spaces <?php echo "(".$numberOfactivity.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=venues-for-days&city=<?php echo $city_slug; ?>">The Venues <?php echo "(".$numberOfvenues.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=fashionable-affairs-shoots&city=<?php echo $city_slug; ?>">Shoots & Gatherings <?php echo "(".$numberOffas.")"; ?></a></li>
                  <li class="active"><a href="https://robbinslocations.com/all-listings/?activity=exclusives&city=<?php echo $city_slug; ?>">Exclusives <?php echo "(".$numberOfex.")"; ?></a></li>
              </ul>
              
              <?php    
              }
              
              else{?>
              <ul>
                  <li class="active"><a href="https://robbinslocations.com/cities/<?php echo $city_slug; ?>">All Locations <?php echo "(".$numberOfPosts.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=activations-pop-up-spaces&city=<?php echo $city_slug; ?>">Pop Up Spaces <?php echo "(".$numberOfactivity.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=venues-for-days&city=<?php echo $city_slug; ?>">The Venues <?php echo "(".$numberOfvenues.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=fashionable-affairs-shoots&city=<?php echo $city_slug; ?>">Shoots & Gatherings <?php echo "(".$numberOffas.")"; ?></a></li>
                  <li><a href="https://robbinslocations.com/all-listings/?activity=exclusives&city=<?php echo $city_slug; ?>">Exclusives <?php echo "(".$numberOfex.")"; ?></a></li>
              </ul>
                  
              <?php   
              }
              ?>
              
              
              
            </div>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<ul class='grid'>

						<?php /* Start the Loop */ ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								get_template_part( 'loop-templates/content', 'grid-item' );
							?>

						<?php endwhile; ?>
					</ul>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

