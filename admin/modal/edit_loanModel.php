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

if(!empty($_POST['loan_contract_id']) && !empty($_POST['amount_of_payment']))
{
  	$loan_contract_id      = trim($_POST['loan_contract_id']);
	$amount_of_payment      = strip_tags($_POST['amount_of_payment']); 	  
	$remarks      = strip_tags($_POST['remarks']); 
	$date_of_payment= date("Y-m-d"); 
	
   $sql = "INSERT INTO loan_payments (loan_contract_id,date_of_payment,amount_of_payment,remarks)
    VALUES ('$loan_contract_id','$date_of_payment','$amount_of_payment','$remarks')";   
	
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