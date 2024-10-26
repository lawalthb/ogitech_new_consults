<?php

if(!isset($_POST['start'])){
    die('error page');
}else{
    require_once ('../connection/connection.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>P-Report <?=$_POST['start']?>  to  <?=$_POST['end']?></title>
        <style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  text-align: left;
}


.godown
{
  position:fixed;
  bottom:0;
  z-index:50000;
}

.table2 {
  
  text-align: center;
  width: 100%;
}


</style>

<style>
    *{ font-family: DejaVu Sans !important;}
  </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#godown").click(function(){
    
    $(this).hide();
    window.print();
  });
});
</script>
    </head>
    <body>
    <center><b>FLEX PLAST AND TECH.</b> <br> SERVICES NIG. LTD. <BR />
12, Alaba Taiwo Street, Kola Bus Stop <br /><u>Alagbado Lagos</u>
<br /><b>Production Report</b><br />
As on <?=$_POST['start']?>  to  <?=$_POST['end']?>
 </center> <br /><center>
        <table style="width:90%">
            <thead>
                <tr>
                <th>No</th>
										<th>Prodtn No.</th>
                                        <th>Date</th>
										<th>Product Input</th>
										<th>Other Input</th>

                    <th>Inks</th>
                                        <th>Core</th>
                                        <th>Product Output</th>
                                        
                                        <th>Other Output</th>
                                        
                                        <th>Machine</th>
                                        <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
								 $sql = "SELECT docs.*, prd.* FROM production_tb as prd, documents as docs where docs.documnents_id=prd.documnents_id  and docs.document_date BETWEEN '$_POST[start]' AND '$_POST[end]' ORDER BY `prd`.`product_id` DESC";
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) 
								{
									// output data of each row
                                    $i=1;
                                    $cal_input1= 0;
                                    $cal_output1 = 0;
                                    $cal_input2= 0;
                                    $cal_output2 = 0;
									while($row = $result->fetch_assoc()) 
									{ ?>		
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['document_no'];
										
										?></td>
                                        <td><?php echo $row['document_date'];?></td>
                                        <td><?php $prd =  $row['product_input_name'];
                                          $sql6 = "SELECT * FROM `product` WHERE `product_id` = $prd ";
                                         $result6 = $conn->query($sql6);
                                         $row6 = $result6->fetch_assoc();
                                         echo $row6['product_name'];
                                        ?><br /><?php echo $row['product_input'];  $cal_input1= $cal_input1 + $row['product_input'] ;   ?> Kg   
                                         </td>
                                        <td>IPA: <?php echo $or_id= $row['ipa']; $cal_input2= $cal_input2 + $row['ipa'] ; ?>Kg<br />
                                        Toluene: <?php echo $or_id= $row['toluene']; $cal_input2= $cal_input2 + $row['toluene'] ;?>Kg<br />
                                        Butanol: <?php echo $or_id= $row['butanol']; $cal_input2= $cal_input2 + $row['butanol'] ;?>Kg<br />
                                        
                                        </td>

                                        </td>
                                        <td>Reflex: <?php echo $or_id= $row['reflex']; ?>Kg<br />
                                        Royal: <?php echo $or_id= $row['royal']; ?>Kg<br />
                                        Sky: <?php echo $or_id= $row['sky']; ?>Kg<br />
                                        
                                        </td>

                                        </td>
                                        <td>Core Input: <?php echo $or_id= $row['core_input']; ?>Kg<br />
                                        Core Output: <?php echo $or_id= $row['core_output']; ?>Kg<br />
                                       
                                        
                                        </td>

										<td>
										<?php $prd =  $row['product_output_name'];
                                          $sql6 = "SELECT * FROM `product` WHERE `product_id` = $prd ";
                                         $result6 = $conn->query($sql6);
                                         $row6 = $result6->fetch_assoc();
                                         echo $row6['product_name'];
                                        ?><br /><?php echo $row['product_output']; $cal_output1= $cal_output1 + $row['product_output'] ;?> Kg
										 </td>
                                        <td>
                                        Wastage: <?php echo $or_id= $row['wastage']; $cal_output2= $cal_output2 + $row['wastage'] ;?>Kg<br />
                                        Damage: <?php echo $or_id= $row['damage']; $cal_output2= $cal_output2 + $row['damage'] ;?>Kg<br />
                                        
                                        </td>

                                        <td>
                                        <?php echo $or_id= $row['machine'];?><br />
                                        <?php echo $or_id= $row['operator'];?><br />
                                        <?php echo $or_id= $row['duty'];?><br />
                                        
                                        </td>

                                        <td>
                                        <?php echo $or_id= $row['document_comments'];?>
                                        
                                        </td>
                                        
                                    </tr>
                                    
                                  <?php $i++;
								      }
								} ?>	
                </tr>
                <tfoot>
                                        <tr>
                                        <th>No</th>
										<th>Prodtn No.</th>
                                        <th>Date</th>
										<th>Total  Input: <?=number_format(($cal_input1),2)?> </th>
										<th>Other Input <?=number_format(($cal_input2),2)?></th>
                    

                                        <th>Total  Output <?=number_format(($cal_output1),2)?></th>
                                        <th>Other Output <?=number_format(($cal_output2),2)?></th>
                                        <th>Details</th>
                                        <th>Other Output</th>
                                        <th>Machine</th>
                                        <th>Remarks</th>
                                        </tr>



                                        
                                    </tfoot>
            </tbody>
        </table>
        <br />
        <br />
        </center>
        <center>
        <table class="table2">
            <tr>
                <td><br />_______________________<br /> Supervisor's Signature</td>
                <td><br />_______________________<br /> Manager's Signature</td>
                <td><br />_______________________<br /> Genaral Manager's Signature</td>
            </tr>
        </table>
        </center>
        <div class="godown" id="godown" >
        <a  href="productionlist.php">Back</a> | <a  href="#" >Print</a>
        </div>
    </body>
</html>