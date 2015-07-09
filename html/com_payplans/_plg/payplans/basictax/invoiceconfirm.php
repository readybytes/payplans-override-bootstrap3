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
<script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'basictax.js');?>" type="text/javascript"></script>
<div class="row">
	<div class="col-xs-6">
		<?php echo XiText::_("COM_PAYPLANS_ENTER_TAX_INFORMATION"); ?>*
	</div>

	<div class="col-xs-6" >
		<?php echo PayplansHtml::_('country.edit', 'app_basictax_country_id', $country, array('option_none'=>true, 'style' => 'class="input-medium img-responsive form-control"')); ?>
		<span id="app-tax-apply-error" class="error" style="display:none;">&nbsp;</span>
	</div>
</div>
<?php 