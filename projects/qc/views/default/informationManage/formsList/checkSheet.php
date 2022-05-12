<?php
require_once "../dbFunction/load_data_db.php";
require_once "../dbFunction/handle_data.php";
?>
<script type="text/javascript">
    function edit_sanpham(params) {
        alert("edit san pham");
    }

    function delete_sanpham(params) {
        alert("delete san pham");
    }
</script>
<style type="text/css">
    .cs-main-table {
        table-layout: fixed;
    }

    .cs-main-table td {
        vertical-align: middle;
        padding: 3px;
    }
</style>
<script>
    data_management_level = "<?php echo $data_management_level_one ?>"
    filenames = data_management_level.split(';');
    filenames.forEach(value => $('#management_img_box').append(`<img src='/fiot-hdvn/${value}' alt=""  style="display:flex; height: 38px; max-width:60px;">`))
</script>
<div class="w-100% ">
    <div class="sub-box d-flex flex-column border   ">
        <div class="table-head d-flex flex-row m-tb-5 p-0">
            <div class="head-left col row ">
                <table class="w-100 text-nowrap ">
                    <tr>
                        <td height=60 class="w-10 pl-2 ">Line:</td>
                        <td class="w-20 pl-2"><?php echo $data_line ?></td>
                        <td class="w-70 text-center">
                            <h3>CHECKSHEET</h3>
                        </td>
                    </tr>
                    <tr>
                        <td height=50 class="w-10 pl-2 "></td>
                        <td class="w-20 pl-2"></td>
                        <td class="w-70">
                            <div id="management_img_box" class="w-100 d-flex align-items-center justify-content-center">

                            </div>
                        </td>

                    </tr>
                </table>
            </div>
            <!-- table đăng kí -->
            <div class="head-center col row d-flex justify-content-center">
                <table class="cs-table-head-center w-90 table-bordered">
                    <tr>
                        <td class="w-40">Mã SP　　品番</td>
                        <th class="w-60"><?php echo $data_line ?></th>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm　　製品名</td>
                        <th><?php echo $data_part_no ?></th>
                    </tr>
                    <tr>
                        <td>Tên CĐ　　工程名</td>
                        <th><?php echo $data_process ?></th>
                    </tr>
                    <tr>
                        <td>Số quản lý　　管理№</td>
                        <th>DDCV3-04-12</th>
                    </tr>
                </table>
            </div>
            <div class="head-right row d-flex  justify-content-end w-35 m-0">
                <div class="sub-head-right w-24">
                    <table class=" h-100  w-100 mr-3 table-bordered">
                        <tr class="h-20  text-center ">
                            <td class="text-nowrap">Xác nhận</td>
                        </tr>
                        <tr class="h-20 text-left">
                            <td class="no-border-bot">Mgr</td>
                        </tr>
                        <tr class="h-60 ">
                            <td id="xrs-confirm-mgr" class="no-border-top text-center"><?php echo $data_create_form ?></td>
                        </tr>
                    </table>
                </div>
                <div class="sub-head-right w-4">
                </div>
                <div class="sub-head-right w-72  ">
                    <table class="table-bordered h-100 w-100 ">
                        <tr class="h-20">
                            <td colspan="3" class="text-center">HDVN QA INSPECTION</td>
                        </tr>
                        <tr class=" h-20 text-left ">
                            <td class="col-4 no-border-bot">Mgr</td>
                            <td class="col-4 no-border-bot">Sup</td>
                            <td class="col-4 no-border-bot">TL</td>
                        </tr>
                        <tr class="h-60 ">

                            <td id="cs-confirm-production-mgr" class="no-border-top text-center">
                                <?php if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][5] != null)
                                    echo '<i style="cursor: pointer;"  class="fas fa-edit" onclick="sign_form_confirm_function(\'sign_mgr\')"</i>';
                                else if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][5] != null)
                                    echo $data_tb_sign[30][6];
                                else
                                    echo null;
                                ?></td>
                            <td id="cs-confirm-production-sup" class="no-border-top text-center">
                                <?php if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][4] != null)
                                    echo '<i style="cursor: pointer;"  class="fas fa-edit" onclick="sign_form_confirm_function(\'sign_sup\')"</i>';
                                else if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][5] != null)
                                    echo $data_tb_sign[$count_sig - 1][5];
                                else
                                    echo null;
                                ?></td>
                            </td>
                            <td id="cs-confirm-production-tl" class="no-border-top text-center">
                                <?php
                                if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][3] != null)
                                    echo '<i style="cursor: pointer;"  class="fas fa-edit" onclick="sign_form_confirm_function(\'sign_tl\')"</i>';
                                else if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][4] != null)
                                    echo $data_tb_sign[$count_sig - 1][4];
                                else
                                    echo null;
                                ?></td>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="table-body d-flex flex-row">
            <table class="cs-main-table table-bordered table  text-nowrap text-center w-100 p-0">
                <tr>
                    <td rowspan="3" class="w-10">Hạng mục <br> KTチェック項目</td>
                    <td rowspan="6" class="w-5">Dụng cụ đo <br>頻度 </td>
                    <td rowspan="6" class="w-3 text-wrap">Tần suất kiểm tra <br>頻度 </td>
                    <td class="w-5">Ngày</td>
                    <?php
                    //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                    add_data_time_one_row(30, $data_tb, 4, 8, 2)
                    ?>
                </tr>
                <tr>
                    <td>Tháng</td>
                    <?php
                    //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                    add_data_time_one_row(30, $data_tb, 4, 5, 2)
                    ?>

                </tr>
                <tr>
                    <td>Ca</td>
                    <?php
                    //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                    add_data_time_one_row(30, $data_tb, 5, 0, 1)
                    ?>
                </tr>
                <tr>
                    <td rowspan="3" class="w-15">Đặc tính <br> 特性 </td>
                    <td>Lần đo</td>
                    <?php
                    //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                    add_data_time_one_row(30, $data_tb, 13, 0, 2)
                    ?>
                </tr>
                <tr>
                    <td>Cavity </td>
                    <?php
                    //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                    add_data_time_one_row(30, $data_tb, 22, 0, 1)
                    ?>
                </tr>
                <tr class="">
                    <td class="p-3">Điều kiện <br> kiểm tra </td>
                    <?php
                    for ($i = 0; $i < 30; $i++) {
                        if ($i < count($data_tb)) {
                            // $data_manu = substr($array_data[$i][15], $position_in_tb, $lenght);
                            echo '<td style="width:auto;font-size: 60%"; class="text-wrap">' . $data_tb[$i][15] . '</td>';
                        } else {
                            echo '<td style="width:auto"></td>';
                        }
                    }
                    ?>
                </tr>
                <tr class="">
                    <td height=100 class="text-wrap"><?php echo $data_measurement_items ?></td>
                    <td rowspan="2" class="text-wrap"><?php echo $data_measuring_tools ?></td>
                    <td rowspan="2" colspan="2" class="w-30 text-wrap"><?php echo $data_frequency ?></td>
                    <?php
                    for ($i = 0; $i < 30; $i++) {
                        if ($i < count($data_tb)) {
                            // $data_manu = substr($array_data[$i][15], $position_in_tb, $lenght);
                            echo '<td rowspan="2" style="width:auto;font-size: 100%"; class="text-wrap">' . $data_tb[$i][17] . '</td>';
                        } else {
                            echo '<td rowspan="2" style="width:auto"></td>';
                        }
                    }
                    ?>
                </tr>
                <tr class="">
                    <td height=100 class="text-wrap"><?php echo $data_allowance_display ?></td>
                </tr>
                <tr class="">
                    <td colspan="2" rowspan="3" height=150>
                        <!-- <img src="../../../projects/qc/img-qc/form_CheckSheet.png" alt="Form check sheet"
                            style="max-width:100%;max-height:100%"> -->

                        <div class=" d-flex w-100">
                            <?php
                            if ($data_draw != '') {
                                echo '<img src="/fiot-hdvn/' . $data_draw . '" alt="Bản vẽ form check sheet"
                                    style="max-height:140px;max-width:100%">';
                            }
                            ?>
                    </td>

                    <td colspan="2">Người thao tác</td>
                    <?php
                    for ($i = 0; $i < 30; $i++) {
                        // echo '<td style="width:auto"></td>';
                        if ($i < count($data_tb)) {
                            echo '<td style="max-width: 15px; font-size: 60%;overflow: hidden;
                                                text-overflow: ellipsis; ">' . $data_tb[$i][12] . '</td>';
                        } else {
                            echo '<td style="max-width: 15px; font-size: 55%;overflow: hidden;
                                        text-overflow: ellipsis; "></td>';
                        }
                    }
                    ?>

                </tr>
                <tr class="">
                    <td colspan="2">TL/SL</td>
                    <?php
                    sign_day($data_tb, $data_tb_sign, $data_account)
                    ?>
                </tr>
                <tr class="">
                    <td colspan="2">TSV 1/W</td>
                    <?php
                    sign_week($data_tb, $data_tb_sign, $data_account)

                    ?>
                </tr>
                <tr>
                    <td colspan="4" class="text-font-m text-left p-0">Cột liên lạc: 連絡 <br>
                        Khi có phát sinh bất thường phải ghi nguyên nhân và đối sách.<br>
                        異常発生すれば、原因と対策を記入する事
                    </td>
                    <td colspan=30></td>
                </tr>
                <tr class="no-border" height=30>
                    <td colspan="4" class="text-left no-border p-0 pl-2">Ghi "○" nếu không có bất thường, ghi "X" nếu có
                        bất thường</td>
                    <td colspan="20" class="text-center no-border p-0">Khi có bất thường liên lạc ngay với
                        TeamLeader-->Supervisor</td>
                    <td colspan="10" class="text-center no-border p-0">FQI-P0707(ISS.01)</td>
                </tr>
            </table>
        </div>

    </div>
