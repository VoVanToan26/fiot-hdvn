<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_part_no
$sqlcheck_part_no = "SELECT * FROM `qc_tb_part_no` ORDER BY `id` DESC";
$resultcheck_part_no = mysqli_query($connect, $sqlcheck_part_no);
// $check_part_no = mysqli_fetch_assoc( $resultcheck_part_no );
if ($resultcheck_part_no && $resultcheck_part_no->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_part_no->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_part_no[$i][0] = $row['id'];
        $data_part_no[$i][1] = $row['product_family'];
        $data_part_no[$i][2] = $row['line'];
        $data_part_no[$i][3] = $row['part_no'];
        $data_part_no[$i][4] = $row['part_name'];
        $data_part_no[$i][5] = $row['user_mail_approval'];
        $data_part_no[$i][6] = $row['user_mail_unusual_category'];
        $data_part_no[$i][7] = $row['user_mail_unusual_trend'];
        //creat array
        $data_part_no_array[$i] = $row['part_no'];
        $i++;
    }
} else {
    $data_part_no[0][0] = 0;
    $data_part_no[0][1] = '';
    $data_part_no[0][2] = '';
    $data_part_no[0][3] = '';
    $data_part_no[0][4] = '';
    $data_part_no[0][5] = '';
    $data_part_no[0][6] = '';
    $data_part_no[0][7] = '';
    $data_part_no_array[0] = '';
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

        $data_full_account[$i] = $data_account[$i][1] . '-' . $data_account[$i][2] . '-' . $data_account[$i][3] . '-' . $data_account[$i][4] . '-' . $data_account[$i][5];
        $i++;
    }
} else {
    $data_account[0][0] = '';
    $data_account[0][1] = '';
    $data_account[0][2] = '';
    $data_account[0][3] = '';
    $data_account[0][4] = '';
    $data_account[0][5] = '';
    $data_full_account[0] = '';
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-left">
                                <h3 class="card-title">Danh Sách Sản Phẩm</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#themsanpham">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng Ký Mã Sản Phẩm.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="product_code_table" class="table table-hover  table-bordered text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 10%">Dòng Sản Phẩm</th>
                                        <th style="width: 10%">Tên Line</th>
                                        <th style="width: 10%">Mã Sản Phẩm</th>
                                        <th style="width: 10%">Tên Sản Phẩm</th>
                                        <th style="width: 15%">Mail Duyệt</th>
                                        <th style="width: 15%">Mail Bất Thường Hạng Mục</th>
                                        <th style="width: 15%">Mail Bất Thường Xu Hướng</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
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
                                            onclick ="editMaSanPham(' . $data_part_no[$i][0] . ',' . '\'' . $data_part_no[$i][1] . '\'' . ',' . '\'' . $data_part_no[$i][2] . '\'' . ',' . '\'' . $data_part_no[$i][3] . '\'' . ',' . '\'' . $data_part_no[$i][4] . '\'' . ',' . '\'' . $data_part_no[$i][5] . '\'' . ',' . '\'' . $data_part_no[$i][6] . '\'' .  ',' . '\'' . $data_part_no[$i][7] . '\'' . ')">Sửa</button></td>
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
    <form id="product_code_form_input" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="themsanpham" tabindex="-1" role="dialog" aria-labelledby="exthemsanpham" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exthemsanpham">Đăng Ký Mã Sản Phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="product_family_input" class="col-form-label">Dòng Sản Phẩm</label>
                            <select class="form-control" id="product_family_input" name="product_family_input" onchange="auto_popup_line('register')">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                            <small id="product_family_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="line_input" class="col-form-label">Line</label>
                            <select class="form-control" id="line_input" name="line_input">
                                <option value="">Vui lòng chọn line trước</option>
                            </select>
                            <small id="line_input_err" class="invalid-feedback">Không để trống</small>
                        </div>

                        <div class="form-group">
                            <label for="part_no_input" class="col-form-label">Mã Sản Phẩm</label>
                            <input type="text" maxlength="200" class="form-control" id="part_no_input" name="part_no_input">
                            <small id="part_no_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="part_name_input" class="col-form-label">Tên Sản Phẩm</label>
                            <input type="text" maxlength="200" class="form-control" id="part_name_input" name="part_name_input">
                            <small id="part_name_input_err" class="invalid-feedback">Không để trống</small>
                        </div>

                        <div class="form-group ">
                            <label for="user_mail_approval_input" class="col-form-label">Mail Duyệt</label><br>
                            <select class="form-control select2 " style="width:100%" id="user_mail_approval_input" name="user_mail_approval_input[]" multiple="multiple">
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_full_account[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="user_mail_approval_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group ">
                            <label for="user_mail_unusual_category_input" class="col-form-label">Mail Bất Thường Hạng
                                Mục</label><br>
                            <select class="form-control select2 " style="width:100%" id="user_mail_unusual_category_input" name="user_mail_unusual_category_input[]" multiple="multiple">
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_full_account[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="user_mail_unusual_category_input_err" class="invalid-feedback">Không để trống</small>

                        </div>
                        <div class="form-group ">
                            <label for="user_mail_unusual_trend_input" class="col-form-label">Mail Bất Thường Xu
                                Hướng</label><br>
                            <select class="form-control select2" style="width:100%" id="user_mail_unusual_trend_input" name="user_mail_unusual_trend_input[]" multiple="multiple">
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_full_account[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="user_mail_unusual_trend_input_err" class="invalid-feedback">Không để trống</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input id="register_product" name="register_product" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button"id="product_btn" class="btn btn-primary" onclick=register_product_btn()>Đăng
                            Ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="product_code_form_edit" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code"; ?>" method="post">
        <!-- Modal editsản phẩm -->
        <div class="modal fade" id="edit_product_code" tabindex="-1" role="dialog" aria-labelledby="exeditsanpham" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exthemsanpham">Sửa Thông Tin Mã Sản Phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="edit_id">
                        <div class="form-group">
                            <label for="product_family_edit" class="col-form-label">Dòng Sản Phẩm</label>
                            <select class="form-control" id="product_family_edit" name="product_family_edit" onchange="auto_popup_line('register')">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                            <small id="product_family_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="line_edit" class="col-form-label">Line</label>
                            <select class="form-control" id="line_edit" name="line_edit">
                                <option value="">Vui lòng chọn line trước</option>
                            </select>
                            <small id="line_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>

                        <div class="form-group">
                            <label for="part_no_edit" class="col-form-label">Mã Sản Phẩm</label>
                            <input type="text" maxlength="200" class="form-control" id="part_no_edit" name="part_no_edit">
                            <small id="part_no_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="part_name_edit" class="col-form-label">Tên Sản Phẩm</label>
                            <input type="text" maxlength="200" class="form-control" id="part_name_edit" name="part_name_edit">
                            <small id="part_name_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="user_mail_approval_edit" class="col-form-label">Mail Duyệt</label><br>
                            <select class="form-control select2" style="width:100%" id="user_mail_approval_edit" name="user_mail_approval_edit[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_full_account[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="user_mail_approval_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="user_mail_unusual_category_edit" class="col-form-label">Mail Bất Thường Hạng
                                Mục</label><br>
                            <select class="form-control select2" style="width:100%" id="user_mail_unusual_category_edit" name="user_mail_unusual_category_edit[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_full_account[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="user_mail_unusual_category_edit_err" class="invalid-feedback">Không để trống</small>

                        </div>
                        <div class="form-group">
                            <label for="user_mail_unusual_trend_edit" class="col-form-label">Mail Bất Thường Xu
                                Hướng</label><br>
                            <select class="form-control select2" style="width:100%" id="user_mail_unusual_trend_edit" name="user_mail_unusual_trend_edit[]" multiple>
                                <!-- <option value="">Select Username</option> -->
                                <?php
                                for ($i = 0; $i < count($data_account); $i++) {
                                    echo '<option value="' . $data_account[$i][1] . '">' . $data_full_account[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="user_mail_unusual_trend_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input id="edit_product" name="edit_product" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="product_btn_edit"class="btn btn-primary" onclick=edit_product_btn()>Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <form id="product_code_form_delete" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code"; ?>" method="post">
        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Sản Phẩm</h4>
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
                        <button type="submit" class="btn btn-outline-light" name="delete_product" id="delete_product">Xóa</button>
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
    createDataTable('product_code_table', 10, true);
</script>


<script type="text/javascript">
    function loadSelectbox(id_place, val) {
        valStrToArr = val.split(';');
        try {
            $("#" + id_place).val(valStrToArr).trigger("change"); //tag used select2
        } catch (error) {
            // console.log(error);
        }
    }

    function editMaSanPham(
        id_edit, product_family_edit, line_edit, part_no_edit, part_name_edit,
        user_mail_approval_edit, user_mail_unusual_category_edit, user_mail_unusual_trend_edit) {

        var selectProductFamily = document.getElementById('line_edit');
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('line_edit').value = line_edit;
        document.getElementById('product_family_edit').value = product_family_edit;
        document.getElementById('part_no_edit').value = part_no_edit;
        document.getElementById('part_name_edit').value = part_name_edit;

        loadSelectbox('user_mail_approval_edit', user_mail_approval_edit)
        loadSelectbox('user_mail_unusual_category_edit', user_mail_unusual_category_edit)
        loadSelectbox('user_mail_unusual_trend_edit', user_mail_unusual_trend_edit)

        //get line value begin
        if (product_family_edit == "") {
            while (selectProductFamily.firstChild) {
                selectProductFamily.removeChild(selectProductFamily.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectProductFamily.appendChild(opt);
        } else {
            while (selectProductFamily.firstChild) {
                selectProductFamily.removeChild(selectProductFamily.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = line_edit;
            opt.innerHTML = line_edit;
            selectProductFamily.appendChild(opt);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);
                    for (i = 0; i < myArr.length; i++) {
                        if (myArr[i] != line_edit) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectProductFamily.appendChild(opt);
                            // console.log(opt, i)
                        }

                    }
                }
            };
            // xmlhttp.open("GET", url, true);
            var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
            xmlhttp.open("GET", link_get_data + "?auto_popup_line=yes&product_family=" + product_family_edit, true);
            xmlhttp.send();
        }
        //get line value end

        // Get email 

        // User for check value duplicate or '' // Loc mang
        data_part_no_array_edit = data_part_no_array.filter(function(value, index, arr) {
            return value != part_no_edit;
        });

        $("#edit_product_code").modal('toggle');
    }

    function deleteMaSanPham(id_del) {
        document.getElementById('del_id').value = id_del;
        $("#myDelete").modal('toggle');
    }

    function auto_popup_line(action) {
        if (action == "register") {
            var product_family = document.getElementById('product_family_input').value;
            var selectLine = document.getElementById('line_input');
            if (product_family == "") {
                while (selectLine.firstChild) {
                    selectLine.removeChild(selectLine.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
                selectLine.appendChild(opt);
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        while (selectLine.firstChild) {
                            selectLine.removeChild(selectLine.firstChild);
                        }
                        var opt = null;
                        opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Chọn line";
                        selectLine.appendChild(opt);
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectLine.appendChild(opt);
                        }
                    }
                };
                // xmlhttp.open("GET", url, true);
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_line=yes&product_family=" + product_family, true);
                xmlhttp.send();
            }
        } else if (action == "edit") {
            var product_family = document.getElementById('product_family_edit').value;
            var selectProductFamily = document.getElementById('line_edit');

            if (product_family == "") {
                while (selectProductFamily.firstChild) {
                    selectProductFamily.removeChild(selectProductFamily.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
                selectProductFamily.appendChild(opt);
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        while (selectProductFamily.firstChild) {
                            selectProductFamily.removeChild(selectProductFamily.firstChild);
                        }
                        var opt = null;
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectProductFamily.appendChild(opt);
                        }
                    }
                };

                // xmlhttp.open("GET", url, true);
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_line=yes&product_family=" + product_family, true);
                xmlhttp.send();
            }
        }
    }

    function register_product_btn() {
        disableBtn('product_btn');
        product_familyElement = document.getElementById('product_family_input');
        product_family = product_familyElement.value;
        lineElement = document.getElementById('line_input');
        line = lineElement.value.trim();
        part_noElement = document.getElementById('part_no_input');
        part_no = part_noElement.value.trim();
        part_nameElement = document.getElementById('part_name_input');
        part_name = part_nameElement.value.trim();
        user_mail_approvalElement = document.getElementById('user_mail_approval_input');
        user_mail_approval = user_mail_approvalElement.value.trim();
        user_mail_unusual_categoryElement = document.getElementById('user_mail_unusual_category_input');
        user_mail_unusual_category = user_mail_unusual_categoryElement.value.trim();
        user_mail_unusual_trendElement = document.getElementById('user_mail_unusual_trend_input');
        user_mail_unusual_trend = user_mail_unusual_trendElement.value.trim();

        check_part_no = checkInputValue(data_part_no_array, 'part_no_input', 'part_no_input_err', true)
        check_line = checkInputValue([], 'line_input', 'line_input_err', false)
        check_product_family = checkInputValue([], 'product_family_input', 'product_family_input_err', false)
        check_product_family = checkInputValue([], 'part_name_input', 'part_name_input_err', false)
        check_user_mail_approval = checkInputValue([], 'user_mail_approval_input', 'user_mail_approval_input_err', false)
        check_user_mail_unusual_category = checkInputValue([], 'user_mail_unusual_category_input', 'user_mail_unusual_category_input_err', false)
        check_user_mail_unusual_trend = checkInputValue([], 'user_mail_unusual_trend_input', 'user_mail_unusual_trend_input_err', false)

        var check = check_part_no && check_line && check_product_family && check_product_family && check_user_mail_unusual_category && check_user_mail_unusual_trend && check_user_mail_approval
        if (check) {
            document.getElementById('product_code_form_input').submit()
        }
    }

    function edit_product_btn() {
        disableBtn('product_btn_edit');

        product_familyElement = document.getElementById('product_family_edit');
        product_family = product_familyElement.value;
        lineElement = document.getElementById('line_edit');
        line = lineElement.value.trim();
        part_noElement = document.getElementById('part_no_edit');
        part_no = part_noElement.value.trim();
        part_nameElement = document.getElementById('part_name_edit');
        part_name = part_nameElement.value.trim();
        user_mail_approvalElement = document.getElementById('user_mail_approval_edit');
        user_mail_approval = user_mail_approvalElement.value.trim();
        user_mail_unusual_categoryElement = document.getElementById('user_mail_unusual_category_edit');
        user_mail_unusual_category = user_mail_unusual_categoryElement.value.trim();
        user_mail_unusual_trendElement = document.getElementById('user_mail_unusual_trend_edit');
        user_mail_unusual_trend = user_mail_unusual_trendElement.value.trim();



        check_part_no = checkInputValue(data_part_no_array_edit, 'part_no_edit', 'part_no_edit_err', true)
        check_line = checkInputValue([], 'line_edit', 'line_edit_err', false)
        check_product_family = checkInputValue([], 'product_family_edit', 'product_family_edit_err', false)
        check_product_family = checkInputValue([], 'part_name_edit', 'part_name_edit_err', false)
        check_user_mail_approval = checkInputValue([], 'user_mail_approval_edit', 'user_mail_approval_edit_err', false)
        check_user_mail_unusual_category = checkInputValue([], 'user_mail_unusual_category_edit', 'user_mail_unusual_category_edit_err', false)
        check_user_mail_unusual_trend = checkInputValue([], 'user_mail_unusual_trend_edit', 'user_mail_unusual_trend_edit_err', false)

        var check = check_part_no && check_line && check_product_family && check_product_family && check_user_mail_unusual_category && check_user_mail_unusual_trend && check_user_mail_approval
        if (check) {
            document.getElementById('product_code_form_edit').submit()
        }
    }
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>
<script type="text/javascript">
    var data_part_no_array = <?php echo json_encode($data_part_no_array); ?>;
    var data_part_no_array_edit
</script>
<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"  />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script> -->

<script>
    $(document).ready(function() {
        $('.select2').select2({});

    });
</script>