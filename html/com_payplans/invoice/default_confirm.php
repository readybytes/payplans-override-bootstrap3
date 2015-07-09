<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();

$subtotal 	= $invoice->getSubtotal();
$currency 	= $invoice->getCurrency();
$total 		= $invoice->getTotal();
$tax_amount	= $invoice->getTaxAmount();
$discount	= $invoice->getDiscount();
$recurring  = $invoice->isRecurring();
?>

<!-- Main Container -->
<div>
	<form action="<?php echo $uri; ?>" method="post" name="site<?php echo $this->getName(); ?>Form" novalidate="">
		<h2><?php echo XiText::_('COM_PAYPLANS_INVOICE_CONFIRM_HEADING');?></h2>
		<div><hr></div>
	<!-- Header -->
	<div class="row">
		<div class="col-sm-6 payplans-wordbreak">
		<h3><?php echo $invoice->getTitle(); ?></h3>
		<span class="text-muted">
			<?php echo $this->loadTemplate('plan_details', compact('invoice','recurring','currency'));?>
		</span>
		</div>
		<h3 class="col-sm-offset1 col-sm-5 text-right first-amount">
			<?php $amount =  $total;?>
			<?php echo $this->loadTemplate('partial_amount', compact('currency', 'amount'));?>
		</h3>
	</div>
	
	<div><hr ></div>
	
	<!-- User Header -->
	<div class="row">	
		<div class="col-sm-6">
			<div><h6><?php echo $user->getRealname(); ?></h6></div>
			<div class="pp-gap-top10"><?php echo $user->getEmail(); ?></div>
			<div class="pp-gap-top10">#<?php echo $invoice->getKey();?></div>
		</div>
		
		<div class="col-sm-6">
			<?php $position = 'pp-registration-details';?>
			<?php echo $this->loadTemplate('partial_position',compact('plugin_result','position'));?>	
		</div>
	</div>
	
	<div><hr ></div>
	
	<!-- Confirm Invoice Details -->
	<div class="row pp-gap-top10 pp-gap-bottom05">
	
		<!-- Customizing information -->
		<div class="col-sm-4">
		
			<?php $position = 'pp-subscription-details';?>
			<?php echo $this->loadTemplate('partial_position',compact('plugin_result','position'));?>

			<?php $position = 'pp-user-mobile-number';?>
			<?php echo $this->loadTemplate('partial_position',compact('plugin_result','position'));?>

			<?php $position = 'pp-user-details';?>
			<?php echo $this->loadTemplate('partial_position',compact('plugin_result','position'));?>
			
		</div>
		
		<!-- Pricing Details -->
		<div class="col-sm-offset-2 col-sm-6">
			<?php $args = compact('invoice', 'order', 'user','subtotal','currency','total', 'tax_amount','discount','recurring', 'plugin_result','payment_apps');?>
			<?php echo $this->loadTemplate('confirm_details',$args);?>
		</div>
		
	</div>
	
	
	
	<!-- Pricing footer -->
	<div class="row well">
	
		<!-- for tos -->
		<div class="col-xs-6 col-sm-9">
			<?php $position = 'default';?>
			<?php echo $this->loadTemplate('partial_position',compact('plugin_result','position'));?>
		</div>

		<!-- for checkout button -->
		<div class="col-xs-6 col-sm-2">
				<button type="submit" id="payplans-order-confirm" class="btn-large btn btn-primary ">
					<i class="fa fa-shopping-cart"></i>
					<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_BTN')?>
				</button>
		</div>

	</div>
	
	<!-- footer -->
	<div class="row">
		<?php $position = 'order-confirm-footer';?>
		<?php echo $this->loadTemplate('partial_position',compact('plugin_result','position'));?>
	</div>

	<input type="hidden" name="payplans_invoice_confirm" value="1" />
	<input type="hidden" name="invoice_key" value="<?php echo $invoice->getKey();?>" />
	<input type="hidden" name="boxchecked" value="0" />

	</form>
</div>
<?php

