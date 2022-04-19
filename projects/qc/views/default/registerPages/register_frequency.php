<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_frequency
$sqlcheck_frequency = "SELECT * FROM `qc_tb_frequency` ORDER BY `id` ASC";
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
        $i++;
    }
} else {
    $data_frequency[0][0] = '';
    $data_frequency[0][1] = '';
    $data_frequency[0][2] = '';
    $data_frequency[0][3] = '';
}

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
                                <h3 class="card-title">Danh Sách Tần Suất.</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#add_frequency">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký Tần Suất.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT.</th>
                                        <th style="width: 30%">Tên Tần Suất.</th>
                                        <th style="width: 25%">Số Lượng Đo.</th>
                                        <th style="width: 25%">Đơn Vị Thời Gian.</th>
                                        <th style="width: 5%">Sửa.</th>
                                        <th style="width: 5%">Xóa.</th>
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
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency"; ?>"
        method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_frequency" tabindex="-1" role="dialog" aria-labelledby="exadd_frequency"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_frequency">Đăng Ký Tần Suất.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="frequency_input" class="col-form-label">Tên Tần Suất.</label>
                            <input type="text" maxlength="20" class="form-control" id="frequency_input"
                                name="frequency_input" placeholder="Nhập tần suất">
                        </div>
                        <div class="form-group">
                            <label for="quantity_input" class="col-form-label">Số Lượng Đo.</label>
                            <input type="text" maxlength="10" class="form-control" id="quantity_input"
                                name="quantity_input" placeholder="Nhập số lượng đo">
                        </div>
                        <div class="form-group">
                            <label for="unit_time_input" class="col-form-label">Đơn Vị Thời Gian.</label>
                            <select class="form-control" id="unit_time_input" name="unit_time_input">
                                <option value="">Chọn đơn vị thời gian</option>
                                <option value="Ca">Ca</option>
                                <option value="Ngày">Ngày</option>
                                <option value="Tuần">Tuần</option>
                                <option value="Tháng">Tháng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="register_frequency_function"
                            name="register_frequency_function">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit sản phẩm -->
        <div class="modal fade" id="edit_product_frequency" tabindex="-1" role="dialog"
            aria-labelledby="exedit_product_frequency" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_product_frequency">Sửa Thông Tin Tần Suất.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="frequency_edit" class="col-form-label">Tên Tần Suất.</label>
                            <input type="text" maxlength="20" class="form-control" id="frequency_edit"
                                name="frequency_edit" placeholder="Nhập tần suất">
                        </div>
                        <div class="form-group">
                            <label for="quantity_edit" class="col-form-label">Số Lượng Đo.</label>
                            <input type="text" maxlength="10" class="form-control" id="quantity_edit"
                                name="quantity_edit" placeholder="Nhập số lượng đo">
                        </div>
                        <div class="form-group">
                            <label for="unit_time_edit" class="col-form-label">Đơn Vị Thời Gian.</label>
                            <select class="form-control" id="unit_time_edit" name="unit_time_edit">
                                <option value="">Chọn đơn vị thời gian</option>
                                <option value="Ca">Ca</option>
                                <option value="Ngày">Ngày</option>
                                <option value="Tuần">Tuần</option>
                                <option value="Tháng">Tháng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="edit_frequency_function"
                            name="edit_frequency_function">Sửa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Tần Suất.</h4>
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
                        <button type="submit" class="btn btn-outline-light" name="delete_frequency_function"
                            id="delete_frequency_function">Xóa</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- model -->
        <div class="modal fade" id="myWarning">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header">
                        <h4 class="modal-title">Cảnh Báo.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Nhập thiếu dữ liệu. Vui lòng nhập lại!</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Đồng ý</button>
                        <!-- <button type="button" class="btn btn-outline-dark">Save changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</div>

<script type="text/javascript">
function editFrequency(id_edit, frequency_edit, quantity_edit, unit_time_edit) {

    document.getElementById('edit_id').value = id_edit;
    document.getElementById('frequency_edit').value = frequency_edit;
    document.getElementById('quantity_edit').value = quantity_edit;
    document.getElementById('unit_time_edit').value = unit_time_edit;
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
</script>