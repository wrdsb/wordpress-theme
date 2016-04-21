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

				// all schools that shouldn't display
              	$hidden_schools  = array ('ALC','ALI','ALR','ALU','ANC','BAD','BLV','BRI','CAS','CLC','CLN','DKS','ELE','HAR','HMR','LAF','LNA','LUC','LUT','MBR','MCQ','NWL','PYS','RMT','SBL','SBM','SMH','TBR','UHS','UTR','WNB','WSR','WSS','XSE','XSS');

				$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
				//for testing only
				//$json = file_get_contents('/nas/content/live/wrdsb/wp-content/themes/school-list/inc/allschools.json');
				$schools = json_decode($json);

            ?>
        </div>

        <div class="col-md-6 hidden-xs">
        	<h2 id="elementaryschools">Elementary Schools</h2>
			<div class="table-responsive" >
				<table class="table table-striped table-fixed-head">
					<thead>
						<tr>
							<th class="text-left">Address</th>
							<th class="text-left">Phone</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($schools as $school) {
								$website = strtolower($school->website);
								$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
								$phone = $school->phone;
								$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);
								$code = strtolower($school->alpha_code);

								if (
									!in_array ($school->alpha_code, $hidden_schools)  && 
									($school->school_type_code=='Elem')
									)								
									{

						?>
						<tr>
							<td><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name; ?></a></strong><br />
								<?php echo $school->street_address .'<br />'.$school->city.' ON '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>'; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a><br />-->
								<?php echo $phone; ?>
							</td>
						</tr>
						<?php	
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6 hidden-xs">
			<h2 id="secondaryschools">Secondary Schools</h2>
			<div class="table-responsive" >
				<table class="table table-striped table-fixed-head">
					<thead>
						<tr>
							<th class="text-left">Address</th>
							<th class="text-left">Phone</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($schools as $school) {
								$website = strtolower($school->website);
								$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
								$phone = $school->phone;
								$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);

								if (
									!in_array ($school->alpha_code, $hidden_schools)  && 
									($school->school_type_code=='Sec')
									)

								{
						?>
						<tr>
							<td><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name; ?></a></strong><br />
								<?php echo $school->street_address .'<br />'.$school->city.' ON '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>'; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a><br />-->
								<?php echo $phone; ?>
							</td>
						</tr>
						<?php	
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-12 visible-xs">
			<p><a href="#secondaryschools_xs">Skip to Secondary Schools</a></p>
		
			<h2 id="elementaryschools_xs">Elementary Schools</h2>

			<?php
			foreach($schools as $school) {
				$website = strtolower($school->website);
				$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
				$phone = $school->phone;
				$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);
				$code = strtolower($school->alpha_code);

				if (
					!in_array ($school->alpha_code, $hidden_schools)  && 
					($school->school_type_code=='Elem')
					)								
					{
				?>
				<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong></br />
					<?php echo $school->street_address.'<br />'.$school->city.' ON '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>';?><br />
					<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a><br /> -->
					<?php echo $phone; ?></p>
				<?php	
					}
				}
				?>

			<p><a href="#elementaryschools_xs">Back to Elementary Schools</a></p>
			<h2 id="secondaryschools_xs">Secondary Schools</h2>
			<?php
			foreach($schools as $school) {
				$website = strtolower($school->website);
				$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
				$phone = $school->phone;
				$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);

				if (
					!in_array ($school->alpha_code, $hidden_schools)  && 
					($school->school_type_code=='Sec')
					)

					{
				?>
					<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong></br />
							<?php echo $school->street_address.'<br />'.$school->city.' ON '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>';?><br />
							<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a><br /> -->
							<?php echo $phone; ?></p>
				<?php	
					}
				}
				?>
		</div>
	</div>
</div>

<?php get_footer();