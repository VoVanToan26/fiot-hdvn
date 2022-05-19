<form id="form_MIN_info_edit" name="form_MIN_info_edit" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items"; ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="edit_measurement_items_modal" tabindex="-1" role="dialog" aria-labelledby="exadd_measurement_items" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <input type="hidden" id="id_edit" name="id_edit" value="true">
                <div class="modal-header">
                    <h5 class="modal-title" id="exadd_measurement_items">Sửa thông tin đăng ký hạng mục đo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Form header info -->
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-3">

                            <label for="product_family_edit" class="col-form-label">Dòng Sản Phẩm</label>
                            <select required class="form-control" id="product_family_edit" name="product_family_edit" onchange="auto_popup_line('edit');">
                                <option value="">Chọn dòng sản phẩm</option>
                                <option value="Coil">Coil</option>
                                <option value="Valve">Valve</option>
                                <option value="Sensor">Sensor</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group col-3">
                            <label for="line_edit" class="col-form-label">Line</label>
                            <select required class="form-control" id="line_edit" name="line_edit" onchange="auto_popup_part_no('edit');">
                                <option value="">Vui lòng chọn dòng sản phẩm trước</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="part_no_edit" class="col-form-label">Mã Sản Phẩm</label>
                            <select required class="form-control" id="part_no_edit" name="part_no_edit" onchange="auto_popup_process('edit');">
                                <option value="">Vui lòng chọn line trước</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="process_edit" class="col-form-label">Công Đoạn</label>
                            <select required class="form-control" id="process_edit" name="process_edit" onchange="auto_popup_measurement_items('edit');">
                                <option value="">Vui lòng chọn công đoạn trước</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <div class="row">
                                <!-- Dropzonre begin -->
                                <div class="col-12">
                                    <div class="">
                                        <label for="management_level_edit" class="col-form-label">Cấp độ quản lý</label><br>
                                        <select class="form-control select2" style="width:100%" id="management_level_edit" name="management_level_edit[]" multiple aria-placeholder="Chọn hình ảnh">
                                            <!-- <option value="">Select Username</option> -->
                                            <?php
                                            for ($i = 0; $i < count($data_management_level); $i++) {
                                                echo '<option value="' . $data_management_level[$i][1] . '">' . $data_management_level[$i][2] . '';
                                            }


                                            ?>
                                        </select>
                                        <small id="management_level_edit_err" class="invalid-feedback">Không để trống</small>
                                    </div>
                                </div>
                                <!-- dropzone end -->
                                <div class="col-6">
                                    <label for="" class="col-form-label">Bản Vẽ</label>
                                    <div class="row" style="border-style: ridge; border-width: 1px; border-color: #808080;">
                                        <div class="col-3">
                                            <div class="custom-file symbol-class" style="width: 100%;">
                                                <input type="file" id="draw_edit" name="draw_edit" accept=".jpg,.jpeg,.png" >
                                                <input type="hidden" id="draw_edit_check" name="draw_edit_check" value='no_change'>
                                                <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                                                <label for="draw_edit" class="col-form-label custom-label" style="border: none; cursor:pointer;padding-left:0;">
                                                    <i class="fa fa-upload"></i>
                                                    Bản vẽ-1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <img src="#" alt="" id="img-draw_edit" style="display:none; height: 38px; max-width:60px;">
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <a href="JavaScript:void(0);" onclick="clearSymbol('img-draw_edit');">
                                                <i class="fa fa-trash" aria-hidden="true"> </i>
                                                Xóa
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <small class="form-text text-muted">Vui lòng chọn file có định dạng ".jpg,.jpeg, .png".
                                        Dung lượng không được vượt quá 5mb và không chứa các ký tự đặc biệt, dấu cách
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="chart_edit" class="col-form-label">Biểu Đồ</label>
                            <select required class="form-control" id="chart_edit" name="chart_edit" onchange="chart_input_change('edit')">
                                <option value="">Chọn loại biểu đồ</option>
                                <option value="Biểu đồ điều tra năng lực công đoạn">Biểu đồ điều tra năng lực công
                                    đoạn</option>
                                <option value="Biểu đồ quản lý">Biểu đồ quản lý</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="measuring_department_edit" class="col-form-label">Bộ Phận Đo</label>
                            <select required class="form-control" id="measuring_department_edit" name="measuring_department_edit">
                                <option value="">Chọn bộ phận đo</option>
                                <option value="QC">QC</option>
                                <option value="PI">PI</option>
                                <option value="RE">RE</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="no_measurement_items_edit" class="col-form-label">No. Hạng Mục</label>
                            <input required type="text" class="form-control" id="no_measurement_items_edit" name="no_measurement_items_edit" value="<?php echo ($data_measurement_items[0][0] + 1); ?>" readonly>
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="measurement_items_edit" class="col-form-label">Hạng Mục Đo</label>
                            <select required class="form-control" id="measurement_items_edit" name="measurement_items_edit">
                                <option value="">Vui lòng chọn công đoạn trước</option>
                            </select>
                            <small class="invalid-feedback " id="measurement_items_edit_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-3">
                            <label for="form_edit" class="col-form-label">Form</label>
                            <select required class="form-control" id="form_edit" name="form_edit" onchange="form_input_change('edit')">
                                <option value="">Chọn form</option>
                                <!-- <option value="Datasheet">Datasheet</option>
                                    <option value="Checksheet">Checksheet</option>
                                    <option value="Xbar-R">Xbar-R</option>
                                    <option value="X-R">X-R</option>
                                    <option value="X-Rs">X-Rs</option> -->
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="frequency_edit" class="col-form-label">Tần Suất</label>
                            <select required class="form-control" id="frequency_edit" name="frequency_edit">
                                <option value="">Chọn tần suất</option>
                                <?php
                                for ($i = 0; $i < count($data_frequency); $i++) {
                                    // code...
                                    echo '<option value="' . $data_frequency[$i] . '">' . $data_frequency[$i] .  '</option>';
                                }
                                ?>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="measuring_tools_edit" class="col-form-label">Dụng Cụ Đo</label>
                            <select required class="form-control" id="measuring_tools_edit" name="measuring_tools_edit">
                                <option value="">Chọn dụng cụ đo</option>
                                <?php
                                for ($i = 0; $i < count($data_measuring_tools); $i++) {
                                    // code...
                                    echo '<option value="' . $data_measuring_tools[$i] . '"> ' . $data_measuring_tools[$i] .  ' </option>';
                                }
                                ?>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col-3">
                            <label for="allowance_display_edit" class="col-form-label">Dung Sai Hiển Thị (ф π θ ≥ ≤ ±) </label>
                            <input required type="text" class="form-control" id="allowance_display_edit" name="allowance_display_edit" maxlength="200" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                        </div>
                    </div>

                    <!-- end row 4 -->


                    <!-- form_MIN_info  name=""end -->

                    <div class="row x_ucl_form_edit bordered">
                        <div class="form-group col">
                            <label for="x_ucl_edit" class="col-form-label">X-UCL</label>
                            <input type="number" class="form-control  change-required" id="x_ucl_edit" name="x_ucl_edit" step='0.00001' max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group col">
                            <label for="x_cl_edit" class="col-form-label">X-CL</label>
                            <input type="number" step='0.00001' class="form-control  change-required" id="x_cl_edit" name="x_cl_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                        </div>
                        <div class="form-group col">
                            <label for="x_lcl_edit" class="col-form-label">X-LCL</label>
                            <input type="number" step='0.00001' class="form-control  change-required" id="x_lcl_edit" name="x_lcl_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                        </div>
                        <div class="form-group col">
                            <label for="r_ucl_edit" class="col-form-label">R-UCL</label>
                            <input type="number" step='0.00001' class="form-control change-required" id="r_ucl_edit" name="r_ucl_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                        </div>
                        <div class="form-group col">
                            <label for="r_cl_edit" class="col-form-label">R-CL</label>
                            <input type="number" step='0.00001' class="form-control  change-required" id="r_cl_edit" name="r_cl_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                        </div>

                    </div>

                    <!-- Form UCL end -->
                    <div class="row tolerance_form_edit">
                        <div class="form-group col select_tolerance_form_edit col">
                            <label for="type_allowance_edit" class="col-form-label">Loại Quy Cách</label>
                            <select required class="form-control" id="type_allowance_edit" name="type_allowance_edit" maxlength="200" autocomplete="off" onchange="type_allowance_input_change('edit')">
                                <option value="">Chọn loại quy cách</option>
                                <option value="±">±</option>
                                <option value="Min">Min</option>
                                <option value="Max">Max</option>
                                <option value="OK/NG">OK/NG</option>
                            </select>
                            <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>

                        </div>
                        <div class="form-group col standard_dimension_edit_form col ">
                            <label for="standard_dimension_edit" class="col-form-label">Kích Thước</label>
                            <input required type="number" step='0.00001' class="form-control change-required" id="standard_dimension_edit" name="standard_dimension_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Số liệu trống hoặc không đúng </small>


                        </div>
                        <div class="form-group col upper_edit_form col ">
                            <label for="upper_edit" class="col-form-label">Cận Trên</label>
                            <input required type="number" step='0.00001' class="form-control change-required" id="upper_edit" name="upper_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Số liệu trống hoặc không đúng</small>


                        </div>
                        <div class="form-group col lower_edit_form col ">
                            <label for="lower_edit" class="col-form-label">Cận Dưới</label>
                            <input required type="number" step='0.00001' class="form-control change-required" id="lower_edit" name="lower_edit" max="999999999" min="-999999999" autocomplete="off">
                            <small class="invalid-feedback " id="_err" name="_err">Số liệu trống hoặc không đúng</small>


                        </div>
                        <div class="form-group col unit_edit_form col ">
                            <label for="unit_edit" class="col-form-label">Đơn Vị (µm Ω)</label>
                            <input type="text" class="form-control" id="unit_edit" name="unit_edit" maxlength="200" autocomplete="off">
                            <!-- <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>-->
                        </div>

                        <div class="col-12 p-0 pl-3 row">
                            <small class="form-text text-muted">Vui lòng nhập kiểu dữ liệu là số thực và tối đa là 5 chữ số thập phân ở các mục <span class="font-weight-bold">X-UCL ; X-CL ; X-LCL ; R-UCL ;R-CL ;Kích Thước; Cận Trên; Cận Dưới;</span> </small>

                        </div>
                    </div>
                    <!-- Form tolerance end -->

                    <div class="row">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" type="checkbox" id="use_formula_edit" name="use_formula_edit" value="Yes" onclick="FormulaCb_function_edit()">
                                <label for="use_formula_edit" class="custom-control-label" id="use_formula_label">Có Sử Dụng Công Thức</label>
                            </div>
                        </div>
                    </div>
                    <div class="row form_formula_edit d-none">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="type_formula_edit" class="col-form-label">Chọn Dạng Công Thức</label>
                                    <select class="form-control change-required" id="type_formula_edit" name="type_formula_edit" onchange="type_formula_change_edit(); number_element_change('edit')">
                                        <option value='' selected="selected">Chọn dạng công thức</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Max-Min">Max-Min</option>
                                        <option value="Average">Average</option>
                                        <option value="Max">Max</option>
                                        <option value="Min">Min</option>
                                    </select>
                                    <small class="invalid-feedback " id="_err" name="">Vui lòng nhập đủ thông tin</small>
                                </div>
                                <div class="col-6 form-group number_element_edit_form">
                                    <label for="number_element_edit" class="col-form-label">Nhập Số Phần Tử</label>
                                    <input type="number" class="form-control change-required" id="number_element_edit" name="number_element_edit" max="10" min="1" value="1" onchange="number_element_change('edit');" readonly>
                                    <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin và giá trị (1÷10)</small>

                                </div>
                                <div class="col-12 form-group formula_edit_form">
                                    <label for="formula_edit" class="col-form-label">Công Thức</label>
                                    <div class="d-flex flex-row">
                                        <p class="w-25 text-center p-2"> A = </p>
                                        <input type="text" class="form-control w-75 change-required" id="formula_edit" name="formula_edit" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="formula_edit_err" name="formula_edit_err">Vui lòng nhập đủ thông tin</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 form-group table-responsive formula_info_form_edit">
                            <table class="table_formula_edit table table-bordered text-center mt-38">
                                <tr>
                                    <th class="h-38 w-50">Ký tự</th>
                                    <th class=" w-50">Ghi chú</th>
                                </tr>
                                <tr class="b_form">
                                    <td>B</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_one" name="definition_formula_edit_one" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                                    </td>
                                </tr>
                                <tr class="d-none c_form">
                                    <td>C</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_two" name="definition_formula_edit_two" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none d_form">
                                    <td>D</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_three" name="definition_formula_edit_three" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none e_form">
                                    <td>E</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_four" name="definition_formula_edit_four" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none f_form">
                                    <td>F</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_five" name="definition_formula_edit_five" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none g_form">
                                    <td>G</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_six" name="definition_formula_edit_six" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none h_form">
                                    <td>H</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_seven" name="definition_formula_edit_seven" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none i_form">
                                    <td>I</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_eight" name="definition_formula_edit_eight" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none j_form">
                                    <td>J</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_nine" name="definition_formula_edit_nine" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>


                                    </td>
                                </tr>
                                <tr class="d-none k_form">
                                    <td>K</td>
                                    <td><input type="text" class="form-control change-required" id="definition_formula_edit_ten" name="definition_formula_edit_ten" maxlength="200" autocomplete="off">
                                        <small class="invalid-feedback " id="_err" name="_err">Vui lòng nhập đủ thông tin</small>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <input value="true" id="edit_measurement_items_function" name="edit_measurement_items_function" hidden></input>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="measurement_btn_edit" class="btn btn-primary" onclick="edit_measurement_btn()">Sửa</button>
                    </div>
                </div>

            </div>

        </div>
    </div>

</form>