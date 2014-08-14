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
    </script>

<script type="text/javascript" language="javascript">
function $(id) {
return document.getElementById(id);
}

var strURL = "https://cat.library.wrdsb.ca/Library/discovery/";
var streVideoLibraryID = "0004";
var selectedLibraryID = "All";
var strRMLibraryID = "";

function pageload() {
var sEventName = '';
var bIsIe = false;
if (document.body.onpropertychange === null) {
sEventName = 'propertychange';
var bIsIe = true;
} else {
sEventName = 'input';
fCheckAlways();
}
var el = document.createElement('div');
el.setAttribute('oninput', 'return;')
if (typeof el.oninput === 'function') {
sEventName = 'input';
if (bIsIe) {
fCheckAlways();
}
}
fEventListen($("txtKeyWord"), sEventName, fIdInputEvent);
fEventListen($("txtKeywordInVideo"), sEventName, fIdInputEvent);
fEventListen($("txtKeywordInVirtual"), sEventName, fIdInputEvent);
fEventListen($("txtKeywordInStaff"), sEventName, fIdInputEvent);
fIdInputEvent();

var libraryList = {items:[{'id':'All','value':'All Libraries'},{'id':'0004','value':'eVideo Library'},{'id':'0002','value':'Gondor Library'},{'id':'0005','value':'Resource Manager'},{'id':'0001','value':'Rivendell Library'}]};
var onlineResources = {items:[{'No':1,'t531Identifier':'1','t531Url':'http:\/\/www.biographi.ca\/en\/index.php'},{'No':2,'t531Identifier':'2','t531Url':'http:\/\/kids.nationalgeographic.com\/'},{'No':3,'t531Identifier':'3','t531Url':'http:\/\/discoverykids.com\/'}]};
var virtualContent = {items:[{'No':1,'t530Identifier':'1','t530Url':'https:\/\/www.nfb.ca\/'},{'No':2,'t530Identifier':'2','t530Url':'http:\/\/curio.ca\/en\/'},{'No':3,'t530Identifier':'3','t530Url':'http:\/\/school.eb.co.uk\/'},{'No':4,'t530Identifier':'4','t530Url':'https:\/\/search.ebscohost.com\/'},{'No':5,'t530Identifier':'5','t530Url':'http:\/\/auth.go.galegroup.com\/auth\/capmAuthentication.do?&origURL=http%3A%2F%2Fgo.galegroup.com%2Fps%2Fstart.do%3FprodId%3DGVRL%26authCount%3D1&productShortName=GVRL&isStartUrlRequest=true'},{'No':6,'t530Identifier':'6','t530Url':'http:\/\/www.learn360.com\/index.aspx'}]};

if (libraryList) {
setCboData($('cboLibrary'), libraryList);
}
if (onlineResources) {
buildHTMLForOnlineResources(onlineResources);
}
if (virtualContent) {
buildHTMLForVirtualContent(virtualContent);
}
}

function fCheckAlways() {
window.oIntervalCheckAlways = setInterval(
function() {
if (document.getElementById("txtKeyWord").value != '') {
document.getElementById("txtKeyWordPlaceholder").style.visibility = "hidden";
} else {
document.getElementById("txtKeyWordPlaceholder").style.visibility = "visible";
}
if (document.getElementById("txtKeywordInVideo").value != '') {
document.getElementById("txtKeyWordPlaceholderInVideo").style.visibility = "hidden";
} else {
document.getElementById("txtKeyWordPlaceholderInVideo").style.visibility = "visible";
}
if (document.getElementById("txtKeywordInVirtual").value != '') {
document.getElementById("txtKeyWordPlaceholderInVirtual").style.visibility = "hidden";
} else {
document.getElementById("txtKeyWordPlaceholderInVirtual").style.visibility = "visible";
}
if (document.getElementById("txtKeywordInStaff").value != '') {
document.getElementById("txtKeyWordPlaceholderInStaff").style.visibility = "hidden";
} else {
document.getElementById("txtKeyWordPlaceholderInStaff").style.visibility = "visible";
}
}, 500);
}

