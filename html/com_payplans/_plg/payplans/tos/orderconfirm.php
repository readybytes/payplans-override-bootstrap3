<?php
/**
* @copyright	Copyright (C) 2009 - 2009 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		shyam@readybytes.in


*/
if(defined('_JEXEC')===false) die();
if(!empty($content)):?>
<script type="text/javascript">
(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.
if (typeof(payplans.apps)=='undefined'){
		payplans.apps = {};
}

payplans.apps.tos = {
	click : function(url, title){
		 var call = { 'url': url, 'data': {'iframe': true }};
         xi.ui.dialog.create(call);
         xi.ui.dialog.title(title);
	}
};

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);
</script>

<div>
		<?php foreach($content as $contents):?>
		<div class="control-group">
		  <div class="controls">
			<input type="checkbox" name="tos" value="tos" data-validation-minchecked-message="<?php echo XiText::_('COM_PAYPLANS_JS_TERMS_CONDITIONS'); ?>" minchecked="1" class="pp-tos-condition"/>
			<?php echo $contents;?>
		   </div>
		</div>		
		<?php endforeach;?>
</div>
<?php endif;?>
<?php 

