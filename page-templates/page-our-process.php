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

$blockquotes = get_field('block_quotes', 'option');
$row_count = count($blockquotes);
$i = rand(0, $row_count - 1);



?>
<div class="content-wrapper">
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

	<div class="widget-area">
		<?php if( $blockquotes != '' ) { ?>
			<blockquote class="chair">
				<?php echo $blockquotes[ $i ]['block_quote']; ?>
			</blockquote>
		<?php } ?>
	</div><!-- side area -->

	<div class="clear"></div>

	<?php get_template_part('template-parts/process-steps') ?>

</div><!-- wrapper -->



<?php
endwhile; // End of the loop. ?>

<!-- 

			Curent Search Section

################################################-->
<section class="current-search-assignments">
<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'position',
		'posts_per_page' => 10,
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'status', // taxonomy
				'field' => 'slug',
				'terms' => array( 'active' ) // the terms 
			)
		)
	));
	if ($wp_query->have_posts()) : ?>
	<div class="flexslider">
		<ul class="slides">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 


?>	
			<li>
				<?php the_title(); ?>
			</li>

			<?php endwhile; ?>
		</ul>
	</div><!-- flexslider -->
<?php endif; ?>
</section>

<script type="text/javascript">
	(function() {
	 
	  // store the slider in a local variable
	  var $window = $(window),
	      flexslider;
	 
	  // tiny helper function to add breakpoints
	  function getGridSize() {
	    return (window.innerWidth < 600) ? 2 :
	           (window.innerWidth < 900) ? 3 : 4;
	  }
	 
	  $(function() {
	    SyntaxHighlighter.all();
	  });
	 
	  $window.load(function() {
	    $('.flexslider').flexslider({
	      animation: "slide",
	      animationLoop: false,
	      itemWidth: 210,
	      itemMargin: 5,
	      minItems: getGridSize(), // use function to pull in initial value
	      maxItems: getGridSize() // use function to pull in initial value
	    });
	  });
	 
	  // check grid size on resize event
	  $window.resize(function() {
	    var gridSize = getGridSize();
	 
	    flexslider.vars.minItems = gridSize;
	    flexslider.vars.maxItems = gridSize;
	  });
	}());
</script>

<?php 
get_footer();
