<?php
/**
 * Template Name: Capabilities
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
	
	
</section>

	
	




<?php
get_footer();
