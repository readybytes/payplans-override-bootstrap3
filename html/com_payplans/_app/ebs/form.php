<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	EBS
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>
<?php echo PayplansHtml::script(dirname(__FILE__).DS.'ebs.js'); ?>

<div class="pp-grid_12">
	<form method="post" action="<?php echo $post_url;?>" id="checkout_form">
      	<div  class="text-info">         
         <?php  $currency = $invoice->getCurrency();
         		echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_PAYMENT_AMOUNT');
         ?>
        </div>
        <hr />
       <fieldset class="form-horizontal">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_PERSONAL_DETAILS');?></legend>
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_NAME')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="name" value=""/></div>
        </div>
         <div class="row form-group control-group">
         <div class="col-sm-4">
           <div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_ADDRESS')?></label></div>
         </div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="address" value=""/></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_CITY')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="city" value=""/></div>
        </div>
        <div class="row form-group control-group">
        	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_STATE')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text"  class="required form-control" name="state" value=""/></div>
        </div>
         <div class="row form-group control-group">
         	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_COUNRTY')?></label></div>
           	</div>
          <div class=" required controls col-sm-5"><?php echo PayplansHtml::_('country.edit', 'country','AFG', array('style'=>'class="form-control"'),'isocode3');?></div>				
        </div>
         <div class="row form-group control-group">
         	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_POSTAL_CODE')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="postal_code" value=""/></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_PHONE')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="phone" value=""/></div>
        </div>
         <div class="row form-group control-group">
         	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_EMAIL')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="email" class="email required form-control" name="email" value=""/></div>
        </div>
      </fieldset>
       <fieldset class="form-horizontal">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_DETAILS');?></legend>
      	<div class="row form-group control-group">
      		<div class="col-sm-4">
          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SAME_AS_ABOVE')?></div>
          	</div>
          <div class="controls col-sm-5"><input type="checkbox" class="pp-same-as-above" value=""  /></div>
        </div>
		<div class="row form-group control-group">
			<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_NAME')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="ship_name" value=""/></div>
        </div>
         <div class="row form-group control-group">
         	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_ADDRESS')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="ship_address" value=""/></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_CITY')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="ship_city" value=""/></div>
        </div>
        <div class="row form-group control-group">
        	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_STATE')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="ship_state" value=""/></div>
        </div>
         <div class="row form-group control-group">
         	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_COUNRTY')?></label></div>
           	</div>
          <div class="required controls col-sm-5"><?php echo PayplansHtml::_('country.edit', 'ship_country','AFG', array('style'=>'class="form-control"'),'isocode3');?></div>				
       </div>
         <div class="row form-group control-group">
         	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_POSTAL_CODE')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="ship_postal_code" value=""/></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_SHIPPING_PHONE')?></label></div>
           	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="ship_phone" value=""/></div>
        </div>
       
      </fieldset>

	 <fieldset class="form-horizontal">
	 	  <div class="text-center">
	 		<button id="pp-payment-app-buy" class ="btn btn-primary"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_BUY')?></button>
	  	  	<a class="btn btn-default" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=".$payment->getKey()); ?>"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EBS_CANCEL')?></a>
	      </div>
      </fieldset>
      <input type="hidden" name="amount" value="<?php echo $amount;?>" />
      <input type="hidden" name="mode" value="<?php echo $mode;?>" />
      <input type="hidden" name="account_id" value="<?php echo $account_id;?>" />
      <input type="hidden" name="reference_no" value="<?php echo $reference_no;?>" />
      <input type="hidden" name="description" value="<?php echo $invoice->getTitle();?>" />
      <input type="hidden" name="return_url" value="<?php echo $return_url;?>" />
      <input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
    </form>
</div>
<?php 
