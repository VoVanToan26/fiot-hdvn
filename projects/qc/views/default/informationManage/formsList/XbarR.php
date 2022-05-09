<script>
function resize_chart() {
    alert("ok")
}
</script>
<style type="text/css">
.flex-mid-cen {
    display: flex;
    align-items: center;
    justify-content: center;
}

.table-body .h-30 {
    height: 30%;
}

.form-body-item {
    width: 100%;
    display: block;
}

.fbi-right {
    margin-left: -1px;
}

.heading-box-item__name {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding-left: 5px;
    justify-content: left;
}

.heading-box-item__name .form-name {
    font-size: 29px !important;
}

.chart-top-right-container {
    margin-left: -1px;
}

.td-name {
    text-align: left;
    padding-left: 3px;
}

.td-value {
    text-align: center;
}

#x-bar-r-table-tr tr td {
    padding: 0;
    text-align: right;
}

#x-bar-r-table-tr tr td:last-child {
    padding: 0;
    text-align: right;
    margin-bottom: 1px;
}

#x-bar-r-table-tr {
    margin-bottom: -1px;
}

.summary-container {
    width: 80%;
    margin: auto;
}

.summary-table {
    /* margin: auto; */
    width: 100%;
}

.summary-table td {

    line-height: 24px;
    border-bottom: 1px solid black;
    text-align: center;
}

.td-evaluate {
    border: 2px solid black !important;
    height: 35px;
    margin-top: 5px;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    font-weight: bold;
}

.fb-item {
    border: 1px solid black;
    border-left: none;
    margin-top: -1px;
    z-index: 100;
    position: relative;
}

/* Style of table bot -left */
/* #xbar-table-bot-chart {
        text-align: center;
    } */

.table-footer-right {
    margin-top: 19px;
    height: 130px;
    width: 20%;
}

.table-footer-right td {
    text-align: left;
    font-size: 14px;
}

.table-footer-left td {
    text-align: center;
}

.highcharts-figure {
    margin: 3 !important;
    padding: 0 !important;
}

.form-name-xbar {
    font-size: 1.7rem;
}
</style>
<!-- style hight chart -->
<style>
/* top right */
</style>

