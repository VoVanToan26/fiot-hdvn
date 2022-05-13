<style type="text/css">
.form-body-item {
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

#table-tr-xr tr td {
    padding: 0;
    text-align: right;
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

.table-footer-right {
    margin-top: 19px;
    height: 130px;
    width: 20%;
}

.table-footer-right td {
    text-align: left;
    font-size: 14px;
}

.xr-tb-footer-left td {
    text-align: center;
}

.highcharts-figure {
    margin: 3 !important;
    padding: 0 !important;
}
</style>

<style type="text/css">
#img-logo-e {
    position: absolute;
    top: 20px;
    right: 0px;
}

/* top right */
.xr-picture-right {
    position: absolute;
    right: 0px;
    top: 100px;
    width: 80%;
}

.xr-picture-left {
    position: absolute;
    right: 0px;
    top: 234px;
    width: 100%;

    /* height: 105%; */
    /* border-right: 1px solid black; */
}

.sb-left {
    margin-right: -1px;
}

.xr-tb-footer-left {
    margin-top: 1px;
}

#tb-top-right-xr2 {
    margin-top: -1px;
}

#xr-tb-bot-chart {
    line-height: 14px;
    text-align: center;
}

/* Css right */

#xr-result-table {
    margin-top: 2%;
    margin-left: 10%;
    border: 1px solid black;
    font-size: 18px;
    text-align: center;
    width: 50%;

}

#xr-result-table tr {
    white-space: nowrap;
}

#xr-result-table td {
    padding: 4px;
}

#xr-result-table-2 {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
}

.add-dashed-border,
#xr-result-table-2 tr td:nth-child(1),
#xr-result-table-2 tr td:nth-child(2),
#xr-result-table-2 tr td:nth-child(3) {
    border-bottom: 1px dashed black;
    padding: 2px;
}

#xr-table-footer tr td {
    font-size: 14px;
    border-bottom: 1px solid #ccc;
}

p.footer {
    position: absolute;
    right: 10%;
    bottom: 0px;
    font-size: 24px;
}
</style>

