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

if((!empty($_POST['customer_name'])) || (!empty($_POST['new_customer'])) && (!empty($_POST['product_id'][0])) ) {

	$paper_inv_no     = strip_tags($_POST['paper_inv_no']);
    $lpo_no     = strip_tags($_POST['lpo_no']);
 	$auth_id     = strip_tags($_POST['auth_id']);
	$customer_name      = strip_tags($_POST['customer_name']);
	$customer_id     = strip_tags($_POST['customer_id']);
	$new_customer      = strip_tags($_POST['new_customer']);
	$cus_mobile     = strip_tags($_POST['cus_mobile']);
    $new_customer_address     = strip_tags($_POST['new_customer_address']);
	$marketer_id     = strip_tags($_POST['marketer_id']);

	$ac_type     = strip_tags($_POST['ac_type']);
	$inv_type     = strip_tags($_POST['inv_type']);



	$doc_comment   =strip_tags($_POST['doc_comment']);
	$lpo_grn= $lpo_no;
	$document_type="1";
	$datepicker_invoice_date     = strip_tags($_POST['datepicker_invoice_date']);


	//INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_mobile`, `cus_email`, `cus_marketer_id`, `cus_address`, `ac_type`) VALUES (NULL, 'lawal poly', '08132712515', 'lawalthb@gmail.com', '1', 'ilorin', '1');



	if(empty($customer_name) && empty($customer_id)) {
		if($ac_type==1 ){
    $cus_sql = "INSERT INTO customers ( `cus_name`, `cus_mobile`, `cus_email`, `cus_marketer_id`, `cus_address`, `ac_type`, `act_type_id`, `act_grp_id`)
VALUES ('$new_customer', '$cus_mobile', '-', '$marketer_id','$new_customer_address' ,'$ac_type' ,'1', '1')";  }

elseif($ac_type==2 ){
    $cus_sql = "INSERT INTO customers ( `cus_name`, `cus_mobile`, `cus_email`, `cus_marketer_id`, `cus_address`, `ac_type`, `act_type_id`, `act_grp_id`)
VALUES ('$new_customer', '$cus_mobile', '-', '$marketer_id','$new_customer_address' ,'$ac_type' ,'2', '2')";  }


	$conn->query($cus_sql);
    $cus_last_id = $conn->insert_id;
		}else{
			 $cus_last_id =$customer_id;

		}

		$get_cus_sql = "SELECT * FROM `customers` WHERE `cus_id` = $cus_last_id ";
	$get_cus_query=$conn->query($get_cus_sql);
	$cus_row = $get_cus_query->fetch_assoc();
	$cus_name =$cus_row['cus_name'];
	$act_type_id=$cus_row['act_type_id'];
	$act_grp_id = $cus_row['act_grp_id'];

	//id 	document_date 	document_no 	document_comments 	internal_comments 	document_type 	inserted_at 	inserted_by 	updated_at 	updated_by
		$document_type= $ac_type.$inv_type ;
	$invoice_sql = "INSERT INTO `documents` (`documnents_id`, `document_date`, `document_no`, `document_comments`, `lpo_grn`, `document_type`, `inserted_at`, `auth_id`, `updated_at`, `updated_by`) VALUES (NULL, '$datepicker_invoice_date', '$paper_inv_no', '$doc_comment', '$lpo_grn', '$document_type', CURRENT_TIMESTAMP, '$auth_id', CURRENT_TIMESTAMP, '0')";
	$invoice_sqlq=$conn->query($invoice_sql);
	 $invoice_last_id=$conn->insert_id;


	  $items_lines=sizeof($_POST['product_id']);
    
	for($x = 0; $x < $items_lines; $x++) {
		if(strip_tags($_POST['discount'][$x])==''){
		$line_item_discount=0;
		}else{
			$line_item_discount=strip_tags($_POST['discount'][$x]);
		}
	 $inv_line_sql = "INSERT INTO invoice_line_items (invoice_no_id,product_id,product_quantity,product_rate,purchase_rate,total_price, commet)
	VALUES ('$invoice_last_id',
	'".strip_tags($_POST['product_id'][$x])."',
	'".strip_tags($_POST['product_quantity'][$x])."',
	'".strip_tags($_POST['product_rate'][$x])."',
	'2000.00',
	'".strip_tags($_POST['total_price'][$x])."',

	'".strip_tags($_POST['commet'][$x])."')";
	$inv_line_sqlq=$conn->query($inv_line_sql);

   

	$ac_type    ;
	$inv_type ;

	if(($ac_type==1 and $inv_type==1) or ($ac_type==2 and $inv_type ==2) )
	{
		//'Sales  or purchase return - minus';
		$update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` - '".strip_tags($_POST['product_quantity'][$x])."', `product_sell_price`='".strip_tags($_POST['product_rate'][$x])."'  where p_id='".strip_tags($_POST['product_id'][$x])."'";
	$conn->query($update_product_table);

	}elseif(($ac_type==2 and $inv_type==1) or ($ac_type==1 and $inv_type ==2) )
	{

		//'Purchase or  Sales return - add';

		$update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` + '".strip_tags($_POST['product_quantity'][$x])."', `product_supplier_price`='".strip_tags($_POST['product_rate'][$x])."'  where p_id='".strip_tags($_POST['product_id'][$x])."'";
	$conn->query($update_product_table);
	}



	$get_p_sql = "SELECT * FROM `product_detail` WHERE `p_id` = '".strip_tags($_POST['product_id'][$x])."' ";
	$get_p_query=$conn->query($get_p_sql);
	$p_row = $get_p_query->fetch_assoc();
	$p_qty =$p_row['product_quantity'];


	if(($ac_type==1 and $inv_type==1) or ($ac_type==2 and $inv_type ==2) )
	{
	$sql_stock="INSERT INTO `stock_tb` ( `date`, `particular`, `p_id`, `s_in`, `s_out`, `balance`, `reg_date`, `status`, `invoice_no`, `order_no`) VALUES ( '$datepicker_invoice_date', '$cus_name', '".strip_tags($_POST['product_id'][$x])."', '0', '".strip_tags($_POST['product_quantity'][$x])."', '$p_qty', CURRENT_TIMESTAMP, '$invoice_last_id', '$invoice_last_id', '1')";
	}elseif(($ac_type==2 and $inv_type==1) or ($ac_type==1 and $inv_type ==2) )
	{
		$sql_stock="INSERT INTO `stock_tb` ( `date`, `particular`, `p_id`, `s_in`, `s_out`, `balance`, `reg_date`, `status`, `invoice_no`, `order_no`) VALUES ( '$datepicker_invoice_date', '$cus_name','".strip_tags($_POST['product_id'][$x])."',  '".strip_tags($_POST['product_quantity'][$x])."', '0', '$p_qty', CURRENT_TIMESTAMP, '$invoice_last_id', '$invoice_last_id', '1')";

	}

 	$query_stock=$conn->query($sql_stock);


	}

	$total_discount      = strip_tags($_POST['total_discount']);
	$grand_total_price     = strip_tags($_POST['grand_total_price']);

	$dis_vat      = strip_tags($_POST['paid_amount']);
	$minus_vat     = strip_tags($_POST['due_amount']);
	 $payment_status=0;


		// to add balance script


    //Full texts	id 	documents_id 	dr_amount 	cr_amount 	person_id 	act_type_id 	act_grp_id


	if(($ac_type==1 and $inv_type==1) or ($ac_type==2 and $inv_type ==2))
	{
            //'Sales  or purchase return - minus';
            $inv_pay_sql = "INSERT INTO ledger_entries (documents_id, account_id,   dr_amount, cr_amount, sub_acct_group_id,  act_grp_id )
        VALUES ('$invoice_last_id', '$cus_last_id' , '$grand_total_price',0,  '$act_type_id', '$act_grp_id')";

        $inv_pay_sql2 = "INSERT INTO ledger_entries (documents_id, account_id,   dr_amount, cr_amount, sub_acct_group_id,  act_grp_id )
        VALUES ('$invoice_last_id', '528' , 0, '$grand_total_price',  '49', '50')";


	}elseif(($ac_type==2 and $inv_type==1) or ($ac_type==1 and $inv_type ==2)  )
	{

		//'Purchase or  Sales return - add';
		$inv_pay_sql = "INSERT INTO ledger_entries (documents_id, account_id,   dr_amount, cr_amount, sub_acct_group_id,  act_grp_id )
		VALUES ('$invoice_last_id', '$cus_last_id' , 0, '$grand_total_price',  '$act_type_id', '$act_grp_id')";


		$inv_pay_sql2 = "INSERT INTO ledger_entries (documents_id, account_id,   dr_amount, cr_amount, sub_acct_group_id,  act_grp_id )
		VALUES ('$invoice_last_id', '529' , '$grand_total_price',  0, '51', '52')";

	}



	if ($conn->query($inv_pay_sql) === TRUE) {

        $conn->query($inv_pay_sql2);
        $response['status'] = 'successfully';
    } else {
        $response['status']= 'error';
    }


}


echo json_encode($response);
?>
