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

if(!empty($_POST['cus_id']) && !empty($_POST['cus_name']))
{
  	$cus_id      = strip_tags($_POST['cus_id']);
	$cus_name      = strip_tags($_POST['cus_name']);    
	$cus_email      = strip_tags($_POST['cus_email']);
    $cus_mobile     = strip_tags($_POST['cus_mobile']); 
	$cus_address      = strip_tags($_POST['cus_address']);
   $sql = "UPDATE customers SET cus_name='$cus_name',
   cus_email='$cus_email',cus_mobile='$cus_mobile',
   cus_address='$cus_address' WHERE cus_id='$cus_id'";   
	
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