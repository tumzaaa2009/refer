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
      } else {
        consultService = `<option id=''>รพ ปลายทางยังไม่ได้ลงทะเบียน หน่วยบริการ</option>`;
        $("#getStationServiceDestination").html(consultService);
      }
    },
  });
};

// ? SendForm API
const sendFromReferOut = () => {
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
        location.href = "indexfromuse.php?onfrom=referoutOrigin";
      } else {
        alert("บันทึกไม่ผ่านโปรดตรวจสอบอีกครั้ง");
      }
    },
  });
};

// ! cancle การส่งตัว ของ รพ ต้นทาง
function cancleReferoutOrg() {
  const caseCancle = $("#inputCancleReferoutOrg").val();
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

          location.href = "indexfromuse.php?onfrom=referoutOrigin";
        }
      },
    });
  }
}

// ? sendform กรณีปลายทางไม่่รับเคส แล้วเปลี่ยนสถานปลายทาง ใหม่
function sendFromReferHoscodeUpdate() {
  const forms = document.getElementById("refer-out-form");
  const formData = new FormData(forms);
  if ($("#hosCodeRefer").val() === "0") {
    alert("กรุณาเลือกโรงพยาบาลที่จะส่งต่อ");
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

          $("#referSus").html(
            `<a href="indexfromuse.php?onfrom=showdetailreferoutDestinationtable&idrefer=${response.refNo}">ติดตามเอกสารติดตามการส่งตัวใหม่ เลขที่ ${response.referNo}</a>`
          );
          $("#open-modal-case-referout-cancelorg").hide();
          location.href = "indexfromuse.php?onfrom=referoutOrigin";
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
                return `<tr><td>${lab.lab_items_code}</td><td>${lab.lab_items_name}</td><td>${lab.lab_items_normal_value}</td></tr>`;
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

        // ? ตาราง risk torma
        if (response.message[0].risk_turma != "") {
          const jsonRiskTurma = JSON.parse(response.message[0].risk_turma);

          const riskTurmaArray = Object.keys(jsonRiskTurma).map((key) => {
            if (key === "riskturma") {
              const riskTurma = jsonRiskTurma[key];
              return riskTurma.map((item) => {
                return `<tr class="table-active table-bordered"><td>${item.e}</td><td>${item.v}</td><td>${item.m}</td><td>${item.pupilR}</td><td>${item.pupilL}</td><td>${item.Tc}</td><td>${item.prF}</td><td>${item.pfM}</td><td>${item.bp}</td><td>${item.mmHg}</td><td>${item.spo2}</td></tr>`;
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
        if (response.message[0].refer_code == hosCode) {
          $("#ccMain").prop("readonly", false);
        } else {
          $("#ccMain").prop("readonly", true);
        }

        $("#Diagonosis").text(response.message[0].dianosis);

        if (response.message[0].refer_code == hosCode) {
          $("#Diagonosis").prop("readonly", false);
        } else {
          $("#Diagonosis").prop("readonly", true);
        }

        if (`${response.message[0].refer_hospcode}` == `${hosCode}`) {
          $("#DiagonosisDes").prop("readonly", false);
          $("#ccDestination").prop("readonly", false);
        } else {
          $("#DiagonosisDes").prop("readonly", true);
          $("#ccDestination").prop("readonly", true);
        }

        $("#ccMain").text(response.message[0].ccmain);

        if (response.message[0].refer_code == hosCode) {
          $("#ccMain").prop("readonly", false);
        } else {
          $("#ccMain").prop("readonly", true);
        }
        const referHoscode = response.message[0].refer_hospcode;
        $("#ccDestination").text(response.message[0].ccDestination);
        $("#UpStatusReferOutDesResive").hide();

        if (response.message[0].is_save == 1) {
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          if (hosCode == referHoscode) {
            $("#UpStatusReferOutDesResive").show();
          } else {
            $("#UpStatusReferOutDesResive").hide();
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
          }
        } else if (response.message[0].is_save == 0) {
      
          $("#UpdateRefRefer").show();
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          if (hosCode == referHoscode) {
            $("#UpStatusReferOutDes").show();
          } else {
            $("#UpStatusReferOutDes").hide();
          }
          if (hosCode == response.message[0].refer_code) {
            $("#open-modal-case-referout-cancelorg").show();
          } else {
            $("#open-modal-case-referout-cancelorg").hide();
          }
        } else if (response.message[0].is_save == -1) {
          // ?? กรณี ที่ รพ ต้นทาง == ข้อมูลใบส่งตัว แล้วให้เป็น modal เพื่อเปลี่ยนสถานะส่งตัว
          if (response.message[0].refer_code == hosCode) {
            $("#open-modal-case-referout-cancelorg").show();
            $("#referSus").html(
              `<button type="button" class="btn btn-default" data-bs-toggle="modal" id="open-modal-case-referHocode" data-bs-target="#mmmodalReferCode">    เปลี่ยนสถานพยาบาลปลายทาง  </button>`
            );
          } else {
            $("#referSus").html("ปฏิเสธการส่งตัว").css("color", "black");
            $("#open-modal-case-referout-cancelorg").hide();
          }
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
        } else if (response.message[0].is_save == -2) {
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          $("#referSus")
            .html(`${response.message[0].cancle_org}`)
            .css("color", "red");
        } else if (response.message[0].is_save == 3) {
          if (response.hosDes.length > 0)
            if (response.message[0].refer_code == hosCode) {
              $("#referSus").html(
                `<a href="indexfromuse.php?onfrom=showdetailreferoutDestinationtable&idrefer=${response.hosDes[0].codegen_refer_no}">ติดตามเอกสารติดตามการส่งตัวใหม่ เลขที่ ${response.hosDes[0].refer_no}</a>`
              );
            }
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
        } else {
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
          $("#open-modal-case-referout-cancelorg").hide();
          $("#referSus").html("ยืนยันการรับตัว").css("color", "green");
        }
      }
    },
  });
}

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
const showTableReferOutDestination = () => {
  const arrayHosRefer = [];
  const arrayItemRefer = [];
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showtablereferouthoscodedestination",
    data: {
      idReferHoscode: hosCode,
    },
    dataType: "JSON",
    success: function (response) {
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
          let typeRefer;
          const referHoscode = response.message[0].refer_hospcode;
          $("#UpStatusReferOutDesResive").hide();

          if (response.message[0].is_save == 1) {
            $("#UpStatusReferOutDes").hide();
            $("#open-modal-case-referout-cancelorg").hide();
            if (hosCode == referHoscode) {
              $("#UpStatusReferOutDesResive").show();
            } else {
              $("#UpStatusReferOutDesResive").hide();
              $("#open-modal-case-referin").hide();
            }
          } else if (response.message[0].is_save == 0) {
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            if (hosCode == referHoscode) {
              $("#UpStatusReferOutDes").show();
            } else {
              $("#UpStatusReferOutDes").hide();
            }
          } else if (response.message[0].is_save == -1) {
            // ?? กรณี ที่ รพ ต้นทาง == ข้อมูลใบส่งตัว แล้วให้เป็น modal เพื่อเปลี่ยนสถานะส่งตัว
            if (response.message[0].refer_code == hosCode) {
              $("#referSus").html(
                `<button type="button" class="btn btn-default" data-bs-toggle="modal" id="open-modal-case-referHocode" data-bs-target="#mmmodalReferCode">    เปลี่ยนสถานพยาบาลปลายทาง  </button>`
              );
            } else {
              $("#referSus").html("ปฏิเสธการส่งตัว").css("color", "black");
            }
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
          } else if (response.message[0].is_save == -2) {
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
            $("#open-modal-case-referout-cancelorg").hide();
            $("#referSus")
              .html(`${response.message[0].cancle_org}`)
              .css("color", "red");
          } else if (response.message[0].is_save == 3) {
            if (response.hosDes.length > 0)
              if (response.message[0].refer_code == hosCode) {
                $("#referSus").html(
                  `<a href="indexfromuse.php?onfrom=showdetailreferoutDestinationtable&idrefer=${response.hosDes[0].codegen_refer_no}">ติดตามเอกสารติดตามการส่งตัวใหม่ เลขที่ ${response.hosDes[0].refer_no}</a>`
                );
              }
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
          } else {
            $("#open-modal-case-referin").hide();
            $("#UpStatusReferOutDesResive").hide();
            $("#UpStatusReferOutDes").hide();
            $("#open-modal-case-referout-cancelorg").hide();
            $("#referSus").html("ยืนยันการรับตัว").css("color", "green");
          }
          if (item.is_save == -1) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ปฏิเสธการส่งตัว'>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 0) {
            IsSave =
              IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='สถานปลายทางยังไม่รับการส่งตัว'><i class="fa fa-times" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 1) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ยืนยันการรับตัว'><i class="fa fa-check" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 2) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รับการส่งตัวกลับ'>
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
            `<tr style="background: ${item.level_actual_color};" class="refer-row" ><td>${item.refer_no}</td><td>${item.loads}</td><td>${item.location_des}</td><td>${dateString}</td><td>${item.refer_time}</td><td>${item.pname}${item.fname}${item.lname}</td><td>${item.refer_hospcode}-->${item.refer_hosp_name}</td><td align="center">${IsSave}</td><td>${item.dianosis}</td><td>${item.refer_code}->${item.refer_name}</td><td>${item.clinicgroup}</td><td>${typeRefer}</td> <td>${item.cid}</td><td>${item.pttype_id}</td><td>${item.doctor_name}</td><td><a class="btn btn-primary" href="indexfromuse.php?onfrom=showdetailreferoutDestinationtable&idrefer=${item.codegen_refer_no}">รายละเอียด</a></td></tr>`
          );
          arrayItemRefer.push(item);
        });
        // เรียกใช้ DataTable และแสดงผล
        const table = $("#showTableReferoutDestination").DataTable({
          destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
        });
        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
      }
    },
  });
};
function UpStatusReferOutIsSave() {
  const referNo = $("#refer_no").val();
  const referCode = $("#refer_code").val();
  const DiagonosisDes = $("#DiagonosisDes").val();
  const ccDestination = $("#ccDestination").val();
  const seesionHosCode = hosCode;
  let statusRecive = "";
  let cancleCase = "";
  Swal.fire({
    title: `โปรดยืนยันหรือปฏิเสธการรับ ส่งตัว ${$("#refer_no").val()}`,
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "รับการส่งตัว",
    confirmButtonColor: "#00FF00",
    denyButtonText: `ปฏิเสธการส่งตัว`,
    denyButtonColor: "#d33",
    width: 750,
    html: `
    <input type="text" id="reasonInput" value="" placeholder="ระบุเหตุผลหากปฏิเสธการส่งตัว" class="col-6 swal2-input">
  `,
  }).then((result) => {
    if (result.isConfirmed) {
      // Swal.fire("Saved!", "", "success");
      statusRecive = 1;
    } else if (result.isDenied) {
      const reason = $("#reasonInput").val();
      cancleCase = reason;
      if (reason != "") {
        statusRecive = -1;
      } else {
        Swal.fire({
          title: "โปรดระบุเหตุผล",
          icon: "warning",
          confirmButtonText: "ตกลง",
        });
        return false;
      }
    }
    $.ajax({
      headers: {
        "x-access-token": referCode,
      },
      type: "POST",
      url: "https://rh4cloudcenter.moph.go.th:3000/referapi/updatestatus",
      data: {
        referNo: referNo,
        referCode: referCode,
        DiagonosisDes: DiagonosisDes,
        ccDestination: ccDestination,
        referHospcode: $("#codeReferDes").val(),
        hosCode: hosCode,
        status: statusRecive,
        case: cancleCase,
      },
      dataType: "JSON",
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
            location.href = "indexfromuse.php?onfrom=referoutOrigin";
          }, 1.5);
        }
      },
    });
  });
}

 

