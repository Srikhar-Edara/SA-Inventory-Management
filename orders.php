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
            <h3 style="display:inline"><b>New Order &ensp;</b></h3>
            <button type="button" class="btn btn-success" id="Edit">Edit Order</button>
            <div class="form-row mt-4">
                <div class="col-sm-2 pb-2">
                    <label>PO Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="PO_NO">
                    </div>
                </div>
                <br>
                <div class="col-sm-3 pb-3">
                    <label>Buyer</label>
                    <select class="form-control" id="buyer"></select>
                </div>
                <div class="col-sm-2 pb-2">
                    <label>Buyer PO Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="Buyer_PO_NO">
                    </div>
                </div>
                <div class="col-sm-3 pb-3">
                    <label for="exampleSt">Destination</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="Destination">
                    </div>
                </div>
                <div class="col-sm-2 pb-2">
                    <label>Shipment Date</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="Shipment_Date">
                    </div>
                </div>
                <div class="col-sm-2 pb-2">
                    <label>Actual Ship Date</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="Actual_Ship_Date">
                    </div>
                </div>
                <div class="col-sm-3 pb-3">
                    <label for="exampleSt">Container Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="Container_Number">
                    </div>
                </div>
                <div class="col-sm-4 pb-4">
                    <label for="exampleSt">BL Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="BL_Number">
                    </div>
                </div>           
                <div class="col-sm-3 pb-3">
                    <label for="exampleSt">Inv Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="INV_Number">
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
                                <h2>Order Details</h2>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" style="table-layout: fixed; width:100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Detail ID</th>
                                <th>Freeze Type</th>
                                <th>Variety</th>
                                <th>Grade</th>
                                <th>Brand</th>
                                <th>Packing Style</th>
                                <th>Price</th>
                                <th>No. of Cases</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody id="BODY">     
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="Done">Create/Edit Order</button>
            <br><br><br><br>
        </div>
    </div>
