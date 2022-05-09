<?php

// check role
if ($_COOKIE['role'] == 0) {
} else {
    // header('Location: /kpimanagement/login.php');
    echo "<script>document.location = '/fiot-hdvn/login.php'</script>";
}
//set public connect
$connect = $GLOBALS['connect'];

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
        $data_account[$i][5] = $row['email'];
        $data_account[$i][6] = $row['role'];
        $data_account[$i][7] = $row['role_name'];
        $i++;
    }
} else {
    $data_account[0][0] = '';
    $data_account[0][1] = '';
    $data_account[0][2] = '';
    $data_account[0][3] = '';
    $data_account[0][4] = '';
    $data_account[0][5] = '';
    $data_account[0][6] = '';
    $data_account[0][7] = '';
}

// select  ROLE
$sqlcheck_role = "SELECT * FROM `tb_role` ORDER BY `id` ASC";
$resultcheck_role = mysqli_query($connect, $sqlcheck_role);
// $check_role = mysqli_fetch_assoc( $resultcheck_role );
if ($resultcheck_role && $resultcheck_role->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_role->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_role[$i][0] = $row['id'];
        $data_role[$i][1] = $row['role'];
        $data_role[$i][2] = $row['role_name'];
        $i++;
    }
} else {
    $data_role[0][0] = '';
    $data_role[0][1] = '';
    $data_role[0][2] = '';
}

