<?php get_header(); ?>

      <div class="container">
        <div class="row">
          <div class="col-sm-8">

            <h2><strong>News & Accouncements</strong></h2>
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
            <!--
            <h2><strong>Events</strong></h2>

            <div class="event">
              <div class="when">
                <div class="month">FEB</div>
                <div class="date">26</div>
                <div class="day">Wed</div>
              </div>
              <div class="what">
                <span>6:00 pm</span> Westmount PS Community Meeting
              </div>
              <div class="clear"></div>
            </div>

            <div class="event">
              <div class="when">
                <div class="month">MAR</div>
                <div class="date">7</div>
                <div class="day">Fri</div>
              </div>
              <div class="what">
                <span class="all-day"></span> PD Day
              </div>
              <div class="clear"></div>
            </div>

            <div class="event">
              <div class="when">
                <div class="month">MAR</div>
                <div class="date">10</div>
                <div class="day">Mon</div>
              </div>
              <div class="what">
                <span class="all-day"></span> March Break
              </div>
              <div class="clear"></div>
            </div>

            <p class="text-right"><button type="button" class="btn btn-xs mybutton">View Calendar <span class="glyphicon glyphicon-arrow-right"></span></button></p>
            -->
          </div>
        </div>
      </div>

<?php get_footer(); ?>
