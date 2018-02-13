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

				// school types
             	//$elementaryschools = array("ark","abe","alp","ave","ayr","bdn","blr","bre","brp","bgd","cdc","ced","cnc","cnw","ctr","cha","chi","cle","con","cor","coh","crl","cre","doo","dpk","est","elg","elz","emp","flo","fgl","fhl","fra","gcp","gvc","gvn","gro","hes","hig","hil","how","jfc","jwg","jme","jst","jdp","jma","kea","ked","lkw","lrw","lau","lbp","lex","lnh","lin","mcg","mck","man","mrg","mjp","mea","mil","mof","nam","ndd","nlw","pkm","pkw","pio","pre","pru","qel","qsm","riv","roc","rmt","rye","sag","shl","snd","she","sil","sab","smi","srg","sta","stj","stn","stw","sud","sun","tai","tri","vis","wtt","wel","wsh","wsm","wsv","wgd","wlm","wls","wcp","wpk");
              	//$secondaryschools = array("bci","chc","eci","eds","fhc","gci","gps","grc","hrh","jhs","kci","phs","jam","sss","wci","wod");

              	$json_address='https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/json/school-calendars.json';
				$json = file_get_contents($json_address);
				$calendars = json_decode($json);

            ?>
        </div>

						<?php
							foreach($calendars as $calendar) {
								$schoolname = $calendar->full_name;
								$public_calendar_id = $calendar->public_calendar_id;
								$staff_calendar_id = $calendar->staff_calendar_id;
								
					    	// Get all the information about the site
							$sitename = get_bloginfo('name');
							$siteurl = site_url();
							$parsed_url = parse_url(network_site_url());
							$host = explode('.', $parsed_url['host']);


								if ( $host === 'staff' && wrdsb_i_am_a_school() && !wrdsb_i_am_a_school_secondary()  ) {
									?>
									<!-- Elementary Staff -->

									<iframe src="https://calendar.google.com/calendar/embed?
									showTitle=0
									&amp;showTz=0
									&amp;ctz=America/Toronto
									&amp;src="<?php echo $staff_calendar_id;?>
									&amp;src="<?php echo $public_calendar_id;?>
									&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_tfmv2qk1779181ronae9uk6988@group.calendar.google.com" 
									style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
								<?php } else if ( $host === 'staff' && wrdsb_i_am_a_school_secondary() ) {
									?>
									<!-- Secondary Staff -->

									<iframe src="https://calendar.google.com/calendar/embed?
									showTitle=0
									&amp;showTz=0
									&amp;ctz=America/Toronto
									&amp;src=<?php echo $staff_calendar_id;?>
									&amp;src="<?php echo $public_calendar_id;?>
									&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_0jfcu96cgct7pcuuo2e84anov0@group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
									style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
								<?php } else if ( $host === 'staff' && wrdsb_i_am_a_school() && !wrdsb_i_am_a_school_secondary()  ) {
									?>
									<!-- Elementary Public -->

									<iframe src="https://calendar.google.com/calendar/embed?
									showTitle=0
									&amp;showTz=0
									&amp;ctz=America/Toronto
									&amp;src="<?php echo $staff_calendar_id;?>
									&amp;src="<?php echo $public_calendar_id;?>
									&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_tfmv2qk1779181ronae9uk6988@group.calendar.google.com" 
									style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
								<?php } else if ( $host === 'staff' && wrdsb_i_am_a_school_secondary() ) {
									?>
									<!-- Secondary Public -->

									<iframe src="https://calendar.google.com/calendar/embed?
									showTitle=0
									&amp;showTz=0
									&amp;ctz=America/Toronto
									&amp;src=<?php echo $staff_calendar_id;?>
									&amp;src="<?php echo $public_calendar_id;?>
									&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_0jfcu96cgct7pcuuo2e84anov0@group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_p103vo5u34ilmtf0mvr600q60s@group.calendar.google.com
									&amp;src=googleapps.wrdsb.ca_lj8usonv13of47900al71a4rr8@group.calendar.google.com" 
									style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
								<?php } ?> 
<?php get_footer();