<?php
    // check role

    //set public connect
    $connect = $GLOBALS['connect'];

    //select qc_tb_measurement_items_name
    $sqlcheck_measurement_items_name = "SELECT * FROM `qc_tb_measurement_items_name` ORDER BY `id` ASC";
    $resultcheck_measurement_items_name = mysqli_query( $connect, $sqlcheck_measurement_items_name );
    // $check_measurement_items_name = mysqli_fetch_assoc( $resultcheck_measurement_items_name );
    if ($resultcheck_measurement_items_name && $resultcheck_measurement_items_name->num_rows > 0) {
        // tiến hành lặp dữ liệu
        $i = 0;
        while ($row = $resultcheck_measurement_items_name->fetch_assoc()) {
            //thêm kết quả vào mảng
            $data_measurement_items_name[$i][0]=$row['id'];
            $data_measurement_items_name[$i][1]=$row['product_family'];
            $data_measurement_items_name[$i][2]=$row['part_no'];
            $data_measurement_items_name[$i][3]=$row['line'];
            $data_measurement_items_name[$i][4]=$row['process'];
            $data_measurement_items_name[$i][5]=$row['measurement_items'];
            $i++;
        }
    }
    else{
        $data_measurement_items_name[0][0]='';
        $data_measurement_items_name[0][1]='';
        $data_measurement_items_name[0][2]='';
        $data_measurement_items_name[0][3]='';
        $data_measurement_items_name[0][4]='';
        $data_measurement_items_name[0][5]='';
    }

    //select qc_tb_part_no
    $sqlcheck_part_no = "SELECT DISTINCT `product_family` FROM `qc_tb_part_no` ORDER BY `product_family` ASC";
    $resultcheck_part_no = mysqli_query( $connect, $sqlcheck_part_no );
    // $check_part_no = mysqli_fetch_assoc( $resultcheck_part_no );
    if ($resultcheck_part_no && $resultcheck_part_no->num_rows > 0) {
        // tiến hành lặp dữ liệu
        $i = 0;
        while ($row = $resultcheck_part_no->fetch_assoc()) {
            //thêm kết quả vào mảng
            $data_part_no[$i]=$row['product_family'];
            $i++;
        }
    }
    else{
        $data_part_no[0]='';
    }

    //select qc_tb_line
    $sqlcheck_line = "SELECT `line` FROM `qc_tb_line` ORDER BY `id` ASC";
    $resultcheck_line = mysqli_query( $connect, $sqlcheck_line );
    // $check_line = mysqli_fetch_assoc( $resultcheck_line );
    if ($resultcheck_line && $resultcheck_line->num_rows > 0) {
        // tiến hành lặp dữ liệu
        $i = 0;
        while ($row = $resultcheck_line->fetch_assoc()) {
            //thêm kết quả vào mảng
            $data_line[$i]=$row['line'];
            $i++;
        }
    }
    else{
        $data_line[0]='';
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
                                <h3 class="card-title">Danh Sách Tên Hạng Mục.</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#add_measurement_items_name">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký tên hạng mục.
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
                                        <th style="width: 16%">Dòng Sản Phẩm.</th>
                                        <th style="width: 16%">Mã Sản Phẩm.</th>
                                        <th style="width: 16%">Line.</th>
                                        <th style="width: 16%">Công Đoạn.</th>
                                        <th style="width: 16%">Tên Hạng Mục.</th>
                                        <th style="width: 5%">Sửa.</th>
                                        <th style="width: 5%">Xóa.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $stt_measurement_items_name = 0;
                                        for($i = 0; $i< count($data_measurement_items_name); $i++){
                                            $stt_measurement_items_name++;
                                            echo '<tr>';
                                            echo '<td>' . $stt_measurement_items_name . '</td>
                                            <td>' . $data_measurement_items_name[$i][1] . '</td>
                                            <td>' . $data_measurement_items_name[$i][2] . '</td>
                                            <td>' . $data_measurement_items_name[$i][3] . '</td>
                                            <td>' . $data_measurement_items_name[$i][4] . '</td>
                                            <td>' . $data_measurement_items_name[$i][5] . '</td>';
                                            echo'<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editMeasurmentItemsName('. $data_measurement_items_name[$i][0] . ',' .'\'' .$data_measurement_items_name[$i][1].'\'' . ',' .'\'' .$data_measurement_items_name[$i][2].'\'' . ',' .'\'' .$data_measurement_items_name[$i][3].'\'' . ',' .'\'' .$data_measurement_items_name[$i][4].'\'' . ',' .'\'' .$data_measurement_items_name[$i][5].'\''  .')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteMeasurmentItemsName('. $data_measurement_items_name[$i][0] . ',' .'\'' .$data_measurement_items_name[$i][5].'\'' .')">Xóa</button></td>';
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
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurment_items_name"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_measurement_items_name" tabindex="-1" role="dialog" aria-labelledby="exadd_measurement_items_name"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_measurement_items_name">Đăng Ký Tên Hạng Mục.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_family_input" class="col-form-label">Dòng Sản Phẩm.</label>
                            <select class="form-control" id="product_family_input" name="product_family_input" onchange="auto_popup_part_no('register')">
                                <option value="">Chọn dòng sản phẩm</option>
                                <?php 
                                    for($i =0; $i <count($data_part_no); $i++){
                                        echo '<option value="' . $data_part_no[$i] . '">' . $data_part_no[$i] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="part_no_input" class="col-form-label">Mã Sản Phẩm.</label>
                            <select class="form-control" id="part_no_input" name="part_no_input">
                                <option value="">Vui lòng chọn dòng sản phẩm trước</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="line_input" class="col-form-label">Line.</label>
                            <select class="form-control" id="line_input" name="line_input" onchange="auto_popup_process('register')">
                                <option value="">Chọn line</option>
                                <?php 
                                    for($i =0; $i <count($data_line); $i++){
                                        echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="process_input" class="col-form-label">Công Đoạn.</label>
                            <select class="form-control" id="process_input" name="process_input">
                                <option value="">Vui lòng chọn line trước</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="measurment_items_name_input" class="col-form-label">Tên Hạng Mục.</label>
                            <input type="text" maxlength="20" class="form-control" id="measurment_items_name_input" name="measurment_items_name_input" placeholder="Nhập tên hạng mục">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="register_measurement_items_name_function" name="register_measurement_items_name_function">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit mã máy -->
        <div class="modal fade" id="edit_measurement_items_name_model" tabindex="-1" role="dialog" aria-labelledby="exedit_measurement_items_name"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_measurement_items_name">Sửa Thông Tin Hạng Mục.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_family_edit" class="col-form-label">Dòng Sản Phẩm.</label>
                            <select class="form-control" id="product_family_edit" name="product_family_edit" onchange="auto_popup_part_no('edit')">
                                <option value="">Chọn dòng sản phẩm</option>
                                <?php 
                                    for($i =0; $i <count($data_part_no); $i++){
                                        echo '<option value="' . $data_part_no[$i] . '">' . $data_part_no[$i] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="part_no_edit" class="col-form-label">Mã Sản Phẩm.</label>
                            <select class="form-control" id="part_no_edit" name="part_no_edit">
                                <option value="">Vui lòng chọn dòng sản phẩm trước</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="line_edit" class="col-form-label">Line.</label>
                            <select class="form-control" id="line_edit" name="line_edit" onchange="auto_popup_process('edit')">
                                <option value="">Chọn line</option>
                                <?php 
                                    for($i =0; $i <count($data_line); $i++){
                                        echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="process_edit" class="col-form-label">Công Đoạn.</label>
                            <select class="form-control" id="process_edit" name="process_edit">
                                <option value="">Vui lòng chọn line trước</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="measurment_items_name_edit" class="col-form-label">Tên Hạng Mục.</label>
                            <input type="text" maxlength="20" class="form-control" id="measurment_items_name_edit" name="measurment_items_name_edit" placeholder="Nhập tên hạng mục">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="edit_measurement_items_name_function" name="edit_measurement_items_name_function">Sửa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Hạng Mục.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa thông tin hạng mục: <span id="delete_measurement_items_name_input"></span> ?</p>
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
    function auto_popup_part_no(action) {
        if(action == "register"){
            var product_family = document.getElementById('product_family_input').value;
            var selectProductFamily = document.getElementById('part_no_input');

            if(product_family == ""){
                while (selectProductFamily.firstChild) {
                    selectProductFamily.removeChild(selectProductFamily.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
                selectProductFamily.appendChild(opt);
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);
                        while (selectProductFamily.firstChild) {
                            selectProductFamily.removeChild(selectProductFamily.firstChild);
                        }
                        var opt = null;
                        for(i = 0; i<myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectProductFamily.appendChild(opt);
                        } 
                    }
                };
                // xmlhttp.open("GET", url, true);
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family, true);
                xmlhttp.send();
            }
        }
        else if(action == "edit"){
            var product_family = document.getElementById('product_family_edit').value;
            var selectProductFamily = document.getElementById('part_no_edit');

            if(product_family == ""){
                while (selectProductFamily.firstChild) {
                    selectProductFamily.removeChild(selectProductFamily.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
                selectProductFamily.appendChild(opt);
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);
                        while (selectProductFamily.firstChild) {
                            selectProductFamily.removeChild(selectProductFamily.firstChild);
                        }
                        var opt = null;
                        for(i = 0; i<myArr.length; i++) {
                            opt = document.createElement('option');
                            opt.value = myArr[i];
                            opt.innerHTML = myArr[i];
                            selectProductFamily.appendChild(opt);
                        } 
                    }
                };
                // xmlhttp.open("GET", url, true);
                var link_get_data = "<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/qc/autopopup' ?>";
                xmlhttp.open("GET", link_get_data + "?auto_popup_part_no=yes&product_family=" + product_family, true);
                xmlhttp.send();
            }
        }  
    }
    function auto_popup_process(action) {
        if(action == "register"){
            var line_input = document.getElementById('line_input').value;
            var selectLine = document.getElementById('process_input');

            if(line_input == ""){
            while (selectLine.firstChild) {
                selectLine.removeChild(selectLine.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn line trước";
            selectLine.appendChild(opt);
            }
            else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                    while (selectLine.firstChild) {
                        selectLine.removeChild(selectLine.firstChild);
                    }

                    var opt = null;
                    for(i = 0; i<myArr.length; i++) {
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
        }
        else if(action == "edit"){
            var line_edit = document.getElementById('line_edit').value;
            var selectLine = document.getElementById('process_edit');

            if(line_edit == ""){
                while (selectLine.firstChild) {
                    selectLine.removeChild(selectLine.firstChild);
                }
                opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "Vui lòng chọn line trước";
                selectLine.appendChild(opt);
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);
                        while (selectLine.firstChild) {
                            selectLine.removeChild(selectLine.firstChild);
                        }

                        var opt = null;
                        for(i = 0; i<myArr.length; i++) {
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
    function editMeasurmentItemsName(id_edit, product_family_edit, part_no_edit, line_edit, process_edit, measurement_items_name_edit) {

        var selectProductFamily = document.getElementById('part_no_edit');
        var selectLine = document.getElementById('process_edit');
        document.getElementById('edit_id').value = id_edit;
        document.getElementById('product_family_edit').value = product_family_edit;
        document.getElementById('part_no_edit').value = part_no_edit;
        document.getElementById('line_edit').value = line_edit;
        document.getElementById('process_edit').value = process_edit;
        document.getElementById('measurment_items_name_edit').value = measurement_items_name_edit;


        // get part_no
        if(product_family_edit == ""){
            while (selectProductFamily.firstChild) {
                selectProductFamily.removeChild(selectProductFamily.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectProductFamily.appendChild(opt);
        }
        else{
            console.log(part_no_edit);
            while (selectProductFamily.firstChild) {
                selectProductFamily.removeChild(selectProductFamily.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value =part_no_edit;
            opt.innerHTML = part_no_edit;
            selectProductFamily.appendChild(opt);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                    
                    for(i = 0; i<myArr.length; i++) {
                        if(myArr[i] != part_no_edit){
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
        if(process_edit == ""){
            while (selectLine.firstChild) {
                selectLine.removeChild(selectLine.firstChild);
            }
            opt = document.createElement('option');
            opt.value = "";
            opt.innerHTML = "Vui lòng chọn dòng sản phẩm trước";
            selectLine.appendChild(opt);
        }
        else{
            console.log(process_edit);
            while (selectLine.firstChild) {
                selectLine.removeChild(selectLine.firstChild);
            }
            var opt = null;
            opt = document.createElement('option');
            opt.value =process_edit;
            opt.innerHTML = process_edit;
            selectLine.appendChild(opt);
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                    
                    for(i = 0; i<myArr.length; i++) {
                        if(myArr[i] != process_edit){
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

        $("#edit_measurement_items_name_model").modal('toggle');
    }

    function deleteMeasurmentItemsName(id_del, measurement_items_name_del) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('delete_measurement_items_name_input').innerHTML = measurement_items_name_del;
        $("#myDelete").modal('toggle');
    }

    function warning() {
        // console.log("start");
        $("#myWarning").modal('toggle');
    }

</script>