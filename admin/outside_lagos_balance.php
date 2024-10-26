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
     else {
        header("location: cus-statement.php?d=n");      
    }*/

    
?>

<?php
//include autoloader
//require_once "dompdf/autoload.inc.php";

//refrence the dompdf namespace
//use Dompdf\Dompdf;

//instantiate dompdf class
//$dompdf = new Dompdf();

//Load HTML content
//$dompdf->loadHTML("<h1>Welcome Lawal Topheeb</h1>");

$html="";
$dtd= date('j-m-y');
//$filename2= $row['cus_name']."-".$dtd;
$html.= "<html><head><title>".$dtd."-Outside Lagos balance</title>
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
<br /><b>Outside Lagos customers</b><br /> Balancing Account<br />
As at ". Date('j - F - o')."
 </center>";
                                   

$html.="<center><table border=\"1\" style=\"width:80%\">
    
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>".$lang['Customers']."</th>
                                        <th>Amount Sold <span>&#x20A6;</span></th>
                                        <th>Amount Paid <span>&#x20A6;</span></th>
                                        <th>Balance <span>&#x20A6;</span><br>
Dr.     <span style=\"color:red\">Cr.</span>
                                        <th>Marketer</th>
                                        <th>Since</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                               "; 
                                $sql = "SELECT * FROM `customers` WHERE `ac_type` NOT LIKE 'income' and cus_marketer_id =4 ORDER BY `cus_name` ASC ";
                                $result = $conn->query($sql);
                                $sn=1;
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
                                    $html.="      
                                    <tr>
                                    <td>";
                                     $html.=$sn++;
                                      $html.="</td>
                                        <td>".$row['cus_name']."</td>
                                        <td>";
                                        
                                        
                                        @$totalin_sql = "SELECT sum(grand_total_price) as totalin FROM `invoice_payment_detail` WHERE `customer_id` = $row[cus_id] ";  
            @$totalin_result=$conn->query($totalin_sql);
            @$totalin_row = $totalin_result->fetch_assoc();
            @$totalin=$totalin_row['totalin'];
             $html.=number_format($totalin,2);
            @$totalout_sql = "SELECT sum(paid_amount) as totalout FROM `invoice_payment_detail` WHERE `customer_id` = $row[cus_id]";  
            @$totalout_result=$conn->query($totalout_sql);
            @$totalout_row = $totalout_result->fetch_assoc();
            @$totalout =$totalout_row['totalout'];
                                        
                                        $html.="</td>
                                        <td>".number_format($totalout,2);
                                        
                                        
                                        
            
              $new_balance =number_format(($totalout - $totalin ),2);
              if($new_balance < 0){ $align = "left"; $s=$totalout - $totalin; 
              $style = "color:black"; //$neg=$new_balance;
               }elseif ($new_balance > 0) {
                   $style = "color:red";
                    $align = "right"; $r=$totalout - $totalin; 
               }
             
              
                                        $html.="</td>
                                        
                                        <td  style=\"$style\" align=\"$align\">".$new_balance."</td>
                                        <td>";
                                        $sql3 = "SELECT * FROM `marketer_tb` WHERE `marketer_id` =  $row[cus_marketer_id] ";
                                $result3 = $conn->query($sql3);
                                $row3 = $result3->fetch_assoc();
                                                
                                              $html.=$row3['marketer_name']."
                                        </td>
                                        <td>
                                        ";
                                        $sql4 = "SELECT * FROM `invoice_payment_detail` WHERE `customer_id` = $row[cus_id] ORDER BY `payment_detail_date` DESC ";   
                                        $result4 = $conn->query($sql4);
                                        $row4 = $result4->fetch_assoc();
                                        $ydate = $row4['payment_detail_date'];
                                        $date1=date_create($ydate);
$ndate = date('Y-m-d');
$date2=date_create($ndate);
$diff=date_diff($date1,$date2);

                                       $html.=$diff->format('%R%a days'); 
                                       
                                      
                                        $html.="
                                    </tr>";
                                
                                    $gtp=$gtp+$totalin;
                                        $pa=$pa+$totalout;
                                        
                                        
              if($new_balance < 0){$neg=$s+$neg ;}
              if($new_balance > 0){   $pos=$r+$pos ;} 
             
                                    //   $r= $r+$pos;
                                  
                                   }
                                }                                                              
                               $html.="
                                    <tr>
                                        <td>SN</td>
                                        <td>Total</td>
                                        <td><span>&#x20A6;</span>".number_format($gtp,2)."</td>
                                        <td><span>&#x20A6;</span>".number_format($pa,2)."</td>";
                                        
                                        $bf=  $pa - $gtp;
                
             
                                        
                                        

                               $html.="<td><span>&#x20A6;</span>";
                                        
                                         $html.=number_format($bf,2);
                
               $html.="<br>";
                 $html.=number_format($pos,2)." With Us <br />";
 $html.="<b> ";
                    $html.=number_format($neg,2)."<br /> Customers Owning</b>  </td>          
                                        <td>Marketer</td>
                                        <td>Since</td> 
                                                                                                              
                                    </tr>
                                
                            ";


                                
                           $html.=" </table><br />The of the show";
                        $html.="</body></html>";
                        echo $html;
//    $dompdf->load_html($html, 'UTF-8');
// $dompdf->loadHTML($html);

// //setup paper size
// $dompdf->setPaper('a3', 'portrait');

// //render the HTML as pdf
// $dompdf->render();
// //output the generated pdf
// $dtd= date('j-m-y');
// $filename2= $row['cus_name']."-".$dtd;
// $dompdf->stream($filename2,array("Attachment" => 0));
