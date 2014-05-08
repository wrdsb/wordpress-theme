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
<?php if (has_nav_menu('right')) {
  wp_nav_menu(array('theme_location' => 'right', 'menu_class' => '', 'container' => false));
} ?>
