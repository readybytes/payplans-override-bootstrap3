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
		<?php foreach($render_data as $key => $records):?>			
		
		<fieldset>	
			<legend><h6><?php echo ucfirst($key);?></h6></legend>

			<table class="table">
				<thead>
					<th><small><?php echo XiText::_("COM_PAYPLANS_APP_JREVIEW_SUBMISSION_CATEGORY");?></small></th>
					<th><small><?php echo XiText::_("COM_PAYPLANS_APP_JREVIEW_SUBMISSION_ALLOWED"); ?></small></th>
					<th><small><?php echo XiText::_("COM_PAYPLANS_APP_JREVIEW_SUBMISSION_CONSUMED");?></small></th>
				</thead>

				<?php foreach($records as $key => $value):?>			
					<tr>
						<td><small><?php  echo $key;?></td></small>
						<td><small><?php  echo $value['allowed'];?></td></small>	
						<td><small><?php  echo $value['consumed'];?></td></small>
					</tr>
				<?php endforeach;?>
			</table>
		</fieldset>
		<?php endforeach;?>

	<div class="text-error pp-gap-top05" ><?php echo XiText::_("COM_PAYPLANS_APP_JREVIEW_SUBMISSION_NOTICE");?></div>
<?php 