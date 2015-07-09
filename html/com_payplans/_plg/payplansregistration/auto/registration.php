<?php
/**
* @copyright	Copyright (C) 2009 - 2009 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		shyam@readybytes.in


*/
if(defined('_JEXEC')===false) die();
?>
<script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'registration.js');?>" type="text/javascript"></script>

<div id="auto-register">
	<fieldset class="form-vertical">
		<legend><?php echo XiText::_('COM_PAYPLANS_PLAN_AUTO_REGISTERATION');?></legend>
	
		<div class="form-group">
			
			<div class="control-label">
				<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTERATION_USERNAME');?>
			</div>
			<div class="row">
			<div class="col-xs-11">
				<input type="text" id="payplansRegisterAutoUsername" name="payplansRegisterAutoUsername" class="form-control required"
						pattern="(\w+[\.\@\-\w]*\w*){2,}" placeholder="Username"
						data-validation-pattern-message="<?php echo XiText::sprintf('JLIB_DATABASE_ERROR_VALID_AZ09', 2); ?>" 
				/>
			</div>	
				<span class="payplansRegisterAutoUsername">
					<span class="label label-success"><i class="fa fa-check icon-white"></i></span>
					<span class="label label-warning"><i class="fa fa-times icon-white"></i></span>
					<span class="label label-info"><i class="fa fa-refresh  icon-white"></i></span>
				</span>
			</div>	
				<div class="text-warning pp-gap-bottom05" id="err-payplansRegisterAutoUsername"></div>
		</div>
		
		<div class="form-group">
			<div class="control-label">
				<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTERATION_EMAIL');?>		
			</div>
			<div class="row">
			<div class="col-xs-11">
				<input type="text" id="payplansRegisterAutoEmail" name="payplansRegisterAutoEmail" class="form-control required" placeholder="Email"/>
			</div>	
				<span class="payplansRegisterAutoEmail">
					<span class="label label-success "><i class="fa fa-check icon-white"></i></span>
					<span class="label label-warning"><i class="fa fa-times icon-white"></i></span>
					<span class="label label-info "><i class="fa fa-refresh icon-white"></i></span>
				</span>
				</div>
				<div class="text-warning pp-gap-bottom05" id="err-payplansRegisterAutoEmail"></div>
		</div>
		
		<div class="form-group">
			
			<div class="control-label">
				<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTERATION_PASSWORD');?>		
			</div>
			
			<div class="row">
			<div class="col-xs-11">
				<input type="password"  id="payplansRegisterAutoPassword" name="payplansRegisterAutoPassword" class="form-control required" placeholder="Password"/>
			</div>	
				<span class="payplansRegisterAutoPassword">
					<span class="label label-success"> <i class="fa fa-check icon-white" ></i></span>
					<span class="label label-warning"><i class="fa fa-times icon-white"></i></span>
					<span class="label label-info "><i class="fa fa-refresh icon-white"></i></span>
				</span>	
				<div class="text-warning pp-gap-bottom05" id="err-payplansRegisterAutoPassword"></div>
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
      
		
		<div class="form-group">
			<div >
				<button type="submit" class="btn btn-default" id="payplansRegisterAuto" name="payplansRegisterAuto" onclick="this.onclick=function(){return false;}"><i class="fa fa-user"></i>&nbsp;<?php echo XiText::_('COM_PAYPLANS_PLAN_REGISTER_AUTO')?></button>
			</div>
		</div>
	
	</fieldset>
</div>
<?php 
