// Admin Management Page ADD Modal Box Section
function openModal(){
  document.getElementById('add_modal').style.display = "block";
}
function closeModal(){
  document.getElementById('add_modal').style.display = "none";
}
function noModal(){
  document.getElementById('add_modal').style.display = "none";
}

// Page FILTER Section
// function filter(){
//   var input = document.getElementById("filter_input");
//   var filter = input.value.toUpperCase();
//   var table = document.getElementById("table_client");
//   var tr = document.getElementsByTagName("tr");
//
//   for(i = 0; i < tr.length; i++){
//     var td = tr[i].getElementsByTagName("td")[0];
//     if(td){
//       if(td.toUpperCase().indexOf(filter) > -1){
//         tr[i].style.display = "";
//       }
//       else{
//         tr[i].style.display = "none";
//       }
//     }
//   }
// }
function advFilter_on(){
  document.getElementById('adv_setting').style.display = "block";
  document.getElementById('adv_setting_on').style.display = "none";
  document.getElementById('adv_setting_off').style.display = "block";
}
function advFilter_off(){
  document.getElementById('adv_setting').style.display = "none";
  document.getElementById('adv_setting_on').style.display = "block";
  document.getElementById('adv_setting_off').style.display = "none";
}

// Client Quotation ADD Modal Box Section
function openAdd_c(){
  document.getElementById('q_add_cust').style.display = "block";
  document.getElementById('q_add_product').style.display = "none";
}
function closeAdd_c(){
  document.getElementById('q_add_cust').style.display = "none";
  document.getElementById('q_add_product').style.display = "none";
}
function openAdd_p(){
  document.getElementById('q_add_cust').style.display = "none";
  document.getElementById('q_add_product').style.display = "block";
}
function closeAdd_p(){
  document.getElementById('q_add_cust').style.display = "none";
  document.getElementById('q_add_product').style.display = "none";
}

// Client Invoice Table ALL / DRAFT / PAID / OVERDUE / PARTIAL
function table_all(){
  document.getElementById("all_table").style.display = "block";
  document.getElementById("draft_table").style.display = "none";
  document.getElementById("paid_table").style.display = "none";
  document.getElementById("overdue_table").style.display = "none";
  document.getElementById("partial_table").style.display = "none";
}
function table_draft(){
  document.getElementById("all_table").style.display = "none";
  document.getElementById("draft_table").style.display = "table";
  document.getElementById("paid_table").style.display = "none";
  document.getElementById("overdue_table").style.display = "none";
  document.getElementById("partial_table").style.display = "none";
}
function table_paid(){
  document.getElementById("all_table").style.display = "none";
  document.getElementById("draft_table").style.display = "none";
  document.getElementById("paid_table").style.display = "block";
  document.getElementById("overdue_table").style.display = "none";
  document.getElementById("partial_table").style.display = "none";
}
function table_overdue(){
  document.getElementById("all_table").style.display = "none";
  document.getElementById("draft_table").style.display = "none";
  document.getElementById("paid_table").style.display = "none";
  document.getElementById("overdue_table").style.display = "block";
  document.getElementById("partial_table").style.display = "none";
}
function table_partial(){
  document.getElementById("all_table").style.display = "none";
  document.getElementById("draft_table").style.display = "none";
  document.getElementById("paid_table").style.display = "none";
  document.getElementById("overdue_table").style.display = "none";
  document.getElementById("partial_table").style.display = "block";
}

