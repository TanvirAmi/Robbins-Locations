<?php
/**
 * Template Name: City Index Page
 *
 *
 *
 * @package understrap
 */

?>

<?php get_header();  ?>


<?php get_template_part( 'main-nav', 'none' ); ?>

<section class="cat-section homepage-activity-listing">
  <?php if (get_option( 'page_for_posts' )) { ?>
    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>"><h3>Browse All Listings</h3></a>
  <?php } ?>

  <ul class="cat-whole grid">

    <?php
      $_cities = get_terms( array(
          'taxonomy' => 'city',
          'hide_empty' => true,
      ) );
    ?>
    <?php foreach ($_cities as $city) : ?>

      <li class= "grid-item single-cat">
        <a href="<?php echo get_term_link($city); ?>">
          <div class="grid-item-image-wrap">
            <?php
              $image_id = get_term_meta( $city->term_id, 'image', true );

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
           <?php echo $city->name; ?>
          </div>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

</section>
<?php get_footer() ?>
