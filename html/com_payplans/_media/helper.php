<?php
/**
* @copyright	Copyright (C) 2009 - 2015 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		support+payplans@readybytes.in
*/
if(defined('_JEXEC')===false) die();

class PayplansHelperTemplateDefault
{
	static function buildPlanCloumnClasses($rowPlans,$planCount)
	{
		//setup defaults
		if(empty($rowPlans) || in_array(0,$rowPlans)){
			if($planCount%5 == 0){
				$rowPlans = array(3,2);		
			}elseif($planCount%4 == 0){
				$rowPlans = array(4);		
			}elseif($planCount%3 == 0){
				$rowPlans = array(3);		
			}else{
				$rowPlans = array(2);		
			}
		}
		

		$planClasses = array();
		
		
		//set default 3
		$columns = 3;
		
		//calculate span classes for plans
        for($totalCount = $planCount,$rows=array(); $totalCount > 0; $totalCount=($totalCount-$columns)){
        	if(!empty($rowPlans)){
        		$columns = array_shift($rowPlans);
        	}
        	
        	$span = (int)(12/$columns);
        	$columns = ($columns > $totalCount)?$totalCount:$columns;
        	
        	for($i=1;$i <= $columns; $i++){
        		$planClasses[] =' col-sm-'.$span;
        	}
        	
        	$rows[] = $columns;
        }
       
		return array($planClasses,$rows);
	}

}