<div id="xbarr-box" class="sub-box  w-100">
    123
    <!-- Head table -->
    <div class=" form-head d-flex flex-row w-100 mb--1 mt--1" height="115">
        <div class="head-left w-15 ">
            <table class="table-head-left table-bordered w-100 text-center">
                <tr>
                    <td>n</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>d2</td>
                    <td>1.13</td>
                    <td>1.69</td>
                    <td>2.06</td>
                    <td>2.33</td>
                    <td>2.53</td>
                </tr>
                <tr>
                    <td>A2</td>
                    <td>1.88</td>
                    <td>1.02</td>
                    <td>0.73</td>
                    <td>0.58</td>
                    <td>0.48</td>
                </tr>
                <tr>
                    <td>D4</td>
                    <td>3.27</td>
                    <td>2.58</td>
                    <td>2.25</td>
                    <td>2.12</td>
                    <td>2.00</td>
                </tr>
            </table>
        </div>
        <!-- center -->
        <div class="head-center col row d-flex justify-content-center m-0 w-50">
            <div class="heading-box row w-100">
                <!-- HD logo -->
                <div class="col-1 flex-mid-cen">
                    <img src="../../../projects/qc/img-qc/HD-logo.png" alt="HD-logo" style="width:50px;height:30px">
                </div>
                <!-- Loại biểu đồ -->
                <div class="heading-box-content flex-mid-cen flex-column col-8 text-center">
                    <p class="content-name">Biểu đồ kiểm tra năng lực công đoạn</p>
                    <p class="form-name">(X̅-R,HISTOGRAM)</p>
                </div>
                <!-- Form name -->

                <!-- img1 -->
                <div class="row col-3 ">
                    <div class="col-6 flex-mid-cen">
                        <img src="../../../projects/qc/img-qc/inportance_control_sr_C.png" alt="C-logo" class="pt-2">
                    </div>
                    <div class="col-6 flex-mid-cen">
                        <img src="../../../projects/qc/img-qc/inportance_control_sr_C.png" alt="C-logo" class="pt-2">
                    </div>
                </div>
                <!-- img2 -->
            </div>
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
                        <td id="xbarr-confirm-mgr" class="no-border-top text-center"
                            onclick="show_confirm_modal('xbarr-confirm-mgr','ToanMgr')"></td>
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
                        <td id="xbarr-confirm2-mgr" class="no-border-top text-center"
                            onclick="show_confirm_modal('xbarr-confirm2-mgr','ToanMgr')"></td>
                        <td id="xbarr-confirm-sup" class="no-border-top text-center"
                            onclick="show_confirm_modal('xbarr-confirm-sup','ToanMgr')"></td>
                        <td id="xbarr-confirm-tl" class="no-border-top text-center"
                            onclick="show_confirm_modal('xbarr-confirm-tl','ToanMgr')"></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <!-- Body of table -->
    <div class="form-body row w-100 p-0 m-0">

        <div class="fbi-left col-8 p-0 ">
            <!-- Header -->
            <div class="fb-header w-100">
                <table class="fbi-header-table table-bordered w-100 ">
                    <tr class="">
                        <td class="td-name  w-5 ">Công đoạn</td>
                        <td colspan=3 class="td-value w-5">Ktra tính năng</td>
                        <td class="td-name w-10">Giá trị đặc tính</td>
                        <td class="td-value  w-15">Cường độ mối hàn</td>
                        <td class="td-name  w-5">Mã</td>
                        <td class="td-value  w-15">HV1923815270 </td>
                        <td class="td-name w-10">Máy đo</td>
                        <td class="td-value  w-10">Thiết bị ktra</td>
                        <td class="td-name w-10 "> Sổ quản lý dụng cụ đo </td>
                    </tr>
                    <tr class="">
                        <td class="td-name">Số máy</td>
                        <td class="td-value w-5">AW3</td>
                        <td class="td-name w-5">Line</td>
                        <td class="td-value w-5">4</td>
                        <td class="td-name">Quy cách</td>
                        <td class="td-value">≥30 N</td>
                        <td class="td-name">Tên</td>
                        <td class="td-value">v </td>

                        <td class="td-name ">Đơn vị đo</td>
                        <td class="td-value">v</td>
                        <td class="td-value">v</td>
                    </tr>

                </table>
            </div>
            <!-- Top-left -->
            <div class=" fbi-body-top d-flex flex-row w-100  " style="height:350px">
                <div class="fb-item w-10 flex-mid-cen no-border-bot border-left-black ">X̅
                </div>
                <div class="fb-item w-90 position-relative">
                    <!-- Chart top  left -->
                    <figure class="highcharts-figure ">
                        <div id="xbar-chart-top-left"></div>
                    </figure>
                    <div class="picture-quy-cach-top row">
                        <p class="m-0">≥30 N</p>
                        <img src="../../../projects/qc/img-qc/quycach-form-picture-top.png " alt="quy cach">
                    </div>
                    <div class="picture-quy-cach-bot row">
                        <p class="m-0">≥30 N</p>
                        <img src="../../../projects/qc/img-qc/quycach-form-picture-bot.png " alt="quy cach">
                    </div>
                </div>
            </div>
            <!-- Bot-left -->
            <div class=" fbi-body-mid d-flex flex-row w-100 " style="height:200px">
                <div class="fb-item w-10 flex-mid-cen  no-border-bot border-left-black border-left-black">
                    R
                </div>
                <div class="fb-item w-90 no-border-bot">
                    <!-- Chart-bot-left "-->
                    <figure class="highcharts-figure w-100 ">
                        <div id="container-chart-bot-left"></div>
                    </figure>
                </div>
            </div>

            <div class=" fbi-body-bot ">
                <table id="xbar-table-bot-chart" class="tb-bot-chart table-bordered w-100 no-border-bot">
                    <tr>
                        <td colspan="2" class="w-10 ">Đo</td>
                        <td style="width:6.2%;">Tháng</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="no-border-right">Năm</td>
                        <td class="no-border-left">2020</td>
                        <td>Ngày</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="3">Cavity</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="3">Sổ quản lý dụng cụ đo</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="3">Người thực hiện</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="3">DTL/TL (1/D)</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="3">SV (1/W)</td>
                        <?php
                        for ($i = 0; $i < 26; $i++) {
                            echo '<td style="width:auto"></td>';
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <!-- Table-footer  -->
            <div class="fbi-footer" style="height:171px">
                <table id="table-footer-left" class="table-footer-left table-bordered w-100">
                    <tr>
                        <td class="w-5">Năm</td>
                        <td class="w-5">Tháng</td>
                        <td class="w-4">Ngày</td>
                        <td class="w-40">Nguyên nhân bất thường、Ghi chép nguyên nhân bất thường</td>
                        <td class="w-40">Đối sách（Thiết bị、Dụng cụ、PP、Người thao tác、Sản phẩm）</td>
                        <td class="w-6">Xác nhận</td>
                    </tr>
                    <!-- <script>
                        table_add_row("table-footer-left", 6, 6)
                    </script> -->
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '<tr><tr>';
                        for ($j = 0; $j < 6; $j++) {
                            echo '<td height=24></td>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="fbi-right col-4 p-0 ">
            <table class="fbi-header-table table-bordered  table-nowrap  w-100">
                <tr class="w-100">
                    <td class="td-name  w-20 nowrap">Tần suất</td>
                    <td class="td-value  w-20">4/D</td>
                    <td class="td-name no-border-right w-30">Người đo</td>
                    <td class="td-value  w-30">Nhân viên kiểm tra</td>
                </tr>
            </table>
            <!-- Chart -->
            <div class="fb-item fbi-body-top d-flex flex-row w-100  " style="height:378px">
                <div class="w-20 ">
                    <table id="x-bar-r-table-tr" class=" axes-label-tr-chart w-100">
                        <div class="pl-2" style="height:26px">Khoảng</div>
                        <script>
                        // table_add(element_name, row, col, max, step,sum_height)
                        table_add("x-bar-r-table-tr", 17, 1, 26, 0.1875, 350)
                        </script>


                    </table>
                </div>
                <div class=" w-80 ">
                    <!-- Chart top-right -->
                    <figure class="highcharts-figure ">
                        <div id="container-chart-top-right"></div>
                    </figure>
                </div>
            </div>
            <!-- Table summary bot right -->
            <div class="fb-item fbi-body-mid d-flex flex-row w-100  " style="height:337px">
                <div class="summary-container w-80  ">
                    <table class="summary-table">
                        <tr>
                            <td class="w-20 ">X̅ =</td>
                            <!-- =まとめ!=summary-->
                            <td class="w-25 ">=まとめ!C127</td>
                            <td class="td-merge w-10  no-border-bot " rowspan="8"></td>
                            <td class="w-20 ">3σ＝</td>
                            <td class="w-25 ">123</td>
                        </tr>
                        <tr>
                            <td>σ＝</td>
                            <td>=まとめ!C129</td>
                            <td>6σ＝</td>
                            <td>12315</td>
                        </tr>
                        <tr>
                            <td>Cp＝</td>
                            <td>=まとめ!C131</td>
                            <td>X̅̅+3σ＝</td>
                            <td>12315</td>
                        </tr>
                        <tr>
                            <td>Cpk＝</td>
                            <td>=まとめ!C133</td>
                            <td>X̅̅-3σ＝</td>
                            <td>12315</td>
                        </tr>
                        <tr>
                            <td rowspan="2" colspan="2">
                                <div class="td-evaluate">
                                    <div class="">Đánh giá</div>
                                    <div class=" ">O X △</div>
                                </div>
                            </td>
                            <td class="no-border-bot"></td>
                            <td class="no-border-bot"></td>
                        </tr>
                        <tr>
                            <td>UCL＝</td>
                            <!-- =BY82+(0.73*BY79) -->
                            <td>12315</td>
                        </tr>
                        <tr>
                            <td>R̅ ＝</td>
                            <td>='R'!AG4</td>
                            <td>LCL＝</td>
                            <td>12315</td>
                            <!-- =BY82-(0.73*BY79) -->
                        </tr>
                        <tr>
                            <td>X̅̅ ＝</td>
                            <td>=BY61</td>
                            <td>R UCL＝</td>
                            <!-- =2.28*BY79 -->
                            <td>12315</td>
                        </tr>


                    </table>
                </div>
            </div>
            <div class=" fb-item fbi-footer d-flex flex-column w-100" style="height:172px">
                <div class="w-100% text-center">Ghi chú(Lược đồ vị trí đo,Dk gia công)</div>
                <div class="row p-0">
                    <div class="col-3 p-0 flex-mid-cen ">
                        <table class="table-footer-right p-0 pl-1 ">
                            <tr>
                                <td>X-XCL=</td>
                                <td>25.000</td>
                            </tr>
                            <tr>
                                <td>X-CL=</td>
                                <td>24.000</td>
                            </tr>
                            <tr>
                                <td>X-LCL=</td>
                                <td>23.000</td>
                            </tr>
                            <tr>
                                <td>R-UCL=</td>
                                <td>2.000</td>
                            </tr>
                            <tr>
                                <td>R-CL=</td>
                                <td>1.000</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-9 h-100 p-0 flex-mid-cen">
                        <img src="../../../projects/qc/img-qc/form_CheckSheet.png" alt="Form check sheet"
                            style="max-height:140px;max-width:400px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sb-item text-right w-100">
        FQI-P0503(Rev.date.14-12-30)
    </div>
</div>

<!-- Chart top-left -->
<script>
var x_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
    29, 30
]
var y1_value = [23, 24.23, 24.25, 24.8, 25.3, 25.1, 24.3, 24.1, 24.23, 24.25, 24.8, 25.3, 25.1, 24.3]
var y2_value = [24.4, 24.26, 24.53, 24.3, 25.1, 25.6, 24.1, 23, 23, 23, 23, 23, 23]
var y3_value = [24.2, 24.23, 25.25, 24.3, 25.8, 25.2, 24.9]
var y4_value = [24.8, 24.23, 24.15, 24.7, 25.8, 25.3, 24.8, 26, 26, 26]
var y5_value = []

for (let i in x_value) {
    let dem = 4
    if (y1_value[i] == null) {
        dem--;
        y1_value[i] = 0;
    }
    if (y2_value[i] == null) {
        dem--;
        y2_value[i] = 0;
    }
    if (y3_value[i] == null) {
        dem--;
        y3_value[i] = 0;
    }
    if (y4_value[i] == null) {
        dem--;
        y4_value[i] = 0;
    }
    y5_value[i] = (y1_value[i] + y2_value[i] + y3_value[i] + y4_value[i]) / dem
}

var tick_pos_xbar_top_left = cac_tick_pos(23.000, 26.000, 0.1875)
// xbar_tl_pl=[X_UCL,X-CL,X-LCL]
var xbar_tl_pl = [24, 24.3, 25]
var chart_xbar_tl = new Highcharts.chart('xbar-chart-top-left', {
    chart: {
        height: 350,
        margin: [0, 0, 5, 70],
        plotBorderColor: 'black',
        plotBorderWidth: 1
    },

    title: {
        text: ''
    },
    legend: {
        enabled: false
    },
    // remove highchart.com
    credits: {
        enabled: false
    },
    xAxis: {
        title: '',
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
        min: 23,
        max: 26.1,
        tickPositions: tick_pos_xbar_top_left[0],
        minorTickInterval: tick_pos_xbar_top_left[1] / 2,
        tickPosition: 'outside',
        gridLineWidth: 1,
        startOnTick: false,
        endOnTick: false,
        labels: {
            format: '{value:.3f}',
        },
        plotLines: [{
            color: 'red',
            width: 1.5,
            zIndex: 5,
            value: xbar_tl_pl[0],
            dashStyle: 'longdash'
        }, {
            color: 'red',
            width: 1.5,
            zIndex: 5,
            value: xbar_tl_pl[2],
            dashStyle: 'longdash'
        }, {
            color: 'red',
            width: 1,
            zIndex: 5,
            value: xbar_tl_pl[1],
            dashStyle: 'longdashdot'
        }],
    },
    plotOptions: {
        series: {
            pointStart: 1
        }
    },
    series: [{
        type: 'scatter',
        name: 'time-1',
        data: y1_value,
        marker: {
            symbol: 'circle',
            fillColor: '#ffffff',
            lineWidth: 1.5,
            lineColor: '#000000',
        }
    }, {
        type: 'scatter',
        name: 'time-2',
        marker: {
            symbol: 'circle',
            fillColor: '#ffffff',
            lineWidth: 1.5,
            lineColor: '#000000',
        },
        data: y2_value,
    }, {
        type: 'scatter',
        name: 'time-3',
        marker: {
            symbol: 'circle',
            fillColor: '#ffffff',
            lineWidth: 1.5,
            lineColor: '#000000',
        },
        data: y3_value,
    }, {
        type: 'scatter',
        name: 'time-4',
        marker: {
            symbol: 'circle',
            fillColor: '#ffffff',
            lineWidth: 1.5,
            lineColor: '#000000',
        },
        data: y4_value,
    }, {
        type: 'line',
        name: 'Avegadre',
        marker: {
            symbol: 'circle',
            fillColor: '#000000',
            lineWidth: 1.5,
            lineColor: '#000000',
        },
        data: y5_value,

    }]
});
</script>

<!-- Chart bot-left -->
<script>
var x_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
    29, 30
]
var y_value = [0, 0.1, 0.2, 0.3, 0.4, 0.7, 1.2]
var tick_pos_xbar_bot_left = cac_tick_pos(0, 4, 1)
// [R-CL,R_UCL]
var xbar_bl_pl = [1, 2]
var chart_xbar_bl = new Highcharts.chart('container-chart-bot-left', {
    chart: {
        height: 200,
        margin: [0, 0, 5, 70],
        plotBorderColor: 'black',
        plotBorderWidth: 1
    },

    title: {
        text: ''
    },
    legend: {
        enabled: false
    },
    // remove highchart.com
    credits: {
        enabled: false
    },
    xAxis: {
        title: '',
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

        min: -1,
        max: 5,
        startOnTick: false,
        endOnTick: false,
        labels: {
            format: '{value:.3f}',
        },
        // tickPositions: tick_pos_xbar_bot_left[0],
        tickPositions: tick_pos_xbar_bot_left[0],
        minorTickInterval: tick_pos_xbar_bot_left[1] / 2.5, // Khoảng cách ko
        gridLineWidth: 1,
        plotLines: [{
            color: 'red',
            width: 1,
            zIndex: 5,
            value: xbar_bl_pl[0],
            dashStyle: 'longdashdot'
        }, {
            color: 'red',
            width: 1,
            zIndex: 5,
            value: xbar_bl_pl[1],
            dashStyle: 'longdash'
        }],
    },
    plotOptions: {
        series: {
            pointStart: 1
        }
    },
    series: [{
        type: 'scatter',
        name: 'time-1',
        data: y_value,
        marker: {
            symbol: 'circle',
            fillColor: '#000000',
            lineWidth: 1.5,
            lineColor: '#000000',

        }
    }],
});
</script>
<!-- Chart top-right-->
<script>
var data_array = []
var y_value = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1]
var x_value = tick_pos_xbar_top_left[0]
for (let i = 0; i < x_value.length; i++) {
    data_array.push([x_value[i], y_value[i]])
}
// console.log(x_value,x_value[x_value.length-1])
chart_xbar_tr = Highcharts.chart('container-chart-top-right', {
    chart: {
        height: 370,
        type: 'bar',
        margin: [26, 0, -5, 0],
        plotBorderColor: 'black',
        plotBorderWidth: 1
    },

    xAxis: {
        title: {
            text: null
        },
        min: x_value[0],
        max: x_value[x_value.length - 1],
        tickLength: 0,
        title: '',
    },
    yAxis: {
        min: 0,
        max: 50,
        tickInterval: 10,
        opposite: true,
        lineWidth: 1,
        title: '',
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    title: {
        text: ''
    },
    legend: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    series: [{
        data: data_array,
        pointWidth: 16, // Chua edit so thich hop
    }]
});
</script>