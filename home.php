<?php get_header(); ?>

      <div class="container">
        <div class="row">
          <div class="col-sm-8">

            <h2>News & Announcements</h2>
            <?php
              // Start the Loop.
              while ( have_posts() ) : the_post();

                // Include the post format-specific content template.
                get_template_part( 'content', get_post_format() );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                  comments_template();
                }
              endwhile;
            ?>

            <?php
              // Previous/next post navigation.
              wrdsb_paging_nav();
            ?>

          </div>
          <div class="col-sm-4">
            <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')): ?>
              <?php get_sidebar('rmenu'); ?>
              <?php get_sidebar('right'); ?>
            <?php endif ?>
          </div>
        </div>
      </div>

<?php get_footer(); ?>
