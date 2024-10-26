<?php

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
// From Last year to Date
   /*$op_st = date("Y-m-01");
   $op_st2 = date("2019-05-01");
	$op_en2 = date("2019-05-31");					 $op_en = date("Y-m-31");
   $sql = "SELECT COUNT(ipd.invoice_payment_id) as total_orders, SUM(ipd.grand_total_price) AS revenue,SUM(ipd.total_discount) as total_discount,SUM(ipd.paid_amount) AS paid_amount,SUM(ipd.due_amount) AS receivable FROM invoice_payment_detail as ipd where `ipd`.`payment_detail_date`  BETWEEN '$op_st' AND '$op_en'";
   
$pur_sql= "SELECT sum(grand_total_price- paid_amount) as total_owning FROM `sup_invoice_payment_detail` ";
$result = $conn->query($sql);
$pur_result = $conn->query($pur_sql);
$pur_row = $pur_result->fetch_assoc();


$sqlLast = "SELECT COUNT(ipd.invoice_payment_id) as total_orders, SUM(ipd.grand_total_price) AS revenue,SUM(ipd.total_discount) as total_discount,SUM(ipd.paid_amount) AS paid_amount,SUM(ipd.due_amount) AS receivable FROM invoice_payment_detail as ipd where `ipd`.`payment_detail_date`  BETWEEN '$op_st2' AND '$op_en2'";
$resultLast = $conn->query($sqlLast);
$rowLast = $resultLast->fetch_assoc();
$total_last_sales=$rowLast['receivable'];


$sqlLast2 = "SELECT COUNT(ipd.invoice_payment_id) as total_orders, SUM(ipd.grand_total_price) AS revenue,SUM(ipd.total_discount) as total_discount,SUM(ipd.paid_amount) AS paid_amount,SUM(ipd.due_amount) AS receivable FROM sup_invoice_payment_detail as ipd where `ipd`.`payment_detail_date`  BETWEEN '$op_st2' AND '$op_en2'";
$resultLast2 = $conn->query($sqlLast2);
$rowLast2 = $resultLast2->fetch_assoc();
$total_last_purchase=$rowLast2['receivable'];


if ($result->num_rows > 0) 
{
	// output data of each row
	
	while($row = $result->fetch_assoc()) 
	{ 
		$total_orders=$row['total_orders'];
		$revenue=$row['revenue'];
		$total_discount=$pur_row['total_owning'];
		$paid_amount=$row['paid_amount'];
		$receivable=$row['receivable'];
			
	}
	
								$totalin_sql = "SELECT SUM(amount_in) AS totalin FROM petty_cash_tb";  
	$totalin_result=$conn->query($totalin_sql);
			$totalin_row = $totalin_result->fetch_assoc();
			$totalin =$totalin_row['totalin'];
			
			$totalout_sql = "SELECT SUM(amount_out) AS totalout FROM petty_cash_tb";  
	$totalout_result=$conn->query($totalout_sql);
			$totalout_row = $totalout_result->fetch_assoc();
			$totalout =$totalout_row['totalout'];
			
			 $new_balance =(($totalin - $totalout));
									$revenue = $new_balance;
	
	
	
@$sale=$total_discount+$paid_amount+$receivable;  //Total Sales data
	
@$receivableper=round((($receivable/$revenue)*100),2);  //Total Receivable data
@$total_discountper=round((($total_discount/$revenue)*100),2); //Total Discount data
@$paid_amountper=round((($paid_amount/$revenue)*100),2);   //Total Paid amount data
*/
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


//}

// get total discount,sold product quantity,sold products types, product rate query
$sql1 = "SELECT SUM(product_quantity * discount) as totaldiscount,SUM(product_quantity * product_rate) as acutle_rate, SUM(`product_quantity`) as total_sold_product_quantity,COUNT(`product_id`)  AS total_sold_products FROM `invoice_line_items` INNER JOIN invoice_payment_detail ON invoice_line_items.order_id=invoice_payment_detail.order_id and `invoice_payment_detail`.`payment_detail_date`  BETWEEN '$op_st' AND '$op_en' ";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) 
{
		
	while($row1 = $result1->fetch_assoc()) 
	{ 
		$totaldiscount=$row1['totaldiscount'];
		//$acutle_rate=$row1['acutle_rate'];
		//$total_sold_product_quantity=$row1['total_sold_product_quantity'];	
		//$total_sold_products=$row1['total_sold_products'];	
	}
}

?>
