<?php
/**
 * The menu on the left of the content.
 * Contains a page menu by default.
 * Optionally, replaces page menu with custom menu.
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
*/
?>
<div class="navbar my-sub-navbar" role="navigation">
  

  <?php # If we have a menu in the 'left' menu location ... ?>
  <?php if (has_nav_menu('left')): ?>
  <div class="sub-navbar-header">
    <button type="button" class="navbar-toggle toggle-subnav" data-toggle="collapse" data-target=".sub-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <span class="navbar-brand">Subnav</span>
  </div>
    <div class="collapse navbar-collapse sub-navbar-collapse">
      <div class="sub-menu-heading">
        <?php $menu_locations = get_nav_menu_locations(); ?>
        <?php $menus = wp_get_nav_menus(); ?>
        <?php foreach ($menus as $menu) {
          if ($menu->term_id == $menu_locations['left']) {
            echo '<span>'.$menu->name.'</span>';
          }
        } ?>
      </div>
      <div class="sub-menu-items">
        <?php wp_nav_menu(array('theme_location' => 'left', 'menu_class' => '', 'container' => false)); ?>
      </div>
    </div>

  <?php # Else we display a pages menu by default ?>
  <?php else:
    $exclude = "";
    $siblings = get_pages(array(
      'parent' => $post->post_parent,
      'exclude' => $post->ID, 
      'post_type' => 'page',
    ));
    $children = get_pages(array(
      'sort_order' => 'ASC',
      'sort_column' => 'menu_order',
      'parent' => $post->ID,
      'post_type' => 'page',
    ));
  ?>
    <?php if ($post->post_parent != 0) { ?>
    <div class="sub-navbar-header">
    <button type="button" class="navbar-toggle toggle-subnav" data-toggle="collapse" data-target=".sub-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <span class="navbar-brand">Subnav</span>
  </div>
      <div class="collapse navbar-collapse sub-navbar-collapse">
        <div class="sub-menu-heading">
          <span><a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></span>
        </div>
        <div class="sub-menu-items">
          <ul>
            <?php 
              foreach ($siblings as $sibling) {
                # Get children of sibling
                $nieces = get_pages(array(
                  'parent' => $sibling->ID
                ));
                # Exclude those children
                foreach ($nieces as $niece) {
                  $exclude .= $niece->ID . ",";
                }
              }
              wp_list_pages(array(
                "child_of" => $post->post_parent,
                "exclude" => $exclude,
                "link_before" => "",
                "title_li" => "",
                "sort_column" => "menu_order"
              ));
            ?>
          </ul>
        </div>
      </div>
    <?php } elseif (($post->post_parent == 0) and ($children)) { ?>
    <div class="sub-navbar-header">
    <button type="button" class="navbar-toggle toggle-subnav" data-toggle="collapse" data-target=".sub-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <span class="navbar-brand">Subnav</span>
  </div>
      <div class="collapse navbar-collapse sub-navbar-collapse">
        <div class="sub-menu-heading">
          <span><a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></span>
        </div>
        <div class="sub-menu-items">
          <ul>
            <?php
              wp_list_pages(array(
                "child_of" => $post->ID,
                "depth" => 1,
                "link_before" => "",
                "title_li" => "",
                "sort_column" => "menu_order"
              ));
            ?>
          </ul>
        </div>
      </div>
    <?php } ?>

  <?php endif ?>
</div> <!-- end navigation -->
