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
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>
.Container{
    background-color: rgba(232, 240, 238, 1);
    width: 94%;
    position: relative;
    left:3%;
}
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
#Done{
    position: relative;
    left: 35.4%;
    margin-top: 40px;
    width: 300px;

}
</style>    
<body>
    <form id="CForm" class="Order__">
        <div class="Container">
        <div class="col-md-10 offset-md-1">
            <span class="anchor" id="formComplex"></span>
            <hr class="my-5">
            <h3 style="display:inline"><b>Inventory &ensp;</b></h3>
            <button type="button" class="btn btn-success" id="Edit">Edit Invoice</button> 
            <div class="form-row mt-4">
                <div class="col-sm-4 pb-4">
                    <label>Organization ID</label>
                    <select class="form-control" id="ORG_ID"></select>
                </div>
                <div class="col-sm-4 pb-4">
                    <label>Store ID</label>
                    <select class="form-control" id="STR_ID"></select>
                </div> 
                <div class="col-sm-4 pb-4">
                    <label>Production Date</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="Production_Date">
                    </div>
                </div>
            <br><br><br><br>
        </div>
        <div id="result"></div>
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Inventory Details</h2>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" style="table-layout: fixed; width:100%;">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">Inv ID</th>
                                <th width="10%">PO Number</th>
                                <th width="12%">Variety</th>
                                <th width="12%">Packing Style</th>
                                <th width="11%">Grade</th>
                                <th width="8%">Rack Number</th>
                                <th width="8%">Pallet Number</th>
                                <th width="8%">Number of Slabs</th>
                                <th width="6%">Final Pack</th>
                                <th width="7%">Cases</th>
                                <th width="8%">Lot Number</th>
                                <th width="5%">Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody id="BODY">     
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="Done">Add to Inventory/Edit Inventory</button>
            <br><br><br><br>
        </div>
    </div>
