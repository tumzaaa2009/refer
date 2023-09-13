<!DOCTYPE html>
<html lang="en">

<?php
session_start();

include_once("./connect/file.refer.connec.php");


// โค้ดของคุณที่ต้องการทำงาน

if ($countRwController == 0 || $_SESSION['hosCode'] == '') { ?>
    <script>
        alert("ทำการตั้งค่าการเชื่อมต่อ");
        location.href = "index.php";
    </script>
<?php }
if (isset($_GET['destroy'])) {
    session_destroy();
    // ลบ cookie ที่เกี่ยวข้องกับ session ออกไปด้วย
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    // นำ user กลับไปยังหน้า login หรือหน้าที่ต้องการ
    header("Location:index.php");
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <!-- kartik -->
    <link href="./dist/kartik/css/fileinput.min.css" rel="stylesheet">
    <link href="./dist/kartik/css/fileinput-rtl.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Api -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400&display=swap" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
    <!-- sweetalert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <style>
 
        body {
            margin: 0;
            font-family: 'Kanit', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        .modal-body {
            max-height: 400px;
            overflow-y: auto;
        }

        #file-input {
            display: none;
        }

        #image-container {
            display: flex;
            flex-wrap: wrap;
        }

        .image-preview {
            margin-right: 10px;
            margin-bottom: 10px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .delete-button {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-wrapper {
            position: relative;
            display: inline-block;
            margin-right: 10px;
        }

        .image-preview {
            max-width: 100px;
            max-height: 100px;
        }

        /* ทำ css load ตอน sendfrom */
        .loader-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            animation: spin 1s linear infinite;
        }

        .loaderDrug {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid #007bff;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -15px;
            margin-top: -15px;
            display: none;
            /* ตั้งค่าเริ่มต้นเป็นซ่อน */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }



        .toast-black {
            color: black !important;
            font-size: 18px;
            opacity: 1 !important;
        }

        /* Swal เหตุผลตัวสีแดง */
        .swal2-input::placeholder {
            color: red;

        }

        .table-responsive input.form-control {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./img/logoR4.png" alt="AdminLTELogo" height="150" width="auto" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
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
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="./img/logoR4.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" width="150" />
                <span class="brand-text font-weight-light">R4 Refer </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['hosCode']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">แบบฟอร์มการส่งตัว</li>
                        <!-- <li class="nav-item"> -->
                        <!-- <a class="nav-link <?php echo isset($pageActive) ? $pageActive : '' ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p> Menu: การส่งตัว <i class="fas fa-angle-left right"></i></p>
                            </a> -->
                        <!-- <ul class="nav nav-treeview <?php echo ($_GET['onfrom'] == 'formreferout') ? 'menu-open' : '' ?>"> -->
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=formreferout" class="nav-link <?php echo ($_GET['onfrom'] == 'formreferout') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon "></i>
                                <p>ส่งตัวทั่วไป </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=formreferback" class="nav-link <?php echo ($_GET['onfrom'] == 'formreferback') ? 'active' : '' ?>">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>ส่งกลับ</p>
                            </a>
                        </li>
                        <li class="nav-header">Menu รายชื่อผู้ป่วย</li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referouttable" class="nav-link <?php echo ($_GET['onfrom'] == 'referouttable') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยส่งตัวทั่วไป</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referbacktable" class="nav-link <?php echo ($_GET['onfrom'] == 'referbacktable') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยส่งกลับ</p>
                            </a>
                        </li>
                        <li class="nav-header">LABELS</li>
                        <?php if (isset($_GET['userfrom']) && $_GET['userfrom'] == 'admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" onclick="onFrom('setting-config')">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p class="text">ตั้งค่า</p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="indexfromuse.php?destroy" class="nav-link" name="destroySession" value="Logout">
                                <i class="nav-icon far fa-circle text-warning"></i> Logout
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <!-- <section class="content"> -->
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <?php

                        if (isset($_GET['onfrom'])) {
                            $pageActive = ''; // กำหนดค่าเริ่มต้นของตัวแปร $pageActive
                            if ($_GET['onfrom'] == "formreferout") {
                                $includedFile = './form/formreferout.form.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == 'formreferback') {
                                $includedFile = './form/formreferback.form.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == 'referouttable') {
                                $includedFile = './form/FormReferOut/show.table.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == "showdetailreferout") {
                                if ($_GET['idrefer'] != "") {
                                    $includedFile = './form/FormReferOut/show.detail.php';
                                    include($includedFile);
                                    $includedFileName = basename($includedFile);
                                    $pageActive = "active";
                                }
                            } else if ($_GET['onfrom'] == "referbacktable") {
                                $includedFile = './form/FormReferBack/show.table.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == "showdetailreferback") {
                                if ($_GET['idrefer'] != "") {
                                    $includedFile = './form/FormReferBack/show.detail.php';
                                    include($includedFile);
                                    $includedFileName = basename($includedFile);
                                    $pageActive = "active";
                                }
                            }
                        }
                        ?>
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">

            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
            <strong class="div-status"></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.3/socket.io.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <!-- Select2 -->
    <script src="./plugins/select2/js/select2.full.min.js"></script>
    <script src="./plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="./plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Katik -->
    <script src="./dist/kartik/js/plugins/piexif.js"></script>
    <script src="./dist/kartik/js/plugins/sortable.js"></script>
    <script src="./dist/kartik/js/fileinput.js"></script>
    <script src="./dist/kartik/js/locales/fr.js"></script>
    <script src="./dist/kartik/js/locales/es.js"></script>
    <script src="./dist/kartik/themes/fas/theme.js"></script>
    <script src="./dist/kartik/themes/explorer-fas/theme.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./plugins/jszip/jszip.min.js"></script>
    <script src="./plugins/pdfmake/pdfmake.min.js"></script>
    <script src="./plugins/pdfmake/vfs_fonts.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Toastr -->
    <script src="./plugins/toastr/toastr.min.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>
    <!-- ??Api -->

    <script src="./api/Backend/ScriptDbRefer.js"></script>
    <script src="./api/Backend/ScriptRefer.js"></script>
    <!-- Timepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <!-- crypto -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

</body>

<script>
    const hosCode = '<?php echo $_SESSION['hosCode']; ?>'
    const hosName = '<?php echo $_SESSION['hosName']; ?>'
    const hosPassCode = '<?php echo $_SESSION['passCode']; ?>'
    const hosOpreator = '<?php echo $_SESSION['hosOpreator']; ?>'
    const callPathRefer = '<?php echo $callPathRefer; ?>'

    let callPathHis = ''
    let tokenApi = ''
    let vsDate = '';
    let labDetail = '';
    let drugDetail = '';
    const typeConnect = '<?php echo $typeConnect ?>'
    // ? typeConnect
    if (typeConnect == "ConnectToAPI") {
        auth = '<?php echo $calAuth; ?>'
        tokenApi = '<?php echo decryptPassword($calToken) ?>';
        patien = '<?php echo $endPoint ?>';
        vsDate = '<?php echo $vsDate; ?>';
        labDetail = '<?php echo $labDetail; ?>';
        drugDetail = '<?php echo $drugDetail; ?>';
        callPathHis = '<?php echo $callUrl  ?>';


    } else if (typeConnect == "ConnectToDb") {
        callPathHis = '<?php echo $callPathHis; ?>'

    }
    //* ENDPOINT 
    let dateToday = new Date();
    var onfrom = '<?php echo isset($_GET['onfrom']) ? $_GET['onfrom'] : ""; ?>';
    var idrefer = '<?php echo isset($_GET['idrefer']) ? $_GET['idrefer'] : ""; ?>';
    let socket = io.connect("https://rh4cloudcenter.moph.go.th:3000", {

        transport: ["websocket", "polling", "flashsocket"],
    });

    // login Check
    socket.on("connect_error", function(error) {
        if (error.message === "xhr poll error" || error.message === "transport close") {
            alert("ฐานข้อมูลกลางไม่สามารถเชื่อมต่อได้");
            $(".div-status").css({
                'color': 'red',
                'font-size': '15px;'
            }).html("Status ReferR4: Lost Connect");
        } else {
            console.log("เกิดข้อผิดพลาดในการเชื่อมต่อ Socket.IO: ", error);
        }
    });

    socket.on("connect", function() {
        $(".div-status").css({
            'color': 'green',
            'font-size': '15px;'
        }).html("Status ReferR4: Connected");
    });

    socket.emit("connecting", {
        hosCode: hosCode,
        hosName: hosName,
        passCode: hosPassCode,
        opreator: hosOpreator
    });
    // test 

    socket.on(`send_status ${hosCode}`, function(data) {
        if ((data.message = "มี RefNo เข้า  ")) {
            toastr.success(`มี RefNo เข้า ${data.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            if (onfrom == "referouttable") {
                showTableReferOut()
            }
        }
    });
    // ? put ReferOut 

    socket.on(`SendPutReferOut ${hosCode}`, function(status, msgrefeno, msgCodeGenrefer) {
        toastr.warning(`ต้นทางมีการปรับปรุงข้อมูล ReferOut ${ msgrefeno.messageRef} `, "", {
            positionClass: "toast-top-full-width",
            timeOut: false,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            closeButton: true,
            toastClass: "toast-black"
        });
        if (onfrom == "showdetailreferout") {
            showDetailReferOut(msgrefeno.messageGen)
        }
    });
    socket.on(`SendPutReferOutDes ${hosCode}`, function(status, msgrefeno, msgCodeGenrefer) {
        toastr.warning(`ปลายทางมีการอัพเดทข้อมูล ReferOut ${ msgrefeno.messageRef} `, "", {
            positionClass: "toast-top-full-width",
            timeOut: false,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            closeButton: true,
            toastClass: "toast-black"
        });

        if (onfrom == "showdetailreferout") {

            showDetailReferOut(msgrefeno.messageGen)
        }
    });

    // ! ยกเลิก referout ของต้นทาง  // และปลายทาง เข้านี้
    socket.on(`cancleStatus ${hosCode}`, function(data) {
        toastr.warning(`${data.message}`, "", {
            positionClass: "toast-top-full-width",
            timeOut: false,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            closeButton: true,
            toastClass: "toast-black"

        });
        const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
        audio.autoplay = true;
        if (onfrom == "referouttable") {
            showTableReferOut()
        }

    });

    socket.on(`send_statusUpdate ${hosCode}`, function(data, msgrefeno) {
        $("#UpdateRefRefer").hide();
        $("#open-modal-case-referout-cancelorg").hide()
        if (data.message == "susOnrecive") {
            toastr.success(`รพ ปลายทางรับการส่งตัว ${data.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,

            });
            $("#UpStatusReferOutDes").hide();
            $("#open-modal-case-referout-cancelorg").hide();
            $("#UpdateRefRefer").hide()
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            if (onfrom == "referouttable") {
                showTableReferOut()
            } else if (idrefer != "" && idrefer != undefined) {

                showDetailReferOut(msgrefeno.referCodeGen)
            }
        } else if (data.message == "susNotRecive") {
            toastr.warning(`รพ ปลายทางปฏิเสธการส่งตัว ${data.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                toastClass: "toast-black",
                closeButton: true,
                toastClass: "toast-black"
            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            if (onfrom == "referouttable") {
                showTableReferOut()
            } else if (idrefer != "" && idrefer != undefined) {

                showDetailReferOut(msgrefeno.referCodeGen)
            }

        }
    });

    socket.on(`send_statusreferIn ${hosCode} `, function(data, msgrefeno) {
        if ((data.message = "ส่งตัวเคส ")) {
            toastr.info(`ส่งกลับเคส ${msgrefeno.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            if (onfrom == "referouttable") {
                showTableReferOut()
            } else if (idrefer != "" && idrefer != undefined) {

                showDetailReferOut(msgrefeno.messageGen)
            }
        }
    });


    socket.on(`send_status_ReferBack ${hosCode}`, function(data) {

        if ((data.data = 200)) {
            toastr.info(`ส่งกลับเคส ${data.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            showTableReferOut();
        }
    });
    socket.on(`sendreferbackonlysend ${hosCode}`, function(data, msgrefeno) {
        if ((data.data = 200)) {
            toastr.info(`${msgrefeno.message} ${msgrefeno.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            if (onfrom == "referbacktable") {
                showTableReferBack()
            } else if (idrefer != "" && idrefer != undefined) {

                showDetailReferBack(msgrefeno.messageGen)
            }
        }
    });
    //ปลายทางปล่วยหน่วยบริการ
    socket.on(`chang_hos ${hosCode}`, function(data, msgrefeno) {
        if ((data.data = 200)) {
            toastr.info(`${msgrefeno.message}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            if (onfrom == "referouttable") {
                showTableReferOut()
            } else if (idrefer != "" && idrefer != undefined) {

                showDetailReferOut(msgrefeno.messageGen)
            }
        }
    });


    $(document).ready(function() {

        jQuery.support.cors = true; //corss
        $('.image-container').click(function() {
            $('.close-button').fadeIn();
        });
        $('#timepicker').timepicker({
            minuteStep: 60,
            showMeridian: false,
            defaultTime: '00:00'
        });
        $('.close-button').click(function(event) {
            event.stopPropagation();
            $('.close-button').fadeOut();
        });
        $('[data-mask]').inputmask()
        $('.select2').select2()
        //Date picker
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            startDate: dateToday,
            endDate: dateToday,
            locale: {
                format: 'DD MMM YY',
                daysOfWeek: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                monthNames: [
                    'มกราคม',
                    'กุมภาพันธ์',
                    'มีนาคม',
                    'เมษายน',
                    'พฤษภาคม',
                    'มิถุนายน',
                    'กรกฎาคม',
                    'สิงหาคม',
                    'กันยายน',
                    'ตุลาคม',
                    'พฤศจิกายน',
                    'ธันวาคม'
                ],

            }
        }, function(start, end, label) {});
        $('#reservationtime').daterangepicker({
            "timePicker": true,
            "timePicker24Hour": true,
            "timePickerSeconds": false,
            minDate: dateToday,
            locale: {
                format: 'DD/MM/YYYY HH:mm',
                daysOfWeek: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                monthNames: [
                    'มกราคม',
                    'กุมภาพันธ์',
                    'มีนาคม',
                    'เมษายน',
                    'พฤษภาคม',
                    'มิถุนายน',
                    'กรกฎาคม',
                    'สิงหาคม',
                    'กันยายน',
                    'ตุลาคม',
                    'พฤศจิกายน',
                    'ธันวาคม'
                ],

            }
        })


        if (onfrom === "formreferout") {
            ServiceStation();
            ward();
            pttype();
            SelectGroupClinic();
            Typept();
            Loads();
            ServicePlane();
            CaseReferOut();
            DoctorName();
            SelectCar();
            CoordinateIsName();
            conscious();
            getStation(hosCode)
            LevelActual()
        } else if (onfrom === "formreferback") {
            ServiceStation();
            ward();
            pttype();
            SelectGroupClinic();
            Typept();
            Loads();
            ServicePlane();
            CaseReferOut();
            DoctorName();
            CoordinateIsName();
            conscious();
            getStation(hosCode)
        }
        // else if (onfrom === 'referoutDestinationtable') {
        //     showTableReferOutDestination()
        // } 
        else if (onfrom === 'referouttable') {
            showTableReferOut()
        } else if (onfrom === 'showdetailreferout') {
            SelectCancleCase()
            getStation(hosCode)
            if (idrefer != "" && idrefer != undefined) {
                ServicePlane();
                CoordinateIsNameDes()
                Loads();
                Typept();
                LevelActual()
                showDetailReferOut(idrefer)
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่ระบุเลขId หรือ เลข ID ไม่ตรงกัน',
                })
                setTimeout(function() {
                    location.href = "indexfromuse.php?onfrom=referouttable";
                }, 3000);
            }
        } else if (onfrom === 'referbacktable') {
            showTableReferBack();
        } else if (onfrom == 'showdetailreferback') {

            getStation(hosCode);
            if (idrefer != "" && idrefer != undefined) {

                showDetailReferBack(idrefer)
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่ระบุเลขId หรือ เลข ID ไม่ตรงกัน',
                })
                setTimeout(function() {
                    location.href = "indexfromuse.php?onfrom=referouttable";
                }, 3000);
            }
        }

    });
</script>

</html>