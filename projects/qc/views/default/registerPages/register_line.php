<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_line
$sqlcheck_line = "SELECT * FROM `qc_tb_line` ORDER BY `id` DESC";
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
        $data_line_array[$i] = $row['line'];
        $i++;
        // $data_line_array[$i] = $row['line']; //--> create Object

    }
} else {
    $data_line[0][0] = 0;
    $data_line[0][1] = '';
    $data_line[0][2] = '';
    $data_line_array[0]='';
}


?>
<script type="text/javascript">
    var data_line_array = <?php echo json_encode($data_line_array); ?>;
    var data_line_array_edit
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
                                <h3 class="card-title">Danh Sách Line</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_line">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký line
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="line_table"class="table table-hover text-nowrap table-bordered text-center">
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
    <!-- Form them san fam -->
    <form id="register_line_form" name="register_line_form" class="needs-validation" novalidate required action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_line" tabindex="-1" role="dialog" aria-labelledby="exadd_line" aria-hidden="true">
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
                            <label for="product_family_input" class="col-form-label">Dòng Sản Phẩm</label>
                            <select required class="form-control" id="product_family_input" name="product_family_input">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                            <small id="product_family_err" class='invalid-feedback'>Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="line" class="col-form-label">Line</label>
                            <input required type="text" maxlength="200" class="form-control" id="line" name="line" placeholder="Nhập line">
                            <small id="line_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="register_line_function" name="register_line_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button"id='line_btn'  onclick="register_line_btn()" class="btn btn-primary">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- form edit  -->
    <form id="register_line_form_edit" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line"; ?>" method="post">

        <!-- Modal edit sản phẩm -->
        <div class="modal fade" id="edit_product_line" tabindex="-1" role="dialog" aria-labelledby="exedit_product_line" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_product_line">Sửa Thông Tin Line</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='form_test'>
                        <div class="form-group">
                            <label for="product_family_edit" class="col-form-label">Dòng Sản Phẩm</label>
                            <select class="form-control" id="product_family_edit" name="product_family_edit">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                            <small id="product_family_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                        <div class="form-group">
                            <label for="line_edit" class="col-form-label">Line</label>
                            <input type="text" maxlength="200" class="form-control" id="line_edit" name="line_edit" placeholder="Nhập line">
                            <small id="line_edit_err" class="invalid-feedback">Không để trống</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="edit_line_function" name="edit_line_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="btn_line_edit" class="btn btn-primary" onclick='edit_line_btn()'>Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- form delete  -->
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line"; ?>" method="post">
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
                        <input required type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-outline-light" name="delete_line_function" id="delete_line_function">Xóa</button>
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
    createDataTable('line_table', 10, true);
</script>


<script type="text/javascript">
    function editLine(id_edit, line_edit, product_family_edit) {

        document.getElementById('edit_id').value = id_edit;
        document.getElementById('product_family_edit').value = product_family_edit;
        document.getElementById('line_edit').value = line_edit;
        data_line_array_edit = data_line_array.filter(function(value, index, arr) {
            return value != line_edit;
        });
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

    function register_line_btn() {
        disableBtn('line_btn');
        product_familyElement = document.getElementById('product_family_input');
        product_family = product_familyElement.value;
        lineElement = document.getElementById('line');
        line = lineElement.value.trim();
        console.log(line)
        checkLine = checkInputValue(data_line_array, 'line', 'line_err', true)
        checkProductFamily = checkInputValue(data_line_array, 'product_family_input', 'product_family_err', false)
        console.log(checkLine, checkProductFamily)
        if (checkLine && checkProductFamily) {
            document.getElementById('register_line_form').submit()
        }
    }

    function edit_line_btn() {
        disableBtn('btn_line_edit');
        product_familyElement = document.getElementById('product_family_edit');
        product_family = product_familyElement.value;
        lineElement = document.getElementById('line_edit');
        line = lineElement.value.trim();

        checkLine = checkInputValue(data_line_array_edit, 'line_edit', 'line_edit_err', true)
        checkProductFamily = checkInputValue(data_line_array, 'product_family_edit', 'product_family_edit_err', false)
        console.log(checkLine, checkProductFamily)
        if (checkLine && checkProductFamily) {
            document.getElementById('register_line_form_edit').submit()
        }
    }
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>