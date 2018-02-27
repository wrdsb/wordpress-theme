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
					$parsed_url = parse_url(network_site_url());
					$host = explode('.', $parsed_url['host']); // wplabs only for testing
					//$subdomain = explode('/',$_SERVER['REQUEST_URI']); // wplabs and staff site only
					$fulldomain = explode('.',$_SERVER['HTTP_HOST']); // schools
		      		$json_address='https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/json/school-calendars.json';
					$json = file_get_contents($json_address);
					$schools = json_decode($json);

/*					// disabled as school handbooks may be removed by Communications
					// unknown issue not permitting secondary schools to display left unfixed [SZC]

					if ( wrdsb_i_am_a_staff_site() && !wrdsb_i_am_a_school_secondary() ) {

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
					} else if ( wrdsb_i_am_a_staff_site() && wrdsb_i_am_a_school_secondary() ) {

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
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
					<?php 
							}
						}
					} else */
					if ( $host[0] === 'schools' && !wrdsb_i_am_a_school_secondary() ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $fulldomain[0] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								$school_name = $school->full_name;
								?>
								<!-- Elementary Public -->

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_tfmv2qk1779181ronae9uk6988@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

								<div class="alert alert-info">Not using Google Calendar? Add the <?php echo $school_name; ?> calendar to your calendar using: <a class="btn btn-default" href="https://calendar.google.com/calendar/ical/<?php echo $public_calendar_id; ?>/public/basic.ics">ICAL</a> <a class="btn btn-default" href="https://calendar.google.com/calendar/embed?src=<?php echo $public_calendar_id; ?>&amp;ctz=America/Toronto" target="_blank" rel="noopener noreferrer">HTML</a></div>
					<?php 
							}
						}
					} else if ( $host[0] === 'schools' && wrdsb_i_am_a_school_secondary() ) {

						foreach ( $schools as $school ) {
					
							if ( $school->schoolcode === $fulldomain[0] ) {	
								$staff_calendar_id = $school->staff_calendar_id;
								$public_calendar_id = $school->public_calendar_id;
								$school_name = $school->full_name;
								?>
								<!-- Secondary Public -->

								<iframe src="https://calendar.google.com/calendar/embed?
								showTitle=0
								&amp;showTz=0
								&amp;ctz=America/Toronto
								&amp;src=<?php echo $public_calendar_id;?>
								&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
								&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
								style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

								<div class="alert alert-info">Not using Google Calendar? Add the <?php echo $school_name; ?> calendar to your calendar using: <a class="btn btn-default" href="https://calendar.google.com/calendar/ical/<?php echo $public_calendar_id; ?>/public/basic.ics">ICAL</a> <a class="btn btn-default" href="https://calendar.google.com/calendar/embed?src=<?php echo $public_calendar_id; ?>&amp;ctz=America/Toronto" target="_blank" rel="noopener noreferrer">HTML</a></div>
					<?php 
							}
						}
/*
					// for testing only
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
					} // end display code */
				} // end if statement for install check
			} // end function
			display_calendars(); ?> 
		</div>
	</div>
</div>
<?php get_footer();