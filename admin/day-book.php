<?php
session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
require_once ('convert.php');
include("language.php");
if(isset($_GET['i']) && !empty($_GET['i'])){
	$getdate=strip_tags(trim($_GET['i']));
	

  
		
		
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
		<title>Day Book</title>

		<!-- adaptinventory CSS -->
		<link rel="stylesheet" href="../adaptinventory/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../adaptinventory/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../adaptinventory/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../adaptinventory/animate.css/animate.min.css">
		<link rel="stylesheet" href="../adaptinventory/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../adaptinventory/waves/waves.min.css">
		<link rel="stylesheet" href="../adaptinventory/switchery/dist/switchery.min.css">		
        <link rel="stylesheet" href="../adaptinventory/toastr/toastr.min.css">

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
						<h4><?=$getdate?> Day Book </h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>							
							<li class="breadcrumb-item active">Daily Record</li>
						</ol><center>
                            <form action="day-book.php" method="get" >
                            <input type='date' name='i'  /><input type="submit" value="Go">
                        </form></center>
						<div class="card" id="printinvoice">
							<div class="card-header clearfix">
								<h5 class="float-xs-left mb-0">SOFBEFCY ~ Day Book</h5>
								<div class="float-xs-right"></strong>Date: <?php if(isset($getdate)){ echo date("F d, Y",strtotime($getdate));}?></div>
							</div>
							<div class="card-block" >
								<div class="row mb-12">
									<div class="col-sm-6 col-xs-6">										
                                       <h5>Sales Record</h5>
                                    
                                       <table  class="table ">
                                        <tr>
                                            <th>Sn</th>
                                            <th>Doc. No</th>
                                            <th>Particular</th>
                                            <th>Amount</th>
                                        </tr>
                                        <?php 
                                         $sql = "SELECT cus.*, doc.*, aut.*, leg.* FROM ledger_entries as leg, auth as aut, documents as doc, customers as cus where cus.cus_id=leg.account_id and doc.auth_id=aut.auth_id and doc.`document_date` = '$getdate' and leg.documents_id = doc.documnents_id and doc.document_type = 11 and leg.sub_acct_group_id !=49";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) 
		{
            $sn=0;
			while($row = $result->fetch_assoc()) 
									{ ?>			
		
                                        <tr>
                                            <td ><?=++$sn?></td>
                                            <td><?=$row['document_no']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=number_format($row['dr_amount'],2)?></td>
                                        </tr>
                                        <?php 
                                        } }else{ echo "<tr><td colspan='3'>No Record found</td></tr>";}?>
                                        </table>
										</div>
                                       


                                        <div class="col-sm-6 col-xs-6">										
                                       <h5>Purchase Record</h5>
                                    
                                       <table  class="table ">
                                        <tr>
                                            <th>Sn</th>
                                            <th>Doc. No</th>
                                            <th>Particular</th>
                                            <th>Amount</th>
                                        </tr>
                                        <?php 
                                         $sql = "SELECT cus.*, doc.*, aut.*, leg.* FROM ledger_entries as leg, auth as aut, documents as doc, customers as cus where cus.cus_id=leg.account_id and doc.auth_id=aut.auth_id and doc.`document_date` = '$getdate' and leg.documents_id = doc.documnents_id and doc.document_type = 21 and leg.sub_acct_group_id !=51";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) 
		{
            $sn=0;
			while($row = $result->fetch_assoc()) 
									{ ?>			
		
                                        <tr>
                                            <td ><?=++$sn?></td>
                                            <td><?=$row['document_no']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=number_format($row['cr_amount'],2)?></td>
                                        </tr>
                                        <?php 
                                        } }else{ echo "<tr><td colspan='3'>No Record found</td></tr>";}?>
                                        </table>
										</div>
                                                                           </div>


