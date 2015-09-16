<?php
/*
Template Name: Staff List
*/
?>
<?php $user_query = new WP_User_Query(array('meta_key' => 'wrdsb_display_in_staff_list', 'meta_value' => 1)); ?>
<?php get_header(); ?>

<div class="container">
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
                <th class="text-left" data-field="voicemail" data-sortable="true">Voicemail</th>
                <th class="text-left" data-field="website" data-sortable="true">Website</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($user_query->results as $user) { ?>
                <tr>
                  <td><?php echo $user->last_name; ?>, <?php echo $user->first_name; ?></td>
                  <td>
                    <span class="hidden">
                    <?php switch($user->wrdsb_job_title) {
                      case 'Principal':
                        echo '1';
                        break;
                      case 'Vice-Principal':
                        echo '2';
                        break;
                      case 'Office Manager':
                        echo '10';
                        break;
                      case 'Head Secretary':
                        echo '11';
                        break;
                      case 'Secretary':
                        echo '12';
                        break;
                      case 'Department Head':
                        echo '50';
                        break;
                      case 'Teacher':
                        echo '51';
                        break;
                      case 'DECE':
                        echo '70';
                        break;
                      case 'CYW':
                        echo '71';
                        break;
                      case 'Educational Assistant':
                        echo '72';
                        break;
                      case 'Library Clerk':
                        echo '75';
                        break;
                      case 'Custodian':
                        echo '80';
                        break;
                      default:
                        echo '99';
                    } ?>
                    </span>
                    <?php echo $user->wrdsb_job_title; ?>
                  </td>
                  <?php if ($user->wrdsb_contact_options == 'Email') { ?>
                    <td><?php echo $user->user_email; ?></td>
                    <td>&nbsp;</td>
                  <?php } elseif ($user->wrdsb_contact_options == 'Voicemail') { ?>
                    <td>&nbsp;</td>
                    <td><?php echo $user->wrdsb_voicemail; ?></td>
                  <?php } else { ?>
                    <td><?php echo $user->user_email; ?></td>
                    <td><?php echo $user->wrdsb_voicemail; ?></td>
                  <?php } ?>
                  <?php if (strpos($user->wrdsb_website_url, 'wrdsb.ca') !== FALSE) { ?>
                    <td><a href="<?php echo $user->wrdsb_website_url; ?>"><?php echo $user->wrdsb_website_url; ?></a></td>
                  <?php } else { ?>
                    <td>&nbsp;</td>
                  <?php } ?>
                </tr>
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
                  <br />Ext: <?php echo $user->wrdsb_voicemail; ?>
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
