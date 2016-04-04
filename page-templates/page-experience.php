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

<div class="flexslider-story">
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
					<div class="slider-story-left col js-blocks-no">
						<header class="story-type">
							<div class="story-wrap">
							<?php 

							
							$terms = get_the_terms( get_the_ID(), 'story_type' );
                         
							if ( $terms && ! is_wp_error( $terms ) ) : 
							 
							    //$storyTypes = array();
							 
							    foreach ( $terms as $term ) {
							        //$storyTypes[] = $term->name;
							        //print_r($storyTypes) ;
							        $name = $term->name;
							    }
							                         
							    //$storyType = join( "", $storyTypes );
							    ?>
 								<div class="js-first-word"><?php echo $name; ?></div>
    
        
  
								<?php endif; ?>
						
							</div><!-- -->
						</header>
						<div class="story-wrap-quote"><?php echo $quote; ?></div><!-- story-wrap -->
					</div><!-- story left -->
					<div class="slider-story-right col js-blocks-no">
						<header class="story-title">
							<div class="story-wrap">
							<?php the_title(); ?>
							</div>
						</header>
						<div class="story-wrap">
							<?php echo $content; ?>
						</div><!-- story-wrap -->
					</div><!-- s right -->
				</div><!-- story -->
                
            </li>
            
           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->

<button class="see-below js-filter-button">
	See examples of positions we have filled below<br>
	(set to show 10? Or should we setup a picker on this page?)
	<div class="arrow-toggle">
		<svg viewbox="0 0 100 100">
		    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z "transform="translate(0,90) rotate(270) ">
		</svg>
	</div><!-- arrow toggle -->
</button>

<?php endif; ?>
</section>

	
	

<section class="completed">
	

	<?php
	$wp_query = new WP_Query();

	

		$wp_query->query(array(
			'post_type'=>'position',
			'posts_per_page' => 10,
			//'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'status', // taxonomy
					'field' => 'slug',
					'terms' => array( 'completed' ) // the terms 
				)
			)
		));
	
	
	if ($wp_query->have_posts()) : ?>
	<div class="flexslider carousel">
		<ul class="slides">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

	//$forWho = get_field('for_who');

	?>

		<li>
				<div class="jobsquare-slider ">
					<a class="" href="<?php the_permalink(); ?>">
						<h3><?php the_title(); ?></h3>
						<div class="focus-block-plus">
			 				<svg class="icon  icon--plus" viewBox="0 0 5 5" >
							    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
							</svg>
						</div><!-- plus -->
					</a>
				</div><!-- jobsquare -->
			</li>

			<?php endwhile; ?>
		</ul>
	</div><!-- flexslider -->
<?php endif; ?>
</section>	


<?php
get_footer();
