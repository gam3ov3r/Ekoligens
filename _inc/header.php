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