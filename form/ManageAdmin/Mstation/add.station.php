<form enctype="multipart/form-data" id="refer-user-add">
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> เพิม่หน่วยบริการ </label>
        <input type="text" class="form-control" id="namestaion" name="namestaion" placeholder="ใส่สถานบริการเช่น OPD , ER  WARD ">
        <input type="hidden" class="fomr-control" id="hosCode" name ="hosCode" value="<?php echo $hosCode ; ?>" >
    </div>

    <button type="button" class="btn btn-primary" onclick="AddStation()">เพิ่มข้อมูล</button>
</form>