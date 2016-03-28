<section class="process">
	<h2 class="js-last-word">Our Search Process</h2>
	<?php 
	$i=0;
	if( have_rows('process')) : while( have_rows('process')) : the_row();
			$i++;
			$stepTitle = get_sub_field('title');
			$stepDesc = get_sub_field('step_description');
			$stepBuzz = get_sub_field('step_buzz_words');

			if( $i == 4 ) {
				$class = 'last-step';
			} elseif( $i == 5 ) {
				$i=0;
			} else {
				$class = 'first-step';
			}
	?>

	<div class="step <?php echo $class; ?>">
		<div class="step-pad">
			<div class="square">
				<div class="step-num"><?php echo $i; ?></div>
			</div>
			
			<div class="step-title js-first-word"><?php echo $stepTitle; ?></div>
			<div class="step-desc"><?php echo $stepDesc; ?></div>
			<div class="step-buzz"><?php echo $stepBuzz; ?></div>
		</div><!-- step pad -->
	</div><!-- step -->

<?php endwhile; endif; ?>
</section>