<form enctype="multipart/form-data" id="reg-case">
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> เพิ่มเหตุผลการยกเลิกส่งตัว </label>
        <input type="text" class="form-control" id="detailCase" name="detailCase" placeholder="ระบุเหตุผลการยกเลิกเคส">
        <input type="hidden" class="fomr-control" id="hosCode" name="hosCode" value="<?php echo $hosCode; ?>">
    </div>

    <button type="button" class="btn btn-primary" onclick="AddCancleCase()">เพิ่มข้อมูล</button>
</form>