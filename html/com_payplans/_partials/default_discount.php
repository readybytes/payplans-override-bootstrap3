<?php
/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();

?>
<div class="row">
		<span class="col-xs-6 col-sm-6" >
				<?php echo XiText::_("COM_PAYPLANS_ENTER_DISCOUNT_CODE"); ?>
		</span>
	
		<div class="col-xs-6 col-sm-6">			
			<div class="input-group">
		    	<input class="form-control" id="app_discount_code_id" type="text" name="app_discount_code" value=""/>
		    	<span class="input-group-btn">
		    	<button type="button" id="app_discount_code_submit" 
		    	class="btn btn-default" data-loading-text="wait..." 
		    	title = "<?php echo XiText::_("COM_PAYPLANS_PRODISCOUNT_APPLY_TOOLTIP"); ?>" 
		    	onClick="payplans.discount.apply(<?php echo $invoice->getId();?>);">
		    	<?php  echo XiText::_("COM_PAYPLANS_APP_DISCOUNT_APPLY"); ?></button></span>
		</div>
		<div id="app-discount-apply-error" class="text-error">&nbsp;</div>
		
	
</div>
</div>
<?php  