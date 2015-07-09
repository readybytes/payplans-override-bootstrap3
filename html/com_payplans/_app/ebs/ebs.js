/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	ebs
* @contact 		support+payplans@readybytes.in
*/

// define payplans, if not defined.
(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.	

		$(document).ready(function() {
			// code to show and hide extra information at dashboard page.
			$(".pp-same-as-above").click(function(){
				
				var data = {};
				data['ship_name']	 	 = 'name';
				data['ship_address']   	 = 'address';
				data['ship_city']	 	 = 'city';
				data['ship_state']	 	 = 'state';
				data['ship_postal_code'] = 'postal_code';
				data['ship_phone']		 = 'phone';
				
				if($(this).is(':checked')){
					for(id in data){
						$("input[name='"+id+"']").val($("input[name='"+data[id]+"']").val());
					}
					$("select#ship_country").val($("select#country option:selected").val());
				}
				else{
					for(id in data){
						$("input[name='"+id+"']").val('');
					}
					$("select#ship_country").val('');
				}
				
			});
		});
			
// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);