<?php
/**
 * The template for displaying the footer
 *
 * Displays from <div class="footer"> to </html>
 *
 * @package WordPress
 * @subpackage WRDSB
 */

/**
 * Allow us to detect activated plugins
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>
    <div id="footer" class="footer" id="contact" role="footer" aria-labelledby="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <section role="contact_wrdsb" aria_label="Contact the WRDSB">
              <!-- automate address -->
              <?php
              // from plugin wrdsb_schools_contact.php
              if (function_exists('wrdsb_school_info_display')) {
                wrdsb_school_info_display();
              }
              else { ?>
              <address>
                <h1>Waterloo Region District School Board</h1>
              	<p>51 Ardelt Avenue<br />
                Kitchener, ON N2C 2R5</p>
                <p>Switchboard: 519-570-0003<br />
                <a href="https://www.wrdsb.ca/about-the-wrdsb/contact/">Contact the WRDSB</a></p>
                <p><a href="https://www.wrdsb.ca/about-the-wrdsb/contact/website-feedback/">Website Feedback Form</a></p>
              </address>
              <div class="social-icons">
                <!-- Facebook -->
                <div class="fb-follow" data-href="https://www.facebook.com/wrdsb/" data-layout="button" data-show-faces="false" data-colorscheme="light" data-kid-directed-site="false" style="vertical-align:top;zoom:1;"></div>
                <!-- Twitter -->
                <a href="https://twitter.com/wrdsb" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @wrdsb</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </div>
            <?php } ?>
            </section>
          </div>
          <div class="col-sm-6 col-md-3">
            <section role="wrdsb_contact_you" aria_label="Let the WRDSB Contact You">
              <h1>Let Us Email You!</h1>
              <p>Families and students, with <a href="https://www.wrdsb.ca/about-the-wrdsb/communications-engagement-department/casl/" target="_blank">CASL</a> we need to get your permission to email you about your child. Here is how!</p>
              <h2>Parents/Guardians</h2>
              <p><a href="https://secure.wrdsb.ca/subscribe/">Add your email address</a> to your contact record in our student information system!</p>
              <h2>Students 18+</h2>
              <p><a href="https://secure.wrdsb.ca/subscribe/over_eighteen.aspx">Add your email address</a> to your contact record in our student information system!</p>
            </section>
          </div>
          <div class="col-sm-6 col-md-3">
            <section role="subscription" aria_label="Subscription Options">
              <h1>Stay Connected</h1>
              <?php if ( is_plugin_active( 'wordpress-plugin-mailgun-subscriptions/mailgun-subscriptions.php' ) ) {
                if ( is_active_sidebar( 'footer-centre' ) ) :
                  dynamic_sidebar( 'footer-centre' );
                endif;
              } else {
                the_widget( 'WRDSB_Subscribe_By_Email_Widget' );
              } ?>
              <p>You will need to subscribe to get the news feeds from each website separately.</p>
              <h2>Other Ways to Get News</h2>
              <p><a href="https://www.wrdsb.ca/our-schools/communicating-with-your-school/subscribing/" target="_blank">See all subscription options</a>.</p>
            </section>
          </div>
          <div class="col-sm-6 col-md-3">
            <section role="custom_footer" aria_label="Site Specific Footer Content">
            <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
              <?php dynamic_sidebar( 'footer-right' ); ?>
            <?php endif; ?>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="loginbar" role="administrative_login" aria_labelledby="adminbar">
      <p id="adminbar" class="copyright" style="text-align: center;">
      <?php
      // Get all the information about the site
      $sitename = get_bloginfo('name');
      $siteurl = site_url();
      $parsed_url = parse_url(network_site_url());
      $host = explode('.', $parsed_url['host']);

      // create link text
      $admin_link  = '<a href="'.$siteurl.'/wp-login.php">Log into '.$sitename.'</a>';
      $staff_admin_link = ' &middot; Go to <a href="https://staff.wrdsb.ca/" target="_blank" javascript="ga(' . "'send', 'event', 'Page', 'click_banner', 'staff intranet', event.target.href,{'nonInteraction':1});" . '">Staff Intranet</a>';
      $school_handbook_link = '';

      // customize links for school network
      //if (($host[0] === 'schools' && wrdsb_i_am_a_school) || $host[0] === 'wplabs') { // for testing school pages
      if ($host[0] === 'schools' && wrdsb_i_am_a_school) {
        $fulldomain = explode('.',$_SERVER['HTTP_HOST']);
      	$admin_link  = '<a href="https://schools.wrdsb.ca/'.$fulldomain[0].'/wp-login.php">Log into '.$sitename.'</a>';
      	$school_handbook_link = ' &middot; Go to <a target="_blank" href="https://staff.wrdsb.ca/' .$fulldomain[0].'">'.strtoupper($fulldomain[0]).' School Handbook</a>';
      }

      // customize links for staff network
      if ($host[0] === 'staff') {
        $staff_admin_link = '';
      }

      // display the login/logout link
      if ( is_user_logged_in() ) {
        wp_loginout();
      }
      else {
        echo $admin_link;
      }

      // display the auxilliary links
      echo $staff_admin_link . $school_handbook_link; 
      ?>
      </p>
    </div>
  <?php wp_footer(); ?>
</body>
</html>