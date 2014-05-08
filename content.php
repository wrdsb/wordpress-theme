<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
 */
?>
<?php if (is_single()) :
  the_title( '<h3>', '</h3>' );
else :
  the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
endif; ?>

<?php if ('post' == get_post_type()) { ?>
  <small class="gray-dark">Posted <?php echo get_the_date(); ?></small>
<?php } ?>

<?php the_excerpt(); ?>