// Client Quotation Create Table Add Row and total amount
// function addRow(){
//   // var rowNo = docucment.getElementById('rowNo').value;
//   var pname = document.getElementById('pname').value;
//   var desc = document.getElementById('desc').value;
//   var quantity = document.getElementById('quantity').value;
//   var price = document.getElementById('price').value;
//   var tax = document.getElementById('tax').value;
//   var amount = document.getElementById('total_amount').value;
//   var rNo = document.getElementById('rNo');
//   var productN = document.getElementById('productN');
//   var productD = document.getElementById('productD');
//   var productQ = document.getElementById('productQ');
//   var productP = document.getElementById('productP');
//   var productT = document.getElementById('productT');
//   var productA = document.getElementById('productA');
//   var table = document.getElementsByTagName('table')[0];
//   if (pname != "" && desc != "" && quantity != "" && price != "" && tax != ""){
//     var newRow = table.insertRow(2);
//     var rNo = newRow.insertRow  (0);
//     var productN = newRow.insertCell(1);
//     var productD = newRow.insertCell(2);
//     var productQ = newRow.insertCell(3);
//     var productP = newRow.insertCell(4);
//     var productT = newRow.insertCell(5);
//     var productA = newRow.insertCell(6);
//     var productDel = newRow.insertCell(7);
//     rNo.innerHTML = rowNo++;
//     productN.innerHTML = pname;
//     productD.innerHTML = desc;
//     productQ.innerHTML = quantity;
//     productP.innerHTML = price;
//     productT.innerHTML = tax;
//     productA.innerHTML = amount;
//     productDel.innerHTML = "<i class='fas fa-times btn-icon' onclick='deleteRow(x)' style='color:red;padding:auto;cursor:pointer;'></i>";
//   }
//   else{
//     alert("Column are empty.");
//   }
// }

function addRow(){
  // var rowNo = 0;
  var pname = document.getElementById('pname').value;
  var desc = document.getElementById('desc').value;
  var quantity = document.getElementById('quantity').value;
  var price = document.getElementById('price').value;
  var tax = document.getElementById('tax').value;
  var amount = document.getElementById('total_amount').value;
  if (pname != "" && desc != "" && quantity != "" && price != "" && tax != ""){
  // var rNo = document.getElementById('rNo');
  // create an input  field into table
  var td1 = document.createElement("td");
  var td2 = document.createElement("td");
  var td3 = document.createElement("td");
  var td4 = document.createElement("td");
  var td5 = document.createElement("td");
  var td6 = document.createElement("td");
  var td7 = document.createElement("td");
  // var td8 = document.createElement("td");
  var InputPN = document.createElement("Input");
  InputPN.setAttribute("type","text");
  InputPN.setAttribute("value", pname);
  InputPN.setAttribute("name", "pName");
  InputPN.className = "qTableCol";
  InputPN.setAttribute("readonly", true);
  var InputPD = document.createElement("Input");
  InputPD.setAttribute("type","text");
  InputPD.setAttribute("value", desc);
  InputPD.setAttribute("name", "pDesc");
  InputPD.className = "qTableCol";
  InputPD.setAttribute("readonly", true);
  var InputPQ = document.createElement("Input");
  InputPQ.setAttribute("type","text");
  InputPQ.setAttribute("value", quantity);
  InputPQ.setAttribute("name", "pQuantity");
  InputPQ.className = "qTableCol";
  InputPQ.setAttribute("readonly", true);
  var InputPP = document.createElement("Input");
  InputPP.setAttribute("type","text");
  InputPP.setAttribute("value", price);
  InputPP.setAttribute("name", "pPrice");
  InputPP.className = "qTableCol";
  InputPP.setAttribute("readonly", true);
  var InputPT = document.createElement("Input");
  InputPT.setAttribute("type","text");
  InputPT.setAttribute("value", tax);
  InputPT.setAttribute("name", "pTax");
  InputPT.className = "qTableCol";
  InputPT.setAttribute("readonly", true);
  var InputPA = document.createElement("Input");
  InputPA.setAttribute("type","text");
  InputPA.setAttribute("value", amount);
  InputPA.setAttribute("name", "pAmount");
  InputPA.className = "qTableCol";
  InputPA.setAttribute("readonly", true);
  var table = document.getElementsByTagName('table')[0];
  // var td = document.getElementsByTagName('td')[0];
      // insert tr
      var newRow = table.insertRow(2);
      // insert td
      var td1 = newRow.appendChild(td1);
      var td2 = newRow.appendChild(td2);
      var td3 = newRow.appendChild(td3);
      var td4 = newRow.appendChild(td4);
      var td5 = newRow.appendChild(td5);
      var td6 = newRow.appendChild(td6);
      var td7 = newRow.appendChild(td7);
      // var td8 = newRow.appendChild(td8);
      // number add 1
      // rowNo += 1;
      // insert input
      // td1.appendChild(rowNo);
      td1.appendChild(InputPN);
      td2.appendChild(InputPD);
      td3.appendChild(InputPQ);
      td4.appendChild(InputPP);
      td5.appendChild(InputPT);
      td6.appendChild(InputPA);
      td7.innerHTML = "<i class='fas fa-times btn-icon' onclick='deleteRow(x)' style='color:red;padding:auto;cursor:pointer;'></i>";
    }
    else{
      alert("Column are empty.");
    }
}
// function deleteRow(x){
//   document.getElementById("myTable").deleteRow(x);
// }
// function addAmount(){
//   var table = document.getElementById("pTable");
//   for(x = 2; x < table.rows.length; x++){
//     document.getElementById('btn_add').onkeyup = function(){
//       var total += table.rows[x].cells[5].value;
//       document.getElementById('qTotal').innerHTML = "RM"+total;
//     };
//   }
// }

