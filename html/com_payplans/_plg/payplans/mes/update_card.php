<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	MES
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>
    <script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'mes.js');?>" type="text/javascript"></script>

<div>
	<div class="pp-subscription-display-action clearfix well well-small">
	 	<form method="post" id="mes-update" action="#">
	 		<?php echo XiText::_('COM_PAYPLANS_APP_MES_UPDATE_CARD_DESC');?>
        	<?php $url  = XiRoute::_('index.php?option=com_payplans&view=user&task=trigger&event=onPayplansUpdateCard&invoice_id='.$invoice_id);?>
			<a href="#" class="hasTip btn btn-link" onClick="payplans.url.modal('<?php echo $url; ?>');return false;" 
				title="<?php echo XiText::_('COM_PAYPLANS_APP_MES_UPDATE_TOOLTIP_DESC');?>">
				<i class="fa fa-book"></i>&nbsp;<?php echo XiText::_('COM_PAYPLANS_APP_MES_UPDATE');?>
			</a>
	 	</form>	
 	</div>
</div>
<?php

