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

$db = new mysqli('localhost', 'Srikhar', 'Dazaiorihara1$', 'test');
$sql = "SHOW TABLE STATUS LIKE 'addresses'";
$result=$db->query($sql);
$row = $result->fetch_assoc();

echo $row['Auto_increment'];

