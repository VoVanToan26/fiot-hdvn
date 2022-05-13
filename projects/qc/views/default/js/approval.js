var SCRIPT_NAME = "/fiot-hdvn";
function auto_popup_line(action) {
  if (action == "register") {
    var product_family = document.getElementById("product_family_input").value;
    var selectLine = document.getElementById("line_input");

    if (product_family == "") {
      while (selectLine.firstChild) {
        selectLine.removeChild(selectLine.firstChild);
      }
      opt = document.createElement("option");
      opt.value = "";
      opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
      selectLine.appendChild(opt);
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var myArr = JSON.parse(this.responseText);
          while (selectLine.firstChild) {
            selectLine.removeChild(selectLine.firstChild);
          }
          if (myArr[0] == "Không có line nào theo dòng sản phẩm") {
            var opt = null;
            opt = document.createElement("option");
            opt.value = "";
            opt.innerHTML = "Không có line nào theo dòng sản phẩm";
            selectLine.appendChild(opt);
          } else {
            var opt = null;
            opt = document.createElement("option");
            opt.value = "";
            opt.innerHTML = "Chọn line";
            selectLine.appendChild(opt);
            for (i = 0; i < myArr.length; i++) {
              opt = document.createElement("option");
              opt.value = myArr[i];
              opt.innerHTML = myArr[i];
              selectLine.appendChild(opt);
            }
          }
        }
      };
      var link_get_data = SCRIPT_NAME + "/qc/autopopup";
      xmlhttp.open(
        "GET",
        `${link_get_data}?auto_popup_line=yes&product_family=${product_family}`,
        true
      );
      xmlhttp.send();
    }
  } else if (action == "edit") {
    // continue();
  }
}

function auto_popup_part_no(action) {
  if (action == "register") {
    var product_family = document.getElementById("product_family_input").value;
    var line_input = document.getElementById("line_input").value;

    var selectPartNo = document.getElementById("part_no_input");

    if (line_input == "") {
      while (selectPartNo.firstChild) {
        selectPartNo.removeChild(selectPartNo.firstChild);
      }
      opt = document.createElement("option");
      opt.value = "";
      opt.innerHTML = "Vui lòng chọn line trước";
      selectPartNo.appendChild(opt);
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var myArr = JSON.parse(this.responseText);
          while (selectPartNo.firstChild) {
            selectPartNo.removeChild(selectPartNo.firstChild);
          }
          if (myArr[0] == "Không có mã sản phẩm nào") {
            var opt = null;
            opt = document.createElement("option");
            opt.value = "";
            opt.innerHTML = "Không có mã sản phẩm nào";
            selectPartNo.appendChild(opt);
          } else {
            var opt = null;
            opt = document.createElement("option");
            opt.value = "";
            opt.innerHTML = "Chọn mã sản phẩm";
            selectPartNo.appendChild(opt);
            for (i = 0; i < myArr.length; i++) {
              opt = document.createElement("option");
              opt.value = myArr[i];
              opt.innerHTML = myArr[i];
              selectPartNo.appendChild(opt);
            }
          }
        }
      };
      // xmlhttp.open("GET", url, true);
      var link_get_data = SCRIPT_NAME + "/qc/autopopup";
      xmlhttp.open(
        "GET",
        `${link_get_data}?auto_popup_part_no=yes&product_family=${product_family}&line=${line_input}`,
        true
      );
      xmlhttp.send();
    }
  } else if (action == "edit") {
    // continue();
  }
}

