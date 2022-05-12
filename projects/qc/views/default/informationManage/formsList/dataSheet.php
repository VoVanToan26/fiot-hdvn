<?php
require_once "../dbFunction/load_data_db.php";
require_once "../dbFunction/handle_data.php";
?>
<style type="text/css">
    .pl-0-2 {
        padding-left: 0.2%;
    }

    /* 
    .table-data-sheet {
        table-layout:fixed; 
        min-width: 1294px;
    } */

    .table-data-sheet td,
    .table-data-sheet tr,
    table-data-sheet {
        padding: 0;

    }

    .table-data-sheet td {
        min-width: 45px;
        align-items: center;
        vertical-align: middle;
    }
</style>
<script>
    data_management_level = "<?php echo $data_management_level_one ?>"
    filenames = data_management_level.split(';');
    filenames.forEach(value => $('#management_img_box').append(`<img src='/fiot-hdvn/${value}' alt=""  style="display:flex; height: 38px; max-width:60px;">`))
</script>
<div class="sub-box d-flex flex-column w-100">
    <!-- Head table -->
    <div class=" form-head d-flex flex-row m-tb-5 w-100 ">
        <div class="head-left col row ">
            <table class="w-100 text-nowrap ">
                <tr>
                    <td height=60 class="w-10 pl-2 ">Line:</td>
                    <td class="w-20 pl-2"><?php echo $data_line ?></td>
                    <td class="w-70 text-center">
                        <h3>DATASHEET</h3>
                    </td>
                </tr>
                <tr>
                    <td height=50 class="w-10 pl-2 "></td>
                    <td class="w-20 pl-2"></td>
                    <td  class="w-70">
                        <div id="management_img_box" class="w-100 d-flex align-items-center justify-content-center">

                        </div>
                    </td>

                </tr>
            </table>
        </div>
        <!-- table đăng kí -->
        <div class="head-center col row d-flex justify-content-center ">
            <table class="w-90 table-bordered ">
                <tr>
                    <td class="w-40">Mã SP　　品番:</td>
                    <th class="w-60"><?php echo $data_line ?></th>
                </tr>
                <tr>
                    <td>Tên SP　　品名:</td>
                    <th><?php echo $data_part_no ?></th>
                </tr>
                <tr>
                    <td>Công đoạn　　工程:</td>
                    <th><?php echo $data_process ?></th>
                </tr>
                <tr>
                    <td>Số quản lý　　管理No:</td>
                    <th> 1050</th>
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
                            <td id="xrs-confirm-mgr" class="no-border-top text-center" ><?php echo $data_create_form ?></td>
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
                            <td id="xrs-confirm2-mgr" class="no-border-top text-center" onclick="sign_mgr_form_confirm_function()"></td>
                            <td id="xrs-confirm-sup" class="no-border-top text-center" onclick="sign_sup_form_confirm_function()"></td>
                            <td id="xrs-confirm-tl" class="no-border-top text-center" onclick="sign_tl_form_confirm_function()"></td>
                        </tr>
                    </table>
                </div>
            </div>

    </div>

    <!-- Body of table -->
    <div class="form-body w-100 ">
        <table class="table-data-sheet  table table-responsive text-center table-bordered w-100 m-0">

            <tr>
                <td rowspan="3" width="10%" class="text-wrap">
                    Hạng mục kiểm tra, đặc tính
                    <br>ﾁｪｯｸ項目特性
                </td>
                <td width="10%"></td>
                <td width="5%" class="">Ngày 日</td>
                <?php
                //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                add_data_time_one_row(30, $data_tb, 4, 8, 2)
                ?>
            </tr>

            <!-- row2 -->
            <tr>
                <!-- 1 col span -->
                <td class="">Tầng suất 頻度</td>
                <td>Tháng 月</td>

                <?php
                //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                add_data_time_one_row(30, $data_tb, 4, 5, 2)
                ?>

            </tr>

            <tr>
                <td class="">Dụng cụ đo、測定器</td>
                <td>Ca</td>
                <!-- add 26 td -->
                <?php
                //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                add_data_time_one_row(30, $data_tb, 5, 0, 1)
                ?>
            </tr>

            <tr>
                <td height=250 class="text-wrap"> <?php echo $data_measurement_items ?> </td>
                <td class="text-wrap"><?php echo $data_allowance_display ?> </td>
                <td rowspan="2" colspan="31">
                    <div height="500" ,class="chart fbi-sub-item fbi-sub-item-3  ">
                        <figure class="highcharts-figure pl-0-2">
                            <div id="dataSheet-chart"></div>
                        </figure>
                    </div>
                </td>
            </tr>
            <tr>
                <td height=250 class="text-wrap"> <?php echo $data_frequency ?> </td>
                <td> <?php echo $data_measuring_tools ?> </td>
            </tr>

            <tr id="row-Cavity-DS">
                <td colspan="3" style="width:23%" class="">Cavity</td>

                <?php
                //add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $length)
                add_data_time_one_row(30, $data_tb, 22, 0, 1)
                ?>
            </tr>
            <!-- Row7 -->
            <tr id="row-CN-DS">
                <td colspan="3" class=" ">CN</td>
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

            <tr id="">
                <td colspan="3" id="" class=" ">SL/TL 1D</td>
                <?php
                sign_day($data_tb, $data_tb_sign, $data_account)
                ?>
            </tr>
            <tr id="">
                <td colspan="3" class=" ">SV 1/W</td>
                <?php
                sign_week($data_tb, $data_tb_sign, $data_account)

                ?>
            </tr>

            <tr>
                <td height=200 colspan="1" class="text-wrap ">Cột liên lạc (Khi có phát sinh bất thường phải ghi nguyên
                    nhân và đối sách)
                    <br>異常発生すれば、原因と対策を記入する事
                </td>
                <td colspan="20"></td>
                <td colspan="12">
                    <div class=" d-flex w-100">
                        <img src='<?php echo '/fiot-hdvn' . '/' . $data_draw ?>' alt="Form check sheet" class="w-100">
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="33" class="text-right ">FQI-P0708 (ISS.01)</td>
            </tr>
        </table>
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

