<!-- <pre> -->
<?php 
//connfig db cloud
define('DB_SERVER', 'ifsmvp.com');
define('DB_USERNAME', 'ifsmvp_tech');
define('DB_PASSWORD', 'ifsmvp@2021');
define('DB_NAME', 'ifsmvp_hdvn_database');

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'ifsmvp_hdvn_database');

date_default_timezone_set("Asia/Ho_Chi_Minh");
$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, 'UTF8');

if (isset($_GET['product_family']) && $_GET['line'] && $_GET['part_no'] && $_GET['measurement_items'] && $_GET['chart'])  {
    $product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
    $line = isset($_GET['line']) ? $_GET['line'] : NULL;
    $part_no = isset($_GET['part_no']) ? $_GET['part_no'] : NULL;
    $measurement_items = isset($_GET['measurement_items']) ? $_GET['measurement_items'] : NULL;
    $chart = isset($_GET['chart']) ? $_GET['chart'] : NULL;

    // lọc  form 
    $sqlsearch_chart = "SELECT * FROM `qc_tb_measurement_items` WHERE `product_family` = '$product_family' AND `line` = '$line' AND `part_no` = '$part_no' AND `measurement_items` = '$measurement_items' AND `chart` = '$chart'";
	$resultsearch_chart = mysqli_query( $connect, $sqlsearch_chart );
	if ($resultsearch_chart && $resultsearch_chart->num_rows > 0) {
		$row = $resultsearch_chart->fetch_assoc();
		$data_product_family =$row['product_family'];
		$data_part_no =$row['part_no'];
		$data_process =$row['process'];
		$data_line =$row['line'];
		$data_measurement_items =$row['measurement_items'];
		$data_frequency =$row['frequency'];
		$data_measuring_tools =$row['measuring_tools'];
		$data_standard_dimension =$row['standard_dimension'];
		$data_upper =$row['upper'];
		$data_lower =$row['lower'];
		$data_unit =$row['unit'];
        $data_type_allowance =$row['type_allowance'];
		$data_form =$row['form'];
		$data_x_ucl =$row['x_ucl'];
		$data_x_cl =$row['x_cl'];
		$data_x_lcl =$row['x_lcl'];
		$data_r_ucl =$row['r_ucl'];
		$data_r_cl =$row['r_cl'];
		$data_use_formula =$row['use_formula'];
		$data_type_formula =$row['type_formula'];
		$data_number_element =$row['number_element'];
		$data_definition_formula =$row['definition_formula'];
		$data_formula =$row['formula'];
		$data_allowance_display =$row['allowance_display'];
		$data_chart =$row['chart'];
		$data_management_level_one =$row['management_level_one'];
		$data_no_measurement_items =$row['no_measurement_items'];
		$data_measuring_department =$row['measuring_department'];
		$data_status =$row['status'];
		$data_management_level_two =$row['management_level_two'];
		$data_draw =$row['draw'];
	}
	else{
		$data_product_family ='';
		$data_part_no ='';
		$data_process ='';
		$data_line ='';
		$data_measurement_items ='';
		$data_frequency ='';
		$data_measuring_tools ='';
		$data_standard_dimension ='';
		$data_upper ='';
		$data_lower ='';
		$data_unit ='';
		$data_form ='';
		$data_x_ucl ='';
		$data_x_cl ='';
		$data_x_lcl ='';
		$data_r_ucl ='';
		$data_r_cl ='';
		$data_use_formula ='';
		$data_type_formula ='';
		$data_number_element ='';
		$data_definition_formula ='';
		$data_formula ='';
		$data_allowance_display ='';
		$data_chart ='';
		$data_management_level_one ='';
		$data_no_measurement_items ='';
		$data_measuring_department ='';
		$data_status ='';
		$data_management_level_two ='';
		$data_draw ='';
	}
}
// Lọc tần suất thống kê form
$sqlsearch_frequency = "SELECT * FROM `qc_tb_frequency` WHERE `frequency_name` = '$data_frequency'";
$resultsearch_frequency = mysqli_query( $connect, $sqlsearch_frequency );
if ($resultsearch_frequency && $resultsearch_frequency->num_rows > 0) {
    $row = $resultsearch_frequency->fetch_assoc();
    $data_quantity = $row['quantity'];
    $data_unit_time = $row['unit_time'];
}
else{
    $data_quantity = 0;
    $data_unit_time = '';
}
// print($data_frequency);

