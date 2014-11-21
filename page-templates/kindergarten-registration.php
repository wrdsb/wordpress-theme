<?php
/*
Template Name: Kindergarten Reg
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
      echo '<div class="col-sm-3 col-lg-3">';
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

<h1>How to Register for Kindergarten</h1>
<p>
  We are pleased to provide new Kindergarten parents with an opportunity 
  to access the forms required for student registration and review 
  pertinent information online. Links to the forms and a list of documents 
  you will need to bring to your registration appointment can be 
  found on this page.
</p>
<p>
  How to Register:
</p>
<ol>
  <li>
    <p>Determine which school your child at should attend.</p>
    <p>To determine boundary eligibility visit the <a href="https://bpweb.stswr.ca/">Student Transportation Services of Waterloo Region (STSWR) website</a>.</p>
  </li>
  <li>
    <p>Contact your child’s school to set up an appointment for registration.</p>
    <p><a href="http://www.wrdsb.ca/our-schools/schools/">WRDSB Schools</a></p>
  </li>
  <li>
    <p>Download, print and complete the form/s below required for student registration.</p>
    <p><a href="http://staff.wrdsb.ca/policyprocedure/?page_id=443">Student Registration Form (IS-09-H)</a> – be sure to complete both sides and provide your signature at the bottom of the second page.</p>
    <p><a href="http://staff.wrdsb.ca/policyprocedure/?page_id=347">Confirmation of Pupil Eligibility for ESL Funding - (FS-09-ESL)</a> – this form is only to be completed if your child was born in a country outside of Canada</p>
    <p>Student Immunization Information Form – you may <a href="https://e-immunization.regionofwaterloo.ca/">submit your child’s immunization information online</a> directly to the Region of Waterloo Public Health.</p>
    <p>Form families unable to submit the immunization information electronically, a paper copy of the form may be obtained from your school office at the time of registration</p>
  </li>
  <li>
    <p>Bring your completed forms and required documentation to the registration appointment.</p>
    <p>Proof of Birth – You are required to bring only one of the following acceptable documents:</p>
    <ul>
      <li>Canadian Birth Certificate</li>
      <li>Baptismal Certificate</li>
      <li>Statement of Live Birth</li>
      <li>Canadian Passport</li>
    </ul>
    <p>Proof of Address – You are required to bring only one of the following acceptable documents:</p>
    <ul>
      <li>Lease/Rental Agreement</li>
      <li>Real Estate Document</li>
      <li>Driver’s License</li>
      <li>Utility Bill (gas, hydro, water, ect.)</li>
      <li>Bank Statement</li>
      <li>Credit Card Statement</li>
    </ul>
    <p>Canadian Citizenship or Immigration Status (only for students born outside of Canada):</p>
    <ul>
      <li>Canadian Passport</li>
      <li>Certificate of Canadian Citizenship</li>
      <li>Confirmation of Permanent Residence</li>
      <li>Permanent Resident Card</li>
      <li>Certificate of Indian Status Card</li>
      <li>Letter of Admission assigned by the WRDSB enrolment officer</li>
    </ul>
  </li>
  <li>
    <p>Review the following Kindergarten Parent Information Package inserts for important information:</p>
    <ul>
      <li>Off to School Booklet</li>
      <li>Extended Day Registration Flyer</li>
      <li>Welcome to your School Library</li>
      <li>Waterloo Region Referral List</li>
      <li>Eye See.....Eye Learn</li>
    </ul>
  </li>
  <li>
    <p>A Welcome to Kindergarten – Orientation Event will be offered at your child’s school in the spring. Be sure to ask for these details at the time of your registration appointment.</p>
  </li>
  <li>
    <p>To receive ongoing communications throughout the school year:</p>
    <ul>
      <li>Subscribe by email on the school’s website</li>
      <li>Register for School-Day if your school uses School-Day</li>
    </ul>
  </li>
</ul>

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
