/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Javascript
* @contact 		shyam@readybytes.in
*/
(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.
if (typeof(payplans.apps)=='undefined'){
	payplans.apps = {};
}

payplans.apps.basictax = {
	validateCountry:function(){
		//disable checkout button only when no country is selected
		if(payplans.jQuery('#app_basictax_country_id').val() != 0 ){
			payplans.jQuery('#app_basictax_country_id').removeClass('invalid');
			payplans.jQuery('#payplans-order-confirm').removeClass('ui-button-disabled');
			payplans.jQuery('#payplans-order-confirm').removeClass('ui-state-disabled');
			payplans.jQuery('#payplans-order-confirm').attr("disabled", false);
		}
		else{
			payplans.jQuery('#app_basictax_country_id').addClass('invalid');
			payplans.jQuery('#payplans-order-confirm').addClass('ui-button-disabled');
			payplans.jQuery('#payplans-order-confirm').addClass('ui-state-disabled');
			payplans.jQuery('#payplans-order-confirm').attr("disabled", true);
		}
	},
	
	apply: function(){
		var invoiceKey = payplans.jQuery('input[name="invoice_key"]').val();
		var country = payplans.jQuery('#app_basictax_country_id').val();
		var url = "index.php?option=com_payplans&view=invoice&task=trigger&event=onPayplansTaxRequest&invoice_key="+invoiceKey;
		
		// args to pick
		//var args= Array(orderKey, country);
		
		// remove the error message
		payplans.apps.basictax.displayError('');
		
		//disable the button
		payplans.apps.basictax.validateCountry();
		
		payplans.ajax.go(url,{'event_args' : {'invoice_key' : invoiceKey, 'country' : country}});
	},
	
	displayError: function(message){
		payplans.jQuery('#app-tax-apply-error').html(message);
		if(message !== ''){
			payplans.jQuery('#app-tax-apply-error').css('display','block');
		}
		else{
			payplans.jQuery('#app-tax-apply-error').css('display','none');
		}
	}
}

payplans.jQuery(document).ready(function (){
	if(xi_url_base.indexOf('administrator') == -1){
		// disable payment button
		payplans.apps.basictax.validateCountry();
		// update order details as per tax
		payplans.apps.basictax.apply();
	}
	// attach tax information update handler
	payplans.jQuery('#app_basictax_country_id').bind('change', payplans.apps.basictax.apply);
});


// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);