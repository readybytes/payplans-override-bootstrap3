<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Frontend
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>

<div>

	<?php 
		$titles = array();
		foreach ($easydiscuss_badges as $badge){
			$titles[] = $badge->title;
		}
		
		$titles = array_unique($titles);
	?>
	
	    <ul>
              <?php foreach($titles as $title):?>
                     <li><?php echo $title;?></li>
              <?php endforeach;?>
         </ul>
   
</div>




