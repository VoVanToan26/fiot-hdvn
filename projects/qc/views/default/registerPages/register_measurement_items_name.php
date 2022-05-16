<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_measurement_items_name
$sqlcheck_measurement_items_name = "SELECT * FROM `qc_tb_measurement_items_name` ORDER BY `id` DESC";
$resultcheck_measurement_items_name = mysqli_query($connect, $sqlcheck_measurement_items_name);
// $check_measurement_items_name = mysqli_fetch_assoc( $resultcheck_measurement_items_name );
if ($resultcheck_measurement_items_name && $resultcheck_measurement_items_name->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_measurement_items_name->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_measurement_items_name[$i][0] = $row['id'];
        $data_measurement_items_name[$i][1] = $row['product_family'];
        $data_measurement_items_name[$i][2] = $row['line'];
        $data_measurement_items_name[$i][3] = $row['part_no'];
        $data_measurement_items_name[$i][4] = $row['process'];
        $data_measurement_items_name[$i][5] = $row['measurement_items'];
        $i++;
    }
} else {
    $data_measurement_items_name[0][0] = 0;
    $data_measurement_items_name[0][1] = '';
    $data_measurement_items_name[0][2] = '';
    $data_measurement_items_name[0][3] = '';
    $data_measurement_items_name[0][4] = '';
    $data_measurement_items_name[0][5] = '';
}

