<?php

function check_duplicate($name, $table_name)
{
    $connect = $GLOBALS['connect'];
    $insert  = "SELECT * FROM" . "`" . $table_name . "`" . "WHERE `management_level_name`='" . $name . "'";
    // echo '<script>alert("'.$insert.'")</script> ';
    $result = mysqli_query($connect, $insert);
    $row = mysqli_num_rows($result);
    if ($row >= 1) return true;
    return false;
}
?>
<?php
$connect = $GLOBALS['connect'];
// <!-- Register product code -->
if (isset($_POST["register_product"])) {

    $line = trim($_POST['line_input']);
    $product_family = trim($_POST['product_family_input']);
    $part_no = trim($_POST['part_no_input']);
    $part_name = trim($_POST['part_name_input']);

    if (isset($_POST['user_mail_approval_input'])) {
        // code...

        $user_mail_approval = $_POST['user_mail_approval_input'];
    } else {
        $user_mail_approval = [];
    }
    if (isset($_POST['user_mail_approval_input'])) {
        // code...
        $user_mail_unusual_category = $_POST['user_mail_unusual_category_input'];
    } else {
        $user_mail_unusual_category = [];
    }

    if (isset($_POST['user_mail_approval_input'])) {
        // code...
        $user_mail_unusual_trend = $_POST['user_mail_unusual_trend_input'];
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

    $sqlregister = "INSERT INTO `qc_tb_part_no`(`line`, `product_family`, `part_no`, `part_name`, `user_mail_approval`, `user_mail_unusual_category`, `user_mail_unusual_trend`, `sig`) VALUES ('$line', '$product_family', '$part_no', '$part_name', '$user_mail_approval_send', '$user_mail_unusual_category_send', '$user_mail_unusual_trend_send', '$sig')";
    if (mysqli_query($connect, $sqlregister)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code'</script>";
    }
} else if (isset($_POST["edit_product"])) {
    $edit_id = trim($_POST['edit_id']);
    // Edit edit_line--> line_edit
    $edit_line = trim($_POST['line_edit']);

    $edit_product_family = trim($_POST['product_family_edit']);
    $edit_part_no = trim($_POST['part_no_edit']);
    $edit_part_name = trim($_POST['part_name_edit']);
    // $edit_user_mail_approval = trim($_POST['edit_user_mail_approval']);
    // $edit_user_mail_unusual_category = trim($_POST['edit_user_mail_unusual_category']);
    // $edit_user_mail_unusual_trend = trim($_POST['edit_user_mail_unusual_trend']);
    $sig = $_COOKIE['username'];


    if (isset($_POST['user_mail_approval_edit'])) {
        // code...
        $edit_user_mail_approval = $_POST['user_mail_approval_edit'];
    } else {
        $edit_user_mail_approval = [];
    }

    if (isset($_POST['user_mail_unusual_category_edit'])) {
        // code...
        $edit_user_mail_unusual_category = $_POST['user_mail_unusual_category_edit'];
    } else {
        $edit_user_mail_unusual_category = [];
    }

    if (isset($_POST['user_mail_unusual_trend_edit'])) {
        // code...
        $edit_user_mail_unusual_trend = $_POST['user_mail_unusual_trend_edit'];
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

    if ($edit_id == '' || $edit_line == '' || $edit_product_family == '' || $edit_part_no == '' || $edit_part_name == '') {
        echo "<script>warning();</script>";
        die();
    }

    $sqledit = "UPDATE `qc_tb_part_no` SET `line`= '$edit_line',`product_family`= '$edit_product_family',`part_no`= '$edit_part_no',`part_name`= '$edit_part_name',`user_mail_approval`= '$edit_user_mail_approval_send',`user_mail_unusual_category`= '$edit_user_mail_unusual_category_send',`user_mail_unusual_trend`= '$edit_user_mail_unusual_trend_send', `sig`= '$sig' WHERE `id` = '$edit_id'";
    if (mysqli_query($connect, $sqledit)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code'</script>";
    }
} else if (isset($_POST["delete_product"])) {
    $del_id = trim($_POST['del_id']);

    $sqldelete = "DELETE FROM `qc_tb_part_no` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code'</script>";
    }
}

//Register line
else if (isset($_POST["register_line_function"])) {
    $product_family = trim($_POST['product_family_input']);
    $line = trim($_POST['line']);
    $sig = $_COOKIE['username'];
    $sqlregister_line = "INSERT INTO `qc_tb_line`(`product_family`, `line`, `sig`) VALUES ('$product_family', '$line', '$sig')";
    if (mysqli_query($connect, $sqlregister_line)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line'</script>";
    }
} else if (isset($_POST["edit_line_function"])) {

    $id_edit = trim($_POST['edit_id']);
    $product_family_edit = trim($_POST['product_family_edit']);
    $line_edit = trim($_POST['line_edit']);
    $sig_edit = $_COOKIE['username'];
    $sqledit_line = "UPDATE `qc_tb_line` SET `product_family` = '$product_family_edit',`line` = '$line_edit', `sig`= '$sig_edit' WHERE `id` = '$id_edit'";
    if (mysqli_query($connect, $sqledit_line)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line'</script>";
    }
} else if (isset($_POST["delete_line_function"])) {

    $del_id = trim($_POST['del_id']);

    $sqldelete = "DELETE FROM `qc_tb_line` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line'</script>";
    }
}
//register number machine
else if (isset($_POST["register_number_machine_function"])) {
    $product_family = trim($_POST['product_family_input']);
    $line = trim($_POST['line_input']);
    $process = trim($_POST['process_input']);
    $number_machine = trim($_POST['number_machine_input']);
    $sig = $_COOKIE['username'];

    $sqlregister_number_machine = "INSERT INTO `qc_tb_machine_number`(`line`, `process`, `number_machine`, `sig`,`product_family`) VALUES ('$line', '$process', '$number_machine', '$sig','$product_family')";
    if (mysqli_query($connect, $sqlregister_number_machine)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine'</script>";
    }
} else if (isset($_POST["edit_number_machine_function"])) {
    $edit_product_family = trim($_POST['product_family_edit']);
    $edit_id = trim($_POST['edit_id']);
    $edit_line = trim($_POST['line_edit']);
    $edit_process = trim($_POST['process_edit']);
    $edit_number_machine = trim($_POST['number_machine_edit']);
    $sig = $_COOKIE['username'];
    // echo "<script>alert($edit_line , $process , '234234',$number_machine);</script>";
    // if ($edit_line == '' || $edit_process == '' || $edit_number_machine == '') {
    //     // echo "<script>warning();</script>";
    //     // die();
    //     print($edit_line . '<br>');
    //     print($edit_process . '<br>');
    //     print($edit_number_machine . '<br>');
    // }

    $sqledit_number_machine = "UPDATE `qc_tb_machine_number` SET `line`='$edit_line',`process`='$edit_process',`number_machine`='$edit_number_machine',`sig`='$sig' ,`product_family`='$edit_product_family' WHERE `id` = '$edit_id'";
    if (mysqli_query($connect, $sqledit_number_machine)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine'</script>";
    }
} else if (isset($_POST["delete_number_machine_function"])) {

    $del_id = trim($_POST['del_id']);

    $sqldelete = "DELETE FROM `qc_tb_machine_number` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine'</script>";
    }
}

