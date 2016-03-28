<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				<?php 
				$sitemap = get_field('sitemap_link', 'option');
				echo '&copy; ' . date('Y') . ' | <a href="'. $sitemap . '">Sitemap</a> | Site by <a href="http://bellworksweb.com/?ref=colemanlew">Bellaworks</a>'; 

				 ?>
			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
