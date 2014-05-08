<?php
/**
 * The widget region on the left of the content.
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
*/
?>
<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
  <div class="sidebar-left widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-left' ); ?>
  </div><!-- #primary-sidebar -->
<?php endif; ?>
