<?php
/**
 * Template Name: Activity Index Page
 *
 *
 *
 * @package understrap
 */

?>

<?php get_header();  ?>

  <?php $type = get_field('homepage_content_type', 'options');
        $video_url = get_field('homepage_video', 'options');
        $image_id = get_field('homepage_image', 'options');
    
   ?>

  <div class="home-slider">
    
    <!-- <a class="toggle-filter-dropdown standard-button cta">Find Your Perfect Space</a> -->
    <!-- <h1>ROBBINS LOCATIONS</h1> -->
     <?php echo do_shortcode('[smartslider3 slider="2"]'); ?> 

  </div>


<?php get_template_part( 'main-nav', 'none' ); ?>

<section class="cat-section homepage-activity-listing">
<!--   <?php if (get_option( 'page_for_posts' )) { ?>
    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>"><h3>Browse All Listings</h3></a>
  <?php } ?>
 -->
  <h3 class="sticky">Find Your Next Space</h3>
  <ul class="cat-whole grid">
    <?php
      $_activities = get_terms( array(
          'taxonomy' => 'activity',
         // 'hide_empty' => true,
      ) );

    ?>
    <?php foreach ($_activities as $activity) : ?>

    <li class= "grid-item single-cat">
      <a href="<?php echo get_term_link($activity); ?>">
        <div class="grid-item-image-wrap">
            <?php
              $image_id = get_term_meta( $activity->term_id, 'image', true );

              if ($image_id) {
                $img_src = wp_get_attachment_image_url( $image_id, 'medium' );
                $img_srcset = wp_get_attachment_image_srcset( $image_id, 'medium' );

                echo '<img src="' . $img_src . '" srcset="'. $img_srcset . '" sizes="(max-width: 800px) 95vw, 41vw">';
              } else {
                echo "<img />";
              }
            ?>
        </div>
        <div class="grid-item-title">
         <?php echo $activity->name; ?>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>

</section>

<?php get_footer() ?>
