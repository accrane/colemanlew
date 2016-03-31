<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); 

		$contactInfo = get_field('additional_contact_info');
		$forWho = get_field('for_who');
		$pageContent = get_field('description');

		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area">
		<?php if( $contactInfo != '' ) { ?>
			<blockquote class="chair">
				<?php echo $contactInfo[ $i ]['block_quote']; ?>
			</blockquote>
		<?php } ?>
	</div><!-- side area -->

</div><!-- wrapper -->
<?php
get_footer();
