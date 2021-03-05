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
      <link href="https://s3.amazonaws.com/wrdsb-ui-assets/public/master.css" rel="stylesheet" media="all" />
      <?php if(max_mega_menu_is_enabled('top') ) :?>
      <style type="text/css">
      <?php if (wrdsb_i_am_a_corporate_site()):?>
        .my-navbar{
          margin-bottom:0px;
        }
      <?endif;?>
      #navbar-header{
        background-color: <?php echo getNavbarBackgroundColor() ?>;
        height:80px !important;
        background-position:4px 15px !important;
      }

      #navbar-header a.navbar-brand {
        margin-top:20px !important;
      }

      .togglesearch {
        top:17px;
        right: 50px;
      }
      @media (max-width:768px){
      .mobileMenu{
        float: right;
        z-index:10;
        display:inline-block;
      }
      }

      .navbar-search input[type="text"] {
        width:100%;
        }
      
        #mobileSearch{
        border-radius: 5px;
        }
      </style>
      <?php endif;?>
       <!-- icons -->
      <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $GLOBALS['wrdsbvars']['asset_version']; ?>/images/icon-60x60.png" rel="apple-touch-icon" />
      <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $GLOBALS['wrdsbvars']['asset_version']; ?>/images/icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
      <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $GLOBALS['wrdsbvars']['asset_version']; ?>/images/icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
      <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $GLOBALS['wrdsbvars']['asset_version']; ?>/images/icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script src="https://s3.amazonaws.com/wrdsb-theme/js/addtohomescreen.min.js"></script>
      <script src="https://s3.amazonaws.com/wrdsb-theme/js/jquery.floatThead.min.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
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
      <!-- Google Analytics Tracking Code -->
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
      <?php }
      if (wrdsb_i_am_a_school()) { ?>
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-16094689-23', 'auto');
      ga('require', 'linkid');
      ga('send', 'pageview');
      </script>
      <?php }
      if (wrdsb_i_am_a_corporate_site()) {
      ?>
      <!-- Facebook Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window,document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '2048554848748568');
      fbq('track', 'PageView');
      fbq('track', 'Lead');
      fbq('track', 'ViewContent');
      fbq('track', 'SubmitApplication');
      fbq('track', 'Search');
      </script>
      <noscript>
      <img height="1" width="1"
      src="https://www.facebook.com/tr?id=2048554848748568&ev=PageView
      &noscript=1"/>
      </noscript>
      <!-- End Facebook Pixel Code -->
      <? }
      if (wrdsb_i_am_a_corporate_site() != true)
                    // if I am not a corporate site, e.g., if I am a school site
                    { ?>
      <style type="text/css">
      #logo a {
        background:url("https://wrdsb-ui-assets.s3.amazonaws.com/intranet/2/2.2.0/images/wrdsb_primary+logo_rev.svg") no-repeat;
        background-size:75px 75px;
        text-decoration:none;
        color:#fff;
        margin-top: 15px;
      }
      </style>
      <?php } ?>
    </head>
    <body id="top">
      <?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
      <?php    if (wrdsb_i_am_a_corporate_site()) {
      ?>
      <!-- Facebook Code -->
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
      <? } ?>
 
      <!-- header -->
      <div id="masthead">
      <?php if (!wrdsb_i_am_a_corporate_site()): ?>
        <div class="container-top">
          <div class="header">
            <div class="container">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div id="logo" role="heading">
                    <a aria-labelledby="logo" href="<?php echo home_url(); ?>/"><span><?php echo get_bloginfo('name'); ?></span>
                    <?php if (wrdsb_i_am_a_corporate_site() != true)
                    // if I am not a corporate site, e.g., if I am a school site
                    { ?>
                    <p id="sitename"><?php echo get_bloginfo('name');?></p>
                    <?php if (get_bloginfo('description') != '') { ?>
                    <p id="sitedescription"><?php echo get_bloginfo('description'); ?></p>
                    <?php } else { ?>
                      <p id="sitedescription">Innovating tomorrow by educating today</p>
                    <?php }
                     }
                      ?>
                  </a>
                </div>
              </div>
              <div class="col-md-3 col-sm-4">
                <div class="staff-shortcuts" role="complementary" aria-labelledby="staff-shortcut-list">
                  <div class="searchbox" role="search" aria-labelledby="search">
                    <form action="<?php echo home_url(); ?>/" method="get">
                      <input aria-label="Search" type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
                    </form>
                  </div>
                  
                  <div id="staff-shortcut-list">
                    <a href="#address">Contact Information</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php endif; ?>

