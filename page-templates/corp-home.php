<?php
/*
Template Name: Corporate News Page 2021
*/
?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" role="complementary">
            <h1><?php echo get_the_title($post->ID);?></h1>
        </div>
    </div>
    <div class="row">

    <?php $has_left = FALSE; ?>
    <?php $has_right = FALSE; ?>
    <?php if (is_active_sidebar('sidebar-left') || has_nav_menu('left')) {$has_left = TRUE;} ?>
    <?php if (is_active_sidebar('sidebar-right') || has_nav_menu('right')) {$has_right = TRUE;} ?>

    <?php
    # Both sidebars
    # left column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';
      if (!is_front_page()) {
        get_sidebar('lmenu');
      }
      get_sidebar('left');
      echo '</div>';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-3 col-lg-3">';
      if (!is_front_page()) {
        get_sidebar('lmenu');
      }
      get_sidebar('left');
      echo '</div>';

    # Just right sidebar
      # Nothing to do

    # No sidebars
      # Nothing to do
    endif
    ?>

    <?php
    # Both sidebars
    # content area
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-6 col-md-8 col-lg-8" role="main">';

    # Just left sidebar
    elseif (($has_left == TRUE) and ($has_right == FALSE)):
      echo '<div class="col-sm-9 col-lg-9" role="main">';

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-9" role="main">';

    # No sidebars
    elseif (($has_left == FALSE) and ($has_right == FALSE)):
      echo '<div class="col-sm-12 col-lg-12" role="main">';

    endif
    ?>

            <?php /*<style type="text/css">
                section {
                    border: 1px solid #eee;
                    margin-bottom: 25px;
                    padding: 25px;
                    background-color: #f8f8f8;
                }

                                .seeall {
                    margin: .5rem auto 1.5rem auto;
                    text-align: center;
                    width: 50%;
                    background-color: #005fae;
                    padding: 15px;
                    color: #e1e1e1;
                }

                .seeall a {
                    color: #fff;
                    background-color: #005fae;
                    font-weight: bold;
                }
                article {
                    width: 480px;
                    float: left;
                    padding-right: 50px;
                }

                h1, h2, h3 {
                    text-transform: uppercase;
                }
                .displayImage {
                    float: right;
                    padding-left: 15px;
                    padding-bottom: 15px;
                }
            </style> 
            <article>

        <?php

  // available categories 
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'parent'  => 0
) );

foreach ($categories as $category) {

    // the query
    $the_query = new WP_Query( array( 'category_name' => $category->name, 'posts_per_page' => 5) ); 

      // The Loop
    if ( $the_query->have_posts() ) {
        echo '<h2>' . $category->name . '('. $category->count .')</h2>';
        if ($category->description != '' ) {
            echo '<p>'. $category->description . '</p>';
        }
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
          $date 	= get_the_time(get_option('date_format'), $post->ID);
          $catlink 	= get_category_link( $category->term_id );
              echo '<section>';
          if ( has_post_thumbnail() ) {
              $displayImage = '<div class="displayImage">'.get_the_post_thumbnail().'</div>';
          } else {
              $displayImage = '';
          }
            echo '<h3>'.get_the_title().'</h3>';
            echo $displayImage;
            echo '<p>'. get_the_excerpt().'</p>';
            echo '<p class="readmore"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a> • ' . $date . '</p>';
            echo '</section>';
      }
        echo '<p class="seeall">See all news from the <a href="'.$catlink.'">'.$category->name.'</a> category.</p>';
    } else {
    // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

 }
          ?>

      </article>

      <article>

      <h2>All News</h2>

<?php 
// the query
$the_query = new WP_Query( array('posts_per_page' => 100) ); ?>
 
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- pagination here -->
 
    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post();

        echo '<section>';
          if ( has_post_thumbnail() ) {
              $displayImage = '<div class="displayImage">'.get_the_post_thumbnail().'</div>';
          } else {
              $displayImage = '';
          }
            echo '<h3>'.get_the_title().'</h3>';
            echo $displayImage;
            echo '<p>'. get_the_excerpt().'</p>';
            echo '<p class="readmore"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a> • ' . $date . '</p>';
            echo '</section>';

        //<h2><?php the_title();</h2>
    endwhile; ?>
    <!-- end of the loop -->
 
    <!-- pagination here -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

  </article>

  */?>

