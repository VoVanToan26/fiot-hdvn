<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_frequency
$sqlcheck_frequency = "SELECT * FROM `qc_tb_frequency` ORDER BY `id` DESC";
$resultcheck_frequency = mysqli_query($connect, $sqlcheck_frequency);


// $check_frequency = mysqli_fetch_assoc( $resultcheck_frequency );
if ($resultcheck_frequency && $resultcheck_frequency->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_frequency->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_frequency[$i][0] = $row['id'];
        $data_frequency[$i][1] = $row['frequency_name'];
        $data_frequency[$i][2] = $row['quantity'];
        $data_frequency[$i][3] = $row['unit_time'];
        $data_frequency_array[$i] = $row['frequency_name'];

        $i++;
    }
} else {
    $data_frequency[0][0] = 0;
    $data_frequency[0][1] = '';
    $data_frequency[0][2] = '';
    $data_frequency[0][3] = '';
    $data_frequency_array[0]='';
}
// print_r($data_frequency_array)
?>

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
                                <h3 class="card-title">Danh Sách Tần Suất</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_frequency">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký Tần Suất.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="frequency_table" class="table table-hover text-nowrap  table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="width: 30%">Tên Tần Suất</th>
                                        <th style="width: 25%">Số Lượng Đo</th>
                                        <th style="width: 25%">Đơn Vị Thời Gian</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt_frequency = 0;
                                    for ($i = 0; $i < count($data_frequency); $i++) {
                                        $stt_frequency++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_frequency . '</td>
                                            <td>' . $data_frequency[$i][1] . '</td>
                                            <td>' . $data_frequency[$i][2] . '</td>
                                            <td>' . $data_frequency[$i][3] . '</td>';
                                        echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editFrequency(' . $data_frequency[$i][0] . ',' . '\'' . $data_frequency[$i][1] . '\'' . ',' . '\'' . $data_frequency[$i][2] . '\'' . ',' . '\'' . $data_frequency[$i][3] . '\'' . ')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteFrequency(' . $data_frequency[$i][0] . ',' . '\'' . $data_frequency[$i][1] . '\'' . ')">Xóa</button></td>';
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
    <form id="register_frequency_input_form" <?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_frequency" tabindex="-1" role="dialog" aria-labelledby="exadd_frequency" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_frequency">Đăng Ký Tần Suất</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="frequency_input" class="col-form-label">Tên Tần Suất</label>
                            <input type="text" maxlength="200" class="form-control" id="frequency_input" name="frequency_input" placeholder="Nhập tần suất">
                            <small id="frequency_input_err" class="invalid-feedback">Không để trống</small>
                            <!-- onchange="checkInputValue(data_frequency_array_edit,'frequency_input')" onkeyup="checkInputValue(data_frequency_array,'frequency_input')" -->
                        </div>
                        <div class="form-group">
                            <label for="quantity_input" class="col-form-label">Số Lượng Đo</label>
                            <input type="number" max="100" min="1" value="1" class="form-control" id="quantity_input" name="quantity_input" placeholder="Nhập số lượng đo">
                            <small id="quantity_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="unit_time_input" class="col-form-label">Đơn Vị Thời Gian</label>
                            <select class="form-control" id="unit_time_input" name="unit_time_input">
                                <option value="">Chọn đơn vị thời gian</option>
                                <option value="Ca">Ca</option>
                                <option value="Ngày">Ngày</option>
                                <option value="Tuần">Tuần</option>
                                <option value="Tháng">Tháng</option>
                            </select>
                            <small id="unit_time_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="register_frequencye_function" name="register_frequency_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="frequency_btn" class="btn btn-primary" onclick="register_frequency_btn()">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="register_frequency_edit_form" <?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency"; ?> method="post">
        <div class="modal fade" id="edit_product_frequency" tabindex="-1" role="dialog" aria-labelledby="exedit_product_frequency" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_product_frequency">Sửa Thông Tin Tần Suất</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="frequency_edit" class="col-form-label">Tên Tần Suất</label>
                            <input type="text" maxlength="200" class="form-control" id="frequency_edit" name="frequency_edit" placeholder="Nhập tần suất">
                            <small id="frequency_edit_err" class="invalid-feedback">Không để trống</small>

                            <!-- onchange="checkInputValue(data_frequency_array_edit,'frequency_edit')" onkeyup="checkInputValue(data_frequency_array_edit,'frequency_edit')"> -->
                        </div>
                        <div class="form-group">
                            <label for="quantity_edit" class="col-form-label">Số Lượng Đo</label>
                            <input type="text" max="100" min="1" value="1" class="form-control" id="quantity_edit" name="quantity_edit" placeholder="Nhập số lượng đo">
                            <small id="quantity_edit_err" class="invalid-feedback">Không để trống</small>

                        </div>
                        <div class="form-group">
                            <label for="unit_time_edit" class="col-form-label">Đơn Vị Thời Gian</label>
                            <select class="form-control" id="unit_time_edit" name="unit_time_edit">
                                <option value="">Chọn đơn vị thời gian</option>
                                <option value="Ca">Ca</option>
                                <option value="Ngày">Ngày</option>
                                <option value="Tuần">Tuần</option>
                                <option value="Tháng">Tháng</option>
                            </select>
                            <small id="unit_time_edit_err" class="invalid-feedback">Không để trống</small>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="edit_frequency_function" name="edit_frequency_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="frequency_btn_edit" class="btn btn-primary" onclick="edit_frequency_btn()">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal edit sản phẩm -->

    <form id="register_frequency_form" <?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency"; ?> method="post">
        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Tần Suất</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin tần suất: <span id="delete_frequency_input"></span> ?</p>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_frequency_function" id="delete_frequency_function">Xóa</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>



</div>

<!-- //  Data table setting -->
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/register_function.js" ?>"></script>
<script>
    //createDataTable(id,pagelength, seaching)
    createDataTable('frequency_table', 10, true);
</script>


<script type="text/javascript">
    function editFrequency(id_edit, frequency_edit, quantity_edit, unit_time_edit) {
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('frequency_edit').value = frequency_edit;
        document.getElementById('quantity_edit').value = quantity_edit;
        document.getElementById('unit_time_edit').value = unit_time_edit;
        data_frequency_array_edit = data_frequency_array.filter(function(value, index, arr) {
            return value != frequency_edit;
        });
        $("#edit_product_frequency").modal('toggle');
    }

    function deleteFrequency(id_del, line_del, ) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('delete_frequency_input').innerHTML = line_del;
        $("#myDelete").modal('toggle');
    }

    function warning() {
        // console.log("start");
        $("#myWarning").modal('toggle');
    }

    function register_frequency_btn() {
        disableBtn('frequency_btn')
        quantity_inputElement = document.getElementById('quantity_input');
        quantity_input = quantity_inputElement.value.trim();
        unit_time_inputElement = document.getElementById('unit_time_input');
        unit_time_input = unit_time_inputElement.value.trim();
        frequency_inputElement = document.getElementById('frequency_input');
        frequency_input = frequency_inputElement.value.trim();

        checkfrequency = checkInputValue(data_frequency_array, 'frequency_input', 'frequency_input_err', true)
        checkQuantity = checkInputValue(data_frequency_array, 'quantity_input', 'quantity_input_err', false)
        checkUnitTime = checkInputValue(data_frequency_array, 'unit_time_input', 'unit_time_input_err', false)

        console.log(checkfrequency, checkQuantity, checkUnitTime)
        if (checkfrequency && checkQuantity && checkUnitTime) {
            document.getElementById('register_frequency_input_form').submit()
        }
    }

    function edit_frequency_btn() {
        disableBtn('frequency_btn_edit')
        quantity_editElement = document.getElementById('quantity_edit');
        quantity_edit = quantity_editElement.value.trim();
        unit_time_editElement = document.getElementById('unit_time_edit');
        unit_time_edit = unit_time_editElement.value.trim();
        frequency_editElement = document.getElementById('frequency_edit');
        frequency_edit = frequency_editElement.value.trim();

        checkfrequency = checkInputValue(data_frequency_array_edit, 'frequency_edit', 'frequency_edit_err', true)
        checkQuantity = checkInputValue(data_frequency_array, 'quantity_edit', 'quantity_edit_err', false)
        checkUnitTime = checkInputValue(data_frequency_array, 'unit_time_edit', 'unit_time_edit_err', false)

        console.log(checkfrequency, checkQuantity, checkUnitTime)
        if (checkfrequency && checkQuantity && checkUnitTime) {
            document.getElementById('register_frequency_edit_form').submit()
        }
    }
</script>
<script type="text/javascript">
    var data_frequency_array = <?php echo json_encode($data_frequency_array); ?>;
    // console.log(data_frequency_array)
    var data_frequency_array_edit
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>