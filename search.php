<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-lg-12">

      <?php get_search_form(); ?>
      <h1><?php printf(__( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h1>

      <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
          <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
          <?php if ('post' == get_post_type()) { ?>
            <small class="gray-dark">Posted <?php echo get_the_date(); ?></small>
          <?php } ?>
          <?php the_excerpt(); ?>
        <?php endwhile; ?>
      <?php else: ?>
        <?php get_template_part( 'content', 'none' ); ?>
      <?php endif; ?>

    </div> <!-- end content area -->
  </div>
</div>

<?php get_footer(); ?>