// lọc tên máy
$sqlsearch_machine_number = "SELECT * FROM `qc_tb_machine_number` WHERE `line` = '$data_line' AND `process` = '$data_process'";
$resultsearch_machine_number = mysqli_query( $connect, $sqlsearch_machine_number );
if ($resultsearch_machine_number && $resultsearch_machine_number->num_rows > 0) {
    $row = $resultsearch_machine_number->fetch_assoc();
    $data_number_machine = $row['number_machine'];
}
else{
    $data_number_machine = '';
}
// lọc part name
$sqlsearch_part_name = "SELECT * FROM `qc_tb_part_no` WHERE `product_family` = '$data_product_family' AND `part_no` = '$data_part_no'";
$resultsearch_part_name = mysqli_query( $connect, $sqlsearch_part_name );
if ($resultsearch_part_name && $resultsearch_part_name->num_rows > 0) {
    $row = $resultsearch_part_name->fetch_assoc();
    $data_part_name = $row['part_name'];
}
else{
    $data_part_name = '';
}

$sub_id_search = $data_line . ';' . $data_part_no  . ';' . $data_no_measurement_items . ';' . $data_chart;

//lọc số ngày đo

$sql_manulot = "SELECT DISTINCT `manu_lot` FROM `qc_tb_data` WHERE `sub_id` LIKE '$sub_id_search%' ORDER BY `manu_lot` ASC LIMIT 30";
$resultmanulot = mysqli_query($connect, $sql_manulot);
if ($resultmanulot && $resultmanulot->num_rows > 0) {
    $i = 0;
    while ($row = $resultmanulot->fetch_assoc()) {
        $data_manulot[$i] = $row['manu_lot'];
        $i++;
    }
}
else{
    $data_manulot[0] = '';
}
// lọc data dữ liệu
//select qc_tb_measurement_items
$sqlcheck_tb_data = "SELECT * FROM `qc_tb_data` WHERE `status_complete` IS NULL AND `sub_id` LIKE '$sub_id_search%' ORDER BY `manu_lot` ASC";
$resultcheck_tb_data = mysqli_query($connect, $sqlcheck_tb_data);
// $check_measurement_items = mysqli_fetch_assoc( $resultcheck_tb_data );
if ($resultcheck_tb_data && $resultcheck_tb_data->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_tb_data->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_tb[$i][0] = $row['id'];
        $data_tb[$i][1] = $row['sub_id'];
        $data_tb[$i][2] = $row['part_no'];
        $data_tb[$i][3] = $row['no_measurement_items'];
        $data_tb[$i][4] = $row['manu_lot'];
        $data_tb[$i][5] = $row['manu_shift'];
        $data_tb[$i][6] = $row['frequency'];
        $data_tb[$i][7] = $row['allowance_display'];
        $data_tb[$i][8] = $row['measuring_tools'];
        $data_tb[$i][9] = $row['nick_name_tools'];
        $data_tb[$i][10] = $row['measuring_day'];
        $data_tb[$i][11] = $row['measuring_shift'];
        $data_tb[$i][12] = $row['measuring_person'];
        $data_tb[$i][13] = $row['order_number'];
        $data_tb[$i][14] = $row['form_id'];
        $data_tb[$i][15] = $row['special_case'];
        $data_tb[$i][16] = $row['link_file'];
        $data_tb[$i][17] = $row['measuring_data'];
        $data_tb[$i][18] = $row['day_edit'];
        $data_tb[$i][19] = $row['person_edit'];
        $data_tb[$i][20] = $row['reason_edit'];
        $data_tb[$i][21] = $row['note'];
        $data_tb[$i][22] = $row['cavity'];
        $data_tb[$i][23] = $row['chart'];
        $data_tb[$i][24] = $row['confirm_ng'];
        $data_tb[$i][25] = $row['line'];
        $data_tb[$i][26] = $row['abnormal_case'];
        $data_tb[$i][27] = $row['status_complete'];
        $data_tb[$i][28] = $row['sig'];
        $i++;
    }
} else {
    $data_tb[0][0] = '';
    $data_tb[0][1] = '';
    $data_tb[0][2] = '';
    $data_tb[0][3] = '';
    $data_tb[0][4] = '';
    $data_tb[0][5] = '';
    $data_tb[0][6] = '';
    $data_tb[0][7] = '';
    $data_tb[0][8] = '';
    $data_tb[0][9] = '';
    $data_tb[0][11] = '';
    $data_tb[0][12] = '';
    $data_tb[0][13] = '';
    $data_tb[0][14] = '';
    $data_tb[0][15] = '';
    $data_tb[0][16] = '';
    $data_tb[0][17] = '';
    $data_tb[0][18] = '';
    $data_tb[0][19] = '';
    $data_tb[0][20] = '';
    $data_tb[0][21] = '';
    $data_tb[0][22] = '';
    $data_tb[0][23] = '';
    $data_tb[0][24] = '';
    $data_tb[0][25] = '';
    $data_tb[0][28] = '';
}

