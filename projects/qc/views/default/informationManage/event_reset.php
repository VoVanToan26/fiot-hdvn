<?php
$connect = $GLOBALS['connect'];
// var_dump($_POST);die();
if (isset($_POST["status_RSI"])) {
    $id = $_POST["id_RSI"];
    $status = $_POST["status_RSI"];
    // var_dump($id,$status);die();
    $sqlRSI = "UPDATE  `qc_tb_measurement_items` SET `status`= '$status' WHERE `id` = '$id'";
    if (mysqli_query($connect, $sqlRSI)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/reset_measurement_items'</script>";
    }
}
else if (isset($_POST["status_RMT"])) {
    $id = $_POST["id_RMT"];
    $status = $_POST["status_RMT"];
    // var_dump($id,$status);die();
    $sqlRSI = "UPDATE  `tb_measuring_tools` SET `status`= '$status' WHERE `id` = '$id'";
    if (mysqli_query($connect, $sqlRSI)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/reset_measuring_tools'</script>";
    }
}
// else if (isset($_POST["delete_status_function"])) {
//     $del_id = $_POST['del_id'];
//     $sqldelete = "DELETE FROM `qc_tb_measurement_items` WHERE `id` = '$del_id'";
//     if (mysqli_query($connect, $sqldelete)) {
//         mysqli_close($connect);
//         echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items'</script>";
//     }
// };
