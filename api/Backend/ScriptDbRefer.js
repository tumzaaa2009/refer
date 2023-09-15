function clearFields() {
  // เลือกฟิลด์ "เลขที่ใบส่งตัว" และ "รหัสสถานพยาบาลปลายทาง" โดยใช้ชื่อ (name) ของฟิลด์
  var refnoField = document.querySelector("input[name='refno']");
  var hosreferField = document.querySelector("input[name='hosrefer']");

  // เคลียร์ค่าในฟิลด์ "เลขที่ใบส่งตัว" และ "รหัสสถานพยาบาลปลายทาง"
  refnoField.value = "";
  hosreferField.value = "";
}

// * ทำ formattdate
function formatDateToThai(dateStr) {
  const months = [
    "มกราคม",
    "กุมภาพันธ์",
    "มีนาคม",
    "เมษายน",
    "พฤษภาคม",
    "มิถุนายน",
    "กรกฎาคม",
    "สิงหาคม",
    "กันยายน",
    "ตุลาคม",
    "พฤศจิกายน",
    "ธันวาคม",
  ];

  const date = new Date(dateStr);
  const day = date.getDate();
  const month = months[date.getMonth()];
  const year = date.getFullYear() + 543; // เพิ่ม 543 เพื่อแปลงเป็นปี พ.ศ.

  return `${day} ${month} ${year}`;
}

// ?แปลง Date ของปฏิทิน
function formatDateThai(dateString) {
  const date = new Date(dateString);
  const options = {
    year: "numeric",
    month: "short",
    day: "numeric",
  };

  const thaiDate = date.toLocaleDateString("th-TH", options);

  return `${thaiDate}`;
}
// *lv actual เปลี่ยนสีและ insert ข้อมูลสีเข้าไปในตารางและแสดงสีตาม lv

function updateColor() {
  const select = document.getElementById("levelActual");
  const input = document.getElementsByName("colorLvAc")[0];

  const selectedOption = event.target.options[event.target.selectedIndex];
  const color = window.getComputedStyle(selectedOption).backgroundColor;
  input.value = color;
}

