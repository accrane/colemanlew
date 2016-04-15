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
		<div class="center"><?php get_template_part('template-parts/social-footer'); ?></div>
		<div class="wrapper">
			<div class="site-info">
				<?php 
				$sitemap = get_field('sitemap_link', 'option');
				$address = get_field('address', 'option');

				// Footer Right
				echo '<div class="footer-left">';
					echo $address;
					echo '<br>';
					echo '&copy;' . date('Y') . ' ';
					echo get_bloginfo('name');
					echo ' // ';
					echo '<a href="'. get_bloginfo('url') . '/privacy-statement">Privacy Statement</a>';
					echo ' // ';
					echo '<a href="'. get_bloginfo('url') . '/legal-statement">Legal Statement</a>';
				echo '</div><!-- footer left -->';

				// Footer Left
				echo '<div class="footer-right">';
					echo '<a href="'. $sitemap . '">Sitemap</a> // Site by <a target="_blank" href="http://bellaworksweb.com/?ref=colemanlew">Bellaworks</a>';
				echo '</div><!-- footer right -->';
				 
				 ?>


			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php the_field('google_analytics', 'option'); ?>
<?php wp_footer(); ?>

</body>
</html>
