<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['supplier_id']) && !empty($_GET['supplier_id'])){
	$cus_id=strip_tags(trim($_GET['supplier_id']));
	
	$sqlc = "SELECT * FROM `suppliers` WHERE `supplier_id` = $cus_id";
								$resultc = $conn->query($sqlc);
								$rowc = $resultc->fetch_assoc();
}
	 else {
		header("location: sup-statement.php?d=n");		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title><?=$rowc['supplier_name']?> Statement</title>

		<!-- adaptinventory CSS -->
		<link rel="stylesheet" href="../adaptinventory/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../adaptinventory/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../adaptinventory/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../adaptinventory/animate.css/animate.min.css">
		<link rel="stylesheet" href="../adaptinventory/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../adaptinventory/waves/waves.min.css">
		<link rel="stylesheet" href="../adaptinventory/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../adaptinventory/DataTables/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../adaptinventory/DataTables/Responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="../adaptinventory/DataTables/Buttons/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="../adaptinventory/DataTables/Buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="../adaptinventory/toastr/toastr.min.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        
	</head>
	<body class="fixed-sidebar fixed-header skin-3 content-appear">
		<div class="wrapper">

			<!-- Preloader -->
		  <div class="preloader"></div>

			<!-- Sidebar -->
			<div class="site-overlay"></div>
			
			<?php include("sidebar.php");?>
			<!-- Sidebar second -->
			<?php include("rightsidebar.php");?>

			<!-- Template options -->
			<?php include("template-options-menu.php");?>

			<!-- Header -->
			<?php include("headermenu.php");?>

			<div class="site-content">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4><?=ucwords($rowc['supplier_name'])?> Ledger</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active"><?=$rowc['supplier_name']?> Statement</li>
						</ol>
						<div  class="table-responsive bg-white" style="margin-top: 10px">
							<h5 class="mb-1"><?php echo $lang['ExportingCustomersData'];?></h5>
							<table class="table table-striped table-bordered dataTable" id="table-2">
								<thead>
									<tr align="center">
										<th>SN</th>
                                        <th>Date</th>
										<th>Invoice_no/<br>
Receipt_no</th>
										<th>Qty/Items/
Descriptions/Rate</th>
                                        <th>Sales Amount<br>
 <span>&#x20A6;</span></th>
                                        <th>Paid Amount <br>
<span>&#x20A6;</span></th>
										<th>Balance<br>
 <span>&#x20A6;</span></th>
                                        
										
									</tr>
								</thead>
								<tbody>
                                <?php 
                                 $sql7 = "SET @variable = 0";
                              $result7 = $conn->query($sql7);
								$sql = "SELECT *,  @variable := @variable + (`grand_total_price` - `paid_amount`) `balance2`  FROM `sup_invoice_payment_detail` WHERE `customer_id` = $cus_id  ORDER BY `sup_invoice_payment_detail`.`payment_detail_date`";
								$result = $conn->query($sql);
								$sn=1;
								$gtp=0;
									$pa=0;
									$neg=0;
									$pos=0;
								if ($result->num_rows > 0) 
								{
									// output data of each row
									
									

									while($row = $result->fetch_assoc()) 
									{ ?>		
									<tr>
                                    <td><?=$sn++?></td>
                                    <td><?php $order_id = $row['order_id'];
									if($order_id !=0){
										$sql3 = "SELECT * FROM `sup_orders` WHERE `order_id` =  $order_id ";
								$result3 = $conn->query($sql3);
								$row3 = $result3->fetch_assoc();
								echo $row3['date_order_placed'];
										}else{
											$sql3 = "SELECT * FROM `purchase_payments_tb` WHERE `invoice_payment_id` = $row[invoice_payment_id] ";
								$result3 = $conn->query($sql3);
								$row3 = $result3->fetch_assoc();
								echo $row3['date'];
											}
									?></td>
										<td><?php
										
                                        $invoice_payment_id = $row['invoice_payment_id'];
										
										$sql3 = "SELECT * FROM `sup_invoices` WHERE `order_id` =  $order_id ";
										$result3 = $conn->query($sql3);
										$row3 = $result3->fetch_assoc();
										echo $paper_no =$row3['paper_inv_no'];
										if($paper_no == ""){
										$sql9= "SELECT *  FROM `purchase_payments_tb` WHERE `invoice_payment_id` =$row[invoice_payment_id]";
										$result9 = $conn->query($sql9);
										$row9 = $result9->fetch_assoc();
										echo $row9['receipt_no'];	
										}
                                        ?>
                                        </td>
										<td><?php 
										if($order_id !=0){
										$sql7 = "SELECT * FROM `sup_invoice_line_items` WHERE `order_id` = $order_id  ORDER BY `order_items_id` ASC  ";
										$result7 = $conn->query($sql7);
										
										while($row7 = $result7->fetch_assoc()){ 
										 $prd =  $row7['product_id'];
										 $sql8 = "SELECT * FROM `product` WHERE `product_id` = $prd  ";
										$result8 = $conn->query($sql8);
										 $row8 = $result8->fetch_assoc();
										echo $prdname =  $row7['product_quantity']."/ ".$row8['product_name']."/ #".$row7['product_rate'];
										echo "<br />";
										}} 
										else{
											$meth = $row9['paid_through'];
											if($meth ==1){
												echo "Paid to  1017317112 - Zenith";
												}elseif($meth ==2){
													echo "Paid Cash";
													}
													elseif($meth ==3){
													echo "Paid to UBA Bank";
													}elseif($meth ==4){
													echo "Paid to Personal Act";
													}else{
														echo "Openning Balance";
														}
										
										}
										
										
										?></td>
										<td><?php echo number_format($row['grand_total_price'],2);?></td>
                                        <td><?php echo number_format($row['paid_amount'],2);?></td>
                                        
										
                                        
										<td><?php echo number_format($row['balance2'],2);?></td>
									</tr>
                                  <?php
								  $gtp=$gtp+$row['grand_total_price'];
										$pa=$pa+$row['paid_amount'];
								   }
								} ?>																	
								</tbody>
								<tfoot>
									<tr>
										<th>SN</th>
                                        <th>Date</th>
										<th>Invoice_no/<br>
Receipt_no</th>
										<th>Qty/Items/<br>
Descriptions</th>
                                        <th>Sales Amount<br>
 <span>&#x20A6;</span> <?=number_format($gtp,2);?> </th>
                                        <th>Paid Amount <br>
<span>&#x20A6;</span> <?=number_format($pa,2);?></th>
										<th>Balance<br>
 <span>&#x20A6;</span> <?php 
  $da= $pa-$gtp;
echo number_format($da,2); ?></th>
									</tr>
								</tfoot>
							</table>
                            
                            <div class="modal fade" id="cusInfo" tabindex="-1" role="dialog" aria-labelledby="Customer Information" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="exampleModalLabel"><?php echo $lang['CustomerInformation'];?></h4>
										</div>
										<div class="modal-body"></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>											
										</div>
									</div>
								</div>
							</div>
						</div>			
						
					</div>
				</div>
				<!-- Footer -->
				<?php include("footermenu.php");?>
			</div>

		</div>

		<!-- adaptinventory JS -->
		<script type="text/javascript" src="../adaptinventory/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="../adaptinventory/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../adaptinventory/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="../adaptinventory/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="../adaptinventory/waves/waves.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/JSZip/jszip.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/pdfmake/build/pdfmake.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/pdfmake/build/vfs_fonts.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Buttons/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Buttons/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/DataTables/Buttons/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="../adaptinventory/toastr/toastr.min.js"></script>
		<script type="text/javascript" src="modal/js/customer_info.js"></script>
		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/tables-datatable.js"></script>
        <?php if(isset($_GET['d']) && $_GET['d']=='del'){ ?>
        <script type="text/javascript">
			$(document).ready(function(){			
			toastr.options = {
			positionClass: 'toast-top-right'
			};
			toastr.error('Record deleted successfully!');
			
			});	
		</script>
      <?php } 
	  if(isset($_GET['d']) && $_GET['d']=='n'){ ?>
        <script type="text/javascript">
			$(document).ready(function(){			
			toastr.options = {
			positionClass: 'toast-top-right'
			};
			toastr.error('Error deleting record!');
			
			});	
		</script>
        <?php } ?>
	</body>

</html>
