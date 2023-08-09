   <div id="loader" class="loader-container">
       <div class="loader"></div>
   </div>
   <?php
    if ($_GET['onfrom'] === "showdetailreferback") { ?>
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
               <h3 class="card-title">ข้อมูลผู้ป่วยส่งกลับ </h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <form id="refer-back-form" method="POST" enctype="multipart/form-data" action="./form/FormReferBack/print.refer.back.php">
               <div class="card-body">
                   <div class="form-group row">
                       <label for="เลขที่ใบส่งตัว" class="col-md-auto col-form-label mb-1">เลขที่ใบส่งตัว</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="refer_no" id="refer_no" readonly>
                           <input type="hidden" class="form-control" name="refer_code" id="refer_code">
                           <input type="hidden" class="form-control" name="refer_name" id="refer_name">
                           <input type="hidden" class="form-control" name="code_gen_refer" id="code_gen_refer">
                       </div>
                       <label for="เลขที่ใบส่งตัว" class="col-md-auto col-form-label mb-1">Hn</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="hn" id="hn" readonly>
                       </div>
                       <label for="เลขที่ใบส่งตัว" class="col-md-auto col-form-label mb-1">บัตรประชาชน:</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" id="cid" name="cid" readonly>
                       </div>
                       <label for="อายุ" class="col-md-auto col-form-label mb-1">อายุ:</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" id="age" name="age" readonly>
                       </div>
                       <label for="อายุ" class="col-md-auto col-form-label mb-1">วันที่ส่ง และ เวลาส่ง :</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" id="refer_time" name="refer_time" readonly>
                       </div>
                       <label for="อายุ" class="col-md-auto col-form-label mb-1">ชื่อ:</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" id="fname" name="fname" readonly>
                       </div>
                       <label for="ที่อยู่" class="col-md-auto col-form-label mb-1  ">ที่อยู่</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="addr" id="addr" placeholder="" readonly>
                       </div>

                       <label for="หมู่" class="col-md-auto col-form-label mb-1  ">หมู่</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="moopart" id="moopart" placeholder="" readonly>
                       </div>
                       <label for="ตำบล" class="col-md-auto col-form-label mb-1  ">ตำบล</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="tmbpart" id="tmbpart" placeholder="" readonly>
                       </div>
                       <label for="อำเภอ" class="col-md-auto col-form-label mb-1  ">อำเภอ</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="amppart" id="amppart" placeholder="" readonly>
                       </div>
                       <label for="จังหวัด" class="col-md-auto col-form-label mb-1  ">จังหวัด</label>
                       <div class="col-md-auto">
                           <input type="text" class="form-control" name="chwpart" id="chwpart" placeholder="" readonly>
                       </div>
                       <label for="อายุ" class="col-md-auto col-form-label mb-1">แพ้ยา</label>
                       <div class="col-md-6">
                           <input type="text" class="form-control" id="aligy" name="aligy" readonly>
                       </div>
                   </div>

                   <div class="col-12 col-sm-12">
                       <div class="card card-primary card-tabs">
                           <div class="card-header p-0 pt-1">
                               <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                   <li class="nav-item">
                                       <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">ข้อมูลส่งตัวทั่วไป</a>
                                   </li>

                                   <li class="nav-item"><a class="nav-link" href="#PictureXray" data-toggle="tab">รูปต้นทางได้ Upload <span style="color: red ;" id="countPictureXray"></span> </a></li>
                                   <li class="nav-item"><a class="nav-link" href="#tabDrugs" data-toggle="tab">ยา</a> </li>
                                   <li class="nav-item"><a class="nav-link" href="#labs" data-toggle="tab">LABS</a> </li>
                                   <li class="nav-item"><a class="nav-link" href="#consultfiles" data-toggle="tab">ConsultFile</a> </li>

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
                                               <input type="text" class="form-control" name="getStationService" id="getStationService" readonly>
                                           </div>
                                           <div class="col-md-4">
                                               <div class="form-group">
                                                   <label>ห้องตรวจ/หอผู้ป่วย</label>

                                                   <input type="text" class="form-control" name="department" id="department" readonly>
                                               </div>
                                           </div>
                                           <div class="col-md-4">
                                               <div class="form-group">
                                                   <label>เบอร์ติดต่อ</label>
                                                   <input type="number" class="form-control" readonly name="telformreferback" id="telformreferback">
                                               </div>
                                           </div>
                                           <div class=" col-md-6">
                                               <label class="col-md-autocol-form-label">สถานพยาบาลปลายทาง</label>
                                               <input type="text" class="form-control" readonly name="nameRefer" id="nameRefer">

                                           </div>
                                       </div>
                                       <div class="form-group row">
                                           <div class=" col-md-6">
                                               <label class="col-md-autocol-form-label">การเคลื่อนย้ายผู้ป่วย</label>
                                               <input type="text" class="form-control" readonly name="movementFromReferBack" id="movementFromReferBack">

                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label class="col-md-autocol-form-label">การนำส่ง</label>
                                                   <input type="text" class="form-control" readonly name="loads" id="loads">

                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <!-- select -->
                                               <div class="form-group">
                                                   <label class="col-md-autocol-form-label">แพทย์ผู้สั่ง</label>
                                                   <input type="text" class="form-control" readonly name="doctorName" id="doctorName">

                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <!-- select -->
                                               <div class="form-group">
                                                   <label class="col-md-autocol-form-label">แพทย์ Staff</label>
                                                   <input type="text" class="form-control" readonly name="staffDoctorName" id="staffDoctorName">
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>เหตุผลการส่งกลับ </label>
                                                   <input type="text" class="form-control" readonly name="reasonFormReferback" id="reasonFormReferback">
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>เหตุผลการส่งกลับ (อิ่นๆ)</label>
                                                   <input type="text" class="form-control" readonly name="reasonFormReferbackOther" id="reasonFormReferbackOther">
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>ข้อมูลการนำยา</label>
                                                   <input type="text" class="form-control" readonly name="refdrugReferBack" id="refdrugReferBack">
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>สิ่งที่จำเป็นต้องใช้ขณะนำส่ง</label>
                                                   <input type="text" class="form-control" readonly name="refReciveReferBack" id="refReciveReferBack">

                                               </div>

                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>สิ่งที่จำเป็นต้องใช้ขณะนำส่ง (อื่นๆ)</label>
                                                   <input type="text" class="form-control" readonly name="refReciveReferBackOther" id="refReciveReferBackOther">

                                               </div>
                                           </div>
                                           <div class="col-md-12 col-lg-12">
                                               <div class="form-group ">
                                                   <div class="row">
                                                       <div class="col-md-12 col-lg-12">
                                                           <div align="center">
                                                               <label>การประเมินผู้ป่วย</label>
                                                           </div>
                                                           <div class="table-responsive">
                                                               <table id="example2" class="table crollable-table">
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
                                                                   <tbody id="riskturmatbody">

                                                                   </tbody>
                                                               </table>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <input type="hidden" name="detailRiskTurmar" id="detailRiskTurmar" />

                                           </div>
                                           <div class="form-group">
                                               <div class="col-md-12">
                                                   <div align="left">
                                                       <label>สรุปเหตุการณ์ที่สำคัญ / Progress Note และการรักษาที่ให้ </label>
                                                   </div>
                                                   <textarea name="progressNote" id="progressNote" class="col-md-12" style="height:350px;" title="Contents" readonly></textarea>
                                               </div>
                                               <div class="col-md-12">
                                                   <label>Final Diagnosis : การวินิจฉัยขั้นสุดท้าย</label>
                                                   <textarea title="Contents" name="finalDianosis" id="finalDianosis" style="height:50px;" class="col-md-12" readonly></textarea>
                                               </div>
                                               <div class="col-md-12">
                                                   <div align="left">
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <label>ขอให้ดำเนินการดังต่อไปนี้</label>
                                                               <textarea name="suggestionDianosis" class="col-md-12" id="suggestionDianosis" title="Diagonosis" readonly></textarea>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-auto">
                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-hidden="true">
                                                   รายละเอียด ICD10
                                               </button>
                                               <button type="submit" class="btn btn-info"> Download แบบฟอร์มใบส่งกลับ</button>
                                               <input type="hidden" name="icd10Detail" id="icd10Detail">
                                           </div>
                                           <!-- Button trigger modal -->

                                           <!-- Modal -->
                                           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                                               <div class="modal-dialog modal-xl">
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <h4 class="modal-title">ICD10 รายละเอียด</h4>
                                                           <button type="button" class="close" data-dimdiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                           </button>
                                                       </div>
                                                       <div class="row">
                                                           <div class="col-12">
                                                               <div class="card">
                                                                   <div class="card-body">
                                                                       <span id="trDetailIcd10"> </span>
                                                                   </div>
                                                                   <!-- /.card-body -->
                                                               </div>
                                                               <!-- /.card -->
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer justify-content-between">
                                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <!-- /.modal -->
                                           <div align="right">
                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="display:none;" id="open-modal-case-referHocode" data-bs-target="#mmmodalReferCode"> ส่งต่อ
                                               </button>


                                           </div>
                                           <div class="modal fade" id='mmmodalReferCode' tabindex="-1" aria-hidden="true">
                                               <div class="modal-dialog modal-xl">
                                                   <div class="modal-content">
                                                       <div class="modal-body">
                                                           <div class="row">
                                                               <div class=" col-md-6">
                                                                   <label class="col-md-autocol-form-label">สถานพยาบาลปลายทาง</label>
                                                                   <select class="form-control " id="hosCodeRefer" onchange="getStationServiceDestinations(this.value)" name="hosCodeRefer" style="width: 100%;">
                                                                   </select>
                                                               </div>
                                                               <div class=" col-md-6">
                                                                   <label class="col-md-autocol-form-label">จุดบริการปลายทาง</label>
                                                                   <select class="form-control " id="getStationServiceDestination" name="getStationServiceDestination"></select>
                                                               </div>
                                                               <!-- <div class="form-group" id="OtherCase">
                                                                   <label for="exampleInputEmail1">Other Case</label>
                                                                   <input type="text" class="form-control" id="inputOtherCase" name="inputOtherCase">
                                                               </div> -->
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer justify-content-between">
                                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                           <button type="button" class="btn btn-success" id="sendFromReferHoscodeUpdate" onclick="sendFromReferBackhosCode()">ยืนยันการส่ง</button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <!-- //! ปิดข้อมูลทั่วไป // -->
                                   </div>
                                   <div class="tab-pane" id="PictureXray">
                                       <!-- The timeline -->
                                       <div class="post">
                                           <!-- /.user-block -->
                                           <div class="row mb-3">
                                               <div class="col-md-6" id="col-section-1">

                                               </div>
                                               <!-- /.col -->
                                               <div class="col-md-6">
                                                   <div class="row" id="col-section-2"> </div>
                                                   <!-- /.row -->
                                               </div>
                                               <!-- /.col -->
                                           </div>
                                           <!-- /.row -->

                                       </div>
                                   </div>
                                   <div class="tab-pane" id="tabDrugs">
                                       <form class="form-horizontal">
                                           <div class="form-group row">
                                               <div class="card">
                                                   <div class="card-header">
                                                       <label for="inputName" class="col-md-2 col-form-label">รายละเอียดการใช้ยา</label>
                                                   </div>
                                                   <div class="card-body">
                                                       <div id="treeviewDes"></div>
                                                   </div>
                                               </div>
                                           </div>
                                       </form>
                                       <input type="hidden" name="listDrugs" id="ListDrugs" />

                                   </div>
                                   <!-- /.tab-pane -->
                                   <div class="tab-pane" id="labs">
                                       <form class="form-horizontal">
                                           <div class="form-group row">
                                               <div class="card">
                                                   <div class="card-header">
                                                       <label for="inputName" class="col-md-2 col-form-label">ผล LAB</label>
                                                   </div>
                                                   <div class="card-body">
                                                       <div id="treeviewLabs"></div>
                                                   </div>
                                               </div>
                                           </div>
                                       </form>
                                       <input type="hidden" name="detailLabs" id="detailLabs" />

                                   </div>
                                   <div class="tab-pane" id="consultfiles">
                                       <form class="form-horizontal">
                                           <div class="form-group row">
                                               <div class="card">
                                                   <div class="card-header">
                                                       <label for="inputName" class="col-md-2 col-form-label">รายละเอียดการส่งต่อ</label>
                                                   </div>
                                                   <div class="card-body">
                                                       <div id="treeviewConsultFile"></div>
                                                   </div>
                                               </div>
                                           </div>

                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- /.card-body -->

                   </div>
           </form>
       </div>

   <?php } ?>