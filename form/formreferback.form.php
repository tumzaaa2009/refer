  <div id="loader" class="loader-container">
      <div class="loader"></div>
  </div>
  <?php
    if ($_GET['onfrom'] === "formreferback") { ?>
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0" id="title-id"> ส่งกลับ </h1>
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
              <h3 class="card-title">ข้อมูลผู้ป่วยส่งกลับ บ้าบอออ</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form enctype="multipart/form-data" id="refer-back-form">
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-3">
                          <input type="hidden" name="refercode" value="<?php echo $_SESSION['hosCode']; ?>" />
                          <input type="hidden" name="referName" value="<?php echo $_SESSION['hosName']; ?>" />
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
                              <input type="text" name="cid" class="form-control" name="cid" placeholder="" id="cid" onchange="CidInput(this.value)">
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
                                      <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#labs" role="tab" aria-controls="labs" aria-selected="false">LABS</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#consult" role="tab" aria-controls="consult" aria-selected="false">ConsultFile</a>
                                  </li>
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
                                          <div class=" col-md-4">
                                              <label>จุดบริการ</label>
                                              <select id="getStationService" class="form-control select2 " name="location_org" data-dropdown-css-class="select2-primary" onchange="ChangeLocation(this)" style="width: 100%;">
                                              </select>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label>ห้องตรวจ/หอผู้ป่วย</label>
                                                  <select class="form-control select2" name="department" id="getdepartment"> </select>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label>เบอร์ติดต่อ</label>
                                                  <input type="number" class="form-control  " name="telformreferback" id="telformreferback">
                                              </div>
                                          </div>
                                          <div class=" col-md-6">
                                              <label class="col-md-autocol-form-label">สถานพยาบาลปลายทาง</label>
                                              <select class="form-control select2" id="hosCodeRefer" onchange="getStationServiceDestinations(this.value)" name="hosCodeRefer" style="width: 100%;">

                                              </select>
                                          </div>
                                          <div class="col-md-6">
                                              <label class="col-md-autocol-form-label" style="color:red">วันที่keyข้อมูลส่งกลับ</label>
                                              <i class="far fa-clock"></i> <input type="text" class="form-control float-left" id="reservationtime" name="reservationtimeExpire">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class=" col-md-6">
                                              <label class="col-md-autocol-form-label">การเคลื่อนย้ายผู้ป่วย</label>
                                              <select class="form-control select2" name="movementFromReferBack" id="movementFromReferBack" style="width: 100%;">
                                                  <option value="0">---ระบุ--</option>
                                                  <option value="เปลนอน">เปลนอน</option>
                                                  <option value="ล้อนั่ง">ล้อนั่ง</option>
                                                  <option value="เดิน">เดิน</option>
                                              </select>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="col-md-autocol-form-label">การนำส่ง</label>
                                                  <select class="form-control lvlactual" width="100%;" name="loads">
                                                      <option value="รถ Refer ของโรงพยาบาลต้นทางมารับ">รถ Refer ของโรงพยาบาลต้นทางมารับ</option>
                                                      <option value="ผู้ป่วย/ญาติเดินทางมาเอง">ผู้ป่วย/ญาติเดินทางมาเอง</option>
                                                      <option value="รถ Refer ของพยาบาลไปส่ง">รถ Refer ของพยาบาลไปส่ง</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <!-- select -->
                                              <div class="form-group">
                                                  <label class="col-md-autocol-form-label">แพทย์ผู้สั่ง</label>
                                                  <select class="form-control select2" name="doctorName" id="doctorName"> </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <!-- select -->
                                              <div class="form-group">
                                                  <label class="col-md-autocol-form-label">แพทย์ Staff</label>
                                                  <select class="form-control select2" name="staffDoctorName" id="staffDoctorName"> </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>เหตุผลการส่งกลับ</label>
                                                  <select class="form-control select2" id="reasonFormReferback" name="reasonFormReferback" width="100%;" onchange="ValueOtherCaseReferBack(this.value)">
                                                      <option value="0" Selected>ระบบเหตุผล </option>
                                                      <option value="Admin รักษาต่อเนื่อง">Admin รักษาต่อเนื่อง</option>
                                                      <option value="Discharge/Follow up รพช">Discharge/Follow up รพช</option>
                                                      <option value="หลังคลอด">หลังคลอด</option>
                                                      <option value="อื่นๆ">อื่นๆ</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-auto" id="DivotherCauseReferback" style=" display: none;">
                                              <div class="form-group">
                                                  <label>อื่น :</label>
                                                  <input type="text" class="form-control" name="otherCauseReferBack" id="otherCauseReferBack" placeholder="ป้อนเหตุผล">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>ข้อมูลการนำยา</label>
                                                  <select class="form-control select2" name="refdrugReferBack" id="refdrugReferBack" width="100%;" multiple="multiple">
                                                      <option value="ผู้ป่วยนำยากลับไปด้วย">ผู้ป่วยนำยากลับไปด้วย</option>
                                                      <option value="ใช้ยาที่ รพช.">ใช้ยาที่ รพช.</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>สิ่งที่จำเป็นต้องใช้ขณะนำส่ง</label>
                                                  <select class="form-control select2" name="refReciveReferBack" id="refReciveReferBack" width="100%;" multiple="multiple" onchange="referReciveReferBack(this.value)">
                                                      <option value="Oxygen">Oxygen</option>
                                                      <option value="Suction">Suction</option>
                                                      <option value="Respirator">Respirator</option>
                                                      <option value="พยาบาล">พยาบาล</option>
                                                      <option value="แพทย์">แพทย์</option>
                                                      <option value="อื่นๆ">อื่นๆ</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-auto" id="otherRefReciveReferBack" style=" display: none;">
                                              <div class="form-group">
                                                  <label>อื่น :</label>
                                                  <input type="text" class="form-control" name="inputOtherRefReciveReferBack" id="inputOtherRefReciveReferBack" placeholder="ป้อนเหตุผล">
                                              </div>
                                          </div>
                                          <div class="col-md-12 col-lg-12">
                                              <div class="form-group ">
                                                  <div class="row">
                                                      <div class="col-md-12 col-lg-12" style="border:solid;">
                                                          <div align="center">
                                                              <label>การประเมินผู้ป่วย <button name="AddTruma" id="AddTruma" class="btn btn-primary" onclick="TrumaAdd()">ADD+</button>
                                                                  <input type="hidden" class="form-control" name="numTruma" id="numTruma" value="0">
                                                              </label>
                                                          </div>
                                                          <div class="table-responsive">
                                                              <table id="TrumaTable" class="table table-bordered table-hover dataTable dtr-inline">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>E</th>
                                                                          <th>V</th>
                                                                          <th>M</th>
                                                                          <th>Pupil ขวา</th>
                                                                          <th>Pupil ซ้าย</th>
                                                                          <th>T (c)</th>
                                                                          <th>PR (ครั้ง/หน้า)</th>
                                                                          <th>RR (ครั้ง/นาที)</th>
                                                                          <th colspan="2" style="text-align:center">BP/mmHg</th>
                                                                          <th>Sp O2(%)</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      <tr id="TrAddTruma">
                                                                          <td><input class="form-control" ype="text" name="e" /> </td>
                                                                          <td><input class="form-control" type="text" name="v" /> </td>
                                                                          <td><input class="form-control" type="text" name="m" /> </td>
                                                                          <td><input class="form-control" type="text" name="pupilR" /></td>
                                                                          <td><input class="form-control" type="text" name="pupilL" /></td>
                                                                          <td><input class="form-control" type="text" name="Tc" /></td>
                                                                          <td><input class="form-control" type="text" name="prF" /></td>
                                                                          <td><input class="form-control" type="text" name="pfM" /></td>
                                                                          <td>
                                                                              <input class="form-control" type="text" name="bp" placeholder="bp" />
                                                                          </td>
                                                                          <td><input class="form-control" type="text" name="mmHg" placeholder="mmhg" /></td>
                                                                          <td><input class="form-control" type="text" name="spo2" /></td>
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
                                                      <label>สรุปเหตุการณ์ที่สำคัญ / Progress Note และการรักษาที่ให้ </label>
                                                  </div>
                                                  <textarea name="progressNote" id="contents" class="col-md-12" style="height:350px;" title="Contents"></textarea>
                                              </div>
                                              <div class="col-md-12">
                                                  <label>Final Diagnosis : การวินิจฉัยขั้นสุดท้าย</label>
                                                  <textarea title="Contents" name="finalDianosis" id="finalDianosis" style="height:50px;" class="col-md-12"></textarea>
                                              </div>
                                              <div class="col-md-12">
                                                  <div align="left">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <label>ขอให้ดำเนินการดังต่อไปนี้</label>
                                                              <textarea name="suggestionDianosis" class="col-md-12" id="suggestionDianosis" title="Diagonosis"></textarea>
                                                          </div>
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
                                              <div id="treeview"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade " id="labs" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                      <label for="file-input"></label>
                                      <!-- <input id="file-input" type="file" name="imageUploadRefer" onchange="handleFileInput(event)" accept="image/*" multiple> -->
                                      <div class="card">
                                          <div class="card-body">
                                              <div id="treeviewLabs"></div>
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
                          <button type="button" onclick="sendFromReferBack()" class="btn btn-primary">ยืนยันการส่งตัวกลับ</button>
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