// Client Invoice Edit Item table
function edit_table(){
}

// Client Maintenance Tab for Table and ADD/EDIT Section
function openTab_default(){
  // var tab_C = document.getElementById("tabcompany");
  // var tab_P = document.getElementById("tabproduct");
  // var con_C = document.getElementById("customer_container");
  // var con_P = document.getElementById("product_container");
  // var edit_C = document.getElementById("edit_c");
  // var edit_P = document.getElementById("edit_P");
  tab_C.style.display = "block";
  tab_P.style.display = "none";
  con_C.style.display = "block";
  con_P.style.display = "none";
}
function openTab_p(){
  document.getElementById("tabcompany").style.display = "none";
  document.getElementById("tabproduct").style.display = "block";
}
function openTab_c(){
  document.getElementById("tabcompany").style.display = "block";
  document.getElementById("tabproduct").style.display = "none";
}
function openCreate_c(){
  document.getElementById("customer_container").style.display = "block";
  document.getElementById("product_container").style.display = "none";
}
function openCreate_p(){
  document.getElementById("customer_container").style.display = "none";
  document.getElementById("product_container").style.display = "block";
}
function closeCreate_c(){
  document.getElementById("customer_container").style.display = "none";
  document.getElementById("product_container").style.display = "none";
}
function closeCreate_p(){
  document.getElementById("customer_container").style.display = "none";
  document.getElementById("product_container").style.display = "none";
}
function openEdit_c(){
  document.getElementById("customer_edit").style.display = "block";
  document.getElementById("customer_create").style.display = "none";
}
function closeEdit_c(){
  document.getElementById("customer_edit").style.display = "none";
  document.getElementById("customer_create").style.display = "block";
}
function openEdit_p(){
  document.getElementById("product_edit").style.display = "block";
  document.getElementById("product_create").style.display = "none";
}
function closeEdit_p(){
  document.getElementById("product_edit").style.display = "none";
  document.getElementById("product_create").style.display = "block";
}

// Client Setting EDIT Section
function openEdit(){
  document.getElementById("client_setting_edit").style.display = "block";
  document.getElementById("client_setting_details").style.display = "none";
  document.getElementById("editbtn").style.display = "none";
  document.getElementById("resetbtn").style.display = "none";
  document.getElementById("uploadbtn").style.display= "block";
}
function closeEdit(){
  document.getElementById("client_setting_edit").style.display = "none";
  document.getElementById("client_setting_details").style.display = "block";
  document.getElementById("editbtn").style.display = "block";
  document.getElementById("resetbtn").style.display = "block";
  document.getElementById("uploadbtn").style.display= "none";
}
function openReset(){
  document.getElementById("client_setting_reset").style.display = "block";
  document.getElementById("client_setting_details").style.display = "none";
  document.getElementById("editbtn").style.display = "none";
  document.getElementById("resetbtn").style.display = "none";
  document.getElementById("uploadbtn").style.display= "none";
}
function closeReset(){
  document.getElementById("client_setting_reset").style.display = "none";
  document.getElementById("client_setting_details").style.display = "block";
  document.getElementById("editbtn").style.display = "block";
  document.getElementById("resetbtn").style.display = "block";
  document.getElementById("uploadbtn").style.display= "none";
}
