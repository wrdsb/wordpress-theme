<?php
/*
Template Name: School List
*/
?>
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">

        <?php
              // Start the Loop.
              while ( have_posts() ) : the_post();

                // Include the post format-specific content template.
                get_template_part( 'content', 'page' );
              endwhile;
            ?>

			<div class="table-responsive hidden-xs" >
				<table class="table table-striped table-bordered">
					<thead>
					<tr>
						<th class="text-left">School, Website</th>
						<th class="text-left">Address</th>
						<th class="text-left">Phone</th>
						<!--<th class="text-left">Email</th>-->
					</tr>
				</thead>
				<tbody>
					<?php
						$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
						$schools = json_decode($json);

						foreach($schools as $school) {
					?>
						<tr>
							<td><strong><?php echo $school->full_name ?></strong><br />
								<a href="<?php echo $school->website ?>" target="_blank"><?php $website = $school->website; echo strtolower($website); ?></a>
							</td>
							<td><?php echo $school->street_address.', '.$school->city.' '.$school->postal_code?>
								(<?php echo'<a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">Map</a>' ?>)
							</td>
							<td><?php $phone=$school->phone; echo '('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,6,4) ?></td>
							<!--<td><?php $code=$school->alpha_code; $code=strtolower($code); ?>
								<a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a>
							</td>-->
						</tr>
					<?php	
						}
					?>
				</tbody>
				</table>
			</div>

			<div class="visible-xs">
				<ul class="school-list">
					<?php
						$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
						$schools = json_decode($json);

						foreach($schools as $school) {
					?>
					<li>
						<p><strong><?php echo $school->full_name ?></strong><br />
						<a href="<?php echo $school->website ?>" target="_blank"><?php $website = $school->website; echo strtolower($website); ?></a></p>
						<p><?php echo $school->street_address.', '.$school->city.' '.$school->postal_code?>
							(<?php echo'<a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">Map</a>' ?>)</p>
						<p><?php $phone=$school->phone; echo '('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,6,4) ?></p>
					</li>
					<?php	
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
