<?php
session_start();
include_once("./connect/file.refer.connec.php");
if ($countRwController == 0) { ?>
    <script>
        alert("ทำการตั้งค่าการเชื่อมต่อ");
        location.href = "https://rh4.moph.go.th/refer/login.php";
    </script>
<?php }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>เข้าสู่ระบบ Refer</title>
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

    <style>
        body {
            margin: 0;
            padding-bottom: 3rem;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        #form {
            background: rgba(0, 0, 0, 0.15);
            padding: 0.25rem;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            height: 3rem;
            box-sizing: border-box;
            backdrop-filter: blur(10px);
        }

        #input {
            border: none;
            padding: 0 1rem;
            flex-grow: 1;
            border-radius: 2rem;
            margin: 0.25rem;
        }

        #input:focus {
            outline: none;
        }

        #form>button {
            background: #333;
            border: none;
            padding: 0 1rem;
            margin: 0.25rem;
            border-radius: 3px;
            outline: none;
            color: #fff;
        }

        #messages {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #messages>li {
            padding: 0.5rem 1rem;
        }

        #messages>li:nth-child(odd) {
            background: #efefef;
        }
    </style>

</head>
<?php
if (isset($_POST['submitPost'])) {
    $_SESSION["hosCode"] = $_POST['hosCode'];
    $_SESSION["hosName"] = $_POST['hosName'];
    $_SESSION["passCode"] = $_POST['passCode'];
    $_SESSION["hosOpreator"] = $_POST['hosOpreator'];
?>
    <script type="text/javascript">
        window.location.href = 'indexfromuse.php?onfrom=referoutDestinationtable';
    </script>
<?php } ?>

<body>
    <ul id="messages"></ul>
    <div id="FormSync">
        <div class="container ">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="row">
                    <div class="col">
                        <div class="card" style="background-color: #E8E8E8;border-radius: 25px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="card-header">
                                <h4 class="panel-title" align="center">เข้าระบบ Refer</h4>
                            </div>
                            <div class="row">

                            </div>
                            <div class="card-body">
                                <form role="form" id="formlogin" method="post" name="formlogin">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="problem_repair" class="form-label">HosCode : <span class="text-danger">*</span></label>
                                            <input class="form-control" id="hosCodeCheck" name="hosCodeCheck" placeholder="Username" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="problem_repair" class="form-label">Password (รหัส HosCode): <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" id="passCodeCheck" name="passCodeCheck" placeholder="Password">
                                        </div>

                                        <br>
                                        <button class="btn btn-lg btn-success btn-block" type="button" onClick="Login();">เช็ค Sync </button>
                                        <a href="loginadmin.php" class="btn btn-lg btn-primary" type="button">หน้าการตั้งค่าระบบ Refer </a>
                                        <a href="register.php" class="btn btn-lg btn-dark   " type="button">สมัครเข้าใช้งาน </a>

                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ActionForm">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="row">
                    <div class="col">
                        <div class="card" style="background-color: #E8E8E8;border-radius: 25px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="card-header">
                                <h4 class="panel-title">ลงชื่อเข้าใช้งานระบบ (User)</h4>
                            </div>
                            <div class="row">

                            </div>
                            <div class="card-body">
                                <form role="form" id="formlogin" method="post" name="formlogin">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="hoscode" class="form-label">hosCode : <span class="text-danger">*</span></label>
                                            <input class="form-control" id="hoscode" name="hosCode" readonly placeholder="Username" readonly type="text" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="hosName" class="form-label">hosName : <span class="text-danger">*</span></label>
                                            <input class="form-control" id="hosName" name="hosName" readonly placeholder="hosName" readonly type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="passcode" class="form-label">Token : <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" id="passcode" name="passCode" readonly placeholder="Password">
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for="passcode" class="form-label">แผนกเข้าใช้งาน : <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <label for=""></label>
                                                <select class="form-control" id="hosOpreator" name="hosOpreator">
                                                    <option value="ER">ER</option>
                                                    <option value="OPD">OPD</option>
                                                    <option value="WARD">WARD</option>
                                                </select>
                                            </div>

                                        </div>
                                        <br>
                                        <button class="btn btn-lg btn-success btn-block" name="submitPost" type="submit" value="submit">เข้าสู่ระบบ
                                        </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script language="JavaScript">
    $("#ActionForm").hide()

    function Login() {

        let hosCodeCheck = $("#hosCodeCheck").val()
        let passCodeCheck = $("#passCodeCheck").val();
        let opreator = $("#opreator").val();
        if (hosCodeCheck != '' && passCodeCheck != "") {
            $.ajax({
                type: "POST",
                url: "https://rh4cloudcenter.moph.go.th:3000/referapi/login",

                data: {
                    hosCode: hosCodeCheck,
                    password: passCodeCheck,
                    opreator: opreator
                },
                dataType: "JSON",
                success: function(response) {
                    // ถ้ามี response 
                    if (response.data.message == "noUser") {
                        alert('No User Password')
                        return false
                    }
                    $("#hoscode").val(response.data.hosCode)
                    $("#hosName").val(response.data.hosName)
                    $("#passcode").val(response.data.passCode)
                    $("#ActionForm").show();
                    $("#FormSync").hide();
                }
            })
        } else {
            if (hosCodeCheck == "") {
                alert("กรุณากรอก รหัสโรงพยาบาล(hoscode)")
                return false

            }
            if (passCodeCheck == "") {
                alert("กรุณากรอก รหัสผ่าน(password)")
            }
        }
    }
</script>