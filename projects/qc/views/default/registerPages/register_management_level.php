<?php
// check role

//set public connect
$connect = $GLOBALS['connect'];

//select qc_tb_management_level
$sqlcheck_management_level = "SELECT * FROM `qc_tb_management_level` ORDER BY `id` DESC";
$resultcheck_management_level = mysqli_query($connect, $sqlcheck_management_level);
// $check_management_level = mysqli_fetch_assoc( $resultcheck_management_level );
if ($resultcheck_management_level && $resultcheck_management_level->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_management_level->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_management_level[$i][0] = $row['id'];
        $data_management_level[$i][1] = $row['management_level_name'];
        $data_management_level[$i][2] = $row['management_level_img'];
        $i++;
        // $data_management_level_array[$i] = $row['line']; //--> create Object

    }
} else {
    $data_management_level[0][0] = 0;
    $data_management_level[0][1] = '';
    $data_management_level[0][2] = '';
    $data_management_level_array[0] = '';
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
                                <h3 class="card-title">Danh Sách Cấp Độ Quản Lý</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_management_level">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Đăng ký cấp độ quản lý
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <div class="card-body table-responsive p-0">
                            <table id="register_management_level_table" class="table table-hover text-nowrap table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="width: 40%">Tên cấp độ quản lý</th>
                                        <th style="width: 40%">Hình ảnh</th>
                                        <!-- <th style="width: 5%">Sửa</th> -->
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($data_management_level[0][0] != 0) {
                                        $stt_management_level = 0;
                                        for ($i = 0; $i < count($data_management_level); $i++) {
                                            $stt_management_level++;
                                            echo '<tr>';
                                            echo '<td>' . $stt_management_level . '</td>
                                                <td>' . $data_management_level[$i][1] . '</td>
                                                <td> 
                                                <div class="d-flex align-items-center justify-content-center">
                                                <img src=" ' . dirname($_SERVER['SCRIPT_NAME']) . '/'  . $data_management_level[$i][2] . ' "style="display:flex; height: 38px; max-width:60px;">
                                                </div>
                                            </td>';
                                            echo '
                                            
                                                <td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                                onclick ="delete_register_management_level(' . $data_management_level[$i][0] . ',' . '\'' . $data_management_level[$i][1] . '\'' . ',' . '\'' . $data_management_level[$i][2] . '\'' . ')">Xóa</button></td>';
                                            echo '</tr>';
                                        }
                                    }

                                    // <td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                    // onclick ="edit_register_management_level(' . $data_management_level[$i][0] . ',' . '\'' . $data_management_level[$i][1] . '\'' . ',' . '\'' . $data_management_level[$i][2] . '\'' . ')">Sửa</button></td>
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
</div>
<!-- Modal thêm sản phẩm -->
<div class="modal fade" id="add_management_level" tabindex="-1" role="dialog" aria-labelledby="exadd_management_level" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exadd_management_level">Đăng Ký cấp độ quản lý</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="register_management_level_form" name="register_management_level_form" class="needs-validation" novalidate action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_management_level"; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group custom-file symbol-class " style="width: 100%;">
                        <div class="col-12 d-flex align-items-center ">
                            <div class="custom-file symbol-class" style="width: 100%;">
                                <input type="file" id="management_level_img_input" name="management_level_img_input[]" accept=".jpg,.jpeg,.png" hidden required multiple>
                                <label for="management_level_img_input" class="col-form-label custom-label" style="border: none; cursor:pointer;padding-left:0;">
                                    <i class="fa fa-upload"></i>
                                    Upload hình ảnh
                                </label>
                                <small class="invalid-feedback " id="management_level_img_input_err" name="management_level_img_input_err">Vui lòng nhập đủ thông tin</small>
                            </div>
                        </div>
                        <div id="box_img" class="col-12 d-flex align-items-center justify-content-center row">
                            <img src="#" alt="" id="img_management_level_input" style="display:none; height: 38px; max-width:60px;">
                        </div>
                        <div class="form-group"> <small class="" id="_err" name="_err">Vui lòng chỉ nhập file có đuôi .jpg,.jpeg,.png và dung lượng không quá 5MB</small></div>
                    </div>

                    <div class="modal-footer">
                        <input id="register_management_level_function" name="register_management_level_function" hidden></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id='management_level_name_input_btn' onclick="register_management_level_btn()" class="btn btn-primary">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- form delete  -->
<form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_management_level"; ?>" method="post">
    <!-- model -->
    <div class="modal fade" id="myDelete">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa thông tin cấp độ quản lý</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin cấp độ quản lý: <span id="delete_management_level_input"></span> ?</p>
                    <input required type="hidden" id="del_id" name="del_id">
                    <input required type="hidden" id="img_path_del" name="img_path_del">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-outline-light" name="delete_management_level_function" id="delete_management_level_function">Xóa</button>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>

<!-- //  Data table setting -->
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/register_function.js" ?>"></script>
<script>
    //createDataTable(id,pagelength, seaching)
    createDataTable('register_management_level_table', 10, true);
</script>


<script type="text/javascript">
    $("#management_level_img_input").change(function() {
        var names = [];
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            x = URL.createObjectURL($(this).get(0).files[i]);
            $('#box_img').append(
                `
               <img src="${x}" alt=""  style="display:flex; height: 38px; max-width:60px;">
            `)
            // names.push($(this).get(0).files[i].name);
        }


    })

    function delete_register_management_level(id_del, name_del, img_path_del) {
        document.getElementById('del_id').value = id_del;
        document.getElementById('img_path_del').value = img_path_del;

        document.getElementById('delete_management_level_input').innerHTML = name_del;
        alert("Chức năng đang phát triển")
        // $("#myDelete").modal('toggle');
    }

    function warning() {
        // console.log("start");
        $("#myWarning").modal('toggle');
    }

    function register_management_level_btn() {
        disableBtn('management_level_name_input_btn');
        management_level_img = $('#management_level_img_input').val();
        check_img = checkInputValue([], 'management_level_img_input', 'management_level_img_input_err', false)
        console.log(management_level_img, check_img);
        // console.log(checkLine, checkProductFamily)
        if (check_img) {
            document.getElementById('register_management_level_form').submit()

        }
    }
</script>
<script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/function_for_form.js" ?>"></script>
