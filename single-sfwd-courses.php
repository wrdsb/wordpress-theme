<?php get_header(); ?>
<?php
  $has_left = FALSE;
  $has_right = FALSE;
  if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;}
  if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;}
?>
<div class="container">
  <div class="row">
    <?php
    # Both sidebars
   # left column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
      get_sidebar('left');
      echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';
      get_sidebar('left');
      echo '</div>';

    # Just right sidebar
      # Nothing to do

    # No sidebars
      # Nothing to do
    endif;

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

    endif;
    ?>

    <?php // check if the post has a Post Thumbnail assigned to it.
      if ( has_post_thumbnail() ) {
        echo '<div class="featuredimage">';
        if (($has_left == TRUE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-two-sidebars');
        elseif (($has_left == TRUE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-one-sidebar');
        elseif (($has_left == FALSE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-one-sidebar');
        elseif (($has_left == FALSE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-full-width');
        endif;
        echo '</div>';
      }
    ?>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>>
        <h1><?php the_title(); ?></h1>

        <p><?php the_content(__('Read more'));?></p>
  <?php endwhile; else: ?>
  <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
<?php endif; ?>

	<div class="prevnext-container">
	<?php previous_post_link('<p class="prevpost">&laquo; Older: %link</p>'); ?> <?php if(!get_adjacent_post(false, '', true)) { echo ''; } // if there are no older articles ?>
	<?php next_post_link('<p class="nextpost">Newer: %link &raquo;</p>'); ?> <?php if(!get_adjacent_post(false, '', false)) { echo ''; } // if there are no newer articles ?>
	</div>
      </div>

      <?php trackback_rdf(); ?>
    </div>

    <?php
    # Both sidebars
    # right column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      get_sidebar('right');
      echo '</div>';
    # Just left sidebar
      # Nothing to do
    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      get_sidebar('right');
      echo '</div>';
    # No sidebars
      # Nothing to do
    endif
    ?>
</div> <!-- end content area -->


</div>
</div>

<?php get_footer();
