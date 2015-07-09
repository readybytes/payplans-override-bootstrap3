<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		Payplans
* @subpackage	MeS Payment Gateway
* @contact		support+payplans@readybytes.in
*/

if(defined('_JEXEC')===false) die();
?>

<div class="form-horizontal ">
       <div class="row form-group control-group">
       		<div class="col-sm-4">
        		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_CARD_NUMBER')?></div>
        	</div>
          	<div class="controls col-sm-5"><input type="text" id="mes_card_number" class="required form-control" name="card_number" value=""></input>
          	<div class="update-card-error invalid" style="display:none;"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_CARD_NUMBER_ERROR_MESSAGE');?></div> 
          	
          	</div>
        </div>
        
        <div class="row form-group control-group">
        <div class="col-sm-4">
          <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_MES_EXPIRATION_DATE')?></div>
        </div>
			<div class="controls col-sm-5"><?php
			    /*** array of months ***/
		        $months = array(
		                '01'=>XiText::_('JANUARY'),
		                '02'=>XiText::_('FEBRUARY'),
		                '03'=>XiText::_('MARCH'),
		                '04'=>XiText::_('APRIL'),
		                '05'=>XiText::_('MAY'),
		                '06'=>XiText::_('JUNE'),
		                '07'=>XiText::_('JULY'),
		                '08'=>XiText::_('AUGUST'),
		                '09'=>XiText::_('SEPTEMBER'),
		                '10'=>XiText::_('OCTOBER'),
		                '11'=>XiText::_('NOVEMBER'),
		                '12'=>XiText::_('DECEMBER'));
		
		        /*** current month ***/
		        $select = '<div class ="row"><div class="col-xs-6"><select name="exp_month" id="mes_exp_month" class="pull-left form-control">'."\n";
		        foreach($months as $key=>$mon)
		        {
		            $select .= "<option value=".$key;
		            $select .= ">$mon</option>\n";
		        }
		        $select .= '</select></div>';
		        echo $select;
          
		        /*** the current year ***/
				$start_year = date('Y');
				$end_year = $start_year + 20;
				
		        /*** range of years ***/
		        $rangeOfYear = range($start_year, $end_year);
		
		        /*** create the select ***/
		        $select = '<div class="col-xs-6"><select name="exp_year" id="mes_exp_year" class="pull-left form-control">';
		        foreach( $rangeOfYear as $year )
		        {
		            $select .= "<option value=".$year;
		            $select .= ">$year</option>\n";
		        }
		        $select .= '</select></div></div>';
         		
		        echo $select;
         ?>
         </div>
        </div>
</div>
<?php 

