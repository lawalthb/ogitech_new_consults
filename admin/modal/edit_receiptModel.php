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

    $dr_id      = $_POST['dr_id'];
    $cr_id      = $_POST['cr_id'];
    

    
    $paid2ru      = strip_tags($_POST['paid2ru']);	
    $doc_id      = strip_tags($_POST['doc_id']);	
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
	$invoice_sql = "UPDATE `documents` SET `document_date` = '$datepicker_invoice_exp', `document_comments` ='$details',`inserted_at` = CURRENT_TIMESTAMP, `auth_id` = '$auth_id' WHERE `documents`.`documnents_id` = '$doc_id'  ";  

	



			//customer
	 $inv_pay_sql = "UPDATE `ledger_entries` SET `account_id` = '$particular', `cr_amount` = '$amount_in', `against` = '$paid2ru',  `sub_acct_group_id` = '$act_type_id', `act_grp_id` = '$act_grp_id' WHERE `ledger_entries`.`id` = '$dr_id'";  
    	 
	

//bank
	 $inv_pay_sql2 = "UPDATE `ledger_entries` SET `account_id` = '$paid2ru', `dr_amount` = '$amount_in', `against` = '$particular',  `sub_acct_group_id` = '$act_type_id2', `act_grp_id` = '$act_grp_id2' WHERE `ledger_entries`.`id` = '$cr_id'";  
	 


	 

	
	if ($conn->query($invoice_sql) === TRUE) {
        $inv_pay_sqlq=$conn->query($inv_pay_sql);
        $inv_pay_sqlq2=$conn->query($inv_pay_sql2);
        $response['status'] = 'successfully'; 
    } else {
        $response['status']= 'error';
    }
       
	
	


	
	}



echo json_encode($response);
?>
