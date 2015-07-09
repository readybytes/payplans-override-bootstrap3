<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>

<div class="well">
    <div class="page-header">
    	<h2 class="text-center"><?php echo XiText::_('COM_PAYPLANS_FRONT_END_DASHBOARD_NO_ACCESS');?></h2>
    	<h3 class="text-center"><small><?php echo XiText::_('COM_PAYPLANS_FRONT_END_DASHBOARD_NO_ACCESS_MESSAGE');?></small></h3>
    	<p class="text-center">
			<a href="<?php echo XiRoute::_('index.php?option=com_payplans&view=plan&task=subscribe'); ?>" class="btn btn-default btn-primary">
			<?php echo XiText::_('COM_PAYPLANS_DASHBOARD_ORDER_WIDGET_ACTION_SUBSCRIBE_PLAN');?>
			</a> 
		</p>
    </div>
</div>