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
		<title>Add petty Cash Voucher</title>

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
						<h4>Editting Petty Cash Voucher</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Edit Voucher</li>
						</ol>                       
						<div class="box box-block bg-white">
													
				<form class="form-vertical" id="addexpvoucher" name="addexpvoucher" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="panel-body">
                        <div class="row">                        
							<div class="col-sm-8">
                            	 <?php 
								$c = "SELECT * FROM expense_types";
								$resultc = $conn->query($c); ?>
                                <?php 
								$last_no = "SELECT * FROM `petty_cash_tb` WHERE `petty_id` = $_GET[e]";
								$result_last_no = $conn->query($last_no);
								$row_last_no = $result_last_no->fetch_assoc();
								$lastvno = $row_last_no['voucher_no'];
								 ?>
                                <div class="form-group row">
									<label for="expense_type_id" class="col-sm-3 form-control-label">Voucher No: <i class="text-danger">*</i></label>
									<div class="col-sm-6">
										
                                        <input   type="text" class="form-control" name="voucher_no" value="<?=$lastvno?>">
                                        <input id="auth_id"  type="hidden" name="auth_id" value="<?php echo $_SESSION['auth_id'];?>">
									</div>
								</div>                                                                
                            </div>
                            
                        </div>
						<div class="form-group row">
                            <label for="datepicker_invoice_exp" class="col-sm-2 col-form-label"><?php echo $lang['Date'];?> <i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" autocomplete="off"  value="<?=$row_last_no['date']?>" id="datepicker_invoice_exp" name="datepicker_invoice_exp" placeholder="yyyy-mm-dd" required>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>             

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center">Select Particular <i class="text-danger">*</i></th>                                        
                                        <th class="text-center">Details <i class="text-danger">*</i></th>
                                        <th class="text-center">Amount Given <i class="text-danger">*</i></th>                                        
                                        <th class="text-center">Other Category</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_row_to_invoice">
                                    <tr>
                                        <td style="width: 320px">
                                           <select id="expense_type_id" name="particular" class="form-control" data-plugin="select2" required>
                                        <option selected value="<?=$row_last_no['particular']?>"><?php
										
										$part_name_q = "SELECT * FROM `expense_types` WHERE `expense_type_id` = $row_last_no[particular] ";
								$resultpart_name = $conn->query($part_name_q);
									$row_part_name = $resultpart_name->fetch_assoc();
									echo $row_part_name['expense_type_name'];
										
										?></option>
                                        <?php while($rowc = $resultc->fetch_assoc()) { ?>
											<option value="<?php echo $rowc['expense_type_id'];?>"><?php echo $rowc['expense_type_name'];?></option>
										<?php } ?>	
										</select> <span><a href="add-expense-type.php">New</a></span>
                                           
                                        </td>                                        
                                        <td style="width: 320px">
                                            <input name="details" autocomplete="off" class="total_qty_1 form-control" value="<?=$row_last_no['details']?>" id="total_qty_1"  required  placeholder="Enter Naration" tabindex="2" type="text">
                                        </td>
                                        <td >
                                            <input name="amount_out" autocomplete="off" id="totalval"  value="<?=$row_last_no['amount_out']?>" id="num" placeholder="0.00" class="item_price_1 price_item form-control" tabindex="3"  required  type="number">
                                            
                                        </td>
                                       
                                        <td >
                                           <select id="expense_type_id2" name="other_cat" class="form-control" data-plugin="select2" required>
                                        <option selected value="<?=$row_last_no['other_cat']?>"><?=$row_last_no['other_cat']?></option>
                                        <option value="None">None</option>
                                        <?php while($rowc = $resultc->fetch_assoc()) { ?>
											<option value="<?php echo $rowc['expense_type_id'];?>"><?php echo $rowc['expense_type_name'];?></option>
										<?php } ?>	
										</select>
                                        </td>

                                        <td >                                            
                                            <input id="add-invoice" class="btn btn-success" name="add-invoice"  value="Update" tabindex="8" type="submit">

                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>                                   
                                    
                                    <tr>
                                        <td colspan="3" ><input type="text" name="in_words" id="amount-rupees" readonly id="word" value="" size="80">
                                        <input type="hidden" name="petty_id" id=""  value="<?=$row_last_no['petty_id']?>" >
                                        </td>
                                        <td class="text-right">
                                            
                                        </td>
                                         
                                    </tr>
                                   <tr>
                                        <td colspan="3" >
											
								</tbody>
                                            
									</td>
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
						url  : 'modal/edit_add_expvoucherModel.php',
						data : data,
						dataType : 'json',
						
						beforeSend: function()
						{
							//alert(data);
							$("#error").fadeOut();
							$("#btn-submit").html(' <img src="img/loader1.gif" /> &nbsp; Updating ...');
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
									window.location.replace("petty-vouchers.php");							
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