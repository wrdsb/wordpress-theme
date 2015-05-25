<?php get_header(); ?>

      <div class="container">
        <div class="row">

    <?php $has_left = FALSE; ?>
    <?php $has_right = FALSE; ?>
    <?php if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;} ?>
    <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;} ?>

    <?php
    # Both sidebars
    # left column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) {
        echo '<p><a href="http://www.wrdsb.ca/beforeafter/"><img src="http://www.wrdsb.ca/wp-content/uploads/beforeafter_banner.jpg" alt="Before &amp; After School Program Information"/></a></p>';
      }
      if (is_front_page() && wrdsb_i_am_a_school()) {
	echo '<p><a href="http://www.wrdsb.ca/campaigns/scis-parent-survey-2015.html" target="_blank"><img src="http://www.wrdsb.ca/wp-content/uploads/SCIS_button-344x100.png" alt="Safe, Caring, Inclusive Schools Survey for Parents" /></a></p>';
        echo '<p><a href="https://secure.wrdsb.ca/subscribe/" target="_blank"><img src="http://www.wrdsb.ca/wp-content/uploads/parent_email_trillium_3.jpg" alt="Parents/Guardians: Add your email address to the contact record for your child." /></a></p>';
        echo '<p><a href="http://myway.wrdsb.ca"><img src="http://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>';
        echo '<p><a href="/about/school-year-information"><img src="http://www.wrdsb.ca/wp-content/uploads/schoolyearinformation.jpg" alt="School Year Information Logo"/></a></p>';
        echo '<p><a href="http://www.wrdsb.ca/wefi/"><img src="http://www.wrdsb.ca/wp-content/uploads/wefi_banner_344x100.gif" alt="Waterloo Education Foundation Inc. (WEFI)"/></a></p>';
      }
      
      get_sidebar('left');
      echo '</div>';
    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';
      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) {
        echo '<p><a href="http://www.wrdsb.ca/beforeafter/"><img src="http://www.wrdsb.ca/wp-content/uploads/beforeafter_banner.jpg" alt="Before &amp; After School Program Information"/></a></p>';
      }
      if (is_front_page() && wrdsb_i_am_a_school()) {
	echo '<p><a href="http://www.wrdsb.ca/campaigns/scis-parent-survey-2015.html" target="_blank"><img src="http://www.wrdsb.ca/wp-content/uploads/SCIS_button-344x100.png" alt="Safe, Caring, Inclusive Schools Survey for Parents" /></a></p>';
        echo '<p><a href="https://secure.wrdsb.ca/subscribe/" target="_blank"><img src="http://www.wrdsb.ca/wp-content/uploads/parent_email_trillium_3.jpg" alt="Parents/Guardians: Add your email address to the contact record for your child." /></a></p>';
        echo '<p><a href="http://myway.wrdsb.ca"><img src="http://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>';
        echo '<p><a href="/about/school-year-information"><img src="http://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information Logo"/></a></p>';
        echo '<p><a href="http://www.wrdsb.ca/wefi/"><img src="http://www.wrdsb.ca/wp-content/uploads/wefi_banner_344x100.gif" alt="Waterloo Education Foundation Inc. (WEFI)"/></a></p>';
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
      echo '<div class="col-sm-8">';
    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
      echo '<div class="col-sm-12 col-lg-12">';
    endif
    ?>




<?php if ( is_category() ) : ?>
<h1 id="category-name-header">Category: <?php echo $cache_categories[$cat]->cat_name ?></h1>
<?php add_filter('category_description', 'wpautop'); ?>
<?php add_filter('category_description', 'wptexturize'); ?>
<div id="category-description">
<?php echo category_description(); ?>
</div>
<?php endif; ?>

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
      if (is_front_page() && wrdsb_i_am_a_school_with_kindergarten()) {
        echo '<p><a href="/about/how-to-register-for-kindergarten/"><img src="http://www.wrdsb.ca/wp-content/uploads/register_for_kindergarten_2.jpg" alt="Kindergarten Registration button"/></a></p>';
      }
      if (is_front_page() && wrdsb_i_am_a_school()) {
	echo '<p><a href="http://www.wrdsb.ca/campaigns/scis-parent-survey-2015.html" target="_blank"><img src="http://www.wrdsb.ca/wp-content/uploads/SCIS_button-344x100.png" alt="Safe, Caring, Inclusive Schools Survey for Parents" /></a></p>';
        echo '<p><a href="http://myway.wrdsb.ca"><img src="http://www.wrdsb.ca/wp-content/uploads/myway_banner_344x100.jpg" alt="MyWay Logo"/></a></p>';
        echo '<p><a href="/about/school-year-information"><img src="http://www.wrdsb.ca/wp-content/uploads/schoolyearinformation_344x100.jpg" alt="School Year Information Logo"/></a></p>';
        echo '<p><a href="http://www.wrdsb.ca/wefi/"><img src="http://www.wrdsb.ca/wp-content/uploads/wefi_banner_344x100.gif" alt="Waterloo Education Foundation Inc. (WEFI)"/></a></p>';
     }
      
      get_sidebar('right');
      echo '</div>';
    # No sidebars
      # Nothing to do
    endif
    ?>
        </div>
      </div>

<?php get_footer(); ?>