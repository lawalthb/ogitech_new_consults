
<?php //session_start();
//if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');

include("language.php");
/*if(isset($_GET['cus_id']) && !empty($_GET['cus_id'])){
    $cus_id=strip_tags(trim($_GET['cus_id']));
    
    $sqlc = "SELECT * FROM `customers` WHERE `cus_id` = $cus_id";
                                $resultc = $conn->query($sqlc);
                                $rowc = $resultc->fetch_assoc();
}
     else {$gtp
        header("location: cus-statement.php?d=n");      
    }*/

    
?>

<?php
//include autoloader
require_once "dompdf/autoload.inc.php";

//refrence the dompdf namespace
use Dompdf\Dompdf;

//instantiate dompdf class
$dompdf = new Dompdf();

//Load HTML content
//$dompdf->loadHTML("<h1>Welcome Lawal Topheeb</h1>");

$html="";
$dtd= date('j-m-y');
//$filename2= $row['cus_name']."-".$dtd;
$html.= "<html><head><title>".$dtd."- Stock Balance</title>
<link rel=\"stylesheet\" href=\"../adaptinventory/bootstrap4/css/bootstrap.min.css\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
<style type=\"text/css\">
table {
  width: 100%;
}

th {
  height: 50px;
}
td {
  height: 50px;
  vertical-align: middle;
}

</style>
<style>
    *{ font-family: DejaVu Sans !important;}
  </style>
</head><body>";

$lawal = date('y-d-i');
$html.="<center><b>FLEX PLAST AND TECH.</b> <br> SERVICES NIG. LTD. <BR />
12, Alaba Taiwo Street, Kola Bus Stop <br /><u>Alagbado Lagos</u>
<br /><b>Stock Balance</b><br />
As at ". Date('j - F - o')."
 </center>";
                                   

$html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
					<th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='4' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
							 <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0,2) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table><br />";

                                   

$html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='1' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";

              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='6' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";

              //yogurth roll
              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='14' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";

              //pkb
              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='5' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";
              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and (prDetail.c_id ='2' or prDetail.c_id ='3')  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";

              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='12' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";
              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='10' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";
              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='11'   and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";
              $html.="<center><table border=\"1\" style=\"width:80%\">
    
                                
                <thead>
                  <tr>
                    <th>SN</th>
                    
                    <th>Item Categorie</th>
                                       
                    <th>Item Product</th>
                    <th>Item Unit</th>
                    <th>Balance</th>
          <th>Rate</th>
                                        <th>Amount</th>
                    <th>Since</th> 

                     <th>Product Owner</th> 
                                        
                    
                  </tr>
                </thead>
                <tbody>";

                $sql = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prDetail.c_id ='16' and prDetail.c_id !='11'  and prDetail.product_quantity >0  ORDER BY prDetail.c_id ASC";
                $result = $conn->query($sql);
                $sn2=$sn2;
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
                  {    
                  $html.="<tr>
                    <td>".$sn2++."</td>
                                  
                    "; $c_id = $row['c_id'];
                     $sql2 = "SELECT * FROM `categories` WHERE `cat_id` = $c_id ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                 $row2['cat_name'];
                    
                    $html.="
                    <td>".$row2['cat_name']."</td>
                    <td>". $row['product_name']."</td> 
                     <td>". $row['product_sku']."</td>  
                                        
                    <td >".$row['product_quantity']."</td><td>".$row['product_sell_price']."</td> 
                                        <td >"; $pur_price = $row['product_sell_price'];
                      $amt = $pur_price * $row['product_quantity'] ;
                      $gtp= $gtp+$amt;
                    $html.=  number_format($amt,2);
                    $html.="</td> 
                    <td>
                    

                    "; 


                   
                    $p_id = $row['product_id'];
                     $sql3 = "SELECT * FROM `stock_tb` WHERE `p_id` = '$p_id' ORDER BY `stock_tb`.`stock_id` DESC";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();
                 $row3['date'];

                    $ydate =  $row3['date'];
                    $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
 $diff=date_diff($date1,$date2);

                           $html.=$diff->format("%R%a days");



                    $html.="</td> 

<td>".$row['product_model']."</td>



                  </tr>";
                                  
                    
                  
                   }
                } 
                                $html.="<tr>
                    <td>SN</td>
                                        
                                        <td>Item Name</td>
                                        <th>Item Unit</th>
                             <td></td>
               <td></td>           

                <td >Balance</td>
                                <td>Total <span>&#x20A6;</span>".number_format(0,2) ."</td>
                                       
                                                                                           
                  </tr>                                 
                </tbody>
                
              </table> <br />";
                        $html.="</body></html>";
                        echo $html;
   // $dompdf->load_html($html, 'UTF-8');
 //$dompdf->loadHTML($html);

//setup paper size
 //$dompdf->setPaper('a3', 'portrait');

//render the HTML as pdf
// $dompdf->render();
// //output the generated pdf
 //$dtd= date('j-m-y');
// $filename2= $row['cus_name']."-".$dtd;
// $dompdf->stream($dtd."Stock",array("Attachment" => 1));
exit;
