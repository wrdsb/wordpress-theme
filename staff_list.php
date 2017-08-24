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
        <div class="table-responsive hidden-sm" >
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
                if ((get_user_option('wrdsb_display_in_staff_list', $user->ID) == 1) && ($user->ID != 1)) { 
                  $wrdsb_contact_options = get_user_option('wrdsb_contact_options', $user->ID);
                  $wrdsb_voicemail = get_user_option('wrdsb_voicemail', $user->ID);
                  if ($wrdsb_voicemail[0] === 'V') {
                    $wrdsb_voicemail = ltrim($wrdsb_voicemail, 'V');
                  }
                  $wrdsb_website_url = get_user_option('wrdsb_website_url', $user->ID); 
                ?>
                  <tr>
                    <td><?php echo $user->last_name; ?>, <?php echo $user->first_name; ?></td>
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
                <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="visible-sm">
          <ul class="table-list">
            <?php foreach($user_query->results as $user) { ?>
              <li>
                <p>
                  <?php echo $user->last_name; ?>, <?php echo $user->first_name; ?>
                  <br /><em><?php echo $user->wrdsb_job_title; ?></em>
                  <br />Email: <?php echo $user->user_email; ?>
                  <?php /* <br />Ext: echo $user->wrdsb_voicemail; */ ?>
                  <br />Website: <a href="<?php echo $user->user_url; ?>"><?php echo $user->user_url; ?></a>
                </p>
              </li>
            <?php } ?>
          </ul>
        </div>
      <?php
      } else {
	echo '<p>We are currently building our staff list for the new school year.</p>';
      } ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
