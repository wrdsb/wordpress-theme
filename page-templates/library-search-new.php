<?php
/*
Template Name: New Library Search
*/
?>
<?php $has_left = FALSE; ?>
<?php $has_right = FALSE; ?>
<?php if (is_active_sidebar('sidebar-left')) {$has_left = TRUE;} ?>
<?php if (is_active_sidebar('sidebar-right')) {$has_right = TRUE;} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
  $('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
  </script>

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

  <link href="<?php echo get_template_directory_uri(); ?>/css/ils.css" rel="stylesheet">

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

    ////Last modified by futao 2014-7-18 ver:6.4.0 add type
    function btnSearchClicked(type) {
       var url = "https://www.insigniasoftware.com/Library/discovery/";
       var streVideoLibraryID = "0004";

       if (type == 1) {
          var strKeyword = $('#txtKeyword').val();
          var strLibraryID = $('#ddlLibrary :selected').val();
          
          if ($('#optKids').prop('checked',true)) {
             url += 'kids.aspx';
             url += '?keyword=' + encodeURIComponent(strKeyword);
             url += '&libraryID=' + encodeURIComponent(strLibraryID);
          } else if ($('#optSimple').prop('checked',true)) {
             url += 'DoSearch.ashx';
             url += '?l=' + encodeURIComponent(strLibraryID);
             url += '&k=' + encodeURIComponent(strKeyword);
          }
       } else if (type == 2) {
          strLibraryID = encodeURIComponent(streVideoLibraryID);
          var strKeyword = $('#txtKeywordVideo').val();
          url += 'DoSearch.ashx';
          url += '?l=' + encodeURIComponent(strLibraryID);
          url += '&k=' + encodeURIComponent(strKeyword);
       } else if (type == 3) {
          strLibraryID = "All";
          var strKeyword = $('#txtKeywordVirtual').val();
          url += 'DoSearch.ashx';
          url += '?l=' + encodeURIComponent(strLibraryID);
          url += '&k=' + encodeURIComponent(strKeyword);
          url += '&ifs=1';
       }else if(type == 5){ //huanglidan add at 2014-08-04,Ver 6.4.0
          var strKeyword= $('txtKeywordInStaff').val();
          url += 'DoSearch.ashx';
          url += '?l=' + encodeURIComponent(strRMLibraryID);
          url += '&k=' + encodeURIComponent(strKeyword);
       }         
       window.open(url);
    } 

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

  <div class="container">
    <div class="row">
      <?php
        # Both sidebars
        if (($has_left == TRUE) and ($has_right == TRUE)):
          echo '<div class="col-sm-3 col-md-2 col-lg-2">';
          get_sidebar('left');
          echo '</div>';

        # Just left sidebar
        elseif (($has_left == TRUE) and ($has_right == FALSE)):
          echo '<div class="col-sm-3 col-lg-2">';
          get_sidebar('left');
          echo '</div>';

        # Just right sidebar
          # Nothing to do

        # No sidebars
          # Nothing to do
        endif;
      ?>

      <?php
        # content area
        # Both sidebars
        if (($has_left == TRUE) and ($has_right == TRUE)):
          echo '<div class="col-sm-6 col-md-8 col-lg-8">';

        # Just left sidebar
        elseif (($has_left == TRUE) and ($has_right == FALSE)):
          echo '<div class="col-sm-9 col-lg-10">';

        # Just right sidebar
        elseif (($has_left == FALSE) and ($has_right == TRUE)):
          echo '<div class="col-sm-8">';

        # No sidebars
        elseif (($has_left == FALSE) and ($has_right == FALSE)):
          echo '<div class="col-sm-12 col-lg-12">';

        endif;
      ?>

      <?php // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) {
          if (($has_left == TRUE) and ($has_right == TRUE)):
            the_post_thumbnail('wrdsb-two-sidebars');
          elseif (($has_left == TRUE) and ($has_right == FALSE)):
            the_post_thumbnail('wrdsb-one-sidebar');
          elseif (($has_left == FALSE) and ($has_right == TRUE)):
            the_post_thumbnail('wrdsb-one-sidebar');
          elseif (($has_left == FALSE) and ($has_right == FALSE)):
            the_post_thumbnail('wrdsb-full-width');
          endif;
        }
      ?>

      <a class=".ilsLoginButton"><img src="<?php echo get_template_directory_uri(); ?>/images/ils-login.png" /></a>
      <form name="form1" method="post" action="embedded.aspx" id="form1">
        <div>
          <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE1OTUyODUzNjdkZANnJN3XWgQX3KmHTMsltWjBkIU8" />
        </div>

        <!--Rizwan Code Start-->
        <!-- Nav tabs -->
          <ul id="library_services" class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#library" role="tab" data-toggle="tab">Library</a></li>
            <li><a href="#evideoLibrary" role="tab" data-toggle="tab">eVideo Library</a></li>
            <li><a href="#virtualLibrary" role="tab" data-toggle="tab">Virtual Lilbrary</a></li>
            <li><a href="#onlineResources" role="tab" data-toggle="tab">Online Resources</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="library">
              <p>
                <input type="text" id="txtKeyword" style="width:80%; padding:4px 8px;"
                placeholder="Search the Library">
                <input type="button" class="libBtnSearch" 
                onclick="btnSearchClicked(1); return false;">
                <br />
                <select id="ddlLibrary">
                  <option value="All">All Libraries</option>
                  <option value="0004">eVideo Library</option>
                  <option value="0002">Gondor Library</option>
                  <option value="0005">Resource Manager</option>
                  <option value="0001">Rivendell Library</option>
                </select>

                <input type="radio" name="optSearchPage" id="optKids">
                 <label>Kids</label>
                 <input type="radio" name="optSearchPage" id="optSimple" checked="checked">
                 <label>Simple</label>

              </p>
            </div>
            
            <div class="tab-pane" id="evideoLibrary">
              <p>
                <input type="text" id="txtKeywordVideo" style="width:80%; padding:4px 8px;"
                placeholder="Search the eVideo Library for online video conent">
                <input type="button" class="libBtnSearch" 
                onclick="btnSearchClicked(2); return false;">
              </p>
            </div>
            <div class="tab-pane" id="virtualLibrary">
              
              <p>
                <input type="text" id="txtKeywordVirtual" style="width:80%; padding:4px 8px;"
                placeholder="Search the Virtual Library for digital content">
                <input type="button" class="libBtnSearch" 
                onclick="btnSearchClicked(3); return false;">
              </p>

              <h4>OR...</h4>

              <p>Click on a link below to search that database:</p>

              <a href="http://www.nfb.ca/" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/one-nfb-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="http://curio.ca/en/" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/curio-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="http://school.eb.co.uk/" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/britannica-school-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="https://search.ebscohost.com/" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ebsco-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="http://auth.go.galegroup.com/auth/capmAuthentication.do?&origURL=http%3A%2F%2Fgo.galegroup.com%2Fps%2Fstart.do%3FprodId%3DGVRL%26authCount%3D1&productShortName=GVRL&isStartUrlRequest=true" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/gvrl-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="http://www.learn360.com/index.aspx" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/learn360-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
            </div>

            <div class="tab-pane" id="onlineResources">
              <p>Click on a link below to search that database:</p>

              <a href="http://www.biographi.ca/en/index.php" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/biographi-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="http://www.biographi.ca/en/index.php" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/discovery-kids-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
              <a href="http://www.biographi.ca/en/index.php" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/national-geographic-logo.png" 
                style="width:164px; height:70px; display:inline-block;" />
              </a>
            </div>
          </div>

        <!--Rizwan Code End-->

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

