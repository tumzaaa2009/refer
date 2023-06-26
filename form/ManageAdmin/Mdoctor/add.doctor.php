<form enctype="multipart/form-data" id="refer-doctor-add">
    <div class="mb-3">
        <label for="namedoctor" class="form-label">ชื่อแพทย์</label>
        <input type="text" class="form-control" id="namedoctor" name="namedoctor" placeholder="กรอกชื่อแพทย์">
    </div>
    <div class="mb-3">
        <label for="lastnamedoctor" class="form-label">นามสกุลแพทย์</label>
        <input type="text" class="form-control" id="lastnamedoctor" name="lastnamedoctor" placeholder="กรอกนามสกุลแพทย์">
    </div>
    <div class="mb-3">
        <label for="lastnamedoctor" class="form-label">เบอร์ติดต่อ</label>
        <input type="text" class="form-control" id="telDoctor" name="telDoctor" placeholder="เบอร์ติดต่อ">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">สถานะการใช้งาน</label>
        <select class="form-select" id="status" name="status">
            <option value="true">เปิดการใช้งาน</option>
            <option value="false">ปิดการใช้งาน</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" onclick="AddDoctor()">เพิ่มข้อมูล</button>
</form>