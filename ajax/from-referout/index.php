 <!-- select2 -->
 <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
 <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
 <!-- daterange picker -->
 <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="./dist/css/adminlte.min.css">
 
<?php ?>
 <?php if($_POST['data']=== "onfrom") {?>
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6"> 
                 <h1 class="m-0" id="title-id"> ส่งตัวที่ไป   </h1>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard v1</li>
                 </ol>
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->
 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">ข้อมูลผู้ป่วย</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form>

         <div class="card-body">
          
             <div class="row">
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label><?php echo $fetch['station_name']; ?></label>
                         <select class="form-control select2" style="width: 100%;">
                             <option selected="selected">Alabama</option>
                             <option>Alaska</option>
                             <option>California</option>
                             <option>Delaware</option>
                             <option>Tennessee</option>
                             <option>Texas</option>
                             <option>Washington</option>
                         </select>
                     </div>
                     <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>วันที่รับบริการ</label>

                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                             </div>
                             <input type="text" class="form-control" data-inputmask-alias="datetime"
                                 data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                         </div>
                         <!-- /.input group -->
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>VN:</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>เลขที่บัตรประชาชน</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>HN:</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>คำนำหน้า</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>ชื่อ</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>สกุล</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>อายุ</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>เพศ</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <!-- text input -->
                     <div class="form-group">
                         <label>ที่อยู่</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>หมู่</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>ตำบล</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>อำเภอ</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                         <label>จังหวัด</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-6">
                     <!-- text input -->
                     <div class="form-group">
                         <label>ห้องตรวจ/หอผู้ป่วย</label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <!-- text input -->
                     <div class="form-group">
                         <label>แพ้ยา </label>
                         <input type="text" class="form-control" placeholder="">
                     </div>
                 </div>
             </div>
             <div class="col-12 col-sm-12">
                 <div class="card card-primary card-tabs">
                     <div class="card-header p-0 pt-1">
                         <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                             <li class="nav-item">
                                 <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                     href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                     aria-selected="false">ข้อมูลส่งตัวทั่วไป</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                     href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                                     aria-selected="false">Treatment</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                     href="#custom-tabs-one-messages" role="tab"
                                     aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link " id="custom-tabs-one-settings-tab" data-toggle="pill"
                                     href="#custom-tabs-one-settings" role="tab"
                                     aria-controls="custom-tabs-one-settings" aria-selected="true">Settings</a>
                             </li>
                         </ul>
                     </div>
                     <div class="card-body">
                         <div class="tab-content" id="custom-tabs-one-tabContent">
                             <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-home-tab">
                                 <!-- //! ข้อมูลส่งต่อทั่วไป */ -->
                                 <div class="form-group row">
                                     <label class="col-md-autocol-form-label">สถานพยาบาลปลายทาง</label>
                                     <div class=" col-md-auto">
                                         <select class="form-control select2" style="width: 100%;">
                                             <option selected="selected">Alabama</option>
                                             <option value='1'>Alaska</option>
                                             <option>California</option>
                                             <option>Delaware</option>
                                             <option>Tennessee</option>
                                             <option>Texas</option>
                                             <option>Washington</option>
                                         </select>
                                     </div>

                                     <div class="col-md-auto">
                                         <input type="text" class="form-control" name="hosRefer" id="hosRefer"
                                             aria-describedby="helpId" placeholder="input hos" readonly>
                                     </div>
                                     <label class="col-md-auto col-form-label" style="color:red"
                                         align="left">วันหมดอายุใบนำส่ง</label>

                                     <div class="input-group-prepend col-md-5  col-lg-5 ">
                                         <span class="input-group-text "><i class="far fa-clock"></i></span>
                                         <input type="text" class="form-control float-left" id="reservationtime">
                                     </div>


                                 </div>
                                 <div class="form-group row">
                                     <div class="row">
                                         <div class="col-sm-3">
                                             <!-- text input -->
                                             <div class="form-group">
                                                 <label>เลขที่ใบส่งตัว</label>
                                                 <input type="text" class="form-control" placeholder="**NewId**">
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <!-- text input -->
                                             <div class="form-group">
                                                 <label>เลขที่ใบส่งตัว HIS</label>
                                                 <input type="text" class="form-control" placeholder="">
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <!-- text input -->
                                             <div class="form-group">
                                                 <label>ห้องตรวจปลายทาง</label>
                                                 <input type="text" class="form-control" placeholder="">
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <!-- text input -->
                                             <div class="form-group">
                                                 <label>Level of Acuity:</label>
                                                 <select class="form-control lvlactual" style="width: 100%;">
                                                     <option selected="selected">--เลือกระดับความรุนแรง--</option>
                                                     <option value="Unstable">I : Unstable</option>
                                                     <option value="Stable with High risk of deterioration"> II :
                                                         Stable with High risk of deterioration</option>
                                                     <option value="Stable with Medium risk of deterioration"> III
                                                         : Stable with Medium risk of deterioration</option>
                                                     <option value="Stable with Low risk of deterioration"> IV :
                                                         Stable with Low risk of deterioration </option>
                                                     <option value="Stable with Low risk of deterioration "> IV :
                                                         Stable with Low risk of deterioration </option>
                                                     <option value="Stable with No risk of deterioration"> V :
                                                         Stable with No risk of deterioration</option>
                                                     <option value="OPD-New case">OPD-New case</option>
                                                     <option value="OPD-นัดเดิม">OPD-นัดเดิม</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-auto">
                                             <!-- select -->
                                             <div class="form-group">
                                                 <label>เป็นผู้ป่วยแผนก : </label>
                                                 <select class="form-control">
                                                     <option>option 1</option>
                                                     <option>option 2</option>
                                                     <option>option 3</option>
                                                     <option>option 4</option>
                                                     <option>option 5</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-auto">
                                             <!-- select -->
                                             <div class="form-group">
                                                 <label>ประเภทผู้ป่วย :</label>
                                                 <select class="form-control">
                                                     <option>option 1</option>
                                                     <option>option 2</option>
                                                     <option>option 3</option>
                                                     <option>option 4</option>
                                                     <option>option 5</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-auto">
                                             <div class="form-group">
                                                 <label>วิธีการนำส่ง :</label>
                                                 <select class="form-control">
                                                     <option>option 1</option>
                                                     <option>option 2</option>
                                                     <option>option 3</option>
                                                     <option>option 4</option>
                                                     <option>option 5</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-auto">
                                             <div class="form-group">
                                                 <label>Service Plane :</label>
                                                 <select class="form-control">
                                                     <option>option 1</option>
                                                     <option>option 2</option>
                                                     <option>option 3</option>
                                                     <option>option 4</option>
                                                     <option>option 5</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <div class="form-group">
                                                 <label>ทะเบียนรถนำส่ง :</label>
                                                 <input type="text" class="form-control" name="carRefer" id=""
                                                     aria-describedby="helpId" placeholder="">
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>เหตุผลการส่ง :</label>
                                                 <input type="text" class="form-control" name="" id=""
                                                     aria-describedby="helpId" placeholder="">
                                             </div>
                                         </div>
                                         <div class="col-md-auto">
                                             <div class="form-group">
                                                 <label>แพทย์ผู้สั่ง :</label>
                                                 <select class="form-control select2" style="width: 100%;">
                                                     <option selected="selected">Alabama</option>
                                                     <option>Alaska</option>
                                                     <option>California</option>
                                                     <option>Delaware</option>
                                                     <option>Tennessee</option>
                                                     <option>Texas</option>
                                                     <option>Washington</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label>ระบบการประสานงาน (contract id)</label>
                                             <select class="form-control select2 select2-hidden-accessible"
                                                 style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                 aria-hidden="true">
                                                 <option selected="selected" data-select2-id="3">Alabama</option>
                                                 <option>test</option>
                                                 <option>California</option>
                                                 <option>Delaware</option>
                                                 <option>Tennessee</option>
                                                 <option>Texas</option>
                                                 <option>Washington</option>
                                             </select>
                                         </div>
                                         <div class="form-group col-md-auto">
                                             <div class="row">
                                                 <div class="col-md-auto">
                                                     <label>การประเมินผู้ป่วย</label>
                                                     <select class="form-control select2 select2-hidden-accessible"
                                                         style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                         aria-hidden="true">
                                                         <option selected="selected" data-select2-id="3">Normal</option>
                                                         <option>test</option>
                                                         <option>California</option>
                                                         <option>Delaware</option>
                                                         <option>Tennessee</option>
                                                         <option>Texas</option>
                                                         <option>Washington</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-auto">
                                                     <label>เพิ่มการประเมิน</label>
                                                     <button type="button"
                                                         class="btn btn-block bg-gradient-info">+</button>
                                                 </div>
                                                 <div class="col-md-auto col-lg-auto" style="border:solid;">
                                                     <div align="center">
                                                         <label>การประเมินผู้ป่วย</label>
                                                     </div>
                                                     <table id="example2"
                                                         class="table table-bordered table-hover dataTable dtr-inline">
                                                         <thead>
                                                             <tr>
                                                                 <th>เวลา</th>
                                                                 <th>E</th>
                                                                 <th>V</th>
                                                                 <th>M</th>
                                                                 <th>E</th>
                                                                 <th>Pupil ขวา</th>
                                                                 <th>Pupil ซ้าย</th>
                                                                 <th>T (c)</th>
                                                                 <th>PR (ครั้ง/หน้า)</th>
                                                                 <th>RR (ครั้ง/นาที)</th>
                                                                 <th>BP (mmHg)</th>
                                                                 <th>Sp O2(%)</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody id="Gen">

                                                         </tbody>
                                                     </table>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- //! ปิดข้อมูลทั่วไป // -->

                             <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-profile-tab">
                                 Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra
                                 purus
                                 ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet,
                                 consectetur
                                 adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                 posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula
                                 placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit
                                 amet
                                 ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                             </div>
                             <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-messages-tab">
                                 Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus
                                 volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum.
                                 Fusce
                                 nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue
                                 ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur
                                 eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus
                                 efficitur,
                                 ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla
                                 lacinia,
                                 ex
                                 vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel
                                 metus.
                                 Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                             </div>
                             <div class="tab-pane fade " id="custom-tabs-one-settings" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-settings-tab">
                                 Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis
                                 tempus
                                 turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt
                                 venenatis
                                 vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a
                                 vestibulum
                                 pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                 aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In
                                 hac
                                 habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                             </div>
                         </div>
                     </div>

                     <input type="text" class="form-control" name="frominput-socket" id="frominput-socket"
                         aria-describedby="helpId" placeholder="" value=''>

                     <!-- /.card -->
                 </div>

             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>
     </form>
 </div>

 <?php }else if ($_POST['data'] == "setting-config" ){ ?>
 <!-- //? หน้าคอนฟิกส์   / -->
 <div class="row" style="margin-top: 15px">
     <div class="col-lg-6">
         <!-- Horizontal Form -->
         <div class="card card-info">
             <div class="card-header">
                 <h3 class="card-title">ตั้งค่า HIS</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form class="form-horizontal" id="myfrom-sendconect-his">
                 <?php $sqlSysConfig = "SELECT * FROM sysconfig" ; 
                    $querySqlSysConfig =mysqli_query($objconnect,$sqlSysConfig); 
                    $fetchSysConfig = mysqli_fetch_array($querySqlSysConfig);  ?>
                 <div class="card-body">
                     <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 col-form-label">DB-HIS:TYPE</label>
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <select class="form-control" name="select-typedb-his" id="">
                                     <option value="MYSQL">MYSQL</option>
                                     <option value="POSTGRESS">POSTGRESS</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 col-form-label">HISType</label>
                         <div class="col-sm-6">
                             <div class="form-group">
                                 <select class="form-control" name="select-type-his" id="">
                                     <option value="HOS-XP">HOS-XP</option>
                                     <option value="HOS-XE">HOS-XE</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Server Name</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control" name="sever-name-his">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Database Name</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control" name="database-name-his">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">User ID:</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control" name="use-id-his">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                         <div class="col-sm-6">
                             <input type="password" class="form-control" name="user-password-his">
                         </div>
                     </div>


                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer">
                     <button type="button" onclick="onConnect('his')" class="btn btn-info">ทดสอบการเชื่อมต่อ</button>
                 </div>
                 <!-- /.card-footer -->
             </form>
         </div>
         <!-- /.card -->
     </div>
     <!-- //**? thairefer  / -->
     <div class="col-lg-6">
         <!-- Horizontal Form -->
         <div class="card card-info">
             <div class="card-header">
                 <h3 class="card-title">ตั้งค่า ฐานข้อมูล ThaiRefer</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form class="form-horizontal" id="myfrom-sendconect-refer">
                 <div class="card-body">
                     <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 col-form-label">DB:TYPE</label>
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <select class="form-control" name="selec-typedb-thairefer">
                                     <option value="MYSQL">MYSQL</option>
                                     <option value="POSTGRESS">POSTGRESS</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Server Name</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control" name="server-name-thairefer">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Database Name</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control" name="database-name-thairefer">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">User ID:</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control" name="use-id-thairefer">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                         <div class="col-sm-6">
                             <input type="password" class="form-control" name="user-password-thairefer">
                         </div>
                     </div>
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer">
                     <button type="button" onclick="onConnect('refer')" class="btn btn-info">ทดสอบการเชื่อมต่อ</button>
                 </div>
                 <!-- /.card-footer -->
             </form>
         </div>
         <!-- /.card -->
     </div>

 </div>

 <?php } ?>
 <!-- Select2 -->
 <script src="./plugins/select2/js/select2.full.min.js"></script>
 <script src="./plugins/inputmask/jquery.inputmask.min.js"></script>
 <script src="./plugins/daterangepicker/daterangepicker.js"></script>
 <script>
$(document).ready(function() {
    $('[data-mask]').inputmask()
    $('.select2').select2()
    $('#reservationtime').daterangepicker({
        "timePicker": true,
        "timePicker24Hour": true,
        "timePickerSeconds": true,
        locale: {
            format: 'DD/MM/YYYY HH:mm',
        }
    })

});
 </script>