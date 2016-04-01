<?php
/**
 * Template Name: Our Experience
 */

get_header(); ?>
<?php
while ( have_posts() ) : the_post(); 
$image = get_field('background_image');
$content = get_field('page_content');
$size = 'full';
?>
<section class="experience">
	<div class="exp-content">
		<div class="small-wrapper">
			<header class="entry-header">
				<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<div class="entry-content"><?php echo $content; ?></div>
	</div><!-- small wrapper -->
	</div><!-- exp content -->
	
	<?php 
	if( !empty($image) ): 
		echo '<div class="bg-image">';
			echo wp_get_attachment_image( $image, $size );
		echo '</div>';
	endif;
	?>


<?php
endwhile; // End of the loop.
?>
	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'story',
	'posts_per_page' => -1
));
	if ($wp_query->have_posts()) : ?>

<div class="flexslider-single">
	<header class="stories">
		Success Stories
	</header>
        <ul class="slides">
        <?php while ( $wp_query->have_posts() ) : ?>
			<?php $wp_query->the_post(); 

			$content = get_field('content');
			$quote = get_field('quote');
			?>
            
            <li> 
              
				<div class="slider-story">
					<div class="slider-story-left">
						<header class="story-type">
							<?php 

							$terms = get_the_terms( get_the_ID(), 'story_type' );
                         
							if ( $terms && ! is_wp_error( $terms ) ) : 

								foreach ( $terms as $term ) {
									$term->name;
								}
							endif;
							?>

						</header>
						<?php echo $quote; ?>
					</div>
					<div class="slider-story-right">
						<header class="story-title">
							<?php the_title(); ?>
						</header>
						<?php echo $content; ?>
					</div>
				</div>
                
            </li>
            
           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->


<?php endif; ?>
</section>

	
	

<div class="content-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div><!-- wrapper -->
<?php
get_footer();
