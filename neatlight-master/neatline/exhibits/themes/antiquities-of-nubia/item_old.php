 
<!-- Thumbnail. -->
<?php echo files_for_item(); ?>
 
<!-- Link. -->
<?php echo link_to(
  get_current_record('item'), 'show', 'View the item metadata'
); ?>

<hr />