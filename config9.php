<?php

$host = "localhost"; /* Host name */
$user = "Srikhar"; /* User */
$password = "Dazaiorihara1$"; /* Password */
$dbname = "test"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$Order_Number = $_GET["Order_Number"];
$PO_Number = $_GET["PO_Number"];
$buyer = $_GET["buyer"];
$Buyer_PO_NO = $_GET["Buyer_PO_NO"];
$Destination = $_GET["Destination"];      
$Shipment_Date = $_GET["Shipment_Date"];
$Actual_Ship_Date = $_GET["Actual_Ship_Date"];
$Container_Number = $_GET["Container_Number"];
$BL_Number = $_GET["BL_Number"];
$INV_Number = $_GET["INV_Number"];
if(!mysqli_num_rows(mysqli_query($con,"SELECT Order_ID FROM order_master WHERE PO_Number = '".$PO_Number."'"))){
	$sql = "INSERT INTO order_master (Order_ID, PO_Number, buyer, Buyer_PO_Number, Destination, Shipment_Date, Actual_Ship_Date, Container_Number, BL_Number, INV_Number) VALUES ('".$Order_Number."','".$PO_Number."','".$buyer."','".$Buyer_PO_NO."','".$Destination."', '".$Shipment_Date."','".$Actual_Ship_Date."', '".$Container_Number."', '".$BL_Number."', '".$INV_Number."')";
	if (mysqli_query($con, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}
else{
	$sql = "UPDATE order_master"." SET buyer = '".$buyer."',Buyer_PO_Number = '".$Buyer_PO_NO."',Destination = '".$Destination."',Shipment_Date = '".$Shipment_Date."',Actual_Ship_Date = '".$Actual_Ship_Date."',Container_Number = '".$Container_Number."',BL_Number = '".$BL_Number."',INV_Number = '".$INV_Number."'"." WHERE PO_Number = '".$PO_Number."'";
	if (mysqli_query($con, $sql)) {
		echo "Record Updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}
	


?>