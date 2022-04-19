<?php
// <!-- Register product code -->
if (isset($_POST["register_product"])) {
    $line = $_POST['line'];
    $product_family = $_POST['product_family'];
    $part_no = $_POST['part_no'];
    $part_name = $_POST['part_name'];

    if (isset($_POST['user_mail_approval'])) {
        // code...
        $user_mail_approval = $_POST['user_mail_approval'];
    } else {
        $user_mail_approval = [];
    }

    if (isset($_POST['user_mail_unusual_category'])) {
        // code...
        $user_mail_unusual_category = $_POST['user_mail_unusual_category'];
    } else {
        $user_mail_unusual_category = [];
    }

    if (isset($_POST['user_mail_unusual_trend'])) {
        // code...
        $user_mail_unusual_trend = $_POST['user_mail_unusual_trend'];
    } else {
        $user_mail_unusual_trend = [];
    }

    $sig = $_COOKIE['username'];

    //get user_mail_approval
    $user_mail_approval_send = '';
    foreach ($user_mail_approval as $user_mail_approval_eve) {
        if ($user_mail_approval_send == '') {
            $user_mail_approval_send = $user_mail_approval_eve;
        } else {
            $user_mail_approval_send = $user_mail_approval_send . ';' . $user_mail_approval_eve;
        }
    }


    //get user_mail_unusual_category
    $user_mail_unusual_category_send = '';
    foreach ($user_mail_unusual_category as $user_mail_unusual_category_eve) {
        if ($user_mail_unusual_category_send == '') {
            $user_mail_unusual_category_send = $user_mail_unusual_category_eve;
        } else {
            $user_mail_unusual_category_send = $user_mail_unusual_category_send . ';' . $user_mail_unusual_category_eve;
        }
    }

    //get user_mail_unusual_trend
    $user_mail_unusual_trend_send = '';
    foreach ($user_mail_unusual_trend as $user_mail_unusual_trend_eve) {
        if ($user_mail_unusual_trend_send == '') {
            $user_mail_unusual_trend_send = $user_mail_unusual_trend_eve;
        } else {
            $user_mail_unusual_trend_send = $user_mail_unusual_trend_send . ';' . $user_mail_unusual_trend_eve;
        }
    }

    if ($line == '' || $product_family == '' || $part_no == '' || $part_name == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqlregister = "INSERT INTO `qc_tb_part_no`(`line`, `product_family`, `part_no`, `part_name`, `user_mail_approval`, `user_mail_unusual_category`, `user_mail_unusual_trend`, `sig`) VALUES ('$line', '$product_family', '$part_no', '$part_name', '$user_mail_approval_send', '$user_mail_unusual_category_send', '$user_mail_unusual_trend_send', '$sig')";
    if (mysqli_query($connect, $sqlregister)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code'</script>";
    }
} else if (isset($_POST["edit_product"])) {
    $edit_id = $_POST['edit_id'];
    $edit_line = $_POST['edit_line'];
    $edit_product_family = $_POST['edit_product_family'];
    $edit_part_no = $_POST['edit_part_no'];
    $edit_part_name = $_POST['edit_part_name'];
    // $edit_user_mail_approval = $_POST['edit_user_mail_approval'];
    // $edit_user_mail_unusual_category = $_POST['edit_user_mail_unusual_category'];
    // $edit_user_mail_unusual_trend = $_POST['edit_user_mail_unusual_trend'];
    $sig = $_COOKIE['username'];


    if (isset($_POST['edit_user_mail_approval'])) {
        // code...
        $edit_user_mail_approval = $_POST['edit_user_mail_approval'];
    } else {
        $edit_user_mail_approval = [];
    }

    if (isset($_POST['edit_user_mail_unusual_category'])) {
        // code...
        $edit_user_mail_unusual_category = $_POST['edit_user_mail_unusual_category'];
    } else {
        $edit_user_mail_unusual_category = [];
    }

    if (isset($_POST['edit_user_mail_unusual_trend'])) {
        // code...
        $edit_user_mail_unusual_trend = $_POST['edit_user_mail_unusual_trend'];
    } else {
        $edit_user_mail_unusual_trend = [];
    }
    //get user_mail_approval
    $edit_user_mail_approval_send = '';
    foreach ($edit_user_mail_approval as $edit_user_mail_approval_eve) {
        if ($edit_user_mail_approval_send == '') {
            $edit_user_mail_approval_send = $edit_user_mail_approval_eve;
        } else {
            $edit_user_mail_approval_send = $edit_user_mail_approval_send . ';' . $edit_user_mail_approval_eve;
        }
    }


    //get edit_user_mail_unusual_category
    $edit_user_mail_unusual_category_send = '';
    foreach ($edit_user_mail_unusual_category as $edit_user_mail_unusual_category_eve) {
        if ($edit_user_mail_unusual_category_send == '') {
            $edit_user_mail_unusual_category_send = $edit_user_mail_unusual_category_eve;
        } else {
            $edit_user_mail_unusual_category_send = $edit_user_mail_unusual_category_send . ';' . $edit_user_mail_unusual_category_eve;
        }
    }

    //get edit_user_mail_unusual_trend
    $edit_user_mail_unusual_trend_send = '';
    foreach ($edit_user_mail_unusual_trend as $edit_user_mail_unusual_trend_eve) {
        if ($edit_user_mail_unusual_trend_send == '') {
            $edit_user_mail_unusual_trend_send = $edit_user_mail_unusual_trend_eve;
        } else {
            $edit_user_mail_unusual_trend_send = $edit_user_mail_unusual_trend_send . ';' . $edit_user_mail_unusual_trend_eve;
        }
    }

    if ($edit_id == '' || $edit_line == '' || $edit_product_family == '' || $edit_part_no == '' || $edit_part_name == '' || $edit_user_mail_approval_send == '') {
        echo "<script>warning();</script>";
        die();
    }
    $sqledit = "UPDATE `qc_tb_part_no` SET `line`= '$edit_line',`product_family`= '$edit_product_family',`part_no`= '$edit_part_no',`part_name`= '$edit_part_name',`user_mail_approval`= '$edit_user_mail_approval_send',`user_mail_unusual_category`= '$edit_user_mail_unusual_category_send',`user_mail_unusual_trend`= '$edit_user_mail_unusual_trend_send', `sig`= '$sig' WHERE `id` = '$edit_id'";
    if (mysqli_query($connect, $sqledit)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code'</script>";
    }
} else if (isset($_POST["delete_product"])) {
    $del_id = $_POST['del_id'];

    $sqldelete = "DELETE FROM `qc_tb_part_no` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code'</script>";
    }
}

