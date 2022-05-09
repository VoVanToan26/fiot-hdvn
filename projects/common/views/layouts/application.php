<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIoT HDVN</title>

    <!-- Favicons -->
    <link href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/logo.png" ?>" rel="icon">
    <link href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/logo.png" ?>" rel="apple-touch-icon">

    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/font-google/fonts-google.css" ?>"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/fontawesome-free/css/all.min.css" ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" ?>">
    <!-- add 5/6 Toàn -->
    <link href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/select2/css/select2.min.css" ?>" rel="stylesheet" />

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/css/adminlte.min.css" ?>">

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/jquery/jquery.min.js" ?>">
    </script>

    <!-- Bootstrap -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/bootstrap/js/bootstrap.bundle.min.js" ?>">
    </script>

    <!-- overlayScrollbars -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js" ?>">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/js/adminlte.js" ?>">
    </script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/jquery-mousewheel/jquery.mousewheel.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/raphael/raphael.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/jquery-mapael/jquery.mapael.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/jquery-mapael/maps/usa_states.min.js" ?>">
    </script>
    <!-- ChartJS -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/chart.js/Chart.min.js" ?>">
    </script>
    <!-- add 5/6 Toàn -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/select2/js/select2.min.js" ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables/jquery.dataTables.min.js" ?> ">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-responsive/js/dataTables.responsive.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-buttons/js/dataTables.buttons.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/jszip/jszip.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/pdfmake/pdfmake.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/pdfmake/vfs_fonts.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-buttons/js/buttons.html5.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-buttons/js/buttons.print.min.js" ?>">
    </script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/plugins/datatables-buttons/js/buttons.colVis.min.js" ?>">
    </script>



    <!-- Add style 21.4 Toan -->
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:hover,
        textarea:-webkit-autofill:focus,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus {
            /* -webkit-text-fill-color: green !important; */
            -webkit-box-shadow: 0 0 0px 1000px #343A40 inset !important;
            caret-color: white;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
    <!-- Time -->
    <script type="text/javascript">
        function startTime() {
            // Lấy Object ngày hiện tại
            var today = new Date();

            // Giờ, phút, giây hiện tại
            // var datetime = today.getDate()+ '/' + (today.getMonth()+1)+ '/' +today.getFullYear();
            // datetime = checkTime(today.getDate())+ ' ' + checkTime(today.getMonth()+1)+ ' ' +today.getFullYear();

            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();

            var current_month = (today.getMonth() + 1);
            var month_name = '';
            switch (current_month) {
                case 1:
                    month_name = "JAN";
                    break;
                case 2:
                    month_name = "FEB";
                    break;
                case 3:
                    month_name = "MAR";
                    break;
                case 4:
                    month_name = "APR";
                    break;
                case 5:
                    month_name = "MAY";
                    break;
                case 6:
                    month_name = "JUN";
                    break;
                case 7:
                    month_name = "JUL";
                    break;
                case 8:
                    month_name = "AUG";
                    break;
                case 9:
                    month_name = "SEP";
                    break;
                case 10:
                    month_name = "OCT";
                    break;
                case 11:
                    month_name = "NOV";
                    break;
                case 12:
                    month_name = "DEC";
                    break;
            }

            // Chuyển đổi sang dạng 01, 02, 03
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);
            datetime = checkTime(today.getDate()) + ' ' + month_name + ' ' + today.getFullYear();
            // datetime_show = checkTime(today.getDate()) + ' ' + checkTime(current_month) + ' ' + today.getFullYear();
            // Ghi ra trình duyệt

            document.getElementById('timer').innerHTML = datetime + " " + h + ":" + m + ":" + s;
            // document.getElementById('timer_show').innerHTML = datetime_show + ", " + h + ":" + m;

            // Dùng hàm setTimeout để thiết lập gọi lại 0.5 giây / lần
            var t = setTimeout(function() {
                startTime();
            }, 500);
        }

        // Hàm này có tác dụng chuyển những số bé hơn 10 thành dạng 01, 02, 03, ...
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    </script>

</head>

