<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
?>
<?php if(isset($_GET['cus'])){}
                        $cus = $_GET['cus'];
                       
						echo $sql = "SELECT *  FROM `customers` WHERE `cus_id` = $cus" ;
						$result = $conn->query($sql);
						while($row = $result->fetch_array()) 
									{ 
							$name2 =  $row['bank_name'];				
									}
                        ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Meta tags -->

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title><?=$name?> Statement</title>

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
        <link rel="stylesheet" href="../adaptinventory/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
		<link rel="stylesheet" href="../adaptinventory/clockpicker/dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" href="../adaptinventory/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../adaptinventory/bootstrap-daterangepicker/daterangepicker.css">
		<link rel="icon" href="img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>" type="image/gif" sizes="16x16">
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
                        <h4><?=$name?></h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?> <?=$name2; ?> </a></li>
							<li class="breadcrumb-item active"><?=$name?></li>
						</ol>
						<div  class="table-responsive bg-white" style="margin-top: 10px">
							<h5 class="mb-1"><?=$name?> Statement</h5>
                            <h6> <?php echo $lang['DateRange'];?></h6>
                            <form action="" name="form" method="post" >
                            <div class="row">
								<div class="offset-md-1 col-md-8">
                                 <div class="input-daterange input-group" id="date-range">
                                    <input type="date" class="form-control" name="start" value="<?php if((isset($_POST['start']))) { echo $_POST['start']; }?>" >
                                    <span class="input-group-addon bg-primary b-0 text-white">to</span>
                                    <input type="date" class="form-control" name="end" value="<?php if((isset($_POST['end']))) { echo $_POST['end']; }?>" >
                                   </div>
                               </div>
                               <div class="col-md-3">
									<button type="submit" class="btn btn-primary">GET</button>
								</div>
                            </div>
                            </form>
                            <?php if((!isset($_POST['start']))) { ?>
                            <p class="font-90 text-muted mb-1">This Month of <?=date('F Y') ?></p>
                            <?php } else { ?><p class="font-90 text-muted mb-1">&nbsp;  </p>  <?php } ?>
							<table class="table table-striped table-bordered dataTable" id="table-2">
								<thead>
									<tr>
										<th>No</th>
										<th>Date</th>
                                        <th>Vouch_No</th>
										<th>Particular</th>
										<th>Details</th>
                                        <th>Debit (<span>&#x20A6;</span>)</th>
                                        <th>Credit(<span>&#x20A6;</span>)</th>
                                        <th>Balance
                                        <?php

									if(!isset($_POST['end'])){
										$op_en2 = date("Y-m-31", strtotime("-1 months"));
									$op_st2 = date("Y-m-01", strtotime("-1 months"));

							  $sqlop =  "SELECT sum(ledger_entries.dr_amount) as sdr , sum(ledger_entries.cr_amount) as scr  FROM `ledger_entries`, `documents` WHERE `ledger_entries`.`account_id` = $cus and  `documents`.`documnents_id`= `ledger_entries`.`documents_id` and `documents`.`document_date` BETWEEN '$op_st2' AND '$op_en2' ORDER BY `documents`.`document_date` ASC";
									}else{

										$st3 = $_POST['start'];
										$op3 = $_POST['end'];
//the $time parameter for DateTime.
$currentDate = new DateTime($st3);

//Subtract a day using DateInterval
$yesterdayDT = $currentDate->sub(new DateInterval('P1D'));

//Get the date in a YYYY-MM-DD format.
$yesterday = $yesterdayDT->format('Y-m-d');
//Print it out.
 $yesterday;

							   $sqlop =  "SELECT sum(ledger_entries.dr_amount) as sdr , sum(ledger_entries.cr_amount) as scr  FROM `ledger_entries`, `documents` WHERE `ledger_entries`.`account_id` =  $cus and  `documents`.`documnents_id`= `ledger_entries`.`documents_id` and `documents`.`document_date` BETWEEN '2019-01-01' AND '$yesterday' ORDER BY `documents`.`document_date` ASC";

									}
								$resultop = $conn->query($sqlop);
									  $rowop = $resultop->fetch_assoc();
									  $bal = $rowop['sdr'] - $rowop['scr']  ;
									?><br>
OP:
                                        <?php  echo number_format($bal); ?>
                                        </th>
									</tr>
                                    </thead>



								<tbody>
                              <?php


							     $newStartingDate = date("Y-m-01", strtotime(date("Y-m-01", strtotime(date("Y-m-01"))) ));
							   $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) ));
							  if((isset($_POST['start'])) && (!empty($_POST['start'])) && (isset($_POST['end'])) && (!empty($_POST['end'])))
							  {
							  	$sql7 = "SET @variable = $bal";
							      $result7 = $conn->query($sql7);
								  $sql = "SELECT `ledger_entries`.*, `documents`.*, @variable := @variable + (`dr_amount` - `cr_amount`) `balance2` FROM `ledger_entries`, `documents` WHERE `ledger_entries`.`account_id` =  $cus and  `documents`.`documnents_id`= `ledger_entries`.`documents_id` and `documents`.`document_date` BETWEEN '$_POST[start]' AND '$_POST[end]' ORDER BY `documents`.`document_date` ASC";
							  }else{
							  //$newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " - 1 year"));
							   	$sql7 = "SET @variable =$bal";
							      $result7 = $conn->query($sql7);

								   $sql = "SELECT `ledger_entries`.*, `documents`.*, @variable := @variable + (`dr_amount` - `cr_amount`) `balance2` FROM `ledger_entries`, `documents` WHERE `ledger_entries`.`account_id` =  $cus and `documents`.`documnents_id`= `ledger_entries`.`documents_id` and `documents`.`document_date` BETWEEN '$op_st' AND '$op_en'  ORDER BY `documents`.`document_date` ASC ";
							  }
								$result = $conn->query($sql);
								 $result7 = $conn->query($sql7);
								if ($result->num_rows > 0)
								{
									// output data of each row
									$i=1;
									$gtp=$bal;
									$pa=0;
									$pa2=0;
									$da=0;
									while($row = $result->fetch_assoc())
									{ ?>
									<tr>

										<td><?php echo $i;?></td>
										<td><?php echo $row['document_date'];?></td>
                                        <td><?php echo $row['document_no'];?></td>
                                        <td><?php  $row['against'];
                                        	$sql3 = "SELECT * FROM `customers` WHERE `cus_id` =  $row[against] ";
                                            $result3 = $conn->query($sql3);
                                            $row3 = $result3->fetch_assoc();

                                                            echo $row3['cus_name'];
															$i++;
															$gtp=$gtp+$row['dr_amount'];
														  $pa=$pa+$row['cr_amount'];
														  $pa2=$pa2+$row['cr_amount'];
                                        ?></td>
										<td><?php echo $row['document_comments'];?></td>
                                         <td><?php echo number_format($row['dr_amount']);?></td>
                                        <td><?php echo number_format($row['cr_amount']);?></td>
										<td><?php  $pa=$pa-$row['dr_amount'];
										$ball=  abs($pa);
										echo  number_format($ball);
										?></td>

									</tr>
                                  <?php
										//$da=$da+$row['exp_due_amount'];
								      }
								} ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="3">&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th><?php echo $lang['Total'];?></th>
										<th><?php  echo @number_format($gtp);?></th>
                                        <th><?php echo @number_format($pa2) ;?></th>
                                        <th><?php @$diff = $gtp - $pa2; echo @number_format($diff)  ;?></th>
									</tr>
								</tfoot>
							</table>

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
        <script type="text/javascript" src="../adaptinventory/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="../adaptinventory/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/tables-datatable.js"></script>
        <script type="text/javascript">
		$(document).ready(function(){
		$('#date-range').datepicker({
		 format: "yyyy-mm-dd",
		toggleActive: true
		});
		});
	</script>
	</body>

</html>
