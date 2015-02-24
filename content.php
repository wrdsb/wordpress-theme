<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
 */
?>

<?php //Featured Image
// check if the full news item
if (is_single()) :
	// check if the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail() ) :
 		the_post_thumbnail('wrdsb-full-width');
        endif;
// else if part of news stream
else :
	// check if the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail()) :
		// link Post Thumbnail to Post
		// $post is from functions.php ?>
		<a href="<?php echo get_permalink($post->ID) ?>"><?php echo the_post_thumbnail('wrdsb-full-width') ?></a>
<?php
        endif;
endif;
?>

<?php if (is_single()) :
  the_title( '<h3>', '</h3>' );
else :
  the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
endif; ?>

<?php if ('post' == get_post_type()) { ?>
  <p class="postdate gray-dark small">Posted <?php echo get_the_date(); ?></p>
<?php } ?>

<?php 
if ( has_excerpt ()) {
	echo "what goes here?";
} else {
	the_excerpt();
}
 ?>

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
		echo '<p class="categories gray-dark small">Tags: ';
                the_tags('',' &bull; ','');
                echo '</p>';
	} elseif (isset($display_cats) && !isset($display_tags)) {
		echo '<p class="categories gray-dark small">Categories: ';
                the_category(' &bull; ');
                echo '</p>';
	} elseif (isset($display_cats) && isset($display_tags)) {
		echo '<p class="categories gray-dark small">Categories: ';
                the_category(' &bull; ');
                echo ' Tags: ';
                the_tags('',' &bull; ','');
                echo '</p>';
	}
?>