//select qc_tb_part_no
$sqlcheck_part_no = "SELECT DISTINCT `product_family` FROM `qc_tb_part_no` ORDER BY `product_family` ASC";
$resultcheck_part_no = mysqli_query($connect, $sqlcheck_part_no);
// $check_part_no = mysqli_fetch_assoc( $resultcheck_part_no );
if ($resultcheck_part_no && $resultcheck_part_no->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_part_no->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_part_no[$i] = $row['product_family'];
        $i++;
    }
} else {
    $data_part_no[0] = '';
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
                                <h3 class="card-title">Danh Sách Tên Hạng Mục</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_measurement_items_name">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký tên hạng mục.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="measurement_item_name_table"class="table table-hover  table-bordered text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="width: 16%">Dòng Sản Phẩm</th>
                                        <th style="width: 16%">Line</th>
                                        <th style="width: 16%">Mã Sản Phẩm</th>
                                        <th style="width: 16%">Công Đoạn</th>
                                        <th style="width: 16%">Tên Hạng Mục</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt_measurement_items_name = 0;
                                    for ($i = 0; $i < count($data_measurement_items_name); $i++) {
                                        $stt_measurement_items_name++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_measurement_items_name . '</td>
                                            <td>' . $data_measurement_items_name[$i][1] . '</td>
                                            <td>' . $data_measurement_items_name[$i][2] . '</td>
                                            <td>' . $data_measurement_items_name[$i][3] . '</td>
                                            <td>' . $data_measurement_items_name[$i][4] . '</td>
                                            <td>' . $data_measurement_items_name[$i][5] . '</td>';
                                        echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editmeasurementItemsName(' . $data_measurement_items_name[$i][0] . ',' . '\'' . $data_measurement_items_name[$i][1] . '\'' . ',' . '\'' . $data_measurement_items_name[$i][2] . '\'' . ',' . '\'' . $data_measurement_items_name[$i][3] . '\'' . ',' . '\'' . $data_measurement_items_name[$i][4] . '\'' . ',' . '\'' . $data_measurement_items_name[$i][5] . '\''  . ')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deletemeasurementItemsName(' . $data_measurement_items_name[$i][0] . ',' . '\'' . $data_measurement_items_name[$i][5] . '\'' . ')">Xóa</button></td>';
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
    <form onsubmit="checkForm()" id='register_MIN_form_input' needs-validation action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_measurement_items_name" tabindex="-1" role="dialog" aria-labelledby="exadd_measurement_items_name" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_measurement_items_name">Đăng Ký Tên Hạng Mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_family_input" class="col-form-label">Dòng Sản Phẩm</label>
                            <select required class="form-control" id="product_family_input" name="product_family_input" onchange="auto_popup_line('register');">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>

                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group">
                            <label for="line_input" class="col-form-label">Line</label>
                            <select required class="form-control" id="line_input" name="line_input" onchange="auto_popup_part_no('register');auto_popup_process('register');">
                                <option value="">Vui lòng chọn dòng sản phẩm trước</option>

                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group">
                            <label for="part_no_input" class="col-form-label">Mã Sản Phẩm</label>
                            <select required class="form-control" id="part_no_input" name="part_no_input">
                                <option value="">Vui lòng chọn line trước</option>

                            </select>
                            <small class="invalid-feedback " id="part_no_input_err" name="part_no_input_err">Vui lòng nhập đủ thông tin</small>
                        </div>

                        <div class="form-group">
                            <label for="process_input" class="col-form-label">Công Đoạn</label>
                            <select required class="form-control" id="process_input" name="process_input">
                                <option value="">Vui lòng chọn line trước</option>

                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group">
                            <label for="measurement_items_name_input" class="col-form-label">Tên Hạng Mục</label>
                            <input required type="text" maxlength="200" class="form-control" id="measurement_items_name_input" name="measurement_items_name_input" placeholder="Nhập tên hạng mục">
                            <small class="invalid-feedback" id="measurement_items_name_input_err" name="measurement_items_name_input_err">Vui lòng nhập đủ thông tin</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input value="true" id="register_measurement_items_name_function" name="register_measurement_items_name_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="measurement_item_btn"class="btn btn-primary" onclick="register_measurement_item_btn()">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form onsubmit="checkForm()" id='register_MIN_form_edit' needs-validation action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name"; ?>" method="post">
        <!-- Modal edit sản phẩm -->
        <div class="modal fade" id="edit_measurement_items_name" tabindex="-1" role="dialog" aria-labelledby="exadd_measurement_items_name" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                <input type="hidden" id="edit_id" name="edit_id"value="true">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exedit_measurement_items_name">Sửa Thông Tin Hạng Mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_family_edit" class="col-form-label">Dòng Sản Phẩm</label>
                            <select required class="form-control" id="product_family_edit" name="product_family_edit" onchange="auto_popup_line('edit');">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>

                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group">
                            <label for="line_edit" class="col-form-label">Line</label>
                            <select required class="form-control" id="line_edit" name="line_edit" onchange="auto_popup_part_no('edit');auto_popup_process('edit');">
                                <option value="">Vui lòng chọn dòng sản phẩm trước</option>

                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group">
                            <label for="part_no_edit" class="col-form-label">Mã Sản Phẩm</label>
                            <select required class="form-control" id="part_no_edit" name="part_no_edit">
                                <option value="">Vui lòng chọn line trước</option>

                            </select>
                            <small class="invalid-feedback " id="part_no_edit_err" name="part_no_edit_err">Vui lòng nhập đủ thông tin</small>
                        </div>

                        <div class="form-group">
                            <label for="process_edit" class="col-form-label">Công Đoạn</label>
                            <select required class="form-control" id="process_edit" name="process_edit">
                                <option value="">Vui lòng chọn line trước</option>

                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group">
                            <label for="measurement_items_name_edit" class="col-form-label">Tên Hạng Mục</label>
                            <input required type="text" maxlength="200" class="form-control" id="measurement_items_name_edit" name="measurement_items_name_edit" placeholder="Nhập tên hạng mục">
                            <small class="invalid-feedback" id="measurement_items_name_edit_err" name="measurement_items_name_edit_err">Vui lòng nhập đủ thông tin</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input value="true" id="edit_measurement_items_name_function" name="edit_measurement_items_name_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="measurement_item_btn_edit" class="btn btn-primary" onclick="edit_measurement_item_btn()">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form  id='register_MIN_form_delete' needs-validation action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name"; ?>" method="post">

        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Hạng Mục</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin hạng mục: <span id="delete_measurement_items_name_input"></span> ?
                        </p>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_measurement_items_name_function" id="delete_measurement_items_name_function">Xóa</button>
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
    createDataTable('measurement_item_name_table', 10, true);
</script>

<script type="text/javascript">
    function auto_popup_line(action) {
        if (action == "register") {
            var product_family = document.getElementById('product_family_input').value.trim();
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
            var product_family = document.getElementById('product_family_edit').value.trim();
            var selectLine = document.getElementById('line_edit');

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
        }
    }

    function auto_popup_process(action) {
        if (action == "register") {
            var line_input = document.getElementById('line_input').value.trim();
            var selectLine = document.getElementById('process_input');

            if (line_input == "") {
                while (selectLine.firstChild) {
                    selectLine.removeChild(selectLine.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn line trước";
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
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectLine.appendChild(opt);
                        }
                    }
                };
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_process=yes&line_input=" + line_input, true);
                xmlhttp.send();
            }
        } else if (action == "edit") {
            var line_edit = document.getElementById('line_edit').value.trim();
            var selectLine = document.getElementById('process_edit');

            if (line_edit == "") {
                while (selectLine.firstChild) {
                    selectLine.removeChild(selectLine.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn line trước";
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
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectLine.appendChild(opt);
                        }
                    }
                };
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_process=yes&line_input=" + line_edit, true);
                xmlhttp.send();
            }
        }
        // xmlhttp.open("GET", url, true);
    }

    function auto_popup_part_no(action) {
        if (action == "register") {
            var product_family = document.getElementById('product_family_input').value.trim();
            var line_input = document.getElementById('line_input').value.trim();
            var selectPartNo = document.getElementById('part_no_input');
            // console.log(line_input)
            if (line_input == "") {
                while (selectPartNo.firstChild) {
                    selectPartNo.removeChild(selectPartNo.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn line trước";
                selectPartNo.appendChild(opt);
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        while (selectPartNo.firstChild) {
                            selectPartNo.removeChild(selectPartNo.firstChild);
                        }
                        var opt = null;
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectPartNo.appendChild(opt);
                        }
                    }
                };
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family + "&line=" + line_input, true);
                xmlhttp.send();
            }
        } else if (action == "edit") {
            var product_family = document.getElementById('product_family_edit').value.trim();
            var line_edit = document.getElementById('line_edit').value.trim();
            var selectPartNo = document.getElementById('part_no_edit');

            if (line_edit == "") {
                while (selectPartNo.firstChild) {
                    selectPartNo.removeChild(selectPartNo.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn line trước";
                selectPartNo.appendChild(opt);
            } else {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        while (selectPartNo.firstChild) {
                            selectPartNo.removeChild(selectPartNo.firstChild);
                        }
                        var opt = null;
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectPartNo.appendChild(opt);
                        }
                    }
                };
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family + "&line=" + line_edit, true);
                xmlhttp.send();
            }
        }
        // xmlhttp.open("GET", url, true);
    }


    function editmeasurementItemsName(id_edit, product_family_edit, line_edit, part_no_edit, process_edit, measurement_items_name_edit) {
        var selectProductFamily = document.getElementById('line_edit');
        var selectLine1 = document.getElementById('process_edit');
        var selectLine2 = document.getElementById('part_no_edit');
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('product_family_edit').value = product_family_edit;

        document.getElementById('line_edit').value= line_edit;
        document.getElementById('part_no_edit').value= part_no_edit;
        document.getElementById('process_edit').value = process_edit;
        document.getElementById('measurement_items_name_edit').value = measurement_items_name_edit;
        // get line
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
                        }

                    }
                }
            };
            // xmlhttp.open("GET", url, true);
            var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
            xmlhttp.open("GET", link_get_data + "?auto_popup_line=yes&product_family=" + product_family_edit, true);
            xmlhttp.send();
        }

        //get process
        if (process_edit == "") {
            while (selectLine1.firstChild) {
                selectLine1.removeChild(selectLine1.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectLine1.appendChild(opt);
        } else {
            while (selectLine1.firstChild) {
                selectLine1.removeChild(selectLine1.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = process_edit;
            opt.innerHTML = process_edit;
            selectLine1.appendChild(opt);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);
                    for (i = 0; i < myArr.length; i++) {
                        if (myArr[i] != process_edit) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectLine1.appendChild(opt);
                        }
                    }
                }
            };
            // xmlhttp.open("GET", url, true);
            var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
            xmlhttp.open("GET", link_get_data + "?auto_popup_process=yes&line_input=" + line_edit, true);
            xmlhttp.send();
        }

        //get part_no
        if (part_no_edit == "") {
            while (selectLine2.firstChild) {
                selectLine2.removeChild(selectLine2.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectLine2.appendChild(opt);
        } else {
            while (selectLine2.firstChild) {
                selectLine2.removeChild(selectLine2.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = part_no_edit;
            opt.innerHTML = part_no_edit;
            selectLine2.appendChild(opt);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);

                    for (i = 0; i < myArr.length; i++) {
                        if (myArr[i] != part_no_edit) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectLine2.appendChild(opt);
                        }

                    }
                }
            };
            // xmlhttp.open("GET", url, true);
            var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
            // xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&line=" + line_edit, true);
            xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family_edit + "&line=" + line_edit, true);
            xmlhttp.send();
        }


        $("#edit_measurement_items_name").modal('toggle');
            // console.log(data_measurement_items_name)
        for (let i = 0; i < data_measurement_items_name.length; i++) {
            if (data_measurement_items_name[i][2] == line_edit && data_measurement_items_name[i][3] == part_no_edit&& data_measurement_items_name[i][4] == process_edit
            &&data_measurement_items_name[i][5]==measurement_items_name_edit) {
                data_measurement_items_name_edit=arrayRemove(data_measurement_items_name,i)
                // console.log(data_MIN_array_edit,i)
            }
        }
    }

    function deletemeasurementItemsName(id_del, measurement_items_name_del) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('delete_measurement_items_name_input').innerHTML = measurement_items_name_del;
        $("#myDelete").modal('toggle');
    }

    function warning() {
        // console.log("start");
        $("#myWarning").modal('toggle');

    }

    function register_measurement_item_btn() {
        disableBtn('measurement_item_btn');
        measurement_items_nameElement = document.getElementById('measurement_items_name_input');
        measurement_items_name = measurement_items_nameElement.value.trim();
        var checkform = formValidation('register_MIN_form_input')
          // caculate data_MIN_array
      
        // console.log(checkform)
        if (checkform) {
            caculate_array()
            check_measurement_items_name = checkInputValue(data_MIN_array, 'measurement_items_name_input', 'measurement_items_name_input_err', true)
           // alert(data_MIN_array,measurement_items_name,check_measurement_items_name)
            if (check_measurement_items_name) {
                document.getElementById('register_MIN_form_input').submit()
            }
        }


    }

    function edit_measurement_item_btn() {
        disableBtn('measurement_item_btn_edit');
        measurement_items_nameElement = document.getElementById('measurement_items_name_edit');
        measurement_items_name = measurement_items_nameElement.value.trim();
        var checkform = formValidation('register_MIN_form_edit')
        // console.log(checkform)
        if (checkform) {
            // caculate data_MIN_array_edit
            caculate_array_edit()
            console.log(data_MIN_array_edit,measurement_items_name)
            check_measurement_items_name = checkInputValue(data_MIN_array_edit, 'measurement_items_name_edit', 'measurement_items_name_edit_err', true)
            if (check_measurement_items_name) {
                document.getElementById('register_MIN_form_edit').submit()
            }
        }
    }
