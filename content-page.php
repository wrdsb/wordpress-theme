<?php
/**
 * The template used for displaying page content
 */
?>
<?php the_title('<h1>', '</h1>'); ?>
<?php
	if ($post->post_content == '') {
		$children = get_pages(array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'hierarchical' => 0,
		'parent' => $post->ID,
		'post_type' => 'page',
	));
		// TODO: Make this a DL
		if ($children) {
			echo '<ul>';
	    	foreach ($children as $child) {
	      		echo '<li>';
	      		echo '<strong><a href="'.get_permalink($child->ID).'">'.$child->post_title.'</a></strong>';
	      		if (get_the_excerpt($child) != '') {
		      		echo '<p>';
		        	echo get_the_excerpt($child);
	    	  		echo '</p>';
	      			echo '</li>';
	      		}
	    	}
			echo '</ul>';
		}
		the_content();
	} else {
		the_content();
	}

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
?>

<p class="editpost" role="link"><?php edit_post_link(__('Edit'));?></p>