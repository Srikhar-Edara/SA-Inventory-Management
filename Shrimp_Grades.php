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
    position:relative;
    float:right;
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
#CodeTypes{
    font-weight: bold;
    position: relative;
    right: 180%;
    background:green;
    color: #fff;
    outline: none;
    cursor: pointer;
    opacity: 0.8; 
    width: 200px;
    height: 40px;
    padding: 5px;
}

</style>
<script>
function Database_Operations(Type,ID,code_type,code_name,code_description,active_flag,start_date,end_date,conversion_factor1,conversion_factor2) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config4.php?Type="+Type+"&ID="+ID+"&code_type="+code_type+"&code_name="+code_name+"&code_description="+code_description+"&active_flag="+active_flag+"&start_date="+start_date+"&end_date="+end_date+"&conversion_factor1="+conversion_factor1+"&conversion_factor2="+conversion_factor2);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("result").innerHTML= this.responseText;
        }
    };
    xhttp.send();
}
var Code_Type="grades";
var row_num=1;
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip({
    trigger: 'hover'
  });
    var xhttp_ = new XMLHttpRequest();
    xhttp_.open("GET", "config6.php?code_type="+window.Code_Type);
    xhttp_.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            document.getElementById("BODY").innerHTML= this.responseText;
        }
    };
    xhttp_.send();
   $("select.CodeTypes").change(function(){
        window.Code_Type = $(this).children("option:selected").val();
        var xhttp_ = new XMLHttpRequest();
        xhttp_.open("GET", "config6.php?code_type="+window.Code_Type);
        xhttp_.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("BODY").innerHTML= this.responseText;
        }
    };
    xhttp_.send();
    $(".add-new").removeAttr("disabled");
    });
  var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:first-child").index();
        var row = '<tr id="row'+row_num+'">' +
            '<td id="ID'+row_num+'" scope="col"><input type="text" class="form-control" name="ID"></td>' +
            '<td id="code_name_'+row_num+'" scope="col"><input type="text" class="form-control" name="code_description"></td>' +
            '<td id="code_description_'+row_num+'" scope="col"><input type="text" class="form-control" name="code_description"></td>' +
            '<td id="active_flag_'+row_num+'" scope="col">1</td>' +
            '<td id="start_date_'+row_num+'" scope="col"><input type="date" class="form-control" name="start_date"></td>' +
            '<td id="end_date_'+row_num+'" scope="col"><input type="date" class="form-control" name="end_date"></td>' +
            '<td id="end_date_'+row_num+'" scope="col"><input type="text" class="form-control" name="end_date"></td>' +
            '<td id="end_date_'+row_num+'" scope="col"><input type="text" class="form-control" name="end_date"></td>' +
      '<td scope="col">' + actions + '</td>' +
        '</tr>';
      $("table").prepend(row);   
    $("table tbody tr").eq(index).find(".add, .edit").toggle();
        $('[rel="tooltip"]').tooltip();
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config5.php");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("ID"+(row_num-1).toString()).innerHTML= this.responseText;
        }
    };
    xhttp.send();
    window.row_num+=1;
    console.log(row_num);
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
    Database_Operations(1,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,window.Code_Type,$(this).parents("tr").find("td:not(:last-child)")[1].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[2].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[3].innerHTML,this.parentElement.parentElement.childNodes[4].childNodes[0].value,this.parentElement.parentElement.childNodes[5].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML);   
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){    
        $(this).parents("tr").find("td:not(:last-child,:first-child,:nth-child(5),:nth-child(6))").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });
    $(this).parents("tr").find("td:not(:nth-child(4),:nth-child(1),:nth-child(2),:nth-child(3),:nth-child(7),:nth-child(8),:last-child,:first-child)").each(function(){
      $(this).html('<input type="date" class="form-control" value="' + $(this).text() + '">');
    });      
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){  
    Database_Operations(2,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,window.Code_Type,$(this).parents("tr").find("td:not(:last-child)")[1].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[2].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[3].innerHTML,this.parentElement.parentElement.childNodes[4].childNodes[0].value,this.parentElement.parentElement.childNodes[5].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML); 
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
                        <div class="col-sm-8"><h2>Code Type:</h2></div>
                        <div class="col-sm-4">
                            <select id='CodeTypes' class="CodeTypes">
                                <option value="Grades">Grades</option>
                                <option value="Variety">Variety</option>
                                <option value="brand">Brand</option>
                                <option value="Packing_Style">Packaging</option>
                                <option value="freeze_type">Freeze Type</option>
                                <option value="buyer">Buyer</option>
                                <option value="Organizations">Organizations</option>
                                <option value="SAEPL_U1">SAEPL_U1</option>
                                <option value="SAEPL_U2">SAEPL_U2</option>
                            </select>
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" style="table-layout: fixed; width:100%;">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" width="9%">ID</th>
                            <th scope="col" width="15%">code_name</th>
                            <th scope="col" width="20%">code_description</th>
                            <th scope="col" width="6%">active</th>
                            <th scope="col" width="10%">start_date</th>
                            <th scope="col" width="10%">end_date</th>
                            <th scope="col" width="10%">Attribute 1</th>
                            <th scope="col" width="10%">Attribute 2</th>
                            <th scope="col" width="10%">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody id="BODY">     
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</body>
</html>