<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <?php header("Access-Control-Allow-Origin: *"); ?>
    <link href="./css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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

<body>
    <ul id="messages"></ul>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="background-color: #E8E8E8;border-radius: 25px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-header">
                            <h4 class="panel-title">Register</h4>
                        </div>
                        <div class="row">

                        </div>
                        <div class="card-body">
                            <form id="" action="">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="problem_repair" class="form-label">รหัสโรงพยาบาล : <span class="text-danger">*</span></label>
                                        <input class="form-control" id="hosCode" name="hosCode" placeholder="รหัสโรงพยาบาล" onchange="en_hoscode(this.value)" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="problem_repair" class="form-label">ชื่อโรงพยาบาล : <span class="text-danger">*</span></label>
                                        <input class="form-control" id="hosName" name="hosName" placeholder="ชื่อโรงพยาบาล" type="text">
                                        <input class="form-control" id="chwpart" name="chwpart" type="hidden">
                                    </div>
                                    <div class="form-group">
                                        <label for="problem_repair" class="form-label">ชื่อผู้ใช้งาน : <span class="text-danger">*</span></label>
                                        <input class="form-control" id="nameUser" name="nameUser" placeholder="ชื่อผู้ใช้งาน" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="problem_repair" class="form-label">เบอร์โทรศัพท์ผู้ใช้งาน : <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="telUser" name="telUser" placeholder="เบอร์โทรศัพท์">
                                    </div>
                                    <label for="typehos" class="form-label">ประเภทโรงพยาบาล : <span class="text-danger">*</span></label>
                                    <select name="typeHos" class="form-control " id="typeHos">
                                        <option value="" disabled selected>--กรุณาเลือก--</option>
                                        <option value="AS">AS</option>
                                        <option value="M1">M1</option>
                                        <option value="M2">M2</option>
                                        <option value="other">Other<span> : รพ.สต. รพ.ขนาด F1,F</span></option>
                                    </select>
                                    <br>
                                    <input class="btn btn-lg btn-success btn-block" id="send" name="send" type="button" onClick="chklogin();" value="เข้าระบบ">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    // * GET HOSCODE
    function en_hoscode(valueKey) {
        if (valueKey.length == 5) {
            $.ajax({
                type: "POST",
                url: "https://rh4cloudcenter.moph.go.th/referapi/gethoscode",
                data: {
                    hosCode: valueKey
                },
                dataType: "JSON",
                success: function(response) {
                    $("#hosName").val(`${response.msg[0].hosptype}${response.msg[0].name}`)
                    $("#chwpart").val(response.msg[0].chwpart)
                }
            });
        } else {
            document.getElementById("hosCode").blur();
            alert('กรอกรหัสรพไม่ถูกต้อง')

        }

    }

    function chklogin() {

        if ($("#hosCode").val() === "") {
            alert("กรุณาใส่รหัสสถานบริการ");
            $("#hosCode").focus();
        } else if ($("#nameUser").val() === "") {
            alert("กรุณาระบุผู้ใช้งาน");
            $("#nameUser").focus();
        } else if ($("#telUser").val() === "") {
            alert("กรุณาระบุเบอร์ติดต่อ");
            $("#telUser").focus();
        } else {
            $.ajax({
                type: "POST",
                url: "https://rh4cloudcenter.moph.go.th/referapi/createuser",
                data: {
                    hosCode: $("#hosCode").val(),
                    hosName: $("#hosName").val(),
                    nameUser: $("#nameUser").val(),
                    telUser: $("#telUser").val(),
                    typeHos: $("#typeHos").val(),
                    chwpart:$("#chwpart").val()
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data.sqlMessage) {
                        alert("userนี้มีอยู่แล้ว");
                    } else {
                        alert(`รหัส เข้าใช้งาน ระบบ hoscode:${response.data.hos_code} ,รหัสเข้าระบบ:${response.data.hos_code}`);
                        window.location.href = "loginuser.php";
                    }
                }
            });
        }

    }
</script>