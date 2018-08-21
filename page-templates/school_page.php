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
              	$hidden_schools  = array ('ALC','ALI','ALR','ALU','ANC','BAD','BLV','BRI','CAS','CLC','CLN','DKS','ELE','HAR','HMR','LAF','LNA','LUC','LUT','MBR','MCQ','NWL','PYS','SBL','SBM','SMH','TBR','UHS','UTR','WNB','WSR','WSS','XSE','XSS');

              	$alt_con_ed_schools = array('ALC', 'ALU', 'CLN', 'INL', 'INS');
              	$con_ed_schools = array('INE','INS','INL','NSC','NSN','NSS','ODC','ODW','SEC','SEN','SEO','SES','SCC','SCE','SCN','SCO','SCS','SBL','SBM');

              	$json_address='https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/json/schools.json';
				$json = file_get_contents($json_address);
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
								<?php echo $school->street_address .'<br />'.$school->city.' ON  '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>'; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br />-->
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
								<?php echo $school->street_address .'<br />'.$school->city.' ON  '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>'; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br />-->
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

			<h2 id="environmental-education">Outdoor and Environmental Education</h2>

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
								if ($school->street_address === '') {
									$address = ''; }
								else {
									$address = '</strong><br />' . $school->street_address .'<br />' . $school->city . ' ON  ' . $postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q=' . $school->street_address . '+' . $school->city . '+Ontario" target="_blank">MAP</a> ]</span>';
								}
								$website = strtolower($school->website);
								$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
								if ($school->phone != '') {
									$phone = $school->phone;
									$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);
								} else {
									$phone = '';
								}
								$code = strtolower($school->alpha_code);

								if (
									!in_array ($school->alpha_code, $hidden_schools)  &&
									($school->school_type_code=='EnvEd')
									)
									{
						?>
						<tr>
							<td><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name; ?></a></strong><?php echo $address; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br />-->
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

			<h2 id="alt-con-ed">Alternative Education</h2>
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
								if ($school->street_address != '') {
									$address = '</strong><br />' . $school->street_address .'<br />' . $school->city . ' ON  ' . $postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q=' . $school->street_address . '+' . $school->city . '+Ontario" target="_blank">MAP</a> ]</span>';
								}
								$website = strtolower($school->website);
								$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
								if ($school->phone != '') {
									$phone = $school->phone;
									$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);
								}
								$code = strtolower($school->alpha_code);

								if (
									!in_array ($school->alpha_code, $hidden_schools)  &&
									($school->school_type_code=='AlternativeEducation')
									)
									{
						?>
						<tr>
							<td><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name; ?></a></strong><?php echo $address; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br />-->
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

			<h2 id="alt-con-ed_xs">Continuing Education</h2>
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
								if ($school->street_address != '') {
									$address = '</strong><br />' . $school->street_address .'<br />' . $school->city . ' ON  ' . $postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q=' . $school->street_address . '+' . $school->city . '+Ontario" target="_blank">MAP</a> ]</span>';
								}
								$website = strtolower($school->website);
								$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
								if ($school->phone != '') {
									$phone = $school->phone;
									$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);
								}
								$code = strtolower($school->alpha_code);

								if (
									!in_array ($school->alpha_code, $hidden_schools)  &&
									!in_array($school->alpha_code, $con_ed_schools) &&
									($school->school_type_code=='ConEd')
									)
									{
						?>
						<tr>
							<td><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name; ?></a></strong><?php echo $address; ?>
							</td>
							<td>
								<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br />-->
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
				<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong><br />
					<?php echo $school->street_address.'<br />'.$school->city.' ON  '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>';?><br />
					<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br /> -->
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
					<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong><br />
							<?php echo $school->street_address.'<br />'.$school->city.' ON  '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>';?><br />
							<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br /> -->
							<?php echo $phone; ?></p>
				<?php
					}
				}
				?>

			<h2 id="environmental-education_xs">Outdoor and Environmental Education</h2>
			
			<?php
			foreach($schools as $school) {
				if ($school->street_address === '') {
					$address = ''; }
				else {
					$address = '</strong><br />' . $school->street_address .'<br />' . $school->city . ' ON  ' . $postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q=' . $school->street_address . '+' . $school->city . '+Ontario" target="_blank">MAP</a> ]</span>';
				}
				$website = strtolower($school->website);
				$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
				if ($school->phone != '') {
					$phone = $school->phone;
					$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);
				} else {
					$phone = '';
				}
				$code = strtolower($school->alpha_code);
				if (
					!in_array ($school->alpha_code, $hidden_schools)  &&
					($school->school_type_code=='EnvEd')
					)
					{ 
				?>
					<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong><?php echo $address; ?><?php echo $phone; ?></p>
				<?php
					}
				}
				?>

			<h2 id="alt-con-ed_xs">Alternative Education</h2>
			
				<?php
			foreach($schools as $school) {
				$website = strtolower($school->website);
				$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
				$phone = $school->phone;
				$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);

			if (
				!in_array ($school->alpha_code, $hidden_schools)  && ($school->school_type_code=='AlternativeEducation')
				)
					{
				?>
					<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong><br />
							<?php echo $school->street_address.'<br />'.$school->city.' ON  '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>';?><br />
							<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br /> -->
							<?php echo $phone; ?></p>
				<?php
					}
				}
				?>

	
			<h2 id="alt-con-ed_xs">Continuing Education</h2>

				<?php
			foreach($schools as $school) {
				$website = strtolower($school->website);
				$postal_code  = substr($school->postal_code,0,3). ' ' .substr($school->postal_code,3,3);
				$phone = $school->phone;
				$phone = substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);

				if (
					!in_array ($school->alpha_code, $hidden_schools)  &&
					!in_array($school->alpha_code, $con_ed_schools) &&
					($school->school_type_code=='ConEd')
					)
					{
				?>
					<p style="margin-bottom: 25px;"><strong><a href="<?php echo $website; ?>" target="_blank"><?php echo $school->full_name ?></a></strong><br />
							<?php echo $school->street_address.'<br />'.$school->city.' ON  '.$postal_code . ' <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">MAP</a> ]</span>';?><br />
							<!-- <a href="mailto:<?php echo $code; ?>@wrdsb.ca"><?php echo $code; ?>@wrdsb.ca</a><br /> -->
							<?php echo $phone; ?></p>
				<?php
					}
				}
				?>

		</div>
	</div>
</div>

<?php get_footer();