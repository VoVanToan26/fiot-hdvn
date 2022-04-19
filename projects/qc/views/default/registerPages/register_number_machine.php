<?php
    // check role

    //set public connect
    $connect = $GLOBALS['connect'];

    //select qc_tb_number_machine
    $sqlcheck_number_machine = "SELECT * FROM `qc_tb_machine_number` ORDER BY `id` ASC";
    $resultcheck_number_machine = mysqli_query( $connect, $sqlcheck_number_machine );
    // $check_number_machine = mysqli_fetch_assoc( $resultcheck_number_machine );
    if ($resultcheck_number_machine && $resultcheck_number_machine->num_rows > 0) {
        // tiến hành lặp dữ liệu
        $i = 0;
        while ($row = $resultcheck_number_machine->fetch_assoc()) {
            //thêm kết quả vào mảng
            $data_number_machine[$i][0]=$row['id'];
            $data_number_machine[$i][1]=$row['line'];
            $data_number_machine[$i][2]=$row['process'];
            $data_number_machine[$i][3]=$row['number_machine'];
            $i++;
        }
    }
    else{
        $data_number_machine[0][0]='';
        $data_number_machine[0][1]='';
        $data_number_machine[0][2]='';
        $data_number_machine[0][3]='';
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
                                <h3 class="card-title">Danh Sách Mã Máy.</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#add_number_machine">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký mã máy.
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">STT.</th>
                                        <th style="width: 25%">Tên Line.</th>
                                        <th style="width: 25%">Công đoạn.</th>
                                        <th style="width: 25%">Tên Máy.</th>
                                        <th style="width: 5%">Sửa.</th>
                                        <th style="width: 5%">Xóa.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $stt_number_machine = 0;
                                        for($i = 0; $i< count($data_number_machine); $i++){
                                            $stt_number_machine++;
                                            echo '<tr>';
                                            echo '<td>' . $stt_number_machine . '</td>
                                            <td>' . $data_number_machine[$i][1] . '</td>
                                            <td>' . $data_number_machine[$i][2] . '</td>
                                            <td>' . $data_number_machine[$i][3] . '</td>';
                                            echo'<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                            onclick ="editNumberMachine('. $data_number_machine[$i][0] . ',' .'\'' .$data_number_machine[$i][1].'\'' . ',' .'\'' .$data_number_machine[$i][2].'\'' . ',' .'\'' .$data_number_machine[$i][3].'\''  .')">Sửa</button></td>
                                            <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                            onclick ="deleteNumberMachine('. $data_number_machine[$i][0] . ',' .'\'' .$data_number_machine[$i][3].'\'' .')">Xóa</button></td>';
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
    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine"; ?>" method="post">
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="add_number_machine" tabindex="-1" role="dialog" aria-labelledby="exadd_number_machine"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exadd_number_machine">Đăng Ký Mã Máy.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="line" class="col-form-label">Line.</label>
                            <!-- <input type="text" maxlength="20" class="form-control" id="line" name="line" placeholder="Nhập line"> -->
                            <select class="form-control" id="line" name="line">
                                <option selected>Chọn line</option>
                                <?php 
                                    for($i =0; $i <count($data_line); $i++){
                                        echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="process" class="col-form-label">Công Đoạn.</label>
                            <input type="text" maxlength="20" class="form-control" id="process" name="process" placeholder="Nhập công đoạn">
                        </div>
                        <div class="form-group">
                            <label for="number_machine" class="col-form-label">Mã Máy.</label>
                            <input type="text" maxlength="20" class="form-control" id="number_machine" name="number_machine" placeholder="Nhập mã máy">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="register_number_machine_function" name="register_number_machine_function">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit mã máy -->
        <div class="modal fade" id="edit_number_machine_model" tabindex="-1" role="dialog" aria-labelledby="exedit_number_machine"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exedit_number_machine">Đăng Ký Mã Máy.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_line_input" class="col-form-label">Line.</label>
                            <!-- <input type="text" maxlength="20" class="form-control" id="line" name="line" placeholder="Nhập line"> -->
                            <select class="form-control" id="edit_line_input" name="edit_line_input">
                                <option selected>Chọn line</option>
                                <?php 
                                    for($i =0; $i <count($data_line); $i++){
                                        echo '<option value="' . $data_line[$i] . '">' . $data_line[$i] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_process_input" class="col-form-label">Công Đoạn.</label>
                            <input type="text" maxlength="20" class="form-control" id="edit_process_input" name="edit_process_input" placeholder="Nhập công đoạn">
                        </div>
                        <div class="form-group">
                            <label for="edit_number_machine_input" class="col-form-label">Mã Máy.</label>
                            <input type="text" maxlength="20" class="form-control" id="edit_number_machine_input" name="edit_number_machine_input" placeholder="Nhập mã máy">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="edit_number_machine_function" name="edit_number_machine_function">Sửa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->
        <div class="modal fade" id="myDelete">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Thông Tin Mã Máy.</h4>
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
    function editNumberMachine(id_edit, line_edit, process_edit, number_machine_edit) {

        document.getElementById('edit_id').value = id_edit;
        document.getElementById('edit_line_input').value = line_edit;
        document.getElementById('edit_process_input').value = process_edit;
        document.getElementById('edit_number_machine_input').value = number_machine_edit;
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

</script>