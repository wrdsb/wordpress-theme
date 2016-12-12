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

              	$alt_con_ed_schools = array('ALC', 'ALU', 'CLN', 'INL', 'INS', 'RMT');

				$json = file_get_contents('https://s3.amazonaws.com/wrdsb-ui-assets/0/0.10.4/json/schools.json');
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
						<tr>
							<td><strong><a href="https://www.wrdsb.ca/alternative-education/choices/" target="_blank">Choices for Youth</a> Cambridge</strong><br>
								256 Hespeler Road<br>Cambridge ON N1R 3H3 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=256 Hespeler Road+Cambridge+Ontario" target="_blank">MAP</a> ]</span></td>
							<td><!-- <a href="mailto:wpk@wrdsb.on.ca">wpk@wrdsb.on.ca</a><br />-->
								519-622-9041</td>
						</tr>
						<tr>
							<td><strong><a href="https://www.wrdsb.ca/alternative-education/choices/" target="_blank">Choices for Youth</a> Waterloo</strong><br>
								151 Weber St S<br>Waterloo ON N2J 2A9 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=151 Weber St S+Waterloo+Ontario" target="_blank">MAP</a> ]</span></td>
							<td><!-- <a href="mailto:wpk@wrdsb.on.ca">wpk@wrdsb.on.ca</a><br />-->
								519-885-0800</td>
						</tr>
							<td><strong><a href="https://www.wrdsb.ca/alternative-education/u-turn/" target="_blank">UTurn</a> Cambridge</strong><br>
								256 Hespeler Road<br>Cambridge ON N1R 3H3 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=256 Hespeler Road+Cambridge+Ontario" target="_blank">MAP</a> ]</span></td>
							<td><!-- <a href="mailto:wpk@wrdsb.on.ca">wpk@wrdsb.on.ca</a><br />-->
								519-622-9041</td>
						</tr>
						<tr>
							<td><strong><a href="https://www.wrdsb.ca/alternative-education/u-turn/" target="_blank">UTurn</a> Waterloo</strong><br>
								151 Weber St S<br>Waterloo ON N2J 2A9 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=151 Weber St S+Waterloo+Ontario" target="_blank">MAP</a> ]</span></td>
							<td><!-- <a href="mailto:wpk@wrdsb.on.ca">wpk@wrdsb.on.ca</a><br />-->
								519-885-0800</td>
						</tr>
					</tbody>
				</table>
			</div>

							<h2 id="alt-con-ed_xs">Continuing Education</h2>
			<h3 id="language_schools">International Languages</h3>
			
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
						<tr>
							<td><strong><a href="https://chinese.wrdsb.ca/" target="_blank">Chinese Language School</a></strong><br>
			300 Hazel Street<br>Waterloo ON N2L 3P2 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=300 Hazel Street+Waterloo+Ontario" target="_blank">MAP</a> ]</span></td>
							<td>519-884-9590</td>
						</tr>
						<tr>
							<td><strong><a href="https://german.wrdsb.ca/" target="_blank">Concordia German Language School</a></strong><br>
			175 Indian Road<br>Kitchener ON N2B 2S7 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=175 Indian Road+Kitchener+Ontario" target="_blank">MAP</a> ]</span></td>
							<td>519-576-5150 x5070</td>
						</tr>
						<tr>
							<td><strong><a href="https://greek.wrdsb.ca/" target="_blank">Greek Language School</a></strong><br>
			153 Montcalm Drive<br>Kitchener ON N1R 3H3 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=153%20Montcalm%20Drive+Kitchener,%20Ontario+Ontario" target="_blank">MAP</a> ]</span></td>
							<td>519-893-1140</td>
						</tr>
						<tr>
							<td><strong><a href="https://serbian.wrdsb.ca/" target="_blank">Serbian Language School</a></strong><br>
			191 Hickson Drive<br>Kitchener ON N2B 2H8 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=191 Hickson Drive+Kitchener+Ontario" target="_blank">MAP</a> ]</span></td>
							<td>519-578-3750</td>
						</tr>
					</tbody>
				</table>
			</div>

			<h2 id="new_schools">New Schools Opening in 2017</h2>

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
						<tr>
							<td><strong><a href="https://chi.wrdsb.ca/" target="_blank">Chicopee Hills Public School</a></strong><!--<br>
			191 Hickson Drive<br>Kitchener ON N2B 2H8 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=191 Hickson Drive+Kitchener+Ontario" target="_blank">MAP</a> ]</span>--></td>
							<td><!--519-578-3750--></td>
						</tr>
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
			<h2 id="alt-con-ed_xs">Alternative Education</h2>
			
			<p style="margin-bottom: 25px;"><strong><a href="https://www.wrdsb.ca/alternative-education/choices/" target="_blank">Choices for Youth</a> Cambridge</strong><br>
			256 Hespeler Road<br>Cambridge ON N1R 3H3 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=256 Hespeler Road+Cambridge+Ontario" target="_blank">MAP</a> ]</span><br>
			519-662-9041</p>

			<p style="margin-bottom: 25px;"><strong><a href="https://www.wrdsb.ca/alternative-education/choices/" target="_blank">Choices for Youth</a> Waterloo</strong><br>
			151 Weber St S<br>Waterloo ON N2J 2A9 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=151 Weber St S+Waterloo+Ontario" target="_blank">MAP</a> ]</span><br>
			519-885-0123</p>

			<p style="margin-bottom: 25px;"><strong><a href="https://www.wrdsb.ca/alternative-education/u-turn/" target="_blank">UTurn</a> Cambridge</strong><br>
			256 Hespeler Road<br>Cambridge ON N1R 3H3 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=256 Hespeler Road+Cambridge+Ontario" target="_blank">MAP</a> ]</span><br>
			519-662-9041</p>

			<p style="margin-bottom: 25px;"><strong><a href="https://www.wrdsb.ca/alternative-education/u-turn/" target="_blank">UTurn</a> Waterloo</strong><br>
			151 Weber St S<br>Waterloo ON N2J 2A9 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=151 Weber St S+Waterloo+Ontario" target="_blank">MAP</a> ]</span><br>
			519-885-0123</p>

			<h2 id="alt-con-ed_xs">Continuing Education</h2>
			<h3 id="language_schools">International Languages</h3>
			
			<p style="margin-bottom: 25px;"><strong><a href="https://chinese.wrdsb.ca/" target="_blank">Chinese Language School</a></strong><br>
			300 Hazel Street<br>Waterloo ON N2L 3P2 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=300 Hazel Street+Waterloo+Ontario" target="_blank">MAP</a> ]</span><br>
			519-884-9590</p>

			<p style="margin-bottom: 25px;"><strong><a href="https://german.wrdsb.ca/" target="_blank">Concordia German Language School</a></strong><br>
			175 Indian Road<br>Kitchener ON N2B 2S7 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=175 Indian Road+Kitchener+Ontario" target="_blank">MAP</a> ]</span><br>
			519-576-5150 x5070</p>

			<p style="margin-bottom: 25px;"><strong><a href="https://greek.wrdsb.ca/" target="_blank">Greek Language School</a></strong><br>
			153 Montcalm Drive<br>Kitchener ON N1R 3H3 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=153%20Montcalm%20Drive+Kitchener,%20Ontario+Ontario" target="_blank">MAP</a> ]</span><br>
			519-893-1140</p>

			<p style="margin-bottom: 25px;"><strong><a href="https://serbian.wrdsb.ca/" target="_blank">Serbian Language School</a></strong><br>
			191 Hickson Drive<br>Kitchener ON N2B 2H8 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=191 Hickson Drive+Kitchener+Ontario" target="_blank">MAP</a> ]</span><br>
			519-578-3750</p>

			<h2 id="new_schools_xs">New Schools Opening in 2017</h2>

			<p style="margin-bottom: 25px;"><strong><a href="https://chi.wrdsb.ca/" target="_blank">Chicopee Hills Public School</a></strong><!--<br>
			191 Hickson Drive<br>Kitchener ON N2B 2H8 <span class="smallcaps">[ <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=191 Hickson Drive+Kitchener+Ontario" target="_blank">MAP</a> ]</span><br>
			519-578-3750--></p>

		</div>
	</div>
</div>

<?php get_footer();
