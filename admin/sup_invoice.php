<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['i']) && !empty($_GET['i']) && isset($_GET['o']) && !empty($_GET['o'])){
    $order_id=strip_tags(trim($_GET['o']));
   $invoice_no_id=strip_tags(trim($_GET['i']));
          $paper_inv_no=strip_tags(trim($_GET['p']));
                
     
  $del = "DELETE FROM `sup_invoices` WHERE `sup_invoices`.`invoice_number`='$invoice_no_id'";
//die();
  if ($conn->query($del) === TRUE) {
    $orderd = $conn->query("DELETE FROM sup_orders WHERE order_id='$order_id'");
    $ipdd = $conn->query("DELETE FROM sup_invoice_payment_detail WHERE order_id='$order_id'");
                $dstk= $conn->query("SELECT * FROM `stock_tb` WHERE `status` = '$order_id'");

                $getPro = $conn->query("SELECT * FROM `sup_invoice_line_items` WHERE `order_id` = '$order_id'");
                $rowpd = $getPro->fetch_assoc();
                 $items_lines =mysqli_num_rows($getPro);
                 //echo $rowpd['paper_inv_no'];
                 $getPro = $conn->query("SELECT * FROM `sup_invoice_line_items` WHERE `order_id` = '$order_id'");
                $items_lines =mysqli_num_rows($getPro);
                while($rowpd = $getPro->fetch_assoc())   { 
                         $pr_id  = $rowpd['product_id'];
                         $pr_qty  = $rowpd['product_quantity'];
                    $update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` - '$pr_qty' where p_id='$pr_id' ";    
        $conn->query($update_product_table);
              }


    $ilid = $conn->query("DELETE FROM sup_invoice_line_items WHERE order_id='$order_id' ");
	$ilid = $conn->query("DELETE FROM stock_tb WHERE status='$order_id' ");	
		header("location: sup_invoice.php?d=del");		
	} else {
		header("location: sup_invoice.php?d=n");		
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
		<title>Purchase Invoices</title>

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
						<h4>Supplier <?php echo $lang['InvoicesList'];?></h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Supplier <?php echo $lang['InvoicesList'];?></li>
						</ol>
						<div class="box box-block bg-white">
							<h5 class="mb-1"><?php echo $lang['ExportingInvoicesData'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='add-supplier-invoice.php'")  name="customer_confirm"  value="Add New Supplier Invoice" ></h5>
                            <div class="table-responsive"> 
							<table class="table table-striped table-bordered" id="table-2">
								<thead>
									<tr>
										<th>No</th>
										<th>GRN No.</th>
										<th>Waybill No.</th>
                                        <th>Suppliers</th>
										<th><?php echo $lang['Date'];?></th>
										<th><?php echo $lang['TotalAmount'];?></th>
                                       
										<th><?php echo $lang['Option'];?></th>
									</tr>
								</thead>
								<tbody>
                                <?php 
								$sql = "SELECT c.*, inv.* FROM sup_invoice_payment_detail as inv, suppliers as c where c.supplier_id=inv.customer_id and inv.paid_amount = 0 ORDER BY `inv`.`order_id` DESC";
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) 
								{
									// output data of each row
									$i=1;
									while($row = $result->fetch_assoc()) 
									{ ?>		
									<tr>
										<td><?php echo $i;?></td>
										<td><?php   $inv_no = $row['order_id'];
										
										$sql6 = "SELECT * FROM `sup_invoices` WHERE `order_id` = $inv_no ";
								$result6 = $conn->query($sql6);
								$row6 = $result6->fetch_assoc();
								echo $row6['grn_no'];
								
								
										?></td>
										<td><?=$row6['paper_inv_no'];?></td>
                                        <td><?php echo $row['supplier_name'];?></td>
										<td><?php echo $row['payment_detail_date'];?></td>
										<td><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php echo  number_format($row['grand_total_price'],2);?></td>
                                       
										<td><a class="btn btn-success btn-sm" href="invoice.php?i=<?php echo $row['order_id'];?>" title="View"><i class="ti-eye mr-0-5"></i><?php echo $lang['View'];?></a> 
                                      <?php  if(!empty($_SESSION['user_type_id']) &&( $_SESSION['user_type_id']!='2' and $_SESSION['user_type_id']!='4'))  { ?>
                                        <a class="btn btn-secondary btn-sm" href="sup_edit-invoice.php?i=<?php echo $row['order_id'];?>" title="Edit"><i class="ti-pencil mr-0-5"></i><?php echo $lang['Edit'];?></a> 
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
										<th><?php echo $lang['Invoiceno'];?></th>
                                        <th>Suppliers</th>
										<th><?php echo $lang['Date'];?></th>
										<th><?php echo $lang['TotalAmount'];?></th>
                                       
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
		<script type="text/javascript" src="modal/js/supplier_info.js"></script>
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
   window.location.href = "sup_invoice.php?i="+x+"&o="+y;
  } else {
    txt = "You pressed Cancel!"+x;
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
	</body>

</html>
