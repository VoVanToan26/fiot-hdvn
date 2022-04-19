<?php
	$connect = $GLOBALS['connect'];


	if(isset($_GET['auto_popup_part_no']) && $_GET['auto_popup_part_no'] == "yes"){

		$product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
		$line = isset($_GET['line']) ? $_GET['line'] : NULL;
		    //select qc_tb_part_no
	    $sqlcheck_part_no = "SELECT DISTINCT `part_no` FROM `qc_tb_part_no` WHERE `product_family` = '$product_family' AND `line` = '$line' ORDER BY `part_no` ASC";
	    $resultcheck_part_no = mysqli_query( $connect, $sqlcheck_part_no );
	    if ($resultcheck_part_no && $resultcheck_part_no->num_rows > 0) {
	        // tiến hành lặp dữ liệu
	        $i = 0;
	        while ($row = $resultcheck_part_no->fetch_assoc()) {
	            //thêm kết quả vào mảng
	            $data_part_no[$i]=$row['part_no'];
	            $i++;
	        }
	    }
	    else{
	        $data_part_no[0]='Không có mã sản phẩm nào theo dòng sản phẩm';
	    }
		echo json_encode($data_part_no);
	}
	else if(isset($_GET['auto_popup_line']) && $_GET['auto_popup_line'] == "yes"){
		$product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
		    //select qc_tb_part_no
	    $sqlcheck_line = "SELECT DISTINCT `line` FROM `qc_tb_line` WHERE `product_family` = '$product_family' ORDER BY `line` ASC";
	    $resultcheck_line = mysqli_query( $connect, $sqlcheck_line );
	    if ($resultcheck_line && $resultcheck_line->num_rows > 0) {
	        // tiến hành lặp dữ liệu
	        $i = 0;
	        while ($row = $resultcheck_line->fetch_assoc()) {
	            //thêm kết quả vào mảng
	            $data_part_no[$i]=$row['line'];
	            $i++;
	        }
	    }
	    else{
	        $data_part_no[0]='Không có line nào theo dòng sản phẩm';
	    }
		echo json_encode($data_part_no);
	}
	else if(isset($_GET['auto_popup_process']) && $_GET['auto_popup_process'] == "yes"){
		$line_input = isset($_GET['line_input']) ? $_GET['line_input'] : NULL;
		    //select qc_tb_part_no
	    $sqlcheck_process = "SELECT DISTINCT `process` FROM `qc_tb_machine_number` WHERE `line` = '$line_input' ORDER BY `process` ASC";
	    $resultcheck_process = mysqli_query( $connect, $sqlcheck_process );
	    if ($resultcheck_process && $resultcheck_process->num_rows > 0) {
	        // tiến hành lặp dữ liệu
	        $i = 0;
	        while ($row = $resultcheck_process->fetch_assoc()) {
	            //thêm kết quả vào mảng
	            $data_process[$i]=$row['process'];
	            $i++;
	        }
	    }
	    else{
	        $data_process[0]='Không có công đoạn nào theo line';
	    }
		echo json_encode($data_process);
	}
	else if(isset($_GET['auto_popup_measurement_items']) && $_GET['auto_popup_measurement_items'] == "yes"){
		$product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
		$part_no = isset($_GET['part_no']) ? $_GET['part_no'] : NULL;
		$line = isset($_GET['line']) ? $_GET['line'] : NULL;
		$process = isset($_GET['process']) ? $_GET['process'] : NULL;

		//select qc_tb_measurement_items_name
	    $sqlcheck_measurement_items_name = "SELECT DISTINCT `measurement_items` FROM `qc_tb_measurement_items_name` WHERE `product_family` = '$product_family' AND `part_no` = '$part_no' AND `line` = '$line' AND `process` = '$process' ORDER BY `measurement_items` ASC";
	    $resultcheck_measurement_items_name = mysqli_query( $connect, $sqlcheck_measurement_items_name );
	    // $check_measurement_items_name = mysqli_fetch_assoc( $resultcheck_measurement_items_name );
	    if ($resultcheck_measurement_items_name && $resultcheck_measurement_items_name->num_rows > 0) {
	        // tiến hành lặp dữ liệu
	        $i = 0;
	        while ($row = $resultcheck_measurement_items_name->fetch_assoc()) {
	            $data_measurement_items_name[$i][0]=$row['measurement_items'];
	            $i++;
	        }
	    }
	    else{
	        $data_measurement_items_name[0][0]='Không có hạng mục nào theo công đoạn';
	    }
	    echo json_encode($data_measurement_items_name);
	}
	else{
		echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/'</script>"; 
	}
	





?>