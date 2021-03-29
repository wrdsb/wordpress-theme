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

$category = get_the_category(); 

//get the first category

$name = $category[0]->cat_name;
$cat_id = get_cat_ID( $name );
$link = get_category_link( $cat_id );

// set background colours
switch ($name) {
	case "Board":
	case "News":
	case "Learning":
	case "Planning":
	case "Press Release":
	case "Well-being":
	case "Careers":
	case "A Time of Giving":
	case "WRDSB Champions":
	case "IEHR":
		$catbg = " corp-news-central";
		break;
	case "Community":
	case "Schools":
	case "Parent Resource":
	case "Inspiration":
	case "Broadcast":
	case "BHM":
	case "Spotlight":
		$catbg = " corp-news-community";
		break;
	case "Alerts":
	case "Labour":
	case "COVID-19":
		$catbg = " corp-news-urgent";
		break;
	case "Feature":
		$catbg = " corp-news-feature";
		break;
	default:
		$catbg = " corp-news-central";
		break;
}

?>

<!--
div class="news-card"
<div class="newscorp-image" role="presentation">
-->

<li>
	<figure>
		<!-- link -->
		<a href="<?php echo get_permalink($post->ID); ?>">
			<!-- img -->
			<?php //Featured Image
			if ( has_post_thumbnail()) :

				if ( is_sticky() ):
					$card_image = get_the_post_thumbnail($post,'alt');
				else:
					$card_image = get_the_post_thumbnail($post,'alt');
				endif;

			else:
				// no set image
				$card_image = '<img src="https://www.wrdsb.ca/wp-content/uploads/WRDSB_Card.png" alt=""/>';  	
			endif;

			echo $card_image;
			?>
    	</a>
    	<figcaption <?php echo 'class="'.$catbg.'"'; ?>><h2><?php echo $name; ?></h2></figcaption>

    </figure>
	<?php 

	$thetitle = $post->post_title; /* or you can use get_the_title() */
	$getlength = strlen($thetitle);
	$thelength = 25;
	$shortertitle = substr($thetitle, 0, $thelength);

	if ($getlength > $thelength) { 
		$shortened = "..."; 
	} else { 
		$shortened = '';
	}

	// the_title( '<h2 class="news"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	echo '<h2 class="news-corp"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $shortertitle . $shortened . '</a></h2>';

	// when did it get posted?
	if ('post' == get_post_type()) { ?>
	  <p class="postdate"><?php echo get_the_date(); ?></p>
	<?php }

	// display the first 20 words of the excerpt (generated or otherwise)
	$corp_news_blurb = get_the_excerpt();
	echo '<p>';
	echo $corp_news_blurb;
	echo '</p>';

	?>

</li>