// ** refer Api  //
//* StationService //
const ServiceStation = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      servicestation: "on",
    },
    dataType: "JSON",
    success: function (response) {
      const stationService = [];
      stationService.push(
        `<option value="0" seleted>--ระบุหน่วยบริการ--</option>`
      );
      for (let index = 0; index < response.response.length; index++) {
        stationService.push(
          `<option id='${response.response[index].station_name}'>${response.response[index].station_name}</option>`
        );
      }
      $("#getStationService").html(stationService);
    },
  });
};
const LevelActual = (value, color) => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      lvActual: 1,
    },
    dataType: "JSON",
    success: function (response) {
      const lvActual = [];
      lvActual.push(
        `<option selected="selected" value="0">--เลือกระดับความรุนแรง--</option>`
      );
      for (let index = 0; index < response.response.length; index++) {
        lvActual.push(
          `<option value="${response.response[index].level_value}" style="background:${response.response[index].level_color};" >${response.response[index].level_name}</option>`
        );
      }
      $("#levelActual").html(lvActual);
    },
  });
};
const HnInput = (value) => {
  if (typeConnect == "ConnectToAPI") {
    $.ajax({
      url: "http://localhost:8080/refer/api/",
      type: "POST",
      beforeSend: function () {
        // แสดงข้อความโหลดก่อนส่งข้อมูล
        $("#loader").show();
      },
      complete: function () {
        // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
        $("#loader").hide();
      },
      data: {
        headAuthHis: auth,
        urlTokenHis: callPathHis,
        patien: patien,
        keyTokenHis: tokenApi,
        hospCode: hosCode,
        hn: value,
      },
      dataType: "JSON",
      success: function (response) {
        // 4. แสดงผลลัพธ์

        if (response.statusCode == 200) {
          var today = new Date();
          var pastDate = new Date(response.person[0].birthday);
          var diffYears = today.getFullYear() - pastDate.getFullYear();

          if (response.person[0].sex == 1) {
            var sex = "ชาย";
          } else if (response.person[0].sex == 2) {
            var sex = "หญิง";
          } else {
            var sex = "อื่น";
          }

          $("#hn").val(response.person[0].hn);
          $("#cid").val(response.person[0].cid);
          $("#pname").val(response.person[0].pname);
          $("#fname").val(response.person[0].fname);
          $("#lname").val(response.person[0].lname);
          $("#age").val(diffYears);
          $("#sex").val(sex);
          $("#addr").val(response.person[0].address.addr);
          $("#moopart").val(response.person[0].address.mooparth);
          $("#amppart").val(response.person[0].address.amppart);
          $("#tmbpart").val(response.person[0].address.tmbpart);
          $("#chwpart").val(response.person[0].address.chwpart);
          $("#opd_allergy").val(response.person[0].allergy);
          if (typeConnect == "ConnectToDb") {
            DrugItemdetailDes(response.person.hn);
            DrugLabs(response.person.hn);
          }
          // else if (typeConnect == "ConnectToAPI") {
          //     DrugItemdetailDes(response.drug)
          //     DrugLabs(response.lab)
          // }
          $("#custom-tabs-one-home-tab").tab("show");
        } else if (response.status == 400) {
          alert("ไม่พบเลข Hn / Cid");
          $("#hn").val("");
          $("#cid").val("");
          $("#pname").val("");
          $("#fname").val("");
          $("#lname").val("");
          $("#age").val("");
          $("#sex").val("");
          $("#addr").val("");
          $("#moopart").val("");
          $("#amppart").val("");
          $("#tmbpart").val("");
          $("#chwpart").val("");
          $("#opd_allergy").val("");
          $("#treeview").html("");
          $("#treeviewLabs").html("");
        } else if (response.status == 500) {
          $("#hn").val("");
          $("#cid").val("");
          $("#pname").val("");
          $("#fname").val("");
          $("#lname").val("");
          $("#age").val("");
          $("#sex").val("");
          $("#addr").val("");
          $("#moopart").val("");
          $("#amppart").val("");
          $("#tmbpart").val("");
          $("#chwpart").val("");
          $("#opd_allergy").val("");
          $("#treeview").html("");
          $("#treeviewLabs").html("");
        } else if (response.status == 502) {
          alert("ไม่พบเลข Hn / Cid");
          $("#hn").val("");
          $("#cid").val("");
          $("#pname").val("");
          $("#fname").val("");
          $("#lname").val("");
          $("#age").val("");
          $("#sex").val("");
          $("#addr").val("");
          $("#moopart").val("");
          $("#amppart").val("");
          $("#tmbpart").val("");
          $("#chwpart").val("");
          $("#opd_allergy").val("");
          $("#treeview").html("");
          $("#treeviewLabs").html("");
        }
      },
    });
  } else if (typeConnect == "ConnectToDb") {
    $.ajax({
      url: callPathHis,
      type: "POST",
      data: {
        hn: value,
      },
      dataType: "JSON",
      success: function (response) {
        // 4. แสดงผลลัพธ์

        if (response.status == 200) {
          var today = new Date();
          var pastDate = new Date(response.person.birthday);
          var diffYears = today.getFullYear() - pastDate.getFullYear();
          if (response.person.sex == 1) {
            var sex = "ชาย";
          } else if (response.person.sex == 2) {
            var sex = "หญิง";
          } else {
            var sex = "อื่น";
          }
          $("#hn").val(response.person.hn);
          $("#cid").val(response.person.cid);
          $("#pname").val(response.person.pname);
          $("#fname").val(response.person.fname);
          $("#lname").val(response.person.lname);
          $("#age").val(diffYears);
          $("#sex").val(sex);
          $("#addr").val(response.person.address.addr);
          $("#moopart").val(response.person.address.mooparth);
          $("#amppart").val(response.person.address.amppart);
          $("#tmbpart").val(response.person.address.tmbpart);
          $("#chwpart").val(response.person.address.chwpart);
          $("#opd_allergy").val(response.person.allergy);
          if (typeConnect == "ConnectToDb") {
            DrugItemdetailDes(response.person.hn);
            DrugLabs(response.person.hn);
          }
          // else if (typeConnect == "ConnectToAPI") {
          //     DrugItemdetailDes(response.drug)
          //     DrugLabs(response.lab)
          // }
        } else if (response.status == 400) {
          alert("ไม่พบเลข Hn / Cid");
          $("#hn").val("");
          $("#cid").val("");
          $("#pname").val("");
          $("#fname").val("");
          $("#lname").val("");
          $("#age").val("");
          $("#sex").val("");
          $("#addr").val("");
          $("#moopart").val("");
          $("#amppart").val("");
          $("#tmbpart").val("");
          $("#chwpart").val("");
          $("#opd_allergy").val("");
          $("#treeview").html("");
          $("#treeviewLabs").html("");
        } else if (response.status == 500) {
          alert(response.message);
        }
      },
    });
  }
};
let arrayHn = [];
// * สร้างตัวแปรเก็บ array ของ date ทั้งหมด และ detail ของ labs หรือ Drugs
let arrayLabsListDate = [];
let arrayLabDetail = [];
let arrayDrugDate = [];
let arrayDrugDetail = [];

// api เรียก drug และ lab
const VstDate = (value) => {
  $.ajax({
    url: "http://localhost:8080/refer/api/",
    type: "POST",
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล

      $("#loaderDrug").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด

      $("#loaderDrug").hide();
    },

    data: {
      headAuthHis: auth,
      urlTokenHis: callPathHis,
      vstDate: vsDate,
      keyTokenHis: tokenApi,
      hospCode: hosCode,
      hn: $("#hn").val(),
      eventTypeName: value,
    },
    dataType: "JSON",
    success: function (response) {
      if (value == "Drugs") {
        if (arrayDrugDate.length > 0) {
          if (arrayDrugDate[0].hn !== $("#hn").val()) {
            arrayDrugDate = [];
            arrayDrugDetail = [];
            DrugLabs(response);
          } else {
            return false;
          }
        } else {
          DrugLabs(response);
        }
      }
      if (value == "Labs") {
        if (arrayLabsListDate.length > 0) {
          if (arrayLabsListDate[0].hn !== $("#hn").val()) {
            arrayLabsListDate = [];
            arrayLabDetail = [];
            DrugLabs(response);
          } else {
            return false;
          }
        } else {
          DrugLabs(response);
        }
      }

      // รวมการเรียก DrugLabs(response) ที่นี่ (หลังจากเช็คเงื่อนไขทั้งหมด)
    },
  });
};