</div>
</form>
</body>
<script>
function Database_Operations(Type,detail_ID,Order_ID,Freeze_Type,Variety,Grade,Brand,Packing_Style,Price,Number_of_cases) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config7.php?Type="+Type+"&detail_ID="+detail_ID+"&Order_ID="+Order_ID+"&Freeze_Type="+Freeze_Type+"&Variety="+Variety+"&Grade="+Grade+"&Brand="+Brand+"&Packing_Style="+Packing_Style+"&Price="+Price+"&Number_of_cases="+Number_of_cases);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("result").innerHTML= this.responseText;
        }
    };
    xhttp.send();
}
function Form_Operations(Order_Number,PO_Number,buyer,Buyer_PO_NO,Destination,Shipment_Date,Actual_Ship_Date,Container_Number,BL_Number,INV_Number){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "config9.php?Order_Number="+Order_Number+"&PO_Number="+PO_Number+"&buyer="+buyer+"&Buyer_PO_NO="+Buyer_PO_NO+"&Destination="+Destination+"&Shipment_Date="+Shipment_Date+"&Actual_Ship_Date="+Actual_Ship_Date+"&Container_Number="+Container_Number+"&BL_Number="+BL_Number+"&INV_Number="+INV_Number);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("Container").innerHTML= this.responseText;
            }
        };
    xhr.send();
}
var grades="Grades";
var variety="Variety";
var brand="brand";
var packaging="Packing_Style";
var freeze_type="freeze_type";
var buyer="buyer"
var data="";
var Order_Number="";
var row_num=1;
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip({
    trigger: 'hover'
  });   
    var xhttp__ = new XMLHttpRequest();
    xhttp__.open("GET", "config10.php");
    xhttp__.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            window.Order_Number= this.responseText;
        }
    };
    xhttp__.send();
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "config11.php?code_type="+window.brand);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.brand= this.responseText;
        }
    };
    xhr.send();
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
    var xhr4 = new XMLHttpRequest();
    xhr4.open("GET", "config11.php?code_type="+window.freeze_type);
    xhr4.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.freeze_type= this.responseText;
        }
    };
    xhr4.send();
    var xhr5 = new XMLHttpRequest();
    xhr5.open("GET", "config11.php?code_type="+window.grades);
    xhr5.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.grades= this.responseText;
        }
    };
    xhr5.send();
    var xhr6 = new XMLHttpRequest();
    xhr6.open("GET", "config11.php?code_type="+window.buyer);
    xhr6.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.buyer= this.responseText;
        }
    };
    xhr6.send();
    $(document).on("click", "#Done", function(){
        $("table tbody tr").each(function() {   
        var Detail_ID = this.childNodes[6].childNodes[0].value;
        if(Detail_ID!=undefined)
        {
            Database_Operations(1,this.childNodes[0].childNodes[0].value,window.Order_Number,this.childNodes[1].childNodes[0].value,this.childNodes[2].childNodes[0].value,this.childNodes[3].childNodes[0].value,this.childNodes[4].childNodes[0].value,this.childNodes[5].childNodes[0].value,this.childNodes[6].childNodes[0].value,this.childNodes[7].childNodes[0].value);
        }
        else
        {
           Database_Operations(1,this.childNodes[0].innerHTML,window.Order_Number,this.childNodes[1].childNodes[0].value,this.childNodes[2].childNodes[0].value,this.childNodes[3].childNodes[0].value,this.childNodes[4].childNodes[0].value,this.childNodes[5].childNodes[0].value,this.childNodes[6].innerHTML,this.childNodes[7].innerHTML); 
        }
        });
        if(window.confirm("Confirm the creation of this order?")==true)
        {
            var PO_Number=document.getElementById("PO_NO").value;
            var buyer=document.getElementById("buyer").value;
            var Buyer_PO_NO=document.getElementById("Buyer_PO_NO").value;
            var Destination=document.getElementById("Destination").value;
            var Shipment_Date=document.getElementById("Shipment_Date").value;
            var Actual_Ship_Date=document.getElementById("Actual_Ship_Date").value;
            var Container_Number=document.getElementById("Container_Number").value;
            var BL_Number=document.getElementById("BL_Number").value;
            var INV_Number=document.getElementById("INV_Number").value;
            Form_Operations(window.Order_Number,PO_Number,buyer,Buyer_PO_NO,Destination,Shipment_Date,Actual_Ship_Date,Container_Number,BL_Number,INV_Number);
            document.getElementById("CForm").submit();
        }     
    });
    $(".add-new").attr("disabled", "disabled");
    $("#PO_NO").change(function(){
        $(".add-new").removeAttr("disabled");
        PO_Number=document.getElementById("PO_NO").value; 
        var xhttp_ = new XMLHttpRequest();
        xhttp_.open("GET", "config12.php?PO_Number="+PO_Number);
        xhttp_.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                window.data= this.responseText;
            }
        };
        xhttp_.send()   
        Buyer=JSON.parse(window.buyer);
        for(var i=0;i<Buyer.length;i++)
        {
            var opt = Buyer[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            document.getElementById("buyer").appendChild(el);
        }
    });
    $(document).on("click", "#Edit", function(){
        var Master_Order_Data=JSON.parse(window.data);
        Editable_Order_ID=Master_Order_Data[0];
        window.Order_Number=Master_Order_Data[0];
        var xhttp_ = new XMLHttpRequest();
        document.getElementById("Buyer_PO_NO").value=Master_Order_Data[2];
        document.getElementById("buyer").value=Master_Order_Data[1];
        document.getElementById("Destination").value=Master_Order_Data[3];
        document.getElementById("Shipment_Date").value=Master_Order_Data[4];
        document.getElementById("Actual_Ship_Date").value=Master_Order_Data[5];
        document.getElementById("Container_Number").value=Master_Order_Data[6];
        document.getElementById("BL_Number").value=Master_Order_Data[6];
        document.getElementById("INV_Number").value=Master_Order_Data[6];
        xhttp_.open("GET", "config13.php?Order_ID="+Editable_Order_ID);
        xhttp_.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                OD_= this.responseText;
                select=document.createElement("select");
                Data=JSON.parse(window.freeze_type);
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
                select4=document.createElement("select");
                Data4=JSON.parse(window.brand);
                for(var i=0;i<Data4.length;i++)
                {
                var opt = Data4[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                select4.appendChild(el);
                }
                select4.className="form-control";
                select5=document.createElement("select");
                Data5=JSON.parse(window.packaging);
                for(var i=0;i<Data.length;i++)
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
                    select3.value=OD[i][3];
                    select.value=OD[i][1];
                    select2.value=OD[i][2];
                    select4.value=OD[i][4];
                    select5.value=OD[i][5]; 
                    select3.options[select3.options.selectedIndex].setAttribute("selected","selected");
                    select.options[select.options.selectedIndex].setAttribute("selected","selected");
                    select2.options[select2.options.selectedIndex].setAttribute("selected","selected");
                    select4.options[select4.options.selectedIndex].setAttribute("selected","selected");
                    select5.options[select5.options.selectedIndex].setAttribute("selected","selected");
                    var actions='<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
                    var row = '<tr id="row'+row_num+'">' +
                    '<td id="ID'+row_num+'" scope="col"><input type="text" class="form-control" name="ID" value="'+OD[i][0]+'" readonly></td>' +
                    '<td id="code_name_'+row_num+'" scope="col">'+select.outerHTML+'</td>' +
                    '<td id="code_description_'+row_num+'" scope="col">'+select2.outerHTML+'</td>' +
                    '<td id="start_date_'+row_num+'" scope="col">'+select3.outerHTML+'</td>' +
                    '<td id="start_date_'+row_num+'" scope="col">'+select4.outerHTML+'</td>' +
                    '<td id="end_date_'+row_num+'" scope="col">'+select5.outerHTML+'</td>' +
                    '<td id="end_date_'+row_num+'" scope="col"><input type="text" class="form-control" name="end_date" value="'+OD[i][6]+'"></td>' +
                    '<td id="end_date_'+row_num+'" scope="col"><input type="text" class="form-control" name="end_date" value="'+OD[i][7]+'"></td>' +
                    '<td scope="col">' + actions + '</td>' +
                    '</tr>';
                    $("table").prepend(row);
                    select3.options[select3.options.selectedIndex].removeAttribute('selected');
                    select.options[select.options.selectedIndex].removeAttribute('selected');
                    select2.options[select2.options.selectedIndex].removeAttribute('selected');
                    select4.options[select4.options.selectedIndex].removeAttribute('selected');
                    select5.options[select5.options.selectedIndex].removeAttribute('selected');
                }
                $("table tbody tr").find(".add, .edit").toggle();  
            }
        };
        xhttp_.send() 
    });
  var actions = '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+'<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+'<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    $(this).attr("disabled", "disabled");
    select=document.createElement("select");
    Data=JSON.parse(window.freeze_type);
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
    select4=document.createElement("select");
    Data4=JSON.parse(window.brand);
    for(var i=0;i<Data4.length;i++)
    {
    var opt = Data4[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select4.appendChild(el);
    }
    select4.className="form-control";
    select5=document.createElement("select");
    Data5=JSON.parse(window.packaging);
    for(var i=0;i<Data.length;i++)
    {
    var opt = Data5[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select5.appendChild(el);
    }
    select5.className="form-control";
    var index = $("table tbody tr:first-child").index();
        var row = '<tr id="row'+row_num+'">' +
            '<td id="ID'+row_num+'" scope="col"><input type="text" class="form-control" name="ID" readonly></td>' +
            '<td id="code_name_'+row_num+'" scope="col">'+select.outerHTML+'</td>' +
            '<td id="code_description_'+row_num+'" scope="col">'+select2.outerHTML+'</td>' +
            '<td id="start_date_'+row_num+'" scope="col">'+select3.outerHTML+'</td>' +
            '<td id="start_date_'+row_num+'" scope="col">'+select4.outerHTML+'</td>' +
            '<td id="end_date_'+row_num+'" scope="col">'+select5.outerHTML+'</td>' +
            '<td id="end_date_'+row_num+'" scope="col"><input type="text" class="form-control" name="end_date"></td>' +
            '<td id="end_date_'+row_num+'" scope="col"><input type="text" class="form-control" name="end_date"></td>' +
      '<td scope="col">' + actions + '</td>' +
        '</tr>';
      $("table").prepend(row);   
    $("table tbody tr").eq(index).find(".add, .edit").toggle();
        $('[rel="tooltip"]').tooltip();
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "config8.php");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("ID"+(row_num-1).toString()).innerHTML= this.responseText;
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
    Database_Operations(1,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,window.Order_Number,this.parentElement.parentElement.childNodes[1].childNodes[0].value,this.parentElement.parentElement.childNodes[2].childNodes[0].value,this.parentElement.parentElement.childNodes[3].childNodes[0].value,this.parentElement.parentElement.childNodes[4].childNodes[0].value,this.parentElement.parentElement.childNodes[5].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML);  
    this.parentElement.parentElement.childNodes[1].childNodes[0].disabled="true";
    this.parentElement.parentElement.childNodes[2].childNodes[0].disabled="true"; 
    this.parentElement.parentElement.childNodes[3].childNodes[0].disabled="true"; 
    this.parentElement.parentElement.childNodes[4].childNodes[0].disabled="true"; 
    this.parentElement.parentElement.childNodes[5].childNodes[0].disabled="true";  
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){      
      $(this).parents("tr").children().eq(6).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(6).text() + '">');
      $(this).parents("tr").children().eq(7).html('<input type="text" class="form-control" value="' + $(this).parents("tr").children().eq(7).text() + '">');
    this.parentElement.parentElement.childNodes[1].childNodes[0].removeAttribute("disabled");
    this.parentElement.parentElement.childNodes[2].childNodes[0].removeAttribute("disabled"); 
    this.parentElement.parentElement.childNodes[3].childNodes[0].removeAttribute("disabled"); 
    this.parentElement.parentElement.childNodes[4].childNodes[0].removeAttribute("disabled"); 
    this.parentElement.parentElement.childNodes[5].childNodes[0].removeAttribute("disabled"); 
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){
    if(this.parentElement.parentElement.childNodes[0].childNodes[0].value==undefined)
    {
        Database_Operations(2,$(this).parents("tr").find("td:not(:last-child)")[0].innerHTML,window.Order_Number,this.parentElement.parentElement.childNodes[1].childNodes[0].value,this.parentElement.parentElement.childNodes[2].childNodes[0].value,this.parentElement.parentElement.childNodes[3].childNodes[0].value,this.parentElement.parentElement.childNodes[4].childNodes[0].value,this.parentElement.parentElement.childNodes[5].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML);
    }
    else
    {
        Database_Operations(2,this.parentElement.parentElement.childNodes[0].childNodes[0].value,window.Order_Number,this.parentElement.parentElement.childNodes[1].childNodes[0].value,this.parentElement.parentElement.childNodes[2].childNodes[0].value,this.parentElement.parentElement.childNodes[3].childNodes[0].value,this.parentElement.parentElement.childNodes[4].childNodes[0].value,this.parentElement.parentElement.childNodes[5].childNodes[0].value,$(this).parents("tr").find("td:not(:last-child)")[6].innerHTML,$(this).parents("tr").find("td:not(:last-child)")[7].innerHTML);
    } 
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });
});
</script>
</html>