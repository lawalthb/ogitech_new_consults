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

if(!empty($_POST['loaner_id']) && !empty($_POST['loaner_name']))
{
  	$loaner_id      = strip_tags($_POST['loaner_id']);
	$loaner_name      = strip_tags($_POST['loaner_name']);    
	$loaner_mobile      = strip_tags($_POST['loaner_mobile']);
    $loaner_address     = strip_tags($_POST['loaner_address']); 
	
   $sql = "UPDATE loan_needer SET loaner_name='$loaner_name',
   loaner_mobile='$loaner_mobile',loaner_address='$loaner_address' 
    WHERE loaner_id='$loaner_id'";   
	
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