</script>

<!-- Check input measurement_items_name  measurement_items_name= MIN  -->
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>
<script type="text/javascript">
    var data_measurement_items_name = <?php echo json_encode($data_measurement_items_name); ?>;
    var data_measurement_items_name_edit=[]
    var data_MIN_array=[]
    var data_MIN_array_edit=[]
    // console.log(data_measurement_items_name)
    // input
    function caculate_array(){
        var lineElement = document.getElementById('line_input');
        var lineValue = lineElement.value.trim();
        var part_noElement = document.getElementById('part_no_input')
        var part_noValue = part_noElement.value.trim();
        var processElement = document.getElementById('process_input')
        var processValue = processElement.value.trim();
        // console.log(lineValue,part_noValue,processValue)

        data_MIN_array = [];
        for (let i = 0; i < data_measurement_items_name.length; i++) {
           
            if (data_measurement_items_name[i][2] == lineValue && data_measurement_items_name[i][3] == part_noValue && data_measurement_items_name[i][4] == processValue) {
                data_MIN_array.push(data_measurement_items_name[i][5])
            }
        }
        // console.log(data_MIN_array)
    }
    //edit
    function caculate_array_edit(){
        var lineElement = document.getElementById('line_edit');
        var lineValue = lineElement.value.trim();
        var part_noElement = document.getElementById('part_no_edit')
        var part_noValue = part_noElement.value.trim();
        var processElement = document.getElementById('process_edit')
        var processValue = processElement.value.trim();
        data_MIN_array_edit = [];
        for (let i = 0; i < data_measurement_items_name_edit.length; i++) {
            if (data_measurement_items_name_edit[i][2] == lineValue && data_measurement_items_name_edit[i][3] == part_noValue&&data_measurement_items_name_edit[i][4] == processValue) {
                data_MIN_array_edit.push(data_measurement_items_name_edit[i][5])
          
            }
        }
        // console.log(data_MIN_array_edit)
    }

</script>
<!-- Check input measurement_items_name  measurement_items_name= MIN  END-->