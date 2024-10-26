<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['i']) && !empty($_GET['i']) && isset($_GET['o']) && !empty($_GET['o'])){
	$order_id=strip_tags(trim($_GET['o']));
	$invoice_no_id=strip_tags(trim($_GET['i']));
//	$del = "DELETE FROM invoices WHERE invoice_number='$invoice_no_id'";
	if ($conn->query($del) === TRUE) {
		$orderd = $conn->query("DELETE FROM orders WHERE order_id='$order_id'");
		$ipdd = $conn->query("DELETE FROM invoice_payment_detail WHERE order_id='$order_id'");
		$ilid = $conn->query("DELETE FROM invoice_line_items WHERE order_id='$order_id' ");
		
		header("location: invoices.php?d=del");		
	} else {
		header("location: invoices.php?d=n");		
	}
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
		<title>Tranfer List</title>

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
						<h4>Transfer List</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Transfer List</li>
						</ol>
						<div class="box box-block bg-white">
							<h5 class="mb-1">Export Transfer Data <?php  if(!empty($_SESSION['user_type_id']) &&( $_SESSION['user_type_id']!='3' and $_SESSION['user_type_id']!='4'))  { ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='inter-transfer.php'")  name="customer_confirm"  value="Add New Transfer" ><?php } ?></h5>
                            <div class="table-responsive"> 
							<table class="table table-striped table-bordered" id="table-2">
								<thead>
									<tr>
										<th>No</th>
										<th>Transfer No.</th>
                                        <th>Particulars</th>
										<th><?php echo $lang['Date'];?></th>
										<th>Transfer Items</th>
										<th>Total Amount</th>
                                       
										<th><?php echo $lang['Option'];?></th>
									</tr>
								</thead>
								<tbody>
                                <?php 
								$sql = "SELECT * FROM `transfer_tb` ORDER BY `order_id` DESC ";
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) 
								{
									// output data of each row
									$i=1;
									while($row = $result->fetch_assoc()) 
									{ ?>		
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['order_id'];
										
										?></td>
                                        <td><?php echo $row['customer_id'];?></td>
										<td><?php echo $row['date_order_placed'];?></td>
										<td><?php $or_id= $row['order_id'];
										 $sql2 = "SELECT trans_line_items.*, product.* FROM trans_line_items INNER JOIN product WHERE trans_line_items.product_id = product.product_id and trans_line_items.order_id='$or_id' ";
								$result2 = $conn->query($sql2);
								while($row2 = $result2->fetch_assoc()) {
										echo $row2['product_name']." (".$row2['product_quantity']. " ".$row2['product_sku'].")<br />";

								}
										?></td>
										<td>
										<?php 
										$sql3 = "SELECT * FROM `trans_payment_detail` WHERE `order_id` = $or_id";
								$result3 = $conn->query($sql3);
								while($row3 = $result3->fetch_assoc()) {
										$Amount = $row3['grand_total_price'];
											echo  number_format($Amount,2) ;
								}
										?>
										 </td>
                                        
										<td><a class="btn btn-success btn-sm" href="invoice.php?i=<?php echo $row['order_id'];?>" title="View"><i class="ti-eye mr-0-5"></i><?php echo $lang['View'];?></a> 
                                       <?php  if(!empty($_SESSION['user_type_id']) &&( $_SESSION['user_type_id']!='2' and $_SESSION['user_type_id']!='4' and $_SESSION['user_type_id']!='3'))  { ?>
                                        <a class="btn btn-secondary btn-sm" href="edit-invoice.php?i=<?php echo $row['order_id'];?>" title="Edit"><i class="ti-pencil mr-0-5"></i><?php echo $lang['Edit'];?></a> 
                                        <a class="btn btn-danger btn-sm" href="JAVASCRIPT:onclick=Delete(<?php echo $row['invoice_no_id'];?>,<?php echo $row['order_id'];?>)"  title="Delete"><i class="ti-trash mr-0-5"></i><?php echo $lang['Delete'];?></a>
                                        <?php } ?>
                                        </td>
									</tr>
                                  <?php $i++;
								      }
								} ?>																	
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Transfer No.</th>
                                        <th>Particulars</th>
										<th><?php echo $lang['Date'];?></th>
										<th>Transfer Items</th>
										<th>Total Amount</th>
                                        
										<th><?php echo $lang['Option'];?></th>
									</tr>
								</tfoot>
							</table>                            
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
        
        <script>
function Delete(x,y) {
	//alert(x);
  var txt;
  if (confirm("Are you sure you want to delete ")) {
   window.location.href = "invoices.php?i="+x+"&o="+y;
  } else {
    txt = "You pressed Cancel!"+x;
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
	</body>

</html>