const showTableReferOut = () => {
   const form = document.getElementById("seach-engine");
   const formData = new FormData(form);
   const refno = formData.get("refno");
   const hosrefer = formData.get("hosrefer");
   const cid = formData.get("cid");
   const daterange = formData.get("daterange");
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
    };
  } 
  
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showtablereferoutorigin",
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
          let typeRefer;

          if (item.is_save == -1) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ปฏิเสธการส่งตัว'>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 0) {
            IsSave =
              IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รอลงรับ Refer'><i class="fa fa-times" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 1) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ยืนยันการรับตัว'><i class="fa fa-check" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 2) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รับการส่งตัวกลับ'>
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
            };" class="refer-row" ><td>${item.referdate.substring(
              0,
              10
            )}</td><td>${
              item.refer_no
            }</td> <td align="center">${IsSave}</td>  <td>${
              item.location_org
            }</td><td>${item.location_des}</td><td>${
              item.clinicgroup
            }</td><td>${item.pttype_id}</td><td>${item.pname}${item.fname} ${
              item.lname
            }</td><td>${
              item.doctor_name
            }</td><td><a class="btn btn-primary" href="indexfromuse.php?onfrom=showdetailreferout&idrefer=${
              item.codegen_refer_no
            }">รายละเอียด</a></td></tr>`
          );
        });
        // เรียกใช้ DataTable และแสดงผล
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
        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable

        // $("#tbodyReferOut").html(arrayHosRefer);
      } else if (response.status == 409) {
        $("#tbodyReferOut").html(`<tr><td colspan='9'>ไม่พบการค้นหา</td></tr>`);
      }
    },
  });
};

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
      if (response.send === "true") {
        toastr.success(`${response.msg}`, "", {
          positionClass: "toast-top-center",
          timeOut: false,
          extendedTimeOut: false,
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          closeButton: true,
        });

        $("#UpStatusReferOutDesResive").hide();
        $("#UpStatusReferOutDes").hide();
        $("#open-modal-case-referin").hide();
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
      if (response.status == 200) {
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
          if (item.is_save == -1) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ปฏิเสธการส่งตัว'>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 0) {
            IsSave =
              IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='สถานปลายทางยังไม่รับการส่งตัว'><i class="fa fa-times" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 1) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='ยืนยันการรับตัว'><i class="fa fa-check" aria-hidden="true" style="color: black;"></i></span>`;
          } else if (item.is_save == 2) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รับการส่งตัวกลับ'>
                        <i class="fa fa-ambulance" aria-hidden="true"></i></span>`;
          } else if (item.is_save == 3) {
            IsSave = `<span  data-bs-toggle="tooltip" data-bs-placement="bottom" title='รับการส่งตัวกลับ'>
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
        table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
        table.rows.add($(arrayHosRefer.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
        // $("#tbodyReferOut").html(arrayHosRefer);
      } else if (response.status == 409) {
        $("#tbodyReferOut").html(`<tr><td colspan='9'>ไม่พบการค้นหา</td></tr>`);
      }
    },
  });
};

// ? show Detail Referin
function showDetailReferIn() {
  let dateString = ` `;
  let expDateString = ``;
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showDetailReferin",
    data: {
      showDetailReferIn: referId,
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
        const json = JSON.parse(response.message[0].image_api);
        const count = Object.keys(json).length;
        $("#countPictureXray").html(`(${count})`);
        for (let index = 0; index < count; index++) {
          if (count > 0) {
            const firstImagePath = json[0].pathnameId;
            $("#col-section-1").html(
              `<div class="image-container">
  <a href="${firstImagePath}" target="_blank" data-lightbox="image-1" data-title="${json[0].name}"><img class="img-fluid" crossorigin="anonymous" src="${firstImagePath}" alt="${json[0].name}"></a><button class="close-button">&times;</button></div>
`
            );
          }

          if (count > 1) {
            let otherImagesHTML = "";
            for (let i = 1; i < count; i++) {
              const imagePath = json[i].pathnameId;
              otherImagesHTML += `  <div class="col-6"><a href="${imagePath}" target="_blank" data-lightbox="image-1"  ><img class="img-fluid mb-3" crossorigin="anonymous" src="${imagePath}" alt="Photo"></a></div>`;
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
          const coutDrug = Object.keys(jsonDataDurg).length;
          const drugArray = [];
          if (jsonDataDurg != null) {
            for (let index = 0; index < coutDrug; index++) {
              drugArray.push(
                `<div class="col"><ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"><li class="nav-item"><a class="nav-link"><i class="fas fa-angle-left right"></i>${jsonDataDurg[index].date}</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Drug Name</th><th>ประเภทยา</th><th>Unit</th></tr></thead><tbody>
              <tr><td>${jsonDataDurg[index].drugname}</td><td>${jsonDataDurg[index].therapeutic}</td><td>${jsonDataDurg[index].unit}</td></tr></tbody></table></div></li></ul></li></ul></div>`
              );
            }
          }

          $("#treeviewDes").html(drugArray);
        }
        const detailLabs = response.message[0].detail_labs;
        if (detailLabs != null) {
          const jsonDataLabs = JSON.parse(detailLabs);
          const groupedDataLabs = groupByDate(jsonDataLabs);

          const labsArray = Object.keys(groupedDataLabs).map((date) => {
            const labs = groupedDataLabs[date];
            const labsListItems = labs
              .map((lab) => {
                return `<tr><td>${lab.lab_items_code}</td><td>${lab.lab_items_name}</td><td>${lab.lab_items_normal_value}</td></tr>`;
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
        // * treeviewConsultFile

        $("#refer_no").val(response.message[0].refer_no);
        $("#refer_code").val(response.message[0].refer_code);

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

        $("#hosReferDes").val(response.message[0].refer_hosp_name);
        $("#reservationtimeExpireDes").val(
          `${expDateString} เวลา ${response.message[0].expire_time}`
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
        $("#doctorNameDes").val(response.message[0].doctor_name);
        $("#coordinateIs").val(response.message[0].coordinate_name);
        $("#conscious").val(response.message[0].conscious);
        $("#e").val(response.message[0].e);
        $("#v").val(response.message[0].v);
        $("#m").val(response.message[0].m);
        $("#pupilR").val(response.message[0].pupil_left);
        $("#pupilL").val(response.message[0].pupil_right);
        $("#Tc").val(response.message[0].t);
        $("#prF").val(response.message[0].p);
        $("#pfM").val(response.message[0].r);
        $("#bpmmhg").val(response.message[0].bp);
        $("#spo2").val(response.message[0].spo2);
        $("#cc").text(response.message[0].cc);
        $("#managementDes").text(response.message[0].management);
        $("#code_gen_refer").val(response.message[0].codegen_refer_no);
        if (response.message[0].refer_code == hosCode) {
          $("#ccMain").prop("readonly", false);
        } else {
          $("#ccMain").prop("readonly", true);
        }

        $("#Diagonosis").text(response.message[0].dianosis);

        if (response.message[0].refer_code == hosCode) {
          $("#Diagonosis").prop("readonly", false);
        } else {
          $("#Diagonosis").prop("readonly", true);
        }

        $("#ccMain").text(response.message[0].ccmain);

        if (response.message[0].refer_code == hosCode) {
          $("#ccMain").prop("readonly", false);
        } else {
          $("#ccMain").prop("readonly", true);
        }

        $("#ccDestination").text(response.message[0].ccDestination);
        if (response.message[0].is_save == 1) {
          $("#UpStatusReferOutDes").hide();
          $("#UpStatusReferOutDesResive").show();
          $("#open-modal-case-referout-cancelorg").hide();
        } else if (response.message[0].is_save == 0) {
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").show();
        } else {
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
          $("#referSus").html("รับการส่งตัวแล้ว").css("color", "green");
        }
      }
    },
  });
}

function showDetailReferInOnsusSecss() {
  let dateString = ` `;
  let expDateString = ``;

  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/showDetailReferin",
    data: {
      showDetailReferIn: referId,
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
        const json = JSON.parse(response.message[0].image_api);
        const count = Object.keys(json).length;
        $("#countPictureXray").html(`(${count})`);
        for (let index = 0; index < count; index++) {
          if (count > 0) {
            const firstImagePath = json[0].pathnameId;
            $("#col-section-1").html(
              `<a href="${firstImagePath}" target="_blank"><img class="img-fluid" crossorigin="anonymous" src="${firstImagePath}" alt="Photo"></a>`
            );
          }

          if (count > 1) {
            let otherImagesHTML = "";
            for (let i = 1; i < count; i++) {
              const imagePath = json[i].pathnameId;
              otherImagesHTML += `  <div class="col-6"> <a href="${imagePath}" target="_blank"><img class="img-fluid mb-3" crossorigin="anonymous" src="${imagePath}" alt="Photo"></a> </div>`;
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
        $("#trDetailIcd10").html(ict10Detail.join(""));

        // * icd 10

        const detaildrugArr = response.message[0].detaildrug;

        if (detaildrugArr != null) {
          const jsonDataDurg = JSON.parse(detaildrugArr);
          const coutDrug = Object.keys(jsonDataDurg).length;
          const drugArray = [];
          if (jsonDataDurg != null) {
            for (let index = 0; index < coutDrug; index++) {
              drugArray.push(
                `<div class="col"><ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"><li class="nav-item"><a class="nav-link"><i class="fas fa-angle-left right"></i>${jsonDataDurg[index].date}</a><ul class="nav nav-treeview"><li class="nav-item"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Drug Name</th><th>ประเภทยา</th><th>Unit</th></tr></thead><tbody>
              <tr><td>${jsonDataDurg[index].drugname}</td><td>${jsonDataDurg[index].therapeutic}</td><td>${jsonDataDurg[index].unit}</td></tr></tbody></table></div></li></ul></li></ul></div>`
              );
            }
          }

          $("#treeviewDes").html(drugArray);
        }
        console.log(response.message[0]);
        const detailLabs = response.message[0].detail_labs;

        if (detailLabs != null) {
          const jsonDataLabs = JSON.parse(detailLabs);
          const groupedDataLabs = groupByDate(jsonDataLabs);

          const labsArray = Object.keys(groupedDataLabs).map((date) => {
            const labs = groupedDataLabs[date];
            const labsListItems = labs
              .map((lab) => {
                return `<tr><td>${lab.lab_items_code}</td><td>${lab.lab_items_name}</td><td>${lab.lab_items_normal_value}</td></tr>`;
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
        // *consultfilesArray

        $("#refer_no").val(response.message[0].refer_no);
        $("#refer_code").val(response.message[0].refer_code);

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
        $("#e").val(response.message[0].e);
        $("#v").val(response.message[0].v);
        $("#m").val(response.message[0].m);
        $("#pupilR").val(response.message[0].pupil_left);
        $("#pupilL").val(response.message[0].pupil_right);
        $("#Tc").val(response.message[0].t);
        $("#prF").val(response.message[0].p);
        $("#pfM").val(response.message[0].r);
        $("#bpmmhg").val(response.message[0].bp);
        $("#spo2").val(response.message[0].spo2);
        $("#cc").text(response.message[0].cc);
        $("#managementDes").text(response.message[0].management);
        $("#DiagonosisDes").text(response.message[0].dianosis_des);
        $("#code_gen_refer").val(response.message[0].codegen_refer_no);
        if (response.message[0].refer_code == hosCode) {
          $("#ccMain").prop("readonly", false);
        } else {
          $("#ccMain").prop("readonly", true);
        }

        $("#Diagonosis").text(response.message[0].dianosis);

        if (response.message[0].refer_code == hosCode) {
          $("#Diagonosis").prop("readonly", false);
        } else {
          $("#Diagonosis").prop("readonly", true);
        }

        if (`${response.message[0].refer_hospcode}` == `${hosCode}`) {
          $("#DiagonosisDes").prop("readonly", false);
          $("#ccDestination").prop("readonly", false);
        } else {
          $("#DiagonosisDes").prop("readonly", true);
          $("#ccDestination").prop("readonly", true);
        }

        $("#ccMain").text(response.message[0].ccmain);

        if (response.message[0].refer_code == hosCode) {
          $("#ccMain").prop("readonly", false);
        } else {
          $("#ccMain").prop("readonly", true);
        }
        const referHoscode = response.message[0].refer_hospcode;
        $("#ccDestination").text(response.message[0].ccDestination);
        $("#UpStatusReferOutDesResive").hide();
        if (response.message[0].is_save == 2) {
          $("#open-modal-case-referin").hide();
          $("#UpStatusReferOutDesResive").hide();
          $("#UpStatusReferOutDes").hide();
          $("#UpStatusReferOutDesResive").hide();
        }
        $("#modalreferInSus").html(
          `
 <div class="mb-3 col-sm-12" style="  text-align: left;">
  <label for="deliveryName" class="col-form-label" >นำส่งโดย</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="deliveryName" value="${response.message[0].derivery_name}" disabled>
  </div>
</div>
 <div class="mb-3 col-sm-12" style="  text-align: left;">
  <label for="otherReason" class="col-form-label">เหตุผลอื่น</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="otherReason" value="${response.message[0].derivery_service_other}" disabled>
  </div>
</div>
 <div class="mb-3 col-sm-12" style="  text-align: left;">
  <label for="deliveryReason" class="col-form-label">เหตุผลในการส่งตัว</label>
  <div class="col-sm-10">
    <textarea class="form-control" id="deliveryReason" rows="3" disabled>${response.message[0].other_refer_case_refer_in}</textarea>
  </div>
</div>
          `
        );
      }
    },
  });
}

function CanCelTableRefer() {
  const cancleTableRefer = 1;
  $.ajax({
    type: "POST",
    url: "https://rh4cloudcenter.moph.go.th:3000/referapi/canclerefer",
    data: { referHoscode: hosCode },
    dataType: "JSON",
    success: function (response) {
      const arrayReferTable = [];

      if (response.status == 200) {
        response.resTableOut.forEach((item) => {
          arrayReferTable.push(
            `<tr><td>${item.dateRefer}</td><td>${item.referNo}</td><td>${item.commentOrg}</td><td>${item.dateOrg}</td><td>${item.referHopsNameDes}</td><td>${item.commentDes}</td><td>${item.dateDes}</td><td><a class="btn btn-primary" href="indexfromuse.php?onfrom=showdetailreferoutDestinationtable&idrefer=${item.codeGenReferNo}">รายละเอียด</a></td></tr>`
          );
        });
      }
      const table = $("#showTabelCancleRefer").DataTable({
        destroy: true, // ลบข้อมูลเก่าออกเมื่อเปลี่ยนข้อมูลใหม่
      });
      table.clear().draw(); // ล้างข้อมูลเก่าทั้งหมดใน DataTable
      table.rows.add($(arrayReferTable.join(""))).draw(); // เพิ่มข้อมูลใหม่เข้า DataTable
    },
  });
}
