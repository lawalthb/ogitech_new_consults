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
		<title>Add receipt Voucher</title>

		<!-- adaptinventory CSS -->
		<link rel="stylesheet" href="../adaptinventory/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../adaptinventory/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../adaptinventory/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../adaptinventory/animate.css/animate.min.css">
		<link rel="stylesheet" href="../adaptinventory/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../adaptinventory/waves/waves.min.css">
		<link rel="stylesheet" href="../adaptinventory/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../adaptinventory/nprogress/nprogress.css">
        <link rel="stylesheet" href="../adaptinventory/toastr/toastr.min.css">
        <link rel="stylesheet" href="../adaptinventory/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
        <link rel="stylesheet" href="../adaptinventory/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../adaptinventory/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
         <link rel="icon" href="img/icoimage.jpg" type="image/gif" sizes="16x16">
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
    $("#totalval").on("keydown keyup", per);
	function per() {
		var totalamount = (
		Number($("#totalval").val()) 
		);
		$("#totalval").val(totalamount);
		words = toWords(totalamount);
		$("#amount-rupees").val(words + "Naira Only");
	}
});
</script>

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
						<h4>Adding Purchase Receipt</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Add Receipt</li>
						</ol>                       
						<div class="box box-block bg-white">
													
				<form class="form-vertical" id="addexpvoucher" name="addexpvoucher" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="panel-body">
                        <div class="row">                        
							<div class="col-sm-8">
                            	 <?php 
								$c = "SELECT * FROM suppliers";
								$resultc = $conn->query($c); ?>
                                <?php 
								$last_no = "SELECT * FROM `purchase_payments_tb`  ORDER BY `receipt_no` DESC ";
								$result_last_no = $conn->query($last_no);
								$row_last_no = $result_last_no->fetch_assoc();
								$lastvno = $row_last_no['receipt_no']+1;
								 ?>
                                <div class="form-group row">
									<label for="expense_type_id" class="col-sm-3 form-control-label">Receipt No: <i class="text-danger">*</i></label>
									<div class="col-sm-6">
										
                                        <input   type="text" class="form-control" name="receipt_no" value="<?=$lastvno?>">
                                        <input id="auth_id"  type="hidden" name="auth_id" value="<?php echo $_SESSION['auth_id'];?>">
									</div>
								</div>                                                                
                            </div>
                            
                        </div>
						<div class="form-group row">
                            <label for="datepicker_invoice_exp" class="col-sm-2 col-form-label"><?php echo $lang['Date'];?> <i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" autocomplete="off"  value="<?=date('Y-m-d')?>" id="datepicker_invoice_exp" name="datepicker_invoice_exp" placeholder="yyyy-mm-dd" required>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>             

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center">Select Suppliers <i class="text-danger">*</i></th>                                        
                                        
                                        <th class="text-center">Amount Paid <i class="text-danger">*</i></th>                                        
                                        <th class="text-center">Paid Through</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_row_to_invoice">
                                    <tr>
                                        <td style="width: 320px">
                                           <select id="expense_type_id" name="particular" class="form-control" data-plugin="select2" required>
                                        <option value=""><?php echo $lang['SelectExpense'];?></option>
                                        <?php while($rowc = $resultc->fetch_assoc()) { ?>
											<option value="<?php echo $rowc['supplier_id'];?>"><?php echo $rowc['supplier_name'];?></option>
										<?php } ?>	
										</select> <span><a href="add-supplier.php">New</a></span>
                                           
                                        </td>                                        
                                        
                                        <td >
                                            <input name="amount_in" autocomplete="off" id="totalval"  value="" id="num" placeholder="0.00" class="item_price_1 price_item form-control" tabindex="3"  required  type="number">
                                            
                                        </td>
                                       
                                        <td >
                                           <select id="expense_type_id2" name="paid2ru" class="form-control" data-plugin="select2" required>
                                        <option value="1">Flex 1017317112 - Zenith</option>
                                        <option value="2">Petty Cash</option>
                                        <option value="3">Flex UBA Bank</option>
                                         <option value="4">Personal Act</option>
                                        	
										</select>
                                        </td>

                                        <td >                                            
                                            <input id="add-invoice" class="btn btn-success" name="add-invoice"  value="<?php echo $lang['Submit'];?>" tabindex="8" type="submit">

                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>                                   
                                    
                                    <tr>
                                        <td colspan="3" ><input type="text" name="in_words" id="amount-rupees" readonly id="word" value="" size="80"></td>
                                        <td class="text-right">
                                            
                                        </td>
                                         
                                    </tr>
                                   <tr>
                                        <td colspan="3" >
											<table class="table table-striped table-bordered dataTable" id="table-2">
								<thead>
									<tr>
										<th>No</th>
										<th>Receipt No</th>
										<th>Customer</th>
										<th>Amount</th>
                                        <th>Balance</th>
                                        <th>Date</th>
										
									</tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$last_no = "SELECT * FROM `purchase_payments_tb`  ORDER BY `payment_id` DESC limit 5 ";
								$result_last_no = $conn->query($last_no);
								$sn=1;
								
										
										
										 while($row_last_no = $result_last_no->fetch_assoc()) { ?>
                                    <tr>
										<td><?=$sn++?></td>
										<td><?=$row_last_no['receipt_no']?></td>
										<td><?php
                                        
										
										$part_name_q = "SELECT * FROM `suppliers`  WHERE `supplier_id` = $row_last_no[cus_id] ";
								$resultpart_name = $conn->query($part_name_q);
									$row_part_name = $resultpart_name->fetch_assoc();
									
									$amt = "SELECT * FROM `sup_invoice_payment_detail` WHERE `invoice_payment_id` = $row_last_no[invoice_payment_id] ";
								$ramt = $conn->query($amt);
									$roamt = $ramt->fetch_assoc();
									
									echo $row_part_name['supplier_name'];
										?></td>
										<td><?=number_format($roamt['paid_amount'],2)?></td>
                                       
                                         <td><?=$roamt['balance']?></td>
                                          <td><?=$row_last_no['date']?></td>
										
									</tr>
								</tbody>
                                            
										<?php } ?></td>
                                        <td class="text-right">
                                            
                                        </td>
                                         	
                                    </tr>
                                   
                                   
                                </tfoot>
                            </table>                            
                        </div>
                    </div>
                    </form>							
						</div>			
						
					</div>
				</div>
				<!-- Footer -->
				<?php include("footermenu.php");?>
			</div>

		</div>

		<!-- adaptinventory JS -->
		<script type="text/javascript" src="../adaptinventory/jquery/jquery-1.12.3.min.js"></script>
        <script src="js/jquery-ui.js"></script>
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
		<script type="text/javascript" src="../adaptinventory/nprogress/nprogress.js"></script>
        <script type="text/javascript" src="../adaptinventory/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/ui-notifications.js"></script>        
        <script src="js/expense_invoice.js"></script>  
        
            
        <script>
		
	$(document).ready(function(){
		$('#datepicker_invoice_exp').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		todayHighlight: true
		});		
				
	});	
	
