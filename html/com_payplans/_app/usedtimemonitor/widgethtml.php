<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	usedtimemonitor
 * @contact 	support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();
?>
<div class="pp-gap-bottom05">
	<div class="row">
		 <div class="col-sm-6"><strong><?php echo XiText::_("COM_PAYPLANS_USEDTIMEMONITOR_ALLOCATED")?> </strong></div>
		 <div class="col-sm-6"><?php echo $total .' minutes';?></div>
	</div>
	<div class="row">
		 <div class="col-sm-6"><strong><?php echo XiText::_("COM_PAYPLANS_USEDTIMEMONITOR_CONSUMED")?></strong></div>
		 <div class="col-sm-6"><?php echo $total-$remaining .' minutes';?></div>
	</div>
	<div class="row">
		 <div class="col-sm-6"><strong><?php echo XiText::_("COM_PAYPLANS_USEDTIMEMONITOR_REMAINING")?></strong> </div>
		 <div class="col-sm-6"><?php echo $remaining .' minutes';?></div>
	</div>
</div>
<?php 