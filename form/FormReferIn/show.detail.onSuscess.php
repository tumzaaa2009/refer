 <form enctype="multipart/form-data" id="refer-in-form-sus">
     <div class="card-body">
         <div class="form-group row">
             <label for="เลขที่ใบส่งตัว" class="col-sm-auto col-form-label mb-1">เลขใบส่งตัวกลับ</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" name="refer_no" id="refer_no">
                 <input type="hidden" class="form-control" name="refer_code" id="refer_code">
                 <input type="hidden" class="form-control" name="code_gen_refer" id="code_gen_refer">
             </div>
             <label for="เลขที่ใบส่งตัว" class="col-sm-auto col-form-label mb-1">เลขที่ส่งต่อ:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" name="deliveryNuber" id="deliveryNuber">
             </div>
             <label for="เลขที่ใบส่งตัว" class="col-sm-auto col-form-label mb-1">Hn</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" name="hn" id="hn">
             </div>
             <label for="เลขที่ใบส่งตัว" class="col-sm-auto col-form-label mb-1">บัตรประชาชน:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="cid" name="cid">
             </div>
             <label for="อายุ" class="col-sm-auto col-form-label mb-1">อายุ:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="age" name="age">
             </div>
             <label for="อายุ" class="col-sm-auto col-form-label mb-1">วันที่ส่ง และ เวลาส่ง :</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="refer_time" name="refer_time">
             </div>
             <label for="อายุ" class="col-sm-auto col-form-label mb-1">คำนำหน้า:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="pname" name="pname">
             </div>
             <label for="อายุ" class="col-sm-auto col-form-label mb-1">ชื่อ:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="fname" name="fname">
             </div>
             <label for="อายุ" class="col-sm-auto col-form-label mb-1  ">นามสกุล:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="lname" name="Lname">
             </div>
             <label for="อายุ" class="col-sm-auto col-form-label mb-1  ">แพ้ยา:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="aligy" name="aligy">
             </div>
             <label for="แพทย์ผู้สั่ง" class="col-sm-auto col-form-label mb-1  ">แพทย์ผู้สั่ง:</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="doctorname" name="doctorname">
             </div>
             <label for=" " class="col-sm-auto col-form-label mb-1  ">สถานบริการหลัก</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="hopsmain" name="hopsmain">
             </div>
             <label for=" " class="col-sm-auto col-form-label mb-1  ">สถานบริการลอง</label>
             <div class="col-sm-auto">
                 <input type="text" class="form-control" id="hospsup" name="hospsup">
             </div>
         </div>
         <div class="col-md-12">
             <div class="card ">
                 <div class="card-header   p-2">
                     <ul class="nav nav-pills">
                         <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">ข้อมูลทั่วไป</a> </li>
                         <li class="nav-item"><a class="nav-link" href="#PictureXray" data-toggle="tab">รูปต้นทางได้ Upload <span style="color: red ;" id="countPictureXray"></span> </a></li>
                         <li class="nav-item"><a class="nav-link" href="#tabDrugs" data-toggle="tab">ยา</a> </li>
                         <li class="nav-item"><a class="nav-link" href="#labs" data-toggle="tab">LABS</a> </li>
                         <li class="nav-item"><a class="nav-link" href="#consultfiles" data-toggle="tab">ConsultFile</a> </li>
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
                                         <div class="form-group row">
                                             <label class="col-md-autocol-form-label">ชื่อถสานพยาบาลปลายทาง</label>
                                             <div class=" col-md-4">
                                                 <input type="text " class="form-control" id="hosReferDes" name="hosReferDes" style="width: 100%;" />
                                             </div>
                                             <label class="col-md-auto col-form-label" style="color:red" align="left">วันหมดอายุใบนำส่ง</label>
                                             <div class="input-group-prepend col-md-5  col-lg-5 ">
                                                 <span class="input-group-text "><i class="far fa-clock"></i></span>
                                                 <input type="text" class="form-control" id="reservationtimeExpireDes" name="reservationtimeExpireDes">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <div class="row">
                                                 <div class="col-sm-3">
                                                     <!-- text input -->
                                                     <div class="form-group">
                                                         <label>เลขที่ใบส่งตัว</label>
                                                         <input type="text" class="form-control" name="deliveryNumberDes" id="deliveryNumberDes" placeholder="**NewId**">
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-3">
                                                     <!-- text input -->
                                                     <div class="form-group">
                                                         <label>เลขที่ใบส่งตัว HIS</label>
                                                         <input type="text" class="form-control" placeholder="" name="deliveryNumberHisDes" id="deliveryNumberHisDes">
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-3">
                                                     <div class="form-group">
                                                         <label>ห้องตรวจปลายทาง</label>
                                                         <input class="form-control " type="text" style="width: 100%;" id="getStationServiceDestinationDes" name="getStationServiceDestinationDes" />


                                                     </div>
                                                 </div>
                                                 <div class="col-sm-3">
                                                     <!-- text input -->
                                                     <div class="form-group">
                                                         <label>Level of Acuity:</label>
                                                         <input type="text" class="form-control" id="lvAcityDes" name="lvAcityDes">
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-2">
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
                                                 <div class="col-md-auto">
                                                     <div class="form-group">
                                                         <label>เหตุผลการส่ง :</label>
                                                         <input type="text" class="form-control" name="causeReferoutDes" id="causeReferoutDes" aria-describedby="helpId" placeholder="">

                                                     </div>
                                                 </div>
                                                 <div class="col-md-auto" id="otherCauseReferout" style=" display: none;">
                                                     <div class="form-group">
                                                         <label>อื่น :</label>
                                                         <input type="text" class="form-control" name="otherCauseReferout" placeholder="ป้อนเหตุผล">
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
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
                                             </div>
                                             <div class="row">
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
                                                                                 <th>BP (mmHg)</th>
                                                                                 <th>Sp O2(%)</th>
                                                                             </tr>
                                                                         </thead>
                                                                         <tbody>
                                                                             <td><input class="form-control" type="text" name="e" id="e" /></td>
                                                                             <td><input class="form-control" type="text" name="v" id="v" /> </td>
                                                                             <td><input class="form-control" type="text" name="m" id="m" /> </td>
                                                                             <td><input class="form-control" type="text" name="pupilR" id="pupilR" />
                                                                             </td>
                                                                             <td><input class="form-control" type="text" name="pupilL" id="pupilL" />
                                                                             </td>
                                                                             <td><input class="form-control" type="text" name="Tc" id="Tc" /></td>
                                                                             <td><input class="form-control" type="text" name="prF" id="prF" /></td>
                                                                             <td><input class="form-control" type="text" name="pfM" id="pfM" /></td>
                                                                             <td><input class="form-control" type="text" name="bpmmhg" id="bpmmhg" />
                                                                             </td>
                                                                             <td><input class="form-control" type="text" name="spo2" id="spo2" /></td>
                                                                         </tbody>
                                                                     </table>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-12">
                                                     <div class="form-group ">
                                                         <div class="row">
                                                             <div class="col-md-auto col-lg-auto">
                                                                 <div align="left">
                                                                     <label>CC\Pl\Physical Examination</label>
                                                                 </div>
                                                                 <textarea name="cc" id="cc" title="Contents"></textarea>
                                                             </div>
                                                             <div class="col-md-auto col-lg-auto">
                                                                 <label>Management</label>
                                                                 <textarea title="Contents" class="col-md-12" name="managementDes" id="managementDes"></textarea>
                                                             </div>
                                                             <div class="col-md-auto col-lg-auto">
                                                                 <div align="left">
                                                                     <div class="row">
                                                                         <div class="col-md-auto">
                                                                             <label>Diagonosis ต้นทาง</label>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <textarea name="digonosis" class="col-md-12" id="Diagonosis" title="Diagonosis"></textarea>
                                                                 <div class="col-md-auto">
                                                                     <label>Diagonosis ปลายทาง</label>
                                                                 </div>
                                                                 <textarea name="digonosisDes" id="DiagonosisDes" class="col-md-12"></textarea>
                                                             </div>


                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-12">
                                                     <div class="form-group ">
                                                         <div class="row">
                                                             <div class="col-md-auto col-lg-auto">
                                                                 <div align="left">
                                                                     <label>Memo ต้นทาง</label>
                                                                 </div>
                                                                 <textarea name="ccMain" id="ccMain" title="Contents">ccMain</textarea>
                                                             </div>
                                                             <div class="col-md-auto col-lg-auto">
                                                                 <div align="left">
                                                                     <div class="row">
                                                                         <div class="col-md-auto">
                                                                             <label>Memo ปลายทาง</label>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <textarea name="ccDestination" class="col-md-12" id="ccDestination" title="Contents">ccDestination</textarea>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-auto">
                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl-icd-10">
                                                         รายละเอียด ICD10
                                                     </button>
                                                 </div>
                                             </div>
                                             <div class="modal fade" id="modal-xl-icd-10">
                                                 <div class="modal-dialog modal-xl">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h4 class="modal-title">ICD10 รายละเอียด</h4>
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                         </div>
                                                     </div>
                                                     <!-- /.modal-content -->
                                                 </div>
                                                 <!-- /.modal-dialog -->
                                             </div>
                                             <!-- /.modal icd 10 -->
                                             <div align="right"> <span id="referSus"></span>
                                                 <!-- Button trigger modal -->
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                     รายละเอียดการส่งตัวกลับ
                                                 </button>

                                                 <!-- Modal -->
                                                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog modal-xl">
                                                         <div class="modal-content">
                                                             <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการส่งตัวกลับ</h5>
                                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                             </div>
                                                             <div class="modal-body" id="modalreferInSus">

                                                             </div>
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
                                     <div class="col-sm-6" id="col-section-1">

                                     </div>
                                     <!-- /.col -->
                                     <div class="col-sm-6">
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
                                             <label for="inputName" class="col-sm-2 col-form-label">รายละเอียดการใช้ยา</label>
                                         </div>
                                         <div class="card-body">
                                             <div id="treeviewDes"></div>
                                         </div>
                                     </div>
                                 </div>

                             </form>
                         </div>
                         <!-- /.tab-pane -->
                                     <!-- /.tab-pane -->
                        <div class="tab-pane" id="labs">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="inputName" class="col-sm-2 col-form-label">ผล LAB</label>
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
                                            <label for="inputName" class="col-sm-2 col-form-label">รายละเอียดการส่งต่อ</label>
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