<?php
for ($i = 0; $i < count($data_tb); $i++) {
    $data_y[$i] = $data_tb[$i][17];
}
$a = max($data_y) - min($data_y);
$chart_min = min($data_y) - $a / 2;
$chart_max = max($data_y) + $a / 2;
$chart_step = ($chart_max - $chart_min) / 10;
?>

<script>
    var x_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,29, 30]
    var y_value = [
        <?php
        for ($i = 0; $i < count($data_tb); $i++) {
            echo   $data_tb[$i][17] . ',';
        }
        ?>
    ]
    console.log(y_value)
    tick_pos_dataSheet = cac_tick_pos(<?php echo $chart_min . ',' . $chart_max . ',' . $chart_step ?>)

    console.log(tick_pos_dataSheet)

    Highcharts.chart('dataSheet-chart', {
        chart: {
            reflow: true,
            height: 500,
            margin: [5, 5, 5, 82],
            plotBorderColor: 'black',
            plotBorderWidth: 1
        },

        title: '',
        legend: {
            enabled: false
        },
        // remove highchart.com
        credits: {
            enabled: false
        },
        xAxis: {
            title: '',
            // label:categories,
            data: x_value,
            min: 0.5,
            max: 30.5,
            step: 1,
            tickInterval: 1,
            gridLineWidth: 1,
            labels: {
                enabled: false
            },
            tickWidth: 0,
        },
        yAxis: {
            title: '',
            min: <?php echo $chart_min ?>,
            max: <?php echo $chart_max ?>,
            // step: 0.001,
            startOnTick: false,
            endOnTick: false,
            labels: {
                format: '{value:.3f}',
            },
            tickPositions: tick_pos_dataSheet[0],
            minorTickInterval: tick_pos_dataSheet[1] / 2,
            tickPosition: 'outside',
            gridLineWidth: 1,

            plotLines: [{
                color: 'red',
                width: 2,
                zIndex: 5,
                value: 210,
                dashStyle: 'shortdash'
            }, {
                color: 'red',
                width: 3,
                zIndex: 5,
                value: 270,
                dashStyle: 'dash'
            }, {
                color: 'red',
                width: 3,
                zIndex: 5,
                value: 160,
                dashStyle: 'dash'
            }],

        },
        plotOptions: {
            series: {
                pointStart: 1
            }
        },
        series: [{
            type: 'line',
            name: '',
            marker: {
                symbol: 'circle',
                fillColor: '#000000',
                lineWidth: 1.5,
                lineColor: '#000000',
            },
            data: y_value,

        }]
    });
</script>

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
        switch (name) {
            case 'mgr':
                // code block
                break;
            case 'sup':
                // code block
                break;
            default:
                // code block
        }
        $("#form_confirm_modal").modal('toggle');
    }

    function sign_function() {
        var sub_id = document.getElementById("show_sub_id").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                if (myArr[0] != false) {
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
    // duyệt TL form
    function sign_tl_form_confirm_function() {
        alert("TL CONFIRM");
    }
    // duyệt SUP form
    function sign_sup_form_confirm_function() {
        alert("SUP CONFIRM");
    }
    // duyệt MGR form
    function sign_mgr_form_confirm_function() {
        alert("MGR CONFIRM");
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