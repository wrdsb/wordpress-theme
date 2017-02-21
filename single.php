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

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>>
        <h1><?php the_title(); ?></h1>
        <p class="postdate"> <?php the_time('F jS') ?>, <?php the_time('Y') ?></p>

        <p><?php the_content(__('Read more'));?></p>

<?php
	$igc=0;
	foreach((get_the_category()) as $category) {
	    if (strtolower($category->cat_name) != 'uncategorized') {
			$igc = 1;
		}
	}
	if ($igc == 1) {
		$display_cats = 1;
	}
	$number_of_tags = count(get_the_tags());
	//if ($number_of_tags > 0) {
	if (get_the_tags()) {
		$display_tags = 1;
	}
	if (!isset($display_cats) && isset($display_tags)) {
		echo '<div class="clearfix"></div>';
		echo '<p class="categories">Tags: ';
                the_tags('',' &middot; ','');
                echo '</p>';
	} elseif (isset($display_cats) && !isset($display_tags)) {
		echo '<div class="clearfix"></div>';
		echo '<p class="categories">Categories: ';
                the_category(' &middot; ');
                echo '</p>';
	} elseif (isset($display_cats) && isset($display_tags)) {
		echo '<div class="clearfix"></div>';
		echo '<p class="categories" role="menubar">Categories: ';
                the_category(' &middot; ');
                echo ' Tags: ';
                the_tags('',' &middot; ','');
                echo '</p>';
	}
?>
        <?php comments_template(); // Get comments.php template ?>
  <?php endwhile; else: ?>
  <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
<?php endif; ?>

	<div class="prevnext-container" role="navigation">
	<?php previous_post_link('<p class="prevpost">&laquo; Older: %link</p>'); ?> <?php if(!get_adjacent_post(false, '', true)) { echo ''; } // if there are no older articles ?>
	<?php next_post_link('<p class="nextpost">Newer: %link &raquo;</p>'); ?> <?php if(!get_adjacent_post(false, '', false)) { echo ''; } // if there are no newer articles ?>
	<p class="editpost"><?php edit_post_link(__('Edit'));?></p>
	</div>
      </div>
      <?php trackback_rdf(); ?> 
    </div>
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
</div> <!-- end content area -->


</div>
</div>

<?php 
// <a class="totop" href="#top"><div>to top</div></a>
get_footer();