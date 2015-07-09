<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>

	<form method="post" autocomplete="off" action="<?php echo $post_url;?>" id="checkout_form">
		
      	<div class="text-info">
		<?php  $currency = $invoice->getCurrency();
         		echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_PAYMENT_AMOUNT');
         ?>
        </div>
        <hr>
        <fieldset class="form-horizontal">
        <legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_CARD_DETAILS'); ?></legend>
        <div class="form-group control-group">
        	<div class ="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_CARD_NUMBER')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="cardnumber" value="" id=card-number></input></div>
        </div>
        
        <div class="form-group control-group">
        	<div class ="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_CVC')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="cvd" value=""></input></div>
        </div>
        
       <div class="form-group control-group">
       		<div class ="col-sm-4">
          		<div class="control-label "><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_EXPIRATION_DATE')?></label></div>
          	</div>
			<div class="controls col-sm-5">
				<div class="row">
				<?php
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
		        $select = '<div class="col-xs-8"><select name="exp_month" class="form-control pull-left">'."\n";
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
		        $select = '<div class="col-xs-4"><select name="exp_year" class="form-control pull-left">';
		        foreach( $rangeOfYear as $year )
		        {
		            $select .= "<option value=".substr($year, -2);
		            $select .= ">$year</option>\n";
		        }
		        $select .= '</select></div>';
         		
		        echo $select;
         ?>
          </div>
         </div>
        </div> 
        
        <input type="hidden" name="protocol" 		value="<?php echo $qp_protocol;?>" />
		<input type="hidden" name="msgtype" 		value="<?php echo $qp_msgtype;?>" />
		<input type="hidden" name="merchant" 		value="<?php echo $qp_merchant;?>" />
		<input type="hidden" name="language" 		value="<?php echo $qp_language;?>" />
		<input type="hidden" name="ordernumber" 	value="<?php echo $qp_ordernumber;?>" />
		<input type="hidden" name="cardtypelock" 	value="<?php echo $qp_cardtypelock;?>" />
		<input type="hidden" name="description" 	value="<?php echo $qp_description;?>" />
		<input type="hidden" name="testmode" 		value="<?php echo $qp_testmode;?>" />
		<input type="hidden" name="secret" 			value="<?php echo $qp_secret;?>" />
      </fieldset>
      
        <div class="row form-horizontal">
        	<div class="col-sm-6 col-sm-offset-4 pull-left">
				<button id="pp-payment-app-buy" type="submit" name="buy" class="btn btn-primary" id="pp-payment-app-buy"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_BUY')?></button>
  	  			<a class="btn btn-default" id="quickpay-pay-cancel" href="<?php echo $cancel_url; ?>"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_QUICKPAY_CANCEL')?></a>
  	  		</div>        	
        </div>
        
      <input type="hidden" name="payment_key" value="<?php echo $payment_key;?>" />
	</form>

<?php 
