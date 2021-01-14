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
$TYPE = $_GET["Type"];
$Inventory_ID = $_GET["Inventory_ID"];
$Organization_ID = $_GET["Organization_ID"];
$Store_ID=$_GET["Store_ID"];
$Production_Date = $_GET["Production_Date"];
$PO_Number = $_GET["PO_Number"];
$Variety = $_GET["Variety"];
$Grade = $_GET["Grade"];      
$Packing_Style = $_GET["Packing_Style"];
$Rack_Number = $_GET["Rack_Number"];
$Pallet_Number = $_GET["Pallet_Number"];
$Slab_Weight = $_GET["Slab_Weight"];
$Final_Pack = $_GET["Final_Pack"];
$Quantity = $_GET["Quantity"];
$Lot_Number = $_GET["Lot_Number"];
if($TYPE==1){

	if(!mysqli_num_rows(mysqli_query($con,"SELECT Inventory_ID FROM inventory WHERE Inventory_ID = '".$Inventory_ID."'"))){
		$sql = "INSERT INTO inventory (Inventory_ID, Organization_ID, Store_ID, Production_Date, PO_Number, Variety, Packing_Style, Grade, Rack_Number, Pallet_Number, Slab_Weight, Final_Pack, Quantity, Lot_Number) VALUES ('".$Inventory_ID."','".$Organization_ID."','".$Store_ID."','".$Production_Date."','".$PO_Number."', '".$Variety."','".$Packing_Style."', '".$Grade."', '".$Rack_Number."', '".$Pallet_Number."', '".$Slab_Weight."', '".$Final_Pack."', '".$Quantity."', '".$Lot_Number."')";
		if (mysqli_query($con, $sql)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	else{
		$sql = "UPDATE inventory"." SET Organization_ID = '".$Organization_ID."',Store_ID = '".$Store_ID."',Production_Date = '".$Production_Date."',PO_Number = '".$PO_Number."',Variety = '".$Variety."',Packing_Style = '".$Packing_Style."',Grade = '".$Grade."',Rack_Number = '".$Rack_Number."',Pallet_Number = '".$Pallet_Number."',Slab_Weight = '".$Slab_Weight."',Final_Pack = '".$Final_Pack."',Quantity = '".$Quantity."',Lot_Number = '".$Lot_Number."'"." WHERE Inventory_ID = '".$Inventory_ID."'";
		if (mysqli_query($con, $sql)) {
    		echo "Record Updated successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	
}
if($TYPE==2){

	$sql="DELETE FROM inventory where Inventory_ID='".$Inventory_ID."'";
	if (mysqli_query($con, $sql)) {
    	echo "record deleted successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}


?>