<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_measurement_items
$sqlcheck_measurement_items = "SELECT * FROM `qc_tb_measurement_items` ORDER BY `id` DESC";
$resultcheck_measurement_items = mysqli_query($connect, $sqlcheck_measurement_items);
// $check_measurement_items = mysqli_fetch_assoc( $resultcheck_measurement_items );
if ($resultcheck_measurement_items && $resultcheck_measurement_items->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_measurement_items->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_measurement_items[$i][0] = $row['id'];
        $data_measurement_items[$i][1] = $row['product_family'];
        $data_measurement_items[$i][2] = $row['part_no'];
        $data_measurement_items[$i][3] = $row['process'];
        $data_measurement_items[$i][4] = $row['line'];
        $data_measurement_items[$i][5] = $row['measurement_items'];
        $data_measurement_items[$i][6] = $row['frequency'];
        $data_measurement_items[$i][7] = $row['measuring_tools'];
        $data_measurement_items[$i][8] = $row['standard_dimension'];
        $data_measurement_items[$i][9] = $row['upper'];
        $data_measurement_items[$i][10] = $row['lower'];
        $data_measurement_items[$i][11] = $row['unit'];
        $data_measurement_items[$i][12] = $row['type_allowance'];
        $data_measurement_items[$i][13] = $row['form'];
        $data_measurement_items[$i][14] = $row['x_ucl'];
        $data_measurement_items[$i][15] = $row['x_cl'];
        $data_measurement_items[$i][16] = $row['x_lcl'];
        $data_measurement_items[$i][17] = $row['r_ucl'];
        $data_measurement_items[$i][18] = $row['r_cl'];
        $data_measurement_items[$i][19] = $row['use_formula'];
        $data_measurement_items[$i][20] = $row['type_formula'];
        $data_measurement_items[$i][21] = $row['number_element'];
        $data_measurement_items[$i][22] = $row['definition_formula'];
        $data_measurement_items[$i][23] = $row['formula'];
        $data_measurement_items[$i][24] = $row['chart'];
        $data_measurement_items[$i][25] = $row['no_measurement_items'];
        $data_measurement_items[$i][26] = $row['measuring_department'];
        $data_measurement_items[$i][27] = $row['status'];

        // $data_management_level[$i]=$row['management_level_input'];
        $i++;
    }
} else {
    $data_measurement_items[0][0] = 0;
    $data_measurement_items[0][1] = '';
    $data_measurement_items[0][2] = '';
    $data_measurement_items[0][3] = '';
    $data_measurement_items[0][4] = '';
    $data_measurement_items[0][5] = '';
    $data_measurement_items[0][6] = '';
    $data_measurement_items[0][7] = '';
    $data_measurement_items[0][8] = '';
    $data_measurement_items[0][9] = '';
    $data_measurement_items[0][10] = '';
    $data_measurement_items[0][11] = '';
    $data_measurement_items[0][12] = '';
    $data_measurement_items[0][13] = '';
    $data_measurement_items[0][14] = '';
    $data_measurement_items[0][15] = '';
    $data_measurement_items[0][16] = '';
    $data_measurement_items[0][17] = '';
    $data_measurement_items[0][18] = '';
    $data_measurement_items[0][19] = '';
    $data_measurement_items[0][20] = '';
    $data_measurement_items[0][21] = '';
    $data_measurement_items[0][22] = '';
    $data_measurement_items[0][23] = '';
    $data_measurement_items[0][24] = '';
    $data_measurement_items[0][25] = '';
    $data_measurement_items[0][27] = '';
}


//select qc_tb_frequency
$sqlcheck_frequency = "SELECT `frequency_name` FROM `qc_tb_frequency` ORDER BY `id` ASC";
$resultcheck_frequency = mysqli_query($connect, $sqlcheck_frequency);
// $check_frequency = mysqli_fetch_assoc( $resultcheck_frequency );
if ($resultcheck_frequency && $resultcheck_frequency->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_frequency->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_frequency[$i] = $row['frequency_name'];
        $i++;
    }
} else {
    $data_frequency[0] = '';
}

//select tb_measuring_tools
$sqlcheck_measuring_tools = "SELECT DISTINCT `measuring_tools` FROM `tb_measuring_tools` ORDER BY `measuring_tools` ASC";
$resultcheck_measuring_tools = mysqli_query($connect, $sqlcheck_measuring_tools);
// $check_frequency = mysqli_fetch_assoc( $resultcheck_frequency );
if ($resultcheck_measuring_tools && $resultcheck_measuring_tools->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_measuring_tools->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_measuring_tools[$i] = $row['measuring_tools'];
        $i++;
    }
} else {
    $data_measuring_tools[0] = '';
}


//select tb_measuring_tools
$sqlcheck_management_level = "SELECT * FROM `qc_tb_management_level` ORDER BY `id` ASC";
$resultcheck_management_level = mysqli_query($connect, $sqlcheck_management_level);
// $check_frequency = mysqli_fetch_assoc( $resultcheck_frequency );
if ($resultcheck_management_level && $resultcheck_management_level->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_management_level->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_management_level[$i][0] = $row['id'];
        $data_management_level[$i][1] = $row['management_level_img'];
        $data_management_level[$i][2] = $row['management_level_name'];
        $i++;
    }
} else {
    $data_management_level[0][0] = 0;
    $data_management_level[0][1] = '';
    $data_management_level[0][2] = '';
}

