<?php
require_once ('../connection/connection.php');




 	$voucher_no      = strip_tags($_POST['voucher_no']);
	$auth_id     = strip_tags($_POST['auth_id']);
	$datepicker_invoice_exp      = strip_tags($_POST['datepicker_invoice_exp']);	
	$particular      = strip_tags($_POST['particular']);
	$details      = strip_tags($_POST['details']);	
	$amount_out      = $_POST['amount_out'];
	$other_cat      = strip_tags($_POST['other_cat']);	
			$date_up  = date("Y-m-d");
			
			
			echo $totalin_sql = "SELECT SUM(amount_in) FROM petty_cash_tb";  
	$totalin_result=$conn->query($totalin_sql);
			$totalin_row = $totalin_result->fetch_assoc();
			echo $totalin =$totalin_row['SUM(amount_in)'];
			
			die();
			
			
			echo $totalout_sql = "SELECT SUM(amount_out) AS totalout FROM petty_cash_tb";  
	$totalout_result=$conn->query($totalout_sql);
			while($totalout_row = $totalout_result->fetch_assoc());
			echo $totalout =$totalout_row['totalout'];
				echo '<br />';
			echo  $new_balance =($totalin - $totalout - 5);
			die();
	$exp_order_sql = "INSERT INTO `petty_cash_tb` ( `voucher_no`, `particular`, `details`, `amount_in`, `amount_out`, `petty_balance`, `date`, `other_cat`, `created_date`, `updated_date`, `user_id`) VALUES ( '$voucher_no', '$particular', '$details',  NULL, '$amount_out', '$new_balance', '$datepicker_invoice_exp',  '$other_cat',  NOW(), '$date_up', '$auth_id')";  
	$exp_order_sqlq=$conn->query($exp_order_sql);
	
	

	

?>