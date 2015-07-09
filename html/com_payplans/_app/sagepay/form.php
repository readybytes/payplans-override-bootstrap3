<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	SagePay
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>
<div id="sagepay" class="authorize">
	<form method="post" action="<?php echo $post_url;?>" id="checkout_form">
		<div  class="text-info">    
        		 <?php  $Currency = $invoice->getCurrency();
         				echo $this->_render('partial_amount', compact('currency', 'amount'), 'default')." " .XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_PAYMENT_AMOUNT');
         			?>
        </div>
        <hr />
      <fieldset class="pp-secondary pp-color pp-border pp-background">
       <div class="form-horizontal">
         	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_CREDIT_CARD_DETAILS'); ?></legend>
         	
	         <div class="row form-group control-group">
	         	<div class="col-sm-4">
	        		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_CREDIT_CARD_HOLDER')?></label></div>
	        	</div>
	          		<div class="controls col-sm-5"><input type="text" class="required creditcard form-control" name="CardHolder" value=""></input></div>
			</div>
			
			<div class="row form-group control-group">
				<div class="col-sm-4">
	        		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_CARD_TYPE')?></div>
	        	</div>
	          		<div class="controls col-sm-5">
		          		<select name="CardType" class="form-control">
							<option value="VISA">Visa</option>
							<option value="MC">MasterCard</option>
                            <option value="DINERS">Diner’s Club</option>
                            <option value="AMEX">American Express</option>
						</select>
					</div>
			</div>
		
			<div class="row form-group control-group">
				<div class="col-sm-4">
	        		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_CREDIT_CARD_NUMBER')?></label></div>
	        	</div>
	          		<div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="CardNumber" value="" id=card-number></input></div>
			</div>
			
			<div class="row form-group control-group">
				<div class="col-sm-4">
	        		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_CV2')?></label></div>
	        	</div>
	          		<div class="controls col-sm-5"><input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="CV2" value=""></input></div>
			</div>
			
			<div class="row form-group control-group">
				<div class="col-sm-4">
        				<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_START_DATE')?></div>
        		</div>
          		<div class="controls col-sm-5">
          			<div class ="row">
	        			<div class="col-xs-8">
          		 			<select name="StartDateMonth" id="startdatemonth" class="pull-left form-control">
		                    	<option value="01">01</option>
		                    	<option value="02">02</option>
		                    	<option value="03">03</option>
		                    	<option value="04">04</option>
		                    	<option value="05">05</option>
		                    	<option value="06">06</option>
		                    	<option value="07">07</option>
		                    	<option value="08">08</option>
		                    	<option value="09">09</option>
		                    	<option value="10">10</option>
		                    	<option value="11">11</option>
		                    	<option value="12">12</option>
                </select></div>
					<?php
				        /*** the current year ***/
						$start_year = date('y');
						$end_year = $start_year + 20;
						
				        /*** range of years ***/
				        $rangeOfYear = range($start_year, $end_year);
				
				        /*** create the select ***/
				        $select = '<div class="col-xs-4"><select name="StartDateYear" class="pull-left form-control">';
				        foreach( $rangeOfYear as $year )
				        {
				            $select .= "<option value=".$year;
				            $select .= ">20$year</option>\n";
				        }
				        $select .= '</select></div></div>';
		         		
				        echo $select;
		         ?>
	          	</div>
	         </div>
	         		        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	        		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_EXPIRY_DATE')?></div>
	        	</div>
	          		<div class="controls col-sm-5">
	          		<div class ="row">
	        			<div class="col-xs-8">
	          			<select name="ExpiryDateMonth" id="expirydatemonth" class="pull-left form-control">
	                    	<option value="01">01</option>
	                    	<option value="02">02</option>
	                    	<option value="03">03</option>
	                    	<option value="04">04</option>
	                    	<option value="05">05</option>
	                    	<option value="06">06</option>
	                    	<option value="07">07</option>
	                    	<option value="08">08</option>
	                    	<option value="09">09</option>
	                    	<option value="10">10</option>
	                    	<option value="11">11</option>
	                    	<option value="12">12</option>
                	</select></div>
					<?php
				        /*** the current year ***/
						$start_year = date('y');
						$end_year = $start_year + 20;
						
				        /*** range of years ***/
				        $rangeOfYear = range($start_year, $end_year);
				
				        /*** create the select ***/
				        $select = '<div class="col-xs-4"><select name="ExpiryDateYear" class="pull-left form-control">';
				        foreach( $rangeOfYear as $year )
				        {
				            $select .= "<option value=".$year;
				            $select .= ">20$year</option>\n";
				        }
				        $select .= '</select></div></div>';
		         		
				        echo $select;
		         ?>
	          		
	          	</div>
			</div>
      </fieldset>
      
      <fieldset class="form-horizontal row">
	  	<div class="col-sm-offset-4 col-sm-8">
			<button id="pp-payment-app-buy" type="submit" name="buy" class="btn btn-primary btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_BUY')?></button>
        		<div class="btn btn-default btn-lg">
        			<a id="sagepay-pay-cancel" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=".$payment_key); ?>">
        				<?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_SAGEPAY_CANCEL')?>
        			</a>
        		</div>        	
        </div>
      </fieldset>
      
      <input type="hidden" name="Amount" 			value="<?php echo $amount;?>" />
      <input type="hidden" name="Currency" 			value="<?php echo $currency;?>" />
      <input type="hidden" name="invoice_key" 		value="<?php echo $invoice_key;?>" />
      <input type="hidden" name="Vendor" 			value="<?php echo $vendor;?>" />
      <input type="hidden" name="VendorTxCode" 		value="<?php echo 'prefix_' . time() . rand(0, 9999);?>" />
      <input type="hidden" name="Description"  		value="<?php echo $invoice->getTitle();?>" />
      <input type="hidden" name="BillingAgreement" 	value="<?php echo $billingAgreement?>" />
      <input type="hidden" name="TxType" 			value="PAYMENT" />
      
	</form>
</div>
<?php 
