function createDataTable(tableID, pagelength, searching) {
  $("#" + tableID).DataTable({
    ordering: false,
    lengthChange: false,
    pageLength: pagelength,
    searching: searching,
    scrollX: false,
    // "scrollX": false,
    dom: '<"float-right"lf><"overflow-custom"t><"row m-0 p-0"<"col"i><"col"p>>',
    oLanguage: {
      sInfo: "_START_/_END_ [_TOTAL_]",
      // "sInfoEmpty": "Showing 0 to 0 of 0 entries",
      // "sInfoFiltered": "(filtered from _MAX_ total entries)",
      sZeroRecords: "Không tìm thấy kết quả",
      sInfoEmpty: "",
      sInfoFiltered: "",
      sSearch: "Tìm kiếm:",
      oPaginate: {
        sNext: "Kế tiếp",
        sPrevious: "Trước",
      },
    },
  });
}
//  setting search button
// Search function for dataTable
// $(document).ready(function() {
//     $("#inputSearch").on("keyup", function() {
//         var value = $(this).val().toLowerCase();
//         $("#measurement_item_table tr").filter(function() {
//             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//         });
//     });
// });
//
function disableBtn(btId) {
  $("#" + btId).attr("disabled", true);
  setTimeout(function () {
    console.log(true);
    $("#" + btId).removeAttr("disabled");
  }, 1000);
}

function loadSelectbox(id_place, val) {
  valStrToArr = val.split(";");
  try {
    $("#" + id_place)
      .val(valStrToArr)
      .trigger("change"); //tag used select2
  } catch (error) {
    // console.log(error);
  }
}

// String between : ;
function getStringsBetweenTwoCharactor(str) {
  // let result = str.match(/:\w+;/g) || [];
  let result2 = str.match(/(?<=:)\w+(?=;)/g) || [];
  return result2;
}

