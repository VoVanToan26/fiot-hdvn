<?php

// check role
// require_once dirname($_SERVER['SCRIPT_NAME'])."./projects/qc/views/default/function_php/function.php";
//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_line
$sqlcheck_reset_measuring_tools = "SELECT * FROM `tb_measuring_tools` ORDER BY `id` ASC";
$resultcheck_RMT = mysqli_query($connect, $sqlcheck_reset_measuring_tools);
// $check_line = mysqli_fetch_assoc( $resultcheck_line );
if ($resultcheck_RMT && $resultcheck_RMT->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_RMT->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_RMT[$i][0] = $row['id'];
        $data_RMT[$i][1] = $row['type_tool'];
        $data_RMT[$i][2] = $row['measuring_tools'];
        $data_RMT[$i][3] = $row['nick_name_tools'];
        $data_RMT[$i][4] = $row['status'];
        $i++;
        // $data_line_array[$i] = $row['line']; //--> create Object

    }
} else {
    $data_RMT[0][0] = '';
    $data_RMT[0][1] = '';
    $data_RMT[0][2] = '';
    $data_RMT[0][3] = '';
    $data_RMT[0][4] = '';
}

?>



<div class="content-header">
    <!-- content header -->
    <div class="container-fluid">
        <h4>Reset trạng thái dụng mục đo</h4>
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
                                <h3 class="card-title">Bảng danh sách reset trạng thái dụng cụ đo</h3>
                            </div>
                            <div class="text-right">

                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-bordered table-responsive  p-0">
                            <table id="reset_measuring_tools"class="table table-hover text-nowrap table-bordered text-center p-0 ">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 25%">Loại dụng cụ</th>
                                        <th style="width: 25%">Dụng cụ đo </th>
                                        <th style="width: 25%">Tên riêng </th>
                                        <th style="width: 20%">Trạng thái</th>
                                        <!-- <th style="width: 5%">Reset</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $status_array = ["Available", "Used"];
                                    $stt_RMT = 0;
                                    for ($i = 0; $i < count($data_RMT); $i++) {
                                        $stt_RMT++;
                                        echo '<tr>';

                                        echo '<td>' . $stt_RMT . '</td>
                                            <td>' . $data_RMT[$i][1] . '</td>
                                            <td>' . $data_RMT[$i][2] . '</td>
                                            <td>' . $data_RMT[$i][3] . '</td>';
                                        echo '<td class="pt-0 pb-0 px-3  align-middle">
                                        <select required class="form-control " id="RMT' . $i . '" name="" onchange=changeStatusRMT(' . $data_RMT[$i][0] . ',`' . $data_RMT[$i][4] . '`,' . $i . ')>
                                        <option value="' . $data_RMT[$i][4] . '">' . $data_RMT[$i][4] . '</option> ';

                                        foreach ($status_array as &$value) {
                                            if ($data_RMT[$i][4] != $value) {
                                                echo '<option value="' . $value . '">' . $value . '</option> ';
                                            }
                                        }
                                        // echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                        //     onclick ="editLine(' . $data_line[$i][0] . ',' . '\'' . $data_line[$i][1] . '\'' . ',' . '\'' . $data_line[$i][2] . '\'' . ')">Sửa</button></td>
                                        //<td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                        //    onclick ="deleteLine(' . $data_RMT[$i][0] . ',' . '\'' . $data_RMT[$i][1] . '\'' . ')">Xóa</button></td>
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
<div class="modal fade" id="RMT_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận thay đổi trạng thái</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Xác nhận thay đổi trạng thái '<span id="RMT_old_status"></span> ' thành:'<span id="RMT_new_status"></span>' </p>
                <form id="RMTConfirmForm" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/event_reset"; ?>" method="post">
                    <input hidden id="id_RMT" name="id_RMT">
                    <input hidden id="status_RMT" name="status_RMT">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" form='RMTConfirmForm' class="btn btn-primary">Lưu </button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/register_function.js" ?>"></script>
<script>
    //createDataTable(id,pagelength, seaching)
    createDataTable('reset_measuring_tools', 10, true);
</script>
<script>
    function changeStatusRMT($id, $status, $i) {

        $new_status = $('#RMT' + $i).val()
        $('#RMT_confirm_modal').modal();
        $('#id_RMT').val($id);
        $('#status_RMT').val($new_status);

        $('#RMT_old_status').html($status);
        $('#RMT_new_status').html($new_status);
    }

</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>