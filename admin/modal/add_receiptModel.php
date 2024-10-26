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
	$details      = strip_tags($_POST['doc_comment']);	
	$amount_in      = $_POST['amount_in'];
	$paid2ru      = strip_tags($_POST['paid2ru']);	
	$date_up  = date("Y-m-d");
			


	$get_cus_sql = "SELECT * FROM `customers` WHERE `cus_id` = '$paid2ru' ";
	$get_cus_query=$conn->query($get_cus_sql);
	$cus_row = $get_cus_query->fetch_assoc();
	$cus_name =$cus_row['cus_name'];	
	$act_type_id=$cus_row['act_type_id'];
	$act_grp_id = $cus_row['act_grp_id'];
		


	
	$get_cus_sql = "SELECT * FROM `customers` WHERE `cus_id` = '$particular' ";
	$get_cus_query=$conn->query($get_cus_sql);
	$cus_row = $get_cus_query->fetch_assoc();
	$cus_name =$cus_row['cus_name'];	
	$act_type_id2=$cus_row['act_type_id'];
	$act_grp_id2 = $cus_row['act_grp_id'];
		

//	$document_type= $ac_type.$inv_type ;
	$invoice_sql = "INSERT INTO `documents` (`documnents_id`, `document_date`, `document_no`, `document_comments`, `lpo_grn`, `document_type`, `inserted_at`, `auth_id`, `updated_at`, `updated_by`) VALUES (NULL, '$datepicker_invoice_exp', '$receipt_no', '$details', '', '31', CURRENT_TIMESTAMP, '$auth_id', CURRENT_TIMESTAMP, '0')";  
	$invoice_sqlq=$conn->query($invoice_sql);
	 $invoice_last_id=$conn->insert_id;



			//customer
	 $inv_pay_sql = "INSERT INTO ledger_entries (documents_id, account_id,   dr_amount, cr_amount,against, sub_acct_group_id,  act_grp_id ) 
	 VALUES ('$invoice_last_id', '$particular' , 0, '$amount_in', '$paid2ru' , '$act_type_id', '$act_grp_id')";  
	 $inv_pay_sqlq=$conn->query($inv_pay_sql);
	

//bank
	 $inv_pay_sql2 = "INSERT INTO ledger_entries (documents_id, account_id,   dr_amount, cr_amount, against, sub_acct_group_id,  act_grp_id ) 
	 VALUES ('$invoice_last_id', '$paid2ru' , '$amount_in', 0, '$particular' ,  '$act_type_id2', '$act_grp_id2')";  
	 $inv_pay_sqlq=$conn->query($inv_pay_sql2);


	 
		$last_no = "SELECT * FROM `documents` where document_type=31 ORDER BY `documnents_id` DESC  ";
	   $result_last_no = $conn->query($last_no);
	   $row_last_no = $result_last_no->fetch_assoc();
	   $lastvno = $row_last_no['document_no']+1;
	  

	$response['status'] = 'successfully';
	$response['num'] = $lastvno;	
	
	

}else{	
		
	$response['status']= 'error';
	
	}



echo json_encode($response);
?>
