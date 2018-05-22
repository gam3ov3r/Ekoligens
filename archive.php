<?php
/* 
Template Name: Archives
*/
get_header(); ?>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
<?php 
    query_posts(array(
		'post_type' => array('post'), 
		'posts_per_page' => -1
    ));  
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<article class="post" id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink();?>">		
	<h2><?php the_title(); ?></h2>
	<?php the_excerpt();?>
	</a>
	</article>

<?php endwhile; endif; wp_reset_query(); ?>
	</div>
</div>
<?php get_footer(); ?>