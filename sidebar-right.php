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
  <!--
  <div class="list-group">
    <a href="#" class="list-group-item active">
      <h4 class="list-group-item-heading">School Finder</h4>
      <p class="list-group-item-text">Find school near your home</p>
    </a>
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading">School Calendar</h4>
      <p class="list-group-item-text">Elementary and Secondary School Calendars</p>
    </a>
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading">School Bus</h4>
      <p class="list-group-item-text">Bus delays and cancel</p>
    </a>
  </div>
  -->
  <?php dynamic_sidebar( 'sidebar-right' ); ?>
<?php endif; ?>
