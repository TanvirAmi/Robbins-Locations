<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if (is_front_page()) { ?>

<div class="banner" id="large-events-banner">
  <?php $title = get_field('large_events_banner_title', 'options');
        $text = get_field('large_events_banner_text', 'options');
        $button_text = get_field('large_events_button_text', 'options');
        $banner_image_id = get_field('large_events_banner_image', 'options');
        $banner_link = get_field('large_events_cta_destination', 'options');
   ?>

  <div class="banner-image">
    <?php echo responsive_image($banner_image_id, "50vw") ?>
  </div>
  <div class="banner-text">
    <h2><?php echo $title ?></h2>
    <p><?php echo $text ?></p>
    <a href="<?php echo $banner_link ?>" class="standard-button"><?php echo $button_text ?></a>
  </div>
</div>


<div class="banner" id="list-your-space-banner">
  <h2>Share your space and start earning!</h2>
  <a href="/list-your-space" class="standard-button">List Your Space</a>
</div>

<?php } ?>

<div class="wrapper desktop-only" id="wrapper-footer">
  <div class="footer">

    <div class="footer-column">
      <h3>Activities</h3>
      <ul>
  	   <?php       $activityTerms = get_terms( array(
          'taxonomy' => 'activity',
          'hide_empty' => true,
      ));
      ?>
      <?php foreach ($activityTerms as $term) : ?>
        <li>
          <a href="<?php echo get_term_link($term) ?>" class="single-cat"><?php echo $term->name ?></a>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>


    <div class="footer-column">
      <h3>Locations</h3>
      <ul>
       <?php       $cityTerms = get_terms( array(
          'taxonomy' => 'city',
          'hide_empty' => true,
      ));
      ?>
      <?php foreach ($cityTerms as $term) : ?>
        <li>
          <a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?></a>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>

    <div class="footer-column pages">
      <h3>Company</h3>
      <?php wp_nav_menu('footer_company_menu') ?>
    </div>


    <div class="footer-column connect">
      <h3>Contact</h3>
      <ul>
        <li><a href="mailto:info@rl-nyc.com">info@rl-nyc.com</a></li>
        <li>1 347-343-3737</li>
        <li class="social-icons">
          <a class="social-icon instagram" target="_blank" href="https://www.instagram.com/robbinslocations/">Instagram</a>
          <a class="social-icon twitter" target="_blank" href="https://twitter.com/RobbinsLocation">Twitter</a>
          <a class="social-icon facebook" target="_blank" href="https://www.facebook.com/robbinslocations">Facebook</a>
          <a class="social-icon linkedin" target="_blank" href="https://www.linkedin.com/in/robbins-locations-b473b593">LinkedIn</a>
        </li>

      </ul>
    </div>

  </div>
</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<div class="overlay mobile-menu">
  <a class="hide-mobile-menu" alt="Hide mobile menu"></a>
  <div class="mobile-menu-inner">
    <ul>
      <li>View All Activities</li>
      <li class="has-submenu" data-submenu-open="false">
        <h3 class="toggle-submenu"><span class="submenu-toggle-icon expand">+</span><span class="submenu-toggle-icon contract">-</span>Cities</h3>
        <ul class="submenu">
         <?php       $cityTerms = get_terms( array(
            'taxonomy' => 'city',
            'hide_empty' => true,
        ));
        ?>
        <?php foreach ($cityTerms as $term) : ?>
          <li>
            <a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?></a>
          </li>
        <?php endforeach; ?>
        </ul>
      </li>
    </ul>

    <?php wp_nav_menu('footer_company_menu') ?>

    <ul>
        <li><a href="mailto:info@rl-nyc.com">info@rl-nyc.com</a></li>
        <li>1 347-343-3737</li>
        <li class="social-icons">
          <a class="social-icon instagram" target="_blank" href="https://www.instagram.com/robbinslocations/">Instagram</a>
          <a class="social-icon twitter" target="_blank" href="https://twitter.com/RobbinsLocation">Twitter</a>
          <a class="social-icon facebook" target="_blank" href="https://www.facebook.com/robbinslocations">Facebook</a>
          <a class="social-icon linkedin" target="_blank" href="https://www.linkedin.com/in/robbins-locations-b473b593">LinkedIn</a>
        </li>
    </ul>


  </div>
</div>
<?php wp_footer(); ?>

</body>
</html>

