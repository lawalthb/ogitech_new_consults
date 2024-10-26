<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['c']) && !empty($_GET['c'])){
	$c=strip_tags(trim($_GET['c']));
	$del = "DELETE FROM customers WHERE cus_id='$c'";
	if ($conn->query($del) === TRUE) {
		header("location: customers.php?d=del");
	} else {
		header("location: customers.php?d=n");
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
		<title><?php echo $lang['Customers'];?></title>

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
		<script src="https://www.w3schools.com/lib/w3.js"></script>
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
						<h4><?php
                    if($_GET['ac_type']==1  ){
							echo 'Debtors / Customers List ';

							$ac_type = 1;
                    }elseif($_GET['ac_type']==2 ){

						  echo 'Creditors / Suppliers List ';
						  $ac_type = 2;
                    }elseif($_GET['ac_type']==3 ){

						echo 'All Ledger';
						$ac_type = 3;
				  }else{
die('<script>alert("Invalid link")</script>');

                    }
                    ?></h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>
							<li class="breadcrumb-item active">Accounts</li>
						</ol>
						<div class="table-responsive bg-white" style="margin-top: 10px">
						<h5 class="mb-1">Accountig Data

						<?php  if(!empty($_SESSION['user_type_id']) &&( $_SESSION['user_type_id']!='2' and $_SESSION['user_type_id']!='4'))  { ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php }
if($_GET['ac_type']==1  ){ ?>
<input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='add-invoice.php?ac_type=1&inv_type=1'")  name="customer_confirm"  value="Add New Custormer" >
<?php
}elseif($_GET['ac_type']==2 ){
?>
<input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='add-invoice.php?ac_type=2&inv_type=1'")  name="customer_confirm"  value="Add New Supplier" >
<?php }
elseif($_GET['ac_type']==3 ){
	?>
	<input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='add-account3.php'")  name="customer_confirm"  value="Add New Account" >
	<?php }
	?>


						</h5>
						<input class="pull right" oninput="w3.filterHTML('#table-2', '.item', this.value)" placeholder="Search for ledger...">
							<table class="table table-striped table-bordered dataTable" id="table-2" >
								<thead>
									<tr>
										<th><?php echo $lang['Customers'];?></th>
										<?php if($_GET['ac_type']!=3 ){ ?>
										<td>Mobile</td>
										<td>Email</td>
										<td>Address</td>
								<?php	}else{ ?>
										<td>Account sub grp</td>
										<td>Account type</td>
										<td>Last Transc Date</td>
								<?php } ?>
									</tr>
								</thead>
								<tbody>
								<?php
								if($_GET['ac_type']!=3 ){
								$sql = "SELECT * FROM customers WHERE `act_type_id` = $ac_type";
								$result = $conn->query($sql);
								}elseif($_GET['ac_type']==3 ){
									$sql = "SELECT * FROM customers ";
								$result = $conn->query($sql);
								}
								if ($result->num_rows > 0)
								{
									// output data of each row
									while($row = $result->fetch_assoc())
									{ ?>
									<tr class="item">

										<td><a href="statement.php?cus_id=<?php echo $row['cus_id'];?>"><?php echo $row['cus_name'];?></a></td>
										<?php
								if($_GET['ac_type']!=3 ){ ?>
										<td><?php echo $row['cus_mobile'];?></td>
										<td><?php echo $row['cus_email'];?></td>
										<td><?php echo $row['cus_address'];?></td>
								<?php	}else{ ?>
										<td><?php $sub_id = $row['act_type_id'];
										$sql2 = "SELECT * FROM sub_acct_group_tb WHERE `sub_acct_group_id` = $sub_id";
										$result2 = $conn->query($sql2); $row2 = $result2->fetch_assoc();
										echo $row2['names'];
										?></td>
										<td><?php $grp_id =  $row['act_grp_id'];
										$sql3 = "SELECT * FROM acct_group_tb WHERE `acct_group_id` = $grp_id";
										$result3 = $conn->query($sql3); $row3 = $result3->fetch_assoc();
										echo $row3['names'];
										?></td>
										<td><?php echo $row['cus_id'];?></td>
								<?php } ?>
										<td><a class="btn btn-success btn-sm" href="statement.php?cus_id=<?php echo $row['cus_id'];?>" data-whatever="<?php echo $row['cus_id'];?>" title="View"><i class="ti-eye mr-0-5"></i><?php echo $lang['View'];?></a>
                                        <?php if(!empty($_SESSION['user_type_id']) && $_SESSION['user_type_id']=='1') { ?>
                                        <a class="btn btn-secondary btn-sm" href="edit-customer.php?c=<?php echo $row['cus_id'];?>" title="Edit"><i class="ti-pencil mr-0-5"></i><?php echo $lang['Edit'];?></a>
                                        <a class="btn btn-danger btn-sm" href="JAVASCRIPT:onclick=Delete(<?php echo $row['cus_id'];?>)"  title="Delete"><i class="ti-trash mr-0-5"></i><?php echo $lang['Delete'];?></a>
                                       <?php } ?>
                                        </td>
									</tr>
                                  <?php }
								} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Accounts</th>
										<th><?php echo $lang['Mobile'];?></th>
										<th><?php echo $lang['Email'];?></th>
										<th><?php echo $lang['BillingAddress'];?></th>
										<th><?php echo $lang['Option'];?></th>
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
        <script>
function Delete(x) {
	//alert(x);
  var txt;
  if (confirm("Are you sure you want!")) {
   window.location.href = "customers.php?c="+x;
  } else {
    txt = "You pressed Cancel!"+x;
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
	</body>

</html>
