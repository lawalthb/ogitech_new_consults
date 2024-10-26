<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['c']) && !empty($_GET['c'])){
	$cid=strip_tags(trim($_GET['c']));
	 $sql = "SELECT * FROM banks_tb where bank_id='$cid'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) 
	{
		$bank_id=$row['bank_id'];
		$bank_name=$row['bank_name'];
		$bank_display_name=$row['bank_display_name'];
        $bank_number=$row['bank_number'];
        $bank_code=$row['bank_code'];
        $bank_status=$row['bank_status'];
        $bank_url=$row['bank_url'];
        $display_inv=$row['display_inv'];		
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
		<title><?php echo $lang['Edit'];?> Bank</title>

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
        
		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">
        <link rel="icon" href="img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>" type="image/gif" sizes="16x16">
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
						<h4>Edit Bank</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>	
                            <li class="breadcrumb-item"><a href="bankslist.php">Banks</a></li>						
							<li class="breadcrumb-item active"><?php echo $lang['Edit'];?> <?=$bank_display_name;?></li>
						</ol>
						<div class="box box-block bg-white">
							<h5><?php echo $lang['Edit'];?> <?=$row['bank_display_name'];?></h5>
							<p class="font-90 text-muted mb-1"> </p>
							<form class="form-material material-primary" id="editcategory">								
                                <div class="form-group row">
									<label for="Category" class="col-sm-2 col-form-label">Bank Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="<?php if(isset($bank_name)) echo $bank_name;?>" required>
										<input type="hidden" class="form-control" id="bank_id" name="bank_id" value="<?php if(isset($bank_id)) echo $bank_id;?>" >
                                    
                                        <input type="hidden" class="form-control" id="bank_code" name="bank_code" value="<?php if(isset($bank_code)) echo $bank_code;?>" >
                                    
                                    </div>
								</div>
                                <div class="form-group row">
									<label for="Category" class="col-sm-2 col-form-label">Account Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="bank_display_name" name="bank_display_name"  value="<?php if(isset($bank_display_name)) echo $bank_display_name;?>" required>
									
                                    </div>
								</div>

                                <div class="form-group row">
									<label for="Category" class="col-sm-2 col-form-label">Account Number</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="bank_number" name="bank_number"  value="<?php if(isset($bank_number)) echo $bank_number;?>" required>
									
                                    </div>
								</div>

                                <div class="form-group row">
									<label for="Category" class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-10">
                                        <?php  if($bank_status ==1 ){ $bs =  "Active"; $bv = 1 ;} else{ $bs = "Inactive"; $bv = 0;}  ?>
                                        <select name="bank_status" class="form-control">
                                            <option  <?php  if($bank_status ==1 ){ echo   "Selected"; }  ?> value="<?=$bv?>"><?=$bs?></option>
                                           

                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
										
									
                                    </div>
								</div>

                                <div class="form-group row">
									<label for="Category" class="col-sm-2 col-form-label">Show on Invoice</label>
									<div class="col-sm-10">
                                    <?php  if($display_inv ==1 ){ $bs =  "Yes"; $bv = 1 ;} else{ $bs = "No"; $bv = 0;}  ?>
                                        <select name="display_inv" class="form-control">
                                            <option  <?php  if($display_inv ==1 ){ echo   "Selected"; }  ?> value="<?=$bv?>"><?=$bs?></option>
                                           

                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
										
                                    </div>
								</div>
                                <div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button type="submit" class="btn btn-primary" id="btn-submit" value="Update" ><?php echo $lang['Update'];?> Bank</button>                                     
                                        
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
		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/ui-notifications.js"></script>
        <script>
			jQuery(document).ready(function(){
				
			  
			  // Edit supplier Form
			  jQuery("#editcategory").validate({
			   				
				rules:
			   {
					cat_name: {
					required: true,
					minlength: 2
					}
			   },
				submitHandler: submitForm
			  });
			  
			  
			   function submitForm()
				{
					
					NProgress.start();
					var data = $("#editcategory").serialize();
			
					$.ajax({
			
						type : 'POST',
						url  : 'modal/edit_bankModel.php',
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
			
								$("#error").fadeIn(2000, function(){									
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.error('Error Try Again!');									
										
									$("#btn-submit").html(' &nbsp; Try Again');
								});
							}
							else if(data.status==='successfully')
							{
								
									//$("#btn-submit").html('Add Supplier');									
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.success('Successfully updated!');
									NProgress.done();
									//$("#addsupplier").trigger('reset');
									setTimeout('$(".bg-white").fadeOut(700, function(){ window.location = "bankslist.php" }); ',800);

				   
							  }
						   
						}
					});
					return false;
				}
			  
			  
				
			});



</script>
	</body>

</html>