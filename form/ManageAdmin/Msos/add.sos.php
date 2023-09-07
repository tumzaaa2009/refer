<form enctype="multipart/form-data" id="refer-sos-add">
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> เพิม่หน่วยบริการ </label>
        <input type="text" class="form-control" id="namesos" name="namesos" placeholder="ชนิดสิทธิ์การรักษา">
        <input type="hidden" class="fomr-control" id="hosCode" name="hosCode" value="<?php echo $hosCode; ?>">
    </div>

    <button type="button" class="btn btn-primary" onclick="AddSos()">เพิ่มข้อมูล</button>
</form>