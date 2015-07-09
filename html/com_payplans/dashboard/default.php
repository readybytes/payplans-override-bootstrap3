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
<div class="clearfix">

	<div class="row">	
		<!-- Main -->
		<div class="col-sm-12 clearfix pp-gap-bottom10">
			<?php echo $this->loadTemplate('template_message'); ?>
			<?php echo $this->loadTemplate($this->dashboard_main_template); ?>
		</div>
		
	</div>
	
</div>
<?php