//register_measurement_items_name
else if (isset($_POST["register_measurement_items_name_function"])) {

    $product_family_input = trim($_POST['product_family_input']);
    $part_no_input = trim($_POST['part_no_input']);
    $line_input = trim($_POST['line_input']);
    $process_input = trim($_POST['process_input']);
    $measurement_items_name_input = trim($_POST['measurement_items_name_input']);

    $sig = $_COOKIE['username'];

    $sqlregister_measurement_items_name = "INSERT INTO `qc_tb_measurement_items_name`(`product_family`, `part_no`, `line`, `process`, `measurement_items`, `sig`) VALUES ('$product_family_input', '$part_no_input', '$line_input', '$process_input', '$measurement_items_name_input', '$sig')";
    if (mysqli_query($connect, $sqlregister_measurement_items_name)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name'</script>";
    }
} else if (isset($_POST["edit_measurement_items_name_function"])) {

    $id_edit = trim($_POST['edit_id']);
    $product_family_edit = trim($_POST['product_family_edit']);
    $part_no_edit = trim($_POST['part_no_edit']);
    $line_edit = trim($_POST['line_edit']);
    $process_edit = trim($_POST['process_edit']);
    $measurement_items_name_edit = trim($_POST['measurement_items_name_edit']);
    $sig = $_COOKIE['username'];

    $sqledit_measurement_items_name = "UPDATE `qc_tb_measurement_items_name` SET `product_family`='$product_family_edit',`part_no`='$part_no_edit',`line`='$line_edit',`process`='$process_edit',`measurement_items`='$measurement_items_name_edit',`sig`='$sig' WHERE `id` = '$id_edit'";
    if (mysqli_query($connect, $sqledit_measurement_items_name)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name'</script>";
    }
} else if (isset($_POST["delete_measurement_items_name_function"])) {
    $del_id = trim($_POST['del_id']);

    $sqldelete = "DELETE FROM `qc_tb_measurement_items_name` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name'</script>";
    }
}

