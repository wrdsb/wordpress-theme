<?php
/**
 * The template for displaying the footer
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage WRDSB
 */
?>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <!-- automate address -->

              <?php 
                if (function_exists('wrdsb_school_info_display_new')) {
                  wrdsb_school_info_display_new();
                }
                else {
                  ?>
                  <h4>Waterloo Region District School Board</h4>
              <address>51 Ardelt Avenue<br />
                Kitchener, ON N2C 2R5<br />
              </address>
              <address>
                Switchboard: 519-570-0003<br />
                <a href="http://www.wrdsb.ca/about-the-wrdsb/contact/">Contact Information</a>
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
              <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
                <?php dynamic_sidebar( 'footer-left' ); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'footer-centre' ) ) : ?>
                <?php dynamic_sidebar( 'footer-centre' ); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-3">
              <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
                <?php dynamic_sidebar( 'footer-right' ); ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <p class="copyright">A WRDSB-ITS Solution</p>
            </div>
            <div class="col-sm-4">
              <p class="copyright">
                  <?php 
                  $parsed_url = parse_url(network_site_url());
                  $host = explode('.', $parsed_url['host']);
                  if ($host[0] == 'schools') { ?>
                        <a target="_blank" href="http://schools.wrdsb.ca/<?php $fulldomain = explode('.',$_SERVER['HTTP_HOST']); echo $fulldomain[0]; ?>/wp-login.php">Log in</a>
                  <?php } else {
                  wp_loginout(); 
                  }?>
                
                &nbsp;&nbsp; | &nbsp;&nbsp;
                <a href="http://staff.wrdsb.ca">Log in to Staff Website</a>
                <?php 
                  $parsed_url = parse_url(network_site_url());
                  $host = explode('.', $parsed_url['host']);
                  if ($host[0] == 'schools') { ?>
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <a target="_blank" href="http://staff.wrdsb.ca/<?php $fulldomain = explode('.',$_SERVER['HTTP_HOST']); echo $fulldomain[0]; ?>">Log in to School Handbook</a>
                  <?php } ?>
              </p>
            </div>
            <div class="col-sm-4">
              <p class="copyright text-right">&copy; WRDSB 2015</p>
            </div>
          </div>
        </div>
      </div>

    <?php wp_footer(); ?>
    </body>
    </html>
