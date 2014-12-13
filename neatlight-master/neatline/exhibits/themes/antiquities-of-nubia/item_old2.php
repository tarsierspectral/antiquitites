
<!-- Thumbnail. -->
<?php
$item = get_current_record('item');
echo files_for_item(array(
'linkAttributes' => array(
'data-lightbox' => "setimages-{$item->id}"
)));
?>

<!-- Link. -->
<?php echo link_to(
get_current_record('item'), 'show', 'View the item metadata'
); ?>

<hr />