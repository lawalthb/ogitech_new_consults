<?php
session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
require_once ('convert.php');
include("language.php");
if(isset($_GET['i']) && !empty($_GET['i'])){
	$getorder_id=strip_tags(trim($_GET['i']));


    $sql = "SELECT cus.*, doc.*, aut.*, leg.* FROM ledger_entries as leg, auth as aut, documents as doc, customers as cus where cus.cus_id=leg.account_id and doc.auth_id=aut.auth_id and doc.documnents_id='$getorder_id' and leg.documents_id = doc.documnents_id and doc.document_type='11' and leg.sub_acct_group_id='1'";



		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$full_name=$row['full_name'];
					$email=$row['cus_email'];
					$lpo_grn=$row['lpo_grn'];
						$act_grp_id=$row['act_grp_id'];

				$cus_name=$row['cus_name'];
				$cus_mobile=$row['cus_mobile'];
				$cus_address=$row['cus_address'];
				$date_order_placed=$row['document_date'];
				$invoice_number=$row['document_no'];
                $order_id=$row['documnents_id'];
				 $payment_detail_date=$row['document_date'];
				 $note=$row['document_comments'];
				$grand_total_price=$row['dr_amount'];



			}
		}
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
		<title><?php echo $lang['Invoice'];?></title>

		<!-- adaptinventory CSS -->
		<link rel="stylesheet" href="../adaptinventory/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../adaptinventory/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../adaptinventory/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../adaptinventory/animate.css/animate.min.css">
		<link rel="stylesheet" href="../adaptinventory/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../adaptinventory/waves/waves.min.css">
		<link rel="stylesheet" href="../adaptinventory/switchery/dist/switchery.min.css">
        <link rel="stylesheet" href="../adaptinventory/toastr/toastr.min.css">
<script src="js/html2pdf.bundle.min.js"></script>
		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

          <script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/num2words.js" type="text/javascript"></script>


<script>
//Enter Only Numbers
$(".numbers").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
     }
});