// ? เรียก api cloud rh4
const SearchHosMain = () => {
  var formData = {
    searchIdHosMain: $("#searchIdHosmain").val(),
    searchNameHosMain: $("#searchNameHosMain").val(),
  };
  $.ajax({
    type: "POST",
    url: `${callPathHis}`,
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    const hosId = [];
    const hosName = [];
    if (tableHeight > modalHeight) {
      var tableHeight = $(".table").height();
      var modalHeight = $(".modal-body").height();
      if (tableHeight > modalHeight) {
        $(".table-responsive").css("height", modalHeight - 60);
      }
    }
    $("#searchHosMain").html(data.dataRes);
    $("#searchIdHosmain").val("");
    $("#searchNameHosMain").val("");
  });

  event.preventDefault();
};
const SearchHosDes = () => {
  var formData = {
    searchIdHosDes: $("#searchIdHosDes").val(),
    searchNameHosDes: $("#searchNameHosDes").val(),
  };
  $.ajax({
    type: "POST",
    url: `${callPathHis}`,
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    const hosId = [];
    const hosName = [];
    if (tableHeight > modalHeight) {
      var tableHeight = $(".table").height();
      var modalHeight = $(".modal-body").height();
      if (tableHeight > modalHeight) {
        $(".table-responsive").css("height", modalHeight - 60);
      }
    }
    $("#searchHosDes").html(data.dataRes);
    $("#searchIdHosDes").val("");
    $("#searchNameHosDes").val("");
  });

  event.preventDefault();
};

const SelectValueHosnameMain = (idHos, hosName) => {
  $("#searchIdHosmain").val(idHos);
  $("#searchNameHosMain").val(hosName);
};
const SelectValueHosNameDes = (idHos, hosName) => {
  $("#searchIdHosDes").val(idHos);
  $("#searchNameHosDes").val(hosName);
};

const ChangeLocation = (value) => {
  ward(value.value);
  // LevelActual(value.value)
};

const ward = (value) => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      ward: value,
    },
    dataType: "JSON",
    success: function (response) {
      const stationService = [];
      for (let index = 0; index < response.response.length; index++) {
        stationService.push(
          `<option id='${response.response[index].dep_id}'>${response.response[index].dep_name}</option>`
        );
      }
      $("#getdepartment").html(
        stationService.map((option) =>
          option.replace("id='", "id='getdepartment-")
        )
      );
    },
  });
};

const pttype = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      pttype: "on",
    },
    dataType: "JSON",
    success: function (response) {
      const stationService = [];
      for (let index = 0; index < response.response.length; index++) {
        stationService.push(
          `<option id='${response.response[index].pttype_id}' value='${response.response[index].pttype_name}'>${response.response[index].pttype_name}</option>`
        );
      }
      $("#getpttype").html(stationService);
    },
  });
};

const ValueSeachHos = () => {
  $("#hosIdMain").val($("#searchIdHosmain").val());
  $("#hosMainName").val($("#searchNameHosMain").val());

  $("#hosIdHosDes").val($("#searchIdHosDes").val());
  $("#hosMainNameDes").val($("#searchNameHosDes").val());

  // $("#ValueSeachHos").val('')
  // $("#searchNameHosDes").val('');
  // $("#searchIdHosDes").val('');
  // $("#searchNameHosMain").val('')
  // $("#searchIdHosmain").val('')
  // $("#searchHosMain").val('')
};

// ?PHP CLIENT
// * Send ajax clinicGroup
const SelectGroupClinic = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      clinicGrop: "on",
    },
    dataType: "JSON",
    success: function (response) {
      // $("#clinicsubgroup").html()

      $("#clinicGrop").html(response.response);
    },
  });
};
const Typept = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      Typept: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#Typept").html(response.response);
    },
  });
};
const Loads = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      loads: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#loads").html(response);
    },
  });
};

const ServicePlane = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      servicePLane: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#servicePlane").html(response);
    },
  });
};
const CaseReferOut = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      caseReferOut: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#causeReferout").html(response);
    },
  });
};

// * Ajax other Cause
const ValueOtherCaseReferOut = (params) => {
  if (params == "อื่นๆ") {
    $("#otherCauseReferout").show();
  } else {
    $("#otherCauseReferout").hide();
  }
};
// * Ajax other Case Refer Back
const ValueOtherCaseReferBack = (params) => {
  if (params == "อื่นๆ") {
    $("#DivotherCauseReferback").show();
  } else {
    $("#DivotherCauseReferback").hide();
  }
};
//  * Ajax other referReciveReferBack
const referReciveReferBack = () => {
  const selectedValues = $("#refReciveReferBack").val();

  if (selectedValues.indexOf("อื่นๆ") !== -1) {
    $("#otherRefReciveReferBack").show();
  } else {
    $("#otherRefReciveReferBack").hide();
  }
};

const DoctorName = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      doctorName: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#doctorName").html(response);
      $("#staffDoctorName").html(response);
    },
  });
};

