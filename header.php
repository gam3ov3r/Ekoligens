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
		<img src="<?php echo img; ?>/logo.svg" class="logo">
		<nav>
			<ul class="list-inline">
				<li><a href="#">Meny</a></li>
				<li><a href="#">En annan</a></li>
				<li><a href="#">En tredje</a></li>
			</ul>
		</nav>
	</header>