// print($sub_id_search);
// print_r($data_tb);
// lọc data duyệt
//select qc_tb_sign
$sqlcheck_tb_sign = "SELECT * FROM `qc_tb_sign` WHERE `sub_id` LIKE '$sub_id_search%' ORDER BY `id` ASC";
$resultcheck_tb_sign = mysqli_query($connect, $sqlcheck_tb_sign);
if ($resultcheck_tb_sign && $resultcheck_tb_sign->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultcheck_tb_sign->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_tb_sign[$i][0] = $row['id'];
        $data_tb_sign[$i][1] = $row['sub_id'];
        $data_tb_sign[$i][2] = $row['sign_day'];
        $data_tb_sign[$i][3] = $row['sign_week'];
        $data_tb_sign[$i][4] = $row['sign_tl'];
        $data_tb_sign[$i][5] = $row['sign_sup'];
        $data_tb_sign[$i][6] = $row['sign_mgr'];
        $data_tb_sign[$i][7] = $row['sign_creator'];
        $data_tb_sign[$i][8] = $row['status'];
        $data_tb_sign[$i][9] = $row['sig'];
        $i++;
    }
} else {
    $data_tb_sign[0][0] = '';
    $data_tb_sign[0][1] = '';
    $data_tb_sign[0][2] = '';
    $data_tb_sign[0][3] = '';
    $data_tb_sign[0][4] = '';
    $data_tb_sign[0][5] = '';
    $data_tb_sign[0][6] = '';
    $data_tb_sign[0][7] = '';
    $data_tb_sign[0][8] = '';
    $data_tb_sign[0][9] = '';
}

// lọc thiết bị đo
$sqlsearch_measuring_tools = "SELECT * FROM `tb_measuring_tools` WHERE `measuring_tools` = '$data_measuring_tools'";
$resultsearch_measuring_tools = mysqli_query( $connect, $sqlsearch_measuring_tools );
if ($resultsearch_measuring_tools && $resultsearch_measuring_tools->num_rows > 0) {
    // tiến hành lặp dữ liệu
    $i = 0;
    while ($row = $resultsearch_measuring_tools->fetch_assoc()) {
        //thêm kết quả vào mảng
        $data_measuring_tools_arr[$i][0] = $row['id'];
        $data_measuring_tools_arr[$i][1] = $row['measuring_tools'];
        $data_measuring_tools_arr[$i][2] = $row['nick_name_tools'];
        $data_measuring_tools_arr[$i][3] = $row['type_tool'];
        $data_measuring_tools_arr[$i][4] = $row['model'];
        $data_measuring_tools_arr[$i][5] = $row['accuracy'];
        $data_measuring_tools_arr[$i][6] = $row['management_number'];
        $i++;
    }
} else {
    $data_measuring_tools_arr[0][0] = '';
    $data_measuring_tools_arr[0][1] = '';
    $data_measuring_tools_arr[0][2] = '';
    $data_measuring_tools_arr[0][3] = '';
    $data_measuring_tools_arr[0][4] = '';
    $data_measuring_tools_arr[0][5] = '';
    $data_measuring_tools_arr[0][6] = '';
}
// lọc accuracy
$data_nick_name_tools = $data_tb[count($data_tb) - 1][9];

for ($i=0; $i < count($data_measuring_tools_arr); $i++) { 
    # code...
    if($data_nick_name_tools == $data_measuring_tools_arr[$i][2]){
        $data_accuracy = $data_measuring_tools_arr[$i][5];
        $data_management_number = $data_measuring_tools_arr[$i][6];
    }
    // else{
    //     $data_accuracy = '';
    //     $data_management_number = '';
    // }
}

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
        $data_account[$i][8] = $row['boss'];
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
    $data_account[0][8] = '';
}
// khai báo thông tin
$d2_arr = [0, 0.35, 1.13, 1.69, 2.06, 2.33, 2.53];
$a2_arr = [0, 2.66, 1.88, 1.02, 0.73, 0.58, 0.48];
$d4_arr = [0, 3.27, 3.27, 2.58, 2.25, 2.12, 2.00];

//Lọc data array to X chart top left
$arr_x_top_left = array();
$arr_average_x_top_left = array();
//TH tần suất thông kê theo ca/ ngày / tuần/ tháng ...
if($data_unit_time == 'Ca'){
 echo '<script>alert("Thống Kê Tần Suất Theo Ca Chưa Khả Dụng. Xin Vui Lòng Test Tính Năng Tần Suất Theo Ngày/Tuần/Tháng. Thông Cảm Vì Sự Bất Tiện Này.")</script>';
}
else{
    // for($i = 0; $i < (int)$data_quantity; $i++){
    //     $arr_data[] = array();
    // }
    //thống kê theo ngày / tuần / tháng
    for ($i=0; $i < count($data_manulot); $i++) { 
        $tmp = 0; //khai báo mảng theo ngày
        $average_day = 0;
        for ($x=0; $x < count($data_tb); $x++) { 
            if($data_manulot[$i] == $data_tb[$x][4]){
                if($tmp < $data_quantity){
                    $arr_x_top_left[$i][$tmp] = $data_tb[$x][17];
                    $average_day+=$data_tb[$x][17];
                    $tmp++;
                }
            }
        }
        if($tmp != 0){
            array_push($arr_average_x_top_left, (round($average_day/$tmp,3)));
        }
        else{
            array_push($arr_average_x_top_left, null);
        }
    } 

}


