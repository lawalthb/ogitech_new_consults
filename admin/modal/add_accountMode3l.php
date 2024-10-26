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

if(!empty($_POST['cat_name']))
{

    $cat_name      = strip_tags($_POST['cat_name']);
    $phone      = strip_tags($_POST['phone']);
    $email      = strip_tags($_POST['email']);
    $address      = strip_tags($_POST['address']);
    $acct_grp      = strip_tags($_POST['acct_grp']);
    $w = "SELECT *  FROM `sub_acct_group_tb` WHERE `sub_acct_group_id` = $acct_grp";
                                $resultw = $conn->query($w);
                                $roww = $resultw->fetch_assoc();
                               $act_grp =  $roww['acct_group_id'];

    $code      = 10001;
    $sql = "INSERT INTO sub_acct_group_tb (acct_group_id, names, code, level, act_grp, phone, email, address) VALUES ('$acct_grp','$cat_name','$code','2', '$act_grp', '$phone', '$email', '$address')";


    $sql2 = "INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_mobile`, `cus_email`, `cus_marketer_id`, `cus_address`, `ac_type`, `act_type_id`, `act_grp_id`, `opening_balance`) VALUES (NULL, '$cat_name', '$phone', '$email', '1', 'lagos', '0', '$acct_grp', '$act_grp', '0')";

     	if ($conn->query($sql) === TRUE) {
            $r2=$conn->query($sql2);
           // $invoice_last_id=$conn->insert_id;

			$response['status'] = 'successfully';
		} else {
			$response['status']= 'error';
		}



}else{

		$response['status'] = 'error';
}




echo json_encode($response);
?>
