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
payplans.apps.euvat = {
	
		/* XITODO : move to order namespace */
		validateCountryAndPurpose:function(){
			
			var disable = false;
	
			//disable checkout button only when no country is selected
			payplans.jQuery('#app_euvat_country_id').addClass('invalid');
			var country = payplans.jQuery('#app_euvat_country_id').val();
			if(country != 0 ){
				payplans.jQuery('#app_euvat_country_id').removeClass('invalid');
			}else{
				disable = disable || true;
			}
			
			// check purpose is correct
			if(payplans.jQuery('#app_euvat_use_purpose').is(':visible')){
				payplans.jQuery('#app_euvat_use_purpose').addClass('invalid');
				var purpose = payplans.jQuery('#app_euvat_use_purpose').val();
				if(purpose != 0 || payplans.jQuery('#app_euvat_use_purpose').css('display')=='none'){
					payplans.jQuery('#app_euvat_use_purpose').removeClass('invalid');
				}else{
					disable = disable || true;
				}
	
				// check business purpose
				if(purpose == 2){				
					var businessName = payplans.jQuery('#app_euvat_business_name').val();
					payplans.jQuery('#app_euvat_business_name').removeClass('invalid');
					if(businessName == ''){
						payplans.jQuery('#app_euvat_business_name').addClass('invalid');
						disable = disable || true;
					}
					
					if(payplans.jQuery('#app_euvat_business_vatno').hasClass('invalid')){
						disable = disable || true;
					}
					
				}
			}    	
			payplans.jQuery('#payplans-order-confirm').attr("disabled", disable);
		},
		
		changePurpose : function(){
			var purpose = payplans.jQuery('#app_euvat_use_purpose').val();
			payplans.jQuery('.eu-vat-buisness-fields').hide();
			
			//show business fields if required
			if(purpose==2){
				payplans.jQuery('.eu-vat-buisness-fields').show();
			}
			
			payplans.apps.euvat.validateCountryAndPurpose();
			
			// apply tax
			payplans.apps.euvat.apply();
		},
		
		apply: function(){
			var invoiceKey = payplans.jQuery('input[name="invoice_key"]').val();
			var country = payplans.jQuery('#app_euvat_country_id').val();
			var purpose = payplans.jQuery('#app_euvat_use_purpose').val();
			var businessName = payplans.jQuery('#app_euvat_business_name').val();
			var businessVat = payplans.jQuery('#app_euvat_business_vatno').val();
			
			var url = "index.php?option=com_payplans&view=invoice&task=trigger&event=onPayplansTaxRequest&invoice_key="+invoiceKey;			
			// args to pick
			var args= Array(invoiceKey, country, purpose, businessVat,businessName);
			
			// remove the error message
			payplans.apps.euvat.displayError('','#app-euvat-business-vatno-error');
			payplans.apps.euvat.displayError('','#app-euvat-use-purpose-error');			
						
			//disable the button
			payplans.apps.euvat.validateCountryAndPurpose();
			
			payplans.ajax.go(url,{'event_args':args});
		},
		
		displayError: function(message, loc){
			payplans.jQuery(loc).html(message);
			payplans.jQuery(loc).hide();
			if(message !== ''){
				payplans.jQuery(loc).show();
			}
		},
		
		disablefields: function(){
			payplans.jQuery('#euvat_purpose').hide();
			payplans.jQuery('#app_euvat_use_purpose').hide();
			payplans.jQuery('#euvat_business_name_label').hide();
			payplans.jQuery('#euvat_business_vatno_label').hide();
			payplans.jQuery('#app_euvat_business_name').hide();
			payplans.jQuery('#euvat_business_vatno_div').hide();
		},

		enablefields: function(){
			payplans.jQuery('#euvat_purpose').show();
			payplans.jQuery('#app_euvat_use_purpose').show();
			payplans.jQuery('#euvat_business_name_label').show();
			payplans.jQuery('#euvat_business_vatno_label').show();
			payplans.jQuery('#app_euvat_business_name').show();
			payplans.jQuery('#euvat_business_vatno_div').show();
			var purpose = payplans.jQuery('#app_euvat_use_purpose').val();
			payplans.jQuery('.eu-vat-buisness-fields').hide();
			
			//show business fields if required
			if(purpose==2){
				payplans.jQuery('.eu-vat-buisness-fields').show();
			}
		}
	};

payplans.jQuery(document).ready(function (){
	
	// disable payment button
	payplans.apps.euvat.validateCountryAndPurpose();
	payplans.apps.euvat.changePurpose();
	
	// attach tax information update handler
	payplans.jQuery('#app_euvat_country_id').bind('change', payplans.apps.euvat.apply);
	payplans.jQuery('#app_euvat_use_purpose').bind('change', payplans.apps.euvat.changePurpose);
	payplans.jQuery('#app_euvat_business_vatno').bind('change', payplans.apps.euvat.apply);
});

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);