</div>


<!-- Modal confirm sign begin -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Duyệt dữ liệu ngày</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p><?php echo $_COOKIE['full_name'] . ' (' . $_COOKIE['username'] . ')' ?></p>
                <input id="show_sub_id" hidden></input>
                <p> Xác nhận duyệt dữ liệu đo: <span id="show_data_measuring"></span></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-outline-light" onclick="sign_day_function()">Duyệt</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal SIGN-->
<div class="modal fade" id="confirm-modal-week">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Duyệt dữ liệu tuần</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $_COOKIE['full_name'] . ' (' . $_COOKIE['username'] . ')' ?></p>
                <input id="show_sub_id_week" hidden></input>
                <p> Xác nhận duyệt dữ liệu tuần</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-outline-light" onclick="sign_week_function()">Duyệt</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>

<!-- Modal aproval full form-->
<div class="modal fade" id="form_confirm_modal">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Xác nhận duyệt form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <input id="show_sub_id" hidden></input> -->
                <p> Xác nhận duyệt form với tên là: <span id="show_data_confirm">
                        <p><?php echo $_COOKIE['full_name'] . '<br> MSNV:' . $_COOKIE['username']  ?></p>
                    </span></p>
                <form id="sign_confirm_approval" action="<?php echo $SCRIPT_NAME. "/qc/sign"; ?>" method="post">
                    <input hidden id="sub_id_search_input" name="sub_id_search_input">
                    <input hidden id="sign_form" name="sign_form">
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                <button type="submit" form="sign_confirm_approval" class="btn btn-outline-light">Duyệt</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    // duyệt ngày
    function sign_day_confirm_function(sub_id, measuring_data) {
        document.getElementById("show_sub_id").value = sub_id;
        document.getElementById("show_data_measuring").innerHTML = measuring_data;
        $("#confirm-modal").modal('toggle');
    }
    // duyệt tuần
    function sign_week_confirm_function() {
        // document.getElementById("show_sub_id").value = sub_id;
        // document.getElementById("show_data_measuring").innerHTML = measuring_data;
        var fx_send_sub_id_week = "";
        for (i = 0; i < arguments.length; i++) {
            // console.log(arguments[i]);
            fx_send_sub_id_week += arguments[i] + ",";
        }
        console.log(fx_send_sub_id_week);
        document.getElementById("show_sub_id_week").value = fx_send_sub_id_week;
        $("#confirm-modal-week").modal('toggle');
    }

    function sign_form_confirm_function(name) {
        $("#sign_form").val(name);
        $("#sub_id_search_input").val('.<?php echo $sub_id_search ?>.');
        $("#form_confirm_modal").modal('toggle');
    }


    function sign_day_function() {
        var sub_id = document.getElementById("show_sub_id").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                if (myArr[0] != false) {
                    // alert(myArr[0]);
                    // document.location = SCRIPT_NAME + '/qc/informationManage/approval?load_link=yes';
                    location.reload();
                } else {
                    alert("ERR");
                }
            }
        };
        var link_get_data = SCRIPT_NAME + "/qc/sign";
        xmlhttp.open(
            "GET",
            `${link_get_data}?sign_day=yes&sub_id=${sub_id}`,
            true
        );
        xmlhttp.send();
    }

    function sign_week_function() {
        var sub_id_week = document.getElementById("show_sub_id_week").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                if (myArr[0] != false) {
                    // alert(myArr[0]);
                    // document.location = SCRIPT_NAME + '/qc/informationManage/approval?load_link=yes';
                    location.reload();
                } else {
                    alert("ERR");
                }
            }
        };
        var link_get_data = SCRIPT_NAME + "/qc/sign";
        xmlhttp.open(
            "GET",
            `${link_get_data}?sign_week=yes&sub_id_week=${sub_id_week}`,
            true
        );
        xmlhttp.send();
    }
</script>