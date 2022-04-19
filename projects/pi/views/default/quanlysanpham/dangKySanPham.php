<!-- <div class="content-wrapper"> -->
<div class="content-header">
    <!-- content header -->
    <div class="container-fluid">
        <h4>Đăng ký sản phẩm</h4>
    </div>
    <!-- main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-left">
                                <h3 class="card-title">Bảng danh sách đăng ký</h3>
                            </div>

                            <div class="text-right">
                                <button type="button" name="" id="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#themsanpham">
                                    <i class="fas fa-plus-square" style="margin-right: 10px;">
                                        Thêm sản phẩm
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!-- danh sach san pham -->
                        <?php
                        require_once "./projects/pi/views/default/quanlysanpham/dksp/dsdk.php";
                        require_once "./projects/pi/views/default/quanlysanpham/dksp/xacnhanmd.php";
                        ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- </div> -->
<?php
require_once "./projects/pi/views/default/quanlysanpham/dksp/themsp.php";
?>