<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();

$invoice_key = $invoice->getKey();
$created_date = PayplansHelperFormat::date($invoice->getCreatedDate());
//get paid-on date from wallet entry
$modification_date = PayplansHelperFormat::date($invoice->getPaidDate());



$payment = $invoice->getPayment();
$currency = $invoice->getCurrency();

// status of invoice
$class = '';
switch($invoice->getStatus()){
	case PayplansStatus::INVOICE_CONFIRMED :
		$class = 'label-danger';
		break;
	case PayplansStatus::INVOICE_PAID :
		$class = 'label-success';
		break;
		
	case PayplansStatus::INVOICE_REFUNDED :
		$class = 'label-default';
		break;
		
	default:
		$pending_text = XiText::_('COM_PAYPLANS_STATUS_INVOICE_PENDING');
		$class = 'label-warning';
		break;
}

?>

<div id='invoice' class="thumbnail pp-gap-top10" style="padding: 1%;">
	<!--  Section 1 starts -->
	<div class='row clearfix'>
		<div class="col-sm-5 pp-gap-top10">
			<img style="max-width:300px; max-height:120px;" class="pp-gap-left10" src="<?php echo JURI::base().XiFactory::getConfig()->companyLogo; ?>" />&nbsp;
		</div>
		<div class="col-sm-4 col-sm-offset-3">
			<div class="">
				<h3><?php echo XiFactory::getConfig()->companyName; ?></h3>
				<p class='small'>
					<?php echo XiFactory::getConfig()->companyAddress;?><br />
					<?php echo XiFactory::getConfig()->companyCityCountry; ?><br />
					<?php if(!empty(XiFactory::getConfig()->companyPhone)):?>
					<?php echo XiText::_('COM_PAYPLANS_INVOICE_PHONE_NUMBER'); 
					      echo XiFactory::getConfig()->companyPhone; ?>
					<?php endif;?>
				</p>
			</div>
		</div>
	</div>
	<hr class='pp-gap-top10'>
	<!--  Section 1 ends -->
	

	<!--  Section 2 start -->
	<div class="pp-gap-top10 row clearfix">
		<div class="col-sm-4">
			<h4><?php echo XiText::_('COM_PAYPLANS_INVOICE_CREATED_DATE'), ' ', $created_date; ?></h4>
				<div class='label label-default payplans-font-inherit' >	
					<?php $amount   = $invoice->getTotal(); 
					echo "&nbsp;&nbsp;&nbsp;".$this->loadTemplate('partial_amount', compact('currency', 'amount'))."&nbsp;&nbsp;&nbsp;";?>
				</div>
		</div>
		
		
		
		<div class="col-sm-4 col-sm-offset-4">
			<h4> 
			<?php if($invoice->getStatus() == PayplansStatus::INVOICE_PAID):?>
				<?php echo XiText::_('COM_PAYPLANS_INVOICE_PAID_ON'), ' ' ,$modification_date; ?>
			<?php else:?>
				&nbsp;
			<?php endif;?>
			 </h4>
			
			<div class='label label-default <?php echo $class;?> payplans-font-inherit'>
				<?php echo ($invoice->getStatus()==PayplansStatus::NONE) ? $pending_text : $invoice->getStatusName();?>
			</div>
		</div>
		
	</div>	
	<!--  Section 2 end -->
	<hr />
	
	<!---------------THREE BLOCKS FOR INVOICE DETAILS------------------------>
	<div class='row clearfix'>
		
		<!----BILL TO DETAILS-------------->
		<div class="col-sm-4">
			<h4><?php echo XiText::_('COM_PAYPLANS_INVOICE_BILL_TO'); ?></h4>
			<p>
				<?php echo $user->getRealname(); ?><br />
				<?php echo $user->getEmail(); ?><br />
				<!-- ADDITIONAL DETAILS PARTIAL -->
				<?php echo $this->loadTemplate('partial_extra_details', compact('invoice')); ?>
			</p>
		</div>
		
		<div class="col-sm-4 col-sm-offset-4 payplans-wordbreak">
			<h4><?php echo XiText::_('COM_PAYPLANS_FRONT_INVOICE_DETAILS'); ?></h4>
			
			<span>
				<?php echo XiText::_('COM_PAYPLANS_INVOICE_PURCHASED_PLAN');?>:&nbsp;
				<strong><?php echo $invoice->getTitle(); ?></strong>
			</span><br />
			
			<span>
				<?php echo XiText::_('COM_PAYPLANS_INVOICE_KEY'); ?>:&nbsp;
				<strong><?php echo $invoice_key; ?></strong>
			</span><br />
			
			<?php  
			 if(($invoice->getStatus() == PayplansStatus::INVOICE_PAID)):?>
				<span>
					<?php echo XiText::_('COM_PAYPLANS_INVOICE_PAYMENT_METHOD'); ?>:&nbsp;
					<strong>
						<?php 
						if(isset($payment) && ($payment instanceof PayplansPayment) && $payment->getId()){	
						 	echo $payment->getAppName();
						}else{
						 	echo XiText::_('COM_PAYPLANS_TRANSACTION_PAYMENT_GATEWAY_NONE');
						}
						?>
					</strong>
				</span>
			<?php endif;?>
		</div>
		
	</div>
	
	
	<!-- 
			--------------------------------------------------------------------------------------------------------
						DISPLAY MODIFIRES			
			--------------------------------------------------------------------------------------------------------
	 -->

	 		<table class='table pp-gap-top30 ' <?php echo (XiFactory::getConfig()->rtl_support) ? 'dir=rtl': '';?>>
			 			<thead>
				 			<tr>
			 					<th class='col-sm-8'><?php echo XiText::_('COM_PAYPLANS_INVOICE_DESCRIPTION'); ?></th>
			 					<th class='col-sm-4 text-left'>
			 						<span class="col-sm-10">
			 							<?php echo XiText::_('COM_PAYPLANS_INVOICE_AMOUNT'); ?>
			 						</span>
			 					</th>
				 			</tr>
			 			</thead>
			 			
			 			<tbody>							
							<tr>
									<td class='col-sm-8'>
										<div><?php echo XiText::_('COM_PAYPLANS_INVOICE_PRICE'); ?></div>
										<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_TAXABLE'); ?>)</sup>&nbsp;</div>
									</td>
									<td  class="col-sm-4 text-left">
										<span class="col-sm-10">
											<?php  $currency = $invoice->getCurrency();
														$amount   = $invoice->getSubtotal();
														echo $this->loadTemplate('partial_amount', compact('currency', 'amount'));?>
										</span>
									</td>
							</tr>
							
					 		<?php 
								$discountables = $invoice->getModifiers(array('serial'=>array(PayplansModifier::FIXED_DISCOUNTABLE,PayplansModifier::PERCENT_DISCOUNTABLE,PayplansModifier::PERCENT_OF_SUBTOTAL_DISCOUNTABLE), 'invoice_id'=>$invoice->getId()));
								$discountables = PayplansHelperModifier::_rearrange($discountables);
								foreach ($discountables as $discountable): 
								//if ( 0 == $discountable->_modificationOf ) continue;?>
								<tr>
						 	  		<td class='col-sm-8'>
			                   			<div><?php echo XiText::_($discountable->get('message'));?></div>
                   						<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_DISCOUNTABLE_TAXABLE'); ?>)</sup>&nbsp;</div>
				                   </td>
				                   <td class="col-sm-4 text-left">
				                   		<span class="col-sm-10">
					 						<span><?php echo ($discountable->_modificationOf < 0) ? '(-)' : '(+)'; ?></span>
					 						<span>
					 							<?php $amount = str_replace('-', '' ,$discountable->_modificationOf); 
													echo $this->loadTemplate('partial_amount', compact('currency', 'amount'));?>
											</span>
										</span>
									</td>
								</tr>
							<?php endforeach;
							
						 		$taxables = $invoice->getModifiers(array('serial'=>array(PayplansModifier::PERCENT_TAXABLE,PayplansModifier::PERCENT_OF_SUBTOTAL_TAXABLE), 'invoice_id'=>$invoice->getId()));
								$taxables = PayplansHelperModifier::_rearrange($taxables);
						 		 
						 		foreach ($taxables as $taxable):  
								//if ( 0 == $taxable->_modificationOf ) continue;?> 
								<tr>
								 	<td class='col-sm-8'>
								 		<div><?php echo $taxable->get('message')?></div>
										<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_TAXABLE'); ?>)</sup>&nbsp;</div>
									</td> 
		 							<td class="col-sm-4 text-left">
		 								<span class="col-sm-10">												 	  
					 						<span><?php echo ($taxable->_modificationOf < 0) ? '(-)' : '(+)'; ?></span>
					 						<span>
					 							<?php $amount = str_replace('-', '' ,$taxable->_modificationOf); 
					 								echo $this->loadTemplate('partial_amount', compact('currency', 'amount')); ?>
					 						</span>
				 						</span>
				 	  				</td>
								</tr>
							<?php endforeach;

								$nonTaxables = $invoice->getModifiers(array('serial'=>array(PayplansModifier::FIXED_NON_TAXABLE,PayplansModifier::PERCENT_NON_TAXABLE,PayplansModifier::PERCENT_OF_SUBTOTAL_NON_TAXABLE), 'invoice_id'=>$invoice->getId()));
							 	$nonTaxables = PayplansHelperModifier::_rearrange($nonTaxables);

								foreach ($nonTaxables as $nonTaxable): 
								//if ( 0 == $nonTaxable->_modificationOf ) continue; ?> <tr>
								<tr>
									<td class='col-sm-8'> 
										<div><?php echo $nonTaxable->get('message')?></div>
										<div><sup>(<?php echo XiText::_('COM_PAYPLANS_ORDER_CONFIRM_NON_TAXABLE'); ?>)</sup>&nbsp;</div>
									</td> 
									<td  class="col-sm-4 text-left">	
										<span class="col-sm-10">												 	  
					 						<span><?php echo ($nonTaxable->_modificationOf < 0) ? '(-)' : '(+)'; ?></span>
					 						<span>
					 							<?php $amount = str_replace('-', '' ,$nonTaxable->_modificationOf); 
					 								echo $this->loadTemplate('partial_amount', compact('currency', 'amount')); ?>
					 						</span>
				 						</span>
									</td>
								</tr>
							<?php endforeach; ?>
			
							<?php if ( '0' != $invoice->getDiscount() ): ?>
				 			<tr>
			 					<td class='col-sm-8'><?php echo XiText::_('COM_PAYPLANS_INVOICE_DISCOUNT'); ?></td>
			 					<td class='col-sm-4 text-left'>
			 						<span class="col-sm-10">
				 						<span>(-)</span>
				 						<span>
				 							<?php $amount = $invoice->getDiscount();
										  	echo $this->loadTemplate('partial_amount', compact('currency', 'amount'));?>
										 </span>
									</span>
								</td>
				 			</tr>
				 			<?php endif; ?>
				 			
				 			<?php if ( '0' != $invoice->getTaxAmount() ): ?>
				 			<tr>
			 					<td class='col-sm-8'><?php echo XiText::_('COM_PAYPLANS_INVOICE_TAX'); ?></td>
			 					<td class='col-sm-4 text-left'>
			 						<span class="col-sm-10">
			 						<span>(+)</span>
			 						<span>
			 							<?php $amount = $invoice->getTaxAmount();
					        			echo $this->loadTemplate('partial_amount', compact('currency', 'amount'));?>
					        		</span>
					        		</span>
								</td>
				 			</tr>							 	  
						 	<?php endif; ?>
						 	
						 	<tr>
					 			<td class='col-sm-8'>
					 				<strong><?php echo XiText::_('COM_PAYPLANS_INVOICE_TOTAL'); ?></strong>
					 			</td>
					 			<td class='col-sm-4 text-left'>
			 						<span class="col-sm-10">
			 							<strong>
							 				<?php $amount   = $invoice->getTotal(); 
									  		echo $this->loadTemplate('partial_amount', compact('currency', 'amount')); ?>
							  			</strong>
			 						</span>
			 					</td>
					 		</tr>		 	  
		 			</tbody>
			 </table>
	 
	
		<!--  Notes Section -->
		<?php if (!empty(XiFactory::getConfig()->note)) :?>
		<hr>
		<div class="alert alert-warning">
			<p><?php echo XiFactory::getConfig()->note;?></p>
		</div>
		<?php endif;?>
</div>

<div class='clearfix'>
	<?php echo $this->loadTemplate('invoice_action');?> 
</div>
<?php 
