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


// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);



$response = array();

if((!empty($_POST['product_id'][0])) ) {
	
	$paper_inv_no     = strip_tags($_POST['paper_inv_no']);
 	$auth_id     = strip_tags($_POST['auth_id']);
	
	$datepicker_invoice_date     = strip_tags($_POST['datepicker_invoice_date']);
		
		// 1 is transfer to Store Voucher
	$cus_last_id =10001;
	
	$order_sql = "INSERT INTO transfer_tb (customer_id, auth_id,date_order_placed) VALUES ('Inter Transfer','$auth_id', '$datepicker_invoice_date')";  
	$order_sqlq=$conn->query($order_sql);
	$order_last_id=$conn->insert_id;
	
	
	
	 $items_lines=sizeof($_POST['product_id']);	
		
	for($x = 0; $x < $items_lines; $x++) {
		$line_item_discount=strip_tags($_POST['discount'][$x]);
		
	$inv_line_sql = "INSERT INTO trans_line_items (order_id,invoice_no_id,product_id,product_quantity,product_rate,discount,total_price) 
	VALUES ('$order_last_id','$invoice_last_id','".strip_tags($_POST['product_id'][$x])."','".strip_tags($_POST['product_quantity'][$x])."','".strip_tags($_POST['product_rate'][$x])."', '$line_item_discount', '".strip_tags($_POST['total_price'][$x])."')";  
	$inv_line_sqlq=$conn->query($inv_line_sql);	
	
	
	if(strip_tags($_POST['discount'][$x])=='Slitting' or strip_tags($_POST['discount'][$x])=='Printing' or strip_tags($_POST['discount'][$x])=='Cutting'  ){ 
		$update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` + '".strip_tags($_POST['product_quantity'][$x])."' where p_id='".strip_tags($_POST['product_id'][$x])."'";    
	$conn->query($update_product_table);
			}else{
			
		$update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` - '".strip_tags($_POST['product_quantity'][$x])."' where p_id='".strip_tags($_POST['product_id'][$x])."'";    
	$conn->query($update_product_table);
		}





	
	$get_p_sql = "SELECT * FROM `product_detail` WHERE `p_id` = '".strip_tags($_POST['product_id'][$x])."' ";
	$get_p_query=$conn->query($get_p_sql);
	$p_row = $get_p_query->fetch_assoc();
	$p_qty =$p_row['product_quantity'];
	
	if(strip_tags($_POST['discount'][$x])=='Slitting' or strip_tags($_POST['discount'][$x])=='Printing'  or strip_tags($_POST['discount'][$x])=='Cutting' ){ 
	$sql_stock="INSERT INTO `stock_tb` ( `date`, `particular`, `p_id`, `s_in`, `s_out`, `balance`, `reg_date`, `status`, `invoice_no`, `order_no`) VALUES ( '$datepicker_invoice_date', '$line_item_discount', '".strip_tags($_POST['product_id'][$x])."', '".strip_tags($_POST['product_quantity'][$x])."',  '0',  '$p_qty', CURRENT_TIMESTAMP, '$invoice_last_id', '$order_last_id', '1')";
 	$query_stock=$conn->query($sql_stock);
 	}else{
	$sql_stock="INSERT INTO `stock_tb` ( `date`, `particular`, `p_id`, `s_in`, `s_out`, `balance`, `reg_date`, `status`, `invoice_no`, `order_no`) VALUES ( '$datepicker_invoice_date', '$line_item_discount', '".strip_tags($_POST['product_id'][$x])."', '0', '".strip_tags($_POST['product_quantity'][$x])."', '$p_qty', CURRENT_TIMESTAMP, '$invoice_last_id', '$order_last_id', '1')";
 	$query_stock=$conn->query($sql_stock);

 }
		
	}
		
	$total_discount      = strip_tags($_POST['total_discount']);
	$grand_total_price     = strip_tags($_POST['grand_total_price']);
	
	$dis_vat      = strip_tags($_POST['paid_amount']);
	$minus_vat     = strip_tags($_POST['due_amount']);
	 $payment_status=0; 


		// to add balance script
	
			
	

$inv_pay_sql = "INSERT INTO trans_payment_detail (customer_id, order_id, invoice_no_id, total_discount, grand_total_price, paid_amount, balance, due_amount, payment_detail_date, auth_id, payment_detail_status) 
	VALUES ('$cus_last_id', '$order_last_id', '$invoice_last_id', '$dis_vat', '$grand_total_price','0', '0', '$minus_vat', '$datepicker_invoice_date', '$auth_id', '$payment_status')";  
	$inv_pay_sqlq=$conn->query($inv_pay_sql);
	
	
	
	
	
	
	$response['status'] = 'successfully';		

}else{	
		
	$response['status']= 'error';
	
	}



echo json_encode($response);
?>
