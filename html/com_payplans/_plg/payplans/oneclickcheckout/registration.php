<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Oneclickcheckout
* @contact 		support+payplans@readybytes.in


*/
if(defined('_JEXEC')===false) die();


?>
<script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'registration.js');?>" type="text/javascript"></script>

<div>
	<div class="row pp-gap-top10">
		<div class="col-xs-offset-3 col-xs-8">
			<?php $returnUrl = base64_encode("index.php?option=com_payplans&view=invoice&task=confirm&invoice_key=".JRequest::getVar('invoice_key')."&fromOneClickCheckout=1");?>	
			<a onclick="payplans.user.openLoginPopup('<?php echo $returnUrl?>')"><?php echo XiText::_("COM_PAYPLANS_LOGIN_LINK");?></a>
		</div>
	</div>

	<div class="row form-group pp-gap-top10 control-group">
		<div class="col-xs-3">
			<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTERATION_USERNAME');?>
		</div>
		<div class="col-xs-9 row">		
			<div class="col-xs-10 controls">
				<input type="text"  id="payplansRegisterAutoUsername" name="payplansRegisterAutoUsername" class="form-control placeholder required "/>
				<div class="text-warning pp-gap-bottom05" id="err-payplansRegisterAutoUsername"></div>
			</div>
			<div class="pp-gap-top05 payplansRegisterAutoUsername">
				<span class="label label-success"><i class="fa fa-check icon-white"></i></span>
					<span class="label label-warning"><i class="fa fa-times icon-white"></i></span>
					<span class="label label-info"><i class="fa fa-refresh  icon-white"></i></span>
			</div>
			
		</div>
	</div>

	<div class="row form-group control-group">
		<div class="col-xs-3">
			<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTERATION_EMAIL');?>
		</div>
		<div class="col-xs-9 row">
			<div class="col-xs-10 controls">
				<input type="text"  id="payplansRegisterAutoEmail" name="payplansRegisterAutoEmail" class="validate-email placeholder required form-control" />
				<div class="text-warning pp-gap-bottom05" id="err-payplansRegisterAutoEmail"></div>	
			</div>
			<div class="pp-gap-top05 payplansRegisterAutoEmail">
				<span class="label label-success"><i class="fa fa-check icon-white"></i></span>
				<span class="label label-warning"><i class="fa fa-times icon-white"></i></span>
				<span class="label label-info"><i class="fa fa-refresh  icon-white"></i></span>
			
			</div>
			
		</div>
	</div>

	<div class="row form-group control-group ">
		<div class="col-xs-3">
			<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTERATION_PASSWORD');?>
		</div>
		
		<div class="col-xs-9 row">
		<div class="col-xs-10 controls">
				<input type="password" id="payplansRegisterAutoPassword" name="payplansRegisterAutoPassword" class="form-control required" />
				<div class="text-warning pp-gap-bottom05" id="err-payplansRegisterAutoPassword"></div>
		</div>
		<div class="pp-gap-top05 payplansRegisterAutoPassword">
			<span class="label label-success"><i class="fa fa-check icon-white"></i></span>
			<span class="label label-warning"><i class="fa fa-times icon-white"></i></span>
			<span class="label label-info"><i class="fa fa-refresh  icon-white"></i></span>
			
		</div>		
		
		</div>
	</div>
	<?php
        if($this->params->get('show_captcha', 0)){
              JPluginHelper::importPlugin('captcha');
		$dispatcher = JDispatcher::getInstance();
		$dispatcher->trigger('onInit','payplans_dynamic_recaptcha');
		$displayCaptcha = $dispatcher->trigger('onDisplay',array('payplans_dynamic_recaptcha', 'payplans_dynamic_recaptcha','payplans_dynamic_recaptcha'));
		echo array_shift($displayCaptcha);
       } ?>
	
</div>
<?php 
