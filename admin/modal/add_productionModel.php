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

	$paper_inv_no     = strip_tags($_POST['paper_inv_no']);
 	$auth_id     = strip_tags($_POST['auth_id']);
    $datepicker_invoice_date     = strip_tags($_POST['datepicker_invoice_date']);
    $doc_comment     = strip_tags($_POST['doc_comment']);
    
	$order_sql = " INSERT INTO `documents` (`documnents_id`, `document_date`, `document_no`, `document_comments`, `lpo_grn`, `document_type`, `inserted_at`, `auth_id`, `updated_at`, `updated_by`) VALUES (NULL, '$datepicker_invoice_date', '$paper_inv_no', '$doc_comment', '0', '88', CURRENT_TIMESTAMP, '$auth_id', CURRENT_TIMESTAMP, '0')";  
	$order_sqlq=$conn->query($order_sql);
	$order_last_id=$conn->insert_id;
		
	

    $product_input      = strip_tags($_POST['product_input']);
    $product_input_name      = strip_tags($_POST['product_input_name']);
	$ipa     = strip_tags($_POST['ipa']);
	$toluene      = strip_tags($_POST['toluene']);
    $butanol     = strip_tags($_POST['butanol']);
    $product_output_name      = strip_tags($_POST['product_output_name']);
    $product_output      = strip_tags($_POST['product_output']);
	$wastage     = strip_tags($_POST['wastage']);
	$damage      = strip_tags($_POST['damage']);
    $operator     = strip_tags($_POST['operator']);
    $duty      = strip_tags($_POST['duty']);
	$machine     = strip_tags($_POST['machine']);
	$production_price      = strip_tags($_POST['production_price']);
	$selling_price     = strip_tags($_POST['selling_price']);

	$core_input      = strip_tags($_POST['core_input']);
	$core_output     = strip_tags($_POST['core_output']);
	$reflex      = strip_tags($_POST['reflex']);
	$royal     = strip_tags($_POST['royal']);
	$sky     = strip_tags($_POST['sky']);


$total_input = $product_input+$ipa+$toluene+$butanol ;
    



	$get_p_sql = "INSERT INTO `production_tb` (`product_id`, `documnents_id`, `product_input_name`, `product_input`, `ipa`, `toluene`, `butanol`, `product_output_name`, `product_output`, `core_input`,  `core_output`, `reflex`, `royal`, `sky`,   `wastage`, `damage`, `operator`, `duty`, `machine`, `status`, `total_input`, `production_price`, `selling_price`) VALUES (NULL, '$order_last_id', '$product_input_name', '$product_input', '$ipa', '$toluene', '$butanol', '$product_output_name', '$product_output', '$core_input', '$core_output', '$reflex', '$royal', '$sky', '$wastage', '$damage', '$operator', '$duty', '$machine', '1', '$total_input', '$production_price', '$selling_price')";
	$get_p_query=$conn->query($get_p_sql);
	
    
    $response['status'] = 'successfully';	

	


echo json_encode($response);
?>
