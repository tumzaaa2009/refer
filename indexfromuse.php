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
                                <p>แสดงรายชื่อผู้ป่วยรับ Refer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referbacktable" class="nav-link <?php echo ($_GET['onfrom'] == 'referbacktable') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยส่งต่อ</p>
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

    const typeConnect = '<?php echo $typeConnect ?>'
    // ? typeConnect
    if (typeConnect == "ConnectToAPI") {
        auth = '<?php echo $calAuth; ?>'
        tokenApi = '<?php echo decryptPassword($calToken) ?>';
        callPathHis = '<?php echo $callUrl . $endPoint ?>';
    } else if (typeConnect == "ConnectToDb") {
        callPathHis = '<?php echo $callPathHis; ?>'

    }
    //* ENDPOINT 

    let dateToday = new Date();
    var onfrom = '<?php echo isset($_GET['onfrom']) ? $_GET['onfrom'] : ""; ?>';
    var idrefer = '<?php echo isset($_GET['idrefer']) ? $_GET['idrefer'] : ""; ?>';
    // ?Socketio
    var socket = io.connect("https://rh4cloudcenter.moph.go.th:3000", {

        transport: ["websocket", "polling", "flashsocket"],
    });
    // login Check
    socket.on("connect_error", function(error) {
        if (error.message === "xhr poll error" || error.message === "transport close") {
            alert("ฐานข้อมูลกลางไม่สามารถเชื่อมต่อได้");
            $(".div-status").css({
                'color': 'red',
                'font-size': '15px;'
            }).html("Status ReferR4: Lost Connecting");
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
            showDetailReferOut()
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
            showDetailReferOut()
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

    socket.on(`send_statusUpdate ${hosCode}`, function(data) {
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

                showDetailReferOut()
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

                showDetailReferOut()
            }

        }
    });

    socket.on(`send_statusreferIn ${hosCode} `, function(data) {
        if ((data.message = "ส่งตัวเคส ")) {
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
            if (onfrom == "referouttable") {
                showTableReferOut()
            } else if (idrefer != "" && idrefer != undefined) {

                showDetailReferOut()
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
    socket.on(`sendreferbackonlysend ${hosCode}`, function(data) {
        if ((data.data = 200)) {
            toastr.info(`ส่งต่อ ${data.refNo}`, "", {
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


    // ?Socketio

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
                showDetailReferOut()
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

                showDetailReferBack()
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

    // * ทำ formattdate
    function formatDateToThai(dateStr) {
        const months = [
            'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
            'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
        ];

        const date = new Date(dateStr);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear() + 543; // เพิ่ม 543 เพื่อแปลงเป็นปี พ.ศ.

        return `${day} ${month} ${year}`;
    }


    // ?แปลง Date ของปฏิทิน
    function formatDateThai(dateString) {
        const date = new Date(dateString);
        const options = {
            year: "numeric",
            month: "short",
            day: "numeric"
        };

        const thaiDate = date.toLocaleDateString("th-TH", options);

        return `${thaiDate}`;
    }
    // *lv actual เปลี่ยนสีและ insert ข้อมูลสีเข้าไปในตารางและแสดงสีตาม lv

    function updateColor() {
        const select = document.getElementById("levelActual");
        const input = document.getElementsByName("colorLvAc")[0];

        const selectedOption = event.target.options[event.target.selectedIndex];
        const color = window.getComputedStyle(selectedOption).backgroundColor;
        input.value = color;
    }

    // ** refer Api  //
    //* StationService //
    const ServiceStation = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                servicestation: "on",
            },
            dataType: "JSON",
            success: function(response) {
                const stationService = [];
                stationService.push(
                    `<option value="0" seleted>--ระบุหน่วยบริการ--</option>`
                );
                for (let index = 0; index < response.response.length; index++) {
                    stationService.push(
                        `<option id='${response.response[index].station_name}'>${response.response[index].station_name}</option>`
                    );
                }
                $("#getStationService").html(stationService);

            },
        });
    };
    const LevelActual = (value) => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                lvActual: 1,
            },
            dataType: "JSON",
            success: function(response) {
                const lvActual = [];
                lvActual.push(`<option selected="selected" value="0">--เลือกระดับความรุนแรง--</option>`)
                for (let index = 0; index < response.response.length; index++) {

                    lvActual.push(
                        `<option value="${response.response[index].level_value}" style="background:${response.response[index].level_color};" >${response.response[index].level_name}</option>`
                    );
                }
                $("#levelActual").html(lvActual);

            },
        });

    }
    const HnInput = (value) => {
        if (typeConnect == "ConnectToAPI") {
            $.ajax({
                url: 'http://localhost:8080/refer/api/',
                type: "POST",
                beforeSend: function() {
                    // แสดงข้อความโหลดก่อนส่งข้อมูล
                    $("#loader").show();
                },
                complete: function() {
                    // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
                    $("#loader").hide();
                },
                data: {
                    headAuthHis: auth,
                    urlTokenHis: callPathHis,
                    keyTokenHis: tokenApi,
                    hospCode: hosCode,
                    hn: value
                },
                dataType: "JSON",
                success: function(response) {
                    // 4. แสดงผลลัพธ์
                    console.log(response)
                    if (response.status == 200) {
                        var today = new Date();
                        var pastDate = new Date(response.person.birthday);
                        var diffYears = today.getFullYear() - pastDate.getFullYear();
                        if (response.person.sex == 1) {
                            var sex = "ชาย";
                        } else if (response.person.sex == 2) {
                            var sex = "หญิง";
                        } else {
                            var sex = "อื่น";
                        }
                        $("#hn").val(response.person.hn);
                        $("#cid").val(response.person.cid);
                        $("#pname").val(response.person.pname);
                        $("#fname").val(response.person.fname);
                        $("#lname").val(response.person.lname);
                        $("#age").val(diffYears);
                        $("#sex").val(sex);
                        $("#addr").val(response.person.address.addr);
                        $("#moopart").val(response.person.address.mooparth);
                        $("#amppart").val(response.person.address.amppart);
                        $("#tmbpart").val(response.person.address.tmbpart);
                        $("#chwpart").val(response.person.address.chwpart);
                        $("#opd_allergy").val(response.person.allergy);
                        if (typeConnect == "ConnectToDb") {
                            DrugItemdetailDes(response.person.hn)
                            DrugLabs(response.person.hn)
                        } else if (typeConnect == "ConnectToAPI") {
                            DrugItemdetailDes(response.drug)
                            DrugLabs(response.lab)
                        }

                    } else if (response.status == 400) {
                        alert('ไม่พบเลข Hn / Cid')
                        $("#hn").val("");
                        $("#cid").val("");
                        $("#pname").val("");
                        $("#fname").val("");
                        $("#lname").val("");
                        $("#age").val("");
                        $("#sex").val("");
                        $("#addr").val("");
                        $("#moopart").val("");
                        $("#amppart").val("");
                        $("#tmbpart").val("");
                        $("#chwpart").val("");
                        $("#opd_allergy").val("");
                        $("#treeview").html('');
                        $("#treeviewLabs").html('');
                    } else if (response.status == 500) {
                        $("#hn").val("");
                        $("#cid").val("");
                        $("#pname").val("");
                        $("#fname").val("");
                        $("#lname").val("");
                        $("#age").val("");
                        $("#sex").val("");
                        $("#addr").val("");
                        $("#moopart").val("");
                        $("#amppart").val("");
                        $("#tmbpart").val("");
                        $("#chwpart").val("");
                        $("#opd_allergy").val("");
                        $("#treeview").html('');
                        $("#treeviewLabs").html('');
                    } else if (response.status == 502) {
                        alert('ไม่พบเลข Hn / Cid')
                        $("#hn").val("");
                        $("#cid").val("");
                        $("#pname").val("");
                        $("#fname").val("");
                        $("#lname").val("");
                        $("#age").val("");
                        $("#sex").val("");
                        $("#addr").val("");
                        $("#moopart").val("");
                        $("#amppart").val("");
                        $("#tmbpart").val("");
                        $("#chwpart").val("");
                        $("#opd_allergy").val("");
                        $("#treeview").html('');
                        $("#treeviewLabs").html('');
                    }
                },
            });
        } else if (typeConnect == "ConnectToDb") {
            $.ajax({
                url: callPathHis,
                type: "POST",
                data: {
                    hn: value
                },
                dataType: "JSON",
                success: function(response) {
                    // 4. แสดงผลลัพธ์

                    if (response.status == 200) {
                        var today = new Date();
                        var pastDate = new Date(response.person.birthday);
                        var diffYears = today.getFullYear() - pastDate.getFullYear();
                        if (response.person.sex == 1) {
                            var sex = "ชาย";
                        } else if (response.person.sex == 2) {
                            var sex = "หญิง";
                        } else {
                            var sex = "อื่น";
                        }
                        $("#hn").val(response.person.hn);
                        $("#cid").val(response.person.cid);
                        $("#pname").val(response.person.pname);
                        $("#fname").val(response.person.fname);
                        $("#lname").val(response.person.lname);
                        $("#age").val(diffYears);
                        $("#sex").val(sex);
                        $("#addr").val(response.person.address.addr);
                        $("#moopart").val(response.person.address.mooparth);
                        $("#amppart").val(response.person.address.amppart);
                        $("#tmbpart").val(response.person.address.tmbpart);
                        $("#chwpart").val(response.person.address.chwpart);
                        $("#opd_allergy").val(response.person.allergy);
                        if (typeConnect == "ConnectToDb") {
                            DrugItemdetailDes(response.person.hn)
                            DrugLabs(response.person.hn)
                        } else if (typeConnect == "ConnectToAPI") {
                            DrugItemdetailDes(response.drug)
                            DrugLabs(response.lab)
                        }

                    } else if (response.status == 400) {
                        alert('ไม่พบเลข Hn / Cid')
                        $("#hn").val("");
                        $("#cid").val("");
                        $("#pname").val("");
                        $("#fname").val("");
                        $("#lname").val("");
                        $("#age").val("");
                        $("#sex").val("");
                        $("#addr").val("");
                        $("#moopart").val("");
                        $("#amppart").val("");
                        $("#tmbpart").val("");
                        $("#chwpart").val("");
                        $("#opd_allergy").val("");
                        $("#treeview").html('');
                        $("#treeviewLabs").html('');
                    } else if (response.status == 500) {
                        alert(response.message)
                    }
                },
            });
        }
    };


    // ? เรียก api cloud rh4
    const SearchHosMain = () => {
        var formData = {
            searchIdHosMain: $("#searchIdHosmain").val(),
            searchNameHosMain: $("#searchNameHosMain").val(),
        };
        $.ajax({
            type: "POST",
            url: `${callPathHis}`,
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(data) {
            const hosId = [];
            const hosName = [];
            if (tableHeight > modalHeight) {
                var tableHeight = $(".table").height();
                var modalHeight = $(".modal-body").height();
                if (tableHeight > modalHeight) {
                    $(".table-responsive").css("height", modalHeight - 60);
                }
            }
            $("#searchHosMain").html(data.dataRes);
            $("#searchIdHosmain").val("");
            $("#searchNameHosMain").val("");
        });

        event.preventDefault();
    };
    const SearchHosDes = () => {
        var formData = {
            searchIdHosDes: $("#searchIdHosDes").val(),
            searchNameHosDes: $("#searchNameHosDes").val(),
        };
        $.ajax({
            type: "POST",
            url: `${callPathHis}`,
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(data) {
            const hosId = [];
            const hosName = [];
            if (tableHeight > modalHeight) {
                var tableHeight = $(".table").height();
                var modalHeight = $(".modal-body").height();
                if (tableHeight > modalHeight) {
                    $(".table-responsive").css("height", modalHeight - 60);
                }
            }
            $("#searchHosDes").html(data.dataRes);
            $("#searchIdHosDes").val("");
            $("#searchNameHosDes").val("");
        });

        event.preventDefault();
    };

    const SelectValueHosnameMain = (idHos, hosName) => {
        $("#searchIdHosmain").val(idHos);
        $("#searchNameHosMain").val(hosName);
    };
    const SelectValueHosNameDes = (idHos, hosName) => {
        $("#searchIdHosDes").val(idHos);
        $("#searchNameHosDes").val(hosName);
    };

    const ChangeLocation = (value) => {

        ward(value.value)
        // LevelActual(value.value)
    }

    const ward = (value) => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                ward: value,
            },
            dataType: "JSON",
            success: function(response) {
                const stationService = [];
                for (let index = 0; index < response.response.length; index++) {
                    stationService.push(
                        `<option id='${response.response[index].dep_id}'>${response.response[index].dep_name}</option>`
                    );
                }
                $("#getdepartment").html(
                    stationService.map((option) =>
                        option.replace("id='", "id='getdepartment-")
                    )
                );

            },
        });
    };

    const pttype = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                pttype: "on",
            },
            dataType: "JSON",
            success: function(response) {
                const stationService = [];
                for (let index = 0; index < response.response.length; index++) {
                    stationService.push(
                        `<option id='${response.response[index].pttype_id}' value='${response.response[index].pttype_name}'>${response.response[index].pttype_name}</option>`
                    );
                }
                $("#getpttype").html(stationService);
            },
        });
    };

    const ValueSeachHos = () => {
        $("#hosIdMain").val($("#searchIdHosmain").val());
        $("#hosMainName").val($("#searchNameHosMain").val());

        $("#hosIdHosDes").val($("#searchIdHosDes").val());
        $("#hosMainNameDes").val($("#searchNameHosDes").val());

        // $("#ValueSeachHos").val('')
        // $("#searchNameHosDes").val('');
        // $("#searchIdHosDes").val('');
        // $("#searchNameHosMain").val('')
        // $("#searchIdHosmain").val('')
        // $("#searchHosMain").val('')
    };


    // ?PHP CLIENT
    // * Send ajax clinicGroup
    const SelectGroupClinic = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                clinicGrop: "on",
            },
            dataType: "JSON",
            success: function(response) {
                // $("#clinicsubgroup").html()

                $("#clinicGrop").html(response.response);
            },
        });
    };
    const Typept = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                Typept: "on",
            },
            dataType: "JSON",
            success: function(response) {
                $("#Typept").html(response.response);
            },
        });
    };
    const Loads = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                loads: "on",
            },
            dataType: "JSON",
            success: function(response) {
                $("#loads").html(response);
            },
        });
    };

    const ServicePlane = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                servicePLane: "on",
            },
            dataType: "JSON",
            success: function(response) {
                $("#servicePlane").html(response);
            },
        });
    };
    const CaseReferOut = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                caseReferOut: "on",
            },
            dataType: "JSON",
            success: function(response) {
                $("#causeReferout").html(response);
            },
        });
    };

    // * Ajax other Cause
    const ValueOtherCaseReferOut = (params) => {

        if (params == "อื่นๆ") {
            $("#otherCauseReferout").show();
        } else {
            $("#otherCauseReferout").hide();
        }
    };
    // * Ajax other Case Refer Back 
    const ValueOtherCaseReferBack = (params) => {
        if (params == "อื่นๆ") {
            $("#DivotherCauseReferback").show();
        } else {
            $("#DivotherCauseReferback").hide();
        }
    };
    //  * Ajax other referReciveReferBack
    const referReciveReferBack = () => {
        const selectedValues = $("#refReciveReferBack").val();

        if (selectedValues.indexOf("อื่นๆ") !== -1) {
            $("#otherRefReciveReferBack").show();
        } else {
            $("#otherRefReciveReferBack").hide();
        }
    };

    const DoctorName = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                doctorName: "on",
            },
            dataType: "JSON",
            success: function(response) {
                $("#doctorName").html(response);
                $("#staffDoctorName").html(response)
            },
        });
    };

    function SelectCar() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                car: 1
            },
            dataType: "JSON",
            success: function(response) {
                const carService = [];
                carService.push(`<option id='' value='0' selected>ระบุเลขทะเบียนรถ</option>`)
                for (let index = 0; index < response.length; index++) {

                    carService.push(
                        ` <option id = '${response[index].id}'  value = '${response[index].name}' >${response[index].name} </option>`
                    );
                }
                $("#carRefer").html(carService);
            }
        });
    }

    let arrayCancleCase = [];

    function SelectCancleCase() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                cancleCase: 1
            },
            dataType: "JSON",
            success: function(response) {

                arrayCancleCase.push(`<option id='' value='0' selected>ระบุเหตุผลการยกเลิก</option>`)
                response.forEach(function(item) {
                    arrayCancleCase.push(
                        ` <option id = '${item .id}'  value = '${item.name}' >${item.name} </option>`
                    );

                });
                $("#inputCancleReferoutOrg").html(arrayCancleCase)
                $("#input-refuse").html(arrayCancleCase)

            }
        });
    }
    const CoordinateIsName = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                CoordinateName: "on",
            },
            dataType: "JSON",
            success: function(response) {

                $("#coordinateIs").html(response);

            },
        });
    };
    const CoordinateIsNameDes = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                CoordinateName: "on",
            },
            dataType: "JSON",
            success: function(response) {

                $("#coordinateIsDes").html(response);

            },
        });
    };
    // Add Truma 
    let rowCount = 0
    const TrumaAdd = () => {
        const tableBody = document.querySelector("#TrumaTable tbody");
        const newRow = document.createElement("tr");
        let numCount = ++rowCount;
        newRow.innerHTML = `
        <td> <select class="form-control" name="Consciousness" id="">
                <option value="Normal">Normal</option>
                <option value="Drowsiness">Drowsiness</option>
                <option value="SemiComa">SemiComa</option>
                <option value="Coma">Coma</option>
                <option value="ไม่สามารถประเมินได้">ไม่สามารถประเมินได้</option>
            </select>
        </td>
        <td><input class="form-control timepicker" type="text" name="timeTruma" /></td>
        <td><input class="form-control" type="number" name="e" /></td>
        <td><input class="form-control" type="number" name="v" /></td>
        <td><input class="form-control" type="number" name="m" /></td>
        <td><input class="form-control" type="number" name="pupilR" /></td>
        <td><input class="form-control" type="number" name="pupilL" /></td>
        <td><input class="form-control" type="number" name="Tc" /></td>
        <td><input class="form-control" type="number" name="prF" /></td>
        <td><input class="form-control" type="number" name="pfM" /></td>
        <td><input class="form-control" type="number" name="bp" placeholder="bp" /></td>
        <td><input class="form-control" type="number" name="mmHg" placeholder="mmhg" /></td>
        <td><input class="form-control" type="number" name="spo2" /></td>
        <td><button class="btn btn-danger" onclick="deleteTurmaTr(this, ${numCount})">Delete</button></td>
        `;

        $("#numTruma").val(numCount);
        tableBody.appendChild(newRow);

        // เรียกใช้งาน jQuery timepicker สำหรับอิลิเมนต์ที่มีคลาส .timepicker ในแถวล่าสุด
        $(newRow).find(".timepicker").timepicker({
            minuteStep: 60,
            showMeridian: false,
            defaultTime: '00:00'
        });
    }

    const deleteTurmaTr = (btn, count) => {
        const row = btn.closest("tr");
        const countDiff = count - 1;
        $("#numTruma").val(countDiff);
        rowCount--;
        row.remove();
    }

    const checkEtt = (params) => {};
    const conscious = () => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                conscious: "on",
            },
            dataType: "JSON",
            success: function(response) {
                $("#conscious").html(response);
            },
        });
    };
    const EttChk = (params) => {
        var checkbox = document.getElementById("Ettcheck");
        var noEtt = document.getElementById("noEtt");
        var MarkEtt = document.getElementById("MarkEtt");
        const now = new Date();
        const thaiYear = now.getFullYear() + 543;
        const thaiDate = now.getDate().toString().padStart(2, "0");
        const thaiMonth = (now.getMonth() + 1).toString().padStart(2, "0");
        const formattedDate = `${thaiDate}/${thaiMonth}/${thaiYear
    .toString()
    .substr(-2)}`;

        if (checkbox.checked) {
            noEtt.disabled = false;
            MarkEtt.disabled = false;

            $("#management").val(
                `on Endotracheal tube No  . mark  -  DTX - CBC, BUN / Cr, Electrolyte -   H / C x 2 spp. -    0.9 % NaCl iv drip 100 ml / hr -   Diagnosis sepsis วันที่ ${formattedDate} เวลา `
            );
        } else {
            noEtt.disabled = true;
            MarkEtt.disabled = true;
            $("#noEtt").val("")
            $("#MarkEtt").val("")
            $("#management").val(" ");
        }
    };
    const textnoEtt = (params) => {
        const now = new Date();
        const thaiYear = now.getFullYear() + 543;
        const thaiDate = now.getDate().toString().padStart(2, "0");
        const thaiMonth = (now.getMonth() + 1).toString().padStart(2, "0");
        const formattedDate = `${thaiDate}/${thaiMonth}/${thaiYear
    .toString()
    .substr(-2)}`;

        // เก็บค่าจาก input แรก
        const noEtt = document.getElementById("noEtt").value;

        // เก็บค่าจาก input ที่สอง
        const markEtt = document.getElementById("MarkEtt").value;
        $("#management").val(
            `on Endotracheal tube No ${noEtt}. mark ${markEtt} -  DTX - CBC, BUN / Cr, Electrolyte -   H / C x 2 spp. -    0.9 % NaCl iv drip 100 ml / hr -   Diagnosis sepsis วันที่ ${formattedDate} เวลา `
        );
    };

    const textMarkEtt = (params) => {
        textnoEtt();
    };
    const SearchIcd10 = () => {
        var formData = {
            searchIdHosIcd10: $("#searchIdHosIcd10").val(),
            searchNameIcd10: $("#searchNameIcd10").val(),
        };
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(data) {
            if (data.status == false) {
                alert("ไม่พบ ICD10");
            }
            if (tableHeight > modalHeight) {
                var tableHeight = $(".table").height();
                var modalHeight = $(".modal-body").height();
                if (tableHeight > modalHeight) {
                    $(".table-responsive").css("height", modalHeight - 60);
                }
            }

            $("#searchIcd10").html(data.dataRes);
            $("#searchIdHosIcd10").val("");
            $("#searchNameIcd10").val("");
        });
        event.preventDefault();
    };
    const SelectValueIcd10 = (paramsId, icdName) => {
        $("#searchIdHosIcd10").val(paramsId);
        $("#searchNameIcd10").val(icdName);
    };
    const arrayIcd10 = [];
    const SaveIcd10 = () => {
        const paramsId = $("#searchIdHosIcd10").val();
        const icdName = $("#searchNameIcd10").val();
        if (paramsId != "" || icdName != "")
            arrayIcd10.push({
                id: paramsId,
                name: icdName,
            });
        $("#searchIdHosIcd10").val("");
        $("#searchNameIcd10").val("");
        // clear previous table rows
        $("#AddIcd10 tr ").remove();
        // add new table rows
        let numarrayicd = 0;
        arrayIcd10.forEach((item) => {
            numarrayicd++;
            const newRow = $(`<tr id="${numarrayicd}">`);
            newRow.append(
                $(`<td id="${numarrayicd}">`).html(
                    `<input class="form-control" type="text" name="icd10" value="${item.name}" readonly>`
                )
            );
            newRow.append(
                $(`<td id="${numarrayicd}">`).html(
                    `<button class='btn btn-block btn-danger'  onclick="delicd10('${item.id}','${numarrayicd}')")">ลบ Icd10 </button>`
                )
            );
            $("#AddIcd10").append(newRow);
        });
    };
    const delicd10 = (id, num) => {
        arrayIcd = arrayIcd10.filter((item) => item.id == id);

        arrayIcd10.splice(arrayIcd, 1);
        $(`#AddIcd10 tr#${num}`).remove();
        // add new table rows

        event.preventDefault();
    };

    function ModalReferOutDes() {
        $("#myModalshowTableReferoutDestination").modal("hide");
        $("#contentReferoutDes").html("");
    }
    const referId = `<?php echo $_GET["idrefer"]; ?>`;

    // * ลาก ITEM ยา มา
    function DrugItemdetailDes(hn) {
        if (typeConnect == "ConnectToDb") {
            $.ajax({
                type: `POST`,
                url: `${callPathHis}`,
                data: {
                    drugHn: hn
                },
                dataType: "JSON",
                success: function(response) {
                    generateTreeView(response)
                }
            });
        } else if (typeConnect == "ConnectToAPI") {

            generateTreeView(hn)
        }

    }
    // drug Item Labs
    function DrugLabs(hn) {
        if (typeConnect == "ConnectToDb") {
            $.ajax({
                type: `POST`,
                url: `${callPathHis}`,
                data: {
                    drugLabs: hn
                },
                dataType: "JSON",
                success: function(response) {

                    generateTreeView(response)
                }
            });
        } else if (typeConnect == "ConnectToAPI") {
            generateTreeView(hn)
        }

    }

    //* generrate ยา // lab
    function generateTreeView(data) {


        let genHtml = '';
        let html =
            '<div class="col"><ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
        for (let date in data) {
            if (data[date].optimerece) {

                genHtml = 1;

                if (date !== "status") {
                    html +=
                        '<li class="nav-item"><a class="nav-link"><i class="fas fa-angle-left right"></i>' +
                        formatDateThai(date) +
                        '</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>เลือกรายการยา</th><th>Drug Name</th><th>ประเภทยา</th><th>Unit</th></tr></thead><tbody>';

                    const optimereceItems = data[date].optimerece;

                    html +=
                        '<tr><td style="width: fit-content"><div class="form-check"><input class="  check-all-items" type="checkbox" data-date="' +
                        date +
                        '"></div></td><td colspan="3"><label class="form-check-label">เลือกทั้งหมด</label></td></tr>';

                    for (let i = 0; i < optimereceItems.length; i++) {
                        let item = optimereceItems[i];

                        html +=
                            '<tr><td style="width: fit-content"><input type="checkbox" id="itemCheckbox' + date +
                            '" name="itemCheckbox" value=\'{"date": "' +
                            date +
                            '", "drugname": "' +
                            item.drugname +
                            '", "therapeutic": "' +
                            item.therapeutic +
                            '", "unit": "' +
                            item.unit +
                            '"}\'></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
                            item.drugname +
                            '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
                            item
                            .therapeutic +
                            '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
                            item
                            .unit +
                            '"></td></tr>';
                    }

                    html += '</tbody></table></div></li></ul></li>';
                }
            } else {
                // ? drug lab
                if (date !== "status") {
                    html +=
                        '<li class="nav-item"><a class="nav-link"><i class="fas fa-angle-left right"></i>' +
                        formatDateThai(date) +
                        '</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>รายการ</th><th>เลือกทั้งหมด </th><th>LabItemName</th><th>lab_items_normal_value</th><th>lab_order_result</th></tr></thead><tbody>';
                    html +=
                        '<tr><td style="width: fit-content"> <input class="check-all-items-labs" type="checkbox" data-date="' +
                        date +
                        '"></td><td colspan="3"><label class="form-check-label">เลือกทั้งหมด</label></td></tr>';
                    for (let i = 0; i < data[date].length; i++) {
                        let item = data[date][i];

                        html +=
                            '<tr><td style="width: fit-content"><input type="checkbox" id="itemCheckboxLabs' + date +
                            '" name="itemCheckboxlabs" value=\'{"date": "' +
                            date + '", "lab_items_code": "' + item.lab_items_code + '", "lab_items_name": "' + item
                            .lab_items_name +
                            '", "lab_items_normal_value": "' + item.lab_items_normal_value + '","lab_order_result":"' + item.lab_order_result + '"}\'></td>' +
                            '<td style="width: fit-content"><input type="hidden" class="form-control" readonly value="' + item
                            .lab_items_code + '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' + item
                            .lab_items_name + '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' + item
                            .lab_items_normal_value + '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' + item
                            .lab_order_result + '"></td> </tr > ';

                    }
                    html += '</tbody></table></div></li></ul></li>';
                }
            }
        }
        html += '</ul></div>';

        // เขียน HTML ของ table treeview ลงใน div#treeview
        if (genHtml == 1) {
            document.getElementById('treeview').innerHTML = html;
        } else {
            document.getElementById('treeviewLabs').innerHTML = html;
        }
        //* drug
        const checkboxes = document.querySelectorAll('input[name="itemCheckbox"]');
        const checkAllItems = document.querySelectorAll('.check-all-items');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', toggleCheckbox);
        });

        checkAllItems.forEach((checkAllItem) => {
            checkAllItem.addEventListener('change', toggleAllItems);
        });

        function toggleCheckbox(event) {
            const checkbox = event.target;
            const allChecked = Array.from(checkboxes).every((checkbox) => checkbox.checked);

            checkAllItems.forEach((checkAllItem) => {
                if (checkbox.checked) {
                    checkAllItem.checked = allChecked;
                } else {
                    checkAllItem.checked = false;
                }
            });
        }

        function toggleAllItems(event) {
            const checkAllItem = event.target;
            const date = checkAllItem.getAttribute('data-date');

            const drugCheckboxes = document.querySelectorAll(
                'input[id="itemCheckbox' + date + '"]'
            );

            drugCheckboxes.forEach((checkbox) => {
                checkbox.checked = checkAllItem.checked;
            });
        }
        //* End Drug
        // *  LAbs 
        function toggleAllLabItems(event) {
            const checkAllItem = event.target;
            const date = checkAllItem.getAttribute("data-date");
            const labItemCheckboxes = document.querySelectorAll(
                'input[id="itemCheckboxLabs' + date + '"]');

            labItemCheckboxes.forEach((checkbox) => {
                checkbox.checked = checkAllItem.checked;
            });
        }

        const checkAllItemsLabs = document.querySelectorAll(".check-all-items-labs");
        checkAllItemsLabs.forEach((checkAllItem) => {
            checkAllItem.addEventListener("change", toggleAllLabItems);
        });

        // *  LAbs 

    }


    // showmodalrefer in 
    $("#open-modal-case-referin").click(function() {
        $("#mmmodal").modal("show");
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                modalDerivery: "on"
            },
            dataType: "JSON",
            success: function(response) {
                const stationService = [];
                stationService.push(
                    `   <option selected="selected">--เลือกวิธีการนำส่งผู้ป่วย--</option>`)

                for (let index = 0; index < response.length; index++) {
                    stationService.push(
                        `<option id='${response[index].id}' value='${response[index].Name}'>${response[index].Name}</option>`
                    );
                }
                $("#deriveryService").html(stationService)

            }
        });
    });

    // *** funtion Modal
    async function modalDerivery(value) {
        if (value == "อื่น") {

            $("#OtherCaseSendRefer").show();

        } else {
            $("#OtherCaseSendRefer").hide();
            $("#inputOtherCase").val('');
        }

        return new Promise((resolve) => {
            resolve({
                otherCase: value
            });
        });
    }
    async function InputOtherCase(value) {

        return new Promise((resolve) => {
            resolve({
                otherCase: value
            });
        });
    }
</script>

</html>