<?php

// the query
$paged = get_query_var( 'paged', 1 );
$the_query = new WP_Query( array('posts_per_page' => 10, 'paged' => $paged) );
if ( $the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : $the_query->the_post();
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail()) :
             // link Post Thumbnail to Post
            // $post is from functions.php
            echo '<div class="featuredimage" role="presentation"><a href="'. get_permalink($post->ID) .'">'. the_post_thumbnail('wrdsb-full-width','alt') .'</a></div>';
        endif;

        // change the heading value for news posts
        the_title( '<h2 class="news"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

        if ('post' == get_post_type()) { ?>
              <p class="postdate">Posted <?php echo get_the_date(); ?></p>
        <?php } 

        if ( has_excerpt ()) {
            the_excerpt();
            echo '<p class="readmore"><a href="'. get_permalink($post->ID) . '"><strong>Read more about</strong> <cite>'. get_the_title($post->ID) .'</cite> &#187;</a></p>';
        } else {
            the_excerpt();
        }

        $igc=0;
        foreach((get_the_category()) as $category) {
            if (strtolower($category->cat_name) != 'uncategorized') {
                $igc = 1;
            }
        }

        if ($igc == 1) {
            $display_cats = 1;
        }

        $number_of_tags = count(get_the_tags());

        //if ($number_of_tags > 0) {
        /*if (get_the_tags()) {
            $display_tags = 1;
        }
        */

        if ($number_of_tags != 0) {
            $display_tags;
        }

        if (!isset($display_cats) && isset($display_tags)) {
            echo '<div class="clearfix"></div>';
            echo '<p class="categories" role="menubar">Tags: ';
                    the_tags('',' &middot; ','');
                    echo '</p>';
        } elseif (isset($display_cats) && !isset($display_tags)) {
            echo '<div class="clearfix"></div>';
            echo '<p class="categories" role="menubar">Categories: ';
                    the_category(' &middot; ');
                    echo '</p>';
        } elseif (isset($display_cats) && isset($display_tags)) {
            echo '<div class="clearfix"></div>';
            echo '<p class="categories" role="menubar">Categories: ';
                    the_category(' &middot; ');
                    echo ' Tags: ';
                    the_tags('',' &middot; ','');
                    echo '</p>';
        } 

    endwhile;

    // Previous/next post navigation.
    if ( !$the_query->max_num_pages < 2 ) {
        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }
      
        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
      
        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'home.php' ) ? 'home.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
      
        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $the_query->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => __( '&larr; Previous', 'wrdsb' ),
            'next_text' => __( 'Next &rarr;', 'wrdsb' ),
        ));
      
        if ( $links ) {
            echo '<p>';
            echo $links;
            echo '</p>';
        }
    }

endif;

?>

    </div> <!-- end content area -->

    <?php
    # Both sidebars
    # right column
    if (($has_left == TRUE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3 col-md-2 col-lg-2" role="complementary">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      get_sidebar('right');
      echo '</div>';

    # Just left sidebar
      # Nothing to do

    # Just right sidebar
    elseif (($has_left == FALSE) and ($has_right == TRUE)):
      echo '<div class="col-sm-3" role="complementary">';
      if (!is_front_page()) {
        get_sidebar('rmenu');
      }
      get_sidebar('right');
      echo '</div>';

    # No sidebars
      # Nothing to do

    endif
    ?>

  </div>
</div>

<?php 
// <a class="totop" href="#top"><div>to top</div></a>
get_footer();