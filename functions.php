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

  // Enable support for Post Thumbnails in pages and posts, and declare two sizes.
  add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
  //set_post_thumbnail_size( 672, 372, true );
  //add_image_size( 'wrdsb-full-width', 1038, 576, true );

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

  // This theme allows users to set a custom background.
  add_theme_support( 'custom-background', apply_filters( 'wrdsb_custom_background_args', array(
    'default-color' => 'f5f5f5',
  ) ) );

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
 * Register three WRDSB widget areas.
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
//require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
//require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
//if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
  //require get_template_directory() . '/inc/featured-content.php';
//}
