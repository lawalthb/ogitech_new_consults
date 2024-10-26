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
		<title>Add Producton</title>

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
        
		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <style>
    
		#customer_section_2
		{
		display:none;
		}
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
						<h4>Making Production Report</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Add Prodution</li>
						</ol>                       
						<div class="box box-block bg-white">
													
				<form class="form-vertical" id="addinvoice" name="addinvoice" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="panel-body">
                        <div class="row"> 
                        <div id="error"></div>                       
							<div class="col-sm-8" id="customer_section_1">
                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">Production No. <i class="text-danger">*</i></label>
                                    
                                    <div class="col-sm-6">
                                   <?php      $last_no = "SELECT * FROM `documents` where `document_type` = '88' ORDER BY `documnents_id` DESC ";
                                $result_last_no = $conn->query($last_no);
                                $row_last_no = $result_last_no->fetch_assoc();
                                $lastvno = $row_last_no['document_no']+1;   ?>
                                       <input type="text" size="100" autocomplete="off"  readonly="yes" value="<?=$lastvno?>" onkeyup="chk_inv(this.value)"  autofocus name="paper_inv_no" class="form-control" placeholder='Enter Invoice Number' id="paper_inv_no" required  />

                                        
                                    </div>
                                    <div  class=" col-sm-3">
                                       
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-sm-8" id="customer_section_2">
                               <div class="form-group row">
                                    <label for="customer_name_others" class="col-sm-3 col-form-label"><?php echo $lang['PayeeName'];?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                       <input  autocomplete="off" type="text"  size="100" name="new_customer" placeholder='<?php echo $lang['PayeeName'];?>' id="new_customer" class="form-control" required />
                                    </div>
                                    <div  class="col-sm-3">
                                        <input  onClick="active_customer('customer_section_2')" type="button" id="oldcustomer_2" class="checkbox_account btn btn-success" name="new_customer_name" value="<?php echo $lang['OldCustomer'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cus_mobile" class="col-sm-3 col-form-label"><?php echo $lang['Mobile'];?> </label>
                                    <div class="col-sm-6">
                                       <input type="text" autocomplete="off"  size="100" name="cus_mobile" class=" form-control" placeholder='<?php echo $lang['Mobile'];?>' id="cus_mobile" />
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label for="customer_name_others_address" class="col-sm-3 col-form-label"><?php echo $lang['Address'];?> </label>
                                    <div class="col-sm-6">
                                       <input type="text"  size="100" name="new_customer_address" autocomplete="off" class=" form-control" placeholder='<?php echo $lang['Address'];?>' id="new_customer_address" />
                                    </div>
                                </div> 
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="datepicker_invoice_date" class="col-sm-2 col-form-label"><?php echo $lang['Date'];?> <i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" autocomplete="off" required  id="datepicker_invoice_date" name="datepicker_invoice_date" placeholder="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>        <input id="auth_id"  type="hidden" name="auth_id" value="<?php echo $_SESSION['auth_id'];?>">     

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center">Raw Naterial Input <i class="text-danger">*</i></th>
                                       
                                        
                                        <th class="text-center">Other Input 1</th>
                                        
                                        <th class="text-center">Other Output 2</th>
                                        <th class="text-center">Output<i class="text-danger">*</i></th>
                                        <th class="text-center">Other Output </th>
                                        <th class="text-center">Operator </th>
                                        <th class="text-center">Duty</th>
                                        <th class="text-center">Machine</th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                    <tr>
                                        <td style="width: 220px">
                                            <input name="product_input_name" onkeypress="invoice_productList(1);" class="form-control productSelection" placeholder="<?php echo $lang['Products'];?>" required id="product_name" autocomplete="off" tabindex="1" type="text">
                                           <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_input_name" id="product_id"/>
                                           

                                           <input name="product_input" autocomplete="off" class="total_qty_1 form-control" id="product_input"  required " placeholder="Plain Roll Kg" tabindex="3" type="text"> 

                                           <input name="core_input" autocomplete="off" class="total_qty_1 form-control" id="core_input"  required " placeholder="Core Input Kg" tabindex="3" type="text"> 
                                        </td>
                                        
                                        <td>
                                            <input name="ipa" autocomplete="off" class="total_qty_1 form-control" id="ipa" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="IPA Kg" tabindex="3" type="text"> 
                                            <input name="toluene" autocomplete="off" class="total_qty_1 form-control" id="toluene" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="Toluene Kg" tabindex="3" type="text">
                                            
                                            <input name="butanol" autocomplete="off" class="total_qty_1 form-control" id="butanol" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="Butanol Kg" tabindex="3" type="text">
                                        </td>

                                        <td>
                                            <input name="reflex" autocomplete="off" class="total_qty_1 form-control" id="reflex" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="Reflex Blue Kg" tabindex="3" type="text"> 
                                            <input name="royal" autocomplete="off" class="total_qty_1 form-control" id="royal" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="Royal Blue Kg" tabindex="3" type="text">
                                            
                                            <input name="sky" autocomplete="off" class="total_qty_1 form-control" id="Sky" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="Sky Blue Kg" tabindex="3" type="text">
                                        </td>


                                        <td style="width: 185px">
                                        <input name="product_output_name" onkeypress="invoice_productList(1);" class="form-control productSelection" placeholder="<?php echo $lang['Products'];?>" required id="product_name" autocomplete="off" tabindex="1" type="text">
                                           <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_output_name" id="product_55"/>

                                           <input name="product_output" autocomplete="off" class="total_qty_1 form-control" id="product_output"  required " placeholder="Printed Roll Kg" tabindex="3" type="text"> 
                                           
                                           <input name="core_output" autocomplete="off" class="total_qty_1 form-control" id="core_output"  required " placeholder="Core Output Kg" tabindex="3" type="text"> 

                                        </td>
                                        <!-- Discount -->
                                        <td>
                                        <input name="wastage"   onkeyup="quantity_calculate(1)" onchange="quantity_calculate(1);" value="" class=" price_item form-control" placeholder="Wastage" tabindex="7" required    type="text">

