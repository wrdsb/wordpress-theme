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
  <title>WRDSB</title>

  <!-- Bootstrap -->
  <link href="http://spectro.wrdsb.ca/css/bootstrap.css" rel="stylesheet">
  <link href="http://spectro.wrdsb.ca/css/bootstrap-theme.css" rel="stylesheet">
  <link href="http://spectro.wrdsb.ca/css/style.css" rel="stylesheet">
  <link href="http://spectro.wrdsb.ca/css/icon-styles.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>

<body>
  <div class="container container-top">
    <div class="header">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <div id="logo">
            <a href="/"><span><?php echo get_bloginfo('name'); ?></span>
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
            <div class="searchbox"><input type="text" placeholder="Search" />
              <span class="icon-search"></span>
            </div>

            <div class="accessability">
              <!--<span class="increase-font" title="Increase Font Size">A</span>-->
              <!--<span class="decrease-font" title="Decrease Font Size">A</span>-->
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

  <?php if (!is_front_page()) { ?>
    <div class="container container-breadcrumb">
      <ol class="breadcrumb">
        <li><a href="">Breadcrumbs</a></li>
        <li><a href="">Go</a></li>
        <li class="active">Here</li>
      </ol>
    </div>
  <?php } ?>

  <?php if (is_front_page()) { ?>
    <!-- Include the featured content template. -->
    <!-- // get_template_part( 'featured-content' ); -->
    <!--<div class="container">-->
      <!--<div class="jumbotron">-->
        <!--<h1>Jumbotron!</h1>-->
        <!--<p>-->
          <!--This massive space is reserved for a featured post. We'll get this finished up before release.-->
          <!--When finished, users can mark a post as 'featured' and it will be embiggened and put here automatically.-->
        <!--</p>-->
      <!--</div>-->
    <!--</div>-->
  <?php } ?>
