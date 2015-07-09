<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	PaySeal
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>
<!--<script>-->
<!--window.onload = function() -->
<!--{	-->
<!--	  setTimeout(function paysealSubmit(){-->
<!--			document.forms["checkout_form"].submit();-->
<!--		}, 1000);-->
<!--}-->
<!--</script>-->
	<form method="post" action="<?php echo $post_url;?>" id="checkout_form" name="checkout_form">
	   	<div class="<?php if(!$showBuyerDetail){ echo "hide";}?>">
	      	<fieldset>
	      		<legend><?php echo XiText::_('COM_PAYPLANS_APP_PAYSEAL_BUYER_DETAIL')?></legend>
		   		
		  	  		<input type="hidden" class="required" size=25  name=paysealCustomerId 	value="<?php echo $user->buyer_id;?>" 				placeholder="buyer id">
			  	  	<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                      		<input type="text" class="required form-control" name=paysealCustomerName 	value="<?php echo $user->buyer_name;?>"  			placeholder="buyer name"> 
                  		</div>
                	</div>
                	<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                           <input type="email" class="required email form-control"  name=paysealEmail 		value="<?php echo $user->buyer_email;?>" 			placeholder="buyer email">
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                           <input type="text" class="required form-control" name=paysealAddrLine1 	value="<?php echo $user->buyer_address_line1;?>"  	placeholder="buyer address line 1">
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                           <input type="text"  class="form-control" name=paysealAddrLine2 	value="<?php echo $user->buyer_address_line2;?>"	placeholder="buyer address line 2">   
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text"  class="form-control"  name=paysealAddrLine3 	value="<?php echo $user->buyer_address_line3;?>" 	placeholder="buyer Address line 3">
                 		</div>
               		</div>
			  	  	<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealCity 			value="<?php echo $user->buyer_city;?>"	 			placeholder="buyer city">
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealState 		value="<?php echo $user->buyer_state;?>" 			placeholder="buyer state">
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealZip 			value="<?php echo $user->buyer_zip;?>" 				placeholder="buyer zip code">
                 		</div>
               		</div>
			  	  	<div class="row form-group control-group">
			  	  		<div class="controls col-sm-5">
							<?php echo PayplansHtml::_('country.edit', 'paysealCountryAlpha',$user->buyer_country_alpha, array('option_none'=>true,'style'=>'class="form-control"'), 'isocode3');?>
						</div>
					</div>
					
		  	  	
		  	 </fieldset>
	  	 </div>

	  	 <div class="<?php if(!$showShippingDetail){ echo "hide";}?>">
		  	 <fieldset>
	      		<legend><?php echo XiText::_('COM_PAYPLANS_APP_PAYSEAL_SHIPPING_DETAIL')?></legend>
		   			<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="checkbox" class="pp-same-as-previous" value=""/><?php echo XiText::_('COM_PAYPLANS_APP_PAYSEAL_SAME_AS_PREVIOUS')?>   
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="email" class="required email form-control"  name=paysealShippingEmail 		value="<?php echo $user->shipping_email;?>" 			placeholder="shipping email">   
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealShippingAddrLine1 	value="<?php echo $user->shipping_address_line1;?>"  	placeholder="shipping address line 1">   
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                           <input type="text"  class="form-control"  name=paysealShippingAddrLine2 	value="<?php echo $user->shipping_address_line2;?>" 	placeholder="shipping address line 2">   
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text"  class="form-control"  name=paysealShippingAddrLine3 	value="<?php echo $user->shipping_address_line3;?>" 	placeholder="shipping Address line 3">
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealShippingCity 			value="<?php echo $user->shipping_city;?>"	 			placeholder="shipping city">   
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealShippingState 		value="<?php echo $user->shipping_state;?>" 			placeholder="shipping state">
                 		</div>
               		</div>
               		<div class="row form-group control-group">
                  		<div class="controls col-sm-5">
                          <input type="text" class="required form-control"  name=paysealShippingZip 			value="<?php echo $user->shipping_zip;?>"				placeholder="shipping zip code">   
                 		</div>
               		</div>
			  	  	<div class="row form-group control-group">
			  	  		<div class="controls col-sm-5">
						<?php echo PayplansHtml::_('country.edit', 'paysealShippingCountryAlpha',$user->shipping_country_alpha, array('option_none'=>true,'style'=>'class="form-control"'), 'isocode3');?>
     	  	  			</div>
     	  	  		</div>
		  	 </fieldset>
	  	 </div>

		  	  	<input type="hidden" name=order_id 		value=<?php echo $order_id;?>>
		  	  	<input type="hidden" name=customer_ip 	value=<?php echo $customer_ip;?>>
		  	  	<input type="hidden" name=invoice_id 	value=<?php echo $invoice_id;?>>
		  	  	<input type="hidden" name=amount 		value=<?php echo $amount;?>>
		  	  	<input type="hidden" name=currency_code value=<?php echo $currency_code;?>>
		  	  	<input type="hidden" name=payment_key 	value=<?php echo $payment->getKey();?>>
		  	  	<input type="hidden" name=response_url 	value=<?php echo $response_url;?>>
		
		<div class="pp-gap-top20">
	      	<div><button id="pp-payment-app-buy" class ="btn btn-lg btn-primary"><?php echo XiText::_('COM_PAYPLANS_APP_PAYSEAL_PAYMENT_BUY')?></button>
		  	<a class="btn btn-default btn-lg" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=".$payment->getKey()); ?>"><?php echo XiText::_('COM_PAYPLANS_APP_PAYSEAL_PAYMENT_CANCEL')?></a></div>
      	</div>
    </form>
<script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'payseal.js');?>" type="text/javascript"></script>
<?php 