// echo $d2_arr[2];
$data_upper_chart = $data_x_cl + 2*($data_x_ucl - $data_x_cl);
// echo $data_upper_chart ;
$data_lower_chart = $data_x_cl - 2*($data_x_cl - $data_x_lcl);
$data_step_chart = ($data_upper_chart - $data_lower_chart)/16;

// $sign_name = $_COOKIE['full_name'];
// echo($sign_name);

function write_name($username){
    $sign_name_arr = preg_split("/\s+/", $username);
    // print($sign_name_arr[count($sign_name_arr) - 1]);
    return $sign_name_arr[count($sign_name_arr) - 1];
}


// //Tính toán công thức form
//X trung bình
$xAverage = round(array_sum($arr_average_x_top_left) / count($data_manulot),3);
$r_value = array();
for ($i=0; $i < count($arr_x_top_left); $i++) {
    $r_value[$i] = max($arr_x_top_left[$i])- min($arr_x_top_left[$i]);
}
//R trung bình
$rAverage = round(array_sum($r_value) / count($data_manulot),3); 
// print("X trung bình: " . $xAverage . "<br>");
// print("R trung bình: " . $rAverage . "<br>");
// print("A2 4: " . $a2_arr[$data_quantity] . "<br>");
// print("UCL: " . round($xAverage + $a2_arr[$data_quantity]*$rAverage,3) . "<br>");
//𝜎 trung bình
$𝜎 = round($rAverage / $d2_arr[2],3);
//CP và CPK
// xét điều kiện ± / Min / Max để tính toán cận trên cận dưới
if($𝜎 != 0){
    if($data_type_allowance == "±"){ // 2 cận
        $cp = round(($data_x_ucl-$data_x_lcl)/(6*$𝜎),3);
        $cpk1 = round(($xAverage - $data_x_lcl)/(3*$𝜎),3);
        $cpk2 = round(($data_x_ucl - $xAverage)/(3*$𝜎),3);
        $cpk = min($cpk1,$cpk2);
    }
    else if($data_type_allowance == "Min"){
        $cp = null;
        $cpk = round(($xAverage - $data_x_lcl)/(3*$𝜎),3);
    }
    else if($data_type_allowance == "Max"){
        $cp = null;
        $cpk = round(($data_x_ucl - $xAverage)/(3*$𝜎),3);
    }
    else{
        $cp = null;
        $cpk = null;
    }
}
else{
    $cp = null;
    $cpk = null;
}

