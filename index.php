<?php get_header(); ?>
<?php query_posts($query_string); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
	<article class="post" id="post-<?php the_ID(); ?>">
		<?php
			if ( has_post_thumbnail() ) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
				echo '<img src="' . $thumbnail['0'] . '" class="img-responsive">';
			}
		?>			
		<h1><?php the_title(); ?></h1>
		<?php the_content('Read more →'); ?>
	</article>
	</div>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<?php get_footer(); ?>