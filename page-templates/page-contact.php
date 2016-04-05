<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<aside id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

	<div class="widget">
		<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
	</div>

</aside><!-- #secondary -->
</div><!-- wrapper -->
<?php
get_footer();
