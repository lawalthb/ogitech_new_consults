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
		<title>Add Accounts</title>
		<link rel="icon" href="img/icoimage.jpg" type="image/gif" sizes="16x16">
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
						<h4>Add Account on Level 3</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>
							<li class="breadcrumb-item active"><a href="chart-accts.php">Charts</a></li>
						</ol>
						<div class="box box-block bg-white">
							<h5>Add Account</h5>
							<p class="font-90 text-muted mb-1"> Use the form to add sub account to main account group.</p>
							<form class="form-material material-primary" id="addcategory">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Name of Account /Ledger</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="cat_name" name="cat_name" autofocus placeholder="Enter account name" autocomplete="off" required>
									</div>
                                </div>

                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="code" name="phone" placeholder="Optional" autocomplete="off">
									</div>
                                </div>

																<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="email" name="email" placeholder="Optional" autocomplete="off">
									</div>
                                </div>

																<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Address:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="address" name="address" placeholder="Optional" autocomplete="off">
									</div>
                                </div>

                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Select Account Group</label>
									<div class="col-sm-10">
                                    <?php
								$w = "SELECT * FROM sub_acct_group_tb WHERE `status` != 0 and `level` = 1";
								$resultw = $conn->query($w); ?>

                                    <select id="acct_grp" name="acct_grp"  class="form-control" data-plugin="select2" required>
                                        	<option value=""></option>
											<?php while($roww = $resultw->fetch_assoc()) { ?>
											<option value="<?php echo $roww['sub_acct_group_id'];?>"><?php echo strtoupper($roww['names']);?></option>
										<?php } ?>
										</select>
									</div>
								</div>
                                <div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button type="submit" class="btn btn-primary" id="btn-submit" value="Add Account" >Add Account</button>

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


			  // add supplier Form
			  jQuery("#addcategory").validate({

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
					var data = $("#addcategory").serialize();

					$.ajax({

						type : 'POST',
						url  : 'modal/add_accountMode3l.php',
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

									$("#btn-submit").html('Add another account');
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.success('Success!');
									NProgress.done();
									$("#addcategory").trigger('reset');


							  }

						}
					});
					return false;
				}



			});



</script>
	</body>

</html>
