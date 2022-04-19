<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_part_no
$sqlcheck_part_no = "SELECT * FROM `qc_tb_part_no` ORDER BY `id` ASC";
$resultcheck_part_no = mysqli_query($connect, $sqlcheck_part_no);
// $check_part_no = mysqli_fetch_assoc( $resultcheck_part_no );
if ($resultcheck_part_no && $resultcheck_part_no->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_part_no->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_part_no[$i][0] = $row['id'];
        $data_part_no[$i][1] = $row['line'];
        $data_part_no[$i][2] = $row['product_family'];
        $data_part_no[$i][3] = $row['part_no'];
        $data_part_no[$i][4] = $row['part_name'];
        $data_part_no[$i][5] = $row['user_mail_approval'];
        $data_part_no[$i][6] = $row['user_mail_unusual_category'];
        $data_part_no[$i][7] = $row['user_mail_unusual_trend'];
        $i++;
    }
} else {
    $data_part_no[0][0] = '';
    $data_part_no[0][1] = '';
    $data_part_no[0][2] = '';
    $data_part_no[0][3] = '';
    $data_part_no[0][4] = '';
    $data_part_no[0][5] = '';
    $data_part_no[0][6] = '';
    $data_part_no[0][7] = '';
}

//select account
$sqlcheck_account = "SELECT * FROM `tb_account` ORDER BY `username` ASC";
$resultcheck_account = mysqli_query($connect, $sqlcheck_account);
// $check_account = mysqli_fetch_assoc( $resultcheck_account );
if ($resultcheck_account && $resultcheck_account->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_account->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_account[$i][0] = $row['id'];
        $data_account[$i][1] = $row['username'];
        $data_account[$i][2] = $row['full_name'];
        $data_account[$i][3] = $row['position'];
        $data_account[$i][4] = $row['department'];
        $data_account[$i][5] = $row['role_name'];
        $i++;
    }
} else {
    $data_account[0][0] = '';
    $data_account[0][1] = '';
    $data_account[0][2] = '';
    $data_account[0][3] = '';
    $data_account[0][4] = '';
    $data_account[0][5] = '';
}

