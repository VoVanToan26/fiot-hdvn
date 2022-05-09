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
	        $data_part_no[0]='Không có mã sản phẩm';
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
	        $data_part_no[0]='Không có line nào ';
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
	        $data_process[0]='Không có công đoạn';
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
	        $data_measurement_items_name[0][0]='Không có hạng mục nào';
	    }
	    echo json_encode($data_measurement_items_name);
	}

	//  register_line
	else if(isset($_POST['get_line']) && $_POST['get_line'] == "yes"){
		$product_family = isset($_POST['product_family']) ? $_POST['product_family'] : NULL;
		$line = isset($_POST['line']) ? $_POST['line'] : NULL;
		$sig = $_COOKIE['username'];
			//select qc_tb_measurement_items_name
	    $sqlcheck_line= "SELECT * FROM `qc_tb_line` WHERE `line` = '$line' ";
	    $resultcheck_line= mysqli_query( $connect, $sqlcheck_line);
	    // $check_line= mysqli_fetch_assoc( $resultcheck_line);
	
	    if ($resultcheck_line->num_rows >=1) {
			$result= 'same';
			echo json_encode( $result);
			exit();
	    }
	    else{
	        $result= 'false';
			//  register and reload
			$sqlregister_line = "INSERT INTO `qc_tb_line`(`product_family`, `line`, `sig`) VALUES ('$product_family', '$line', '$sig')";
			if (mysqli_query($connect, $sqlregister_line)) {
				mysqli_close($connect);
				$result= 'true';
			}
			echo json_encode( $result);
			exit();
	    }
		
	    
	}
	else if(isset($_POST['get_line_edit']) && $_POST['get_line_edit'] == "yes"){
		$product_family = isset($_POST['product_family_edit']) ? $_POST['product_family_edit'] : NULL;
		$line = isset($_POST['line_edit']) ? $_POST['line_edit'] : NULL;
		$sig = $_COOKIE['username'];
			//select qc_tb_measurement_items_name
	    $sqlcheck_line= "SELECT * FROM `qc_tb_line` WHERE `line` = '$line' ";
	    $resultcheck_line= mysqli_query( $connect, $sqlcheck_line);
	    // $check_line= mysqli_fetch_assoc( $resultcheck_line);
	
	    if ($resultcheck_line->num_rows >=1) {
			$result= 'same';
			echo json_encode( $result);
			exit();
	    }
	    else{
	        $result= 'false';
			//  register and reload
			$sqlregister_line = "INSERT INTO `qc_tb_line`(`product_family`, `line`, `sig`) VALUES ('$product_family', '$line', '$sig')";
			if (mysqli_query($connect, $sqlregister_line)) {
				mysqli_close($connect);
				$result= 'true';
			}
			echo json_encode( $result);
			exit();
	    }
		
	    
	}
