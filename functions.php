<?php
/**
 * WRDSB functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
 */

if ( ! function_exists( 'wrdsb_setup' ) ) :
/**
 * WRDSB setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since WRDSB 1.0
 */

function wrdsb_setup() {

  /*
   * Make WRDSB available for translation.
   *
   * Translations can be added to the /languages/ directory.
   * If you're building a theme based on WRDSB, use a find and
   * replace to change 'wrdsb' to the name of your theme in all
   * template files.
   */
  load_theme_textdomain( 'wrdsb', get_template_directory() . '/languages' );

  // Add RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  // Enable support for Featured Images (Post Thumbnails) in pages and posts, and declare sizes.
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 165, 9999);
  add_image_size( 'wrdsb-full-width', 1140, 9999);
  add_image_size( 'wrdsb-one-sidebar', 945, 9999);
  add_image_size( 'wrdsb-two-sidebars', 750, 9999);

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'top'   => __('Top Menu Region', 'wrdsb'),
    'left' => __('Left Sidebar Menu Region', 'wrdsb'),
    'right' => __('Right Sidebar Menu Region', 'wrdsb'),
  ) );

  /**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 */

function wrdsb_edit_customizer( $wp_customize ) {
  global $wp_customize;
  $wp_customize->remove_section( 'custom_css' );
  $wp_customize->remove_control( 'site_icon' );
}
// Remove Customizer Additional CSS
add_action( 'customize_register', 'wrdsb_edit_customizer', 20 );

  // Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
  function add_menuclass( $ulclass ) {
    return preg_replace( '/<ul>/', '<ul class="nav nav-justified">', $ulclass, 1 );
  }
  add_filter( 'wp_page_menu', 'add_menuclass' );

  if(!function_exists('get_post_top_ancestor_id')){
  /**
   * Gets the id of the topmost ancestor of the current page. Returns the current
   * page's id if there is no parent.
   * 
   * @uses object $post
   * @return int 
   */
  function get_post_top_ancestor_id(){
      global $post;
      if($post->post_parent){
          $ancestors = array_reverse(get_post_ancestors($post->ID));
          return $ancestors[0];
      }
      return $post->ID;
  }}

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
  ) );

  // Add support for featured content.
  add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'wrdsb_get_featured_posts',
    'max_posts' => 6,
  ) );

  // This theme uses its own gallery styles.
  add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // wrdsb_setup
