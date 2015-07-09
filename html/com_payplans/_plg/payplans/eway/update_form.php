<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		Payplans
* @subpackage	E-way Payment App
* @contact		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();
?>

	<form method="post" id="update_card_form">

      <fieldset class="form-horizontal">
      		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CREDIT_CARD_DETAILS'); ?></legend>
        	<div class="row form-group control-group">
        		<div class="col-sm-4">
          			<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CREDIT_CARD_TYPE')?></div>
          		</div>
          		<div class="controls col-sm-5">
					<select name="cc_type" id="eway_cc_type" class="form-control">
						<option value="Visa">Visa</option>
						<option value="MasterCard">MasterCard</option>
					</select>
          		</div>
    		</div>

          <div class="row form-group control-group">
          	<div class="col-sm-4">
              <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CARD_NAME')?></div>
            </div>
              <div class="controls col-sm-5"><input type="text" class="required form-control" id="eway_card_name" name="card_name" value="<?php echo $CCName; ?>"></div>
          </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
          	  <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CREDIT_CARD_NUMBER')?></div>
          	</div>
          	  <div class="controls col-sm-5"><input type="text" class="required form-control" id="eway_card_num" name="card_num" value="<?php echo $CCNumber; ?>"></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
        	  	<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_EXPIRATION_DATE')?></div>
        	 </div>
        	  <div class="controls col-sm-5">
        	  		<div class="row">
        	  		<div class="col-xs-5">
                	<select name="exp_month" id="eway_exp_month" class="pull-left form-control">
		                <option value="01">01</option>
		                <option value="02">02</option>
		                <option value="03">03</option>
		                <option value="04">04</option>
		                <option value="05">05</option>
		                <option value="06">06</option>
		                <option value="07">07</option>
		                <option value="08">08</option>
		                <option value="09">09</option>
		                <option value="10">10</option>
		                <option value="11">11</option>
		                <option value="12">12</option>
                	</select></div>
					<?php
				        /*** the current year ***/
						$start_year = date('y');
						$end_year = $start_year + 20;
						
				        /*** range of years ***/
				        $rangeOfYear = range($start_year, $end_year);
				
				        /*** create the select ***/
				        $select = '<div class="col-xs-7"><select name="exp_year" class="pp-secondary pp-color pp-border pp-background pull-left form-control">';
				        foreach( $rangeOfYear as $year )
				        {
				            $select .= "<option value=".$year;
				            $select .= ">20$year</option>\n";
				        }
				        $select .= '</select></div></div>';
		         		
				        echo $select;
		         ?>
		        </div>
        	</div>

          <?php
            //if($method == 'REAL_TIME_CVN'){
          ?>
                <div class="row form-group control-group">
                	<div class="col-sm-4">
                  		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CVN')?></div>
                  	</div>
                  	<div class="controls col-sm-5">
                        <input type="text" class="required pp-secondary pp-color pp-border pp-background form-control" maxlength="4" id="eway_card_code" name="card_code" value="">
                  	</div>
                </div>
          <?php //}  ?>
      </fieldset>

      <fieldset class="form-horizontal">
      	<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_PERSONAL_DETAILS'); ?></legend>
      	<div class="row form-group control-group">
      		<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_EXPIRATION_DATE')?></div>
		     </div>
		      <div class="controls col-sm-5">
		          <select name="name_title" id="eway_name_title" class="form-control">
		              <option value="Mr.">Mr.</option>
		              <option value="Ms.">Ms.</option>
		              <option value="Mrs.">Mrs.</option>
		              <option value="Miss">Miss</option>
		              <option value="Dr.">Dr.</option>
		              <option value="Sir.">Sir.</option>
		              <option value="Prof.">Prof.</option>
		          </select>
		      </div>
         </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_COMPANY')?></div>
		     </div>
		      <div class="controls col-sm-5"><input type="text" class="form-control" name="company" id="eway_company" value="<?php echo $CustomerCompany; ?>"></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_FIRST_NAME')?></div>
		     </div>
		      <div class="controls col-sm-5"><input type="text" class="required form-control" name="first_name" id="eway_first_name" value="<?php echo $CustomerFirstName; ?>"></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_LAST_NAME')?></div>
		    </div>
		      <div class="controls col-sm-5"><input type="text" class="required form-control" name="last_name" id="eway_last_name" value="<?php echo $CustomerLastName; ?>"></div>
        </div>
        
         <div class="row form-group control-group">
         	<div class="col-sm-4">
		      	<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_EMAIL')?></div>
		     </div>
		      <div class="controls col-sm-5"><input type="text" class="email form-control" name="email" id="eway_email" value="<?php echo $CustomerEmail; ?>"></div>
        </div>
        
		<div class="row form-group control-group">
			<div class="col-sm-4">
		      	<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_PHONE')?></div>
		     </div>
		      <div class="controls col-sm-5"><input type="text" class="form-control" name="phone" id="eway_phone" value="<?php echo $CustomerPhone1; ?>"></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_MOBILE')?></div>
		     </div>
		      <div class="controls col-sm-5"><input type="text" class="form-control" name="mobile" id="eway_mobile" value="<?php echo $CustomerPhone2; ?>"></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_FAX')?></div>
		    </div>
		      <div class="controls col-sm-5"><input type="text" class="form-control" name="fax" id="eway_fax" value="<?php echo $CustomerFax; ?>"></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_ADDRESS_LINE_ONE')?></div>
		    </div>
		      <div class="controls col-sm-5"><textarea name="address" cols="27"  id="eway_address" rows="3"  class="required form-control"><?php echo $CustomerAddress ?></textarea></div>
        </div>
        
        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CITY')?></div>
		    </div>
		      <div class="controls col-sm-5"><input type="text" class="required form-control" name="city" id="eway_city" value="<?php echo $CustomerSuburb; ?>"></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_STATE')?></div>
		    </div>
		      <div class="controls col-sm-5"><input type="text" class="required form-control" name="state" id="eway_state" value="<?php echo $CustomerState; ?>"></div>
        </div>
        
		<div class="row form-group control-group">
			<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_COUNRTY')?></div>
		    </div>
		      <div class="controls col-sm-5"><?php echo PayplansHtml::_('country.edit', 'country',null, array('option_none'=>true,'style'=>'class="required form-control"'), 'isocode2');?></div>
        </div>

        <div class="row form-group control-group">
        	<div class="col-sm-4">
		      <div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_ZIP_CODE')?></div>
		    </div>
		      <div class="controls col-sm-5"><input type="text" class="required form-control" name="zip" id="eway_zip" value="<?php echo $CustomerPostCode; ?>"></div>
        </div>
        
    	</fieldset>	      
  </form>
<?php 