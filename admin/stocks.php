<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['c']) && !empty($_GET['c'])){
    $c=strip_tags(trim($_GET['c']));
    $del = "DELETE FROM customers WHERE cus_id='$c'";
    if ($conn->query($del) === TRUE) {
        header("location: customers.php?d=del");        
    } else {
        header("location: customers.php?d=n");      
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
        <title>Stocks-Bin-card</title>

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

        <!-- Neptune CSS -->
        <link rel="stylesheet" href="css/core.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
    .alnright { text-align: right; }
    .alnleft { text-align: left; }
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
                        <h4>Stock And Balance</h4>
                        <ol class="breadcrumb no-bg mb-1">
                            <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['Dashboard'];?></a></li>                           
                            <li class="breadcrumb-item active">Bin card</li>
                            <li class="breadcrumb-item active"><a href="stocks.php?all=1">Show All at once</a></li>
                        </ol>
                        <div  class="table-responsive bg-white" style="margin-top: 10px">
                            <h5 class="mb-1">Export Stock</h5>
                            <?php if(!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id']=='1'  or ($_SESSION['user_type_id']=='2') or ($_SESSION['user_type_id']=='4')or ($_SESSION['user_type_id']=='3') )) { ?>  
                                <center><a href="stock_pdf.php" target="_blank">[Download Stock]</a>
                                 <a href="stock_0.php" target="_blank">[Show Zero Item]</a> 
                                </center> 
                                
                            <?php
                            }
                            if(isset($_GET['all'])and ($_GET['all']==1 )){
                                $table = "table-4";
                            }else{$table= "table-2" ;}
                            ?>
                            <table class="table table-striped table-bordered dataTable" id="<?=$table?>" >
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        
                                        <th>Categories</th>
                                        <th>Location</th>
                                        <th>Item Product</th>
                                         <th>Item Unit</th>
                                         <th>Item Rate</th>
                                        <th>Balance</th>
                                        <th>Amount</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and  prDetail.product_quantity >0   ORDER BY prDetail.productdetail_id ASC";
                                $result = $conn->query($sql);
                                $sn2=1;
                                if ($result->num_rows > 0) 
                                {
                                    
                                    $gtp=0;
                                    $pa=0;
                                    $neg=0;
                                    $pos=0;
                                    $r=0;
                                    $s=0;
                                    
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) 
                                    { ?>        
                                    <tr>
                                        <td><?=$sn2++?></td>
                                  
                                        <td><?php  $c_id = $row['c_id'];
                                         $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                                $result2 = $conn->query($sql2);
                                $row2 = $result2->fetch_assoc();
                                echo $row2['cat_name'];
                                        ?></td>
                                        
                                        <td ><?php echo $row['product_model'];?></td>
                                        
                                        <td><a href="p_statement.php?pro_id=<?=$row['product_id']?>" ><?php echo $row['product_name'];?></a></td>
                                        
                                           <td ><?php echo $row['product_sku'];?></td> 

                                            <td ><?php echo $row['product_sell_price'];?></td> 

                                        <td ><?php echo $row['product_quantity'];?></td>
                                        <td ><?php $pur_price = $row['product_sell_price'];
                                          $amt = $pur_price * $row['product_quantity'] ;
                                          $gtp= $gtp+$amt;
                                        echo  number_format($amt,2);
                                        ?></td>
                                        
                                        
                                    </tr>
                                  <?php
                                    
                                  
                                   }
                                } ?>
                                                                                                  
                                </tbody>
                                <tfoot>
                                    <tr>
                                         <th>SN</th>
                                        <th>Categories</th>
                                        <th>Location</th>
                                        <th>Item Name</th>
                                        <th>Item Unit</th>
                                        <th>Item Rate</th>
                                                                                
                                        

                               
                                <th >Total <span>&#x20A6;</span> <?=number_format($gtp,2)?> </th>
                                       
                                        <th>View</th>                                                                          
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <div class="modal fade" id="cusInfo" tabindex="-1" role="dialog" aria-labelledby="Customer Information" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleModalLabel"><?php echo $lang['CustomerInformation'];?></h4>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                         
                                        </div>
                                    </div>
                                </div>
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
        
        
    </body>

</html>
