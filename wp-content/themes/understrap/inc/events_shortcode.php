<?php

// Add Shortcode
function events_booking() {
	$args = array(
		'post_type' 		=> 'event',
		'posts_per_page' 	=> -1,
		'order'				=> 'ASC',
	);

$posts = get_posts($args);
$postsNr = wp_count_posts($post_type = 'event');
?>

<!| Desktop Version |>
<div class="qode-advanced-tabs qode-advanced-tabs qode-advanced-horizontal-tab clearfix qode-advanced-tab-without-icon qode-advanced-tabs-column-<?php echo $postNr->publish ?> clearfix ui-tabs ui-widget ui-widget-content ui-corner-all hide-mobile">
	<ul class="qode-advanced-tabs-nav ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
	<?php $count = 0; ?>
	<?php foreach ($posts as $post ): ?>
	<li class="ui-state-default ui-corner-top ui-tabs-active <?php if ($count == 0){ echo "ui-state-active"; } ?>" role="tab" data-toggle="tab" ><a href="#tab-<?= $post->ID ?>"> <?= $post->post_title; ?> </a></li>
	<?php $count++; ?>
	<?php endforeach; ?>
</ul>
<div class="qode-advanced-tab-container ui-tabs-panel ui-widget-content ui-corner-bottom">
	<?php $index = 0; ?>
	<?php foreach ($posts as $post ): ?>
		<div class="tab-pane fade <?php if ($index == 0){ echo "show active"; } ?>" id="tab-<?= $post->ID ?>" >
			<div class="single-post-data">
				<?php if(have_rows('kurs',$post->ID)): ?>
				<table class="date_table_db custom-table">
					<tr class="table_head_row">
						<th>Datum</th>
						<th>Zeit</th>
						<th>Kurs</th>
						<th>Module</th>
						<th>Auswählen</th>
					</tr>
					<?php $idVal = 1; ?>
				<?php while(have_rows('kurs',$post->ID)): the_row(); ?>
					<tr class="custom-table-row">
						<td class="date">
							<?php 
							setlocale(LC_TIME, "de_DE");
							$time = strtotime(str_replace('/', '-', get_sub_field('course_date')));
							$date = date('d.m.Y', strtotime(str_replace('/', '-', get_sub_field('course_date'))));
							$newformat = strftime('%a, ',$time);
							echo $newformat.$date;
							?>
						</td>
						<td class="time">
							<?php the_sub_field('course_timing'); ?>
						</td>
						<?php $kurs = get_sub_field_object('course_title') ?>
						<td class="kurs">
							<?php echo $kurs['choices'][$kurs['value']] ?>
						</td>
						<td class="module">
							<?php echo $kurs['value']; ?>
						</td>
						<td class="desktop-checkbox check-kurs">
							<div class="check-container">
								<input type="checkbox" id="<?php echo strtolower($post->post_title)."-id-".$idVal ?>" class="custom-checkbox" value="<?= the_sub_field('course_date'); ?>" name="<?php echo $newformat.$date; ?> | <?php the_sub_field('course_timing')?> | <?= $kurs['choices'][$kurs['value']] ?> | <?= $kurs['value'] ?> ">
								<span class="checkmark"></span>
							</div>
						</td>
					</tr>
					<?php $idVal++; ?>
				<?php endwhile; ?>
				</table>
			<?php else: ?>
				<h4>Comming Soon..</h4>
			<?php endif; ?>
			</div>
		</div>
	<?php $index++; ?>
	<?php endforeach; ?>
</div>
</div>

<!| Mobile Version |>
<?php $count = 0 ?>
<div class="qode-accordion-holder clearfix qode-toggle qode-initial  accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset hide-desktop">
	<?php foreach ($posts as $post ): ?>
	<h3 class="clearfix qode-title-holder ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom">
		<span class="qode-tab-title">
			    <span class="qode-tab-title-inner"><?php echo $post->post_title; ?></span>
		</span>
		<span class="qode-accordion-mark">
		    <span class="qode-accordion-mark-icon">
		        <span class="icon_plus"></span>
		        <span class="icon_minus-06"></span>
		    </span>
		</span>
	</h3>
	<div class="uqode-accordion-content  ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom <?php if($count == 0 ){ echo "ui-accordion-content-active"; } ?>">
		<div class="single-post-data">
				<?php if(have_rows('kurs',$post->ID)): ?>
				<table class="date_table_db custom-table">
					<tr class="table_head_row">
						<th>Datum</th>
						<th>Zeit</th>
						<th>Kurs</th>
						<th>Module</th>
						<th>Auswählen</th>
					</tr>
					<?php $idVal = 1; ?>
				<?php while(have_rows('kurs',$post->ID)): the_row(); ?>
					<tr class="custom-table-row">
						<td class="date">
							<?php
							setlocale(LC_TIME, "de_DE");
							$time = strtotime(str_replace('/', '-', get_sub_field('course_date')));
							$date = date('d.m.Y', strtotime(str_replace('/', '-', get_sub_field('course_date'))));
							$newformat = strftime('%a, ',$time);
							echo $newformat.$date;  ?>
						</td>
						<td class="time">
							<?php the_sub_field('course_timing'); ?>
						</td>
						<?php $kurs = get_sub_field_object('course_title') ?>
						<td class="kurs">
							<?php echo $kurs['choices'][$kurs['value']] ?>
						</td>
						<td class="module">
							<?php echo $kurs['value']; ?>
						</td>
						<td class="mobile-checkbox check-kurs">
						<div class="check-container">
						<input type="checkbox" id="<?php echo strtolower($post->post_title)."-id-".$idVal ?>" class="custom-checkbox" value="<?= the_sub_field('course_date'); ?>" name="<?php echo $newformat.$date; ?> | <?php the_sub_field('course_timing')?> | <?= $kurs['choices'][$kurs['value']] ?> | <?= $kurs['value'] ?> ">			
						<span class="checkmark"></span>
						</div>
						</td>
						
					</tr>
					<?php $idVal++; ?>
				<?php endwhile; ?>
				</table>
			<?php else: ?>
				<h4>Comming Soon..</h4>
			<?php endif; ?>
			</div>

	</div>
<?php $count++; ?>
<?php endforeach; ?>
</div>


<div class="custom-contact-form hidden">
	<?php 
		$contactFormID = get_field('contact_form_id','options');
		$contactFormName = get_field('contact_form_name','options');

		echo do_shortcode( '[contact-form-7 id="'.$contactFormID.'" title="'.$contactFormName.'"]' );
	?>
</div>
</div>
<div class="details-row main-details">
	<div class="single-col descripton-col">
		<p class="description">
			<?php wpautop(the_field('description','options')); ?>
		</p>
	</div>
	<div class="single-col button-col">
		<span class="btn-toggle"> <?php the_field('button_title','options') ?> </span> 
	</div>
</div>


<?php 

add_action('wp_footer', 'wpshout_action_example'); 
function wpshout_action_example() { 
    echo '<div class="details-row details-footer">
	<div class="single-col button-col footer-hook-col">
		<span class="btn-toggle"> Anfragen </span> 
	</div>
</div>'; 
}

}
add_shortcode( 'EventsBooking', 'events_booking' );