</script>

      
  <script type="text/javascript">
			jQuery(document).ready(function(){				
			  
			  // add invoice Form
			  jQuery("#addexpvoucher").validate({
			   				
				rules:
			   {
					product_name: {
					required: true
					}
			   },
				submitHandler: submitForm
			  });			  
			  
			   function submitForm()
				{
					
					NProgress.start();
					var data = $("#addexpvoucher").serialize();
			
					$.ajax({
			
						type : 'POST',
						url  : 'modal/add_sup_receiptModel.php',
						data : data,
						dataType : 'json',
						
						beforeSend: function()
						{
							//alert(data);
							$("#error").fadeOut();
							$("#btn-submit").html(' <img src="img/loader1.gif" /> &nbsp; sending ...');
						},
						success :  function (data)
						{					
						//alert(data.status);
							if(data.status==='error'){
			
								$("#error").fadeIn(1000, function(){
									$("#error").html('<div class="alert alert-danger"> &nbsp; Sorry try again!</div>');
			
									$("#btn-submit").html(' &nbsp; Try Again');
								});
							}
							else if(data.status==='successfully')
							{
								
									$("#btn-submit").html('Submit');
									window.location.reload(true);									
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.success('Success!');
									NProgress.done();
									$("#addexpvoucher").trigger('reset');
				   
							  }
						   
						}
					});
					return false;
				}
			});
</script>


	</body>

</html>