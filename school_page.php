<?php
/*
Template Name: School List
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php $meta = get_post_custom($page_id); ?>
              <?php 
		$page_class = "front-page";
		if (!is_front_page())
			{
			$page_class = "the-post";
			}
		?>

		<div class="post regpost post-<?php echo $post->ID; ?> <?php echo $page_class; ?>">
<h2><?php bloginfo('name'); ?></h2>
<?php edit_post_link('Edit'); ?>
<div class="breadcrumbs">
<?php
if(function_exists('bcn_display') AND !is_front_page())
	{
	bcn_display();
	}
?>
<?php
if(function_exists('wrdsb_global_news') and is_front_page())
	{
	wrdsb_global_news();
	}
?>
</div>

 
<?php
//create table if there are not tags of cats specified
if ($_GET['cat'] == '' AND $_GET['tag'] == '' AND $_GET['id'] == '' AND $_GET['contact'] == '')
	{
	$liveposts = @$wpdb->get_results( $wpdb->prepare("SELECT * FROM depts_info WHERE type_code LIKE 'School' AND panel != 'Other' ORDER BY full_name ASC") );
	echo '<h3><a href="'.get_permalink($post->ID).'" rel="bookmark">'.get_the_title().'</a></h3>';
			if (have_posts()) : while (have_posts()) : the_post();
		the_content();
		endwhile; endif;
	echo '<table id="staff_list" class="schools_list">';
	echo '<thead><tr class="tableheading"><th width="40%">Name</th><th>Website</th><th>Type</th><th>Features</th></tr></thead>';
	foreach ($liveposts as $l)
		{
		echo '<tr class=""><td class="school_name"><strong><a href="?id='.strtolower($l->alpha_code).'">'.str_replace('Public School','P.S.',$l->full_name).'</a></strong> (<a target="_blank" href="http://maps.google.com/maps?f=q&hl=en&q='
          	.$l->address.'+'.$l->city.'+Ontario">Map</a>)</td><td><a href="http://'.strtolower($l->alpha_code).'.wrdsb.on.ca" target="_blank">'.strtolower($l->alpha_code).'.wrdsb.on.ca</a></td><td><a href="?cat='.$l->panel.'">'.$l->panel.'</a></td><td><a href="?tag='.$l->city.'">'.$l->city.'</a><br /><a href="?tag='.$l->grades.'">'.str_replace('Gr', 'Grades',$l->grades).'</a>';
		if($l->french != "") echo '<br /><a href="?tag=french">Partial French Immersion</a></td></tr>';
		}
	
	echo "</table>";
	}
	
// School

elseif (isset($_GET['id']))
	{
	$liveposts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM depts_info WHERE alpha_code LIKE '".strtoupper($_GET['id'])."'"));
	$granular_title = $_GET['id'];
	echo '<h3><a href="'.get_permalink($post->ID).'" rel="bookmark">'.$liveposts['0']->full_name.'</a></h3>';
	echo '<pre>';
	echo '<strong>School Type: </strong>'.str_replace('Gr','',$liveposts['0']->panel).'<br />';
	echo '<strong>Grades: </strong>'.str_replace('Gr','',$liveposts['0']->grades).'<br />';
	if ($liveposts['0']->french != '') echo '<strong>Partial French Immersion: </strong>'.str_replace('Immersion','',str_replace('Gr','',$liveposts['0']->french)).'<br />';
	echo '</pre>';
	echo '<strong>'.$liveposts['0']->full_name.'</strong><br />';
	echo $liveposts['0']->address.'<br />';
	echo $liveposts['0']->city.', '.$liveposts['0']->province.'<br />';
	echo $liveposts['0']->postal_code.'<br />';
	echo '(<a target="_blank" href="http://maps.google.com/maps?f=q&hl=en&q='
          	.$liveposts['0']->address.'+'.$liveposts['0']->city.'+Ontario">Map</a>)<br /><br />';
	echo '<strong>(T): </strong>'.$liveposts['0']->phone_no.'<br />';
	echo '<strong>(F): </strong>519 '.$liveposts['0']->fax_no.'<br />';
	echo '<strong>(W): </strong><a href="http://'.strtolower($liveposts['0']->alpha_code).'.wrdsb.on.ca">http://'.strtolower($liveposts['0']->alpha_code).'.wrdsb.on.ca</a><br /><br />';
	echo '<strong>Superintendent: </strong>'.substr($liveposts['0']->super,0,strpos($liveposts['0']->super,'[')).'<br />';
	echo '<strong>Principal: </strong>'.$liveposts['0']->principal.'<br />';
	if ($liveposts['0']->vp != '' ) echo '<strong>Vice Principal(s): </strong>'.$liveposts['0']->vp.'<br />';
	}
	
// CATEGORY 
elseif (isset($_GET['cat']))
	{
	$liveposts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM depts_info WHERE type_code LIKE 'School' AND panel LIKE '".$_GET['cat']."' ORDER BY alpha_code ASC") );
	$granular_title = $_GET['cat'];
	echo '<h3><a href="'.get_permalink($post->ID).'" rel="bookmark">'.get_the_title().' - '.$granular_title.'</a></h3>';
		echo '<table id="staff_list" class="schools_list">';
	echo '<thead><tr class="tableheading"><th >Name</th><th>Website</th><th>Type</th><th>Features</th></tr></thead>';
	foreach ($liveposts as $l)
		{
		echo '<tr class=""><td class="school_name"><strong><a href="?id='.strtolower($l->alpha_code).'">'.$l->full_name.'</a></strong> (<a target="_blank" href="http://maps.google.com/maps?f=q&hl=en&q='
          	.$l->address.'+'.$l->city.'+Ontario">Map</a>)</td><td><a href="http://'.strtolower($l->alpha_code).'.wrdsb.on.ca" target="_blank">'.strtolower($l->alpha_code).'.wrdsb.on.ca</a></td><td><a href="?cat='.$l->panel.'">'.$l->panel.'</a></td><td><a href="?tag='.$l->city.'">'.$l->city.'</a><br /><a href="?tag='.$l->grades.'">'.str_replace('Gr', 'Grades',$l->grades).'</a>';
		if($l->french != "") echo '<br /><a href="?tag='.$l->french.'">'.$l->french.''.'</a></td></tr>';
		}
	
	echo "</table>";
	}
//


// TAGS
elseif (isset($_GET['tag']))
	{
	if ($_GET['tag'] == 'french') $_GET['tag'] = 'Immersion';
	$liveposts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM depts_info WHERE type_code LIKE 'School' AND city LIKE '".$_GET['tag']."' OR type_code LIKE 'School' AND grades LIKE '".$_GET['tag']."' OR type_code LIKE 'School' AND french LIKE '%%".$_GET['tag']."' ORDER BY alpha_code ASC") );
	
	$granular_title = str_replace('Immersion','Partial French Immersion',str_replace('Gr','Grades',$_GET['tag']));
	echo '<h3><a href="'.get_permalink($post->ID).'" rel="bookmark">'.get_the_title().' - '.$granular_title.'</a></h3>';
	echo '<table id="staff_list" class="schools_list">';
	echo '<thead><tr class="tableheading"><th>Name</th><th>Website</th><th>Type</th><th>Features</th></tr></thead>';
	foreach ($liveposts as $l)
		{
		echo '<tr class=""><td class="school_name"><strong><a href="?id='.strtolower($l->alpha_code).'">'.$l->full_name.'</a></strong> (<a target="_blank" href="http://maps.google.com/maps?f=q&hl=en&q='
          	.$l->address.'+'.$l->city.'+Ontario">Map</a>)</td><td><a href="http://'.strtolower($l->alpha_code).'.wrdsb.on.ca" target="_blank">'.strtolower($l->alpha_code).'.wrdsb.on.ca</a></td><td><a href="?cat='.$l->panel.'">'.$l->panel.'</a></td><td><a href="?tag='.$l->city.'">'.$l->city.'</a><br /><a href="?tag='.$l->grades.'">'.str_replace('Gr', 'Grades',$l->grades).'</a>';
		if($l->french != "") echo '<br /><a href="?tag='.$l->french.'">'.$l->french.''.'</a></td></tr>';
		}
	
	echo "</table>";
	}
//	
	
?>
</div>


    </div>
  </div>
</div>

<?php get_footer(); ?>
