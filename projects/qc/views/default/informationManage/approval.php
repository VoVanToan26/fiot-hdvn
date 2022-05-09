<script type="text/javascript"
    src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/views/default/js/approval.js" ?>">
</script>
<script type="text/javascript"
    src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/qc/js/qc-js-function.js" ?>">
</script>
<?php 
if(isset($_GET['load_link']) && $_GET['load_link'] == "yes"){
    $product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
    $line = isset($_GET['line']) ? $_GET['line'] : NULL;
    $part_no = isset($_GET['part_no']) ? $_GET['part_no'] : NULL;
    $measurement_items = isset($_GET['measurement_items']) ? $_GET['measurement_items'] : NULL;
    $chart = isset($_GET['chart']) ? $_GET['chart'] : NULL;
    
    echo '<script>load_chart(' . '\'' . $_GET['load_link'] . '\'' . ',' . '\'' . $product_family . '\'' . ','. '\'' . $line . '\'' . ','. '\'' . $part_no . '\'' . ','. '\'' . $measurement_items . '\'' . ','. '\'' . $chart . '\'' .')</script>';
}
?>

<style type="text/css">
table,
tr,
td {
    white-space: nowrap !important;
}

.sub-box {
    background-color: #fff !important;
    color: black !important;
    border: 1px solid #0b0c0c !important;
}

/* border */
.border-black {
    border: 1px solid black !important;
}

td.no-border {
    border: none !important;
}

.no-border-left {
    border-left: none !important;
}

.no-border-bot {
    border-bottom: 0px !important;
}

.no-border-top {
    border-top: none !important;
}

.no-border-right {
    border-right: none !important;
}

.border-left-black {
    border-left: 1px solid black !important;
}

.border-top-black {
    border-top: 1px solid black !important;
}

.border-right-black {
    border-right: 1px solid black !important;
}

.border-bot-black {
    border-bottom: 1px solid black !important;
}

.text-font-s {
    font-size: 12px;
}

.text-font-m {
    font-size: 14px;
}

.text-font-l {
    font-size: 16px;
}

.text-font-xl {
    font-size: 18px;
}

.font-weight-400 {
    font-weight: 400 !important;
}

/* display */
.flex-mid-cen {
    display: flex;
    align-items: center;
    justify-content: center;
}

.h-100 {
    height: 100% !important;
}

.w-3 {
    width: 3% !important;
}

.w-4 {
    width: 4% !important;
}

.w-5 {
    width: 5% !important;
}

.w-6 {
    width: 6% !important;
}

.w-7 {
    width: 7% !important;
}

.w-8 {
    width: 8% !important;
}

.w-12 {
    width: 12% !important;
}

.w-10 {
    width: 10% !important;
}

.w-11 {
    width: 11% !important;
}

.w-15 {
    width: 15% !important;
}

.w-20 {
    width: 20% !important;
}

.w-22 {
    width: 22% !important;
}

.w-24 {
    width: 24% !important;
}

.w-30 {
    width: 30% !important;
}

.w-35 {
    width: 35% !important;
}

.w-40 {
    width: 40% !important;
}

.w-45 {
    width: 45% !important;
}

.w-50 {
    width: 50% !important;
}

.w-60 {
    width: 60% !important;
}

.w-65 {
    width: 65% !important;
}

.w-70 {
    width: 70% !important;
}

.w-72 {
    width: 72% !important;
}

.w-80 {
    width: 80% !important;
}

.w-82 {
    width: 82% !important;
}

.w-85 {
    width: 85% !important;
}

.w-90 {
    width: 90% !important;
}

.h-10 {
    height: 10%;
}

.h-15 {
    height: 15%;
}

.h-20 {
    height: 20%;
}

.m-lr0 {
    margin-left: 0 !important;
    margin-right: 0 !important;
}

.m-tb-5 {
    margin-top: 5px !important;
    margin-bottom: 5px !important;
}

.h-10 {
    height: 10% !important;
}

.mt-38 {
    margin-top: 38px !important;
}

.mb--1 {
    margin-bottom: -1px !important;
}

.mt--1 {
    margin-top: -1px !important;
}

.mr--1 {
    margin-right: -1px !important;
}

.ml--1 {
    margin-left: -1px !important;
}

/* css cho Xr form xbar form  */
.tb-bot-chart {
    font-size: 14px;
    font-weight: 400;
    height: 136px;
    margin-bottom: -1px;
}

.tb-bot-chart td {
    padding: 0;
    line-height: 14px;
    text-align: center;
}

