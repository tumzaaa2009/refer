<style>
    th[align="center"] {
        text-align: center;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" id="title-id"> รายชื่อผู้ป่วยรอส่งตัวกลับ </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">ตารางการส่งจากรพต้นทาง</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white border-0">
            <h3 class="card-title">ระบบการส่งตัว</h3>
        </div>
        <div class="card-body ">

            <div class="table-responsive">
                <table class="table table-bordered  " id="showTableReferoutDestination">
                    <thead>
                        <tr>
                            <th colspan="12">
                                <div align="center">ใบส่งตัว</div>
                            </th>
                            <th colspan="2">
                                <div align="center">ผู้ป่วย</div>
                            </th>
                            <th colspan="1">
                                <div align="center">การวินิจฉัย</div>
                            </th>

                            <th colspan="1">
                                <div align="center">รายละเอียด</div>
                            </th>
                        </tr>
                        <tr>
                            <th>เลขที่ใบส่งตัว</th>
                            <th>ใช้รถ Refer</th>
                            <th>ห้องตรวจปลายทาง</th>
                            <th>วันที่ส่งต่อผู้ป่วย</th>
                            <th>เวลา</th>
                            <th>ชื่อ-สกุล</th>
                            <th>สถานพยาบาลปลายทาง</th>
                            <th>สถานะปลายทางรับ Refer</th>
                            <th>วินิจฉัยหลัก</th>
                            <th>สถานพยาบาลต้นทาง</th>
                            <th>แผนก</th>
                            <th>สถานะ</th>

                            <th>เลขที่บัตรประชาชน</th>
                            <th>สิทธิการรักษา</th>
                            <th>แพทย์ผู้สั่ง</th>

                            <th>ข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyReferOutDes">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- * div modal  -->
    <span class="mr-5" style="color:rgba(255, 0, 0, 0.5)">Resuscitation</span> <span class="mr-5" style="color: rgba(224, 26, 237, 1)">Emergency</span><span class="mr-5" style="color:  rgba(218, 221, 21, 1);">Urgency</span>
    <span class="mr-5" style="color:  rgba(55, 191, 21, 1);">semi-urgency</span> <span class="mr-5" style="color: white">Non-urgency</span>
</div>

<!-- /.container-fluid -->