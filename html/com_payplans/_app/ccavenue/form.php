
<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Ccavenue
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>
	<form id="checkout_form" method="post" name="customerData" action="<?php echo $post_url; ?>">

 		<fieldset class="form-horizontal pp-small">
	      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_PERSONAL_DETAILS');?></legend>
	      	
	        <div class="row form-group control-group">
	          <div class ="col-sm-4">
	          	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_NAME')?></label></div>
	          </div>
	          <div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_name" value="" /></div>
	        </div>
	      
			<div class="row form-group control-group">
			<div class ="col-sm-4">
	           <div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_ADDRESS')?></label></div>
	        </div>
	          	<div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_address" value="" /></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        <div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_CITY')?></label></div>
           	</div>
	          	<div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_city" value="" /></div>
	        </div>
	
	        <div class="row form-group control-group">
	        <div class ="col-sm-4">
	        	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_STATE')?></label></div>
	        </div>
	          	<div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_state" value="" /></div>
	        </div>
	        
	         <div class="row form-group control-group">
	         <div class ="col-sm-4">
	           <div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_ZIP_CODE')?></label></div>
	         </div>
	          <div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_zip" value="" /></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        <div class ="col-sm-4">
	           	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_COUNRTY')?></label></div>
	        </div>
	          	<div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_country" value="" /></div>
	        </div>
	      
          	<div class="row form-group control-group">
          	<div class ="col-sm-4">
	          	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_PHONE_NUMBER')?></label></div>
	        </div>
	          	<div class="controls col-sm-5"><input type="text" class="required form-control" name="billing_tel" value="" /></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        <div class ="col-sm-4">
	          	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_EMAIL')?></label></div>
	        </div>
	          	<div class="controls col-sm-5"><input type="email" class="required email form-control" name="billing_email" value="" /></div>
	        </div>
     
      </fieldset>
	
      	<input type="hidden" 	name="merchant_id" 		value="<?php echo $merchant_id ; ?>" />
		<input type="hidden" 	name="order_id" 		value="<?php echo $order_id; ?>" />
	    <input type="hidden" 	name="amount" 			value="<?php echo $amount; ?>" />
	    <input type="hidden" 	name="currency" 		value="<?php echo $currency; ?>" />
	    <input type="hidden"  	name="redirect_url" 	value="<?php echo $redirect_url; ?>" />
      	<input type="hidden"  	name="cancel_url" 		value="<?php echo $cancel_url; ?>" />
     	<input type="hidden" 	name="language"         value="EN" />
		<input type="hidden" 	name="merchant_param1" 	value="<?php echo $merchant_param1; ?>" />

	 <fieldset class="form-horizontal row">
	      <div class="col-sm-offset-4 col-sm-8">
	      	<button id="pp-payment-app-buy" type="submit" class ="btn btn-primary btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_BUY')?></button>
	  	  	<a class="btn btn-default btn-lg" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=".$payment->getKey()); ?>"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_CCAVENUE_CANCEL')?></a>
	      </div>
      </fieldset>
    
</form>