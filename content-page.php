<?php
/**
 * The template used for displaying page content
 */
?>
<?php the_title('<h1>', '</h1>'); ?>
<?php
  the_content();
  edit_post_link('Edit');
?>
<p>Categories: <?php the_category(','); ?></p>
<p><?php the_tags(); ?></p>
