<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="content-wrapper">
<?php
/**
   Taxonomy template
 
	To create different taxonomy templates, copy
	this file and create a new...
	
	Ex: taxonomy-my_custom_tax.php
 	
*/
get_header(); ?>
 
<?php 
// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 

$blockquote = get_field('block_quote', $taxonomy . '_' . $term_id);
$desc = get_field('description', $taxonomy . '_' . $term_id);
?>
 

 
<div class="content-wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<header class="entry-header">
				<h1 class="entry-title js-last-word"><?php echo get_queried_object()->name; ?></h1>
			</header><!-- .entry-header -->

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				

				<div class="entry-content">
					<?php echo $desc; ?>
				</div><!-- .entry-content -->

				
			</article><!-- #post-## -->
			

			

		</div>
	</div><!-- content area -->


	<aside id="secondary" class="widget-area" role="complementary">
		<?php //dynamic_sidebar( 'sidebar-1' ); ?>

		<?php 

		if( $blockquote != '' ) { ?>
				<blockquote class="chair">
					<?php echo $blockquote; ?>
				</blockquote>
			<?php } ?>

	</aside><!-- #secondary -->


</div><!-- wrapper -->
<!-- 

			Focus Areas

################################################-->

<section class="focus-areas">

	
	<?php 

	// Get my gallery from theme options
	$images = get_field('focus_area_photos', 'option');

	// Radomize them
	shuffle($images);

	// Get the Terms for Focus Areas
	$cat_args=array(
	  'orderby' => 'name',
	  'order' => 'ASC',
	  'hide_empty' => false
	);
	$categories=get_terms( 'focus_area', $cat_args );

	// Loop through categories and randomly assign the image gallery to each category.
	foreach($categories as $category) : 
		
		echo '<div class="focus-block">';
		echo '<a href="'. get_bloginfo('url') . '/focus-area' . '/' . $category->slug . '">';
			// pop an image off;
			$element = array_pop($images);
			echo '<img src="'.$element['sizes']['large-square'] .'" alt="'.$element['alt'].'" />';

				// div info contents
				echo '<div class="focus-block-info">';
					echo '<div class="focus-block-pad">';
						echo '<h2>' . $category->name . '</h2>';
						echo '<div class="focus-block-plus"><svg class="icon  icon--plus" viewBox="0 0 5 5" ><path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" /></svg></div>';
					echo '</div><!-- focus block pad -->';
				echo '</div><!-- focus block info -->';
				
			echo '</a>';
		echo '</div><!-- focus block -->';
			
	// echo '<pre>';
	// print_r($category);
	// echo '</pre>';
	 endforeach;


?>
	 <!-- Ending Block -->
	<div class="focus-block">
		<div class="focus-block-first-info">
			<!-- <h3 class="js-last-word">Our Focus Areas</h3> -->
			<p>Let us help you find <br> the <b>right person</b> for <br>the <b>right role</b>.</p>
		</div><!-- focus block first info -->
	</div><!-- focus block -->


</section><!-- focus areas -->
<?php
get_footer();
