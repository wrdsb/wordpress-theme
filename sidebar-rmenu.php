<?php
/**
 * The menu on the right of the content.
 * Contains nothing by default.
 * Optionally, displays a custom menu.
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
*/
?>

  <?php # If we have a menu in the 'right' menu location ... ?>
  <?php if (has_nav_menu('right')) {
  //wp_nav_menu(array('theme_location' => 'right', 'menu_class' => '', 'container' => false));
  ?>
<div class="navbar my-sub-navbar" id="section_navigation" role="navigation">
  <div class="sub-navbar-header" aria-labelledby="section_navigation">
    <button type="button" class="navbar-toggle toggle-subnav" data-toggle="collapse" data-target=".sub-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <span class="navbar-brand">Subnav</span>
  </div>
    <div class="collapse sub-navbar-collapse">
      <div class="sub-menu-heading">
        <?php $menu_locations = get_nav_menu_locations(); ?>
        <?php $menus = wp_get_nav_menus(); ?>
        <?php foreach ($menus as $menu) {
          if ($menu->term_id == $menu_locations['right']) {
            echo '<span>'.$menu->name.'</span>';
          }
        } ?>
      </div>
      <div class="sub-menu-items">
        <?php wp_nav_menu(array('theme_location' => 'right', 'menu_class' => 'rmenu', 'container' => false)); ?>
      </div>
    </div>
</div> <!-- end navigation -->
<?php }
