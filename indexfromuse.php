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



        select.lvlactual option[value="Unstable"] {
            background: rgba(255, 0, 0, 0.5);
        }

        select.lvlactual option[value="Stable with High risk of deterioration"] {
            background: rgba(255, 0, 0, 0.5);
        }

        select.lvlactual option[value="Stable with Medium risk of deterioration"] {
            background: rgba(224, 26, 237, 1);
        }

        select.lvlactual option[value="Stable with Low risk of deterioration"] {
            background: rgba(224, 26, 237, 1);
        }

        select.lvlactual option[value="Stable with Low risk of deterioration "] {
            background: rgba(218, 221, 21, 1);
        }

        select.lvlactual option[value="Stable with No risk of deterioration"] {
            background: rgba(218, 221, 21, 1);
        }

        select.lvlactual option[value="OPD-New case"] {
            background: rgba(55, 191, 21, 1);
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
                            <a href="indexfromuse.php?onfrom=referintablewait" class="nav-link <?php echo ($_GET['onfrom'] == 'referintablewait') ? 'active' : '' ?>">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>รายชื่อผู้ป่วยรอส่งตัวกลับ (เฉพาะเคสที่ได้รับ ReferBack)</p>
                            </a>
                        </li>

                        <!-- </ul> -->
                        <!-- </li> -->
                        <li class="nav-header">Menu รายชื่อผู้ป่วย</li>

                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referoutOrigin" class="nav-link <?php echo ($_GET['onfrom'] == 'referoutOrigin') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยส่งต่อ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referoutDestinationtable" class="nav-link <?php echo ($_GET['onfrom'] == 'referoutDestinationtable') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยรับ Refer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referintable" class="nav-link <?php echo ($_GET['onfrom'] == 'referintable') ? 'active' : '' ?>">
                                <i class=" nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยส่งตัวกลับ</p>
                            </a>
                        </li>
                        <li class="nav-header">Menu แสดงการปฏิเสธ-ยกเลิก เคส Refer</li>
                        <li class="nav-item">
                            <a href="indexfromuse.php?onfrom=referoutremovetable" class="nav-link <?php echo ($_GET['onfrom'] == 'referoutremovetable') ? 'active' : '' ?>">
                                <i class=" nav-icon fas fa-file"></i>
                                <p>แสดงรายชื่อผู้ป่วยยกเลิกการส่งตัว (รพ.ต้นทาง)-(รพ.ปลายทาง)</p>
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
                            } else if ($_GET['onfrom'] == 'referoutDestinationtable') {
                                $includedFile = './form/FromHosDestination/referout/show.table.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == "showdetailreferoutDestinationtable") {
                                if ($_GET['idrefer'] != "") {
                                    $includedFile = './form/FromHosDestination/referout/show.detail.php';
                                    include($includedFile);
                                    $includedFileName = basename($includedFile);
                                    $pageActive = "active";
                                }
                            } else if ($_GET['onfrom'] == 'referoutOrigin') {
                                $includedFile = './form/FormHosMain/show.table.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == 'referintable') {
                                $includedFile = './form/FormReferIn/table.referin.sus.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == 'referintablewait') {
                                $includedFile = './form/FormReferIn/table.referin.wait.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
                            } else if ($_GET['onfrom'] == "showdetailreferin") {

                                if ($_GET['idrefer'] != "") {
                                    $includedFile = './form/FormReferIn/show.detail.php';
                                    include($includedFile);
                                    $includedFileName = basename($includedFile);
                                    $pageActive = "active";
                                }
                            } else if ($_GET['onfrom'] == "showdetailreferinOnsusecss") {

                                if ($_GET['idrefer'] != "") {
                                    $includedFile = './form/FormReferIn/show.detail.onSuscess.php';
                                    include($includedFile);
                                    $includedFileName = basename($includedFile);
                                    $pageActive = "active";
                                }
                            } else if ($_GET['onfrom'] == "referoutremovetable") {
                                $includedFile = './form/CancleRefer/show.tabel.cancle.refer.php';
                                include($includedFile);
                                $includedFileName = basename($includedFile);
                                $pageActive = "active";
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
            <!-- /.container-fluid -->
            <!-- </section> -->
            <!-- <div id="audio-container"></div> -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
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
    <!-- Fancy -->


</body>

<script>
    const hosCode = '<?php echo $_SESSION['hosCode']; ?>'
    const hosName = '<?php echo $_SESSION['hosName']; ?>'
    const hosPassCode = '<?php echo $_SESSION['passCode']; ?>'
    const hosOpreator = '<?php echo $_SESSION['hosOpreator']; ?>'
    const callPathRefer = '<?php echo $callPathRefer; ?>'
    const callPathHis = '<?php echo $callPathHis; ?>'
    let dateToday = new Date();
    // ?Socketio
    var socket = io.connect("https://rh4cloudcenter.moph.go.th:3000", {
        transport: ["websocket", "polling", "flashsocket"],
    });
    // login Check
    socket.emit("connecting", {
        hosCode: hosCode,
        hosName: hosName,
        passCode: hosPassCode,
        opreator: hosOpreator,
    });


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
            showTableReferOutDestination();
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
        showTableReferOutDestination();

    });



    socket.on(`send_statusUpdate ${hosCode}`, function(data) {
        console.log(data.message);
        if (data.message == "susOnrecive") {
            toastr.success(`รพ ปลายทางรับการส่งตัว ${data.refNo}`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,

            });
            const audio = new Audio("./sound_alert/com_linecorp_line_whistle.ogg");
            audio.autoplay = true;
            showTableDesOrigin();
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
            showTableDesOrigin();

        }
    });

    socket.on(`send_statusreferIn ${hosCode} `, function(data) {

        if ((data.message = "ส่งตัวเคส ")) {
            toastr.info(`รับการส่งตัวเคส ${data.refNo}`, "", {
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
            showTableDesOrigin();
        }
    });
    // ?Socketio

    $(document).ready(function() {
        jQuery.support.cors = true; //corss
        $('.image-container').click(function() {
            $('.close-button').fadeIn();
        });

        $('.close-button').click(function(event) {
            event.stopPropagation();
            $('.close-button').fadeOut();
        });
        $('[data-mask]').inputmask()
        $('.select2').select2()
        $('#reservationtime').daterangepicker({
            "timePicker": true,
            "timePicker24Hour": true,
            "timePickerSeconds": true,
            minDate: dateToday,
            locale: {
                format: 'DD/MM/YYYY HH:mm',
            }
        })

        var onfrom = '<?php echo isset($_GET['onfrom']) ? $_GET['onfrom'] : ""; ?>';
        var idrefer = '<?php echo isset($_GET['idrefer']) ? $_GET['idrefer'] : ""; ?>';
        if (onfrom === "formreferout") {
            ServiceStation();
            ward();
            LevelActual();
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
        } else if (onfrom === 'referoutDestinationtable') {
            showTableReferOutDestination()
        } else if (onfrom === 'showdetailreferoutDestinationtable') {
            getStation(hosCode)

            if (idrefer != "" && idrefer != undefined) {
                showDetailReferOut()
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่ระบุเลขId หรือ เลข ID ไม่ตรงกัน',
                })
                setTimeout(function() {
                    location.href = "indexfromuse.php?onfrom=referoutOrigin";
                }, 3000);
            }
        } else if (onfrom === 'referoutOrigin') {

            showTableDesOrigin()
        } else if (onfrom === 'referintable') {
            showTableReferIn();
        } else if (onfrom === 'referintablewait') {
            showTableReferOutDestination()
        } else if (onfrom === 'showdetailreferin') {
            if (idrefer != "" && idrefer != undefined) {
                showDetailReferOut()
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่ระบุเลขId หรือ เลข ID ไม่ตรงกัน',
                })
                setTimeout(function() {

                    location.href = "indexfromuse.php?onfrom=referoutOrigin";
                }, 3000);
            }
        } else if (onfrom === 'showdetailreferinOnsusecss') {
            if (idrefer != "" && idrefer != undefined) {
                showDetailReferInOnsusSecss()
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่ระบุเลขId หรือ เลข ID ไม่ตรงกัน',
                })
                setTimeout(function() {
                    location.href = "indexfromuse.php?onfrom=referoutOrigin";
                }, 3000);
            }
        } else if (onfrom == "referoutremovetable") {
            CanCelTableRefer();
        }
    });
    // ?แปลง Date
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
                    `<option value="0" selected="selected"  >-- ระบุจัดบริการ --</option>`
                );
                for (let index = 0; index < response.response.length; index++) {
                    stationService.push(
                        `<option id='${response.response[index].station_name}' >${response.response[index].station_name}</option>`
                    );
                }
                $("#getStationService").html(stationService);

            },
        });
    };
    //? จัดการสถานที่ บริการ ตัวแปรเริ่มต้นคือ service station opd 
    const ChangeLocation = (value) => {
        ward(value.value)
        LevelActual(value.value)
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

    const LevelActual = (value) => {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                lvActual: value,
            },
            dataType: "JSON",
            success: function(response) {
                const lvActual = [];
                lvActual.push(`<option selected="selected" value="0">--เลือกระดับความรุนแรง--</option>`)
                for (let index = 0; index < response.response.length; index++) {
                    lvActual.push(
                        `<option value="${response.response[index].level_value}" >${response.response[index].level_name}</option>`
                    );
                }
                $("#levelActual").html(lvActual);

            },
        });

    }


    // ?จบการค้นหา


    const HnInput = (value) => {
        $.ajax({
            type: "POST",
            url: `${callPathHis}`,
            data: {
                hn: value,
            },
            dataType: "JSON",
            success: function(response) {

                // 4. แสดงผลลัพธ์
                if (response.status == true) {
                    var today = new Date();
                    var pastDate = new Date(response.birthday);
                    var diffYears = today.getFullYear() - pastDate.getFullYear();
                    if (response.sex == 1) {
                        var sex = "ชาย";
                    } else if (response.sex == 2) {
                        var sex = "หญิง";
                    } else {
                        var sex = "อื่น";
                    }

                    $("#hn").val(response.hn);
                    $("#cid").val(response.cid);
                    $("#pname").val(response.pname);
                    $("#fname").val(response.fname);
                    $("#lname").val(response.lname);
                    $("#age").val(diffYears);
                    $("#sex").val(sex);
                    $("#addr").val(response.addr);
                    $("#moopart").val(response.address.mooparth);
                    $("#amppart").val(response.address.amppart);
                    $("#tmbpart").val(response.address.tmbpart);
                    $("#chwpart").val(response.address.chwpart);
                    $("#opd_allergy").val(response.allergy);
                } else {
                    alert('ไม่พบเลข Hn')
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
                }
                DrugItemdetailDes(response.hn)
                DrugLabs(response.hn)
            },
        });
    };
    const CidInput = (value) => {
        $.ajax({
            type: "POST",
            url: `${callPathHis}`,
            data: {
                cid: value,
            },
            dataType: "JSON",
            success: function(response) {
                // 4. แสดงผลลัพธ์
                if (response.status == true) {
                    var today = new Date();
                    var pastDate = new Date(response.birthday);
                    var diffYears = today.getFullYear() - pastDate.getFullYear();
                    if (response.sex == 1) {
                        var sex = "ชาย";
                    } else if (response.sex == 2) {
                        var sex = "หญิง";
                    } else {
                        var sex = "อื่น";
                    }
                    $("#hn").val(response.hn);
                    $("#cid").val(response.cid);
                    $("#pname").val(response.pname);
                    $("#fname").val(response.fname);
                    $("#lname").val(response.lname);
                    $("#age").val(diffYears);
                    $("#sex").val(sex);
                    $("#addr").val(response.addr);
                    $("#moopart").val(response.address.mooparth);
                    $("#amppart").val(response.address[1]);
                    $("#tmbpart").val(response.address[0]);
                    $("#chwpart").val(response.address[2]);
                    $("#opd_allergy").val(response.allergy);
                } else {
                    alert('ไม่พบเลข Cid')
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
                }
                DrugItemdetailDes(response.hn)
                DrugLabs(response.hn)
            },
        });
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
            },
        });
    };
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

    // Add Truma 
    let rowCount = 0
    const TrumaAdd = () => {
        const tableBody = document.querySelector("#TrumaTable tbody");
        const newRow = document.createElement("tr");
        let numCount = ++rowCount
        newRow.innerHTML = `
        <td><input class="form-control" type="text" name="e" /></td>
        <td><input class="form-control" type="text" name="v" /></td>
        <td><input class="form-control" type="text" name="m" /></td>
        <td><input class="form-control" type="text" name="pupilR" /></td>
        <td><input class="form-control" type="text" name="pupilL" /></td>
        <td><input class="form-control" type="text" name="Tc" /></td>
        <td><input class="form-control" type="text" name="prF" /></td>
        <td><input class="form-control" type="text" name="pfM" /></td>
        <td><input class="form-control" type="text" name="bp" placeholder="bp" /></td>
        <td><input class="form-control" type="text" name="mmHg" placeholder="mmhg" /></td>
        <td><input class="form-control" type="text" name="spo2" /></td>
        <td><button class="btn btn-danger" onclick="deleteTurmaTr(this,${numCount})">Delete</button></td>
    `;

        $("#numTruma").val(numCount);
        tableBody.appendChild(newRow);
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
    }
    // drug Item Labs
    function DrugLabs(hn) {

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

                    for (let i = 0; i < optimereceItems.length; i++) {
                        let item = optimereceItems[i];

                        html +=
                            '<tr><td style="width: fit-content"><input type="checkbox" name="itemCheckbox" value=\'{"date": "' +
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
                            item.therapeutic +
                            '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
                            item.unit +
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
                        '</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>LabItemCode</th><th>LabItemName</th><th>LabItemNameNormalValue</th><th>lab_items_normal_value</th></tr></thead><tbody>';
                    for (let i = 0; i < data[date].length; i++) {
                        let item = data[date][i];

                        html +=
                            '<tr><td style="width: fit-content"><input type="checkbox" name="itemCheckboxlabs" value=\'{"date": "' +
                            date + '", "lab_items_code": "' + item.lab_items_code + '", "lab_items_name": "' + item.lab_items_name +
                            '", "lab_items_normal_value": "' + item.lab_items_normal_value + '"}\'></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' + item
                            .lab_items_code + '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' + item
                            .lab_items_name + '"></td>' +
                            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' + item
                            .lab_items_normal_value + '"></td></tr>';

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

        // เรียกใช้งาน plugin treeview ของ Bootstrap 5

        // เพิ่มการเชื่อมต่อกับ checkbox
        const checkboxes = document.querySelectorAll('input[name="itemCheckbox"]');


        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', toggleCheckbox);
        });

        // ฟังก์ชันเพื่อเปิด/ปิด checkbox แต่ละรายการ
        function toggleCheckbox(event) {
            const checkbox = event.target;
            const allChecked = Array.from(checkboxes).every((checkbox) => checkbox.checked);

        }

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
            $("#OtherCase").show();
        } else {
            $("#OtherCase").hide();
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