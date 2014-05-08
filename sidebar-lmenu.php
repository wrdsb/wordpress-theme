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
      <span><?php echo get_the_title(get_post_top_ancestor_id()); ?></span>
    </div>
    <div class="sub-menu-items">
      <?php if (has_nav_menu('left')) {
        wp_nav_menu(array('theme_location' => 'left', 'menu_class' => '', 'container' => false));
      } else {
        // todo: this is temporary. we need to talk about pages menu.
        $ancestor_id=get_post_top_ancestor_id();
        $descendants = get_pages(array('child_of' => $ancestor_id));
        $incl = "";

        foreach ($descendants as $page) {
          if (($page->post_parent == $ancestor_id) ||
              ($page->post_parent == $post->post_parent) ||
              ($page->post_parent == $post->ID)) {
            $incl .= $page->ID . ",";
          }
        }
        echo '<ul>';
        wp_list_pages(array("child_of" => $ancestor_id, "include" => $incl, "link_before" => "", "title_li" => "", "sort_column" => "menu_order"));
        echo '</ul>';
      } ?>
    </div>
  </div>
</div> <!-- end navigation -->
