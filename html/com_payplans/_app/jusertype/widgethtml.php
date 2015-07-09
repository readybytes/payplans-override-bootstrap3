<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Jusertype
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>

<div class="pp-gap-bottom05">
		<?php foreach($joomla_usertypes as $usertype):?>
			<div><?php echo $usertype ;?></div>
		<?php endforeach;?>
</div>
 