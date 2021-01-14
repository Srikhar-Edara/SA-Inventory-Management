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
$code_type=$_GET["code_type"];
$sql=mysqli_query($con,"SELECT code_type, code_name FROM lookup_codes WHERE code_type in('".$code_type."') ORDER BY code_type");
if (!$sql) {
  die("Error: " . mysqli_connect_error());
}
$CTA=array();
while($row = mysqli_fetch_array($sql))
{   
    $code_name = $row["code_name"];
    $code_type = $row["code_type"];
    array_push($CTA,$code_name);
};
print_r(json_encode($CTA));
?>