//select qc_tb_line
$sqlcheck_line = "SELECT `line` FROM `qc_tb_line` ORDER BY `id` ASC";
$resultcheck_line = mysqli_query($connect, $sqlcheck_line);
// $check_line = mysqli_fetch_assoc( $resultcheck_line );
if ($resultcheck_line && $resultcheck_line->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_line->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_line[$i] = $row['line'];
        $i++;
    }
} else {
    $data_line[0] = '';
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-left">
                                <h3 class="card-title">Danh Sách Sản Phẩm.</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#themsanpham">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng Ký Mã Sản Phẩm.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">STT.</th>
                                        <th style="width: 10%">Tên Line.</th>
                                        <th style="width: 10%">Dòng Sản Phẩm.</th>
                                        <th style="width: 10%">Mã Sản Phẩm.</th>
                                        <th style="width: 10%">Tên Sản Phẩm.</th>
                                        <th style="width: 15%">Mail Duyệt.</th>
                                        <th style="width: 15%">Mail Bất Thường Hạng Mục.</th>
                                        <th style="width: 15%">Mail Bất Thường Xu Hướng.</th>
                                        <th style="width: 5%">Sửa.</th>
                                        <th style="width: 5%">Xóa.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt_part_no = 0;
                                    for ($i = 0; $i < count($data_part_no); $i++) {
                                        $stt_part_no++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_part_no . '</td>
                                            <td>' . $data_part_no[$i][1] . '</td>
                                            <td>' . $data_part_no[$i][2] . '</td>
                                            <td>' . $data_part_no[$i][3] . '</td>
                                            <td>' . $data_part_no[$i][4] . '</td>
                                            <td>' . $data_part_no[$i][5] . '</td>
                                            <td>' . $data_part_no[$i][6] . '</td>
                                            <td>' . $data_part_no[$i][7] . '</td>';
                                        echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editMaSanPham(' . $data_part_no[$i][0] . ',' . '\'' . $data_part_no[$i][1] . '\'' . ',' . '\'' . $data_part_no[$i][2] . '\'' . ',' . '\'' . $data_part_no[$i][3] . '\'' . ',' . '\'' . $data_part_no[$i][4] . '\'' . ')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteMaSanPham(' . $data_part_no[$i][0] . ')">Xóa</button></td>';
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
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code"; ?>"
        method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="themsanpham" tabindex="-1" role="dialog" aria-labelledby="exthemsanpham"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exthemsanpham">Đăng Ký Mã Sản Phẩm.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="line" class="col-form-label">Line.</label>
                            <select class="form-control" id="line" name="line">
                                <option selected>Chọn line</option>
                                <?php
                                for ($i = 0; $i < count($data_line); $i++) {
                                    echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_family" class="col-form-label">Dòng Sản Phẩm.</label>
                            <select class="form-control" id="product_family" name="product_family">
                                <option selected>Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="part_no" class="col-form-label">Mã Sản Phẩm.</label>
                            <input type="text" maxlength="20" class="form-control" id="part_no" name="part_no">
                        </div>
                        <div class="form-group">
                            <label for="part_name" class="col-form-label">Tên Sản Phẩm.</label>
                            <input type="text" maxlength="20" class="form-control" id="part_name" name="part_name">
                        </div>
                        <div class="form-group">
                            <label for="user_mail_approval" class="col-form-label">Mail Duyệt.</label><br>
                            <select class="form-control" id="user_mail_approval[]" name="user_mail_approval[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_account[$i][1] .  ' - ' . $data_account[$i][2] .  ' - ' . $data_account[$i][3] .  ' - ' . $data_account[$i][4] .  ' - ' . $data_account[$i][5] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_mail_unusual_category" class="col-form-label">Mail Bất Thường Hạng
                                Mục.</label><br>
                            <select class="form-control" id="user_mail_unusual_category[]"
                                name="user_mail_unusual_category[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_account[$i][1] .  ' - ' . $data_account[$i][2] .  ' - ' . $data_account[$i][3] .  ' - ' . $data_account[$i][4] .  ' - ' . $data_account[$i][5] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_mail_unusual_trend" class="col-form-label">Mail Bất Thường Xu
                                Hướng.</label><br>
                            <select class="form-control" id="user_mail_unusual_trend[]" name="user_mail_unusual_trend[]"
                                multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_account[$i][1] .  ' - ' . $data_account[$i][2] .  ' - ' . $data_account[$i][3] .  ' - ' . $data_account[$i][4] .  ' - ' . $data_account[$i][5] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="register_product" name="register_product">Đăng
                            Ký</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal sửa sản phẩm -->
        <div class="modal fade" id="editsanpham" tabindex="-1" role="dialog" aria-labelledby="exeditsanpham"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exeditsanpham">Sửa Thông Tin Mã Sản Phẩm.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="edit_id" name="edit_id">
                        <div class="form-group">
                            <label for="edit_line" class="col-form-label">Line.</label>
                            <select class="form-control" id="edit_line" name="edit_line">

                                <?php
                                for ($i = 0; $i < count($data_line); $i++) {
                                    echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_product_family" class="col-form-label">Dòng Sản Phẩm.</label>
                            <select class="form-control" id="edit_product_family" name="edit_product_family">
                                <option selected>Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_part_no" class="col-form-label">Mã Sản Phẩm.</label>
                            <input type="text" maxlength="20" class="form-control" id="edit_part_no"
                                name="edit_part_no">
                        </div>
                        <div class="form-group">
                            <label for="edit_part_name" class="col-form-label">Tên Sản Phẩm.</label>
                            <input type="text" maxlength="20" class="form-control" id="edit_part_name"
                                name="edit_part_name">
                        </div>
                        <div class="form-group">
                            <label for="edit_user_mail_approval" class="col-form-label">Mail Duyệt.</label><br>
                            <select class="form-control" id="edit_user_mail_approval[]" name="edit_user_mail_approval[]"
                                multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_account[$i][1] .  ' - ' . $data_account[$i][2] .  ' - ' . $data_account[$i][3] .  ' - ' . $data_account[$i][4] .  ' - ' . $data_account[$i][5] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_user_mail_unusual_category" class="col-form-label">Mail Bất Thường Hạng
                                Mục.</label><br>
                            <select class="form-control" id="edit_user_mail_unusual_category[]"
                                name="edit_user_mail_unusual_category[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_account[$i][1] .  ' - ' . $data_account[$i][2] .  ' - ' . $data_account[$i][3] .  ' - ' . $data_account[$i][4] .  ' - ' . $data_account[$i][5] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_user_mail_unusual_trend" class="col-form-label">Mail Bất Thường Xu
                                Hướng.</label><br>
                            <select class="form-control" id="edit_user_mail_unusual_trend[]"
                                name="edit_user_mail_unusual_trend[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_account[$i][1] .  ' - ' . $data_account[$i][2] .  ' - ' . $data_account[$i][3] .  ' - ' . $data_account[$i][4] .  ' - ' . $data_account[$i][5] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="edit_product" name="edit_product">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end model -->

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
        <!-- end model -->

        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Sản Phẩm.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin sản phẩm không?</p>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_product"
                            id="delete_product">Xóa</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</div>
<script type="text/javascript">
function editMaSanPham(id_edit, line_edit, product_family_edit, part_no_edit, part_name_edit) {

    document.getElementById('edit_id').value = id_edit;
    document.getElementById('edit_line').value = line_edit;
    document.getElementById('edit_product_family').value = product_family_edit;
    document.getElementById('edit_part_no').value = part_no_edit;
    document.getElementById('edit_part_name').value = part_name_edit;
    $("#editsanpham").modal('toggle');
}

function deleteMaSanPham(id_del) {
    document.getElementById('del_id').value = id_del;
    $("#myDelete").modal('toggle');
}

function warning() {
    // console.log("start");
    $("#myWarning").modal('toggle');
}
</script>