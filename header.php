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

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="http://spectro.wrdsb.ca/js/bootstrap.min.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/addtohomescreen.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.floatThead.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script>
    // addToHomescreen.removeSession();     // use this to remove the localStorage variable
    var ath = addToHomescreen({
        appID: 'ca.wrdsb',
        message: 'To add this website to Home Screen: tap %icon and then <strong>Add to Home Screen</strong>',
        //debug: 'ios',           // activate debug mode in ios emulation
        skipFirstVisit: true,  // show at first access
        //startDelay: 1,          // display the message right away
        //lifespan: 15,            // do not automatically kill the call out
        //displayPace: 0,         // do not obey the display pace
        maxDisplayCount: 0      // do not obey the max display count
    });
    // ath.clearSession();      // reset the user session

    $(document).ready(function(){
      $('table.table-fixed-head').floatThead({
        useAbsolutePositioning: false
      });
    });

    $("table").addClass("table table-striped table-bordered");
    $("table").wrap("<div class='table-responsive'></div>");
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
              <?php $strl = get_bloginfo('name');
                $tempstrl = explode(" ", $strl);
                $newstrl;

                foreach($tempstrl as $a) {
                  if ($a=='District' or $a=='Public' or $a=='Collegiate' or $a=='Secondary' or $a=='High') {
                    $newstrl.= "<br />";
                  }
                  $newstrl.=" ".$a;
                }
              ?>
          <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php echo $newstrl; ?></a>
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

  <?php if (is_front_page()) { 
    // if we have featured content, include the featured content template
    // get_template_part( 'featured-content' ); ?>
    <!--<div class="container">-->
      <!--<div class="jumbotron">-->
        <!--<h1>Jumbotron!</h1>-->
        <!--<p>-->
          <!--This massive space is reserved for a featured post. We'll get this finished up before release.-->
          <!--When finished, users can mark a post as 'featured' and it will be embiggened and put here automatically.-->
        <!--</p>-->
      <!--</div>-->
    <!--</div>-->

    <!-- elseif we have a header image, include that -->
    <?php if (get_header_image()) { ?>
      <div class="container">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
      </div>
    <?php } ?>

    <!-- and if we have neither featured content nor a header image, do nothing at all -->
  <?php } ?>

  <?php if (!is_front_page()) { ?>
    <?php the_breadcrumb(); ?>
  <?php } ?>

