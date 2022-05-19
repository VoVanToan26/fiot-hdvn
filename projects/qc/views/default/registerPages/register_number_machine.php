<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_number_machine
$sqlcheck_number_machine = "SELECT * FROM `qc_tb_machine_number` ORDER BY `id` DESC";
$resultcheck_number_machine = mysqli_query($connect, $sqlcheck_number_machine);
// $check_number_machine = mysqli_fetch_assoc( $resultcheck_number_machine );
if ($resultcheck_number_machine && $resultcheck_number_machine->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_number_machine->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_number_machine[$i][0] = $row['id'];
        $data_number_machine[$i][1] = $row['product_family'];
        $data_number_machine[$i][2] = $row['line'];
        $data_number_machine[$i][3] = $row['process'];
        $data_number_machine[$i][4] = $row['number_machine'];
        $i++;
    }
} else {
    $data_number_machine[0][0] = 0;
    $data_number_machine[0][1] = '';
    $data_number_machine[0][2] = '';
    $data_number_machine[0][3] = '';
    $data_number_machine[0][4] = '';
}

//select qc_tb_line
$sqlcheck_line = "SELECT * FROM `qc_tb_line` ORDER BY `id` ASC";
$resultcheck_line = mysqli_query($connect, $sqlcheck_line);
// $check_line = mysqli_fetch_assoc( $resultcheck_line );
if ($resultcheck_line && $resultcheck_line->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_line->fetch_assoc()) {
        //thêm kết quả vào mảng
        $product_family[$i] = $row['product_family'];
        $data_line[$i] = $row['line'];
        $i++;
    }
} else {
    $product_family[0] = '';
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
                                <h3 class="card-title">Danh Sách Mã Máy</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_number_machine">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký mã máy.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="number_machine_table" class="table table-hover  table-bordered text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="width: 20%">Dòng sản phẩm</th>
                                        <th style="width: 20%">Tên Line</th>
                                        <th style="width: 20%">Công đoạn</th>
                                        <th style="width: 20%">Tên Máy</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt_number_machine = 0;
                                    for ($i = 0; $i < count($data_number_machine); $i++) {
                                        $stt_number_machine++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_number_machine . '</td>
                                            <td>' . $data_number_machine[$i][1] . '</td>
                                            <td>' . $data_number_machine[$i][2] . '</td>
                                            <td>' . $data_number_machine[$i][3] . '</td>
                                            <td>' . $data_number_machine[$i][4] . '</td>';
                                        echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editNumberMachine(' . $data_number_machine[$i][0] . ',' . '\'' . $data_number_machine[$i][1] . '\'' . ',' . '\'' . $data_number_machine[$i][2] . '\'' . ',' . '\'' . $data_number_machine[$i][3] . '\''  . ',' . '\'' . $data_number_machine[$i][4] . '\''  . ')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteNumberMachine(' . $data_number_machine[$i][0] . ',' . '\'' . $data_number_machine[$i][4] . '\'' . ')">Xóa</button></td>';
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
    <form id="register_number_machine_form_input" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_number_machine" tabindex="-1" role="dialog" aria-labelledby="exadd_number_machine" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_number_machine">Đăng Ký Mã Máy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_family_input" class="col-form-label">Dòng sản phẩm</label>
                            <!-- <input type="text" maxlength="20" class="form-control" id="line" name="line" placeholder="Nhập line"> -->
                            <select  class="form-control" id="product_family_input" name="product_family_input" onchange="auto_popup_line('register')">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                              
                            </select>
                            <small id="product_family_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div required class="form-group">
                            <label for="line_input" class="col-form-label">Line</label>
                            <!-- <input type="text" maxlength="20" class="form-control" id="line" name="line" placeholder="Nhập line"> -->
                            <select class="form-control" id="line_input" name="line_input">
                                <option value="">Vui lòng chọn dòng sản phẩm trước</option>
                                <?php
                                for ($i = 0; $i < count($data_line); $i++) {
                                    echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="line_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div required class="form-group">
                            <label for="process_input" class="col-form-label">Công Đoạn</label>
                            <input type="text" maxlength="200" class="form-control" id="process_input" name="process_input" placeholder="Nhập công đoạn">
                            <small id="process_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="number_machine_input" class="col-form-label">Mã Máy</label>
                            <input type="text" maxlength="200" class="form-control" id="number_machine_input" name="number_machine_input" placeholder="Nhập mã máy">
                            <small id="number_machine_input_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="register_number_machine_function" name="register_number_machine_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="number_machine_btn" class="btn btn-primary" onclick="register_number_machine_btn()">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Edit -->
    <form id="register_number_machine_form_edit" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine"; ?>" method="post">
        <!-- Modal edit mã máy -->
        <div class="modal fade" id="edit_number_machine_model" tabindex="-1" role="dialog" aria-labelledby="exedit_number_machine" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_number_machine">Đăng Ký Mã Máy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div required class="form-group">
                            <label for="product_family_edit" class="col-form-label">Dòng sản phẩm</label>
                            <!-- <input type="text" maxlength="20" class="form-control" id="line" name="line" placeholder="Nhập line"> -->
                            <select class="form-control" id="product_family_edit" name="product_family_edit" onchange="auto_popup_line('edit')">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                            <small id="product_family_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div required class="form-group">
                            <label for="line_edit" class="col-form-label">Line</label>
                            <!-- <input type="text" maxlength="20" class="form-control" id="line" name="line" placeholder="Nhập line"> -->
                            <select class="form-control" id="line_edit" name="line_edit">
                                <option value=''>Vui lòng chọn dòng sản phẩm trước</option>
                                <?php
                                for ($i = 0; $i < count($data_line); $i++) {
                                    echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                }
                                ?>
                            </select>
                            <small id="line_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div required class="form-group">
                            <label for="process_edit" class="col-form-label">Công Đoạn</label>
                            <input type="text" maxlength="200" class="form-control" id="process_edit" name="process_edit" placeholder="Nhập công đoạn">
                            <small id="process_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div required class="form-group">
                            <label for="number_machine_edit" class="col-form-label">Mã Máy</label>
                            <input type="text" maxlength="200" class="form-control" id="number_machine_edit" name="number_machine_edit" placeholder="Nhập mã máy">
                            <small id="number_machine_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="edit_number_machine_function" name="edit_number_machine_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="number_machine_btn_edit"class="btn btn-primary" onclick="edit_number_machine_btn()">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="register_number_machine_form_delete" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine"; ?>" method="post">
        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Mã Máy</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin mã máy: <span id="delete_number_machine_input"></span> ?</p>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_number_machine_function" id="delete_number_machine_function">Xóa</button>
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
    createDataTable('number_machine_table', 10, true);
</script>

<script type="text/javascript">
    var data_check_process = <?php echo json_encode($data_number_machine); ?>;
    var data_check_process_edit=[];
    // console.log(data_check_process)
    var data_process_array  = [];
    var data_process_array_edit=[];
    var data_number_machine_array  = [];
    var data_number_machine_array_edit=[];
    
</script>
<script type="text/javascript">
    function editNumberMachine(id_edit, product_family_edit, line_edit, process_edit, number_machine_edit) {
        document.getElementById('product_family_edit').value = product_family_edit;
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('line_edit').value = line_edit;
        document.getElementById('process_edit').value = process_edit;
        document.getElementById('number_machine_edit').value = number_machine_edit;
        // console.log(data_check_process)
        data_check_process_edit=<?php echo json_encode($data_number_machine); ?>;
        // Trả về hai mảng khi dong và line cố định
        for (var i = 0; i < data_check_process_edit.length; i++) {
            if (
            product_family_edit == data_check_process_edit[i][1]&&
            line_edit == data_check_process_edit[i][2]&&
            process_edit==data_check_process_edit[i][3]&&
            number_machine_edit == data_check_process_edit[i][4]) {
                data_check_process_edit.splice(i,1)
            }
        }
        // console.log(data_check_process_edit,data_check_process)
    
        $("#edit_number_machine_model").modal('toggle');
    }

    function deleteNumberMachine(id_del, line_del) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('delete_number_machine_input').innerHTML = line_del;
        $("#myDelete").modal('toggle');
    }

    function warning() {
        // console.log("start");
        $("#myWarning").modal('toggle');
    }

    function register_number_machine_btn() {
        disableBtn('number_machine_btn');
        number_machineElement = document.getElementById('number_machine_input');
        number_machine = number_machineElement.value.trim();
        lineElement = document.getElementById('line_input');
        line = lineElement.value.trim();
        product_familyElement = document.getElementById('product_family_input');
        product_family = product_familyElement.value.trim();
        processElement = document.getElementById('process_input');
        process = processElement.value.trim();

        data_process_array=[];
        data_number_machine_array=[];
        // Trả về hai mảng khi dong và line cố định
        for (var i = 0; i < data_check_process.length; i++) {
            if (product_family == data_check_process[i][1]&&line == data_check_process[i][2]) {
                data_process_array.push(data_check_process[i][3]);
                // data_number_machine_array.push(data_check_process[i][4]);
            }
        }

        checkProductFamily = checkInputValue([], 'product_family_input', 'product_family_input_err', false);
        checkLine = checkInputValue([], 'line_input', 'line_input_err', false);
        
        checkProcess = checkInputValue(data_process_array, 'process_input', 'process_input_err', true);
        // checkNumberMachine = checkInputValue( data_number_machine_array, 'number_machine_input', 'number_machine_input_err', true);

        if (checkProcess && checkLine &&checkProductFamily) {
            document.getElementById('register_number_machine_form_input').submit();
        }
    }

    function edit_number_machine_btn() {
        disableBtn('number_machine_btn_edit');
        number_machineElement = document.getElementById('number_machine_edit');
        number_machine = number_machineElement.value.trim();
        lineElement = document.getElementById('line_edit');
        line = lineElement.value.trim();
        product_familyElement = document.getElementById('product_family_edit');
        product_family = product_familyElement.value.trim();
        processElement = document.getElementById('process_edit');
        process = processElement.value.trim();
        // Find line ==  return data_process_array
        data_process_array_edit=[];
        data_number_machine_array_edit=[];
        // Trả về hai mảng khi dong và line cố định
        for (var i = 0; i < data_check_process_edit.length; i++) {
            if (product_family == data_check_process_edit[i][1]&&line == data_check_process_edit[i][2]) {
                data_process_array_edit.push(data_check_process_edit[i][3]);
                data_number_machine_array_edit.push(data_check_process_edit[i][4]);
            }
        }
        checkProductFamily = checkInputValue([], 'product_family_edit', 'product_family_edit_err', false);
        checkLine = checkInputValue([], 'line_edit', 'line_edit_err', false);
        
        checkProcess = checkInputValue(data_process_array_edit, 'process_edit', 'process_edit_err', true);
        // checkNumberMachine = checkInputValue( data_number_machine_array_edit, 'number_machine_edit', 'number_machine_edit_err', true);
        if (checkProductFamily && checkLine &&checkProcess) {
            document.getElementById('register_number_machine_form_edit').submit()
        }
    }

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
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>