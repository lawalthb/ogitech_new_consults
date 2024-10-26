<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");

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
		<title>Statement</title>

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
        <style>
    .alnright { text-align: right; }
	.alnleft { text-align: left; }
</style>
		
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
						<h4>Supplier Sales and Balance</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Supplier List</li>
						</ol>
						<div  class="table-responsive bg-white" style="margin-top: 10px">
							<h5 class="mb-1">Exportig Supplier Data</h5>
							<table class="table table-striped table-bordered dataTable" id="table-2">
								<thead>
									<tr>
										<th>SN</th>
                                        <th>Suppliers</th>
										<th>Amount Sold <span>&#x20A6;</span></th>
										<th>Amount Paid <span>&#x20A6;</span></th>
										<th>Balance <span>&#x20A6;</span><br>
Dr.     <span style="color:red">Cr.</span>
                                        
										<th>Since</th>
									</tr>
								</thead>
								<tbody>
                                <?php 
								$sql = "SELECT * FROM suppliers  ORDER BY `suppliers`.`supplier_name` ASC";
								$result = $conn->query($sql);
								$sn=1;
								if ($result->num_rows > 0) 
								{
									
									$gtp=0;
									$pa=0;
									$neg=0;
									$pos=0;
									$r=0;
									$s=0;
									
									// output data of each row
									while($row = $result->fetch_assoc()) 
									{ ?>		
									<tr>
                                    <td><?=$sn++?></td>
										<td><a href="s_statement.php?supplier_id=<?=$row['supplier_id']?>" ><?php echo $row['supplier_name'];?></a></td>
										<td><?php 
										
										
										@$totalin_sql = "SELECT sum(grand_total_price) as totalin FROM `sup_invoice_payment_detail` WHERE `customer_id` = $row[supplier_id] ";  
			@$totalin_result=$conn->query($totalin_sql);
			@$totalin_row = $totalin_result->fetch_assoc();
			@$totalin=$totalin_row['totalin'];
			 echo number_format($totalin,2);
			@$totalout_sql = "SELECT sum(paid_amount) as totalout FROM `sup_invoice_payment_detail` WHERE `customer_id` = $row[supplier_id]";  
			@$totalout_result=$conn->query($totalout_sql);
			@$totalout_row = $totalout_result->fetch_assoc();
			@$totalout =$totalout_row['totalout'];
										
										?></td>
										<td><?php echo number_format($totalout,2);
										
										
										
			
			  $new_balance =number_format(($totalout - $totalin ),2);
			  if($new_balance < 0){ $align = "right"; $s=$totalout - $totalin; //$neg=$new_balance;
			   }
			  if($new_balance < 0){ $style = "color:red";}
			  if($new_balance > 0){ $align = "left"; $r=$totalout - $totalin; } 
			  if($new_balance > 0){ $style = "color:black";}	
										?></td>
                                        
										<td align="<?=$align?>" style="<?=$style?>"><?=$new_balance?></td>
                                        
										<td>
                                        <?php
										$sql4 = "SELECT * FROM `sup_invoice_payment_detail` WHERE `customer_id` = $row[supplier_id] ORDER BY `payment_detail_date` DESC ";									$result4 = $conn->query($sql4);
										$row4 = $result4->fetch_assoc();
										$ydate = $row4['payment_detail_date'];
										$date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
$diff=date_diff($date1,$date2);

										?>
                                        
                                        <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#cusInfo" data-whatever="<?php echo $row['supplier_id'];?>" title="View"><i class="ti-eye mr-0-5"></i><?=$diff->format("%R%a days");?></a> 
                                       
                                      
                                        </td>
									</tr>
                                  <?php
								    $gtp=$gtp+$totalin;
										$pa=$pa+$totalout;
										
										
			  if($new_balance < 0){$neg=$s+$neg ;}
			  if($new_balance > 0){   $pos=$r+$pos ;} 
			 
									//	 $r= $r+$pos;
								  
								   }
								} ?>																	
								</tbody>
								<tfoot>
									<tr>
										<th>SN</th>
                                        <th>Total</th>
										<th><span>&#x20A6;</span> <?=number_format($gtp,2)?> </th>
										<th> <span>&#x20A6;</span> <?=number_format($pa,2)?> </th>
                                        <?php
										$bf=  $pa - $gtp;
				
			 
										?>
                                        

								<th class="<?php echo $align; ?>" ><span>&#x20A6;</span><?php
										
										echo number_format($bf,2);
				
				echo "<br>";
				echo  number_format($pos,2)." With Suppliers";
echo "<br>";
					echo  "<b style='color:red'>". number_format($neg,2)." We are Owning</b>";					?>
                                        
										<th>Since</th>                                                                          
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