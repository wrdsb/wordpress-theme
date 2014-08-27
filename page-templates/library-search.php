<?php
/*
Template Name: Library Search
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
       //var url = "https://www.insigniasoftware.com/Library/discovery/";
       var url = "https://cat.library.wrdsb.ca/library/discovery/";
       var streVideoLibraryID = "";

       if (type == 1) {
        var strKeyword = $('#txtKeyword').val();
        var strLibraryID = $('#ddlLibrary :selected').val();

        if ($('#optKids').prop('checked') == true) {
         url += 'kids.aspx';
         url += '?keyword=' + encodeURIComponent(strKeyword);
         url += '&libraryID=' + encodeURIComponent(strLibraryID);
       } else {
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
          <li><a href="#staffResources" role="tab" data-toggle="tab">Staff Resources</a></li>
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
                <option value="0006">A. R. Kaufman </option>
                <option value="0896">Abraham Erb </option>
                <option value="0018">Alison Park P.S.</option>
                <option value="0020">Alpine </option>
                <option value="0030">Avenue Road </option>
                <option value="0036">Ayr </option>
                <option value="0925">Baden </option>
                <option value="0048">Blair Road </option>
                <option value="0066">BLUEVALE C.I.</option>
                <option value="0078">Breslau </option>
                <option value="0084">Bridgeport </option>
                <option value="0088">Brigadoon </option>
                <option value="0108">CAMERON HEIGHTS C.I.</option>
                <option value="0037">Cedar Creek </option>
                <option value="0126">Cedarbrae </option>
                <option value="0132">Centennial Cambridge</option>
                <option value="0138">Centennial Waterloo</option>
                <option value="0144">Central  </option>
                <option value="0162">Chalmers Street  </option>
                <option value="0164">Clemens Mill  </option>
                <option value="0174">Conestogo  </option>
                <option value="0180">Coronation </option>
                <option value="0190">Country Hills </option>
                <option value="0192">Courtland Avenue </option>
                <option value="0198">Crestview </option>
                <option value="0216">Dickson P.S.</option>
                <option value="0234">Doon </option>
                <option value="0611">Driftwood Park  </option>
                <option value="0240">EASTWOOD C.I.</option>
                <option value="0161">Edna Staebler </option>
                <option value="0585">Elgin Street </option>
                <option value="0246">Elizabeth Ziegler </option>
                <option value="0252">ELMIRA D.S.S.</option>
                <option value="0258">Empire </option>
                <option value="0282">Floradale </option>
                <option value="0284">Forest Glen </option>
                <option value="0288">FOREST HEIGHTS C.I.</option>
                <option value="0294">Forest Hill </option>
                <option value="0300">Franklin </option>
                <option value="0312">GALT C.I.</option>
                <option value="0320">Glencairn </option>
                <option value="0324">GLENVIEW PARK S.S.</option>
                <!--<option value="0330">GRAND RIVER</option>-->
                <option value="0342">Grand View Cambridge</option>
                <option value="0336">Grandview New Hamburg</option>
                <option value="0382">Hespeler </option>
                <option value="0384">Highland </option>
                <option value="0390">Hillcrest </option>
                <option value="0396">Howard Robertson </option>
                <option value="0425">HURON HEIGHTS S.S.</option>
                <option value="0114">J. F. Carmichael </option>
                <option value="0857">J. W. Gerth </option>
                <option value="0407">JACOB HESPELER S.S.</option>
                <option value="0943">Jean Steckle </option>
                <option value="0409">John Darling P.S.</option>
                <option value="0408">John Mahood </option>
                <option value="0415">Keatsway </option>
                <option value="0420">King Edward </option>
                <option value="0426">KITCHENER-WATERLOO C.V.S.</option>
                <option value="0331">Lackner Woods </option>
                <option value="0044">Laurelwood </option>
                <option value="0438">Laurentian </option>
                <option value="0451">Lester B. Pearson </option>
                <option value="0450">Lexington </option>
                <!--<option value="0000">Library Services</option>-->
                <option value="0468">Lincoln Avenue P.S.</option>
                <option value="0474">Lincoln Heights </option>
                <option value="0480">Linwood </option>
                <option value="0498">MacGregor </option>
                <option value="0504">Mackenzie King </option>
                <option value="0510">Manchester </option>
                <option value="0522">Margaret Avenue </option>
                <option value="0530">Mary Johnston </option>
                <option value="0552">Meadowlane </option>
                <option value="0583">Millen Woods </option>
                <option value="0557">Moffat Creek </option>
                <option value="0560">N.A. MacEachern </option>
                <option value="0570">New Dundee </option>
                <option value="0429">Northlake Woods </option>
                <option value="0001">Online</option>
                <option value="0612">Park Manor </option>
                <option value="0614">Parkway </option>
                <option value="0632">Pioneer Park </option>
                <option value="0634">Preston </option>
                <option value="0636">PRESTON H.S.</option>
                <option value="0648">Prueter</option>
                <option value="0666">Queen Elizabeth </option>
                <option value="0672">Queensmount </option>
                <option value="0696">Riverside </option>
                <option value="0708">Rockway </option>
                <option value="0726">Ryerson </option>
                <option value="0388">Saginaw </option>
                <option value="0041">Sandhills </option>
                <option value="0734">Sandowne </option>
                <option value="0744">Sheppard </option>
                <option value="0745">Silverheights </option>
                <option value="0919">Sir Adam Beck </option>
                <option value="0897">SIR JOHN A. MACDONALD S.S.</option>
                <option value="0750">Smithson </option>
                <option value="0762">Southridge </option>
                <option value="0768">SOUTHWOOD S.S.</option>
                <option value="0792">St. Andrew's </option>
                <option value="0798">St. Jacobs </option>
                <!--<option value="0003">Staff Resource Centre</option>-->
                <option value="0804">Stanley Park </option>
                <option value="0810">Stewart Avenue </option>
                <option value="0822">Suddaby </option>
                <option value="0828">Sunnyside </option>
                <option value="0846">Tait Street </option>
                <option value="0858">Three Bridges P.S.</option>
                <option value="0864">Trillium </option>
                <option value="0439">W. T. Townshend </option>
                <option value="0888">WATERLOO C.I.</option>
                <option value="0894">WATERLOO OXFORD D.S.S.</option>
                <option value="0900">Wellesley </option>
                <option value="0902">Westheights </option>
                <option value="0906">Westmount P.S.</option>
                <option value="0907">Westvale </option>
                <option value="0918">William G. Davis </option>
                <option value="0766">Williamsburg </option>
                <option value="0930">Wilson Avenue </option>
                <option value="0936">Winston Churchill </option>
                <option value="0381">Woodland Park </option>
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

            <ul class="library-icons">
              <li>
                <a href="http://www.learn360.com/index.aspx?site=canada" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/L360 Canada High ResEDIT.jpg" 
                  style="width:164px; display:inline-block" alt="Learn360 logo">
                  <span>LEARN360</span>
                </a>
              </li>
              <li>
                <a href="http://curio.ca/en/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/curio-logo.png" 
                  style="width:164px; display:inline-block" alt="CBC Curio Logo">
                  <span>CURIO.CA</span>
                </a>
              </li>
              <li>
                <a href="https://www.nfb.ca/education/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/one-nfb-logo.png" 
                  style="width:164px; display:inline-block" alt="NFB Campus Logo">
                  <span>ONF NFB</span>
                </a>

              </li>
            </ul>

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

            <h3>Elementary</h3>

            <ul class="library-icons">
              <li>
                <a href="http://web.a.ebscohost.com/srck5/search?sid=9ee4a966-bbd2-4f5b-96b3-6637fce93f58%40sessionmgr4002&vid=0&hid=4204" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/srck5_logo.gif" alt="Ebsco Kids Search Logo" />
                  <span>Ebsco Kids Search</span>
                </a>
              </li>
              <li>
                <a href="http://web.b.ebscohost.com/sas/search?sid=708d65fe-4aea-43fd-aa22-9fd0e1607111%40sessionmgr115&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/sas_logo.gif" alt="Searchasaurus Logo" />
                  <span>Searchasaurus</span>
                </a>
              </li>
              <li>
                <a href="http://web.b.ebscohost.com/novpk8/search/novbasic?sid=d1baa937-848e-4fae-9328-cbbe58f6c68e%40sessionmgr113&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/novpk8_logo.gif" alt="K-8 NoveList Plus Logo" />
                  <span>K-8 NoveList Plus</span>
                </a>
              </li>
              
              <li>
                <a href="http://asp.tumblebooks.com/library/asp/home_tumblebooks.asp" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/tumbleBookLibrary.gif" alt="Tumblebook Library Logo" />
                  <span>Tumblebook Library</span>
                </a>
              </li>
              <li>
                <a href="http://auth.grolier.com/cgi-bin/go_up_login?formu=wateregio&formp=wate0979&link=bkflix.grolier.com" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/bkflix.gif" alt="" />
                  <span>BookFlix</span>
                </a>
              </li>
            </ul>

            <h3>General</h3>

            <ul class="library-icons">
              <li>
                <a href="http://web.b.ebscohost.com/ehost/search/selectdb?sid=147167f4-ff0e-439a-a92e-7ab14df2478f%40sessionmgr115&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/ehost200.gif" alt="EbscoHost Logo" />
                  <span>EbscoHost</span>
                </a>
              </li>

              <li>
                <a href="http://www.cengage.com/search/showresults.do?N=197+4294904997" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/GVRL5_lg.gif" alt="Gale Virtual Reference Library Logo" />
                  <span>Gale Virtual Reference Library</span>
                </a>
              </li>

              <li>
                <a href="http://web.b.ebscohost.com/novp/search/novbasic?sid=08995f5c-f3c4-47c7-8282-afdd124e7429%40sessionmgr111&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/novp_logo.gif" alt="NoveList Plus Logo" />
                  <span>NoveList Plus</span>
                </a>
              </li>

              <li>
                <a href="http://wrdsb.naxosmusiclibrary.com/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/naxos.gif" alt="Naxos Music Logo" />
                  <span>Naxos Music</span>
                </a>
              </li>

              <li>
                <a href="http://web.b.ebscohost.com/pov/search/basic?sid=d028bac3-84d6-4d4b-b790-073e09c86c4e%40sessionmgr113&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/povcan_logo.gif" alt="Canadian Points of View Logo" />
                  <span>Canadian Points of View</span>
                </a>
              </li>

              <li>
                <a href="http://web.b.ebscohost.com/lrc/search/basic?sid=8932afef-692c-44d5-820f-e9fb403f42dd%40sessionmgr110&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/lrcplus_logo.gif" alt="Literary Reference Centre Plus Logo" />
                  <span>Literary Reference Centre Plus</span>
                </a>
              </li>

              <li>
                <a href="http://web.b.ebscohost.com/scirc/search/basic?sid=873cc5c4-7ecf-44b4-977c-7d3b177f3e29%40sessionmgr113&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/scirc_logo.gif" alt="Science Reference Centre Logo" />
                  <span>Science Reference Centre</span>
                </a>
              </li>

              <li>
                <a href="http://web.b.ebscohost.com/hrc/search/basic?sid=a75fa83f-7745-4825-95e3-37ea659ad7ed%40sessionmgr110&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/hrc_logo.gif" alt="History Reference Centre Logo" />
                  <span>History Reference Centre</span>
                </a>
              </li>

              <li>
                <a href="http://web.a.ebscohost.com/ehost/search/advanced?sid=5cc68023-71ee-43ab-b403-04360067da4a%40sessionmgr4001&vid=0&hid=4204" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/crc200.gif" alt="Canadian Reference Centre Logo" />
                  <span>Canadian Reference Centre</span>
                </a>
              </li>

              <li>
                <a href="http://web.b.ebscohost.com/src/search?sid=b303ca5d-b056-457e-9ac1-9c8eba7b9157%40sessionmgr115&vid=0&hid=114" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/srccan_logo.gif" alt="Canadian Student Research Centre Logo" />
                  <span>Canadian Student Research Centre</span>
                </a>
              </li>
            </ul>
          </div>

          <div class="tab-pane" id="onlineResources">
            <p>Click on a link below to search that database:</p>

            <h3>Elementary</h3>

            <ul class="library-icons">
              <li>
                <a href="http://www.pebblego.com/login/index.html?sqs=8d3a7ac1a7cbb242656a84fa543e4decf68524a6b7fd0c9ef79285c044ebaec0" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/pebblego-logo-header.png" alt="PebbleGo Logo" />
                  <span>PebbleGo</span>
                </a>
              </li>

              <li>
                <a href="http://school.eb.com/levels/elementary" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/SchoolElem_btn.jpg" alt="Britannica School Elementary Logo" />
                  <span>Britannica School Elementary</span>
                </a>
              </li>

              <li>
                <a href="http://school.eb.com/levels/middle" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/SchoolMiddle_btn.jpg" alt="Britannica School Middle Logo" />
                  <span>Britannica School Middle</span>
                </a>
              </li>

              <li>
                <a href="http://galenet.galegroup.com/servlet/KidsInfoBits;jsessionid=4418D16591EB359242016565EBB34227?locID=ko_k12elm_d68" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/kids_infobits_lg.gif" alt="Kids InfoBits Logo" />
                  <span>Kids InfoBits</span>
                </a>
              </li>

            </ul>

            <h3>General</h3>

            <ul class="library-icons">
              <li>
                <a href="http://www.thecanadianencyclopedia.ca/en/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/TheCanEn2.jpg" alt="The Canadian Encyclopedia Logo" />
                  <span>The Canadian Encyclopedia</span>
                </a>
              </li>

              <li>
                <a href="http://www.thecanadianencyclopedia.ca/fr/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/Encyclopedie.jpg" alt="L'Encyclopédie Canadienne Logo" />
                  <span>L'Encyclopédie Canadienne</span>
                </a>
              </li>

              <li>
                <a href="http://school.eb.com/levels/high" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/SchoolHigh_btn.jpg" alt="Britannica School High Logo" />
                  <span>Britannica School High</span>
                </a>
              </li>

              <li>
                <a href="http://www.ourontario.ca/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/our_ontario.gif" alt="OurOntario Logo" />
                  <span>OurOntario</span>
                </a>
              </li>

              <li>
                <a href="http://www.teenhealthandwellness.com/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/teen_health.gif" alt="Teen Health and Wellness Logo" />
                  <span>Teen Health and Wellness</span>
                </a>
              </li>

            </ul>

          </div>

          <div class="tab-pane" id="staffResources">
            <ul class="library-icons">
              <li>
                <a href="http://web.a.ebscohost.com/ehost/search/advanced?sid=1d12556e-1158-4f7b-a60c-60e2cd9cf117%40sessionmgr4005&vid=0&hid=4204" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/ERCButton_150x75.gif" alt="Education Research Complete Logo" />
                  <span>Education Research Complete</span>
                </a>
              </li>

              <li>
                <a href="http://web.a.ebscohost.com/ehost/search/advanced?sid=6c70d618-11d6-4bc1-b7d4-c096968c55d9%40sessionmgr4001&vid=0&hid=4204" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/ERIC-button150x75.gif" alt="ERIC Logo" />
                  <span>ERIC</span>
                </a>
              </li>

              <li>
                <a href="http://go.galegroup.com/ps/start.do?p=PROF&u=ko_k12hs_d68&authCount=1" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/educators_reference_complete_lg.gif" alt="Educators Reference Complete Logo" />
                  <span>Educators Reference Complete</span>
                </a>
              </li>
              <li>
                <a href="http://galesites.com/portals/ascd/kitc10262" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/eBooks_Educators.jpg" alt="GVRL eBook Collection Logo" />
                  <span>GVRL eBook Collection</span>
                </a>
              </li>
              <li>
                <a href="https://resources.elearningontario.ca/" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/oerb.jpg" alt="Ontario Educational Resource Bank Logo" />
                  <span>Ontario Educational Resource Bank</span>
                </a>
              </li>
              <li>
                <a href="http://www.learnontario.ca/search;jsessionid=B56CFBD226083AFF6303A923639C4BF3" target="_blank">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/library/learn_ontario.gif" alt="LearnOntario Logo" />
                  <span>LearnOntario</span>
                </a>
              </li>


            </ul>
          </div>
        </div>
        <div class="clear"></div>
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

