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


?>
<div class="pp-login-popup">
		<div>
			<div >					
					<div class="row">
						<div class="col-xs-6 pp-col pp-label required"><?php echo XiText::_('PLG_PAYPLANS_GIFT_SHOW_ITEM_SELECT_PLAN');?></div>
						<div class="col-xs-6 pp-col pp-input"><?php echo PayplansPlan::getInstance($plan_id)->getTitle();?></div>
					</div>	
					<div class="row-fluid">&nbsp;</div>				
					<div class="row">
						<div class="col-xs-6 pp-col pp-label required"><?php echo XiText::_('PLG_PAYPLANS_GIFT_SHOW_ITEM_QUANTITY');?></div>
						<div class="col-xs-6 pp-col pp-input"><input type="text" class="form-control" id="plg_gift_item_quantity" name="plg_gift_item_quantity" value="<?php echo isset($quantity)? $quantity:'';?>" class="number" /></div>
					</div>			
					
					<div>&nbsp;</div>
					<div class="text-center pp-gap-bottom05">
						<span class="pp-gift-limit-err text-danger"></span>
					</div>
			</div>			
			<input type="hidden" id="plg_invoice_id" name="plg_invoice_id" value="<?php echo $invoice_id;?>" />		
			<input type="hidden" id="plg_plan_id" name="plg_plan_id" value="<?php echo $plan_id;?>" />	
		</div>
</div>
<?php 