function SelectCar() {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      car: 1,
    },
    dataType: "JSON",
    success: function (response) {
      const carService = [];
      carService.push(
        `<option id='' value='0' selected>ระบุเลขทะเบียนรถ</option>`
      );
      for (let index = 0; index < response.length; index++) {
        carService.push(
          ` <option id = '${response[index].id}'  value = '${response[index].name}' >${response[index].name} </option>`
        );
      }
      $("#carRefer").html(carService);
    },
  });
}

let arrayCancleCase = [];

function SelectCancleCase() {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      cancleCase: 1,
    },
    dataType: "JSON",
    success: function (response) {
      arrayCancleCase.push(
        `<option id='' value='0' selected>ระบุเหตุผลการยกเลิก</option>`
      );
      response.forEach(function (item) {
        arrayCancleCase.push(
          ` <option id = '${item.id}'  value = '${item.name}' >${item.name} </option>`
        );
      });
      $("#inputCancleReferoutOrg").html(arrayCancleCase);
      $("#input-refuse").html(arrayCancleCase);
    },
  });
}
const CoordinateIsName = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      CoordinateName: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#coordinateIs").html(response);
    },
  });
};
const CoordinateIsNameDes = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      CoordinateName: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#coordinateIsDes").html(response);
    },
  });
};
// Add Truma
let rowCount = 0;
const TrumaAdd = () => {
  const tableBody = document.querySelector("#TrumaTable tbody");
  const newRow = document.createElement("tr");
  let numCount = ++rowCount;
  newRow.innerHTML = `
        <td> <select class="form-control" name="Consciousness" id="">
                <option value="Normal">Normal</option>
                <option value="Drowsiness">Drowsiness</option>
                <option value="SemiComa">SemiComa</option>
                <option value="Coma">Coma</option>
                <option value="ไม่สามารถประเมินได้">ไม่สามารถประเมินได้</option>
            </select>
        </td>
        <td><input class="form-control timepicker" type="text" name="timeTruma" /></td>
        <td><input class="form-control" type="number" name="e" /></td>
        <td><input class="form-control" type="number" name="v" /></td>
        <td><input class="form-control" type="number" name="m" /></td>
        <td><input class="form-control" type="number" name="pupilR" /></td>
        <td><input class="form-control" type="number" name="pupilL" /></td>
        <td><input class="form-control" type="number" name="Tc" /></td>
        <td><input class="form-control" type="number" name="prF" /></td>
        <td><input class="form-control" type="number" name="pfM" /></td>
        <td><input class="form-control" type="number" name="bp" placeholder="bp" /></td>
        <td><input class="form-control" type="number" name="mmHg" placeholder="mmhg" /></td>
        <td><input class="form-control" type="number" name="spo2" /></td>
        <td><button class="btn btn-danger" onclick="deleteTurmaTr(this, ${numCount})">Delete</button></td>
        `;

  $("#numTruma").val(numCount);
  tableBody.appendChild(newRow);

  // เรียกใช้งาน jQuery timepicker สำหรับอิลิเมนต์ที่มีคลาส .timepicker ในแถวล่าสุด
  $(newRow).find(".timepicker").timepicker({
    minuteStep: 60,
    showMeridian: false,
    defaultTime: "00:00",
  });
};

const deleteTurmaTr = (btn, count) => {
  const row = btn.closest("tr");
  const countDiff = count - 1;
  $("#numTruma").val(countDiff);
  rowCount--;
  row.remove();
};

const checkEtt = (params) => {};
const conscious = () => {
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      conscious: "on",
    },
    dataType: "JSON",
    success: function (response) {
      $("#conscious").html(response);
    },
  });
};
const EttChk = (params) => {
  var checkbox = document.getElementById("Ettcheck");
  var noEtt = document.getElementById("noEtt");
  var MarkEtt = document.getElementById("MarkEtt");
  const now = new Date();
  const thaiYear = now.getFullYear() + 543;
  const thaiDate = now.getDate().toString().padStart(2, "0");
  const thaiMonth = (now.getMonth() + 1).toString().padStart(2, "0");
  const formattedDate = `${thaiDate}/${thaiMonth}/${thaiYear
    .toString()
    .substr(-2)}`;

  if (checkbox.checked) {
    noEtt.disabled = false;
    MarkEtt.disabled = false;

    $("#management").val(
      `on Endotracheal tube No  . mark  -  DTX - CBC, BUN / Cr, Electrolyte -   H / C x 2 spp. -    0.9 % NaCl iv drip 100 ml / hr -   Diagnosis sepsis วันที่ ${formattedDate} เวลา `
    );
  } else {
    noEtt.disabled = true;
    MarkEtt.disabled = true;
    $("#noEtt").val("");
    $("#MarkEtt").val("");
    $("#management").val(" ");
  }
};
const textnoEtt = (params) => {
  const now = new Date();
  const thaiYear = now.getFullYear() + 543;
  const thaiDate = now.getDate().toString().padStart(2, "0");
  const thaiMonth = (now.getMonth() + 1).toString().padStart(2, "0");
  const formattedDate = `${thaiDate}/${thaiMonth}/${thaiYear
    .toString()
    .substr(-2)}`;

  // เก็บค่าจาก input แรก
  const noEtt = document.getElementById("noEtt").value;

  // เก็บค่าจาก input ที่สอง
  const markEtt = document.getElementById("MarkEtt").value;
  $("#management").val(
    `on Endotracheal tube No ${noEtt}. mark ${markEtt} -  DTX - CBC, BUN / Cr, Electrolyte -   H / C x 2 spp. -    0.9 % NaCl iv drip 100 ml / hr -   Diagnosis sepsis วันที่ ${formattedDate} เวลา `
  );
};

