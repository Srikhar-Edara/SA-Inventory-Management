<?php  include "inventory_management.php"; ?>
<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="https://unpkg.com/tabulator-tables@4.7.2/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.7.2/dist/js/tabulator.min.js"></script>
<style>
body {  
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 1100px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;  
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    overflow: hidden;
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
#Done{
    position: relative;
    left: 41.4%;
    margin-top: 40px;
    width: 300px;

}
</style>
<script>
function Database_Operations(Type,ID,Line1,Line2,Line3,City,State,Zipcode,Country,County_Name) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config.php?Type="+Type+"&ID="+ID+"&Line1="+Line1+"&Line2="+Line2+"&Line3="+Line3+"&City="+City+"&State="+State+"&Zipcode="+Zipcode+"&Country="+Country+"&County_Name="+County_Name);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("result").innerHTML= this.responseText;
        }
    };
    xhttp.send();
}
var row_num=1;
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip({
    trigger: 'hover'
  });
  var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:last-child").index();
        var row = '<tr id="row'+row_num+'">' +
            '<td id="ID'+row_num+'"><input type="text" class="form-control" name="ID"></td>' +
            '<td id="Line1_'+row_num+'"></><input type="text" class="form-control" name="Line1" id="OKAY"></td>' +
            '<td id="Line2_'+row_num+'"><input type="text" class="form-control" name="Line2"></td>' +
            '<td id="Line3_'+row_num+'"><input type="text" class="form-control" name="Line3"></td>' +
            '<td id="City_'+row_num+'"><input type="text" class="form-control" name="City"></td>' +
            '<td id="State_'+row_num+'"><input type="text" class="form-control" name="State"></td>' +
            '<td id="Zip_'+row_num+'"><input type="text" class="form-control" name="Zip"></td>' +
            '<td id="Country_'+row_num+'"><input type="text" class="form-control" name="Country"></td>' +
            '<td id="County-Name_'+row_num+'"><input type="text" class="form-control" name="County-Name"></td>' +
      '<td>' + actions + '</td>' +
        '</tr>';
      $("table").append(row);   
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[rel="tooltip"]').tooltip();
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config2.php");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("ID"+(row_num-1).toString()).innerHTML= this.responseText;
        }
    };
    xhttp.send();
    window.row_num+=1;
    console.log(row_num);
    });
   $(document).on("click", "#Done", function(){    
       var xhttp_ = new XMLHttpRequest();
       xhttp_.open("GET", "config3.php");
       xhttp_.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           document.getElementById("BODY").innerHTML= this.responseText;
        }
    };
    xhttp_.send();
    });
  // Add row on add button click
  $(document).on("click", ".add", function(){
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
      if(!$(this).val()){
        $(this).addClass("error");
        empty = true;
      } else{
                $(this).removeClass("error");
            }
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty){
      input.each(function(){
        $(this).parent("td").html($(this).val());
      });     
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    };
    console.log($(this).parents("tr").find("td:not(:last-child)"));
    Database_Operations(1,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[1].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[2].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[3].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[4].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[5].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[8].innerHTML);   
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){    
        $(this).parents("tr").find("td:not(:last-child,:first-child)").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });   
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){  
    ID=$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML;
    console.log(ID);
    Database_Operations(2,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[1].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[2].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[3].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[4].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[5].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[8].innerHTML); 
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });
});
</script>   
</head>
<body>
    <div id="result"></div>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Addresses</h2></div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-light table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Line-1</th>
                            <th>Line-2</th>
                            <th>Line-3</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zipcode</th>
                            <th>Country</th>
                            <th>County-Name</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody id="BODY">     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success" id="Done">View Records</button>    
</body>
</html>