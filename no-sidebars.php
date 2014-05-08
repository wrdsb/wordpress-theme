<?php
/*
Template Name: No Sidebars
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
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
    </div>
  </div>
</div>

<?php get_footer(); ?>
