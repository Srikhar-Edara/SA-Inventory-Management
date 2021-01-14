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
$sql=mysqli_query($con,"SELECT * FROM addresses");
while($row = mysqli_fetch_array($sql))
{
    $actions='<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'.'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'.'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
    $ID = $row["ID"];
    $Line1 = $row["Line1"];
    $Line2 = $row["Line2"];      
    $Line3 = $row["Line3"];
    $City = $row["City"];
    $State = $row["State"];
    $ZipCode = $row["Zipcode"];
    $Country = $row["Country"];
    $County_Name =$row["County_Name"];
    print_r('<tr>'.
            '<td>'.$ID.'</td>'.
            '<td>'.$Line1.'</td>'.
            '<td>'.$Line2.'</td>'.
            '<td>'.$Line3.'</td>'.
            '<td>'.$City.'</td>'.
            '<td>'.$State.'</td>'.
            '<td>'.$ZipCode.'</td>'.
            '<td>'.$Country.'</td>'.
            '<td>'.$County_Name.'</td>'.
            '<td>'.$actions.'</td>'.
        '</tr>');
};
?>
