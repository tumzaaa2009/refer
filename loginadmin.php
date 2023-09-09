<!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>ลงชื่อเพื่อตั้งค่าระบบ (Admin)</title>


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


 </head>

 <body>
     <?php

        include_once("./connect/file.refer.connec.php");
        ?>
     <div class="container">
         <div class="d-flex justify-content-center align-items-center vh-100">
             <div class="row">
                 <div class="col">
                     <div class="card" style="background-color: #E8E8E8;border-radius: 25px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                         <div class="card-header">
                             <h4 class="panel-title">ลงชื่อเพื่อตั้งค่าระบบ (Admin)</h4>
                         </div>
                         <div class="row">
                         </div>
                         <div class="card-body">
                             <form enctype="multipart/form-data" id="loginFrom">
                                 <div class="form-group">
                                     <label for="problem_repair" class="form-label">Username : <span class="text-danger">*</span></label>
                                     <input class="form-control" id="hosCode" name="userNameAdmin" placeholder="Username" onKeyPress="en_username()" type="text" autofocus value="">
                                 </div>
                                 <div class="form-group">
                                     <label for="problem_repair" class="form-label">Password : <span class="text-danger">*</span></label>
                                     <input class="form-control" type="password" id="userPasswordAdmin" name="userPasswordAdmin" placeholder="Password" onKeyPress="en_pass()">
                                 </div>

                                 <br>
                                 <button type="button" class="btn btn-primary mb-3" onclick="onsing()" type="button">เข้าสู่ระบบ</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
     <SCRIPT language="JavaScript">
         const callPathRefer = '<?php echo $callPathRefer; ?>'

         function onsing() {
             const form = document.getElementById("loginFrom");
             const formData = new FormData(form);
             $.ajax({
                 type: "POST",
                 url: `${callPathRefer}`,
                 data: formData,
                 contentType: false,
                 processData: false,
                 dataType: "JSON",
                 success: function(response) {
                     if (response.status == false) return alert("user นี้ไม่มีในระบบ");
                 
                     // เก็บ session PHP
                     $.ajax({
                         type: "POST",
                         url: "store_session.php", // เปลี่ยนเส้นทางเป็นไฟล์ PHP ที่ใช้เก็บ session
                         data: {
                             sessionData: response.dataRes
                         }, // ส่งข้อมูล session ไปยังไฟล์ PHP
                         success: function() {
                             // เปลี่ยนเส้นทางไปยัง indexadmin.php
                              window.location.href = "indexadmin.php";
                         }
                     });
                 }
             });
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

         //  const myModal = new bootstrap.Modal("#exampleModal");


         //  myModalEl.addEventListener('hidden.bs.modal', function(event) {
         //      // do something...
         //  })
         //  myModal.show();
     </SCRIPT>

 </body>

 </html>