function auto_popup_measurement_items(action) {
  if (action == "register") {
    var product_family = document.getElementById("product_family_input").value;
    var line_input = document.getElementById("line_input").value;
    var part_no_input = document.getElementById("part_no_input").value;

    var selectMeasurement = document.getElementById("measurement_items_input");

    if (part_no_input == "") {
      while (selectMeasurement.firstChild) {
        selectMeasurement.removeChild(selectMeasurement.firstChild);
      }
      opt = document.createElement("option");
      opt.value = "";
      opt.innerHTML = "Vui lòng chọn mã sản phẩm trước";
      selectMeasurement.appendChild(opt);
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var myArr = JSON.parse(this.responseText);
          while (selectMeasurement.firstChild) {
            selectMeasurement.removeChild(selectMeasurement.firstChild);
          }
          if (myArr[0] == "Không có hạng mục đo nào ") {
            var opt = null;
            opt = document.createElement("option");
            opt.value = "";
            opt.innerHTML = "Không có hạng mục đo nào ";
            selectMeasurement.appendChild(opt);
          } else {
            var opt = null;
            opt = document.createElement("option");
            opt.value = "";
            opt.innerHTML = "Chọn hạng mục đo";
            selectMeasurement.appendChild(opt);
            for (i = 0; i < myArr.length; i++) {
              opt = document.createElement("option");
              opt.value = myArr[i];
              opt.innerHTML = myArr[i];
              selectMeasurement.appendChild(opt);
            }
          }
        }
      };
      // xmlhttp.open("GET", url, true);
      var link_get_data = SCRIPT_NAME + "/qc/autopopup";
      xmlhttp.open(
        "GET",
        `${link_get_data}?auto_popup_measurement_app_items=yes&product_family=${product_family}&line=${line_input}&part_no=${part_no_input}`,
        true
      );
      xmlhttp.send();
    }
  } else if (action == "edit") {
    // continue();
  }
}
function get_link() {
  var product_family = document.getElementById("product_family_input").value;
  var line = document.getElementById("line_input").value;
  var part_no = document.getElementById("part_no_input").value;
  var measurement_items = document.getElementById(
    "measurement_items_input"
  ).value;
  var chart = document.getElementById("chart_input").value;

  if (product_family == "") {
    document
      .getElementById("product_family_input")
      .classList.remove("is-valid");
    document.getElementById("product_family_input").classList.add("is-invalid");
    document.getElementById("production_family_err").innerHTML =
      "Không được để trống dòng sản phẩm";
  } else {
    document
      .getElementById("product_family_input")
      .classList.remove("is-invalid");
    document.getElementById("product_family_input").classList.add("is-valid");
    document.getElementById("production_family_err").innerHTML = "";
  }
  if (line == "") {
    document.getElementById("line_input").classList.remove("is-valid");
    document.getElementById("line_input").classList.add("is-invalid");
    document.getElementById("line_err").innerHTML = "Không được để trống line";
  } else {
    document.getElementById("line_input").classList.remove("is-invalid");
    document.getElementById("line_input").classList.add("is-valid");
    document.getElementById("line_err").innerHTML = "";
  }
  if (part_no == "") {
    document.getElementById("part_no_input").classList.remove("is-valid");
    document.getElementById("part_no_input").classList.add("is-invalid");
    document.getElementById("part_no_err").innerHTML =
      "Không được để trống mã sản phẩm";
  } else {
    document.getElementById("part_no_input").classList.remove("is-invalid");
    document.getElementById("part_no_input").classList.add("is-valid");
    document.getElementById("part_no_err").innerHTML = "";
  }
  if (measurement_items == "") {
    document
      .getElementById("measurement_items_input")
      .classList.remove("is-valid");
    document
      .getElementById("measurement_items_input")
      .classList.add("is-invalid");
    document.getElementById("measurement_items_err").innerHTML =
      "Không được để trống hạng mục đo";
  } else {
    document
      .getElementById("measurement_items_input")
      .classList.remove("is-invalid");
    document
      .getElementById("measurement_items_input")
      .classList.add("is-valid");
    document.getElementById("measurement_items_err").innerHTML = "";
  }
  if (chart == "") {
    document.getElementById("chart_input").classList.remove("is-valid");
    document.getElementById("chart_input").classList.add("is-invalid");
    document.getElementById("chart_err").innerHTML =
      "Không được để trống biểu đồ";
  } else {
    document.getElementById("chart_input").classList.remove("is-invalid");
    document.getElementById("chart_input").classList.add("is-valid");
    document.getElementById("chart_err").innerHTML = "";
  }
  if (
    product_family != "" &&
    line != "" &&
    part_no != "" &&
    measurement_items != "" &&
    chart != ""
  ) {
    document.location = `${SCRIPT_NAME}/qc/informationManage/approval?load_link=yes&product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`;
  } else {
    alert("NO FORM");
  }
}
// load chart
function load_chart(
  action,
  product_family,
  line,
  part_no,
  measurement_items,
  chart
) {
  // if (action == "load_link") {
  //   product_family = "Coil";
  //   line = "05";
  //   part_no = "HV136221-0250";
  //   measurement_items = "Lực tách Yoke tán";
  //   chart = "Biểu đồ quản lý";
  // } else {
  //   console.log("ERR");
  // }
  action = action.replace(/ /g, "%20");
  product_family = product_family.replace(/ /g, "%20");
  line = line.replace(/ /g, "%20");
  part_no = part_no.replace(/ /g, "%20");
  measurement_items = measurement_items.replace(/ /g, "%20");
  chart = chart.replace(/ /g, "%20");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var myArr = JSON.parse(this.responseText);
      // Lọc điều kiện trả về từ db
      if (myArr[0] == "yes") {
        $("#search_form").modal("hide");
        switch (myArr[1]) {
          case "Checksheet":
            $("#load_data").load(
              `${SCRIPT_NAME}/projects/qc/views/default/informationManage/formsList/checkSheet.php?product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`
            );
            break;
          case "Datasheet":
            $("#load_data").load(
              `${SCRIPT_NAME}/projects/qc/views/default/informationManage/formsList/dataSheet.php?product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`
            );
            break;
          case "Xbar-R":
            $("#load_data").load(
              `${SCRIPT_NAME}/projects/qc/views/default/informationManage/formsList/XbarR.php?product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`
            );
            break;
          case "X-R":
            $("#load_data").load(
              `${SCRIPT_NAME}/projects/qc/views/default/informationManage/formsList/XR.php?product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`
            );
            break;
          case "X-Rs":
            $("#load_data").load(
              `${SCRIPT_NAME}/projects/qc/views/default/informationManage/formsList/XRs.php?product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`
            );
            break;

          default:
            break;
        }
      } else {
        alert("NO form");
      }
    }
  };
  var link_get_data = SCRIPT_NAME + "/qc/autopopup";
  xmlhttp.open(
    "GET",
    `${link_get_data}?load_chart=yes&product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`,
    true
  );
  xmlhttp.send();
}

