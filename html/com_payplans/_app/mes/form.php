<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	MES
* @contact 		support+payplans@readybytes.in
*/

if(defined('_JEXEC')===false) die();?>
	<form method="post" action="<?php echo $post_url;?>" id="checkout_form">
		<div  class="text-info">    
				<?php  $currency = $invoice->getCurrency();
		         		echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_PAYMENT_AMOUNT');
		         ?>
        	</div>
        	<hr />
	
		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_CARD_DETAILS'); ?></legend>
      <div class="form-horizontal">
        
		    <div class="row form-group control-group">
		    	<div class="col-sm-4">
		    		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_CARD_NUMBER')?></label></div>
		    	</div>
		      	<div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="card_number" value="" id=card-number></input></div>
		    </div>
        
		    <div class="row form-group control-group">
		    	<div class="col-sm-4">
		      		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_EXPIRATION_DATE')?></label></div>
		      	</div>
				<div class="controls col-sm-5"><?php
					/*** array of months ***/
				    $months = array(
				            '01'=>XiText::_('JANUARY'),
				            '02'=>XiText::_('FEBRUARY'),
				            '03'=>XiText::_('MARCH'),
				            '04'=>XiText::_('APRIL'),
				            '05'=>XiText::_('MAY'),
				            '06'=>XiText::_('JUNE'),
				            '07'=>XiText::_('JULY'),
				            '08'=>XiText::_('AUGUST'),
				            '09'=>XiText::_('SEPTEMBER'),
				            '10'=>XiText::_('OCTOBER'),
				            '11'=>XiText::_('NOVEMBER'),
				            '12'=>XiText::_('DECEMBER'));
		
				    /*** current month ***/
				    $select = '<div class ="row"><div class="col-xs-8"><select name="exp_month" class="pull-left form-control">'."\n";
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
				    $select = '<div class="col-xs-4"><select name="exp_year" class="pull-left form-control">';
				    foreach( $rangeOfYear as $year )
				    {
				        $select .= "<option value=".$year;
				        $select .= ">$year</option>\n";
				    }
				    $select .= '</select></div></div>';
		     		
				    echo $select;
		     ?>
		     </div>
		    </div>
        
		    <div class="row form-group control-group">
		    	<div class="col-sm-4">
		      		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_CVN_NUMBER')?></label></div>
		      	</div>
		      <div class="controls col-sm-5"><input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="cvv2" value=""></input></div>
		    </div>
      </div>
      
        <fieldset class="form-horizontal">
      		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_MES_PERSONAL_DETAILS'); ?></legend>

	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_MES_CARD_HOLDER_STREET')?></label></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="required form-control" name="cardholder_street_address" value=""></input></div>
	        </div>
        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_MES_CARD_HOLDER_ZIP')?></label></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="required form-control" name="cardholder_zip" value=""></input></div>
	        </div>
        
        </fieldset>
        
         <fieldset class="form-horizontal row">
	      <div class="col-sm-offset-4 col-sm-8">
					<button id="pp-payment-app-buy" type="submit" name="buy" class="btn btn-primary btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_BUY')?></button>
  	  				<div class="btn btn-default btn-lg"><a id="paypalpro-pay-cancel" href="<?php echo $cancel_url; ?>"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_CANCEL')?></a></div>        	
        	      </div>
      </fieldset>
      
	  <input type="hidden" name="payment_key" value="<?php echo $payment_key;?>" />
      <input type="hidden" name="transaction_amount" value="<?php echo $amount;?>" />
      <input type="hidden" name="transaction_type" value="D" />
      <input type="hidden" name="invoice_number" value="<?php echo $invoice_key;?>" />
	</form>
<?php
