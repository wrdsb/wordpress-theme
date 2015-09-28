<?php
/**
 * The template for displaying the footer
 *
 * Displays from <div class="footer"> to </html>
 *
 * @package WordPress
 * @subpackage WRDSB
 */
?>
      <div class="footer" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <!-- automate address -->

              <?php 
                // from plugin wrdsb_schools_contact.php
                if (function_exists('wrdsb_school_info_display')) {
                  wrdsb_school_info_display();
                }
                else {
                  ?>
                  <h1>Waterloo Region District School Board</h1>
              <address>51 Ardelt Avenue<br />
                Kitchener, ON N2C 2R5<br />
              </address>
              <address>
                Switchboard: 519-570-0003<br />
                <a href="http://www.wrdsb.ca/about-the-wrdsb/contact/">Contact Information</a><br />
                <a href="http://www.wrdsb.ca/about-the-wrdsb/contact/website-feedback/">Website Feedback Form</a>
              </address>
              <?php  
                }
              ?>
              
              <div class="social-icons">
                <!--<a href="#"><span class="icon-facebook" title="Facebook"></span></a>-->
                <!--<a href="#"><span class="icon-twitter" title="Twitter"></span></a>-->
                <!--<a href="#"><span class="icon-youtube" title="YouTube"></span></a>-->
              </div>
             
            </div>
            <div class="col-sm-6 col-md-3">
            <h1>Let Us Email You!</h1>
            <p>Families and students, with <a href="http://www.wrdsb.ca/about-the-wrdsb/communications-engagement-department/casl/" target="_blank">CASL</a> we need to get your permission to email you about your child. Here is how!</p>
            <h2>Parents/Guardians</h2>
            <p><a href="https://secure.wrdsb.ca/subscribe/">Add your email address</a> to your contact record in our student information system!</p>
            <h2>Students 18+</h2>
            <p><a href="https://secure.wrdsb.ca/subscribe/over_eighteen.aspx">Add your email address</a> to your contact record in our student information system!</p>
            </div>
            <div class="col-sm-6 col-md-3">
            <h1>Stay Connected</h1>
            <?php the_widget( 'WRDSB_Subscribe_By_Email_Widget' ); ?>
            <p>You will need to subscribe to get the news feeds from each website separately.</p>
            <h2>Get News from the WRDSB</h2>
            <p>Would you like periodic, general news from the WRDSB? <a href="https://secure.wrdsb.ca/subscribe/publicform.aspx">Add your email address</a> to our public database!</p>
            <h2>Other Ways to Get News</h2>
            <p><a href="http://www.wrdsb.ca/our-schools/communicating-with-your-school/subscribing/" target="_blank">See all subscription options</a>.</p>
            </div>
            <div class="col-sm-12 col-md-3">
              <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
                <?php dynamic_sidebar( 'footer-right' ); ?>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
          <div class="container" id="loginbar">
              <p class="copyright" style="text-align: center;">
            	<?php if ( is_user_logged_in() ) 
            	{
            		wp_loginout();
            	} 
            	else 
            	{ ?>
            		<a href="<?php echo site_url(); echo '/wp-login.php';?>">Log into <?php echo get_bloginfo('name'); ?></a>
            	<?php }?> 
                &nbsp;&nbsp; | &nbsp;&nbsp; 
                Go to <a href="http://staff.wrdsb.ca">Staff Website</a>
                <?php 
                $parsed_url = parse_url(network_site_url());
                $host = explode('.', $parsed_url['host']);
                	if ($host[0] == 'schools') { 
                		$fulldomain = explode('.',$_SERVER['HTTP_HOST']);
                  	?>
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    Go to <a target="_blank" href="http://staff.wrdsb.ca/<?php echo $fulldomain[0]; ?>/"><?php echo strtoupper($fulldomain[0]); ?> School Handbook</a>
            		<?php } ?>
              </p>
          </div>
    <?php wp_footer(); ?>
    </body>
    </html>
