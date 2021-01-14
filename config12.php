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
$PO_Number=$_GET["PO_Number"];
$sql=mysqli_query($con,"SELECT * FROM order_master WHERE PO_Number='".$PO_Number."'");
if (!$sql) {
  die("Error: " . mysqli_connect_error());
}
$CTA=array();
while($row = mysqli_fetch_array($sql))
{   
    $Order_ID = $row["Order_ID"];
    $buyer = $row["buyer"];
    $Buyer_PO_Number = $row["Buyer_PO_Number"];
    $Destination = $row["Destination"];
    $Shipment_Date = $row["Shipment_Date"];
    $Actual_Ship_Date = $row["Actual_Ship_Date"];
    $Container_Number = $row["Container_Number"];
    $BL_Number = $row["BL_Number"];
    $INV_Number = $row["INV_Number"];
    array_push($CTA,$Order_ID);
    array_push($CTA,$buyer);
    array_push($CTA,$Buyer_PO_Number);
    array_push($CTA,$Destination);
    array_push($CTA,$Shipment_Date);
    array_push($CTA,$Actual_Ship_Date);
    array_push($CTA,$Container_Number);
    array_push($CTA,$BL_Number);
    array_push($CTA,$INV_Number);
};
print_r(json_encode($CTA));
?>