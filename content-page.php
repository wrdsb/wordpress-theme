<?php
/**
 * The template used for displaying page content
 */
?>
<?php the_title('<h1>', '</h1>'); ?>
<?php
  the_content();
  edit_post_link('Edit');
?>
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
