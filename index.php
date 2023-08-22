<!DOCTYPE html>
<html lang="en">
<?php include("./connect/file.refer.connec.php");

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <SCRIPT language="JavaScript">

    </SCRIPT>

</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container-xl p-3 my-3 border " style="background-color: #E8E8E8;border-radius: 25px; width: 1000px; height: 500px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <form action="loginuser.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success mb-3">หน้าผู้ใช้งาน</button>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary mb-3 mx-2" data-bs-toggle="modal" href="#sysconf-dbrefer" role="button" type="button">ตั้งค่าการเชื่อมต่อฐานข้อมูล/API</button>


            </div>
        </div>
        <div class="modal fade" id="sysconf-dbrefer" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered  modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="card-title">ตั้งค่า ระบบ</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-horizontal" id="myfrom-sendconect-refer">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">ตั้งค่าข้อมูลรพ </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row mb-2">
                                                <label for="inputPassword3" class="col-lg-2 col-form-label">รหัสหน่วยบริการ</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="hosCode" id="hosCode" value="<?php if ($hosCode != "") echo $hosCode; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label for="inputPassword3" class="col-lg-2  col-form-label">ชื่อหน่วยบริการ</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="hosName" id="hosName" value="<?php if ($hosName != "") echo $hosName; ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">ตั้งค่า ระบบ Refer </h3>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">DB:TYPE </label>
                                                <input type="hidden" name="connect-type" id="conttent-type-refer" value="refer" />
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select class="form-control" id="selec-typedb-thairefer" name="selec-typedb-thairefer">
                                                            <option value="Mysql" <?php if ($dbTypeRefer == "MYSQL") echo 'selected="selected"'; ?>>
                                                                MYSQL</option>
                                                            <option value="PostGreSql" <?php if ($dbTypeRefer == "PostGreSql") echo 'selected="selected"'; ?>>
                                                                POSTGRESS
                                                            </option>
                                                            <!-- <option value="SqlServer" <?php if ($dbTypeHis == "SQLSERVER") echo 'selected="selected"'; ?>>
                                                                SQLSERVER
                                                            </option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Server
                                                    Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="server-name-thairefer" name="server-name-thairefer" value="<?php echo $serverRefer; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Database
                                                    Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="database-name-thairefer" readonly name="database-name-thairefer" value="<?php if ($dbNameRefer == null || $dbNameHis == "") {
                                                                                                                                                                            echo "referdb_hos";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $dbNameRefer;
                                                                                                                                                                        } ?>">
                                                </div>
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">User
                                                    ID:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="use-id-thairefer" name="use-id-thairefer" value="<?php echo $userRefer; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control" name="user-password-thairefer" id="user-password-thairefer" value="<?php echo $passRefer; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">PORTREFER:</label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="portRefer" id="portRefer" value="<?php echo $portRefer; ?>">
                                                </div>
                                            </div>
                                            <!-- //?card body-->
                                            <div class="card footer">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="onTestConnect('refer')">ทดสอบการเชื่อมต่อระบบ REFER</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //* /  -->
                                    <div class="col-lg-12">
                                        <!-- Horizontal Form -->
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">ตั้งค่า HIS </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">TYPE:Connect</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select class="form-control" name="select-type-connect" id="select-type-connect" onchange="TypeConnect(this.value)">
                                                                <option value="NonConnect" select>
                                                                    ---ระบุประเภทการเชื่อมต่อ---
                                                                </option>
                                                                <option value="ConnectToDb" <?php if ($typeConnect == "ConnectToDb") echo 'selected="selected"'; ?>>
                                                                    ConnectToDb
                                                                </option>
                                                                <option value="ConnectToAPI" <?php if ($typeConnect == "ConnectToAPI") echo 'selected="selected"'; ?>>
                                                                    ConnectToAPI
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="HISDB" style="display:none;">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">DB-HIS:TYPE</label>
                                                        <div class="col-sm-4">
                                                            <input type="hidden" name="connect-type-his" id="connect-type-his" value="his" />
                                                            <div class="form-group">
                                                                <select class="form-control" name="select-typedb-his" id="select-typedb-his">
                                                                    <option value="Mysql" <?php if ($dbTypeHis == "MYSQL") echo 'selected="selected"'; ?>>
                                                                        MYSQL
                                                                    </option>
                                                                    <option value="PostGreSql" <?php if ($dbTypeHis == "PostGreSql") echo 'selected="selected"'; ?>>
                                                                        POSTGRESS
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">HISType</label>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select class="form-control" name="select-type-his" id="select-type-his">
                                                                    <option value="hosxp.hospcu" <?php if ($hisType == "hosxp-hospcu") echo 'selected="selected"'; ?>>
                                                                        hosxp v3,v4-hospcu
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Server
                                                            Name</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="sever-name-his" id="sever-name-his" value="<?php echo $serverHis; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Database
                                                            Name</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="database-name-his" id="database-name-his" value="<?php echo $dbNameHis; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">User
                                                            ID:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="use-id-his" id="use-id-his" value="<?php echo $userHis; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" name="user-password-his" id="user-password-his" value="<?php echo $passHis; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">PORTRHos:</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control" name="portHis" id="portHis" value="<?php echo $portHis; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="card footer">
                                                        <button type="button" class="btn btn-primary" onclick="onTestConnect('His')">ทดสอบการเชื่อมต่อระบบ
                                                            His
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="HISAPI" style="display:none;">
                                                    <div class="col-sm-12">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">URL</label>
                                                        <input type="text" class="form-control" name="url-token-his" id="url-token-his" placeholder="https://xxxx.moph.go.th" value="<?php echo $callUrl; ?>">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">PathTestConnect</label>
                                                        <input type="text" class="form-control" name="url-token-testconnect" id="url-token-testconnect" placeholder="/testconnect" value="<?php echo $testconnect; ?>">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Apiเรียก HN หรือ CID</label>
                                                        <input type="text" class="form-control" name="url-end-point" id="url-end-point" placeholder="/endpoint" value="<?php echo $endPoint; ?>">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">input Token</label>
                                                        <input type="password" class="form-control" name="key-token-his" id="key-token-his" value="<?php echo decryptPassword($calToken); ?>">
                                                    </div>
                                                    <div class="col-sm mt-3">
                                                        <button type="button" class="btn btn-primary" onclick="TestApi()">ทดสอบ token </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <!-- /.card-info -->
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="ConnecT()" class="btn btn-info">บันทึกการตั้งค่า</button>
                        </div>
                        <!-- //?card body-->
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.4.0/dist/axios.min.js"></script>
    <SCRIPT language="JavaScript">
        const TypeConnect = () => {

            if ($("#select-type-connect").val() == "NonConnect") {
                return console.log($("#select-type-connect").val())
            }
            if ($("#select-type-connect").val() == "ConnectToDb") {

                $("#HISDB").show();
                $("#HISAPI").hide();

            } else if ($("#select-type-connect").val() == "ConnectToAPI") {
                $("#HISDB").hide();
                $("#HISAPI").show();

            }

        }

        function getRefer(listTarget) {
            const url = "https://api.srbr.in.th/refer/api/patient/";

            const headers = {
                "Content-Type": "application/json",
                "X-API-Key": "pvoNArKhGdKK9oDl@fTSsDjG8XzptHlxIXR!3JRjzUJhDRbkalaWD"
            };

            return axios.post(url, listTarget, {
                headers: headers
            });
        }

        const listTarget = {
            "hospcode": "10661",
            "cid": "11111111111",
            "hn": "1015555"
        };

        getRefer(listTarget)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error("เกิดข้อผิดพลาด:", error);
            });
        const TestApi = () => {
            const urlTokenHis = $("#url-token-his").val();
            const testConnect = $("#url-token-testconnect").val();
            const keyTokenHis = $("#key-token-his").val();
            let result = urlTokenHis.concat(testConnect);

            if (urlTokenHis != "" && keyTokenHis != "") {
                $.ajax({
                    headers: {
                        "x-access-key-token": keyTokenHis
                    },
                    type: "POST",
                    url: `${result}`,
                    data: {
                        data: {
                            urlTokenHis
                        }
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status == 200) {
                            alert("เชื่อมต่อข้อมูลถูกต้อง")
                        } else if (response.status == 500) {
                            alert("Token ไม่ถูกต้อง")
                        } else if (response.status == 400) {
                            alert("ข้อมูลไม่ถูกต้อง")
                        }
                    }
                });
            }

        }
        TypeConnect();
        const ConnecT = () => {
            if ($("#hosCode").val() == "" || $("#hosName").val() == "") {
                alert("ระบุข้อมูล รพ.")
            } else {
                let formConnect = new FormData(document.getElementById('myfrom-sendconect-refer'))
                $.ajax({
                    type: "POST",
                    url: "./controller/r_w_controller.php",
                    data: formConnect,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('ตั้งค่าการเชื่อมต่อเสร็จสิ้น')
                    }
                });
            }
        }
        const onTestConnect = (params) => {
            if (params == "refer") {
                const contentTypeRefer = $("#conttent-type-refer").val();
                const dbTypeRefer = $("#selec-typedb-thairefer").val();
                const serverNameRefer = $("#server-name-thairefer").val();
                const databaseNameUseRefer = $("#database-name-thairefer").val();
                const userNameRefer = $("#use-id-thairefer").val();
                const passwordRefer = $("#user-password-thairefer").val();
                const portRefer = $("#portRefer").val()
                $.ajax({
                    type: "POST",
                    url: "./connect/test.refer.connect.php",
                    data: {
                        contentTypeRefer,
                        dbTypeRefer,
                        serverNameRefer,
                        databaseNameUseRefer,
                        userNameRefer,
                        passwordRefer,
                        portRefer
                    },
                    dataType: "JSON",
                    success: function(response) {
                        alert(response.status)
                    }
                });
            } else if (params == "His") {
                const contentTypeHis = $("#connect-type-his").val();
                const dbTypeHis = $("#select-typedb-his").val();
                const hisType = $("#select-type-his").val();
                const serverNameHis = $("#sever-name-his").val();
                const databaseNameUseHis = $("#database-name-his").val();
                const userNameHis = $("#use-id-his").val();
                const passwordHis = $("#user-password-his").val();
                const portHis = $("#portHis").val();
                $.ajax({
                    type: "POST",
                    url: "./connect/test.refer.connect.php",
                    data: {
                        contentTypeHis,
                        dbTypeHis,
                        hisType,
                        serverNameHis,
                        databaseNameUseHis,
                        userNameHis,
                        passwordHis,
                        portHis
                    },
                    dataType: "JSON",
                    success: function(response) {
                        alert(response.status)
                    }
                });
            }
        }


        function en_username() {
            e_k = event.keyCode
            if (e_k == 13) {
                event.returnValue = false;
                document.formlogin.hos_code.focus();
            }
        }

        function en_pass() {
            e_k = event.keyCode
            if (e_k == 13) {
                event.returnValue = false;
                document.formlogin.pass_code.focus();
            }
        }
    </SCRIPT>
</body>

</html>