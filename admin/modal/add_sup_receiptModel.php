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

if((!empty($_POST['receipt_no'])) || (!empty($_POST['auth_id'])) && (!empty($_POST['particular']))) {

 	$receipt_no      = strip_tags($_POST['receipt_no']);
	$auth_id     = strip_tags($_POST['auth_id']);
	$datepicker_invoice_exp      = strip_tags($_POST['datepicker_invoice_exp']);	
	$particular      = strip_tags($_POST['particular']);
	//$details      = strip_tags($_POST['details']);	
	$amount_in      = $_POST['amount_in'];
	$paid2ru      = strip_tags($_POST['paid2ru']);	
			$date_up  = date("Y-m-d");
			
			
			@$totalin_sql = "SELECT sum(grand_total_price) as totalin FROM `sup_invoice_payment_detail` WHERE `customer_id` = $particular ";  
			@$totalin_result=$conn->query($totalin_sql);
			@$totalin_row = $totalin_result->fetch_assoc();
			@$totalin =$totalin_row['totalin'];
			
			@$totalout_sql = "SELECT sum(paid_amount) as totalout FROM `sup_invoice_payment_detail` WHERE `customer_id` = $particular ";  
			@$totalout_result=$conn->query($totalout_sql);
			@$totalout_row = $totalout_result->fetch_assoc();
			@$totalout =$totalout_row['totalout'];
			
			 @$new_balance =(($amount_in + $totalout) -$totalin );
			
	$inv_pay_sql = "INSERT INTO sup_invoice_payment_detail (customer_id,order_id,invoice_no_id,total_discount,grand_total_price,paid_amount,balance,due_amount,payment_detail_date,auth_id,payment_detail_status) 
	VALUES ('$particular', 0, 0,0, 0,'$amount_in', '$new_balance', 0, '$datepicker_invoice_exp','$auth_id',0)";  
	$inv_pay_sqlq=$conn->query($inv_pay_sql);
	@$cus_last_id = $conn->insert_id;
	
	
	$sql2 = "INSERT INTO `purchase_payments_tb` ( `invoice_payment_id`, `cus_id`,`receipt_no`, `paid_through`, `date`, `created_date`) VALUES ( '$cus_last_id', '$particular', '$receipt_no', '$paid2ru', '$datepicker_invoice_exp', CURRENT_TIMESTAMP)";
 	$run_sql2=$conn->query($sql2);
	
	
	
	if ($paid2ru == 2){
		@$supsql = "SELECT * FROM `suppliers` WHERE `supplier_id` = $particular";  
			@$sup=$conn->query($supsql);
			@$supf = $sup->fetch_assoc();
			@$name =$supf['supplier_name'];
		
		
			$totalin_sql = "SELECT SUM(amount_in) AS totalin FROM petty_cash_tb";  
			$totalin_result=$conn->query($totalin_sql);
			$totalin_row = $totalin_result->fetch_assoc();
			$totalin =$totalin_row['totalin'];
			
			$totalout_sql = "SELECT SUM(amount_out) AS totalout FROM petty_cash_tb";  
			$totalout_result=$conn->query($totalout_sql);
			$totalout_row = $totalout_result->fetch_assoc();
			$totalout =$totalout_row['totalout'];
			
			 $new_balance =($totalin - ($totalout + $amount_in));
		
		
		
		
		
		
		
		
	$sql2 = "INSERT INTO `petty_cash_tb` (`petty_id`, `voucher_no`, `particular`, `cus_id`, `details`, `amount_in`, `amount_out`, `petty_balance`, `date`, `other_cat`, `type`, `created_date`, `updated_date`, `user_id`) VALUES (NULL, '$receipt_no', '$name', '0', NULL, '0', '$amount_in', '$paid2ru', CURRENT_DATE(), NULL, 'in', CURRENT_TIMESTAMP, NOW(), '$auth_id')";
		
		$run_sql2=$conn->query($sql2);
		
		}

		if ($paid2ru !=2){
		@$supsql = "SELECT * FROM `suppliers` WHERE `supplier_id` = $particular";  
			@$sup=$conn->query($supsql);
			@$supf = $sup->fetch_assoc();
			@$name =$supf['supplier_name'];
		
		
			$totalin_sql = "SELECT SUM(amount_in) AS totalin FROM bank1_tb where bank_code = '$paid2ru'";  
			$totalin_result=$conn->query($totalin_sql);
			$totalin_row = $totalin_result->fetch_assoc();
			$totalin =$totalin_row['totalin'];
			
			$totalout_sql = "SELECT SUM(amount_out) AS totalout FROM bank1_tb where bank_code = '$paid2ru'";  
			$totalout_result=$conn->query($totalout_sql);
			$totalout_row = $totalout_result->fetch_assoc();
			$totalout =$totalout_row['totalout'];
			
			 $new_balance =($totalin - ($totalout + $amount_in));
		
	$sql2 = "INSERT INTO `bank1_tb` (`bank1_id`, `voucher_no`, `particular`, `cus_id`, `details`, `amount_in`, `amount_out`, `petty_balance`, `date`, `other_cat`, `type`, `created_date`, `updated_date`, `user_id`, `bank_code`) VALUES (NULL, '$receipt_no', '$name', '0', NULL, '0', '$amount_in',  $new_balance, CURRENT_DATE(), NULL, 'in', CURRENT_TIMESTAMP, NOW(), '$auth_id', '$paid2ru')";
		
		$run_sql2=$conn->query($sql2);
		
		}




	$response['status'] = 'successfully';	
	
	

}else{	
		
	$response['status']= 'error';
	
	}



echo json_encode($response);
?>