</div>
</form>
</body>
<script>
function Database_Operations(Type,Organization_ID,Store_ID,Production_Date,Inventory_ID,PO_Number,Variety,Packing_Style,Grade,Rack_Number,Pallet_Number,Slab_Weight,Final_Pack,Quantity,Lot_Number) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config16.php?Type="+Type+"&Organization_ID="+Organization_ID+"&Store_ID="+Store_ID+"&Production_Date="+Production_Date+"&Inventory_ID="+Inventory_ID+"&PO_Number="+PO_Number+"&Variety="+Variety+"&Packing_Style="+Packing_Style+"&Grade="+Grade+"&Rack_Number="+Rack_Number+"&Pallet_Number="+Pallet_Number+"&Slab_Weight="+Slab_Weight+"&Final_Pack="+Final_Pack+"&Quantity="+Quantity+"&Lot_Number="+Lot_Number);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("result").innerHTML= this.responseText;
        }
    };
    xhttp.send();
}
var grades="Grades";
var PO_Number="PO_Number";
var variety="Variety";
var packaging="Packing_Style";
var data="";
var row_num=1;
var Organization="Organizations";
var xhr6 = new XMLHttpRequest();
xhr6.open("GET", "config11.php?code_type="+Organization,false);
xhr6.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        Organization= this.responseText;
    }
};
xhr6.send();
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip({
    trigger: 'hover'
  });   
    var xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "config11.php?code_type="+window.variety);
    xhr2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.variety= this.responseText;
        }
    };
    xhr2.send();
    var xhr3 = new XMLHttpRequest();
    xhr3.open("GET", "config11.php?code_type="+window.packaging);
    xhr3.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.packaging= this.responseText;
        }
    };
    xhr3.send();
    var xhr5 = new XMLHttpRequest();
    xhr5.open("GET", "config11.php?code_type="+window.grades);
    xhr5.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.grades= this.responseText;
        }
    };
    xhr5.send();
    var xhr7 = new XMLHttpRequest();
    xhr7.open("GET", "config15.php?PO_Number="+window.PO_Number);
    xhr7.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.PO_Number= this.responseText;
        }
    };
    xhr7.send();
    Data6=JSON.parse(window.Organization);
    for(var i=0;i<Data6.length;i++)
    {
    var opt = Data6[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    document.getElementById("ORG_ID").appendChild(el);
    }
    $("#ORG_ID").ready(function(){
    Org_id=document.getElementById("ORG_ID").value;
    var xhr7 = new XMLHttpRequest();
    xhr7.open("GET", "config11.php?code_type="+Org_id);
    xhr7.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        var Stores= this.responseText;
        Data7=JSON.parse(Stores);
        for(var i=0;i<Data7.length;i++)
        {
        var opt = Data7[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        document.getElementById("STR_ID").appendChild(el);
        }
    }
    };
    xhr7.send();
    });
    $("#ORG_ID").change(function(){
    Org_id=document.getElementById("ORG_ID").value;
    var xhr7 = new XMLHttpRequest();
    xhr7.open("GET", "config11.php?code_type="+Org_id);
    xhr7.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        var Stores= this.responseText;
        Data7=JSON.parse(Stores);
        $('#STR_ID').empty();
        for(var i=0;i<Data7.length;i++)
        {
        var opt = Data7[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        document.getElementById("STR_ID").appendChild(el);
        }
    }
    };
    xhr7.send();
    });
    $(document).on("click", "#Done", function(){
        $("table tbody tr").each(function() {   
        var Inventory_ID = this.childNodes[5].childNodes[0].value;
        if(Inventory_ID!=undefined)
        {
            Database_Operations(1,document.getElementById("ORG_ID").value,document.getElementById("STR_ID").value,document.getElementById("Production_Date").value,this.childNodes[0].childNodes[0].value,this.childNodes[1].childNodes[0].value,this.childNodes[2].childNodes[0].value,this.childNodes[3].childNodes[0].value,this.childNodes[4].childNodes[0].value,this.childNodes[5].childNodes[0].value,this.childNodes[6].childNodes[0].value,this.childNodes[7].childNodes[0].value,this.childNodes[8].childNodes[0].value,this.childNodes[9].childNodes[0].value,this.childNodes[10].childNodes[0].value);
        }
        else
        {
           Database_Operations(1,document.getElementById("ORG_ID").value,document.getElementById("STR_ID").value,document.getElementById("Production_Date").value,this.childNodes[0].innerHTML,this.childNodes[1].childNodes[0].value,this.childNodes[2].childNodes[0].value,this.childNodes[3].childNodes[0].value,this.childNodes[4].childNodes[0].value,this.childNodes[5].innerHTML,this.childNodes[6].innerHTML,this.childNodes[7].innerHTML,this.childNodes[8].innerHTML,this.childNodes[9].innerHTML,this.childNodes[10].innerHTML); 
        }
        });
        if(window.confirm("Confirm the creation of this invoice?")==true)
        {
            document.getElementById("CForm").submit();
        }  
    });
    $(document).on("click", "#Edit", function(){
        Organz_ID=document.getElementById("ORG_ID").value;
        St_ID=document.getElementById("STR_ID").value;
        PRD_Date=document.getElementById("Production_Date").value;
        var xhttp_ = new XMLHttpRequest();
        xhttp_.open("GET", "config17.php?Organization_ID="+Organz_ID+"&Store_ID="+St_ID+"&Production_Date="+PRD_Date);
        xhttp_.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                OD_= this.responseText;
                select=document.createElement("select");
                Data=JSON.parse(window.PO_Number);
                for(var i=0;i<Data.length;i++)
                {
                var opt = Data[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                select.appendChild(el);
                }
                select.className="form-control";
                select2=document.createElement("select");
                Data2=JSON.parse(window.variety);
                for(var i=0;i<Data2.length;i++)
                {
                var opt = Data2[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                select2.appendChild(el);
                }
                select2.className="form-control";
                select3=document.createElement("select");
                Data3=JSON.parse(window.grades);
                for(var i=0;i<Data3.length;i++)
                {
                var opt = Data3[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                select3.appendChild(el);
                }
                select3.className="form-control";
                select3.id="three";
                select5=document.createElement("select");
                Data5=JSON.parse(window.packaging);
                for(var i=0;i<Data5.length;i++)
                {
                var opt = Data5[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                select5.appendChild(el);
                }
                select5.className="form-control";
                OD=JSON.parse(OD_);
                $("#BODY  tr").empty();
                for(i=0;i<OD.length;i++)
                {
                    select3.value=OD[i][4];
                    select.value=OD[i][1];
                    select2.value=OD[i][2];
                    select5.value=OD[i][3];
                    select3.options[select3.options.selectedIndex].setAttribute("selected","selected");
                    select.options[select.options.selectedIndex].setAttribute("selected","selected");
                    select2.options[select2.options.selectedIndex].setAttribute("selected","selected");
                    select5.options[select5.options.selectedIndex].setAttribute("selected","selected");
                    var actions='<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
                    var row = '<tr id="row'+row_num+'">' +
                    '<td id="INVE_ID'+row_num+'" scope="col"><input type="text" class="form-control" name="INVE_ID" value="'+OD[i][0]+'" readonly></td>' +
                    '<td id="PO_Number_'+row_num+'" scope="col">'+select.outerHTML+'</td>' +
                    '<td id="Variety_'+row_num+'" scope="col">'+select2.outerHTML+'</td>' +
                    '<td id="Packing_Style_'+row_num+'" scope="col">'+select5.outerHTML+'</td>' +
                    '<td id="Grade_'+row_num+'" scope="col">'+select3.outerHTML+'</td>' +
                    '<td id="Rack_Number'+row_num+'" scope="col"><input type="text" class="form-control" name="Rack" value="'+OD[i][5]+'"></td>' +
                    '<td id="Pallet_Number_'+row_num+'" scope="col"><input type="text" class="form-control" name="Pallet_Number_" value="'+OD[i][6]+'"></td>' +
                    '<td id="Slab_Weight_'+row_num+'" scope="col"><input type="text" class="form-control" name="Slab_Weight_" value="'+OD[i][7]+'"></td>' +
                    '<td id="Final_Pack_'+row_num+'" scope="col"><input type="text" class="form-control" name="Final_Pack_" value="'+OD[i][8]+'"></td>' +
                    '<td id="Quantity_'+row_num+'" scope="col"><input type="text" class="form-control" name="Quantity_" value="'+OD[i][9]+'"></td>' +
                    '<td id="Lot_Number_'+row_num+'" scope="col"><input type="text" class="form-control" name="Lot_Number_" value="'+OD[i][10]+'"></td>' +
                    '<td scope="col">' + actions + '</td>' +
                    '</tr>';
                    $("table").prepend(row);
                    select3.options[select3.options.selectedIndex].removeAttribute('selected');
                    select.options[select.options.selectedIndex].removeAttribute('selected');
                    select2.options[select2.options.selectedIndex].removeAttribute('selected');
                    select5.options[select5.options.selectedIndex].removeAttribute('selected');
                }
                $("table tbody tr").find(".add, .edit").toggle();  
            }
        };
        xhttp_.send(); 
    });
  var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    $(this).attr("disabled", "disabled");
    select2=document.createElement("select");
    Data2=JSON.parse(window.variety);
    for(var i=0;i<Data2.length;i++)
    {
    var opt = Data2[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select2.appendChild(el);
    }
    select2.className="form-control";
    select3=document.createElement("select");
    Data3=JSON.parse(window.grades);
    for(var i=0;i<Data3.length;i++)
    {
    var opt = Data3[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select3.appendChild(el);
    }
    select3.className="form-control";
    select5=document.createElement("select");
    Data5=JSON.parse(window.packaging);
    for(var i=0;i<Data5.length;i++)
    {
    var opt = Data5[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select5.appendChild(el);
    }
    select5.className="form-control";
    select8=document.createElement("select");
    Data8=JSON.parse(window.PO_Number);
    for(var i=0;i<Data8.length;i++)
    {
    var opt = Data8[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select8.appendChild(el);
    }
    select8.className="form-control";
    var index = $("table tbody tr:first-child").index();
        var row = '<tr id="row'+row_num+'">' +
            '<td id="INVE_ID'+row_num+'" scope="col"><input type="text" class="form-control" name="INVE_ID" readonly></td>' +
            '<td id="PO_Number_'+row_num+'" scope="col">'+select8.outerHTML+'</td>' +
            '<td id="Variety_'+row_num+'" scope="col">'+select2.outerHTML+'</td>' +
            '<td id="Packing_Style_'+row_num+'" scope="col">'+select5.outerHTML+'</td>' +
            '<td id="Grade_'+row_num+'" scope="col">'+select3.outerHTML+'</td>' +
            '<td id="Rack_Number'+row_num+'" scope="col"><input type="text" class="form-control" name="Rack"></td>' +
            '<td id="Pallet_Number_'+row_num+'" scope="col"><input type="text" class="form-control" name="Pallet_Number_"></td>' +
            '<td id="Slab_Weight_'+row_num+'" scope="col"><input type="text" class="form-control" name="Slab_Weight_"></td>' +
            '<td id="Final_Pack_'+row_num+'" scope="col"><input type="text" class="form-control" name="Final_Pack_"></td>' +
            '<td id="Quantity_'+row_num+'" scope="col"><input type="text" class="form-control" name="Quantity_"></td>' +
            '<td id="Lot_Number_'+row_num+'" scope="col"><input type="text" class="form-control" name="Lot_Number_"></td>' +
      '<td scope="col">' + actions + '</td>' +
        '</tr>';
      $("table").prepend(row);   
    $("table tbody tr").eq(index).find(".add, .edit").toggle();
        $('[rel="tooltip"]').tooltip();
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config14.php");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("INVE_ID"+(row_num-1).toString()).innerHTML= this.responseText;
        }
    };
    xhttp.send();
    window.row_num+=1;  
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
    Database_Operations(1,document.getElementById("ORG_ID").value,document.getElementById("STR_ID").value,document.getElementById("Production_Date").value,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,this.parentElement.parentElement.childNodes[1].childNodes[0].value,this.parentElement.parentElement.childNodes[2].childNodes[0].value,this.parentElement.parentElement.childNodes[3].childNodes[0].value,this.parentElement.parentElement.childNodes[4].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[5].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[8].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[9].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[10].innerHTML);  
    this.parentElement.parentElement.childNodes[1].childNodes[0].disabled="true";
    this.parentElement.parentElement.childNodes[2].childNodes[0].disabled="true"; 
    this.parentElement.parentElement.childNodes[3].childNodes[0].disabled="true"; 
    this.parentElement.parentElement.childNodes[4].childNodes[0].disabled="true"; 
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){
    $(this).parents("tr").children().eq(5).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(5).text() + '">');
    $(this).parents("tr").children().eq(6).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(6).text() + '">');
    $(this).parents("tr").children().eq(7).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(7).text() + '">');
    $(this).parents("tr").children().eq(8).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(8).text() + '">');
    $(this).parents("tr").children().eq(9).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(9).text() + '">');
    $(this).parents("tr").children().eq(10).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(10).text() + '">');
    this.parentElement.parentElement.childNodes[1].childNodes[0].removeAttribute("disabled");
    this.parentElement.parentElement.childNodes[2].childNodes[0].removeAttribute("disabled"); 
    this.parentElement.parentElement.childNodes[3].childNodes[0].removeAttribute("disabled"); 
    this.parentElement.parentElement.childNodes[4].childNodes[0].removeAttribute("disabled"); 
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){
    if(this.parentElement.parentElement.childNodes[0].childNodes[0].value==undefined)
    {
        Database_Operations(2,document.getElementById("ORG_ID").value,document.getElementById("STR_ID").value,document.getElementById("Production_Date").value,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,this.parentElement.parentElement.childNodes[1].childNodes[0].value,this.parentElement.parentElement.childNodes[2].childNodes[0].value,this.parentElement.parentElement.childNodes[3].childNodes[0].value,this.parentElement.parentElement.childNodes[4].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[5].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[8].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[9].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[10].innerHTML);
    }
    else
    {
        Database_Operations(2,document.getElementById("ORG_ID").value,document.getElementById("STR_ID").value,document.getElementById("Production_Date").value,this.parentElement.parentElement.childNodes[0].childNodes[0].value,this.parentElement.parentElement.childNodes[1].childNodes[0].value,this.parentElement.parentElement.childNodes[2].childNodes[0].value,this.parentElement.parentElement.childNodes[3].childNodes[0].value,this.parentElement.parentElement.childNodes[4].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[5].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[8].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[9].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[10].innerHTML);
    } 
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });
});
</script>
</html>