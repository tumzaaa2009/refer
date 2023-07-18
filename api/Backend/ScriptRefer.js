//? Station Destination
const getStationServiceDestinations = (value) => {
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: `https://rh4cloudcenter.moph.go.th:3000/referapi/servicestaion`,
    data: {
      servicestation: value,
    },
    dataType: "JSON",
    success: function (response) {
      let consultService = "";
      if (response.msg != null) {
        const jsonService = JSON.parse(response.msg[0].station_name);
        consultService = Object.keys(jsonService).map((jsonServiceKey) => {
          const jsonServiceValue = jsonService[jsonServiceKey];
          return `<option id='${jsonServiceValue}'>${jsonServiceValue}</option>`;
        });
        $("#getStationServiceDestination").html(
          consultService.map((option) =>
            option.replace("id='", "id='destination-")
          )
        );
        $("#sendFromReferHoscodeUpdate").prop("disabled", false);
        $("#sendFromReferOut").prop("disabled", false);
      } else {
        consultService = `<option id=''>รพ ปลายทางยังไม่ได้ลงทะเบียน หน่วยบริการ</option>`;
        $("#getStationServiceDestination").html(consultService);
        $("#sendFromReferHoscodeUpdate").prop("disabled", true);
        $("#sendFromReferOut").prop("disabled", true);
      }
    },
  });
};

// ? SendForm API
const sendFromReferOuts = () => {
  const form = document.getElementById("refer-out-form");
  const formData = new FormData(form);
  // เพิ่มเงื่อนไข validate ข้อมูลก่อนส่งข้อมูลผ่าน AJAX
  // ตรวจสอบค่าของ input element แต่ละตัวใน form ก่อนส่งข้อมูล

  if ($("#getStationService").val() === 0) {
    alert("ระบุสถานบริการ");
    return false;
  }

  if ($("#hosIdMain").val() === "") {
    alert("ระบุรัสรพ");
    return false;
  }

  if ($("#hosMainName").val() === "") {
    alert("ระบุชื่อรพ");
    return false;
  }

  if ($("#hosCodeRefer").val() === "0") {
    alert("กรุณาเลือกโรงพยาบาลที่จะส่งต่อ");
    return false;
  }

  if ($("#levelActual").val() === "0") {
    alert("กรุณาเลือกระดับความรุนแรง");
    return false;
  }
  if ($("#doctorName").val() === "0") {
    alert("กรุณาเลือกแพทย์ผู้สั่ง");
    return false;
  }
  if (
    $("#otherCauseReferout").is(":visible") &&
    !formData.get("otherCauseReferout")
  ) {
    alert("กรุณากรอก otherCauseReferout");
    return;
  }
  if (formData.get("timeTruma") == "0:00") {
    alert("กรุณากรอก เวลา");
    return;
  }
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/postreferout",
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล
      $("#loader").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
      $("#loader").hide();
    },
    success: function (response) {
      if (response.message === "Suscess") {
        alert("บันทึกระบบเข้าสู่ datacenter เรียบร้อยครับ");
        location.href = "indexfromuse.php?onfrom=referouttable";
      } else {
        alert("บันทึกไม่ผ่านโปรดตรวจสอบอีกครั้ง");
      }
    },
  });
};

// ? SendFormReferBack API
const sendFromReferBack = () => {
  const form = document.getElementById("refer-back-form");
  const formData = new FormData(form);
  // เพิ่มเงื่อนไข validate ข้อมูลก่อนส่งข้อมูลผ่าน AJAX
  // ตรวจสอบค่าของ input element แต่ละตัวใน form ก่อนส่งข้อมูล
  if ($("#getStationService").val() === 0) {
    alert("ระบุสถานบริการ");
    return false;
  }
  if ($("#hosIdMain").val() === "") {
    alert("ระบุรัสรพ");
    return false;
  }

  if ($("#hosMainName").val() === "") {
    alert("ระบุชื่อรพ");
    return false;
  }

  if ($("#hosCodeRefer").val() === "0") {
    alert("กรุณาเลือกโรงพยาบาลที่จะส่งต่อ");
    return false;
  }

  if ($("#levelActual").val() === "0") {
    alert("กรุณาเลือกระดับความรุนแรง");
    return false;
  }
  if ($("#doctorName").val() === "0") {
    alert("กรุณาเลือกแพทย์ผู้สั่ง");
    return false;
  }
  if ($("#movementFromReferBack").val() === 0) {
    alert("ระบุการเคลื่อนย้าย");
    return false;
  }
  if (
    $("#DivotherCauseReferback").is(":visible") &&
    $("#otherCauseReferBack").val() == ""
  ) {
    alert("กรุณากรอก otherCauseReferBack");
    return;
  }

  if (
    $("#otherCauseReferBack").is(":visible") &&
    $("#inputOtherCauseReferBack").val() == ""
  ) {
    alert("กรุณากรอก inputOtherCauseReferBack");
    return;
  }

  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/postreferback",
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล
      $("#loader").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
      $("#loader").hide();
    },
    success: function (response) {
      if (response.message === "Suscess") {
        alert("บันทึกระบบเข้าสู่ datacenter เรียบร้อยครับ");
        location.href = "indexfromuse.php?onfrom=referouttable";
      } else {
        alert("บันทึกไม่ผ่านโปรดตรวจสอบอีกครั้ง");
      }
    },
  });
};

// ! cancle การส่งตัว ของ รพ ต้นทาง
function cancleReferoutOrg() {
  const caseCancle = $("#inputCancleReferoutOrg").val();
  const isSave = $("#is-save").val();
  if (caseCancle == "") {
    toastr.error(`โปรดระบุเหตุในการยกเลิกการส่งตัว`, "", {
      positionClass: "toast-top-center",
      timeOut: false,
      extendedTimeOut: "1000",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      closeButton: true,
    });
  } else {
    $.ajax({
      type: "POST",
      url: `https://rh4cloudcenter.moph.go.th:3000/referapi/referoutcancledes`,
      data: {
        idrefer: $("#refer_no").val(),
        caseCancle: caseCancle,
        hosCode: hosCode,
        hosReferDes: $("#codeReferDes").val(),
        isSave: isSave,
      },
      dataType: "JSON",
      success: function (response) {
        if (response.msg == true) {
          $("#mmmodalCancleOrg").modal("hide");
          $(".modal-backdrop").fadeOut();
          toastr.success(`ยกเลิกการส่งตัวเรียบร้อย`, "", {
            positionClass: "toast-top-full-width",
            timeOut: false,
            extendedTimeOut: "1000",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            closeButton: true,
          });
          $("#open-modal-case-referout-cancelorg").hide();

          location.href = "indexfromuse.php?onfrom=referouttable";
        }
      },
    });
  }
}

