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
	<form method="post" autocomplete="off" action="<?php echo $post_url;?>" id="checkout_form">
		<div class="text-info">
	     			<?php  echo $this->_render('partial_amount', compact('currency', 'amount'), 'default'). XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_PAYMENT_AMOUNT');?>
	    </div>
	    <hr />
	      		
     	 <fieldset class="form-horizontal">
      		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CREDIT_CARD_DETAILS'); ?></legend>
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CREDIT_CARD_TYPE')?></div>
	          	</div>
	          	<div class="controls col-sm-5">
	          			<select name="cc_type" class="form-control">
								<option value="Visa">Visa</option>
								<option value="MasterCard">MasterCard</option>
	                            <option value="AmericanExpress">American Express</option>
	                            <option value="DinersClub">Diners Club</option>
						</select>
	       		</div>
        	</div>
        	
          	<div class="row form-group control-group">
          		<div class="col-sm-4">
              		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CARD_NAME')?></label></div>
              	</div>
              <div class="controls col-sm-5"><input type="text" class="required form-control" name="card_name" value=""></div>
          	</div>
          	
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	         		 <div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CREDIT_CARD_NUMBER')?></label></div>
	         	</div>
	          <div class="controls col-sm-5"><input type="number" class="required pp-validate-creditcard form-control" data-validation-creditcard-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CREDIT_CARD")?>" name="card_num" value="" id=card-number ></div>
	        </div>
        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	        		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_EXPIRATION_DATE')?></label></div>
	        	</div>
	        	<div class="controls col-sm-5">
	        		<div class ="row">
	        		<div class="col-xs-8">
	                <select name="exp_month" id="exp_month" class="pull-left form-control">
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
					        $select = '<div class="col-xs-4"><select name="exp_year" class= "pull-left form-control">';
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
	                  		<div class="control-label"><label class="required"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CVN')?></label></div>
	                  	</div>
	                  <div class="controls col-sm-5">
	                        <input type="number" class="required pp-validate-cvclength form-control" id=card-cvc  data-validation-cvclength-message= "<?php echo XiText::_("COM_PAYPLANS_PAYMENT_GATEWAY_INVALID_CVC_LENGTH")?>" data-pp-validate='#card-number' name="card_code" value="">
	                  </div>
	                </div>
	          <?php //}  ?>
      </fieldset>
      
      <fieldset class="form-horizontal">
      		<legend><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_PERSONAL_DETAILS'); ?></legend>
      		
      		<div class="row form-group control-group">
      			<div class="col-sm-4">
	      			<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_TITLE')?></div>
	      		</div>
		          <div class="controls col-sm-5">
		              <select name="name_title" id="name_title" class="form-control">
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
	          <div class="controls col-sm-5"><input type="text"  name="company" value="" class="form-control"></div>
	        </div>
	
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_FIRST_NAME')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text"  name="first_name" class="form-control" value="<?php echo $firstname; ?>"></div>
	        </div>
	        
	        <div class="row form-group control-group">
	       		<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_LAST_NAME')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" name="last_name" class="form-control" value="<?php echo $lastname; ?>"></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_EMAIL')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="email form-control" name="email" value="<?php echo $email; ?>"></div>
	         </div>
	        
			<div class="row form-gorup control-group">
				<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_PHONE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="form-control" name="phone" value=""></div>
	        </div>
	
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_MOBILE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="form-control" name="mobile" value=""></div>
	        </div>
	
	        <div class="row form-group control-group">
	       		<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_FAX')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text" class="form-control" name="fax" value=""></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_ADDRESS_LINE_ONE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><textarea name="address" cols="27"  rows="3" class="form-control"></textarea></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CITY')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text"  name="city" value="" class="form-control"></div>
	        </div>
	
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_STATE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text"  name="state" value="" class="form-control"></div>
	        </div>
	        
	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_COUNRTY')?></div>
	          	</div>
	          	<div class="controls col-sm-5"><?php echo PayplansHtml::_('country.edit', 'country',null, array('option_none'=>true,'style'=>'class="form-control"'), 'isocode2');?></div>
	        </div>

	        <div class="row form-group control-group">
	        	<div class="col-sm-4">
	          		<div class="control-label"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_ZIP_CODE')?></div>
	          	</div>
	          <div class="controls col-sm-5"><input type="text"  name="zip" value="" class="form-control"></div>
	        </div>

      </fieldset>
		    	
      <fieldset class="form-horizontal">
     	 	<div class="text-center">
		        		<button id="pp-payment-app-buy" type="submit" name="buy"  class="btn btn-primary btn-lg" ><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_BUY')?> </button>
		        		<a href="<?php echo $cancel_url; ?>" class="btn btn-default btn-lg"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_APP_EWAY_CANCEL')?></a>
        	</div>  
      </fieldset>
	      <input type="hidden" name="payment_key" value="<?php echo $payment_key;?>" />
	      <input type="hidden" name="amount" value="<?php echo $amount;?>" />
	 </form>
<script type="text/javascript">
        jQuery('#checkout_form').submit(function(){
                //jQuery('button[type=submit]', this).attr('disabled', 'disabled');
        });

</script>
<?php