//register frequency
else if (isset($_POST["register_frequency_function"])) {

    $frequency_input = trim($_POST['frequency_input']);
    $quantity_input = trim($_POST['quantity_input']);
    $unit_time_input = trim($_POST['unit_time_input']);
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
    $id_edit = trim($_POST['edit_id']);
    $frequency_edit = trim($_POST['frequency_edit']);
    $quantity_edit = trim($_POST['quantity_edit']);
    $unit_time_edit = trim($_POST['unit_time_edit']);
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

    $del_id = trim($_POST['del_id']);

    $sqldelete = "DELETE FROM `qc_tb_frequency` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency'</script>";
    }
}

//register_measurement_items
else if (isset($_POST["register_measurement_items_function"])) {

    $product_family_input = trim($_POST['product_family_input']);
    $line_input = trim($_POST['line_input']);
    $part_no_input = trim($_POST['part_no_input']);
    $process_input = trim($_POST['process_input']);

    $chart_input = trim($_POST['chart_input']);
    $measuring_department_input = trim($_POST['measuring_department_input']);
    $no_measurement_items_input = trim($_POST['no_measurement_items_input']);
    $measurement_items_input = trim($_POST['measurement_items_input']);

    $form_input = trim($_POST['form_input']);
    $frequency_input = trim($_POST['frequency_input']);
    $measuring_tools_input = trim($_POST['measuring_tools_input']);
    $allowance_display_input = trim($_POST['allowance_display_input']);

    // $x_ucl_input = $_POST['x_ucl_input'];

    // echo "<script>alert($x_ucl_input,typeof $x_ucl_input)</script>";
    $x_ucl_input = trim($_POST['x_ucl_input']);
    $x_cl_input = trim($_POST['x_cl_input']);
    $x_lcl_input = trim($_POST['x_lcl_input']);
    $r_ucl_input = trim($_POST['r_ucl_input']);
    $r_cl_input = trim($_POST['r_cl_input']);

    $type_allowance_input = trim($_POST['type_allowance_input']);
    $standard_dimension_input = trim($_POST['standard_dimension_input']);
    $upper_input = trim($_POST['upper_input']);
    $lower_input = trim($_POST['lower_input']);
    $unit_input = trim($_POST['unit_input']);


    $use_formula_input = trim($_POST['use_formula_input']);
    // echo "<script>alert($use_formula_input)</script>";
    if ($use_formula_input == "Yes") $use_formula_input = 'Yes';
    else $use_formula_input = 'No';
    $type_formula_input = trim($_POST['type_formula_input']);
    $number_element_input = trim($_POST['number_element_input']);
    $formula_input = trim($_POST['formula_input']);

    $keyWords = "BCDEFGHJK";

    $definition_formula_input[0] = $_POST['definition_formula_input_one'];
    $definition_formula_input[1] = $_POST['definition_formula_input_two'];
    $definition_formula_input[2] = $_POST['definition_formula_input_three'];
    $definition_formula_input[3] = $_POST['definition_formula_input_four'];
    $definition_formula_input[4] = $_POST['definition_formula_input_five'];
    $definition_formula_input[5] = $_POST['definition_formula_input_six'];
    $definition_formula_input[6] = $_POST['definition_formula_input_seven'];
    $definition_formula_input[7] = $_POST['definition_formula_input_eight'];
    $definition_formula_input[8] = $_POST['definition_formula_input_nine'];
    $definition_formula_input[9] = $_POST['definition_formula_input_ten'];

    // Xử lý công thức 
    for ($i = 0; $i < 10; $i++) {
        if ($definition_formula_input[$i] != '') {
            $definition_formula_input_result .= substr($keyWords, $i, 1) . ": " . $definition_formula_input[$i] . ";";
            // echo "<script>alert($definition_formula_input_result)</script>";
        }
    }
    // $definition_formula_input = $definition_formula_input_one . ';' . $definition_formula_input_two . ';' . $definition_formula_input_three . ';' . $definition_formula_input_four . ';' . $definition_formula_input_five . ';' . $definition_formula_input_six . ';' . $definition_formula_input_seven . ';' . $definition_formula_input_eight . ';' . $definition_formula_input_nine . ';' . $definition_formula_input_ten;
    // name of the uploaded file
    $management_level_one = $_FILES['management_level_one_input']['name'];
    $management_level_two = $_FILES['management_level_two_input']['name'];
    $draw = $_FILES['draw_input']['name'];

    $file_name_management_level_one = $no_measurement_items_input . '-' . '1' . '-' . $management_level_one;
    $file_name_management_level_two = $no_measurement_items_input . '-' . '2' . '-' . $management_level_two;
    $file_name_draw = $no_measurement_items_input . '-' . '3' . '-' . $draw;
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
    // print("27 no_measurement_items: " . $no_measurement_items_input . "<br>");
    // print("28 measuring_department: " . $measuring_department_input . "<br>");
    // print("29 status: " . "/" . "<br>");
    // print("30 management_level_two: " . $file_name_management_level_two . "<br>");
    // print("31 draw: " . $file_name_draw . "<br>");
    // print("32 sig: " . $sig . "<br>");

    if (
        $product_family_input == '' || $part_no_input == '' || $process_input == '' || $line_input == '' || $measurement_items_input == '' || $frequency_input == '' || $measuring_tools_input == '' ||
        $standard_dimension_input == '' || $unit_input == '' || $type_allowance_input == '' || $form_input == '' || $chart_input == '' || $file_name_management_level_one == '' || $file_name_management_level_two == ''
        || $file_name_draw == '' || $no_measurement_items_input == '' || $measuring_department_input == ''
    ) {
        echo "<script>alert('Thiếu dữ liệu! Vui lòng nhập lại ');</script>";
        die();
    } else {
        if (!in_array($extension_management_level_one, ['png', 'jpg', 'jpeg']) || !in_array($extension_management_level_two, ['png', 'jpg', 'jpeg']) || !in_array($extension_draw, ['png', 'jpg', 'jpeg'])) {
            echo "<script>alert('Sai định dạng ảnh');</script>";
            // echo 'You file extension must be .zip, .pdf, .docx, .jpg and .png';
        } else if ($size_management_level_one > 6000 || $size_management_level_two > 6000 || $size_draw > 6000) {
            echo "<script>alert('Dung lượng ảnh quá lớn');</script>";
            // file shouldn't be larger than 1Megabyte
            // echo "File too large!";

        } else {
            if (move_uploaded_file($file_management_level_one, $destination_management_level_one) && move_uploaded_file($file_management_level_two, $destination_management_level_two) && move_uploaded_file($file_draw, $destination_draw)) {
                $sqlregister_measurement_items = "INSERT INTO `qc_tb_measurement_items`(`product_family`, `part_no`, `process`, `line`, `measurement_items`, `frequency`,
                `measuring_tools`, `standard_dimension`, `upper`, `lower`, `unit`, `type_allowance`, `form`, `x_ucl`, `x_cl`, `x_lcl`, `r_ucl`, `r_cl`, `use_formula`, 
                `type_formula`, `number_element`, `definition_formula`, `formula`, `allowance_display`, `chart`, `management_level_one`, `no_measurement_items`, 
                `measuring_department`, `management_level_two`, `draw`, `sig`) VALUES ('$product_family_input', '$part_no_input', '$process_input', '$line_input', 
                '$measurement_items_input', '$frequency_input', '$measuring_tools_input', '$standard_dimension_input', '$upper_input', '$lower_input', '$unit_input', '$type_allowance_input', '$form_input',
                '$x_ucl_input', '$x_cl_input', '$x_lcl_input', '$r_ucl_input', '$r_cl_input', '$use_formula_input', '$type_formula_input', '$number_element_input', '$definition_formula_input_result',
                '$formula_input', '$allowance_display_input', '$chart_input', '$destination_management_level_one', '$no_measurement_items_input', '$measuring_department_input', '$destination_management_level_two', '$destination_draw',
                '$sig')";

                if (mysqli_query($connect, $sqlregister_measurement_items)) {
                    mysqli_close($connect);
                    echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items'</script>";
                }
            } else {
                echo "<script>warning();</script>";
            }
        }
    }
} else if (isset($_POST["delete_measurement_items_function"])) {

    $del_id = trim($_POST['del_id']);
    $sqldelete = "DELETE FROM `qc_tb_measurement_items` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items'</script>";
    }
}
//Register_special_case
else if (isset($_POST["register_special_case_function"])) {
    $special_case = trim($_POST['special_case_input']);
    $sig = $_COOKIE['username'];
    // if ($special_case== '') {
    //     echo "<script>warning();</script>";
    //     die();
    // }

    $sqlspecial_case = "INSERT INTO `qc_tb_special_case_measurement`(`special_case`, `sig`) VALUES ('$special_case', '$sig')";
    if (mysqli_query($connect, $sqlspecial_case)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement'</script>";
    }
} else if (isset($_POST["edit_special_case_function"])) {

    $id_edit = trim($_POST['edit_id']); //<input type="hidden"  name="edit_id")>
    $special_case_edit = trim($_POST['special_case_edit']);
    $sig_edit = $_COOKIE['username'];

    // if ($special_case_edit== '') {
    //     echo "<script>warning();</script>";
    //     die();
    // }
    $sqlspecial_case = "UPDATE `qc_tb_special_case_measurement` SET `special_case` = '$special_case_edit', `sig`= '$sig_edit' WHERE `id` = '$id_edit'";
    if (mysqli_query($connect, $sqlspecial_case)) {
        mysqli_close($connect);
        // Tải trang theo địa chỉ bên dưới
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement'</script>";
    }
} else if (isset($_POST["delete_special_case_function"])) {

    $del_id = trim($_POST['del_id']);

    $sqldelete = "DELETE FROM `qc_tb_special_case_measurement` WHERE `id` = '$del_id'";
    if (mysqli_query($connect, $sqldelete)) {
        mysqli_close($connect);
        echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement'</script>";
    }
}

