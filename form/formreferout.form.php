<!-- <div id="loader" class="loader-container">
    <div class="loader"></div>
</div> -->
<?php

if ($_GET['onfrom'] === "formreferout") { ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" id="title-id"> ส่งตัวที่ไป </h1>
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
        <form enctype="multipart/form-data" id="refer-out-form">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>จุดบริการ</label>
                            <input type="hidden" name="refercode" value="<?php echo $_SESSION['hosCode']; ?>" />
                            <input type="hidden" name="referName" value="<?php echo $_SESSION['hosName']; ?>" />
                            <select id="getStationService" class="form-control select2 " name="location_org" data-dropdown-css-class="select2-primary" onchange="ChangeLocation(this)" style="width: 100%;">
                            </select>
                        </div>
                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>วันที่รับบริการ</label>
                            <?php $date = date('d/m/Y');;  ?>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="referDate" value="<?php echo $date; ?>" data-inputmask-alias="datetime" id="reservation" data-inputmask-inputformat="dd/mm/yyyy" readonly data-mask>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-sm-3" style="display: none;">
                        <div class="form-group">
                            <label>VN:</label>
                            <input type="text" class="form-control" placeholder="" name="vn">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>HN:</label>
                            <input type="number" class="form-control" name="Hninput" id="hn" placeholder="" onchange="HnInput(this.value)">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>เลขที่บัตรประชาชน</label>
                            <input type="text" name="cid" class="form-control" name="cid" placeholder="" id="cid" onchange="HnInput(this.value)">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>คำนำหน้า</label>
                            <input type="text" class="form-control" name="pname" id="pname" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>สกุล</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>อายุ</label>
                            <input type="text" class="form-control" name="age" id="age" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>เพศ</label>
                            <input type="text" class="form-control" name="sex" id="sex" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>ที่อยู่</label>
                            <input type="text" class="form-control" name="addr" id="addr" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>หมู่</label>
                            <input type="text" class="form-control" name="moopart" id="moopart" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>ตำบล</label>
                            <input type="text" class="form-control" name="tmbpart" id="tmbpart" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>อำเภอ</label>
                            <input type="text" class="form-control" name="amppart" id="amppart" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>จังหวัด</label>
                            <input type="text" class="form-control" name="chwpart" id="chwpart" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ห้องตรวจ/หอผู้ป่วย</label>
                            <select class="form-control select2" name="department" id="getdepartment"> </select>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>แพ้ยา </label>
                            <input type="text" class="form-control" name="opd_allergy" id="opd_allergy" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <div class="form-group">
                                <label>สิทธิ์การรักษา </label>
                                <select class="form-control" name="pttype" id="getpttype">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>เลขสิทธิ์ </label>
                            <input type="text" class="form-control" name="SSO" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <div class="row">
                                <!-- <div class="col-sm-4">
                                      
                                      <div class="form-group">
                                          <label>รหัสรพต้นทาง</label>
                                          <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#modal-lg-hosmain">
                                              ค้นหาสถานบริการหลัก
                                          </button>
                                      </div>

                                  </div> -->
                                <!-- <div class="col-sm-4">
                                      
                                      <div class="form-group">
                                          <label>รหัสสถานบริการต้นทาง</label>
                                          <input type="text" class="form-control" name="hosIdMain" id="hosIdMain" readonly>
                                      </div>
                                  </div> -->
                                <!-- <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>ชื่อ รพ ต้นทาง</label>
                                          <input type="text" class="form-control" name="hosMainName" id="hosMainName" readonly>
                                      </div>
                                  </div> -->
                                <!-- //* modal hosmain */ -->
                                <div class="modal fade" id="modal-lg-hosmain">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">เลือกการค้นหาอย่างใดอย่างหนึ่ง</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">

                                                        <div class="form-group">
                                                            <label>รหัสรพ</label>
                                                            <input type="text" name="searchIdHosmain" id="searchIdHosmain" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>ชื่อ รพ </label>
                                                            <input type="text" name="searchNameHosMain" id="searchNameHosMain" class="form-control">
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" onclick="SearchHosMain()">ค้นหา</button>
                                                </div>
                                                <h2>ผลการค้นหา</h2>
                                                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>รหัส</th>
                                                                <th>ชื่อสถานพยาบาล</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="searchHosMain">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ValueSeachHos()">เลือก</button>
                                            </div>
                                        </div>
                                        <!-- /.mo  dal-content -->

                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-4">
                                      
                                      <div class="form-group">
                                          <label>รหัสสถานพยาบาลปลายทาง</label>
                                          <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#modal-lg-hosDes">
                                              ค้นหาสถานบริการลอง
                                          </button>
                                      </div>
                                  </div> -->
                                <!-- <div class="col-sm-4">
                                      
                                      <div class="form-group">
                                          <label>รหัสรพปลายทาง</label>
                                          <input type="text" class="form-control" name="hosIdHosDes" id="hosIdHosDes" readonly>
                                      </div>
                                  </div> -->
                                <!-- <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>ชื่อ รพ ปลายทาง</label>
                                          <input type="text" class="form-control" name="hosMainNameDes" id="hosMainNameDes" readonly>
                                      </div>
                                  </div> -->
                                <!-- //* modal hosDes */ -->
                                <div class="modal fade" id="modal-lg-hosDes">
                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">เลือกการค้นหาอย่างใดอย่างหนึ่ง</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">

                                                        <div class="form-group">
                                                            <label>รหัสรพปลายทาง</label>
                                                            <input type="text" id="searchIdHosDes" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>ชื่อ รพปลายทาง </label>
                                                            <input type="text" id="searchNameHosDes" class="form-control">
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" onclick="SearchHosDes()">เลือก</button>
                                                </div>
                                                <h2>ผลการค้นหา</h2>
                                                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>รหัส</th>
                                                                <th>ชื่อสถานพยาบาล</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="searchHosDes">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ValueSeachHos()">เลือก</button>
                                            </div>
                                        </div>
                                        <!-- /.mo  dal-content -->

                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

                                <?php if ($typeConnect == "ConnectToAPI") {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false" onclick="VstDate('person')">ข้อมูลส่งตัวทั่วไป</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false" onclick="VstDate('picture')">แนบภาพ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#drugItem" role="tab" aria-controls="drugItem" aria-selected="false" onclick="VstDate('Drugs')">ข้อมูลการใช้ยา</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#labs" role="tab" aria-controls="labs" aria-selected="false" onclick="VstDate('Labs')">Labs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#consult" role="tab" aria-controls="consult" aria-selected="false" onclick="VstDate('loadFile')">เอกสารแนบ</a>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">ข้อมูลส่งตัวทั่วไป</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">แนบภาพ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#drugItem" role="tab" aria-controls="drugItem" aria-selected="false">ข้อมูลการใช้ยา</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#labs" role="tab" aria-controls="labs" aria-selected="false">Labs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#consult" role="tab" aria-controls="consult" aria-selected="false">เอกสารแนบ</a>
                                    </li>
                                <?php } ?>

                                <!-- <li class="nav-item">
                                     <a class="nav-link " id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="true">Settings</a>
                                 </li> -->
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <!-- //! ข้อมูลส่งต่อทั่วไป */ -->
                                    <div class="form-group row">
                                        <div class=" col-md-6">
                                            <label class="col-md-autocol-form-label">สถานพยาบาลปลายทาง</label>
                                            <select class="form-control select2" id="hosCodeRefer" onchange="getStationServiceDestinations(this.value)" name="hosCodeRefer" style="width: 100%;">

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-autocol-form-label" style="color:red">วันหมดอายุใบนำส่ง</label>
                                            <i class="far fa-clock"></i> <input type="text" class="form-control float-left" id="reservationtime" name="reservationtimeExpire">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <!-- <div class="col-md-auto">
                                                  
                                                  <div class="form-group">
                                                      <label>เลขที่ใบส่งตัว</label>
                                                      <input type="text" class="form-control" name="deliveryNumber" placeholder="**NewId**">
                                                  </div>
                                              </div>
                                              <div class="col-md-auto">
                                                  updateColor
                                                  <div class="form-group">
                                                      <label>เลขที่ใบส่งตัว HIS</label>
                                                      <input type="text" class="form-control" placeholder="" name="deliveryNumberHis">
                                                  </div>
                                              </div> -->

                                        <div class=" col-md-6">
                                            <label class="col-md-autocol-form-label">จุดบริการปลายทาง</label>
                                            <select class="form-control select2" id="getStationServiceDestination" name="getStationServiceDestination"></select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-autocol-form-label">Level of Acuity:</label>
                                                <select class="form-control lvlactual" width="100%;" name="levelActual" id="levelActual" onchange="updateColor()">


                                                </select>
                                                <input type="hidden" name="colorLvAc">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <label class="col-md-autocol-form-label">CreateLink-Zoom</label>
                                            <select class="form-control select2" id="selectZooms" name="selectZooms">
                                                <option select value="0">ไม่ใช้</option>
                                                <option value="1">ใช้</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label class="col-md-autocol-form-label">เป็นผู้ป่วยแผนก : </label>
                                                <select class="form-control select2" name="clinicGroup" id="clinicGrop" width="100%;" multiple="multiple">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- select -->
                                            <div class="form-group ">
                                                <label class="col-md-6-form-label">ประเภทผู้ป่วย :</label>
                                                <select class="form-control select2" name="Typept" id="Typept" width="100%;"> </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>วิธีการนำส่ง :</label>
                                                <select class="form-control select2" id="loads" name="loads" width="100%;"> </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Service Plan :</label>
                                                <select class="form-control select2" name="sevicePlan" id="servicePlane" width="100%;" multiple="multiple"> </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ทะเบียนรถนำส่ง :</label>
                                                <select class="form-control select2" name="carRefer" id="carRefer" aria-describedby="helpId" placeholder=""></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>เหตุผลการส่ง :</label>
                                                <select class="form-control select2" name="causeReferout" id="causeReferout" onchange="ValueOtherCaseReferOut(this.value)"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" style=" display: none;" id="otherCauseReferout">
                                                <label>อื่น :</label>
                                                <input type="text" class="form-control" name="otherCauseReferout" id="inputotherCauseReferout" placeholder="ป้อนเหตุผล">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>แพทย์ผู้สั่ง :</label>
                                                <select class="form-control select2" name="doctorName" id="doctorName"> </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>ระบบการประสานงาน (contract is)</label>
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="coordinateIs" id="coordinateIs">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div align="center">
                                                            <label>การประเมินผู้ป่วย <button name="AddTruma" id="AddTruma" class="btn btn-primary" onclick="TrumaAdd()">ADD+</button>
                                                                <input type="hidden" class="form-control" name="numTruma" id="numTruma" value="0">
                                                            </label>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table id="TrumaTable" class="table table-bordered table-hover dataTable dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th>การประเมินผู้ป่วย</th>
                                                                        <th>เวลา hr/mm</th>
                                                                        <th>E</th>
                                                                        <th>V</th>
                                                                        <th>M</th>
                                                                        <th>Pupil ขวา</th>
                                                                        <th>Pupil ซ้าย</th>
                                                                        <th>T (c)</th>
                                                                        <th>PR (ครั้ง/นาที)</th>
                                                                        <th>RR (ครั้ง/นาที)</th>
                                                                        <th colspan="2" style="text-align:center">BP/mmHg</th>
                                                                        <th>Sp O2(%)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="TrAddTruma">
                                                                        <td> <select class="form-control" name="Consciousness" id="">
                                                                                <option value="Normal">Normal</option>
                                                                                <option value="Drowsiness">Drowsiness</option>
                                                                                <option value="SemiComa">SemiComa</option>
                                                                                <option value="Coma">Coma</option>
                                                                                <option value="ไม่สามารถประเมินได้">ไม่สามารถประเมินได้</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><input id="timepicker" name="timeTruma" type="text" class="form-control"></td>
                                                                        <td><input class="form-control" type="text" name="e" /> </td>
                                                                        <td><input class="form-control" type="text" name="v" /> </td>
                                                                        <td><input class="form-control" type="text" name="m" /> </td>
                                                                        <td><input class="form-control" type="number" name="pupilR" /></td>
                                                                        <td><input class="form-control" type="number" name="pupilL" /></td>
                                                                        <td><input class="form-control" type="number" name="Tc" /></td>
                                                                        <td><input class="form-control" type="number" name="prF" /></td>
                                                                        <td><input class="form-control" type="number" name="pfM" /></td>
                                                                        <td colspan="1">
                                                                            <input class="form-control" type="number" name="bp" placeholder="bp" />
                                                                        </td>
                                                                        <td colspan="1"><input class="form-control" type="number" name="mmHg" placeholder="mmhg" /></td>
                                                                        <td><input class="form-control" type="number" name="spo2" /></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div align="left">
                                                    <label>CC\Pl\Physical Examination</label>
                                                </div>
                                                <textarea name="cc" id="contents" class="col-md-12" title="Contents"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <div align="left">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Diagonosis</label>
                                                            <textarea name="digonosis" class="col-md-12" id="Diagonosis" title="Diagonosis"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div align="left">
                                                    <div class="row mb-2">
                                                        <div class="col-md-auto">
                                                            <label>Management</label>
                                                        </div>
                                                        <div class="col-md-auto">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" style="border:solid" name="Ettcheck" id="Ettcheck" onchange="EttChk()">
                                                                <label>ETT NO.</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="noEtt" style="border:solid;" id="noEtt" oninput="textnoEtt(this.value)" disabled>
                                                            <label>NoEtt.</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="MarkEtt" style="border:solid;" id="MarkEtt" oninput="textMarkEtt(this.value)" disabled>
                                                            <label>MarkEtt NO.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <textarea title="Contents" name="management" id="management" class="col-md-12"></textarea>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div align="left">
                                                                <label>Memo ต้นทาง</label>
                                                            </div>
                                                            <textarea name="ccMain" class="col-md-12" id="ccMain" title="Contents"> </textarea>
                                                        </div>
                                                        <!-- <div class="col-md-auto col-lg-auto">
                                                             <div align="left">
                                                                 <div class="row">
                                                                     <div class="col-md-auto">
                                                                         <label>Memo ปลายทาง</label>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-auto">
                                                                 <textarea name="ccDestination" style="width: 450px;" title="Contents">ccDestination</textarea>
                                                             </div>
                                                         </div> -->


                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="col-md-auto">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl-icd-10">
                                                เพิ่ม icd-10
                                            </button>
                                        </div>

                                        <div class="modal fade" id="modal-xl-icd-10">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ICD10</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">

                                                                    <div class="form-group">
                                                                        <label>รหัสโรค</label>
                                                                        <input type="text" id="searchIdHosIcd10" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>ชื่อโรค </label>
                                                                        <input type="text" id="searchNameIcd10" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-primary" onclick="SearchIcd10()">ค้นหา</button>
                                                            </div>
                                                            <h2>ผลการค้นหา</h2>
                                                            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>รหัส</th>
                                                                            <th>ชื่อโรค</th>
                                                                            <th>ลบIcd10</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="searchIcd10">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="SaveIcd10()">บันทึก icd 10</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อ</th>
                                                </tr>
                                            </thead>
                                            <tbody id="AddIcd10"> </tbody>
                                        </table>
                                    </div>
                                    <!-- //! ปิดข้อมูลทั่วไป // -->
                                </div>
                                <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <label for="file-input">แนบรูปภาพ ให้ Upload</label>
                                    <div class="file-loading">
                                        <input id="file-0a" class="file" type="file" name="imageUploadRefer" multiple accept="image/*" data-min-file-count="1" data-theme="fas">
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="drugItem" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <label for="file-input"></label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="loaderDrug" class="loaderDrug">
                                                <div class="loaderDrug"></div>
                                            </div>
                                            <div id="treeview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="labs" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <label for="file-input"></label>
                                    <!-- <input id="file-input" type="file" name="imageUploadRefer" onchange="handleFileInput(event)" accept="image/*" multiple> -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="loaderDrug" class="loaderDrug">
                                                <div class="loaderDrug"></div>
                                            </div>
                                            <div id="treeviewLabs"> </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="consult" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <label for="file-input"></label>
                                    <!-- <input id="file-input" type="file" name="imageUploadRefer" onchange="handleFileInput(event)" accept="image/*" multiple> -->
                                    <div class="card">
                                        <div class="card-body">
                                            <input id="file-0a" class="file" type="file" name="fileConsultUpload" multiple accept=".pdf, .xlsx, .xls, .doc, .docx" data-min-file-count="1" data-theme="fas">

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" onclick="sendFromReferOuts()" class="btn btn-primary" id="sendFromReferOut">ยืนยันการส่ง</button>
                    </div>
                </div>
        </form>
    </div>

<?php } else if ($_POST['data'] == "setting-config") { ?>
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