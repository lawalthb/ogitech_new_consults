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

if(!empty($_POST['bank_id']) && !empty($_POST['bank_name']) )
{
  	$bank_id      = $_POST['bank_id'];
	$bank_name      = strip_tags($_POST['bank_name']);  
	$bank_display_name      = strip_tags($_POST['bank_display_name']);  
    $bank_number      = $_POST['bank_number'];
    $bank_status      = $_POST['bank_status'];
    $display_inv      = $_POST['display_inv']; 
    $bank_code      = $_POST['bank_code'];  
   $sql = "UPDATE `banks_tb` SET `bank_name` = '$bank_name', `bank_display_name` = '$bank_display_name', 
   `bank_number` = '$bank_number', `bank_status` = '$bank_status', `display_inv` = '$display_inv' WHERE `banks_tb`.`bank_id` = $bank_id;";   
  $cus_name = $bank_name ."-". $bank_number;
 $sql2 = "UPDATE `customers` SET `cus_name` = '$cus_name' WHERE `customers`.`cus_id` =$bank_code";
  $conn->query($sql2);
 
     	if ($conn->query($sql) === TRUE) {
           
            
			$response['status'] = 'successfully'; 
		} else {
			$response['status']= 'error';
		}
		   
				
		
}else{
            
		$response['status'] = 'error';
}

  


echo json_encode($response);
?>