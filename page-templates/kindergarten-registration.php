<?php
/*
Template Name: Kindergarten Registration
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php
    $has_left = TRUE;
	  $has_right = FALSE;
    if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;} ?>

    <?php
    # Both sidebars
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
      if (!is_front_page()) {
        get_sidebar('lmenu');
      }
      get_sidebar('left');
      echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';
      if (!is_front_page()) {
        get_sidebar('lmenu');
      }
      get_sidebar('left');
      echo '</div>';

    # Just right sidebar
      # Nothing to do

    # No sidebars
      # Nothing to do
    endif;
    ?>

    <?php
    # Both sidebars
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

    <?php // check if the post has a Post Thumbnail assigned to it.
      if ( has_post_thumbnail() ) {
        echo '<div class="featuredimage">';
        if (($has_left == TRUE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-two-sidebars');
        elseif (($has_left == TRUE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-one-sidebar');
        elseif (($has_left == FALSE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-one-sidebar');
        elseif (($has_left == FALSE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-full-width');
        endif;
        echo '</div>';
      }
    ?>


<h1>How to Register for Kindergarten</h1>

<ol>
<li><strong>Confirm your child’s school</strong>.
<ul>
<li>Look up the school by boundary for students starting <a href="http://schoolfinder.stswr.ca/" target="_blank">this year (2015-2016)</a>, or <a href="http://schoolfinder.stswr.ca/nextyear/" target="_blank">next year (2016-2017)</a>.</li>
</ul>
</li>
<li><strong>Start the registration process</strong>
<ul>
<li><a href="http://register.wrdsb.ca/kindergarten" target="_blank">Register</a>&nbsp;online now!</li>
<li>See a <a href="https://www.youtube.com/watch?v=qkFE3NXpTzk" target="_blank" javascript="ga('send', 'event', 'YouTube Video', 'Open', 'Kindergarten Registration 2016';">video walk-through</a> if you need help!</li>
</ul>
</li>
<li><strong>Attend the follow-up appointment</strong>
<ul>
<li>After you register online, your school will contact you to arrange an appointment. You will need to <strong>bring the following documents</strong> when you meet with your child’s school to complete the registration:
<ul>
<li><strong>Proof of Address</strong>
<ul>
<li>Utility bill, proof of Ontario Property Assessment Notice, or lease agreement.</li>
</ul>
</li>
<li><strong>Proof of Birth</strong>
<ul>
<li>Birth Certificate, Canadian Passport, birth registration, citizenship card or statement of live birth.</li>
</ul>
</li>
<li><strong>Proof of Custody</strong> where applicable
<ul>
<li>Custody orders, court-ordered Guardianship</li>
</ul>
</li>
<li><strong><a href="https://e-immunization.regionofwaterloo.ca/" target="_blank">Student Immunization Information</a></strong>
<ul>
<li>Submit your child’s immunization information online directly to the <a href="https://e-immunization.regionofwaterloo.ca/" target="_blank">Region of Waterloo Public Health</a>.</li>
</ul>
</li>
<li>Immigration Documents where required</li>
</ul>
</li>
</ul>
</li>
</ol>

<h2>Learn More!</h2>
    <p>For more information about Kindergarten, Before and After School Programs, and other important information, you are encouraged to review the following:</p>
    <ul>
      <li><a target="_blank" href="http://www.wrdsb.ca/kindergarten/">Kindergarten at the WRDSB</a></li>
      <li><a target="_blank" href="http://www.wrdsb.ca/beforeafter/">Before and After School Programs</a></li>
    </ul>

<h2>See a Day in Kindergarten!</h2>

<iframe width="560" height="315" src="https://www.youtube.com/embed/fC7ZkyI3Zlg" frameborder="0" allowfullscreen></iframe>

<h2>Spring Family Orientation Event</h2>

<p>Some schools offer an opportunity for families to be welcomed and learn more about the Kindergarten experience. Be sure to ask for these details when you complete the registration with the school!</p>

    <?php
      // Start the Loop.
      while ( have_posts() ) : the_post();
        $sitename = get_bloginfo('name');
        if ($post->post_content != "") {
          the_title('<h2>', ': '.$sitename.' Information</h2><p class="note">The following information applies to '.$sitename.' only.</p>');
          the_content();
        }
        edit_post_link('Edit');
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
        $number_of_tags = count(get_terms('post_tags'));
        if ($number_of_tags > 0) {
          the_tags();
        }
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
          comments_template();
        }
      endwhile;
    ?>

    </div> <!-- end content area -->

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

    endif;
    ?>

  </div>
</div>

<?php get_footer();
