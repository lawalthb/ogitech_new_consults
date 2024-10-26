<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['i']) ){

   $documnents_id=strip_tags(trim($_GET['i']));



      $del = "DELETE FROM documents WHERE documnents_id='$documnents_id'";
//die();
   if ($conn->query($del) === TRUE) {

   $ipdd = $conn->query("DELETE FROM ledger_entries WHERE documents_id='$documnents_id'");
   $dstk= $conn->query("DELETE FROM `stock_tb` WHERE `invoice_no` = '$documnents_id'  ");

  $getPro = $conn->query("SELECT * FROM `invoice_line_items` WHERE `invoice_no_id` = $documnents_id");
                $items_lines =mysqli_num_rows($getPro);
                while($rowpd = $getPro->fetch_assoc())   {

                          $pr_id  = $rowpd['product_id'];
                          $pr_qty  = $rowpd['product_quantity'];
                         if($_GET['ac_type'] ==1 ){
                     $update_product_table = "UPDATE `product_detail` SET `product_quantity` = `product_quantity` + '$pr_qty' where p_id='$pr_id' ";
        $conn->query($update_product_table);
                         }elseif($_GET['ac_type'] ==2 ){
                          $update_product_table = "UPDATE product_detail SET `product_quantity` = `product_quantity` - '$pr_qty' where p_id='$pr_id' ";
              $conn->query($update_product_table);
              }


    $ilid = $conn->query("DELETE FROM invoice_line_items WHERE invoice_no_id='$documnents_id' ");


    header("location: invoices.php?d=del&ac_type=1");
  } }else{
    header("location: invoices.php?d=n&ac_type=1");
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

    <title>Profit and Loss Ledger</title>

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
        <link rel="stylesheet" href="../adaptinventory/clockpicker/dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" href="../adaptinventory/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../adaptinventory/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="icon" href="img/icoimage.jpg" type="image/gif" sizes="16x16">
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
            <h4> Profit/Loss Ledger
            </h4>
            <ol class="breadcrumb no-bg mb-1">
              <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>
              <li class="breadcrumb-item active">


              </li>
            </ol>
            <div class="box box-block bg-white">

                            <div class="table-responsive">
                            Date Range:
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
                            <br />
              <table class="table table-striped table-bordered" id="table-2">
                <thead>
                  <tr>
                    <th>No</th>
                    <th><?php echo $lang['Invoiceno'];?></th>
                    <th><?php echo $lang['Date'];?></th>

                                        <th>Product Name</th>

                    <th>Quantity</th>
                      <th>Purchase Price</th>
                    <th>Sold Rate</th>
                    <th>Total Puchase Amount</th>
                    <th>Total Sold Amount</th>

                    <th>Profit</th>


                  </tr>
                </thead>
                <tbody>
                                <?php
if(!isset($_POST['start']) and !isset($_POST['end'])){

                   $sql = "SELECT inv_items.*, doc.*,pd.product_name FROM documents as doc, invoice_line_items as inv_items, product as pd where doc.document_type !=21 and doc.documnents_id=inv_items.invoice_no_id and pd.product_id=inv_items.product_id  and doc.`document_date` BETWEEN '$op_st' AND '$op_en'   ORDER BY `inv_items`.`order_items_id` DESC";
}



                                if(isset($_POST['start']) and isset($_POST['end'])){
                                   $sql = "SELECT inv_items.*, doc.*,pd.product_name FROM documents as doc, invoice_line_items as inv_items, product as pd where  doc.document_type !=21 and doc.documnents_id=inv_items.invoice_no_id and pd.product_id=inv_items.product_id   and doc.document_date BETWEEN '$_POST[start]' AND '$_POST[end]' ORDER BY `inv_items`.`order_items_id` DESC";

                                                  }
                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {
                  // output data of each row
                  $i=1;
                  //$gtp=$rowop['petty_balance'];
									$ts=0;
									$tp=0;
                  	$pr=0;
                  while($row = $result->fetch_assoc())
                  { ?>
                  <tr>
                    <td><?php echo $i;?></td>

                    <td><?php echo $row['document_no'];?></td>


                    <td><?php

                          echo $row['document_date'];

                    ?></td>
                                        <td><?php echo $row['product_name'];?></td>

                    <td><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php echo  number_format($row['product_quantity'],2) ;?></td>

                    <td><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php echo  number_format($row['purchase_rate'],2) ;?></td>
                    <td><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php echo  number_format($row['product_rate'],2) ;?></td>
                    <td><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php $total_pur = $row['purchase_rate']*$row['product_quantity']; echo  number_format($total_pur,2) ;?></td>

                    <td><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php $total_sale = $row['product_rate']*$row['product_quantity'];  echo  number_format($total_sale,2) ;?></td>

                    <td> <?php  $margin = $total_sale - $total_pur; echo  number_format($margin,2) ?></td>
                  </tr>
                                  <?php $i++;
                                  $ts=$ts+$total_sale;
              										$tp=$tp+$total_pur;
                                  	$pr=$pr+$margin;

                      }
                } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th><?php echo $lang['Invoiceno'];?></th>
                                        <th>Product Name</th>

                                        <th>Quantity</th>
                                          <th>Date</th>
                                          <th>Purchase Price</th>
                                        <th>Sold Rate</th>
                                        <th><?php  echo @number_format($tp);?></th>
                                        <th><?php echo @number_format($ts) ;?></th>

                                        <th><?php echo @number_format($pr) ;?></th>



                  </tr>
                </tfoot>
              </table>
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
        <script type="text/javascript" src="../adaptinventory/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="../adaptinventory/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Neptune JS -->
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

        <script>
function Delete(x,y,p) {
 //alert(x);
  var txt;
  if (confirm("Are you sure you want to delete ")) {
   window.location.href = "invoices.php?i="+x+"&ac_type="+y+"&p="+p;
  } else {
    txt = "You pressed Cancel!"+x;
  }
  document.getElementById("demo").innerHTML = txt;
}

$(document).ready(function(){
		$('#date-range').datepicker({
		 format: "yyyy-mm-dd",
		toggleActive: true
		});
		});
</script>
  </body>

</html>
