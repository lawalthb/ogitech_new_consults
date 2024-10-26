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
		<title>Production</title>

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
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/ui-notifications.js"></script>        
        <script src="js/invoice4.js"></script>   

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
						<h4>Production Reports</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<?php
							if(!isset($_GET['used'])){ 
								?>

							<li class="breadcrumb-item"><a href="productn.php?used=1">Add </a> </li>
							<?php   }else{   ?> <li class="breadcrumb-item"><a href="plain_water.php">Add New </a> </li>  <?php

							}  ?>

							<li class="breadcrumb-item"><a href="plain_water.php?view=1">View </a> </li>
							<li class="breadcrumb-item"><a href="plain_water.php?delete=1">Delete </a> </li>
						</ol>

						<?php
							if(!isset($_GET['used']) and !isset($_GET['view']) ){ 
								?>
						<div class="box box-block bg-white">
							<?php 
                $last_no = "SELECT * FROM `plain_water_tb` ORDER BY `plain_water_tb`.`plain_water_id` DESC";
                $result_last_no = $conn->query($last_no);
                $row_last_no = $result_last_no->fetch_assoc();
                $lastvno = $row_last_no['seria_n']+1; ?>
							<h5>Production Entry  (<b id="sn"><?=$lastvno?></b>)</h5>
							
							<form class="form-material material-primary" id="addcustomer" >
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Date:</label>
									<div class="col-sm-10">
										<input type="Date" class="form-control" id="cus_name" name="date_in" value="<?=date('Y-m-d')?>" required="yes" autocomplete="off" >
										<input type="hidden" class="form-control"  name="sn" value="<?=$lastvno?>"  autocomplete="off" >
										<input id="auth_id"  type="hidden" name="auth_id" value="<?php echo $_SESSION['auth_id'];?>">  
									</div>
								</div>
							    <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Item Name:</label>
									<div class="col-sm-10">
									
									
										<input name="product_name[]" onkeypress="invoice_productList(1);" class="form-control productSelection" placeholder="<?php echo $lang['Products'];?>" required id="product_name" autocomplete="off" tabindex="1" type="text">
										
									
										   <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="product_id"/> <input name="available_quantity[]" class="form-control available_quantity_1" value="" readonly type="text">
									
									</div>

								
								</div>

								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Raw Material Input:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control"  name="raw_input" placeholder="How Many Kg of Plain Roll" required="yes" autocomplete="off" >
									</div>
								</div>

								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Chemical - IPA:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control"  name="ipa" placeholder="How Many Kg of IPA"  autocomplete="off" >
									</div>
								</div>

								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Chemical - Butanol:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control"  name="butanol" placeholder="How Many Kg of Butanol" autocomplete="off" >
									</div>
								</div>

								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Chemical - Toluene:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control"  name="toluene" placeholder="How Many Kg of Toluene"  autocomplete="off" >
									</div>
								</div>

								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Finished Item Output:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control"  name="result" placeholder="Finished Item Output" required="yes" autocomplete="off" >
									</div>
								</div>


								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Operator's Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="op_name" placeholder="Name of operator" required="yes"  >
									</div>
								</div>
                              
                                
                               
                                
                                                                
                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Suppervisor's Remark</label>
									<div class="col-sm-10">
										<textarea name="remark_in" class="form-control" id="cus_address" placeholder="Any Comment"></textarea>
									</div>
								</div>
                                <div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button type="submit" class="btn btn-primary" id="btn-submit" value="Submit" >Submit </button>                                     
                                        
									</div>
								</div>
							</form>							
						</div>		
<?php  }  ?>