<body onload="startTime()" class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/logo.png" ?>" alt="logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) ?>" class="nav-link">Trang Chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Liên Hệ</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->

                <!-- Navbar Clock -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-clock" href="#" role="button">
                        <span id="timer"></span>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-cogs"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Setting</span>
                        <!-- manager account -->
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/master" ?>" class="dropdown-item <?php if ($_COOKIE['role'] != 0) {
                                                                                                                        echo 'd-none';
                                                                                                                    } ?>">
                            <i class="fas fa-users-cog "></i> Account Management
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <!-- change password -->
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Profile Management
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <!-- logout -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logouthere">
                            <form id="logout" method="post" action="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/logout.php" ?>" name="logout">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                <span class="float-right text-muted text-sm"></span>
                                <input id="logoutHDVN1" name="logoutHDVN1" value="logoutHDVN1" hidden>
                                <span onclick="logout.submit()" name="logoutHDVN" id="logoutHDVN">Logout</span>
                            </form>
                        </a>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) ?>" class="brand-link">
                <img src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/logo.png" ?>" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">FIoT-HDVN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/" . $_COOKIE['role_name'] . ".png" ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_COOKIE['full_name']; ?></a>
                        <a href="#" class="d-block"><?php echo $_COOKIE['username']; ?></a>
                        <a href="#" class="d-block"><?php echo $_COOKIE['position']; ?></a>
                        <a href="#" class="d-block"><?php echo $_COOKIE['department']; ?></a>
                        <a href="#" class="d-block"><?php echo $_COOKIE['role_name']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- AW3 -->
                        <li class="nav-item">
                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) ?>" class="nav-link <?php if ($active_page_main == "common") {
                                                                                                            echo "active";
                                                                                                        } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    HOME PAGE
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    AW3
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>
                        <!-- QC -->
                        <li class="nav-item <?php if ($active_page_main == "qc") {
                                                echo "menu-open";
                                            } ?>">
                            <a href="#" class="nav-link <?php if ($active_page_main == "qc") {
                                                            echo "active";
                                                        } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    QC
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/" ?>" class="nav-link <?php if ($active_page_sub == "indexqc") {
                                                                                                                            echo "active";
                                                                                                                        } ?>">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Trang Chủ</p>
                                    </a>

                                </li>
                                <li class="nav-item <?php if ($active_page_sub == "register_lineqc" || $active_page_sub == "register_product_codeqc" || $active_page_sub == "register_number_machineqc" || $active_page_sub == "register_measurement_items_nameqc" || $active_page_sub == "register_frequencyqc" || $active_page_sub == "register_measurement_itemsqc") {
                                                        echo "menu-open";
                                                    } ?>">
                                    <a href="QC" class="nav-link <?php if ($active_page_sub == "register_lineqc" || $active_page_sub == "register_product_codeqc" || $active_page_sub == "register_number_machineqc" || $active_page_sub == "register_measurement_items_nameqc" || $active_page_sub == "register_frequencyqc" || $active_page_sub == "register_measurement_itemsqc") {
                                                                        echo "active";
                                                                    } ?>">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Hạng Mục Đăng Ký</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_line/" ?>" class="nav-link <?php if ($active_page_sub == "register_lineqc") {
                                                                                                                                                                echo "active";
                                                                                                                                                            } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký Line</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_product_code/" ?>" class="nav-link <?php if ($active_page_sub == "register_product_codeqc") {
                                                                                                                                                                        echo "active";
                                                                                                                                                                    } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký Mã Sản Phẩm</p>
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_number_machine/" ?>" class="nav-link <?php if ($active_page_sub == "register_number_machineqc") {
                                                                                                                                                                        echo "active";
                                                                                                                                                                    } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký Mã Máy</p>
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items_name/" ?>" class="nav-link <?php if ($active_page_sub == "register_measurement_items_nameqc") {
                                                                                                                                                                                echo "active";
                                                                                                                                                                            } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký Tên Hạng Mục</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_frequency/" ?>" class="nav-link <?php if ($active_page_sub == "register_frequencyqc") {
                                                                                                                                                                    echo "active";
                                                                                                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký Tần Suất</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_measurement_items/" ?>" class="nav-link <?php if ($active_page_sub == "register_measurement_itemsqc") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký Hạng Mục Đo</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/registerPages/register_special_case_measurement/" ?>" class="nav-link <?php if ($active_page_sub == "register_special_case_measurement") {
                                                                                                                                                                                    echo "active";
                                                                                                                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng Ký điều kiện đo đặc biệt</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item <?php if ($active_page_sub == "approvalqc"||$active_page_sub == "reset_measurement_itemsqc"||$active_page_sub == "reset_measuring_toolsqc") {echo "menu-open";} ?>">
                                    <a href="QC" class="nav-link <?php if ($active_page_sub == "approvalqc"||$active_page_sub == "reset_measurement_itemsqc"||$active_page_sub == "reset_measuring_toolsqc") {echo "active";} ?>">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Quản Lý Thông Tin</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/approval/" ?>" class="nav-link <?php if ($active_page_sub == "approvalqc") {echo "active";} ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Duyệt, chỉnh sửa, xuất báo cáo</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/reset_measurement_items" ?>" class="nav-link <?php if ($active_page_sub == "reset_measurement_itemsqc") {echo "active";} ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Reset hạng mục đo</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/reset_measuring_tools" ?>" class="nav-link <?php if ($active_page_sub == "reset_measuring_toolsqc") {echo "active";} ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Reset trạng thái dụng cụ đo</p>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/qc/informationManage/reset_approval_notice" ?>" class="nav-link">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Reset trạng thái thông báo duyệt</p>
                                            </a>
                                        </li> -->
                                    </ul>


                                </li>
                            </ul>

                        </li>
                        <!-- PI -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    PI
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="QuanLySanPham" class="nav-link">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Quản lý sản phẩm</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/pi/quanlysanpham/dangkysanpham" ?>" class="nav-link">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>Đăng ký</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>
                                                    Hạng mục kiểm tra
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/pi/quanlysanpham/dangkyhmkt" ?>" class="nav-link">
                                                        <i class="nav-icon far fa-dot-circle"></i>
                                                        <p>Đăng ký</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/pi/quanlysanpham/khaibaodulieuform" ?>" class="nav-link">
                                                        <i class="nav-icon far fa-dot-circle"></i>
                                                        <p>Khai báo định dạng dữ liệu form</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    Khai báo nguồn dữ liệu
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-icon far fa-dot-circle"></i>
                                                        <p>CMM</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-icon far fa-dot-circle"></i>
                                                        <p>Curve</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-icon far fa-dot-circle"></i>
                                                        <p>Kính hiển vi</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Đăng ký đo</p>
                                    </a>

                                </li>


                            </ul>

                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php echo $content; ?>
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- <aside class="control-sidebar control-sidebar-dark"> -->
        <!-- Control sidebar content goes here -->
        <!-- </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020-2022 <a href="#">MVP</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->




</body>

</html>