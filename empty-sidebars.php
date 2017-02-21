<?php
/*
Template Name: Empty Sidebars
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php $has_left = FALSE; ?>
    <?php $has_right = FALSE; ?>
    <?php if (is_active_sidebar('sidebar-left')) {$has_left = TRUE;} ?>
    <?php if (is_active_sidebar('sidebar-right')) {$has_right = TRUE;} ?>

    <?php
    # Both sidebars
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';
      get_sidebar('left');
      echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3" role="complementary">';
      get_sidebar('left');
      echo '</div>';

    # Just right sidebar
      # Nothing to do

    # No sidebars
      # Nothing to do
    endif;
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

    endif;
    ?>

    <?php // check if the post has a Post Thumbnail assigned to it.
      if ( has_post_thumbnail() ) {
        echo '<div class="featuredimage" role="presentation">';
        if (($has_left == TRUE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-two-sidebars','alt');
        elseif (($has_left == TRUE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-one-sidebar','alt');
        elseif (($has_left == FALSE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-one-sidebar','alt');
        elseif (($has_left == FALSE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-full-width','alt');
        endif;
        echo '</div>';
      }
    ?>
    
    <?php
      // Start the Loop.
      while ( have_posts() ) : the_post();
      
        // Include the page content template.
        get_template_part( 'content', 'page' );

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
      get_sidebar('right');
      echo '</div>';

    # Just left sidebar
      # Nothing to do

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3" role="complementary">';
      get_sidebar('right');
      echo '</div>';

    # No sidebars
      # Nothing to do

    endif;
    ?>

  </div>
</div>

<?php get_footer();
