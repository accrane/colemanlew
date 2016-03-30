<?php
/**
 * Template Name: News and Resources
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
 		$i=0;
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'post',
		'posts_per_page' => 3
	));
		if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 

		$i++;
		if( $i == 3 ) {
			$class = 'last-post';
			$i=0;
		} else {
			$class = 'first-post';
		}
		?>	
	 		<article class="home-post <?php echo $class; ?>">
	 			<h3><?php the_title(); ?></h3>
	 			<?php the_excerpt(); ?>
	 			<div class="readmore">
	 				<a href="<?php the_permalink(); ?>">Continue Reading</a>
	 				<div class="plus">
		 				<svg class="icon  icon--plus" viewBox="0 0 5 5" >
						    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
						</svg>
					</div><!-- plus -->
	 			</div>
	 		</article>
	 	<?php endwhile; endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div><!-- wrapper -->
<?php
get_footer();