function fIdInputEvent() {
if ($("txtKeyWord").value == "") {
$("txtKeyWordPlaceholder").style.visibility = "visible";
}
else {
$("txtKeyWordPlaceholder").style.visibility = "hidden";
}
if ($("txtKeywordInVideo").value == "") {
$("txtKeyWordPlaceholderInVideo").style.visibility = "visible";
}
else {
$("txtKeyWordPlaceholderInVideo").style.visibility = "hidden";
}
if ($("txtKeywordInVirtual").value == "") {
$("txtKeyWordPlaceholderInVirtual").style.visibility = "visible";
}
else {
$("txtKeyWordPlaceholderInVirtual").style.visibility = "hidden";
}
if ($("txtKeywordInStaff").value == "") {
$("txtKeyWordPlaceholderInStaff").style.visibility = "visible";
}
else {
$("txtKeyWordPlaceholderInStaff").style.visibility = "hidden";
}
}

//binding event listen
function fEventListen(oElement, sName, fObserver, bUseCapture) {
bUseCapture = !!bUseCapture;
if (oElement.addEventListener) {
oElement.addEventListener(sName, fObserver, bUseCapture);
} else if (oElement.attachEvent) {
oElement.attachEvent('on' + sName, fObserver);
}
}

function setCboData(oSelect, data) {
if (oSelect && data && data.items) {
oSelect.options.length = data.items.length;
for (var i = 0; i < data.items.length; i++) {
oSelect.options[i] = new Option(data.items[i].value, data.items[i].id);
if (selectedLibraryID == data.items[i].id) oSelect.options[i].selected = true;
}
}
}

function buildHTMLForOnlineResources(data) {
var strHTML = '';
if (data && data.items && data.items.length > 0) {
for (var i = 0; i < data.items.length; i++) {
var row = data.items[i];
strHTML += '<a href="' + row.t531Url + '" target="_blank"><img src="../getImg.aspx?type=EmbeddedOnlineResources&id=' + row.t531Identifier + '" title="" alt=""/></a>';
}
}
$('onlineResourceList').innerHTML = strHTML;
}

function buildHTMLForVirtualContent(data) {
var strHTML = '';
if (data && data.items && data.items.length > 0) {
for (var i = 0; i < data.items.length; i++) {
var row = data.items[i];
strHTML += '<a href="' + row.t530Url + '" target="_blank"><img src="../getImg.aspx?type=embeddedvirtual&id=' + row.t530Identifier + '" title="" alt=""/></a>';
}
}
$('virtualContentList').innerHTML = strHTML;
}

function tabChanged(strType) {
clearHeaderStyle();
hideAlltabs();
$('tab' + strType + 'Header').className = 'headerSelected';
$('tab' + strType + 'Content').style.display = '';
setFocus(strType);
}

function setFocus(strType) {
switch (strType) {
case 'Library':
$('txtKeyWord').focus();
break;
case 'Video':
$('txtKeywordInVideo').focus();
break;
case 'Virtual':
$('txtKeywordInVirtual').focus();
break;
case 'Staff':
$('txtKeywordInStaff').focus();
break;
default:
break;
}
}

function clearHeaderStyle() {
$('tabLibraryHeader').className = '';
$('tabVideoHeader').className = '';
$('tabVirtualHeader').className = '';
$('tabOnlineHeader').className = '';
$('tabStaffHeader').className = '';
$('tabEverythingHeader').className = '';
}

function hideAlltabs() {
$('tabLibraryContent').style.display = 'none';
$('tabVideoContent').style.display = 'none';
$('tabVirtualContent').style.display = 'none';
$('tabOnlineContent').style.display = 'none';
$('tabStaffContent').style.display = 'none';
$('tabEverythingContent').style.display = 'none';
}

