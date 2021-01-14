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
$Line1 = $_GET["Line1"];
$Line2 = $_GET["Line2"];      
$Line3 = $_GET["Line3"];
$City = $_GET["City"];
$State = $_GET["State"];
$ZipCode = $_GET["Zipcode"];
$Country = $_GET["Country"];
$County_Name =$_GET["County_Name"];
if($TYPE==1){

	if(!mysqli_num_rows(mysqli_query($con,"SELECT ID FROM addresses WHERE ID = '".$ID."'"))){
		$sql = "INSERT INTO addresses (ID, Line1, Line2, Line3, City, State, Zipcode, Country, County_Name) VALUES ('".$ID."','".$Line1."','".$Line2."','".$Line3."', '".$City."', '".$State."', '".$ZipCode."', '".$Country."', '".$County_Name."')";
		if (mysqli_query($con, $sql)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	else{
		$sql = "UPDATE addresses"." SET Line1 = '".$Line1."',Line2 = '".$Line2."',Line3 = '".$Line3."',City = '".$City."',State = '".$State."',Zipcode = '".$ZipCode."',Country = '".$Country."',County_Name = '".$County_Name."'"." WHERE ID = '".$ID."'";
		if (mysqli_query($con, $sql)) {
    		echo "Record Updated successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	
}
if($TYPE==2){

	$sql="DELETE FROM addresses where ID='".$ID."'";
	if (mysqli_query($con, $sql)) {
    	echo "record deleted successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}


?>