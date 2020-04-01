<?php 
$args = array(
		'post_type' 		=> 'event',
		'posts_per_page' 	=> -1,
		'order'				=> 'ASC',
	);

$posts = get_posts($args);
?>
<section class="section section-termine">
	<div class="container">
	  	<div class="row">
	  		<div class="col-12">
				<div class="title">
			        <h2><?php the_sub_field('section_title') ?></h2>
			      </div>
			      <div class="subtitle">
			          <?php if(!empty(get_sub_field('editor'))): ?>
			            <p class="header-description">
			              <?php the_sub_field('editor'); ?>
			            </p>
			        <?php endif; ?>
			      </div>
		  	</div>

		  	<div class="col-12 d-none d-lg-block">
		  		<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <?php $flag = 0; ?>
					<?php foreach ($posts as $post ): ?>
						<a class="nav-item nav-link <?php if ($flag == 0){ echo "show active"; } ?>"" id="nav-<?= $post->ID ?>-tab" data-toggle="tab" href="#nav-<?= $post->ID ?>" role="tab" aria-controls="nav-<?= $post->ID ?>" aria-selected="false"><?= $post->post_title; ?></a>
						<?php $flag = 1; ?>
					<?php endforeach; ?>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <?php $flag2 = 0; ?>
					<?php foreach ($posts as $post ): ?>
				  <div class="tab-pane fade <?php if ($flag2 == 0){ echo "show active"; } ?>" id="nav-<?= $post->ID ?>" role="tabpanel" aria-labelledby="nav-home-tab">
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
				<?php $flag2 = 1; ?>
					<?php endforeach; ?>
				</div>
		  	</div>
		  	<div class="col-12 d-md-block d-lg-none">
		  		<div class="accordion custom-accordion" id="accordion-events">
		  			<?php $flag3 = true; ?>
		  			<?php foreach ($posts as $post ): ?>
					  <div class="card">
					    <div class="card-header<?php if($flag == true){ echo " active-acc";} ?>" id="heading-collapse-<?= $post->ID ?>">
					      <h3 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?= $post->ID ?>" aria-expanded="true" aria-controls="collapse-<?= $post->ID ?>">
					          <?php echo $post->post_title ?>
					        </button>
					      </h3>
					    </div>

					    <div id="collapse-<?= $post->ID ?>" class="collapse <?php if($flag == true){ echo "show";} ?>" aria-labelledby="heading-collapse-<?= $post->ID ?>" data-parent="#accordion-events">
					      <div class="card-body">
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
					    </div>
					  </div>
					<?php $flag = false; ?>
		  			<?php endforeach; ?>



					</div>
		  	</div>

  		</div>
  	</div>
  		<div class="container">
	  		<div class="row">
	  			<div class="col-12">
	  				<div class="custom-contact-form hidden">
						<?php 
							$contactFormID = get_field('contact_form_id','options');

							$contactFormName = get_field('contact_form_name','options');

							echo do_shortcode( '[contact-form-7 id="'.$contactFormID.'" title="'.$contactFormName.'"]' );
						?>
					</div>
				</div>
	  			</div>
	  		</div>
  			<div class="row">
  			<div class="col-12">
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
  			</div>
  		</div>
  		</div>
</section>
<?php wp_reset_postdata(); ?>