<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php $has_left = FALSE; ?>
    <?php $has_right = FALSE; ?>
    <?php if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;} ?>
    <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;} ?>
    <?php if (!is_front_page()) {$has_left = TRUE;} ?>

    <?php
    # Both sidebars
    # left column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';
      if (!is_front_page()) {
        get_sidebar('lmenu');
      }
      get_sidebar('left');
      echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';
      if (!is_front_page()) {
        get_sidebar('lmenu');
      }
      get_sidebar('left');
      echo '</div>';

    # Just right sidebar
      # Nothing to do

    # No sidebars
      # Nothing to do
    endif
    ?>

    <?php
    # Both sidebars
    # content area
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-6 col-md-8 col-lg-8" role="main">';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-9 col-lg-9" role="main">';

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-9" role="main">';

    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
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
    </div> <!-- end content area -->

    <?php
    # Both sidebars
    # right column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      get_sidebar('right');
      echo '</div>';

    # Just left sidebar
      # Nothing to do

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3" role="complementary">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
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