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
$ID = $_GET["detail_ID"];
$freeze_type = $_GET["Freeze_Type"];
$Variety = $_GET["Variety"];
$Grade = $_GET["Grade"];      
$Brand = $_GET["Brand"];
$Packing_Style = $_GET["Packing_Style"];
$Price = $_GET["Price"];
$Number_of_cases = $_GET["Number_of_cases"];
$Order_ID = $_GET["Order_ID"];
if($TYPE==1){

	if(!mysqli_num_rows(mysqli_query($con,"SELECT detail_ID FROM order_details WHERE detail_ID = '".$ID."'"))){
		$sql = "INSERT INTO order_details (detail_ID, Order_ID, Freeze_Type, Variety, Grade, Brand, Packing_Style, Price, Number_of_cases) VALUES ('".$ID."','".$Order_ID."','".$freeze_type."','".$Variety."','".$Grade."', '".$Brand."','".$Packing_Style."', '".$Price."', '".$Number_of_cases."')";
		if (mysqli_query($con, $sql)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	else{
		$sql = "UPDATE order_details"." SET Freeze_Type = '".$freeze_type."',Variety = '".$Variety."',Grade = '".$Grade."',Brand = '".$Brand."',Packing_Style = '".$Packing_Style."',Price = '".$Price."',Number_of_cases = '".$Number_of_cases."'"." WHERE detail_ID = '".$ID."'";
		if (mysqli_query($con, $sql)) {
    		echo "Record Updated successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	
}
if($TYPE==2){

	$sql="DELETE FROM order_details where detail_ID='".$ID."'";
	if (mysqli_query($con, $sql)) {
    	echo "record deleted successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}


?>