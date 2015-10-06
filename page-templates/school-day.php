<?php
/*
Template Name: school-day
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
      echo '<div class="col-sm-8">';

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

<h1>School-Day</h1>

<iframe frameborder="0" id="school-day" class="login" src ="https://www.school-day.com/pg/school/sso/index.php?height=190&amp;width=185" width="185px" height="190px"></iframe>

<h2>What is School-Day?</h2>

<p>School-Day is an online cashless system for use by parents, teachers and office administrative staff. We are implementing School-Day to minimize the handling of cash by teachers and office staff, reduce paper, and streamline office efficiencies.</p>

<h2>What&rsquo;s in it for parents?</h2>

<p>School-Day can be accessed from any web browser and gives parents real-time, secure access to up-to-date information, and the ability to:</p>

<ul>
	<li>Complete on-line payments for trips or other activities</li>
	<li>Register your child for extra-curricular events</li>
	<li>Approve permission forms instantly on-line</li>
	<li>Sign up for parent/teacher interviews</li>
	<li>Update your mobile device with calendar events specific to your child</li>
	<li>Minimize the risks associated with sending money to school with your child (&#8220;backpack delivery&#8221;)</li>
  <li>Reduce the environmental impact of photocopying permission forms and announcements</li>
</ul>

<h2>FAQs</h2>

<h3>Is School-Day CASL compliant?</h3>

<p>Yes, School-Day is CASL compliant. Because parents have signed up to have School-Day send them information on behalf of the school, the CASL regulations have been followed. Parents have the ability to opt out of School-Day emails at any time by adjusting their preferences in school-day.</p>

<ul>
	<li>To adjust your settings or change your personal information, log in to school-day and select <em>Edit My Account</em> from the left side menu.</li>
</ul>

<h3>Why is the Board adopting School-Day?</h3>

<p>The Board is adopting School-Day because we want to minimize the handling of cash by students, teachers and office staff, reduce paper, and streamline office efficiencies.</p>

<h3>Will school-day cost me anything?</h3>

<p>Using School-Day does not cost parents anything. The only costs that parents have are for products and events from their child&rsquo;s school.</p>

<h3>Is there an additional cost to purchase items online?</h3>

<p>We are legally obligated to advertise the same price for events and items whether individuals are making purchases online or paying by cash/cheque. The transaction fee is calculated into the cost provided by the school to the parents.</p>

<p>Every purchase made through School-Day is subject to a 4% transaction fee. This covers fees charged by credit card companies or Interac as well as the cost of the secure online portal. Depending on which type of card is used, and the amount of the transaction, the transaction fee may or may not cover the cost of the transaction. Any shortfall or residual funds are left with the school to support future purchases or activities that support students.</p>

<h3>Can I email my child&rsquo;s teacher through school-day?</h3>

<p>No, School-Day only supports one-way communication&ndash;from the school/teacher to parents. If you need to speak with your child&rsquo;s teacher, please contact your teacher directly.</p>

<h3>How can I sign up for my child&rsquo;s School Day account?</h3>

<p>If your child&rsquo;s school has started using School day, the parent has to create an account, and link their child to their account. Multiple parents/guardians can be linked to the same student&ndash;and multiple students can be linked to a parent/guardian.</p>

<p>To link your child to your account, either of the following options can be used:</p>

<ol>
	<li>Using the student OEN which can be found on report cards.
		<ul>
			<li>Parents will create a School-Day account and then add their child by filling in their unique student information; School Board, School Name, Student&rsquo;s Full Name, Student&rsquo;s Date of Birth, OEN, Current Grade.</li>
		</ul>
	</li>
	<li>Using a secure-match key code, which can be produced by the office staff at your child&rsquo;s school.
		<ul>
			<li>Parents will create a School-Day account and automatically add their child by entering the secure match key code, provided by the school.</li>
		</ul>
	</li>
</ol>
</div><!-- end content area -->

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
      echo '<div class="col-sm-4"">';
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
