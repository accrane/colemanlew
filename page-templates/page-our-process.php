<?php
/**
 * Template Name: Our Process
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 

$content = get_field('page_content');
$steps = get_field('process');

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title js-last-word">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php echo $content; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->


			

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="clear"></div>

<?php get_template_part('template-parts/process-steps') ?>

<?php
endwhile; // End of the loop. ?>
</div><!-- wrapper -->
<?php 
get_footer();
