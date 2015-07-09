<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	PayPal Pro
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>
	<form method="post" action="<?php echo $post_url;?>" id="checkout_form">
		<div  class="text-info">
			<?php  $currency = $invoice->getCurrency();
         	echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_PAYMENT_AMOUNT');
         	?>
         	<hr/>
        </div>
      <fieldset class="form-horizontal">
      		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_CREDIT_CARD_DETAILS'); ?></legend>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_CREDIT_CARD_TYPE')?></label></div>
          	</div>
          	<div class="controls col-sm-5">
          			<select name="cc_type" class="form-control">
							<option value="Visa">Visa</option>
							<option value="MasterCard">MasterCard</option>
							<option value="Discover">Discover</option>
							<option value="Amex">American Express</option>
					</select>
          	</div>
          	
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_CREDIT_CARD_NUMBER')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="card_num" value="" id=card-number></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
        		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_EXPIRATION_DATE')?></label></div>
        	</div>
        	<div class="controls col-sm-5">
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
				        $select = '<div class ="row"><div class="col-xs-8"> <select name="exp_month" class="pull-left form-control">'."\n";
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
				        $select = '<div class="col-xs-4"><select name="exp_year"  class= "pull-left form-control">';
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
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_CCV')?></label></div>
          	</div>
          <div class="controls col-sm-5">
          		<input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="card_code" value=""></input>
          </div>
        </div>
      </fieldset>
      <fieldset class="form-horizontal pp-secondary pp-color pp-border pp-background pp-small">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_PERSONAL_DETAILS'); ?></legend>
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_FIRST_NAME')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="first_name" value=""></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_LAST_NAME')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="last_name" value=""></input></div>
        </div>
        
         <div class="row form-group control-group">
         	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_EMAIL')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="email"  class="email required form-control" name="email" value=""></input></div>
        </div>
        
		<div class="row form-group control-group">
			<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_MOBILE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="mobile" value=""></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_ADDRESS_LINE_ONE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><textarea name="address" cols="27"  rows="5"  class="required form-control"></textarea></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_CITY')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="city" value=""></input></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_STATE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="state" value=""></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_COUNRTY')?></div>
          	</div>
          <div class="controls col-sm-5">
          <?php 
		     echo JHTML::_('select.genericlist', $countryOptions, 'country', 'class="form-control"', 'value', 'text', 'US');
		     ?>
		  </div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_ZIP_CODE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="zip" value=""></input></div>
        </div>
        
      </fieldset>
		    	
	      <fieldset class="form-horizontal row">
	     	 	<div class="col-sm-offset-4 col-sm-8">
		        	
			        		<button id="pp-payment-app-buy" type="submit" name="buy"  class="btn btn-primary btn-lg" ><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_BUY')?> </button>
			        		<span>
			        				<a href="<?php echo $cancel_url; ?>" class="btn btn-default btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYPAL_PRO_CANCEL')?></a>
			        		</span>
			        	</div>
	      </fieldset>
	      <input type="hidden" name="payment_key" value="<?php echo $payment_key;?>" />
	</form>
<?php 

