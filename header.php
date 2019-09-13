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

  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/1/master.css" rel="stylesheet" media="all" />

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

  if (wrdsb_i_am_a_staff_site()) { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-16094689-22', 'auto');
    ga('require', 'linkid');
    ga('send', 'pageview');
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
  <? } ?>
</head>

<body id="top">

<?php    if (wrdsb_i_am_a_corporate_site()) {
  ?>
          <!-- Facebook Code -->

          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
<? } ?>


<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Nanum+Gothic|Open+Sans+Condensed:300&display=swap');

#masthead {
  background-color: #005fae;
}

#navbar { 
  background-color: #62bb46; 
}

#masthead .row {
  margin: 0;
}

.my-navbar {
  background-color:#62bb46;
  border-radius:0;
  border-top:0;
  border-left:0;
  border-right:0;
  border-bottom:0;
  margin-bottom:10px;
}
.my-sub-navbar {
  background-color:#fff;
  border-radius:0px;
  border-left:0px;
  border-right:0px;
  border-bottom:0px;
  margin-bottom:0px;
/*  min-height:1px; */
}
.my-sub-navbar .navbar-brand {
  float:none;
}
.nav-justified > li > a {
  line-height:28px;
  color:#fff;
  font-weight:bold;
  font-size:16px;
}
.nav >li > a:hover, .nav >li > a:focus {
  background-color:#5cd635;
}
.nav >li.active,
.nav >li.current-page-ancestor,
.nav >li.current_page_ancestor,
.nav >li.current-menu-item,
.nav >li.current_page_item {
  background-color:#5cd635;
}

.nav_current_page_children_container {
  background-color:#e6eff6;
  padding-bottom: 5px;
}

*** LOGO ***/

#logo {
  margin-top:14px;
}
#logo a {
  display:inline-block;
  width:100%;
  height:110px;
  background:url("https://wrdsb-ui-assets.s3.amazonaws.com/1/1.1.0/images/WRDSB+Secondary+Logo.svg") no-repeat;
  background-size:400px 110px;
  /*margin-left:120px;*/
  text-decoration:none;
  color:#000;
}
/*a.logo {
  background:url("https://s3.amazonaws.com/wrdsb-ui-assets/1/1.0.2/images/WRDSB_Logo.svg") no-repeat;
  background-size:50px 50px;
  padding-left:60px;
}*/

#logo a:hover, #logo a:active, #logo a:focus {
  text-decoration:none;
}

#logo a span {
  display:none;
}

#logo a #sitename {
  font-weight:bold;
  margin:0;
  top:48px;
  position:absolute;
}
#logo a #sitedescription {
  margin:0;
  top:86px;
  position:absolute;
  letter-spacing:2px;
}

  #sitename {
    font-size: 30px;
    font-weight:bold;
  }

  #sitedescription {
    font-size: 22px;
    letter-spacing: 0;
  }

#logo a #sitename, #logo a #sitedescription {
    color:#005daa;
  }

  #logo a #sitename {
    margin:0;
    top:40px;
    position:absolute;
  }

  #logo a #sitedescription {
    margin:0;
    top:75px;
    position:absolute;
  }

  @media (min-width: 992px) and (max-width: 1199px) {
    #logo a #sitename {
      font-size:26px;
      top:44px;
    }
    #logo a #sitedescription {
      font-size:20px;
      top:78px;
    }
  }

  @media (min-width: 768px) and (max-width: 991px) {
    #logo a #sitename {
      font-size:22px;
      top:28px;
    }
    #logo a #sitedescription {
      display:none;
    }
  }

#staff-shortcut-list a {
  color: #fff;
  background-image: url(https://wrdsb-ui-assets.s3.amazonaws.com/1/1.1.0/images/Pointer.svg);
  background-repeat: no-repeat;
  padding-left: 20px;
  margin-left: -1px;
  font-size: 16px;
}

h1 {
  font-family: 'Open Sans Condensed', sans-serif !important;
  font-weight: bold;
  font-size: 40px;
  color: #62bb46;
}

h2 {
  font-family: 'Nanum Gothic', sans-serif;
  font-size: 22px;
  color: #005fae;
}

p, li, td {
  font-size: 16px;
  line-height: 150%;
}

p.fineprint, p.categories, p.tags, p.postdate {
  font-size: 13px;
}

.staff-shortcuts {
  margin-top:40px;
  position: inherit;
}

.staff-shortcuts a {
  margin:0 8px;
}
.searchbox {
  /*float:left;*/
  /*width:100%;*/
  margin-top:8px;
  float: none;
}
.searchbox input {
  /*width:170px;
  float:left;*/
  width: 266px;
  color:#666;
  padding: 2px 4px;
  margin:0 0 15px 0;
  float: none;
}
.staff-shortcuts .icon-search {
  /*display:inline-block;
  position:relative; */
  left:-22px;
  top:6px;
}

</style>

<!-- header -->
<div id="masthead">
  <div class="container-top">
    <div class="header">
          <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-6">
            <div id="logo" role="heading">
              <a aria-labelledby="logo" href="<?php echo home_url(); ?>/"><span><?php echo get_bloginfo('name'); ?></span>
                <?php if (wrdsb_i_am_a_corporate_site() != true) { ?>
                <p id="sitename"><?php /*echo get_bloginfo('name'); */?></p>
                <?php if (get_bloginfo('description') != '') { ?>
                <p id="sitedescription"><?php echo get_bloginfo('description'); ?></p>
                <?php } }?>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
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

    <div class="navbar my-navbar" role="navigation" aria-labelledby="navbar-header">
        <div id="navbar-header">
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
            
        <div class="collapse navbar-search" role="search" aria-labelledby="mobileSearch">
              <form action="<?php echo home_url(); ?>/" method="get">
                <input aria-label="Search" type="text" name="s" id="mobileSearch" value="<?php the_search_query(); ?>" placeholder="Search" />
              </form>
        </div>

        <div id="menu" class="container" role="navigation" aria_label="Menu">

        <?php if (has_nav_menu('top')) {
          wp_nav_menu(array('theme_location' => 'top', 'menu_class' => 'nav nav-justified', 'container_class' => 'collapse navbar-collapse'));
        } else {
          wp_page_menu(array('depth' => 1, 'show_home' => true, 'menu_class' => 'collapse navbar-collapse' ));
        } ?>
        </div>
    </div><!-- /.navbar -->
  </div><!-- /.container-top -->

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