<!-- ---------------------------MMM DISABLED NAVBAR----------------------------------------------------------------- -->
      <?php if (!max_mega_menu_is_enabled('top') ) : ?>
        <div class="navbar my-navbar" role="navigation" aria-labelledby="navbar-header">
        
          <div id="navbar-header">
            <button type="button" class="navbar-toggle togglesearch" data-toggle="collapse" data-target=".navbar-search">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-search"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.0.0/images/search.gif" style="width: 25px; height: 25px;" /></span>
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

        
        <div class="collapse navbar-search" role="search" aria-labelledby="mobileSearch">
          <form action="<?php echo home_url(); ?>/" method="get">
            <input aria-label="Search" type="text" name="s" id="mobileSearch" value="<?php the_search_query(); ?>" placeholder="Search" />
          </form>
        </div>

        <div id="menu" role="navigation" aria_label="Menu">
          <?php if (has_nav_menu('top')) {
          wp_nav_menu(array('theme_location' => 'top', 'menu_class' => 'nav nav-justified', 'container_class' => 'collapse navbar-collapse'));
          } else {
          wp_page_menu(array('depth' => 1, 'show_home' => true, 'menu_class' => 'collapse navbar-collapse' ));
          } ?>
        </div>
        </div><!-- /.navbar -->

        <?php endif; ?>
        </div><!-- /#masthead -->
<!-- ---------------------------MMM ENABLED NAVBAR----------------------------------------------------------------- -->

        <?php if (max_mega_menu_is_enabled('top') ) : ?>
        <div class="navbar my-navbar" role="navigation" aria-labelledby="navbar-header">
        
          <div id="navbar-header">
            <button type="button" class="navbar-toggle togglesearch" data-toggle="collapse" data-target=".navbar-search">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-search"><img src="https://wrdsb-ui-assets.s3.amazonaws.com/public/2/2.0.0/images/search.gif" style="width: 25px; height: 25px;" /></span>
            </button>
            
            <div id="menu" role="navigation" class="mobileMenu" aria_label="Menu">
                <?php if (has_nav_menu('top')) {
                wp_nav_menu(array('theme_location' => 'top', 'menu_class' => 'nav nav-justified', 'container_class' => 'collapse navbar-collapse'));
                } else {
                wp_page_menu(array('depth' => 1, 'show_home' => true, 'menu_class' => 'collapse navbar-collapse' ));
                } ?>
            </div>
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
        
        
        <div class="collapse navbar-search" role="search" aria-labelledby="mobileSearch">
          <form action="<?php echo home_url(); ?>/" method="get">
            <input aria-label="Search" type="text" name="s" id="mobileSearch" value="<?php the_search_query(); ?>" placeholder="Search" />
          </form>
        </div>
        
        </div><!-- /.navbar -->
        <?php endif; ?>

<!-- ----------------------------------------MEGAMENU END-------------------------------------------------------------- -->


        <?php if (is_home() && is_front_page() && wrdsb_i_am_a_corporate_site()) {
          echo do_shortcode('[slick-slider design="prodesign-28" read_more_text="Learn more" link_target="blank" sliderheight="300" dots_design="design-6" autoplay_interval="5000" speed="900" fade="true" focus_pause="true" category="www"]');
        } ?>


        <?php if (is_front_page()) {

        // if we have an alert
        if (function_exists('stswr_alerts_get_current_alert') && stswr_alerts_get_current_alert('id') !== '0') {
        echo '<div class="container" role="alert" aria-labelledby="alerts"><div id="alerts">';
          echo '<h1>'.stswr_alerts_get_current_alert('title').'</h1>';
          echo stswr_alerts_get_current_alert('body-html');
        echo '</div></div>';
        }
        // if there is no alert, but a header image
        else if (get_header_image()) { ?>
        <div class="container" role="Img" aria_label="Header Image">
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
      
