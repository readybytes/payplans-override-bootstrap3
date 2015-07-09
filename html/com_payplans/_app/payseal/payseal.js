/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
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

		$(document).ready(function() {
			// code to show and hide extra information at dashboard page.
			$(".pp-same-as-previous").click(function(){
				
				var data = {};
				data['paysealEmail']	 	 = 'paysealShippingEmail';
				data['paysealAddrLine1']   	 = 'paysealShippingAddrLine1';
				data['paysealAddrLine2']	 = 'paysealShippingAddrLine2';
				data['paysealAddrLine3']	 = 'paysealShippingAddrLine3';
				data['paysealCity'] 		 = 'paysealShippingCity';
				data['paysealState']		 = 'paysealShippingState';
				data['paysealZip']		 	 = 'paysealShippingZip';
				data['paysealCountryAlpha']	 = 'paysealShippingCountryAlpha';

				if($(this).is(':checked')){
					for(id in data){
						$("input[name='"+data[id]+"']").val($("input[name='"+id+"']").val());
					}
					$("select#paysealShippingCountryAlpha").val($("select#paysealCountryAlpha option:selected").val());

				}
				else{
					for(id in data){
						$("input[name='"+data[id]+"']").val('');
					}
					$("select#paysealShippingCountryAlpha").val('');

				}
				
			});
		});
			
// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);
