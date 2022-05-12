<?php 
function write_name($username){
    $sign_name_arr = preg_split("/\s+/", $username);
    // print($sign_name_arr[count($sign_name_arr) - 1]);
    return $sign_name_arr[count($sign_name_arr) - 1];
}
$SCRIPT_NAME="/fiot-hdvn";


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
		// $data_management_level_two =$row['management_level_two'];
		$data_draw =$row['draw'];
        $data_sign_create_form =$row['sign_create_form'];
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
		// $data_management_level_two ='';
		$data_draw ='';
        $data_sign_create_form ='';
	}
}

// Lọc account người lập form 

$sqlsearch_create_form = "SELECT * FROM `tb_account` WHERE `username` = '$data_sign_create_form'";
$resultsearch_create_form = mysqli_query( $connect, $sqlsearch_create_form );
if ($sqlsearch_create_form && $resultsearch_create_form->num_rows > 0) {
    $row = $resultsearch_create_form->fetch_assoc();
    $data_create_form = write_name($row['full_name']);
}
else{
    $data_create_form = '';
}

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
// lọc data dữ liệu
//select qc_tb_measurement_items
$sqlcheck_tb_data = "SELECT * FROM `qc_tb_data` WHERE `status_complete` IS NULL AND `sub_id` LIKE '$sub_id_search%' ORDER BY `manu_lot` ASC LIMIT 30";
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
    $data_tb[0][0] = 0;
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
    $data_tb_sign[0][0] = 0;
    $data_tb_sign[0][1] = '';
    $data_tb_sign[0][2] = '';
    $data_tb_sign[0][3] = '';
    $data_tb_sign[0][4] = '';
    $data_tb_sign[0][5] = '';
    $data_tb_sign[0][6] = '';
    $data_tb_sign[0][7] = '';
    $data_tb_sign[0][8] = '';
    $data_tb_sign[0][9] = '';
    $data_tb_sign_week="";
}
$count_sig= count($data_tb_sign) ;
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
    $data_measuring_tools_arr[0][0] = 0;
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
    $data_account[0][0] = 0;
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
$d2_arr = [0, 0, 1.13, 1.69, 2.06, 2.33, 2.53];
$a2_arr = [0, 0, 1.88, 1.02, 0.73, 0.58, 0.48];
$d4_arr = [00, 0, 3.27, 2.58, 2.25, 2.12, 2.00];
// echo $d2_arr[2];
// $data_upper_chart = $data_x_cl + 2*($data_x_ucl - $data_x_cl);
// // echo $data_upper_chart ;
// $data_lower_chart = $data_x_cl - 2*($data_x_cl - $data_x_lcl);
// $data_step_chart = ($data_upper_chart - $data_lower_chart)/16;

// $sign_name = $_COOKIE['full_name'];
// echo($sign_name);



//Tính toán công thức form
// => X
// $arr_x_top_left = array();
// $arr_x_bot_left = array();
// $sum_x_top_left = 0;
// $sum_x_bot_left = 0;
// for($i=0; $i < count($data_tb); $i++){
//     $arr_x_top_left[$i] = $data_tb[$i][17];
//     $sum_x_top_left += $data_tb[$i][17];
//     // echo($data_tb[$i][17] . ',');
//     if($i < count($data_tb) - 1){
//         $arr_x_bot_left[$i] = abs($data_tb[$i + 1][17] - $data_tb[$i][17]);
//         $sum_x_bot_left += $arr_x_bot_left[$i];
//     }
// }

// $xAverage = round($sum_x_top_left/count($data_tb),3);
// $rAverage = round($sum_x_bot_left/(count($data_tb)-1),3);
// $𝜎 = round($rAverage / $d2_arr[2],3);

// xét điều kiện ± / Min / Max để tính toán cận trên cận dưới

// if($data_type_allowance == "±"){ // 2 cận
//     $cp = round(($data_x_ucl-$data_x_lcl)/(6*$𝜎),3);
//     $cpk1 = round(($xAverage - $data_x_lcl)/(3*$𝜎),3);
//     $cpk2 = round(($data_x_ucl - $xAverage)/(3*$𝜎),3);
//     $cpk = min($cpk1,$cpk2);
// }
// else if($data_type_allowance == "Min"){
//     $cp = null;
//     $cpk = round(($xAverage - $data_x_lcl)/(3*$𝜎),3);
// }
// else if($data_type_allowance == "Max"){
//     $cp = null;
//     $cpk = round(($data_x_ucl - $xAverage)/(3*$𝜎),3);
// }
// else{
//     $cp = null;
//     $cpk = null;
// }


// print($xAverage . "<br>" . $rAverage . "<br>" . $𝜎 . "<br>" . $cp . "<br>" . $cpk1 . "<br>" . $cpk2 . "<br>" . $cpk);

?>