const textMarkEtt = (params) => {
  textnoEtt();
};
const SearchIcd10 = () => {
  var formData = {
    searchIdHosIcd10: $("#searchIdHosIcd10").val(),
    searchNameIcd10: $("#searchNameIcd10").val(),
  };
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    if (data.status == false) {
      alert("ไม่พบ ICD10");
    }
    if (tableHeight > modalHeight) {
      var tableHeight = $(".table").height();
      var modalHeight = $(".modal-body").height();
      if (tableHeight > modalHeight) {
        $(".table-responsive").css("height", modalHeight - 60);
      }
    }

    $("#searchIcd10").html(data.dataRes);
    $("#searchIdHosIcd10").val("");
    $("#searchNameIcd10").val("");
  });
  event.preventDefault();
};
const SelectValueIcd10 = (paramsId, icdName) => {
  $("#searchIdHosIcd10").val(paramsId);
  $("#searchNameIcd10").val(icdName);
};
const arrayIcd10 = [];
const SaveIcd10 = () => {
  const paramsId = $("#searchIdHosIcd10").val();
  const icdName = $("#searchNameIcd10").val();
  if (paramsId != "" || icdName != "")
    arrayIcd10.push({
      id: paramsId,
      name: icdName,
    });
  $("#searchIdHosIcd10").val("");
  $("#searchNameIcd10").val("");
  // clear previous table rows
  $("#AddIcd10 tr ").remove();
  // add new table rows
  let numarrayicd = 0;
  arrayIcd10.forEach((item) => {
    numarrayicd++;
    const newRow = $(`<tr id="${numarrayicd}">`);
    newRow.append(
      $(`<td id="${numarrayicd}">`).html(
        `<input class="form-control" type="text" name="icd10" value="${item.name}" readonly>`
      )
    );
    newRow.append(
      $(`<td id="${numarrayicd}">`).html(
        `<button class='btn btn-block btn-danger'  onclick="delicd10('${item.id}','${numarrayicd}')")">ลบ Icd10 </button>`
      )
    );
    $("#AddIcd10").append(newRow);
  });
};
const delicd10 = (id, num) => {
  arrayIcd = arrayIcd10.filter((item) => item.id == id);

  arrayIcd10.splice(arrayIcd, 1);
  $(`#AddIcd10 tr#${num}`).remove();
  // add new table rows

  event.preventDefault();
};

function ModalReferOutDes() {
  $("#myModalshowTableReferoutDestination").modal("hide");
  $("#contentReferoutDes").html("");
}
const referId = `<?php echo $_GET["idrefer"]; ?>`;
function test() {
  // พี่สร้างขึ้นมาใหม่
}
// * ลาก ITEM ยา มา
function DrugItemdetailDes(hn) {
  if (typeConnect == "ConnectToDb") {
    $.ajax({
      type: `POST`,
      url: `${callPathHis}`,
      data: {
        drugHn: hn,
      },
      dataType: "JSON",
      success: function (response) {
        generateTreeView(response);
      },
    });
  } else if (typeConnect == "ConnectToAPI") {
    generateTreeView(hn);
  }
}
// drug Item Labs
function DrugLabs(hn) {
  if (typeConnect == "ConnectToDb") {
    $.ajax({
      type: `POST`,
      url: `${callPathHis}`,
      data: {
        drugLabs: hn,
      },
      dataType: "JSON",
      success: function (response) {
        generateTreeView(response);
      },
    });
  } else if (typeConnect == "ConnectToAPI") {
    generateTreeViewApi(hn);
  }
}
//* Api ยา /labs

function generateTreeViewApi(data) {
  let hn = $("#hn").val();
  let treeviewId = data.eventTypeName == "Drugs" ? "treeview" : "treeviewLabs";

  let html = `
    <div class="col">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">`;

  for (let index = 0; index < data.event.length; index++) {
    if (data.eventTypeName == "Labs") {
      // arrayLabsListDate = [];
      if (!arrayLabsListDate.includes(data.event[index].visit)) {
        arrayLabsListDate.push({ hn: data.hn, visit: data.event[index].visit }); // เพิ่มค่าในอาร์เรย์หากยังไม่มีค่า visit นี้ในอาร์เรย์
      }
    } else if (data.eventTypeName == "Drugs") {
      // arrayDrugDate=[];

      if (!arrayDrugDate.includes(data.event[index].visit)) {
        arrayDrugDate.push({ hn: data.hn, visit: data.event[index].visit }); // เพิ่มค่าในอาร์เรย์หากยังไม่มีค่า visit นี้ในอาร์เรย์
      }
    }

    if (data.eventTypeName == "Labs") {
      html +=
        `<li class="nav-item"><a class="nav-link" onclick="VistTypeDetail('${data.event[index].visit}', '${data.eventTypeName}', ${hn}, ${hosCode})"><i class="fas fa-angle-left right" ></i>` +
        formatDateThai(data.event[index].visit) +
        `</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>รายการ</th><th>เลือกทั้งหมด </th><th>LabItemName</th><th>lab_items_normal_value</th><th>lab_order_result</th></tr></thead><tbody  id="lab${arrayLabsListDate[index].visit}">`;

      html += "</tbody></table></div></li></ul></li>";
    } else if (data.eventTypeName == "Drugs") {
      html += `
                <li class="nav-item">
                    <a class="nav-link" onclick="VistTypeDetail('${
                      data.event[index].visit
                    }', '${data.eventTypeName}', ${hn}, ${hosCode})">
                        <i class="fas fa-angle-left right"></i>
                        ${formatDateThai(data.event[index].visit)}
                    </a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead>
                                        <tr>
                                            <th>เลือกรายการยา</th>
                                            <th>Drug Name</th>
                                            <th>ประเภทยา</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead><tbody  id="drug${
                                      arrayDrugDate[index].visit
                                    }">`;
      html += "</tbody></table></div></li></ul></li>";
    }
  }
  html += `
            </ul>
        </div>`;

  document.getElementById(treeviewId).innerHTML = html;
}

