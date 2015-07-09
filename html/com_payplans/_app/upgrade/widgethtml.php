<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Upgrade
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
$location = $this->getLocation();

XiHtml::script($location.DS.'tmpl'.DS.'upgrade.js');
?>


<?php 
	$orderId = $subscription->getOrder();
	$userId 	 = $subscription->getBuyer();								
	$args   	 = "event_args[userid]=$userId&event_args[order_id]=$orderId";
	$url = XiRoute::_("index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeFromRequest&$args"); 
?>
														
<a class="btn btn-default" href="#" onClick="payplans.url.modal('<?php echo $url; ?>');return false; ">
	<i class="fa fa-arrow-up"></i>
	<?php echo XiText::_('COM_PAYPLANS_APP_UPGRADE_BUTTON');?>
</a>
