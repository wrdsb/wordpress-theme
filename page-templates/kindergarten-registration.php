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
  <li>
    <p><strong>Confirm your child's school</strong>. Look up the school by boundary for students starting <a target="_blank" href="https://bpweb.stswr.ca/Eligibility.aspx?Page=School&amp;DBGUID=e203f9f5-e885-472c-945b-5e011c680374">this year (2015-2016)</a>, or <a target="_blank" href="https://bpweb.stswr.ca/Eligibility.aspx?Page=School&amp;">next year (2016-2017)</a>.</p>
  </li>
  <li>
    <p><strong>Start the registration process</strong> <a href="https://etrillium.wrdsb.ca/onlinereg">online</a> now!</p>
    <p>Learn more about the <a href="http://www.wrdsb.ca/register/">registration process</a> before starting.</p>
  </li>
  <li>
    <p>Please <strong>bring the following documents</strong> when you meet with your child's school to complete the registration:</p>
    <ul>
      <li><strong>Proof of Address</strong>
        <p>Utility bill, proof of Ontario Property Assessment Notice, or lease agreement.</p>
      </li>
      <li><strong>Proof of Birth</strong>
        <p>Birth Certificate, Canadian Passport, birth registration, citizenship card or statement of live birth.</p>
      </li>
      <li><strong>Proof of Custody</strong> where applicable
        <p>Custody orders, court-ordered Guardianship</p>
      </li>
      <li><a target="_blank" href="https://e-immunization.regionofwaterloo.ca/"><strong>Student Immunization Information</strong></a>
      <p>Submit your child's immunization information online directly to the <a target="_blank" href="https://e-immunization.regionofwaterloo.ca/">Region of Waterloo Public Health</a>.</p>
      </li>
    </ul>
  </li>
</ol>

<h2>Learn More!</h2>
    <p>For more information about Kindergarten, Before and After School Programs, and other important information, you are encouraged to review the following:</p>
    <ul>
      <li><a target="_blank" href="http://www.wrdsb.ca/wp-content/uploads/Off-to-School-Booklet.pdf">Off to School Booklet</a></li>
      <li><a target="_blank" href="http://www.wrdsb.ca/kindergarten/">Kindergarten at the WRDSB</a></li>
      <li><a target="_blank" href="http://www.wrdsb.ca/beforeafter/">Before and After School Programs</a></li>
      <li><a target="_blank" href="http://www.wrdsb.ca/wp-content/uploads/Kindergarten_Library_Flyer.pdf">Welcome to your School Library</a></li>
      <li><a target="_blank" href="[ http://chd.region.waterloo.on.ca/en/childfamilyhealth/resources/referrallist_servicepathway.pdf ]http://chd.region.waterloo.on.ca/en/childfamilyhealth/resources/referrallist_servicepathway.pdf">Service Pathway for Children Ages 0-6 in Region of Waterloo</a> for support services such as speech &amp; language/hearing assessments, vision assessments, developmental concerns, etc.</li>
      <li><a target="_blank" href="http://www.ndds.ca/ontario">Nipissing District Developmental Screen (ndds)</a> is an innovative developmental checklist for infants and children up to 6 years of age, to be completed by a parent or health/child care professional.</li>
      <li><a target="_blank" href="http://www.eatrightontario.ca/en/Children.aspx">Eat Right Ontario</a> articles on children and the nutri-estep program</li>
      <li><a target="_blank" href="http://www.optom.on.ca/OAO/ESEL/AboutESEL.aspx">Eye See...Eye Learn&reg;</a> &ndash; how well can your child see? Eye exams and glasses are complimentary for JK kids!</li>
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
