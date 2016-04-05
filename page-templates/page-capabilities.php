<?php
/**
 * Template Name: Capabilities
 */

get_header(); ?>
<?php
while ( have_posts() ) : the_post(); 
	$image = get_field('background_image');
	$content = get_field('intro_content');
	$size = 'full';
	$executiveAssessment = get_field('executive_assessment');
	$executiveCoaching = get_field('executive_coaching');
	$successionPlanning = get_field('succession_planning');
	$newLeader = get_field('new_leader_integration');
endwhile;
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




	 ?>
	
<div class="content-wrapper ">
	<div class="tabs-cont">
		<ul class='tabs'>
			<li><a href='#tab1'>Executive Assessment</a></li>
			<li><a href='#tab2'>Executive Coaching</a></li>
			<li><a href='#tab3'>Succession Planning</a></li>
			<li><a href='#tab4'>New Leader Integration</a></li>
		</ul>
		<div id='tab1' class="tabs-border entry-content">
			<?php echo $executiveAssessment; ?>
		</div>
		<div id='tab2' class="tabs-border entry-content">
			<?php echo $executiveCoaching; ?>
		</div>
		<div id='tab3' class="tabs-border entry-content">
			<?php echo $successionPlanning; ?>
		</div>
		<div id='tab4' class="tabs-border entry-content">
			<?php echo $newLeader; ?>
		</div>
	</div>
</div>


<?php
get_footer();