// ? sendform กรณีปลายทางไม่่รับเคส แล้วเปลี่ยนสถานปลายทาง ใหม่
function sendFromReferhosCode() {
  const forms = document.getElementById("refer-out-form");
  const formData = new FormData(forms);
  formData.append("HoscodeCheck", hosCode);
  if ($("#hosCodeRefer").val() === "0") {
    alert("กรุณาเลือกโรงพยาบาลที่จะส่งต่อ");
    return false;
  }
  if ($("#sendFromReferhosCode".val) === "") {
    alert("ระบบเหตุผล");
    return false;
  }
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/referhoscodeupdate",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
      if (response.message === "Success") {
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "รับการส่งตัว",
          showConfirmButton: false,
          timer: 1500,
        });

        setTimeout(function () {
          $("#mmmodalReferCode").modal("hide");
          $(".modal-backdrop").hide();

          // $("#referSus").html(
          //   `<a href="indexfromuse.php?onfrom=showdetailshowdetailreferout&idrefer=${response.refNo}">อ้างอิงเอกสารสงตัวเก่าคลิ๊ก ${response.referNo}</a>`
          // );
          $("#open-modal-case-referout-cancelorg").hide();
          location.href = "indexfromuse.php?onfrom=referouttable";
        }, 2000);
      }
    },
  });
}

// ** Get Station RH4Cloud API

const getStation = (hoscode) => {
  $.ajax({
    type: "POST",
    data: { hoscode: hoscode },
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/referstation",
    dataType: "JSON",
    success: function (response) {
      let arraySelectStation = [];
      arraySelectStation.push(
        `<option value="0" selected>-ระบุโรงพยาบาลปลายทาง-</option>`
      );
      if (response.status != 409) {
        for (let index = 0; index < response.res.length; index++) {
          const hosCode = response.res[index].hos_code;
          const hosName = response.res[index].hos_name;
          arraySelectStation.push(
            `<option value='${hosCode}-${hosName}'>${hosCode}-${hosName}</option>`
          );
        }
      } else {
        arraySelectStation.push(`<option value=''></option>`);
      }
      $("#hosCodeRefer").html(arraySelectStation);
    },
  });
};
// ** ShowDetail

// ?  เปลี่ยนแปลงข้อมูลของ Refer Out
const PutCaseReferOut = () => {
  const form = document.getElementById("refer-out-form");
  const formData = new FormData(form);
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "PUT",
    url: `https://rh4cloudcenter.moph.go.th:3000/referapi/putreferout`,
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล
      $("#loader").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
      $("#loader").hide();
    },
    success: function (response) {
      if (response.message === "Suscess") {
        alert("Update ข้อมูลเสร็จสิ้น");
        // location.href = "indexfromuse.php?onfrom=referouttable";
      } else {
        alert("บันทึกไม่ผ่านโปรดตรวจสอบอีกครั้ง");
      }
    },
  });
};
function PutRefDes() {
  const form = document.getElementById("refer-out-form");
  const formData = new FormData(form);
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "PUT",
    url: `https://rh4cloudcenter.moph.go.th:3000/referapi/putreferoutdes`,
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล
      $("#loader").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
      $("#loader").hide();
    },
    success: function (response) {
      if (response.message === "Suscess") {
        alert("Update ข้อมูลเสร็จสิ้น");
        // location.href = "indexfromuse.php?onfrom=referouttable";
      } else {
        alert("บันทึกไม่ผ่านโปรดตรวจสอบอีกครั้ง");
      }
    },
  });
}

function groupByDate(data) {
  return data.reduce((result, item) => {
    if (result[item.date]) {
      result[item.date].push(item);
    } else {
      result[item.date] = [item];
    }
    return result;
  }, {});
}
function UpStatusReferOutIsSave() {
  let statusRecive = "";
  let cancleCase = "";
  Swal.fire({
    title: `โปรดยืนยันหรือปฏิเสธการรับ ส่งตัว ${$("#refer_no").val()}`,
    showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: "รับการส่งตัว+Updateข้อมูลปลายทาง",
    confirmButtonColor: "#305dd3",

    cancelButtonText: "ปิดหน้าต่างการส่งตัว",
    // denyButtonColor: "#d33",
    width: 750,
  }).then((result) => {
    if (result.isConfirmed) {
      statusRecive = 11;
      const referCode = $("#refer_code").val();
      const DiagonosisDes = $("#DiagonosisDes").val();
      const ccDestination = $("#ccDestination").val();
      const seesionHosCode = hosCode;
      const forms = document.getElementById("refer-out-form");
      const formData = new FormData(forms);

      formData.append("referCode", referCode);
      formData.append("DiagonosisDes", DiagonosisDes);
      formData.append("ccDestination", ccDestination);
      formData.append("seesionHosCode", seesionHosCode);
      formData.append("case", $("#reasonInput").val());
      formData.append("hosCode", hosCode);
      formData.append("status", statusRecive);
      $.ajax({
        headers: {
          "x-access-token": referCode,
        },
        type: "PUT",
        url: "https://rh4cloudcenter.moph.go.th:3000/referapi/updatestatus",
        data: formData,
        dataType: "JSON",
        contentType: false,
        processData: false,
        success: function (response) {
          if (
            response.messages == "susOnrecive" ||
            response.messages == "susNotRecive"
          ) {
            $("#UpStatusReferOutDes").hide();

            if (hosCode == response.referCode) {
              $("#UpStatusReferOutDesResive").show();
            }
            toastr.success(`${response.refNo}`, "", {
              positionClass: "toast-top-full-width",
              timeOut: false,
              extendedTimeOut: "1000",
              showMethod: "fadeIn",
              hideMethod: "fadeOut",
              closeButton: true,
            });
            setTimeout(function () {
              location.href = "indexfromuse.php?onfrom=referouttable";
            }, 1.5);
          }
        },
      });
    } else {
      return false;
    }
  });
}
function RefuseReferOut() {
  const statusRecive = -11;
  const referCode = $("#refer_code").val();
  const DiagonosisDes = $("#DiagonosisDes").val();
  const ccDestination = $("#ccDestination").val();
  const seesionHosCode = hosCode;
  const forms = document.getElementById("refer-out-form");
  const formData = new FormData(forms);

  formData.append("referCode", referCode);
  formData.append("DiagonosisDes", DiagonosisDes);
  formData.append("ccDestination", ccDestination);
  formData.append("seesionHosCode", seesionHosCode);
  formData.append("case", formData.get("reasonInput"));
  formData.append("hosCode", hosCode);
  formData.append("status", statusRecive);
  console.log($("#input-refuse").val());

  if (formData.get("reasonInput") == 0) {
    alert("กรณุระบบเหตุผลการปฏิเสธ");
    return false;
  } else {
    $.ajax({
      headers: {
        "x-access-token": referCode,
      },
      type: "PUT",
      url: "https://rh4cloudcenter.moph.go.th:3000/referapi/updatestatus",
      data: formData,
      dataType: "JSON",
      contentType: false,
      processData: false,
      success: function (response) {
        if (
          response.messages == "susOnrecive" ||
          response.messages == "susNotRecive"
        ) {
          $("#UpStatusReferOutDes").hide();
          $("#refuse-button").hide();
          if (hosCode == response.referCode) {
            $("#UpStatusReferOutDesResive").show();
          }
          toastr.success(`${response.refNo}`, "", {
            positionClass: "toast-top-full-width",
            timeOut: false,
            extendedTimeOut: "1000",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            closeButton: true,
          });
          setTimeout(function () {
            location.href = "indexfromuse.php?onfrom=referouttable";
          }, 1.5);
        }
      },
    });
  }
}

