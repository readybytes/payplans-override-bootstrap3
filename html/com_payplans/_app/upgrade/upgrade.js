/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Upgrade
* @contact 		support+payplans@readybytes.in
*/
(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.
if (typeof(payplans.apps)=='undefined'){
		payplans.apps = {};
}

payplans.apps.upgrade = {
		getPlansUpgradeTo : function(upgrade_from){
			// var args = Array(upgrade_from);
			var url = "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeToRequest";
			var args   = { 'event_args' : {'subscription_id' : upgrade_from} };
			payplans.ajax.go(url, args);
		},

  		setPlansUpgradeTo : function(upgrade_to, sub_key){
			// hide current div
			// if not selected an element
			if(upgrade_to <= 0){
				return false;
			}
			//xi.jQuery('#payplans-upgrading-from').hide();
			//XITODO: create a new div automatically
			payplans.jQuery('#payplans-upgrading-from').hide();
			payplans.jQuery('#payplans-popup-upgrade-details').show();
			//var args = Array(upgrade_to, sub_key);
			var url = "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeDisplayConfirm";
			var args   = {'event_args':[upgrade_to,sub_key]};
            payplans.ajax.go(url, args);
	
		},

     	setPlansUpgradeToCancel: function(new_order, old_sub_key){
			payplans.jQuery('#payplans-upgrading-from').show();
			payplans.jQuery('#payplans-upgrade-'+old_sub_key+'-to').html('&nbsp;');
			payplans.jQuery('#payplans-popup-upgrade-details').hide();
			//var args = Array(new_order);
			var url = "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeToCancel";
			
			payplans.apps.upgrade.hideButtons();
			payplans.apps.upgrade.hideInfoButtons();
			$('.upgrade-options').hide();
			
			var data = new Array(new_order);
			payplans.ajax.go(url, data, function(){});
        },
        
		hideButtons:function(){
        	$('#button-upgrade-now').hide();
        	$('#button-upgrade-cancel').hide();
        },
        
        displayInfoButtons:function(value){
        	$('.upgrade-options').hide();
        	
        	$('#upgrade-info-'+value).show();
        	$('#upgrade-info-back').show();
        	$('#button-upgrade-now').show();
        	$('#button-upgrade-cancel').hide();
        	
        	$('#upgrade-type').val(value);
        },
        
        hideInfoButtons:function(){    
        	$('.upgrade-info').hide();
        	$('#button-upgrade-now').hide();
        },
        
        showUpgradeButtons:function(){
        	$('.upgrade-options').show();
        	$('#button-upgrade-cancel').show();
        	$('#button-upgrade-now').hide();
        	payplans.apps.upgrade.hideInfoButtons();
        },
        
        upgradeOrder:function(invoiceKey)
        {
        	$('#button-upgrade-now').attr('disabled','disabled');
        	var type = payplans.jQuery('#upgrade-type').val();
        	var url = "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeFromBackend";
        	var args   = {'event_args':[type,invoiceKey]};
			payplans.ajax.go(url,args);
        	
        },

  		getUpgradedDetails : function(upgrade_to, sub_key){
			// hide current div
			// if not selected an element
			if(upgrade_to <= 0){
				return false;
			}

			payplans.jQuery('.payplans-upgrade-payment-details').show();
			//var args = Array(upgrade_to, sub_key);
			var url = "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeDetails";
			var args   = {'event_args':[upgrade_to,sub_key]};
            payplans.ajax.go(url, args);
		},
		
		updateUpgradeDetails : function(details) {

			payplans.jQuery('.payplans-upgrade-regular-price').html(details[0]);
			payplans.jQuery('.payplans-upgrade-unutilized-amount').html(details[1]);
			payplans.jQuery('.payplans-upgrade-payable-amount').html(details[2]);
			payplans.jQuery('.payplans-upgrade-payment-details').show();
			return true;
		},
		
		proceedToUpgrade : function (newPlanId, subscriptionKey, userId) {
			
			payplans.jQuery('#button-upgrade-now').hide();

			var url 			= "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgrade";
			var args   	= {'event_args':[newPlanId, subscriptionKey, userId]};
            payplans.ajax.go(url, args);
			
			return true;
		},

		proceedToUpgradeBackend : function (newPlanId, subscriptionKey, userId) {
			
			payplans.jQuery('#button-upgrade-now').button('loading');
			payplans.jQuery('#upgrade-info-back').hide();
			
			var type = payplans.jQuery('#upgrade-type').val();
			var url 			= "index.php?option=com_payplans&view=plan&task=trigger&event=onPayplansUpgradeFromBackend";
			var args   	= {'event_args':[newPlanId, subscriptionKey, userId, type]};
            payplans.ajax.go(url, args);
			
			return true;
		}
		
};


// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);
