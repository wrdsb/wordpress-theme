<?php
/*
Template Name: Staff List
*/
?>
<?php $user_query = new WP_User_Query(array('blog_id' => $GLOBALS['blog_id'])); ?>
<?php get_header(); ?>

<div class="container" role="main">
  <div class="row">
    <div class="col-md-12">
    <?php
      // Start the content loop.
      while ( have_posts() ) : the_post();
        // Include the post format-specific content template.
        get_template_part( 'content', 'page' );
      endwhile;

      // User Loop
      if (!empty($user_query->results)) { ?>
        <div class="table-responsive hidden-sm hidden-xs" >
          <table class="table table-striped table-bordered table-fixed-head" data-toggle="table" data-sort-name="role">
            <thead>
              <tr>
                <th class="text-left" data-field="name" data-sortable="true">Name</th>
                <th class="text-left" data-field="role" data-sortable="true">Role</th>
                <th class="text-left" data-field="email" data-sortable="true">Email</th>
                <?php /* <th class="text-left" data-field="voicemail" data-sortable="true">Voicemail</th> */ ?>
                <th class="text-left" data-field="website" data-sortable="true">Website</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach($user_query->results as $user) {
                // if okay to display and not the default admin account
                if ((get_user_option('wrdsb_display_in_staff_list', $user->ID) == 1) && ($user->ID != 1)) { 
                  // get how they want to be contacted
                  $wrdsb_contact_options = get_user_option('wrdsb_contact_options', $user->ID);
                  // get their voicemail
                  $wrdsb_voicemail = get_user_option('wrdsb_voicemail', $user->ID);
                  // remove V from voicemail
                  if (substr($wrdsb_voicemail,0,1) === 'V') {
                    $wrdsb_voicemail = ltrim($wrdsb_voicemail, 'V');
                  }
                  // get the teacher website
                  $wrdsb_website_url = get_user_option('wrdsb_website_url', $user->ID); 

                  if ($user->last_name !== '' && $user->first_name !== '') {
                    $staff_name = $user->last_name . ", " . $user->first_name;
                  } else {
                    $staff_name = '';
                  }
                ?>
                  <tr>
                    <td><?php echo $staff_name; ?></td>
                    <td><?php echo get_user_option('wrdsb_job_title', $user->ID); ?></td>
                    <?php 
                    /* Email and Voicemail Columns */

                    // if set to Email Only 
                    if ($wrdsb_contact_options == 'Email') { ?>
                      <td><?php echo $user->user_email; ?></td>
                    <?php /*  <td>&nbsp;</td> */ ?>
                    
                    <?php // if set to Voicemail Only
                    } elseif ($wrdsb_contact_options == 'Voicemail') { ?>
                      <td>&nbsp;</td>
                      <?php //<td>echo $wrdsb_voicemail;</td> */?>
                    
                    <?php // if set to Both
                    } else { ?>
                      <td><?php echo $user->user_email; ?></td>
                      <?php //<td>echo $wrdsb_voicemail;</td> */?>
                      <?php /* code for VM */ //echo $wrdsb_voicemail; ?>
                    <?php } ?>
                    <?php 
                    /* Website Link */

                    // if a website is listed 
                    if (strpos($wrdsb_website_url, 'wrdsb.ca') !== FALSE) { ?>
                      <td><a href="<?php echo $wrdsb_website_url; ?>"><?php echo $wrdsb_website_url; ?></a></td>
                    <?php } else { ?>
                      <td>&nbsp;</td>
                    <?php } ?>
                  </tr>
                <?php } } ?>
            </tbody>
          </table>
        </div>

        <div class="visible-sm visible-xs">
          <ul class="table-list">
            <?php
            foreach($user_query->results as $user) {  
                if ((get_user_option('wrdsb_display_in_staff_list', $user->ID) == 1) && ($user->ID != 1)) { 

                  // get how they want to be contacted
                  $wrdsb_contact_options = get_user_option('wrdsb_contact_options', $user->ID);
                  // get their voicemail
                  /* $wrdsb_voicemail = get_user_option('wrdsb_voicemail', $user->ID);
                  if (substr($wrdsb_voicemail,0,1) === 'V') {
                      $wrdsb_voicemail = ltrim($wrdsb_voicemail, 'V');
                  }*/

                  if ($user->last_name !== '' && $user->first_name !== '') {
                    $staff_name = '<strong>' . $user->last_name . ", " . $user->first_name . '</strong><br />';
                  } else {
                    $staff_name = '';
                  }

                  if (get_user_option('wrdsb_job_title', $user->ID) !== '' ) {
                    $staff_title = get_user_option('wrdsb_job_title', $user->ID) . "<br />";
                  } else {
                    $staff_title = '';
                  }

                  if ($wrdsb_contact_options === 'Email') {
                    $staff_contact = "<strong>Email:</strong> " . $user->user_email . "<br />";
                  } else if ($wrdsb_contact_options === 'Voicemail') {
                    $staff_contact = "<strong>Email:</strong> " . $user->user_voicemail . "<br />";
                  } else if ($wrdsb_contact_options === 'Both') {
                    $staff_contact = "<strong>Email:</strong> " . $user->user_email . "<br />";
                    //$staff_contact .= "Voicemail: " . $wrdsb_voicemail . "<br />";
                  } else {
                    $staff_contact = '';
                  }

                  $wrdsb_website_url = get_user_option('wrdsb_website_url', $user->ID);
                  if (strpos($wrdsb_website_url, 'wrdsb.ca') !== FALSE) {
                      $staff_website = '<strong>Website:</strong> <a href="' . $wrdsb_website_url . '" target="_blank" rel="noopener noferrer">' . $wrdsb_website_url . '</a>';
                    } else {
                      $staff_website = '';
                    }
                  $contact_record = $staff_name . $staff_title . $staff_contact . $staff_website;
              ?>
              <li><?php echo $contact_record; ?></li>
            <?php } } ?>
          </ul>
        </div>
      <?php
      }else {
	echo '<p>We are currently building our staff list for the new school year.</p>';
      } ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
