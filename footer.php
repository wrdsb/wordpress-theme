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
    <div id="footer" class="footer" role="contentinfo">
      <div class="container">
        <div class="row">
          <div id="address" class="col-sm-6 col-md-3" aria-labelledby="address">
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
                <p><a href="https://www.wrdsb.ca/about-the-wrdsb/contact/website-feedback/" target="_blank">Website Feedback Form</a></p>
              </address>
              <div class="social-icons">
                <!-- Facebook -->
                <div class="fb-follow" data-href="https://www.facebook.com/wrdsb/" data-layout="button" data-show-faces="false" data-colorscheme="light" data-kid-directed-site="false" style="vertical-align:top;zoom:1;"></div>
                <!-- Twitter -->
                <a href="https://twitter.com/wrdsb" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @wrdsb</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <!-- Instagram -->
                <style>
                .ig-b- { display: inline-block; }
                .ig-b- img { visibility: hidden; }
                .ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
                .ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
                @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                .ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }
                </style>
                <a href="https://www.instagram.com/wr_dsb/?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
              </div>
            <?php } ?>
          </div>
          <div class="col-sm-6 col-md-3" aria-labelledby="connect-wrdsb">
            <?php if (wrdsb_i_am_a_staff_site()) { ?>
              <?php if (wrdsb_get_school_code()) { ?>
                <h1>Trillium Data</h1>
                <ul>
                  <li><a href="<?php echo get_site_url(); ?>/trillium/classes">Class lists</a></li>
                </ul>
              <?php } ?>
            <?php } else { ?>
              <h1 role="form" id="connect-wrdsb">Stay connected</h1>
              <?php if ( is_plugin_active( 'wordpress-plugin-mailgun-subscriptions/mailgun-subscriptions.php' ) ) {
                the_widget( 'Mailgun_Subscriptions\Widget' );
              } else {
                the_widget( 'WRDSB_Subscribe_By_Email_Widget' );
              } ?>
              <p>Each WRDSB website requires a separate subscription.</p>
              <h2>Other ways to get news</h2>
              <p><a href="https://www.wrdsb.ca/our-schools/communicating-with-your-school/subscribing/" target="_blank">See all subscription options</a>.</p>
            <?php } ?>
          </div>
          <div class="col-sm-6 col-md-3" role="region">
          </div>
          <div class="col-sm-6 col-md-3" role="region">
            <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
              <?php dynamic_sidebar( 'footer-right' ); ?>
            <?php endif; ?>
          </div>
          </div>
        </div>
      </div>
    <div class="container" id="loginbar" role="navigation" aria_labelledby="adminbar">
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
