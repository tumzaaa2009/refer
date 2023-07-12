<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include_once("./connect/file.refer.connec.php");
$userRoles = json_decode($_SESSION["mySession"][6]); // แสดงรายการตาม session
 
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

        .toast-black {
            color: black !important;
            font-size: 18px;
            opacity: 1 !important;
        }
    </style>
</head>
<?php if ($_SESSION['mySession']) {
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
                    <!-- SidebarSearch Form -->
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-header">การตั้งค่าระบบ</li>
                            <li class="nav-item <?php echo (in_array('user', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=user" class="nav-link <?php echo ($_GET['onfrom'] == 'user') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>เพิมผู้ใช้ระบบ</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('doctor', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=doctor" class="nav-link <?php echo ($_GET['onfrom'] == 'doctor') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>รายการหมอที่รับผิดชอบ</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('ICD10', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=icd10" class="nav-link <?php echo ($_GET['onfrom'] == 'icd10') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>รายการ ICD10</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('station', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=station" class="nav-link <?php echo ($_GET['onfrom'] == 'station') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>รายการ หน่วยบริการ</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('department', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=department" class="nav-link <?php echo ($_GET['onfrom'] == 'department') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>รายการ ห้องตรวจ</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('clinincgroup', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=ClinicG" class="nav-link <?php echo ($_GET['onfrom'] == 'ClinicG') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>รายการ ClinicGrop</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('car', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=car" class="nav-link <?php echo ($_GET['onfrom'] == 'car') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>ทะเบียนรถยนต์</p>
                                </a>
                            </li>
                            <li class="nav-item <?php echo (in_array('canclecase', $userRoles)) ? '' : 'd-none' ?>">
                                <a href="indexadmin.php?onfrom=canclecase" class="nav-link <?php echo ($_GET['onfrom'] == 'canclecase') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>เหตุผลการยกเลิกเคส</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="indexadmin.php?destroy" class="nav-link" name="destroySession" value="Logout">
                                    <i class="nav-icon far fa-circle text-warning"></i> Logout
                                </a>
                            </li>
                            <!-- </ul> -->
                            <!-- </li> -->
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
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <section class="col-lg-12">
                                <div id="form-refer" style="margin-top:12px;">
                                    <?php
                                    if (isset($_GET['onfrom'])) {
                                        $pageActive = '';
                                        if ($_GET['onfrom'] == "user") {
                                            $includedFile = './form/ManageAdmin/Muser/table.user.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "useradd") {
                                            $includedFile = './form/ManageAdmin/Muser/add.user.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "doctor") {
                                            $includedFile = './form/ManageAdmin/Mdoctor/table.doctor.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "doctoradd") {
                                            $includedFile = './form/ManageAdmin/Mdoctor/add.doctor.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "icd10") {
                                            $includedFile = './form/ManageAdmin/Micd10/table.icd10.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "station") {
                                            $includedFile = './form/ManageAdmin/Mstation/table.station.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "department") {
                                            $includedFile = './form/ManageAdmin/Mdepartment/table.department.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                            $pageActive = "active";
                                        } else if ($_GET['onfrom'] == "departmentadd") {
                                            $includedFile = './form/ManageAdmin/Mdepartment/add.department.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                        } else if ($_GET['onfrom'] == "car") {
                                            $includedFile = './form/ManageAdmin/Mcar/table.car.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                        } else if ($_GET['onfrom'] == "caradd") {
                                            $includedFile = './form/ManageAdmin/Mcar/add.car.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                        } else if ($_GET['onfrom'] == "canclecase") {
                                            $includedFile = './form/ManageAdmin/Mcase/table.case.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                        } else if ($_GET['onfrom'] == "addcasecancle") {
                                            $includedFile = './form/ManageAdmin/Mcase/add.case.php';
                                            include($includedFile);
                                            $includedFileName = basename($includedFile);
                                        }
                                    } ?>
                                </div>
                            </section>
                            <!-- /.Left col -->
                            <!-- right col (We are only adding the ID to make the widgets sortable)-->

                            <!-- right col -->
                        </div>
                        <!-- /.row (main row) -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <div id="audio-container"></div>
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

        <!-- ??Api -->
        <script src="./api/Backend/ScriptRefer.js"></script>
    </body>
<?php } else { ?>
    <script>
        alert("ไม่พบ SESSION ADMIN");
        location.href = "index.php";
    </script>
<?php } ?>
<script>
    const callPathRefer = '<?php echo $callPathRefer; ?>'
    $(document).ready(function() {
        $('.select2').select2()
        var onfrom = '<?php echo isset($_GET['onfrom']) ? $_GET['onfrom'] : ""; ?>';
        // ตรวจสอบค่าและใช้ในส่วนอื่น ๆ ของโค้ด JavaScript
        if (onfrom === "user") {
            getUser()
        } else if (onfrom === "doctor") {
            getTableDoctor();
        } else if (onfrom === "icd10") {

        } else if (onfrom === "station") {
            TableStation();
        } else if (onfrom === "department") {
            TableDepartment();
        } else if (onfrom === "car") {
            TableCar();
        } else if (onfrom === "canclecase") {
            GetTableCancleCase();
        }



    });

    function getUser() {
        const arrDoctor = [];
        $.ajax({
            type: `POST`,
            url: `${callPathRefer}`,
            data: {
                tableUser: 1
            },
            dataType: "JSON",
            success: function(response) {
                const arrayHosRefer = [];
                const arrayItemRefer = [];
                let statusUser = '';

                response.forEach(function(item) {
                    if (item[0].status == "true") {
                        statusUser = "ใช้งาน"
                    } else {
                        statusUser = "ปิดการใช้งาน"
                    }
                    let selectOptions = ''
                    if (item[0].auth_refer != "") {
                        const json = JSON.parse(item[0].auth_refer);
                        if (json.length > 0) {
                            selectOptions = `<select class="select2" multiple="multiple" name="authRefer[]"  onchange="editUser(event.target.selectedOptions,${item[0].id},'authRefer')" data-placeholder="เลือกระดับการเข้าถึง" style="width: 100%;">`;
                            const userOption = `<option value="user" ${json.includes('user') ? 'selected' : ''}>เมนูผู้ใช้งาน</option>`;
                            const doctorOption = `<option value="doctor" ${json.includes('doctor') ? 'selected' : ''}>เมนูหมอ</option>`;
                            const station = `<option value="station" ${json.includes('station') ? 'selected' : ''}>หน่วยบริการ</option>`;
                            const department = `<option value="department" ${json.includes('department') ? 'selected' : ''}>ห้องตรวจ</option>`;
                            const car = `<option value="car" ${json.includes('car') ? 'selected' : ''}>รถ Refer</option>`;
                            const cancleCase = `<option value="canclecase" ${json.includes('canclecase') ? 'selected' : ''}>เหตุผลการยกเลิกเคส</option>`
                            selectOptions += userOption + doctorOption + station + department + car + cancleCase + `</select>`;
                        }
                    } else if (item[0].auth_refer == "null") {
                        selectOptions = `<select class="select2" multiple="multiple" name="authRefer[]"  onchange="editUser(event.target.selectedOptions,${item[0].id},'authRefer')" data-placeholder="เลือกระดับการเข้าถึง" style="width: 100%;">`;
                        const userOption = `<option value="user" >เมนูผู้ใช้งาน</option>`;
                        const doctorOption = `<option value="doctor" >เมนูหมอ</option>`;
                        const station = `<option value="station">สถานที่บริการ</option>`;
                        const department = `<option value="department" >ห้องตรวจ</option>`;
                        const car = `<option value="department" ${json.includes('car') ? 'selected' : ''}>รถ Refer</option>`;
                        const cancleCase = `<option value="canclecase" ${json.includes('canclecase') ? 'selected' : ''}>เหตุผลการยกเลิกเคส</option>`
                        selectOptions += userOption + doctorOption + station + department + car + cancleCase+`</select>`;
                    }

                    arrayHosRefer.push(
                        `<tr class="refer-row">
                        <td><input type="text" class="form-control" name="userName" value="${item[0].user_name}" onchange="editUser(event.target.value,${item[0].id},'userName')"></td>
                        <td><input type="text" class="form-control" name="userPassWord" value="${item[0].user_password}" onchange="editUser(event.target.value,${item[0].id},'userPassWord')"></td>
                        <td><input type="text" class="form-control" name="nameUser" value="${item[0].name_user}" onchange="editUser(event.target.value,${item[0].id},'nameUser')"></td>
                        <td><input type="text" class="form-control" name="sectionDetail" value="${item[0].section_detail}" onchange="editUser(event.target.value,${item[0].id},'sectionDetail')"></td>
                        <td><input type="text" class="form-control" name="tel" value="${item[0].tel}" onchange="editUser(event.target.value,${item[0].id},'tel')"></td>
                          <td>${selectOptions}</td>
                                <td>
                                <select class="form-select" id="status" name="status" onchange="editUser(event.target.value,${item[0].id},'status')">
                                    <option value="true" ${item[0].status === "true" ? 'selected' : ''}>เปิดการใช้งาน</option>
                                    <option value="false" ${item[0].status === "false" ? 'selected' : ''}>ปิดการใช้งาน</option>
                                </select>
                                </td>
                                <td>
                                <button onclick="editDoctorname(event.target.value,${item[0].id},'del')" class="btn btn-primary mb-3" role="button">ลบ User</button>
                            </td>
            </tr>`
                    );

                    arrayItemRefer.push(item);
                });

                const table = $("#TableUser").DataTable({
                    destroy: true,
                });
                table.clear().draw();
                table.rows.add($(arrayHosRefer.join(""))).draw();

                // เพิ่มโค้ด Select2 initialization
                $(".select2").select2({
                    multiple: true,
                    placeholder: "เลือกระดับการเข้าถึง",
                    width: "100%"
                });

            }
        });
    }

    function AddUser() {
        const form = document.getElementById("refer-user-add");
        const formData = new FormData(form);
        let isFormValid = true;

        // ตรวจสอบว่ามีฟิลด์ใดฟิลด์หนึ่งไม่ได้ระบุค่า
        for (let pair of formData.entries()) {
            if (!pair[1]) {
                isFormValid = false;
                $("#" + pair[0]).focus();
                break;
            }
        }

        if (isFormValid) {
            $.ajax({
                type: "POST",
                url: `${callPathRefer}`,
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    if (response[0].status === true) {
                        toastr.success(`บันทึกสำเร็จ`, "", {
                            positionClass: "toast-top-full-width",
                            timeOut: false,
                            extendedTimeOut: "1000",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            closeButton: true,
                            toastClass: "toast-black"

                        });

                    } else {
                        toastr.error(`ผิดพลาด`, "", {
                            positionClass: "toast-top-full-width",
                            timeOut: false,
                            extendedTimeOut: "1000",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            closeButton: true,
                            toastClass: "toast-black"
                        });
                    }
                }
            });
        } else {
            alert("กรุณากรอกข้อมูลให้ครบทุกฟิลด์");
        }
    }

    function getTableDoctor() {
        const arrDoctor = [];
        $.ajax({
            type: `POST`,
            url: `${callPathRefer}`,
            data: {
                Doctor: 1
            },
            dataType: "JSON",
            success: function(response) {
                const arrayHosRefer = [];
                const arrayItemRefer = [];
                let statusDoctor = '';
                response.forEach(function(item) {

                    if (item.StatusDoctor == "true") {
                        statusDoctor = "ใช้งาน"
                    } else {
                        statusDoctor = "ปิดการใช้งาน"
                    }
                    arrayHosRefer.push(
                        `<tr   class="refer-row" ><td><input type="text" class="form-control" name="doctorNameEdit" value="${item.Name}" onchange="editDoctorname(event.target.value,${item.id},'doctorNameEdit')"></td><td>${statusDoctor}</td>     <td>
                <select class="form-select" id="status" name="status" onchange="editDoctorname(event.target.value,${item.id},'status')">
                <option value="true" ${item.StatusDoctor === "true" ? 'selected' : ''}>เปิดการใช้งาน</option>
                <option value="false" ${item.StatusDoctor === "false" ? 'selected' : ''}>ปิดการใช้งาน</option>
                    </select>
           
            </td>
            <td >
                <button onclick="editDoctorname(event.target.value,${item.id},'del')"  class="btn btn-primary mb-3" role="button">ลบรายการ Refer</button>
            </td></tr>`
                    );
                    arrayItemRefer.push(item);
                });
                // เรียกใช้ DataTable และแสดงผล
                const table = $("#TableDoctor").DataTable({
                    destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
                });
                table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
                table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable

            }
        });
    }

    function AddDoctor() {
        const form = document.getElementById("refer-doctor-add");
        const formData = new FormData(form);
        // ส่งข้อมูลผ่าน AJAX POST
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`, // เปลี่ยนเส้นทางเป็นไฟล์ PHP ที่จัดการข้อมูล
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(response) {
                // ประมวลผลหลังจากส่งข้อมูลสำเร็จ

                if (response[0].status === true) {
                    toastr.success(`บันทึกสำเร็จ`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "1000",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });

                } else {
                    toastr.error(`ผิดพลาด`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "1000",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                }
            }

        });
    }

    function editUser(value, id, source) {
        if (source == "authRefer") {

            value = Array.from(value).map(option => option.value);
            if (value == "") value = "null";

        }
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                resultEditUser: value,
                id: id,
                source: source
            },
            dataType: "JSON",
            success: function(response) {
                if (response[0].status === true) {
                    toastr.success(`บันทึกสำเร็จ  การแก้สิทธิ์ต้อง logout ระบบก่อน และlogin ใหม่`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "1000",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                    getUser();

                } else {
                    toastr.error(`ผิดพลาด`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "1000",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                }
            }
        });
    }

    function editDoctorname(value, id, source) {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                resultEditDoctor: value,
                id: id,
                source: source
            },
            dataType: "JSON",
            success: function(response) {
                if (response[0].status === true) {
                    toastr.success(`บันทึกสำเร็จ`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "1000",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                    getTableDoctor();
                } else {
                    toastr.error(`ผิดพลาด`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "1000",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                }
            }
        });
    }

    function TableIcd10() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                icd10Table: "on"
            },
            dataType: "JSON",
            success: function(response) {

            }
        });
    }

    function TableStation() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                tableStation: 1
            },
            dataType: "JSON",
            success: function(response) {
                let arrayStation = [];

                response.forEach(function(item) {
                    arrayStation.push(
                        `<tr class="refer-row" >
                        <td>
                        <input type="text" class="form-control" name="stationName" value="${item.data.station_name}" onchange="EditDelStation(event.target.value,${item.data.station_id},'stationName')">
                        </td>
                        <td >
                            <button onclick="EditDelStation(event.target.value,${item.data.station_id},'del')"  class="btn btn-primary mb-3" role="button">ลบรายการ Refer</button>
                        </td>
                    </tr>`
                    );
                    arrayStation.push(item);
                });
                // เรียกใช้ DataTable และแสดงผล
                const table = $("#TableStation").DataTable({
                    destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
                });
                table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
                table.rows.add($(arrayStation.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
            }
        });
    }

    async function AddStation() {
        const valueInputstation = await CallBackStation($("#namestaion").val(), $("#hosCode").val());
        if (valueInputstation != "") {

            $.ajax({
                type: "POST",
                url: "https://rh4cloudcenter.moph.go.th:3000/referapi/createstation",
                data: valueInputstation,
                dataType: "JSON",
                success: function(response) {
                    toastr.success(`เพิ่มแล้ว`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "500",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                }
            });
        } else {
            toastr.error(`ผิดพลาด`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });

        }
    }
    async function CallBackStation(staion, hosCode) {
        return new Promise((resolve) => {
            $.ajax({
                type: "POST",
                url: `${callPathRefer}`,
                data: {
                    station: staion,
                    hosCode: hosCode
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status == true)
                        resolve({
                            valueHoscode: response.hosCode,
                            resStation: response.res
                        });
                }
            });

        });
    }

    async function EditDelStation(value, id, source) {
        const valueInputstation = await CallBackEditDelStation(value, id, source)
        if (valueInputstation != "") {
            $.ajax({
                type: "POST",
                url: "https://rh4cloudcenter.moph.go.th:3000/referapi/createstation",
                data: valueInputstation,
                dataType: "JSON",
                success: function(response) {

                }
            });
        } else {
            toastr.error(`ผิดพลาด`, "", {
                positionClass: "toast-top-full-width",
                timeOut: false,
                extendedTimeOut: "1000",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                closeButton: true,
                toastClass: "toast-black"
            });

        }

    }
    async function CallBackEditDelStation(value, id, source) {
        const hosCode = '<?php echo $hosCode ?>';
        return new Promise((resolve) => {
            $.ajax({
                type: "POST",
                url: `${callPathRefer}`,
                data: {
                    stationValue: value,
                    stationId: id,
                    stationSource: source,
                    hosCode: hosCode
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status == true)
                        toastr.success(`เสร็จสิน้`, "", {
                            positionClass: "toast-top-full-width",
                            timeOut: false,
                            extendedTimeOut: "500",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            closeButton: true,
                            toastClass: "toast-black"
                        });
                    TableStation();

                    resolve({
                        valueHoscode: hosCode,
                        resStation: response.res

                    });
                }
            });
        });
    }

    function TableDepartment() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                Department: 1
            },
            dataType: "JSON",
            success: function(response) {
                let arrayDepartment = [];
                response.forEach(function(item) {

                    arrayDepartment.push(
                        `<tr class="refer-row" >
                        <td>
                        <input type="text" class="form-control" name="departmentName" value="${item.name}" onchange="EditDelDepartment(event.target.value,${item.id},'departmentName')">
                        </td>
                        <td >
                            <button onclick="EditDelDepartment(event.target.value,${item.id},'del')"  class="btn btn-primary mb-3" role="button">ลบรายการ ห้องตรวจ ${item.name}</button>
                        </td>
                    </tr>`
                    );
                    arrayDepartment.push(item);
                });
                // เรียกใช้ DataTable และแสดงผล
                const table = $("#TableDepartment").DataTable({
                    destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
                });
                table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
                table.rows.add($(arrayDepartment.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
            }
        });
    }

    function AddDepatMent() {
        const nameDeapartMent = $("#namedepartment").val()
        if (nameDeapartMent == "") alert("กรุณาระบบ ห้องตรวจ");
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                nameDeapartMent: nameDeapartMent
            },
            dataType: "JSON",
            success: function(response) {
                if (response == true)
                    toastr.success(`บันทึกเสร็จสิ้น`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "500",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                TableDepartment()
            }
        });
    }

    function EditDelDepartment(value, id, source) {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                departmentValue: value,
                departmentId: id,
                departmentSource: source,
            },
            dataType: "JSON",
            success: function(response) {
                if (response[0].status == true)
                    toastr.success(`เสร็จสิน้`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "500",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                TableDepartment();
            }
        });
    }

    function TableCar() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                car: 1
            },
            dataType: "JSON",
            success: function(response) {
                let arrayDepartment = [];
                response.forEach(function(item) {
                    arrayDepartment.push(
                        `<tr class="refer-row" >
                        <td>
                        <input type="text" class="form-control" name="departmentName" value="${item.name}" onchange="EditDelCar(event.target.value,${item.id},'carName')">
                        </td>
                        <td >
                            <button onclick="EditDelCar(event.target.value,${item.id},'del')"  class="btn btn-primary mb-3" role="button">ลบรายการ  ${item.name}</button>
                        </td>
                    </tr>`
                    );
                    arrayDepartment.push(item);
                });
                // เรียกใช้ DataTable และแสดงผล
                const table = $("#TableCar").DataTable({
                    destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
                });
                table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
                table.rows.add($(arrayDepartment.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
            }
        });
    }

    function AddRegCar() {
        const form = document.getElementById("reg-car");
        const formData = new FormData(form);
        const carReg = formData.get("carReg");
        const hosCode = formData.get("hosCode");
        if (carReg === "" || hosCode === "") {
            alert('กรุณาตรวจสอบข้อมูล')
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: `${callPathRefer}`,
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response[0].status == true)
                        toastr.success(`เสร็จสิน้`, "", {
                            positionClass: "toast-top-full-width",
                            timeOut: false,
                            extendedTimeOut: "500",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            closeButton: true,
                            toastClass: "toast-black"
                        });

                }
            });
        }

    }

    function EditDelCar(value, id, source) {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                carValue: value,
                carId: id,
                carSource: source,
            },
            dataType: "JSON",
            success: function(response) {
                if (response[0].status == true)
                    toastr.success(`เสร็จสิน้`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "500",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                TableCar();
            }
        });
    }

    function GetTableCancleCase() {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                cancleCase: 1
            },
            dataType: "JSON",
            success: function(response) {
                let arrayCancleCase = [];
                response.forEach(function(item) {
                    arrayCancleCase.push(
                        `<tr class="refer-row" >
                        <td>
                        <input type="text" class="form-control" name="departmentName" value="${item.name}" onchange="EditDelCancleCase(event.target.value,${item.id},'detailCase')">
                        </td>
                        <td >
                            <button onclick="EditDelCancleCase(event.target.value,${item.id},'del')"  class="btn btn-primary mb-3" role="button">ลบรายการ  ${item.name}</button>
                        </td>
                    </tr>`
                    );
                    arrayCancleCase.push(item);
                });
                // เรียกใช้ DataTable และแสดงผล
                const table = $("#TableCancleCase").DataTable({
                    destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
                });
                table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
                table.rows.add($(arrayCancleCase.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable

            }
        });
    }


    function AddCancleCase() {
        const form = document.getElementById("reg-case");
        const formData = new FormData(form);
        const carReg = formData.get("carReg");
        const hosCode = formData.get("hosCode");
        if (detailCase === "" || hosCode === "") {
            alert('กรุณาตรวจสอบข้อมูล')
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: `${callPathRefer}`,
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response[0].status == true)
                        toastr.success(`เสร็จสิน้`, "", {
                            positionClass: "toast-top-full-width",
                            timeOut: false,
                            extendedTimeOut: "500",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            closeButton: true,
                            toastClass: "toast-black"
                        });

                }
            });
        }
    }

    function EditDelCancleCase(value, id, source) {
        $.ajax({
            type: "POST",
            url: `${callPathRefer}`,
            data: {
                cancleCaseValue: value,
                cancleId: id,
                cancleSource: source,
            },
            dataType: "JSON",
            success: function(response) {
                if (response[0].status == true)
                    toastr.success(`เสร็จสิน้`, "", {
                        positionClass: "toast-top-full-width",
                        timeOut: false,
                        extendedTimeOut: "500",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        closeButton: true,
                        toastClass: "toast-black"
                    });
                GetTableCancleCase();
            }
        });
    }
</script>

</html>