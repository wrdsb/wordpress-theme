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
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
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
    endif;
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
    endif;
    ?>

    <?php // check if the post has a Post Thumbnail assigned to it.
    if (has_post_thumbnail()):
      if (($has_left == TRUE) and ($has_right == TRUE)):
        the_post_thumbnail('wrdsb-two-sidebars');
      elseif (($has_left == TRUE) and ($has_right == FALSE)):
        the_post_thumbnail('wrdsb-one-sidebar');
      elseif (($has_left == FALSE) and ($has_right == TRUE)):
        the_post_thumbnail('wrdsb-one-sidebar');
      elseif (($has_left == FALSE) and ($has_right == FALSE)):
        the_post_thumbnail('wrdsb-full-width');
      endif;
      endif;
      ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
        <h3 id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
        <small class="gray-dark"> <?php the_time('F jS') ?>, <?php the_time('Y') ?></small>

        <p><?php the_content(__('Read more'));?></p>

        <?php
          $igc=0;
          foreach((get_the_category()) as $category) {
              if (strtolower($category->cat_name) != 'uncategorized') {
              $igc = 1;
            }
          }

          if ($igc == 1) {
            echo '<p>Categories: ';
            the_category(',');
            echo '</p>';
          }
        ?>

        <?php 
          $number_of_tags = count(get_terms('post_tags'));

          if ($number_of_tags > 0) {
            echo '<p>';
            the_tags();
            echo '</p>';
          }
        ?>

        <?php comments_template(); // Get comments.php template ?>
  <?php endwhile; else: ?>
  <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
<?php endif; ?>
<p><?php previous_post_link('&laquo; Previous Post: %link'); ?> <?php if(!get_adjacent_post(false, '', true)) { echo ''; } // if there are no older articles ?>
  <span style="margin:0 10px;"></span>
<?php next_post_link('Next Post: %link &raquo;'); ?> <?php if(!get_adjacent_post(false, '', false)) { echo ''; } // if there are no newer articles ?> </p>

        <?php edit_post_link(__('<strong>Edit</strong>'));?>
      </div>

      <?php trackback_rdf(); ?> 
    </div>

    
</div> <!-- end content area -->

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
  echo '<div class="col-sm-4">';
if (!is_front_page()) {
  get_sidebar('rmenu');
}
get_sidebar('right');
echo '</div>';

    # No sidebars
      # Nothing to do

endif;
?>
</div>
</div>

<?php get_footer(); ?>
