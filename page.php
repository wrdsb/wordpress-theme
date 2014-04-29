<?php get_header(); ?>

      <div class="container container-breadcrumb">
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li class="active">Planning</li>
        </ol>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-lg-2">
            <div class="navbar my-sub-navbar" role="navigation">
              <div class="sub-navbar-header">
                <button type="button" class="navbar-toggle toggle-subnav" data-toggle="collapse" data-target=".sub-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              
              <span class="navbar-brand">Subnav</span>
              </div>
              <div class="collapse navbar-collapse sub-navbar-collapse">
                <div class="sub-menu-heading">
                  <span>Planning</span>
                </div>
                <div class="sub-menu-items">
                  <ul>
                    <li><a href="#">Accommodation Reviews and Boundary Studies</a></li>
                    <li><a href="#">About Planning</a></li>
                    <li><a href="#">School Boundary and Location Maps</a></li>
                    <li><a href="#">Status of Approved Projects</a></li>
                    <li><a href="#">Accommodation Reviews</a></li>
                    <li><a href="#">Policies and Procedures</a></li>
                    <li><a href="#">Boundary Studies</a></li>
                    <li><a href="#">Active and Safe Routes to Schools</a></li>
                    <li><a href="#">Education Development Charges</a></li>
                    <li><a href="#">Disposition of Surplus School Sites/Land</a></li>
                    <li><a href="#">Facility Partnerships</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-9 col-lg-10">
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