?>
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
        <img src="../../projects/qc/img-qc/form-XR-left.png" alt="" class="xr-picture-left">
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
                            <img src="../../projects/qc/img-qc/HD-logo.png" alt="HD-logo"
                                style="width:50px;height:30px">
                        </div>
                        <!-- Loại biểu đồ -->
                        <div class="heading-box-content flex-mid-cen flex-column col-8 text-center">
                            <p class="content-name "><?php echo $data_chart ?></p>
                            <p class="form-name">(<?php echo $data_form ?>,HISTOGRAM)</p>
                        </div>
                        <!-- Form name -->

                        <!-- img1 -->
                        <div class="row col-3 ">
                            <div class="col-6 flex-mid-cen">
                                <img src="../../projects/qc/img-qc/inportance_control_sr_C.png" alt="C-logo"
                                    class="pt-2">
                            </div>
                            <div class="col-6 flex-mid-cen">
                                <img src="../../projects/qc/img-qc/inportance_control_sr_C.png" alt="C-logo"
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
                            <td id="xr-confirm-mgr" class="no-border-top text-center"
                                onclick="show_confirm_modal('xr-confirm-mgr','ToanMgr')"></td>
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
                            <td id="xr-confirm2-mgr" class="no-border-top text-center"
                                onclick="show_confirm_modal('xr-confirm2-mgr','ToanMgr')"></td>
                            <td id="dxr-confirm-sup" class="no-border-top text-center"
                                onclick="show_confirm_modal('dxr-confirm-sup','ToanMgr')"></td>
                            <td id="xr-confirm-tl" class="no-border-top text-center"
                                onclick="show_confirm_modal('xr-confirm-tl','ToanMgr')"></td>
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
                            <td colspan=3 class="td-value w-5"><?php echo $data_process ?></td>
                            <td class="td-name w-10">Giá trị đặc tính</td>
                            <td class="td-value  w-15"><?php echo $data_measurement_items ?></td>
                            <td class="td-name  w-5">Mã</td>
                            <td class="td-value  w-15"><?php echo $data_part_no ?></td>
                            <td class="td-name w-10">Máy đo</td>
                            <td class="td-value  w-10"><?php echo $data_measuring_tools ?></td>
                            <td class="td-name w-10 "> Sổ quản lý dụng cụ đo </td>
                        </tr>
                        <tr class="">
                            <td class="td-name">Số máy</td>
                            <td class="td-value w-5"><?php echo $data_number_machine ?></td>
                            <td class="td-name w-5">Line</td>
                            <td class="td-value w-5"><?php echo $data_line ?></td>
                            <td class="td-name">Quy cách</td>
                            <td class="td-value"><?php echo $data_allowance_display ?></td>
                            <td class="td-name">Tên</td>
                            <td class="td-value"><?php echo $data_part_name ?></td>

                            <td class="td-name ">Đơn vị đo</td>
                            <td class="td-value"><?php echo $data_accuracy ?></td>
                            <td class="td-value"><?php echo $data_management_number ?></td>
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
                            <?php 
                                // xét điều kiện ± / Min / Max để tính toán cận trên cận dưới
                                if($data_type_allowance == "±" || $data_type_allowance == "Max"){ // 2 cận
                                    echo '<p class="m-0">' . ($data_standard_dimension + $data_upper) . 'N</p>';
                                    echo '<img src="../../projects/qc/img-qc/quycach-form-picture-top.png " alt="quy cach">';
                                }
                            ?>
                        </div>
                        <div class="picture-quy-cach-bot row">
                            <?php 
                                // xét điều kiện ± / Min / Max để tính toán cận trên cận dưới
                                if($data_type_allowance == "±" || $data_type_allowance == "Min"){ // 2 cận
                                    echo '<p class="m-0">' . ($data_standard_dimension + $data_lower) . 'N</p>';
                                    echo '<img src="../../projects/qc/img-qc/quycach-form-picture-bot.png " alt="quy cach">';
                                }
                            ?>
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
                                for ($i = 0; $i < 30; $i++) {
                                    if($i < count($data_manulot)){
                                        echo '<td style="width:auto">'. substr($data_manulot[$i],5,2) .'</td>';
                                    }
                                    else{
                                        echo '<td style="width:auto">00</td>';
                                    }
                                }
                            ?>
                        </tr>
                        <tr>
                            <td class="no-border-right">Năm</td>
                            <td class="no-border-left">
                                <?php 
                                    if(substr($data_tb[0][4],0,4) != substr($data_tb[count($data_tb)-1][4],0,4)){
                                        echo (substr($data_tb[0][4],0,4) . " - " . substr($data_tb[count($data_tb)-1][4],0,4));
                                    }
                                    else{
                                        echo (substr($data_tb[count($data_tb)-1][4],0,4));
                                    }
                                ?>
                            </td>
                            <td>Ngày</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
                                if($i < count($data_manulot)){
                                    echo '<td style="width:auto">'. substr($data_manulot[$i],8,2) .'</td>';
                                }
                                else{
                                    echo '<td style="width:auto"></td>';
                                }
                            }
                            ?>
                        </tr>
                        <!-- <tr>
                            <td colspan="3">Ca</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
                                    echo '<td style="width:auto"></td>';
                                
                            }
                            ?>
                        </tr> -->
                        <tr>
                            <td colspan="3">Cavity</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
                                if($i < count($data_manulot)){
                                    for ($x=0; $x < count($data_tb); $x++) { 
                                        if($data_manulot[$i] == $data_tb[$x][4] && $data_tb[$x][22]!= ''){
                                            echo '<td style="width:auto">'. $data_tb[$x][22].'</td>';
                                            break;
                                        }
                                    }
                                }
                                else{
                                    echo '<td style="width:auto"></td>';
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="3">Sổ quản lý dụng cụ đo</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
                                if($i < count($data_manulot)){
                                    for ($x=0; $x < count($data_tb); $x++) {
                                        $data_measuring_tools_arr_flag = false; 
                                        if($data_manulot[$i] == $data_tb[$x][4] && $data_tb[$x][9] != ''){
                                            for ($y=0; $y < count($data_measuring_tools_arr); $y++) { 
                                                # code...
                                                if($data_tb[$x][9] == $data_measuring_tools_arr[$y][2]){
                                                    echo '<td style="max-width: 15px; font-size: 50%;overflow: hidden;
                                                        text-overflow: ellipsis; ">' . $data_measuring_tools_arr[$y][6] . '</td>';
                                                        $data_measuring_tools_arr_flag = true;
                                                        break;
                                                }
                                            }
                                            if($data_measuring_tools_arr_flag == false){
                                                echo '<td style="max-width: 15px; font-size: 55%;overflow: hidden;
                                                text-overflow: ellipsis; "></td>';
                                            }
                                            break;
                                        }
                                    }
                                }
                                else{
                                    echo '<td style="max-width: 15px; font-size: 55%;overflow: hidden;
                                            text-overflow: ellipsis; "></td>';
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="3">Người thực hiện</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
                                if($i < count($data_manulot)){
                                    for ($x=0; $x < count($data_tb); $x++) {
                                        if($data_manulot[$i] == $data_tb[$x][4] && $data_tb[$x][12] != ''){
                                            echo '<td style="max-width: 15px; font-size: 70%;overflow: hidden;
                                                    text-overflow: ellipsis; ">' . $data_tb[$x][12] . '</td>';
                                                    break;
                                        }
                                    }
                                }
                                else{
                                    echo '<td style="max-width: 15px; font-size: 55%;overflow: hidden;
                                            text-overflow: ellipsis; "></td>';
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="3">DTL/TL (1/D)</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
                                echo '<td style="width:auto"></td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="3">SV (1/W)</td>
                            <?php
                            for ($i = 0; $i < 30; $i++) {
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
                        <td class="td-value w-20"><?php echo $data_frequency ?></td>
                        <td class="td-name no-border-right w-30">Người đo</td>
                        <td class="td-value no-border-left w-30"><?php echo $data_measuring_department ?></td>
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
                                table_add("table-tr-xr", 16, 1,
                                    <?php echo $data_upper_chart . ',' . $data_step_chart ?>, 290)
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
                        <figure class="">
                            <table id="tb-top-right-xrs2" class="table-bordered w-100">
                                <tr>
                                    <td class="col-3">f</td>
                                    <td class="col-3">u</td>
                                    <td class="col-3">fu</td>
                                    <td class="col-3">fu2</td>
                                </tr>
                                <!-- <script>
                                    table_add_row("tb-top-right-xrs2", 16, 4, 20.7)
                                    table = document.getElementById("tb-top-right-xrs2")
                                    table.append()
                                   
                                </script> -->
                                <?php
                                for ($i = 0; $i < 17; $i++) {
                                    echo '<tr>';
                                    for ($j = 0; $j < 4; $j++) {
                                        echo '<td height=17 class="text-center" style="line-height: 10px;padding:0"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                <tr>
                                    <td height=17 class="text-center" style="line-height: 10px;padding:0">n</td>
                                    <td height=17 class="text-center" style="line-height: 10px;padding:0"></td>
                                    <td height=17 class="text-center" style="line-height: 10px;padding:0">∑fu</td>
                                    <td height=17 class="text-center" style="line-height: 10px;padding:0">∑fu2</td>
                                </tr>
                                <tr>
                                    <td colspan="2" height=17 class="text-center" style="line-height: 10px;padding:0">
                                        nで割る</td>
                                    <td height=17 class="text-center" style="line-height: 10px;padding:0">E1</td>
                                    <td height=17 class="text-center" style="line-height: 10px;padding:0">E2</td>
                                </tr>
                            </table>
                        </figure>
                    </div>
                </div>
                <!-- Table summary bot right -->
                <div class="fb-item fbi-body-mid d-flex flex-column w-100  " style="height:372px">
                    <div class=" w-100 position-relative" style="height:110px">
                        <table id="xr-result-table">
                            <tr>
                                <td>Cp=</td>
                                <td><?php echo $cp ?></td>
                                <td class="border-left-black">Phán định</td>
                            </tr>
                            <tr>
                                <td>Cpk</td>
                                <td><?php echo $cpk ?></td>
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
                                    <td class="w" colspan="2"><?php echo $xAverage ?></td>
                                    <td class="w">E=∑fu/n </td>
                                    <td class="w">E=∑fu/n </td>
                                </tr>
                                <tr>
                                    <td>σ =</td>
                                    <td>m√E-E =</td>
                                    <td colspan="2"><?php echo $𝜎 ?></td>
                                    <td colspan="2">f = 観測度数</td>
                                </tr>
                                <tr>
                                    <td>3σ=</td>
                                    <td><?php echo 3*$𝜎 ?></td>
                                    <td>6σ=</td>
                                    <td class="add-dashed-border"><?php echo 6*$𝜎 ?></td>
                                    <td colspan="2">Ａ ＝ 第 0 番目のセルの中心</td>
                                </tr>
                                <tr class="align-top">
                                    <td>X + 3σ=</td>
                                    <td><?php echo ($xAverage + 3*$𝜎) ?></td>
                                    <td>X̅̅-3σ=</td>
                                    <td class="add-dashed-border"><?php echo ($xAverage - 3*$𝜎) ?></td>
                                    <td colspan="2">値 ＝<br>u = A からのセルの偏差</td>
                                </tr>
                                <tr>
                                    <td>σ =</td>
                                    <td>(郡内）= </td>
                                    <td>R/d=</td>
                                    <td class="add-dashed-border"><?php echo $𝜎 ?></td>
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
                                    <td>X-UCL=</td>
                                    <td><?php echo round($xAverage + $a2_arr[$data_quantity]*$rAverage,3) ?></td>
                                </tr>
                                <tr>
                                    <td>X-CL=</td>
                                    <td><?php echo $xAverage ?></td>
                                </tr>
                                <tr>
                                    <td>X-LCL=</td>
                                    <td><?php echo round($xAverage - $a2_arr[$data_quantity]*$rAverage,3) ?></td>
                                </tr>
                                <tr>
                                    <td>R-UCL=</td>
                                    <td><?php echo round($d4_arr[$data_quantity]*$rAverage,3) ?></td>
                                </tr>
                                <tr>
                                    <td>R-CL=</td>
                                    <td><?php echo $rAverage ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-9 h-100 p-0 flex-mid-cen">
                            <img src="../../projects/qc/img-qc/form_CheckSheet.png" alt="Form check sheet"
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
                <img src="../../projects/qc/img-qc/form-xr-bot.png" alt="img-footer" class="w-100 text-right pl-2">
                <p class="footer">FQI-P0502(Rev. date 21-05-17)</p>
            </div>
        </div> -->
    </div>


    <div class="sb-item sb-right col position-relative">
        <img src="../../projects/qc/img-qc/form-xr-right.png" alt="" class="xr-picture-right">
    </div>
    <!-- Head table -->

</div>

<!-- Chart top-left -->
<script>
var tick_pos_xr_top_left_y = cac_tick_pos(
    <?php echo $data_lower_chart . ',' . $data_upper_chart . ',' . $data_step_chart ?>)
var tick_pos_xr_top_left_x = cac_tick_pos(0, 31, 1)
var xr_tl_pl = [<?php echo $data_x_ucl . ',' . $data_x_cl . ',' . $data_x_lcl ?>]
var y_value_top_left = [
    <?php 
        for ($i=0; $i < count($arr_x_top_left); $i++) { 
            # code...
            for ($x=0; $x < count($arr_x_top_left[$i]); $x++) { 
                # code...
                if(count($arr_x_top_left[$i]) == 1){
                    echo '[1, ' . $arr_x_top_left[$i][$x] . ']' . ',';
                }
                else{
                    echo '['  . ($i + 0.6 + ($x*0.8/(count($arr_x_top_left[$i]) - 1))) . ',' . $arr_x_top_left[$i][$x] . ']' . ',';
                }
            }
        }
        ?>
]
// console.log(y_value_top_left)
Highcharts.chart('xr-chart-top-left', {
    chart: {
        height: 290,
        margin: [5, 0, 10, 70],
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
        min: <?php echo $data_lower_chart ?>,
        max: <?php echo $data_upper_chart ?>,
        step: <?php echo $data_step_chart ?>,
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
            color: 'blue',
            width: 1.5,
            zIndex: 5,
            value: xr_tl_pl[1],
            dashStyle: 'line'
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
        data: y_value_top_left, //
        marker: {
            enabled: true,
            symbol: 'circle',
            radius: 2.5,
            fillColor: '#ffffff',
            lineWidth: 1.5,
            lineColor: '#000000',
        }
    }]
});
</script>

<!-- Chart bot-left -->
<script>
<?php 
$data_xbar_upper_chart = $data_r_cl + 1.5*($data_r_ucl - $data_r_cl);
$data_xbar_lower_chart = $data_r_cl - 1.5*($data_r_ucl - $data_r_cl);
$data_xbar_step_chart  = ($data_xbar_upper_chart - $data_xbar_lower_chart)/16;
?>
var tick_pos_xr_top_left = cac_tick_pos(
    <?php echo $data_xbar_lower_chart . ',' . $data_xbar_upper_chart . ',' . $data_xbar_step_chart ?>)
var y_value = [
    <?php 
        for ($i=0; $i < count($arr_x_top_left); $i++) { 
            echo round(max($arr_x_top_left[$i]) - min($arr_x_top_left[$i]),3) . ',';
        }
        ?>
]
// [R-CL,R_UCL]
var x_value = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
    29, 30
]
var xr_bl_pl = [<?php echo $data_r_cl . ',' . $data_r_ucl ?>]
Highcharts.chart('xr-chart-bot-left', {
    chart: {
        height: 235,
        margin: [5, 0, 10, 70],
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
        min: <?php echo $data_xbar_lower_chart ?>,
        max: <?php echo $data_xbar_upper_chart ?>,
        startOnTick: false,
        endOnTick: false,

        labels: {
            format: '{value:.3f}',
        },
        minorTickInterval: tick_pos_xr_top_left[1] / 2.5, // Khoảng cách ko
        tickPositions: tick_pos_xr_top_left[0],

        gridLineWidth: 1,
        plotLines: [{
            color: 'blue',
            width: 1.5,
            zIndex: 5,
            value: xr_bl_pl[0],
            dashStyle: 'line'
        }, {
            color: 'red',
            width: 1.5,
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
var tick_pos_xr_top_right_x = tick_pos_xr_top_left_y
var data_array = []
var x_value = tick_pos_xr_top_right_x[0]

// khai báo giá trị histogram 
var count_y_1 = 0;
var count_y_2 = 0;
var count_y_3 = 0;
var count_y_4 = 0;
var count_y_5 = 0;
var count_y_6 = 0;
var count_y_7 = 0;
var count_y_8 = 0;
var count_y_9 = 0;
var count_y_10 = 0;
var count_y_11 = 0;
var count_y_12 = 0;
var count_y_13 = 0;
var count_y_14 = 0;
var count_y_15 = 0;
var count_y_16 = 0;
var count_y_17 = 0;

var y_value_topright = [
    <?php 
        for ($i=0; $i < count($data_tb); $i++) { 
            echo $data_tb[$i][17] . ',';
        }
    ?>
]
for (let index = 0; index < y_value_topright.length; index++) {
    if (y_value_topright[index] < x_value[0]) {
        count_y_1++;
    } else if (y_value_topright[index] >= x_value[0] && y_value_topright[index] < x_value[1]) {
        count_y_2++;
    } else if (y_value_topright[index] >= x_value[1] && y_value_topright[index] < x_value[2]) {
        count_y_3++;
    } else if (y_value_topright[index] >= x_value[2] && y_value_topright[index] < x_value[3]) {
        count_y_4++;
    } else if (y_value_topright[index] >= x_value[3] && y_value_topright[index] < x_value[4]) {
        count_y_5++;
    } else if (y_value_topright[index] >= x_value[4] && y_value_topright[index] < x_value[5]) {
        count_y_6++;
    } else if (y_value_topright[index] >= x_value[5] && y_value_topright[index] < x_value[6]) {
        count_y_7++;
    } else if (y_value_topright[index] >= x_value[6] && y_value_topright[index] < x_value[7]) {
        count_y_8++;
    } else if (y_value_topright[index] >= x_value[7] && y_value_topright[index] < x_value[8]) {
        count_y_9++;
    } else if (y_value_topright[index] >= x_value[8] && y_value_topright[index] < x_value[9]) {
        count_y_10++;
    } else if (y_value_topright[index] >= x_value[9] && y_value_topright[index] < x_value[10]) {
        count_y_11++;
    } else if (y_value_topright[index] >= x_value[10] && y_value_topright[index] < x_value[11]) {
        count_y_12++;
    } else if (y_value_topright[index] >= x_value[11] && y_value_topright[index] < x_value[12]) {
        count_y_13++;
    } else if (y_value_topright[index] >= x_value[12] && y_value_topright[index] < x_value[13]) {
        count_y_14++;
    } else if (y_value_topright[index] >= x_value[13] && y_value_topright[index] < x_value[14]) {
        count_y_15++;
    } else if (y_value_topright[index] >= x_value[14] && y_value_topright[index] < x_value[15]) {
        count_y_16++;
    } else if (y_value_topright[index] >= x_value[15] && y_value_topright[index] < x_value[16]) {
        count_y_17++;
    }
}
var y_value = [count_y_17, count_y_16, count_y_15, count_y_14, count_y_13, count_y_12, count_y_11, count_y_10,
    count_y_9, count_y_8, count_y_7, count_y_6, count_y_5, count_y_4, count_y_3, count_y_2, count_y_1
]
// console.log(y_value)
for (let i = 0; i < x_value.length; i++) {
    data_array.push([x_value[i], y_value[i]])
    // console.log(x_value[i]);
}

// console.log(x_value)
// console.log(data_array)

// console.log(tick_pos_xr_top_right_x)
Highcharts.chart('chart-top-right-xr', {
    chart: {
        height: 321,
        type: 'bar',
        margin: [26, 0, 5, 0],
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
        pointWidth: 16, // Chua edit so thich hop
    }]
});
</script>