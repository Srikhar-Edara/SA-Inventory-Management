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
$sql=mysqli_query($con,"SELECT PO_Number FROM order_master");
if (!$sql) {
  die("Error: " . mysqli_connect_error());
}
$CTA=array();
while($row = mysqli_fetch_array($sql))
{   
    $PO_Number = $row["PO_Number"];
    array_push($CTA,$PO_Number);
};
print_r(json_encode($CTA));
?>