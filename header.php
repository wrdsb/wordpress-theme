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

  <!-- All Styles -->
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/0/master.css" rel="stylesheet" media="all">

  <!-- Homepage Icon -->
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/images/icon-60x60.png" rel="apple-touch-icon" />
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/images/icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/images/icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/images/icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

  <script src="https://s3.amazonaws.com/wrdsb-ui-assets/js/addtohomescreen.min.js"></script>
  <script src="https://s3.amazonaws.com/wrdsb-ui-assets/js/jquery.floatThead.min.js"></script>

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
        maxDisplayCount: 1      // do not obey the max display count
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

  <?php if (wrdsb_i_am_a_corporate_site()) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-16094689-1', 'auto');
      ga('require', 'linkid');
      ga('send', 'pageview');
    </script>
    <script type="text/javascript">
    /*<![CDATA[*/
    (function() {
      var sz = document.createElement('script'); sz.type = 'text/javascript'; sz.async = true;
      sz.src = '//siteimproveanalytics.com/js/siteanalyze_80186.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sz, s);
    })();
    /*]]>*/
    </script>
  <?php } ?>
  <?php if (wrdsb_i_am_a_staff_site()) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-16094689-22', 'auto');
      ga('require', 'linkid');
      ga('send', 'pageview');
    </script>
  <?php } ?>
  <?php if (wrdsb_i_am_a_school()) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-16094689-23', 'auto');
      ga('require', 'linkid');
      ga('send', 'pageview');
    </script>
  <?php } ?>
</head>

<body id="top">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=609688172419098";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
          <div class="staff-shortcuts">
            <div class="staff-shortcut-list">
              <a href="#contact">Contact Information</a>
            </div>
            <div class="searchbox">
              <form action="<?php echo home_url(); ?>/" method="get">
                  <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
              </form>
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
                $newstrl = '';

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
      <!--</div>-->
    <!--</div>-->

    <?php
    // if we have an alert
    if (function_exists('stswr_alerts_get_current_alert') && stswr_alerts_get_current_alert('id') !== '0') {
        echo '<div class="container"><div class="alerts">';
        echo '<h1>'.stswr_alerts_get_current_alert('title').'</h1>';
        echo stswr_alerts_get_current_alert('body-html');
        echo '</div></div>';
    } 

    // if there is no alert, but a header image
    else if (get_header_image()) { ?>
      <div class="container">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
      </div>
    <?php   
    }
    // and if we have neither featured content nor a header image, do nothing at all
    else {
    }
  } ?>

  <?php if (!is_front_page()) { ?>
    <?php the_breadcrumb(); ?>
  <?php } ?>

