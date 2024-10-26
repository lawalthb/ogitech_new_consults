<?php //session_start();
//if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
ob_start();
require_once ('../connection/connection.php');
include("language.php");
if(isset($_GET['cus_id']) && !empty($_GET['cus_id'])){
    $cus_id=strip_tags(trim($_GET['cus_id']));
    
    $sqlc = "SELECT * FROM `customers` WHERE `cus_id` = $cus_id";
                                $resultc = $conn->query($sqlc);
                                $rowc = $resultc->fetch_assoc();
}
     else {
         
        header("location: cus-statement.php?d=n");      
    }
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
$html = "<html><head><title>".$rowc['cus_name']." Statement</title>
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
$html.="<center><b>Emokleen</b> <br> Global Resources <BR />
Plot 10, Ilu-Awela Road, Beside Eni Plaza <br /><u>Ota Ogun</u>
<br /><b>".$rowc['cus_name']."</b><br /> Ledger <br />
01- January - 2021 To ". Date('j - F - o')."
 </center>";
                                   

$html.="<table border=\"1\" style=\"width:100%\">
    
        <thead>
                                    <tr  style='align:center'>
                                        <th>SN</th>
                                        <th>Date</th>
                                        <th>Inv/Rcpt</th>
                                        <th>Qty, Item Name and Rate
</th>
                                        <th>Debit<br>
 <span>&#x20A6;</span></th>
                                        <th>Credit <br>
<span>&#x20A6;</span></th>
                                        <th>Balance<br>
 <span>&#x20A6;</span></th>
                                        
                                        
                                    </tr>
                                </thead>
 
    <tbody>";

     $sql79 = "SET @variable = 0";
                              $result79 = $conn->query($sql79);
                              $sql = "SELECT `ledger_entries`.*, `documents`.*, @variable := @variable + (`dr_amount` - `cr_amount`) `balance2` FROM `ledger_entries`, `documents` WHERE `account_id` = $cus_id and `documents`.`documnents_id`= `ledger_entries`.`documents_id` ORDER BY `documents`.`document_date` ASC ";
                              $result = $conn->query($sql);
                                $sn=1;
                                $gtp=0;
                                    $pa=0;
                                    $neg=0;
                                    $pos=0;
                                    $n=0;
                                if ($result->num_rows > 0) 
                                {
                                    // output data of each row
                                    
                                    

                                    while($row = $result->fetch_assoc()) 
                                            {
                                                   $html.="<tr>
                                    <td width='3%'>".$sn++."</td>
                                    <td width='10%'>";
                                    $documents_id = $row['documents_id'];
                                    if($documents_id !=0){
                                      $sql3 = "SELECT * FROM `documents` WHERE `documnents_id` =  $documents_id ";
                                $result3 = $conn->query($sql3);
                                $row3 = $result3->fetch_assoc();
                                $html.=$row3['document_date'];
                                        }else{
                                           
                                $html.=$row3['document_date'];
                                            }
                                    $html.="</td>
                                        <td width='3%'>";
                      
                                       
                                        $html.=$row3['document_no'];
                                        if($documents_id == ""){
                                       
                                        $html.= $row3['document_no'];   
                                        }
                                            $html.="</td>
                                        <td width='40%' style=\"word-wrap: break-word;\">";

                                        if(($row3['document_type']==11) or ($row3['document_type'] ==12) ){
                                        $sql7 = "SELECT * FROM `invoice_line_items` WHERE `invoice_no_id` = $documents_id  ORDER BY `order_items_id` ASC  ";
                                        $result7 = $conn->query($sql7);
                                        $li=1;
                                        while($row7 = $result7->fetch_assoc()){ 
                                         $prd =  $row7['product_id'];
                                         $sql8 = "SELECT * FROM `product` WHERE `product_id` = $prd  ";
                                        $result8 = $conn->query($sql8);
                                         $row8 = $result8->fetch_assoc();
                                           $html.= $prdname =  "<u>".$row7['product_quantity'].$row8['product_sku']."</u> of ".trim($row8['product_name']).", #"; 
                                            $html.= number_format($row7['product_rate'],2)." per ".$row8['product_sku'];
                                        $html.=  ".<br />";
                                        }} 
                                        elseif($row['cr_amount'] > 0){
                                          $sql5 = "SELECT * FROM `customers` WHERE `cus_id` =$row[against]";
                                          $result5 = $conn->query($sql5);
                                          $row5 = $result5->fetch_assoc();
                                                  
                                          $html.= $row5['cus_name'];
                      
                                        }elseif(($row3['document_type'] == 61)){
                                          $sql3 = "SELECT * FROM `customers` WHERE `cus_id` =  $row[against] ";
                                          $result3 = $conn->query($sql3);
                                          $row3 = $result3->fetch_assoc();
                                                  
                                          $html.= $row3['cus_name'];
                      
                                        }
                                        $n=$n+$row['dr_amount'] -$row['cr_amount'];
                                        $html.="</td>
                                        <td width='15%' align=\"center\" valign=\"middle\">".number_format($row['dr_amount'],2)."</td>
                                        <td width='15%'  align=\"center\" valign=\"top\">".number_format($row['cr_amount'],2)."</td>
                                            
                                        <td width='15%'align=\"center\" valign=\"middle\" >". number_format($n,2)."</td>
                                    </tr>";
 $gtp=$gtp+$row['dr_amount'];
                                        $pa=$pa+$row['cr_amount'];
                                   }
                                } 

                                $html.="</tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
 ".number_format($gtp,2)."</th>
                                        <th>
".number_format($pa,2)."</th>
                                        <th>
 ";
   $da= $gtp - $pa;
   
$html.=number_format($da,2);
 if($da <=0){
    $html.="Cr";
   }else{ $html.="Dr";}
   $html.="</th>
                                    </tr>
                                </tfoot>
                            </table>";


                                
                           $html.=" </table>";
                        $html.="</body></html>";
                       
$dompdf->load_html($html, 'UTF-8');
$dompdf->loadHTML($html);

//setup paper size
$dompdf->setPaper('a3', 'portrait');

//render the HTML as pdf
$dompdf->render();
//output the generated pdf
$dtd= date('j-m-y');
$filename2= $rowc['cus_name']."-".$dtd;
$dompdf->stream($filename2,array("Attachment" => 0));
exit;
