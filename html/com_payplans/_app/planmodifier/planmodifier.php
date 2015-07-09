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
<?php 
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies. 
?>
<div>
	<div>
		<?php echo XiText::_('COM_PAYPLANS_APP_PLANMODIFIER_SUBSCRIBE_IT_FOR');?>
	</div>
	<div align="center">
		<select class="pp-planmodifier pp-gap-bottom05" name="plan_modifier_<?php echo $plan->plan_id;?>" style="max-width:90%;">
			<?php $pInstance = PayplansPlan::getInstance($plan->plan_id, null, $plan);?>
			<?php $currency  = $pInstance->getCurrency();?>
			
			<option value="<?php echo $default = $pInstance->getPrice().'_'.$pInstance->getRawExpiration();?>">
				<?php 
					$amount = $pInstance->getPrice();
					echo $this->_render('partial_amount', compact('currency', 'amount'), 'default').' ';
					echo($pInstance->isRecurring() !== false)? XiText::_('COM_PAYPLANS_PLAN_PRICE_TIME_SEPERATOR') : XiText::_('COM_PAYPLANS_PLAN_PRICE_TIME_SEPERATOR_FOR') ;
					echo PayplansHelperFormat::planTime(PayplansHelperPlan::convertIntoTimeArray($pInstance->getRawExpiration()));
				?>
			</option>
			
			<?php foreach($time_price['price'] as $key => $value) :?>
				<option value="<?php echo $value.'_'.$time_price['time'][$key];?>">
					<?php			
						$amount	  = $value;
						echo $this->_render('partial_amount', compact('currency', 'amount'), 'default').' ';
						echo($pInstance->isRecurring() !== false)? XiText::_('COM_PAYPLANS_PLAN_PRICE_TIME_SEPERATOR') : XiText::_('COM_PAYPLANS_PLAN_PRICE_TIME_SEPERATOR_FOR') ;
						echo PayplansHelperFormat::planTime(PayplansHelperPlan::convertIntoTimeArray($time_price['time'][$key]));
					?>
				</option>
			<?php endforeach;?>
		</select>
	</div>
</div>
<script>
(function($){
	$(document).ready(function (){
		var plan_id = <?php echo $plan->plan_id;?>;
		var link = $("#testPlan"+plan_id).attr("href");
		var separator = "&";

		if(link.indexOf("?") == -1){
			separator = "?";
		}
		
		link = link + separator + "selected=<?php echo $default;?>";
		$("#testPlan"+plan_id).attr("href",link);
	});

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(payplans.jQuery);
</script>

<?php 
