function edit_sanpham(params) {
  alert("edit san pham");
}

function delete_sanpham(params) {
  alert("delete san pham");
}

function table_add_row(element_name, row, col, line_height) {
  let table = document.getElementById(element_name);
  if (line_height == null) {
    line_height = 24;
  }
  for (let i = 0; i < row; i++) {
    let tr = table.insertRow();
    for (let j = 0; j < col; j++) {
      let td = tr.insertCell();
      td.style.border = "1px solid black";
      td.style.height = line_height + "px";
      // td.style.height="10px "
      // td.text.align ="left"

      td.style.borderTop = "1px dashed red ";
    }
  }
}
// Add td a table
function add_td_day(element_name, row, col, row_day, width) {
  let table = document.getElementById(element_name);
  let tr = table.getElementsByTagName("tr");
  width = (100 - width) / col;
  for (let i = 0; i < tr.length; i++) {
    // let tr = table.insertRow();
    for (let j = 0; j < col; j++) {
      let td = tr[i].insertCell();
      // add data day in row[rowday]
      if (i == row_day) {
        td.appendChild(document.createTextNode(j + 1));
      }
      td.style.width = width + "%";
    }
  }
}

// //xrs begin
function edit_sanpham(params) {
  alert("edit san pham");
}

function delete_sanpham(params) {
  alert("delete san pham");
}
// add tr td in a table=null
function table_add(element_name, row, col, max, step, sum_height) {
  let table = document.getElementById(element_name);
  for (let i = 0; i < row; i++) {
    let tr = table.insertRow();
    for (let j = 0; j < col; j++) {
      let td = tr.insertCell();
      td.appendChild(document.createTextNode((max - step * i).toFixed(3)));
      td.style.border = "1px solid black";
      td.style.lineHeight = sum_height / row - 1 + "px";
    }
  }
}

// function table_add_row(element_name, row, col, line_height) {
//   let table = document.getElementById(element_name);
//   if (line_height == null) {
//     line_height = 24;
//   }
//   for (let i = 0; i < row; i++) {
//     let tr = table.insertRow();
//     for (let j = 0; j < col; j++) {
//       let td = tr.insertCell();
//       td.style.border = "1px solid black";
//       td.style.height = line_height + "px";
//       td.style.borderTop = "1px dashed red ";
//     }
//   }
// }
// Add td a table
function add_td_day(element_name, row, col, row_day, width) {
  let table = document.getElementById(element_name);
  let tr = table.getElementsByTagName("tr");
  width = (100 - width) / col;
  for (let i = 0; i < tr.length; i++) {
    // let tr = table.insertRow();
    for (let j = 0; j < col; j++) {
      let td = tr[i].insertCell();
      // add data day in row[rowday]
      if (i == row_day) {
        td.appendChild(document.createTextNode(j + 1));
      }
      td.style.width = width + "%";
    }
  }
}
function add_1row_td(element_name, col, content_array, width) {
  let tr = document.getElementById(element_name);
  // alert(tr)
  if (width != "auto") {
    width = toString((100 - width) / col);
  }
  for (let j = 0; j < col; j++) {
    let td = tr.insertCell();
    // add data day in row[rowday]
    if (content_array.length > 0) {
      // alert("ok")
      td.appendChild(document.createTextNode(content_array[j]));
      content_array.length--;
    }
    td.style.width = width;
  }
}

//xrs end

//  highChart-function
function cac_tick_pos(min, max, step) {
  var result = [];
  let temp = 1 + (max - min) / step;
  //  console.log(temp, min, max, step)
  for (let i = 0; i < temp; i++) {
    result[i] = parseFloat(min + i * step);
  }
  return [result, [parseFloat(step / 2)]];
}

function add_text_div(divID, text) {
  var div = document.getElementById(divID);
  div.innerHTML = text;
  div.fontWeight = "500";
}

function show_confirm_modal(divID, text) {
  add_text_div("name_confirm", "Xác nhận duyệt với tên là:    " + text);
  $("#confirm-modal").modal("toggle");
  document.getElementById("button-confirm").onclick = function () {
    add_text_div(divID, text);
  };
  document.getElementById("button-clear").onclick = function () {
    add_text_div(divID, "");
  };
}
//  export pdf file

//  Duyệt ngày
function sign_form_confirm_function(name) {
  $("#sign_form").val(name);
  $("#sub_id_search_input").val('<?php echo $sub_id_search ?>');
  $("#current_url").val(document.URL);
  $("#form_confirm_modal").modal('toggle');
}