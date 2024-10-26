<?php
// From Last year to Date
   $op_st = date("Y-m-01");
   $op_st2 = date("2019-12-31");
	$op_en2 = date("2019-12-31");					 
	$op_en = date("Y-m-31");
   $sales_sql = "SELECT sum(ledger_entries.dr_amount) as sdr FROM documents, ledger_entries where documents.document_type =11 and documents.documnents_id = ledger_entries.documents_id and documents.document_date BETWEEN '$op_st' AND '$op_en' ";

$sales_result = $conn->query($sales_sql);
$sales_row = $sales_result->fetch_assoc();
$total_sales= $sales_row['sdr'];


$pur_sql = "SELECT sum(ledger_entries.cr_amount) as scr FROM documents, ledger_entries where documents.document_type =21 and documents.documnents_id = ledger_entries.documents_id and documents.document_date BETWEEN '$op_st' AND '$op_en' ";

$pur_result = $conn->query($pur_sql);
$pur_row = $pur_result->fetch_assoc();
$total_pur= $pur_row['scr'];


//$out_sql = "SELECT sum(dr_amount) as sdr, sum(cr_amount) as scr  FROM `ledger_entries` WHERE `sub_acct_group_id` = 1 or `sub_acct_group_id` = 7";
// to get diff btw total customer sales and income
$total_cust_sales = "SELECT sum(dr_amount) as sdr FROM `ledger_entries`  WHERE `against` = 0 AND `sub_acct_group_id` = 1 AND `act_grp_id` = 1";
$total_cust_income = "SELECT sum(cr_amount) as scr FROM `ledger_entries`  WHERE  `sub_acct_group_id` = 7 and `act_grp_id` = 1";

$total_cust_sales_result = $conn->query($total_cust_sales);
$total_cust_income_result = $conn->query($total_cust_income);


$out_sales = $total_cust_sales_result->fetch_assoc();
$out_income = $total_cust_income_result->fetch_assoc();
$total_out = $out_sales['sdr'] - $out_income['scr'];


$cash_sql = "SELECT sum(dr_amount) as sdr, sum(cr_amount) as scr FROM `ledger_entries` WHERE account_id = 303";

$cash_result = $conn->query($cash_sql);
$cash_row = $cash_result->fetch_assoc();
$total_cash = $cash_row['sdr'] - $cash_row['scr'];

 $last_no = "SELECT * FROM `documents`  where `document_type` = 51 ORDER BY `documents`.`documnents_id` DESC ";
                $result_last_no = $conn->query($last_no);
                $row_last_no = $result_last_no->fetch_assoc();
                $vno = $row_last_no['document_no'];





// get total customer query
$result01 = $conn->query("SELECT COUNT(`cus_id`) as total_customer from `customers`");
$row01 = $result01->fetch_assoc();
$total_sold_products=$row01['total_customer'];



// get total customer query
$result0 = $conn->query("SELECT COUNT(`supplier_id`) as total_customer from `suppliers`");
$row0 = $result0->fetch_assoc();
$total_sold_product_quantity=$row0['total_customer']-1;


// get total customer query
$result2 = $conn->query("SELECT COUNT(`product_id`) as total_customer from `product`");
$row2 = $result2->fetch_assoc();
$total_customer=$row2['total_customer'];
// get total suppliers query
$result3 = $conn->query("SELECT COUNT(`cat_id`) as total_suppliers from `categories`");
$row3 = $result3->fetch_assoc();
$total_suppliers=$row3['total_suppliers'];
// get total product query
$result4 = $conn->query("SELECT COUNT(`marketer_id`) as total_categories from `marketer_tb`");
$row4 = $result4->fetch_assoc();
$total_products=$row4['total_categories'];
// get total product categories query
$result5 = $conn->query("SELECT COUNT(`auth_id`) as total_categories from `auth`");
$row5 = $result5->fetch_assoc();
$total_categories=$row5['total_categories'];

// get total product query
//$result6 = $conn->query("SELECT COUNT(`product_id`) as total_products from `product`");
//$row6 = $result6->fetch_assoc();
//$total_products6=$row6['total_products'];





?>
