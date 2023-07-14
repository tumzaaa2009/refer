<form enctype="multipart/form-data" id="refer-user-add">
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> เพิมห้องตรวจ </label>
        <div class="row">
            <div class="col-6"> <input type="text" class="form-control" id="namedepartment" name="namedepartment" placeholder="ห้องตรวจ อุบัติเหตุฉุกเฉิน , WARD  , LR">
            </div>
            <div class="col-6" id="selectOptionStation"></div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="AddDepatMent()">เพิ่มข้อมูล</button>
</form>