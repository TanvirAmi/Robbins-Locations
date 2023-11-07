<?php
/**
 * Widget and shortcode template: links template.
 *
 * This template is used by the plugin: Related Posts by Taxonomy.
 *
 * plugin:        https://wordpress.org/plugins/related-posts-by-taxonomy
 * Documentation: https://keesiemeijer.wordpress.com/related-posts-by-taxonomy/
 *
 * Only edit this file after you've copied it to your (child) theme's related-post-plugin folder.
 * See: https://keesiemeijer.wordpress.com/related-posts-by-taxonomy/templates/
 *
 * @package Related Posts by Taxonomy
 * @since 0.1
 *
 * The following variables are available:
 *
 * @var array $related_posts Array with related post objects or related post IDs.
 *                           Empty array if no related posts are found.
 * @var array $rpbt_args     Widget or shortcode arguments.
 */

?>

<?php
/**
 * Note: global $post; is used before this template by the widget and the shortcode.
 */
?>

<?php if ( $related_posts ) : ?>

  <?php $related_posts = array_slice($related_posts, 0, 3) ?>


  <ul class="related-posts grid three-up">
    <?php $index = 0; ?>
    <?php foreach ( $related_posts as $post ) : ?>
      <?php
        setup_postdata( $post );
        $attachments = new Attachments( 'attachments', $post->ID );

        if ($attachments->exist()) {
          $image_id = $attachments->get_single(0)->id;
      ?>
        <li class="grid-item" data-index="<?php echo $index ?>">
          <a href="<?php echo get_permalink( $post ) ?>">
            <div class="grid-item-image-wrap">
              <?php responsive_image($image_id, "30vw") ?>
            </div>
            <h4 class="grid-item-title"><?php echo get_the_title($post) ?></h4>
          </a>
        </li>
      <?php
          $index++;

        }
        // In this loop you can use WordPress functions to display the related posts.
      ?>
    <?php endforeach; ?>
  </ul>

<?php else : ?>
<?php endif ?>

<?php
/**
 * Note: wp_reset_postdata(); is used after this template by the widget and the shortcode.
 */
?>