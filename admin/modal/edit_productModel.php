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

if(!empty($_POST['p_id']) && !empty($_POST['product_name']) && !empty($_POST['category_id']) && !empty($_POST['warehouse_id']) && !empty($_POST['product_qty'])
&& !empty($_POST['sell_price']) && !empty($_POST['supplier_price']) && !empty($_POST['model']) && !empty($_POST['sku']) && !empty($_POST['supplier_id']))
{
  	$p_id=$_POST['p_id'];
	$product_name      = strip_tags($_POST['product_name']);
    $category_id     = $_POST['category_id'];
	$warehouse_id      = $_POST['warehouse_id'];
    $product_qty     = strip_tags($_POST['product_qty']); 
	$sell_price      = strip_tags($_POST['sell_price']);
	$supplier_price      = strip_tags($_POST['supplier_price']);
    $model     = strip_tags($_POST['model']);
	$sku      = strip_tags($_POST['sku']);
    $supplier_id     = $_POST['supplier_id']; 
	
	$productdetail_id      = strip_tags($_POST['productdetail_id']);
	


	
    $sql = "UPDATE product SET product_name='$product_name', product_model='$model', product_sku='$sku', product_image='none', product_detail='None' where product_id='$p_id'";  
	
     	if ($conn->query($sql) === TRUE) {			
			
			$sqla = "UPDATE product_detail SET s_id='$supplier_id', c_id='$category_id', w_id='$warehouse_id',  datepicker_mfg_date='None', datepicker_exp_date='None', product_quantity='$product_qty', product_sell_price='$sell_price', product_supplier_price='$supplier_price' where productdetail_id='$productdetail_id'";  
			$conn->query($sqla);
			
			$response['status'] = 'successfully'; 
			
		}  
		 }else {			
	
				$sql = "UPDATE product SET product_name='$product_name', product_model='$model', product_sku='$sku', product_detail='None' where product_id='$p_id'";  
				
				if ($conn->query($sql) === TRUE) {			
				
				$sqla = "UPDATE product_detail SET s_id='$supplier_id', c_id='$category_id', w_id='$warehouse_id',  datepicker_mfg_date=NULL, datepicker_exp_date= NULL, product_quantity='$product_qty', product_sell_price='$sell_price', product_supplier_price='$supplier_price' where productdetail_id='$productdetail_id'";  
				$conn->query($sqla);
				
				$response['status'] = 'successfully'; 
				
		} 
		

}

  


echo json_encode($response);
?>