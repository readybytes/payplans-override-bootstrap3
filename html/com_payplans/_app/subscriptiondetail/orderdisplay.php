<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Subscriptiondetail
 * @contact 	support+payplans@readybytes.in
 */

if(defined('_JEXEC')===false) die();
$location = $this->getLocation();
?>

<?php if(!empty($details)):?>
	<script src="<?php echo XiHelperTemplate::mediaURI($location.DS.'tmpl'.DS.'subscriptiondetail.js',false);?>" type="text/javascript"></script>

<form method="post" id="subscriptiondetail" action="#">
	<div class="payplans">
		<div class="panel panel-default">
		    <div class="panel-heading">
				<h5 data-toggle="collapse" data-target="#sub-details<?php echo $subscription_key; ?>" data-parent="#accordion2" style="padding:0 5px;">
				<span class="btn-link">[+]&nbsp;<?php echo XiText::_('COM_PAYPLANS_ORDER_SUBSCRIPTIONS_DETAILS');?></span>
				</h5>
			</div>
	    
	    	<div id="sub-details<?php echo $subscription_key; ?>" class="panel-collapse collapse">
	      		<div class="panel-body">
	      			<div class="pp-scrollable">
								<?php foreach ($details as $subscriptionparams):
				  					 		if(!empty($subscriptionparams)):?>
				  								<!-- parameters -->
												<?php foreach ($subscriptionparams->getFieldset('subscription_detail') as $field):?>
													 <?php $class = $field->group.$field->fieldname; ?>
													<div class="row pp-gap-bottom05 <?php echo $class;?>" style="	border-bottom: thin solid #ccc;">
	                  									<div class="subscriptiondetail-param-label col-xs-6" ><?php  echo $field->label;?></div>
	                   									<div class="subscriptiondetail-param-value col-xs-6 payplans-wordbreak" ><?php  echo $field->input;?></div>
                									</div>
												<?php endforeach;?>
											<?php endif;?>
							<?php endforeach;?>
					
				</div>
	      </div>
	    </div>
	  </div>
	   	<input type="hidden" name="subscriptionKey" value="<?php echo JRequest::getVar('subscription_key');?>">
	</div>
</form>

<?php endif;