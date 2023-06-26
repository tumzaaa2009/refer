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
        </div>
        <!-- /.row -->
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white border-0">
            <h3 class="card-title">ระบบการส่งตัว</h3>
        </div>
        <div class="card-body ">

            <div class="table-responsive">
                <table class="table table-bordered  " id="showTableReferInsus">
                    <thead>
                        <tr>
                            <th>
                                <div align="center">วันที่ส่งตัวกลับ</div>
                            </th>
                            <th>
                                <div align="center">ใบส่งตัว</div>
                            </th>
                            <th>
                                <div align="center">รายละเอียด</div>
                            </th>
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