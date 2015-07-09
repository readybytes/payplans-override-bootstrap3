<?php
/**
 * @copyright	Copyright (C) 2009 - 2014 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Frontend
 * @contact 	support+payplans@readybytes.in
 */
if(defined('_JEXEC')===false) die();

?>

<div>
	<table class="table">
	   	<thead>
			<th><small><?php echo XiText::_("COM_PAYPLANS_APP_EASYBLOG_SUBMISSION_CATEGORY");?></small></th>
			<th><small><?php echo XiText::_("COM_PAYPLANS_APP_EASYBLOG_SUBMISSION_ALLOWED"); ?></small></th>
			<th><small><?php echo XiText::_("COM_PAYPLANS_APP_EASYBLOG_SUBMISSION_CONSUMED");?></small></th>
		</thead>
			
		<?php foreach($render_data as $render):?>						
		<tr>
			<td><small><?php  echo $render['title'];?></small></td>	
			<td><small><?php  echo $render['allowed'];?></small></td>	
			<td><small><?php  echo $render['consumed'];?></small></td>	
		</tr>
			
		<?php endforeach;?>
	</table>
	<div class="text-error pp-gap-bottom05" ><?php echo XiText::_("COM_PAYPLANS_APP_EASYBLOG_SUBMISSION_NOTICE");?></div>
</div>
<?php 