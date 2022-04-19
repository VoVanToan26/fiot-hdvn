<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_line
$sqlcheck_line = "SELECT * FROM `qc_tb_line` ORDER BY `id` ASC";
$resultcheck_line = mysqli_query($connect, $sqlcheck_line);
// $check_line = mysqli_fetch_assoc( $resultcheck_line );
if ($resultcheck_line && $resultcheck_line->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_line->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_line[$i][0] = $row['id'];
        $data_line[$i][1] = $row['line'];
        $data_line[$i][2] = $row['product_family'];
        $i++;
    }
} else {
    $data_line[0][0] = '';
    $data_line[0][1] = '';
    $data_line[0][2] = '';
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
                                <h3 class="card-title">Danh Sách Line</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#add_line">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký line
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="width: 40%">Dòng Sản Phẩm</th>
                                        <th style="width: 40%">Tên Line</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt_line = 0;
                                    for ($i = 0; $i < count($data_line); $i++) {
                                        $stt_line++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_line . '</td>
                                            <td>' . $data_line[$i][2] . '</td>
                                            <td>' . $data_line[$i][1] . '</td>';
                                        echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editLine(' . $data_line[$i][0] . ',' . '\'' . $data_line[$i][1] . '\'' . ',' . '\'' . $data_line[$i][2] . '\'' . ')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteLine(' . $data_line[$i][0] . ',' . '\'' . $data_line[$i][1] . '\'' . ')">Xóa</button></td>';
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
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_line" tabindex="-1" role="dialog" aria-labelledby="exadd_line"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_line">Đăng Ký Line</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_family_input" class="col-form-label">Dòng Sản Phẩm.</label>
                            <select class="form-control" id="product_family_input" name="product_family_input">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="line" class="col-form-label">Line</label>
                            <input type="text" maxlength="20" class="form-control" id="line" name="line"
                                placeholder="Nhập line">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="register_line_function"
                            name="register_line_function">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit sản phẩm -->
        <div class="modal fade" id="edit_product_line" tabindex="-1" role="dialog" aria-labelledby="exedit_product_line"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_product_line">Sửa Thông Tin Line</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_product_family_input" class="col-form-label">Dòng Sản Phẩm.</label>
                            <select class="form-control" id="edit_product_family_input"
                                name="edit_product_family_input">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_line_input" class="col-form-label">Line.</label>
                            <input type="text" maxlength="20" class="form-control" id="edit_line_input"
                                name="edit_line_input" placeholder="Nhập line">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="edit_line_function"
                            name="edit_line_function">Sửa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Line</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin line: <span id="delete_line_input"></span> ?</p>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_line_function"
                            id="delete_line_function">Xóa</button>
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
                        <h4 class="modal-title">Cảnh Báo</h4>
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
function editLine(id_edit, line_edit, product_family_edit) {

    document.getElementById('edit_id').value = id_edit;
    document.getElementById('edit_product_family_input').value = product_family_edit;
    document.getElementById('edit_line_input').value = line_edit;
    $("#edit_product_line").modal('toggle');
}

function deleteLine(id_del, line_del) {
    document.getElementById('del_id').value = id_del;
    document.getElementById('delete_line_input').innerHTML = line_del;
    $("#myDelete").modal('toggle');
}

function warning() {
    // console.log("start");
    $("#myWarning").modal('toggle');
}
</script>