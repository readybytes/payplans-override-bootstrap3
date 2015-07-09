<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Frontend
 * @contact 	support+payplans@readybytes.in
 * @author		Puneet Singhal
 */
if(defined('_JEXEC')===false) die();?>


	<form method="post" action="<?php echo $post_url;?>" name="pin-payment-form" id="checkout_form">
		
      	<div class="text-info">
			<?php echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_PAYMENT_AMOUNT');?>
		</div>
		<hr>
		<fieldset class="form-horizontal">
			<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_CREDIT_CARD_DETAIL')?></legend>

			<div class="form-group control-group">
				<div class ="col-sm-4">
					<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_CREDIT_CARD_NUMBER');?></label></div>
				</div>
				<div class="controls col-sm-5">
					<input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="card-number" id=card-number >
				</div>
			</div>
			
			<div class="form-group control-group">
				<div class ="col-sm-4">	
					<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_CREDIT_CARD_CVC');?></label></div>
				</div>
				<div class="controls col-sm-5">
					<input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="card-cvc">
				</div>
			</div>
			
			<div class="form-group control-group">
				<div class ="col-sm-4">
					<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_CREDIT_CARD_EXPIRATION');?></label></div>
				</div>
				
				<div class="controls col-sm-5">
					<div class="row">
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
					$select = '<div class="col-xs-8"><select name="card-expiry-month" class="form-control pull-left">'."\n";
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
					$select = '<div class="col-xs-4"><select name="card-expiry-year" class="form-control pull-left">';
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
		</fieldset>
		
		<fieldset class="form-horizontal">
	      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_PERSONAL_DETAILS'); ?></legend>
	        <div class="form-group control-group">
	        	<div class ="col-sm-4">
	          		<div class="control-label "><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_NAME')?></label></div>
	          	</div>
	          <div class="controls col-sm-5">
	          		<input type="text" class="required  form-control" name="card-name" value="" /><br/>
	          		<span style="font-size:0.85em;"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_NAME_MSZ');?></span>
	          </div>
	        </div>
	        
	         <div class="form-group control-group">
	         	<div class ="col-sm-4">
	          		<div class="control-label "><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_EMAIL')?></label></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="required email form-control" name="email" value="<?php echo $email;?>" /></div>
	        </div>
	        
	        <div class="form-group control-group">
	        	<div class ="col-sm-4">
	          		<div class="control-label "><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_ADDRESS_LINE_ONE')?></label></div>
	          	</div>
	          <div class="controls col-sm-5"><textarea name="address" cols="27"  rows="5"  class="required form-control"></textarea></div>
	        </div>
	        
	        <div class="form-group control-group">
	        	<div class ="col-sm-4">
	          		<div class="control-label "><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_CITY')?></label></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="required form-control" name="city" value="" /></div>
	        </div>
	
	        <div class="form-group control-group">
	        	<div class ="col-sm-4">
	          		<div class="control-label "><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_STATE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" name="state" value="" class="form-control" /></div>
	        </div>
	        
	        <div class="form-group control-group">
	        	<div class ="col-sm-4">
	          		<div class="control-label "><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_COUNTRY')?></label></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="required form-control" name="country" value="Australia" /></div>
	        </div>
	
	        <div class="form-group control-group">
	        	<div class ="col-sm-4">
	          		<div class="control-label "><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_ZIP_CODE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" name="zip" value="" class="form-control" /></div>
	        </div>
        
      </fieldset>
      
	  <fieldset class="form-horizontal">
	  	<div class="row">
	  		<div class="col-sm-6 col-sm-offset-4 pull-left">
				<button id="pp-payment-app-buy" class="btn btn-primary btn-large"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_PIN_PAYMENT_BUY');?></button>&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn btn-default btn-large" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=$paymentKey"); ?>"><?php echo XiText::_('COM_PAYPLANS_APP_STRIPE_PAYMENT_CANCEL')?>
				</a>
			</div>
	  	</div>
	</fieldset>
	</form>
<?php 
