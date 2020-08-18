<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" role="complementary">
            <h1>News &amp;<br />Announcements</h1>
        </div>
    </div>
    <div class="row">

    <?php
    $has_left = FALSE;
    $has_right = FALSE;
    if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;}
    if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;}
    if (is_front_page() && (wrdsb_i_am_a_school() || wrdsb_i_am_a_school_exception())) {$has_left = TRUE;} 

    # Both sidebars
    # left column
    if (($has_left === TRUE) and ($has_right === TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';

      if (is_front_page() && wrdsb_i_am_a_school()) { // corp buttons ?>

        <p><a href="https://www.wrdsb.ca/returntoschool/" onclick="ga('send','event','schoolBanners','click_banner','returntoschool'" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Return-to-School.png" alt="Return to School" /></a></p>
        <p><a href="https://schools.wrdsb.ca/athome/" onclick="ga('send','event','schoolBanners', 'click_banner','WRDSB@Home', 'https://schools.wrdsb.ca/athome/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="http://schools.wrdsb.ca/athome/files/2020/03/Website-Button.jpg" alt="WRDSB@Home" /></a></p>
        <p><a href="https://tech.wrdsb.ca/" onclick="ga('send','event','schoolBanners', 'click_banner','Tech@Home', 'https://tech.wrdsb.ca/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Tech_at_Home_Button.jpg" alt="Tech@Home" /></a></p>
        <p><a href="https://www.wrdsb.ca/blog/tags/coronavirus/" onclick="ga('send','event','schoolBanners', 'click_banner','COVID-19', 'https://www.wrdsb.ca/blog/tags/coronavirus/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="http://schools.wrdsb.ca/wp-content/uploads/2020/03/COVID-Website-Button.jpg" alt="COVID-19 Information" /></a></p>
        <!--p><a href="https://www.wrdsb.ca/labour/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'labour', 'https://www.wrdsb.ca/labour/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Labour-Update.png" alt="Labour Updates" /></a></p-->
        <!--p><a href="https://www.wrdsb.ca/our-schools/student-transportation/severe-weather/" onclick="ga('send','event','schoolBanners', 'click_banner','severe weather', 'https://www.wrdsb.ca/our-schools/student-transportation/severe-weather/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.2.0/images/Severe+Weather+Information%40344.png" alt="Severe Weather Information" /></a></p-->


      <?php }

      if (is_front_page() && wrdsb_athome()) {}

      if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
        
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway', 'https://myway.wrdsb.ca/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
      <?php 
      }

      if (is_front_page() && wrdsb_i_am_a_school_beforeafter()) { ?>
        <p><a href="https://www.wrdsb.ca/beforeafter/register-for-programs/?utm_source=schools-button&utm_medium=referral&utm_campaign=beforeafter2020" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Before-and-After-School-Programs@1140.png" alt="Register for Before and After School Programs at the WRDSB"/></a></p>
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) { ?>
        <p><a href="https://www.wrdsb.ca/kindergarten/its-time-to-register/?utm_source=schools-button&utm_medium=referral&utm_campaign=kindergarten" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/REGISTER-ONLINE.png" alt="Register for Kindergarten at the WRDSB"/></a></p>   
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school_secondary()) { ?>
        <div class="register" style="background-color:#FFDD4F;margin-top: 15px;color: #000;-webkit-box-shadow: 5px 5px 20px -7px rgba(255, 221, 79, 1);-moz-box-shadow: 5px 5px 20px -7px rgba(255, 221, 79, 1);box_shadow: 5px 5px 20px -7px rgba(255, 221, 79, 1);">
         <a href="https://www.wrdsb.ca/about-the-wrdsb/policiesprocedures/release-of-student-information/consent-for-information-sharing-for-adult-students/" style="color: #000;" target="_blank" rel="noopener">Are you turning 18 soon?</a>
        </div>
       
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway'" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay"/></a></p>
        <p><a href="https://schools.wrdsb.ca/school-year-information/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'syi', '/about/school-year-information',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information" target="_blank" rel="noopener" /></a></p>
        <p><a href="http://www.wefihelps.org/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'http://www.wefihelps.org/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.0.0/images/wefi.png" alt="Waterloo Education Foundation Inc. (WEFI)"></a></p>
        <iframe id="school-day" src="https://www.school-day.com/pg/school/sso/index.php"></iframe>
        <p class="fineprint">Learn <a target="_blank" rel="noopener" href="https://www.wrdsb.ca/our-schools/using-school-day/#signup">how to sign up for School-Day</a>!</p>
	    <?php
      }

      get_sidebar('left');

    if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
      <p><a href="https://www.wrdsb.ca/returntoschool/" onclick="ga('send','event','schoolBanners','click_banner','returntoschool'" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Return-to-School.png" alt="Return to School" /></a></p>
      <p><a href="http://www.wefihelps.org/" target="_blank" rel="noopener" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'http://www.wefihelps.org/',{'nonInteraction':1});"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.0.0/images/wefi.png" alt="Waterloo Education Foundation Inc. (WEFI)"></a></p>
     <?php 
      }


    echo '</div>';
    
    # Just left sidebar
    elseif (($has_left === TRUE) and ($has_right === FALSE)):
      echo '<div class="col-sm-3 col-lg-3" role="complementary">';

      if (is_front_page() && wrdsb_i_am_a_school()) { // corp buttons ?>

        <p><a href="https://www.wrdsb.ca/returntoschool/" onclick="ga('send','event','schoolBanners','click_banner','returntoschool'" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Return-to-School.png" alt="Return to School" /></a></p>
        <p><a href="https://schools.wrdsb.ca/athome/" onclick="ga('send','event','schoolBanners', 'click_banner','WRDSB@Home', 'https://schools.wrdsb.ca/athome/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="http://schools.wrdsb.ca/athome/files/2020/03/Website-Button.jpg" alt="WRDSB@Home" /></a></p>
        <p><a href="https://tech.wrdsb.ca/" onclick="ga('send','event','schoolBanners', 'click_banner','Tech@Home', 'https://tech.wrdsb.ca/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Tech_at_Home_Button.jpg" alt="Tech@Home" /></a></p>
        <p><a href="https://www.wrdsb.ca/blog/tags/coronavirus/" onclick="ga('send','event','schoolBanners', 'click_banner','COVID-19', 'https://www.wrdsb.ca/blog/tags/coronavirus/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="http://schools.wrdsb.ca/wp-content/uploads/2020/03/COVID-Website-Button.jpg" alt="COVID-19 Information" /></a></p>
        <!--p><a href="https://www.wrdsb.ca/labour/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'labour', 'https://www.wrdsb.ca/labour/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Labour-Update.png" alt="Labour Updates" /></a></p-->
        <!--p><a href="https://www.wrdsb.ca/our-schools/student-transportation/severe-weather/" onclick="ga('send','event','schoolBanners', 'click_banner','severe weather', 'https://www.wrdsb.ca/our-schools/student-transportation/severe-weather/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.2.0/images/Severe+Weather+Information%40344.png" alt="Severe Weather Information" /></a></p-->


      <?php }

      if (is_front_page() && wrdsb_athome()) {}

      if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway', 'https://myway.wrdsb.ca/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
      <?php 
      }

      if (is_front_page() && wrdsb_i_am_a_school_beforeafter()) { ?>
        <p><a href="https://www.wrdsb.ca/beforeafter/register-for-programs/?utm_source=schools-button&utm_medium=referral&utm_campaign=beforeafter2020" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/Before-and-After-School-Programs@1140.png" alt="Register for Before and After School Programs at the WRDSB"/></a></p>
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) { ?>
        <p><a href="https://www.wrdsb.ca/kindergarten/its-time-to-register/?utm_source=schools-button&utm_medium=referral&utm_campaign=kindergarten" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/REGISTER-ONLINE.png" alt="Register for Kindergarten at the WRDSB"/></a></p>
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school_secondary()) { ?>
        <div class="register" style="background-color:#FFDD4F;margin-top: 15px;color: #000;-webkit-box-shadow: 5px 5px 20px -7px rgba(255, 221, 79, 1);-moz-box-shadow: 5px 5px 20px -7px rgba(255, 221, 79, 1);box_shadow: 5px 5px 20px -7px rgba(255, 221, 79, 1);">
         <a href="https://www.wrdsb.ca/about-the-wrdsb/policiesprocedures/release-of-student-information/consent-for-information-sharing-for-adult-students/" style="color: #000;" target="_blank" rel="noopener">Are you turning 18 soon?</a>
        </div>

      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway'" target="_blank" rel="noopener"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
        <p><a href="https://schools.wrdsb.ca/school-year-information/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'syi', '/about/school-year-information',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information" target="_blank" rel="noopener" /></a></p>
        <p><a href="http://www.wefihelps.org/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'http://www.wefihelps.org/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.0.0/images/wefi.png" alt="Waterloo Education Foundation Inc. (WEFI)"></a></p>
        <iframe id="school-day" src="https://www.school-day.com/pg/school/sso/index.php"></iframe>
        <p class="fineprint">Learn <a target="_blank" href="https://www.wrdsb.ca/our-schools/using-school-day/#signup">how to sign up for School-Day</a>!</p>
      <?php
      }

      get_sidebar('left');
    
      if (is_front_page() && wrdsb_athome()) {}

      if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
        <p><a href="http://www.wefihelps.org/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'http://www.wefihelps.org/',{'nonInteraction':1});" target="_blank" rel="noopener"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.0.0/images/wefi.png" alt="Waterloo Education Foundation Inc. (WEFI)"></a></p>
      <?php 
      }


      echo '</div>';
    # Just right sidebar
    elseif (($has_left === FALSE) and ($has_right === TRUE)):
      # Nothing to do
    # No sidebars
    elseif (($has_left === FALSE) and ($has_right === FALSE)):
      # Nothing to do
    endif
    ?>

    <?php
    # Both sidebars
    # content area
    if (($has_left === TRUE) and ($has_right === TRUE)):
      echo '<div class="col-sm-6 col-md-8 col-lg-8" role="main">';
    # Just left sidebar
    elseif (($has_left === TRUE) and ($has_right === FALSE)):
      echo '<div class="col-sm-9 col-lg-9" role="main">';
    # Just right sidebar
    elseif (($has_left === FALSE) and ($has_right === TRUE)):
      echo '<div class="col-sm-9" role="main">';
    # No sidebars
    elseif (($has_left === FALSE) and ($has_right === FALSE)):
      echo '<div class="col-sm-12 col-lg-12" role="main">';
    endif
    ?>
            <?php
              // Start the Loop.
              while ( have_posts() ) : the_post();
                // Include the post format-specific content template.
                get_template_part( 'content', get_post_format() );
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                  comments_template();
                }
              endwhile;
            ?>

            <?php
              // Previous/next post navigation.
              wrdsb_paging_nav();
            ?>

    </div> <!-- end content area -->

    <?php
    # Both sidebars
    # right column
    if (($has_left === TRUE) and ($has_right === TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';

      get_sidebar('right');
      echo '</div>';
    # Just left sidebar
      # Nothing to do
    # Just right sidebar
    elseif (($has_left === FALSE) and ($has_right === TRUE)):
      echo '<div class="col-sm-3" role="complementary">';
      get_sidebar('right');
      echo '</div>';
    # No sidebars
      # Nothing to do
    endif
    ?>
        </div>
      </div>

<?php 
// <a class="totop" href="#top"><div>to top</div></a>
get_footer();
