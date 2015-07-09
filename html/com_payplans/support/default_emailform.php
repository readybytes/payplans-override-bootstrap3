<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();
?>

	<form action="<?php echo $uri; ?>" method="post" name="site-support-email-form" id="site-support-email-form" class="form-horizontal">
	
	<div class="row">
	<div class="form-group">
		<div class="control-label col-sm-2">
			<?php echo XiText::_('COM_PAYPLANS_SUPPORT_EMAILFORM_SUBJECT');?>
		</div>
		<div class="controls col-sm-10">
			<input type="text" class="required form-control" name="email-form-subject" id="email-form-subject" value="" onblur="payplans.validate.notempty(this.id);" />
			<span id="err-email-form-subject"></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="control-label col-sm-2">
			<?php echo XiText::_('COM_PAYPLANS_SUPPORT_EMAILFORM_FROM');?></div>
		<div class="controls col-sm-10">
			<input type="email" name="email-form-from" class="required form-control" id="email-form-from"  value="<?php echo $from;?>" onblur="payplans.validate.notempty(this.id);"/>
			<span id="err-email-form-from"></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="control-label col-sm-2">
			<?php echo XiText::_('COM_PAYPLANS_SUPPORT_EMAILFORM_BODY');?></div>
		<div class="controls col-sm-10">
			<textarea rows="5" cols="47" name="email-form-body" class="required" id="email-form-body" onblur="payplans.validate.notempty(this.id);"></textarea>
		</div>
	</div>
</div>
	</form>

<?php 
