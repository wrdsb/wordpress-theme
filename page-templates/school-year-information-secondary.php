<?php
/*
Template Name: SYI - Secondary
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php $has_left = FALSE; ?>
    <?php $has_right = FALSE; ?>
    <?php if (is_active_sidebar('sidebar-left')) {$has_left = TRUE;} ?>
    <?php if (is_active_sidebar('sidebar-right')) {$has_right = TRUE;} ?>

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

    <?php
      // Start the Loop.
      while ( have_posts() ) : the_post();
      
        // Include the page content template.
        get_template_part( 'content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
          comments_template();
        }
      endwhile;
    ?>

<h1>General School Year Information</h1>

<p>Back to school is an exciting time for students. September ushers in a new year, with many new experiences to look forward to.</p>

<p>But there&rsquo;s one thing that doesn&rsquo;t change and that is the key information we send home to parents in the "September Home Package" envelope. This year, we have posted much of that information here so that parents may access it at any time.</p>

<p>Have a great year!</p>

<h2>Signature Required</h2>

<p>These items come home with each student in paper form. <strong>Please complete, sign and return them to your child&rsquo;s school office when you receive them.</strong></p>

<p>You can also request them from your child&rsquo;s school office, or print them where provided and send them in.</p>

<ul>
  <li><strong>Data Verification Form (DVF)</strong>
    <p>This form verifies your child&rsquo;s personal information, as well as your contact and emergency contact preferences.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/IS-09-L-S.pdf" target="_blank">Release of Student Personal Information Form &#8211; IS-09-L-S</a></strong>
    <p>The form is available for translation using Google Translator: <a href="http://www.wrdsb.ca/is-09-l-s/" target="_blank">Release of Student Information &#8211; IS-09-L-S</a></p>
  </li>
  <li><strong><a target="_blank" href="http://www.stswr.ca/wp-content/uploads/Do-Not-Ride-Form1.pdf">Do Not Ride Form</a></strong>
    <p>This form must be completed annually by parents of children who qualify for busing but will not ride because the parent has made alternative arrangements.</p>
  </li>
  <li><strong><a target="_blank" href="https://e-immunization.regionofwaterloo.ca">Form E &ndash; Student Immunization Form</a></strong>
    <p>For students aged 14-16, and any students new to the Region from outside of the province of Ontario. You are encouraged to submit this information using the <a target="_blank" href="https://e-immunization.regionofwaterloo.ca">online form</a>.</p>
  </li>
</ul>
<h2>For Your Information</h2>

<p><strong>Parents/guardians</strong>, please read the following documents:</p>

<h3>Welcome!</h3>

<ul>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Welcome-Back.pdf" target="_blank">Welcome Letter</a></strong>
    <p>Chairperson Kathleen Woodcock, and Director of Education John Bryant welcome you and your child(ren) to the 2015-2016 school year.</p>
  </li>
</ul>

<h3>Calendars and Important Dates</h3>

<ul>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/school-year-information-2015-2016.pdf" target="_blank">2015-2016 School Year Calendar Information</a></strong>
    <p>The school year calendar information provides parents with a list of important dates, such as PD Days and holidays.</p>
  </li>
</ul>

<h3>Expectations</h3>

<ul>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/School-Community-Standards-of-Behaviour.pdf" target="_blank">School Community Standards of Behaviour</a></strong>
    <p>These standards ensure all members of our school communities are treated with dignity and respect, and follow the Ontario Ministry of Educations&rsquo; Code of Conduct. This document also outlines the process for resolving parent/guardian concerns.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Character-Development.pdf" target="_blank">Character Development</a></strong>
    <p>Character Development connects caring to knowing, feeling and doing. The eight (8) defined character attributes help guide character development in the WRDSB.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Code-of-Digital-Conduct-Senior.pdf" target="_blank">Code of Digital Conduct &#8211; Senior</a></strong>
    <p>The code of digital conduct teaches students how to safely use online technology in the classroom.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Digital-Citizenship.pdf" target="_blank">Digital Citizenship</a></strong>
    <p>Digital citizenship connects the eight character attributes of character development to online tools used in the classroom.</p>
  </li>
</ul>

<h3>School Safety</h3>

<ul>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/2015-Student-Accident-Insurance-Letter.pdf" target="_blank">Student Accident Insurance Letter</a></strong>
    <p>Some injuries may incur medical, dental or other expenses that are not covered by provincial health care or employer group plans. The WRDSB encourages you to consider <a href="http://www.insuremykids.com/" target="_blank">Insurekids&reg; Protection Plan</a> for students through Old Republic Insurance Company of Canada.</p>
    <p>Parents requesting a paper pamphlet to subscribe should contact Old Republic Insurance Company of Canada at 1-800-463-5437.</p>
  </li>
  <li><strong><a target="_blank" href="http://www.wrdsb.ca/wp-content/uploads/1841605-Immunization-Postcard_access.pdf">You asked us: How to Avoid School Suspension</a></strong> (because of missing vaccinations)
  <p>From Region of Waterloo: Public Health and Emergency Services to raise awareness of the new mandatory vaccination requirements.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Safe-Caring-and-Inclusive-Schools.pdf" target="_blank">Safe, Caring and Inclusive Schools</a></strong>
    <p>This handout explains the changes as a result of legislation (Bill 157), and Board Policy that requires all board employees to report behaviours that typically lead to suspension or expulsion.</p>

    <p>These behaviours include inappropriate jokes/comments, acts of vandalism and acts of violence.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Safe-Arrival-Program-and-Emergency-Closures.pdf" target="_blank">Safe Arrival &#8211; Emergency School Closures</a></strong>
    <p>Information on the Safe Arrival Program, why it is in place and how it works, as well as what happens when there is an emergency school closure.</p>

    <p>It also includes a list of radio stations which provide inclement weather information.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Threat-Risk-Assessment.pdf" target="_blank">Threat Risk Assessment Fair Notice Process</a></strong>
    <p>All members of the school community have the right to be safe and feel safe in their school community. Under certain conditions, students may undergo a "Threat Risk Assessment". This assessment determines the level of risk to others and themselves.</p>

    <p>This document outlines the process of a Threat Risk Assessment.</p>
  </li>
</ul>

<h3>Get Involved</h3>

<ul>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Parent-Engagement2015.pdf" target="_blank">Parent Engagement: School Councils</a></strong>
    <p>This document outlines the roles and responsibilities of school councils. For information on your child&rsquo;s school council, please contact the school Principal.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/pic/">Parent Involvement Committee (PIC)</a></strong>
    <p>The purpose of PIC is to support, encourage and enhance the engagement of parents/guardians of the WRDSB in their children&rsquo;s education, to improve student achievement and well-being.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/our-schools/get-involved/wrapsc/">Waterloo Region Assembly of Public School Councils (WRAPSC)</a></strong>
    <p>The purpose of the Assembly is to assist all School Councils of the WRDSB to further their support of student achievement through parent engagement.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Voluntary-First-Nation-Pamphlet.pdf" target="_blank">Voluntary First Nation, M&eacute;tis and Inuit Self-Identification Information for Families</a></strong>
    <p>The voluntary First Nation, M&eacute;tis and Inuit self-identification process allows us to work toward the goal of improving Aboriginal student achievement through specific programming, targeted initiatives, resource support and increased family and community involvement with the Board.</p>

    <p>If your child(ren) are of First Nation, M&eacute;tis or Inuit ancestry, we encourage you to consider participating in the voluntary self-identification information collection process, when registering for school or updating student information.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/international-languages-poster-8.5x11.pdf" target="_blank">International Languages</a></strong>
    <p>The international languages program provides students with opportunities to learn a new language, at various schools throughout the region.</p>
  </li>
</ul>

<h3>Busing</h3>

<ul>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/STSWR-Information-Insert.pdf" target="_blank">STSWR Information Insert</a></strong>
    <p>Student Transportation Services of Waterloo Region (STSWR) provides transportation. This information sheet provides contact information, as well as how to find out your child&rsquo;s bus route and transportation eligibility.</p>
  </li>
  <li><strong><a href="http://www.wrdsb.ca/wp-content/uploads/Secondary-School-Bus-Safety.pdf" target="_blank">Secondary School Bus Safety</a></strong>
    <p>This document outlines student safety while riding school buses, including getting on and off the vehicle, bus patrols and what to do at the bus stop.</p>
  </li>
</ul>

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

<?php get_footer(); ?>
