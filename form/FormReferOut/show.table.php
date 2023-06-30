<style>
    th[align="center"] {
        text-align: center;
    }
</style>
<div id="loader" class="loader-container">
    <div class="loader"></div>
</div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" id="title-id"> รายการรับผู้ป่วย </h1>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white border-0">
            <h3 class="card-title">ระบบการส่งตัว</h3>

        </div>
        <div class="card-body table-responsive ">
            <div class="card-header">
                <h3 class="card-title">ช่องการค้นหา อย่างใดอย่างหนึ่ง</h3>
            </div>
            <div class="card-body">
                <form id="seach-engine" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>เลชที่ใบส่งตัว</label>
                                <input type="text" class="form-control" placeholder="" name="refno">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>รหัสสถานพยาบาลต้นทาง</label>
                                <input type="number" class="form-control" placeholder="" name="hosrefer" max="5">

                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-group">
                                <label>เลขที่บัตรประชาชน</label>
                                <input type="number" class="form-control" name="cid" placeholder="เลขบัตร13หลัก">
                            </div>
                        </div>
                        <div class="col-sm">
                            <label>Date:</label>
                            <input type="text" name="daterange" class="form-control" />
                        </div>
                        <div class="col-sm">
                            <label style="text-align: center;">การค้นหา/ล้างข้อมูล</label>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <button type="button" class="form-control btn btn-primary" onclick="showTableReferOut()">ค้นหา</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <button type="button" class="form-control btn btn-primary">ล้างข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-bordered " id="showTableReferOut">
                <thead>
                    <tr>
                        <th colspan="1">
                            <div align="center">วันที่ส่ง</div>
                        </th>
                        <th colspan="1">
                            <div align="center">เลขที่ใบส่งตัว</div>
                        </th>
                        <th>
                            สถานะการส่ง
                        </th>
                        <th colspan="1">
                            <div align="center">ห้องตรวจต้นทาง</div>
                        </th>
                        <th colspan="1">
                            <div align="center">ห้องตรวจปลายทาง</div>
                        </th>
                        <th colspan="1">
                            <div align="center">แผนก</div>
                        </th>
                        <th colspan="1">
                            <div align="center">สิทธิการรักษา</div>
                        </th>
                        <th colspan="1">
                            <div align="center">ชื่อผู้ป่วย</div>
                        </th>
                        <th colspan="1">
                            <div align="center">แพทย์นำส่ง</div>
                        </th>
                        <th colspan="1">
                            <div align="center">ข้อมูล</div>
                        </th>
                    </tr>

                </thead>
                <tbody id="tbodyReferOut">

                </tbody>
            </table>
        </div>
    </div>
    <!-- * div modal  -->
    <div class="col">
        <span class="mr-5" style="color:rgba(255, 0, 0, 0.5)">Resuscitation</span> <span class="mr-5" style="color: rgba(224, 26, 237, 1)">Emergency</span><span class="mr-5" style="color:  rgba(218, 221, 21, 1);">Urgency</span>
        <span class="mr-5" style="color:  rgba(55, 191, 21, 1);">semi-urgency</span> <span class="mr-5" style="color: white ;background-color:black">Non-urgency</span>
        <span class="mr-5"> <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: black;"></i>ปฏิเสธการส่งตัว</span>
        <span class="mr-5"> <i class="fa fa-times" aria-hidden="true" style="color: black;"></i>สถานปลายทางยังไม่รับการส่งตัว</span>
        <span class="mr-5"> <i class="fa fa-check" aria-hidden="true" style="color: black;"></i>ยืนยันการรับตัว</span>
        <span class="mr-5"> <i class="fa fa-ambulance" aria-hidden="true"></i>รับการส่งตัวกลับ</span>
        <span class="mr-5"> <i class="fa fa-exchange-alt"></i>เปลี่ยนสถานที่ปลายทาง</span>
    </div>
</div>

<!-- /.container-fluid -->