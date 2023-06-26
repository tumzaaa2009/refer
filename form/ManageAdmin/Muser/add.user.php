<form enctype="multipart/form-data" id="refer-user-add">
    <div class="mb-3">
        <label for="namedoctor" class="form-label">User เข้าระบบ </label>
        <input type="text" class="form-control" id="namedoctor" name="username" placeholder="UserName">
    </div>
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> รหัสเข้าใช้ระบบ </label>
        <input type="text" class="form-control" id="namedoctor" name="userpassword" placeholder="UserPassword">
    </div>
    <div class="mb-3">
        <label for="namedoctor" class="form-label"> ชื่อผู้ใช้งาน </label>
        <input type="text" class="form-control" id="myName" name="myName" placeholder="ชื่อ-นามสกุล">
    </div>
    <div class="mb-3">
        <label for="lastnamedoctor" class="form-label">สถานที่ๆรับผิดชอบ (สั้น)</label>
        <input type="text" class="form-control" id="lcationDetail" name="lcationDetail" placeholder="สถานที่ๆรับผิดชอบ">
    </div>
    <div class="mb-3">
        <label for="lastnamedoctor" class="form-label">เบอร์ติดต่อ</label>
        <input type="text" class="form-control" id="userTel" name="userTel" placeholder="เบอร์ติดต่อ">
    </div>
    <div class="mb-3 form-group">
        <label for="lastnamedoctor" class="form-label">สิทธิ์การเข้าถึง</label>
        <select class="select2" multiple="multiple" name="authRefer[]" data-placeholder="เลือกระดับการเข้าถึง" style="width: 100%;">
            <option value="user">เมนูผู้ใช้งาน</option>
            <option value="doctor">เมนูหมอ</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">สถานะการใช้งาน</label>
        <select class="form-select" id="status" name="status">
            <option value="true">เปิดการใช้งาน</option>
            <option value="false">ปิดการใช้งาน</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" onclick="AddUser()">เพิ่มข้อมูล</button>
</form>