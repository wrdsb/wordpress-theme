<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage WRDSB
 */
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (is_front_page()) { ?> 
    <title><?php bloginfo('name'); ?></title>
  <?php } else { ?>
    <title><?php wp_title(''); ?> (<?php bloginfo('name'); ?>)</title>
  <?php } ?>

  <!-- Bootstrap -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" media="all">
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/css/icon-styles.css" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri(); ?>/images/icon-60x60.png" rel="apple-touch-icon" />
  <link href="<?php echo get_template_directory_uri(); ?>/images/icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
  <link href="<?php echo get_template_directory_uri(); ?>/images/icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
  <link href="<?php echo get_template_directory_uri(); ?>/images/icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />

  <link href="<?php echo get_template_directory_uri(); ?>/css/addtohomescreen.css" rel="stylesheet">
  <script src="<?php echo get_template_directory_uri(); ?>/js/addtohomescreen.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script>
    // addToHomescreen.removeSession();     // use this to remove the localStorage variable
    var ath = addToHomescreen({
        appID: 'local/newwrdsb/',
        message: 'To add this website to Home Screen: tap %icon and then <strong>Add to Home Screen</strong>',
        //debug: 'ios',           // activate debug mode in ios emulation
        skipFirstVisit: true,  // show at first access
        //startDelay: 1,          // display the message right away
        //lifespan: 15,            // do not automatically kill the call out
        //displayPace: 0,         // do not obey the display pace
        maxDisplayCount: 0      // do not obey the max display count
    });
    // ath.clearSession();      // reset the user session
    </script>
  <?php wp_head(); ?>

  <?php wrdsb_secondary_school_colours(); ?>
</head>

<body>
  <div class="container container-top">
    <div class="header">
      <div class="row">
        
        <div class="col-md-9 col-sm-8">
          <div id="logo">
            <a href="<?php echo home_url(); ?>/"><span><?php echo get_bloginfo('name'); ?></span>
              <h2><?php echo get_bloginfo('name'); ?></h2>
              <h3><?php echo get_bloginfo('description'); ?></h3>
            </a>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-4">
          <div class="social-icons">
            <!--<a href="#"><span class="icon-facebook" title="Facebook"></span></a>-->
            <!--<a href="#"><span class="icon-twitter" title="Twitter"></span></a>-->
            <!--<a href="#"><span class="icon-youtube" title="Youtube"></span></a>-->
          </div>

          <div class="staff-shortcuts">
            <div class="staff-shortcut-list">
              <!--<a href="#">Contact</a>-->
            </div>
            <div class="searchbox">
              <form action="<?php echo home_url(); ?>/" method="get">
                <fieldset>
                  <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
                </fieldset>
              <!--<span class="icon-search"></span>-->
              </form>
            </div>

            <div class="accessability">
              <!--<a href="#" id="inc_font" title="Increase Font Size">A</a>-->
              <!--<a href="#" id="dec_font" title="Decrease Font Size">A</a>-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="navbar my-navbar" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle togglesearch" data-toggle="collapse" data-target=".navbar-search">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-search"></span>
          </button>

          <button type="button" class="navbar-toggle togglenav" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
              
          <a class="navbar-brand" href="#">Waterloo Region<br />District School Board</a>
        </div>
            
        <div class="collapse navbar-search">
          <p class="text-center"><input type="text" class="" /><span class="icon-search"></span></p>
        </div>

        <?php if (has_nav_menu('top')) {
          wp_nav_menu(array('theme_location' => 'top', 'menu_class' => 'nav nav-justified', 'container_class' => 'collapse navbar-collapse'));
        } else {
          wp_page_menu(array('depth' => 1, 'show_home' => true, 'menu_class' => 'collapse navbar-collapse' ));
        } ?>
    </div><!-- /.navbar -->
  </div>

  <?php if (is_front_page()) { ?>
    <?php if (wrdsb_has_featured_posts()): ?>
      <?php $featured_posts = wrdsb_get_featured_posts(); ?>
      <div class="container">
        <div class="jumbotron">
          <?php if (count($featured_posts) == 1) { ?>
            <?php $post = $featured_posts[0]; ?>
              <?php setup_postdata($post); ?>
              <?php get_template_part('content', get_post_format()); ?>
            <?php wp_reset_postdata(); ?>
          <?php } else { ?>
            <div id="carousel-jumbotron" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php for ($i = 0; $i < count($featured_posts); $i++) { ?>
                  <li data-target="#carousel-jumbotron" data-slide-to="<?php echo $i; ?>"></li>
                <?php } ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php for ($i = 0; $i < count($featured_posts); $i++) { ?>
                  <div class="item">
                    <img src="..." alt="...">
                    <div class="carousel-caption">
                      <h3>Caption!</h3>
                      <p>Text goes here. Coolio.</p>
                    </div>
                  </div>
                <?php } ?>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-jumbotron" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#carousel-jumbotron" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php elseif (get_header_image()): ?>
      <div class="container">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
      </div>
    <?php endif; ?>
  <?php } ?>

  <?php if (!is_front_page()) { ?>
    <?php the_breadcrumb(); ?>
  <?php } ?>

