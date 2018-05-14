<?php get_header(); ?>
<?php  query_posts($query_string); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="intro">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
	<h1><?php the_title(); ?></h1>
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
		'posts_per_page' => 3
    ));  
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div class="media" id="post-<?php the_ID(); ?>">
	<div class="media-left">
		<a href="#">
		<?php
			if ( has_post_thumbnail() ) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
				echo '<img src="' . $thumbnail['0'] . '" class="media-object">';
			}
		?>			
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading"><?php the_title(); ?></h4>
		<?php the_content('Read more →'); ?>
	</div>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<a href="#">Läs alla nyheter</a>
		</div>
	</div>
</section>
<section class="why">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
	<h2>Varför?</h2>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MeCiihx-JsA"></iframe>
</div>	
	<p>Ecoligentpaper® - Green Tech Hanger, är resultatet av ett innovationprojekt drivet av Ekoligens AB i samarbete med svensk skogs-/pappersindustri och utvecklad i samråd svensk klädindustri med avsikt att utveckla en klimatsmart klädgalge med minimal miljö- och klimat-påverkan och starka kommunikativa möjligheter.</p>
		</div>
	</div>
</section>
<section class="about">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
	<img src="<?php echo img; ?>/about.jpg" class="img-responsive">
	<h2>Kontakt</h2>
	<p>ekoligens ab - ecoligentpaper®<br>
ljusterögatan 14 • 116 42 stockholm • sweden<br>
hallo@ekoligens.se • +46 70 610 29 08</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>