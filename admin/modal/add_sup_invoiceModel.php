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

if((!empty($_POST['customer_name'])) || (!empty($_POST['new_customer'])) && (!empty($_POST['product_id'][0])) ) {
	
	$paper_inv_no     = strip_tags($_POST['paper_inv_no']);
	$grn_no     = strip_tags($_POST['grn_no']);
 	$auth_id     = strip_tags($_POST['auth_id']);
	$customer_name      = strip_tags($_POST['customer_name']);
	$customer_id     = strip_tags($_POST['customer_id']);
	$new_customer      = strip_tags($_POST['new_customer']);
	$cus_mobile     = strip_tags($_POST['cus_mobile']);
    $new_customer_address     = strip_tags($_POST['new_customer_address']);
	$contact_person     = strip_tags($_POST['contact_person']);
	$datepicker_invoice_date     = strip_tags($_POST['datepicker_invoice_date']);
	
	
	
	
	

	
	if(empty($customer_name) && empty($customer_id)) {
    $cus_sql = "INSERT INTO suppliers (supplier_name, supplier_phone, supplier_email, supplier_address, supplier_contact_name)
VALUES ('$new_customer', '$cus_mobile', '', '$new_customer_address' , '$contact_person')";    
	$conn->query($cus_sql);
    $cus_last_id = $conn->insert_id;	
		}else{
			 $cus_last_id =$customer_id;
			
		}
		
		$get_cus_sql = "SELECT * FROM `suppliers` WHERE `supplier_id` = $cus_last_id ";
	$get_cus_query=$conn->query($get_cus_sql);
	$cus_row = $get_cus_query->fetch_assoc();
	$cus_name =$cus_row['supplier_name'];
		
		
			
	$order_sql = "INSERT INTO sup_orders (customer_id, auth_id, date_order_placed) VALUES ('$cus_last_id','$auth_id', '$datepicker_invoice_date')";  
	$order_sqlq=$conn->query($order_sql);
	$order_last_id=$conn->insert_id;
	
	$invoice_sql = "INSERT INTO sup_invoices (order_id, paper_inv_no, grn_no) VALUES ('$order_last_id','$paper_inv_no', '$grn_no' )";  
	$invoice_sqlq=$conn->query($invoice_sql);
	 $invoice_last_id=$conn->insert_id;
	
	 $items_lines=sizeof($_POST['product_id']);	
		
	for($x = 0; $x < $items_lines; $x++) {
		if(strip_tags($_POST['discount'][$x])==''){ 
		$line_item_discount=0;
		}else{
			$line_item_discount=strip_tags($_POST['discount'][$x]);
		}
	$inv_line_sql = "INSERT INTO sup_invoice_line_items (order_id,invoice_no_id,product_id,product_quantity,product_rate,discount,total_price) 
	VALUES ('$order_last_id','$invoice_last_id','".strip_tags($_POST['product_id'][$x])."','".strip_tags($_POST['product_quantity'][$x])."','".strip_tags($_POST['product_rate'][$x])."', '$line_item_discount', '".strip_tags($_POST['total_price'][$x])."')";  
	$inv_line_sqlq=$conn->query($inv_line_sql);	
	
	$update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` + '".strip_tags($_POST['product_quantity'][$x])."' where p_id='".strip_tags($_POST['product_id'][$x])."'";    
	$conn->query($update_product_table);
	
	
	
	$get_p_sql = "SELECT * FROM `product_detail` WHERE `p_id` = '".strip_tags($_POST['product_id'][$x])."' ";
	$get_p_query=$conn->query($get_p_sql);
	$p_row = $get_p_query->fetch_assoc();
	$p_qty =$p_row['product_quantity'];
	
	$sql_stock="INSERT INTO `stock_tb` ( `date`, `particular`, `p_id`, `s_in`, `s_out`, `balance`, `reg_date`, `status`, `invoice_no`, `order_no`) VALUES ( '$datepicker_invoice_date', '$cus_name', '".strip_tags($_POST['product_id'][$x])."', '".strip_tags($_POST['product_quantity'][$x])."',  '0', '$p_qty', CURRENT_TIMESTAMP, '$invoice_last_id', '$paper_inv_no', '1')";
 	$query_stock=$conn->query($sql_stock);
	
	
		
	}
		
	$total_discount      = strip_tags($_POST['total_discount']);
	$grand_total_price     = strip_tags($_POST['grand_total_price']);
	
	$dis_vat      = strip_tags($_POST['paid_amount']);
	$minus_vat     = strip_tags($_POST['due_amount']);
	 $payment_status=0; 


		// to add balance script
	
			@$totalin_sql = "SELECT sum(grand_total_price) as totalin FROM `sup_invoice_payment_detail` WHERE `customer_id` = $cus_last_id ";  
			@$totalin_result=$conn->query($totalin_sql);
			@$totalin_row = $totalin_result->fetch_assoc();
			@$totalin =$totalin_row['totalin'];
			
			@$totalout_sql = "SELECT sum(paid_amount) as totalout FROM `sup_invoice_payment_detail` WHERE `customer_id` = $cus_last_id ";  
			@$totalout_result=$conn->query($totalout_sql);
			@$totalout_row = $totalout_result->fetch_assoc();
			@$totalout =$totalout_row['totalout'];
			
			 @$new_balance =($totalout - ($totalin + $_POST['grand_total_price']));
	

			$inv_pay_sql = "INSERT INTO sup_invoice_payment_detail (customer_id, order_id, invoice_no_id, total_discount, grand_total_price, paid_amount, 		balance, due_amount, payment_detail_date, auth_id, payment_detail_status) 
	VALUES ('$cus_last_id', '$order_last_id', '$invoice_last_id', '$dis_vat', '$grand_total_price',0, '$new_balance', '$minus_vat', '$datepicker_invoice_date', '$auth_id', '$payment_status')";  
	$inv_pay_sqlq=$conn->query($inv_pay_sql);
 	
	$response['status'] = 'successfully';		

}else{	
		
	$response['status']= 'error';
	
	}



echo json_encode($response);
?>
