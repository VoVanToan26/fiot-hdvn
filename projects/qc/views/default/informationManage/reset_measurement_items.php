<?php

// check role
// require_once dirname($_SERVER['SCRIPT_NAME'])."./projects/qc/views/default/function_php/function.php";
//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_line
$sqlcheck_reset_measurement_items = "SELECT * FROM `qc_tb_measurement_items` ORDER BY `id` ASC";
$resultcheck_RSI = mysqli_query($connect, $sqlcheck_reset_measurement_items);
// $check_line = mysqli_fetch_assoc( $resultcheck_line );
if ($resultcheck_RSI && $resultcheck_RSI->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_RSI->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_RSI[$i][0] = $row['id'];
        $data_RSI[$i][1] = $row['part_no'];
        $data_RSI[$i][2] = $row['measurement_items'];
        $data_RSI[$i][3] = $row['line'];
        $data_RSI[$i][4] = $row['chart'];
        // $data_reset_measurement_items[$i][5] = $row['lot'];
        $data_RSI[$i][5] = "Chưa có kq lot";
        $data_RSI[$i][6] = $row['status'];

        $i++;
        // $data_line_array[$i] = $row['line']; //--> create Object

    }
} else {
    $data_RSI[0][0] = '';
    $data_RSI[0][1] = '';
    $data_RSI[0][2] = '';
    $data_RSI[0][3] = '';
    $data_RSI[0][4] = '';
    $data_RSI[0][5] = '';
    $data_RSI[0][6] = '';
}



?>



<div class="content-header">
    <!-- content header -->
    <div class="container-fluid">
        <h4>Reset trạng thái hạng mục đo</h4>
    </div>
    <!-- main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-left">
                                <h3 class="card-title">Bảng danh sách reset trạng thái hạng mục đo</h3>
                            </div>
                            <div class="text-right">

                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-bordered table-responsive  p-0">
                            <table id="reset_measurement_items_table"class="table table-hover text-nowrap text-center table-bordered ">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 15%">Mã sản phẩm</th>
                                        <th style="width: 15%">Hạng mục</th>
                                        <th style="width: 10%">Line</th>
                                        <th style="width: 20%">Biểu đồ</th>
                                        <th style="width: 10%">Lot</th>
                                        <th style="width: 15%">Trạng thái</th>
                                        <!-- <th style="width: 5%">Xóa</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $status_array = ["Available", "Used", "Stop", "Lock"];
                                    $stt_RSI = 0;
                                    for ($i = 0; $i < count($data_RSI); $i++) {
                                        $stt_RSI++;
                                        echo '<tr>';

                                        echo '<td>' . $stt_RSI . '</td>
                                            <td>' . $data_RSI[$i][1] . '</td>
                                            <td>' . $data_RSI[$i][2] . '</td>
                                            <td>' . $data_RSI[$i][3] . '</td>
                                            <td>' . $data_RSI[$i][4] . '</td>
                                            <td>' . $data_RSI[$i][5] . '</td>';
                                        echo '<td class="pt-0 pb-0 px-3  align-middle">
                                        <select required class="form-control " id="RSI' . $i . '" name="" onchange=changeStatusRSI(' . $data_RSI[$i][0] . ',`' . $data_RSI[$i][6] . '`,' . $i . ')>
                                        <option value="' . $data_RSI[$i][6] . '">' . $data_RSI[$i][6] . '</option> ';

                                        foreach ($status_array as &$value) {
                                            if ($data_RSI[$i][6] != $value) {
                                                echo '<option value="' . $value . '">' . $value . '</option> ';
                                            }
                                        }
                                        // echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                        //     onclick ="editLine(' . $data_line[$i][0] . ',' . '\'' . $data_line[$i][1] . '\'' . ',' . '\'' . $data_line[$i][2] . '\'' . ')">Sửa</button></td>
                                        //<td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                        //    onclick ="deleteLine(' . $data_RSI[$i][0] . ',' . '\'' . $data_RSI[$i][1] . '\'' . ')">Xóa</button></td>
                                        echo '</select>
                                         </td>                                      
                                        </tr>';
                                    }
                                    ?>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
</section>

<!-- Modal confirm -->
<div class="modal fade" id="RSI_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận thay đổi trạng thái</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Xác nhận thay đổi trạng thái '<span id="RSI_old_status"></span> ' thành:'<span id="RSI_new_status"></span>' </p>
                <form id="RSIConfirmForm" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/event_reset"; ?>" method="post">
                    <input hidden id="id_RSI" name="id_RSI">
                    <input hidden id="status_RSI" name="status_RSI">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" form='RSIConfirmForm' class="btn btn-primary">Lưu </button>
            </div>
        </div>
    </div>
</div>
<!-- //  Data table setting -->
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/register_function.js" ?>"></script>
<script>
    //createDataTable(id,pagelength, seaching)
    createDataTable('reset_measurement_items_table', 10, true);
</script>
<script>
    function changeStatusRSI($id, $status, $i) {

        $new_status = $('#RSI' + $i).val()
        $('#RSI_confirm_modal').modal();
        $('#id_RSI').val($id);
        $('#status_RSI').val($new_status);

        $('#RSI_old_status').html($status);
        $('#RSI_new_status').html($new_status);
    }

    // function deleteLine(id_del, status_del) {
    //    $('#del_id').val(id_del);
    //    $('#delete_status_input').val(status_del);
    //     $("#myDelete").modal('toggle');
    // }
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>