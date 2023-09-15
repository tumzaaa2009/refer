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
                <h1 class="m-0" id="title-id"> รายการผู้ป่วยส่งต่อ</h1>
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white border-0">
            <h3 class="card-title">รายการผู้ป่วยส่งต่อ </h3>

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
                                <label>เลขที่ใบส่งตัว</label>
                                <input type="text" class="form-control" placeholder="" name="refno">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>รหัสสถานพยาบาลปลายทาง</label>
                                <input type="number" class="form-control" placeholder="" name="hosrefer" max="5">
                            </div>
                        </div>

                        <div class="col-sm">
                            <label>Date:</label>
                            <input type="text" name="daterange" class="form-control" />
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>สถานะการรับ Refer</label>
                                <select class="form-control" name="statusRefer">
                                    <option value="" selected>ทั้งหมด</option>
                                    <option value="-10">เฉพาะส่งต่อ</option>
                                    <option value="10">เฉพาะส่งกลับ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <label style="text-align: center;">การค้นหา/ล้างข้อมูล</label>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <button type="button" class="form-control btn btn-primary" onclick="showTableReferBack()">ค้นหา</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <button type="button" class="form-control btn btn-primary" onclick="clearFields()">ล้างข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-bordered  " id="showTableReferBack">
                <thead>
                    <tr>
                        <th>
                            <div align="center">วันที่ส่งต่อ</div>
                        </th>
                        <th>
                            <div align="center">เวลาส่งตัว</div>
                        </th>

                        <th>
                            <div align="center">เลขที่ใบส่งตัว</div>
                        </th>

                        <th>
                            <div align="center">สถานะ</div>
                        </th>
                        <th>
                            <div align="center">รายละเอียด</div>
                        </th>
                    </tr>

                </thead>
                <tbody id="tbodyReferBack">

                </tbody>
            </table>
        </div>
    </div>
    <!-- * div modal  -->
    <div class="col">

        <span class="mr-5"> <i class="fa fa-exchange-alt"></i> เปลี่ยนสถานที่ปลายทาง</span>
        <span class="mr-5"> <i class="fa fa-ambulance" aria-hidden="true"></i> รอการส่งตัวกลับ</span>
        <span class="mr-5"> <i class="fa fa-check" aria-hidden="true" style="color: black;"></i> ยืนยันการรับตัว</span>


    </div>
</div>

<!-- /.container-fluid -->