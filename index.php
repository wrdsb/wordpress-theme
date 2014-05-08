<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')): ?>
      <div class="col-sm-3 col-md-2 col-lg-2">
    <?php else: ?>
      <div class="col-sm-3 col-lg-2">
    <?php endif ?>

      <?php get_sidebar('lmenu'); ?>
      <?php get_sidebar('left'); ?>

    </div> <!-- end sidebar div -->

    <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')): ?>
      <div class="col-sm-6 col-md-7 col-lg-8">
    <?php else: ?>
      <div class="col-sm-9 col-lg-10">
    <?php endif ?>

    <img src="images/planning_banner.jpg" class="img-responsive" alt="planning banner">

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

    <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')): ?>
      <div class="col-sm-3 col-md-3 col-lg-2">
        <?php get_sidebar('rmenu'); ?>
        <?php get_sidebar('right'); ?>
      </div>
    <?php endif ?>


  </div>
</div>

<?php get_footer(); ?>
