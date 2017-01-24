<?php get_header(); ?>

      <div class="container">
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
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';

      if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway', 'https://myway.wrdsb.ca/',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
      <?php 
      }

      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) { ?>
        <p><a href="https://www.wrdsb.ca/kindergarten/its-time-to-register/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'kindiereg', 'https://www.wrdsb.ca/kindergarten/its-time-to-register/',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wp-content/uploads/register_for_kindergarten_2.jpg" alt="Register for Kindergarten at the WRDSB"/></a></p>   
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway'"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
        <p><a href="<?php echo site_url();?>/about/school-year-information" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'syi', '/about/school-year-information',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information Logo"/></a></p>
        <p><a href="https://www.canadahelps.org/dn/15506" target="_blank" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'https://www.canadahelps.org/dn/15506',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wefi/wp-content/uploads/sites/19/wefi_donate.jpg" alt="Donate Online! Waterloo Education Foundation Inc. (WEFI)"></a></p>
        <iframe id="school-day" src="https://www.school-day.com/pg/school/sso/index.php"></iframe>
        <p class="fineprint">Learn <a target="_blank" href="https://www.wrdsb.ca/our-schools/using-school-day/#signup">how to sign up for School-Day</a>!</p>
	    <?php
      }

      //if (is_front_page() && wrdsb_i_am_a_school_secondary()) { }

      get_sidebar('left');


    if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
      <p><a href="https://www.canadahelps.org/dn/15506" target="_blank" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'https://www.canadahelps.org/dn/15506',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wefi/wp-content/uploads/sites/19/wefi_donate.jpg" alt="Donate Online! Waterloo Education Foundation Inc. (WEFI)"></a></p>
     <?php 
      }


    echo '</div>';
    
    # Just left sidebar
    elseif (($has_left === TRUE) and ($has_right === FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';

      if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway', 'https://myway.wrdsb.ca/',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
      <?php 
      }

      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) { ?>
        <p><a href="https://www.wrdsb.ca/kindergarten/its-time-to-register/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'kindiereg', 'https://www.wrdsb.ca/kindergarten/its-time-to-register/',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wp-content/uploads/register_for_kindergarten_2.jpg" alt="Register for Kindergarten at the WRDSB"/></a></p>   
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school()) { ?>
        <p><a href="https://myway.wrdsb.ca/" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'myway'"><img src="https://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
        <p><a href="/about/school-year-information" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'syi');"><img src="https://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information Logo"/></a></p>
        <p><a href="https://www.canadahelps.org/dn/15506" target="_blank" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'https://www.canadahelps.org/dn/15506',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wefi/wp-content/uploads/sites/19/wefi_donate.jpg" alt="Donate Online! Waterloo Education Foundation Inc. (WEFI)"></a></p>
        <iframe id="school-day" src="https://www.school-day.com/pg/school/sso/index.php"></iframe>
        <p class="fineprint">Learn <a target="_blank" href="https://www.wrdsb.ca/our-schools/using-school-day/#signup">how to sign up for School-Day</a>!</p>
      <?php
      }

      //if (is_front_page() && wrdsb_i_am_a_school_secondary()) { }

    get_sidebar('left');

    
      if (is_front_page() && wrdsb_i_am_a_school_exception()) { ?>
         <p><a href="https://www.canadahelps.org/dn/15506" target="_blank" onclick="ga('send', 'event', 'schoolBanners', 'click_banner', 'wefi', 'https://www.canadahelps.org/dn/15506',{'nonInteraction':1});"><img src="https://www.wrdsb.ca/wefi/wp-content/uploads/sites/19/wefi_donate.jpg" alt="Donate Online! Waterloo Education Foundation Inc. (WEFI)"></a></p>
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
      echo '<div class="col-sm-6 col-md-8 col-lg-8">';
    # Just left sidebar
    elseif (($has_left === TRUE) and ($has_right === FALSE)):
      echo '<div class="col-sm-9 col-lg-9">';
    # Just right sidebar
    elseif (($has_left === FALSE) and ($has_right === TRUE)):
      echo '<div class="col-sm-9">';
    # No sidebars
    elseif (($has_left === FALSE) and ($has_right === FALSE)):
      echo '<div class="col-sm-12 col-lg-12">';
    endif
    ?>

            <h1>News &amp; Announcements</h1>
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
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';

      get_sidebar('right');
      echo '</div>';
    # Just left sidebar
      # Nothing to do
    # Just right sidebar
    elseif (($has_left === FALSE) and ($has_right === TRUE)):
      echo '<div class="col-sm-3">';
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