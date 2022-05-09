<?php


function add_data_time_one_row($td_count, $array_data, $index, $position_in_tb, $lenght)
{

    for ($i = 0; $i < $td_count; $i++) {
        if ($i < count($array_data)) {
            $data_manu = substr($array_data[$i][$index], $position_in_tb, $lenght);
            echo '<td style="width:auto">' . $data_manu . '</td>';
        } else {
            echo '<td style="width:auto"></td>';
        }
    }
}
?>

<?php

function sign_day($data_tb, $data_tb_sign, $data_account)
{
    $count_sign_day = 0;
    $button_sign_day = 0; //Vị trí bắt đầu set ô rỗng khi giá trị trước chưa được duyệt
    for ($i = 0; $i < 30; $i++) {
        // echo '<td style="width:auto"></td>';
        if ($i < count($data_tb)) {
            $data_sign_day_flag = false;
            for ($y = 0; $y < count($data_tb_sign); $y++) {
                # code...
                if ($data_tb_sign[$y][1] == $data_tb[$i][1]) {

                    for ($z = 0; $z < count($data_account); $z++) {
                        # code...
                        if ($data_tb_sign[$y][2] == $data_account[$z][1]) {
                            echo '<td style="max-width: 15px; font-size:60%;overflow: hidden;
                                                        text-overflow: ellipsis; ">' . write_name($data_account[$z][2]) . '</td>';
                            $count_sign_day++;
                            $data_sign_day_flag = true;
                            break;
                        }
                    }
                }
            }
            if ($data_sign_day_flag == false) {
                echo '<td style="max-width: 15px; font-size:60%;overflow: hidden;
                                            text-overflow: ellipsis; "><i style="cursor: pointer;" class="fas fa-edit" onclick="sign_day_confirm_function(' . '\'' . $data_tb[$i][1] . '\'' . ',' . '\'' . $data_tb[$i][17] . '\'' . ')"></i></td>';
                $button_sign_day++; // tính giá trị vị trí ghi fx comfirm sign day
                break; //ngắt khi có 1 giá trị chưa được duyệt phía trước sẽ ko cho duyệt giá trị phía sau
            }
            // else{
            //     echo '<td style="width:auto"></td>';
            // }
        }
    }
    //điền ô rỗng còn lại cho đủ 30 giá trị khi đã cộng 1 vị trí button sign day
    for ($i = $count_sign_day + $button_sign_day; $i < 30; $i++) {
        echo '<td style="width:auto"></td>';
    }
}


?>
<?php
function sign_week($data_tb, $data_tb_sign, $data_account)
{
    $count_sign_day_sv = 0;
    $count_sign_week = 0;
    $last_sign_week = 0;
    $button_sign_week = 0;
    $arr_sub_id_week = array();
    for ($i = 0; $i < 30; $i++) {
        if ($i < count($data_tb)) {
            $last_sign_week = $i + 1;
            $data_sign_week_flag = false;
            for ($y = 0; $y < count($data_tb_sign); $y++) {
                if ($data_tb_sign[$y][1] == $data_tb[$i][1] && $data_tb_sign[$y][2] != '' && $data_tb_sign[$y][3] != '') {
                    $count_sign_day_sv++;
                    for ($z = 0; $z < count($data_account); $z++) {
                        # code...
                        if ($data_tb_sign[$y][3] == $data_account[$z][1]) {
                            echo '<td style="max-width: 15px; font-size: 60%;overflow: hidden;
                                                        text-overflow: ellipsis; ">' . write_name($data_account[$z][2]) . '</td>';
                            $data_sign_week_flag = true;
                            break;
                        }
                    }
                } else if ($data_tb_sign[$y][1] == $data_tb[$i][1] && $data_tb_sign[$y][2] != '' && $data_tb_sign[$y][3] == '') {
                    $count_sign_week++;
                    // $count_sign_day_sv++;
                }
                // else if($data_tb_sign[$y][2] != ''){
                //     $count_sign_day_sv++;
                // }


                // else if($data_tb_sign[$y][3] == ''){
                //     $count_sign_week++;
                // }
            }
            if ($data_sign_week_flag == false) {

                if ($count_sign_week % 7 == 0 && $count_sign_week != 0 || count($data_tb) == 30 && $count_sign_week == 2 && $count_sign_day_sv == 28) {
                    $button_sign_week++;
                    array_push($arr_sub_id_week, $data_tb[$i][1]);
                    $send_sub_id_week = "";
                    // $send_sub_id_week_tmp = "";
                    for ($t = 0; $t < count($arr_sub_id_week); $t++) {
                        $send_sub_id_week = $send_sub_id_week . '\'' . $arr_sub_id_week[$t] . '\',';
                    }

                    // $send_sub_id_week = count($arr_sub_id_week) . ',' .  $send_sub_id_week_tmp;
                    // print($send_sub_id_week);
                    echo '<td style="max-width: 15px; font-size: 60%;overflow: hidden;
                                            text-overflow: ellipsis; "><i style="cursor: pointer;" class="fas fa-edit" onclick="sign_week_confirm_function(' . $send_sub_id_week . ')"></i></td>';
                    break;
                } else {
                    array_push($arr_sub_id_week, $data_tb[$i][1]);
                    echo '<td style="width:auto"></td>';
                }
                // echo '<td style="width:auto">'.$count_sign_week.'</td>';
            }
        }
    }
    // print($count_sign_day_sv);
    for ($i = $last_sign_week + $button_sign_week; $i < 30; $i++) {
        # code...
        echo '<td style="width:auto"></td>';
    }
}


?>
