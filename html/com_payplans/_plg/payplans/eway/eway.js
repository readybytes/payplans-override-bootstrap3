/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Javascript
* @contact 		support+payplans@readybytes.in
*/

// define payplans, if not defined.
(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.	
payplans.update = {
		
			creditcard : function(invoice_id){
			var $inputs =  $('form#update_card_form').find("input,textarea,select");
		
			if ($inputs.jqBootstrapValidation("hasErrors")) {
				$('form#update_card_form').submit();
				//$inputs.trigger("submit.validation");
			    return false;
			}
			
			var data = payplans.jQuery('form#update_card_form').serializeArray();
			$('#payplans-update-card').attr('disabled','disabled');
			var url = "index.php?option=com_payplans&view=user&task=trigger&event=onPayplansUpdateCardProfile&invoice_id="+invoice_id;
			var args   = { 'event_args' : {'params' : data}} ;
			payplans.ajax.go(url, args);
          
		}
	}

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);

