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
        </div>

        <div class="col-md-6 hidden-xs">
        	<a id="elementaryschools"></a>
        	<p class="hidden-xs hidden-md hidden-lg"><a href="#secondaryschools">Secondary Schools</a></p>
        	<h2>Elementary Schools</h2>
			<div class="table-responsive" >
				<table class="table table-striped table-fixed-head">
					<thead>
						<tr>
							<th class="text-left">School/Website</th>
							<th class="text-left">Address/Phone</th>
							<!--<th class="text-left">Phone</th>-->
							<!--<th class="text-left">Email</th>-->
						</tr>
					</thead>
					<tbody>
						<?php
							$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
							$schools = json_decode($json);

							foreach($schools as $school) {
								if(($school->alpha_code != 'TBR') and 
									($school->alpha_code != 'DKS') and ($school->alpha_code != 'LNA') and
									($school->alpha_code != 'SBL') and ($school->alpha_code != 'SBM') and
									($school->alpha_code != 'SMH') and ($school->alpha_code != 'PYS') and
									($school->alpha_code != 'CLC') and ($school->alpha_code != 'MBR') and
									($school->alpha_code != 'LUT') and 
									($school->alpha_code != 'LAF') and ($school->alpha_code != 'HMR') and
									($school->alpha_code != 'XSE') and ($school->alpha_code != 'CAS') and
									($school->alpha_code != 'BLV') and ($school->alpha_code != 'LNA') and
									($school->alpha_code != 'LUC') and ($school->alpha_code != 'WSR') and
									($school->alpha_code != 'ALI') and ($school->alpha_code != 'BAD') and
									($school->alpha_code != 'BRI') and ($school->alpha_code != 'HAR') and
									($school->alpha_code != 'WNB') and ($school->alpha_code != 'NWL') and
									($school->alpha_code != 'MCQ') and
									($school->school_type_code=='Elem')) {
						?>
						<tr>
							<td><strong><?php echo $school->full_name ?></strong><br />
								<a href="<?php echo $school->website ?>" target="_blank"><?php $website = $school->website; echo strtolower($website); ?></a>
							</td>
							<td><?php echo $school->street_address.'<br />'.$school->city.' '.$school->postal_code?>
								(<?php echo'<a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">Map</a>' ?>)
								<br />
								Phone: <?php $phone=$school->phone; echo '('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,6,4) ?>
							</td>
							<!--<td><?php $phone=$school->phone; echo '('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,6,4) ?></td>-->
							<!--<td><?php $code=$school->alpha_code; $code=strtolower($code); ?>
								<a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a>
							</td>-->
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
			<a id="secondaryschools"></a>
			<p class="hidden-xs hidden-md hidden-lg"><a href="#elementaryschools">Elementary Schools</a></p>
			<h2>Secondary Schools</h2>
			<div class="table-responsive" >
				<table class="table table-striped table-fixed-head">
					<thead>
						<tr>
							<th class="text-left">School/Website</th>
							<th class="text-left">Address/Phone</th>
							<!--<th class="text-left">Phone</th>-->
							<!--<th class="text-left">Email</th>-->
						</tr>
					</thead>
					<tbody>
						<?php
							$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
							$schools = json_decode($json);

							foreach($schools as $school) {
								if(($school->alpha_code != 'ALR') and ($school->alpha_code != 'ALC') and
									($school->alpha_code != 'ALU') and ($school->alpha_code != 'ANC') and
									($school->alpha_code != 'ALR') and ($school->alpha_code != 'ELE') and
									($school->alpha_code != 'ALR') and ($school->alpha_code != 'ALC') and
									($school->alpha_code != 'XSS') and ($school->alpha_code != 'UTR') and
									($school->alpha_code != 'WSS') and ($school->alpha_code != 'UHS') and 
									($school->school_type_code=='Sec')) {
						?>
						<tr>
							<td><strong><?php echo $school->full_name ?></strong><br />
								<a href="<?php echo $school->website ?>" target="_blank"><?php $website = $school->website; echo strtolower($website); ?></a>
							</td>
							<td><?php echo $school->street_address.'<br />'.$school->city.' '.$school->postal_code?>
								(<?php echo'<a href="http://maps.google.com/maps?f=q&hl=en&q='.$school->street_address.'+'.$school->city.'+Ontario" target="_blank">Map</a>' ?>)
								<br />
								Phone: <?php $phone=$school->phone; echo '('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,6,4) ?>
							</td>
							<!--<td><?php $phone=$school->phone; echo '('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,6,4) ?></td>-->
							<!--<td><?php $code=$school->alpha_code; $code=strtolower($code); ?>
								<a href="mailto:<?php echo $code; ?>@wrdsb.on.ca"><?php echo $code; ?>@wrdsb.on.ca</a>
							</td>-->
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
			<a id="elementaryschools_xs"></a>
			<p><a href="#secondaryschools_xs">Secnodary Schools</a></p>
		
			<h2>Elementary Schools</h2>

			<ul class="table-list">
				<?php
					$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
					$schools = json_decode($json);

					foreach($schools as $school) {
						if(($school->alpha_code != 'TBR') and 
									($school->alpha_code != 'DKS') and ($school->alpha_code != 'LNA') and
									($school->alpha_code != 'SBL') and ($school->alpha_code != 'SBM') and
									($school->alpha_code != 'SMH') and ($school->alpha_code != 'PYS') and
									($school->alpha_code != 'CLC') and ($school->alpha_code != 'MBR') and
									($school->alpha_code != 'LUT') and 
									($school->alpha_code != 'LAF') and ($school->alpha_code != 'HMR') and
									($school->alpha_code != 'XSE') and ($school->alpha_code != 'CAS') and
									($school->alpha_code != 'BLV') and ($school->alpha_code != 'LNA') and
									($school->alpha_code != 'LUC') and ($school->alpha_code != 'WSR') and
									($school->alpha_code != 'ALI') and ($school->alpha_code != 'BAD') and
									($school->alpha_code != 'BRI') and ($school->alpha_code != 'HAR') and
									($school->alpha_code != 'WNB') and ($school->alpha_code != 'NWL') and
									($school->alpha_code != 'MCQ') and
									($school->school_type_code=='Elem')) {
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
					}
				?>
			</ul>

			<a id="secondaryschools_xs"></a>
			<p><a href="#elementaryschools_xs">Elementary Schools</a></p>
			<h2>Secondary Schools</h2>
			<ul class="table-list">
				<?php
					$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/school');
					$schools = json_decode($json);

					foreach($schools as $school) {
						if(($school->alpha_code != 'ALR') and ($school->alpha_code != 'ALC') and
									($school->alpha_code != 'ALU') and ($school->alpha_code != 'ANC') and
									($school->alpha_code != 'ALR') and ($school->alpha_code != 'ELE') and
									($school->alpha_code != 'ALR') and ($school->alpha_code != 'ALC') and
									($school->alpha_code != 'XSS') and ($school->alpha_code != 'UTR') and
									($school->alpha_code != 'WSS') and ($school->alpha_code != 'UHS') and 
									($school->school_type_code=='Sec')) {
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
					}
				?>
			</ul>
		</div>
	</div>
</div>

<?php get_footer(); ?>
