<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	PayFlow
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>

<form method="post" action="<?php echo $post_url;?>" id="checkout_form">
	<div class="text-info">
	<?php  $currency = $invoice->getCurrency();
         	echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_PAYMENT_AMOUNT');
         ?>
	</div>
	<hr />

      <fieldset class="form-horizontal">
      		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_CREDIT_CARD_DETAILS'); ?></legend>
      	
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_CREDIT_CARD_TYPE')?></label></div>
          	</div>
          	<div class="controls col-sm-5">
          			<select name="CARDTYPE" class="form-control">
							<option value="Visa">Visa</option>
							<option value="MasterCard">MasterCard</option>
							<option value="Discover">Discover</option>
							<option value="Amex">American Express</option>
					</select>
          	</div>
          	
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_CREDIT_CARD_NUMBER')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="ACCT" value="" id=card-number></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
        		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_EXPIRATION_DATE')?></label></div>
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
				        $select = '<div class ="row"><div class="col-xs-8"><select name="EXPDATE" class="pull-left form-control">'."\n";
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
				        $select = '<div class="col-xs-4"><select name="EXPYEAR" class="pull-left form-control">';
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
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_CCV')?></label></div>
          	</div>
          <div class="controls col-sm-5">
          		<input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="CVV2" value=""></input>
          </div>
        </div>
      </fieldset>
      <fieldset class="form-horizontal">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_PERSONAL_DETAILS'); ?></legend>
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_FIRST_NAME')?></div>
          	</div>
          <div class="controls col-sm-5"><input type="text"  name="BILLTOFIRSTNAME" value="" class="form-control"></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_LAST_NAME')?></div>
          	</div>
          <div class="controls col-sm-5"><input type="text"  name="BILLTOLASTNAME" value="" class="form-control"></input></div>
        </div>
        
         <div class="row form-group control-group">
         	<div class="col-sm-4">
          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_EMAIL')?></div>
          	</div>
          <div class="controls col-sm-5"><input type="email" class="email form-control" name="BILLTOEMAIL" value=""></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_PHONE_NUMBER')?></div>
          	</div>
          <div class="controls col-sm-5"><input type="text"  name="BILLTOPHONENUM" value="" class="form-control"></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_STREET')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="BILLTOSTREET" value=""></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_CITY')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="BILLTOCITY" value=""></input></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_STATE')?></div>
          	</div>
          <div class="controls col-sm-5"><input type="text"  name="BILLTOSTATE" value="" class="form-control"></input></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_COUNRTY')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input class="required form-control" type="text" name="BILLTOCOUNTRY" value="US"></input> </div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_ZIP_CODE')?></label></div>
          	</div>
          <div class="controls col-sm-5"><input type="text" class="required form-control" name="BILLTOZIP" value=""></input></div>
        </div>      
        
      </fieldset>
		    	
	        <fieldset class="form-horizontal row">
	     	 	<div class="col-sm-offset-4 col-sm-8">
			        		<button id="pp-payment-app-buy" type="submit" name="buy"  class="btn btn-primary btn-lg" ><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_BUY')?> </button>
			        		<span>
			        				<a href="<?php echo $cancel_url; ?>" class="btn btn-default btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PAYFLOW_CANCEL')?></a>
			        		</span>
			        	</div>  
	      </fieldset>
	      <input type="hidden" name="payment_key" value="<?php echo $payment_key;?>" />
	</form>
<?php 

