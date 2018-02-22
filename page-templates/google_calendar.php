<?php
/*
Template Name: Google Calendar
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

	        function display_calendars() {
					$parsed_url = parse_url(site_url());
					$host = explode('.', $parsed_url['host']);
					$subdomain = explode('/',$_SERVER['REQUEST_URI']);							              	
		      		$json_address='https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/json/school-calendars.json';
					$json = file_get_contents($json_address);
					$schools = json_decode($json);

					if ( $host[0] === 'staff' && wrdsb_i_am_a_school() && !wrdsb_i_am_a_school_secondary() ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $subdomain[1] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								?>
								<!-- Elementary Staff -->

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $staff_calendar_id;?>
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_tfmv2qk1779181ronae9uk6988@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

					<?php 
							}
						}
					} else if ( $host[0] === 'staff' && wrdsb_i_am_a_school_secondary() ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $subdomain[1] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								?>
								<!-- Secondary Staff -->

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $staff_calendar_id;?>
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_0jfcu96cgct7pcuuo2e84anov0@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
					<?php 
							}
						}
					} else if ( $host[0] === 'staff' && wrdsb_i_am_a_school() && !wrdsb_i_am_a_school_secondary()  ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $subdomain[1] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								?>
								<!-- Elementary Public -->

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $staff_calendar_id;?>
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_tfmv2qk1779181ronae9uk6988@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
					<?php 
							}
						}
					} else if ( $host[0] === 'schools' && wrdsb_i_am_a_school_secondary() ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $subdomain[1] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								?>
								<!-- Secondary Public -->

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $staff_calendar_id;?>
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_0jfcu96cgct7pcuuo2e84anov0@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
					<?php 
							}
						}
					} else if ( $host[0] === 'wplabs' ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $subdomain[1] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								?>

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $staff_calendar_id;?>
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_8vcbnsnqpr9frj95jshoh47bvk%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
						<?php 
						} // end foreach
					} // end display code
				} // end if statement for install check
			} // end function
			display_calendars(); ?> 
		</div>
	</div>
</div>
<?php get_footer();