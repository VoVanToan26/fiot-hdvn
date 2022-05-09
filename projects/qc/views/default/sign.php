<?php
$connect = $GLOBALS['connect'];

if(isset($_GET['sign_day']) && $_GET['sign_day'] == "yes"){
	$data_load = array();
	if(isset($_GET['sub_id']) && $_GET['sub_id'] != ''){
		$sub_id = $_GET['sub_id'];
		$sign_day = $_COOKIE['username'];
		$sqlregister_sign_day = "INSERT INTO `qc_tb_sign`(`sub_id`, `sign_day`, `sign_creator`, `sig`) VALUES ('$sub_id', '$sign_day', '$sign_day', '$sign_day')";
		if (mysqli_query($connect, $sqlregister_sign_day)) {
			mysqli_close($connect);
			array_push($data_load, $_GET['sub_id']);
		}
	}
	else{
		array_push($data_load, false);
	}

	echo json_encode($data_load);
}
else if(isset($_GET['sign_week']) && $_GET['sign_week'] == "yes"){
	$data_load = array();
	if(isset($_GET['sub_id_week']) && $_GET['sub_id_week'] != ''){
		$sub_id_week = $_GET['sub_id_week'];
		$sign_week = $_COOKIE['username'];
		// xử lý chuỗi thành array 
		$arr_sub_id_week = explode(",",$sub_id_week);
		for ($i=0; $i < count($arr_sub_id_week) - 1 ; $i++) {
			$sub_id_week_tmp = $arr_sub_id_week[$i];
			$sqlupdate_sign_week = "UPDATE `qc_tb_sign` SET `sign_week`='$sign_week' WHERE `sub_id` = '$sub_id_week_tmp'";
			if (mysqli_query($connect, $sqlupdate_sign_week)) {

				array_push($data_load, $sub_id_week_tmp);
			}
		}
		mysqli_close($connect);

	}
	else{
		array_push($data_load, false);
	}
	echo json_encode($data_load);
}
else {
	// echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/'</script>";
	echo '<script>history.back()</script>';
}