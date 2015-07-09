<?php
/**
 * @copyright	Copyright (C) 2009 - 2011 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		PayPlans
 * @subpackage	Log
 * @contact 		shyam@readybytes.in
 * website		http://www.jpayplans.com
 * Technical Support : Forum -	http://www.jpayplans.com/support/support-forum.html
 */
if(defined('_JEXEC')===false) die();

XiHtml::script(dirname(__FILE__).DS.'gift.js');
?>
<div>
<div id="plg-gift-items">
<?php if(empty($quantity)):?>
	<?php echo XiText::_('PLG_PAYPLANS_GIFT_ADDED_ITEMS_EMPTY');?>
<?php else:?>	
		<div class="row">
			<span class="col-xs-4 text-center"><?php echo $planTitle;?></span>
			
			<span class="col-xs-4 text-center"><?php echo $price.'* '.$quantity;?></span>
		
			<span class="col-xs-4 text-center"><?php echo ($price * $quantity);?></span>
						
		</div>
<?php endif;?>
<br />
<div class="btn btn-primary pp-gap-top05"
	onclick="payplans.url.modal('index.php?option=com_payplans&view=invoice&task=trigger&event=onPayplansShowItemsRequest&plan_id=<?php echo $plan_id;?>&invoice_id=<?php echo $invoice_id;?>'); return false;">
	<i class="fa fa-plus-circle"></i>&nbsp;<?php echo XiText::_('PLG_PAYPLANS_GIFT_MESSAGE');?>
</div>
</div>
</div>
<?php 