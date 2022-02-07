<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

?>

</main><!-- / main -->
<footer id="footer" class="footer">
	<div class="container-fluid">
		<div class="footer__inner">
			<div class="footer__nav">
				<?php wp_nav_menu(array(
					'theme_location' => 'footer_menu',
					'menu_class'      => 'menu-body',
					'menu_id'            => 'footer-menu',
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				)); ?>
			</div>
			<div class="footer__copyright">
				<p>© <strong id="year">2021</strong> All Rights Reserved.</p>
				<span>created by <a href="#">Nezdymemko Dmytro</a></span>
			</div>
		</div>
	</div>
</footer><!-- / footer -->

</div><!-- / wrapper -->

<?php wp_footer(); ?>

</body>

</html>