<?php
/*
Template Name: SYI - Elementary
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

<h2>Boardwide Information</h2>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466544194_compose.png" alt="" desc="A round icon with a green background, flat design, featuring a stylized piece of paper with rounded corners and a large stylized pencil diagonally across it." />Action Required</h3>

<p class="note">Some of these items come home with each student in paper form. <strong>Please complete, sign and return any paper forms to your child&rsquo;s school office when you receive them.</strong> You can also request these documents from your child&rsquo;s school office, or print them where provided and send them in.</p>

<ul>
  <li><strong>Data Verification Form (DVF)</strong>
    <p>This form verifies your child&rsquo;s personal information, as well as your contact and emergency contact preferences.</p>
  </li>
  <li><strong>Medical Letter</strong>
    <p>We want to ensure that every precaution has been taken for your child. If your child has medical concerns, you will need to provide details of those concerns, including medications which your child will carry.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/wp-content/uploads/IS-09-L-E.pdf" target="_blank">Release of Student Information Form &#8211; IS-09-L-E</a></strong>
    <p>The form allows the school/teachers to take photographs and recordings of your child. It is available for translation using Google Translator: <a href="https://www.wrdsb.ca/is-09-l-e/" target="_blank">Release of Student Information &#8211; IS-09-L-E</a></p>
  </li>
  <li><strong><a target="_blank" href="https://www.wrdsb.ca/our-schools/using-school-day/">School-Day</a></strong>
    <p>All WRDSB schools now use School-Day, an online cashless system to minimize cash-handling, reduce paper usage, and streamline office efficiencies. Learn <a target="_blank" href="https://www.wrdsb.ca/our-schools/using-school-day/#signup">how to sign up for School-Day!</a></p>
  </li>
  <li><strong><a target="_blank" href="http://www.stswr.ca/do-not-ride-form/">Do Not Ride Form</a></strong>
    <p>This form must be completed annually by parents of children who qualify for busing but will not ride because the parent has made alternative arrangements.</p>
  </li>
  <li><strong><a target="_blank" href="https://e-immunization.regionofwaterloo.ca">Region of Waterloo Public Health Online Immunization Update Form</a></strong>
    <p>For JK/SK students, and any students new to the Region from outside of the province of Ontario. You are encouraged to submit this information using the <a target="_blank" href="https://e-immunization.regionofwaterloo.ca">online form</a>.</p>
  </li>
  <li><strong>Public Health consent forms</strong>
    <ul>
      <li>Hepatitis B Vaccination (Grade 7 students)</li>
      <li>HPV Vaccination (Grade 8 female students)</li>
    </ul>
  </li>
</ul>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466542370_calendar.png" alt="" desc="A round icon with a blue background, flat design, featuring a stylized flip day calendar with the number 7 on it." />Calendars and Important Dates</h3>

<p>The school year <a href="/calendar/">calendar</a> information provides parents with a list of important dates, such as PD Days and holidays. Subscribe to your school's <a href="/calendar/">calendar</a> and always know what's happening at the school!</p>

<h4>How to Subscribe</h4>

<p>Go to your school's <a href="/calendar/">calendar</a>. At the bottom right of the calendar, choose Subscribe and follow the prompts to add the calendar feed to your Google Calendar, Outlook Calendar, Apple Calendar, or almost any other calendar. As events are added, deleted or changed, they will now show up in your personal calendar.</p>

<p class="note">If you'd like to only see some categories, choose the categories you'd like to subscribe to by choosing each one from the drop down on the top left called "Categories". Then subscribe to the filtered calendar as above.</p>

<h4>Alternative Formats</h4>

<p>You can download the School Year Calendar and the list of PD Days and Holidays separately as well (PDFs):</p>

<ul>
  <li><a href="https://www.wrdsb.ca/school-year-calendar-elem/" target="_blank">School Year Calendar</a></li>
  <li><a href="https://www.wrdsb.ca/important-dates/" target="_blank">Important Dates</a></li>
</ul>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466544261_news.png" alt="" desc="A round icon with a red background, flat design, featuring a stylized newspaper." />Required Reading and Resources</h3>

<div class="clearfix"></div>

<ul>
  <li><strong><a href="https://www.wrdsb.ca/welcome-letter/" target="_blank">Welcome Letter</a></strong>
    <p>The Board Chairperson, and the Director of Education welcome you and your child(ren) to the new school year.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/standards-of-behaviour-for-the-school-community/" target="_blank">School Community Standards of Behaviour</a></strong>
    <p>These standards ensure all members of our school communities are treated with dignity and respect, and follow the Ontario Ministry of Educations&rsquo; Code of Conduct. This document also outlines the process for resolving parent/guardian concerns.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/character-development/" target="_blank">Character Development</a></strong>
    <p>Character Development connects caring to knowing, feeling and doing. The eight (8) defined character attributes help guide character development in the WRDSB.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/code-of-digital-conduct-junior/" target="_blank">Code of Digital Conduct &#8211; Junior</a></strong>
    <p>The code of digital conduct teaches students how to safely use online technology in the classroom.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/digital-citizenship/" target="_blank">Digital Citizenship</a></strong>
    <p>Digital citizenship connects the eight character attributes of character development to online tools used in the classroom.</p>
  </li>
</ul>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466544166_support.png" alt="" desc="A round icon with a navy blue background, flat design, featuring a stylized life preserver ring." />School Safety</h3>

<div class="clearfix"></div>

<ul>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/student-accident-insurance-letter/" target="_blank">Student Accident Insurance Letter</a></strong>
    <p>Some injuries may incur medical, dental or other expenses that are not covered by provincial health care or employer group plans. The WRDSB encourages you to consider <a href="http://www.insuremykids.com/" target="_blank">Insurekids&reg; Protection Plan</a> for students through Old Republic Insurance Company of Canada.</p>
    <p>Parents requesting a paper pamphlet to subscribe should contact Old Republic Insurance Company of Canada at 1-800-463-5437.</p>
  </li>
  <!--li>Immunization Fact Sheet</li-->
  <li><strong><a target="_blank" href="https://www.wrdsb.ca/wp-content/uploads/1841605-Immunization-Postcard_access.pdf">You asked us: How to Avoid School Suspension</a></strong> (because of missing vaccinations)
  <p>From Region of Waterloo: Public Health and Emergency Services to raise awareness of the new mandatory vaccination requirements.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/safe-caring-and-inclusive-schools-overview/" target="_blank">Safe, Caring and Inclusive Schools</a></strong>
    <p>This handout explains the changes as a result of legislation (Bill 157), and Board Policy that requires all board employees to report behaviours that typically lead to suspension or expulsion.</p>
    <p>These behaviours include inappropriate jokes/comments, acts of vandalism and acts of violence.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/safe-arrival-program-and-emergency-school-closures/" target="_blank">Safe Arrival &#8211; Emergency School Closures</a></strong>
    <p>Information on the Safe Arrival Program, why it is in place and how it works, as well as what happens when there is an emergency school closure.</p>
    <p>It also includes a list of radio stations which provide inclement weather information.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/threat-risk-assessment-fair-notice-and-process/" target="_blank">Threat Risk Assessment Fair Notice Process</a></strong>
    <p>All members of the school community have the right to be safe and feel safe in their school community. Under certain conditions, students may undergo a "Threat Risk Assessment". This assessment determines the level of risk to others and themselves.</p>
    <p>This document outlines the process of a Threat Risk Assessment.</p>
  </li>
</ul>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466544295_rgb.png" alt="" desc="A round icon with a navy blue background, flat design, featuring three stylized intersecting rings." />Get Involved</h3>

<div class="clearfix"></div>

<blockquote><p>“Parents play a vital role in the development and education of their children and in the success of schools. They are the most important influence in a child’s life outside of school. Long after direct learning from parents in a child’s early years gives way to formal education, parents continue to play a key role in student success through the attitudes they help to share and the direct supports they provide.”</p>
<p class="reference">Ontario Ministry of Education</p>
</blockquote>

<ul>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/parent-engagement-school-councilswrapscpic/" target="_blank">Parent Engagement: School Councils</a></strong>
    <p>Learn about the roles and responsibilities of school councils! To learn about the school council at your child&rsquo;s school, please contact the school Principal.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/pic/">Parent Involvement Committee (PIC)</a></strong>
    <p>PIC supports, encourages and enhances the engagement of parents/guardians of the WRDSB in their children&rsquo;s education, to improve student achievement and well-being.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/get-involved/wrapsc/">Waterloo Region Assembly of Public School Councils (WRAPSC)</a></strong>
    <p>The Assembly assists all School Councils of the WRDSB to further their support of student achievement through parent engagement.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/voluntary-first-nation-metis-and-inuit-self-identification-information-for-families/" target="_blank">Voluntary First Nation, M&eacute;tis and Inuit Self-Identification Information for Families</a></strong>
    <p>The voluntary First Nation, M&eacute;tis and Inuit self-identification process allows us to work toward the goal of improving Aboriginal student achievement through specific programming, targeted initiatives, resource support and increased family and community involvement with the Board.</p>
    <p>If your child(ren) are of First Nation, M&eacute;tis or Inuit ancestry, we encourage you to consider participating in the voluntary self-identification information collection process, when registering for school or updating student information.</p>
  </li>
</ul>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466544244_globe.png" alt="" desc="A round icon with a pale blue background, flat design, featuring a stylized earth with continents surrounding the Atlantic Ocean." />International Languages</h3>

<p>The <a href="https://www.wrdsb.ca/learning/programs/continuing-education-2/international-languages/" target="_blank">International Languages</a> program provides opportunities for students to learn a language at the elementary or secondary school (high school credit) level, at a variety of sites around the Region.</p>

<h3 style="vertical-align: middle;"><img style="display: inline; padding-right: 15px; width: 75px;" src="https://www.wrdsb.ca/wp-content/uploads/1466544269_schooolbus.png" alt="" desc="A round icon with a navy blue background, flat design, featuring a stylized school bus." />Busing</h3>

<div class="clearfix"></div>

<ul>
  <li><strong><a href="https://www.stswr.ca/syi-handout/" target="_blank">STSWR Information Insert</a></strong>
    <p>Student Transportation Services of Waterloo Region (STSWR) provides transportation. This information sheet provides contact information, as well as how to find out your child&rsquo;s bus route and transportation eligibility.</p>
  </li>
  <li><strong><a href="https://www.wrdsb.ca/our-schools/school-year-information/school-bus-safety/" target="_blank">Elementary School Bus Safety</a></strong>
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

<?php get_footer();
