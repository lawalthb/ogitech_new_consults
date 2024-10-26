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

if(!empty($_POST['cus_name']))
{
  
	$cus_name      = strip_tags($_POST['cus_name']);
    $cus_mobile     = strip_tags($_POST['cus_mobile']);
	$cus_email      = strip_tags($_POST['cus_email']); 
	$cus_address      = strip_tags($_POST['cus_address']);
	$marketer_id      = strip_tags($_POST['marketer_id']);
    $sql = "INSERT INTO customers (cus_name, cus_mobile, cus_email, cus_marketer_id, cus_address, `ac_type`, `act_type_id`, `act_grp_id`)
VALUES ('$cus_name', '$cus_mobile', '$cus_email',  '$marketer_id', '$cus_address', '1', '1', '1')";    
	
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