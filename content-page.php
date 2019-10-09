<?php
/**
 * The template used for displaying page content
 */
?>
<?php
	if ($post->post_content == '') {
		$children = get_pages(array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'hierarchical' => 0,
		'parent' => $post->ID,
		'post_type' => 'page',
	));
    if ($children) {
        foreach ($children as $child) {
            echo '<h2>'.$child->post_title.'</h2>';
            echo '<p>';
            $our_excerpt = get_our_excerpt($child->ID, $post->ID);
            if (strlen($our_excerpt) < 5) {
                echo '[...]<p class="readmore" role="complementary"><a href="' . get_permalink($child->ID) . '"><strong>Read more about</strong> <cite>' . get_the_title($child->ID) . '</cite> &#187;</a></p>';
            } else {
                echo $our_excerpt;
            }
            echo '</p>';
        }
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