</div> <!-- end content area -->

<?php
# Both sidebars
# right column
if (($has_left == TRUE) and ($has_right == TRUE)):
echo '<div class="col-sm-3 col-md-2 col-lg-2">';
get_sidebar('right');
echo '</div>';

# Just left sidebar
# Nothing to do

# Just right sidebar
elseif (($has_left == FALSE) and ($has_right == TRUE)):
echo '<div class="col-sm-4"">';
get_sidebar('right');
echo '</div>';

# No sidebars
# Nothing to do

endif;
?>

        </div>
      </div>

      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <!-- automate address -->

              <?php 
                if (function_exists('wrdsb_school_info_display_new')) {
                  wrdsb_school_info_display_new();
                }
                else {
                  ?>
                  <h4>Waterloo Region District School Board</h4>
              <address>51 Ardelt Avenue<br />
                Kitchener, ON N2C 2R5<br />
              </address>
              <address>
                Phone: 519-570-0003<br />
                Email: <a href="mailto:info@wrdsb.on.ca">info@wrdsb.on.ca</a>
              </address>
              <?php  
                }
              ?>
              

              <div class="social-icons">
                <!--<a href="#"><span class="icon-facebook" title="Facebook"></span></a>-->
                <!--<a href="#"><span class="icon-twitter" title="Twitter"></span></a>-->
                <!--<a href="#"><span class="icon-youtube" title="YouTube"></span></a>-->
              </div>
             
            </div>
            <div class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
                <?php dynamic_sidebar( 'footer-left' ); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-3">
              <?php if ( is_active_sidebar( 'footer-centre' ) ) : ?>
                <?php dynamic_sidebar( 'footer-centre' ); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-3">
              <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
                <?php dynamic_sidebar( 'footer-right' ); ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <h6 class="copyright">A WRDSB-ITS Solution</h6>
            </div>
            <div class="col-sm-4">
              <h6 class="copyright">
                <?php wp_loginout(); ?>
                &nbsp;&nbsp; | &nbsp;&nbsp;
                <a href="http://staff.wrdsb.ca">WRDSB Staff Website</a>
                <?php 
                  $parsed_url = parse_url(network_site_url());
                  $host = explode('.', $parsed_url['host']);
                  if ($host[0] == 'schools') { ?>
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <a href="http://staff.wrdsb.ca/<?php $fulldomain = explode('.',$_SERVER['HTTP_HOST']); echo $fulldomain[0]; ?>">Staff Handbook</a>
                  <?php } ?>
              </h6>
            </div>
            <div class="col-sm-4">
              <h6 class="copyright text-right">&copy; Waterloo Region District School Board, 2014</h6>
            </div>
          </div>
        </div>
      </div>

    <?php wp_footer(); ?>
    </body>
    </html>

