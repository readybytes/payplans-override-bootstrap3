<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	oneclickcheckout 
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();
?>
<div class="pp-login-popup">
<div class="row">
		<form id="loging_popup" action="#" method="get" novalidate="">
		
			<div class="col-xs-offset-1 text-error"><span class="err-payplansLoginError">&nbsp;</span>&nbsp;</div>
			<div>&nbsp;</div>
			
			<div class="form-group control-group">
				<div class="col-xs-4 col-xs-offset-1"><label><?php echo XiText::_('COM_PAYPLANS_LOGIN_USERNAME');?></label></div>
				<div class="col-xs-5 controls"><input type="text"  name="payplansLoginUsername" class="form-control payplansLoginUsername required"/></div>
			</div>
			
			<div>&nbsp;</div>
			
			<div class="control-group">
				<div class="col-xs-4 col-xs-offset-1 control-label"><label><?php echo XiText::_('COM_PAYPLANS_LOGIN_PASSWORD');?></label></div>
				<div class="col-xs-5 controls"><input type="password" name="payplansLoginUsername" class="form-control payplansLoginPassword required"/></div>
			</div>			
			
			<div>&nbsp;</div>
			<div>&nbsp;</div>
		</form>
	</div>
</div>
<?php 