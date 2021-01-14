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
$code_type = $_GET["code_type"];
$sql=mysqli_query($con,"SELECT * FROM lookup_codes WHERE code_type='".$code_type."' ORDER BY ID DESC");
while($row = mysqli_fetch_array($sql))
{
    $actions='<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'.'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'.'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
    $ID = $row["ID"];
    $code_name = $row["code_name"];
    $active_flag = $row["active_flag"];
    $code_description = $row["code_description"];      
    $start_date = $row["start_date"];
    $end_date = $row["end_date"];
    $conversion_factor1 = $row["conversion_factor1"];
    $conversion_factor2 = $row["conversion_factor2"];
    print_r('<tr>'.
            '<td scope="col">'.$ID.'</td>'.
            '<td scope="col">'.$code_name.'</td>'.
            '<td scope="col">'.$code_description.'</td>'.
            '<td scope="col">'.$active_flag.'</td>'.
            '<td scope="col">'.$start_date.'</td>'.
            '<td scope="col">'.$end_date.'</td>'.
            '<td scope="col">'.$conversion_factor1.'</td>'.
            '<td scope="col">'.$conversion_factor2.'</td>'.
            '<td scope="col">'.$actions.'</td>'.
        '</tr>');
};
?>
