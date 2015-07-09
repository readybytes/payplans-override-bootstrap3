<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	frontend
 * @contact 	support+payplans@readybytes.in
 */
if(defined('_JEXEC')===false) die(); ?>

<div>
	<table class="table table-borderless">
		<!-- Regular Price -->
			<tr>
				<td>
				<div><?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_REGULAR_TOTAL');?></div>
				<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_DISCOUNTABLE_TAXABLE'); ?>)</sup>&nbsp;</div>
			</td>
			<td class="text-right pp-payment-header-price"><?php echo PayplansHelperFormat::price($subtotal);?></td>
		</tr>

		<!-- Discountable and Taxable Price -->
		<!-- do not add if the amount is zero -->
		<?php 
		$discountables = $invoice->getModifiers(array('serial'=>array(PayplansModifier::FIXED_DISCOUNTABLE,PayplansModifier::PERCENT_DISCOUNTABLE,PayplansModifier::PERCENT_OF_SUBTOTAL_DISCOUNTABLE), 'invoice_id'=>$invoice->getId()));
		$discountables = PayplansHelperModifier::_rearrange($discountables);
		foreach ($discountables as $discountable): 
			//if($discountable->_modificationOf == "0") continue;	?>
			<tr class="discountable-amount">
				<td>
					<div><?php echo XiText::_($discountable->get('message'));?></div>
					<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_DISCOUNTABLE_TAXABLE'); ?>)</sup>&nbsp;</div>
				</td>
				<td class="text-right pp-payment-header-price2">
					<span style="font-size: 11px;"><?php echo ($discountable->_modificationOf < 0) ? '(-)&nbsp;' : '(+)&nbsp;'; ?></span>
					<span class="pp-amount"><?php echo str_replace('-', '' ,PayplansHelperFormat::displayAmount($discountable->_modificationOf)); ?></span>
				</td>
			</tr>
		<?php endforeach;?>
										 	  
		<!-- Taxable Price -->
		<!-- do not add if the amount is zero -->
		<?php 
		$taxables = $invoice->getModifiers(array('serial'=>array(PayplansModifier::PERCENT_TAXABLE,PayplansModifier::PERCENT_OF_SUBTOTAL_TAXABLE), 'invoice_id'=>$invoice->getId()));
		$taxables = PayplansHelperModifier::_rearrange($taxables);
		foreach ($taxables as $taxable): 
			//if($taxable->_modificationOf == "0") continue;	?>
			<tr class="taxable-amount">
				<td>
					<div><?php echo XiText::_($taxable->get('message'));?></div>
					<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_NON_DISCOUNTABLE_TAXABLE'); ?>)</sup>&nbsp;</div>
				</td>
				<td class="text-right pp-payment-header-price2 pp-amount" style="vertical-align:middle;">
					<span style="font-size: 11px;"><?php echo ($taxable->_modificationOf < 0) ? '(-)&nbsp;' : '(+)&nbsp;'; ?></span>
					<span class="pp-amount"><?php echo str_replace('-', '' ,PayplansHelperFormat::displayAmount($taxable->_modificationOf)); ?></span>
				</td>
			</tr>
		<?php endforeach;?>
		
		<!-- Non-Taxable Price -->
		<!-- do not add if the amount is zero -->
		<?php 
		$nonTaxables = $invoice->getModifiers(array('serial'=>array(PayplansModifier::FIXED_NON_TAXABLE,PayplansModifier::PERCENT_NON_TAXABLE,PayplansModifier::PERCENT_OF_SUBTOTAL_NON_TAXABLE), 'invoice_id'=>$invoice->getId()));
		$nonTaxables = PayplansHelperModifier::_rearrange($nonTaxables);
		foreach ($nonTaxables as $nonTaxable) :
			//if($nonTaxable->_modificationOf == "0") continue;	?>
			<tr class="nontaxable-amount">
				<td>
					<div><?php echo XiText::_($nonTaxable->get('message'));?></div>
					<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_NON_TAXABLE'); ?>)</sup>&nbsp;</div>
				</td>

				<td class="text-right pp-payment-header-price2" style="vertical-align:middle;">
					<span style="font-size: 11px;"><?php echo ($nonTaxable->_modificationOf < 0) ? '(-)' : '(+)'; ?></span>
					<span class="pp-amount"><?php echo str_replace('-', '' ,PayplansHelperFormat::displayAmount($nonTaxable->_modificationOf)); ?></span>
				</td>
			</tr>
		<?php endforeach;?>
		
		
		<!-- Total Discount -->
		<!-- do not add if the amount is zero -->
	 		<tr class="discount-amount <?php echo ( $discount != "0" )? '' : 'hide' ; ?>">
				<td><?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_DISCOUNT');?></td>
				<td class="text-right pp-payment-header-price2"><span style="font-size: 11px;">(-)&nbsp;</span><span class="pp-amount"><?php echo PayplansHelperFormat::displayAmount($discount);?></span></td>
			</tr>
		
		<!-- Total Tax -->
		<!-- do not add if the amount is zero -->
		<tr class="tax-amount <?php echo ( $tax_amount != "0" )? '' : 'hide' ; ?>"> 
			<td ><?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_TAX');?></td>
			<td class="text-right pp-payment-header-price2"><span style="font-size: 11px;">(+)&nbsp;</span><span class="pp-amount"><?php echo PayplansHelperFormat::displayAmount($tax_amount) ;?></span></td>
		</tr>
		
		<!-- Total Payable Amount -->
		<tr class="table-row-border">
			<td><?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_AMOUNT_PAYABLE');?></td>
			<td class="text-right pp-payment-header-price payable first-amount">
				<?php $amount = $total;?>
				<?php echo $this->loadTemplate('partial_amount', compact('currency', 'amount'));?>
			</td>
		</tr>

	</table>
	
	<div class="pp-gap-top10 pp-gap-bottom05">
		<?php if(XiFactory::getConfig()->enableDiscount): ?>
				<?php echo $this->loadTemplate('discount'); ?>
	    <?php endif;?>
		
		<?php $position = 'payplans_order_confirm_payment'; ?>
		<?php echo $this->loadTemplate('partial_position', compact('plugin_result','position'));?>
	</div>
	
	<div class="pp-gap-top10 pp-gap-bottom05 row">
			<div class="col-sm-6 col-xs-12">
					<?php echo XiText::_('COM_PAYPLANS_ORDER_MAKE_PAYMENT_FROM');?>
			</div>
			<div class="col-sm-6 col-xs-12">
				<span class="pp-payment-method">
					<?php if(!($invoice->isRecurring()) && (floatval(0) == floatval($total))):?>
							<?php  echo XiText::_('COM_PAYPLANS_ORDER_NO_PAYMENT_METHOD_NEEDED')?>
					<?php else : ?>
							<?php if(count($payment_apps) > 1):?>
								<?php echo PayplansHtml::_('select.genericlist', $payment_apps, 'app_id', 'class=" form-control img-responsive input-medium"' , 'id', 'title');?>
							<?php else : 
								$gateway = array_shift($payment_apps);
								echo $gateway['title'].'<input type="hidden" name="app_id" value="'.$gateway['id'].'">';?>
							<?php endif;?>
					<?php endif;?>
				</span>	
			</div>
	</div>	

</div><?php 