<input name="damage"   onkeyup="quantity_calculate(1)" onchange="quantity_calculate(1);" value=""  class=" price_item form-control" placeholder="Damage nylon" tabindex="7"   required type="text">
                                            
                                            
                                       		<input type="hidden" id="total_discount_1" class="total_tax_1" />
                                            <input type="hidden" id="all_discount_1" class="total_discount"/>
                                        </td>
                                       
                                        <td style="width: 100px">

                                        <select name="operator" id="discount_1" class="form-control" value="" autocomplete="off" min="0" tabindex="4" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);">
                                                <option value="Henry">Henry</option>
                                                <option value="Damilare">Damilare</option>
                                                <option value="Lateef">Lateef</option>
                                                <option value="Damilola">Damilola</option>
                                                
                                            </select>
                                            
                                        </td>

                                        <td> 
                                        <select name="duty" id="discount_1" class="form-control" value="" autocomplete="off" min="0" tabindex="4" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);">
                                                <option value="Day">Day</option>
                                                <option value="Night">Night</option>
                                                
                                            </select>                                           
                                            
                                        </td>

                                        <td> 
                                        <select name="machine" id="discount_1" class="form-control" value="" autocomplete="off" min="0" tabindex="4" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);">
                                                <option value="3-Hubs">3-Hubs</option>
                                                <option value="2-Hubs">2-Hubs</option>
                                                <option value="Flexo">Flexo</option>
                                                
                                            </select>                                           
                                            
                                        </td>


                                    </tr>
                                </tbody>
                                <tfoot>
                                    
                                    
                                            <input id="total_discount_ammount" class="form-control" name="total_discount" tabindex="-1" value="0.00" readonly type="hidden">
                                        
                                    <tr>
                                        <td><input name="available_quantity[]" class="form-control available_quantity_1" value="" readonly type="text"></td>
                                        <td colspan="5" style="text-align:right;"><b>Production Price:</b></td>
                                        <td class="text-right">
                                            <input id="grandTotal" class="form-control" name="production_price" value="0.00" tabindex="-1"  type="text">
                                        </td>
                                    </tr>
                                    <tr>

                                    <td align="center" colspan="2">
                                            <input id="add-invoice" class="btn btn-success" name="add-invoice"  value="<?php echo $lang['Submit'];?>" tabindex="9" type="submit">
                                            <input id="full_paid_tab" class="btn btn-warning" name="" type="reset" value="Reset" tabindex="8" readonly>
                                        </td> 
                                        <td style="text-align:right;" colspan="4"><b>Selling Price:</b></td>
                                        <td class="text-right">
                                            <input id="paidAmount" autocomplete="off" class="form-control"  name="selling_price"  value="0.00" placeholder="0.00" tabindex="7" type="text">
                                        </td>
                                    </tr>
                                    <tr >
                                        <td colspan="6"><textarea  style="width:100%" name="doc_comment" placeholder="Suppervisor's Remark"></textarea>
                                       
                                         
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
        <script src="js/invoice4.js"></script>      
        <script>
		function active_customer(status)
    {
        if(status=="customer_section_1"){
            document.getElementById("customer_section_1").style.display="none";
            document.getElementById("customer_section_2").style.display="block";
            document.getElementById("oldcustomer_2").checked = false;
            document.getElementById("oldcustomer_1").checked = true;
        }
        else{
            
			document.getElementById("customer_section_2").style.display="none";
            document.getElementById("customer_section_1").style.display="block";
            document.getElementById("oldcustomer_2").checked = false;
            document.getElementById("oldcustomer_1").checked = true;
        }
    }
	$(document).ready(function(){
		$('#datepicker_invoice_date').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		todayHighlight: true
		});		
				
	});	
	
</script>
<?php include ('customer.js.php'); ?>
<?php include ('product_invoice.js.php'); ?>        
  <script type="text/javascript">
			jQuery(document).ready(function(){				
			  
			  // add invoice Form
			  jQuery("#addinvoice").validate({
			   				
				rules:
			   {
					product_id: {
					required: true
					}
			   },
				submitHandler: submitForm
			  });			  
			  
			   function submitForm()
				{
					
					NProgress.start();
					var data = $("#addinvoice").serialize();
			
					$.ajax({
			
						type : 'POST',
						url  : 'modal/add_productionModel.php',
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
						
							if(data.status==='error'){
			
								$("#error").fadeIn(1000, function(){
									$("#error").html('<div class="alert alert-danger"> &nbsp; Sorry try again!</div>');
			
									$("#btn-submit").html(' &nbsp; Try Again');
								});
							}
							else if(data.status==='successfully')
							{
								
									$("#btn-submit").html('Submit');									
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.success('Success!');
									NProgress.done();
									//$("#addinvoice").trigger('reset');
									
									setTimeout('$("#addinvoice").fadeOut(500, function(){ window.location = "productionlist.php" }); ',1000);
				   
							  }
						   
						}
					});
					return false;
				}
			});
</script>
	</body>

</html>