var words="";
$(function() {
    $("#grandTotal").on("keydown keyup change", per);
        function per() {
                var totalamount = (
                Number($("#grandTotal").val())
                );
                $(200).val(totalamount);
                words = toWords(totalamount);
                $("#amount-rupees").val(words + "Naira Only");
        }
});
</script>
<script>
      function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("printinvoice");
        // Choose the element and save the PDF for our user.
        html2pdf()
          .from(element)
          .save();
      }
    </script>
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="fixed-sidebar fixed-header skin-3 content-appear forprint" >
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
						<h4>Waybill</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>
							<li class="breadcrumb-item active">Waybill</li>
						</ol>
						<div class="card" id="printinvoice">
							<div class="card-header clearfix">
								<h5 class="float-xs-left mb-0">Waybill #<?php if(isset($invoice_number)){
                                        $sql2 = "SELECT *  FROM `documents` WHERE `documnents_id` = $order_id";
                                        $result2 = $conn->query($sql2);
                                        $row2 = $result2->fetch_assoc();
                                        echo $row2['document_no'];
                                  // echo $order_id;
                                    }?></h5>
								<div class="float-xs-right"></strong>Date: <?php if(isset($date_order_placed)){ echo date("F d, Y",strtotime($date_order_placed));}?></div>
							</div>
							<div class="card-block" >
								<div class="row mb-6">
									<div class="col-sm-8 col-xs-6">
                                        <img src="img/logo/884225logoimage.jpg" >
                                        <h5><?php if(isset($setting_name1)){ echo $setting_name1;}?>,</h5>
										<p><a class="text-primary" href="#"><span class="underline"><?php if(isset($setting_web1)){ echo $setting_web1;}?></span></a></p>
										<p><?php if(isset($setting_address1)){ echo $setting_address1;}?><br><?php if(isset($setting_city1)){ echo $setting_city1;}?><br><?php if(isset($setting_country1)){ echo $setting_country1;}?></p>
										<p><?php echo $lang['Phone'];?>: <?php if(isset($setting_phone1)){ echo $setting_phone1;}?></p>
                                        
										</div>
									<div class="col-sm-4 col-xs-6">
                                    <h5>Waybill To:</h5>

                                        <p><?php if(isset($cus_name)){echo $cus_name;}?>,</p>
										<p contentEditable="true"><?php if(isset($cus_address)){echo $cus_address;}?></p>
										 <?php if($act_grp_id !=2){ ?>
											<p contentEditable="true">Vehicle No.: <?php if(isset($lpo_grn)){echo $lpo_grn;}?></p>
										<?php }else{  ?>
												<p contentEditable="true">GRN: <?php if(isset($lpo_grn)){echo $lpo_grn;}?></p>

									<?php	} ?>


										<p contentEditable="true">Driver Name:: <?php if(isset($cus_mobile)){echo $cus_mobile;}?></p>
										<p contentEditable="true">Phone: </p>




                                        <?php
										if(isset($payment_detail_date)){
										if(($date_order_placed !=$payment_detail_date)){?>
										<p><?php echo $lang['Invoiceupdateddate'];?>: <?php echo date("F d, Y",strtotime($payment_detail_date));?></p>
                                        <?php }
										} ?>
									</div>

								</div>

								<table class="table-hover" width="99%"  border="2">
                                <thead>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center"><?php echo $lang['ItemInformation'];?></th>
                                        <th class="text-center"><?php echo $lang['Quantity'];?></th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Remark</th>

                                       
                                    </tr>
                                </thead>
									<tbody>
                                    <?php
									if(isset($invoice_number)){
							$sqlquery = "SELECT p.*, pli.* from invoice_line_items as pli, product as p where p.product_id=pli.product_id
							and pli.invoice_no_id=$_GET[i]";
								$queryresult = $conn->query($sqlquery);
								$SN = 1;
								if ($queryresult->num_rows > 0)
								{
									while($productrow = $queryresult->fetch_assoc())
									{

									?>
										<tr>
											<td><?php echo $SN++;?></td>
                                            <td><strong><?php echo $productrow['product_name'];?></strong><BR />
                                              <p contentEditable="true"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $productrow['commet'];?> </p>
                                            </td>
											<td><?php echo number_format($productrow['product_quantity'], 2, '.', ',');?></td>
                                            <td><?php echo $productrow['product_sku'];?></td>

											<td> <p contentEditable="true"> </p></td>


										</tr>
                                    <?php }
								}

									}?>

									</tbody>
                                    <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>

                                        </th>
                                    </tr>
                                </thead>
								</table>
								<div class="row">
									<div class="col-md-8">
										
										<p class="text-muted mb-0" id="amount-rupees" >
                                            </p><p contentEditable="true">
<br />Note: <?= $note?><br />
Goods sold in good condition are not returnable<br />
Thanks for your patronage<br />
								</p>


									</div>

									<div class="col-md-4">
										<div class="text-xs-right">





</div>


										</div>

									</div>
                                    Customer's Sign .........................     &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; EMOKLEEN GLOBAL RESOURCES:  .........................
<hr class="hr">

                                        <h5></h5>
                                        <div class="clearfix mb-0-25">
                                            <span class="float-xs-left"></span>
                                        </div>

                                        <div class="clearfix mb-0-25">
                                            <span class="float-xs-left"></span>

                                        </div>
                                       
                                    </div>
								</div>
							</div>

							<div class="card-footer clearfix">
								<button type="button" class="btn btn-danger label-left float-xs-right" onclick="generatePDF()">
									<span class="btn-label"><i class="ti-download"></i></span>
									Download
								</button>
								<button type="button" class="btn btn-info buttons-print  label-left float-xs-right mr-0-5" onclick="printDiv('printinvoice')">
									<span class="btn-label"><i class="ti-printer"></i></span>
									Print
								</button>

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


        <script type="text/javascript" src="../adaptinventory/toastr/toastr.min.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
$(document).ready(function() {
    $('#printinvoice').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                messageTop: 'PDF created by PDFMake with Buttons for DataTables.'
            }
        ]
    } );
} );

</script>

	</body>

</html>
