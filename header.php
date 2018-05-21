<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php get_template_part('_inc/fonts'); ?>
	<?php get_template_part('_inc/meta'); ?>

	<?php get_template_part('_inc/trackers'); ?>
	<?php wp_head(); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
</head>
<body>
	<header>
		<a href="<?php echo home; ?>"><img src="<?php echo img; ?>/logo.svg" class="logo"></a>
		<nav>
			<ul class="list-inline<?php if ( is_front_page() ) { echo " home"; }?>">
			<?php if (!is_front_page() ) {
				echo "<li><a href='" . home . "'>Hem</a></li>";
			} ?>	
			<?php
				$defaults = array(
					'theme_location' => 'main-menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'list-inline',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 0,
					'walker'          => ''
				);
				wp_nav_menu( $defaults );
			?>
			</ul>			
		</nav>
	</header>