const showTableReferOut = () => {
  const form = document.getElementById("seach-engine");
  const formData = new FormData(form);
  const refno = formData.get("refno");
  const hosrefer = formData.get("hosrefer");
  const cid = formData.get("cid");
  const daterange = formData.get("daterange");
  const statusRefer = formData.get("statusRefer");
  let data = [];
  if (refno != "" || hosrefer != "" || cid != "" || daterange != "") {
    const dates = daterange.split(" - ");
    data = {
      hosCode: hosCode,
      refNo: refno,
      hosRefer: hosrefer,
      cid: cid,
      dateStart: dates[0],
      dateEnd: dates[1],
      statusRefer: statusRefer,
    };
  }
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showtablereferout",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล
      $("#loader").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
      $("#loader").hide();
    },
    success: function (response) {
      const arrayHosRefer = [];
      const arrayItemRefer = [];
      const table = $("#showTableReferOut").DataTable({
        destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
        paging: true,
        lengthMenu: [5, 10, 20], // ตั้งค่าตัวเลือกแสดงหน้า
        language: {
          paginate: {
            previous: "ก่อนหน้า",
            next: "ถัดไป",
          },
        },
        searching: false,
        lengthChange: false,
      });
      if (response.status == 200) {
        let dateString = ` `;
        response.message.forEach(function (item) {
          const dateTimeString = item.refer_date;
          const date = new Date(dateTimeString);
          const day = date.getUTCDate().toString().padStart(2, "0");
          const month = (date.getUTCMonth() + 1).toString().padStart(2, "0");
          const year = date.getUTCFullYear().toString();
          dateString = `${day}-${month}-${year}`;
          let IsSave = "";
          const encrypted = response.message[0].data_encrypt;

          // คีย์ที่ใช้ในการถอดรหัส
          const secretKey = "Rh4Refer";

          // ถอดรหัสข้อมูล
          const decrypted = decryptData(encrypted, secretKey);
          let typeRefer;
          if (item.is_save == -11) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ยกเลิกส่งตัวของปลายทาง'>
                       <i class="fa fa-exclamation-circle" aria-hidden="true" color="black"></i></span>`;
          } else if (item.is_save == -110) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='เปลี่ยนสถานพยาบาลปลายทาง'>
                          <i class="fa fa-exchange-alt"></i>;</span>`;
          } else if (item.is_save == -10) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ยกเลิกการส่งตัว'>
                       <i class="fa fa-exclamation-circle" aria-hidden="true" color="black"></i></span>`;
          } else if (item.is_save == 10) {
            IsSave =
              IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รอลงรับ Refer'><i class="fa fa-times" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 11) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ยืนยันการรับตัว'><i class="fa fa-check" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 111) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ข้อมูลมีการอัพเดท'><i class="fa fa-pencil-alt" style="color: black;"></i></span>`;
          } else if (item.is_save == 14) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รับส่งกลับแล้ว'>
                        <i class="fa fa-ambulance" aria-hidden="true"></i></span>`;
          } else if (item.is_save == 3) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='เปลี่ยนสถานที่ปลายทาง'><i class="fa fa-exchange-alt"></i></span>`;
          }
          if (item.refer_type_id == 0) {
            typeRefer = `<span>ส่งต่อ</span>`;
          } else {
            typeRefer = `<span>ส่งต่อ</span>`;
          }
          arrayHosRefer.push(
            `<tr style="background: ${
              item.level_actual_color
            };" class="refer-row" >
            <td>${item.referdate.substring(0, 10)}</td><td>${
              item.refer_no
            }</td> 
            <td align="center">${IsSave}</td> 
            <td>${item.refer_name}</td>
            <td>${item.location_org}</td>
            <td>${item.refer_hosp_name}</td>
            <td>${item.location_des}</td>
            <td>${item.clinicgroup}</td>
            <td>${item.pttype_id}</td>
            <td>${decrypted.pname}${decrypted.fname} ${decrypted.lname}</td>
            <td>${item.doctor_name}</td>
            <td><a class="btn btn-primary" href="indexfromuse.php?onfrom=showdetailreferout&idrefer=${
              item.codegen_refer_no
            }">รายละเอียด</a> </td>
            </tr>`
          );
        });
        // เรียกใช้ DataTable และแสดงผล

        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable

        // $("#tbodyReferOut").html(arrayHosRefer);
      } else if (response.status == 409) {
        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
      }
    },
  });
};

