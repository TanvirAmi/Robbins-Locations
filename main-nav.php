<header id="main-header" class="sticky">
  <a class="mobile-only show-mobile-menu" alt="show menu"></a>
  <h1>
    <a href="<?php echo home_url(); ?>"><img src="https://ever.rent/wp-content/uploads/2023/04/rl-logo-full.png"></a>
  </h1>



<?php
    $taxonomyQueries = $wp_query->tax_query->queries;


    $activityTerms = get_terms( array(
        'taxonomy' => 'activity',
        'hide_empty' => true,
    ));

    $cityTerms = get_terms( array(
        'taxonomy' => 'city',
        'hide_empty' => true,
    ));


?>

<div class="nav-menu">
    	<?php wp_nav_menu(
			array(
				'theme_location'  => 'header-nav',
				'container_class' => '',
				'menu_id'         => 'header-menu',
				'menu_class'     => 'primary-menu sf-menu',
				'fallback_cb'     => ''
			)
		); ?>
</div>

<div class="items">
  <a class="toggle-filter-dropdown desktop-only">Search</a>
  <a class="toggle-filter-dropdown mobile-only">Search</a>
  <a href="/saved-places" class="saved-places-link" data-count="0">
    <label>Saved</label> <span class="saved-places-count">(0)</span></a>
</div>

<div class="filter-dropdown" style="display:none">
  <a class="filter-dropdown-close"></a>
  <div class="filter-dropdown-inner">
    <div class="js-filter">
    <h3>Find the perfect location for your next event by choosing from the options below</h3>
    <div class="filter-dropdown-option">
      <h4>What are you planning?</h4>

      <ul>
        <?php $activityQueryTerm = get_query_var('activity') ?>
        <?php foreach ($activityTerms as $term) : ?>

          <li class="<?php echo $activityQueryTerm == $term->slug ? 'active' : '' ?>" data-taxonomy-name="activity" data-item-id="<?php echo $term->term_id ?>" data-term-slug="<?php echo $term->slug ?>"><?php echo $term->name ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="filter-dropdown-option">
      <h4>Where are you planning your next event?</h4>
      <ul>
        <?php $cityQueryTerm = get_query_var('city') ?>
        <?php foreach ($cityTerms as $term) : ?>
          <li class="<?php echo $cityQueryTerm == $term->slug ? 'active' : '' ?>" data-taxonomy-name="city" data-item-id="<?php echo $term->term_id ?>" data-term-slug="<?php echo $term->slug ?>"><?php echo $term->name ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="filter-dropdown-footer">
      <a class="submit-filters standard-button disabled" data-archive-url="<?php echo get_post_type_archive_link('post') ?>" href="<?php echo get_post_type_archive_link('post') ?>">Filter Properties</a>
    </div>
  </div>

  </div>
</div>



<div class="city-prompt" style="display: none;">
  <a class="city-prompt-close">Close</a>
  <div class="city-prompt-inner">
    <div class="js-filter">

      <ul style="display: none">
        <?php $activityQueryTerm = get_query_var('activity') ?>
        <?php foreach ($activityTerms as $term) : ?>

          <li class="<?php echo $activityQueryTerm == $term->slug ? 'active' : '' ?>" data-taxonomy-name="activity" data-item-id="<?php echo $term->term_id ?>" data-term-slug="<?php echo $term->slug ?>"><?php echo $term->name ?></li>
        <?php endforeach; ?>
      </ul>
    <h3>Please select the city that you would like to host your next event at:</h3>


    <div class="filter-dropdown-option">
    <ul>
      <?php $cityQueryTerm = get_query_var('city') ?>
      <?php foreach ($cityTerms as $term) : ?>
        <li class="<?php echo $cityQueryTerm == $term->slug ? 'active' : '' ?>" data-taxonomy-name="city" data-item-id="<?php echo $term->term_id ?>" data-term-slug="<?php echo $term->slug ?>"><?php echo $term->name ?></li>
      <?php endforeach; ?>
    </ul>
    </div>

    <a class="submit-filters standard-button disabled" data-archive-url="<?php echo get_post_type_archive_link('post') ?>" href="<?php echo get_post_type_archive_link('post') ?>">Filter Properties</a>
  </div>
</div>


</header>