// Add from Thanh 5/7
	else if(isset($_GET['auto_popup_measurement_app_items']) && $_GET['auto_popup_measurement_app_items'] == "yes"){
		$product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
		$part_no = isset($_GET['part_no']) ? $_GET['part_no'] : NULL;
		$line = isset($_GET['line']) ? $_GET['line'] : NULL;
	
		//select qc_tb_measurement_items_name
		$sqlcheck_measurement_items_name = "SELECT DISTINCT `measurement_items` FROM `qc_tb_measurement_items_name` WHERE `product_family` = '$product_family' AND `part_no` = '$part_no' AND `line` = '$line' ORDER BY `measurement_items` ASC";
		$resultcheck_measurement_items_name = mysqli_query($connect, $sqlcheck_measurement_items_name);
		// $check_measurement_items_name = mysqli_fetch_assoc( $resultcheck_measurement_items_name );
		if ($resultcheck_measurement_items_name && $resultcheck_measurement_items_name->num_rows > 0) {
			// tiến hành lặp dữ liệu
			$i = 0;
			while ($row = $resultcheck_measurement_items_name->fetch_assoc()) {
				$data_measurement_items_name[$i] = $row['measurement_items'];
				$i++;
			}
		} else {
			$data_measurement_items_name[0] = 'Không có hạng mục đo nào theo mã sản phẩm';
		}
		echo json_encode($data_measurement_items_name);
	}
	else if(isset($_GET['load_chart']) && $_GET['load_chart'] == "yes"){
		$product_family = isset($_GET['product_family']) ? $_GET['product_family'] : NULL;
		$line = isset($_GET['line']) ? $_GET['line'] : NULL;
		$part_no = isset($_GET['part_no']) ? $_GET['part_no'] : NULL;
		$measurement_items = isset($_GET['measurement_items']) ? $_GET['measurement_items'] : NULL;
		$chart = isset($_GET['chart']) ? $_GET['chart'] : NULL;
	
		$sqlsearch_chart = "SELECT * FROM `qc_tb_measurement_items` WHERE `product_family` = '$product_family' AND `line` = '$line' AND `part_no` = '$part_no' AND `measurement_items` = '$measurement_items' AND `chart` = '$chart'";
		$resultsearch_chart = mysqli_query( $connect, $sqlsearch_chart );
		if ($resultsearch_chart && $resultsearch_chart->num_rows > 0) {
			$row = $resultsearch_chart->fetch_assoc();
			$form_status = "yes";
			$data_form =$row['form'];
			// $data_product_family =$row['product_family'];
			// $data_part_no =$row['part_no'];
			// $data_process =$row['process'];
			// $data_line =$row['line'];
			// $data_measurement_items =$row['measurement_items'];
			// $data_frequency =$row['frequency'];
			// $data_measuring_tools =$row['measuring_tools'];
			// $data_standard_dimension =$row['standard_dimension'];
			// $data_upper =$row['upper'];
			// $data_lower =$row['lower'];
			// $data_unit =$row['unit'];
			// $data_form =$row['form'];
			// $data_x_ucl =$row['x_ucl'];
			// $data_x_cl =$row['x_cl'];
			// $data_x_lcl =$row['x_lcl'];
			// $data_r_ucl =$row['r_ucl'];
			// $data_r_cl =$row['r_cl'];
			// $data_use_formula =$row['use_formula'];
			// $data_type_formula =$row['type_formula'];
			// $data_number_element =$row['number_element'];
			// $data_definition_formula =$row['definition_formula'];
			// $data_formula =$row['formula'];
			// $data_allowance_display =$row['allowance_display'];
			// $data_chart =$row['chart'];
			// $data_management_level_one =$row['management_level_one'];
			// $data_no_measurement_items =$row['no_measurement_items'];
			// $data_measuring_department =$row['measuring_department'];
			// $data_status =$row['status'];
			// $data_management_level_two =$row['management_level_two'];
			// $data_draw =$row['draw'];
		}
		else{
			$form_status = "no";
		}
		$data_load = array();
		if($form_status == "yes"){
			// array_push($data_load, $form_status, $data_product_family, $data_part_no, $data_process, $data_line, $data_measurement_items, $data_frequency, $data_measuring_tools, 
			// $data_standard_dimension, $data_upper, $data_lower, $data_unit, $data_form, $data_x_ucl, $data_x_cl, $data_x_lcl, $data_r_ucl, $data_r_cl, $data_use_formula, 
			// $data_type_formula, $data_number_element, $data_definition_formula, $data_formula, $data_allowance_display, $data_chart, $data_management_level_one, 
			// $data_no_measurement_items, $data_measuring_department, $data_status, $data_management_level_two, $data_draw);
			array_push($data_load, $form_status, $data_form);
		}
		else{
			array_push($data_load, $form_status);
		}
		echo json_encode($data_load);
	} 
	else {
		// echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/'</script>";
		echo '<script>history.back()</script>';
	}
//Add from thanh 5/7/2022 end