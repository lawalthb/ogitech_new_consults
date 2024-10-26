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

 	$voucher_no      = strip_tags($_POST['voucher_no']);
	$auth_id     = strip_tags($_POST['auth_id']);
	$datepicker_invoice_exp      = strip_tags($_POST['datepicker_invoice_exp']);	
	$particular      = strip_tags($_POST['particular']);
	$details      = strip_tags($_POST['details']);	
	$amount_out      = $_POST['amount_out'];
	$other_cat      = strip_tags($_POST['other_cat']);	
			$date_up  = date("Y-m-d");
			
			
			$totalin_sql = "SELECT SUM(amount_in) AS totalin FROM petty_cash_tb";  
	$totalin_result=$conn->query($totalin_sql);
			$totalin_row = $totalin_result->fetch_assoc();
			$totalin =$totalin_row['totalin'];
			
			$totalout_sql = "SELECT SUM(amount_out) AS totalout FROM petty_cash_tb";  
	$totalout_result=$conn->query($totalout_sql);
			$totalout_row = $totalout_result->fetch_assoc();
			$totalout =$totalout_row['totalout'];
			
			 $new_balance =(($totalin - $totalout) - $amount_out);
			
	$exp_order_sql = "INSERT INTO `petty_cash_tb` ( `voucher_no`, `particular`, `details`, `amount_in`, `amount_out`, `petty_balance`, `date`, `other_cat`, `type`, `created_date`, `updated_date`, `user_id`) VALUES ( '$voucher_no', '$particular', '$details',  '0', '$amount_out', '$new_balance', '$datepicker_invoice_exp',  '$other_cat', 'out',  NOW(), '$date_up', '$auth_id')";  
	$exp_order_sqlq=$conn->query($exp_order_sql);
	@$petty_last_id = $conn->insert_id;
	
	if($other_cat== "Loan"){
$sql = "INSERT INTO `loan_needer` (`loaner_id`, `petty_id`, `loaner_name`, `amount`, `loaner_mobile`, `loaner_address`) VALUES (NULL, '$petty_last_id', '$particular', '$amount_out', '08132712715', '12 alaba taiwo street')";
	$exp_order_sqlq2=$conn->query($sql);
	}
		
	
		
	
	
 	
	$response['status'] = 'successfully';	
	
	

}else{	
		
	$response['status']= 'error';
	
	}



echo json_encode($response);
?>
