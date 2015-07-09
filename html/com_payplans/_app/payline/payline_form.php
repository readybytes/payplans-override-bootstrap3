<?php
/**
 * 
 * @copyright 		Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license 		GNU/GPL, see LICENSE.php
 * @package 		PayPlans
 * @subpackage		Payline
 * @contact 		support+payplans@readybytes.in
 */
if(defined('_JEXEC')===false) die();?>


<form method="post" autocomplete="off" action="<?php echo $paymentUrl;?>" id="checkout_form" name="payment-form">
		<fieldset class="form-horizontal">
			<legend><?php echo XiText::_('COM_PAYPLANS_APP_CREDIT_CARD_DETAIL')?></legend>

			<div class="form-group control-group row">
				<div class ="col-sm-4">
					<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_APP_CREDIT_CARD_NUMBER');?></label></div>
				</div>
				<div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" id=card-number name="card-number" /></div>
			</div>
			<div class="form-group control-group row">
				<div class ="col-sm-4">
					<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_APP_CREDIT_CARD_CVC');?></label></div>
				</div>
				<div class="controls col-sm-5"><input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' id=card-cvc name="card-cvc" /></div>
			</div>
			<div class="form-group control-group row">
				<div class ="col-sm-4">
					<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_APP_CREDIT_CARD_EXPIRATION');?></label></div>
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
				$select = '<div class="col-xs-8"><select id="card-expiry-month" class="form-control" name="card-expiry-month">'."\n";
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
				$select = '<div class="col-xs-4"><select id="card-expiry-year" class="form-control" name="card-expiry-year">';
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
			
			<div class="row">	
				<div class="col-sm-6 col-sm-offset-4 pull-left">
					<button id="pp-payment-app-buy" data-loading-text="processing..." class="btn btn-primary" ><?php echo XiText::_('COM_PAYPLANS_APP_PAYMENT_BUY')?></button>
					<a class="btn btn-default" href="<?php echo XiRoute::_("index.php?option=com_payplans&view=payment&task=complete&action=cancel&payment_key=$paymentKey"); ?>"><?php echo XiText::_('COM_PAYPLANS_APP_PAYMENT_CANCEL')?>
					</a>
				</div>
			</div>	
</fieldset>
<input type="hidden" name="payment_key" value="<?php echo $paymentKey; ?>" />
</form>
<?php 