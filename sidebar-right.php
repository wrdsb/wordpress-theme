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
  <?php dynamic_sidebar( 'sidebar-right' ); ?>
<?php endif; ?>
