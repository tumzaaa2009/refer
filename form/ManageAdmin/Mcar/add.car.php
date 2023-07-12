<form enctype="multipart/form-data" id="reg-car">
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> เพิ่มเลขทะเบียนรถ </label>
        <input type="text" class="form-control" id="carReg" name="carReg" placeholder="สบ 25">
        <input type="hidden" class="fomr-control" id="hosCode" name ="hosCode" value="<?php echo $hosCode ; ?>" >
    </div>

    <button type="button" class="btn btn-primary" onclick="AddRegCar()">เพิ่มข้อมูล</button>
</form>