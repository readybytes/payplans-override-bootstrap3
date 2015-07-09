<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Renew
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die(); ?>
<?php

	// If order is expired then do not allow to renew
	$order = $subscription->getOrder(PAYPLANS_INSTANCE_REQUIRE);
	if(in_array($order->getStatus(), array(PayplansStatus::ORDER_EXPIRED))){
		return true;
	}
	
?>

<!-- display renew link -->
<?php
if ($subscription->isRecurring() && PayplansStatus::SUBSCRIPTION_EXPIRED == $subscription->getStatus() ) :
?>
	<a class="btn btn-success" href="<?php echo XiRoute::_('index.php?option=com_payplans&view=order&task=trigger&event=onPayplansOrderRenewalRequest&subscription_key='.$subscription->getKey());?>">
		<i class="fa fa-repeat"></i>&nbsp;<?php echo XiText::_("COM_PAYPLANS_ORDER_RENEW_LINK");?>
	</a>
<?php 
elseif ( ('fixed' == $subscription->getExpirationType()) && in_array($subscription->getStatus(), array(PayplansStatus::SUBSCRIPTION_EXPIRED, PayplansStatus::SUBSCRIPTION_ACTIVE)) ) :
?>
	<a class="btn btn-success" href="<?php echo XiRoute::_('index.php?option=com_payplans&view=order&task=trigger&event=onPayplansOrderRenewalRequest&subscription_key='.$subscription->getKey());?>">
		<i class="fa fa-repeat"></i>&nbsp;<?php echo XiText::_("COM_PAYPLANS_ORDER_RENEW_LINK");?>
	</a>
<?php
endif;