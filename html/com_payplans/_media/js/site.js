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

		$(document).ready(function() {
			// code to show and hide extra information at dashboard page.
			$(".pp-parenthover").hover(function(){
			  $(this).find('.pp-childhover').show();
			
			},function(){
			     $(this).find('.pp-childhover').hide(); 
			});
			$('.pp-dashboard-less').hide();
		});
	
	  
      $(document).on('click',".pp-dashboard-togglemore",function() {
          var $icon = $(this).children("i[class^='fa fa-chevron']"); 
         if ($icon.hasClass('fa fa-chevron-down')) {
              $icon.removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
             $(this).find('.pp-dashboard-more').hide();
             $(this).find('.pp-dashboard-less').show();
           } 
        else {
             $icon.removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
             $(this).find('.pp-dashboard-less').hide();
             $(this).find('.pp-dashboard-more').show();
            }
       });

		/*--------------------------------------------------------------
		payplans frontend dashboard
		--------------------------------------------------------------*/
		payplans.site.dashboard = {

				loadSubscriptionDetails : function(subscriptionKey){
					var invDetails=payplans.jQuery('#subscription'+subscriptionKey+' .inv-details').html();

					//for do not request same thing again and again
					if (invDetails == "") {
						var url = "index.php?option=com_payplans&view=subscription&task=getDetails&subscription_key="+subscriptionKey;
					
						payplans.ajax.go(url, {}, payplans.site.dashboard.renderSubscriptionDetails);
					}
					return true;
				},

				renderSubscriptionDetails: function(details)
				{
					var subscriptionKey = details[0][1];
					
					for (i = 1; i < details.length; i++){
						payplans.jQuery('#subscription'+subscriptionKey+' .'+details[i][0]).html(details[i][1]);
					}
					
					return true;
				}
		};
		
		
		payplans.site.plan = {		
								sameHeight : function(parent,child,padding) {		
									var tallest = 0;		
									$(child).each(function(){		
									    thisHeight = $(this).height();		
									    if(thisHeight > tallest) {		
										    tallest = thisHeight;		
										}		
									});		
										
									// Check for IE 9 		
									if ($.browser.version = '9.0' && $.browser.msie){		
										return true;		
									}		
											
									if(padding === undefined || padding === null){		
										padding = 0;		
									}		
												
									if(tallest > 0){		
										tallest = tallest + (tallest * padding/100);		
										$(parent).find(child).css({'height': tallest+'px'});		
									}		
										
									return true;		
								}		
						};

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);