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
<?php if (is_single()) :
  the_title( '<h3>', '</h3>' );
else :
  the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
endif; ?>

<?php if ('post' == get_post_type()) { ?>
  <small class="gray-dark">Posted <?php echo get_the_date(); ?></small>
<?php } ?>

<?php the_excerpt(); ?>

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
		the_tags();
	}
?>
