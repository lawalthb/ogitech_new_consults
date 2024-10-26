<?php
require_once ('../connection/connection.php');
if(isset($_GET['q'])){
$inv = $_GET['q'];

$sql = "SELECT * FROM `documents` WHERE `document_no` LIKE '$inv' ";
}elseif(isset($_GET['e'])){
	$inv = $_GET['e'];

$sql = "SELECT * FROM `documents` WHERE `document_no` LIKE '$inv' ";
	}elseif(isset($_GET['g'])){
        $inv = $_GET['g'];

$sql = "SELECT * FROM `documents` WHERE `lpo_grn` LIKE '$inv' ";
        }
								
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<em style='color:red'>Invoice No. already entered</em>";
    }
} else {
    echo "New entry";
}
$conn->close();
?>