//Register line
else if (isset($_POST["register_line_function"])) {

    $product_family = $_POST['product_family_input'];
    $line = $_POST['line'];
    $sig = $_COOKIE['username'];

    if ($product_family == '' || $line == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqlregister_line = "INSERT INTO `qc_tb_line`(`product_family`, `line`, `sig`) VALUES ('$product_family', '$line', '$sig')";
    if (mysqli_query($connect, $sqlregister_line)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line'</script>";
    }
} else if (isset($_POST["edit_line_function"])) {

    $id_edit = $_POST['edit_id'];
    $product_family_edit = $_POST['edit_product_family_input'];
    $line_edit = $_POST['edit_line_input'];
    $sig_edit = $_COOKIE['username'];

    if ($line_edit == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqledit_line = "UPDATE `qc_tb_line` SET `product_family` = '$product_family_edit',`line` = '$line_edit', `sig`= '$sig_edit' WHERE `id` = '$id_edit'";
    if (mysqli_query($connect, $sqledit_line)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line'</script>";
    }
} else if (isset($_POST["delete_line_function"])) {

    $del_id = $_POST['del_id'];

    $sqldelete = "DELETE FROM `qc_tb_line` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line'</script>";
    }
}

//register number machine
else if (isset($_POST["register_number_machine_function"])) {

    $line = $_POST['line'];
    $process = $_POST['process'];
    $number_machine = $_POST['number_machine'];
    $sig = $_COOKIE['username'];

    if ($line == '' || $process == '' || $number_machine == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqlregister_number_machine = "INSERT INTO `qc_tb_machine_number`(`line`, `process`, `number_machine`, `sig`) VALUES ('$line', '$process', '$number_machine', '$sig')";
    if (mysqli_query($connect, $sqlregister_number_machine)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine'</script>";
    }
} else if (isset($_POST["edit_number_machine_function"])) {

    $edit_id = $_POST['edit_id'];
    $edit_line = $_POST['edit_line_input'];
    $edit_process = $_POST['edit_process_input'];
    $edit_number_machine = $_POST['edit_number_machine_input'];
    $sig = $_COOKIE['username'];

    if ($edit_line == '' || $edit_process == '' || $edit_number_machine == '') {
        // echo "<script>warning();</script>";
        // die();
        print($edit_line . '<br>');
        print($edit_process . '<br>');
        print($edit_number_machine . '<br>');
    }

    $sqledit_number_machine = "UPDATE `qc_tb_machine_number` SET `line`='$edit_line',`process`='$edit_process',`number_machine`='$edit_number_machine',`sig`='$sig' WHERE `id` = '$edit_id'";
    if (mysqli_query($connect, $sqledit_number_machine)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine'</script>";
    }
} else if (isset($_POST["delete_number_machine_function"])) {

    $del_id = $_POST['del_id'];

    $sqldelete = "DELETE FROM `qc_tb_machine_number` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine'</script>";
    }
}

//register_measurment_items_name
else if (isset($_POST["register_measurement_items_name_function"])) {

    $product_family_input = $_POST['product_family_input'];
    $part_no_input = $_POST['part_no_input'];
    $line_input = $_POST['line_input'];
    $process_input = $_POST['process_input'];
    $measurment_items_name_input = $_POST['measurment_items_name_input'];
    $sig = $_COOKIE['username'];

    if ($product_family_input == '' || $part_no_input == '' || $part_no_input == 'Không có mã sản phẩm nào theo dòng sản phẩm' || $line_input == '' || $process_input == '' || $process_input == 'Không có công đoạn nào theo line' || $measurment_items_name_input == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqlregister_measurement_items_name = "INSERT INTO `qc_tb_measurement_items_name`(`product_family`, `part_no`, `line`, `process`, `measurement_items`, `sig`) VALUES ('$product_family_input', '$part_no_input', '$line_input', '$process_input', '$measurment_items_name_input', '$sig')";
    if (mysqli_query($connect, $sqlregister_measurement_items_name)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurment_items_name'</script>";
    }
} else if (isset($_POST["edit_measurement_items_name_function"])) {

    $id_edit = $_POST['edit_id'];
    $product_family_edit = $_POST['product_family_edit'];
    $part_no_edit = $_POST['part_no_edit'];
    $line_edit = $_POST['line_edit'];
    $process_edit = $_POST['process_edit'];
    $measurment_items_name_edit = $_POST['measurment_items_name_edit'];
    $sig = $_COOKIE['username'];

    if ($product_family_edit == '' || $part_no_edit == '' || $part_no_edit == 'Không có mã sản phẩm nào theo dòng sản phẩm' || $line_edit == '' || $process_edit == '' || $process_edit == 'Không có công đoạn nào theo line' || $measurment_items_name_edit == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqledit_measurement_items_name = "UPDATE `qc_tb_measurement_items_name` SET `product_family`='$product_family_edit',`part_no`='$part_no_edit',`line`='$line_edit',`process`='$process_edit',`measurement_items`='$measurment_items_name_edit',`sig`='$sig' WHERE `id` = '$id_edit'";
    if (mysqli_query($connect, $sqledit_measurement_items_name)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurment_items_name'</script>";
    }
} else if (isset($_POST["delete_measurement_items_name_function"])) {
    $del_id = $_POST['del_id'];

    $sqldelete = "DELETE FROM `qc_tb_measurement_items_name` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurment_items_name'</script>";
    }
}

//register frequency
else if (isset($_POST["register_frequency_function"])) {

    $frequency_input = $_POST['frequency_input'];
    $quantity_input = $_POST['quantity_input'];
    $unit_time_input = $_POST['unit_time_input'];
    $sig = $_COOKIE['username'];

    if ($frequency_input == '' || $quantity_input == '' || $unit_time_input == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqlregister_frequency = "INSERT INTO `qc_tb_frequency`(`frequency_name`, `quantity`, `unit_time`, `sig`) VALUES ('$frequency_input', '$quantity_input', '$unit_time_input', '$sig')";
    if (mysqli_query($connect, $sqlregister_frequency)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency'</script>";
    }
} else if (isset($_POST["edit_frequency_function"])) {
    $id_edit = $_POST['edit_id'];
    $frequency_edit = $_POST['frequency_edit'];
    $quantity_edit = $_POST['quantity_edit'];
    $unit_time_edit = $_POST['unit_time_edit'];
    $sig = $_COOKIE['username'];

    if ($frequency_edit == '' || $quantity_edit == '' || $unit_time_edit == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqledit_frequency = "UPDATE `qc_tb_frequency` SET `frequency_name`='$frequency_edit',`quantity`='$quantity_edit',`unit_time`='$unit_time_edit', `sig`='$sig' WHERE `id` = '$id_edit'";
    if (mysqli_query($connect, $sqledit_frequency)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency'</script>";
    }
} else if (isset($_POST["delete_frequency_function"])) {

    $del_id = $_POST['del_id'];

    $sqldelete = "DELETE FROM `qc_tb_frequency` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency'</script>";
    }
}

//register_measurement_items
else if (isset($_POST["register_measurement_items_function"])) {

    $product_family_input = $_POST['product_family_input'];
    $line_input = $_POST['line_input'];
    $part_no_input = $_POST['part_no_input'];
    $process_input = $_POST['process_input'];

    $chart_input = $_POST['chart_input'];
    $measuring_department_input = $_POST['measuring_department_input'];
    $no_measurment_items_input = $_POST['no_measurment_items_input'];
    $measurement_items_input = $_POST['measurement_items_input'];

    $form_input = $_POST['form_input'];
    $frequency_input = $_POST['frequency_input'];
    $measuring_tools_input = $_POST['measuring_tools_input'];
    $allowance_display_input = $_POST['allowance_display_input'];

    $x_ucl_input = $_POST['x_ucl_input'];
    $x_cl_input = $_POST['x_cl_input'];
    $x_lcl_input = $_POST['x_lcl_input'];
    $r_ucl_input = $_POST['r_ucl_input'];
    $r_cl_input = $_POST['r_cl_input'];

    $type_allowance_input = $_POST['type_allowance_input'];
    $standard_dimension_input = $_POST['standard_dimension_input'];
    $upper_input = $_POST['upper_input'];
    $lower_input = $_POST['lower_input'];
    $unit_input = $_POST['unit_input'];


    $use_formula_input = $_POST['use_formula_input'];
    $type_formula_input = $_POST['type_formula_input'];
    $number_element_input = $_POST['number_element_input'];
    $formula_input = $_POST['formula_input'];

    $definition_formula_input_one = $_POST['definition_formula_input_one'];
    $definition_formula_input_two = $_POST['definition_formula_input_two'];
    $definition_formula_input_three = $_POST['definition_formula_input_three'];
    $definition_formula_input_four = $_POST['definition_formula_input_four'];
    $definition_formula_input_five = $_POST['definition_formula_input_five'];
    $definition_formula_input_six = $_POST['definition_formula_input_six'];
    $definition_formula_input_seven = $_POST['definition_formula_input_seven'];
    $definition_formula_input_eight = $_POST['definition_formula_input_eight'];
    $definition_formula_input_nine = $_POST['definition_formula_input_nine'];
    $definition_formula_input_ten = $_POST['definition_formula_input_ten'];

    $definition_formula_input = $definition_formula_input_one . ';' . $definition_formula_input_two . ';' . $definition_formula_input_three . ';' . $definition_formula_input_four . ';' . $definition_formula_input_five . ';' . $definition_formula_input_six . ';' . $definition_formula_input_seven . ';' . $definition_formula_input_eight . ';' . $definition_formula_input_nine . ';' . $definition_formula_input_ten;


    // name of the uploaded file
    $management_level_one = $_FILES['management_level_one_input']['name'];
    $management_level_two = $_FILES['management_level_two_input']['name'];
    $draw = $_FILES['draw_input']['name'];

    $file_name_management_level_one = $no_measurment_items_input . '-' . $management_level_one;
    $file_name_management_level_two = $no_measurment_items_input . '-' . $management_level_two;
    $file_name_draw = $no_measurment_items_input . '-' . $draw;
    // destination of the file on the server
    $destination_management_level_one = 'projects/qc/views/default/qc_imgs/' . $file_name_management_level_one;
    $destination_management_level_two = 'projects/qc/views/default/qc_imgs/' . $file_name_management_level_two;
    $destination_draw = 'projects/qc/views/default/qc_imgs/' . $file_name_draw;

    // get the file extension
    $extension_management_level_one = pathinfo($management_level_one, PATHINFO_EXTENSION);
    $extension_management_level_two = pathinfo($management_level_two, PATHINFO_EXTENSION);
    $extension_draw = pathinfo($draw, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file_management_level_one = $_FILES['management_level_one_input']['tmp_name'];
    $size_management_level_one = $_FILES['management_level_one_input']['size'] / 1024;
    $size_show_management_level_one = $size_management_level_one / 1024;

    $file_management_level_two = $_FILES['management_level_two_input']['tmp_name'];
    $size_management_level_two = $_FILES['management_level_two_input']['size'] / 1024;
    $size_show_management_level_two = $size_management_level_two / 1024;

    $file_draw = $_FILES['draw_input']['tmp_name'];
    $size_draw = $_FILES['draw_input']['size'] / 1024;
    $size_show_draw = $size_draw / 1024;

    $sig = $_COOKIE['username'];

    // print("1 product_family: " . $product_family_input . "<br>");
    // print("2 part_no: " . $part_no_input . "<br>");
    // print("3 process: " . $process_input . "<br>");
    // print("4 line: " . $line_input . "<br>");
    // print("5 measurement_items: " . $measurement_items_input . "<br>");
    // print("6 frequency: " . $frequency_input . "<br>");
    // print("7 measuring_tools: " . $measuring_tools_input . "<br>");
    // print("8 standard_dimension: " . $standard_dimension_input . "<br>");
    // print("9 upper: " . $upper_input . "<br>");
    // print("10 lower: " . $lower_input . "<br>");
    // print("11 unit: " . $unit_input . "<br>");
    // print("12 type_allowance: " . $type_allowance_input . "<br>");
    // print("13 form: " . $form_input . "<br>");
    // print("14 x_ucl: " . $x_ucl_input . "<br>");
    // print("15 x_cl: " . $x_cl_input . "<br>");
    // print("16 x_lcl: " . $x_lcl_input . "<br>");
    // print("17 r_ucl: " . $r_ucl_input . "<br>");
    // print("18 r_cl: " . $r_cl_input . "<br>");
    // print("19 use_formula: " . $use_formula_input . "<br>");
    // print("20 type_formula: " . $type_formula_input . "<br>");
    // print("21 number_element: " . $number_element_input . "<br>");
    // print("22 definition_formula: " . $definition_formula_input . "<br>");
    // print("23 formula: " . $formula_input . "<br>");
    // print("24 allowance_display: " . $allowance_display_input . "<br>");
    // print("25 chart: " . $chart_input . "<br>");
    // print("26 management_level_one: " . $file_name_management_level_one . "<br>");
    // print("27 no_measurement_items: " . $no_measurment_items_input . "<br>");
    // print("28 measuring_department: " . $measuring_department_input . "<br>");
    // print("29 status: " . "/" . "<br>");
    // print("30 management_level_two: " . $file_name_management_level_two . "<br>");
    // print("31 draw: " . $file_name_draw . "<br>");
    // print("32 sig: " . $sig . "<br>");

    if (
        $product_family_input == '' || $part_no_input == '' || $process_input == '' || $line_input == '' || $measurement_items_input == '' || $frequency_input == '' || $measuring_tools_input = '' ||
        $standard_dimension_input == '' || $unit_input == '' || $type_allowance_input == '' || $form_input == '' || $chart_input == '' || $file_name_management_level_one == '' || $file_name_management_level_two == ''
        || $file_name_draw == '' || $no_measurment_items_input == '' || $measuring_department_input == ''
    ) {
        echo "<script>warning();</script>";
        die();
    } else {
        if (!in_array($extension_management_level_one, ['png', 'jpg', 'jpeg']) || !in_array($extension_management_level_two, ['png', 'jpg', 'jpeg']) || !in_array($extension_draw, ['png', 'jpg', 'jpeg'])) {
            echo "<script>warning();</script>";
            // echo 'You file extension must be .zip, .pdf, .docx, .jpg and .png';
        } else if ($size_management_level_one > 6000 || $size_management_level_two > 6000 || $size_draw > 6000) {
            echo "<script>warning();</script>";
            // file shouldn't be larger than 1Megabyte
            // echo "File too large!";

        } else {
            if (move_uploaded_file($file_management_level_one, $destination_management_level_one) && move_uploaded_file($file_management_level_two, $destination_management_level_two) && move_uploaded_file($file_draw, $destination_draw)) {
                $sqlregister_measurement_items = "INSERT INTO `qc_tb_measurement_items`(`product_family`, `part_no`, `process`, `line`, `measurement_items`, `frequency`,
                `measuring_tools`, `standard_dimension`, `upper`, `lower`, `unit`, `type_allowance`, `form`, `x_ucl`, `x_cl`, `x_lcl`, `r_ucl`, `r_cl`, `use_formula`, 
                `type_formula`, `number_element`, `definition_formula`, `formula`, `allowance_display`, `chart`, `management_level_one`, `no_measurement_items`, 
                `measuring_department`, `management_level_two`, `draw`, `sig`) VALUES ('$product_family_input', '$part_no_input', '$process_input', '$line_input', 
                '$measurement_items_input', '$frequency_input', '$measuring_tools_input', '$standard_dimension_input', '$upper_input', '$lower_input', '$unit_input', '$type_allowance_input', '$form_input',
                '$x_ucl_input', '$x_cl_input', '$x_lcl_input', '$r_ucl_input', '$r_cl_input', '$use_formula_input', '$type_formula_input', '$number_element_input', '$definition_formula_input',
                '$formula_input', '$allowance_display_input', '$chart_input', '$destination_management_level_one', '$no_measurment_items_input', '$measuring_department_input', '$destination_management_level_two', '$destination_draw',
                '$sig')";

                if (mysqli_query($connect, $sqlregister_measurement_items)) {
                    mysqli_close($connect);
                    echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurment_items'</script>";
                }
            } else {
                echo "<script>warning();</script>";
            }
        }
    }
}