<hr />
                                    <div class="col-sm-6 col-xs-6">										
                                       <h5>Income Record</h5>
                                    
                                       <table  class="table ">
                                        <tr>
                                            <th>Sn</th>
                                            <th>Doc. No</th>
                                            <th>Particular</th>
                                            <th>Amount</th>
                                            <th>Through</th>
                                        </tr>
                                        <?php 
                                         $sql = "SELECT cus.*, doc.*, aut.*, leg.* FROM ledger_entries as leg, auth as aut, documents as doc, customers as cus where cus.cus_id=leg.account_id and doc.auth_id=aut.auth_id and doc.`document_date` = '$getdate' and leg.documents_id = doc.documnents_id and doc.document_type = 31 and leg.sub_acct_group_id =1 ";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) 
		{
            $sn=0;
			while($row = $result->fetch_assoc()) 
									{ ?>			
		
                                        <tr>
                                            <td ><?=++$sn?></td>
                                            <td><?=$row['document_no']?></td>
                                            <td><?php $row['against'];
                                            $w = "SELECT * FROM customers where cus_id = $row[against] ";
								$resultw = $conn->query($w);
                                            $roww = $resultw->fetch_assoc();
                                            echo  $roww['cus_name'];
                                            ?></td>
                                            <td><?=number_format($row['dr_amount'],2)?></td>
                                            <td><?=$row['cus_name']?></td>
                                        </tr>
                                        <?php 
                                        } }else{ echo "<tr><td colspan='3'>No Record found</td></tr>";}?>
                                        </table>
										</div>
                                       


                                        <div class="col-sm-6 col-xs-6">										
                                       <h5>Banks Purchase Record</h5>
                                    
                                       <table  class="table ">
                                        <tr>
                                            <th>Sn</th>
                                            <th>Doc. No</th>
                                            <th>Particular</th>
                                            <th>Amount</th>
                                        </tr>
                                        <?php 
                                         $sql = "SELECT cus.*, doc.*, aut.*, leg.* FROM ledger_entries as leg, auth as aut, documents as doc, customers as cus where cus.cus_id=leg.account_id and doc.auth_id=aut.auth_id and doc.`document_date` = '$getdate' and leg.documents_id = doc.documnents_id and doc.document_type = 91  and leg.sub_acct_group_id =2 ";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) 
		{
            $sn=0;
			while($row = $result->fetch_assoc()) 
									{ ?>			
		
                                        <tr>
                                            <td ><?=++$sn?></td>
                                            <td><?=$row['document_no']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=number_format($row['dr_amount'],2)?></td>
                                        </tr>
                                        <?php 
                                        } }else{ echo "<tr><td colspan='3'>No Record found</td></tr>";}?>
                                        </table>
                                       
                                        </div>
                                        
                                        
							
                                  
                            <div class="row mb-12">
                                 
                            
                                        									
                                      
                                    
                                       <table  class="table ">
                                        <tr>
                                            <th colspan="5"> <h5>Cash or Other Expenses</h5></th>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Doc. No</th>
                                            <th>Particular</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                        </tr>
                                        <?php 
                                         $sql = "SELECT cus.*, doc.*, aut.*, leg.* FROM ledger_entries as leg, auth as aut, documents as doc, customers as cus where cus.cus_id=leg.account_id and doc.auth_id=aut.auth_id and doc.`document_date` = '$getdate' and leg.documents_id = doc.documnents_id and doc.document_type = 51  and leg.sub_acct_group_id =12 ";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) 
		{
            $sn=0;
			while($row = $result->fetch_assoc()) 
									{ ?>			
		
                                        <tr>
                                            <td ><?=++$sn?></td>
                                            <td><?=$row['document_no']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=$row['document_comments']?></td>
                                            <td><?=number_format($row['dr_amount'],2)?></td>
                                        </tr>
                                        <?php 
                                        } }else{ echo "<tr><td colspan='3'>No Record found</td></tr>";}?>
                                        </table>
										</div>
                                        
                            </div>                                        
							</div>                                          

                   


                                
								
								
								
                                       
                                       
                                    </div>
								</div>
							</div>

							<div class="card-footer clearfix">
								<button type="button" class="btn btn-danger label-left float-xs-right">
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

</script>
		
	</body>

</html>
