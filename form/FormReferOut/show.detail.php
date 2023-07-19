   <form enctype="multipart/form-data" id="refer-out-form">
       <div class="card-body">
           <div class="col-12" align="center" id="cancleRefer-status-10-11" style="display: none;color:red">

           </div>
           <div class="form-group row">
               <label for="เลขที่ใบส่งตัว" class="col-md-auto col-form-label mb-1">เลขที่ใบส่งตัว</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" name="refer_no" id="refer_no">
                   <input type="hidden" class="form-control" name="refer_code" id="refer_code">
                   <input type="hidden" class="form-control" name="code_gen_refer" id="code_gen_refer">
               </div>
               <label for="เลขที่ใบส่งตัว" class="col-md-auto col-form-label mb-1">Hn</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" name="hn" id="hn">
               </div>
               <label for="เลขที่ใบส่งตัว" class="col-md-auto col-form-label mb-1">บัตรประชาชน:</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="cid" name="cid">
               </div>
               <label for="อายุ" class="col-md-auto col-form-label mb-1">อายุ:</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="age" name="age">
               </div>
               <label for="อายุ" class="col-md-auto col-form-label mb-1">วันที่ส่ง และ เวลาส่ง :</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="refer_time" name="refer_time">
               </div>
               <label for="อายุ" class="col-md-auto col-form-label mb-1">คำนำหน้า:</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="pname" name="pname">
               </div>
               <label for="อายุ" class="col-md-auto col-form-label mb-1">ชื่อ:</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="fname" name="fname">
               </div>
               <label for="อายุ" class="col-md-auto col-form-label mb-1  ">นามสกุล:</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="lname" name="Lname">
               </div>
               <label for="อายุ" class="col-md-auto col-form-label mb-1  ">แพ้ยา:</label>
               <div class="col-md-auto">
                   <input type="text" class="form-control" id="aligy" name="aligy">
               </div>
               <!-- <label for="แพทย์ผู้สั่ง" class="col-md-auto col-form-label mb-1  ">แพทย์ผู้สั่ง:</label>
            <div class="col-md-auto">
                <input type="text" class="form-control" id="doctorname" name="doctorname">
            </div> -->

           </div>
           <div class="col-md-12">
               <div class="card ">
                   <div class="card-header   p-2">
                       <ul class="nav nav-pills">
                           <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">ข้อมูลทั่วไป</a> </li>
                           <li class="nav-item"><a class="nav-link" href="#PictureXray" data-toggle="tab">รูปต้นทางได้
                                   Upload <span style="color: red ;" id="countPictureXray"></span> </a></li>
                           <li class="nav-item"><a class="nav-link" href="#tabDrugs" data-toggle="tab">ยา</a> </li>
                           <li class="nav-item"><a class="nav-link" href="#labs" data-toggle="tab">LABS</a> </li>
                           <li class="nav-item"><a class="nav-link" href="#consultfiles" data-toggle="tab">ConsultFile</a>
                           </li>
                       </ul>
                   </div><!-- /.card-header -->
                   <div class="card-body">
                       <div class="tab-content">
                           <div class="active tab-pane" id="activity">
                               <!-- Post -->
                               <div class="card-body">
                                   <div class="tab-content" id="custom-tabs-one-tabContent">
                                       <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                           <!-- //! ข้อมูลส่งต่อทั่วไป */ -->
                                           <h3>ข้อมูลรพ.ต้นทาง</h3>
                                           <div class="form-group row">
                                               <label class="col-md-autocol-form-label">ชื่อสถานพยาบาลปลายทาง</label>
                                               <div class=" col-md-4">
                                                   <input type="text " class="form-control" id="hosReferDes" name="hosReferDes" style="width: 100%;" />
                                               </div>

                                               <input type="hidden" class="form-control" id="codeReferDes" name="codeReferDes" style="width: 100%;" />

                                               <label class="col-md-auto col-form-label" style="color:red" align="left">วันหมดอายุใบนำส่ง</label>
                                               <div class="input-group-prepend col-md-5  col-lg-5 ">
                                                   <span class="input-group-text "><i class="far fa-clock"></i></span>
                                                   <input type="text" class="form-control" id="reservationtimeExpireDes" name="reservationtimeExpireDes">
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <div class="col-md-auto">
                                                   <div class="form-group">
                                                       <label>ห้องตรวจปลายทาง</label>
                                                       <input class="form-control " type="text" style="width: 100%;" id="getStationServiceDestinationDes" name="getStationServiceDestinationDes" />

                                                   </div>
                                               </div>
                                               <div class="col-md-auto">
                                                   <!-- text input -->
                                                   <div class="form-group">
                                                       <label>Level of Acuity:</label>
                                                       <input type="text" class="form-control" id="lvAcityDes" name="lvAcityDes">
                                                   </div>
                                               </div>
                                               <div class="col-md-auto">
                                                   <!-- select -->
                                                   <div class="form-group">
                                                       <label>เป็นผู้ป่วยแผนก : </label>
                                                       <input type="text" class="form-control" id="clinicgroupDes" name="clinicgroupDes">
                                                   </div>

                                               </div>

                                               <div class="col-md-auto">
                                                   <!-- select -->
                                                   <div class="form-group">
                                                       <label>ประเภทผู้ป่วย :</label>
                                                       <input class="form-control " name="TypeptDes" id="TypeptDes" type="text " />
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <label>วิธีการนำส่ง :</label>
                                                       <input class="form-control  " id="loadsDes" name="loadsDes" />

                                                   </div>
                                               </div>
                                               <div class="col-md-auto">
                                                   <div class="form-group">
                                                       <label>Service Plane :</label>

                                                       <input class="form-control " name="servicePlaneDes" id="servicePlaneDes" type="text " />
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label>ทะเบียนรถนำส่ง :</label>
                                                       <input type="text" class="form-control" name="carReferDes" id="carReferDes" aria-describedby="helpId" placeholder="">
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <label>เหตุผลการส่ง :</label>
                                                       <input type="text" class="form-control" name="causeReferoutDes" id="causeReferoutDes" aria-describedby="helpId" placeholder="">

                                                   </div>
                                               </div>
                                               <div class="col-md-4" id="otherCauseReferout" style=" display: none;">
                                                   <div class="form-group">
                                                       <label>อื่น :</label>
                                                       <input type="text" class="form-control" name="otherCauseReferout" placeholder="ป้อนเหตุผล">
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <label>แพทย์ผู้สั่ง :</label>
                                                       <input class="form-control  " name="doctorNameDes" id="doctorNameDes" />
                                                   </div>
                                               </div>
                                               <div class="col-md-auto">
                                                   <div class="form-group">
                                                       <label>ระบบการประสานงาน (contract is)</label>
                                                       <input class="form-control  " name="coordinateIs" id="coordinateIs" />

                                                   </div>

                                               </div>
                                               <div class="col-md-5">
                                                   <div class="form-group ">
                                                       <div class="row ">
                                                           <div class="col-md-5">
                                                               <label>การประเมินผู้ป่วย</label>
                                                               <input class="form-control  " name="conscious" id="conscious" />

                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <h3 class="mt-3">ข้อมูล รพ ปลายทาง</h3>
                                               <div class="col-md">
                                                   <!-- select -->
                                                   <div class="form-group ">
                                                       <label class="col-md-6-form-label">ประเภทผู้ป่วย :</label>
                                                       <select class="form-control select2" name="Typept_Des" id="Typept" width="100%;" disabled> </select>
                                                   </div>
                                               </div>
                                               <div class="col-md">
                                                   <div class="form-group">
                                                       <label class="col-md-autocol-form-label">Level of Acuity:</label>
                                                       <select class="form-control lvlactual" width="100%;" name="levelActual_Des" id="levelActual" disabled onchange="updateColor()">
                                                       </select>
                                                       <input type="hidden" name="colorLvAc">
                                                   </div>
                                               </div>
                                               <div class="col-md">
                                                   <div class="form-group">
                                                       <label class="col-md-autocol-form-label">ชนิดเตียง</label>
                                                       <select class="form-control" name="bedHosDes" id="bedHos" disabled>
                                                           <option value="0">ระบุชนิดเตียง</option>
                                                           <option value="Hydolic">Hydolic</optionอ>
                                                           <option value="ธรรมดา">ธรรมดา</option>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md">
                                                   <div class="form-group">
                                                       <label>วิธีการนำส่ง :</label>
                                                       <select class="form-control load_des" id="loads" name="loads_des" width="100%;" disabled> </select>
                                                   </div>
                                               </div>
                                               <div class="col-md">
                                                   <div class="form-group">
                                                       <label>ระบบการประสานงาน (contract is)</label>
                                                       <select class="form-control  " style="width: 100%;" name="coordinateIsDes" id="coordinateIsDes" disabled>

                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md">
                                                   <div class="form-group">
                                                       <label>เสียชีวิต</label>
                                                       <select class="form-control" name="deadCase" id="deadCase" disabled>
                                                           <option value=""></option>
                                                           <option value="ก่อนนำส่ง">ก่อนนำส่ง</optionอ>
                                                           <option value="ระหว่างนำส่ง">ระหว่างนำส่ง</option>
                                                           <option value="ที่ ER">ที่ ER</option>
                                                       </select>
                                                   </div>
                                               </div>

                                               <div class="row">
                                                   <div class="col-md-6">
                                                       <div class="form-group">
                                                           <label>Service Plane :</label>
                                                           <select class="form-control select2" name="sevicePlanDes" id="servicePlane" width="100%;" multiple="multiple" disabled> </select>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <div class="form-group">
                                                           <label>ช่วงเวลาประสานงาน :</label>
                                                           <i class="far fa-clock"></i> <input type="text" class="form-control float-left" id="reservationtime" name="reservationtimeExpireDes" disabled>
                                                       </div>
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
                                                                               <th>Consciousness</th>
                                                                               <th>เวลา</th>
                                                                               <th>E</th>
                                                                               <th>V</th>
                                                                               <th>M</th>
                                                                               <th>Pupil ขวา</th>
                                                                               <th>Pupil ซ้าย</th>
                                                                               <th>T (c)</th>
                                                                               <th>PR (ครั้ง/หน้า)</th>
                                                                               <th>RR (ครั้ง/นาที)</th>
                                                                               <th colspan="2" style="text-align:center">
                                                                                   BP/mmHg</th>
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
                                               </div>


                                               <div class="col-md-12">
                                                   <div class="form-group ">
                                                       <div class="col-md-auto col-lg-auto">
                                                           <div align="left">
                                                               <label>CC\Pl\Physical Examination</label>
                                                           </div>
                                                           <textarea name="cc" id="cc" title="Contents" class="col-md-12" readonly></textarea>
                                                       </div>
                                                       <div class="col-md-auto col-lg-auto">
                                                           <div align="left">
                                                               <div class="row">
                                                                   <div class="col-md-auto">
                                                                       <label>Diagonosis ต้นทาง</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <textarea name="digonosis" id="Diagonosis" class="col-md-12" title="Diagonosis" readonly></textarea>
                                                       </div>
                                                       <div class="col-md-auto col-lg-auto">
                                                           <label>Management</label>
                                                           <textarea title="Contents" name="managementDes" id="managementDes" class="col-md-12" readonly></textarea>
                                                       </div>

                                                       <div class="col-md-auto col-lg-auto">
                                                           <div class="col-md-auto">
                                                               <label>Diagonosis ปลายทาง</label>
                                                           </div>
                                                           <textarea name="digonosisDes" id="DiagonosisDes" class="col-md-12" readonly></textarea>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-md-12">
                                                   <div class="form-group ">
                                                       <div class="col-md-12">
                                                           <div align="left">
                                                               <label>Memo ต้นทาง</label>
                                                           </div>
                                                           <textarea name="ccMain" id="ccMain" class="col-md-12" title="Contents" readonly>ccMain</textarea>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <div align="left">
                                                               <div class="row">
                                                                   <div class="col-md-auto">
                                                                       <label>Memo ปลายทาง</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <textarea name="ccDestination" class="col-md-12" id="ccDestination" title="Contents" readonly>ccDestination</textarea>
                                                       </div>

                                                   </div>
                                               </div>
                                               <div class="col-md-auto">
                                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-hidden="true">
                                                       รายละเอียด ICD10
                                                   </button>
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

                                               <!-- /.modal icd 10 -->
                                               <!--//* เพิ่ม ใหม่ update case ได้  //! ยกเลิการส่งตัว Update Is Put case  -------------------------------------->

                                               <div align="right">
                                                   <h4 align="left" class="mt-3" id="referSus" style="display:none;"></h4>
                                                   <button type="button" class="btn btn-primary" onclick="PutRefDes()" style="display: none;" id="UpdateCaseRefDes">
                                                       Updateข้อมูลไปให้ต้นทาง </button>

                                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="display: none;" id="open-modal-case-referHocode" data-bs-target="#mmmodalReferCode"> เปลี่ยนสถานพยาบาลปลายทาง
                                                   </button>
                                                   <button type="button" class="btn btn-success" data-bs-toggle="modal" style="display: none;" id="open-modal-case-referHosCodeDes" data-bs-target="#mmmodalReferCode">
                                                       ส่งต่อ
                                                   </button>
                                                   <button type="button" class="btn btn-default" data-bs-toggle="modal" style="display: none;" id="open-modal-case-referin" data-bs-target="#mmmodal">
                                                       ส่งตัวกลับ
                                                   </button>
                                                   <button type="button" id="UpStatusReferOutDes" style="display:none;" class="btn btn-success " onclick="UpStatusReferOutIsSave()">
                                                       รับ Refer </button>
                                                   <button type="button" class="btn btn-warning" id="refuse-button" style="display:none;" data-bs-toggle="modal" data-bs-target="#mmmodal-refuse-case">ปฏิเสธการส่งตัว </button>
                                                   <button type="button" class="btn btn-primary" style="display:none;" id="UpdateRefRefer" onclick="PutCaseReferOut()"> Update ข้อมูลไปให้ปลายทาง
                                                   </button>
                                                   <span id="referCancle"></span>
                                                   <button type="button" class="btn btn-danger" data-bs-toggle="modal" style="display: none;" id="open-modal-case-referout-cancelorg" data-bs-target="#mmmodalCancleOrg">
                                                       ยกเลิกการส่งตัว
                                                   </button>
                                               </div>
                                               <!-- //! Modlaยกเลิการส่งตัว  -->
                                               <div class="modal fade" id='mmmodalCancleOrg' tabindex="-1" aria-hidden="true">
                                                   <div class="modal-dialog modal-xl">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h4 class="modal-title">เหตุผลการยกเลิกส่งตัว</h4>
                                                               <button type="button" class="btn-close" data-bs-dimdiss="modal" aria-label="Close"></button>
                                                           </div>
                                                           <div class="modal-body">
                                                               <div class="form-group">
                                                                   <label for="exampleInputEmail1">โปรดระบุเหตุผลในการยกเลิกการส่ง
                                                                   </label>
                                                                   <select class="form-control" id="inputCancleReferoutOrg" name="inputCancleReferoutOrg"> </select>
                                                               </div>
                                                           </div>
                                                           <div class="modal-footer justify-content-between">
                                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                               <button type="button" class="btn btn-success" id="cancleReferOutOrg" onclick="cancleReferoutOrg()">ยืนยันการยกเลิก</button>
                                                               <input type="hidden" id="is-save" name="isSave">
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>

                                               <!-- //? กรณีที่ ปลายทางปฏิเสธเคส แต่ ต้นทางจะเปลี่ยนปลายทาง รพ ใหม่  -->
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
                                                                   <div class="form-group" id="OtherCase">
                                                                       <label for="exampleInputEmail1">Other Case</label>
                                                                       <input type="text" class="form-control" id="inputOtherCase" name="inputOtherCase">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="modal-footer justify-content-between">
                                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                               <button type="button" class="btn btn-success" id="sendFromReferHoscodeUpdate" onclick="sendFromReferhosCode()">ยืนยันการส่ง</button>

                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- //? เหตุผลการส่งตัว -->
                                               <div class="modal fade" id='mmmodal' tabindex="-1" aria-hidden="true">
                                                   <div class="modal-dialog modal-xl">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h4 class="modal-title">เหตุผลการส่งตัว</h4>
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                           </div>
                                                           <div class="modal-body">
                                                               <div class="form-group">
                                                                   <label>วิธีนำส่งตัว</label>
                                                                   <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#mmmodal" data-placeholder="Select an option" data-allow-clear="true" id="deriveryService" onchange="modalDerivery(this.value)">
                                                                   </select>
                                                               </div>
                                                               <div class="form-group" id="OtherCaseSendRefer" style="display: none;">
                                                                   <label for="exampleInputEmail1">Other Case</label>
                                                                   <input type="text" class="form-control" id="inputOtherCase" oninput="InputOtherCase(this.value)" name="inputOtherCase">
                                                               </div>

                                                               <div class="form-group">
                                                                   <label for="exampleInputEmail1">รายละเอียดแนบการส่งตัว</label>
                                                                   <input type="text" class="form-control" id="inputDeriveryCase" name="inputDeriveryCase">
                                                               </div>
                                                           </div>
                                                           <div class="modal-footer justify-content-between">
                                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                               <button type="button" id="UpStatusReferOutDesResive" class="btn btn-success " onclick="SendReferIn()">ยืนยันการส่งตัว</button>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- //? ปฏิเสธการส่งตัว -->
                                               <div class="modal fade" id='mmmodal-refuse-case' tabindex="-1" aria-hidden="true">
                                                   <div class="modal-dialog modal-xl">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h4 class="modal-title">เหตุผลการปฏิเสธการส่งตัว</h4>
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                           </div>
                                                           <div class="modal-body">
                                                               <div class="form-group">
                                                                   <label for="exampleInputEmail1">โปรดระบุเหตุผลในการยกเลิกการส่ง
                                                                   </label>
                                                                   <select class="form-control" id="input-refuse" name="reasonInput"> </select>
                                                               </div>
                                                           </div>
                                                           <div class="modal-footer justify-content-between">
                                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                               <button type="button" class="btn btn-success" id="cancleReferOutOrg" onclick="RefuseReferOut()">ยืนยันการยกเลิก</button>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- //! ปิดข้อมูลทั่วไป // -->
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- /.post -->
                           </div>
                           <!-- /.tab-pane -->
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
                           <!-- /.tab-pane -->
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
                           </div>
                           <!-- /.tab-pane -->
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
                           <!-- /.tab-pane -->
                       </div>
                       <!-- /.tab-content -->
                   </div><!-- /.card-body -->
               </div>
               <!-- /.card -->
           </div>
       </div>
       </from>