function VistTypeDetail(DateDetail, typeDetail, Hn, hosCode) {
  let pathTypeDetail = "";

  if (typeDetail == "Drugs") {
    pathTypeDetail = drugDetail;
  } else if (typeDetail == "Labs") {
    pathTypeDetail = labDetail;
  }

  // เรียกใช้งาน AJAX หลังจาก if-else ได้ค่ามาแล้ว
  $.ajax({
    url: "http://localhost:8080/refer/api/",
    type: "POST",

    data: {
      headAuthHis: auth,
      urlTokenHis: callPathHis,
      typeDetail: typeDetail,
      pathDetail: pathTypeDetail,
      detailDate: DateDetail,
      keyTokenHis: tokenApi,
      hn: $("#hn").val(),
      hosCode: hosCode,
      type: "opd",
    },
    dataType: "JSON",
    success: function (response) {
      // ทำสิ่งที่คุณต้องการกับข้อมูลที่ได้จาก AJAX ในส่วนนี้
      if (response.type == "Labs") {
        const resDate = response.date;
        const resData = response.data;
        const index = arrayLabsListDate.findIndex((item) => {
          return item.visit === resDate;
        });
        if (index >= 0) {
          const lab = {
            [resDate]: [resData],
          };
          arrayLabDetail.splice(index, 1, lab);
        } else if (index !== -1) {
          arrayLabDetail[index].data = resData;
        }
        const result = arrayLabsListDate.reduce((acc, date) => {
          const detail = arrayLabDetail.find((item) => item[date.visit]);
          if (detail) {
            acc[date.visit] = detail[date.visit];
          }
          return acc;
        }, {});

        const labDetailHTMLArray = arrayLabsListDate.map((date) => {
          const labData = result[date.visit];

          if (labData) {
            // สร้าง HTML สำหรับแต่ละรายการในวันนี้
            const labItemsHTML = labData
              .map((item, index) => {
                const detailHTML = item
                  .map((detail) => {
                    return `
                  <tr>
                    <td style="width: fit-content">
                      <input type="checkbox" id="itemCheckboxLabs${date.visit}-${index}" name="itemCheckboxlabs" 
                        value='{
                          "date": "${date.visit}", 
                          "lab_items_code": "${detail.lab_items_code}", 
                          "lab_items_name": "${detail.lab_items_name}", 
                          "lab_items_normal_value": "${detail.lab_items_normal_value}", 
                          "lab_order_result": "${detail.lab_order_result}"
                        }'>
                    </td>
                    <td style="width: fit-content">
                      <input type="hidden" class="form-control" readonly value="${date.visit}">
                    </td>
                    <td style="width: fit-content">
                      <input type="text" class="form-control" readonly value="${detail.lab_items_name}">
                    </td>
                    <td style="width: fit-content">
                      <input type="text" class="form-control" readonly value="${detail.lab_items_normal_value}">
                    </td>
                    <td style="width: fit-content">
                      <input type="text" class="form-control" readonly value="${detail.lab_order_result}">
                    </td>
                  </tr>
                `;
                  })
                  .join("");

                return `
               
                ${detailHTML}
              `;
              })
              .join("");

            // เพิ่ม checkbox เพียงหนึ่งเท่านั้นในช่วงของวันที่
            const html = `
              <tr>
                <td style="width: fit-content">
                  <input class="check-all-items-labs" type="checkbox" data-date="${date.visit}">
                </td>
                <td colspan="3">
                  <label class="form-check-label">เลือกทั้งหมด</label>
                </td>
              </tr>
              ${labItemsHTML}
            `;

            return {
              date: date.visit,
              labDetailHTML: html,
            };
          } else {
            return ""; // ถ้าไม่มีข้อมูลใน result สำหรับวันที่นี้ ให้เป็นสตริงเปล่า
          }
        });

        labDetailHTMLArray.forEach(({ date, labDetailHTML }) => {
          const existingHTML = $(`#lab${date}`).html(); // เก็บ HTML ที่มีอยู่ในวันนี้

          // ตรวจสอบว่า HTML สำหรับวันนี้มีค่าหรือไม่
          if (!existingHTML) {
            $(`#lab${date}`).html(labDetailHTML); // ถ้าไม่มีให้สร้าง HTML ใหม่
          }
        });

        // เพิ่มการเชื่อมต่อกับ checkbox เพื่อเลือกรายการทั้งหมดในวันนั้น
        $(".check-all-items-labs").on("change", function () {
          const date = $(this).data("date");
          const checkboxes = $(`#lab${date} input[name="itemCheckboxlabs"]`);
          checkboxes.prop("checked", this.checked);
        });

        // เพิ่มการเชื่อมต่อกับ checkbox รายการในวันนั้น
        $(".check-item-labs").on("change", function () {
          const date = $(this).data("date");
          const index = $(this).data("index");
          const checkbox = $(`#itemCheckboxLabs${date}-${index}`);
          checkbox.prop("checked", this.checked);
        });
      } else {
        const resDate = response.date;
        const resData = response.optimerece;
        const index = arrayDrugDate.findIndex((item) => {
          return item.visit === resDate;
        });
        if (index >= 0) {
          // สร้างอ็อบเจกต์ lab โดยให้ resDate เป็น key และ resData เป็น value
          const lab = {
            [resDate]: [resData],
          };

          // แทนค่าใน arrayLabsListDate ที่ Index 1 ด้วยอ็อบเจกต์ lab
          arrayDrugDetail.splice(index, 1, lab);
        } else if (index !== -1) {
          // หากมีรายการใน arrayLabsListDate ที่มี date ตรงกับ resDate
          // ให้ทำการทับ resData ในรายการนั้น
          arrayDrugDetail[index].data = resData;
        }
        const result = arrayDrugDate.reduce((acc, date) => {
          const drugDetail = arrayDrugDetail.find((item) => item[date.visit]);
          if (drugDetail) {
            acc[date.visit] = drugDetail[date.visit];
          }
          return acc;
        }, {});

        const DrugDetailHTMLArray = arrayDrugDate.map((date) => {
          const drugData = result[date.visit];

          if (!drugData) {
            return "";
          }
          const drugItemsHTML = drugData
            .map((item) => {
              const itemsHTML = item
                .map(
                  (detail, index) => `
                                                    <tr>
                                                        <td style="width: fit-content">
                                                            <input type="checkbox" id="itemCheckbox${date.visit}-${index}" name="itemCheckbox" 
                                                                value='{
                                                                    "date": "${date.visit}", 
                                                                    "drugname": "${detail.drugname}", 
                                                                    "therapeutic": "${detail.therapeutic}", 
                                                                    "unit": "${detail.unit}" 
                                                                }'>
                                                        </td>
                                                        <td style="width: fit-content">
                                                            <input type="hidden" class="form-control" readonly value="${date.visit}">
                                                        </td>
                                                        <td style="width: fit-content">
                                                            <input type="text" class="form-control" readonly value="${detail.drugname}">
                                                        </td>
                                                        <td style="width: fit-content">
                                                            <input type="text" class="form-control" readonly value="${detail.therapeutic}">
                                                        </td>
                                                        <td style="width: fit-content">
                                                            <input type="text" class="form-control" readonly value="${detail.unit}">
                                                        </td>
                                                    </tr>
                                                `
                )
                .join("");
              return itemsHTML;
            })
            .join("");

          const html =
            `
                                                <tr>
                                                    <td style="width: fit-content">
                                                        <input class="check-all-items-labs" type="checkbox" data-date="${date.visit}">
                                                    </td>
                                                    <td colspan="3">
                                                        <label class="form-check-label">เลือกทั้งหมด</label>
                                                    </td>
                                                </tr>
                                            ` + drugItemsHTML;

          return {
            date: date.visit,
            drugDetailHTML: html,
          };
        });

        DrugDetailHTMLArray.forEach(({ date, drugDetailHTML }) => {
          const existingHTML = $(`#drug${date}`).html();
          if (!existingHTML) {
            $(`#drug${date}`).html(drugDetailHTML);
          }
        });

        $(".check-all-items-labs").on("change", function () {
          const date = $(this).data("date");
          const checkboxes = $(`#drug${date} input[name="itemCheckbox"]`);
          checkboxes.prop("checked", this.checked);
        });
      }
    },
  });
}

