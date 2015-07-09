/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Javascript
* @contact 		payplans@readybytes.in
*/

// define payplans, if not defined.
(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.	
payplans.update = {
		
		card : function(invoice_id){
		  var card_number = $("#mes_card_number").val();
		  var exp_month   = $("#mes_exp_month").val();
		  var exp_year    = $("#mes_exp_year").val();
		  
		  if(card_number == "")
		  {
			  $(".update-card-error").css('display', 'block');
				 $("#mes_card_number").focus();
				 return false;
		  }
		  
          $('#payplans-update-card').attr('disabled','disabled');
		  var url = "index.php?option=com_payplans&view=user&task=trigger&event=onPayplansUpdateCardData&card_number="+card_number+"&exp_month="+exp_month+"&exp_year="+exp_year+"&invoice_id="+invoice_id;
		  payplans.ajax.go(url);
		}
	}

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);

