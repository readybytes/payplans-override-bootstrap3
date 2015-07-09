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

payplans.apps.gift = {
		add_item : function(){
			// get data to post
			var plan_id  	= $('#plg_plan_id').val();
			var quantity 	= $('#plg_gift_item_quantity').val();
			var invoice_id	= $('#plg_invoice_id').val();
			
			// post data on following url
			var url = "index.php?option=com_payplans&view=invoice&task=trigger&event=onPayplansAddItemRequest";
			var args   = { 'event_args' : {'invoice_id' : invoice_id, 'item_id' : plan_id, 'item_quantity' : quantity} };
			payplans.ajax.go(url, args);
		}
				        
};


// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);
