<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	AutorizeCim
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>
<div class="pp-payment-authorize-arb">
	<form method="post" action="<?php echo $post_url;?>" id="checkout_form">
		<div  class="text-info">         
         <?php  $currency = $invoice->getCurrency();
         		echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_PAYMENT_AMOUNT');
         ?>
         <hr/>
        </div>
      <fieldset class="form-horizontal">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_CREDIT_CARD_DETAILS');?></legend>
        <div class="row form-group control-group">
          <div class ="col-sm-4">
          	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_CREDIT_CARD_NUMBER')?></label></div>
          </div>
          <div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="x_card_num" value="" id=card-number /></div>
        </div>
        <div class="row form-group control-group">
           <div class ="col-sm-4">
           	<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_EXPIRATION_DATE')?></label></div>
          </div>
          <div class="controls col-sm-5">
         <div class ="row"> 
         <?php
			    /*** array of months ***/
		        $months = array(
		                1=>XiText::_('JANUARY'),
		                2=>XiText::_('FEBRUARY'),
		                3=>XiText::_('MARCH'),
		                4=>XiText::_('APRIL'),
		                5=>XiText::_('MAY'),
		                6=>XiText::_('JUNE'),
		                7=>XiText::_('JULY'),
		                8=>XiText::_('AUGUST'),
		                9=>XiText::_('SEPTEMBER'),
		                10=>XiText::_('OCTOBER'),
		                11=>XiText::_('NOVEMBER'),
		                12=>XiText::_('DECEMBER'));
		
		        /*** current month ***/
		        $select = '<div class="col-xs-8"><select name="exp_month" class ="pull-left form-control">'."";
		        foreach($months as $key=>$mon)
		        {
		            $select .= "<option value=".$key;
		            $select .= ">$mon</option>\n";
		        }
		        $select .= '</select></div>';
		        echo $select;
          
		        /*** the current year ***/
				$start_year = date('Y');
				$end_year = $start_year + 20;
				
		        /*** range of years ***/
		        $rangeOfYear = range($start_year, $end_year);
		
		        /*** create the select ***/
		        $select = '<div class="col-xs-4"><select name="exp_year" class ="pull-left form-control">';
		        foreach( $rangeOfYear as $year )
		        {
		            $select .= "<option value=".$year;
		            $select .= ">$year</option>\n";
		        }
		        $select .= '</select></div>';
         		
		        echo $select;
         ?>
         </div>
         </div>
        </div>
        <div class="row form-group control-group">
        	<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_CCV')?></label></div>
            </div>
          <div class="controls col-sm-5"><input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="x_card_code" value="" /></div>
        </div>
      </fieldset>
      <fieldset class="form-horizontal">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_PERSONAL_DETAILS');?></legend>
        <div class="row form-group control-group">
        	<div class ="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_FIRST_NAME')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_first_name" value="" /></div>
        </div>
        <div class="row form-group control-group">
           <div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_LAST_NAME')?></label></div>
          </div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_last_name" value="" /></div>
        </div>
         <div class="row form-group control-group">
         	<div class ="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_EMAIL')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="email" class="email required form-control" name="x_email" value="" /></div>
        </div>
        
	    <?php if ($this->getAppParam('customer_id',0)) :?>
		 <div class="row form-group control-group">
		 	<div class ="col-sm-4">
	       		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_CUSTOMER_ID')?></label></div>
			</div>	       
	       <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_cust_id" value="" /></div>
	     </div>
        <?php endif;
        if ($this->getAppParam('phone_number',0)):?>
         <div class="row form-group control-group">
         	<div class ="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_PHONE_NUMBER')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_phone" value="" /></div>
        </div>

		<?php endif;
		if ($this->getAppParam('fax_number',0)):?>
         <div class="row form-group control-group">
         	<div class ="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_FAX_NUMBER')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_fax" value="" /></div>
        </div>
		<?php endif;
		if($this->getAppParam('company_name',0)) :?>
		<div class="row form-group control-group">
			<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_COMPANY_NAME')?></label></div>
           	</div>
           <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_company" value="" /></div>
        </div>
        <?php endif;?>
        <div class="row form-group control-group">
        	<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_ADDRESS')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_address" value="" /></div>
        </div>
        <div class="row form-group control-group">
        	<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_CITY')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_city" value="" /></div>
        </div>

        <div class="row form-group control-group">
        	<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_STATE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_state" value="" /></div>
        </div>
        <div class="row form-group control-group">
        	<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_ZIP_CODE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_zip" value="" /></div>
        </div>
        <div class="row form-group control-group">
        	<div class ="col-sm-4">
           		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_COUNRTY')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="x_country" value="" /></div>
        </div>
      </fieldset>

	 <fieldset class="row form-horizontal">
	 <div class="col-sm-offset-4 col-sm-8">  
	      	<button id="pp-payment-app-buy" type="submit" class ="btn btn-primary btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_BUY')?></button>
	  	  	<a class="btn btn-default btn-lg" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=".$payment->getKey()); ?>"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_AUTHORIZE_CANCEL')?></a>
	      </div>
      </fieldset>
    
	  <input type="hidden" name="payment_key" value="<?php echo $payment->getKey();?>" />
      <input type="hidden" name="amount" value="<?php echo $amount;?>" />
      
      
	</form>
</div>
