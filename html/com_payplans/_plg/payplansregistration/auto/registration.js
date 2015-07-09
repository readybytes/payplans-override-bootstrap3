xi.extend({
	registration : {		
		check : function(fieldId, funcName) {
			var $field = payplans.jQuery('#'+fieldId);
	        var url = 'index.php?option=com_payplans&view=user&task='+funcName;
	        
	    		payplans.jQuery('.'+fieldId+' .label-success').hide();
	    		payplans.jQuery('.'+fieldId+'  .label-info').show();
	    		payplans.jQuery('.'+fieldId+'  .label-warning').hide();
			  
	    	
			var args   = {'event_args':[fieldId,$field.val()]};

            payplans.ajax.go(url, args);
		},

		validate : function(fieldId, result, msg) {
			var $field = payplans.jQuery('#'+fieldId);

			payplans.jQuery('#err-'+fieldId).html(msg);
					
        	if(result == true){
        		
    	    	payplans.jQuery('.'+fieldId+' .label-success').show();
    	    	payplans.jQuery('.'+fieldId+' .label-info').hide();
    	    	payplans.jQuery('.'+fieldId+' .label-warning').hide();
        		
	        	return true;
	        }
	       
	    		payplans.jQuery('.'+fieldId+' .label-success').hide();
	    		payplans.jQuery('.'+fieldId+' .label-info').hide();
	    		payplans.jQuery('.'+fieldId+' .label-warning').show();
        	
		}
	}
});



payplans.jQuery(document).ready(function (){	

	payplans.jQuery('.label-success').hide();
	payplans.jQuery('.label-info').hide();
	payplans.jQuery('.label-warning').show();
	
	payplans.jQuery('#payplansRegisterAutoUsername').blur(function(){
		
    			payplans.jQuery('.'+this.id+' .label-success').hide();
    			payplans.jQuery('.'+this.id+' .label-info').hide();
    			payplans.jQuery('.'+this.id+' .label-warning').show();
		
		payplans.jQuery(this).trigger("submit.validation").trigger("validationLostFocus.validation");
		
		if (!payplans.jQuery(this).jqBootstrapValidation("hasErrors")) {
				xi.registration.check(this.id, 'checkusername');
		}
		
	});

	payplans.jQuery('#payplansRegisterAutoEmail').blur(function(){
		
    			payplans.jQuery('.'+this.id+' .label-success').hide();
    			payplans.jQuery('.'+this.id+' .label-info').hide();
    			payplans.jQuery('.'+this.id+' .label-warning').show();
		
		payplans.jQuery(this).trigger("submit.validation").trigger("validationLostFocus.validation");
		
		if (!payplans.jQuery(this).jqBootstrapValidation("hasErrors")) {
			xi.registration.check(this.id, 'checkemail');
		}
	});
	
	payplans.jQuery('#payplansRegisterAutoPassword').blur(function(){
		
    			payplans.jQuery('.'+this.id+' .label-success').hide();
    			payplans.jQuery('.'+this.id+' .label-info').hide();
    			payplans.jQuery('.'+this.id+' .label-warning').show();
    	
    	if (!payplans.jQuery(this).jqBootstrapValidation("hasErrors")) {
    		
        		payplans.jQuery('.'+this.id+' .label-success').show();
        		payplans.jQuery('.'+this.id+' .label-info').hide();
        		payplans.jQuery('.'+this.id+' .label-warning').hide();			
    	}
	});
});