// ** จบ function checkbox ของ item api -..-

//* generrate ยา // lab
function generateTreeView(data) {
  let genHtml = "";
  let html =
    '<div class="col"><ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
  for (let date in data) {
    if (data[date].optimerece) {
      genHtml = 1;

      if (date !== "status") {
        html +=
          '<li class="nav-item"><a class="nav-link"><i class="fas fa-angle-left right"></i>' +
          formatDateThai(date) +
          '</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>เลือกรายการยา</th><th>Drug Name</th><th>ประเภทยา</th><th>Unit</th></tr></thead><tbody>';

        const optimereceItems = data[date].optimerece;

        html +=
          '<tr><td style="width: fit-content"><div class="form-check"><input class="  check-all-items" type="checkbox" data-date="' +
          date +
          '"></div></td><td colspan="3"><label class="form-check-label">เลือกทั้งหมด</label></td></tr>';

        for (let i = 0; i < optimereceItems.length; i++) {
          let item = optimereceItems[i];

          html +=
            '<tr><td style="width: fit-content"><input type="checkbox" id="itemCheckbox' +
            date +
            '" name="itemCheckbox" value=\'{"date": "' +
            date +
            '", "drugname": "' +
            item.drugname +
            '", "therapeutic": "' +
            item.therapeutic +
            '", "unit": "' +
            item.unit +
            "\"}'></td>" +
            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
            item.drugname +
            '"></td>' +
            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
            item.therapeutic +
            '"></td>' +
            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
            item.unit +
            '"></td></tr>';
        }

        html += "</tbody></table></div></li></ul></li>";
      }
    } else {
      // ? drug lab
      if (date !== "status") {
        html +=
          '<li class="nav-item"><a class="nav-link"><i class="fas fa-angle-left right"></i>' +
          formatDateThai(date) +
          '</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>รายการ</th><th>เลือกทั้งหมด </th><th>LabItemName</th><th>lab_items_normal_value</th><th>lab_order_result</th></tr></thead><tbody>';
        html +=
          '<tr><td style="width: fit-content"> <input class="check-all-items-labs" type="checkbox" data-date="' +
          date +
          '"></td><td colspan="3"><label class="form-check-label">เลือกทั้งหมด</label></td></tr>';
        for (let i = 0; i < data[date].length; i++) {
          let item = data[date][i];

          html +=
            '<tr><td style="width: fit-content"><input type="checkbox" id="itemCheckboxLabs' +
            date +
            '" name="itemCheckboxlabs" value=\'{"date": "' +
            date +
            '", "lab_items_code": "' +
            item.lab_items_code +
            '", "lab_items_name": "' +
            item.lab_items_name +
            '", "lab_items_normal_value": "' +
            item.lab_items_normal_value +
            '","lab_order_result":"' +
            item.lab_order_result +
            "\"}'></td>" +
            '<td style="width: fit-content"><input type="hidden" class="form-control" readonly value="' +
            item.lab_items_code +
            '"></td>' +
            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
            item.lab_items_name +
            '"></td>' +
            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
            item.lab_items_normal_value +
            '"></td>' +
            '<td style="width: fit-content"><input type="text" class="form-control" readonly value="' +
            item.lab_order_result +
            '"></td> </tr > ';
        }
        html += "</tbody></table></div></li></ul></li>";
      }
    }
  }
  html += "</ul></div>";

  // เขียน HTML ของ table treeview ลงใน div#treeview
  if (genHtml == 1) {
    document.getElementById("treeview").innerHTML = html;
  } else {
    document.getElementById("treeviewLabs").innerHTML = html;
  }
  //* drug
  const checkboxes = document.querySelectorAll('input[name="itemCheckbox"]');
  const checkAllItems = document.querySelectorAll(".check-all-items");

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", toggleCheckbox);
  });

  checkAllItems.forEach((checkAllItem) => {
    checkAllItem.addEventListener("change", toggleAllItems);
  });

  function toggleCheckbox(event) {
    const checkbox = event.target;
    const allChecked = Array.from(checkboxes).every(
      (checkbox) => checkbox.checked
    );

    checkAllItems.forEach((checkAllItem) => {
      if (checkbox.checked) {
        checkAllItem.checked = allChecked;
      } else {
        checkAllItem.checked = false;
      }
    });
  }

  function toggleAllItems(event) {
    const checkAllItem = event.target;
    const date = checkAllItem.getAttribute("data-date");

    const drugCheckboxes = document.querySelectorAll(
      'input[id="itemCheckbox' + date + '"]'
    );

    drugCheckboxes.forEach((checkbox) => {
      checkbox.checked = checkAllItem.checked;
    });
  }
  //* End Drug
  // *  LAbs
  function toggleAllLabItems(event) {
    const checkAllItem = event.target;
    const date = checkAllItem.getAttribute("data-date");
    const labItemCheckboxes = document.querySelectorAll(
      'input[id="itemCheckboxLabs' + date + '"]'
    );

    labItemCheckboxes.forEach((checkbox) => {
      checkbox.checked = checkAllItem.checked;
    });
  }

  const checkAllItemsLabs = document.querySelectorAll(".check-all-items-labs");
  checkAllItemsLabs.forEach((checkAllItem) => {
    checkAllItem.addEventListener("change", toggleAllLabItems);
  });

  // *  LAbs
}

// showmodalrefer in
$("#open-modal-case-referin").click(function () {
  $("#mmmodal").modal("show");
  $.ajax({
    type: "POST",
    url: `${callPathRefer}`,
    data: {
      modalDerivery: "on",
    },
    dataType: "JSON",
    success: function (response) {
      const stationService = [];
      stationService.push(
        `   <option selected="selected">--เลือกวิธีการนำส่งผู้ป่วย--</option>`
      );

      for (let index = 0; index < response.length; index++) {
        stationService.push(
          `<option id='${response[index].id}' value='${response[index].Name}'>${response[index].Name}</option>`
        );
      }
      $("#deriveryService").html(stationService);
    },
  });
});

// *** funtion Modal
async function modalDerivery(value) {
  if (value == "อื่น") {
    $("#OtherCaseSendRefer").show();
  } else {
    $("#OtherCaseSendRefer").hide();
    $("#inputOtherCase").val("");
  }

  return new Promise((resolve) => {
    resolve({
      otherCase: value,
    });
  });
}
async function InputOtherCase(value) {
  return new Promise((resolve) => {
    resolve({
      otherCase: value,
    });
  });
}
