<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<li class="grid-item location" id="post-<?php the_ID(); ?>">

	<a href="<?php the_permalink(); ?>">
		<?php $attachments = new Attachments( 'attachments', $post->ID ); ?>


		<div class="grid-item-image-wrap <?php if( $attachments->exist() && $attachments->total() > 1) { echo "has-slides"; }  ?>">
			<?php if( $attachments->exist() && $attachments->total() > 1) { ?>
				<div class="grid-slideshow-arrow prev">←</div>
				<div class="grid-slideshow-arrow next">→</div>
			<?php } ?>
			<?php 
				// echo
				if( $attachments->exist()) {
					echo '<div class="slider">';
				    $index = 0;
					while( $attachment = $attachments->get() ) : 
				
						$img_src = wp_get_attachment_image_url( $attachment->id, 'medium' );
						$img_srcset = wp_get_attachment_image_srcset( $attachment->id, 'medium' );
						echo '<div class="img-wrap">';
						if ($index == 0) {
							echo '<img src="' . $img_src . '" srcset="'. $img_srcset . '" sizes="(max-width: 800px) 95vw, 60vw">';	
						} else {
							echo '<img data-lazy="' . $img_src . '" data-srcset="'. $img_srcset . '" sizes="(max-width: 800px) 95vw, 60vw">';	
						}
						echo '</div>';
				  		
				  		$index++;
				  	endwhile;
				  	echo '</div>';
				} else {
					echo "<img />";
				}
			?>
		</div>

		<?php the_title( sprintf( '<div class="grid-item-title">', esc_url( get_permalink() ) ),
			'</div>' ); ?>
	</a>


</li>