?>
<style type="text/css">
    .dark-mode .select2-results__option[aria-selected=true] {
        background-color: #00bc8cfa !important;
        color: #dee2e6;
    }

    .d-none {
        display: none;
    }

    .mt-38 {
        margin-top: 38px !important;
    }

    .h-38px {
        height: 38px !important;
    }

    .ml-1px {
        margin-left: 1px !important;
    }

    .symbol-class label::after {
        display: none;
    }

    .symbol-class input[type='file'] {
        display: none;
    }

    .tableFixHead {
        overflow: auto;
        height: 700px;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #343a40;
    }
</style>

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
                        <div class="card-header  d-flex flex-row justify-content-between">
                            <div class=" col-6 d-flex align-items-center">
                                <h3 class="card-title">Danh Sách Hạng Mục Đo</h3>
                            </div>
                            <div></div>
                            <div class=" col-6  d-flex d-flex justify-content-end row">
                                <!-- <input class="form-control col-3" id="inputSearch" type="text" placeholder="Search.."> -->
                                <button type="button" name="" id="" class="btn btn-primary btn-xs col-3" data-toggle="modal" data-target="#add_measurement_items">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký hạng mục đo
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0 ">
                            <table id="measurement_item_table" class="table table-hover text-nowrap text-center ">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 5%">Dòng Sản Phẩm</th>
                                        <th style="width: 5%">Mã Sản Phẩm</th>
                                        <th style="width: 5%">Line</th>
                                        <th style="width: 5%">Công Đoạn</th>

                                        <th style="width: 5%">Hạng Mục Đo</th>
                                        <th style="width: 5%">Tần Suất</th>
                                        <th style="width: 5%">Dụng Cụ Đo</th>
                                        <th style="width: 5%">Kích Thước</th>
                                        <th style="width: 5%">Cận Trên</th>
                                        <th style="width: 5%">Cận Dưới</th>
                                        <th style="width: 5%">Đơn Vị </th>
                                        <th style="width: 5%">Loại Quy Cách</th>
                                        <th style="width: 5%">Loại Biểu Đồ</th>

                                        <th style required="width: 5%">X-UCL</th>
                                        <th style required="winumber 5%">X-CL</th>
                                        <th style required="winumber 5%">X-LCL</th>
                                        <th style required="winumber 5%">R-UCL</th>
                                        <th style required="winumber 5%">R-CL</th>
                                        <!-- <th style="width: 5%">Sửa</th> -->
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt_measurement_items = 0;
                                    for ($i = 0; $i < count($data_measurement_items); $i++) {
                                        $stt_measurement_items++;
                                        echo '<tr>';
                                        echo '<td>' . $stt_measurement_items . '</td>
                                            <td>' . $data_measurement_items[$i][1] . '</td>
                                            <td>' . $data_measurement_items[$i][2] . '</td>
                                            <td>' . $data_measurement_items[$i][4] . '</td>
                                            <td>' . $data_measurement_items[$i][3] . '</td>
                                            <td>' . $data_measurement_items[$i][5] . '</td>
                                            <td>' . $data_measurement_items[$i][6] . '</td>
                                            <td>' . $data_measurement_items[$i][7] . '</td>
                                            <td>' . $data_measurement_items[$i][8] . '</td>
                                            <td>' . $data_measurement_items[$i][9] . '</td>
                                            <td>' . $data_measurement_items[$i][10] . '</td>
                                            <td>' . $data_measurement_items[$i][11] . '</td>
                                            <td>' . $data_measurement_items[$i][12] . '</td>
                                            <td>' . $data_measurement_items[$i][13] . '</td>
                                            <td>' . $data_measurement_items[$i][14] . '</td>
                                            <td>' . $data_measurement_items[$i][15] . '</td>
                                            <td>' . $data_measurement_items[$i][16] . '</td>
                                            <td>' . $data_measurement_items[$i][17] . '</td>
                                            <td>' . $data_measurement_items[$i][18] . '</td>';
                                        // echo'<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                        // onclick ="editmeasurementItemsName('. $data_measurement_items[$i][0] . ',' .'\'' .$data_measurement_items[$i][1].'\'' . ',' .'\'' .$data_measurement_items[$i][2].'\'' . ',' .'\'' .$data_measurement_items[$i][3].'\'' . ',' .'\'' .$data_measurement_items[$i][4].'\'' . ',' .'\'' .$data_measurement_items[$i][5].'\''  .')" disabled>Sửa</button></td>';
                                        echo '<td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deletemeasurementItemsName(' . $data_measurement_items[$i][0] . ',' . '\'' . $data_measurement_items[$i][5] . '\'' . ')">Xóa</button></td>';
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

    <!-- <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items"; ?>" method="post" enctype="multipart/form-data"> -->
    <!-- Modal thêm sản phẩm -->
    <form id="form_MIN_info" name="form_MIN_info" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items"; ?>" method="post" enctype="multipart/form-data">

        <div class="modal fade" id="add_measurement_items" tabindex="-1" role="dialog" aria-labelledby="exadd_measurement_items" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_measurement_items">Đăng Ký Hạng Mục Đo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Form header info -->

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="product_family_input" class="col-form-label">Dòng Sản Phẩm</label>
                                <select required class="form-control" id="product_family_input" name="product_family_input" onchange="auto_popup_line('register');">
                                    <option value="">Chọn dòng sản phẩm</option>
                                    <option value="Coil">Coil</option>
                                    <option value="Valve">Valve</option>
                                    <option value="Sensor">Sensor</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                            </div>
                            <div class="form-group col-3">
                                <label for="line_input" class="col-form-label">Line</label>
                                <select required class="form-control" id="line_input" name="line_input" onchange="auto_popup_part_no('register');">
                                    <option value="">Vui lòng chọn dòng sản phẩm trước</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="part_no_input" class="col-form-label">Mã Sản Phẩm</label>
                                <select required class="form-control" id="part_no_input" name="part_no_input" onchange="auto_popup_process('register');">
                                    <option value="">Vui lòng chọn line trước</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="process_input" class="col-form-label">Công Đoạn</label>
                                <select required class="form-control" id="process_input" name="process_input" onchange="auto_popup_measurement_items('register');">
                                    <option value="">Vui lòng chọn công đoạn trước</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <div class="row">
                                    <!-- Dropzonre begin -->
                                    <div class="col-12">
                                        <div class="">
                                            <label for="management_level_input" class="col-form-label">Cấp độ quản lý</label><br>
                                            <select class="form-control select2" style="width:100%" id="management_level_input" name="management_level_input[]" multiple aria-placeholder="Chọn hình ảnh">
                                                <!-- <option value="">Select Username</option> -->
                                                <?php
                                                for ($i = 0; $i < count($data_management_level); $i++) {
                                                    echo '<option value="' . $data_management_level[$i][1] . '">' . $data_management_level[$i][2] . '';
                                                }


                                                ?>
                                            </select>
                                            <small id="management_level_input_err" class="invalid-feedback">Không để trống</small>
                                        </div>
                                    </div>
                                    <!-- dropzone end -->
                                    <div class="col-6">
                                        <label for="" class="col-form-label">Bản Vẽ</label>
                                        <div class="row" style="border-style: ridge; border-width: 1px; border-color: #808080;">
                                            <div class="col-3">
                                                <div class="custom-file symbol-class" style="width: 100%;">
                                                    <input type="file" id="draw_input" name="draw_input" accept=".jpg,.jpeg,.png">
                                                    <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                                                    <label for="draw_input" class="col-form-label custom-label" style="border: none; cursor:pointer;padding-left:0;">
                                                        <i class="fa fa-upload"></i>
                                                        Bản vẽ-1
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 ">
                                                <img src="#" alt="" id="img-draw_input" style="display:none; height: 38px; max-width:60px;">
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <a href="JavaScript:void(0);" onclick="clearSymbol('img-draw_input');">
                                                    <i class="fa fa-trash" aria-hidden="true"> </i>
                                                    Xóa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <small class="form-text text-muted">Vui lòng chọn file có định dạng ".jpg,
                                            .jpeg, .png".
                                            Dung lượng không được vượt quá 5mb và không chứa các ký tự đặc biệt</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="chart_input" class="col-form-label">Biểu Đồ</label>
                                <select required class="form-control" id="chart_input" name="chart_input" onchange="chart_input_change()">
                                    <option value="">Chọn loại biểu đồ</option>
                                    <option value="Biểu đồ điều tra năng lực công đoạn">Biểu đồ điều tra năng lực công
                                        đoạn</option>
                                    <option value="Biểu đồ quản lý">Biểu đồ quản lý</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="measuring_department_input" class="col-form-label">Bộ Phận Đo</label>
                                <select required class="form-control" id="measuring_department_input" name="measuring_department_input">
                                    <option value="">Chọn bộ phận đo</option>
                                    <option value="QC">QC</option>
                                    <option value="PI">PI</option>
                                    <option value="RE">RE</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="no_measurement_items_input" class="col-form-label">No. Hạng Mục</label>
                                <input required type="text" class="form-control" id="no_measurement_items_input" name="no_measurement_items_input" 
                                value="<?php echo ($data_measurement_items[0][0] + 1); ?>" readonly>
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="measurement_items_input" class="col-form-label">Hạng Mục Đo</label>
                                <select required class="form-control" id="measurement_items_input" name="measurement_items_input">
                                    <option value="">Vui lòng chọn công đoạn trước</option>
                                </select>
                                <small class="invalid-feedback " id="measurement_items_input_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <label for="form_input" class="col-form-label">Form</label>
                                <select required class="form-control" id="form_input" name="form_input" onchange="form_input_change()">
                                    <option value="">Chọn form</option>
                                    <!-- <option value="Datasheet">Datasheet</option>
                                    <option value="Checksheet">Checksheet</option>
                                    <option value="Xbar-R">Xbar-R</option>
                                    <option value="X-R">X-R</option>
                                    <option value="X-Rs">X-Rs</option> -->
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="frequency_input" class="col-form-label">Tần Suất</label>
                                <select required class="form-control" id="frequency_input" name="frequency_input">
                                    <option value="">Chọn tần suất</option>
                                    <?php
                                    for ($i = 0; $i < count($data_frequency); $i++) {
                                        // code...
                                        echo '<option value="' . $data_frequency[$i] . '">' . $data_frequency[$i] .  '</option>';
                                    }
                                    ?>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="measuring_tools_input" class="col-form-label">Dụng Cụ Đo</label>
                                <select required class="form-control" id="measuring_tools_input" name="measuring_tools_input">
                                    <option value="">Chọn dụng cụ đo</option>
                                    <?php
                                    for ($i = 0; $i < count($data_measuring_tools); $i++) {
                                        // code...
                                        echo '<option value="' . $data_measuring_tools[$i] . '"> ' . $data_measuring_tools[$i] .  ' </option>';
                                    }
                                    ?>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col-3">
                                <label for="allowance_display_input" class="col-form-label">Dung Sai Hiển Thị (ф π θ ≥ ≤ ±) </label>
                                <input required type="text" class="form-control" id="allowance_display_input" name="allowance_display_input" maxlength="200" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                            </div>
                        </div>

                        <!-- end row 4 -->


                        <!-- form_MIN_info  name=""end -->

                        <div class="row x_ucl_form bordered">
                            <div class="form-group col">
                                <label for="x_ucl_input" class="col-form-label">X-UCL</label>
                                <input type="number" class="form-control  change-required" id="x_ucl_input" name="x_ucl_input" step='0.00001' max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                            </div>
                            <div class="form-group col">
                                <label for="x_cl_input" class="col-form-label">X-CL</label>
                                <input type="number" step='0.00001' class="form-control  change-required" id="x_cl_input" name="x_cl_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                            </div>
                            <div class="form-group col">
                                <label for="x_lcl_input" class="col-form-label">X-LCL</label>
                                <input type="number" step='0.00001' class="form-control  change-required" id="x_lcl_input" name="x_lcl_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                            </div>
                            <div class="form-group col">
                                <label for="r_ucl_input" class="col-form-label">R-UCL</label>
                                <input type="number" step='0.00001' class="form-control change-required" id="r_ucl_input" name="r_ucl_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                            </div>
                            <div class="form-group col">
                                <label for="r_cl_input" class="col-form-label">R-CL</label>
                                <input type="number" step='0.00001' class="form-control  change-required" id="r_cl_input" name="r_cl_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                            </div>

                        </div>

                        <!-- Form UCL end -->
                        <div class="row tolerance_form">
                            <div class="form-group col select_tolerance_form col">
                                <label for="type_allowance_input" class="col-form-label">Loại Quy Cách</label>
                                <select required class="form-control" id="type_allowance_input" name="type_allowance_input" maxlength="200" autocomplete="off" onchange="type_allowance_input_change()">
                                    <option value="">Chọn loại quy cách</option>
                                    <option value="±">±</option>
                                    <option value="Min">Min</option>
                                    <option value="Max">Max</option>
                                    <option value="OK/NG">OK/NG</option>
                                </select>
                                <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                            </div>
                            <div class="form-group col standard_dimension_input_form col ">
                                <label for="standard_dimension_input" class="col-form-label">Kích Thước</label>
                                <input required type="number" step='0.00001' class="form-control change-required" id="standard_dimension_input" name="standard_dimension_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Số liệu trống hoặc không đúng </small>


                            </div>
                            <div class="form-group col upper_input_form col ">
                                <label for="upper_input" class="col-form-label">Cận Trên</label>
                                <input required type="number" step='0.00001' class="form-control change-required" id="upper_input" name="upper_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Số liệu trống hoặc không đúng</small>


                            </div>
                            <div class="form-group col lower_input_form col ">
                                <label for="lower_input" class="col-form-label">Cận Dưới</label>
                                <input required type="number" step='0.00001' class="form-control change-required" id="lower_input" name="lower_input" max="999999999" min="-999999999" autocomplete="off">
                                <small class="invalid-feedback " id="_err" name="_err">Số liệu trống hoặc không đúng</small>


                            </div>
                            <div class="form-group col unit_input_form col ">
                                <label for="unit_input" class="col-form-label">Đơn Vị (µm Ω)</label>
                                <input type="text" class="form-control" id="unit_input" name="unit_input" maxlength="200" autocomplete="off">
                                <!-- <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>-->
                            </div>

                            <div class="col-12 p-0 pl-3 row">
                                <small class="form-text text-muted">Vui lòng nhập kiểu dữ liệu là số thực và tối đa là 5 chữ số thập phân ở các mục <span class="font-weight-bold">X-UCL ; X-CL ; X-LCL ; R-UCL ;R-CL ;Kích Thước; Cận Trên; Cận Dưới;</span> </small>

                            </div>
                        </div>
                        <!-- Form tolerance end -->

                        <div class="row">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input class="custom-control-input" type="checkbox" id="use_formula_input" name="use_formula_input" value="Yes" onclick="FormulaCb_function()">
                                    <label for="use_formula_input" class="custom-control-label" id="use_formula_label">Có Sử Dụng Công Thức</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form_formula d-none">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="type_formula_input" class="col-form-label">Chọn Dạng Công
                                            Thức</label>
                                        <select class="form-control change-required" id="type_formula_input" name="type_formula_input" onchange="type_formula_input_change(); number_element_input_change()">
                                            <option value="">Chọn dạng công thức</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Max-Min">Max-Min</option>
                                            <option value="Average">Average</option>
                                            <option value="Max">Max</option>
                                            <option value="Min">Min</option>
                                        </select>
                                        <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                                    </div>
                                    <div class="col-6 form-group number_element_input_form">
                                        <label for="number_element_input" class="col-form-label">Nhập Số Phần Tử</label>
                                        <input type="number" class="form-control change-required" id="number_element_input" name="number_element_input" max="10" min="1" value="1" onchange="number_element_input_change();" readonly>
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin và giá trị (1÷10)</small>

                                    </div>
                                    <div class="col-12 form-group formula_input_form">
                                        <label for="formula_input" class="col-form-label">Công Thức</label>
                                        <div class="d-flex flex-row">
                                            <p class="w-25 text-center p-2"> A = </p>
                                            <input type="text" class="form-control w-75 change-required" id="formula_input" name="formula_input" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="formula_input_err" name="formula_input_err">Vui lòng nhập đủ thông tin</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6 form-group table-responsive formula_info_form">
                                <table class="table-cong-thuc table table-bordered text-center mt-38">
                                    <tr>
                                        <th class="h-38 w-50">Ký tự</th>
                                        <th class=" w-50">Ghi chú</th>
                                    </tr>
                                    <tr class="b_form">
                                        <td>B</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_one" name="definition_formula_input_one" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                                        </td>
                                    </tr>
                                    <tr class="d-none c_form">
                                        <td>C</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_two" name="definition_formula_input_two" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none d_form">
                                        <td>D</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_three" name="definition_formula_input_three" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none e_form">
                                        <td>E</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_four" name="definition_formula_input_four" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none f_form">
                                        <td>F</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_five" name="definition_formula_input_five" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none g_form">
                                        <td>G</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_six" name="definition_formula_input_six" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none h_form">
                                        <td>H</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_seven" name="definition_formula_input_seven" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none i_form">
                                        <td>I</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_eight" name="definition_formula_input_eight" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none j_form">
                                        <td>J</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_nine" name="definition_formula_input_nine" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                        </td>
                                    </tr>
                                    <tr class="d-none k_form">
                                        <td>K</td>
                                        <td><input type="text" class="form-control change-required" id="definition_formula_input_ten" name="definition_formula_input_ten" maxlength="200" autocomplete="off">
                                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <input value="true" id="register_measurement_items_function" name="register_measurement_items_function" hidden></input>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" id="measurement_btn" class="btn btn-primary" onclick="register_measurement_btn()">Đăng ký</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </form>
</div>



<form id="form_delete" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items"; ?>" method="post" enctype="multipart/form-data">
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
                    <p>Bạn có muốn xóa thông tin hạng mục: <span id="delete_measurement_items_input"></span> ?</p>
                    <input type="hidden" id="del_id" name="del_id">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-outline-light" name="delete_measurement_items_function" id="delete_measurement_items_function">Xóa</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>
<!-- event filter search -->
<style>
    div.dataTables_wrapper div.dataTables_filter.input {
        width: 100%;
        display: inline-block;
        text-align: center;

    }
</style>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/register_function.js" ?>"></script>
<script>
    //  Data table setting
    //createDataTable(id,pagelength, seaching)
    createDataTable('measurement_item_table', 10, true);
</script>
<script type="text/javascript">
    //ON CHANGE 
    var data_measurement_items = <?php echo json_encode($data_measurement_items); ?>;
    // console.log(data_measurement_items)
    var data_measurement_items_array = [];
    var select_measurement_items_input = document.getElementById('measurement_items_input');

    function create_check_array() {
        var lineElement = document.getElementById('line_input');
        var lineValue = lineElement.value;
        var part_noElement = document.getElementById('part_no_input');
        var part_noValue = part_noElement.value;
        var chartValue = document.getElementById('chart_input').value;
        // console.log(chartValue,data_measurement_items[i][24])
        data_measurement_items_array = [];
        for (let i = 0; i < data_measurement_items.length; i++) {
            // console.log(data_measurement_items[i][4], lineValue, data_measurement_items[i][2], part_noValue)
            if (chartValue != "") {
                if (data_measurement_items[i][4] == lineValue && data_measurement_items[i][2] == part_noValue && data_measurement_items[i][24] == chartValue) {
                    data_measurement_items_array.push(data_measurement_items[i][5])
                }
            }

        }
        // console.log(data_measurement_items_array)
        // check_resultMIN()
    }
</script>
<script type="text/javascript">
    function register_measurement_btn() {
        disableBtn('measurement_btn');
        var MIN_value = document.getElementById('measurement_items_input').value.trim()
        if (checkFormula()) {
            $('#formula_input_err').html("Vui lòng nhập đủ thông tin");
            $('#formula_input').addClass("is-valid");
            $('#formula_input').removeClass("is-invalid");
            create_check_array();
            check = formValidation('form_MIN_info')

            // console.log(check,checkMIN)
            if (check) {
                checkMIN = check_resultMIN()
                if (checkMIN) {
                    $('#form_MIN_info').submit();
                }

            }
        } else {
            // formula_input
            $('#formula_input_err').html("Định dạng công thức sai, Vui lòng nhập lại");
            $('#formula_input').addClass("is-invalid");
            $('#formula_input').removeClass("is-valid");
        }


    }

    function check_resultMIN() {
        checkMIN = checkInputValue(data_measurement_items_array, 'measurement_items_input', 'measurement_items_input_err', true)
        if (checkMIN) {
            document.getElementById('measurement_items_input_err').classList.add('is-valid');
            return true;
        };
        return false
    }

    function FormulaCb_function() {
        var use_formula_inputElement = document.getElementById("use_formula_input")
        var use_formula_input = document.getElementById("use_formula_input").checked;
        var form_formula = document.querySelector('.form_formula')
        if (use_formula_input) {
            document.getElementById("use_formula_label").style.cssText = "color: rgb(47 129 250);";
            form_formula.classList.remove('d-none');

        } else {
            document.getElementById("use_formula_label").style.cssText = "color:white";
            form_formula.classList.add('d-none');

        }
        var unDNoneForm = document.querySelectorAll(".form_formula  .change-required")
        // console.log("on", unDNoneForm)
        addRequired(unDNoneForm)
        var dNoneForm = document.querySelectorAll(".form_formula.d-none .change-required")
        removeRequired(dNoneForm);
        addValueNull(dNoneForm);
        // console.log("remove", dNoneForm)
    }
    $(function() {
        $("#management_level_one_input").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#img-management_level_one_input").attr("src", x);
            document.getElementById('img-management_level_one_input').style.display = 'flex';
            // console.log(event);
        });
        $("#management_level_two_input").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#img-management_level_two_input").attr("src", x);
            document.getElementById('img-management_level_two_input').style.display = 'flex';
            // console.log(event);
        });
        $("#draw_input").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#img-draw_input").attr("src", x);
            document.getElementById('img-draw_input').style.display = 'flex';
            // console.log(event);
        });



    })

    function clearSymbol(img_symbol_id_1) {
        if (img_symbol_id_1) {
            $("#" + img_symbol_id_1).attr("src", "");
            document.getElementById(img_symbol_id_1).style.display = 'none';
        }

    }

    function chart_input_change() {
        var chart_input = document.getElementById('chart_input').value;
        var x_ucl_form = document.querySelector('.x_ucl_form');
        var selectFormInput = document.getElementById('form_input');
        var inputElements = x_ucl_form.querySelectorAll('.change-required')
        if (chart_input == "Biểu đồ điều tra năng lực công đoạn") {
            x_ucl_form.classList.add('d-none');
            removeRequired(inputElements);
            addValueNull(inputElements);
            while (selectFormInput.firstChild) {
                selectFormInput.removeChild(selectFormInput.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Chọn form";
            selectFormInput.appendChild(opt);
            myArr = ["Xbar-R", "X-R", "X-Rs"]
            for (i = 0; i < myArr.length; i++) {
                opt = document.createElement('option');
                opt.value = myArr[i];
                opt.innerHTML = myArr[i];
                selectFormInput.appendChild(opt);
            }
        } else {
            value = 'OK/NG'
            x_ucl_form.classList.remove('d-none');
            addRequired(inputElements)
            while (selectFormInput.firstChild) {
                selectFormInput.removeChild(selectFormInput.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Chọn form";
            selectFormInput.appendChild(opt);
            myArr = ["Xbar-R", "X-R", "X-Rs", "Datasheet", "Checksheet"]
            for (i = 0; i < myArr.length; i++) {
                opt = document.createElement('option');
                opt.value = myArr[i];
                opt.innerHTML = myArr[i];
                selectFormInput.appendChild(opt);
            }
        }
    }

    function form_input_change() {
        var chart_input = document.getElementById('chart_input').value.trim();
        var form_input = document.getElementById('form_input').value.trim();
        var x_ucl_form = document.querySelector('.x_ucl_form');
        var inputElements = x_ucl_form.querySelectorAll('.change-required')

        if (form_input == "Datasheet" || form_input == "Checksheet" || chart_input ==
            "Biểu đồ điều tra năng lực công đoạn") {
            x_ucl_form.classList.add('d-none');
            removeRequired(inputElements);

            addValueNull(inputElements);
            inputElements.forEach(function(element) {
                // console.log()
            })
        } else {
            x_ucl_form.classList.remove('d-none');
            addRequired(inputElements)

        }
        var type_allowance_input = $('#type_allowance_input');
        if (form_input == "Checksheet") {
            // type_allowance_input.append('<option value="OK/NG" selected="selected">OK/NG</option>')
            // // type_allowance_input.val("OK/NG") 
            // $("#type_allowance_input option[value='Min']").remove();
            // $("#type_allowance_input option[value='Max']").remove();
            // $("#type_allowance_input option[value='±']").remove();
            $('#type_allowance_input')
                .find('option')
                .remove()
                .end()
                .append('<option value="OK/NG">OK/NG</option>')
                .val('OK/NG');;
            type_allowance_input_change()
        } else {
            $('#type_allowance_input')
                .find('option')
                .remove()
                .end()
                .append('<option value="Min">Min</option>')
                .append('<option value="Max">Max</option>')
                .append('<option value="±">±</option>')
                .val('Min');;

        }

    }

    function type_allowance_input_change() {

        var type_allowance_input = document.getElementById('type_allowance_input').value.trim();

        var standard_dimension_input_form = document.querySelector('.standard_dimension_input_form');
        var select_tolerance_form = document.querySelector('.select_tolerance_form');
        var upper_input_form = document.querySelector('.upper_input_form');
        var lower_input_form = document.querySelector('.lower_input_form');
        var unit_input_form = document.querySelector('.unit_input_form');
        if (type_allowance_input == "OK/NG") {
            standard_dimension_input_form.classList.add('d-none');
            upper_input_form.classList.add('d-none');
            lower_input_form.classList.add('d-none');
            unit_input_form.classList.add('d-none');
            select_tolerance_form.classList.add('col-3');

        } else if (type_allowance_input == "Min" || type_allowance_input == "Max") {
            standard_dimension_input_form.classList.remove('d-none');
            upper_input_form.classList.add('d-none');
            lower_input_form.classList.add('d-none');
            unit_input_form.classList.remove('d-none');
            unit_input_form.classList.remove('col-3');

        } else {
            standard_dimension_input_form.classList.remove('d-none');
            upper_input_form.classList.remove('d-none');
            lower_input_form.classList.remove('d-none');
            unit_input_form.classList.remove('col-3');
            unit_input_form.classList.remove('d-none');

        }
        var unDNoneForm = document.querySelectorAll(".tolerance_form  input.change-required")
        // console.log("on",unDNoneForm)
        addRequired(unDNoneForm)
        var dNoneForm = document.querySelectorAll(".tolerance_form .d-none input.change-required")
        removeRequired(dNoneForm);
        addValueNull(dNoneForm);
        //  console.log("",dNoneForm)

    }

    function type_formula_input_change() {
        var type_formula_inputElement = document.getElementById('type_formula_input')
        var type_formula_input = type_formula_inputElement.value.trim();

        if (type_formula_input == "Average") {
            document.getElementById("number_element_input").readOnly = true;
            document.getElementById("number_element_input").value = 1;

            document.querySelector('.number_element_input_form').classList.remove('d-none');
            document.querySelector('.formula_input_form').classList.remove('d-none');
            document.querySelector('.formula_info_form').classList.remove('d-none');


        } else if (type_formula_input == "Max" || type_formula_input == "Min" || type_formula_input == "Max-Min") {
            document.getElementById("number_element_input").readOnly = false;
            document.querySelector('.number_element_input_form').classList.add('d-none');
            document.querySelector('.formula_input_form').classList.add('d-none');
            document.querySelector('.formula_info_form').classList.add('d-none');

        } else {
            document.getElementById("number_element_input").readOnly = false;
            document.querySelector('.number_element_input_form').classList.remove('d-none');
            document.querySelector('.formula_input_form').classList.remove('d-none');
            document.querySelector('.formula_info_form').classList.remove('d-none');


        }

        var unDNoneForm = document.querySelectorAll(".form_formula  input.change-required")
        // console.log("ON",unDNoneForm)
        addRequired(unDNoneForm)
        var dNoneForm = document.querySelectorAll(".form_formula .d-none input.change-required")
        removeRequired(dNoneForm);
        addValueNull(dNoneForm);
        // console.log("dNoneForm",dNoneForm)
    }

    function number_element_input_change() {
        // body...
        var number_element_inputElement = document.getElementById('number_element_input');
        var number_element_input = number_element_inputElement.value;

        if (number_element_input == 1) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.add('d-none');
            document.querySelector('.d_form').classList.add('d-none');
            document.querySelector('.e_form').classList.add('d-none');
            document.querySelector('.f_form').classList.add('d-none');
            document.querySelector('.g_form').classList.add('d-none');
            document.querySelector('.h_form').classList.add('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 2) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.add('d-none');
            document.querySelector('.e_form').classList.add('d-none');
            document.querySelector('.f_form').classList.add('d-none');
            document.querySelector('.g_form').classList.add('d-none');
            document.querySelector('.h_form').classList.add('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 3) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.add('d-none');
            document.querySelector('.f_form').classList.add('d-none');
            document.querySelector('.g_form').classList.add('d-none');
            document.querySelector('.h_form').classList.add('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 4) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.add('d-none');
            document.querySelector('.g_form').classList.add('d-none');
            document.querySelector('.h_form').classList.add('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 5) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.remove('d-none');
            document.querySelector('.g_form').classList.add('d-none');
            document.querySelector('.h_form').classList.add('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 6) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.remove('d-none');
            document.querySelector('.g_form').classList.remove('d-none');
            document.querySelector('.h_form').classList.add('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 7) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.remove('d-none');
            document.querySelector('.g_form').classList.remove('d-none');
            document.querySelector('.h_form').classList.remove('d-none');
            document.querySelector('.i_form').classList.add('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 8) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.remove('d-none');
            document.querySelector('.g_form').classList.remove('d-none');
            document.querySelector('.h_form').classList.remove('d-none');
            document.querySelector('.i_form').classList.remove('d-none');
            document.querySelector('.j_form').classList.add('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 9) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.remove('d-none');
            document.querySelector('.g_form').classList.remove('d-none');
            document.querySelector('.h_form').classList.remove('d-none');
            document.querySelector('.i_form').classList.remove('d-none');
            document.querySelector('.j_form').classList.remove('d-none');
            document.querySelector('.k_form').classList.add('d-none');
        } else if (number_element_input == 10) {
            document.querySelector('.b_form').classList.remove('d-none');
            document.querySelector('.c_form').classList.remove('d-none');
            document.querySelector('.d_form').classList.remove('d-none');
            document.querySelector('.e_form').classList.remove('d-none');
            document.querySelector('.f_form').classList.remove('d-none');
            document.querySelector('.g_form').classList.remove('d-none');
            document.querySelector('.h_form').classList.remove('d-none');
            document.querySelector('.i_form').classList.remove('d-none');
            document.querySelector('.j_form').classList.remove('d-none');
            document.querySelector('.k_form').classList.remove('d-none');
        }
        var unDNoneForm = document.querySelectorAll(".form_formula  input.change-required")

        addRequired(unDNoneForm)
        // console.log("ON",unDNoneForm)
        var dNoneForm = document.querySelectorAll(".form_formula .d-none input.change-required")
        removeRequired(dNoneForm);
        addValueNull(dNoneForm);
        // console.log("dNoneForm",dNoneForm)
    }

    function auto_popup_part_no(action) {
        if (action == "register") {
            var product_family = document.getElementById('product_family_input').value;
            var line_input = document.getElementById('line_input').value;

            var selectPartNo = document.getElementById('part_no_input');

            if (product_family == "") {
                while (selectPartNo.firstChild) {
                    selectPartNo.removeChild(selectPartNo.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
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
                        opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Chọn mã sản phẩm";
                        selectPartNo.appendChild(opt);
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectPartNo.appendChild(opt);
                        }
                    }
                };
                // xmlhttp.open("GET", url, true);
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family + "&line=" +
                    line_input, true);
                xmlhttp.send();
            }
        } else if (action == "edit") {
            // continue();
        }
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
            // continue();
        }
    }

    function auto_popup_process(action) {
        if (action == "register") {
            var line_input = document.getElementById('line_input').value;
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
                        opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Chọn công đoạn";
                        selectLine.appendChild(opt);
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
            // continue();
        }


        // xmlhttp.open("GET", url, true);

    }

    function auto_popup_measurement_items(action) {
        if (action == "register") {
            var product_family = document.getElementById('product_family_input').value;
            var selectPart_no = document.getElementById('part_no_input').value;
            var selectLine = document.getElementById('line_input').value;
            var selectProcess = document.getElementById('process_input').value;
            var selectMeasurementItems = document.getElementById('measurement_items_input');

            if (product_family == "") {
                while (selectMeasurementItems.firstChild) {
                    selectMeasurementItems.removeChild(selectMeasurementItems.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
                selectMeasurementItems.appendChild(opt);
            } else if (selectPart_no == "") {
                while (selectMeasurementItems.firstChild) {
                    selectMeasurementItems.removeChild(selectMeasurementItems.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn mã sản phẩm trước";
                selectMeasurementItems.appendChild(opt);
            } else if (selectLine == "") {
                while (selectMeasurementItems.firstChild) {
                    selectMeasurementItems.removeChild(selectMeasurementItems.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn line trước";
                selectMeasurementItems.appendChild(opt);
            } else if (selectProcess == "") {
                while (selectMeasurementItems.firstChild) {
                    selectMeasurementItems.removeChild(selectMeasurementItems.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn công đoạn trước";
                selectMeasurementItems.appendChild(opt);
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        while (selectMeasurementItems.firstChild) {
                            selectMeasurementItems.removeChild(selectMeasurementItems.firstChild);
                        }
                        var opt = null;
                        opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Chọn hạng mục đo";
                        selectMeasurementItems.appendChild(opt);
                        for (i = 0; i < myArr.length; i++) {
                            opt = document.createElement('option');
                            if (myArr[i] == 'Không có hạng mục nào') opt.value = '';
                            else opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectMeasurementItems.appendChild(opt);
                        }
                    }
                };
                // xmlhttp.open("GET", url, true);
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_measurement_items=yes&product_family=" + product_family +
                    "&part_no=" + selectPart_no + "&line=" + selectLine + "&process=" + selectProcess, true);
                xmlhttp.send();
            }
        }

    }

    function editmeasurementItemsName(id_edit, product_family_edit, part_no_edit, line_edit, process_edit,
        measurement_items_edit) {

        var selectProductFamily = document.getElementById('part_no_edit');
        var selectLine = document.getElementById('process_edit');
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('product_family_edit').value = product_family_edit;
        document.getElementById('part_no_edit').value = part_no_edit;
        document.getElementById('line_edit').value = line_edit;
        document.getElementById('process_edit').value = process_edit;
        document.getElementById('measurement_items_name_edit').value = measurement_items_edit;
        // get part_no
        if (product_family_edit == "") {
            while (selectProductFamily.firstChild) {
                selectProductFamily.removeChild(selectProductFamily.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectProductFamily.appendChild(opt);
        } else {
            // console.log(part_no_edit);
            while (selectProductFamily.firstChild) {
                selectProductFamily.removeChild(selectProductFamily.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = part_no_edit;
            opt.innerHTML = part_no_edit;
            selectProductFamily.appendChild(opt);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);

                    for (i = 0; i < myArr.length; i++) {
                        if (myArr[i] != part_no_edit) {
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
            xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family_edit, true);
            xmlhttp.send();
        }

        //get process
        if (process_edit == "") {
            while (selectLine.firstChild) {
                selectLine.removeChild(selectLine.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectLine.appendChild(opt);
        } else {
            // console.log(process_edit);
            while (selectLine.firstChild) {
                selectLine.removeChild(selectLine.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value = process_edit;
            opt.innerHTML = process_edit;
            selectLine.appendChild(opt);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);

                    for (i = 0; i < myArr.length; i++) {
                        if (myArr[i] != process_edit) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectLine.appendChild(opt);
                        }

                    }
                }
            };
            // xmlhttp.open("GET", url, true);
            var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
            xmlhttp.open("GET", link_get_data + "?auto_popup_process=yes&line_input=" + line_edit, true);
            xmlhttp.send();
        }

        $("#edit_measurement_items_model").modal('toggle');
    }

    function deletemeasurementItemsName(id_del, measurement_items_del) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('delete_measurement_items_input').innerHTML = measurement_items_del;
        $("#myDelete").modal('toggle');
    }

    function checkFormula() {
        var Str = "BCDEFGHJKH"
        var A = document.getElementById('formula_input').value.trim()
        var dem = document.getElementById('number_element_input').value
        for (var i = 0; i < dem; i++) {
            eval(Str[i] + '=10')
        }
        try {
            checkFomular = eval(A)
            return true;
        } catch (error) {
            return false;
        }
    }
</script>
<!-- Check input measurement_items_name  measurement_items_name= MIN   -->
<!-- Select function -->
<script>
    $(document).ready(function() {
        $("#management_level_input").select2({
            theme: "classic",
            templateResult: formatStateResult,
            templateSelection: formatStateSelect,
        });
    });

    function formatStateSelect(state) {
        if (!state.id) {
            return state.text;
        }
        console.log(state.text)
        var baseUrl = "/fiot-hdvn/";
        var $state = $(
            '<span><img src="' + baseUrl + '/' + state.element.value + '" style=" height: 38px; max-width:60px" /> ' + '</span>'
        );
        console.log($state)
        return $state;
    };

    function formatStateResult(state) {
        if (!state.id) {
            return state.text;
        }
        console.log(state.text)
        var baseUrl = "/fiot-hdvn/";
        var $state = $(
            '<span><img src="' + baseUrl + '/' + state.element.value + '" style=" height: 38px; max-width:60px" /> ' + state.text + '</span>'
        );
        return $state;
    };
</script>