// function load_chart_by_link(load_modul) {
//   product_family = "Coil";
//   line = "05";
//   part_no = "HV136221-0250";
//   measurement_items = "Lực tách Yoke tán";
//   chart = "Biểu đồ quản lý";

//   product_family = product_family.replace(/ /g, "%20");
//   line = line.replace(/ /g, "%20");
//   part_no = part_no.replace(/ /g, "%20");
//   measurement_items = measurement_items.replace(/ /g, "%20");
//   chart = chart.replace(/ /g, "%20");

//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       var myArr = JSON.parse(this.responseText);
//       // Lọc điều kiện trả về từ db
//       if (myArr[0] == "yes") {
//         $("#search_form").modal("hide");
//         switch (myArr[1]) {
//           case "Datasheet":
//             $("#load_data").load(
//               SCRIPT_NAME +
//                 "/projects/qc/views/default/informationManage/formsList/dataSheet.php"
//             );
//             break;
//           case "Checksheet":
//             $("#load_data").load(
//               SCRIPT_NAME +
//                 "/projects/qc/views/default/informationManage/formsList/checkSheet.php"
//             );
//             break;
//           case "Xbar-R":
//             $("#load_data").load(
//               SCRIPT_NAME +
//                 "/projects/qc/views/default/informationManage/formsList/xbarR.php"
//             );
//             break;
//           case "X-R":
//             $("#load_data").load(
//               SCRIPT_NAME +
//                 "/projects/qc/views/default/informationManage/formsList/XR.php"
//             );
//             break;
//           case "X-Rs":
//             $("#load_data").load(
//               `${SCRIPT_NAME}/projects/qc/views/default/informationManage/formsList/XRs.php?product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`
//             );
//             break;

//           default:
//             break;
//         }
//       } else {
//         alert("NO form");
//       }
//     }
//   };
//   var link_get_data = SCRIPT_NAME + "/qc/autopopup";
//   xmlhttp.open(
//     "GET",
//     `${link_get_data}?load_chart=yes&product_family=${product_family}&line=${line}&part_no=${part_no}&measurement_items=${measurement_items}&chart=${chart}`,
//     true
//   );
//   xmlhttp.send();
// }
