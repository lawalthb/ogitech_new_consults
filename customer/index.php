<?php
 //$link = $_SERVER["SCRIPT_NAME"];
//echo $cutlink= explode("/",$link);
//$cus_name =  trim($cutlink[3]);
ob_start();
if(isset($_GET['find'])){
    $cutlink = explode(" ",$_GET['find']);
echo $cus_name = trim($cutlink[0]);

require_once ('../connection/connection.php');
 $sql = "SELECT * FROM `customers` WHERE `cus_name` LIKE '%$cus_name%' ";
                                        $result = $conn->query($sql);
                                         $row = $result->fetch_assoc();
                                        echo  $cus_id =$row['cus_id'];
                                        if(!empty($cus_id)){
                                         ob_start();
 header("location:http://sofbefcyglobal.com/app/admin/customer_statement_pdf.php?cus_id=$cus_id");
//header("location:../admin/customer_statement_pdf.php?cus_id=$cus_id");
exit;  
                                        }else{
                                            echo  "found but not yet register";
                                        }

}else{
    echo "No Customer Found";
    die();
}

