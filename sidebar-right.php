<?php
/**
 * The widget region on the right of the content area
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
*/
?>
<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
  <div class="sidebar-right widget-area" role="complementary">
  <?php dynamic_sidebar( 'sidebar-right' ); ?>
  </div>
<?php endif; ?>
