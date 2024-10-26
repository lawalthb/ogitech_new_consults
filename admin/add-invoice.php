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
        <title><?php echo $lang['AddInvoice'];?></title>

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
        <link rel="icon" href="img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>" type="image/gif" sizes="16x16">
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
                $("#grandTotal").val(totalamount);
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
                        <h4><?php echo $lang['AddInvoice'];?> -
                   <?php
                    if($_GET['ac_type']==1 and $_GET['inv_type']==1 ){
                            echo 'Sales - Normal';
                    }elseif($_GET['ac_type']==1 and $_GET['inv_type']==2 ){

                        echo 'Sales - Return';
                    }elseif($_GET['ac_type']==2 and $_GET['inv_type']==1 ){

                          echo 'Purchase - Normal';
                    }
                    elseif($_GET['ac_type']==2 and $_GET['inv_type']==2 ){

                        echo 'Purchase - Return';
                    }else{
die('<script>alert("Invalid link")</script>');

                    }
                    ?>
                    </h4>
                        <ol class="breadcrumb no-bg mb-1">
                            <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>
                            <li class="breadcrumb-item active"><?php echo $lang['AddInvoice'];?></li>
                        </ol>
                        <div class="box box-block bg-white">

                <form class="form-vertical" id="addinvoice" name="addinvoice" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="panel-body">
                        <div class="row">
                        <div id="error"></div>

                             <div class="col-sm-8" >

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">Invoice No. <i class="text-danger">*</i></label>
                                    <?php
                                    if($_GET['ac_type']==1 and $_GET['inv_type']==1 ){
                 $last_no = "SELECT * FROM `documents` where document_type=11 ORDER BY `documnents_id` DESC  ";
                $result_last_no = $conn->query($last_no);
                $row_last_no = $result_last_no->fetch_assoc();
                $lastvno = $row_last_no['document_no']+1;
                }
                 ?>



                                    <div class="col-sm-6">
                                       <input type="text" size="100" autocomplete="off"  onkeyup="chk_inv(this.value)"   name="paper_inv_no" value="<?php if(isset($lastvno)){echo $lastvno;}; ?>" class="form-control" placeholder='Enter Invoice Number' id="paper_inv_no" required  />


                                    </div>
                                    <div  class=" col-sm-3" id="chk_result">
                                        <img src="img/loader1.gif" /> &nbsp; Waiting ...
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-8" >

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">
                                   <?php
                                    if($_GET['ac_type']==1 ){
                           ?>
                           L.P.O No:
                   <?php
                    } else{
                        ?>
                    GRN No.:
              <?php  }
                    ?>



                                    <i class="text-danger"></i></label>

                                    <div class="col-sm-6">
                                       <input type="text" size="100" autocomplete="off"     name="lpo_no" class="form-control" placeholder='Optional' id="lpo_no"   />

                                       <input type="hidden" size="100" autocomplete="off"     name="ac_type" value="<?=$_GET['ac_type']?>" class="form-control" placeholder='Optional' id="lpo_no"   />

                                       <input type="hidden" size="100" autocomplete="off"     name="inv_type" value="<?=$_GET['inv_type']?>" class="form-control" placeholder='Optional' id="lpo_no"   />


                                    </div>
                                    <div  class=" col-sm-3" id="chk_result">

                                    </div>
                                </div>
                            </div>





                            <div class="col-sm-8" id="customer_section_1">
                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">
                                    <?php
                                    if($_GET['ac_type']==1 ){
                           ?>
                           Customer :
                   <?php
                    } else{
                        ?>
                    Supplier .:
              <?php  }
                    ?>
                                    <i class="text-danger" >*</i><span class="fa fa-info" data-toggle="tooltip" data-placement="top" title="Make sure you select from options, typed name is not useful" ></span> </label>
                                    <div class="col-sm-6">
                                    <input type="text" size="100" autocomplete="off" autofocus name="customer_name" class="customerSelection form-control" placeholder='' id="customer_name" required  /><a href="add-account3.php">[New]</a>

                                        <input id="customer_id" class="hidden_value" type="hidden" name="customer_id">
                                    </div>
                                    <div  class=" col-sm-3">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8" id="customer_section_2">
                               <div class="form-group row">
                                    <label for="customer_name_others" class="col-sm-3 col-form-label">

                                    <?php
                                    if($_GET['ac_type']==1 ){
                           ?>
                           Customer :
                   <?php
                    } else{
                        ?>
                    Supplier :
              <?php  }
                    ?>

                                    <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                       <input  autocomplete="off" type="text"  size="100" name="new_customer" placeholder='Customer Name' id="new_customer" class="form-control" required />
                                    </div>
                                    <div  class="col-sm-3">
                                        <input  onClick="active_customer('customer_section_2')" type="button" id="oldcustomer_2" class="checkbox_account btn btn-success" name="new_customer_name" value="Old Account">
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



                                <div class="form-group row">
                                    <label for="customer_name_others_address" class="col-sm-3 col-form-label">Marketer </label>
                                    <div class="col-sm-6">
                                       <?php
                                                                $w = "SELECT * FROM marketer_tb";
                                                                $resultw = $conn->query($w); ?>

                                                                                <select id="warehouse_id" name="marketer_id"  class="form-control" data-plugin="select2">
                                                <option value="">Select Marketer that bring this customer</option>
                                                                                        <?php while($roww = $resultw->fetch_assoc()) { ?>
                                                                                        <option value="<?php echo $roww['marketer_id'];?>"><?php echo $roww['marketer_name'];?></option>
                                                                                <?php } ?>
                                                                                </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="datepicker_invoice_date" class="col-sm-2 col-form-label"><?php echo $lang['Date'];?> <i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" autocomplete="off" required  id="datepicker_invoice_date" value="<?=date('Y-m-d')?>" name="datepicker_invoice_date" placeholder="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>        <input id="auth_id"  type="hidden" name="auth_id" value="<?php echo $_SESSION['auth_id'];?>">

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo $lang['ItemInformation'];?> <i class="text-danger">*</i><a href="add-product.php"> [New]</a></th>

                                        <th class="text-center"><?php echo $lang['AvailableQty'];?></th>
                                        <th class="text-center"><?php echo $lang['Quantity'];?></th>
                                        <th class="text-center"><?php echo $lang['Rate'];?> <i class="text-danger">*</i></th>
                                        <th class="text-center">Comment </th>
                                        <th class="text-center"><?php echo $lang['Total'];?>
                                        </th>
                                        <th class="text-center"><?php echo $lang['Action'];?></th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                    <tr>
                                        <td style="width: 220px">
                                            <input name="product_name[]" onkeypress="invoice_productList(1);" class="form-control productSelection" placeholder="<?php echo $lang['Products'];?>" required id="product_name" autocomplete="off" tabindex="1" type="text">
                                           <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="product_id"/>
                                        </td>

                                        <td>
                                            <input name="available_quantity[]" class="form-control available_quantity_1" value="" readonly type="text">
                                        </td>
                                        <td>
                                            <input name="product_quantity[]" autocomplete="off" class="total_qty_1 form-control" id="total_qty_1" onkeyup="quantity_calculate(1);" required onchange="quantity_calculate(1);" placeholder="0.00" tabindex="3" type="text">
                                        </td>
                                        <td style="width: 85px">
                                            <input name="product_rate[]" onkeyup="quantity_calculate(1)" onchange="quantity_calculate(1);" value="" id="item_price_1" class="item_price_1 price_item form-control" tabindex="7"   type="text">
                                            <input name="pur_rate[]" onkeyup="quantity_calculate(1)" onchange="quantity_calculate(1);" value="" id="pur_price_1" class="pur_price_1 pur_item form-control" tabindex="15"   type="hidden">
                                        </td>
                                        <!-- Discount -->
                                        <td>
                                            <input name="discount[]" id="discount_1" class="form-control" value="" autocomplete="off" min="0" tabindex="4"   onkeyup="quantity_calculate(1);"  onchange="quantity_calculate(1);" placeholder="0.00" type="hidden">

                                             <input name="commet[]" id="discount4" class="form-control" value="" autocomplete="off" min="0" tabindex="4"  placeholder="if any comment" type="text">


                                            <input type="hidden" id="total_discount_1" class="total_tax_1" />
                                            <input type="hidden" id="all_discount_1" class="total_discount"/>
                                        </td>

                                        <td style="width: 100px">
                                            <input class="total_price form-control" name="total_price[]" id="total_price_1" value="" tabindex="-1" readonly type="text">
                                        </td>

                                        <td>
                                            <button style="text-align: right;" class="btn btn-danger" type="button" onclick="deleteRow(this)" value="Delete" tabindex="5"><?php echo $lang['Delete'];?></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr >
                                        <td colspan="4" align="right" ><input style="text-align:right" type="text" name="in_words" id="amount-rupees" placeholder="Amount in words" readonly id="word" value="" size="80"></td>
                                        <td class="text-right">

                                        </td>

                                    </tr>




                                            <input id="total_discount_ammount" class="form-control" name="total_discount" tabindex="-1" value="0.00" readonly type="hidden">

                                    <tr>
                                        <td colspan="6" style="text-align:right;"><b><?php echo $lang['GrandTotal'];?>:</b></td>
                                        <td class="text-right">
                                            <input id="grandTotal" class="form-control" name="grand_total_price" value="0.00" tabindex="-1" readonly type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2">
                                            <input id="add-invoice-item" class="btn btn-info" name="add-invoice-item" onClick="addInputField('addinvoiceItem');" value="<?php echo $lang['AddNewItem'];?>" tabindex="6" type="button">
                                        </td>
                                        <td style="text-align:right;" colspan="4"><b>VAT on Sales (7.5%):</b></td>
                                        <td class="text-right">
                                            <input id="paidAmount" autocomplete="off" class="form-control" name="paid_amount" onkeyup="invoice_paidamount();" value="" placeholder="0.00" tabindex="7" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2">
                                            <input id="add-invoice" class="btn btn-success" name="add-invoice"  value="<?php echo $lang['Submit'];?>" tabindex="9" type="submit">
                                            <input id="reset" class="btn btn-warning"  type="reset" name=""  value="Reset" tabindex="8" type="button">
                                        </td>
                                        <td style="text-align:right;" colspan="4"><b>VAT Exclusive Amount:</b></td>
                                        <td class="text-right">
                                            <input id="dueAmmount" class="form-control"  name="due_amount" value="0.00" readonly type="text">
                                        </td>
                                    </tr>
                                    <tr >
                                        <td colspan="6"><textarea  style="width:100%" name="doc_comment" placeholder="Enter Note here"></textarea>


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
        <script type="text/javascript" src="../adaptinventory/jscrollpane/jquery.jscrollpane.min.js">
        </script>
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

        <?php
        if($_GET['ac_type']==1 ){
                           ?>
                           <script src="js/invoice.js"></script>
                   <?php
                    } elseif($_GET['ac_type']==2 ){
                        ?>
                    <script src="js/invoice_other.js"></script>
              <?php  }
                    ?>

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
<?php  if($_GET['ac_type']==1 )
{ include ('product_invoice.js.php');}
elseif($_GET['ac_type']==2 )
{include ('product_invoice2.js.php');}; ?>
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
                        url  : 'modal/add_invoiceModel.php',
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
                                 // $("#addinvoice").trigger('reset');

                                  var x = "<?php echo $_GET['ac_type']?>";

                                  if(x==1){

                                    setTimeout('$("#addinvoice").fadeOut(500, function(){ window.location = "invoices.php?ac_type=1" }); ',1000);
                                  }else if(x==2){

                                      setTimeout('$("#addinvoice").fadeOut(500, function(){ window.location = "invoices.php?ac_type=2" }); ',1000);
                                    }

                              }

                        }
                    });
                    return false;
                }
            });
</script>
<script>
function chk_inv(str){

  if (str.length == 0) {
    document.getElementById("chk_result").innerHTML= "You can't leave it blank";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("chk_result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "chk_inv.php?q=" + str, true);
    xmlhttp.send();
  }
}

</script>
    </body>

</html>