?>

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Account Management</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th style="width: 5%; border: 2px solid #8fa2bf;">No.</th>
                            <th style="width: 20%; border: 2px solid #8fa2bf;">User Name</th>
                            <th style="width: 20%; border: 2px solid #8fa2bf;">Full Name</th>
                            <th style="width: 25%; border: 2px solid #8fa2bf;">Email</th>
                            <th style="width: 7%; border: 2px solid #8fa2bf;">Position</th>
                            <th style="width: 5%; border: 2px solid #8fa2bf;">Department</th>
                            <th style="width: 5%; border: 2px solid #8fa2bf;">Role</th>
                            <th style="width: 8%; border: 2px solid #8fa2bf;">Change Role</th>
                            <th style="width: 5%; border: 2px solid #8fa2bf;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt_account = 0;
                        for ($i = 0; $i < count($data_account); $i++) {
                            if ($data_account[$i][7] == '') {
                                $stt_account++;
                                echo '<tr>';
                                echo '<td style="border: 2px solid #a6ffff;">' . $stt_account . '</td>
                                    <td style="border: 2px solid #a6ffff;">' . $data_account[$i][1] . '</td>
                                    <td style="border: 2px solid #a6ffff;">' . $data_account[$i][2] . '</td>
                                    <td style="border: 2px solid #a6ffff;">' . $data_account[$i][5] . '</td>
                                    <td style="border: 2px solid #a6ffff;">' . $data_account[$i][3] . '</td>
                                    <td style="border: 2px solid #a6ffff;">' . $data_account[$i][4] . '</td>
                                    <td style="border: 2px solid #a6ffff;"><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                    onclick ="editAccount(' . $data_account[$i][0] . ',' . '\'' . $data_account[$i][1] . '\'' . ')">Set Role</button></td>';
                                echo '<td style="border: 2px solid #a6ffff;"><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                    onclick ="deleteAccount(' . $data_account[$i][0] . ',' . '\'' . $data_account[$i][1] . '\'' . ')">Delete</button></td>';
                                echo '</tr>';
                            }
                        }
                        for ($i = 0; $i < count($data_account); $i++) {
                            if ($data_account[$i][7] != 'MASTER' && $data_account[$i][7] != '') {
                                $stt_account++;
                                echo '<tr>';
                                echo '<td>' . $stt_account . '</td>
                                    <td>' . $data_account[$i][1] . '</td>
                                    <td>' . $data_account[$i][2] . '</td>
                                    <td>' . $data_account[$i][5] . '</td>
                                    <td>' . $data_account[$i][3] . '</td>
                                    <td>' . $data_account[$i][4] . '</td>
                                    <td>' . $data_account[$i][7] . '</td>';
                                echo '<td><button type="button" name="edit" id="edit" class="btn btn-warning btn-xs"
                                    onclick ="editAccount(' . $data_account[$i][0] . ',' . '\'' . $data_account[$i][1] . '\'' . ')">Change Role</button></td>';
                                echo '<td><button type="button" name="delete" id="delete" class="btn btn-danger btn-xs"
                                    onclick ="deleteAccount(' . $data_account[$i][0] . ',' . '\'' . $data_account[$i][1] . '\'' . ')">Delete</button></td>';
                                echo '</tr>';
                            }
                        }

                        ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th style="width: 5%">STT</th>
                            <th style="width: 20%">User Name</th>
                            <th style="width: 20%">Full Name</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 5%">Position</th>
                            <th style="width: 5%">Department</th>
                            <th style="width: 5%">Role</th>
                            <th style="width: 7.5%">Action</th>
                            <th style="width: 7.5%"></th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/master"; ?>" method="post">
    <div class="modal fade" id="myWarning">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h4 class="modal-title">Duplicate user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your user is duplicate. Please type a different user!</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Ok</button>
                    <!-- <button type="button" class="btn btn-outline-dark">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="mySuccess">
        <div class="modal-dialog">
            <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Register success</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Create a account success.</p>
                </div>
                <!-- <div class="modal-footer justify-content-between"> -->
                <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Ok</button> -->
                <!-- <button type="button" class="btn btn-outline-light">Save changes</button> -->
                <!-- </div> -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="myDelete">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Account: <span id="user_delete" name="user_delete"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete the account!!! </p>
                    <input type="hidden" id="delete_stt" name="delete_stt">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light" name="post_delete_account"
                        id="post_delete_account">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="myEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set role for: <span id="user_edit" name="user_edit"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <p>Are you sure to delete the account!!! </p> -->
                    <input type="hidden" id="edit_stt" name="edit_stt">
                    <label for="edit_role" class="col-form-label">Role.</label>
                    <select class="form-control" id="edit_role" name="edit_role">
                        <option value="">Select Role</option>
                        <!-- <option value="MASTER">MASTER</option> -->
                        <!-- <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                        <option value="GUEST">GUEST</option> -->
                        <?php
                        for ($i = 0; $i < count($data_role); $i++) {
                            if ($data_role[$i][2] != 'MASTER') {
                                echo '<option value="' . $data_role[$i][2] . '">' . $data_role[$i][2] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light" name="post_edit_account"
                        id="post_edit_account">Edit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


</form>

<script type="text/javascript">
function warning() {
    // console.log("start");
    $("#myWarning").modal('toggle');
}

function deleteAccount(id_del, user_del) {
    // console.log(id_stt);
    document.getElementById('delete_stt').value = id_del;
    document.getElementById('user_delete').innerHTML = user_del;
    $("#myDelete").modal('toggle');
}

function editAccount(id_edit, user_edit) {
    // console.log(id_stt);
    document.getElementById('edit_stt').value = id_edit;
    document.getElementById('user_edit').innerHTML = user_edit;
    $("#myEdit").modal('toggle');
}
// function changeRole(id_change, user_change) {
//     // console.log(id_stt);
//     document.getElementById('change_stt').value = id_change;
//     document.getElementById('user_change').innerHTML = user_change;
//     $("#myChange").modal('toggle');
// }

function success() {
    // console.log("start");
    $("#mySuccess").modal('toggle');
    setTimeout(function() {
        document.location = 'register.php';
    }, 2000);
}
// $(document).ready(function () {
// });
</script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>

<?php

//submit register
if (isset($_POST["register"])) {

    for ($i = 0; $i < count($data_account); $i++) {
        if ($username == $data_account[$i][1]) {
            echo "<script>warning()</script>";
            die();
        }
    }
    $sqlregister = "INSERT INTO `users_jtekt`(`username`, `password`, `role`) VALUES ('$username', '$password', '$role')";
    if (mysqli_query($connect, $sqlregister)) {
        mysqli_close($connect);
    }
    echo "<script>success()</script>";
} else if (isset($_POST["post_delete_account"])) {
    $deletestt = $_POST['delete_stt'];
    $sqldelete = "DELETE FROM `tb_account` WHERE `id` = '$deletestt'";
    if (mysqli_query($connect, $sqldelete)) {
        // echo 'File uploaded successfully'
        // myAlert1( 'Start loss cause success', 'machinerecord.php?');

        mysqli_close($connect);
        // die();

    }
    echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/master'</script>";
} else if (isset($_POST["post_edit_account"])) {

    $edittstt = $_POST['edit_stt'];
    $edit_role = $_POST['edit_role'];

    for ($i = 0; $i < count($data_role); $i++) {
        if ($data_role[$i][2] == $edit_role) {
            $role = $data_role[$i][1];
            break;
        }
    }
    $sqledit = "UPDATE `tb_account` SET `role`='$role',`role_name`='$edit_role' WHERE `id` = '$edittstt'";
    if (mysqli_query($connect, $sqledit)) {
        // echo 'File uploaded successfully'
        // myAlert1( 'Start loss cause success', 'machinerecord.php?');
        mysqli_close($connect);
        // die();
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/master'</script>";
    }
}
// else if(isset($_POST["post_change_account"])){

//     $changetstt = $_POST['change_stt'];
//     $change_role = $_POST['change_set_role'];

//     for($i =0; $i <count($data_role); $i++){
//         if($data_role[$i][2] == $edit_role){
//             $role = $data_role[$i][1];
//             break;
//         }
//     }
//     $sqledit = "UPDATE `tb_account` SET `role`='$role',`role_name`='$edit_role' WHERE `id` = '$edittstt'";
//     if ( mysqli_query( $connect, $sqledit ) ) {
//         // echo 'File uploaded successfully'
//         // myAlert1( 'Start loss cause success', 'machinerecord.php?');
//         mysqli_close( $connect );
//         // die();
//         echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/master'</script>"; 
//     }

// }


?>