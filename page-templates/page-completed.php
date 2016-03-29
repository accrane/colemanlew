<?php
/**
 * Template Name: Completed
 */

get_header(); ?>
<div class="small-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">



		</main><!-- #main -->
	</div><!-- #primary -->


</div><!-- wrapper -->


<nav class="assignments">

	<button class="filter-assignments">
		Filter Assignments
		<div class="arrow-toggle">
			<svg viewbox="0 0 100 100">
			    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z "transform="translate(0,90) rotate(270) ">
			</svg>
	</div><!-- arrow toggle -->
	</button>

</nav>
<section class="assignment-links">
<?php 

$args = array( 
		'hide_empty' => false,
	);
 
$terms = get_terms( 'focus_area', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="my_term-archive">';
    
    echo '<ul>';

    foreach ( $terms as $term ) {
        $i++;
        echo '<li>';
        echo '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
        echo '</li>';
    }
    
   echo '</ul>';
} ?>
</section>

<section class="completed">
	<div class="wrapper">
	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'position',
		'posts_per_page' => -1,
		//'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'status', // taxonomy
				'field' => 'slug',
				'terms' => array( 'completed' ) // the terms 
			)
		)
	));
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<div class="jobsquare ">
			<a href="<?php the_permalink(); ?>">
				<h3><?php the_title(); ?></h3>
				<div class="focus-block-plus">
						<svg class="icon  icon--plus" viewBox="0 0 5 5" >
					    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
					</svg>
				</div><!-- plus -->
			</a>
		</div><!-- jobsquare -->
	<?php endwhile; ?>
<?php endif; ?>
</div><!-- wrapper -->
</section>	

<?php
get_footer();
