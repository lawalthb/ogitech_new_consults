<?php
 /**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Adapt Inventory License
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * https://www.adaptinventory.com/license.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to adaptinventory@gmail.com so we can send you a copy immediately.
 *
 * @author   Adapt Inventory
 * @author-email  adaptinventory@gmail.com
 * @copyright  Copyright © adaptinventory.com. All Rights Reserved
 */
session_start();
header('Content-type: application/json');
require_once ('../../connection/connection.php');
$response = array();

if((!empty($_POST['voucher_no'])) || (!empty($_POST['auth_id'])) && (!empty($_POST['particular']))) {
	
	$petty_id      = strip_tags($_POST['petty_id']);
 	$voucher_no      = strip_tags($_POST['voucher_no']);
	$auth_id     = strip_tags($_POST['auth_id']);
	$datepicker_invoice_exp      = strip_tags($_POST['datepicker_invoice_exp']);	
	$particular      = strip_tags($_POST['particular']);
	$details      = strip_tags($_POST['details']);	
	$amount_out      = strip_tags($_POST['amount_out']);
	$other_cat      = strip_tags($_POST['other_cat']);	
			$date_up  = date("Y-m-d");
			
			$totalin_sql = "SELECT SUM(amount_in) AS totalin FROM petty_cash_tb WHERE `petty_id` != $petty_id";  
	$totalin_result=$conn->query($totalin_sql);
			$totalin_row = $totalin_result->fetch_assoc();
			$totalin =$totalin_row['totalin'];
			
			$totalout_sql = "SELECT SUM(amount_out) AS totalout FROM petty_cash_tb WHERE `petty_id` != $petty_id";  
	$totalout_result=$conn->query($totalout_sql);
			$totalout_row = $totalout_result->fetch_assoc();
			$totalout =$totalout_row['totalout'];
			
			 $new_balance =(($totalin - $totalout) - $amount_out);
			
			
	$exp_order_sql = "UPDATE `petty_cash_tb` SET `voucher_no` = '$voucher_no', `particular` = '$particular', `details` = '$details', `amount_out` = '$amount_out', `date` = '$datepicker_invoice_exp', `petty_balance` = '$new_balance', `other_cat` = '$other_cat', `updated_date` = CURRENT_DATE() WHERE `petty_cash_tb`.`petty_id` = $petty_id;
;";  
	$exp_order_sqlq=$conn->query($exp_order_sql);
	
	
		
	
	
 	
	$response['status'] = 'successfully';	
	
	

}else{	
		
	$response['status']= 'error';
	
	}



echo json_encode($response);
?>