function decryptData(encryptedData, secretKey) {
  const encryptedDataHash = encryptedData.slice(-64);
  const encryptedDataWithoutHash = encryptedData.slice(0, -64);
  const decryptedBytes = CryptoJS.AES.decrypt(
    encryptedDataWithoutHash,
    secretKey
  );
  const decryptedData = decryptedBytes.toString(CryptoJS.enc.Utf8);
  return JSON.parse(decryptedData);
}
function showDetailReferOut() {
  let dateString = ` `;
  let expDateString = ``;
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showDetailReferOut",
    data: {
      showDetailReferOut: referId,
    },
    dataType: "JSON",
    success: function (response) {
      const dateTimeString = response.message[0].refer_date;
      const date = new Date(dateTimeString);
      const day = date.getUTCDate().toString().padStart(2, "0");
      const month = (date.getUTCMonth() + 1).toString().padStart(2, "0");
      const year = date.getUTCFullYear().toString();
      dateString = `${day}-${month}-${year}`;

      const expdateTimeString = response.message[0].expire_date;
      const expDate = new Date(expdateTimeString);
      const expDay = expDate.getUTCDate().toString().padStart(2, "0");
      const expMonth = (expDate.getUTCMonth() + 1).toString().padStart(2, "0");
      const expYear = expDate.getUTCFullYear().toString();
      expDateString = `${expDay}/${expMonth}/${expYear}`;

      if (response.status == 200) {
        // ข้อมูลที่ถูกเข้ารหัสแล้ว
        const encrypted = response.message[0].data_encrypt;

        // คีย์ที่ใช้ในการถอดรหัส
        const secretKey = "Rh4Refer";

        // ถอดรหัสข้อมูล
        const decrypted = decryptData(encrypted, secretKey);

        console.log("ข้อมูลที่ถอดรหัส:", decrypted);
        const json = JSON.parse(response.message[0].image_api);
        const count = Object.keys(json).length;
        $("#countPictureXray").html(`(${count})`);
        for (let index = 0; index < count; index++) {
          if (count > 0) {
            const firstImagePath = json[0].pathnameId;
            $("#col-section-1").html(
              `<div class="image-container"><a href="${firstImagePath}" target="_blank"    > <img class="img-fluid" crossorigin="anonymous" src="${firstImagePath}" alt="${json[0].name}"><span class="close-button">&times;</span></a></div>`
            );
          }

          if (count > 1) {
            let otherImagesHTML = "";
            for (let i = 1; i < count; i++) {
              const imagePath = json[i].pathnameId;
              otherImagesHTML += `  <div class="col-6"> <a href="${imagePath}" target="_blank"><img class="img-fluid mb-3 " crossorigin="anonymous"   src="${imagePath}" alt="${json[i].name}"></a> </div>`;
            }
            $("#col-section-2").html(otherImagesHTML);
          }
        }
        //* jpg

        const icd10Arr = JSON.parse(response.message[0].icd10);
        const countIcd10 = Object.keys(icd10Arr).length;
        let ict10Detail = [];

        for (let index = 0; index < countIcd10; index++) {
          if (index === countIcd10 - 1) {
            // ถ้าเป็นตัวสุดท้ายให้ใส่ ) เพิ่มเติม
            if (icd10Arr[0].name == undefined) {
              ict10Detail.push(`ไม่พบรายการ`);
            } else {
              ict10Detail.push(`(${index + 1}.${icd10Arr[index].name})`);
            }
          } else {
            // ถ้าไม่ใช่ตัวสุดท้ายให้ใส่ , ด้วย
            ict10Detail.push(`(${index + 1}.${icd10Arr[index].name}),`);
          }
        }

        $("#trDetailIcd10").html(ict10Detail.join("")); // ใช้ join เพื่อรวม array เป็น string โดยไม่มีตัวคั่น

        // * icd 10
        const detaildrugArr = response.message[0].detaildrug;
        if (detaildrugArr != null) {
          const jsonDataDurg = JSON.parse(detaildrugArr);
          const groupedData = groupByDate(jsonDataDurg);

          const drugArray = Object.keys(groupedData).map((date) => {
            const drugs = groupedData[date];
            const drugListItems = drugs
              .map((drug) => {
                return `<tr><td>${drug.drugname}</td><td>${drug.therapeutic}</td><td>${drug.unit}</td></tr>`;
              })
              .join("");
            return `<div class="col">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item">
                        <a class="nav-link"><i class="fas fa-angle-left right"></i>${date}</a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Drug Name</th>
                                    <th>ประเภทยา</th>
                                    <th>Unit</th>
                                  </tr>
                                </thead>
                                <tbody>${drugListItems}</tbody>
                              </table>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>`;
          });

          $("#treeviewDes").html(drugArray);
        }
        // ** detail labs
        const detailLabs = response.message[0].detail_labs;
        if (detailLabs != null) {
          const jsonDataLabs = JSON.parse(detailLabs);
          const groupedDataLabs = groupByDate(jsonDataLabs);

          const labsArray = Object.keys(groupedDataLabs).map((date) => {
            const labs = groupedDataLabs[date];
            const labsListItems = labs
              .map((lab) => {
                return `<tr><td>${lab.lab_items_code}</td><td>${lab.lab_items_name}</td><td>${lab.lab_items_normal_value}</td><td>${lab.lab_order_result}</td></tr>`;
              })
              .join("");
            return `<div class="col">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item">
                        <a class="nav-link"><i class="fas fa-angle-left right"></i>${date}</a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>ITEMLAB</th>
                                    <th>LABNAME</th>
                                    <th>LABNORMALVALUE</th>
                                    <th>LABRESULT</th>
                                  </tr>
                                </thead>
                                <tbody>${labsListItems}</tbody>
                              </table>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>`;
          });
          $("#treeviewLabs").html(labsArray);
        }
        //* labs
        const consultfilesArray = response.message[0].counsult_api;
        if (consultfilesArray != null) {
          const jsonDataConsult = JSON.parse(consultfilesArray);
          const consultArray = Object.keys(jsonDataConsult).map(
            (counsultFile) => {
              return `
                  <div class="col-md-auto">
                    <a href="${jsonDataConsult[counsultFile].pathnameId}"  target="_blank">${jsonDataConsult[counsultFile].name}</a>
                  </div>
               `;
            }
          );
          $("#treeviewConsultFile").html(
            ` <div class="row" > ${consultArray}</div>`
          );
        }

        // ? Consult files
        $("#refer_no").val(response.message[0].refer_no);
        $("#refer_code").val(response.message[0].refer_code);

        $("#codeGenRefer").val(response.message[0].codegen_refer_no);
        $("#hn").val(decrypted.hn);
        $("#cid").val(decrypted.cid);
        $("#age").val(decrypted.age);
        $("#refer_time").val(
          `${response.message[0].formatteStartDate} เวลา:${response.message[0].refer_time}`
        );

        $("#pname").val(decrypted.pname);
        $("#fname").val(decrypted.fname);
        $("#lname").val(decrypted.lname);
        $("#aligy").val(response.message[0].drug_aligy);

        $("#doctorname").val(response.message[0].doctor_name);
        $("#hosReferDes").val(response.message[0].refer_hosp_name);

        $("#reservationtimeExpireDes").val(
          `${response.message[0].formatteStartDate}  เวลา ${response.message[0].expire_time}`
        );

        $("#getStationServiceDestinationDes").val(
          `${response.message[0].location_des}`
        );
        $("#getStationServiceDestinationDes").val(
          `${response.message[0].location_des}`
        );
        $("#getStationServiceDestinationDes").val(
          `${response.message[0].location_des}`
        );
        $("#lvAcityDes").val(`${response.message[0].level_actual}`);
        $("#lvAcityDes").css(
          "background-color",
          response.message[0].level_actual_color
        );
        $("#clinicgroupDes").val(`${response.message[0].clinicgroup}`);
        $("#TypeptDes").val(`${response.message[0].typept}`);
        $("#loadsDes").val(`${response.message[0].loads}`);
        $("#servicePlaneDes").val(`${response.message[0].service_plane}`);
        $("#carReferDes").val(`${response.message[0].car_refer}`);
        $("#causeReferoutDes").val(`${response.message[0].cause_referout}`);
        $("#otherCauseReferout").val(
          `${response.message[0].cause_referout_other}`
        );
        $("#codeReferDes").val(`${response.message[0].refer_hospcode}`);
        $("#doctorNameDes").val(response.message[0].doctor_name);
        $("#coordinateIs").val(response.message[0].coordinate_name);
        $("#conscious").val(response.message[0].conscious);
        $("#is-save").val(response.message[0].is_save);
        // ? ตาราง risk torma
        if (response.message[0].risk_turma != "") {
          const jsonRiskTurma = JSON.parse(response.message[0].risk_turma);

          const riskTurmaArray = Object.keys(jsonRiskTurma).map((key) => {
            if (key === "riskturma") {
              const riskTurma = jsonRiskTurma[key];
              return riskTurma.map((item) => {
                return `<tr class="table-active table-bordered"><td>${item.Consciousness}</td><td>${item.time}</td><td>${item.e}</td><td>${item.v}</td><td>${item.m}</td><td>${item.pupilR}</td><td>${item.pupilL}</td><td>${item.Tc}</td><td>${item.prF}</td><td>${item.pfM}</td><td>${item.bp}</td><td>${item.mmHg}</td><td>${item.spo2}</td></tr>`;
                // ส่งค่าที่ต้องการให้กลับจาก map
              });
            }
          });

          $("#riskturmatbody").html(riskTurmaArray);
        }

        $("#cc").text(response.message[0].cc);
        $("#managementDes").text(response.message[0].management);
        $("#DiagonosisDes").text(response.message[0].dianosis_des);
        $("#ccDestination").text(response.message[0].ccDestination);

        $("#code_gen_refer").val(response.message[0].codegen_refer_no);
        // if (response.message[0].refer_code == hosCode) {
        //   $("#ccMain").prop("readonly", false);
        // } else {
        //   $("#ccMain").prop("readonly", true);
        // }

        $("#Diagonosis").text(response.message[0].dianosis);
        $("#ccMain").text(response.message[0].ccmain);

        const referHoscode = response.message[0].refer_hospcode;
        $("#ccDestination").text(response.message[0].ccDestination);
        $("#UpStatusReferOutDesResive").hide();

        if (response.message[0].is_save == 11) {
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          $("#cc").prop("readonly", false);
          $("#managementDes").prop("readonly", false);
          $("#Diagonosis").prop("readonly", false);
          $("#ccMain").prop("readonly", false);
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          $("#UpdateRefRefer").hide();
          // Select OPtion ต้นทาง
          $(
            '#Typept option[value="' + response.message[0].typept_des + '"]'
          ).prop("selected", true);
          $(
            '#levelActual option[value="' + response.message[0].level_des + '"]'
          ).prop("selected", true);

          $('#bedHos option[value="' + response.message[0].bed_des + '"]').prop(
            "selected",
            true
          );

          $(
            '.load_des option[value="' + response.message[0].load_des + '"]'
          ).prop("selected", true);

          $(
            '#coordinateIsDes option[value="' +
              response.message[0].coordinate_name_des +
              '"]'
          ).prop("selected", true);
          $(
            '#deadCase option[value="' +
              response.message[0].dead_case_des +
              '"]'
          ).prop("selected", true);

          const servicePlaneDes =
            response.message[0].service_plane_des.split(",");
          const select2Values = [];
          $('select[name="sevicePlanDes"] option').each(function () {
            if (servicePlaneDes.includes($(this).val())) {
              $(this).prop("selected", true);
              select2Values.push($(this).val());
            }
          });

          $("#servicePlane").val(select2Values).trigger("change");

          const exprieDate = `${response.message[0].contract_time_des_start_date} - ${response.message[0].contract_time_des_end_date}`;

          const [startDateStr, endDateStr] = exprieDate.split(" - ");

          const startDate = `${moment(startDateStr).format("DD/MM/YYYY")} ${
            response.message[0].contract_time_des_start_time
          }`;

          const endDate = `${moment(endDateStr).format("DD/MM/YYYY")} ${
            response.message[0].contract_time_des_end_time
          }`;

          if (hosCode == referHoscode) {
            $("#UpStatusReferOutDesResive").show();
            $("#open-modal-case-referin").show();
            $("#open-modal-case-referHosCodeDes").show();
          } else {
            $("#UpStatusReferOutDesResive").hide();
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
          }
        } else if (response.message[0].is_save == 10) {
          // ? ส่งเคส ---------------------------------------- Refer
          $("#UpdateRefRefer").show();
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          if (hosCode == referHoscode) {
            $("#refuse-button").show();
            $("#UpStatusReferOutDes").show();
            $("#UpdateRefRefer").hide();
            $("#Typept").prop("disabled", false);
            $("#levelActual").prop("disabled", false);
            $("#UpdateCaseRefDes").show();
            $("#bedHos").prop("disabled", false);
            $("#loads").prop("disabled", false);
            $("#coordinateIsDes").prop("disabled", false);
            $("#deadCase").prop("disabled", false);
            $("#servicePlane").prop("disabled", false);
            $("#reservationtime").prop("disabled", false);
            $("#DiagonosisDes").prop("readonly", false);
            $("#ccDestination").prop("readonly", false);
          } else if (hosCode == response.message[0].refer_code) {
            const [refNew, refOld] =
              response.message[0].codegen_refer_no.split("-");

            if (refNew != "" && refOld != "" && refOld != undefined) {
              $("#referSus").show();
              $("#referSus").html(
                `<a href="indexfromuse.php?onfrom=showdetailreferout&idrefer=${refOld}-${refNew}">อ้างอิงส่งตัวเก่า</a>`
              );
            }
            $("#cc").prop("readonly", false);
            $("#managementDes").prop("readonly", false);
            $("#Diagonosis").prop("readonly", false);
            $("#ccMain").prop("readonly", false);
          }
          if (hosCode == response.message[0].refer_code) {
            $("#open-modal-case-referout-cancelorg").show();
          } else {
            $("#open-modal-case-referout-cancelorg").hide();
          }
        } else if (response.message[0].is_save == 111) {
          // const expireDateDes = `;
          const exprieDate = `${response.message[0].contract_time_des_start_date} - ${response.message[0].contract_time_des_end_date}`;

          const [startDateStr, endDateStr] = exprieDate.split(" - ");

          const startDate = `${moment(startDateStr).format("DD/MM/YYYY")} ${
            response.message[0].contract_time_des_start_time
          }`;

          const endDate = `${moment(endDateStr).format("DD/MM/YYYY")} ${
            response.message[0].contract_time_des_end_time
          }`;

          // ? Putข้อความเคส ---------------------------------------- Refer
          if (hosCode == referHoscode) {
            $("#refuse-button").show();
            $("#UpStatusReferOutDes").show();
            $("#UpdateRefRefer").hide();
            $("#Typept").prop("disabled", false);
            $("#levelActual").prop("disabled", false);
            $("#UpdateCaseRefDes").show();
            $("#bedHos").prop("disabled", false);
            $("#loads").prop("disabled", false);
            $("#coordinateIsDes").prop("disabled", false);
            $("#deadCase").prop("disabled", false);
            $("#servicePlane").prop("disabled", false);
            $("#reservationtime").prop("disabled", false);
            $("#DiagonosisDes").prop("readonly", false);
            $("#ccDestination").prop("readonly", false);
            $("#open-modal-case-referout-cancelorg").hide();
            $("#reservationtime").prop("disabled", false);
            // Select OPtion ปลายทาง

            const typetDes = response.message[0].typept_des.split(",");
            const select2typetDes = [];
            $('select[name="Typept_Des"] option').each(function () {
              if (typetDes.includes($(this).val())) {
                $(this).prop("selected", true);
                select2typetDes.push($(this).val());
              }
            });
            $("#Typept").val(select2typetDes).trigger("change");
            $(
              '#levelActual option[value="' +
                response.message[0].level_des +
                '"]'
            ).prop("selected", true);

            const typetbedDes = response.message[0].bad_des.split(",");
            const select2bedDes = [];
            $('select[name="bedHosDes"] option').each(function () {
              if (typetbedDes.includes($(this).val())) {
                $(this).prop("selected", true);
                select2bedDes.push($(this).val());
              }
            });
            $("#bedHos").val(select2bedDes).trigger("change");

            $(
              '.load_des option[value="' + response.message[0].load_des + '"]'
            ).prop("selected", true);

            $(
              '#coordinateIsDes option[value="' +
                response.message[0].coordinate_name_des +
                '"]'
            ).prop("selected", true);
            $(
              '#deadCase option[value="' +
                response.message[0].dead_case_des +
                '"]'
            ).prop("selected", true);

            console.log(response.message[0].service_plane_des);

            $('select[name="sevicePlanDes"] option').each(function () {
              if (
                response.message[0].service_plane_des.includes($(this).val())
              ) {
                $(this).prop("selected", true);
              }
            });
            $("#servicePlane").select2();

            $("#reservationtime").val(startDate + " - " + endDate);
          } else if (hosCode == response.message[0].refer_code) {
            const [refOld, refNew] =
              response.message[0].codegen_refer_no.split("-");
            if (refNew != "" && refOld != "") {
              // $("#referSus").show();
              // $("#referSus").html(
              //   `<a href="indexfromuse.php?onfrom=showdetailreferout&idrefer=${refOld}-${refNew}">เอกสารส่งเก่า</a>`
              // );
            }
            $("#cc").prop("readonly", false);
            $("#managementDes").prop("readonly", false);
            $("#Diagonosis").prop("readonly", false);
            $("#ccMain").prop("readonly", false);
            $("#UpStatusReferOutDes").hide();
            $("#open-modal-case-referout-cancelorg").show();
            $("#UpdateRefRefer").show();
            // Select OPtion ต้นทาง

            const typetDes = response.message[0].typept_des.split(",");
            const select2typetDes = [];
            $('select[name="Typept_Des"] option').each(function () {
              if (typetDes.includes($(this).val())) {
                $(this).prop("selected", true);
                select2typetDes.push($(this).val());
              }
            });
            $("#Typept").val(select2typetDes).trigger("change");
            $(
              '#levelActual option[value="' +
                response.message[0].level_des +
                '"]'
            ).prop("selected", true);

            const typetbedDes = response.message[0].bad_des.split(",");
            const select2bedDes = [];
            $('select[name="bedHosDes"] option').each(function () {
              if (typetbedDes.includes($(this).val())) {
                $(this).prop("selected", true);
                select2bedDes.push($(this).val());
              }
            });
            $("#bedHos").val(select2bedDes).trigger("change");

            $(
              '.load_des option[value="' + response.message[0].load_des + '"]'
            ).prop("selected", true);

            $(
              '#coordinateIsDes option[value="' +
                response.message[0].coordinate_name_des +
                '"]'
            ).prop("selected", true);
            $(
              '#deadCase option[value="' +
                response.message[0].dead_case_des +
                '"]'
            ).prop("selected", true);

            const servicePlaneDes =
              response.message[0].service_plane_des.split(",");
            const select2Values = [];
            $('select[name="sevicePlanDes"] option').each(function () {
              if (servicePlaneDes.includes($(this).val())) {
                $(this).prop("selected", true);
                select2Values.push($(this).val());
              }
            });

            $("#servicePlane").val(select2Values).trigger("change");
            $("#reservationtime").val(startDate + " - " + endDate);
          }
        } else if (response.message[0].is_save == -10) {
          $("#cancleRefer-status-10-11").show();
          if (
            response.message[0].cancle_org !== null &&
            response.message[0].cancle_des !== null
          ) {
            $("#cancleRefer-status-10-11").html(
              `<h2>เหตุผลการยกเลิกต้นทาง-ปลายทาง  : ${response.message[0].cancle_org} - ${response.message[0].cancle_des}</h2>`
            );
          } else if (response.message[0].cancle_des == null) {
            $("#cancleRefer-status-10-11").html(
              `<h2>ต้นทางยกเลิก: ${response.message[0].cancle_org}</h2>`
            );
          } else if (response.message[0].cancle_org == null) {
            $("#cancleRefer-status-10-11").html(
              `<h2>ปลายทาง : ${response.message[0].cancle_des}</h2>`
            );
          }

          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
        } else if (response.message[0].is_save == -11) {
          // ?? กรณี ที่ รพ ต้นทาง == ข้อมูลใบส่งตัว แล้วให้เป็น modal เพื่อเปลี่ยนสถานะส่งตัว

          $("#cancleRefer-status-10-11").show();
          if (
            response.message[0].cancle_org !== null &&
            response.message[0].cancle_des !== null
          ) {
            $("#cancleRefer-status-10-11").html(
              `<h2>เหตุผลการยกเลิกต้นทาง-ปลายทาง  : ${response.message[0].cancle_org} - ${response.message[0].cancle_des}</h2>`
            );
          } else if (response.message[0].cancle_des == null) {
            $("#cancleRefer-status-10-11").html(
              `<h2>ต้นทาง : ${response.message[0].cancle_org}</h2>`
            );
          } else if (response.message[0].cancle_org == null) {
            $("#cancleRefer-status-10-11").html(
              `<h2>ปลายทาง : ${response.message[0].cancle_des}</h2>`
            );
          }
          if (hosCode == referHoscode) {
          } else {
            if (
              response.message[0].cancle_org !== null &&
              response.message[0].cancle_des !== null
            ) {
              $("#open-modal-case-referout-cancelorg").hide();
            } else {
              $("#open-modal-case-referout-cancelorg").show();
            }
            $("#open-modal-case-referHocode").show();
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
          }
        } else if (response.message[0].is_save == -110) {
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          $("#cc").prop("readonly", false);
          $("#managementDes").prop("readonly", false);
          $("#Diagonosis").prop("readonly", false);
          $("#ccMain").prop("readonly", false);
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          $("#UpdateRefRefer").hide();
          // Select OPtion ต้นทาง
          $(
            '#Typept option[value="' + response.message[0].typept_des + '"]'
          ).prop("selected", true);
          $(
            '#levelActual option[value="' + response.message[0].level_des + '"]'
          ).prop("selected", true);
          $('#bedHos option[value="' + response.message[0].bed_des + '"]').prop(
            "selected",
            true
          );

          $(
            '.load_des option[value="' + response.message[0].load_des + '"]'
          ).prop("selected", true);

          $(
            '#coordinateIsDes option[value="' +
              response.message[0].coordinate_name_des +
              '"]'
          ).prop("selected", true);
          $(
            '#deadCase option[value="' +
              response.message[0].dead_case_des +
              '"]'
          ).prop("selected", true);

          const servicePlaneDes =
            response.message[0].service_plane_des.split(",");
          const select2Values = [];
          $('select[name="sevicePlanDes"] option').each(function () {
            if (servicePlaneDes.includes($(this).val())) {
              $(this).prop("selected", true);
              select2Values.push($(this).val());
            }
          });

          $("#servicePlane").val(select2Values).trigger("change");

          const exprieDate = `${response.message[0].contract_time_des_start_date} - ${response.message[0].contract_time_des_end_date}`;

          const [startDateStr, endDateStr] = exprieDate.split(" - ");

          const startDate = `${moment(startDateStr).format("DD/MM/YYYY")} ${
            response.message[0].contract_time_des_start_time
          }`;

          const endDate = `${moment(endDateStr).format("DD/MM/YYYY")} ${
            response.message[0].contract_time_des_end_time
          }`;

          $("#cancleRefer-status-10-11").show();

          if (
            response.message[0].cancle_org !== "" &&
            response.message[0].cancle_org !== null &&
            response.message[0].cancle_des !== "" &&
            response.message[0].cancle_des !== null
          ) {
            $("#cancleRefer-status-10-11").html(
              `<h2>เหตุผลการยกเลิกต้นทาง-ปลายทาง : ${response.message[0].cancle_org} - ${response.message[0].cancle_des}</h2>`
            );
          } else {
            $("#cancleRefer-status-10-11").html(
              `<h2>เหตุผลการยกเลิกต้นทาง-ปลายทาง : ${response.message[0].cancle_org}${response.message[0].cancle_des}</h2>`
            );
          }

          if (hosCode == referHoscode) {
            $("#UpStatusReferOutDesResive").show();
            $("#open-modal-case-referin").hide();
            $("#open-modal-case-referHosCodeDes").hide();
          } else {
            const [refOld, refNew] =
              response.message[0].codegen_refer_no.split("-");
            if (refNew != "" && refOld != "") {
              $("#referSus").show();
              $("#referSus").html(
                `<a href="indexfromuse.php?onfrom=showdetailreferout&idrefer=${refNew}-${refOld}">อ้างอิงส่งตัวใหม่</a>`
              );
            }
            $("#UpStatusReferOutDesResive").hide();
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
          }
        }
      }
    },
  });
}

