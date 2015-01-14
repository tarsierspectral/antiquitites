<?php

/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 cc=76; */

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php 

$dublin_sep = all_element_texts('item',array(
  'return_type' => 'array',
  'show_element_sets' => array('Dublin Core')
));

$dados_neatline = "";

//Dados exibidos antes das figuras

if (isset($dublin_sep['Dublin Core']['Description']))
	$dados_neatline = $dados_neatline." <div class='element-text'>".$dublin_sep['Dublin Core']['Description'][0]."</div> <br>";

$str = "Source: ";


$dados_neatline .= $str;
	
if (isset($dublin_sep['Dublin Core']['Source']))
	$dados_neatline = $dados_neatline." <div class='element-text'>" .$dublin_sep['Dublin Core']['Source'][0]."</div> <br>";	

echo $dados_neatline;

//Dados que serão exibidos depois das figuras



$dados_neatline_pos = "";

if (isset($dublin_sep['Dublin Core']['Contributor']))
	$dados_neatline_pos = $dados_neatline_pos." <div class='element-text'> <b> Contributor: </b>  ".$dublin_sep['Dublin Core']['Contributor'][0]."</div>";

if (isset($dublin_sep['Dublin Core']['Rights']))
	$dados_neatline_pos = $dados_neatline_pos." <div class='element-text'> <b> Copyrights: </b>".$dublin_sep['Dublin Core']['Rights'][0]."</div>";	

//if (isset($dublin_sep['Dublin Core']['Rights']))
//	$dados_neatline_pos = $dados_neatline_pos." <div class='element-text'> <b> Permissões: </b>".$dublin_sep['Dublin Core']['Rights'][0]."</div>";


//php echo all_element_texts('item',array(
//  'return_type' => 'html')); 

?>

<!-- Files. -->
<!-- The following returns all of the files associated with an item. -->
<?php if (metadata('item', 'has files')): ?>
<div id="itemfiles" class="element">
    <?php 
	set_loop_records('files', get_current_record('item')->Files);
	foreach(loop('files') as $file): ?>
		
		<div class="file-display" style="float: left; margin-right: 1em;">
			<!-- Display the file itself-->
			<?php 

				//getting data file
				$dublin_files = all_element_texts(
				$file, 
				array('show_element_sets' => 
					array ('Dublin Core'),
					  'return_type' => 'array'));  

				//Verify if the file is a image, if is insert code to the lightbox
				if (stripos(get_current_record('file')->mime_type,'image') !== false) {

					//Construct label to picture view on lightbox
 				 $label_pic = "";	
					if (isset($dublin_files['Dublin Core']['Title']))
						$label_pic = $label_pic." <span class='lb-caption-bold'>Title: </span>".$dublin_files['Dublin Core']['Title'][0]." <br/>";
					if (isset($dublin_files['Dublin Core']['Description']))
						$label_pic = $label_pic." <span class='lb-caption-bold'>Description: </span>".$dublin_files['Dublin Core']['Description'][0]." <br/>";

					if (isset($dublin_files['Dublin Core']['Creator']))
						$label_pic = $label_pic." <span class='lb-caption-bold'>Creator: </span>".$dublin_files['Dublin Core']['Creator'][0]." <br/>";			
					if (isset($dublin_files['Dublin Core']['Date']))
						$label_pic = $label_pic." <span class='lb-caption-bold'>Date: </span>".$dublin_files['Dublin Core']['Date'][0]." <br/>";							
					if (isset($dublin_files['Dublin Core']['Rights']))
						$label_pic = $label_pic." <span class='lb-caption-bold'>Copyrights: </span>".$dublin_files['Dublin Core']['Rights'][0]." <br/>";		

	

					echo file_markup(get_current_record('file'),array('imageSize' => 'thumbnail','linkAttributes' => array('data-lightbox' => 'setimages', 'title' => $label_pic )));
					
				}
				else { 
					echo file_markup(get_current_record('file')); 
				}

			?>
	
		</div>

	<?php endforeach; ?>
</div>
<?php endif; ?>
<?php


$dublin_sep = all_element_texts('item',array(
  'return_type' => 'array',
  'show_element_sets' => array('Dublin Core')
));

echo $dados_neatline_pos;

?>
<div class="library-link" style="width: 100%; clear:both;">
<hr />

<!-- Link. -->
<?php echo link_to(
  get_current_record('item'), 'show', 'View this record in digital library'
); 

?>
<div />



