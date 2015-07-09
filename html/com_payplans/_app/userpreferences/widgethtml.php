<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Frontend
 * @contact 	support+payplans@readybytes.in


 */
if(defined('_JEXEC')===false) die();?>
<script src="<?php echo PayplansHelperUtils::pathFS2URL(dirname(__FILE__).DS.'preferences.js');?>" type="text/javascript"></script>


<form method="post" id="preferences" action="#" class="form-vertical">

	<?php foreach ($form->getFieldset('preference') as $field):?>
               <?php $class = $field->group.$field->fieldname; ?>
               <div class="row <?php echo $class;?> pp-gap-bottom05">
                       <div class="col-sm-6 preferences-param-label"><?php echo $field->label; ?> </div>
                       <div class="col-sm-6 preferences-param-value"><?php echo $field->input; ?></div>                                                                
               </div>
    <?php endforeach;?>
			
    <div class="readable pp-gap-bottom05">
		<a id="preferences-edit-link" class="btn btn-primary" href="" onClick="xi.form.editable('preferences'); return false;">
			<?php echo XiText::_("COM_PAYPLANS_DASHBOARD_USERDETAIL_EDIT");?>
		</a>
    </div>
    <div class="editable pp-gap-bottom05">
		<button type="submit" class="btn btn-primary" onClick="xi.preferences.save(this.form); return false;"><?php  echo XiText::_("COM_PAYPLANS_DASHBOARD_USERDETAIL_SAVE");?></button>

		<a id="preferences-cancel-link" class="btn btn-default" href="" onClick="xi.form.readable('preferences'); return false;">
			<?php echo XiText::_("COM_PAYPLANS_DASHBOARD_USERDETAIL_CANCEL");?>
		</a>
	</div>

</form>	
<?php 

