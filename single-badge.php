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

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>>
        <h1><?php the_title(); ?></h1>

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
		echo '<p class="categories gray-dark small">Tags: ';
                the_tags('',' &middot; ','');
                echo '</p>';
	} elseif (isset($display_cats) && !isset($display_tags)) {
		echo '<div class="clearfix"></div>';
		echo '<p class="categories gray-dark small">Categories: ';
                the_category(' &middot; ');
                echo '</p>';
	} elseif (isset($display_cats) && isset($display_tags)) {
		echo '<div class="clearfix"></div>';
		echo '<p class="categories gray-dark small">Categories: ';
                the_category(' &middot; ');
                echo ' Tags: ';
                the_tags('',' &middot; ','');
                echo '</p>';
	}
?>
  <?php endwhile; else: ?>
  <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
<?php endif; ?>
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
