<?php get_header(); ?>
<?php  query_posts($query_string); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="intro">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
	<?php if(get_field('front_title')) { echo '<h1>' . get_field("front_title") . '</h1>'; } ?>	
	<p><?php the_content('Read more →'); ?></p>

	<?php
		if ( has_post_thumbnail() ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
			echo '<img src="' . $thumbnail['0'] . '" class="intro-splash">';
		}
	?>

		</div>
	</div>
</section>
<?php endwhile; endif; wp_reset_query(); ?>
<section class="news">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
	<h2>Nyheter</h2>
<?php 
    query_posts(array(
		'post_type' => array('post'), 
		'posts_per_page' => 2
    ));  
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div class="media" id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink();?>">	
	<div class="media-left">
		<?php
			if ( has_post_thumbnail() ) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
				echo '<img src="' . $thumbnail['0'] . '" class="media-object">';
			}
		?>			
	</div>
	<div class="media-body">
		<h4 class="media-heading"><?php the_title(); ?></h4>
		<?php the_excerpt();?>
	</div>
</a>	
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<a href="<?php echo home; ?>/nyheter/">Läs alla nyheter</a>
		</div>
	</div>
</section>
<section class="why">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<?php if(get_field('front_why_title')) { echo '<h2>' . get_field("front_why_title") . '</h2>'; } ?>			
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<?php if(get_field('front_why_video')) { echo get_field("front_why_video"); } ?>"></iframe>
</div>	
	<p><?php if(get_field('front_why_text')) { echo get_field("front_why_text"); } ?></p>
		</div>
	</div>
</section>
<section class="about">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<?php
			if(get_field('front_contact_image')) {
			echo '<img src="' . get_field("front_contact_image") . '" class="img-responsive">';
			}
		?>		
		<?php if(get_field('front_contact_title')) { echo '<h2>' . get_field("front_contact_title") . '</h2>'; } ?>			
	<p><?php if(get_field('front_contact_text')) { echo get_field("front_contact_text"); } ?></p>
		</div>
	</div>
</section>
<?php get_footer(); ?>