function txtOnKeyDown(type) {
if (event.keyCode == 13) { //enter
btnSearchClicked(type);
}
}

////Last modified by futao 2014-7-18 ver:6.4.0 add type
function btnSearchClicked(type) {
var url = strURL;
if (type == 1) {
var strKeyword = $('txtKeyWord').value;
var strLibraryID = $('cboLibrary').value;
if ($('optKids').checked) {
url += 'kids.aspx';
url += '?keyword=' + encodeURIComponent(strKeyword);
url += '&libraryID=' + encodeURIComponent(strLibraryID);
} else if ($('optSimple').checked) {//add by futao 2014-7-17 ver:6.4.0
url += 'DoSearch.ashx';
url += '?l=' + encodeURIComponent(strLibraryID);
url += '&k=' + encodeURIComponent(strKeyword);
}
} else if (type == 2) {
strLibraryID = encodeURIComponent(streVideoLibraryID);
var strKeyword = $('txtKeywordInVideo').value;
url += 'DoSearch.ashx';
url += '?l=' + encodeURIComponent(strLibraryID);
url += '&k=' + encodeURIComponent(strKeyword);
} else if (type == 3) {
strLibraryID = "All";
var strKeyword = $('txtKeywordInVirtual').value;
url += 'DoSearch.ashx';
url += '?l=' + encodeURIComponent(strLibraryID);
url += '&k=' + encodeURIComponent(strKeyword);
url += '&ifs=1';
}else if(type == 5){ //huanglidan add at 2014-08-04,Ver 6.4.0
var strKeyword= $('txtKeywordInStaff').value;
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

<body onload="pageload(); return false;">
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

        <div class="ilsEmbeddedHeader">
          <a id="tabLibraryHeader" class="headerSelected" href="#" onclick="tabChanged('Library'); return false;" style="display:">Library</a>
          <a id="tabVideoHeader" class="" href="#" onclick="tabChanged('Video'); return false;" style="display:">eVideo Library</a>
          <a id="tabVirtualHeader" class="" href="#" onclick="tabChanged('Virtual'); return false;" style="display:">Virtual Library</a>
          <a id="tabOnlineHeader" class="" href="#" onclick="tabChanged('Online'); return false;" style="display:">Online Resources</a>
          <a id="tabStaffHeader" class="" href="#" onclick="tabChanged('Staff'); return false;" style="display:none">Staff Resources</a>
          <a id="tabEverythingHeader" class="" href="#" onclick="tabChanged('Everything'); return false;" style="display:none">Everything!</a>
        </div>

        <!-- Library -->
        <div id="tabLibraryContent" class="ilsEmbeddedContborder" style="display:">
          <div class="ilsEmbeddedContent">
            <div class="ilsEmbeddedSearchBorder" style="width:54%;">
              <table width="100%">
                <tr>
                  <td style="width:100%; position:relative;">
                    <input type="text" id="txtKeyWord" class="ilstext" onkeydown="txtOnKeyDown(1); return true;"/>
                    <label for="txtKeyWord" id="txtKeyWordPlaceholder" class="ilsEmbeddedtxtPlaceHolder">Search the Library</label>
                  </td>
                  <td width="55">
                    <input type="button" id="btnSearch" class="ilsbtnSearch" onclick="btnSearchClicked(1); return false;" />
                  </td>
                </tr>
              </table>
            </div>

            <div class="ilsEmbeddedSearchBorder" style=" width:43%; margin:0 0 0 0.2%;">
              <select id="cboLibrary" class="ilsCombo" style="width:98%; margin:5px 0 0 0;"></select>
            </div>

            <div style="width:200px; height:30px; padding:12px 0 0 5px; clear:both;">
              <input type="radio" name="optSearchPage" id="optKids" checked="checked"/>
              <label>Kids</label>
              <input type="radio" name="optSearchPage" id="optSimple"/>
              <label>Simple</label>
            </div>
          </div>
        </div>

        <!-- eVideo Library -->
        <div id="tabVideoContent" class="ilsEmbeddedContborder"  style="display:none">
        <div class="ilsEmbeddedContent" style="width:70%;">
        <div class="ilsEmbeddedSearchBorder"  style="width:80%;">
        <table width="100%">
        <tr>
        <td style="width:100%; text-align:center; position:relative;">
        <input type="text" id="txtKeywordInVideo" class="ilstext" onkeydown="txtOnKeyDown(2); return true;" style="display:block"/>
        <label for="txtKeywordInVideo" id="txtKeyWordPlaceholderInVideo" class="ilsEmbeddedtxtPlaceHolder">Search the eVideo Library for online video content</label>
        </td>
        <td width="55">
        <input type="button" id="btnSearchInVideo" onclick="btnSearchClicked(2); return false;" class="ilsbtnSearch" style="display:block"/>
        </td>
        </tr>
        </table>
        </div>
        </div>
        </div>

        <!-- Virtual Library -->
        <div id="tabVirtualContent" class="ilsEmbeddedContborder" style="display:none">
        <div class="ilsEmbeddedContent" style="width:70%;">
        <div class="ilsEmbeddedSearchBorder"   style="width:80%;">
        <table width="100%">
        <tr>
        <td style="width:100%; position:relative;">
        <input type="text" id="txtKeywordInVirtual" class="ilstext" onkeydown="txtOnKeyDown(3); return true;"/>
        <label for="txtKeywordInVirtual" id="txtKeyWordPlaceholderInVirtual" class="ilsEmbeddedtxtPlaceHolder">Search the Virtual Library for digital content</label>
        </td>
        <td width="55">
        <input type="button" id="btnSearchInVirtual" class="ilsbtnSearch" onclick="btnSearchClicked(3); return false;"/>
        </td>
        </tr>
        </table>
        </div>
        <div class="blue bold clear" style="height:16px; padding:10px 0 0 10px;"><label>OR...</label></div>
        <div class="clear" style=" line-height:30px; padding-left:10px;"><label>Click on a link below to search that database:</label></div>
        <div class="clear ilsImgList" id="virtualContentList"></div>
        </div>
        </div>

        <!-- Online Resources -->
        <div id="tabOnlineContent" class="ilsEmbeddedContborder" style="display:none">
        <div class="ilsEmbeddedContent" style="width:70%;">
        <div style=" padding:5px 0 5px 10px;">
        <label>Click on a link below to search that database:</label>
        </div>
        <div class="clear ilsImgList" id="onlineResourceList"></div>
        </div>
        </div>

        <!-- Staff Resources -->
        <div id="tabStaffContent" class="ilsEmbeddedContborder"  style="display:none">
        <div class="ilsEmbeddedContent" style="width:70%;">
        <div class="ilsEmbeddedSearchBorder"  style="width:80%;">
        <table width="100%">
        <tr>
        <td style="width:100%; position:relative;">
        <input type="text" id="txtKeywordInStaff" class="ilstext" onkeydown="txtOnKeyDown(5); return true;"/>
        <label for="txtKeywordInStaff" id="txtKeyWordPlaceholderInStaff" class="ilsEmbeddedtxtPlaceHolder">Search the Resource Centre for Books, Kids, and DVD's</label>
        </td>
        <td width="55">
        <input type="button" id="btnSearchInStaff" class="ilsbtnSearch" onclick="btnSearchClicked(5); return false;" />
        </td>
        </tr>
        </table>
        </div>
        </div>
        </div>

        <!-- Everything! -->
        <div id="tabEverythingContent" class="ilsEmbeddedContborder"  style="display:none">
        <div class="ilsEmbeddedContent">
        Everything!
        </div>
        </div>
        </form>

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

