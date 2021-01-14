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
$Order_ID = $_GET["Order_ID"];
$sql=mysqli_query($con,"SELECT * FROM order_details WHERE Order_ID='".$Order_ID."'");
$OD=array();
while($row = mysqli_fetch_array($sql))
{   
    $detail_ID = $row["detail_ID"];
    $Freeze_Type = $row["Freeze_Type"];
    $Variety = $row["Variety"];     
    $Grade = $row["Grade"];
    $Brand = $row["Brand"];
    $Packing_Style = $row["Packing_Style"];
    $Price = $row["Price"];
    $Number_of_cases = $row["Number_of_cases"];
    $CTA=array();
    array_push($CTA,$detail_ID);
    array_push($CTA,$Freeze_Type);
    array_push($CTA,$Variety);
    array_push($CTA,$Grade);
    array_push($CTA,$Brand);
    array_push($CTA,$Packing_Style);
    array_push($CTA,$Price);
    array_push($CTA,$Number_of_cases);
    array_push($OD,$CTA);
    
};
print_r(json_encode($OD));
?>