add_action( 'after_setup_theme', 'wrdsb_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since WRDSB 1.0
 *
 * @return void
 */
//function wrdsb_content_width() {
  //if ( is_attachment() && wp_attachment_is_image() ) {
    //$GLOBALS['content_width'] = 810;
  //}
//}
//add_action( 'template_redirect', 'wrdsb_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since WRDSB 1.0
 *
 * @return array An array of WP_Post objects.
 */
//function wrdsb_get_featured_posts() {
  /**
   * Filter the featured posts to return in WRDSB.
   *
   * @since WRDSB 1.0
   *
   * @param array|bool $posts Array of featured posts, otherwise false.
   */
  //return apply_filters( 'wrdsb_get_featured_posts', array() );
//}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since WRDSB 1.0
 *
 * @return bool Whether there are featured posts.
 */
//function wrdsb_has_featured_posts() {
  //return ! is_paged() && (bool) wrdsb_get_featured_posts();
//}

/**
 * Register WRDSB widget areas.
 *
 * @since WRDSB 1.0
 *
 * @return void
 */
function wrdsb_widgets_init() {
  //require get_template_directory() . '/inc/widgets.php';
  //register_widget( 'WRDSB_Ephemera_Widget' );

  register_sidebar( array(
    'name'          => __( 'Sidebar Left', 'wrdsb' ),
    'id'            => 'sidebar-left',
    'description'   => __( 'Main sidebar that appears on the left.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<div class="sub-menu-heading"><span>',
    'after_title'   => '</span></div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Sidebar Right', 'wrdsb' ),
    'id'            => 'sidebar-right',
    'description'   => __( 'Additional sidebar that appears on the right.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<div class="sub-menu-heading"><span>',
    'after_title'   => '</span></div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Do Not Use: Footer Left', 'wrdsb' ),
    'id'            => 'footer-left',
    'description'   => __( 'Appears in the second footer section of the site. This area is controlled centrally, widgets placed here will not display.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Centre', 'wrdsb' ),
    'id'            => 'footer-centre',
    'description'   => __( 'Appears in the third footer section of the site.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Right', 'wrdsb' ),
    'id'            => 'footer-right',
    'description'   => __( 'Appears in the fourth footer section of the site.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>',
  ) );
/*  register_sidebar( array(
    'name'          => __( 'Content Left', 'wrdsb' ),
    'id'            => 'content-left',
    'description'   => __( 'Appears at the bottom of the page/post content.', 'wrdsb' ),
    //'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    //'after_widget'  => '</aside>',
    //'before_title'  => '<h1 class="widget-title">',
    //'after_title'   => '</h1>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Content Right', 'wrdsb' ),
    'id'            => 'content-right',
    'description'   => __( 'Appears at the bottom of the page/post content.', 'wrdsb' ),
    //'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    //'after_widget'  => '</aside>',
    //'before_title'  => '<h1 class="widget-title">',
    //'after_title'   => '</h1>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Content Feature', 'wrdsb' ),
    'id'            => 'content-feature',
    'description'   => __( 'Appears at the top of the page/post content.', 'wrdsb' ),
    //'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    //'after_widget'  => '</aside>',
    //'before_title'  => '<h1 class="widget-title">',
    //'after_title'   => '</h1>',
  ) ); */
}
add_action( 'widgets_init', 'wrdsb_widgets_init' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since WRDSB 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
//function wrdsb_body_classes( $classes ) {
  //if ( is_multi_author() ) {
    //$classes[] = 'group-blog';
  //}

  //if ( get_header_image() ) {
    //$classes[] = 'header-image';
  //} else {
    //$classes[] = 'masthead-fixed';
  //}

  //if ( is_archive() || is_search() || is_home() ) {
    //$classes[] = 'list-view';
  //}

  //if ( ( ! is_active_sidebar( 'sidebar-2' ) )
    //|| is_page_template( 'page-templates/full-width.php' )
    //|| is_page_template( 'page-templates/contributors.php' )
    //|| is_attachment() ) {
    //$classes[] = 'full-width';
  //}

  //if ( is_active_sidebar( 'sidebar-3' ) ) {
    //$classes[] = 'footer-widgets';
  //}

  //if ( is_singular() && ! is_front_page() ) {
    //$classes[] = 'singular';
  //}

  //if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
    //$classes[] = 'slider';
  //} elseif ( is_front_page() ) {
    //$classes[] = 'grid';
  //}

  //return $classes;
//}
//add_filter( 'body_class', 'wrdsb_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since WRDSB 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
//function wrdsb_post_classes( $classes ) {
  //if ( ! post_password_required() && has_post_thumbnail() ) {
    //$classes[] = 'has-post-thumbnail';
  //}

  //return $classes;
//}
//add_filter( 'post_class', 'wrdsb_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since WRDSB 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
//function wrdsb_wp_title( $title, $sep ) {
  //global $paged, $page;

  //if ( is_feed() ) {
    //return $title;
  //}

  // Add the site name.
  //$title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  //$site_description = get_bloginfo( 'description', 'display' );
  //if ( $site_description && ( is_home() || is_front_page() ) ) {
    //$title = "$title $sep $site_description";
  //}

  // Add a page number if necessary.
  //if ( $paged >= 2 || $page >= 2 ) {
    //$title = "$title $sep " . sprintf( __( 'Page %s', 'wrdsb' ), max( $paged, $page ) );
  //}

  //return $title;
//}
//add_filter( 'wp_title', 'wrdsb_wp_title', 10, 2 );

// Implement Custom Header features.
// http://codex.wordpress.org/Custom_Headers
//require get_template_directory() . '/inc/custom-header.php';
$custom_header_options = array(
  'width'                  => 1140,
  'flex-width'             => true,
  'height'                 => 300,
  'flex-height'            => true,
  //'default-image'        => get_template_directory_uri() . '/images/header.jpg',
  'default-image'          => '',
  'uploads'                => true,
  'random-default'         => false,
  'default-text-color'     => '',
  'header-text'            => false,
  'wp-head-callback'       => '',
  'admin-head-callback'    => '',
  'admin-preview-callback' => '',
);
add_theme_support('custom-header', $custom_header_options);

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
//if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
  //require get_template_directory() . '/inc/featured-content.php';
//}

/* Custom Global Variables */

if ( ! function_exists ('wrdsb_global_vars' ) ) {
function wrdsb_global_vars() {
  global $wrdsbvars;
  $wrdsbvars['asset_version'] = "public/2/2.2.0";
  // to use: $GLOBALS['wrdsbvars']['asset_version']
}
add_action ( 'parse_query','wrdsb_global_vars' );
}

/* Breadcrumb Links */

function the_breadcrumb() {
  if (is_singular('sfwd-lessons') or is_singular('sfwd-quiz')) {return;}
  global $post;
  echo '<div class="container container-breadcrumb" role="navigation">';
  echo '<ol class="breadcrumb">';
  if (!is_front_page()) {
    echo '<li>';
    echo '<a href="';
    echo get_option('home');
    echo '">';
    echo 'Home';
    echo '</a>';
    echo '</li>';
    if (is_singular('post')) {
      echo '<li><a href="'.wrdsb_posts_page_url().'">News</a></li>';
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_singular('certification')) {
      echo '<li>Certifications</li>';
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_singular('co-op-certification')) {
      echo '<li>Co-op Certifications</li>';
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_singular('shsm')) {
      echo '<li>SHSM</li>';
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_singular('sfwd-courses')) {
      echo '<li>Courses</li>';
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_page()) {
      if($post->post_parent){
        $anc = get_post_ancestors( $post->ID );
        $title = get_the_title();
        $output = '';
        foreach ( $anc as $ancestor ) {
          $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>'.$output;
        }
        echo $output;
        echo '<li>'.$title.'</li>';
      } else {
        echo '<li>'.get_the_title().'</li>';
      }
    } elseif (is_home()) {
      echo '<li>News &amp; Announcements</li>';
    }
  }
  elseif (is_tag()) {single_tag_title();}
  elseif (is_category()) {echo"<li>"; the_category(); echo'</li>';}
  elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
  elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
  elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
  elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
  elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
  elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
  echo '</ol>';
  echo '</div>';
}

/* Custom Styles for Secondary */

function wrdsb_secondary_school_colours() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  switch ($host[0]) {
    case "bci":
      echo '<!-- Site specific styles for BCI -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/bci.css" rel="stylesheet">';
      break;
    case "chc":
      echo '<!-- Site specific styles for CHC -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/chc.css" rel="stylesheet">';
      break;
    case "eci":
      echo '<!-- Site specific styles for ECI -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/eci.css" rel="stylesheet">';
      break;
    case "eds":
      echo '<!-- Site specific styles for EDS -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/eds.css" rel="stylesheet">';
      break;
    case "fhc":
      echo '<!-- Site specific styles for FHC -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/fhc.css" rel="stylesheet">';
      break;
    case "gci":
      echo '<!-- Site specific styles for GCI -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/gci.css" rel="stylesheet">';
      break;
    case "gnss":
      echo '<!-- Site specific styles for GNSS -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/gnss.css" rel="stylesheet">';
      break;
    case "gps":
      echo '<!-- Site specific styles for GPS -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/gps.css" rel="stylesheet">';
      break;
    case "grc":
      echo '<!-- Site specific styles for GRC -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/grc.css" rel="stylesheet">';
      break;
    case "hrh":
      echo '<!-- Site specific styles for HRH -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/hrh.css" rel="stylesheet">';
      break;
    case "jam":
      echo '<!-- Site specific styles for JAM -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/jam.css" rel="stylesheet">';
      break;
    case "jhs":
      echo '<!-- Site specific styles for JHS -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/jhs.css" rel="stylesheet">';
      break;
    case "kci":
      echo '<!-- Site specific styles for KCI -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/kci.css" rel="stylesheet">';
      break;
    case "phs":
      echo '<!-- Site specific styles for PHS -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/phs.css" rel="stylesheet">';
      break;
    case "sss":
      echo '<!-- Site specific styles for SSS -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/sss.css" rel="stylesheet">';
      break;
    case "wci":
      echo '<!-- Site specific styles for WCI -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/wci.css" rel="stylesheet">';
      break;
    case "wod":
      echo '<!-- Site specific styles for WOD -->'."\r\n";
      echo '<link href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/css/wod.css" rel="stylesheet">';
      break;
  }
}

add_action ('init', 'wrdsb_add_excerpts_to_pages');
function wrdsb_add_excerpts_to_pages() {
  add_post_type_support('page', 'excerpt');
}

// Replaces the excerpt "[...]" more text with a link
function new_excerpt_more($more) {
  global $post;
  return ' [...]<p class="readmore" role="complementary"><a href="'. get_permalink($post->ID) . '"><strong>Read more about</strong> <cite>'. get_the_title($post->ID) .'</cite> &#187;</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function get_our_excerpt($our_post_id, $global_post_id)
{
    global $post;
    $our_excerpt = get_the_excerpt($our_post_id);

    if (strpos($our_excerpt, 'Read more about') !== false) {
        $our_excerpt = str_replace(get_permalink($global_post_id), get_permalink($our_post_id), $our_excerpt);
        $our_excerpt = str_replace(get_the_title($global_post_id), get_the_title($our_post_id), $our_excerpt);
    } else {
        $our_excerpt = $our_excerpt . '<p class="readmore" role="complementary"><a href="' . get_permalink($our_post_id) . '"><strong>Read more about</strong> <cite>' . get_the_title($our_post_id) . '</cite> &#187;</a></p>';
    }

    return $our_excerpt;
}

function wrdsb_posts_page_url() {
  if (get_option('show_on_front') == 'page') {
    return get_permalink(get_option('page_for_posts'));
  } else {
    return get_bloginfo('url');
  }
}

function wrdsb_i_am_a_corporate_site() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $my_domains = array(
    "www","wwwwrdsbdev", "wplabs"
  );
  $domain = 'wrdsb';
  $url = site_url();

  if (in_array(($host[0]), $my_domains)) {
    if (strpos($url, $domain) !== false) {
      return TRUE;
    }
  }
}

function wrdsb_i_am_a_staff_site() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $my_domains = array(
    "staff",
  );
  if (in_array(($host[0]), $my_domains)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_site() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $my_domains = array(
    "schools"/*,"wwwwrdsbdev"*/
  );
  if (in_array(($host[0]), $my_domains)) {
    return TRUE;
  }
}

function wrdsb_get_school_code() {
  return get_option('wrdsb_school_code', false);
}

function wrdsb_i_am_a_school() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "abe",
    "alp",
    "ark",
    "ave",
    "ayr",
    "bci",
    "bdn",
    "bgd",
    "blr",
    "bre",
    "brp",
    "cdc",
    "ced",
    "cha",
    "chc",
    "chi",
    "cle",
    "cnc",
    "cnw",
    "coh",
    "con",
    "cor",
    "cre",
    "crl",
    "ctr",
    "dks",
    "doo",
    "dpk",
    "eci",
    "eds",
    "elg",
    "elq",
    "elz",
    "emp",
    "ess",
    "est",
    "fgl",
    "fhc",
    "fhl",
    "flo",
    "fra",
    "gci",
    "gcp",
    "gps",
    "grc",
    "gro",
    "gvc",
    "gvn",
    "hes",
    "hig",
    "hil",
    "how",
    "hrh",
    "jam",
    "jdp",
    "jfc",
    "jhs",
    "jma",
    "jme",
    "jst",
    "jwg",
    "kci",
    "kea",
    "ked",
    "lau",
    "lbp",
    "lex",
    "lin",
    "lkw",
    "lnh",
    "lrw",
    "man",
    "mcg",
    "mck",
    "mea",
    "mil",
    "mjp",
    "mof",
    "mrg",
    "nam",
    "ndd",
    "nlw",
    "phs",
    "pio",
    "pkm",
    "pkw",
    "pre",
    "pru",
    "qel",
    "qsm",
    "riv",
    "rmt",
    "roc",
    "rye",
    "sab",
    "sag",
    "she",
    "shl",
    "sil",
    "smi",
    "snd",
    "srg",
    "sss",
    "sta",
    "stj",
    "stn",
    "stw",
    "sud",
    "sun",
    "tai",
    "tri",
    "vis",
    "wci",
    "wcp",
    "wel",
    "wgd",
    "wlm",
    "wls",
    "wod",
    "wpk",
    "wsh",
    "wsm",
    "wsv",
    "wtt",
    "dsps",
    "gnss",
    "wplabs"
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_grade_8() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "ark",
    "ave",
    "bdn",
    "bre",
    "cdc",
    "cnw",
    "chi",
    "cle",
    "con",
    "crl",
    "doo",
    "est",
    "flo",
    "fgl",
    "gro",
    "hes",
    "jme",
    "jst",
    "lrw",
    "lau",
    "lbp",
    "lnh",
    "lin",
    "mcg",
    "mrg",
    "mof",
    "nlw",
    "pkm",
    "qsm",
    "sil",
    "sta",
    "stj",
    "stn",
    "stw",
    "sun",
    "vis",
    "wel",
    "wsh",
    "wgd",
    "wpk"
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_exception() {
  /** schools.wrdsb.ca/NAME **/
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "schools",
    "cln",
    "alc",
    "alu",
    "inl",
    "ins",
    "rmt",
    "chinese",
    "german",
    "greek",
    "serbian"
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_beforeafter() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "abe",
    "alp",
    "ark",
    "ave",
    "ayr",
    "bdn",
    "bgd",
    "blr",
    "bre",
    "brp",
    "cdc",
    "ced",
    "cha",
    "chi",
    "cle",
    "cnc",
    "coh",
    "con",
    "cor",
    "cre",
    "crl",
    "ctr",
    "doo",
    "dpk",
    "elg",
    "elz",
    "emp",
    "est",
    "fgl",
    "fhl",
    "flo",
    "fra",
    "gcp",
    "gro",
    "gvc",
    "gvn",
    "hes",
    "hig",
    "hil",
    "how",
    "jdp",
    "jfc",
    "jma",
    "jme",
    "jst",
    "jwg",
    "kea",
    "ked",
    "lbp",
    "lex",
    "lin",
    "lkw",
    "lnh",
    "lrw",
    "man",
    "mck",
    "mea",
    "mil",
    "mjp",
    "mof",
    "nam",
    "ndd",
    "nlw",
    "pio",
    "pkw",
    "pre",
    "pru",
    "qel",
    "riv",
    "rmt",
    "rmt",
    "roc",
    "rye",
    "sab",
    "sag",
    "she",
    "shl",
    "sil",
    "smi",
    "snd",
    "srg",
    "sta",
    "stj",
    "stw",
    "sud",
    "tai",
    "tri",
    "vis",
    "wcp",
    "wel",
    "wlm",
    "wls",
    "wpk",
    "wsm",
    "wsv",
    "wtt",
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_secondary() {
  global $abc;
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "bci",
    "chc",
    "eci",
    "eds",
    "fhc",
    "gci",
    "gps",
    "grc",
    "hrh",
    "jam",
    "jhs",
    "kci",
    "phs",
    "sss",
    "wci",
    "wod",
    "gnss",
    "wplabs"
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_with_kindergarten() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "abe",
    "alp",
    "ark",
    "ave",
    "ayr",
    "bdn",
    "bgd",
    "blr",
    "bre",
    "brp",
    "cdc",
    "ced",
    "cha",
    "chi",
    "cle",
    "cnc",
    "coh",
    "con",
    "cor",
    "cre",
    "ctr",
    "dpk",
    "dsps",
    "elg",
    "elz",
    "emp",
    "est",
    "fgl",
    "fhl",
    "flo",
    "fra",
    "gcp",
    "gro",
    "gvc",
    "gvn",
    "hes",
    "hig",
    "hil",
    "how",
    "jdp",
    "jfc",
    "jma",
    "jme",
    "jst",
    "jwg",
    "kea",
    "ked",
    "lbp",
    "lex",
    "lin",
    "lkw",
    "lnh",
    "lrw",
    "man",
    "mck",
    "mea",
    "mil",
    "mjp",
    "mof",
    "nam",
    "ndd",
    "nlw",
    "pio",
    "pkw",
    "pre",
    "pru",
    "qel",
    "riv",
    "roc",
    "rye",
    "sab",
    "sag",
    "she",
    "shl",
    "sil",
    "smi",
    "snd",
    "srg",
    "stj",
    "stw",
    "sud",
    "tai",
    "tri",
    "vis",
    "wcp",
    "wel",
    "wlm",
    "wls",
    "wpk",
    "wsm",
    "wsv",
    "wtt",
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
  // add your extension to the array
  $existing_mimes['gsp'] = 'application/x-gsp';
  $existing_mimes['svg'] = 'image/svg+xml';
  $existing_mimes['svgz'] = 'image/svg+xml';
  // add as many as you like
  // removing existing file types
  // unset( $existing_mimes['exe'] );
  // add as many as you like
  // and return the new full result
  return $existing_mimes;
}

// Favicon
if ( ! function_exists ('favicon_link' ) ) {
  function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="https://s3.amazonaws.com/wrdsb-ui-assets/'.$GLOBALS['wrdsbvars']['asset_version'].'/images/favicon.png" />' . "\n";
  }
  add_action( 'wp_head', 'favicon_link' );
}

function megamenu_add_theme_wrdsb_1614659524($themes) {
  $parsed_url=parse_url(site_url());
  $host = explode('/', $parsed_url['path']);
  switch ($host[1]) {
    case "gnss":
      $background = "rgb(85, 0, 85)";
      $backgroundHover = "rgb(153, 153, 153)";
      $subMenuHover= "rgb(112, 240, 72)";
    break;
    case "dsps":
      $background = "rgb(85, 0, 85)";
      $backgroundHover = "rgb(153, 153, 153)";
      $subMenuHover= "rgb(112, 240, 72)";
    break;
    case "bci":
        $background = "rgb(0, 102, 153)";
        $backgroundHover = "rgb(102, 102, 102)";
        $subMenuHover= "rgb(112, 240, 72)";
      break;
    case "chc":
      $background = "rgb(0, 102, 0)";
      $backgroundHover = "rgb(102, 102, 102)";
      $subMenuHover= "rgb(112, 240, 72)";
      break;
    case "eci":
      $background = "rgb(103, 0, 1)";
      $backgroundHover = "rgb(102, 102, 102)";
      $subMenuHover= "rgb(112, 240, 72)";
      break;
    case "eds":
      $background = "rgb(7, 70, 17)";
      $backgroundHover = "rgb(102, 102, 102)";
      $subMenuHover= "'rgb(112, 240, 72)";
      break;
    case "fhc":
      $background = "rgb(34, 27, 19)";
      $backgroundHover = "rgb(102, 102, 102)";
      $subMenuHover= "rgb(112, 240, 72)";
      break;
    case "gci":
      $background = "rgb(1, 10, 89)";
      $backgroundHover = "rgb(209, 179, 23)";
      $subMenuHover= "rgb(209, 179, 23)";
      break; 
    case "gps":
      $background = "rgb(111, 11, 9)";
      $backgroundHover = "rgb(15, 0, 5)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "grc":
      $background = "rgb(27, 43, 156)";
      $backgroundHover = "rgb(153, 153, 153)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "hrh":
      $background = "rgb(84, 60, 118)";
      $backgroundHover = "rgb(153, 153, 153)";
      $subMenuHover= "rgb(84, 60, 118)";
      break;
    case "jam":
      $background = "rgb(68, 128, 178)";
      $backgroundHover = "rgb(48, 102, 155)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "jhs":
      $background = "rgb(107, 138, 167)";
      $backgroundHover = "rgb(28, 47, 116)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "kci":
      $background = "rgb(102, 2, 2)";
      $backgroundHover = "rgb(213, 166, 58)";
      $subMenuHover= "rgb(102, 2, 2)";
      break;
    case "phs":
      $background = "rgb(41, 9, 12)";
      $backgroundHover = "rgb(102, 102, 102)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "sss":
      $background = "rgb(239, 62, 51)";
      $backgroundHover = "rgb(51, 51, 51)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "wci":
      $background = "rgb(10, 18, 65)";
      $backgroundHover = "rgb(163, 0, 1)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    case "wod":
      $background = "rgb(18, 24, 10)";
      $backgroundHover = "rgb(102, 102, 102)";
      $subMenuHover= "rgb(98, 187, 70)";
      break;
    default:
      $background = "rgb(0, 95, 174)";
      $backgroundHover = "rgb(3, 77, 139)";
      $subMenuHover= "rgb(112, 240, 72)";
      break;

    }
      $themes["wrdsb_1614659524"] = array(
          'title' => 'WRDSB',
          'container_background_from' => $background,
          'container_background_to' => $background,
          'container_padding_left' => '20px',
          'container_padding_right' => '20px',
          'menu_item_align' => 'right',
          'menu_item_background_hover_from' => $backgroundHover,
          'menu_item_background_hover_to' => $backgroundHover,
          'menu_item_link_font' => 'Lato',
          'menu_item_link_font_size' => '18px',
          'menu_item_link_height' => '80px',
          'menu_item_link_text_align' => 'center',
          'menu_item_link_padding_left' => '20px',
          'menu_item_link_padding_right' => '20px',
          'panel_background_from' => $backgroundHover,
          'panel_background_to' => $backgroundHover,
          'panel_header_color' => 'rgb(255, 255, 255)',
          'panel_header_text_transform' => 'none',
          'panel_header_font' => 'Lato',
          'panel_padding_top' => '30px',
          'panel_padding_bottom' => '30px',
          'panel_widget_padding_top' => '0',
          'panel_widget_padding_bottom' => '0',
          'panel_font_size' => '14px',
          'panel_font_color' => '#666',
          'panel_font_family' => 'inherit',
          'panel_second_level_font_color' => 'rgb(255, 255, 255)',
          'panel_second_level_font_color_hover' => $subMenuHover,
          'panel_second_level_text_transform' => 'none',
          'panel_second_level_font' => 'Lato',
          'panel_second_level_font_size' => '16px',
          'panel_second_level_font_weight' => 'bold',
          'panel_second_level_font_weight_hover' => 'bold',
          'panel_second_level_text_decoration' => 'none',
          'panel_second_level_text_decoration_hover' => 'none',
          'panel_third_level_font_color' => 'rgb(255, 255, 255)',
          'panel_third_level_font_color_hover' => $subMenuHover,
          'panel_third_level_font' => 'Lato',
          'panel_third_level_font_size' => '16px',
          'panel_third_level_padding_left' => '15px',
          'flyout_link_size' => '14px',
          'flyout_link_color' => '#666',
          'flyout_link_color_hover' => '#666',
          'flyout_link_family' => 'inherit',
          'responsive_breakpoint' => '1200px',
          'toggle_background_from' => $background,
          'toggle_background_to' => $background,
          'toggle_bar_height' => '80px',
          'toggle_bar_border_radius_top_left' => '0px',
          'toggle_bar_border_radius_top_right' => '0px',
          'toggle_bar_border_radius_bottom_left' => '0px',
          'toggle_bar_border_radius_bottom_right' => '0px',
          'mobile_menu_force_width' => 'on',
          'mobile_background_from' => $background,
          'mobile_background_to' => $background,
          'mobile_menu_item_link_font_size' => '14px',
          'mobile_menu_item_link_color' => '#ffffff',
          'mobile_menu_item_link_text_align' => 'left',
          'mobile_menu_item_link_color_hover' => '#ffffff',
          'mobile_menu_item_background_hover_from' => $backgroundHover,
          'mobile_menu_item_background_hover_to' => $backgroundHover,
          'custom_css' => '/** Push menu onto new line **/ 
  #{$wrap} { 
      clear: both; 
  }',
          'sticky_menu_item_link_height' => '40px',
          'tabbed_link_background_from' => '#f1f1f1',
          'tabbed_link_background_to' => '#f1f1f1',
          'tabbed_link_color' => '#666',
          'tabbed_link_family' => 'inherit',
          'tabbed_link_size' => '14px',
          'tabbed_link_weight' => 'normal',
          'tabbed_link_padding_top' => '0px',
          'tabbed_link_padding_right' => '10px',
          'tabbed_link_padding_bottom' => '0px',
          'tabbed_link_padding_left' => '10px',
          'tabbed_link_height' => '35px',
          'tabbed_link_text_decoration' => 'none',
          'tabbed_link_text_transform' => 'none',
          'tabbed_link_background_hover_from' => '#dddddd',
          'tabbed_link_background_hover_to' => '#dddddd',
          'tabbed_link_weight_hover' => 'normal',
          'tabbed_link_text_decoration_hover' => 'none',
          'tabbed_link_color_hover' => '#666',
      );
      return $themes;
  }
  add_filter("megamenu_themes", "megamenu_add_theme_wrdsb_1614659524");

function megamenu_override_default_theme($value) {
  // change 'primary' to your menu location ID
  if ( !isset($value['top']['theme']) ) {
    $value['top']['theme'] = 'wrdsb_1614659524'; // change my_custom_theme_key to the ID of your exported theme
  }

  return $value;
}
add_filter('default_option_megamenu_settings', 'megamenu_override_default_theme');