<?php
							if(isset($_GET['used'])){ 
								?>
							<h5>Used  Water Roll </h5>
						<div class="box box-block bg-white">
						
                
							
							<form class="form-material material-primary" id="addcustomer" >
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Date:</label>
									<div class="col-sm-10">
										<input type="Date" class="form-control"  name="date_out" value="<?=date('Y-m-d')?>" required="yes" autocomplete="off" >
										<input type="hidden" class="form-control"  name="sn" value="<?=$lastvno?>"  autocomplete="off" >
										<input id="auth_id"  type="hidden" name="auth_id" value="<?php echo $_SESSION['auth_id'];?>">  
									</div>
								</div>

								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Micron</label>
									<div class="col-sm-10">

										<select id="micron" name="micron"  class="form-control" data-plugin="select2" required="yes" 
										onchange="ajaxFunction()">
                                        	<option ></option>
                                        	<option value="30Mic" >30Mic</option>
                                        	<option value="31Mic" >31Mic</option>
                                        	<option value="32Mic" >32Mic</option>
                                        	<option value="33Mic" >33Mic</option>
                                        	<option value="34Mic" >34Mic</option>
                                        	<option value="35Mic" >35Mic</option>
                                        	<option value="38Mic" >38Mic</option>
                                        	<option value="40Mic" >40Mic</option>
                                        	<option value="42Mic" >42Mic</option>
                                        	<option value="45Mic" >45Mic</option>

											
										</select>
									</div>
								</div>


                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Kilo Gram:</label>
									<div class="col-sm-10" id="ajaxDiv">
										Select Micron and wait...
									</div>
								</div>
                              

                              <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Product Name:</label>
									<div class="col-sm-10" id="ajaxDiv">
										<select  name="product_id"  class="form-control" data-plugin="select2" required="yes" 
                                        >
                                            <option ></option> 
                                           <?php
                                        $productSql2 = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id = '1'  ORDER BY prInfo.product_name ASC ";
                                        $productData2 = $conn->query($productSql2);

                                        while($row2 = $productData2->fetch_array()) {                                           
                                            echo "<option value='".$row2['product_id']."' >".$row2['product_name']
                                            
                                            .
                                            
                                            "</option>";
                                            } // /while 

                                    ?>

                                            
                                        </select>
									</div>
								</div>
                                
                                
                                
                                                                
                                <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Remark</label>
									<div class="col-sm-10">
										<textarea name="remark_out" class="form-control" id="cus_address" placeholder="Any Comment"></textarea>
									</div>
								</div>
                                <div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button type="submit" class="btn btn-primary" id="btn-submit" value="Add to Used Roll" >Add to Used Roll</button>                                     
                                        
									</div>
								</div>
							</form>							
						</div>	

<?php  }  ?>
<?php
if(isset($_GET['view'])){ 
								?>
							<h5>View Water Roll </h5>
						<div class="box box-block bg-white">
						
                
							
							
								
									<table class="table table-striped table-bordered" id="table-2"><thead>										<tr>
										<th>Sn</th> <th>Date</th><th>Mic</th><th>Kg</th><th>Job Name</th><th>Date Out</th>


									</tr></thead>
									<tbody>
										<?php 
                $sql = "SELECT * FROM `plain_water_tb` ORDER BY `plain_water_tb`.`micron` ASC";
                $result = $conn->query($sql);
                
                  // output data of each row
                  $i=1;
                  $tkg=0;
                  while($row = $result->fetch_assoc()) 
                  { ?>    
										<tr>
										<td><?=$row['seria_n']?></td> <td><?=$row['date_in']?></td><td><?=$row['micron']?></td><td><?=$row['kg']?></td><td><?php


										$pro = $row['product_id'];
											$sql2= "SELECT * FROM `product` WHERE `product_id` = '$pro' ";
                							$result2 = $conn->query($sql2);
                							$row2 = $result2->fetch_assoc() ;
                							if(empty($row2['product_name'])){echo  "<em style='color:red'>Never Use</em>";}
                								echo  $row2['product_name'];
                							

										?></td><td><?=$row['date_out']?></td>


									</tr>
<?php $i++;  $tkg=$tkg+$row['kg'];
                      }  ?>
								</tbody>

										<tr>
										<td></td> <td></td><td></td><td><?=number_format($tkg,2)?>Kg</td><td></td><td></td>


									</tr>
								 </table>
								</div>
<?php  $sql1 = "SELECT sum(kg) as tkg FROM `plain_water_tb` WHERE `status`=1";
                $result1 = $conn->query($sql1); $row1 = $result1->fetch_assoc();

                $sql2 = "SELECT sum(kg) as tkg FROM `plain_water_tb` WHERE `status`=0";
                $result2 = $conn->query($sql2); $row2 = $result2->fetch_assoc();

                $sql7 = "SELECT sum(kg) as tkg FROM `plain_water_tb`";
                $result7 = $conn->query($sql7); $row7 = $result7->fetch_assoc();
                ?>
                                <div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button  class="btn btn-success" id="btn-submit" value="Add to Used Roll" > Used Rolls: 
											<?=number_format($row1['tkg'],2);?></button>  

											<button  class="btn btn-danger" id="btn-submit" value="Add to Used Roll" > Unsued Rolls: 
											<?=number_format($row2['tkg'],2);?></button>  

											<button  class="btn btn-primary" id="btn-submit" value="Add to Used Roll" > Total Rolls: 
											<?=number_format($row7['tkg'],2);?></button>                                     
                                        

                                        									</div>
														
						</div>	

<?php  }  ?>








						
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
			  jQuery("#addcustomer").validate({
			   				
				rules:
			   {
					cus_name: {
					required: true,
					minlength: 3
					}
			   },
				submitHandler: submitForm
			  });
			  
			  
			   function submitForm()
				{
					
					NProgress.start();
					var data = $("#addcustomer").serialize();
			
					$.ajax({
			
						type : 'POST',
						url  : 'modal/add_plainModel.php',
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
								
									$("#btn-submit").html('Add another Roll');
																	
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.success('Success!');
									NProgress.done();
									//$("#addcustomer").trigger('reset');
									 setTimeout('$("#addcustomer").fadeOut(500, function(){ window.location = "plain_water.php" }); ',1000);

				   
							  }
							  else if(data.status==='successfully2')
							{
								
									$("#btn-submit").html('Use another Roll');
																	
									toastr.options = {
									positionClass: 'toast-top-right'
									};
									toastr.success('Success!');
									NProgress.done();
									$("#addcustomer").trigger('reset');
									 //setTimeout('$("#addcustomer").fadeOut(500, function(){ window.location = "plain_water.php" }); ',1000);

				   
							  }
						   
						}
					});
					return false;
				}
			  
			  
				
			});



</script>
 <script language="javascript" type="text/javascript">

//Browser Support Code
function ajaxFunction(){
	//alert(1);
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	
	var micron = document.getElementById('micron').value;
	var queryString = "?micron=" + micron ;
	ajaxRequest.open("GET", "getmicron.php" + queryString, true);
	ajaxRequest.send(null); 
}

//-->
</script>





	</body>

</html>
