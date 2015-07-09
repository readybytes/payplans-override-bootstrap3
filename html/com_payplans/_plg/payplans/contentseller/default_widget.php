<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Frontend
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();
?>

<div class="white-well clearfix">
 	<h5><?php echo $title;?></h5><hr>
	<div class="pp-content">
		<div class="">
				<?php foreach ($articles as $id => $article):?>
					<?php $url = 'index.php?option=com_content&view=article&id='.$id;?>
					<div><a href="<?php echo XiRoute::_($url);?>"><?php echo $article->title;?></a></div>
				<?php endforeach;?>
		</div>
	</div>
</div>