<?php 
require_once ('../connection/connection.php');
if(!empty($_GET['lang'])){
	$lang=strip_tags($_GET['lang']);
	$sql = "UPDATE lang SET lang='$lang' where lang_id='1'";
	$conn->query($sql);
	header("location: index.php");
}

$sql = "SELECT * FROM lang where lang_id='1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();		
$_SESSION['lang'] = $row['lang'];   
include('languages/'.$_SESSION['lang'].'/lang.'.$_SESSION['lang'].'.php');

$op_st = date("Y-m-01", strtotime("-0 months"));
$op_en = date("Y-m-31", strtotime("-0 months"));


$sql = "SELECT * FROM setting where setting_id='1'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) 
	{
		$setting_id=$row['setting_id'];
		$setting_name=$row['setting_name'];
		$setting_logo=$row['setting_logo'];
		$setting_address=$row['setting_address'];
		$setting_city=$row['setting_city'];
		$setting_country=$row['setting_country'];
		$setting_phone=$row['setting_phone'];
		$setting_fax=$row['setting_fax'];
		$setting_web=$row['setting_web'];
		$setting_currency=$row['setting_currency'];
	}

