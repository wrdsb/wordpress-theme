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
		echo '<div class="featuredimage" role="presentation">';
 		the_post_thumbnail('wrdsb-full-width','alt');
 		echo '</div>';
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
  the_title( '<h1>', '</h1>' );
else :
  the_title( '<h2 class="news"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif; ?>

<?php if ('post' == get_post_type()) { ?>
  <p class="postdate">Posted <?php echo get_the_date(); ?></p>
<?php } ?>

<?php 
if ( has_excerpt ()) {
	the_excerpt();
	echo '<p class="readmore"><a href="'. get_permalink($post->ID) . '"><strong>Read more about</strong> <cite>'. get_the_title($post->ID) .'</cite> &#187;</a></p>';
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
		echo '<div class="clearfix"></div>';
		echo '<p class="categories" role="menubar">Tags: ';
                the_tags('',' &middot; ','');
                echo '</p>';
	} elseif (isset($display_cats) && !isset($display_tags)) {
		echo '<div class="clearfix"></div>';
		echo '<p class="categories" role="menubar">Categories: ';
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