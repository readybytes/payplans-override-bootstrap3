<?php
/**
 * @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package		PayPlans
 * @subpackage	Frontend
 * @contact 	support+payplans@readybytes.in
 */

if(defined('_JEXEC')===false) die();
$location = $this->getLocation();
?>

<script src="<?php echo PayplansHelperUtils::pathFS2URL($location.DS.'tmpl'.DS.'userdetail.js');?>" type="text/javascript"></script>

<form method="post" id="userdetail" action="#" class="form-vertical">
<?php foreach ($details as $userparams):?>
    <?php if(!empty($userparams)):?>
  
        <?php foreach($userparams->getFieldset('params') as $field):?>
                <?php $class = $field->group.$field->fieldname; ?>
               		<div class="row pp-gap-bottom05 <?php echo $class;?>">
	                    <div class="userdetail-param-label col-sm-6" ><?php echo $field->label;?></div>
	                   <div class="userdetail-param-value col-sm-6 payplans-wordbreak" ><?php echo $field->input;?></div>
                </div>
            <?php endforeach;?>
   
        <?php endif;?>
    <?php endforeach;?>
    <div class="readable pp-gap-bottom05">
        <a id="userdetail-edit-link" class="btn btn-primary" href="" onClick="payplans.ui.form.readable.edit('userdetail'); return false;">
            <?php echo XiText::_("COM_PAYPLANS_DASHBOARD_USERDETAIL_EDIT");?>
        </a>
    </div>
    <div class="editable pp-gap-bottom05">
        <a id="userdetail-save-link" class="btn btn-primary" href="" onClick="payplans.apps.userdetail.save(this.form); return false;">
            <?php echo XiText::_("COM_PAYPLANS_DASHBOARD_USERDETAIL_SAVE");?>
        </a>
        <a id="userdetail-cancel-link" class="btn btn-default" href="" onClick="payplans.ui.form.readable.read('userdetail'); return false;">
            <?php echo XiText::_("COM_PAYPLANS_DASHBOARD_USERDETAIL_CANCEL");?>
        </a>
    </div>

</form>	
<?php 