// Toan 10.5 update new function 
else if (isset($_POST["register_management_level_function"])) {

    //  echo "<script>alert('" . $_POST . "');</script>";
    $sig = $_COOKIE['username'];
    // Count total uploaded files
    $totalfiles = count($_FILES['management_level_img_input']['name']);
    $destination = 'projects/qc/img-qc/img_management_level/';
        // echo "<script>alert('" . $totalfiles ."-". $filename. "-". $path."');</script>";

    // Looping over all files
    for ($i = 0; $i < $totalfiles; $i++) {
        $file = $_FILES["management_level_img_input"]["tmp_name"][$i];
        $filename = $_FILES['management_level_img_input']['name'][$i];
        $path =  $destination . $filename;
        // echo "<script>alert('" . $totalfiles ."-". $filename. "-". $path."');</script>";
        // Upload files and store in database
        $check=check_duplicate($filename, 'qc_tb_management_level');
  
        if (true) {
            if (move_uploaded_file($file,  $path)) {
        
                // Image db insert sql
                $insert  = "INSERT INTO `qc_tb_management_level`(`management_level_img`, `management_level_name`, `sig`) VALUES ('$path', '$filename', '$sig')";
                if (mysqli_query($connect, $insert)) {
                    echo 'Đăng ký thành công';
                } else {
                    echo 'Error: ' . mysqli_error($connect);
                }
            } else {
                echo "<script>alert('Error in uploading file - ' .  $file . '<br/>');</script>";;
            }
        } 
    }
    mysqli_close($connect);
    echo "<script>document.location = '" . dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_management_level'</script>";
} else if (isset($_POST["delete_management_level_function"])) {
}
?>


