<style type="text/css">
    .symbol-class input[type='file'] {
        display: none;
    }

    .symbol-class label::after {
        display: none;
    }

    .custom-lable {
        font-weight: normal !important;
    }

    .quy-cach-2 {
        display: none;
    }

    .cndb {
        display: none;
    }

    .cndb-2 {
        display: none;
    }

    .ky-han-cndb {
        display: none;
    }
</style>
<!-- Modal thêm sản phẩm -->
<div class="modal fade bd-example-modal-lg" id="themhangmuckiemtra" tabindex="-1" role="dialog" aria-labelledby="exthemhangmuckiemtra" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exthemhangmuckiemtra">Thông tin hạng mục kiểm tra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Mã Assy/Sub Assy</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="maassy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Mã linh kiện</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="malinhkien">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">No.</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Hạng mục quản lý</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div>
                                            <img src="#" alt="" id="imgsymbol1" style="display:none; height: 38px;">
                                        </div>
                                        <div class="col-sm-3 ">
                                            <div class="custom-file symbol-class" style="width: 100%;">
                                                <label for="symbol1" class="col-form-label custom-lable" style="border: none; cursor:pointer;padding-left:0;">
                                                    <i class="fa fa-upload"></i>
                                                    Hình-1
                                                </label>
                                                <input type="file" id="symbol1" accept=".jpg,.jpeg,.png">
                                            </div>
                                        </div>
                                        <div>
                                            <img src="#" alt="" id="imgsymbol2" style="display:none; height: 38px;">
                                        </div>
                                        <div class="col-sm-3 ">
                                            <div class="custom-file symbol-class" style="width: 100%;">
                                                <label for="symbol2" class="col-form-label custom-lable" style="border: none; cursor:pointer;padding-left:0;">
                                                    <i class="fa fa-upload"></i>
                                                    Hình-2
                                                </label>
                                                <input type="file" id="symbol2" accept=".jpg,.jpeg,.png">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-form-label">
                                            <a href="JavaScript:void(0);" onclick="clearSymbol();">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                Xóa
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Kích thước kiểm tra</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kichthuockiemtra">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-4">
                                    <div style="border: solid 1px #6c757d; border-radius:0.25rem; width:100%; height:38px;">
                                        <img src="#" alt="" id="imgktkt" style="display:none; height: 36px;">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="custom-file symbol-class" style="width: 100%;">
                                        <label for="uploadimgktkt" class="col-form-label custom-lable" style="border: none; cursor:pointer;padding-left:0;">
                                            <i class="fa fa-upload"></i>
                                            Tải ảnh
                                        </label>
                                        <input type="file" id="uploadimgktkt" accept=".jpg,.jpeg,.png">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-form-label">
                                    <a href="JavaScript:void(0);" onclick="clearImgKtkt();">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Xóa
                                    </a>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Phân loại đánh giá</label>
                                <div class="col-sm-5">
                                    <select class="form-control" onchange="phanLoaiDanhGia()" id="phanloaidanhgia">
                                        <option value="0" selected>Nhận xét</option>
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
                                <label for="" class="col-sm-4 col-form-label">Đơn vị</label>
                                <div class="col-sm-4">
                                    <!--  µm -->
                                    <select class="form-control" onchange="donVi()" id="donvi">
                                        <option value="0" selected>Load from database</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Loại giá trị</label>
                                <div class="col-sm-4">
                                    <select class="form-control" onchange="loaiGiaTri()" id="loaigiatri">
                                        <option value="0" selected>Số thập phân</option>
                                        <option value="1">Độ thập phân</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Dụng cụ kiểm tra</label>
                                <div class="col-sm-8">
                                    <select class="form-control" onchange="dungCuKiemTra()" id="dungcukiemtra">
                                        <option value="0" selected>Load from database</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Số lượng kiểm tra</label>
                                <div class="col-sm-8 row">
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="Ví dụ: 1/L" class="form-control" id="soluongkiemtra" placeholder="Ví dụ: 1">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="donvitansuat">
                                            <option value="0" selected>Lot</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Thời gian kiểm tra</label>
                                <div class="col-sm-8 row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="thoigiankiemtra" placeholder="Ví dụ: 30">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="donvithoigian">
                                            <option value="0" selected>Giây</option>
                                            <option value="1">Phút</option>
                                            <option value="2">Giờ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-4" style="font-weight:bold;">Thành phần hạng mục</div>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="cboxRS" value="option1">
                                        <label class="form-check-label" for="cboxRS">R & S</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="cboxLR" value="option2">
                                        <label class="form-check-label" for="cboxLR">L & R</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Số lượng quy cách</label>
                                <div class="col-sm-4">
                                    <select class="form-control" onchange="soLuongQuyCach()" id="soluongquycach">
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Chấp nhận đặc biệt</label>
                                <div class="col-sm-4">
                                    <select class="form-control" onchange="chapNhanDacBiet()" id="chapnhandacbiet">
                                        <option value="0" selected>Không</option>
                                        <option value="1">Có kỳ hạn</option>
                                        <option value="2">Khuôn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ky-han-cndb">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Kỳ hạn CNĐB</label>
                                    <div class="col-sm-8 row">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="sokyhan" placeholder="Ví dụ: 1000">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="donvikyhan">
                                                <option value="0" selected>Ngày</option>
                                                <option value="1">PCS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- normal -->
                            <div class="quy-cach-1">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách - text</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="quycachtext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycachmin">
                                            </div>
                                            <div class="col-sm-2" style="text-align: center;">
                                                <label for="" class="col-form-label">~</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycachmax">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Mormal -->
                            <!-- CNDB -->
                            <div class="cndb">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách CNĐB - text</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="quycachcndbtext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách CNĐB</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycachcndbmin">
                                            </div>
                                            <div class="col-sm-2" style="text-align: center;">
                                                <label for="" class="col-form-label">~</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycachcndbmax">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end CNDB -->


                            <!-- normal 2 -->
                            <div class="quy-cach-2">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách 2 - text</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="quycach2text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách 2</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycach2min">
                                            </div>
                                            <div class="col-sm-2" style="text-align: center;">
                                                <label for="" class="col-form-label">~</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycach2max">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end normal 2 -->
                            <!-- CNDB 2 -->
                            <div class="cndb-2">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách 2 CNĐB - text</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="quycach2cndbtext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Quy cách 2 CNĐB</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycach2cndbmin">
                                            </div>
                                            <div class="col-sm-2" style="text-align: center;">
                                                <label for="" class="col-form-label">~</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="quycach2cndbmax">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end CNDB 2 -->
                        </div>


                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="themHangMucKiemTra();">Save</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function themHangMucKiemTra() {
        // console.log("them hang muc kiem tra");
        alert("Luu tru du lieu thanh cong");
    }
    $(function() {
        $("#symbol1").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#imgsymbol1").attr("src", x);
            document.getElementById('imgsymbol1').style.display = 'flex';
            // console.log(event);
        });
        $("#symbol2").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#imgsymbol2").attr("src", x);
            document.getElementById('imgsymbol2').style.display = 'flex';
            // console.log(event);
        });
        $("#uploadimgktkt").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#imgktkt").attr("src", x);
            document.getElementById('imgktkt').style.display = 'flex';
        });
    })

    function clearSymbol() {
        $("#imgsymbol1").attr("src", "");
        $("#imgsymbol2").attr("src", "");
        document.getElementById('imgsymbol1').style.display = 'none';
        document.getElementById('imgsymbol2').style.display = 'none';
    }

    function clearImgKtkt() {
        $("#imgktkt").attr("src", "");
        document.getElementById('imgktkt').style.display = 'none';
    }

    function soLuongQuyCach() {
        var x = document.getElementById("soluongquycach").value;
        var y = document.getElementById("chapnhandacbiet").value;
        setDisplayQuyCach(x, y);
    }

    function chapNhanDacBiet() {
        var y = document.getElementById("chapnhandacbiet").value;
        var x = document.getElementById("soluongquycach").value;
        setDisplayQuyCach(x, y);
    }

    function setDisplayQuyCach(indexsl, indexcndb) {
        if (indexcndb == '0') {
            // khong
            document.getElementsByClassName("cndb")[0].style.display = "none";
            document.getElementsByClassName("cndb-2")[0].style.display = "none";
            document.getElementsByClassName("ky-han-cndb")[0].style.display = "none";
        }
        if (indexsl == '0') {
            // 1 quy cach
            document.getElementsByClassName("quy-cach-2")[0].style.display = "none";
            if (indexcndb == '1') {
                // co ky han
                document.getElementsByClassName("ky-han-cndb")[0].style.display = "block";
                document.getElementsByClassName("cndb")[0].style.display = "block";
                document.getElementsByClassName("cndb-2")[0].style.display = "none";

            } else if (indexcndb == '2') {
                // khuon
                document.getElementsByClassName("ky-han-cndb")[0].style.display = "none";
                document.getElementsByClassName("cndb")[0].style.display = "block";
                document.getElementsByClassName("cndb-2")[0].style.display = "none";
            }
        } else if (indexsl == '1') {
            // 2 quy cach
            document.getElementsByClassName("quy-cach-2")[0].style.display = "block";
            if (indexcndb == '1') {
                // co ky han
                document.getElementsByClassName("ky-han-cndb")[0].style.display = "block";
                document.getElementsByClassName("cndb")[0].style.display = "block";
                document.getElementsByClassName("cndb-2")[0].style.display = "block";

            } else if (indexcndb == '2') {
                // khuon
                document.getElementsByClassName("ky-han-cndb")[0].style.display = "none";
                document.getElementsByClassName("cndb")[0].style.display = "block";
                document.getElementsByClassName("cndb-2")[0].style.display = "block";
            }
        }

    }
</script>