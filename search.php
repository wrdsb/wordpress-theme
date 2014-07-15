<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php if (is_active_sidebar('sidebar-right')): ?>
      <div class="col-sm-3 col-md-2 col-lg-2">
    <?php else: ?>
      <div class="col-sm-3 col-lg-2">
    <?php endif ?>

      <?php get_sidebar('left'); ?>

    </div> <!-- end sidebar div -->

    <?php if (is_active_sidebar('sidebar-right')): ?>
      <div class="col-sm-6 col-md-7 col-lg-8">
    <?php else: ?>
      <div class="col-sm-9 col-lg-10">
    <?php endif ?>

    <?php get_search_form(); ?>
    <h2><?php printf(__( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>

    <?php
      // Start the Loop.
      while ( have_posts() ) : the_post();

        // Include the page content template.
        get_template_part( 'content', 'page' );

      endwhile;
    ?>

    </div> <!-- end content area -->

    <?php if (is_active_sidebar('sidebar-right')): ?>
      <div class="col-sm-3 col-md-3 col-lg-2">
        <?php get_sidebar('right'); ?>
      </div>
    <?php endif ?>


  </div>
</div>

<?php get_footer(); ?>
