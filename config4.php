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
$ID = $_GET["ID"];
$code_type = $_GET["code_type"];
$code_name = $_GET["code_name"];
$active_flag = $_GET["active_flag"];      
$code_description = $_GET["code_description"];
$start_date = $_GET["start_date"];
$end_date = $_GET["end_date"];
$conversion_factor1 = $_GET["conversion_factor1"];
$conversion_factor2 = $_GET["conversion_factor2"];
if($TYPE==1){

	if(!mysqli_num_rows(mysqli_query($con,"SELECT ID FROM lookup_codes WHERE ID = '".$ID."'"))){
		$sql = "INSERT INTO lookup_codes (ID, code_type, code_name, code_description,active_flag, start_date, end_date,conversion_factor1,conversion_factor2) VALUES ('".$ID."','".$code_type."','".$code_name."','".$code_description."', '".$active_flag."','".$start_date."', '".$end_date."', '".$conversion_factor1."', '".$conversion_factor2."')";
		if (mysqli_query($con, $sql)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	else{
		$sql = "UPDATE lookup_codes"." SET code_type = '".$code_type."',code_name = '".$code_name."',code_description = '".$code_description."',active_flag = '".$code_description."',start_date = '".$start_date."',end_date = '".$end_date."',conversion_factor1 = '".$conversion_factor1."',conversion_factor2 = '".$conversion_factor2."'"." WHERE ID = '".$ID."'";
		if (mysqli_query($con, $sql)) {
    		echo "Record Updated successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	
}
if($TYPE==2){

	$sql="DELETE FROM lookup_codes where ID='".$ID."'";
	if (mysqli_query($con, $sql)) {
    	echo "record deleted successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}


?>