<?php get_header(); ?>

      <div class="container">
        <div class="row">

    <?php 
    $has_left = FALSE;
    $has_right = FALSE;
    if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;}
    if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;}
    if (is_front_page() && wrdsb_i_am_a_school()) {
      $has_left = TRUE;
      }

    # Both sidebars
    # left column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
 
      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) { ?>
        <p><a href="http://www.wrdsb.ca/beforeafter/" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'beforeafter', 'http://www.wrdsb.ca/beforeafter/',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/beforeafter_banner.jpg" alt="Before &amp; After School Program Information"/></a></p>
      <?php
      }
  
      if (is_front_page() && wrdsb_i_am_a_school()) { ?>
        <p><a href="http://myway.wrdsb.ca/" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'myway', 'http://myway.wrdsb.ca/',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
        <p><a href="/about/school-year-information" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'syi', '/about/school-year-information',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information Logo"/></a></p>
        <p><a href="https://www.canadahelps.org/dn/15506" target="_blank" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'wefi', 'https://www.canadahelps.org/dn/15506',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wefi/wp-content/uploads/sites/19/wefi_donate.jpg" alt="Donate Online! Waterloo Education Foundation Inc. (WEFI)"></a></p>
 	    <?php
      }
      
      if (is_front_page() && wrdsb_i_am_a_school_with_schoolday()) { ?>
        <p><a href="<?php echo site_url();?>/about/school-day/" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'school-day', '/about/school-day',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/school_day_button.gif" alt="school-day: pay for school activities, events and other fees"/></a></p>
      <?php 
      }
      get_sidebar('left');
      echo '</div>';
    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';
      
      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) { ?>
        <p><a href="http://www.wrdsb.ca/beforeafter/" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'beforeafter', 'http://www.wrdsb.ca/beforeafter/',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/beforeafter_banner.jpg" alt="Before &amp; After School Program Information"/></a></p>
      <?php
      }

      if (is_front_page() && wrdsb_i_am_a_school()) { ?>
        <p><a href="http://myway.wrdsb.ca/" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'myway', 'http://myway.wrdsb.ca/',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>
        <p><a href="/about/school-year-information" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'syi', '/about/school-year-information',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information Logo"/></a></p>
        <p><a href="https://www.canadahelps.org/dn/15506" target="_blank" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'wefi', 'https://www.canadahelps.org/dn/15506',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wefi/wp-content/uploads/sites/19/wefi_donate.jpg" alt="Donate Online! Waterloo Education Foundation Inc. (WEFI)"></a></p>
      <?php
      }
     
      if (is_front_page() && wrdsb_i_am_a_school_with_schoolday()) { ?>
        <p><a href="/about/school-day/" onclick="ga('send', 'event', 'school-banners', 'click-banner', 'school-day', '/about/school-day',{'nonInteraction':1});"><img src="http://www.wrdsb.ca/wp-content/uploads/school_day_button.gif" alt="school-day: pay for school activities, events and other fees"/></a></p>
      <?php 
      }

     get_sidebar('left');
      echo '</div>';
    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      # Nothing to do
    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
      # Nothing to do
    endif
    ?>

    <?php
    # Both sidebars
    # content area
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-6 col-md-8 col-lg-8">';
    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-9 col-lg-9">';
    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-9">';
    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
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
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
      
      get_sidebar('right');
      echo '</div>';
    # Just left sidebar
      # Nothing to do
    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-4">';
      get_sidebar('right');
      echo '</div>';
    # No sidebars
      # Nothing to do
    endif
    ?>
        </div>
      </div>

<?php get_footer();
