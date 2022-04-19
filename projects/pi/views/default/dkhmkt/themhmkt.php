<style type="text/css">
    .symbol-class input[type='file'] {
        display: none;
    }

    .symbol-class label::after {
        display: none;
    }
</style>
<!-- Modal thêm sản phẩm -->
<div class="modal fade bd-example-modal-lg" id="themhangmuckiemtra" tabindex="-1" role="dialog" aria-labelledby="exthemhangmuckiemtra" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exthemhangmuckiemtra">Thông tin hạng mục kiểm tra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="no" class="col-sm-4 col-form-label">No.</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hang-muc-quan-ly" class="col-sm-4 col-form-label">Hạng mục quản lý</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div>
                                    <img src="#" alt="" id="img-symbol1" style="display:none; height: 38px;">
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="custom-file symbol-class" style="width: 100%;">
                                        <label for="symbol1" class="custom-file-label" style="border: none; cursor:pointer;padding-left:0;">
                                            <i class="fa fa-upload"></i>
                                            Hình-1
                                        </label>
                                        <input type="file" id="symbol1" accept=".jpg,.jpeg,.png">
                                    </div>
                                </div>
                                <div>
                                    <img src="#" alt="" id="img-symbol2" style="display:none; height: 38px;">
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="custom-file symbol-class" style="width: 100%;">
                                        <label for="symbol2" class="custom-file-label" style="border: none; cursor:pointer;padding-left:0;">
                                            <i class="fa fa-upload"></i>
                                            Hình-2
                                        </label>
                                        <input type="file" id="symbol2" accept=".jpg,.jpeg,.png">
                                    </div>
                                </div>

                                <!-- <button type="button" class="btn btn-outline-secondary" style="height: 38px;">Secondary</button> -->
                                <div class="col-sm-3 col-form-label">
                                    <a href="javasript:void()" onclick="clear_symbol();">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Xóa
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kich-thuoc-kiem-tra" class="col-sm-4 col-form-label">Kích thước kiểm tra</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kich-thuoc-kiem-tra" class="col-sm-4 col-form-label">Kích thước kiểm tra (hình ảnh)</label>
                        <div class="col-sm-4">
                            <div style="border: solid 1px #6c757d; border-radius:0.25rem; width:100%; height:38px;">
                                <img src="#" alt="" id="img-ktkt" style="display:none; height: 36px;">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="custom-file symbol-class" style="width: 100%;">
                                <label for="input-ktkt" class="custom-file-label" style="border: none; cursor:pointer;padding-left:0;">
                                    <i class="fa fa-upload"></i>
                                    Tải ảnh
                                </label>
                                <input type="file" id="input-ktkt" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                        <div class="col-sm-2 col-form-label">
                            <a href="#" onclick="clear_img_ktkt();">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Xóa
                            </a>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="phan-loai-danh-gia" class="col-sm-4 col-form-label">Phân loại đánh giá</label>
                        <div class="col-sm-4">
                            <select class="form-control ">
                                <option selected>Nhận xét</option>
                                <option value="1">Nhỏ hơn ~</option>
                                <option value="2">Nhỏ hơn hoặc bằng</option>
                                <option value="3">Lớn hơn hoặc bằng</option>
                                <option value="4">Lớn hơn ~</option>
                                <option value="5">Dung sai</option>
                                <option value="9">OK/NG</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="don-vi" class="col-sm-4 col-form-label">Đơn vị</label>
                        <div class="col-sm-2">
                            <!--  µm -->
                            <select class="form-control ">
                                <option selected>Load from database</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="loai-gia-tri" class="col-sm-4 col-form-label">Loại giá trị</label>
                        <div class="col-sm-4">
                            <select class="form-control ">
                                <option selected>Số thập phân</option>
                                <option value="1">Độ thập phân</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cndb-ky-han" class="col-sm-4 col-form-label">Chấp nhận đặc biệt</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option selected>Không</option>
                                <option value="1">Có kỳ hạn</option>
                                <option value="2">Khuôn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quy-cach" class="col-sm-4 col-form-label">Giá trị quy cách - text</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gia-tri-quy-cach" class="col-sm-4 col-form-label">Giá trị quy cách</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-2" style="text-align: center;">
                                    <label for="" class="col-form-label">~</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8" style="display: none;">
                            <input type="text" class="form-control">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="dung-cu-kiem-tra" class="col-sm-4 col-form-label">Dụng cụ kiểm tra</label>
                        <div class="col-sm-8">
                            <select class="form-control ">
                                <option selected>Load from database</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="so-luong-kiem-tra" class="col-sm-4 col-form-label">Số lượng kiểm tra</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Ví dụ: 1/L" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thoi-gian-kiem-tra" class="col-sm-4 col-form-label">Thời gian kiểm tra (giây)</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="them_hang_muc_kiem_tra();">Save</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function them_hang_muc_kiem_tra() {
        // console.log("them hang muc kiem tra");
        alert("Luu tru du lieu thanh cong");
    }
    $(function() {
        $("#symbol1").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#img-symbol1").attr("src", x);
            document.getElementById( 'img-symbol1' ).style.display = 'flex';
            // console.log(event);
        });
        $("#symbol2").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#img-symbol2").attr("src", x);
            document.getElementById( 'img-symbol2' ).style.display = 'flex';
            // console.log(event);
        });
        $("#input-ktkt").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#img-ktkt").attr("src", x);
            document.getElementById( 'img-ktkt' ).style.display = 'flex';
        });
    })

    function clear_symbol() {
        $("#img-symbol1").attr("src", "");
        $("#img-symbol2").attr("src", "");
        document.getElementById( 'img-symbol1' ).style.display = 'none';
        document.getElementById( 'img-symbol2' ).style.display = 'none';
    }

    function clear_img_ktkt() {
        $("#img-ktkt").attr("src", "");
        document.getElementById( 'img-ktkt' ).style.display = 'none';
    }
</script>