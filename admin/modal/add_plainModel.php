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

if(!empty($_POST['kg']))
{
  
	$kg      = strip_tags($_POST['kg']);
    $date_in     = strip_tags($_POST['date_in']);
	$micron      = strip_tags($_POST['micron']); 
	$remark_in      = strip_tags($_POST['remark_in']);
	$sn      = strip_tags($_POST['sn']);
	$sn      = strip_tags($_POST['sn']);
	$auth_id     = strip_tags($_POST['auth_id']);
	
    $sql = "INSERT INTO `plain_water_tb` (`plain_water_id`, `seria_n`, `date_in`, `micron`, `kg`, `date_out`, `user_id`, `status`, `remark_in`, `remark_out`) VALUES (NULL, '$sn', '$date_in', '$micron', '$kg', '0000-00-00', '$auth_id', '0', '$remark_in', '');";    

	
     	if ($conn->query($sql) === TRUE) {
			$response['status'] = 'successfully'; 
		} else {
			$response['status']= 'error';
		}		
}elseif(isset($_POST['date_out'])){
 	
 
$kg2      = strip_tags($_POST['kg2']);
    $date_out     = strip_tags($_POST['date_out']);
	$micron      = strip_tags($_POST['micron']); 
	$remark_out      = strip_tags($_POST['remark_out']);	
	$auth_id     = strip_tags($_POST['auth_id']);

	$product_id     = strip_tags($_POST['product_id']);
	
     $sql = "UPDATE `plain_water_tb` SET `product_id` = '$product_id', `date_out` = '$date_out', `status` = '1', `remark_out` = '$remark_out' WHERE `plain_water_tb`.`plain_water_id` ='$kg2'";    

 if ($conn->query($sql) === TRUE) {
			$response['status'] = 'successfully2'; 
		} else {
			$response['status']= 'error';
		}		


}
else{
            
		$response['status'] = 'error';
}
 


echo json_encode($response);
?>
