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

      <h1>404 - Not found</h1>
      <p>Sorry, we can't find that. Maybe you'd like to try a search.</p>
      <?php get_search_form(); ?>

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
