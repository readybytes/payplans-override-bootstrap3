<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>

<div class="pp-dashboard-footer">
<!--	Deprecated Code --->
        <?php 
        $position = 'payplans-dashboard-footer';
		echo $this->loadTemplate('partial_position',compact('plugin_result','position'));
        ?>
</div>