<div id="xr-box" class="sub-box   w-100 row p-0 m-0">
    <div class="sb-item sb-left col position-relative">
        <img src="../../../projects/qc/img-qc/form-XR-left.png" alt="" class="xr-picture-left">
    </div>
    <div class="sb-item sb-center col-11 p-0">
        <div class="form-head d-flex flex-row w-100 mb--1 mt--1" height="115">
            <div class="head-left w-15 ">
                <table class="table-head-left table-bordered w-100  text-center">
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
            <div class="head-center col row d-flex justify-content-center position-relative m-0 w-50">
                <div class="heading-box row w-100">
                    <div class="heading-box row w-100">
                        <!-- HD logo -->
                        <div class="col-1 flex-mid-cen">
                            <img src="../../../projects/qc/img-qc/HD-logo.png" alt="HD-logo"
                                style="width:50px;height:30px">
                        </div>
                        <!-- Loại biểu đồ -->
                        <div class="heading-box-content flex-mid-cen flex-column col-8 text-center">
                            <p class="content-name ">Biểu đồ kiểm tra năng lực công đoạn</p>
                            <p class="form-name">(X-R,HISTOGRAM)</p>
                        </div>
                        <!-- Form name -->

                        <!-- img1 -->
                        <div class="row col-3 ">
                            <div class="col-6 flex-mid-cen">
                                <img src="../../../projects/qc/img-qc/inportance_control_sr_C.png" alt="C-logo"
                                    class="pt-2">
                            </div>
                            <div class="col-6 flex-mid-cen">
                                <img src="../../../projects/qc/img-qc/inportance_control_sr_C.png" alt="C-logo"
                                    class="pt-2">
                            </div>
                        </div>
                        <!-- img2 -->
                    </div>
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
                                <?php if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][5] != null&&$data_tb_sign[$count_sig - 1][6] == null)
                                    echo '<i style="cursor: pointer;"  class="fas fa-edit" onclick="sign_form_confirm_function(\'sign_mgr\')"</i>';
                                else if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][6] != null)
                                echo usertoName($data_account,$data_tb_sign[$count_sig - 1][6]) ;
                                else
                                    echo null;
                                ?></td>
                            <td id="cs-confirm-production-sup" class="no-border-top text-center">
                                <?php if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][4] != null&&$data_tb_sign[$count_sig - 1][5] == null)
                                    echo '<i style="cursor: pointer;"  class="fas fa-edit" onclick="sign_form_confirm_function(\'sign_sup\')"</i>';
                                else if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][5] != null)
                                    echo usertoName($data_account,$data_tb_sign[$count_sig - 1][5]);
                                else
                                    echo null;
                                ?></td>
                            </td>
                            <td id="cs-confirm-production-tl" class="no-border-top text-center">
                                <?php
                                if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][3] != null&&$data_tb_sign[$count_sig - 1][4] == null)
                                    echo '<i style="cursor: pointer;"  class="fas fa-edit" onclick="sign_form_confirm_function(\'sign_tl\')"</i>';
                                else if ($count_sig == 30 && $data_tb_sign[$count_sig - 1][4] != null)
                                    echo usertoName($data_account,$data_tb_sign[$count_sig - 1][4]);
                                else
                                    echo null;
                                ?></td>
                            </td>

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
                            <td class="td-value">v</td>
                            <td class="td-name">Tên</td>
                            <td class="td-value">v </td>

                            <td class="td-name ">Đơn vị đo</td>
                            <td class="td-value">v</td>
                            <td class="td-value">v</td>
                        </tr>
                    </table>
                </div>
                <!-- Top-left -->
                <div class=" fbi-body-top d-flex flex-row w-100  " style="height:290px">
                    <div
                        class="fb-item w-10 flex-mid-cen  no-border-bot border-left-black border-left-black border-left-black ">
                        X</div>
                    <div class="fb-item w-90 ">
                        <!-- Chart top  left -->
                        <figure class="highcharts-figure">
                            <div id="xr-chart-top-left"></div>
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
                <div class=" fbi-body-mid d-flex flex-row w-100 " style="height:235px">
                    <div
                        class="fb-item w-10 flex-mid-cen  no-border-bot border-left-black border-left-black border-left-black">
                        R</div>
                    <div class="fb-item w-90               no-border-bot">
                        <!-- Chart-bot-left "-->
                        <figure class="highcharts-figure w-100 ">
                            <div id="xr-chart-bot-left"></div>
                        </figure>
                    </div>
                </div>

                <div class=" fbi-body-bot">
                    <table id="xr-table-bot-chart" class="tb-bot-chart table-bordered w-100 no-border-bot ">
                        <tr>
                            <td colspan="2" class="w-10">Đo</td>
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
                    <table id="xrs-tb-footer-left" class="xrs-tb-footer-left table-bordered w-100">
                        <tr>
                            <td class="w-5">Năm</td>
                            <td class="w-5">Tháng</td>
                            <td class="w-4">Ngày</td>
                            <td class="w-40">Nguyên nhân bất thường、Ghi chép nguyên nhân bất thường</td>
                            <td class="w-40">Đối sách(Thiết bị,Dụng cụ,PP,Người thao tác,Sản phẩm)</td>
                            <td class="w-6">Xác nhận</td>
                        </tr>
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
                        <td class="td-value w-20">Đầu, cuối ca</td>
                        <td class="td-name no-border-right w-30">Người đo</td>
                        <td class="td-value no-border-left w-30">QC</td>
                    </tr>
                </table>
                <!-- Chart -->
                <div class="fb-item fbi-body-top d-flex flex-row w-100  " style="height:318px">

                    <div class="w-20 ">
                        <div div class="">
                            <div class="l-2" style="height:26px">Khoảng</div>
                            <table id="table-tr-xr" class=" axes-label-tr-chart w-100">
                                <script>
                                // 291 chieu dai tong cua do thi ben canh
                                table_add("table-tr-xr", 14, 1, 350, 20, 290)
                                </script>
                            </table>
                        </div>

                    </div>
                    <div class="chart-xr-tr-box w-45 ">
                        <!-- Chart top-right -->
                        <figure class="highcharts-figure w-100 ">
                            <div id="chart-top-right-xr"></div>
                        </figure>
                    </div>
                    <div class=" w-35 ">
                        <!-- Chart top-right -->
                        <table id="tb-top-right-xr2" class="table-bordered w-100 mr--1">
                            <tr>
                                <td class="col-3">f</td>
                                <td class="col-3">u</td>
                                <td class="col-3">fu</td>
                                <td class="col-3">fu2</td>
                            </tr>
                            <!-- <script>
                                    table_add_row("tb-top-right-xr2", 16, 4, 20.7)
                                    table = document.getElementById("tb-top-right-xr2")
                                    table.append()
                                </script> -->
                            <?php
                            for ($i = 0; $i < 16; $i++) {
                                echo '<tr><tr>';
                                for ($j = 0; $j < 4; $j++) {
                                    echo '<td height=20.7></td>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <!-- Table summary bot right -->
                <div class="fb-item fbi-body-mid d-flex flex-column w-100  " style="height:372px">
                    <div class=" w-100 position-relative" style="height:110px">
                        <table id="xr-result-table">
                            <tr>
                                <td>Cp=</td>
                                <td>=まとめ!E68</td>
                                <td class="border-left-black">Phán định</td>
                            </tr>
                            <tr>
                                <td>Cpk</td>
                                <td>2.663</td>
                                <td class="border-left-black">X|O|△</td>
                            </tr>
                        </table>
                    </div>
                    <div class=" result-container  w-100 d-flex flex-row">
                        <div class="result-item w-100 border-top-black p-2">
                            <table id="xr-result-table-2">
                                <tr>
                                    <td class="w">X̅̅=</td>
                                    <td class="w">A + mE =</td>
                                    <td class="w" colspan="2">=まとめ!E65</td>
                                    <td class="w">E=∑fu/n </td>
                                    <td class="w">E=∑fu/n </td>
                                </tr>
                                <tr>
                                    <td>σ =</td>
                                    <td>m√E-E =</td>
                                    <td colspan="2"></td>
                                    <td colspan="2">f = 観測度数</td>
                                </tr>
                                <tr>
                                    <td>3σ=</td>
                                    <td>=まとめ!E81</td>
                                    <td>6σ=</td>
                                    <td class="add-dashed-border">=まとめ!E82</td>
                                    <td colspan="2">Ａ ＝ 第 0 番目のセルの中心</td>
                                </tr>
                                <tr class="align-top">
                                    <td>X + 3σ=</td>
                                    <td>=まとめ!E79</td>
                                    <td>X̅̅-3σ=</td>
                                    <td class="add-dashed-border">=まとめ!E80</td>
                                    <td colspan="2">値 ＝<br>u = A からのセルの偏差</td>
                                </tr>
                                <tr>
                                    <td>σ =</td>
                                    <td>(郡内）= </td>
                                    <td>R/d=</td>
                                    <td class="add-dashed-border">=まとめ!E67</td>
                                    <td colspan="2">ｍ ＝ セルの間隔 ＝</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

                <div class=" fb-item fbi-footer d-flex flex-column w-100 " style="height:172px">
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
        <!-- Phiên bản mới dùng cho đồng nhất form -->
        <div class="sb-item text-right w-100">
            FQI-P0503(Rev.date.14-12-30)
        </div>
        <!-- Phien ban cu giu lại khi HDVN cần thì thay đổi  -->
        <!-- <div class="form-bot w100 border-black d-flex flex-row " style="height:150px">
            <div class="w-60">
                <table id="xr-table-footer">
                    <tr>
                        <td>１．Với biểu đồ quản lý X, thì lấy giá trị đo mẫu liên tục theo quy định khoảng cách check chất lượng/Ｘ管理図には、決められた品質チェック間隔で連続に試料の測定値を打点する。</td>
                    </tr>
                    <tr>
                        <td>２．Với biểu đồ quản lý R thì lấy giá trị Max và Min của 4 mẫu đo liên tiếp/Ｒ管理図には、連続する試料４個の測定値の最大値と最小値の差を打点する。</td>
                    </tr>
                    <tr>
                        <td>３．Với cột đối sách thì phải nhập nội dung đối ứng và đối sách chống táiphát/対策欄には、応急処置および恒久的な再発防止策を記入する。</td>
                    </tr>
                    <tr>
                        <td>4．Khi thay đổi dụng cụ đo liên lạc theo lộ trình báo cáo bất thường, ghi nhận điểm thay đổi vào 5M1E, liên lạc xuống dưới hiện trường sản xuất
                            <br>測定具変更の時、異常報告ルートに沿って連絡し、5M1E変化点に記録して現場に連絡すること
                        </td>
                    </tr>
                </table>
            </div>
            <div class="w-40 position-relative">
                <img src="../../../projects/qc/img-qc/form-xr-bot.png" alt="img-footer" class="w-100 text-right pl-2">
                <p class="footer">FQI-P0502(Rev. date 21-05-17)</p>
            </div>
        </div> -->
    </div>


    <div class="sb-item sb-right col position-relative">
        <img src="../../../projects/qc/img-qc/form-xr-right.png" alt="" class="xr-picture-right">
    </div>
    <!-- Head table -->

</div>

<!-- Chart top-left -->
<script>
var tick_pos_xr_top_left_y = cac_tick_pos(90, 340, 50)
var tick_pos_xr_top_left_x = cac_tick_pos(0, 31, 1)
var xr_tl_pl = [150, 200, 240]
Highcharts.chart('xr-chart-top-left', {
    chart: {
        height: 290,
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
        // label:categories,
        tickPositions: tick_pos_xr_top_left_x[0],
        minorTickInterval: tick_pos_xr_top_left_x[1] / 2,
        min: 0.5,
        max: 26.5,
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
        min: 80,
        max: 350.000,
        step: 50,
        startOnTick: false,
        endOnTick: false,

        labels: {
            format: '{value:.3f}',
        },
        tickPositions: tick_pos_xr_top_left_y[0],
        minorTickInterval: tick_pos_xr_top_left_y[1] / 2.5,

        gridLineWidth: 1,

        plotLines: [{
            color: 'red',
            width: 1.5,
            zIndex: 5,
            value: xr_tl_pl[0],
            dashStyle: 'longdash'
        }, {
            color: 'red',
            width: 1.5,
            zIndex: 5,
            value: xr_tl_pl[2],
            dashStyle: 'longdash'
        }, {
            color: 'red',
            width: 1,
            zIndex: 5,
            value: xr_tl_pl[1],
            dashStyle: 'longdashdot'
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
        data: [
            [0.8, 190],
            [1.2, 220],
            [2, 120],
            [3.5, 230]
        ], //
        marker: {
            enabled: true,
            symbol: 'circle',
            fillColor: '#ffffff',
            lineWidth: 1.5,
            lineColor: '#000000',
        }
    }]
});
</script>

<!-- Chart bot-left -->
<script>
var tick_pos_xr_top_left = cac_tick_pos(0, 200, 50)
// [R-CL,R_UCL]
var x_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
    29, 30
]
var xr_bl_pl = [50, 100]
Highcharts.chart('xr-chart-bot-left', {
    chart: {
        height: 235,
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
        max: 26.5,
        step: 1,
        tickPositions: tick_pos_xr_top_left_x[0],
        minorTickInterval: tick_pos_xr_top_left_x[1] / 2,
        tickInterval: 1,
        gridLineWidth: 1,
        labels: {
            enabled: false,
        },
        tickWidth: 0,
    },
    yAxis: {
        title: '',
        // categories: ["23.00","23.188","23.375","23.563","23.750","23.938","24.125","24.313","24.500","24.688","24.875","25.063","25.250","25.438","25.625","25.813","26.00"],
        min: -10,
        max: 240,
        startOnTick: false,
        endOnTick: false,

        labels: {
            format: '{value:.3f}',
        },
        minorTickInterval: tick_pos_xr_top_left[1] / 2.5, // Khoảng cách ko
        tickPositions: tick_pos_xr_top_left[0],

        gridLineWidth: 1,
        plotLines: [{
            color: 'red',
            width: 1,
            zIndex: 5,
            value: xr_bl_pl[0],
            dashStyle: 'longdashdot'
        }, {
            color: 'red',
            width: 1,
            zIndex: 5,
            value: xr_bl_pl[1],
            dashStyle: 'longdash'
        }],
    },
    plotOptions: {
        series: {
            pointStart: 1
        }
    },
    series: [{
        type: 'line',
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
var tick_pos_xr_top_right_x = cac_tick_pos(90, 340, 20)
var data_array = []
var y_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 0, 0]
var x_value = tick_pos_xr_top_right_x[0]
for (let i = 0; i < x_value.length; i++) {
    data_array.push([x_value[i], y_value[i]])

}
// console.log(tick_pos_xr_top_right_x)
Highcharts.chart('chart-top-right-xr', {
    chart: {
        height: 310,
        type: 'bar',
        margin: [26, 5, -5, 5],
        plotBorderColor: 'black',
        plotBorderWidth: 1,
    },

    xAxis: {
        min: x_value[0],
        max: x_value[x_value.length - 1],
        tickLength: 0,
        title: '',
    },
    yAxis: {
        min: 0,
        max: 25,
        tickInterval: 5,
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
        pointWidth: 15, // Chua edit so thich hop
    }]
});
</script>