<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	SobiPro
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>
		<table class="table">
		<thead>
			<th><small><?php echo XiText::_("COM_PAYPLANS_APP_SOBIPRO_SUBMISSION_CATEGORY");?></small></th>
			<th><small><?php echo XiText::_("COM_PAYPLANS_APP_SOBIPRO_SUBMISSION_ALLOWED"); ?></small></th>
			<th><small><?php echo XiText::_("COM_PAYPLANS_APP_SOBIPRO_SUBMISSION_CONSUMED");?></small></th>
		</thead>
		<?php foreach($sobipro_entries as $render):?>
				<tr>
					<td><small><?php  echo $render->title;?></small></td>	
					<td><small><?php  echo $render->count;?></small></td>	
					<td><small><?php  echo $render->consumed;?></small></td>	
				</tr>
		<?php endforeach;?>
	</table>
	<div class="text-error" ><small><?php echo XiText::_("COM_PAYPLANS_APP_SOBIPRO_SUBMISSION_NOTICE");?></small></div>
<?php 
