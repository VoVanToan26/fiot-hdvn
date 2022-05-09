<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_line tho id từ nhỏ đến lớn
$sqlcheck_special_case = "SELECT * FROM `qc_tb_special_case_measurement` ORDER BY `id` DESC";
$resultcheck_special_case = mysqli_query($connect, $sqlcheck_special_case);
// $check_special_case = mysqli_fetch_assoc( $resultcheck_special_case );

if ($resultcheck_special_case && $resultcheck_special_case->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_special_case->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_special_case[$i][0] = $row['id'];
        //  echo  $data_special_case[$i][0];
        $data_special_case[$i][1] = $row['special_case'];
        // echo  $data_special_case[$i][1];
        $data_special_case_array[$i] = $row['special_case'];

        $i++;
    }
} else {
    $data_special_case[0][0] = 0;
    $data_special_case[0][1] = '';
    $data_special_case_array[0]='';
}
?>
<script type="text/javascript">
    var data_special_case_array = <?php echo json_encode($data_special_case_array); ?>;
    var data_special_case_array_edit
</script>
<div class="content-header">
    <!-- content header -->
    <!--     <div class="container-fluid">
        <h4>Đăng ký mã sản phẩm</h4>
    </div> -->
    <!-- main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-left">
                                <h3 class="card-title">Danh Sách Đăng Ký Điều Kiện Đo Đặc Biệt</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_special_case_measurement">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký điều kiện đo đặc biệt
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="special_case_measurement_table"class="table table-bordered table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="">Điều kiện đo đặc biệt</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $stt_line = 0;
                                    for ($i = 0; $i < count($data_special_case); $i++) {
                                        $stt_line++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_line . '</td>
                                            <td>' . $data_special_case[$i][1] . '</td>';
                                        echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editSpecialCaseMeasurement(' . $data_special_case[$i][0] . ',' . '\'' . $data_special_case[$i][1] . '\'' . ')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteSpecialCaseMeasurement(' . $data_special_case[$i][0] . ')">Xóa</button></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <form id="special_case_form_input" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement"; ?>" method="post">
        <!-- Modal đăng ký thêm sản phẩm -->
        <div class="modal fade" id="add_special_case_measurement" tabindex="-1" role="dialog" aria-labelledby="exadd_line" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Đăng Ký điều kiện đo đặc biệt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="special_case_input" class="col-form-label">Điều kiện đo</label>
                            <input type="text" class="form-control" id="special_case_input" name="special_case_input" placeholder="Nhập điều kiện đặc biệt">
                            <small id="special_case_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="register_special_case_function" name="register_special_case_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="special_case_btn" class="btn btn-primary" onclick="register_special_case_btn()">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Edit -->
    <form id="special_case_form_edit" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement"; ?>" method="post">
        <!-- Modal edit sản phẩm -->
        <div class="modal fade" id="edit_special_case_measurement" tabindex="-1" role="dialog" aria-labelledby="exedit_special_case_measurement" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_special_case_measurement">Sửa Thông Tin Điều Kiện Đo Đặc Biệt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="edit_special_case_function" name="edit_special_case_function" hidden></input>
                            <label for="special_case_edit" class="col-form-label">Điều kiện đo đặc biệt</label>
                            <input type="text" class="form-control" id="special_case_edit" name="special_case_edit" placeholder="Nhập điều kiện đo">
                            <small id="special_case_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" onclick="edit_special_case_btn()">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Delete -->
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement"; ?>" method="post">
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Điều Kiện Đo Đặc Biệt</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin điều kiện đo đặc biệt: <span id="delete_special_case_input"></span> ?</p>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_special_case_function" id="delete_special_case_function">Xóa</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>


</div>

<!-- setting data table -->
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/register_function.js" ?>"></script>
<script>
      //  Data table setting
    //createDataTable(id,pagelength, seaching)
    createDataTable('special_case_measurement_table', 10, true);
</script>

<script type="text/javascript">
    function editSpecialCaseMeasurement(id_edit, special_case_edit) {
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('special_case_edit').value = special_case_edit;
        $("#edit_special_case_measurement").modal('toggle');
        // User for check value duplicate or '' // Loc mang
        data_special_case_array_edit = data_special_case_array.filter(function(value, index, arr) {
            return value != special_case_edit;
        });
    }

    function deleteSpecialCaseMeasurement(id_del, special_case_del) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('delete_special_case_input').innerHTML = special_case_del;
        $("#myDelete").modal('toggle');
    }

    function register_special_case_btn() {
        disableBtn('special_case_btn');
        special_caseElement = document.getElementById('special_case_input');
        special_case = special_caseElement.value.trim();

        checkSpecialCase = checkInputValue(data_special_case_array, 'special_case_input', 'special_case_input_err', true)

        if (checkSpecialCase) {
            document.getElementById('special_case_form_input').submit()
        }
    }

    function edit_special_case_btn() {

        special_caseElement = document.getElementById('special_case_edit');
        special_case = special_caseElement.value.trim();

        checkSpecialCase = checkeditValue(data_special_case_array, 'special_case_edit', 'special_case_edit_err', true)

        if (checkSpecialCase) {
            document.getElementById('special_case_form_edit').submit()
        }
    }
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>