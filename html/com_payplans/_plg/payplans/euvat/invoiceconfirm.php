<?php
/**
* @copyright	Copyright (C) 2009 - 2009 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		shyam@readybytes.in


*/
if(defined('_JEXEC')===false) die();
?>
<script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'euvat.js');?>" type="text/javascript"></script>
<div class="form-horizontal pp-gap-top10">
	<div class="control-group form-group">
		<div class="col-xs-6">
				<?php echo XiText::_('COM_PAYPLANS_ENTER_TAX_INFORMATION') ?> 
		</div>
		<div class="col-xs-6">
					<?php echo PayplansHtml::_('country.edit', 'app_euvat_country_id', $country, array('option_none'=>true,'style'=>'class="input-medium img-responsive form-control"')); ?>
					<input type="hidden" name="invoice_key" value="<?php echo $invoice_key; ?>" />
			<span id="app-euvat-country-id-error" class="text-error"></span>
		</div>
	</div>
	
	
	<div class="form-group control-group">
		<div class="col-xs-6">
			<div class="pp-title" id="euvat_purpose">
				<?php echo XiText::_("COM_PAYPLANS_EUVAT_USE_PURPOSE"); ?>
			</div>
		</div>
		<div class="col-xs-6">
			<?php 
				$options = array();
				$options[] = PayplansHtml::_('select.option', 0, XiText::_('COM_PAYPLANS_APP_EUVAT_USE_PURPOSE_SELECT'));
				$options[] = PayplansHtml::_('select.option', PLG_EUVAT_PURPOSE_PERSONAL, XiText::_('COM_PAYPLANS_APP_EUVAT_USE_PURPOSE_PERSONAL'));
				$options[] = PayplansHtml::_('select.option', PLG_EUVAT_PURPOSE_BUSINESS, XiText::_('COM_PAYPLANS_APP_EUVAT_USE_PURPOSE_BUSINESS'));
		    	echo PayplansHtml::_('select.genericlist', $options, 'app_euvat_use_purpose', 'class="input-medium img-responsive form-control"', 'value', 'text', $purpose);
		    ?>
			<span id="app-euvat-use-purpose-error" class="text-error hide" ></span>
		</div>
	</div>
	
	
	<div class="form-group control-group eu-vat-buisness-fields <?php echo $purpose== PLG_EUVAT_PURPOSE_PERSONAL ? 'hide' : ''; ?>">
		<div class = "col-xs-6" id="euvat_business_name_label" >
				<?php echo XiText::_("COM_PAYPLANS_EUVAT_BUSINESS_NAME"); ?>
		</div>
		<div class="col-xs-6">
				<input id="app_euvat_business_name" name="app_euvat_business_name" class="required form-control" value="<?php echo $business_name; ?>" onBlur="payplans.apps.euvat.apply();"/>
		</div>
	</div>
	
	
	<div class="form-group control-group eu-vat-buisness-fields <?php echo $purpose== PLG_EUVAT_PURPOSE_PERSONAL ? 'hide' : ''; ?>">
		<div class = "col-xs-6" id="euvat_business_vatno_label">
				<?php echo XiText::_("COM_PAYPLANS_EUVAT_BUSINESS_VATNO"); ?>
		</div>
		<div class="col-xs-6" id="euvat_business_vatno_div">
			<input id="app_euvat_business_vatno" name="app_euvat_business_vatno" class="required form-control" title="<?php echo XiText::_('COM_PAYPLANS_EUVAT_BUSINESS_VATNO_DESC');?>" value="<?php echo $business_vatno; ?>" />
			<span id="app-euvat-business-vatno-error"  class="text-error" style="display:none;width:100%;">&nbsp;</span>
		</div>
	</div>
</div>
<?php 