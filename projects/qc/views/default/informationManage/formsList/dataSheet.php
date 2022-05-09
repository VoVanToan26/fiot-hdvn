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

<div class="sub-box d-flex flex-column w-100">
    <!-- Head table -->
    <div class=" form-head d-flex flex-row m-tb-5 w-100 ">
        <div class="head-left col row ">
            <table class="w-100 text-nowrap ">
                <tr>
                    <td class="w-10 pl-2">Line:</td>
                    <td class="w-40 pl-2">Quấn đồng DCV3-2</td>
                </tr>
                <tr>
                    <!-- <td class="pl-2">ﾗｲﾝ: </td> -->
                    <!-- <td>巻線DCV3-2 </td> -->
                </tr>
                <tr>
                    <td class="w-50 pl-2" colspan="3">
                        <h3>DATASHEET</h3>
                    </td>
                </tr>
            </table>
        </div>
        <!-- table đăng kí -->
        <div class="head-center col row d-flex justify-content-center ">
            <table class="w-90 table-bordered ">
                <tr>
                    <th class="w-40">Mã SP 品番:</th>
                    <td class="w-60">HV136221-0250</td>
                </tr>
                <tr>
                    <th>Tên SP 品名:</th>
                    <td>Honda DCV</td>
                </tr>
                <tr>
                    <th>Công đoạn 工程:</th>
                    <td>Hàn Fusing</td>
                </tr>
                <tr>
                    <th>Số quản lý 管理No:</th>
                    <td>1050</td>
                </tr>
            </table>
        </div>

        <div class="head-right col  row d-flex justify-content-around">
            <div class="sub-head-right w-20">
                <table class=" h-100 ">
                    <tr class="h-20 table-borderless">
                        <td></td>
                    </tr>
                    <tr class="h-20 table-bordered nowrap">
                        <td class="text-nowrap">Phê duyệt 承認</td>
                    </tr>
                    <tr class="h-50 table-bordered">
                        <td id="ds-confirm-mgr" class=" text-center"
                            onclick="show_confirm_modal('ds-confirm-mgr','ToanMgr')"></td>
                    </tr>
                </table>
            </div>
            <div class="sub-head-right w-60  ">
                <table class="table-bordered h-100 w-100 ">
                    <tr class="h-20">
                        <td colspan="3" class="text-center">Bộ phận sản xuất</td>
                    </tr>
                    <tr class="text-center  h-20 ">
                        <td>Duyệt 承認</td>
                        <td>Kiểm 検討</td>
                        <td>Lập 作成</td>
                    </tr>
                    <tr class="text-center  h-50 ">
                        <td id="ds-confirm1-mgr" class=" text-center"
                            onclick="show_confirm_modal('ds-confirm1-mgr','Mgr')"></td>
                        <td id="ds-confirm-sub" class=" text-center"
                            onclick="show_confirm_modal('ds-confirm-sub','Sup')"></td>
                        <td id="ds-confirm-TL" class=" text-center" onclick="show_confirm_modal('ds-confirm-TL','TL')">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <!-- Body of table -->
    <div class="form-body w-100 ">
        <table class="table-data-sheet  table table-responsive text-center table-bordered w-100 m-0">

            <tr>
                <td rowspan="3" width="20%">
                    Hạng mục kiểm tra, đặc tính
                    <br>ﾁｪｯｸ項目特性
                </td>
                <td width="10%"></td>
                <td width="5%" class="">Ngày 日</td>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto">' . $i . '</td>';
                    // echo '<td style="width:auto"></td>';
                }
                ?>
            </tr>

            <!-- row2 -->
            <tr>
                <!-- 1 col span -->
                <td class="">Tầng suất 頻度</td>
                <td>Tháng 月</td>
                <!-- add 26 td -->
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto"></td>';
                }
                ?>
            </tr>

            <tr>
                <td class="">Dụng cụ đo、測定器</td>
                <td>Ca</td>
                <!-- add 26 td -->
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto"></td>';
                }
                ?>
            </tr>

            <tr>
                <td height=250>
                    *5
                    <br>ｺｱｽﾃｰﾀ内径②
                    <br>Đường kính trong core
                    <br>stator ②
                    <br>寸法表による
                    <br>Theo bảng kích thước
                </td>
                <td>
                    3.984±0.026
                </td>
                <td rowspan="2" colspan="31">
                    <div height="500" ,class="chart fbi-sub-item fbi-sub-item-3  ">
                        <figure class="highcharts-figure pl-0-2">
                            <div id="dataSheet-chart"></div>
                        </figure>
                    </div>
                </td>
            </tr>
            <tr>
                <td height=250>
                    1/始･終s
                    <br>品番切替
                    <br>1/ Đầu
                    <br>cuối ca
                    <br>Khi thay mã
                </td>
                <td>
                    (0.001)1/始･終
                    <br>Pin gauge (0.001)
                </td>
            </tr>

            <tr id="row-Cavity-DS">
                <td colspan="3" style="width:23%" class="">Cavity</td>

                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto"></td>';
                }
                ?>
            </tr>
            <!-- Row7 -->
            <tr id="row-CN-DS">
                <td colspan="3" class=" ">CN</td>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto"></td>';
                }
                ?>
            </tr>

            <tr id="">
                <td colspan="3" id="" class=" ">SL/TL 1D</td>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto"></td>';
                }
                ?>
            </tr>
            <tr id="">
                <td colspan="3" class=" ">SV 1/W</td>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<td style="width:auto"></td>';
                }
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
                        <img src="../../../projects/qc/img-qc/form_CheckSheet.png" alt="Form check sheet" class="w-100">
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="33" class="text-right ">FQI-P0708 (ISS.01)</td>
            </tr>
        </table>
    </div>
</div>

<script>
var x_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
    29, 30
]
var y_value = [3.97, 3.973, 3.976, 3.977, 3.97, 3.988]

tick_pos_dataSheet = cac_tick_pos(3.958, 4.01, 0.01)
console.log(tick_pos_dataSheet)

Highcharts.chart('dataSheet-chart', {
    chart: {
        reflow: true,
        height: 500,
        margin: [5, 5, 5, 67],
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
        max: 31.5,
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
        min: 3.957,
        max: 4.012,
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