.picture-quy-cach-bot {
    position: absolute;
    bottom: 0;
    right: 40px;
}

.picture-quy-cach-top {
    position: absolute;
    top: 0;
    right: 40px;
}

.picture-quy-cach-bot img,
.picture-quy-cach-top img {
    height: 20px;
}

/* css name of form */
.content-name,
.form-name {
    font-size: 1.5rem;
    padding: 0px;
    margin: 0;
}
</style>
<script src="/fiot-hdvn/node_modules/highcharts/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/modules/series-label.js"></script> -->
<script src="/fiot-hdvn/node_modules/highcharts/modules/accessibility.js"></script>

<!-- <div class="content-wrapper"> -->
<div class="content-header">
    <!-- content header -->
    <div class="container-fluid">
        <h4>Duyệt - Chỉnh sửa - Xuất báo cáo</h4>
    </div>
    <!-- main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-left">
                                <h3 class="card-title">Bảng thông tin cần duyệt</h3>
                            </div>
                            <div class="text-right">
                                <!-- 5 button choose form -->
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#search_form">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Lọc thông tin form
                                    </i>
                                </button>
                                <button type="button" name="" id="" class="btn btn-primary btn-xs"
                                    onclick=btn_send_email()>
                                    <i class="fas fa-envelope " style="margin-right: 10px;">
                                        Gửi Mail
                                    </i>
                                </button>
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" onclick=btn_edit()>
                                    <i class="fas fa-edit" style="margin-right: 10px;">
                                        Edit
                                    </i>
                                </button>
                                <button type="button" name="" id="export-btn" class="btn btn-primary btn-xs"
                                    onclick=generatePDF()>
                                    <i class="fas fa-file-export " style="margin-right: 10px;">
                                        Export
                                    </i>
                                </button>

                            </div>
                        </div>

                        <!-- box container -->
                        <div id="load_data"></div>
                        <!-- box-body on -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- Modal thêm sản phẩm -->
            <div class="modal fade" id="search_form" tabindex="-1" role="dialog" aria-labelledby="exthemsanpham"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/approval/"; ?>"
                        method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exthemsanpham">Lọc Thông Tin Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="product_family_input" class="col-form-label">Dòng sản phẩm</label>
                                    <select class="form-control" id="product_family_input" name="product_family_input"
                                        onchange="auto_popup_line('register');">
                                        <option value="">Chọn dòng sản phẩm</option>
                                        <option value="Coil">Coil</option>
                                        <option value="Valve">Valve</option>
                                        <option value="Sensor">Sensor</option>
                                    </select>
                                    <small class="form-text text-danger" id="production_family_err"
                                        name="production_family_err"></small>
                                </div>
                                <div class="form-group">
                                    <label for="line_input" class="col-form-label">Line</label>
                                    <select class="form-control" id="line_input" name="line_input"
                                        onchange="auto_popup_part_no('register');">
                                        <option value="">Vui lòng chọn dòng sản phẩm trước</option>
                                    </select>
                                    <small class="form-text text-danger" id="line_err" name="line_err"></small>
                                </div>
                                <div class="form-group">
                                    <label for="part_no_input" class="col-form-label">Mã Sản Phẩm</label>
                                    <select class="form-control" id="part_no_input" name="part_no_input"
                                        onchange="auto_popup_measurement_items('register');">
                                        <option value="">Vui lòng chọn line trước</option>
                                    </select>
                                    <small class="form-text text-danger" id="part_no_err" name="part_no_err"></small>
                                </div>
                                <div class="form-group">
                                    <label for="measurement_items_input" class="col-form-label">Hạng mục đo</label>
                                    <select class="form-control" id="measurement_items_input"
                                        name="measurement_items_input">
                                        <option value="">Vui lòng chọn mã sản phẩm trước</option>
                                    </select>
                                    <small class="form-text text-danger" id="measurement_items_err"
                                        name="measurement_items_err"></small>
                                </div>
                                <div class="form-group">
                                    <label for="chart_input" class="col-form-label">Biểu Đồ</label>
                                    <select class="form-control" id="chart_input" name="chart_input">
                                        <option value="">Chọn loại biểu đồ</option>
                                        <option value="Biểu đồ điều tra năng lực công đoạn">Biểu đồ điều tra năng lực
                                            công
                                            đoạn</option>
                                        <option value="Biểu đồ quản lý">Biểu đồ quản lý</option>
                                    </select>
                                    <small class="form-text text-danger" id="chart_err" name="chart_err"></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="get_link()" id="search_chart"
                                    name="search_chart">Lọc
                                    thông
                                    tin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- </div> -->