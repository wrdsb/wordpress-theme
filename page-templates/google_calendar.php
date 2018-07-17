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
				$calendars = array(
					"WRDSB_Board"      => "pp2nfhd2jnee8dfvvgqhmfd374@group.calendar.google.com",
					"WRDSB_Events"     => "googleapps.wrdsb.ca_8vcbnsnqpr9frj95jshoh47bvk@group.calendar.google.com",
					"WRDSB_Holidays"   => "oerihuqbvr58ajakvcvi6meqq8@group.calendar.google.com",
					"WRDSB_Elementary" => "col0r844ggoqm9nvgrl0lr43vk@group.calendar.google.com",
					"WRDSB_Secondary"  => "g5ibshq9uj6lrs97rq8l9mhprk@group.calendar.google.com",
				);
			
				$parsed_url = parse_url(network_site_url());
				$host = explode('.', $parsed_url['host']); // wplabs only for testing
				//$subdomain = explode('/',$_SERVER['REQUEST_URI']); // wplabs and staff site only
				$fulldomain = explode('.',$_SERVER['HTTP_HOST']); // schools
				$json_address='https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/json/school-calendars.json';
				$json = file_get_contents($json_address);
				$schools = json_decode($json);

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
							&amp;src=<?php echo $calendars["WRDSB_Board"]; ?>
							&amp;src=<?php echo $calendars["WRDSB_Holidays"]; ?>
							&amp;src=<?php echo $calendars["WRDSB_Elementary"]; ?>" 
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
							&amp;src=<?php echo $calendars["WRDSB_Board"]; ?>
							&amp;src=<?php echo $calendars["WRDSB_Holidays"]; ?>
							&amp;src=<?php echo $calendars["WRDSB_Secondary"]; ?>" 
							style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

							<div class="alert alert-info">Not using Google Calendar? Add the <?php echo $school_name; ?> calendar to your calendar using: <a class="btn btn-default" href="https://calendar.google.com/calendar/ical/<?php echo $public_calendar_id; ?>/public/basic.ics">ICAL</a> <a class="btn btn-default" href="https://calendar.google.com/calendar/embed?src=<?php echo $public_calendar_id; ?>&amp;ctz=America/Toronto" target="_blank" rel="noopener noreferrer">HTML</a></div>
						<?php 
						}
					}
				}  // end if statement for install check
			} // end function
			display_calendars(); ?> 
		</div>
	</div>
</div>
<?php get_footer();
