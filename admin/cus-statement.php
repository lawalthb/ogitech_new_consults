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
		<title>Customer Statement on <?php echo  $ndate = date('d-m-Y');?></title>

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
						<h4>Customers Sales and Balance</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active"><?php echo $lang['CustomersList'];?></li>
						</ol>
						<div  class="table-responsive bg-white" style="margin-top: 10px">
							<h5 class="mb-1">
						  

								<?php echo $lang['ExportingCustomersData'];?></h5>
<?php if(!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id']=='1'  or ($_SESSION['user_type_id']=='3') or ($_SESSION['user_type_id']=='4') )) { ?>  
								<center> 
									<!-- <a href="outside_lagos_balance.php" >[Download Outside Lagos ]</a>  -->
								
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="lagos_balance.php">[Download All Customers ]</a></center> 

								<?php
							}
							?>

							<table class="table table-striped table-bordered dataTable" id="table-2">
								<thead>
									<tr>
										<th>SN</th>
                                        <th><?php echo $lang['Customers'];?></th>
										<th>Amount Sold <span>&#x20A6;</span></th>
										<th>Amount Paid <span>&#x20A6;</span></th>
										<th>Balance <span>&#x20A6;</span><br>
Dr.     <span style="color:red">Cr.</span>
										</th>
                                        <th>Marketer</th>
										  <th>Since</th>
										<th>Download</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								if($_GET['ac_type']==1){
									$sql = "SELECT *  FROM `customers` WHERE `act_type_id` = 1 AND `act_grp_id` = 1 and cus_id !=528 ORDER BY cus_name Asc";
								}elseif($_GET['ac_type']==2){
									$sql = "SELECT *  FROM `customers` WHERE `act_type_id` = 2 AND `act_grp_id` = 2 and cus_id !=529 ORDER BY cus_name Asc";
								}
								 
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
									$total_sales = 0;
									$total_dr = 0;
									$total_cr = 0;
									// output data of each row
									while($row = $result->fetch_assoc()) 
									{ ?>		
									<tr>
                                    <td><?=$sn++?></td>
										<td><a href="statement.php?cus_id=<?=$row['cus_id']?>" >
										<?php echo $row['cus_name'];?></a></td>
										<td><?php 
										
										$sqls = "SELECT  sum(dr_amount) as sumdr, sum(cr_amount) as sumcr   FROM `ledger_entries` WHERE `account_id` = $row[cus_id]";
								$results = $conn->query($sqls);
								$rows = $results->fetch_assoc();
												
								$total_dr = $rows['sumdr'];
								$total_cr = $rows['sumcr'];
										echo number_format($rows['sumdr'],2)?></td>
										<td><?=number_format($rows['sumcr'],2)?></td>
                                        
										<td><?php $balance =$rows['sumdr'] - $rows['sumcr'] ;
										echo  number_format($balance,2); ?></td>
                                        <td><?php
										$sql3 = "SELECT * FROM `marketer_tb` WHERE `marketer_id` =  $row[cus_marketer_id] ";
								$result3 = $conn->query($sql3);
								$row3 = $result3->fetch_assoc();
												
												echo $row3['marketer_name'];
										?> </td>
										<td>
										<?php
										 $sql9 = "SELECT * FROM `ledger_entries` WHERE `account_id` =  $row[cus_id]   ORDER BY `ledger_entries`.`documents_id` DESC";
										$result9 = $conn->query($sql9);
										$row9 = $result9->fetch_assoc();
										if ($result9->num_rows > 0) {
										 $doc_id =  $row9['documents_id'];
											
  $sql4 = "SELECT * FROM `documents` WHERE `documnents_id` =$doc_id  ";	
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
 $ydate = $row4['document_date'];
$date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
  @$diff=date_diff($date1,$date2);

  $earlier = new DateTime("2010-07-06");
$later = new DateTime("2010-07-09");

echo  $diff = $date1->diff($date2)->format("%a");

										 }else {echo  "unknow day";}
										?>
                                        
                                      
                                        </td>
                                        <td><a href="customer_statement_pdf.php?cus_id=<?php echo $row['cus_id'];?>" target="_blank"><img src="img/pdf_icon.png" width="30"></a></td>
									</tr>
                                  <?php
								    @$gtp=$gtp+$total_dr;
									@	$pa=$pa+$total_cr;
										
										
			  if(@$new_balance < 0){@$neg=$s+$neg ;}
			  if(@$new_balance > 0){ @$pos=$r+$pos ;} 
			 
									//	 $r= $r+$pos;
									$total_sales =+$balance;
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
				echo  number_format($pos,2)." With Us";
echo "<br>";
					echo  "<b style='color:red'>". number_format($neg,2)." Customers Owning</b>";					?>
                                        <th>Marketer</th>
										<th>Since</th> 
										<th>Download</th>                                                                         
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
