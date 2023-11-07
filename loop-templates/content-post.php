<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <?php
    setlocale(LC_MONETARY, 'en_US');
    $hourlyRate = get_field('hourly_rate');
    $minimumRentalPeriod = get_field('minimum_rental_period');
    $capacity = get_field('capacity');
    $propertyType = get_field('property_type');

    $propertyDetails = get_field('property_details');
    $services = get_field('services');
    $policyAndTerms = get_field('policy_terms');
    $otherSections = get_field('other_sections');
  ?>


	<div class="entry-content entry-content-location">
    <div class="space-top-row">
      <div class="title-and-button">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <a class="standard-button add-location-to-collection-link" data-location-id="<?php the_ID() ?>" data-location-title="<?php echo the_title() ?>" data-location-id="<?php the_ID(); ?>">
          <span class="add">Save</span>
          <span class="remove">Remove</span>
        </a>
      </div>
      <ul>
        <li>Location: <?php echo get_the_term_list( $post->ID , 'city', '', ',' ) ?></li>
        <?php if ($propertyType) { ?>
          <li>Property Type: <?php echo $propertyType; ?></li>
        <?php } ?>

        <?php if ($hourlyRate) { ?>
          <li>
            Hourly Rate: $<?php echo money_format('%i', $hourlyRate); ?>
          </li>
        <?php } ?>

<!--
            <?php if ($capacity) { ?>
              <li>
                Capacity: <?php echo $capacity; ?>
              </li>
            <?php } ?>


            <?php if ($minimumRentalPeriod) { ?>
              <li>Minimum Rental Period: <?php echo $minimumRentalPeriod; ?></li>
            <?php } ?>

          -->
      </ul>

    </div>


		<section class="main-post-layout" id="location-content">
			<div class="post-text-content">

				<div class="post-text-content-body">
          <!-- <h2>Description of Space:</h2> -->
          <?php the_content(); ?>
        </div>



		    <!-- <a class="back-from-location-link desktop-only" href="/">← Back</a> -->
			</div>

      <div class="property-information accordian">
        <?php if ($propertyDetails) { ?>
        <section class="accordian-section" data-expanded="false">
          <header>
            <h2>Property Details</h2>
            <div class="icon">
              <span class="icon-expand">+</span>
              <span class="icon-collapse">-</span>
            </div>
          </header>
          <div class="section-content">
            <div class="rte">
              <?php echo $propertyDetails; ?>
            </div>



            <p><strong>Use:</strong> <?php echo get_the_term_list( $post->ID , 'activity', '', ', ' ) ?> </p>


            <?php if ($capacity) { ?>
              <p>
                <strong>Capacity:</strong> <?php echo $capacity; ?>
              </p>
            <?php } ?>


            <?php if ($minimumRentalPeriod) { ?>
              <p><strong>Minimum Rental Period:</strong> <?php echo $minimumRentalPeriod; ?></p>
            <?php } ?>


          </div>
        </section>
        <?php } ?>
        <?php if ($services) { ?>
        <section class="accordian-section" data-expanded="false">
          <header>
            <h2>Services</h2>
            <div class="icon">
              <span class="icon-expand">+</span>
              <span class="icon-collapse">-</span>
            </div>
          </header>
          <div class="section-content">
            <div class="rte">
              <?php echo $services; ?>
            </div>
          </div>
        </section>
        <?php } ?>
        <?php if ($policyAndTerms) { ?>
        <section class="accordian-section" data-expanded="false">
          <header>
            <h2>Policy & Terms</h2>
            <div class="icon">
              <span class="icon-expand">+</span>
              <span class="icon-collapse">-</span>
            </div>
          </header>
          <div class="section-content">
            <div class="rte">
              <?php echo $policyAndTerms; ?>
            </div>
          </div>
        </section>
        <?php } ?>

        <?php if (have_rows('other_sections')) { ?>
          <?php     while ( have_rows('other_sections') ) : the_row(); ?>
          <section class="accordian-section" data-expanded="false">
            <header>
              <h2><?php the_sub_field('section_title'); ?></h2>
              <div class="icon">
                <span class="icon-expand">+</span>
                <span class="icon-collapse">-</span>
              </div>
            </header>
            <div class="section-content">
              <div class="rte">
                <?php the_sub_field('section_content'); ?>
              </div>
            </div>
          </section>

          <?php endwhile ?>


        <?php } ?>

      </div>


      <?php

        echo do_shortcode('[related_posts_by_tax title="Related Locations"]');

      ?>


        <!-- <a class="back-from-location-link mobile-only" href="/">← Back</a> -->


		</section>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
<script>


</script>
