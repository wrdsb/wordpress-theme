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
      get_sidebar('left');
      echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-2">';
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
      echo '<div class="col-sm-9 col-lg-10">';

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-8">';

    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
      echo '<div class="col-sm-12 col-lg-12">';

    endif;
    ?>

    <?php // check if the post has a Post Thumbnail assigned to it.
      if ( has_post_thumbnail() ) {
        if (($has_left == TRUE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-two-sidebars');
        elseif (($has_left == TRUE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-one-sidebar');
        elseif (($has_left == FALSE) and ($has_right == TRUE)):
          the_post_thumbnail('wrdsb-one-sidebar');
        elseif (($has_left == FALSE) and ($has_right == FALSE)):
          the_post_thumbnail('wrdsb-full-width');
        endif;
      }
    ?>
<h1>School Year Information</h1>
<p>
  Back to school is an exciting time for students. September ushers
  in a new year, with many new experiences to look forward to.
</p>
<p>
  But there's one thing that doesn't change and that is the
  key information we send home to parents in the "September Home
  Package" envelope. This year, we have posted much of that
  information here so that parents may access it at any time.
</p>
<p>
  Have a great year!
</p>

<p>
  Parents/guardians are requested to read the following 
  documents by clicking on the links provided below:
</p>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/IS-09-L-S.pdf" target="_blank">Release of Student Personal Information Form &#8211; IS-09-L-S</a></p>
<ul>
  <li>
    The Standard Release form will be sent home by the school with each 
    student in paper form. Parents/guardians are requested to complete, 
    sign and return the Standard Release Form to your school office.
  </li>
  <li>
    The form is available for translation using Google Translator: 
    <a href="" target="_blank">Release of Student Information &#8211; IS-09-L-S</a>
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Welcome-Letter-Chairperson-Director.pdf" target="_blank">Welcome Letter</a></p>
<ul>
  <li>Chairperson Ted Martin, and Director of Education John Bryant welcome you and your child(ren) to the 2014-15 school year.</li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/2014-15-School-Year-Information.pdf" target="_blank">2014-15 School Year Calendar Information</a></p>
<ul>
  <li>
    The school year calendar information provides parents 
    with a list of important dates, such as PD Days and holidays.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/School-Community-Standards-of-Behaviour.pdf" target="_blank">School Community Standards of Behaviour</a></p>
<ul>
  <li>
    These standards are in place to ensure that all members of our school communities 
    are treated with dignity and respect, and follow the Ontario Ministry of Educations' 
    Code of Conduct. The process for resolving parent/guardian concerns is also
    outlined in this document.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Student-Accident-Insurance-Letter.pdf" target="_blank">Student Accident Insurance Letter</a></p>
<ul>
  <li>
    This insurance program available through Staebler Insurance, 
    offers a variety of plans and benefits that may not be 
    covered by Provincial or employer group insurance plans.
  </li>
  <li>
    Parents/guardians are encouraged to subscribe on-line at: 
    <a href="http://www.staebler.com/student-accident-insurance" target="_blank">www.staebler.com/student-accident-insurance</a>
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Character-Development.pdf" target="_blank">Character Development</a></p>
<ul>
  <li>
    Character Development connects caring to knowing, feeling 
    and doing. There are eight (8) character attributes, defined 
    in this document, that help guide character development 
    in the WRDSB.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Code-of-Digital-Conduct-Senior.pdf" target="_blank">Code of Digital Conduct &#8211; Senior</a></p>
<ul>
  <li>
    The code of digital conduct teaches students how to 
    safely use online technology in the classroom.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Digital-Citizenship.pdf" target="_blank">Digital Citizenship</a></p>
<ul>
  <li>
    Digital citizenship connects the eight character 
    attributes of character development to online tools used in the classroom.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Safe-Caring-and-Inclusive-Schools.pdf" target="_blank">Safe, Caring and Inclusive Schools</a></p>
<ul>
  <li>
    This handout explains the changes as a result of legislation 
    (Bill 157), and Board Policy that requires all board employees to report 
    behaviours that typically lead to suspension or expulsion.
  </li>
  <li>
    These behaviours include inappropriate jokes/comments, 
    acts of vandalism and acts of violence.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Threat-Risk-Assessment.pdf" target="_blank">Threat Risk Assessment</a></p>
<ul>
  <li>
    The Waterloo Region District School Board recognizes 
    that all members of the school community have the right 
    to be safe and feel safe in their school community.
  </li>
  <li>
    Under certain conditions, students may undergo a 
    "Threat Risk Assessment". This assessment determines 
    the level of risk to others and themselves.
  </li>
  <li>
    This document outlines the process of a 
    Threat Risk Assessment.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Parent-Engagement.pdf" target="_blank">Parent Engagement: School Councils</a></p>
<ul>
  <li>
    The roles and responsibilities of school councils 
    are outlined in this document. For information on 
    your child’s school council, please contact the 
    school Principal.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/International-Languages.pdf" target="_blank">International Languages</a></p>
<ul>
  <li>
    The international languages program provides 
    students with opportunities to learn a new language, 
    at various schools throughout the region.
  </li>
  <li>
    Information on languages offered and how to 
    register can be found in this document.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Secondary-School-Bus-Safety.pdf" target="_blank">Secondary School Bus Safety</a></p>
<ul>
  <li>
    Every day, thousands of students are taken to 
    school by Student Transportation Services of 
    Waterloo Region (STSWR).
  </li>
  <li>
    This document outlines student safety while 
    riding school buses, including getting on and 
    off the vehicle, bus patrols and what to do at 
    the bus stop.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/STSWR-Information-Insert.pdf" target="_blank">STSWR Information Insert</a></p>
<ul>
  <li>
    Transportation is provided by Student Transportation 
    Services of Waterloo Region. This information sheet 
    provides contact information, as well as how to find 
    out your child’s bus route and transportation eligibility.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/E-Learning-Course-Offerings.pdf" target="_blank">e-Learning &#8211; 2014-2015 Course Selection</a></p>
<ul>
  <li>
    The Waterloo Region District School Board’s online courses 
    are designed to allow students to take courses and earn 
    secondary school credits on days and at times that are 
    convenient for them. This document contains a list of 
    e-Learning courses offered for the 2014-15 school year.
  </li>
  <li>
    Students interested in registering for an e-Learning course 
    should contact their school guidance counsellor.
  </li>
</ul>

<p><a href="http://www.wrdsb.ca/wp-content/uploads/Voluntary-First-Nation-Pamphlet.pdf" target="_blank">Voluntary First Nation Pamphlet</a></p>
<ul>
  <li>
    If your child(ren) are of First Nation, Metis or Inuit ancestry, 
    we encourage you to consider participating in the voluntary 
    self-identification information collection process, when 
    registering for school or updating student information.
  </li>
  <li>
    Information on the self-identification process is found in this brochure.
  </li>
</ul>
<!--
<p><a href="http://www.wrdsb.ca/school-year-information/files/2013/07/Protect-Your-Child.pdf" target="_blank">Protect Your Child</a></p>
<ul>
  <li>
    Immunization leads to improved individual and population health. 
    It also helps save lives and prevent serious illnesses.
  </li>
  <li>
    Parents are encouraged to contact Public Health when your 
    child receives any immunizations.
  </li>
  <li>
    Information for reporting immunizations is found in this document.
  </li>
</ul>
-->
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

    </div> <!-- end content area -->

    <?php
    # Both sidebars
    # right column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2">';
      get_sidebar('right');
      echo '</div>';

    # Just left sidebar
      # Nothing to do

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-4"">';
      get_sidebar('right');
      echo '</div>';

    # No sidebars
      # Nothing to do

    endif;
    ?>

  </div>
</div>

<?php get_footer(); ?>
