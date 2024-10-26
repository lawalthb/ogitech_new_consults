<?php
require_once ('../connection/connection.php');


if(isset($_GET['micron'])){
    $micron =$_GET['micron'];
    ?>
<select  name="kg2"  class="form-control" data-plugin="select2" required="yes" 
                                        >
                                            <option ></option>
                                           <?php
                                        $productSql2 = "SELECT * FROM `plain_water_tb` WHERE `micron` LIKE '$micron' AND `status` = 0 ";
                                        $productData2 = $conn->query($productSql2);

                                        while($row2 = $productData2->fetch_array()) {                                           
                                            echo "<option value='".$row2['plain_water_id']."' >".$row2['kg']
                                            
                                            .
                                            
                                            "</option>";
                                            } // /while 
                                               
                                    ?>

                                            
                                        </select>
    <?php
 
}

?>