// ** Refer IN  //

//? เคสส่งตัวกลับ
async function SendReferIn() {
  const referNo = $("#refer_no").val();
  const gerReferNo = $("#code_gen_refer").val();
  const ccDes = $("#DiagonosisDes").val();
  const mDes = $("#ccDestination").val();
  const selectTypeDrv = await modalDerivery($("#deriveryService").val());
  const resultTextOther = await InputOtherCase($("#inputOtherCase").val());
  const inputDeriveryCase = $("#inputDeriveryCase").val();

  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/postreferin",
    dataType: "JSON",
    data: {
      referNo,
      gerReferNo,
      ccDes,
      mDes,
      selectTypeDrv: selectTypeDrv.otherCase,
      resultTextOther: resultTextOther.otherCase,
      inputDeriveryCase: inputDeriveryCase,
    },
    success: function (response) {
      $("#mmmodal").modal("hide");
      $(".modal-backdrop").fadeOut();
      if (response.send === "true") {
        toastr.success(`${response.msg}`, "", {
          positionClass: "toast-top-center",
          timeOut: false,
          extendedTimeOut: false,
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          closeButton: true,
        });
        $("#open-modal-case-referin").hide();
        $(".modal-backdrop").fadeOut();
        $("#UpStatusReferOutDesResive").hide();
        $("#UpStatusReferOutDes").hide();

        $("#referSus").html("รับการส่งตัวแล้ว").css("color", "green");
      } else if (response.send === "info") {
        toastr.info(`${response.msg}`, "", {
          positionClass: "toast-top-center",
          timeOut: false,
          extendedTimeOut: false,
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          closeButton: true,
          onShown: function () {
            $(".toast-info").css(
              "color",
              "white",
              "box-shadow",
              "none !important"
            );
          },
        });
      } else {
        toastr.error(`${response.msg}`, "", {
          positionClass: "toast-top-center",
          timeOut: false,
          extendedTimeOut: false,
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          closeButton: true,
        });
      }
    },
  });
}
// ยืนยันการส่งตัว
const showTableReferBack = () => {
  const arrayHosRefer = [];
  const arrayItemRefer = [];
  const form = document.getElementById("seach-engine");
  const formData = new FormData(form);
  const refno = formData.get("refno");
  const hosrefer = formData.get("hosrefer");
  const cid = formData.get("cid");
  const daterange = formData.get("daterange");
  const statusRefer = formData.get("statusRefer");
  let data = [];
  if (refno != "" || hosrefer != "" || cid != "" || daterange != "") {
    const dates = daterange.split(" - ");
    data = {
      hosCode: hosCode,
      refNo: refno,
      hosRefer: hosrefer,
      cid: cid,
      dateStart: dates[0],
      dateEnd: dates[1],
      statusRefer: statusRefer,
    };
  }
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showtablereferback",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      // แสดงข้อความโหลดก่อนส่งข้อมูล
      $("#loader").show();
    },
    complete: function () {
      // ซ่อนข้อความโหลดเมื่อสำเร็จหรือเกิดข้อผิดพลาด
      $("#loader").hide();
    },
    success: function (response) {
      const arrayHosRefer = [];
      const arrayItemRefer = [];
      // เรียกใช้ DataTable และแสดงผล
      const table = $("#showTableReferBack").DataTable({
        destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
        paging: true,
        lengthMenu: [5, 10, 20], // ตั้งค่าตัวเลือกแสดงหน้า
        language: {
          paginate: {
            previous: "ก่อนหน้า",
            next: "ถัดไป",
          },
        },
        searching: false,
        lengthChange: false,
      });
      if (response.status == 200) {
        console.log(response);
        let dateString = ` `;
        response.message.forEach(function (item) {
          const dateTimeString = item.is_date;
          const date = new Date(dateTimeString);
          const day = date.getUTCDate().toString().padStart(2, "0");
          const month = (date.getUTCMonth() + 1).toString().padStart(2, "0");
          const year = date.getUTCFullYear().toString();
          dateString = `${day}-${month}-${year}`;
          let IsSave = "";
          let typeRefer;
          if (item.is_save == 10) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ส่งกลับ'>
                        <i class="fa fa-ambulance" aria-hidden="true"></i></span>`;
          } else if (item.is_save == 11) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ส่งต่อ'>
                          <i class="fa fa-ambulance" aria-hidden="true"></i></span>`;
          }

          if (item.refer_type_id == 0) {
            typeRefer = `<span>ส่งต่อ</span>`;
          } else {
            typeRefer = `<span>ส่งต่อ</span>`;
          }
          arrayHosRefer.push(
            `<tr   class="refer-row" >
            <td>${item.referdate.substring(0, 10)}</td > 
            <td>${
              item.refer_no
            }</td><td>asdasd</td><td><a class="btn btn-primary" href="indexfromuse.php?onfrom=showdetailreferback&idrefer=${
              item.codegen_refer_no
            }">รายละเอียด</a></td></tr>`
          );
          arrayItemRefer.push(item);
        });

        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
        // $("#tbodyReferOut").html(arrayHosRefer);
      } else if (response.status == 409) {
        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
      }
    },
  });
};
const showDetailReferBack = () => {
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showdetailreferback",
    data: {
      showDetailReferOut: referId,
    },
    dataType: "JSON",
    success: function (response) {
      const dateTimeString = response.message[0].refer_date;
      const date = new Date(dateTimeString);
      const day = date.getUTCDate().toString().padStart(2, "0");
      const month = (date.getUTCMonth() + 1).toString().padStart(2, "0");
      const year = date.getUTCFullYear().toString();
      dateString = `${day}-${month}-${year}`;

      const expdateTimeString = response.message[0].expire_date;
      const expDate = new Date(expdateTimeString);
      const expDay = expDate.getUTCDate().toString().padStart(2, "0");
      const expMonth = (expDate.getUTCMonth() + 1).toString().padStart(2, "0");
      const expYear = expDate.getUTCFullYear().toString();
      expDateString = `${expDay}/${expMonth}/${expYear}`;

      if (response.status == 200) {
        $("#refer_no").val(response.message[0].refer_no);
        $("#refer_code").val(response.message[0].refer_code);
        $("#code_gen_refer").val(response.message[0].codegen_refer_no);

        $("#hn").val(response.message[0].hn);
        $("#cid").val(response.message[0].cid);
        $("#age").val(response.message[0].age);
        $("#refer_time").val(
          `${response.message[0].formatteStartDate} เวลา:${response.message[0].refer_time}`
        );
        $("#pname").val(response.message[0].pname);
        $("#fname").val(response.message[0].fname);
        $("#lname").val(response.message[0].lname);
        $("#aligy").val(response.message[0].drug_aligy);
        $("#getStationService").val(response.message[0].location_org);
        $("#department").val(response.message[0].location_id);
        $("#telformreferback").val(response.message[0].tel_referback);
        $("#nameRefer").val(
          ` ${response.message[0].refer_hospcode} ชื่อสถานพยาบาล :${response.message[0].refer_hosp_name}`
        );
        $("#movementFromReferBack").val(
          response.message[0].movement_from_refer
        );
        $("#loads").val(response.message[0].loads);
        $("#doctorName").val(response.message[0].doctor_name);
        $("#staffDoctorName").val(response.message[0].doctor_staf_name);
        $("#reasonFormReferback").val(
          response.message[0].reason_form_referback
        );
        $("#reasonFormReferbackOther").val(
          response.message[0].reason_form_referback_other
        );
        $("#refdrugReferBack").val(response.message[0].ref_drug_referback);

        $("#refReciveReferBack").val(response.message[0].ref_recive_referback);
        $("#refReciveReferBackOther").val(
          response.message[0].ref_recive_referback_other
        );
        $("#progressNote").text(response.message[0].progress_note);
        $("#finalDianosis").text(response.message[0].final_dianosis);
        $("#suggestionDianosis").text(response.message[0].susgestion_note);
        $();
        const json = JSON.parse(response.message[0].image_api);

        // ? ตาราง risk torma
        // ? ตาราง risk torma
        if (response.message[0].risk_turma != "") {
          const jsonRiskTurma = JSON.parse(response.message[0].risk_turma);

          const riskTurmaArray = Object.keys(jsonRiskTurma).map((key) => {
            if (key === "riskturma") {
              const riskTurma = jsonRiskTurma[key];
              return riskTurma.map((item) => {
                return `<tr class="table-active table-bordered"><td>${item.time}</td><td>${item.e}</td><td>${item.v}</td><td>${item.m}</td><td>${item.pupilR}</td><td>${item.pupilL}</td><td>${item.Tc}</td><td>${item.prF}</td><td>${item.pfM}</td><td>${item.bp}</td><td>${item.mmHg}</td><td>${item.spo2}</td></tr>`;
                // ส่งค่าที่ต้องการให้กลับจาก map
              });
            }
          });

          $("#riskturmatbody").html(riskTurmaArray);
        }

        const count = Object.keys(json).length;
        $("#countPictureXray").html(`(${count})`);
        for (let index = 0; index < count; index++) {
          if (count > 0) {
            const firstImagePath = json[0].pathnameId;
            $("#col-section-1").html(
              `<div class="image-container"><a href="${firstImagePath}" target="_blank"    > <img class="img-fluid" crossorigin="anonymous" src="${firstImagePath}" alt="${json[0].name}"><span class="close-button">&times;</span></a></div>`
            );
          }

          if (count > 1) {
            let otherImagesHTML = "";
            for (let i = 1; i < count; i++) {
              const imagePath = json[i].pathnameId;
              otherImagesHTML += `  <div class="col-6"> <a href="${imagePath}" target="_blank"><img class="img-fluid mb-3 " crossorigin="anonymous"   src="${imagePath}" alt="${json[i].name}"></a> </div>`;
            }
            $("#col-section-2").html(otherImagesHTML);
          }
        }
        //* jpg

        const icd10Arr = JSON.parse(response.message[0].icd10);
        const countIcd10 = Object.keys(icd10Arr).length;
        let ict10Detail = [];

        for (let index = 0; index < countIcd10; index++) {
          if (index === countIcd10 - 1) {
            // ถ้าเป็นตัวสุดท้ายให้ใส่ ) เพิ่มเติม
            if (icd10Arr[0].name == undefined) {
              ict10Detail.push(`ไม่พบรายการ`);
            } else {
              ict10Detail.push(`(${index + 1}.${icd10Arr[index].name})`);
            }
          } else {
            // ถ้าไม่ใช่ตัวสุดท้ายให้ใส่ , ด้วย
            ict10Detail.push(`(${index + 1}.${icd10Arr[index].name}),`);
          }
        }

        $("#trDetailIcd10").html(ict10Detail.join("")); // ใช้ join เพื่อรวม array เป็น string โดยไม่มีตัวคั่น

        //* labs
        const consultfilesArray = response.message[0].counsult_api;
        if (consultfilesArray != null) {
          const jsonDataConsult = JSON.parse(consultfilesArray);
          console.log(jsonDataConsult);
          const consultArray = Object.keys(jsonDataConsult).map(
            (counsultFile) => {
              return `
                  <div class="col-md-auto">
                    <a href="${jsonDataConsult[counsultFile].pathnameId}"  target="_blank">${jsonDataConsult[counsultFile].name}</a>
                  </div>
               `;
            }
          );
          $("#treeviewConsultFile").html(
            ` <div class="row" > ${consultArray}</div>`
          );
        }
        // ** detail labs
        const detailLabs = response.message[0].detail_labs;
        if (detailLabs != null) {
          const jsonDataLabs = JSON.parse(detailLabs);
          const groupedDataLabs = groupByDate(jsonDataLabs);

          const labsArray = Object.keys(groupedDataLabs).map((date) => {
            const labs = groupedDataLabs[date];
            const labsListItems = labs
              .map((lab) => {
                return `<tr><td>${lab.lab_items_code}</td><td>${lab.lab_items_name}</td><td>${lab.lab_items_normal_value}</td><td>${lab.lab_order_result}</td></tr>`;
              })
              .join("");
            return `<div class="col">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item">
                        <a class="nav-link"><i class="fas fa-angle-left right"></i>${date}</a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>ITEMLAB</th>
                                    <th>LABNAME</th>
                                    <th>LABNORMALVALUE</th>
                                       <th>LABNORMALRESULT</th>
                                  </tr>
                                </thead>
                                <tbody>${labsListItems}</tbody>
                              </table>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>`;
          });
          $("#treeviewLabs").html(labsArray);
        }
        const detaildrugArr = response.message[0].detaildrug;
        if (detaildrugArr != null) {
          const jsonDataDurg = JSON.parse(detaildrugArr);
          const groupedData = groupByDate(jsonDataDurg);

          const drugArray = Object.keys(groupedData).map((date) => {
            const drugs = groupedData[date];
            const drugListItems = drugs
              .map((drug) => {
                return `<tr><td>${drug.drugname}</td><td>${drug.therapeutic}</td><td>${drug.unit}</td></tr>`;
              })
              .join("");
            return `<div class="col">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item">
                        <a class="nav-link"><i class="fas fa-angle-left right"></i>${date}</a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Drug Name</th>
                                    <th>ประเภทยา</th>
                                    <th>Unit</th>
                                  </tr>
                                </thead>
                                <tbody>${drugListItems}</tbody>
                              </table>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>`;
          });
          $("#treeviewDes").html(drugArray);
        }
        if (response.message[0].is_save == 10) {
          if (hosCode == response.message[0].refer_hospcode) {
            $("#open-modal-case-referHocode").show();
          }
        }
      }
    },
  });
};

const sendFromReferBackhosCode = () => {
  const forms = document.getElementById("refer-back-form");
  const formData = new FormData(forms);
  formData.append("HoscodeCheck", hosCode);
  if ($("#hosCodeRefer").val() === "0") {
    alert("กรุณาเลือกโรงพยาบาลที่จะส่งต่อ");
    return false;
  }
  if ($("#sendFromReferhosCode".val) === "") {
    alert("ระบบเหตุผล");
    return false;
  }
  $.ajax({
    headers: {
      "x-access-token": hosPassCode,
    },
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/putreferbackonlysend",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
      if (response.message === "Success") {
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "รับการส่งตัว",
          showConfirmButton: false,
          timer: 1500,
        });

        setTimeout(function () {
          $("#mmmodalReferCode").modal("hide");
          $(".modal-backdrop").hide();
          // $("#referSus").html(
          //   `<a href="indexfromuse.php?onfrom=showdetailshowdetailreferout&idrefer=${response.refNo}">อ้างอิงเอกสารสงตัวเก่าคลิ๊ก ${response.referNo}</a>`
          // );
          $("#open-modal-case-referout-cancelorg").hide();
          location.href = "indexfromuse.php?onfrom=referbacktable";
        }, 2000);
      }
    },
  });
};
