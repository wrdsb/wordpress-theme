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
    'name'          => __( 'Footer Left', 'wrdsb' ),
    'id'            => 'footer-left',
    'description'   => __( 'Appears in the footer section of the site.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Centre', 'wrdsb' ),
    'id'            => 'footer-centre',
    'description'   => __( 'Appears in the footer section of the site.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Right', 'wrdsb' ),
    'id'            => 'footer-right',
    'description'   => __( 'Appears in the footer section of the site.', 'wrdsb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
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
  ) );
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


function the_breadcrumb() {
  global $post;
  echo '<div class="container container-breadcrumb">';
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

function wrdsb_secondary_school_colours() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  switch ($host[0]) {
    case "bci":
      echo '<!-- Site specific styles for BCI -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/bci.css" rel="stylesheet">';
      break;
    case "chc":
      echo '<!-- Site specific styles for CHC -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/chc.css" rel="stylesheet">';
      break;
    case "eci":
      echo '<!-- Site specific styles for ECI -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/eci.css" rel="stylesheet">';
      break;
    case "eds":
      echo '<!-- Site specific styles for EDS -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/eds.css" rel="stylesheet">';
      break;
    case "fhc":
      echo '<!-- Site specific styles for FHC -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/fhc.css" rel="stylesheet">';
      break;
    case "gci":
      echo '<!-- Site specific styles for GCI -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/gci.css" rel="stylesheet">';
      break;
    case "gnss":
      echo '<!-- Site specific styles for GNSS -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/gnss.css" rel="stylesheet">';
      break;
    case "gps":
      echo '<!-- Site specific styles for GPS -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/gps.css" rel="stylesheet">';
      break;
    case "grc":
      echo '<!-- Site specific styles for GRC -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/grc.css" rel="stylesheet">';
      break;
    case "hrh":
      echo '<!-- Site specific styles for HRH -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/hrh.css" rel="stylesheet">';
      break;
    case "jam":
      echo '<!-- Site specific styles for JAM -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/jam.css" rel="stylesheet">';
      break;
    case "jhs":
      echo '<!-- Site specific styles for JHS -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/jhs.css" rel="stylesheet">';
      break;
    case "kci":
      echo '<!-- Site specific styles for KCI -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/kci.css" rel="stylesheet">';
      break;
    case "phs":
      echo '<!-- Site specific styles for PHS -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/phs.css" rel="stylesheet">';
      break;
    case "sss":
      echo '<!-- Site specific styles for SSS -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/sss.css" rel="stylesheet">';
      break;
    case "wci":
      echo '<!-- Site specific styles for WCI -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/wci.css" rel="stylesheet">';
      break;
    case "wod":
      echo '<!-- Site specific styles for WOD -->'."\r\n";
      echo '<link href="'.get_template_directory_uri().'/css/wod.css" rel="stylesheet">';
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
  return ' [...]<p class="readmore"><a href="'. get_permalink($post->ID) . '"><strong>Read more about</strong> <cite>'. get_the_title($post->ID) .'</cite> &#187;</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

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
    "www",
  );
  if (in_array(($host[0]), $my_domains)) {
    return TRUE;
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

function wrdsb_i_am_a_school() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "schools",
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
    "chinese",
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
    "dsps",
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
    "german",
    "gnss",
    "gps",
    "greek",
    "grc",
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
    "serbian",
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
    "wtt"
  );
  if (in_array(($host[0]), $alpha_codes)) {
    return TRUE;
  }
}

function wrdsb_i_am_a_school_secondary() {
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
    "wod"
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
    "gvc",
    "gvn",
    "hes",
    "hig",
    "hil",
    "how",
    "jdp",
    "jfc",
    "jma",
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

function wrdsb_i_am_a_school_with_schoolday() {
  $parsed_url = parse_url(site_url());
  $host = explode('.', $parsed_url['host']);
  $alpha_codes = array(
    "schools",
    "gnss",
    "dsps",
    "abe",
    "alp",
    "ave",
    "ayr",
    "bci",
    "bdn",
    "bgd",
    "blr",
    "bre",
    "brp",
    "cdc",
    "cha",
    "cle",
    "cnc",
    "coh",
    "con",
    "cor",
    "cre",
    "ctr",
    "doo",
    "elg",
    "elz",
    "est",
    "fgl",
    "fhl",
    "flo",
    "fra",
    "gcp",
    "grc",
    "gvc",
    "gvn",
    "hes",
    "hig",
    "hil",
    "how",
    "jdp",
    "jfc",
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
    "mil",
    "mjp",
    "mof",
    "mrg",
    "nam",
    "ndd",
    "nlw",
    "qsm",
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
    "sss",
    "sta",
    "stj",
    "stn",
    "stw",
    "sud",
    "sun",
    "tri",
    "wel",
    "wgd",
    "wlm",
    "wod",
    "wpk",
    "wsh",
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

// standardizing log in logo
if (!function_exists( 'my_login_logo' )) {
  function my_login_logo() { ?>
      <style type="text/css">
          .login h1 a {
              background-image: url(http://www.wrdsb.ca/wp-content/themes/wordpress-theme/images/WRDSB_Logo.svg);
              padding-bottom: 30px;
              background-size: 150px 150px;
              height: 150px;
              width: 150px;
          }
      </style>
  <?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
}

// setting the url
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Change the Lost Password Text from the WordPress Login
function change_lostpassword_text ( $lostpassword_newtext ) {
     $lostpassword_words = "Lost your password?";
     if ($lostpassword_newtext == $lostpassword_words){$lostpassword_newtext = 'Forgot your password? Change it with MyPassword!';}
        return $lostpassword_newtext;
     }
add_filter( 'gettext', 'change_lostpassword_text' );

/* Redirect the lost password link to My Password */
add_filter( 'lostpassword_url', 'my_lost_password_page', 10, 2 );
function my_lost_password_page( $lostpassword_url, $redirect ) {
    //return home_url( 'https://mypassword.wrdsb.ca/?redirect_to=' . $redirect );
    $lostpassword_url = 'https://mypassword.wrdsb.ca/';
    return $lostpassword_url;
}
